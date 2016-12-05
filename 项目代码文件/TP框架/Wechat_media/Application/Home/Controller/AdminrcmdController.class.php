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

    protected $admin_recommend_lists;
    protected $media_type;
    protected $admin_content_commend;
    protected $music_recommend_lists;

 /*
  * 显示影视推荐首页
  * */
    public function media_index(){
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->assign('admin_recommend_lists',$this->admin_recommend_lists->select());
        $this->display();
    }
    public function media_lists(){
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->assign('admin_recommend_lists',$this->admin_recommend_lists->select());
        $this->display();

    }

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
 * 分页
 */
    public function page(){
        $p = I('p');
        $this->admin_recommend_lists= M('admin_recommend_lists'); // 实例化User对象
        $count = $this->admin_recommend_lists->count();// 查询满足要求的总记录数
        $num = 2;//每页显示的条数
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $this->admin_recommend_lists->limit($p*$num,$num)->select();
        echo json_encode($list);

    }
}