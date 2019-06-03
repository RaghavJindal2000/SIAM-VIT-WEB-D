CREATE TABLE IF NOT EXISTS users
(
  id int(100) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL ,
  username char(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  mobilenumber bigint(20) NOT NULL,
  team VARCHAR(50) NOT NULL,
  status varchar(100) NOT NULL,
  profilepic varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) 