<?php
/**
 * Created by PhpStorm.
 * User: 王天雷
 * Date: 2016-12-13
 * Time: 11:11 上午
 */
namespace Admin\Controller;

use Org\Util\Rbac;
use Think\Controller;

class UserController extends Controller
{
    private $_user;
    private $_role_user;

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
     * 显示后台首页
     */
    public function index()
    {
        $this->display();
    }
    /*
     *显示管理员信息列表
     */
    public function user(){
        $this->searchUser();
        $this->display();
    }
    /*
     * 显示添加管理员页面
     */
    public function add_admin(){
        $this->display();
    }
    /*
     * 查看管理员
     */
    public function searchUser(){
        $this->_user = M('think_user');
        $result = $this->_user->select();
//        dump($result);
        $this->assign('result',$result);
    }
    /*
     * 删除管理员
     */
    public function delete(){
        $id = (int)I('id');
        $this->_user = M('think_user');
        $this->_user->where("id=$id")->delete();
        //同时删除role_user表中的数据
        $this->_role_user = M('think_role_user');
        $this->_role_user->where("user_id=$id")->delete();

        echo json_encode("删除成功！");
    }
    /*
     * 添加管理员
     */
    public function add(){
        $name = I('username');
        $pswd = I('password');
        //实例化模型
        $this->_user = M('think_user');
        $data['name'] = $name;
        $data['passwd'] = md5($pswd);//md5加密
        //将数据插入到数据库
        $this->_user->add($data);
        //同时要更新think_role_user表
        $this->_role_user = M('think_role_user');
        $userid = $this->_user->field('id')->where("name='$name'")->select();
        $msg['role_id'] = 2;
        $msg['user_id'] = $userid['0']['id'];
        $this->_role_user->add($msg);
        //插入成功后跳转到管理员列表页面
        $this->success("添加成功","user/user");
    }
    /*
     *修改密码下一步
     */
    public function passOne(){
        $name =I('username');
        $passwd = md5(I('mpass'));
        //实例化模型
        $this->_user = M('think_user');
        //查询当前用户的原密码是否输入正确
        $result = $this->_user->where("name='$name' and passwd='$passwd'")->count();
        if($result==1){
            $this->display();
        }else{
//            echo "1";
            $this->display("user/pass");

        }
    }
    /*
     * 修改密码页面
     */
    public function pass(){
        $this->display();
    }
    /*
     * 修改管理员密码操作
     */
        public function save(){
            //获取信息
            $name = I('username');
            $newpass = md5(I('newpass'));
            //实例化模型
            $this->_user = M('think_user');
            //修改密码
            $data['passwd']=$newpass;
            $result = $this->_user->field('passwd')->where("name='$name'")->save($data);
            if($result){
                $this->success('修改成功！',"user/index");
            }else{
                $this->error('修改失败','user/pass');
            }
        }
    /*
     * 判断是否重复注册账号
     */
    public function match(){
        $name = I('uName');
        $this->_user = M('think_user');
        $count = $this->_user->where("name='$name'")->count();
        if($count==0){
            echo json_encode(1);
        }
        else{
            echo json_encode(0);
        }
    }
    /*
     * 判断是否为超级管理员
     * 如果是则有所有内容
     * 如果不是则只有部分功能
     */
    public function  judgeAdmin(){
        $name = I('session.name');
        //找到用户名的ID
        $this->_user = M('think_user');
        $id = $this->_user->where("name='$name'")->field("id")->select();
        //通过ID找到属于哪个类型的管理员
        $id = $id[0]['id'];
        $this->_role_user = M('think_role_user');
        $result = $this->_role_user->where("user_id='$id'")->field('role_id')->select();
        $result = $result[0]['role_id'];
        if($result=='1'){
            echo json_encode(1);
        }else{
            echo json_encode(2);
        }
    }
}