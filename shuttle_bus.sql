CREATE DATABASE shuttle_bus;
USE shuttle_bus;

CREATE TABLE SpringfieldBound (
    busNo varchar(10) NOT NULL,
    toowoombaDepart varchar(10) NOT NULL,
    plainlandStop varchar(10) NOT NULL,
    ipswichStop varchar(10) NOT NULL,
	springfieldCentral varchar(10) NOT NULL,
	todaysDay varchar(10) NOT NULL, -- day is an sql value
    PRIMARY KEY (buNo, toowoombaDepart)
);


INSERT INTO SpringfieldBound VALUES 
('B1','0630','','','','Monday'),


CREATE TABLE ToowoombaBound (
    busNo varchar(10) NOT NULL,
    springfieldDepart varchar(10) NOT NULL,
    ipswichStop varchar(10) NOT NULL,
	plainlandStop varchar(10) NOT NULL,
	toowoombaStop varchar(10) NOT NULL,
	day varchar(10) NOT NULL,
    PRIMARY KEY (buNo, springfieldDepartDepart)
);


INSERT INTO ToowoombaBoundBound VALUES 
('B2','0630','','','','Monday'),



CREATE TABLE Passengers (
	unisqId varchar(50) NOT NULL,
	role varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(50) NOT NULL,
	PRIMARY KEY (unisqId, role)
);

-- test data
INSERT INTO Passengers VALUES
('u111111','Staff','u111111@usq.edu.au','test1'),
('u222222','Student','u222222@usq.edu.au','test1'),
('u333333','Staff','u333333@usq.edu.au','test1'),
('u444444','Student','u444444@usq.edu.au','test1'),
('u555555','Staff','u555555@usq.edu.au','test1');



CREATE TABLE BusDriver (
	driverId varchar(50) NOT NULL,
	driverUsername varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(50) NOT NULL,
	PRIMARY KEY (driverId, driverUsername)

);

-- test data
INSERT INTO BusDriver VALUES
('D1','driver1','driver1@usq.edu.au','test1'),
('D2','driver2','driver2@usq.edu.au','test1'),
('D3','driver3','udriver3@usq.edu.au','test1'),
('D4','driver4','udriver44@usq.edu.au','test1'),
('D5','driver5','udriver5@usq.edu.au','test1');



CREATE TABLE BusTrips (
	passengerNumber int NOT NULL AUTO_INCREMENT,
	passengerId varchar(50) NOT NULL, -- foreing key to unisqId -- might not need it.
	passengerType varchar(50) NOT NULL,
	busNumber varchar(50) NOT NULL,
	busDate datetime(50) NOT NULL,
	startLocation varchar(50) NOT NULL,
	stopLocation varchar(50) NOT NULL,
	PRIMARY KEY (passengerNumber)
);



CREATE TABLE PassengerTracking (
	passengerId varchar(50) NOT NULL,
	passengerType varchar(50) NOT NULL,
	stopLocation varchar(50) NOT NULL,
	onTime varchar(50) NULL,
	offTime varchar(50) NULL,
	finished BOOLEAN NULL,
	PRIMARY KEY (driverIdId, driverUsername)
); 


CREATE TABLE PassengerMetrics (
	passengerCount int NOT NULL AUTO_INCREMENT,
	busNumber varchar(10) NOT NULL,
	destination varchar(50) NULL,
	dayTime datetime NOT NULL,
	PRIMARY KEY (passengerCount, busNumber)
)

CREATE TABLE metricsLogin (
	userId varchar(50) NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(50) NOT NULL,
	PRIMARY KEY (userId, username)
)

INSERT INTO metricsLogin VALUES
('1','user1','user1@usq.edu.au','test1'),
('2','user2','user2@usq.edu.au','test1');

-- Create a db user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO db_user@localhost
IDENTIFIED BY 'secure';