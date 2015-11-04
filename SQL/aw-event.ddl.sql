-- Project Name : AwEvent
-- Date/Time    : 2015/11/04
-- Author       : Matsuya
-- RDBMS Type   : MySQL
-- Application  : A5:SQL Mk-2

-- 権限マスタ
drop table if exists mst_role cascade;

create table mst_role (
  id int(11) auto_increment not null comment 'ID'
  , role_name varchar(20) not null comment '権限名'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint mst_role_PKC primary key (id)
) CHARACTER SET utf8 comment '権限マスタ';

-- Type1
drop table if exists type1 cascade;

create table type1 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type1_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type1';

-- Type2
drop table if exists type2 cascade;

create table type2 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type2_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type2';

-- Type3
drop table if exists type3 cascade;

create table type3 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type3_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type3';

-- Type4
drop table if exists type4 cascade;

create table type4 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type4_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type4';

-- Type5
drop table if exists type5 cascade;

create table type5 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type5_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type5';

-- Type6
drop table if exists type6 cascade;

create table type6 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type6_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type6';

-- Type7
drop table if exists type7 cascade;

create table type7 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type7_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type7';

-- Type8
drop table if exists type8 cascade;

create table type8 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type8_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type8';

-- Type9
drop table if exists type9 cascade;

create table type9 (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , question1 char(1) default '0' comment '設問1'
  , question2 char(1) default '0' comment '設問2'
  , question3 char(1) default '0' comment '設問3'
  , question4 char(1) default '0' comment '設問4'
  , question5 char(1) default '0' comment '設問5'
  , question6 char(1) default '0' comment '設問6'
  , question7 char(1) default '0' comment '設問7'
  , question8 char(1) default '0' comment '設問8'
  , question9 char(1) default '0' comment '設問9'
  , question10 char(1) default '0' comment '設問10'
  , question11 char(1) default '0' comment '設問11'
  , question12 char(1) default '0' comment '設問12'
  , question13 char(1) default '0' comment '設問13'
  , question14 char(1) default '0' comment '設問14'
  , question15 char(1) default '0' comment '設問15'
  , question16 char(1) default '0' comment '設問16'
  , question17 char(1) default '0' comment '設問17'
  , question18 char(1) default '0' comment '設問18'
  , question19 char(1) default '0' comment '設問19'
  , question20 char(1) default '0' comment '設問20'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint type9_PKC primary key (id)
) CHARACTER SET utf8 comment 'Type9';

-- ユーザ
drop table if exists user cascade;

create table user (
  id int(11) auto_increment not null comment 'ID'
  , username varchar(40) not null comment 'ユーザネーム'
  , password varchar(40) not null comment 'パスワード'
  , enneagram_type char(1) comment 'エニアグラムタイプ'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint user_PKC primary key (id)
) CHARACTER SET utf8 comment 'ユーザ';

-- ユーザロール
drop table if exists user_role cascade;

create table user_role (
  id int(11) auto_increment not null comment 'ID'
  , user_id int(11) not null comment 'ユーザへの参照'
  , mst_role_id int(11) not null comment '権限マスタへの参照(1:管理者, 2:一般)'
  , created_by int(11) comment '登録者'
  , updated_by int(11) comment '更新者'
  , created_at datetime comment '登録日時'
  , updated_at datetime comment '更新日時'
  , deleted_at datetime comment '削除日時'
  , constraint user_role_PKC primary key (id)
) CHARACTER SET utf8 comment 'ユーザロール';
