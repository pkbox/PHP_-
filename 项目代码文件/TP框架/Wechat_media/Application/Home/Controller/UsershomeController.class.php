<?php
/**
 * Created by PhpStorm.
 * User: 王天雷   赵静华
 * Date: 2016/12/1
 * Time: 14:44 下午
 */
namespace Home\Controller;

use Think\Controller;

class UsershomeController extends Controller{
    protected $admin_recommend_collection;
    protected $admin_recommend_lists;
    protected $user_recommend_collection;
    protected $user_recommend_lists;

    public function my_home(){
//        个人中心首页
        $this->display();
    }
    /*
     *显示我的收藏列表
     */
    public function my_collection(){
        //1.连接数据表
        $this->admin_recommend_collection = M('admin_recommend_collection');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->user_recommend_lists = M('user_recommend_lists');
        $this->user_recommend_collection = M('user_recommend_collection');
        //2.获取user_id，当用户授权网页的时候已经获取用户的信息。区别用户的唯一标识
        $user_id = session('userid');

        $user_id = 1;//测试用的

        //3.从数据表中查找所有Uid为$user_id 的mediaId
            //3.1 收藏的官方推荐
        $result = $this->admin_recommend_collection->field('mediaId')->where("Uid=$user_id")->select();
                //3.1.1 根据mediaId查找所有电影信息
        for($i=0;$i<count($result);$i++) {
            $rel = $result[$i]['mediaid'];
            $lists = $this->admin_recommend_lists->where("AR_ID=$rel")->select();
            $list[$i]=$lists['0'];
        }

            //3.2 收藏的用户推荐
        $r = $this->user_recommend_collection->field('mediaId')->where("Uid=$user_id")->select();

                //3.2.1 根据mediaId查找所有电影信息
        for($n=0;$n<count($r);$n++) {
            $l = $r[$n]['mediaid'];
            $ls = $this->user_recommend_lists->where("UR_ID=$l")->select();
            $lt[$n]=$ls['0'];
        }
        //4. 显示视图
        $this->assign('list',$list);
        $this->assign('lt',$lt);
        $this->display();
    }
    /*
     * 显示我的推荐列表
     */
    public function my_recommend(){
        $user_id = session('userid');
        $user_id = 1;//测试用
        $this->user_recommend_lists = M('user_recommend_lists');
        $result = $this->user_recommend_lists->where("UserID=$user_id")->select();
        $this->assign("result",$result);
        $this->display();
    }
    /*
     * 刷新
     */
    public function renovate(){
        //1.连接数据表
        $this->admin_recommend_collection = M('admin_recommend_collection');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->user_recommend_lists = M('user_recommend_lists');
        $this->user_recommend_collection = M('user_recommend_collection');
        //2.获取user_id，当用户授权网页的时候已经获取用户的信息。区别用户的唯一标识
        $user_id = session('userid');

        $user_id = 1;//测试用的

        $tab = I('tab');
        if($tab ==1){
            //3.1 收藏的官方推荐
            $result = $this->admin_recommend_collection->field('mediaId')->where("Uid=$user_id")->select();
            //3.1.1 根据mediaId查找所有电影信息
            for($i=0;$i<count($result);$i++) {
                $rel = $result[$i]['mediaid'];
                $lists = $this->admin_recommend_lists->where("AR_ID=$rel")->select();
                $list[$i]=$lists['0'];
            }
            echo json_encode($list);
        }elseif ($tab==2){
            //3.2 收藏的用户推荐
            $r = $this->user_recommend_collection->field('mediaId')->where("Uid=$user_id")->select();
            //3.2.1 根据mediaId查找所有电影信息
            for($n=0;$n<count($r);$n++) {
                $l = $r[$n]['mediaid'];
                $ls = $this->user_recommend_lists->where("UR_ID=$l")->select();
                $lt[$n]=$ls['0'];
            }
            echo json_encode($lt);
        }

    }
}