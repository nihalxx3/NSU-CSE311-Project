-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 11:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rems`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `AgentID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`AgentID`, `Fname`, `Lname`, `PropertyID`, `UserID`) VALUES
(7001, 'Samia', 'Zaman', 5001, NULL),
(7002, 'Muntaha', 'Emran', 5002, NULL),
(7003, 'Sumaya', 'Alam', 5003, 4003),
(7004, 'Nuwaisir', 'Kabir', 5004, 4004),
(7005, 'Najma', 'Haque', 5005, NULL),
(7006, 'Nawheen', 'Chowdhury', 5006, 4006),
(7007, 'Md.', 'Ariful Islam', 5007, 4007),
(7008, 'Md.', 'Asaduzzaman', 5008, 4008),
(7009, 'Ahnaf', 'Mahir', 5009, 4009),
(7010, 'Mehjabin', 'Mostofa', 5010, NULL),
(7011, 'Maisha', 'Afroz', 5011, 4011),
(7012, 'Samia', 'Tabassum', 5012, 4012),
(7013, 'Tamim', 'Ahmed', 5013, 4013),
(7014, 'Rifat', 'Islam', 5014, 4014),
(7015, 'Rubaiya', 'Islam', 5015, 4015),
(7016, 'Siam', 'Uddin', 5015, 4007);

-- --------------------------------------------------------

--
-- Table structure for table `agents_phonenumber`
--

CREATE TABLE `agents_phonenumber` (
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `AgentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents_phonenumber`
--

INSERT INTO `agents_phonenumber` (`PhoneNumber`, `AgentID`) VALUES
('01616090001', 7001),
('01616090002', 7002),
('01616090003', 7003),
('01616090004', 7004),
('01616090005', 7005),
('01616090006', 7006),
('01616090007', 7007),
('01616090008', 7008),
('01616090009', 7009),
('01616090010', 7010),
('01616090011', 7011),
('01616090012', 7012),
('01616090013', 7013),
('01616090014', 7014),
('01616090015', 7015),
('016160016', 7016);

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `Address` varchar(100) NOT NULL,
  `UnitNumber` int(11) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `Size_sqft` int(11) DEFAULT NULL,
  `Bedrooms` int(11) DEFAULT NULL,
  `Bathrooms` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`Address`, `UnitNumber`, `PropertyID`, `Size_sqft`, `Bedrooms`, `Bathrooms`, `Price`) VALUES
('AmberKhana, Dhaka, Dhaka', 10, 5001, 1000, 3, 2, 45000.00),
('BarutKhana, Faridpur, Dhaka', 8, 5002, 1200, 4, 3, 48000.00),
('East Bazar, Kishoreganj, Dhaka', 12, 5005, 1100, 3, 2, 51000.00),
('Fazil Chist, Madaripur, Dhaka', 15, 5006, 1300, 4, 3, 55000.00),
('Gorur Hat, Manikganj, Dhaka', 10, 5007, 1400, 5, 4, 59000.00),
('Zinda Bazar, Narayanganj, Dhaka', 6, 5009, 1500, 3, 2, 63000.00),
('Jaflong, Narsingdi, Dhaka', 8, 5010, 1600, 4, 3, 67000.00),
('Lala Bazar, Faridpur, Dhaka', 12, 5012, 1200, 3, 2, 70000.00),
('Manik Nagar, Gazipur, Dhaka', 9, 5013, 1250, 4, 3, 74000.00),
('Dhali Bari, Kishoreganj, Dhaka', 7, 5015, 1350, 5, 4, 78000.00);

-- --------------------------------------------------------

--
-- Table structure for table `builders`
--

