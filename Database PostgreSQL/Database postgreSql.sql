CREATE TABLE users (
username varchar(40) NOT NULL,
password TEXT NOT NULL,
salt bytea NOT NULL,
name varchar(40) NOT NULL,
surname varchar(40) NOT NULL,
email varchar(40) NOT NULL,
PRIMARY KEY (username)
);
CREATE TABLE administrator (
username varchar(40) NOT NULL,
password TEXT NOT NULL,
salt bytea NOT NULL,
name varchar(40) NOT NULL,
surname varchar(40) NOT NULL,
email varchar(40) NOT NULL,
PRIMARY KEY (username)
);
CREATE TABLE assistant (
username varchar(40) NOT NULL,
password TEXT NOT NULL,
salt bytea NOT NULL,
name varchar(40) NOT NULL,
surname varchar(40) NOT NULL,
email varchar(40) NOT NULL,
PRIMARY KEY (username)
);
CREATE TABLE subscriptions(
username varchar(40) NOT NULL,
cardnumber TEXT NOT NULL,
cvcode TEXT NOT NULL,
salt bytea NOT NULL,
date varchar(8) NOT NULL,
PRIMARY KEY (username)
);

CREATE TABLE listing(
ADType varchar(10) NOT NULL,
title varchar(40) NOT NULL,
images text NOT NULL,
region varchar(20) NOT NULL,
price varchar(20) NOT NULL,
adress varchar(20) NOT NULL,
rent_type varchar(20) NOT NULL,
telephone varchar(20) NOT NULL,
emvadon varchar(20) NOT NULL,
floor varchar(20) NOT NULL,
description text NOT NULL,
pending varchar(20) NOT NULL,
username varchar(20) NOT NULL,
FOREIGN KEY(username) REFERENCES users,
PRIMARY KEY (title)
);

CREATE TABLE HouseAgents(
name varchar(50) NOT NULL,
adress varchar(100) NOT NULL,
telephone varchar(50) NOT NULL,
images text NOT NULL,
username varchar(20) NOT NULL,
FOREIGN KEY(username) REFERENCES administrator,
PRIMARY KEY (name,adress)
);