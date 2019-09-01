# tcapps-checkin-server

## API相关

### Actions

- 用户注册： `/registerAccount.php?username=[username]&password=[password]`
- 获取Token： `/getToken.php?username=[username]&password=[password]`
- 用户签到： `/checkIn.php?username=[username]&token=[token]`

## 数据库设计
```
#用户信息
create table tcapps_checkin_user_accounts(
  uid int unsigned auto_increment primary key not null comment "用户ID",
  username varchar(16) unique not null comment "用户名",
  password varchar(32) not null comment "密码",
  status tinyint not null default 1 comment "状态"
)comment="用户信息",engine=MyISAM default character set utf8 collate utf8_general_ci;

#签到Token列表v2
create table tcapps_checkin_tokens_v2(
  uid int unsigned primary key not null comment "用户ID",
  token varchar(49) default "" comment "Token",
  status tinyint not null default -1 comment "状态"
)comment="签到Token列表",engine=MyISAM default character set utf8 collate utf8_general_ci;

#签到信息v2
#类型0:普通加值
#类型1:活动加值
#类型2:系统加值
#类型3:补偿加值
#类型4:氪金加值
create table tcapps_checkin_lists_v2(
  cid int unsigned auto_increment primary key not null comment "签到ID",
  uid int unsigned not null comment "用户ID",
  tid tinyint unsigned not null default 0 comment "签到类型",
  worth tinyint unsigned not null default 1 comment "价值",
  cost tinyint unsigned not null default 0 comment "消耗",
  check_time datetime not null comment "签到时间",
  status tinyint not null default 1 comment "状态"
)comment="签到信息",engine=MyISAM default character set utf8 collate utf8_general_ci;

#活动设计
create table tcapps_checkin_activity(
  aid int unsigned auto_increment primary key not null comment "活动ID",
  starttime datetime not null comment "活动开始时间",
  endtime datetime not null comment "活动开始时间",
  min_worth int unsigned not null default 1 comment "最小价值",
  max_worth int unsigned not null default 1 comment "最大价值",
  status tinyint not null default 1 comment "状态"
)comment="活动设计表",engine=MyISAM default character set utf8 collate utf8_general_ci;
```

## 抛弃设计
```
#签到信息
create table tcapps_checkin_lists(
  cid int unsigned auto_increment primary key not null comment "签到ID",
  username varchar(16) not null comment "用户名",
  check_time datetime not null comment "签到时间"
)comment="签到信息",engine=MyISAM default character set utf8 collate utf8_general_ci;

#签到Token列表
create table tcapps_checkin_tokens(
  username varchar(16) primary key not null comment "用户名",
  token varchar(49) default "" comment "Token",
  status tinyint not null default -1 comment "状态"
)comment="签到Token列表",engine=MyISAM default character set utf8 collate utf8_general_ci;
#insert into tcapps_checkin_tokens set username='jokin';
```
