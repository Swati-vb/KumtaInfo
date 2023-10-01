-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2021 at 10:35 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kumta_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adrs` varchar(255) NOT NULL,
  `cntct` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `name`, `adrs`, `cntct`, `image`, `category`) VALUES
(8, 'Hotel Vaibhav Palace', 'Old bus stand Road, Kumta town', 2147483647, 'hotels/h1.jpeg', 'hotels'),
(9, 'Hotel Varadha', 'Near Railway Station, Kumta ', 2147483647, 'hotels/h2.jpeg', 'hotels'),
(10, 'Hotel Govardhan', 'Opposite New bus stand , Kumta', 2147483647, 'hotels/h3.jpeg', 'hotels'),
(11, 'Hotel Green Gate', 'Kumbeshwar Temple Road, Kumta', 2147483647, 'hotels/h4.jpeg', 'hotels'),
(13, 'Omkar Medicals', 'Beside old bus stand, Kumta', 2147483647, 'medicalshops/m1.jpeg', 'medicalshops'),
(14, 'Ramanath Medicals', 'Car St, Kumta', 2147483647, 'medicalshops/m2.jpeg', 'medicalshops'),
(15, 'Agarwal Medicals', 'Gokul Road, Kumta', 2147483647, 'medicalshops/m3.jpeg', 'medicalshops'),
(16, 'Kamat Medical', 'Near Busstand, kumta', 2147483647, 'medicalshops/m4.jpeg', 'medicalshops'),
(18, 'Gibb English medium High School', 'Court Road, kumta', 2147483647, 'education/s3.jpeg', 'education'),
(19, 'Gibb Girls High School', 'Court Road, kumta', 2147483647, 'education/s4.jpg', 'education'),
(20, 'Nirmala Convent School', 'CCF8+7UF, Kumta', 2147483647, 'education/s1.jpeg', 'education'),
(21, 'Konkan Educatiuon', 'Vidyagiri ,Kalbag, Kumta', 2147483647, 'education/s2.jpeg', 'education'),
(22, 'High Tech Hospital', 'CCP9+4CPQ', 2147483647, 'hospitals/L1.jpeg', 'hospitals'),
(23, 'Govt.hospital', 'Kumta Ho, Baggon cross, Kumta', 1234567890, 'hospitals/L3.jpeg', 'hospitals'),
(24, 'Canara Health Care,Baggon Cross, Kumta', 'Baggon Road, Kumta', 1234567890, 'hospitals/L4.jpeg', 'hospitals'),
(25, 'Ramleela Hospital', 'NH-66, Karnataka', 1234567890, 'hospitals/L2.jpeg', 'hospitals'),
(26, 'Mirjan Fort', 'Talluk Mirjan Fort, Mirjan fort Road, Karnataka', 2147483647, 'tourism/t1.jpeg', 'tourism'),
(27, 'Gokarna Mahabaleshwara Temple', 'Gokarna G8R7+7R', 1234567890, 'tourism/t2.jpeg', 'tourism'),
(28, 'Yana', 'Yana Rocks, Near Yana Village, Kumta', 1234567890, 'tourism/t3.jpeg', 'tourism'),
(29, 'Head Bunder Beach', 'Shashihittal, Kumta', 1234567890, 'tourism/t4.jpeg', 'tourism'),
(30, 'SRL Travels', 'CCJF+65P, Manaki, Karnataka', 1234567890, 'travels/tt1.jpeg', 'travels'),
(31, 'SRS Travels', 'NH-66,Opp. LIC office, Kumta', 2147483647, 'travels/tt2.jpeg', 'travels'),
(32, 'Prabhu Travels', 'Kochi-Panvel Hwy, Kumta', 1234567890, 'travels/tt3.jpeg', 'travels'),
(34, 'Murkundeshwar Tours and Travels', 'Near Busstand, kumta', 1234567890, 'travels/tt4.jpeg', 'travels');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
