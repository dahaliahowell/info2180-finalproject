/*  CREATION OF DATABASE*/
DROP DATABASE IF EXISTS BugMeTracker;
CREATE DATABASE BugMeTracker;
USE BugMeTracker;

GRANT ALL PRIVILEGES ON BugMeTracker.* TO 'admin'@'localhost' IDENTIFIED BY 'My_Password123';

/*  CREATION OF Users Table*/
DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
    id INT AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(100) NOT NULL ,
    lastname VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    date_joined DATETIME NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES ('Tom', 'Brady', MD5('12345'), 'tombrady@bugme.com', '2019-09-11 13:23:42');
INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES ('Marsha', 'Brady', MD5('12345'), 'marciabrady@bugme.com', '2019-12-21 09:44:02');
INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES ('BugMe', 'Admin', MD5('password123'), 'admin@bugme.com', '2010-01-01 00:00:00');
INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES ('Jan', 'Brady', MD5('12345'), 'janbrady@bugme.com', '2010-01-01 00:00:00');
INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES ('Mike', 'Brady', MD5('12345'), 'mikebrady@bugme.com', '2010-01-01 00:00:00');

/*  CREATION OF Issues Table*/
DROP TABLE IF EXISTS Issues;
CREATE TABLE Issues(
    id INT AUTO_INCREMENT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    type ENUM('Bug', 'Task', 'Proposal') NOT NULL,
    priority ENUM('Minor', 'Major', 'Critical') NOT NULL,
    status ENUM('Open', 'In Progress', 'Closed') NOT NULL,
    assigned_to INT NOT NULL,
    created_by INT NOT NULL,
    created DATETIME NOT NULL,
    updated DATETIME DEFAULT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (assigned_to) REFERENCES Users(id),
    FOREIGN KEY (created_by) REFERENCES Users(id)
);

INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('XSS Vulnerability in Add User Form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Major', 'Open', 1, 2, '2019-11-01 16:30:12', '2019-11-08 10:00:00');
INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Location Service isnt working', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Bug', 'Major', 'Open', 4, 2, '2019-10-15 16:30:12', '2019-12-08 10:00:00');
INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Setup Logger', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Major', 'Closed', 2, 2, '2019-08-10 18:32:12', '2019-10-18 01:00:00');
INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Create API Documentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Minor', 'In Progress', 5, 1, '2019-10-29 17:33:12', '2019-11-29 12:34:18');





