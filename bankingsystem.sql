-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 04:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `CurrentBalance` float DEFAULT NULL,
  `AccountTypeID` tinyint(4) DEFAULT NULL,
  `AccountStatusTypeID` tinyint(4) DEFAULT NULL,
  `InterestSavingsRateID` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `CurrentBalance`, `AccountTypeID`, `AccountStatusTypeID`, `InterestSavingsRateID`) VALUES
(181, 489950, 1, 1, 1),
(12345, 690101, 2, 2, 2),
(12346, 10040.5, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `accountstatustype`
--

CREATE TABLE `accountstatustype` (
  `AccountStatusTypeID` tinyint(4) NOT NULL,
  `AccountStatusDescription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountstatustype`
--

INSERT INTO `accountstatustype` (`AccountStatusTypeID`, `AccountStatusDescription`) VALUES
(1, 'Active clients'),
(2, 'Closed clients'),
(3, 'Inactive clients');

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `AccountTypeID` tinyint(4) NOT NULL,
  `AccountTypeDescription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`AccountTypeID`, `AccountTypeDescription`) VALUES
(1, 'Savings Account'),
(2, 'Brokerage Account'),
(3, 'Individual Retirement Account');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `CustomerAddress` varchar(50) DEFAULT NULL,
  `CustomerFirstName` varchar(50) DEFAULT NULL,
  `CustomerLastName` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Nation` varchar(50) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `AccountID`, `CustomerAddress`, `CustomerFirstName`, `CustomerLastName`, `City`, `Nation`, `EmailAddress`, `Phone`, `Username`) VALUES
(1526, 181, 'Dhanmondi', 'Faria', 'Mehzabin', 'Dhaka', 'Bangladesh', 'isfok@gmail.com', '2441139', 'Faria_SM'),
(12345, 12345, 'Dhaka', 'Faisal', 'Faisal', 'Faisal', 'MLE', 'nai', '69', 'Jane'),
(12346, 12346, '23ShibuyaStreet', 'Mister', 'Bean', 'Tokyo', 'Japan', 'mrbean@goodchildhoodtimes.com', '1110001', 'Mr.Bean');

-- --------------------------------------------------------

--
-- Table structure for table `customeraccount`
--

CREATE TABLE `customeraccount` (
  `AccountID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customeraccount`
--

INSERT INTO `customeraccount` (`AccountID`, `CustomerID`) VALUES
(12345, 12345),
(12346, 12346),
(181, 1526);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `EmployeeIsManager` bit(1) DEFAULT NULL,
  `Employee_Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `FirstName`, `LastName`, `EmployeeIsManager`, `Employee_Password`) VALUES
(1, 'Karim', 'Gaben', b'1', 'abc'),
(2, 'Adnan', 'Fasim', b'0', 'idk');

-- --------------------------------------------------------

--
-- Table structure for table `savingsinterestrates`
--

CREATE TABLE `savingsinterestrates` (
  `InterestSavingsRateID` tinyint(4) NOT NULL,
  `InterestRateValue` float DEFAULT NULL,
  `InterestRateDescription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savingsinterestrates`
--

INSERT INTO `savingsinterestrates` (`InterestSavingsRateID`, `InterestRateValue`, `InterestRateDescription`) VALUES
(1, 7, 'Savings Account Rate'),
(2, 9, 'BrokerageAccRate'),
(3, 4.59, 'Special');

-- --------------------------------------------------------

--
-- Table structure for table `transactionlog`
--

CREATE TABLE `transactionlog` (
  `TransactionID` int(11) NOT NULL,
  `TransactionDate` varchar(50) DEFAULT NULL,
  `TransactionTypeID` tinyint(4) DEFAULT NULL,
  `TransactionAmount` float DEFAULT NULL,
  `NewBalance` float DEFAULT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionlog`
--

INSERT INTO `transactionlog` (`TransactionID`, `TransactionDate`, `TransactionTypeID`, `TransactionAmount`, `NewBalance`, `AccountID`, `CustomerID`, `EmployeeID`) VALUES
(1, '27-09-2020', 1, 10000, 10000, 181, 1526, 1),
(101021, '27-09-2020', 1, 2000, 7000, 12345, 12345, 1),
(101022, '27-09-2020', 1, 1000, 6000, 12345, 12345, 3),
(101023, '27-09-2020', 2, 10000, 489950, 181, 1526, 1),
(101024, '27-09-2020', 2, 4950, 0, 12345, 12345, 1),
(101025, '28-09-2020', 1, 1000, 1000, 181, 1526, 1),
(101026, '28-09-2020', 2, 10000, -10050, 181, 1526, 3),
(101027, '28-09-2020', 1, 690069, 690069, 12345, 12345, 1),
(101028, '28-09-2020', 1, 16, 690085, 12345, 12345, NULL),
(101029, '28-09-2020', 1, 16, 690101, 12345, 12345, NULL),
(101030, '28-09-2020', 1, 13, 20012.6, 12346, 12346, NULL),
(101031, '28-09-2020', 1, 13, 20025.3, 12346, 12346, NULL),
(101032, '28-09-2020', 1, 15.23, 20040.5, 12346, 12346, NULL),
(101033, '28-09-2020', 1, 100, 20140.5, 12346, 12346, NULL),
(101034, '28-09-2020', 2, 1000, 19090.5, 12346, 12346, NULL),
(101035, '28-09-2020', 2, 10000, 9040.5, 12346, 12346, NULL),
(101036, '29-09-2020', 3, 1000, 10040.5, 12346, 12346, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontype`
--

CREATE TABLE `transactiontype` (
  `TransactionTypeID` tinyint(4) NOT NULL,
  `TransactionTypeName` varchar(50) DEFAULT NULL,
  `TransactionFeeAmount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactiontype`
--

INSERT INTO `transactiontype` (`TransactionTypeID`, `TransactionTypeName`, `TransactionFeeAmount`) VALUES
(1, 'Deposit', 0),
(2, 'Withdrawal', 50),
(3, 'Loan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlogins`
--

CREATE TABLE `userlogins` (
  `Username` char(50) NOT NULL,
  `UserPassword` varchar(50) DEFAULT NULL,
  `AccountID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogins`
--

INSERT INTO `userlogins` (`Username`, `UserPassword`, `AccountID`) VALUES
('Faria_SM', '4LL3Y', 181),
('Jane', 'newpass', 12345),
('Mr.Bean', 'Teddy123', 12346);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `AccountTypeID` (`AccountTypeID`),
  ADD KEY `AccountStatusTypeID` (`AccountStatusTypeID`),
  ADD KEY `InterestSavingsRateID` (`InterestSavingsRateID`);

--
-- Indexes for table `accountstatustype`
--
ALTER TABLE `accountstatustype`
  ADD PRIMARY KEY (`AccountStatusTypeID`);

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`AccountTypeID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `customer_ibfk_2` (`AccountID`);

--
-- Indexes for table `customeraccount`
--
ALTER TABLE `customeraccount`
  ADD KEY `AccountID` (`AccountID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `savingsinterestrates`
--
ALTER TABLE `savingsinterestrates`
  ADD PRIMARY KEY (`InterestSavingsRateID`);

--
-- Indexes for table `transactionlog`
--
ALTER TABLE `transactionlog`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `AccountID` (`AccountID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `TransactionTypeID` (`TransactionTypeID`);

--
-- Indexes for table `transactiontype`
--
ALTER TABLE `transactiontype`
  ADD PRIMARY KEY (`TransactionTypeID`);

--
-- Indexes for table `userlogins`
--
ALTER TABLE `userlogins`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `AccountID` (`AccountID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`AccountTypeID`) REFERENCES `accounttype` (`AccountTypeID`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`AccountStatusTypeID`) REFERENCES `accountstatustype` (`AccountStatusTypeID`),
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`InterestSavingsRateID`) REFERENCES `savingsinterestrates` (`InterestSavingsRateID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `userlogins` (`Username`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE CASCADE;

--
-- Constraints for table `customeraccount`
--
ALTER TABLE `customeraccount`
  ADD CONSTRAINT `customeraccount_fk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `customeraccount_fk_2` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE CASCADE;

--
-- Constraints for table `userlogins`
--
ALTER TABLE `userlogins`
  ADD CONSTRAINT `userlogins_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
