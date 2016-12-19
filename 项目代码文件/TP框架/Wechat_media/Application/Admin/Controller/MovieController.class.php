<?php
namespace Admin\controller;

use Think\Controller;
use Think\Page;

class MovieController extends Controller{
    protected $admin_content_comment;//评论表
    protected $admin_recommend_collection;//电影推荐收藏表
    protected $admin_recommend_lists;//管理员推荐电影数据表
    protected $media_type;//电影类型数据表
    protected $user_recommend_lists;//用户推荐列表
    protected $user_recommend_collection;
    public $_num = 10;//页面显示数量
    /*
     * 官方推荐
     */
    public function admin_recommend(){
        $this->admin_recommend_lists = M('admin_recommend_lists');
        // 1. 获取记录总条数
        $count = $this->admin_recommend_lists->count();
        // 2. 设置（获取）每一页显示的个数
        $pageSize =$this->_num;
        // 3. 创建分页类对象
        $page = new Page($count, $pageSize);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');
        // 4. 分页查询
        $results = $this->admin_recommend_lists
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        // 5. 输出查询结果
        $this->assign('list', $results);
        // 6. 输出分页码
        $this->assign('pagelist', $page->show());
        // 7. 显示视图文件
        $this->display();
    }
    /*
     * 删除
     */
    public function movie_delete(){
        $id=(int)I('id');

        $this->admin_content_comment=M('admin_content_comment');
        $this->admin_content_comment->where("MediaID=$id")->delete();

        $this->admin_recommend_collection=M('admin_recommend_collection');
        $this->admin_recommend_collection->where("MediaId=$id")->delete();

        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->admin_recommend_lists->where("AR_ID=$id")->delete();
        echo '1';

    }
    /*
     * 查看详情
     */
    public function detail(){
        $id=(int)I('id');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $results=$this->admin_recommend_lists->where("AR_ID=$id")->select();
        $result=$results['0'];
        $this->assign('results',$result);
        $this->display();
    }
    /*
     * 修改内容
     */
    public function add(){
        $id=(int)I('id');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $results=$this->admin_recommend_lists->where("AR_ID=$id")->select();
        $result=$results['0'];
        $this->assign('results',$result);
        $this->display();
    }
    public function addcontent(){
        $upload = new \Think\Upload();
        $upload->rootPath="./Public/admin/Uploads/";
        $info=$upload->upload();
        $data=I();
        if($info) {
            $data['thumb'] = $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/admin/Uploads/'.$info['file']['savepath'].$info['file']['savename'];
        }
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->admin_recommend_lists->where('AR_ID='.$data['AR_ID'])->save($data);
        header("location:detail/id/".$data['AR_ID']);

    }
    /*
     * 搜索
     */
    public function search(){
        $title=I('title');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $result=$this->admin_recommend_lists->where("title='$title'")->select();
        if($result){
            $this->assign('results',$result);
            $this->display();
        }else{
            $this->display('error');
        }
    }

    /*
     * 分类获取
     */
    public function obtain(){
        $option=I('option');
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $result=$this->admin_recommend_lists->where('Type_id='.$option)->select();
        if($result){
            echo json_encode($result);
        }else{
            echo '1';
        }
    }
    public function error(){
        $this->display();
    }
    /*
     * 用户推荐
     */
    public function user_recommend(){
        $this->user_recommend_lists = M('user_recommend_lists');
        // 1. 获取记录总条数
        $count = $this->user_recommend_lists->count();
        // 2. 设置（获取）每一页显示的个数
        $pageSize =$this->_num;
        // 3. 创建分页类对象
        $page = new Page($count, $pageSize);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');
        // 4. 分页查询
        $results = $this->user_recommend_lists
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        // 5. 输出查询结果
        $this->assign('list', $results);
        // 6. 输出分页码
        $this->assign('pagelist', $page->show());
        // 7. 显示视图文件
        $this->display();
    }
    /*
     * 用户详情
     */
    public function user_detail(){
        $id=(int)I('id');
        $this->user_recommend_lists = M('user_recommend_lists');
        $results=$this->user_recommend_lists ->where("UR_Id=$id")->select();
        $result=$results['0'];
        $this->assign('results',$result);
        $this->display();
    }
    /*
     * 用户删除
     */
    public function user_delete(){
        $id=(int)I('id');

        $this->user_recommend_collection=M('user_recommend_collection');
        $this->user_recommend_collection->where("MediaId=$id")->delete();

        $this->user_recommend_lists=M('user_recommend_lists');
        $this->user_recommend_lists->where("UR_Id=$id")->delete();
        echo '1';
    }
/*
 * 推荐人搜索
 */
public function user_search()
{
    $name = I('name');
    $this->user_recommend_lists = M('user_recommend_lists');
    $result = $this->user_recommend_lists->where("Name='$name'")->select();
    //dump($result);
    if ($result) {
        $this->assign('results', $result);

        $this->display();
    } else {
        $this->display('user_error');
    }
}
}

