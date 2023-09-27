DROP DATABASE IF EXISTS shuttle_bus;
CREATE DATABASE shuttle_bus;
USE shuttle_bus;



CREATE TABLE busTimeTable (

	busNo varchar(10) NOT NULL,
    startStop varchar(50) NOT NULL,
	finishStop varchar(50) NOT NULL,
	stopOneTime varchar(10) NOT NULL,
    stopTwoTime varchar(10) NOT NULL,
	stopThreeTime varchar(10) NOT NULL,
	stopFourTime varchar(10) NOT NULL,
	busDay varchar(10) NOT NULL,
    PRIMARY KEY (busNo, stopOneTime, busDay)
);

-- still need to add springfield 
INSERT INTO busTimeTable VALUES 
('B2', 'SpringField' , 'Toowoomba' ,'0630','0715','0745','0845','Monday'),
('B1', 'SpringField' , 'Toowoomba' ,'1000','1030','1100','1200','Monday'),
('B2', 'SpringField' , 'Toowoomba' ,'1315','1345','1415','1515','Monday'),
('B1', 'SpringField' , 'Toowoomba' ,'1615','1645','1715','1815','Monday'),
('B2', 'SpringField' , 'Toowoomba' ,'0630','0715','0745','0845','Tuesday'),
('B1', 'SpringField' , 'Toowoomba' ,'1000','1030','1100','1200','Tuesday'),
('B2', 'SpringField' , 'Toowoomba' ,'1315','1345','1415','1515','Tuesday'),
('B1', 'SpringField' , 'Toowoomba' ,'1615','1645','1715','1815','Tuesday'),
('B2', 'SpringField' , 'Toowoomba' ,'0630','0715','0745','0845','Wednesday'),
('B1', 'SpringField' , 'Toowoomba' ,'1000','1030','1100','1200','Wednesday'),
('B2', 'SpringField' , 'Toowoomba' ,'1315','1345','1415','1515','Wednesday'),
('B1', 'SpringField' , 'Toowoomba' ,'1615','1645','1715','1815','Wednesday'),
('B2', 'SpringField' , 'Toowoomba' ,'0630','0715','0745','0845','Thursday'),
('B1', 'SpringField' , 'Toowoomba' ,'1000','1030','1100','1200','Thursday'),
('B2', 'SpringField' , 'Toowoomba' ,'1315','1345','1415','1515','Thursday'),
('B1', 'SpringField' , 'Toowoomba' ,'1615','1645','1715','1815','Thursday'),
('B2', 'SpringField' , 'Toowoomba' ,'0630','0715','0745','0845','Friday'),
('B1', 'SpringField' , 'Toowoomba' ,'1000','1030','1100','1200','Friday'),
('B2', 'SpringField' , 'Toowoomba' ,'1315','1345','1415','1515','Friday'),
('B1', 'SpringField' , 'Toowoomba' ,'1615','1645','1715','1815','Friday');



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
    tripId INT NOT NULL AUTO_INCREMENT,
    unisqId VARCHAR(50) NOT NULL, 
    role VARCHAR(50) NOT NULL,
    scheduleId INT NOT NULL, -- Foreign Key to BusSchedules table
    offTime TIME(6) NULL,
    finished BOOLEAN NULL,
    PRIMARY KEY (tripId),
    FOREIGN KEY (unisqId, role) REFERENCES Passengers(unisqId, role)
    
);

INSERT INTO BusTrips VALUES -- fake data
(1, 'u111111','Staff', 1, NULL, NULL ),
(2, 'u222222','Student', 2, NULL, NULL ),
(3, 'u333333','Staff', 3, NULL, NULL ),
(4, 'u444444','Student', 1, NULL, NULL ),
(5, 'u111111', 'Staff', 1, '10:30:00', 1), -- Finished trip with an offTime
(6, 'u222222', 'Student', 2, NULL, 0),     -- Ongoing trip with no offTime
(7, 'u333333', 'Staff', 3, '14:45:00', 1), -- Finished trip with an offTime
(8, 'u444444', 'Student', 1, '12:15:00', 1),-- Finished trip with an offTime
(9, 'u111111', 'Staff', 2, NULL, 0),        -- Ongoing trip with no offTime
(10, 'u333333', 'Staff', 1, '11:30:00', 1); -- Finished trip with an offTime


CREATE TABLE BusSchedules (
    scheduleId INT NOT NULL AUTO_INCREMENT,
    tripDay VARCHAR(50) NOT NULL, 
    busNumber VARCHAR(50) NOT NULL, 
    busDate DATE NOT NULL,
    busTime TIME(6) NOT NULL, 
    startLocation VARCHAR(50) NOT NULL, 
    stopLocation VARCHAR(50) NOT NULL, 
    PRIMARY KEY (scheduleId)
);

INSERT INTO BusSchedules VALUES -- fake data
(1, 'Monday', 'B1', '2023-09-10', '1000', 'Springfield', 'Toowoomba'),
(2, 'Tuesday', 'B2', '2023-09-10', '0630', 'Springfield', 'Toowoomba'),
(3, 'Tuesday', 'B1', '2023-09-10', '1000', 'Springfield', 'Toowoomba');




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