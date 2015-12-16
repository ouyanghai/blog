create database a0924191420;
use a0924191420;
-- this is test;
-- bbs_user用户表
create table if not exists `ouyang_user`(
	`id` int unsigned not null auto_increment primary key, #主键id
	`username` varchar(32) not null,#用户名
	`password` varchar(32) not null,
	`level` tinyint(1) unsigned not null default 2,
	`rtime` int unsigned not null default 0,
	`rip` int not null default 0,
	unique(`username`)
)engine=myisam default charset=utf8 collate utf8_general_ci;

-- bbs_profile 用户详情表
create table if not exists `ouyang_profile`(
	`uid` int unsigned not null default 0,
	`t_name` varchar(32) not null default '无名',
	`age` int unsigned not null default 0,
	`sex` int unsigned not null default 0,
	`edu` int unsigned not null default 0,#(0->未填写1->小学2->初中3->高中4->大专5->大本  6->硕士  7->博士  8->博士后  9->烈士)
	`signed` text,
	`pic` varchar(255) not null default 'default.gif',
	`birthday` int unsigned not null default 0,
	`telphone` varchar(32) not null default '13888888888',
	`qq` int unsigned not null default 88888,
	`email` varchar(255) not null default '8888888@qq.com'
)engine=myisam default charset=utf8 collate utf8_general_ci;

-- bbs_part 相册表
create table if not exists `ouyang_part`(
	`id` int unsigned not null auto_increment primary key,
	`name` varchar(255) not null default ''
	`picname` varchar(255) not null default 'default.gif'
)engine=myisam default charset=utf8 collate utf8_general_ci;

-- bbs_cate 具体相册表
create table if not exists `ouyang_cate`(
	`id` int unsigned not null auto_increment primary key,
	`pid` int unsigned not null default 0,
	`thumbname` varchar(255) not null default 'default.jpg'
	`name` varchar(255) not null default 'default.jpg'
)engine=myisam default charset=utf8 collate utf8_general_ci;

-- bbs_post 主贴表
create table if not exists `ouyang_post`(
	`id` int unsigned not null auto_increment primary key,
	`cid` int unsigned not null default 0,
	`title` varchar(32) not null default '帖子标题',
	`content` text,
	`pic` varchar(255) not null default 'default.gif',
	`ptime` int unsigned not null default 0,
	`uid` int unsigned not null default 0,
	`pip` int not null default 0,
	`count` int unsigned not null default 0
)engine=myisam default charset=utf8 collate utf8_general_ci;

-- bbs_reply 回帖表
create table if not exists `ouyang_reply`(
	`id` int unsigned not null auto_increment primary key,
	`pid` int unsigned not null default 0,
	`content` text,
	`uid` int unsigned not null default 0,
	`ptime` int unsigned not null default 0,
	`pip` int unsigned not null default 0
)engine=myisam default charset=utf8 collate utf8_general_ci;

-- bbs_fri 友情链接表
create table if not exists `ouyang_fri`(
	`id` int unsigned not null auto_increment primary key,
	`title` varchar(255) not null default 'PHP技术共享',
	`desc` varchar(255) not null default 'PHP技术共享',
	`url` varchar(255) not null default 'http://www.lamplijie.com',
	`pic` varchar(255) not null default 'default_fri.gif'
)engine=myisam default charset=utf8 collate utf8_general_ci;


insert into ouyang_user(username,password,level) values('admin',md5(123),1);

insert into ouyang_profile(uid) values(1);

	