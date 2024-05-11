-- 
--      Start Transaction
-- 


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- 
--      Database: 'lbba'
--

-- ----------------------------------------------------------

-- 
--      Table structure for table 'theadmin'
-- 

CREATE TABLE `theadmin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `AdminRegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
--      Insert data into table 'theadmin'
-- 

INSERT INTO `theadmin` (`ID`, `AdminName`, `UserName`, `ContactNumber`, `Email`, `Password`, `AdminRegDate`) VALUES
(1, 'Dheeraj Soni', 'Janvi', 7390877310, 'janvivyas3009@gmail.com', 'dheeraj@123', '2023-07-13 07:42:07');

-- ----------------------------------------------------------

-- 
--      Table structure for table 'theblooddonors'
-- 

CREATE TABLE `theblooddonors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(50) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `Address` varchar(120) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
--      Insert Data Into Table 'theblooddonor'
-- 

INSERT INTO `theblooddonors` (`ID`, `FullName`, `ContactNumber`, `Email`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `PostingDate`, `status`, `Password`) VALUES
(1, 'Dheeraj', 7458976152, 'dheeraj@gmail.com', 'Male', 20, 'B+', 'Shivaji Nagar, Jhansi', 'Call me if need for blood', '2023-07-08 13:38:56', 1, 'dheeraj@123'),
(2, 'Gaurav ', 9876543210, 'gaurav@gmail.com', 'Male', 16, 'B+', 'Datia', 'I want to serve people', '2023-07-08 14:02:10', 1, 'gaurav@1'),
(3, 'Nisha', 1234567890, 'nisha@gmail.com', 'Female', 25, 'A-', 'Gwalior', 'ok', '2023-07-08 14:06:12', 1, 'nisha123'),
(4, 'Meena', 9074739385, 'meena@gmail.com', 'Female', 47, 'B+', 'Balaji Nagar, Datia', 'Contact if needed', '2023-07-08 14:13:50', 1, 'meena@123'),
(5, 'Raj', 7412589630, 'raj@gmail.com', 'Male', 16, 'A+', 'Ahemdabad', 'I want to do donate blood', '2023-07-09 06:21:52', 1, 'raj123'),
(6, 'Ram', 1081081080, 'ram@gmail.com', 'Male', 45, 'O+', 'Allahabad', ' I am a blood donator', '2023-07-09 06:37:11', 1, 'ram123'),
(7, 'Sheela', 7897897890, 'sheela@gmail.com', 'Female', 38, 'O-', 'Mumbai', ' I am healthy', '2023-07-09 06:41:36', 1, 'sheela123'),
(8, 'Aman', 7894567894, 'aman@gmail.com', 'Male', 52, 'AB-', 'Jaipur', ' NA', '2023-07-10 17:51:57', 1, 'aman123'),
(9, 'Amit', 1020202010, 'amitk@gmail.com', 'Male', 23, 'AB+', 'Manipur', ' NA', '2023-07-10 17:53:16', 1, 'amit123');

-- --------------------------------------------------------------

-- 
--      Table structure for table 'thebloodgroup'
--

CREATE TABLE `thebloodgroup` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
--      Insert data into table 'thebloodgroup'
-- 

INSERT INTO `thebloodgroup` (`ID`, `BloodGroup`, `PostingDate`) VALUES
(1, 'O-', '2023-07-13 07:45:30'),
(2, 'O+', '2023-07-13 07:46:18'),
(3, 'A-', '2023-07-13 07:46:33'),
(4, 'A+', '2023-07-13 07:46:45'),
(5, 'B-', '2023-07-13 07:46:59'),
(6, 'B+', '2023-07-13 07:47:13'),
(7, 'AB-', '2023-07-13 07:47:32'),
(8, 'AB+', '2023-07-13 07:47:42');

-- ---------------------------------------------------------------

-- 
--      Table structure for table 'thebloodrequirer'
-- 

CREATE TABLE `thebloodrequirer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BloodDonarID` int(10) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `BloodRequireFor` varchar(25) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
--      Insert Data Into Table 'thebloodrequirer'
-- 

INSERT INTO `thebloodrequirer` (`ID`, `BloodDonarID`, `Name`, `Email`, `ContactNumber`, `BloodRequireFor`, `Message`, `ApplyDate`) VALUES
(1, 1, 'Akash', 'akash@gmail.com', 1122334455, 'Brother', 'Please help me', '2023-07-08 12:42:09'),
(2, 2, 'Abhay', 'abhay@gmail.com', 1231231231, 'Mother', 'Need blood on urgent basis', '2023-07-08 12:49:11'),
(3, 1, 'somu', 'somu@gmail.com', 4523698710, 'Brother', 'i need 2L blood', '2023-07-08 17:03:57'),
(4, 4, 'D', 'd@d.com', 7899877890, 'Father', 'Need blood', '2023-07-09 05:51:34'),
(5, 4, 'S', 's@s.com', 1233211230, 'Brother', 'Need blood', '2023-07-09 05:51:47'),
(6, 8, 'radha', 'radha@gmail.com', 7897897890, 'Sister', 'need O- blood', '2023-07-10 15:01:58'),
(7, 8, 'murli', 'murli@gmail.com', 4565445606, 'Sister', 'need O- blood', '2023-07-10 15:04:00'),
(8, 3, 'Aman', 'aman@gmail.com', 1231231120, 'Brother', 'need A- blood', '2023-07-10 16:36:49'),
(9, 5, 'ok', 'ok@ok.com', 3210321020, 'Others', 'help', '2023-07-10 17:22:40'),
(10, 5, 'yes', 'yes@yes.com', 1230123010, 'Others', 'help', '2023-07-10 17:23:52'),
(11, 7, 'yash', 'yash@gmail.com', 3692581470, 'Others', 'help', '2023-07-10 17:25:34'),
(12, 7, 'vishnu', 'vishnu@gmail.com', 1237564123, 'Others', 'help', '2023-07-10 17:26:02'),
(13, 6, 'mohan', 'mohan@mohan.com', 7890123456, 'Father', 'send fast', '2023-07-10 17:28:09');

-- 
-- ---------------------------------------------------------------
-- 

-- 
--      Table structure for table 'thecontactusinfo'
-- 

CREATE TABLE `thecontactusinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Address` tinytext DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
--      Insert data into table 'thecontactusinfo'
-- 

INSERT INTO `thecontactusinfo` (`ID`, `Address`, `Email`, `ContactNumber`) VALUES
(1, 'Medical College, Jhansi', 'lifeQuest@people.com', 9876543210);

-- ----------------------------------------------------------------

-- 
--      Table structure for table 'thecontactusquery'
-- 

CREATE TABLE `thecontactusquery` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
--      Insert Data Into Table 'thecontactusquery'
-- 

INSERT INTO `thecontactusquery` (`ID`, `Name`, `Email`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Dheeraj', 'dhiraj@gmail.com', 7485961320, 'Contact Me Soon as Possible', '2023-07-08 13:06:12', NULL),
(2, 'Ashish', 'ashish@gmail.com', 1478523690, 'I need to talk', '2023-07-08 13:10:16', NULL),
(3, 'Gaurav', 'gaurav@gmail.com', 1234567890, 'I am gaurav and want to talk to you', '2023-07-08 13:19:37', NULL),
(4, 'Rahul', 'rahul@gmail.com', 1234561230, 'call me when you are free', '2023-07-10 17:16:39', NULL);

-- 
-- ---------------------------------------------------------------
-- 

-- 
--      Table structure for table 'thepages'
-- 

CREATE TABLE `thepages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PageName` varchar(255) DEFAULT NULL,
  `Type` varchar(255) NOT NULL DEFAULT '',
  `Detail` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
--      Insert Data Into Table 'thepages'
-- 

INSERT INTO `thepages` (`ID`, `PageName`, `Type`, `Detail`) VALUES
(1, 'About Us', 'aboutus', 'Welcome to the LifeQuest Blood Bank Alliance.');

-- -----------------------------------------------------------------

COMMIT;

-- 
--      End Transaction
-- 