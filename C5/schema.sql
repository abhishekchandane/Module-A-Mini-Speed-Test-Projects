CREATE DATABASE IF NOT EXISTS competition;
USE competition;

DROP TABLE IF EXISTS C5_loans;
DROP TABLE IF EXISTS C5_books;
DROP TABLE IF EXISTS C5_members;

CREATE TABLE C5_books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    category VARCHAR(100) NOT NULL
);

CREATE TABLE C5_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE C5_loans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    member_id INT NOT NULL,
    returned TINYINT(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (book_id) REFERENCES C5_books(id),
    FOREIGN KEY (member_id) REFERENCES C5_members(id)
);

INSERT INTO C5_books (title, category) VALUES
('PHP Basics', 'Programming'),
('Laravel Guide', 'Programming'),
('MySQL Fundamentals', 'Database'),
('HTML and CSS', 'Web'),
('JavaScript Basics', 'Programming'),
('SQL Queries', 'Database');

INSERT INTO C5_members (name) VALUES
('Alice'),
('Bob'),
('Charlie'),
('David');

INSERT INTO C5_loans (book_id, member_id, returned) VALUES
(1, 1, 1),
(2, 1, 0),
(3, 2, 0),
(4, 2, 1),
(5, 2, 0),
(6, 3, 1);
