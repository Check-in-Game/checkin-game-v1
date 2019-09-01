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

// 生成签到令牌
$list = new control();
$list = $list->getCharts();
$count = 1;
?>

<!DOCTYPE html>
<html lang="zh-CN" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="./icon.ico">
    <title>Check-in Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/checkin-static@1.0.12/assets/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/checkin-static@1.0.12/assets/bootstrap/js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <!-- 幕布 -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Check-in Game 排行榜</h1>
        <p class="lead">签到排行榜实时更新，签到每隔10分钟即可进行一次，只需简单注册账户即可开始游戏！</p>
        <hr class="my-4">
        <p>还在等什么？点击下方的按钮下载客户端加入吧！</p>
        <p class="lead">
          <a class="btn btn-success" href="./register.html" target="_blank" role="button">注册账户</a>
          <a class="btn btn-primary" href="./web_checkin.html" target="_self" role="button">在线端</a>
          <a class="btn btn-info" href="https://jq.qq.com/?_wv=1027&k=5ax4j23" target="_blank" role="button">加入交流QQ群：887304185</a>
        </p>
        <p>
          客户端最新版本：<img src="https://img.shields.io/github/release/jokin1999/tcapps-checkin.svg?style=flat-square" alt="badge">
        </p>
      </div>
    </div>
    <div class="container">

      <div class="alert alert-success" role="alert">
        本站仅为怀旧服，数据不互通，限于服务器性能，每日如计算量过大将自动停服，次日开启。
      </div>

      <!-- 更新 -->

      <div class="alert alert-warning" role="alert">
        资料：<a href="./api.html" target="_blank">API协议</a>
      </div>

      <div class="alert alert-success" role="alert">
        排行榜实时更新，显示前100名。
      </div>

      <!-- 排行榜 -->
      <h2>排行榜</h2>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">排名</th>
            <th scope="col">UID</th>
            <th scope="col">用户名</th>
            <th scope="col">签到积分</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $key => $value): ?>
              <tr>
                <th scope="row">
                  <?php echo '#' . $count; ?>
                </th>
                <th scope="row">
                  <?php echo $value['uid']; ?>
                </th>
                <th scope="row">
                  <?php if ($count === 1): ?>
                    <?php echo "<font color=\"#ff8a00\" font-weight=\"5px\">".$value['username']."</font>"; ?>
                  <?php elseif($count === 2): ?>
                    <?php echo "<font color=\"#4176ff\">".$value['username']."</font>"; ?>
                  <?php elseif($count === 3): ?>
                    <?php echo "<font color=\"#ff397b\">".$value['username']."</font>"; ?>
                  <?php else: ?>
                    <?php echo $value['username']; ?>
                  <?php endif; ?>
                </th>
                <th scope="row">
                  <?php echo $value['count']; ?>
                </th>
              </tr>
              <?php $count++; ?>
            <?php endforeach; ?>
          </tr>
        </tbody>
      </table>

      <hr />

      <h2>其他</h2>

      <div class="alert alert-dark" role="alert">
        <h4 class="alert-heading">签到技巧</h4>
        签到运行时，请确保网络环境稳定，签到程序在签到失败后会再重试3次，全部失败后程序将不再重试，需要玩家手动再次点击启动。
      </div>

      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">版本说明</h4>
        此版本仅为怀旧服，与其他服务器数据不互通。
      </div>

      <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">联系我们</h4>
          官方QQ群：887304185
      </div>

    </div>
  </body>
</html>
