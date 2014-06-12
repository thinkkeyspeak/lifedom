CREATE TABLE tbl_lookup
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(128) NOT NULL,
	type VARCHAR(128) NOT NULL,
	code INTEGER NOT NULL,
	position INTEGER NOT NULL
);

CREATE TABLE tbl_user
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	first_name VARCHAR(128) NOT NULL,
	family_name VARCHAR(128) NOT NULL,
	dob INTEGER NOT NULL,
	pob VARCHAR(128) NOT NULL
);

CREATE TABLE tbl_post
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	title VARCHAR(128) NOT NULL,
	content TEXT NOT NULL,
	status INTEGER NOT NULL,
	create_time INTEGER,
	update_time INTEGER,
	author_id INTEGER NOT NULL,
	destination INTEGER NOT NULL,
	CONSTRAINT FK_post_author FOREIGN KEY (author_id)
		REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE tbl_connection
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	connector INTEGER NOT NULL,
	connectee INTEGER NOT NULL,
	type INTEGER NOT NULL,
	status INTEGER NOT NULL,
	CONSTRAINT FK_connector FOREIGN KEY (connector)
		REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Pending Approval', 'PostStatus', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Approved', 'PostStatus', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Father', 'Connection', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Mother', 'Connection', 2, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Son', 'Connection', 3, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Daughter', 'Connection', 4, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Brother', 'Connection', 5, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Sister', 'Connection', 6, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Husband', 'Connection', 7, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Spouse', 'Connection', 8, 1);

INSERT INTO tbl_user (username, password, first_name, family_name, dob, pob) VALUES ('demo@demo.com','demo','John','Doe', 19851019, 'Baltimore');
INSERT INTO tbl_post (title, content, status, create_time, update_time, author_id, destination) VALUES ('Welcome!','This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.

Feel free to try this system by writing new posts and leaving comments.',2,1230952187,1230952187,1,1);
INSERT INTO tbl_post (title, content, status, create_time, update_time, author_id, destination) VALUES ('A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2,1230952187,1230952187,1,1);
