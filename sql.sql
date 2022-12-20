CREATE DATABASE WIMS;

GRANT ALL ON WIMS.*TO ‘Yang’@’localhost’ IDENTIFIED BY ‘ying’;
GRANT ALL ON WIMS.*TO ‘Yang’@’127.0.0.1’’ IDENTIFIED BY ‘ying’;

CREATE TABLE DEPARTMENT (
    depart_id INT NOT NULL PRIMARY KEY,
    depart_name varchar(255));

CREATE TABLE EMPLOYEE (
    employee_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(100) NOT NULL UNIQUE,
    name varchar(255),
    password varchar(255) NOT NULL,
    role varchar(100) NOT NULL DEFAULT ‘worker’,
    depart_id INT,
    FOREIGN KEY(depart_id) REFERENCES department(depart_id));

CREATE TABLE INVENTORY (
    inventory_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    quantity int,
    unitprice double,
    description varchar(255));

INSERT INTO DEPARTMENT (depart_id, depart_name) VALUES (100, "Department of Logistic");
INSERT INTO DEPARTMENT (depart_id, depart_name) VALUES (101, "Department of Sales");

INSERT INTO EMPLOYEE (username, name, password, role, depart_id) VALUES ("Admin", "Chan Mei Mei", "$2a$04$ZdYaQe7ARb86K/xKfoCPHu0TtGK/jvkJ7/7BYZL1UrMC6556aKSue", "Admin", 100);
--password = ILoveSSE3150

INSERT INTO EMPLOYEE (username, name, password, role, depart_id) VALUES ("Worker1", "Lee Yang Yang", "$2a$10$YXro3BpL7zF0bne.uQEAbe7QrqiSGgMAYVBFmTi1BvVV.ueR1FvRa", "Worker", 100);
--password = KTW3150

INSERT INTO inventory (name, quantity, unitprice, description)
VALUES ("CTC Double Water Filter", 100, 25.25, "INDAH CTC Double Water Filter Housing with Ceramic & Carbon Water Filtration System");
