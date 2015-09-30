TRUNCATE TABLE mst_role;
TRUNCATE TABLE user;
TRUNCATE TABLE user_role;

INSERT INTO mst_role(id,role_name,created_by,updated_by,created_at,updated_at,deleted_at) VALUES (1,'ROLE_SUPER_ADMIN',NULL,NULL,NULL,NULL,NULL);
INSERT INTO mst_role(id,role_name,created_by,updated_by,created_at,updated_at,deleted_at) VALUES (2,'ROLE_MEMBER',NULL,NULL,NULL,NULL,NULL);
INSERT INTO user(id,username,password,created_by,updated_by,created_at,updated_at,deleted_at) VALUES (1,'super_admin','a7ce5b0c7e956b8e3c1a5c254c910d57c56e1b57',NULL,NULL,NULL,NULL,NULL);
INSERT INTO user(id,username,password,created_by,updated_by,created_at,updated_at,deleted_at) VALUES (2,'member','a7ce5b0c7e956b8e3c1a5c254c910d57c56e1b57',NULL,NULL,NULL,NULL,NULL);
INSERT INTO user_role(id,user_id,mst_role_id,created_by,updated_by,created_at,updated_at,deleted_at) VALUES (1,1,1,NULL,NULL,NULL,NULL,NULL);
INSERT INTO user_role(id,user_id,mst_role_id,created_by,updated_by,created_at,updated_at,deleted_at) VALUES (2,2,2,NULL,NULL,NULL,NULL,NULL);
