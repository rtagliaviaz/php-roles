CREATE DATABASE IF NOT EXISTS `phproles`;

CREATE TABLE roles(
id INT AUTO_INCREMENT,
   role_name VARCHAR(255),
   PRIMARY KEY(id)
);

INSERT INTO roles (role_name) values ('Admin'), ('User');

CREATE TABLE users(
  id INT AUTO_INCREMENT,
  role_id INT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY (role_id) REFERENCES roles(id)
);

INSERT INTO users (role_id, username, password) values (1, 'admin', 'admin');
INSERT INTO users (role_id, username, password) values (2, 'test', 'test');