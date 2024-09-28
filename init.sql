CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE authors (
    author_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL
);

CREATE TABLE books (
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    publication_year INT,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES authors(author_id) ON DELETE CASCADE
);

INSERT INTO authors (first_name, last_name)
VALUES 
('Robert', 'Martin'),
('Steve', 'Mcconnell'),
('Martin', 'Kleppmann');

INSERT INTO books (title, publication_year, author_id)
VALUES
('Clean Code', 2012, 1),
('Clean Architecture', 2017, 1),
('Code Complete', 1993, 2),
('Rapid development', 1996, 2),
('Designing Data-Intensive Applications', 2017, 3);

