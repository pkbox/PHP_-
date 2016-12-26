<?php
/**
 * Created by PhpStorm.
 * User: zhaoz
 * Date: 2016/12/21
 * Time: 10:37
 */

namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller
{
    public $_user;
    public function index(){
        $this->display();
    }
    public function dologin(){
        $name = I('name');
        $passwd = md5(I('passwd'));
        session('name',$name);
        //判断是否存在
        //实例化模型
        $this->_user = M('think_user');
        $count = $this->_user->where("name='$name' and passwd='$passwd'")->count();
        if($count){
            $url = U('admin/user/index');
            header("location:$url");
        }else{
            $this->assign('error','登录失败');
            $this->display('index');
        }
    }
    public function logout(){
        session('name',null);
        $url = U('admin/login/index');
        header("location:$url");
    }
}