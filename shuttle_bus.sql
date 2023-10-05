DROP DATABASE IF EXISTS shuttle_bus;
CREATE DATABASE shuttle_bus;
USE shuttle_bus;



CREATE TABLE busTimeTable (

	busNo varchar(10) NOT NULL,
    startStop varchar(50) NOT NULL,
	finishStop varchar(50) NOT NULL,
	stopOneTime varchar(10) NOT NULL,
    stopTwoTime varchar(10) NOT NULL,
	stopThreeTime varchar(10) NULL,
    stopFourTime varchar(10) NULL,
	stopFiveTime varchar(10) NULL,
	busDay varchar(10) NOT NULL,
    PRIMARY KEY (busNo, stopOneTime, busDay)
);

INSERT INTO busTimeTable VALUES 
-- Monday
('B1', 'Toowoomba' , 'Springfield' ,'06:30','07:15','08:00', NULL,'08:30','Monday'),
('B2', 'Toowoomba' , 'Springfield' ,'10:00','10:45','11:30', NULL,'12:00','Monday'),
('B1', 'Toowoomba' , 'Springfield' ,'13:15','14:00','14:45', NULL,'15:15','Monday'),
('B2', 'Toowoomba' , 'Springfield' ,'16:15','17:00','17:45','18:15','18:25','Monday'),
('B2', 'Springfield' , 'Toowoomba' ,'06:45','07:15','07:45','08:45', NULL,'Monday'),
('B1', 'Springfield' , 'Toowoomba' ,'10:00','10:30','11:00','12:00', NULL,'Monday'),
('B2', 'Springfield' , 'Toowoomba' ,'13:15','13:45','14:15','15:15', NULL,'Monday'),
('B1', 'Springfield' , 'Toowoomba' ,'16:15','16:45','17:15','18:15', NULL,'Monday'),
-- Tuesday
('B1', 'Toowoomba' , 'Springfield' ,'06:30','07:15','08:00', NULL,'08:30','Tuesday'),
('B2', 'Toowoomba' , 'Springfield' ,'10:00','10:45','11:30', NULL,'12:00','Tuesday'),
('B1', 'Toowoomba' , 'Springfield' ,'13:15','14:00','14:45', NULL,'15:15','Tuesday'),
('B2', 'Toowoomba' , 'Springfield' ,'16:15','17:00','17:45','18:15','18:25','Tuesday'),
('B2', 'Springfield' , 'Toowoomba' ,'06:45','07:15','07:45','08:45', NULL,'Tuesday'),
('B1', 'Springfield' , 'Toowoomba' ,'10:00','10:30','11:00','12:00', NULL,'Tuesday'),
('B2', 'Springfield' , 'Toowoomba' ,'13:15','13:45','14:15','15:15', NULL,'Tuesday'),
('B1', 'Springfield' , 'Toowoomba' ,'16:15','16:45','17:15','18:15', NULL,'Tuesday'),
-- Wednesday
('B1', 'Toowoomba' , 'Springfield' ,'06:30','07:15','08:00', NULL,'08:30','Wednesday'),
('B2', 'Toowoomba' , 'Springfield' ,'10:00','10:45','11:30', NULL,'12:00','Wednesday'),
('B1', 'Toowoomba' , 'Springfield' ,'13:15','14:00','14:45', NULL,'15:15','Wednesday'),
('B2', 'Toowoomba' , 'Springfield' ,'16:15','17:00','17:45','18:15','18:25','Wednesday'),
('B2', 'Springfield' , 'Toowoomba' ,'06:45','07:15','07:45','08:45', NULL,'Wednesday'),
('B1', 'Springfield' , 'Toowoomba' ,'10:00','10:30','11:00','12:00', NULL,'Wednesday'),
('B2', 'Springfield' , 'Toowoomba' ,'13:15','13:45','14:15','15:15', NULL,'Wednesday'),
('B1', 'Springfield' , 'Toowoomba' ,'16:15','16:45','17:15','18:15', NULL,'Wednesday'),
-- Thursday
('B1', 'Toowoomba' , 'Springfield' ,'06:30','07:15','08:00', NULL,'08:30','Thursday'),
('B2', 'Toowoomba' , 'Springfield' ,'10:00','10:45','11:30', NULL,'12:00','Thursday'),
('B1', 'Toowoomba' , 'Springfield' ,'13:15','14:00','14:45', NULL,'15:15','Thursday'),
('B2', 'Toowoomba' , 'Springfield' ,'16:15','17:00','17:45','18:15','18:25','Thursday'),
('B2', 'Springfield' , 'Toowoomba' ,'06:45','07:15','07:45','08:45', NULL,'Thursday'),
('B1', 'Springfield' , 'Toowoomba' ,'10:00','10:30','11:00','12:00', NULL,'Thursday'),
('B2', 'Springfield' , 'Toowoomba' ,'13:15','13:45','14:15','15:15', NULL,'Thursday'),
('B1', 'Springfield' , 'Toowoomba' ,'16:15','16:45','17:15','18:15', NULL,'Thursday'),
-- Friday
('B1', 'Toowoomba' , 'Springfield' ,'06:30','07:15','08:00', NULL,'08:30','Friday'),
('B2', 'Toowoomba' , 'Springfield' ,'10:00','10:45','11:30', NULL,'12:00','Friday'),
('B1', 'Toowoomba' , 'Springfield' ,'13:15','14:00','14:45', NULL,'15:15','Friday'),
('B2', 'Toowoomba' , 'Springfield' ,'16:15','17:00','17:45','18:15','18:25','Friday'),
('B2', 'Springfield' , 'Toowoomba' ,'06:45','07:15','07:45','08:45', NULL,'Friday'),
('B1', 'Springfield' , 'Toowoomba' ,'10:00','10:30','11:00','12:00', NULL,'Friday'),
('B2', 'Springfield' , 'Toowoomba' ,'13:15','13:45','14:15','15:15', NULL,'Friday'),
('B1', 'Springfield' , 'Toowoomba' ,'16:15','16:45','17:15','18:15', NULL,'Friday');

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
(1, 'Monday', 'B1', '2023-09-10', '10:00', 'Springfield', 'Toowoomba'),
(2, 'Tuesday', 'B2', '2023-09-10', '0630', 'Springfield', 'Toowoomba'),
(3, 'Tuesday', 'B1', '2023-09-10', '10:00', 'Springfield', 'Toowoomba');




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