DROP DATABASE FlightBookingSystem;
CREATE DATABASE FlightBookingSystem;
USE flightbookingsystem;

CREATE TABLE Passengers(
	passportNumber INTEGER,
	firstName CHAR(25),
	lastName CHAR(25),
	email CHAR(35),
	age INT,
	PRIMARY KEY (passportNumber)
);

CREATE TABLE Airline (
	airlineName CHAR(20),
	PRIMARY KEY (airlineName)
);

CREATE TABLE Airplane(
	airplaneId CHAR(6),
	airplaneModel CHAR(20),
    airlineName CHAR (20),
	PRIMARY KEY (airplaneId),
    FOREIGN KEY (airlineName) REFERENCES Airline(airlineName) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE FlightCrew (
	crewId INTEGER,
	PRIMARY KEY (crewId)
);

CREATE TABLE Flight(
	flightId CHAR(6),
	dateOfFlight DATE,
    origin CHAR(15),
	destination CHAR(15),
	departureTime DATETIME,
	arrivalTime DATETIME,
    airplaneId CHAR(6),
    crewId INTEGER,
    airlineName CHAR(20),
	PRIMARY KEY (flightId, dateOfFlight, departureTime),
    FOREIGN KEY (airplaneId) REFERENCES Airplane(airplaneId) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (airlineName) REFERENCES Airline(airlineName) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (crewId) REFERENCES FlightCrew(crewId) ON DELETE SET NULL ON UPDATE CASCADE
); #assume departure and arrival time are in the same time zone as origin

CREATE TABLE FlightTicket(
	passportNumber INTEGER,
	ticketId CHAR(6),
	seatType CHAR(30),
	seatNumber CHAR(3),
	PRIMARY KEY (ticketId, seatType, seatNumber),
    FOREIGN KEY (passportNumber) REFERENCES Passengers(passportNumber) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ticketId) REFERENCES Flight(flightId) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Passengers VALUES (413816856, 'Rodolfo M.', 'Neblett', 'RNeblett19@gmail.com', '35');
INSERT INTO Passengers VALUES (165912112, 'Kevin Z.', 'Hernandez', 'KHernandez@gmail.com', '69');
INSERT INTO Passengers VALUES (323033958, 'Colleen D.', 'Muniz', 'CMuniz55@gmail.com', '61');
INSERT INTO Passengers VALUES (570383268, 'Callie J.', 'Reeder', 'CReeder@gmail.com', '39');
INSERT INTO Passengers VALUES (348502853, 'Sean S.', 'Lefler', 'SLefler14@gmail.com', '23');
INSERT INTO Passengers VALUES (585558727, 'Daniel D.', 'Hardison', 'DHardison21@gmail.com', '19');
INSERT INTO Passengers VALUES (917962210, 'Mary A.', 'Vera', 'MVera67@hotmail.com', '87');
INSERT INTO Passengers VALUES (226799985, 'Ralph K.', 'Edmond', 'REdmond52@hotmail.com', '51');
INSERT INTO Passengers VALUES (229477478, 'Irene S.', 'Grosebeck', 'IGrossbeck61@hotmail.com', '63');
INSERT INTO Passengers VALUES (975176880, 'Josefina J.', 'Buchanan', 'JBunchanan98@hotmail.com', '48');
INSERT INTO Passengers VALUES (705872764, 'Linda T.', 'Martinez', 'LMartinez09@hotmail.com', '52');
INSERT INTO Passengers VALUES (768437119, 'Gilbert A.', 'Overstreet', 'GOverstreet11@yahoo.ca', '46');
INSERT INTO Passengers VALUES (657075248, 'Judy B.', 'Otto', 'JOtto69@yahoo.ca', '16');
INSERT INTO Passengers VALUES (929417213, 'Adria E.', 'Chesson', 'AChesson18@yahoo.ca', '34');
INSERT INTO Passengers VALUES (501872285, 'Robert J.', 'Taylor', 'RTaylor82@yahoo.ca', '27');
INSERT INTO Passengers VALUES (347338810, 'Hunter L.', 'Richards', 'HRichards71@outlook.com', '20');
INSERT INTO Passengers VALUES (183465870, 'Carrie L.', 'Jefferies', 'CJefffries83@outlook.com', '54');
INSERT INTO Passengers VALUES (455423760, 'Jacqueline W.', 'Johnson', 'JJohnson24@outlook.com', '42');
INSERT INTO Passengers VALUES (336524494, 'James B.', 'Rodriguez', 'JRodriguez97@outlook.com', '47');
INSERT INTO Passengers VALUES (411858833, 'Maria J.', 'Wheeler', 'MWheeler63@icloud.com', '59');
INSERT INTO Passengers VALUES (384175811, 'Sarah R.', 'Horton', 'SHorton51@icloud.com', '78');
INSERT INTO Passengers VALUES (523864301, 'John N.', 'Gerke', 'JGerke58@icloud.com', '55');
INSERT INTO Passengers VALUES (611058959, 'Johnnie R.', 'Blanco', 'JBlanco98@icloud.com', '31'); 
INSERT INTO Passengers VALUES (361054356, 'Katie E.', 'Holt', 'KHolt14@gmail.com', '25');
INSERT INTO Passengers VALUES (431415524, 'Jennifer A.', 'Cotter', 'JAcotter1@gmail.com', '23');

INSERT INTO Airline VALUES ('EastJet'); 			#EJ
INSERT INTO Airline VALUES ('AirlessCanada'); 		#AC
INSERT INTO Airline VALUES ('Sigma Airlines'); 		#SA
INSERT INTO Airline VALUES ('Wolfskin Airlines'); 	#WA

INSERT INTO Airplane VALUES ('N973JM', 'Boeing 777', 'EastJet');
INSERT INTO Airplane VALUES ('J372LK', 'Boeing 787', 'EastJet');
INSERT INTO Airplane VALUES ('K372JP', 'Boeing 787', 'EastJet');
INSERT INTO Airplane VALUES ('J23HG2', 'Bombardier Q400', 'EastJet');
INSERT INTO Airplane VALUES ('Q32HT8', 'Boeing 777', 'AirlessCanada');
INSERT INTO Airplane VALUES ('F354JY', 'Boeing 777', 'AirlessCanada');
INSERT INTO Airplane VALUES ('BD121A', 'Boeing 777', 'AirlessCanada');
INSERT INTO Airplane VALUES ('UHY654', 'Bombardier Q400', 'AirlessCanada');
INSERT INTO Airplane VALUES ('A198UU', 'Boeing 777', 'Sigma Airlines');
INSERT INTO Airplane VALUES ('P0238Y', 'Boeing 777', 'Sigma Airlines');
INSERT INTO Airplane VALUES ('X32H1L', 'Bombardier Q400', 'Wolfskin Airlines');

INSERT INTO FlightCrew VALUES (1);
INSERT INTO FlightCrew VALUES (2);
INSERT INTO FlightCrew VALUES (3);
INSERT INTO FlightCrew VALUES (4);
INSERT INTO FlightCrew VALUES (5);
INSERT INTO FlightCrew VALUES (6);
INSERT INTO FlightCrew VALUES (7);
INSERT INTO FlightCrew VALUES (8);
INSERT INTO FlightCrew VALUES (9);
INSERT INTO FlightCrew VALUES (10);

INSERT INTO Flight VALUES ('EJ2122', '2020-10-22', 'Vancouver', 'Toronto', '2020-10-22 14:30:00', '2020-10-22 18:40:00', 'J372LK', 1, 'EastJet');
INSERT INTO Flight VALUES ('EJ2134', '2020-10-22', 'Vancouver', 'Toronto', '2020-10-22 09:00:00', '2020-10-22 13:10:00','K372JP', 2, 'EastJet');
INSERT INTO Flight VALUES ('EJ2034', '2020-10-23', 'Calgary', 'Toronto', '2020-10-23 08:15:00', '2020-10-23 11:55:00', 'N973JM', 3, 'EastJet');
INSERT INTO Flight VALUES ('AC1313', '2020-10-22', 'Winnipeg', 'Calgary', '2020-10-22 22:45:00', '2020-10-23 01:00:00', 'Q32HT8', 4, 'AirlessCanada');
INSERT INTO Flight VALUES ('AC1314', '2020-10-23', 'Calgary', 'Winnipeg', '2020-10-23 9:05:00', '2020-10-23 11:00:00', 'Q32HT8', 4, 'AirlessCanada');
INSERT INTO Flight VALUES ('AC1567', '2020-10-22', 'Toronto', 'Ottawa', '2020-10-22 12:00:00', '2020-10-22 13:00:00', 'F354JY', 5, 'AirlessCanada');
INSERT INTO Flight VALUES ('SA3487', '2020-10-23', 'Winnipeg', 'Thunder Bay', '2020-10-23 14:30:00', '2020-10-23 15:55:00', 'A198UU', 6, 'Sigma Airlines');
INSERT INTO Flight VALUES ('SA3488', '2020-10-23', 'Thunder Bay', 'Winnipeg', '2020-10-23 17:00:00', '2020-10-23 18:30:00', 'A198UU', 6, 'Sigma Airlines');
INSERT INTO Flight VALUES ('WA4582', '2020-10-23', 'Thunder Bay', 'Sioux Lookout', '2020-10-23 11:30:00', '2020-10-23 12:25:00', 'X32H1L', 7, 'Wolfskin Airlines');
INSERT INTO Flight VALUES ('EJ2425', '2020-10-22', 'Ottawa', 'Toronto', '2020-10-22 15:15:00', '2020-10-22 16:30:00', 'J23HG2', 8, 'EastJet');
INSERT INTO Flight VALUES ('EJ2518', '2020-10-23', 'Toronto', 'Thunder Bay', '2020-10-23 09:20:00', '2020-10-23 11:15:00', 'J23HG2', 8, 'EastJet');
INSERT INTO Flight VALUES ('AC1874', '2020-10-22', 'Winnipeg', 'Toronto', '2020-10-22 09:42:00', '2020-10-22 12:02:00', 'BD121A', 9, 'AirlessCanada');
INSERT INTO Flight VALUES ('AC1201', '2020-10-23', 'Calgary', 'Vancouver', '2020-10-23 06:50:00', '2020-10-23 08:20:00', 'UHY654', 10, 'AirlessCanada');

INSERT INTO FlightTicket VALUES (413816856, 'EJ2122', 'First', 'A05');
INSERT INTO FlightTicket VALUES (165912112, 'EJ2134', 'Economy', 'C04');
INSERT INTO FlightTicket VALUES (323033958, 'SA3487', 'Economy', 'F03');
INSERT INTO FlightTicket VALUES (570383268, 'EJ2122', 'First', 'B01');
INSERT INTO FlightTicket VALUES (348502853, 'EJ2034', 'Business', 'B02');
INSERT INTO FlightTicket VALUES (585558727, 'EJ2034', 'First', 'B02');
INSERT INTO FlightTicket VALUES (917962210, 'EJ2122', 'Economy', 'D03');
INSERT INTO FlightTicket VALUES (226799985, 'SA3488', 'Economy', 'E05');
INSERT INTO FlightTicket VALUES (229477478, 'SA3488', 'Economy', 'F02');
INSERT INTO FlightTicket VALUES (975176880, 'AC1313', 'Business', 'J01');
INSERT INTO FlightTicket VALUES (705872764, 'AC1313', 'Economy', 'D04');
INSERT INTO FlightTicket VALUES (768437119, 'AC1567', 'First', 'J04');
INSERT INTO FlightTicket VALUES (657075248, 'AC1567', 'First', 'J06');
INSERT INTO FlightTicket VALUES (929417213, 'AC1201', 'Economy', 'B03');
INSERT INTO FlightTicket VALUES (501872285, 'EJ2122', 'Economy', 'D02');
INSERT INTO FlightTicket VALUES (347338810, 'EJ2134', 'Business', 'C04');
INSERT INTO FlightTicket VALUES (183465870, 'EJ2134', 'First', 'E06');
INSERT INTO FlightTicket VALUES (455423760, 'EJ2425', 'Economy', 'I06');
INSERT INTO FlightTicket VALUES (336524494, 'AC1313', 'Economy', 'J01');
INSERT INTO FlightTicket VALUES (411858833, 'EJ2518', 'Economy', 'G04');
INSERT INTO FlightTicket VALUES (384175811, 'AC1314', 'First', 'G06');
INSERT INTO FlightTicket VALUES (523864301, 'AC1874', 'Business', 'A05');
INSERT INTO FlightTicket VALUES (361054356, 'AC1314', 'Economy', 'B06');
INSERT INTO FlightTicket VALUES (611058959, 'EJ2518', 'Economy', 'C03');
INSERT INTO FlightTicket VALUES (431415524, 'WA4582', 'Economy', 'E01');

commit;