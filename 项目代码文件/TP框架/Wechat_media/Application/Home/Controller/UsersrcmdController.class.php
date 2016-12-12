<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/12/1
 * Time: 14:43 下午
 */
namespace Home\Controller;


use Think\Controller;

class UsersrcmdController extends Controller
{
    protected $user_recommend_lists;//用户推荐数据表
    public  $_num = 5;//刷新后显示的数据条数
    public  $_numG = 5;//滚动加载的条数
    protected $user_recommend_collection;
    /*
     * 显示用户推荐区首页页面
     */
    public function user_recommend_index(){
        $this->time_search();
        $this->hot_search();
        $this->display();
    }
    /**
     * 显示用户推荐页页面
     */
    public function user_recommend(){
        //显示模板
        $this->display();
    }
    /*
     *按时间降序排列
     */
    public function time_search(){
        $this->user_recommend_lists = M('user_recommend_lists');
        $result = $this->user_recommend_lists->order('createTime desc')->select();
        $this->assign('result',$result);
    }

    /*
     * 按点赞降序排列
     */
    public function hot_search(){
        $this->user_recommend_lists = M('user_recommend_lists');
        $hot = $this->user_recommend_lists->order('PariseCount desc')->select();
        $this->assign('hot',$hot);
    }
    /*
     * 用户推荐区首页
     * 1.刷新
     * 显示查询结果的前$this->num 条数据
     * 2.滚动加载
     */
    public function renovate()
    {
        $p = I('p');//区别刷新
        $l = I('l');
        $type = I('type');//区别滚动加载
        $this->user_recommend_lists = M('user_recommend_lists');
        if ($p == "A") {
            //按热度刷新:根据点赞数量降序查询
            $hot = $this->user_recommend_lists->order('PariseCount desc')->limit($this->_num)->select();
            echo json_encode($hot);
        } else if ($p == "B") {
            //按时间刷新:根据时间降序查询
            $result = $this->user_recommend_lists->order('createTime desc')->limit($this->_num)->select();
            echo json_encode($result);
        } else if ($type == "A") {
            //滚动加载按热度列表
            $hotList = $this->user_recommend_lists->order("PariseCount desc")->limit($l*$this->_numG,$this->_numG)->select();
            echo json_encode($hotList);
        } else if ($type == "B") {
            //滚动加载按时间列表
            $timeList = $this->user_recommend_lists->order("createTime desc")->limit($l*$this->_numG,$this->_numG)->select();
            echo json_encode($timeList);
        }
    }
    /**
     * 验证码页面
     */
    public function verify(){
        $config =    array(
            'imageW'      =>  240,      //验证码宽度
            'imageH'      =>    115,    //验证码高度
            'fontSize'    =>    35,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    /**
     * 验证码检验
     */
    public function check_verify(){
        $code = I('verify');
        $verify = new \Think\Verify();
        if($verify->check($code)){
            echo '1';
        }else{
            echo '0';
        }
    }

    /**
     * 用户推荐区搜索页面
     */
    public function search(){
        $time = I('time');
        $this->user_recommend_lists = M('user_recommend_lists');
        $result = $this->user_recommend_lists->where("createtime>'$time'")->order('createtime asc,parisecount desc')->limit(20)->select();
        if ($result){
            echo json_encode($result);
        }else {
            echo '0';
        }
    }

    /**
     * 用户推荐获取数据存入数据库动作
     */
    public function publish(){
        $this->user_recommend_lists = M('user_recommend_lists');
        $data['UserID'] = session('userid');
        $data['Name']=session('name');
        $data['Title'] = I('title');
        $data['Reason'] = I('reason');
        if ($_FILES){
            $file = $_FILES['file'];
            $file['name'] = date('YmdHis',time()) . $data['UserID'] . strrchr($file['name'],'.');
            $filePath = $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/uploads/'.$file['name'];
            if(move_uploaded_file($file['tmp_name'],$filePath)){
                $data['thumb'] = substr(strrchr($filePath,'W'),1);
                $result = $this->user_recommend_lists->add($data);
                if ($result){
                    echo '1';
                }else{
                    @unlink($filePath);
                    echo '2';
                }
            }else{
                echo json_encode('3');
            }
        }
    }

    /**
     * 获取用户收藏信息
     */
    public function getcollection(){
        $Uid = session('userid');
        $this->user_recommend_collection = M("user_recommend_collection");
        $result = $this->user_recommend_collection->field('mediaid')->where("Uid=$Uid")->select();
        echo json_encode($result);
    }

    /**
     * 获取用户点赞信息
     */
    public function getsession(){
        echo json_encode(session('UR_ID'));
    }

    /**
     * 用户收藏动作
     */
    public function collection(){
        $data['MediaId'] = I('mediaid');
        $data['Uid'] = (int)session('userid');
        $this->user_recommend_collection = M("user_recommend_collection");
        $this->user_recommend_collection->add($data);
    }
    /**
     * 点赞功能动作
     */
    public function praise(){
        //判断session中是否有UR_ID,若没有则创建
        if (!session('UR_ID')){
            session('UR_ID',array());
        }
        //获取推荐的UR_ID
        $UR_ID = I('ur_id');
        //获取session中的UR_ID
        $arrUR_ID = session('UR_ID');
        //将评论的UR_ID插入session的数组中
        array_push($arrUR_ID,$UR_ID);
        //将数组插入session
        session('UR_ID',$arrUR_ID);
        //实例化模型类
        $this->user_recommend_lists = M('user_recommend_lists');
        //更新数据,点赞数加一
        $this->user_recommend_lists->where("UR_Id=$UR_ID")->setInc('PariseCount');
    }

    /**
     * 取消点赞功能动作
     */
    public function praise_c(){
        //获取要取消点赞的推荐UR_ID
        $UR_ID = I('ur_id');
        //获取session中的UR_ID
        $arrUR_ID = session('UR_ID');
        //将session中的某条UR_ID删除
        foreach ($arrUR_ID as $key => $ID){
            if ($ID == $UR_ID){
                unset($arrUR_ID[$key]);
            }
        }
        //将数组重新插入session
        session("UR_ID",$arrUR_ID);
        //实例化模型类
        $this->user_recommend_lists = M('user_recommend_lists');
        //数据更新,点赞数减一
        $this->user_recommend_lists->where("UR_Id=$UR_ID")->setDec('PariseCount');
    }
}