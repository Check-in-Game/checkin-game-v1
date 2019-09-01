<?php
// +----------------------------------------------------------------------
// | Constructed by Jokin [ Think & Do & To Be Better ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2019 Jokin All rights reserved.
// +----------------------------------------------------------------------
// | Author: Jokin <Jokin@twocola.com>
// +----------------------------------------------------------------------

// JSON头
header("Content-Type: application/json");

// 控制模块
include './controlCenter.php';

// 获取签到令牌
if (isset($_GET['username']) && !empty($_GET['username'])
    && isset($_GET['password']) && !empty($_GET['password'])) {
  $username = $_GET['username'];
  $password = $_GET['password'];
}else{
  die(control::generateJson(null, 404, 'Username and password required but not given.'));
}

// 生成签到令牌
$control = new control();
$result = $control->registerAccount($username, $password);
if ($result){
  $result_json = control::generateJson($result, 200);
}else{
  $result_json = control::generateJson($result, 404, 'Failed to register account.');
}
die($result_json);
?>
