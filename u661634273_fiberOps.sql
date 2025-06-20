-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2025 at 02:24 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u661634273_fiberOps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `verification` tinytext DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `verification`, `f_name`, `l_name`) VALUES
('110kqnishkamedankara110@gmail.com', '658a5847dce55', 'kanishka', 'medankara'),
('fiberopticslk@gmail.com', '658c37191a806', 'fiber', 'optics'),
('ravindudissanayake3@gmail.com', '658c37099cd36', 'ravindu', 'dissanayaka');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(10, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(13, 'Baby Items'),
(14, 'Fiber Optical Tools and Accesories'),
(16, 'Household Items'),
(17, 'Lithuim Batteries');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `chat_id` varchar(50) DEFAULT NULL,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `content` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `postalcode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `postalcode`) VALUES
(10, 'Kandy', '20000'),
(11, 'Trincomalee', '31000'),
(12, 'Katunayake', '11450'),
(13, 'Kottegoda', '81180'),
(14, 'Malabe', '10115'),
(15, 'Kalutara', '12000'),
(16, 'Kehelwatta', '12550'),
(17, 'Ampitiya', '20160'),
(18, 'Peradeniya', '20400'),
(19, 'Wahacotte', '21160'),
(20, 'Galle', '80000'),
(21, 'Hikkaduwa', '80240'),
(22, 'Moratuwa', '10400'),
(23, 'Negombo', '11500'),
(24, 'Kandy', '20000'),
(25, 'Battaramulla', '10120'),
(26, 'Kochchikade', '11540'),
(27, 'Horana', '12400'),
(28, 'Gampola', '20500'),
(29, 'Wennappuwa', '61170'),
(30, 'Undugoda', '71200'),
(31, 'Ambalangoda', '80300'),
(32, 'Weligama', '81700'),
(33, 'Pannipitiya', '10230'),
(34, 'Nugegoda', '10250'),
(35, 'Ragama', '11010'),
(36, 'Dambulla', '21100'),
(37, 'Gonapinuwala', '80230'),
(38, 'Badulla', '90000'),
(39, 'Fort', '00100'),
(40, 'Slave lsland', '00200'),
(41, 'Slave Island', '00200'),
(42, 'Colpetty', '00300'),
(43, 'Bambalapitiya', '00400'),
(44, 'Havelock Town', '00500'),
(45, 'Kirulapone', '00600'),
(46, 'Wellawatta', '00600'),
(47, 'Borella', '00800'),
(48, 'Kotahena', '01300'),
(49, 'Mutwal', '01500'),
(50, 'Sri Jayawardenepu', '10100'),
(51, 'Talawatugoda', '10116'),
(52, 'Hokandara', '10118'),
(53, 'Athurugiriya', '10150'),
(54, 'Homagama', '10200'),
(55, 'Mullegama', '10202'),
(56, 'Habarakada', '10204'),
(57, 'Pitipana Homagama', '10206'),
(58, 'Kiriwattuduwa', '10208'),
(59, 'Hiripitya', '10232'),
(60, 'Maharagama', '10280'),
(61, 'Boralesgamuwa', '10290'),
(62, 'Deltara', '10302'),
(63, 'Siddamulla', '10304'),
(64, 'Madapatha', '10306'),
(65, 'Polgasowita', '10320'),
(66, 'Mount Lavinia', '10370'),
(67, 'Padukka', '10500'),
(68, 'Horagala', '10502'),
(69, 'Kahawala', '10508'),
(70, 'Watareka', '10511'),
(71, 'Batawala', '10513'),
(72, 'Bope', '10522'),
(73, 'Handapangoda', '10524'),
(74, 'Batugampola', '10526'),
(75, 'Mulleriyawa New Town', '10620'),
(76, 'Kaduwela', '10640'),
(77, 'Hanwella', '10650'),
(78, 'Ranala', '10654'),
(79, 'Dedigamuwa', '10656'),
(80, 'Pugoda', '10660'),
(81, 'Kapugoda', '10662'),
(82, 'Tittapattara', '10664'),
(83, 'Waga', '10680'),
(84, 'Tummodara', '10682'),
(85, 'Avissawella', '10700'),
(86, 'Napawela', '10704'),
(87, 'Puwakpitiya', '10712'),
(88, 'Hewainna', '10714'),
(89, 'Kalatuwawa', '10718'),
(90, 'Kosgama', '10730'),
(91, 'Akarawita', '10732'),
(92, 'Gampaha', '11000'),
(93, 'Batuwatta', '11011'),
(94, 'Walpola (WP)', '11012'),
(95, 'Ganemulla', '11020'),
(96, 'Bollete (WP)', '11024'),
(97, 'Udugampola', '11030'),
(98, 'Madelgamuwa', '11033'),
(99, 'Uggalboda', '11034'),
(100, 'Bemmulla', '11040'),
(101, 'Pethiyagoda', '11043'),
(102, 'Ambagaspitiya', '11052'),
(103, 'Udathuthiripitiya', '11054'),
(104, 'Mudungoda', '11056'),
(105, 'Mandawala', '11061'),
(106, 'Lunugama', '11062'),
(107, 'Naranwala', '11063'),
(108, 'Nedungamuwa', '11066'),
(109, 'Wanaluwewa', '11068'),
(110, 'Veyangoda', '11100'),
(111, 'Dewalapola', '11102'),
(112, 'Wattala', '11104'),
(113, 'Watinapaha', '11104'),
(114, 'Kumbaloluwa', '11105'),
(115, 'Essella', '11108'),
(116, 'Muddaragama', '11112'),
(117, 'Mabodale', '11114'),
(118, 'Ellakkala', '11116'),
(119, 'Attanagalla', '11120'),
(120, 'Alawala', '11122'),
(121, 'Urapola', '11126'),
(122, 'Nikahetikanda', '11128'),
(123, 'Rukmale', '11129'),
(124, 'Bopagama', '11134'),
(125, 'Ruggahawila', '11142'),
(126, 'Kahatowita', '11144'),
(127, 'Walgammulla', '11146'),
(128, 'Pallewela', '11150'),
(129, 'Kaleliya', '11160'),
(130, 'Mirigama', '11200'),
(131, 'Loluwagoda', '11204'),
(132, 'Kitalawalana', '11206'),
(133, 'Divuldeniya', '11208'),
(134, 'Ambepussa', '11212'),
(135, 'Pamunuwatta', '11214'),
(136, 'Bokalagama', '11216'),
(137, 'Nawana', '11222'),
(138, 'Kaluaggala', '11224'),
(139, 'Walpita', '11226'),
(140, 'Delwagura', '11228'),
(141, 'Kotadeniyawa', '11232'),
(142, 'Mellawagedara', '11234'),
(143, 'Kitulwala', '11242'),
(144, 'Banduragoda', '11244'),
(145, 'Divulapitiya', '11250'),
(146, 'Marandagahamula', '11260'),
(147, 'Hunumulla', '11262'),
(148, 'Dunagaha', '11264'),
(149, 'Ihala Madampella', '11265'),
(150, 'Demanhandiya', '11270'),
(151, 'Kandana', '11320'),
(152, 'Polpithimukulana', '11324'),
(153, 'Uswetakeiyawa', '11328'),
(154, 'Ja-Ela', '11350'),
(155, 'Niwandama', '11354'),
(156, 'Makewita', '11358'),
(157, 'Pamunugama', '11370'),
(158, 'Ekala', '11380'),
(159, 'Kotugoda', '11390'),
(160, 'Raddolugama', '11400'),
(161, 'Seeduwa', '11410'),
(162, 'Katunayake(FTZ)', '11420'),
(163, 'Katunayake Air Force Camp', '11440'),
(164, 'Talahena', '11504'),
(165, 'Kimbulapitiya', '11522'),
(166, 'Dagonna', '11524'),
(167, 'Katuwellegama', '11526'),
(168, 'Thimbirigaskatuwa', '11532'),
(169, 'Katana', '11534'),
(170, 'Akaragama', '11536'),
(171, 'Badalgama', '11538'),
(172, 'Minuwangoda', '11550'),
(173, 'Andiambalama', '11558'),
(174, 'Wegowwa', '11562'),
(175, 'Horampella', '11564'),
(176, 'Yatiyana(WP)', '11566'),
(177, 'Hinatiyana Madawala', '11568'),
(178, 'Kelaniya', '11600'),
(179, 'Siyambalape', '11607'),
(180, 'Heiyanthuduwa', '11618'),
(181, 'GonawalaWP', '11630'),
(182, 'Makola', '11640'),
(183, 'Biyagama', '11650'),
(184, 'Malwana', '11670'),
(185, 'Biyagama IPZ', '11672'),
(186, 'Dompe', '11680'),
(187, 'Dekatana', '11690'),
(188, 'Demalagama', '11692'),
(189, 'Delgoda', '11700'),
(190, 'Weliveriya', '11710'),
(191, 'Henegama', '11715'),
(192, 'Buthpitiya', '11720'),
(193, 'Wathurugama', '11724'),
(194, 'Radawana', '11725'),
(195, 'Kirindiwela', '11730'),
(196, 'Hiswella', '11734'),
(197, 'Pepiliyawala', '11741'),
(198, 'Mithirigala', '11742'),
(199, 'Peliyagoda', '11830'),
(200, 'Kadawatha', '11850'),
(201, 'Imbulgoda', '11856'),
(202, 'Weboda', '11858'),
(203, 'Yakkala', '11870'),
(204, 'Kalagedihena', '11875'),
(205, 'Nittambuwa', '11880'),
(206, 'Debahera', '11889'),
(207, 'Pasyala', '11890'),
(208, 'Radawadunna', '11892'),
(209, 'Weweldeniya', '11894'),
(210, 'Danowita', '11896');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(15, 'Transparent'),
(16, 'Yellow'),
(17, 'Black'),
(18, 'White'),
(19, 'Blue '),
(20, 'Brown'),
(21, 'Orange');

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `id` int(11) NOT NULL,
  `condition` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`id`, `condition`) VALUES
(3, 'Used'),
(4, 'Brand New');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(27, 'Ampara District'),
(28, 'Anuradhapura District'),
(29, 'Badulla District'),
(30, 'Batticaloa District'),
(31, 'Colombo District'),
(32, 'Galle District'),
(33, 'Gampaha District'),
(34, 'Hambantota District'),
(35, 'Jaffna District'),
(36, 'Kachcheri'),
(37, 'Kalutara District'),
(38, 'Kandy District'),
(39, 'Kegalle District'),
(40, 'Kilinochchi District'),
(41, 'Kurunegala District'),
(42, 'Mannar District'),
(43, 'Matale District'),
(44, 'Matara District'),
(45, 'Monaragala District'),
(46, 'Mullaitivu District'),
(47, 'Nuwara Eliya District'),
(48, 'Polonnaruwa District'),
(49, 'Puttalam District'),
(50, 'Ratnapura District'),
(51, 'Trincomalee District'),
(52, 'Vavuniya District'),
(53, 'Non');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feed` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(3, 'Male'),
(4, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `code` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_id` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city_id`, `province_id`, `district_id`) VALUES
(13, 210, 20, 53),
(14, 10, 20, 53),
(15, 11, 20, 53),
(16, 12, 20, 53),
(17, 13, 20, 53),
(18, 14, 20, 53),
(19, 15, 20, 53),
(20, 16, 20, 53),
(21, 17, 20, 53),
(22, 18, 20, 53),
(23, 19, 20, 53),
(24, 20, 20, 53),
(25, 21, 20, 53),
(26, 22, 20, 53),
(27, 23, 20, 53),
(28, 24, 20, 53),
(29, 25, 20, 53),
(30, 26, 20, 53),
(31, 27, 20, 53),
(32, 28, 20, 53),
(33, 29, 20, 53),
(34, 30, 20, 53),
(35, 31, 20, 53),
(36, 32, 20, 53),
(37, 33, 20, 53),
(38, 34, 20, 53),
(39, 35, 20, 53),
(40, 36, 20, 53),
(41, 37, 20, 53),
(42, 38, 20, 53),
(43, 39, 20, 53),
(44, 40, 20, 53),
(45, 41, 20, 53),
(46, 42, 20, 53),
(47, 43, 20, 53),
(48, 44, 20, 53),
(49, 45, 20, 53),
(50, 46, 20, 53),
(51, 47, 20, 53),
(52, 48, 20, 53),
(53, 49, 20, 53),
(54, 50, 20, 53),
(55, 51, 20, 53),
(56, 52, 20, 53),
(57, 53, 20, 53),
(58, 54, 20, 53),
(59, 55, 20, 53),
(60, 56, 20, 53),
(61, 57, 20, 53),
(62, 58, 20, 53),
(63, 59, 20, 53),
(64, 60, 20, 53),
(65, 61, 20, 53),
(66, 62, 20, 53),
(67, 63, 20, 53),
(68, 64, 20, 53),
(69, 65, 20, 53),
(70, 66, 20, 53),
(71, 67, 20, 53),
(72, 68, 20, 53),
(73, 69, 20, 53),
(74, 70, 20, 53),
(75, 71, 20, 53),
(76, 72, 20, 53),
(77, 73, 20, 53),
(78, 74, 20, 53),
(79, 75, 20, 53),
(80, 76, 20, 53),
(81, 77, 20, 53),
(82, 78, 20, 53),
(83, 79, 20, 53),
(84, 80, 20, 53),
(85, 81, 20, 53),
(86, 82, 20, 53),
(87, 83, 20, 53),
(88, 84, 20, 53),
(89, 85, 20, 53),
(90, 86, 20, 53),
(91, 87, 20, 53),
(92, 88, 20, 53),
(93, 89, 20, 53),
(94, 90, 20, 53),
(95, 91, 20, 53),
(96, 92, 20, 53),
(97, 93, 20, 53),
(98, 94, 20, 53),
(99, 95, 20, 53),
(100, 96, 20, 53),
(101, 97, 20, 53),
(102, 98, 20, 53),
(103, 99, 20, 53),
(104, 100, 20, 53),
(105, 101, 20, 53),
(106, 102, 20, 53),
(107, 103, 20, 53),
(108, 104, 20, 53),
(109, 105, 20, 53),
(110, 106, 20, 53),
(111, 107, 20, 53),
(112, 108, 20, 53),
(113, 109, 20, 53),
(114, 110, 20, 53),
(115, 111, 20, 53),
(116, 112, 20, 53),
(117, 113, 20, 53),
(118, 114, 20, 53),
(119, 115, 20, 53),
(120, 116, 20, 53),
(121, 117, 20, 53),
(122, 118, 20, 53),
(123, 119, 20, 53),
(124, 120, 20, 53),
(125, 121, 20, 53),
(126, 122, 20, 53),
(127, 123, 20, 53),
(128, 124, 20, 53),
(129, 125, 20, 53),
(130, 126, 20, 53),
(131, 127, 20, 53),
(132, 128, 20, 53),
(133, 129, 20, 53),
(134, 130, 20, 53),
(135, 131, 20, 53),
(136, 132, 20, 53),
(137, 133, 20, 53),
(138, 134, 20, 53),
(139, 135, 20, 53),
(140, 136, 20, 53),
(141, 137, 20, 53),
(142, 138, 20, 53),
(143, 139, 20, 53),
(144, 140, 20, 53),
(145, 141, 20, 53),
(146, 142, 20, 53),
(147, 143, 20, 53),
(148, 144, 20, 53),
(149, 145, 20, 53),
(150, 146, 20, 53),
(151, 147, 20, 53),
(152, 148, 20, 53),
(153, 149, 20, 53),
(154, 150, 20, 53),
(155, 151, 20, 53),
(156, 152, 20, 53),
(157, 153, 20, 53),
(158, 154, 20, 53),
(159, 155, 20, 53),
(160, 156, 20, 53),
(161, 157, 20, 53),
(162, 158, 20, 53),
(163, 159, 20, 53),
(164, 160, 20, 53),
(165, 161, 20, 53),
(166, 162, 20, 53),
(167, 163, 20, 53),
(168, 164, 20, 53),
(169, 165, 20, 53),
(170, 166, 20, 53),
(171, 167, 20, 53),
(172, 168, 20, 53),
(173, 169, 20, 53),
(174, 170, 20, 53),
(175, 171, 20, 53),
(176, 172, 20, 53),
(177, 173, 20, 53),
(178, 174, 20, 53),
(179, 175, 20, 53),
(180, 176, 20, 53),
(181, 177, 20, 53),
(182, 178, 20, 53),
(183, 179, 20, 53),
(184, 180, 20, 53),
(185, 181, 20, 53),
(186, 182, 20, 53),
(187, 183, 20, 53),
(188, 184, 20, 53),
(189, 185, 20, 53),
(190, 186, 20, 53),
(191, 187, 20, 53),
(192, 188, 20, 53),
(193, 189, 20, 53),
(194, 190, 20, 53),
(195, 191, 20, 53),
(196, 192, 20, 53),
(197, 193, 20, 53),
(198, 194, 20, 53),
(199, 195, 20, 53),
(200, 196, 20, 53),
(201, 197, 20, 53),
(202, 198, 20, 53),
(203, 199, 20, 53),
(204, 200, 20, 53),
(205, 201, 20, 53),
(206, 202, 20, 53),
(207, 203, 20, 53),
(208, 204, 20, 53),
(209, 205, 20, 53),
(210, 206, 20, 53),
(211, 207, 20, 53),
(212, 208, 20, 53),
(213, 209, 20, 53);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`) VALUES
(12, 'Brand New');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` text DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `color_id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `condition_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `date_time_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(11, 'Central Province'),
(12, 'Eastern Province'),
(13, 'North Central Province'),
(14, 'Northern Province'),
(15, 'North Western Province'),
(16, 'Sabaragamuwa'),
(17, 'Southern Province'),
(18, 'Uva'),
(19, 'Western Province'),
(20, 'Non');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'active'),
(2, 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `gender_id` int(11) NOT NULL,
  `verification_code` varchar(23) DEFAULT 'NO',
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `first_name`, `last_name`, `password`, `mobile`, `register_date`, `status`, `gender_id`, `verification_code`, `image`) VALUES
('110k10@gmail.com', 'sdfdsfsf', 'sdfsdfsd', '123456', '0759058519', '2023-11-12 09:23:47', 2, 4, 'NULL', 'NULL'),
('110kanishkamedankara110@gmail.com', 'kanishka', 'medankara', '1234', '0759058519', '2023-05-10 16:27:15', 2, 3, 'NULL', 'NULL'),
('110kqnishkamedankara110@gmail.com', 'Kanishka', 'Medankara', '123', '0759058519', '2023-05-10 06:05:01', 1, 3, '65508321bde5a', 'userprofileimg//6547c5fcb5b1fhouse_by_the_lake_drawing-wallpaper-1920x1080.jpg'),
('amisha.upamada@gmail.com', 'Amisha', 'Gunawardana', 'aA@0773406692', '0773406692', '2023-11-18 12:16:51', 1, 3, '6561e0aa2dd17', 'NULL'),
('dinathhansana@gmail.com', 'Dinath', 'Hansana', '@kaveeshanethmi', '0714028963', '2023-12-27 04:52:32', 1, 3, 'NULL', 'NULL'),
('harshacib@gmail.com', 'Harsha', 'Ruwan', 'redrose143', '0775465757', '2023-12-07 09:07:17', 1, 3, 'NULL', 'NULL'),
('hello@isuruchandimal.me', 'Isuru ', 'Chandima ', '123isuru', '0769433686', '2023-11-19 17:09:53', 1, 3, 'NULL', 'NULL'),
('hellodynamicbiz@gmail.com', 'chandrika', 'de alwis', 'adoado', '0771595864', '2023-11-19 17:18:08', 2, 4, 'NULL', 'NULL'),
('isuruchandimal352@gmail.com', 'Isuru', 'Chandimal', '123isuru123', '0767881286', '2023-11-19 02:23:42', 1, 3, '656735d3c9b12', 'NULL'),
('nimsaramahagedara@gmail.com', 'Dilruk', 'Mahagedara', 'Nimsara2000', '0763355762', '2023-11-26 13:55:42', 1, 3, 'NULL', 'NULL'),
('pubududeepamal98@gmail.com', 'pubudu', 'Deepamal', '2000928Pubudu', '0763872179', '2023-11-28 14:11:02', 2, 3, 'NULL', 'NULL'),
('ravindudissanayake3@gmail.com', 'Ravindu', 'Dissanayake', 'omanmars', '0715582961', '2023-11-12 13:43:27', 1, 3, '655afdf054ea6', 'NULL'),
('ruwanjayrathne2@gmail.com', 'ruwan', 'jayarathne', 'abc@123', '0773060650', '2024-08-16 13:11:45', 1, 3, 'NULL', 'NULL'),
('sathsara2000@gmail.com', 'Sathsara', 'Wijekulasuriya', 'Sathsara', '0775657687', '2023-11-28 15:24:27', 1, 3, 'NULL', 'NULL'),
('test@gmail.com', 'test', 'test', '1234', '0705715007', '2023-11-12 12:59:53', 2, 3, 'NULL', 'userprofileimg//6550ccea8d52bScreenshot (12).png');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_address`
--

CREATE TABLE `user_has_address` (
  `id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `line1` text DEFAULT NULL,
  `line2` text DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user_has_address`
--

INSERT INTO `user_has_address` (`id`, `user_email`, `line1`, `line2`, `location_id`) VALUES
(17, '110kqnishkamedankara110@gmail.com', 'No115', 'bokotewatta', 14);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_product1_idx` (`product_id`),
  ADD KEY `fk_cart_user1_idx` (`user_email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chat_user1_idx` (`from`),
  ADD KEY `fk_chat_user2_idx` (`to`),
  ADD KEY `fk_chat_status1_idx` (`status_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feedback_user1_idx` (`user_email`),
  ADD KEY `fk_feedback_product1_idx` (`product_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_images_product1_idx` (`product_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_user1_idx` (`user_email`),
  ADD KEY `fk_invoice_product1_idx` (`product_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_location_city1_idx` (`city_id`),
  ADD KEY `fk_location_province1_idx` (`province_id`),
  ADD KEY `fk_location_district1_idx` (`district_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_ status_invoice1_idx` (`invoice_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category1_idx` (`category_id`),
  ADD KEY `fk_product_color1_idx` (`color_id`),
  ADD KEY `fk_product_condition1_idx` (`condition_id`),
  ADD KEY `fk_product_status1_idx` (`status_id`),
  ADD KEY `fk_product_brand1_idx` (`brand_id`),
  ADD KEY `fk_product_model1_idx` (`model_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recent_user1_idx` (`user_email`),
  ADD KEY `fk_recent_product1_idx` (`product_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_user_gender_idx1` (`gender_id`);

--
-- Indexes for table `user_has_address`
--
ALTER TABLE `user_has_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_has_address_user1_idx` (`user_email`),
  ADD KEY `fk_user_has_address_location1_idx` (`location_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_watchlist_user1_idx` (`user_email`),
  ADD KEY `fk_watchlist_product1_idx` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_has_address`
--
ALTER TABLE `user_has_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_chat_user1` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `fk_chat_user2` FOREIGN KEY (`to`) REFERENCES `user` (`email`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_location_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `fk_location_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `fk_location_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `fk_order_ status_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  ADD CONSTRAINT `fk_product_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `recent`
--
ALTER TABLE `recent`
  ADD CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`);

--
-- Constraints for table `user_has_address`
--
ALTER TABLE `user_has_address`
  ADD CONSTRAINT `fk_user_has_address_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
