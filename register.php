<?php
// +----------------------------------------------------------------------
// | Constructed by Jokin [ Think & Do & To Be Better ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2019 Jokin All rights reserved.
// +----------------------------------------------------------------------
// | Author: Jokin <Jokin@twocola.com>
// +----------------------------------------------------------------------

// 控制模块
include './controlCenter.php';

// 获取签到令牌
if (isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['comfirm']) && !empty($_POST['comfirm'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $comfirm = $_POST['comfirm'];
}else{
  die('提交的信息不完全，注册失败！');
}
// 检查
if (mb_strlen($username) > 16 || mb_strlen($username) < 5){
  die('用户名长度不得超过16位，不得低于5位！');
}
if (mb_strlen($password) > 16 || mb_strlen($password) < 8){
  die('密码长度不得超过16位，不得低于8位！');
}
if ($password !== $comfirm){
  die('两次密码不一致！');
}
// 生成签到令牌
$control = new control();
$result = $control->registerAccount($username, $password);
if ($result){
  die("注册成功！");
}else{
  die("用户名可能已经存在！");
}
?>
