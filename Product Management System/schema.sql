CREATE SCHEMA IF NOT EXISTS catalog;
USE catalog;

DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS category;


CREATE TABLE IF NOT EXISTS category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);


CREATE TABLE IF NOT EXISTS product (
    code INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    FOREIGN KEY (category) REFERENCES category(name)
);

INSERT INTO category (name) VALUES ('cpu'), ('smartphone'), ('monitor');