CREATE TABLE `builders` (
  `BuilderID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `builders`
--

INSERT INTO `builders` (`BuilderID`, `Fname`, `Lname`) VALUES
(3001, 'Aminul', 'Islam'),
(3002, 'Sohail', 'Rana'),
(3003, 'Mehedi', 'Hasan'),
(3004, 'Faisal', 'Ahmed'),
(3005, 'Tanvir', 'Rahman'),
(3006, 'Rasel', 'Chowdhury'),
(3007, 'Shakil', 'Mahmud'),
(3008, 'Kamrul', 'Hasan'),
(3009, 'Reza', 'Karim'),
(3010, 'Mamun', 'Bhuiyan'),
(3011, 'Sabbir', 'Ahmed'),
(3012, 'Rubel', 'Hossain'),
(3013, 'Rashid', 'Khan'),
(3014, 'Sakib', 'Al Hasan'),
(3015, 'Tamim', 'Iqbal'),
(3016, 'Shahin', 'Miah'),
(3017, 'Anwar', 'Islam'),
(3018, 'Farid', 'Khan'),
(3019, 'Jahir', 'Rahman'),
(3020, 'Bashir', 'Uddin');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `BuildingID` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Flats` int(11) DEFAULT NULL,
  `Floors` int(11) DEFAULT NULL,
  `BuilderID` int(11) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`BuildingID`, `Address`, `Flats`, `Floors`, `BuilderID`, `PropertyID`) VALUES
(6001, 'Building A', 15, 5, 3001, 5001),
(6002, 'Building B', 12, 4, 3002, 5002),
(6003, 'Building C', 10, 3, 3003, 5003),
(6004, 'Building D', 20, 6, 3004, 5004),
(6005, 'Building E', 18, 5, 3005, 5005),
(6006, 'Building F', 22, 7, 3006, 5006),
(6007, 'Building G', 24, 8, 3006, 5007),
(6008, 'Building H', 30, 10, 3007, 5008),
(6009, 'Building I', 25, 9, 3007, 5009),
(6010, 'Building J', 28, 8, 3007, 5010),
(6011, 'Building K', 16, 5, 3008, 5011),
(6012, 'Building L', 12, 4, 3009, 5012),
(6013, 'Building M', 18, 6, 3010, 5013),
(6014, 'Building N', 14, 5, 3011, 5014),
(6015, 'Building O', 20, 7, 3012, 5015);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `DivisionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `CityName`, `DivisionID`) VALUES
(2001, 'Dhaka', 1001),
(2002, 'Faridpur', 1001),
(2003, 'Gazipur', 1001),
(2004, 'Gopalganj', 1001),
(2005, 'Kishoreganj', 1001),
(2006, 'Madaripur', 1001),
(2007, 'Manikganj', 1001),
(2008, 'Munshiganj', 1001),
(2009, 'Narayanganj', 1001),
(2010, 'Narsingdi', 1001),
(2011, 'Rajbari', 1001),
(2012, 'Shariatpur', 1001),
(2013, 'Tangail', 1001),
(2014, 'Bandarban', 1002),
(2015, 'Brahmanbaria', 1002),
(2016, 'Chandpur', 1002),
(2017, 'Chittagong', 1002),
(2018, 'Coxs Bazar', 1002),
(2019, 'Cumilla', 1002),
(2020, 'Feni', 1002),
(2021, 'Khagrachari', 1002),
(2022, 'Lakshmipur', 1002),
(2023, 'Noakhali', 1002),
(2024, 'Rangamati', 1002),
(2025, 'Bagerhat', 1003),
(2026, 'Chuadanga', 1003),
(2027, 'Jashore', 1003),
(2028, 'Jhenaidah', 1003),
(2029, 'Khulna', 1003),
(2030, 'Kushtia', 1003),
(2031, 'Magura', 1003),
(2032, 'Meherpur', 1003),
(2033, 'Narail', 1003),
(2034, 'Satkhira', 1003),
(2035, 'Habiganj', 1004),
(2036, 'Moulvibazar', 1004),
(2037, 'Sunamganj', 1004),
(2038, 'Sylhet', 1004),
(2039, 'Bogura', 1005),
(2040, 'Chapainawabganj', 1005),
(2041, 'Joypurhat', 1005),
(2042, 'Naogaon', 1005),
(2043, 'Natore', 1005),
(2044, 'Pabna', 1005),
(2045, 'Rajshahi', 1005),
(2046, 'Sirajganj', 1005),
(2047, 'Barisal', 1006),
(2048, 'Barguna', 1006),
(2049, 'Bhola', 1006),
(2050, 'Jhalokathi', 1006),
(2051, 'Patuakhali', 1006),
(2052, 'Pirojpur', 1006),
(2053, 'Dinajpur', 1007),
(2054, 'Gaibandha', 1007),
(2055, 'Kurigram', 1007),
(2056, 'Lalmonirhat', 1007),
(2057, 'Nilphamari', 1007),
(2058, 'Panchagarh', 1007),
(2059, 'Rangpur', 1007),
(2060, 'Thakurgaon', 1007),
(2061, 'Jamalpur', 1008),
(2062, 'Mymensingh', 1008),
(2063, 'Netrokona', 1008),
(2064, 'Sherpur', 1008),
(2065, 'NSUiub', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `DivisionID` int(11) NOT NULL,
  `DivisionName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`DivisionID`, `DivisionName`) VALUES
