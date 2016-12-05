<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/12/1
 * Time: 14:44 下午
 */
namespace Home\Controller;

use Think\Controller;

class UsershomeController extends Controller{
    public function my_home(){
//        个人中心首页
        $this->display();
    }
}