<?php
namespace Admin\controller;

use Think\Controller;
use Think\Page;
use Think\Upload;

class MovieController extends Controller{
    protected $admin_content_comment;//评论表
    protected $admin_recommend_collection;//电影推荐收藏表
    protected $admin_recommend_lists;//管理员推荐电影数据表
    protected $media_type;//电影类型数据表
    protected $user_recommend_lists;//用户推荐列表
    protected $user_recommend_collection;
    public $_num = 10;//页面显示数量

    public function _initialize() {
        if (session('name')){
            $name = session('name');
            //实例化模型
            $this->_user = M('think_user');
            if($this->_user->where("name='$name'")->count()){
                return true;
            }else{
                $url = U('admin/login/index');
                header("location:$url");
            }
        }else{
            $url = U('admin/login/index');
            header("location:$url");
        }
    }
    /*
     * 官方推荐
     */
    public function admin_recommend(){
        $this->media_type = M('media_type');
        $types = $this->media_type->select();

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
        $this->assign('types',$types);
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
            $filePath=$_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/admin/Uploads/'.$info['file']['savepath'].$info['file']['savename'];
            $data['thumb'] = substr(strrchr($filePath,'W'),1);
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
        $this->media_type = M('media_type');
        $types = $this->media_type->select();
        $this->assign('types',$types);
        if($result){
            $result = $result['0'];
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
        $this->media_type = M('media_type');
        $types = $this->media_type->select();
        $this->assign('types',$types);
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
/*
*自动获取页面显示
*/
    public function movie_automatic(){
        $this->media_type = M('media_type');
        $result = $this->media_type->select();
        $this->assign('types',$result);
        $this->display();
    }
    /*
    *自动获取
    *从豆瓣地址获取json串，并传到页面
    */
    public function getdata(){
        $doubanid = I('doubanid');
        $limit = $this->_num;
        $start = I('page')*$limit;
        $url = "https://movie.douban.com/j/chart/top_list?type=$doubanid&interval_id=100%3A90&action=unwatched&start=$start&limit=$limit";
        $data = file_get_contents($url);
        echo $data;
    }
    /*
    *自动获取
    *将信息存入数据库
    */
    public function adddata(){
        $data = I('data');
        $typeid = I('typeid');
        $recommend['title']=$data['title'];
        $recommend['thumb']=$data['cover_url'];
        $recommend['reason'] = '无';
        $recommend['time'] = $data['release_date'];
        $recommend['Director'] = '无';
        $recommend['Actor'] = implode('/',$data['actors']);
        $recommend['Score'] = $data['score'];
        $recommend['Type_id'] = (int)$typeid;
        $recommend['introduce'] = '无';
        $recommend['VideoAddress'] = '无';
        $recommend['contentImg'] = $data['cover_url'];
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $id = $this->admin_recommend_lists->add($recommend);
        $json['curlid'] = $data['id'];
        $json['id'] = $id;
        echo json_encode($json);
    }
    /*
     * 自动获取
     *将豆瓣电影内容也get下来运行jQuery
     */
    public function addother(){
        $urlid = I('urlid');
        $AR_ID = (int)I('AR_ID');
        $url = "https://movie.douban.com/subject/$urlid/";
        $html = file_get_contents($url);
        $url2 = U('admin/movie/saveother');
        echo $html;
        print <<<STR
<script>
            $("div").hide();
            $("body").append('正在添加');
            var div1 = $(".subject.clearfix");
            var div2 = $("#link-report");
            var div3 = $(".comment-item").eq(0);
            var reason = $.trim(div3.children().children("p").text());
            var AR_ID = $AR_ID;
            var contentImg = div1.children().eq(0).children().children().attr('src');
            var Director = div1.children().eq(1).children().eq(0).children().eq(1).text();
            var introduce = $.trim(div2.children().eq(0).text());
            $.post('$url2',{'AR_ID':AR_ID,'contentImg':contentImg,'Director':Director,'introduce':introduce,'reason':reason},function(){window.opener = null;window.open('', '_self'); window.close()});
        </script>
STR;
    }
    /*
     * 自动获取
     * 保存导演等信息
     */
    public function saveother(){
        $data = I();
        $AR_ID = $data['AR_ID'];
        unset($data['AR_ID']);
        $this->admin_recommend_lists = M('admin_recommend_lists');
        $this->admin_recommend_lists->where("AR_ID=$AR_ID")->save($data);
    }
    /*
/* 电影歌曲
*/
    public function music_recommend(){
        $this->music_recommend_lists=M('music_recommend_lists');
        $count = $this->music_recommend_lists->count();
        $pageSize =$this->_num;
        $page = new Page($count, $pageSize);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');
        $results = $this->music_recommend_lists
            ->limit($page->firstRow.','.$page->listRows)
            ->order('music_Id desc')
            ->select();
        $this->assign('list', $results);
        $this->assign('pagelist', $page->show());
        $this->display();
    }
    /*
     * 歌曲删除
     */
    public function  music_delete(){
        $id=(int)I('id');
        $this->music_recommend_lists=M('music_recommend_lists');
        $this->music_recommend_lists->where("music_Id=$id")->delete();
        echo '1';
    }
    /*
     * 歌曲详情
     */
    public function music_detail(){
        $id=(int)I('id');
        $this->music_recommend_lists=M('music_recommend_lists');
        $result=$this->music_recommend_lists->where("music_Id=$id")->select();
        $result=$result['0'];
        $this->assign('results',$result);
        $this->display();
    }
    /*
     * 歌曲修改
     */
    public function music_alter(){
        $id=(int)I('id');
        $this->music_recommend_lists = M('music_recommend_lists');
        $results=$this->music_recommend_lists->where("music_Id=$id")->select();
        $result=$results['0'];
        $this->assign('results',$result);
        $this->display();
    }
    /*
     * 歌曲添加
     */
    public function music_add(){
        $this->display();
    }
    public function music_addcont(){
        $upload = new Upload();// 实例化上传类
        $data=I();
        $upload->rootPath  =      './Public/admin/mp3/'; // 设置附件上传目录
        $info   =   $upload->upload();
    if($info) {
        $filePath=$_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/admin/mp3/'.$info['file']['savepath'].$info['file']['savename'];
        $data['MusicAddress']=substr(strrchr($filePath,'W'),1);
    }
        $this->music_recommend_lists = M('music_recommend_lists');
        $this->music_recommend_lists->add($data);
        header("location:music_recommend");
    }
}

