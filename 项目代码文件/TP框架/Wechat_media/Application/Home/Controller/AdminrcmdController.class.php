<?php
/**
 * Created by PhpStorm.
 * User: 赵静华  王天雷
 * Date: 2016/12/1
 * Time: 14:05 下午
 * 功能：本控制器主要用于实现“影视推荐”模块的相关功能
 */
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class AdminrcmdController extends Controller{

    protected $admin_recommend_lists;//管理员推荐电影数据表
    protected $media_type;//电影类型数据表
    protected $admin_content_comment;//评论表
    protected $music_recommend_lists;//音乐推荐表
    public $_num = 10;//页面显示数量
    public $_commentnum = 20;//评论显示数量
 /*
  * 显示影视推荐首页
  * */
    public function media_index(){
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->assign('admin_recommend_lists',$this->admin_recommend_lists->select());
        $this->display();
    }
/*
 * 显示影视推荐列表页
 */
    public function media_lists(){
        $type_id = I('type_id');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $result = $this->admin_recommend_lists->
            where("type_id = $type_id")->
            order('createTime desc')->
            limit($this->_num)->select();
        $this->assign('admin_recommend_lists',$result);
        $this->assign('type_id',$type_id);
        $this->display();

    }
/*
 * 加载内容页面
 */
    public function media_content(){
        //获取内容id
//        $ar_id = I('ar_id');
        $ar_id = 3;
        //链接数据表
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->media_type = M('media_type');
        $this->admin_content_comment = M('admin_content_comment');
        //查询数据
        $result = $this->admin_recommend_lists->field('AR_ID,title,Director,Actor,introduce,contentImg,Type_id')->where("ar_id=$ar_id")->select();
        $result=$result['0'];
        $type_id=$result['type_id'];
        //获取主演、类型
        $type = $this->media_type->field('type')->where("id=$type_id")->select();
        $type=$type['0']['type'];
        $actors=explode('/',$result['actor']);
        $actor['0']=$actors['0'];
        $actor['1']=strstr($result['actor'],'/');
        $result['actor']=$actor;
        $result['type']=$type;
        //查询评论信息
        $comments = $this->admin_content_comment->where("MediaID=$ar_id")->order('PariseCount desc,time desc')->limit(3)->select();
        //将数据传入视图文件
        $this->assign('content',$result);
        $this->assign('comments',$comments);
        //显示视图
        $this->display();
    }
    /*
     * 显示评论页
     */
    public function media_comment(){
        //获取ar_id
        $ar_id = (int)I('id');
        //实例化模型类
        $this->admin_content_comment = M('admin_content_comment');
        //数据查询
        $comments = $this->admin_content_comment->where("MediaID=$ar_id")->order('time desc,PariseCount desc')->limit($this->_commentnum)->select();
        //将数据传入模板
        $this->assign('comments',$comments);
        $this->assign('ar_id',$ar_id);
        //显示模板
        $this->display();
    }
    /*
     *用户发表评论
     */
    public function comment_publish(){
        //获取数据
        $data['MediaID'] = I('mediaid');
        $data['content'] = I('content');
        $data['time'] = time();
        $data['userName'] = session('name');
        $data['userImg'] = session('userimg');
        //实例化模型类
        $this->admin_content_comment = M('admin_content_comment');
        //数据插入
        $result = $this->admin_content_comment->add($data);
        //返回一个值
        if ($result){
            echo '1';
        }
    }
    /*
    * 点赞功能
    */
    public function praise(){
        $C_ID = I('c_id');
        if(!session('C_ID')){
            session('C_ID',array());
        }
        $arrC_ID = session('C_ID');
        array_push($arrC_ID,$C_ID);
        session('C_ID',$arrC_ID);
        $this->admin_content_comment = M('admin_content_comment');
        $this->admin_content_comment->where("C_ID=$C_ID")->setInc('PariseCount');
    }
    /**
     * 取消点赞功能函数
     */
    public function praise_c(){
        $C_ID = I('c_id');
        $arrC_ID = session('C_ID');
        foreach ($arrC_ID as $key => $ID){
            if ($ID == $C_ID){
                unset($arrC_ID[$key]);
            }
        }
        session("C_ID",$arrC_ID);
        $this->admin_content_comment = M('admin_content_comment');
        $this->admin_content_comment->where("C_ID=$C_ID")->setDec('PariseCount');
    }
    public function getsession(){
        $ses = json_encode(session('C_ID'));
        echo $ses;
    }
/*
 * 滚动加载数据
 * 加载未显示的数据
 */
    public function page(){
        $p = I('p');
        $type_id = I('type_id');
        $this->admin_recommend_lists= M('admin_recommend_lists'); // 实例化User对象
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $this->admin_recommend_lists->where("type_id=$type_id")->limit($p*$this->_num,$this->_num)->select();
        echo json_encode($list);

    }
    /*
     * 刷新
     * 按时间查找，并显示前10条数据
     */
    public function renovate(){
        $type_id = I('type_id');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $list = $this->admin_recommend_lists->where("type_id=$type_id")->order('createTime desc')->limit($this->_num)->select();
        echo json_encode($list);
    }
    /**
     * 评论页加载
     */
    public function commentpage(){
        //每页个数
        $num = 20;
        //获取ar_id,p
        $ar_id = (int)I('ar_id');
        $p = (int)I('p');
        //实例化模型类
        $this->admin_content_comment = M('admin_content_comment');
        //查询起始行
        $firstRow = $p*$this->_commentnum;
        //查询
        $comments = $this->admin_content_comment->where("MediaID=$ar_id")->order('time desc,PariseCount desc')->limit($firstRow,$this->_commentnum)->select();
        //将时间戳转化为时间格式
        foreach ($comments as $key => $comment){
            $comments[$key]['time']=date('Y-m-d H:i', $comment['time']);
        }
        //输出json串
        if ($comments) {
            echo json_encode($comments);
        }else{
            echo '0';
        }
    }
    /**
     * 评论页刷新
     */
    public function newcomment(){
        //获取ar_id
        $ar_id = (int)I('ar_id');
        //实例化模型类
        $this->admin_content_comment = M('admin_content_comment');
        //查询
        $comments = $this->admin_content_comment->where("MediaID=$ar_id")->order('time desc,PariseCount desc')->limit($this->_commentnum)->select();
        //将时间戳转化为时间格式
        foreach ($comments as $key => $comment){
            $comments[$key]['time']=date('Y-m-d H:i', $comment['time']);
        }
        //输出json串
        echo json_encode($comments);
    }
}