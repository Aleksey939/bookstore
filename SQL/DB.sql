create database boockstore default charset utf8;
use boockstore;
CREATE TABLE IF NOT EXISTS category
(
  id int PRIMARY KEY AUTO_INCREMENT,
  categoryName VARCHAR(255) NOT NULL UNIQUE
);
use boockstore;
CREATE TABLE IF NOT EXISTS book
(
  id int PRIMARY KEY AUTO_INCREMENT,
  boockName VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price int,
  rating decimal

);
ALTER TABLE book ADD  categoryId int;
ALTER TABLE book
  ADD CONSTRAINT `fk_book_category`
FOREIGN KEY (`categoryId`)
REFERENCES `category` (`id`)






CREATE TABLE IF NOT EXISTS user
(
  id   int PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  balans   decimal
);

CREATE TABLE IF NOT EXISTS comment
(
  id int PRIMARY KEY AUTO_INCREMENT,
  textComment VARCHAR(255) NOT NULL,
  bookId int NOT NULL,
  userId int NOT NULL,
  FOREIGN KEY (bookId) REFERENCES book(id),
  FOREIGN KEY (userId) REFERENCES user(id)
);