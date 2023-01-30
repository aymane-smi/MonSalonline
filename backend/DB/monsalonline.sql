DROP DATABASE IF EXISTS monsalonline;

CREATE DATABASE monsalonline;

USE monsalonline;

CREATE TABLE client(
    id INT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL
);

CREATE TABLE appointment(
    id INT PRIMARY KEY,
    date DATE NOT NULL,
    hour VARCHAR(5) NOT NULL,
    id_client INT NOT NULL,
    CONSTRAINT FK_CLIENT FOREIGN KEY (id_client) REFERENCES client(id) ON DELETE CASCADE
);