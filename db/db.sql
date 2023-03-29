CREATE DATABASE db_kval_darbs;
USE db_kval_darbs;
CREATE TABLE Users (
   Users_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   Users_firstname VARCHAR(50) NOT NULL,
   Users_lastname VARCHAR(50) NOT NULL,
   Users_uid VARCHAR(320) NOT NULL,
   Users_pwd CHAR(60) NOT NULL,
   Users_phone INT(8) NOT NULL,
   type INT(11) NULL Default '0'
);
CREATE TABLE Admin (
    Admin_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Admin_firstname VARCHAR(50)  NOT NULL,
    Admin_lastname VARCHAR(50) NOT NULL,
    Admin_uid VARCHAR(320) NOT NULL,
    Admin_pwd CHAR(60) NOT NULL,
    type INT(11) NULL Default '1'
);
CREATE TABLE Employee (
    Employee_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Employee_firstname VARCHAR(50) NOT NULL,
    Employee_lastname VARCHAR(50) NOT NULL,
    Employee_uid VARCHAR(320) NOT NULL,
    Employee_pwd CHAR(60) NOT NULL,
    Employee_phone INT(8) NOT NULL,
    Employee_birthdate DATE NOT NULL,
    type INT(11) NULL Default '2'
);
CREATE TABLE Listing (
    Listing_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Animal_owner INT NOT NULL,
    Animal_name VARCHAR(50) NOT NULL,
    Animal_breed VARCHAR(50) NOT NULL,
    Animal_description VARCHAR(600) NOT NULL,
    Requirements VARCHAR(600) NOT NULL,
    FOREIGN KEY (Animal_owner) REFERENCES Users (Users_id)
);
CREATE TABLE Job (
    Listing_id INT NOT NULL,
    Employee_id INT NOT NULL,
    FOREIGN KEY (Listing_id) REFERENCES Listing (Listing_id),
    FOREIGN KEY (Employee_id) REFERENCES Employee (Employee_id)
);