-- Project Name : AwEvent
-- Date/Time    : 2015/09/30
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

-- ユーザ
drop table if exists user cascade;

create table user (
  id int(11) auto_increment not null comment 'ID'
  , username varchar(40) not null comment 'ユーザネーム'
  , password varchar(40) not null comment 'パスワード'
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
