DROP DATABASE IF EXISTS shuttle_bus;
CREATE DATABASE shuttle_bus;
USE shuttle_bus;

CREATE TABLE SpringfieldBound (
    busNo varchar(10) NOT NULL,
    toowoombaDepart varchar(10) NOT NULL,
    plainlandStop varchar(10) NOT NULL,
    ipswichStop varchar(10) NOT NULL,
	springfieldCentral varchar(10) NOT NULL,
	todaysDay varchar(10) NOT NULL, -- day is an sql value
    PRIMARY KEY (busNo, toowoombaDepart)
);


INSERT INTO SpringfieldBound VALUES 
('B1','0630','','','','Monday');


CREATE TABLE ToowoombaBound (
    busNo varchar(10) NOT NULL,
    springfieldDepart varchar(10) NOT NULL,
    ipswichStop varchar(10) NOT NULL,
	plainlandStop varchar(10) NOT NULL,
	toowoombaStop varchar(10) NOT NULL,
	day varchar(10) NOT NULL,
    PRIMARY KEY (busNo, springfieldDepart)
);


INSERT INTO ToowoombaBound VALUES 
('B2','0630','','','','Monday');



CREATE TABLE Passengers (
	unisqId varchar(50) NOT NULL,
	role varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(300) NOT NULL,
	PRIMARY KEY (unisqId, role)
);

-- test data
INSERT INTO Passengers VALUES
('u111111','Staff','u111111@usq.edu.au','$2y$10$XGBzgxAE8Wsp3Lg2mEoxdOeUQYRsxhLW8jb5A/Fqc3kFQx9rgY6MW'),
('u222222','Student','u222222@usq.edu.au','$2y$10$XGBzgxAE8Wsp3Lg2mEoxdOeUQYRsxhLW8jb5A/Fqc3kFQx9rgY6MW'),
('u333333','Staff','u333333@usq.edu.au','$2y$10$XGBzgxAE8Wsp3Lg2mEoxdOeUQYRsxhLW8jb5A/Fqc3kFQx9rgY6MW'),
('u444444','Student','u444444@usq.edu.au','$2y$10$XGBzgxAE8Wsp3Lg2mEoxdOeUQYRsxhLW8jb5A/Fqc3kFQx9rgY6MW'),
('u555555','Staff','u555555@usq.edu.au','$2y$10$XGBzgxAE8Wsp3Lg2mEoxdOeUQYRsxhLW8jb5A/Fqc3kFQx9rgY6MW');



CREATE TABLE BusDriver (
	driverId varchar(50) NOT NULL,
	driverUsername varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(300) NOT NULL,
	PRIMARY KEY (driverId, driverUsername)

);

-- test data
INSERT INTO BusDriver VALUES
('D1','driver1','driver1@usq.edu.au','$2y$10$eWvyaQvCp2CgY2ug.P87mef0KlPXX.0KSsdSeVWMD1D5ravDO5Ici'),
('D2','driver2','driver2@usq.edu.au','$2y$10$eWvyaQvCp2CgY2ug.P87mef0KlPXX.0KSsdSeVWMD1D5ravDO5Ici'),
('D3','driver3','udriver3@usq.edu.au','$2y$10$eWvyaQvCp2CgY2ug.P87mef0KlPXX.0KSsdSeVWMD1D5ravDO5Ici'),
('D4','driver4','udriver44@usq.edu.au','$2y$10$eWvyaQvCp2CgY2ug.P87mef0KlPXX.0KSsdSeVWMD1D5ravDO5Ici'),
('D5','driver5','udriver5@usq.edu.au','$2y$10$eWvyaQvCp2CgY2ug.P87mef0KlPXX.0KSsdSeVWMD1D5ravDO5Ici');



CREATE TABLE BusTrips (
	passengerNumber int NOT NULL AUTO_INCREMENT,
	passengerId varchar(50) NOT NULL, -- foreing key to unisqId -- might not need it.
	passengerType varchar(50) NOT NULL,
	busNumber varchar(50) NOT NULL,
	busDate datetime(6) NOT NULL,
	startLocation varchar(50) NOT NULL,
	stopLocation varchar(50) NOT NULL,
	PRIMARY KEY (passengerNumber)
);

INSERT INTO BusTrips VALUES -- fake data
(1, 'u11111', 'Student', 'B1', '01/01/2020', 'Toowoomba', 'Springfield'),
(2, 'u22222', 'Staff', 'B2', '02/02/2020', 'Toowoomba', 'Springfield'),
(3, 'u33333', 'Student', 'B1', '03/03/2020', 'Toowoomba', 'Springfield');


CREATE TABLE PassengerTracking (
	passengerId varchar(50) NOT NULL,
	passengerType varchar(50) NOT NULL,
	bookingDate datetime(6) NOT NULL,
	stopLocation varchar(50) NOT NULL,
	onTime varchar(50) NULL,
	offTime varchar(50) NULL,
	finished BOOLEAN NULL,
	PRIMARY KEY (passengerId, bookingDate, stopLocation, offTime)
); 


CREATE TABLE PassengerMetrics (
    passengerCount INT NOT NULL AUTO_INCREMENT,
    busNumber VARCHAR(10) NOT NULL,
    destination VARCHAR(50) NULL,
    dayTime DATETIME NOT NULL,
    PRIMARY KEY (passengerCount, busNumber)
);

CREATE TABLE MetricsLogin (
    userId INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(300) NOT NULL,
    PRIMARY KEY (userId)
);

INSERT INTO MetricsLogin VALUES
(1,'user1','user1@usq.edu.au','$2y$10$PeXl22RDAKCpVWAU6f0.l.vbfhkpSqVB21Gx3mQ5pTl27i2T1Q06q'),
(2,'user2','user2@usq.edu.au','$2y$10$PeXl22RDAKCpVWAU6f0.l.vbfhkpSqVB21Gx3mQ5pTl27i2T1Q06q');

-- Create a db user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO db_user@localhost
IDENTIFIED BY 'secure';