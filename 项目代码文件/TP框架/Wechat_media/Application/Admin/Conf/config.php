<?php
return array(
	//'配置项'=>'配置值'
    // 配置文件增加设置
    'USER_AUTH_ON'                => true, //是否需要认证
    'USER_AUTH_TYPE'              => 1  , //认证类型
    'USER_AUTH_KEY'               => 'name',//认证识别号
    'REQUIRE_AUTH_MODULE'        => 'Admin',//需要认证模块
    'NOT_AUTH_MODULE'             => 'Home',//无需认证模块
    'USER_AUTH_GATEWAY'          => '/Admin/user/dologin',//用户后台登陆页面
    'USER_AUTH_MODEL'            => 'think_user', //用户的数据表名或者模型类名
    'RBAC_ROLE_TABLE'           => 'think_role',//角色表名称
    'RBAC_USER_TABLE'            => 'think_role_user',//用户表名称
    'RBAC_ACCESS_TABLE'         => 'think_access',//权限表名称
    'RBAC_NODE_TABLE'            => 'think_node',//节点表名称
    'GUEST_AUTH_ON'             => false,
    'GUEST_AUTH_ID'         =>0,
);