(1001, 'Dhaka'),
(1002, 'Chittagong'),
(1003, 'Khulna'),
(1004, 'Sylhet'),
(1005, 'Rajshahi'),
(1006, 'Barisal'),
(1007, 'Rangpur'),
(1008, 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Comment` text DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Comment`, `UserID`) VALUES
('This is a test feedback 1 for user 4001', 4001);

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `Address` varchar(100) NOT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `Size_sqft` int(11) DEFAULT NULL,
  `Bedrooms` int(11) DEFAULT NULL,
  `Bathrooms` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`Address`, `PropertyID`, `Size_sqft`, `Bedrooms`, `Bathrooms`, `Price`) VALUES
('Chowhatta, Gazipur, Dhaka', 5003, 900, 2, 1, 30000.00),
('Dighi Nala, Gopalganj, Dhaka', 5004, 850, 2, 1, 32000.00),
('Hazir Bari, Munshiganj, Dhaka', 5008, 950, 3, 2, 35000.00),
('Kazi Bazar, Dhaka, Dhaka', 5011, 1000, 3, 2, 38000.00),
('New Market, Gopalganj, Dhaka', 5014, 900, 2, 1, 40000.00);

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE `inspection` (
  `PropertyID` int(11) DEFAULT NULL,
  `InspectionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `Email`, `Password`, `UserType`) VALUES
(101, 'mohaimen.mamun@northsouth.edu', '3b55f2bc', 'admin'),
(102, 'nazmus.nihal@northsouth.edu', '3e41066e', 'admin'),
(103, 'nabil.hannan@northsouth.edu', 'd6ebceaf', 'admin'),
(4001, 'shahoriar.4001@gmail.com', 'cda1a169', 'user'),
(4002, 'minhajul.4002@gmail.com', '24b0fe6e', 'user'),
(4003, 'rupak.4003@gmail.com', '3dce0fe9', 'user'),
(4004, 'tasnia.4004@gmail.com', '5ec5c0a9', 'user'),
(4005, 'sakib.4005@gmail.com', '007525d3', 'user'),
(4006, 'doyita.4006@gmail.com', 'f58d18ac', 'user'),
(4007, 'oyishe.4007@gmail.com', '0a03e97e', 'user'),
(4008, 'sukanta.4008@gmail.com', '65301018', 'user'),
(4009, 'tasnia.4009@gmail.com', 'e8353375', 'user'),
(4010, 'sakib.4010@gmail.com', '4298a6cf', 'user'),
(4011, 'maksudur.4011@gmail.com', '41e80f43', 'user'),
(4012, 'mozammel.4012@gmail.com', '88275750', 'user'),
(4013, 'nibrajul.4013@gmail.com', '93eaf67d', 'user'),
(4014, 'arbin.4014@gmail.com', '2267af6c', 'user'),
(4015, 'jahid.4015@gmail.com', '3c36bb3c', 'user'),
(4016, 'nihal111@gmail.com', 'nihal111@', 'user'),
(4017, 'sakib2@gmail.com', 'Sakib123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_requests`
--

CREATE TABLE `maintenance_requests` (
  `PropertyID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_requests`
--

INSERT INTO `maintenance_requests` (`PropertyID`, `UserID`, `RequestDate`) VALUES
(5001, 4001, '2024-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `PropertyID` int(11) NOT NULL,
  `PropertyType` varchar(50) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `CityID` int(11) DEFAULT NULL,
  `BuilderID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AgentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`PropertyID`, `PropertyType`, `Location`, `CityID`, `BuilderID`, `UserID`, `AgentID`) VALUES
(5001, 'Apartment', 'AmberKhana', 2001, 3001, NULL, 7001),
(5002, 'Apartment', 'BarutKhana', 2002, 3002, NULL, 7002),
(5003, 'House', 'Chowhatta', 2003, 3003, 4003, 7003),
(5004, 'House', 'Dighi Nala', 2004, 3004, 4004, 7004),
(5005, 'Apartment', 'East Bazar', 2005, 3005, NULL, 7005),
(5006, 'Apartment', 'Fazil Chist', 2006, 3006, 4006, 7006),
(5007, 'Apartment', 'Gorur Hat', 2007, 3006, 4007, 7007),
(5008, 'House', 'Hazir Bari', 2008, 3007, 4008, 7008),
(5009, 'Apartment', 'Zinda Bazar', 2009, 3007, 4009, 7009),
(5010, 'Apartment', 'Jaflong', 2010, 3007, NULL, 7010),
(5011, 'House', 'Kazi Bazar', 2001, 3008, 4011, 7011),
(5012, 'Apartment', 'Lala Bazar', 2002, 3009, 4012, 7012),
(5013, 'Apartment', 'Manik Nagar', 2003, 3010, 4013, 7013),
(5014, 'House', 'New Market', 2004, 3011, 4014, 7014),
(5015, 'Apartment', 'Dhali Bari', 2005, 3012, 4015, 7015);

--
-- Triggers `properties`
--
DELIMITER $$
CREATE TRIGGER `after_properties_update1` AFTER UPDATE ON `properties` FOR EACH ROW BEGIN
    -- Check if the UserID was set to NULL in the properties table
    IF NEW.UserID IS NULL THEN
        -- Update the agents table to set UserID to NULL for the corresponding PropertyID
        UPDATE agents
        SET UserID = NULL
        WHERE PropertyID = NEW.PropertyID;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_property_insert` AFTER INSERT ON `properties` FOR EACH ROW BEGIN
    IF NEW.PropertyType = 'Apartment' THEN
        INSERT INTO Apartment (Address, UnitNumber, PropertyID, Size_sqft, Bedrooms, Bathrooms, Price)
        SELECT 
            CONCAT(NEW.Location, ', ', c.CityName, ', ', d.DivisionName),
            NULL,
            NEW.PropertyID,
            NULL,
            NULL,
            NULL,
            NULL
        FROM 
            city c
        JOIN 
            division d ON c.StateID = d.StateID
        WHERE 
            c.CityID = NEW.CityID;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_property_insert2` AFTER INSERT ON `properties` FOR EACH ROW BEGIN
    -- Check if the inserted property has PropertyType 'House'
    IF NEW.PropertyType = 'House' THEN
        INSERT INTO Houses (Address, PropertyID, Size_sqft, Bedrooms, Bathrooms, Price)
        SELECT 
            CONCAT(NEW.Location, ', ', c.CityName, ', ', d.DivisionName),
            NEW.PropertyID,
            NULL,
            NULL,
            NULL,
            NULL
        FROM 
            city c
        JOIN 
            division d ON c.DivisionID = d.DivisionID
        WHERE 
            c.CityID = NEW.CityID;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `RentalID` int(11) NOT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `AgreementDate` date DEFAULT NULL,
  `RentAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`RentalID`, `PropertyID`, `AgreementDate`, `RentAmount`) VALUES
(8004, 5006, '2024-03-01', 55000.00),
(8005, 5007, '2024-03-16', 59000.00),
(8006, 5009, '2024-03-31', 63000.00),
(8008, 5012, '2024-04-30', 70000.00),
(8009, 5013, '2024-05-15', 74000.00),
(8010, 5015, '2024-05-30', 78000.00),
(8011, 5003, '2024-01-21', 30000.00),
(8012, 5004, '2024-02-10', 32000.00),
(8013, 5008, '2024-03-01', 35000.00),
(8014, 5011, '2024-03-21', 38000.00),
(8015, 5014, '2024-04-10', 40000.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SalePrice` decimal(10,2) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SalePrice`, `PropertyID`) VALUES
(540000.00, 5001),
(576000.00, 5002),
(612000.00, 5005),
(804000.00, 5010);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `UserType` varchar(20) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Fname`, `Lname`, `UserType`, `PropertyID`) VALUES
(4001, 'Shahoriar', 'Shihab', 'Owner', 5001),
(4002, 'Minhajul', 'Arefin', 'Tenant', 5002),
(4003, 'Rupak', 'Roy', 'Owner', 5003),
(4004, 'Tasnia', 'Ahmed', 'Tenant', 5004),
(4005, 'Sakib', 'Hasan', 'Owner', 5005),
(4006, 'Doyita', 'Deya', 'Tenant', 5006),
(4007, 'Oyishe', 'Nath', 'Owner', 5007),
(4008, 'Sukanta', 'Paul', 'Tenant', 5008),
(4009, 'Tasnia', 'Rahman', 'Owner', 5009),
(4010, 'Sakib', 'Khan', 'Tenant', 5010),
(4011, 'Maksudur', 'Rahman', 'Owner', 5011),
(4012, 'Mozammel', 'Hossain', 'Tenant', 5012),
(4013, 'Nibrajul', 'Alam', 'Owner', 5013),
(4014, 'Arbin', 'Ferdaus', 'Tenant', 5014),
(4015, 'Jahid', 'Islam', 'Owner', 5015),
(4016, 'Nihal', 'Testing', 'Owner', NULL),
(4017, 'Sakib', 'Hasan', 'Tenant', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`AgentID`),
  ADD KEY `PropertyID` (`PropertyID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `agents_phonenumber`
--
ALTER TABLE `agents_phonenumber`
  ADD KEY `AgentID` (`AgentID`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `builders`
--
ALTER TABLE `builders`
  ADD PRIMARY KEY (`BuilderID`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`BuildingID`),
  ADD KEY `BuilderID` (`BuilderID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `DivisionID` (`DivisionID`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`DivisionID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `inspection`
--
ALTER TABLE `inspection`
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `idx_email` (`Email`);

--
-- Indexes for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD KEY `PropertyID` (`PropertyID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`PropertyID`),
  ADD KEY `CityID` (`CityID`),
  ADD KEY `BuilderID` (`BuilderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `properties_ibfk_4` (`AgentID`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`RentalID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `fk_user_property` (`PropertyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4018;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4018;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agents_phonenumber`
--
ALTER TABLE `agents_phonenumber`
  ADD CONSTRAINT `agents_phonenumber_ibfk_1` FOREIGN KEY (`AgentID`) REFERENCES `agents` (`AgentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_ibfk_1` FOREIGN KEY (`BuilderID`) REFERENCES `builders` (`BuilderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buildings_ibfk_2` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`DivisionID`) REFERENCES `division` (`DivisionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `inspection_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD CONSTRAINT `maintenance_requests_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintenance_requests_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`BuilderID`) REFERENCES `builders` (`BuilderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_4` FOREIGN KEY (`AgentID`) REFERENCES `agents` (`AgentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_property` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
