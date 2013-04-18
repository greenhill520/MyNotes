# 建表
set names utf8;
set character_set_database = utf8;
set character_set_server = utf8;
USE mynotes;

#
# Table structure for table 'user'
# 
# id + 用户名 + 账号名 + 密码 +　个人信息 + 图片地址 + 是否组长 + 是否管理员
CREATE TABLE user (
	id int(8) unsigned NOT NULL auto_increment,
	UserName varchar(32) NOT NULL ,
	CountName varchar(32)  NOT NULL ,
	Password varchar(32)  NOT NULL ,
	Info text NOT NULL ,
	PicPath varchar(32) NOT NULL ,
	IsAdmin tinyint(1) DEFAULT '0' NOT NULL,   
	Date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,   
	
	PRIMARY KEY (id),
	KEY userName (userName(32))
);

#
# Table structure for table 'friend'
#
# 用户归属组： 用户id + 组id
CREATE TABLE friend(
	UserA int(8) unsigned NOT NULL,
	UserB int(8) unsigned NOT NULL,

	PRIMARY KEY (UserA, UserB),
	FOREIGN KEY (UserA) REFERENCES user (id),
	FOREIGN KEY (UserB) REFERENCES user (id)
);

#
# Table structure for table 'topic'
#
# 客体：id + 归属用户id + 名字 + 图片地址 + 客体信息 + 

CREATE TABLE topic (
	id int(8) unsigned NOT NULL auto_increment,
	Name varchar(32) NOT NULL ,
	Info text NOT NULL ,
	PicPath varchar(32) NOT NULL ,
	Author varchar(32) NOT NULL ,
	AuthorInfo text NOT NULL ,
	Publisher varchar(32) NOT NULL,
	UserID int(8) unsigned NOT NULL,
	Date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,   
	Url varchar(128) NOT NULL ,
	Score int(8) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (id),
	KEY Name (Name(32)),
	FOREIGN KEY (UserID) REFERENCES user (id)
) ;

#
# Table structure for table 'groups'
#
# 组：组名 + 组公告 + 归属用户id

CREATE TABLE groups (
	id int(8) unsigned NOT NULL auto_increment,
	GroupName varchar(32) NOT NULL ,
	Info text NOT NULL ,
	AdminID int(8) unsigned NOT NULL,
	Date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,   

	PRIMARY KEY  (id),
	KEY GroupName (GroupName(32)),
	FOREIGN KEY (AdminID) REFERENCES user (id)
);


#
# Table structure for table 'usertogroup'
#
# 用户归属组： 用户id + 组id
CREATE TABLE usertogroup(
	UserID int(8) unsigned NOT NULL,
	GroupID int(8) unsigned NOT NULL,
	
	PRIMARY KEY (UserID, GroupID),
	FOREIGN KEY (GroupID) REFERENCES groups (id), 
	FOREIGN KEY (UserID) REFERENCES user (id)
);

#
# Table structure for table 'feedback' //'comment' 评论
#
# 反馈信息：id + 类型（评论，笔记，标签） + 名字 + 内容 + 得分 + 归属用户ID + 归属组ID

CREATE TABLE feedback (
	id int(8) unsigned NOT NULL auto_increment ,
	Type ENUM('comment', 'note', 'label') ,
	Name varchar(32) NOT NULL ,
	Info text NOT NULL ,
	Score int(8) DEFAULT '0' NOT NULL,
	UserID int(8) unsigned NOT NULL,
	TopicID int(8) unsigned NOT NULL,
	IsOpen tinyint(1) DEFAULT '1' NOT NULL,
	Date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  

	PRIMARY KEY (id),
	FOREIGN KEY (UserID) REFERENCES user (id),
	FOREIGN KEY (TopicID) REFERENCES topic (id)
);

delete from usertogroup;
delete from friend;
delete from groups;
delete from feedback;
delete from topic;
delete from user;

INSERT INTO user VALUES(null,"Admin",'add6bb58e139be103324d04d82d8f545','14e1b600b1fd579f47433b88e8d85291',"We are anonymous!!!",'hacked.jpg',1,null);
#countName = webadmin	password = 123456
