SHOW
CREATE
DESC
ALTER TABLE

ADD
MODIFY


------------
login to mysql

mysql -u root -p 

CREATE DATABASE nama_database;
CREATE SCHEMA nama_schema;

// schema = database

SHOW SCHEMAS
SHOW DATABASES

USE book;

CREATE TABLE book(
 isbn CHAR(13) NOT NULL,
 title varchar(255) NOT NULL,
 author VARCHAR(255) NOT NULL,
 stock SMALLINT UNSIGNEED NOT NULL,
 price FLOAT UNSIGNED
) ENGINE=InnoDb;


DESC book;

CREATE TABLE customer(
 id INT UNSIGNED NOT NULL,
 firstname VARCHAR(255) NOT NULL,
 lastname VARCHAR(255) NOT NULL,
 email VARCHAR(255) NOT NULL,
 type ENUM('basic', 'premium')
) ENGINE=InnoDb;


ALTER TABLE book
ADD id INT UNSIGNED NOT NULL AUTO_INCREMENT
PRIMARY KEY FIRST; // position of column at first of table

ALTER TABLE customer
MODIFY id INT UNSIGNED NOT NULL
AUTO_INCREMENT PRIMARY KEY;

CREATE TABLE borrowed_books(
 book_id INT UNSIGNED NOT NULL,
 customer_id INT UNSIGNED NOT NULL,
 start DATETIME NOT NULL,
 end DATETIME DEFAULT NULL,
 FOREIGN KEY (book_id) REFERENCES book(id),
 FOREIGN KEY (customer_id) REFERENCES customer(id)
) ENGINE=InnoDb;

SHOW CREATE TABLE borrowed_books \G

SELECT title, author, price FROM book
WHERE title LIKE "1%" AND stock > 0;

SELECT * FROM customer \G

SELECT 
    CONCAT(c.firstname, ' ', c.lastname) AS name,
    b.title,
    b.author, 
    DATE_FORMAT(bb.start, '%d-%m-%y') AS start,
    DATE_FORMAT(bb.end, '%d-%m-%y') AS end
FROM borrowed_books 
LEFT JOIN customer AS c ON bb.customer_id = c.id 
LEFT JOIN book AS b ON b.id = bb.book_id 
WHERE bb.start >= "2015-01-01";

SELECT 
    author, COUNT(*) AS amount,
    GROUP_CONCAT(title SEPARATOR ', ') AS titles 
 FROM book 
 GROUP BY author 
 ORDER BY amount DESC, author;


ALTER TABLE borrowed_books
    ADD FOREIGN KEY (book_id) REFERENCES book (id)
    ON DELETE CASCADE ON UPDATE CASCADE, /* CASCADE can change to SET NULL RESTRICT */
    ADD FOREIGN KEY (customer_id) REFERENCES customer (id)
    ON DELETE CASCADE ON UPDATE CASCADE;

/*
    CASCADE for BOTH ACTIONS: Updating And  Deleting When the references foreign key is deleted then the same key is deleted too
    SET NULL: the foreign key is set to NULL and Allow the original row to be deleted.
    RESTRICT: Reject the Update/Delete Commands.
*/

