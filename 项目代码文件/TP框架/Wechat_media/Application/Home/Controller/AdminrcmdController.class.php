<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/12/1
 * Time: 14:05 下午
 */
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class AdminrcmdController extends Controller{

    protected $admin_recommend_lists;//管理员推荐电影数据表
    protected $media_type;//电影类型数据表
    protected $admin_content_commend;//评论表
    protected $music_recommend_lists;//音乐推荐表
    public $_num = 10;//页面显示数量
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
        $this->media_type = M('media_type');
        $type = $this->media_type->where("id=$type_id")->field('type')->select();
        $type = $type[0]['type'];
        $this->assign('admin_recommend_lists',$result);
        $this->assign('type_id',$type_id);
        $this->assign('type',$type);
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
        $comments = $this->admin_content_comment->where("MediaID=$ar_id")->order('time desc,PariseCount desc')->limit(20)->select();
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
        $data['MediaID'] = I('mediaid');
        $data['content'] = I('content');
        $data['time'] = time();
        $data['userName'] = 'yonghu';
        $data['userImg'] = 'http://img5.duitang.com/uploads/item/201602/11/20160211215958_P4MtQ.thumb.700_0.jpeg';
        $this->admin_content_comment = M('admin_content_comment');
        $result = $this->admin_content_comment->add($data);
        if ($result){
            echo '1';
        }
    }
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
        $num = 5;//每次加载的的条数
        $list = $this->admin_recommend_lists->where("type_id=$type_id")->limit($p*$num,$num)->select();
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
        //获取ar_id,p
        $ar_id = (int)I('ar_id');
        $p = (int)I('p');
        //实例化模型类
        $this->admin_content_comment = M('admin_content_comment');
        //查询
        $comments = $this->admin_content_comment->where("MediaID=$ar_id")->order('time desc,PariseCount desc')->limit($p*20,20)->select();
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
        $comments = $this->admin_content_comment->where("MediaID=$ar_id")->order('time desc,PariseCount desc')->limit(20)->select();
        //输出json串
        echo json_encode($comments);
    }
    /*
    *电影金曲列表显示
    */
    public function media_music(){
        $this->music_recommend_lists=M('music_recommend_lists');
        $musicrcmd = $this->music_recommend_lists->limit(10)->select();
        //dump($musicrcmd);
        $this->assign('musicrcmd',$musicrcmd);
        //显示视图
        $this->display();
    }

}