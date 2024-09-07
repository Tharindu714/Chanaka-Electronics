-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.32 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ceonline
CREATE DATABASE IF NOT EXISTS `ceonline` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ceonline`;

-- Dumping structure for table ceonline.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `verification_code` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.admin: ~2 rows (approximately)
REPLACE INTO `admin` (`email`, `fname`, `lname`, `verification_code`) VALUES
	('chanakaelectro@gmail.com', 'Chanaka', 'Electronics', '66d5c9e4d33d7'),
	('tharinduchanaka6@gmail.com', 'Tharindu', 'Chanaka', '66dc962a7acd8');

-- Dumping structure for table ceonline.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  KEY `fk_cart_product1_idx` (`product_id`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.cart: ~0 rows (approximately)

-- Dumping structure for table ceonline.category
CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `path` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`c_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.category: ~3 rows (approximately)
REPLACE INTO `category` (`c_id`, `name`, `path`) VALUES
	(1, 'Electronics', 'category/electronic.jpg'),
	(2, 'Electricals', 'category/electrical.jpg'),
	(3, 'Spare Parts', 'category/spareparts.png');

-- Dumping structure for table ceonline.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int NOT NULL,
  `toadmin` varchar(100) NOT NULL,
  `fromuser` varchar(100) NOT NULL,
  PRIMARY KEY (`chat_id`),
  KEY `fk_Chat_user1_idx` (`fromuser`),
  CONSTRAINT `fk_Chat_user1` FOREIGN KEY (`fromuser`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.chat: ~3 rows (approximately)
REPLACE INTO `chat` (`chat_id`, `message`, `datetime`, `status`, `toadmin`, `fromuser`) VALUES
	(1, 'Hello Admin', '2024-06-23 17:08:40', 1, 'chanakaelectro@gmail.com', 'sadeeshanilakshi25@gmail.com'),
	(7, 'I am Tharindu', '2024-06-23 21:33:25', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(17, 'Hellooo There', '2024-06-23 23:18:05', 1, 'chanakaelectro@gmail.com', 'shehanjsmmaleesha@gmail.com'),
	(18, 'hello I am new here', '2024-06-24 17:22:53', 1, 'chanakaelectro@gmail.com', 'kasunijayamali.kj@gmail.com'),
	(19, 'Hi I am in a viva', '2024-06-28 08:46:08', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(20, 'hello afternoon', '2024-07-04 15:00:29', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com');

-- Dumping structure for table ceonline.chat2
CREATE TABLE IF NOT EXISTS `chat2` (
  `chat2_id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int NOT NULL,
  `Fromadmin` varchar(100) NOT NULL,
  `touser` varchar(100) NOT NULL,
  PRIMARY KEY (`chat2_id`),
  KEY `fk_chat2_user1_idx` (`touser`),
  CONSTRAINT `fk_chat2_user1` FOREIGN KEY (`touser`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.chat2: ~4 rows (approximately)
REPLACE INTO `chat2` (`chat2_id`, `message`, `datetime`, `status`, `Fromadmin`, `touser`) VALUES
	(1, 'Hello ! User', '2024-06-23 17:49:18', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(2, 'Hello ! Sadee', '2024-06-23 17:49:43', 1, 'chanakaelectro@gmail.com', 'sadeeshanilakshi25@gmail.com'),
	(7, 'hello maleesha', '2024-06-24 17:01:11', 1, 'chanakaelectro@gmail.com', 'shehanjsmmaleesha@gmail.com'),
	(8, 'how you doing', '2024-06-24 17:03:30', 1, 'chanakaelectro@gmail.com', 'sadeeshanilakshi25@gmail.com');

-- Dumping structure for table ceonline.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.city: ~11 rows (approximately)
REPLACE INTO `city` (`id`, `city_name`, `district_id`) VALUES
	(1, 'Bandaraweala', 1),
	(2, 'Badulla', 1),
	(3, 'Bogahamadiththa', 1),
	(4, 'Haliela', 1),
	(5, 'Welimada', 1),
	(6, 'Koslanda', 1),
	(7, 'Nugegoda', 3),
	(8, 'Colombo', 3),
	(9, 'Pitakotte', 3),
	(10, 'Athurugiriya', 3),
	(11, 'Dompe', 3),
	(12, 'Kaluphana', 1);

-- Dumping structure for table ceonline.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `district_name` varchar(45) NOT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.district: ~8 rows (approximately)
REPLACE INTO `district` (`id`, `district_name`, `province_id`) VALUES
	(1, 'Badulla', 1),
	(2, 'Monaragala', 1),
	(3, 'Colombo', 2),
	(4, 'Gampaha', 2),
	(5, 'Kaluthara', 2),
	(6, 'Mathara', 4),
	(7, 'Galle', 4),
	(8, 'Mathale', 9);

-- Dumping structure for table ceonline.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `feed_id` int NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL DEFAULT '0',
  `feedback` text NOT NULL,
  `date` date NOT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `Feed_status` int NOT NULL,
  PRIMARY KEY (`feed_id`) USING BTREE,
  KEY `fk_feedback_product1_idx` (`product_id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.feedback: ~0 rows (approximately)

-- Dumping structure for table ceonline.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.gender: ~2 rows (approximately)
REPLACE INTO `gender` (`id`, `gender_name`) VALUES
	(1, 'Male'),
	(2, 'Female'),
	(3, 'Neutual');

-- Dumping structure for table ceonline.image
CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(150) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`img_id`) USING BTREE,
  KEY `fk_image_product1_idx` (`product_id`),
  CONSTRAINT `fk_image_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=493 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.image: ~354 rows (approximately)
REPLACE INTO `image` (`img_id`, `code`, `product_id`) VALUES
	(133, 'category//Product//JOKADE Quick Charger Black 3A_0_66d5cd7ca02a6.jpeg', 11),
	(134, 'category//Product//JOKADE Quick Charger Black 3A_1_66d5cd7ca1490.jpeg', 11),
	(135, 'category//Product//JOKADE Quick Charger Black 3A_2_66d5cd7ca1ed3.jpeg', 11),
	(136, 'category//Product//7 Inch RearView Monitor_0_66d5ce1d9dc0b.jpeg', 12),
	(137, 'category//Product//7 Inch RearView Monitor_1_66d5ce1d9ea98.jpeg', 12),
	(138, 'category//Product//7 Inch RearView Monitor_2_66d5ce1d9f888.jpeg', 12),
	(139, 'category//Product//7 Inch RearView Monitor_3_66d5ce1da0798.jpeg', 12),
	(140, 'category//Product//7 Inch RearView Monitor_4_66d5ce1da1568.jpeg', 12),
	(141, 'category//Product//AHUJA Headband Microphones_0_66d5cea3ac61b.jpeg', 13),
	(142, 'category//Product//AHUJA Headband Microphones_1_66d5cea3ad30e.jpeg', 13),
	(143, 'category//Product//AHUJA Headband Microphones_2_66d5cea3ae113.jpeg', 13),
	(144, 'category//Product//AHUJA Headband Microphones_3_66d5cea3aea2c.jpeg', 13),
	(145, 'category//Product//AHUJA Headband Microphones_4_66d5cea3af7c4.jpeg', 13),
	(146, 'category//Product//AHUJA Headband Microphones_5_66d5cea3b0182.jpeg', 13),
	(147, 'category//Product//Car Rear View Camera_0_66d5cf375b959.jpeg', 14),
	(148, 'category//Product//Car Rear View Camera_1_66d5cf375c944.jpeg', 14),
	(149, 'category//Product//Car Rear View Camera_2_66d5cf375d343.jpeg', 14),
	(150, 'category//Product//Car Rear View Camera_3_66d5cf375e137.jpeg', 14),
	(151, 'category//Product//Car Rear View Camera_4_66d5cf375ead3.jpeg', 14),
	(152, 'category//Product//Car Rear View Camera_5_66d5cf375f80b.jpeg', 14),
	(153, 'category//Product//Digital Clamp Meter_0_66d5d098a6352.jpeg', 15),
	(154, 'category//Product//Digital Clamp Meter_1_66d5d098a718f.jpeg', 15),
	(155, 'category//Product//Digital Clamp Meter_2_66d5d098a7c87.jpeg', 15),
	(156, 'category//Product//Digital Clamp Meter_3_66d5d098a8985.jpeg', 15),
	(157, 'category//Product//Digital Clamp Meter_4_66d5d098a92ec.jpeg', 15),
	(158, 'category//Product//Digital Clamp Meter_5_66d5d098a9ffd.jpeg', 15),
	(159, 'category//Product//Digital Multimeter 830B_0_66d5d1255b3b2.jpeg', 16),
	(160, 'category//Product//Digital Multimeter 830B_1_66d5d1255bdfe.jpeg', 16),
	(161, 'category//Product//Digital Multimeter 830B_2_66d5d1255cba1.jpeg', 16),
	(162, 'category//Product//Digital Multimeter 830B_3_66d5d1255d626.jpeg', 16),
	(163, 'category//Product//Digital Multimeter 830B_4_66d5d1255e354.jpeg', 16),
	(164, 'category//Product//Digital Multimeter 830B_5_66d5d1255eca4.jpeg', 16),
	(165, 'category//Product//Digital Multimeter DT-9205E_0_66d5d18d0fc7b.jpeg', 17),
	(166, 'category//Product//Digital Multimeter DT-9205E_1_66d5d18d106b6.jpeg', 17),
	(167, 'category//Product//Digital Multimeter DT-9205E_2_66d5d18d116fa.jpeg', 17),
	(168, 'category//Product//Digital Multimeter DT-9205E_3_66d5d18d12172.jpeg', 17),
	(169, 'category//Product//Digital Multimeter DT-9205E_4_66d5d18d12f20.jpeg', 17),
	(170, 'category//Product//Digital Multimeter DT-700D_0_66d5d2019c7ad.jpeg', 18),
	(171, 'category//Product//Digital Multimeter DT-700D_1_66d5d2019d70b.jpeg', 18),
	(172, 'category//Product//Digital Multimeter DT-700D_2_66d5d2019e2e6.jpeg', 18),
	(173, 'category//Product//Digital Multimeter DT-700D_3_66d5d2019f070.jpeg', 18),
	(174, 'category//Product//Digital Multimeter DT-700D_4_66d5d2019fa05.jpeg', 18),
	(175, 'category//Product//Digital Multimeter MF47C_0_66d5d29b424cb.jpeg', 19),
	(176, 'category//Product//Digital Multimeter MF47C_1_66d5d29b43359.jpeg', 19),
	(177, 'category//Product//Digital Multimeter MF47C_2_66d5d29b43ddd.jpeg', 19),
	(178, 'category//Product//Digital Multimeter MF47C_3_66d5d29b44b9d.jpeg', 19),
	(179, 'category//Product//Digital Multimeter MF47C_4_66d5d29b4555c.jpeg', 19),
	(180, 'category//Product//Digital Multimeter MF47C_5_66d5d29b46413.jpeg', 19),
	(181, 'category//Product//Digital Multimeter DT9205A_0_66d5d389869e5.jpeg', 20),
	(182, 'category//Product//Digital Multimeter DT9205A_1_66d5d38987479.jpeg', 20),
	(183, 'category//Product//Digital Multimeter DT9205A_2_66d5d389882e5.jpeg', 20),
	(184, 'category//Product//Digital Multimeter DT9205A_3_66d5d38988c4b.jpeg', 20),
	(185, 'category//Product//Digital Multimeter DT9205A_4_66d5d389899a2.jpeg', 20),
	(186, 'category//Product//Digital Multimeter UT33 +B _0_66d5d3d91c66a.jpeg', 21),
	(187, 'category//Product//Digital Multimeter UT33 +B _1_66d5d3d91d508.jpeg', 21),
	(188, 'category//Product//Digital Multimeter UT33 +B _2_66d5d3d91dfb9.jpeg', 21),
	(189, 'category//Product//Digital Multimeter UT33 +B _3_66d5d3d91ed5c.jpeg', 21),
	(190, 'category//Product//Digital Multimeter UT33 +B _4_66d5d3d91f6e7.jpeg', 21),
	(191, 'category//Product//Digital Multimeter UT33 +B _5_66d5d3d920416.jpeg', 21),
	(192, 'category//Product//Free Power Professional Microphone_0_66d5d44638192.jpeg', 22),
	(193, 'category//Product//Free Power Professional Microphone_1_66d5d44638fb5.jpeg', 22),
	(194, 'category//Product//Free Power Professional Microphone_2_66d5d44639a08.jpeg', 22),
	(195, 'category//Product//Free Power Professional Microphone_3_66d5d4463a9c1.jpeg', 22),
	(196, 'category//Product//Free Power Professional Microphone_4_66d5d4463b30e.jpeg', 22),
	(197, 'category//Product//Green Laser Pointer YL 303_0_66d5d47f4dbf2.jpeg', 23),
	(198, 'category//Product//Green Laser Pointer YL 303_1_66d5d47f4ea20.jpeg', 23),
	(199, 'category//Product//Green Laser Pointer YL 303_2_66d5d47f4f7e7.jpeg', 23),
	(200, 'category//Product//Green Laser Pointer YL 303_3_66d5d47f504cc.jpeg', 23),
	(201, 'category//Product//Green Laser Pointer YL 303_4_66d5d47f511be.jpeg', 23),
	(202, 'category//Product//Green Laser Pointer YL 303_5_66d5d47f51e4f.jpeg', 23),
	(203, 'category//Product//KeyChain Light Rechargeable_0_66d5d4d48f584.jpeg', 24),
	(204, 'category//Product//KeyChain Light Rechargeable_1_66d5d4d490609.jpeg', 24),
	(205, 'category//Product//KeyChain Light Rechargeable_2_66d5d4d491495.jpeg', 24),
	(206, 'category//Product//KeyChain Light Rechargeable_3_66d5d4d491ece.jpeg', 24),
	(207, 'category//Product//KeyChain Light Rechargeable_4_66d5d4d492d76.jpeg', 24),
	(208, 'category//Product//Motorcycle Anti-Theft Device_0_66d5d520a6efa.jpeg', 25),
	(209, 'category//Product//Motorcycle Anti-Theft Device_1_66d5d520a78dc.jpeg', 25),
	(210, 'category//Product//Motorcycle Anti-Theft Device_2_66d5d520a86b9.jpeg', 25),
	(211, 'category//Product//Motorcycle Anti-Theft Device_3_66d5d520a90fe.jpeg', 25),
	(212, 'category//Product//Motorcycle Anti-Theft Device_4_66d5d520a9f29.jpeg', 25),
	(213, 'category//Product//Motorcycle Anti-Theft Device_5_66d5d520aa88f.jpeg', 25),
	(214, 'category//Product//Solar Pump JD 12V_0_66d5d56151e2a.jpeg', 26),
	(215, 'category//Product//Solar Pump JD 12V_1_66d5d56152cbb.jpeg', 26),
	(216, 'category//Product//Solar Pump JD 12V_2_66d5d56153725.jpeg', 26),
	(217, 'category//Product//Solar Pump JD 12V_3_66d5d56154671.jpeg', 26),
	(218, 'category//Product//Solar Pump JD 12V_4_66d5d56155056.jpeg', 26),
	(219, 'category//Product//Programmable Timer Din Rail_0_66d5d5dc45cb7.jpeg', 27),
	(220, 'category//Product//Programmable Timer Din Rail_1_66d5d5dc4675d.jpeg', 27),
	(221, 'category//Product//Programmable Timer Din Rail_2_66d5d5dc47515.jpeg', 27),
	(222, 'category//Product//Programmable Timer Din Rail_3_66d5d5dc47efe.jpeg', 27),
	(223, 'category//Product//Digital Multimeter UT 33+A_0_66d5d618ea33e.jpeg', 28),
	(224, 'category//Product//Digital Multimeter UT 33+A_1_66d5d618eb147.jpeg', 28),
	(225, 'category//Product//Digital Multimeter UT 33+A_2_66d5d618ebb5d.jpeg', 28),
	(226, 'category//Product//Digital Multimeter UT 33+A_3_66d5d618ec91f.jpeg', 28),
	(227, 'category//Product//Digital Multimeter UT 33+A_4_66d5d618ed363.jpeg', 28),
	(228, 'category//Product//Digital Multimeter UT 33+A_5_66d5d618ee0f2.jpeg', 28),
	(229, 'category//Product//JBL 68S Vocal Microphone_0_66d5d65c93fbb.jpeg', 29),
	(230, 'category//Product//JBL 68S Vocal Microphone_1_66d5d65c94f01.jpeg', 29),
	(231, 'category//Product//JBL 68S Vocal Microphone_2_66d5d65c959bf.jpeg', 29),
	(232, 'category//Product//JBL 68S Vocal Microphone_3_66d5d65c96956.jpeg', 29),
	(233, 'category//Product//JBL 68S Vocal Microphone_4_66d5d65c972e5.jpeg', 29),
	(234, 'category//Product//Wireless Earbud – Tallplus AirPro 2_0_66d5d6a438269.jpeg', 30),
	(235, 'category//Product//Wireless Earbud – Tallplus AirPro 2_1_66d5d6a438c80.jpeg', 30),
	(236, 'category//Product//Wireless Earbud – Tallplus AirPro 2_2_66d5d6a439c17.jpeg', 30),
	(237, 'category//Product//Wireless Earbud – Tallplus AirPro 2_3_66d5d6a43a6fb.jpeg', 30),
	(238, 'category//Product//Wireless Earbud – Tallplus AirPro 2_4_66d5d6a43b45b.jpeg', 30),
	(239, 'category//Product//Mini Flexible Waterproof Keyboard_0_66d6f5c7d5109.jpeg', 31),
	(240, 'category//Product//Mini Flexible Waterproof Keyboard_1_66d6f5c7d5d66.jpeg', 31),
	(241, 'category//Product//Mini Flexible Waterproof Keyboard_2_66d6f5c7d6be6.jpeg', 31),
	(242, 'category//Product//Mini Flexible Waterproof Keyboard_3_66d6f5c7d7471.jpeg', 31),
	(243, 'category//Product//Mini Flexible Waterproof Keyboard_4_66d6f5c7d8212.jpeg', 31),
	(244, 'category//Product//Mini Flexible Waterproof Keyboard_5_66d6f5c7d89d2.jpeg', 31),
	(245, 'category//Product//JOKADE JD014 wired headset_0_66d6f686cae3c.jpeg', 32),
	(246, 'category//Product//JOKADE JD014 wired headset_1_66d6f686cc766.jpeg', 32),
	(247, 'category//Product//JOKADE JD014 wired headset_2_66d6f686cd1d3.jpeg', 32),
	(248, 'category//Product//JOKADE JD014 wired headset_3_66d6f686cdf0e.jpeg', 32),
	(249, 'category//Product//JOKADE JD014 wired headset_4_66d6f686ceca5.jpeg', 32),
	(250, 'category//Product//JOKADE JD014 wired headset_5_66d6f686cf8ae.jpeg', 32),
	(251, 'category//Product//KSC-703 Wired Gaming Headset_0_66d6f73b8b625.jpeg', 33),
	(252, 'category//Product//KSC-703 Wired Gaming Headset_1_66d6f73b8c7ea.jpeg', 33),
	(253, 'category//Product//KSC-703 Wired Gaming Headset_2_66d6f73b8d174.jpeg', 33),
	(254, 'category//Product//KSC-703 Wired Gaming Headset_3_66d6f73b8de54.jpeg', 33),
	(255, 'category//Product//KSC-703 Wired Gaming Headset_4_66d6f73b8e74e.jpeg', 33),
	(256, 'category//Product//KSC-703 Wired Gaming Headset_5_66d6f73b8f453.jpeg', 33),
	(257, 'category//Product//On-Ear Headphone (ControlTalk Monster Beats)_0_66d6fa8e3b702.jpeg', 34),
	(258, 'category//Product//On-Ear Headphone (ControlTalk Monster Beats)_1_66d6fa8e3c69b.jpeg', 34),
	(259, 'category//Product//On-Ear Headphone (ControlTalk Monster Beats)_2_66d6fa8e3d484.jpeg', 34),
	(260, 'category//Product//On-Ear Headphone (ControlTalk Monster Beats)_3_66d6fa8e3ddc9.jpeg', 34),
	(261, 'category//Product//On-Ear Headphone (ControlTalk Monster Beats)_4_66d6fa8e3eaea.jpeg', 34),
	(262, 'category//Product//On-Ear Headphone (ControlTalk Monster Beats)_5_66d6fa8e3f74d.jpeg', 34),
	(263, 'category//Product//V380 Dual Lens PTZ Wi-Fi Camera_0_66d6fce5ae3f5.jpeg', 35),
	(264, 'category//Product//V380 Dual Lens PTZ Wi-Fi Camera_1_66d6fce5af1bc.jpeg', 35),
	(265, 'category//Product//V380 Dual Lens PTZ Wi-Fi Camera_2_66d6fce5afb61.jpeg', 35),
	(266, 'category//Product//V380 Dual Lens PTZ Wi-Fi Camera_3_66d6fce5b0919.jpeg', 35),
	(267, 'category//Product//V380 Dual Lens PTZ Wi-Fi Camera_4_66d6fce5b12ca.jpeg', 35),
	(268, 'category//Product//V380 Dual Lens PTZ Wi-Fi Camera_5_66d6fce5b2084.jpeg', 35),
	(269, 'category//Product//Fridge Guard Voltage Protection_0_66d72d7304e91.jpeg', 36),
	(270, 'category//Product//Fridge Guard Voltage Protection_1_66d72d730572e.jpeg', 36),
	(271, 'category//Product//Fridge Guard Voltage Protection_2_66d72d730644b.jpeg', 36),
	(272, 'category//Product//Fridge Guard Voltage Protection_3_66d72d7306c92.jpeg', 36),
	(273, 'category//Product//Fridge Guard Voltage Protection_4_66d72d730784e.jpeg', 36),
	(274, 'category//Product//Fridge Guard Voltage Protection_5_66d72d7307fff.jpeg', 36),
	(275, 'category//Product//Kaier Horn (Snail Shaped)_0_66d72e209f229.jpeg', 37),
	(276, 'category//Product//Kaier Horn (Snail Shaped)_1_66d72e209fc06.jpeg', 37),
	(277, 'category//Product//Kaier Horn (Snail Shaped)_2_66d72e20a09d7.jpeg', 37),
	(278, 'category//Product//Kaier Horn (Snail Shaped)_3_66d72e20a11fb.jpeg', 37),
	(279, 'category//Product//Kaier Horn (Snail Shaped)_4_66d72e20a1c03.jpeg', 37),
	(280, 'category//Product//Kenwood Rear view Camera _0_66d72ffa815eb.jpeg', 38),
	(281, 'category//Product//Kenwood Rear view Camera _1_66d72ffa81fc0.jpeg', 38),
	(282, 'category//Product//Kenwood Rear view Camera _2_66d72ffa82d9e.jpeg', 38),
	(283, 'category//Product//Kenwood Rear view Camera _3_66d72ffa836de.jpeg', 38),
	(284, 'category//Product//Kenwood Rear view Camera _4_66d72ffa84410.jpeg', 38),
	(285, 'category//Product//Kenwood Rear view Camera _5_66d72ffa84db3.jpeg', 38),
	(286, 'category//Product//KNStar Pocket Radio_0_66d730890d287.jpeg', 39),
	(287, 'category//Product//KNStar Pocket Radio_1_66d7308911543.jpeg', 39),
	(288, 'category//Product//KNStar Pocket Radio_2_66d7308911fdc.jpeg', 39),
	(289, 'category//Product//KNStar Pocket Radio_3_66d7308912d70.jpeg', 39),
	(290, 'category//Product//KNStar Pocket Radio_4_66d73089136f1.jpeg', 39),
	(291, 'category//Product//KNStar Pocket Radio_5_66d730891446c.jpeg', 39),
	(292, 'category//Product//Portable multi Radio 3 inche_0_66d730f4c27c4.jpeg', 40),
	(293, 'category//Product//Portable multi Radio 3 inche_1_66d730f4c387e.jpeg', 40),
	(294, 'category//Product//Portable multi Radio 3 inche_2_66d730f4c4288.jpeg', 40),
	(295, 'category//Product//Portable multi Radio 3 inche_3_66d730f4c58c4.jpeg', 40),
	(296, 'category//Product//Portable multi Radio 3 inche_4_66d730f4c6627.jpeg', 40),
	(297, 'category//Product//Portable multi Radio 3 inche_5_66d730f4c6f6c.jpeg', 40),
	(298, 'category//Product//NOVA Hair Dryer _0_66d7315aec7d1.jpeg', 41),
	(299, 'category//Product//NOVA Hair Dryer _1_66d7315aed2c2.jpeg', 41),
	(300, 'category//Product//NOVA Hair Dryer _2_66d7315aee164.jpeg', 41),
	(301, 'category//Product//NOVA Hair Dryer _3_66d7315aeead9.jpeg', 41),
	(302, 'category//Product//NOVA Hair Dryer _4_66d7315aef784.jpeg', 41),
	(303, 'category//Product//NOVA Hair Dryer _5_66d7315af049d.jpeg', 41),
	(304, 'category//Product//Smart Wi-fi Camera V380_0_66d7329b2a7a6.jpeg', 42),
	(305, 'category//Product//Smart Wi-fi Camera V380_1_66d7329b2b1b8.jpeg', 42),
	(306, 'category//Product//Smart Wi-fi Camera V380_2_66d7329b2c282.jpeg', 42),
	(307, 'category//Product//Smart Wi-fi Camera V380_3_66d7329b2cc2c.jpeg', 42),
	(308, 'category//Product//Smart Wi-fi Camera V380_4_66d7329b2d8bd.jpeg', 42),
	(309, 'category//Product//Timer Programmable _0_66d73309b4a3e.jpeg', 43),
	(310, 'category//Product//Timer Programmable _1_66d73309b5843.jpeg', 43),
	(311, 'category//Product//Timer Programmable _2_66d73309b655a.jpeg', 43),
	(312, 'category//Product//Timer Programmable _3_66d73309b6e96.jpeg', 43),
	(313, 'category//Product//Timer Programmable _4_66d73309b7b1e.jpeg', 43),
	(314, 'category//Product//Timer Programmable _5_66d73309b8553.jpeg', 43),
	(315, 'category//Product//TV Guard Power Protection_0_66d7336a3cacd.jpeg', 44),
	(316, 'category//Product//TV Guard Power Protection_1_66d7336a3d9b4.jpeg', 44),
	(317, 'category//Product//TV Guard Power Protection_2_66d7336a3e38e.jpeg', 44),
	(318, 'category//Product//TV Guard Power Protection_3_66d7336a3f104.jpeg', 44),
	(319, 'category//Product//TV Guard Power Protection_4_66d7336a3fa60.jpeg', 44),
	(320, 'category//Product//TV Guard Power Protection_5_66d7336a4071e.jpeg', 44),
	(321, 'category//Product//Wireless Earbud Black_0_66d733bd5e966.jpeg', 45),
	(322, 'category//Product//Wireless Earbud Black_1_66d733bd5f73e.jpeg', 45),
	(323, 'category//Product//Wireless Earbud Black_2_66d733bd60050.jpeg', 45),
	(324, 'category//Product//Wireless Earbud Black_3_66d733bd60cf7.jpeg', 45),
	(325, 'category//Product//Wireless Earbud Black_4_66d733bd61619.jpeg', 45),
	(326, 'category//Product//Wireless Earbud Black_5_66d733bd622ee.jpeg', 45),
	(327, 'category//Product//Car Charger RECRSI CAR-01_0_66d9f5ed15629.jpeg', 46),
	(328, 'category//Product//Car Charger RECRSI CAR-01_1_66d9f5ed16581.jpeg', 46),
	(329, 'category//Product//Car Charger RECRSI CAR-01_2_66d9f5ed16d28.jpeg', 46),
	(330, 'category//Product//Car Charger RECRSI CAR-01_3_66d9f5ed17831.jpeg', 46),
	(331, 'category//Product//Car Charger RECRSI CAR-01_4_66d9f5ed17fb4.jpeg', 46),
	(332, 'category//Product//Quick Charging RECRSI CH-47_0_66d9f778baefb.jpeg', 47),
	(333, 'category//Product//Quick Charging RECRSI CH-47_1_66d9f778bbc09.jpeg', 47),
	(334, 'category//Product//Quick Charging RECRSI CH-47_2_66d9f778bc772.jpeg', 47),
	(335, 'category//Product//Quick Charging RECRSI CH-47_3_66d9f778bd319.jpeg', 47),
	(336, 'category//Product//Quick Charging RECRSI CH-47_4_66d9f778bda6a.jpeg', 47),
	(337, 'category//Product//LCD USB Charger_0_66d9f8588aa05.jpeg', 48),
	(338, 'category//Product//LCD USB Charger_1_66d9f8588fe6d.jpeg', 48),
	(339, 'category//Product//LCD USB Charger_2_66d9f85890632.jpeg', 48),
	(340, 'category//Product//LCD USB Charger_3_66d9f858911b1.jpeg', 48),
	(341, 'category//Product//iPhone mobile charger 5W _0_66d9fb40ea977.jpeg', 49),
	(342, 'category//Product//iPhone mobile charger 5W _1_66d9fb40eead6.jpeg', 49),
	(343, 'category//Product//iPhone mobile charger 5W _2_66d9fb40ef3ce.jpeg', 49),
	(344, 'category//Product//iPhone mobile charger 5W _3_66d9fb40efff1.jpeg', 49),
	(345, 'category//Product//iPhone mobile charger 5W _4_66d9fb40f0762.jpeg', 49),
	(346, 'category//Product//Car Charger High Quality RECRSI_0_66d9fd1ba64c4.jpeg', 50),
	(347, 'category//Product//Car Charger High Quality RECRSI_1_66d9fd1ba6d9a.jpeg', 50),
	(348, 'category//Product//Car Charger High Quality RECRSI_2_66d9fd1ba79d8.jpeg', 50),
	(349, 'category//Product//Car Charger High Quality RECRSI_3_66d9fd1ba8136.jpeg', 50),
	(350, 'category//Product//Car Charger High Quality RECRSI_4_66d9fd1ba910a.jpeg', 50),
	(351, 'category//Product//Car Charger High Quality RECRSI_5_66d9fd1ba98b7.jpeg', 50),
	(352, 'category//Product//Xiaomi Fast Charger 27W_0_66d9fe93ba07a.jpeg', 51),
	(353, 'category//Product//Xiaomi Fast Charger 27W_1_66d9fe93bb2cc.jpeg', 51),
	(354, 'category//Product//Xiaomi Fast Charger 27W_2_66d9fe93bc332.jpeg', 51),
	(355, 'category//Product//Xiaomi Fast Charger 27W_3_66d9fe93bd80f.jpeg', 51),
	(356, 'category//Product//RECRSI 68W Fast Charger_0_66d9ff3bc9f4a.jpeg', 52),
	(357, 'category//Product//RECRSI 68W Fast Charger_1_66d9ff3bcac88.jpeg', 52),
	(358, 'category//Product//RECRSI 68W Fast Charger_2_66d9ff3bcb3e5.jpeg', 52),
	(359, 'category//Product//RECRSI 68W Fast Charger_3_66d9ff3bcbef4.jpeg', 52),
	(360, 'category//Product//RECRSI 68W Fast Charger_4_66d9ff3bcc60c.jpeg', 52),
	(361, 'category//Product//RECRSI 68W Fast Charger_5_66d9ff3bcd119.jpeg', 52),
	(362, 'category//Product//SAMSUNG Turbo Charger Adapter_0_66da014803fa4.jpeg', 53),
	(363, 'category//Product//SAMSUNG Turbo Charger Adapter_1_66da014804ca2.jpeg', 53),
	(364, 'category//Product//SAMSUNG Turbo Charger Adapter_2_66da0148057d5.jpeg', 53),
	(365, 'category//Product//SAMSUNG Turbo Charger Adapter_3_66da0148062e4.jpeg', 53),
	(366, 'category//Product//SAMSUNG Turbo Charger Adapter_4_66da0148069e8.jpeg', 53),
	(367, 'category//Product//Bluetooth Speaker Mini Wireless Speaker_0_66db4f700bf65.jpeg', 54),
	(368, 'category//Product//Bluetooth Speaker Mini Wireless Speaker_1_66db4f700cb78.jpeg', 54),
	(369, 'category//Product//Bluetooth Speaker Mini Wireless Speaker_2_66db4f700d6c2.jpeg', 54),
	(370, 'category//Product//Bluetooth Speaker Mini Wireless Speaker_3_66db4f700de58.jpeg', 54),
	(371, 'category//Product//Bluetooth Speaker Mini Wireless Speaker_4_66db4f700e94c.jpeg', 54),
	(372, 'category//Product//Bluetooth Speaker Mini Wireless Speaker_5_66db4f700f09b.jpeg', 54),
	(373, 'category//Product//Digital LED Alarm Clock_0_66db50f3383f7.jpeg', 55),
	(374, 'category//Product//Digital LED Alarm Clock_1_66db50f339456.jpeg', 55),
	(375, 'category//Product//Digital LED Alarm Clock_2_66db50f339ea5.jpeg', 55),
	(376, 'category//Product//Digital LED Alarm Clock_3_66db50f33bdda.jpeg', 55),
	(377, 'category//Product//Digital LED Alarm Clock_4_66db50f33c69c.jpeg', 55),
	(378, 'category//Product//Digital LED Alarm Clock_5_66db50f33d2e0.jpeg', 55),
	(385, 'category//Product//Rechargeable Hair & Beard Trimmer_0_66db538873e9f.jpeg', 57),
	(386, 'category//Product//Rechargeable Hair & Beard Trimmer_1_66db53887497d.jpeg', 57),
	(387, 'category//Product//Rechargeable Hair & Beard Trimmer_2_66db5388756fb.jpeg', 57),
	(388, 'category//Product//Rechargeable Hair & Beard Trimmer_3_66db538876091.jpeg', 57),
	(389, 'category//Product//Rechargeable Hair & Beard Trimmer_4_66db538876d74.jpeg', 57),
	(390, 'category//Product//Rechargeable Hair & Beard Trimmer_5_66db538877a65.jpeg', 57),
	(391, 'category//Product//HERIOS Universal Foam Cleaner_0_66db555dd4749.jpeg', 58),
	(392, 'category//Product//HERIOS Universal Foam Cleaner_1_66db555dd54cb.jpeg', 58),
	(393, 'category//Product//HERIOS Universal Foam Cleaner_2_66db555dd5d61.jpeg', 58),
	(394, 'category//Product//HERIOS Universal Foam Cleaner_3_66db555dd6ac1.jpeg', 58),
	(395, 'category//Product//HERIOS Universal Foam Cleaner_4_66db555dd734e.jpeg', 58),
	(396, 'category//Product//Contact Cleaner RL530_0_66db58f5460fa.jpeg', 59),
	(397, 'category//Product//Contact Cleaner RL530_1_66db58f546f5a.jpeg', 59),
	(398, 'category//Product//Contact Cleaner RL530_2_66db58f5478c2.jpeg', 59),
	(399, 'category//Product//Contact Cleaner RL530_3_66db58f548526.jpeg', 59),
	(400, 'category//Product//Contact Cleaner RL530_4_66db58f548e38.jpeg', 59),
	(401, 'category//Product//Solar Monitoring Lamp_0_66db5a97676ff.jpeg', 60),
	(402, 'category//Product//Solar Monitoring Lamp_1_66db5a9768114.jpeg', 60),
	(403, 'category//Product//Solar Monitoring Lamp_2_66db5a9768da0.jpeg', 60),
	(404, 'category//Product//Solar Monitoring Lamp_3_66db5a976960f.jpeg', 60),
	(405, 'category//Product//Solar Monitoring Lamp_4_66db5a976a30d.jpeg', 60),
	(406, 'category//Product//Solar Monitoring Lamp_5_66db5a976af6f.jpeg', 60),
	(407, 'category//Product//Solar Sensor wall light_0_66db5cd09107f.jpeg', 61),
	(408, 'category//Product//Solar Sensor wall light_1_66db5cd091e31.jpeg', 61),
	(409, 'category//Product//Solar Sensor wall light_2_66db5cd09272a.jpeg', 61),
	(410, 'category//Product//Solar Sensor wall light_3_66db5cd093335.jpeg', 61),
	(411, 'category//Product//Solar Sensor wall light_4_66db5cd093bc3.jpeg', 61),
	(412, 'category//Product//Solar Sensor Wall Light CL 2566_0_66db5e6ea0a96.jpeg', 62),
	(413, 'category//Product//Solar Sensor Wall Light CL 2566_1_66db5e6ea1874.jpeg', 62),
	(414, 'category//Product//Solar Sensor Wall Light CL 2566_2_66db5e6ea2845.jpeg', 62),
	(415, 'category//Product//Solar Sensor Wall Light CL 2566_3_66db5e6ea313e.jpeg', 62),
	(416, 'category//Product//Solar Sensor Wall Light CL 2566_4_66db5e6ea3d84.jpeg', 62),
	(417, 'category//Product//HTC Wired Hair Clipper_0_66db614a1bf04.jpeg', 63),
	(418, 'category//Product//HTC Wired Hair Clipper_1_66db614a1c9a6.jpeg', 63),
	(419, 'category//Product//HTC Wired Hair Clipper_2_66db614a1d6d2.jpeg', 63),
	(420, 'category//Product//HTC Wired Hair Clipper_3_66db614a1df70.jpeg', 63),
	(421, 'category//Product//HTC Wired Hair Clipper_4_66db614a1ebbd.jpeg', 63),
	(422, 'category//Product//HTC Wired Hair Clipper_5_66db614a1f4e7.jpeg', 63),
	(423, 'category//Product//Apple AirPods Pro Wireless Earbuds_0_66db63ad392c6.jpeg', 64),
	(424, 'category//Product//Apple AirPods Pro Wireless Earbuds_1_66db63ad39cb0.jpeg', 64),
	(425, 'category//Product//Apple AirPods Pro Wireless Earbuds_2_66db63ad3a98b.jpeg', 64),
	(426, 'category//Product//Apple AirPods Pro Wireless Earbuds_3_66db63ad3b24e.jpeg', 64),
	(427, 'category//Product//Apple AirPods Pro Wireless Earbuds_4_66db63ad3bef5.jpeg', 64),
	(428, 'category//Product//Apple AirPods Pro Wireless Earbuds_5_66db63ad3c77d.jpeg', 64),
	(429, 'category//Product//WD 40 Multi Use Spray 400 ML_0_66dc94db835c0.jpeg', 65),
	(430, 'category//Product//WD 40 Multi Use Spray 400 ML_1_66dc94db84362.jpeg', 65),
	(431, 'category//Product//WD 40 Multi Use Spray 400 ML_2_66dc94db84f63.jpeg', 65),
	(432, 'category//Product//WD 40 Multi Use Spray 400 ML_3_66dc94db85a5e.jpeg', 65),
	(433, 'category//Product//Geemy GM 769 Trimmer_0_66dc97ba7e42a.jpeg', 66),
	(434, 'category//Product//Geemy GM 769 Trimmer_1_66dc97ba7f0b6.jpeg', 66),
	(435, 'category//Product//Geemy GM 769 Trimmer_2_66dc97ba7f88a.jpeg', 66),
	(436, 'category//Product//Geemy GM 769 Trimmer_3_66dc97ba803df.jpeg', 66),
	(437, 'category//Product//Geemy GM 769 Trimmer_4_66dc97ba80a96.jpeg', 66),
	(438, 'category//Product//Geemy GM 769 Trimmer_5_66dc97ba8154e.jpeg', 66),
	(439, 'category//Product//Gemei 7 In 1 Rechargeable Trimmer_0_66dc9aa539e12.jpeg', 67),
	(440, 'category//Product//Gemei 7 In 1 Rechargeable Trimmer_1_66dc9aa53ab47.jpeg', 67),
	(441, 'category//Product//Gemei 7 In 1 Rechargeable Trimmer_2_66dc9aa53b822.jpeg', 67),
	(442, 'category//Product//Gemei 7 In 1 Rechargeable Trimmer_3_66dc9aa53c035.jpeg', 67),
	(443, 'category//Product//Gemei 7 In 1 Rechargeable Trimmer_4_66dc9aa53cd2e.jpeg', 67),
	(444, 'category//Product//Gemei 7 In 1 Rechargeable Trimmer_5_66dc9aa53d5ad.jpeg', 67),
	(445, 'category//Product//Geemy Gm-6055 Rechargeable Trimmer_0_66dc9d78906b4.jpeg', 68),
	(446, 'category//Product//Geemy Gm-6055 Rechargeable Trimmer_1_66dc9d789166b.jpeg', 68),
	(447, 'category//Product//Geemy Gm-6055 Rechargeable Trimmer_2_66dc9d7891fb6.jpeg', 68),
	(448, 'category//Product//Geemy Gm-6055 Rechargeable Trimmer_3_66dc9d7892cda.jpeg', 68),
	(449, 'category//Product//Geemy Gm-6055 Rechargeable Trimmer_4_66dc9d78935a1.jpeg', 68),
	(450, 'category//Product//Geemy Gm-6055 Rechargeable Trimmer_5_66dc9d789424b.jpeg', 68),
	(451, 'category//Product//Geemy Gm-2995 Hair Straightener_0_66dca0ecbffad.jpeg', 69),
	(452, 'category//Product//Geemy Gm-2995 Hair Straightener_1_66dca0ecc3a34.jpeg', 69),
	(453, 'category//Product//Geemy Gm-2995 Hair Straightener_2_66dca0ecc483b.jpeg', 69),
	(454, 'category//Product//Geemy Gm-2995 Hair Straightener_3_66dca0ecc6540.jpeg', 69),
	(455, 'category//Product//Geemy Gm-2995 Hair Straightener_4_66dca0ecc71df.jpeg', 69),
	(456, 'category//Product//Kisonli K100 Computer Speaker System_0_66dca328f0c4c.jpeg', 70),
	(457, 'category//Product//Kisonli K100 Computer Speaker System_1_66dca32900241.jpeg', 70),
	(458, 'category//Product//Kisonli K100 Computer Speaker System_2_66dca32900f6b.jpeg', 70),
	(459, 'category//Product//Kisonli K100 Computer Speaker System_3_66dca32901865.jpeg', 70),
	(460, 'category//Product//Kisonli K100 Computer Speaker System_4_66dca329024db.jpeg', 70),
	(461, 'category//Product//Kisonli K100 Computer Speaker System_5_66dca32902e83.jpeg', 70),
	(462, 'category//Product//Laser Pointer Green Light_0_66dca5fbe4b60.jpeg', 71),
	(463, 'category//Product//Laser Pointer Green Light_1_66dca5fbe5901.jpeg', 71),
	(464, 'category//Product//Laser Pointer Green Light_2_66dca5fbe65ae.jpeg', 71),
	(465, 'category//Product//Laser Pointer Green Light_3_66dca5fbee66e.jpeg', 71),
	(466, 'category//Product//Laser Pointer Green Light_4_66dca5fbef14c.jpeg', 71),
	(467, 'category//Product//Wireless 3 Inches Speaker KTS-1720_0_66dca8d708744.jpeg', 72),
	(468, 'category//Product//Wireless 3 Inches Speaker KTS-1720_1_66dca8d70951a.jpeg', 72),
	(469, 'category//Product//Wireless 3 Inches Speaker KTS-1720_2_66dca8d709e97.jpeg', 72),
	(470, 'category//Product//Wireless 3 Inches Speaker KTS-1720_3_66dca8d70ad57.jpeg', 72),
	(471, 'category//Product//Wireless 3 Inches Speaker KTS-1720_4_66dca8d70b5c7.jpeg', 72),
	(472, 'category//Product//2Pcs Car Universal Fog Light_0_66dcad7929e56.jpeg', 73),
	(473, 'category//Product//2Pcs Car Universal Fog Light_1_66dcad792adb0.jpeg', 73),
	(474, 'category//Product//2Pcs Car Universal Fog Light_2_66dcad792bb52.jpeg', 73),
	(475, 'category//Product//2Pcs Car Universal Fog Light_3_66dcad792c4bf.jpeg', 73),
	(476, 'category//Product//2Pcs Car Universal Fog Light_4_66dcad792d1a2.jpeg', 73),
	(477, 'category//Product//3inch Led Round Fog Light_0_66dcaf419cac9.jpeg', 74),
	(478, 'category//Product//3inch Led Round Fog Light_1_66dcaf419d5dd.jpeg', 74),
	(479, 'category//Product//3inch Led Round Fog Light_2_66dcaf419e4d5.jpeg', 74),
	(480, 'category//Product//3inch Led Round Fog Light_3_66dcaf419f21b.jpeg', 74),
	(481, 'category//Product//3inch Led Round Fog Light_4_66dcaf419fc14.jpeg', 74),
	(482, 'category//Product//Universal TV Wall Mount for 14-42 Inches_0_66dcb207befea.jpeg', 75),
	(483, 'category//Product//Universal TV Wall Mount for 14-42 Inches_1_66dcb207bffaf.jpeg', 75),
	(484, 'category//Product//Universal TV Wall Mount for 14-42 Inches_2_66dcb207c0876.jpeg', 75),
	(485, 'category//Product//Universal TV Wall Mount for 14-42 Inches_3_66dcb207c1588.jpeg', 75),
	(486, 'category//Product//Universal TV Wall Mount for 14-42 Inches_4_66dcb207c1e5e.jpeg', 75),
	(487, 'category//Product//2 in 1 EXcellent Quick Charger_0_66dcb5e842720.jpeg', 76),
	(488, 'category//Product//2 in 1 EXcellent Quick Charger_1_66dcb5e843721.jpeg', 76),
	(489, 'category//Product//2 in 1 EXcellent Quick Charger_2_66dcb5e844112.jpeg', 76),
	(490, 'category//Product//Fast Charger with Cable 18W_0_66dcb6fd351a7.jpeg', 77),
	(491, 'category//Product//Fast Charger with Cable 18W_1_66dcb6fd35b8b.jpeg', 77),
	(492, 'category//Product//Fast Charger with Cable 18W_2_66dcb6fd368d6.jpeg', 77);

-- Dumping structure for table ceonline.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `d_status` int NOT NULL,
  `iqty` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `remove_status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.invoice: ~0 rows (approximately)

-- Dumping structure for table ceonline.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `qty` int NOT NULL,
  `description` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `datetime_added` datetime NOT NULL,
  `delivery_fee_colombo` double NOT NULL,
  `delivery_fee_other` double NOT NULL,
  `status_id` int NOT NULL,
  `category_id` int NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `supplier_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_admin1_idx` (`admin_email`),
  KEY `fk_product_supplier1_idx` (`supplier_id`),
  CONSTRAINT `fk_product_admin1` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`s_id`),
  CONSTRAINT `fk_product_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.product: ~66 rows (approximately)
REPLACE INTO `product` (`id`, `price`, `qty`, `description`, `title`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`, `status_id`, `category_id`, `admin_email`, `supplier_id`) VALUES
	(11, 800, 15, 'Quick Charger for MOB Devices <br/>\r\n100% original Product <br/>\r\nFully Compatible Fast Charger suit <br/>\r\nFire- Retardant PC engineering Plastics Material <br/>\r\n100V – 240V 50/60Hz Rated Input <br/>\r\n3.6V – 6V | 6V – 9V | 9V – 12V Rated Output Voltage <br/> \r\n3A, 2A, 1.5A Rated Output <br/>\r\nMade in Finland \r\n', 'JOKADE Quick Charger Black 3A', '2024-09-02 20:06:44', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(12, 6750, 3, 'Full HD 7 inch Display 16:9 ratio <br/>\r\nYou can download game through the internet into USB or TF Cards. <br/>\r\nAuto Play from the memory Cards <br/>\r\nTF and USB Card Reader and USB Functions <br/>\r\nCompatible with MP5/ MP4/ MP3 <br/>\r\nMultilingual Menu <br/> \r\nRemote Control <br/>\r\nAV input, which can be connected with Camera for driving back <br/>\r\nBuilt-in duel speakers with power magnifier, which support surround sound\r\n', '7 Inch RearView Monitor', '2024-09-02 20:09:25', 300, 400, 1, 1, 'chanakaelectro@gmail.com', 1),
	(13, 3200, 1, 'Ahuja HBM  - 60CC <br/>\r\nErgonomic design for comfortable and convenient use <br/>\r\nAllow hand-free use and reduces pickup of stray room noises <br/>\r\nSuitable for various wired application such as announcements, teaching, presentation, Religious Discourses etc.\r\n', 'AHUJA Headband Microphones', '2024-09-02 20:11:39', 300, 400, 1, 1, 'chanakaelectro@gmail.com', 1),
	(14, 8750, 10, 'Auto Water – Proof & Dust Proof Camera <br/>\r\nNight Vision Feature <br/>\r\nHigh Definition Quality Camera <br/>\r\nWide angle Camera <br/>\r\nModel 707-2CD <br/>\r\nMade in China\r\n', 'Car Rear View Camera', '2024-09-02 20:14:07', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(15, 3250, 10, 'Continuity Beeper <br/>\r\nData Hold Functions <br/>\r\nLightweight Small Digital Meter <br/>\r\nPower Sources: - UM-4 or AAA 1.5V battery x2 <br/>\r\nMade in China\r\n', 'Digital Clamp Meter', '2024-09-02 20:20:00', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(16, 2200, 10, 'It is applicable to students electrician, technician and also for household. <br/>\r\nSuper bright backlight display <br/>\r\nHigh quality lengthened soft test leads <br/>\r\nDigital Multi meter 830B Model <br/>\r\nTechnical Specification and User manual <br/>\r\nMade in China\r\n', 'Digital Multimeter 830B', '2024-09-02 20:22:21', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(17, 3750, 10, '1999 bit digit LCD display <br/>\r\nTest AC/DC Voltage, Current, Resistance and capacitance <br/>\r\nData retention/ Auto Power Off <br/>\r\nIntroduction electro probe function <br/>\r\nApplications range: Communication maintenance, electric equipment repair, Appliance repair, Home wiring project, Hobby Projects. <br/>\r\nVoltage Range: - AC 750V – DC 1000V <br/>\r\nCurrent Range: - AC 10A – DC 10A <br/>\r\nMade in China\r\n', 'Digital Multimeter DT-9205E', '2024-09-02 20:24:05', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(18, 2200, 10, 'AC Voltage: 200-750V <br/>\r\nDC Current: 2000u-20m-200m-10A <br/>\r\nDisplay Type: Digital Display <br/>\r\nMeasuring Resistance Range: 200-2000-20K-200K-2000KΩ <br/>\r\nDC Voltage: 200m-2000m-20-200-1000V <br/>\r\nIt is powered by 6F22 9V battery, which is easy to replace. <br/>\r\nLarge screen display, LCD display size: 62x34mm. <br/>\r\nWith low voltage symbol display, clear and intuitive. <br/>\r\nDisplay: 1999 counts, updates 2-3/sec <br/>\r\nMeasuring method: Dual slope integration A/D Converter <br/>\r\nOperating Environment: 0 to 40 Celsius <br/>\r\nPower: 9V Battery, NEDA 1604 or 6F22 Type (Included) <br/>\r\nFuse Protection: 200mA/250V <br/>\r\nMeasurement Range: 200VmV-600V +/- 0.5% +/- 2 digits <br/>\r\nOverload Protection: 250V rms <br/>\r\nPlace of Application: NPN PNP <br/>', 'Digital Multimeter DT-700D', '2024-09-02 20:26:01', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(19, 6500, 10, 'Product Name Analog Multi meter MF47C <br/>\r\nAC Voltage 10V,50V, 125V, 250V, 1000V <br/>\r\nDC Voltage 2.5V, 5V, 10V, 50V, 125V, 250V, 1000V <br/>\r\nAC,DC Current DC: 50uA, 5mA, 50mA, 500mA, 10A AC: 500mA, 10A <br/>\r\nResistance Rx1/Rx10/Rx100/Rx1k/Rx10k <br/>\r\nC(uF) cx10k/cx1k/cx100/cx10/cx1 <br/>\r\nMain Color Black <br/>\r\nMaterial Plastic <br/>\r\nTest Leads Total Length 88cm/ 34.6" <br/>\r\nTotal Weight 895g <br/>\r\n', 'Digital Multimeter MF47C', '2024-09-02 20:28:35', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(20, 3000, 10, 'DT9205A Digital Multimeter for automotive diagnostic and testing. <br/>\r\nAccurately measures voltage, current, resistance, and continuity. <br/>\r\nIdeal for automotive professionals and DIY enthusiasts. <br/>\r\nEasy to read LCD display with backlight. <br/>\r\nDurable and compact design for portability. <br/>\r\nPerfect for troubleshooting electrical systems in vehicles. <br/> \r\nLCD maximum display: 1999 bit automatic polarity display. <br/>\r\nMeasurement method: manual measurement. <br/>\r\nSampling speed About 3 times per second. <br/>\r\nOver range display: The highest position displays 1. <br/>\r\nWorking environment: 0-40 ℃, relative humidity less than 75% RH. <br/>\r\nPower supply: One 9V battery (NEDA1604/6F22 or equivalent model). <br/>\r\nInstrument size: 198 x 95 x 52mm. (length x width x height) <br/>\r\nWeight: Approximately 415g (including 9V battery and shock absorber). <br/>\r\n', 'Digital Multimeter DT9205A', '2024-09-02 20:32:33', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(21, 5500, 10, 'Manual Range AC DC 200mV 600V Voltage Meter DC 10A Current Tester<br/> \r\nThe new generation UT33+ series redefines the performance standards for introductory digital multimeters.  <br/>\r\nOur innovative industrial design makes sure that these products can withstand 2 meters drop. The new LCD display layout provides a better user experience. The UT33+ series safety standards have also been enhanced to ensure that users can work safely in CAT ll 600V environment. <br/>\r\nUT33B+ can test 1.5V/9V/12V battery conditions. <br/>\r\n', 'Digital Multimeter UT33 +B ', '2024-09-02 20:33:53', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(22, 4000, 5, 'Hi – fidelity <br/> Uni – directional <br/> Excellent Reproduction of voice and music professional microphone <br/>\r\nF – 2200 Professional microphone <br/>\r\n', 'Free Power Professional Microphone', '2024-09-02 20:35:42', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(23, 2200, 10, '100% Brand new <br/>\r\n4mW laser pointer green laser pen visible light beam powerful office school military laser point pen. <br/>\r\nHigh quality metal alloy casing, strong and durable, powered by two AAA batteries (not included). <br/>\r\nPower saving, lightweight, suitable for putting in your pocket or handbags. <br/>\r\nThis high quality pointer adopts the latest technology optics and microelectronics. <br/>\r\nThis laser pointer can be used for presentation, teaching indicator, children amusement and more. <br/>\r\nPoint at any desired targets, project screens, video monitors, presentations, stars, museum, tour guides and so on. <br/>', 'Green Laser Pointer YL 303', '2024-09-02 20:36:39', 300, 350, 1, 2, 'chanakaelectro@gmail.com', 1),
	(24, 850, 40, 'Bulb: 6W COB LED <br/>\r\nLevels: 4 levels: 60% strong light - 30% weak light - flash - any level long press to open 100% super bright mode  <br/>\r\nLumens: 200-800 lumens <br/>\r\nSwitch: side push switch <br/>\r\nBattery: Built-in 500mAh polymer lithium battery <br/>\r\nCharging method: Type-C USB charging <br/>\r\nDischarge time: 2-4 hours <br/>\r\nCharging time: 2 hours <br/>\r\n', 'KeyChain Light Rechargeable', '2024-09-02 20:38:04', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(25, 3600, 20, 'Working voltage: DC 12V <br/>\r\nStatic Current: 3.5 mA <br/>\r\nAlarm volume: about 125 db <br/>\r\nRemote distance: MAX80 meters in the open air <br/>\r\nRemote frequency: 315MHz <br/>\r\nThis electronic security system with remote controls can help your motorbike keep away from thieves. <br/>\r\nRemote Arming/Disarming <br/>\r\nRemote Engine Start: Keyless Entry <br/>\r\nAdjustable Shock Sensor, flashing lights warning <br/>\r\n4 buttons remote transmitters, compact and powerful 125db piezo siren <br/>\r\nSmart Alarm that Automatically Recognizes Vibration Frequency <br/>\r\nEmergency Alarm: Anti-Hijacking by Cutting Power Supply <br/>\r\nFit any motorcycle with 12V battery <br/>\r\n', 'Motorcycle Anti-Theft Device', '2024-09-02 20:39:20', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(26, 1500, 20, 'DC Solar Submersible Pump is Low power consumption, low noise, and stable long service life. <br/>\r\nAnd easy to disassemble and maintain.  <br/>\r\nSuitable for air cooler fan, Aquarium fish tank, mini fountains, craft machinery, cooling system etc.  <br/>\r\nPerformance due to excellent design. <br/>\r\nDC Powered, can be used in solar system, Bottom inlet design, maximum capacity\r\nIP68 Protection Level. <br/>\r\nPump Power 12v DC – 8 Watts <br/>\r\nMaximum Height 5 Meters <br/>\r\nWater Flow 10 Liter per Minute <br/>\r\nEnergy Saving and Ultra quiet <br/>\r\nABS Plastic Durable – Shell selected high quality materials <br/>\r\nAdvance Filling Plastic Sealed Water proof <br/>\r\nPump Fixing Ring – Solid Pump vibration, Noise reduction <br/>\r\n', 'Solar Pump JD 12V', '2024-09-02 20:40:25', 300, 350, 1, 2, 'chanakaelectro@gmail.com', 1),
	(27, 3000, 40, '1.6 inch big LCD display <br/>\r\nEasy to read. <br/>\r\nExcellent load capacity, 16amp@250vac. <br/>\r\nEasy to program time. <br/>\r\nColor: White <br/>\r\nMaterial: plastic <br/>\r\nThe TM618 timer MODULE can open or close kinds of electrical apparatus and power automatically, according to the present time, the items can be streetlight, neon light (sign), billboard, electrical appliances, broadcast equipment etc. And the digital timer switch is within rechargeable battery, in 1.2V/40Ma, high-accuracy CMOS chip, strongly anti-jamming, easy to use.\r\n', 'Programmable Timer Din Rail', '2024-09-02 20:42:28', 300, 350, 1, 2, 'chanakaelectro@gmail.com', 1),
	(28, 6500, 10, 'DIY Supplies: ELECTRICAL <br/>\r\nModel Number: UT33A+ <br/>\r\nAC Current: 10A <br/>\r\nMeasuring Resistance Range: 200Ω-200MΩ <br/>\r\nDC Current: 10A <br/>\r\nUNI-T UT33A+ Palm Size digital Multi meter With Capacitance/NCV/Diode test/Continuity buzzer <br/>\r\n', 'Digital Multimeter UT 33+A', '2024-09-02 20:43:28', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(29, 4100, 20, 'Effective anti-howling, anti-noise ability <br/>\r\nFrequency response between 70Hz and 16 kHz <br/>\r\nCompact size, suitable for any hand <br/>\r\nProfessional quality Microphone ideal for spoken word and karaoke performance <br/>\r\n', 'JBL 68S Vocal Microphone', '2024-09-02 20:44:36', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(30, 5000, 50, 'Touch Operation <br/>\r\nBilateral Headset Call <br/>\r\nWireless Version 5.3 <br>\r\nFunction: Buzzer +wireless charging <br/>\r\nWireless Transmission Distance 10M <br/>\r\nCharging box capacity: 240mAh <br/>\r\nWorking current: 18ma <br/>\r\nTall plus Air Pro 2 TWS Bluetooth Ear pod 5th Gen <br/>\r\nModel: air pro 2 <br/>\r\nWireless earbuds for audio on-the-go <br/>\r\nCompatible with most devices <br/>\r\nPerfect for TV, audio, video, gaming, and wearables <br/>', 'Wireless Earbud – Tallplus AirPro 2', '2024-09-02 20:45:48', 300, 350, 1, 1, 'chanakaelectro@gmail.com', 1),
	(31, 2000, 20, 'Usb port is available <br/>\r\nNo driver askedErgonomic design Plug and play<br/> \r\nLed indicator Caps lock <br/>\r\nWaterproof Bendable / rollable / bendable Elastic rubber <br/>\r\nBand Dimension: 345mm x 128mm <br/>\r\nJust install it directly with no driver. <br/>\r\nIt is suitable for cpu / pc, laptop, and other electronic devices. It can also be used for mobile phones / tablets with more otg cables.', 'Mini Flexible Waterproof Keyboard', '2024-09-03 17:10:55', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(32, 2150, 10, 'Material: ABS+PC+PU Horn diameter: 40mm <br/>\r\nFrequency response range: 20HZ-20khz Line length: 1.5 M <br/>\r\nMeter diameter: 6.0x2.2mm; Horn sensitivity :110±3dB; Single-button function button <br/>\r\nProduct size: 180x171x58MM <br/>\r\nPU leather earmuffs, comfortable to wear <br/>\r\nLightweight design, 3.5 Interface, computer, mobile phone and other players can be used <br/>\r\nTelescopic design, suitable for various head types <br/>', 'JOKADE JD014 wired headset', '2024-09-03 17:14:06', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(33, 2250, 15, '1. Functional single key control music playing + answering calls <br/>\r\n2. Simple design and beautiful appearance <br/>\r\n3. Fold and stretch for easy storage <br/>\r\n4. Soft ear cap for comfort <br/>\r\n5. Pack 72pcs one carton.Carton size:48.5x48x59.5cm', 'KSC-703 Wired Gaming Headset', '2024-09-03 17:17:07', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(34, 1150, 15, 'Monster Beats by Dr Dre Solo On-Ear Headphones with ControlTalk - Black 1 Monster Beats by Dr Dre Solo On-Ear Headphones with ControlTalk - Black 2 Monster Beats by Dr Dre Solo On-Ear Headphones with ControlTalk - Black 3 Listen to your music like never before with all the sonic details the artist wanted you to hear. The Solo deliver sound so real, you will be amazed it is all coming from something so compact and portable. <br/>\r\nMade from premium materials with a super-durable and flexible headband <br/>\r\nBuilt in microphone for hands-free calls <br/>\r\nControl your music with the built in remote <br/>\r\nFolding design makes carrying and storing headphones easy <br/>\r\nHigh performance, high quality sound <br/>\r\nEverything about this headphones screams premium, from the soft ear cups to the super-durable and flexible material used to make the headband. The construction used in the headband is that tough that is virtually unbreakable and will not crack under normal use. ', 'On-Ear Headphone (ControlTalk Monster Beats)', '2024-09-03 17:31:18', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(35, 8150, 5, 'The Top Features of the Sim Supported V380 Waterproof Wireless Dual Lens PTZ Camera <br/>\r\nThe Sim Supported V380 Waterproof Wireless Dual Lens PTZ Camera is a versatile security camera for both indoor and outdoor use. <br/>\r\nIt has a 1080p CMOS sensor for clear images, even in low-light. With a 350-degree pan and 90-degree tilt, it covers a wide area. <br/>\r\nNotably, it is SIM-supported and has two-way audio for communication.  <br/>\r\nIt can be remotely accessed for home or business surveillance. <br/>\r\nProduct Name: Wireless IP Camera <br/>\r\nMaterial: Main Body ABS Material <br/>\r\nWi-Fi Single: 2.4G Wi-Fi <br/>\r\nVideo Capture Resolution: 1080P (Full-HD) <br/>\r\nPixel: 200W  & Lens (mm): 3.6 mm <br/>\r\nStyle: Dome Camera <br/>\r\nConnectivity: IP/Network Wireless <br/>\r\nMinimum Illumination (Lux): 0.1 <br/>\r\nAlarm Action: Support & Video Compression Format: H.264 <br/>\r\nLens Angle: Smooth pan 350 degree and tilt 90 degree monitoring <br/>\r\nTechnology: Network IP Camera <br/>\r\nSupported Mobile Systems: For Android, IOS, and Laptop <br/>\r\nNetwork Interface: Wi-Fi/802.11/b/g <br/>\r\nNight Vision Function: Yes & Mobile Monitoring: Yes <br/>\r\nPower Supply: DC 12V 2A Power Supply <br/>\r\nSize: 15.5x9x9cm/ 6.1x3.54x3.54 inch', 'V380 Dual Lens PTZ Wi-Fi Camera', '2024-09-03 17:41:17', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(36, 3200, 30, 'Power protection against voltage fluctuations <br/>\r\nProtects from under voltage and power back surges <br/>\r\nProtects your Fridges, Freezers and Coolers <br/>\r\nAutomatically disconnects the power when it is bad and reconnects\r\nafter 1 ½   minutes when it is good <br/>\r\nEliminates the need to switch off appliances when the electricity fails <br/>\r\nCurrent rating – 13 Amps <br/>\r\nProtection – Under Voltage <br/>\r\nNominal voltage – 220/240V <br/>\r\nWait time – 120 secs <br/>\r\nDisconnect voltage – 185V <br/>\r\nReconnect voltage – 190V <br/>\r\nThese specifications are for a standard 220/240V unit <br/>\r\nOther specifications are available. Refer to your manual for details <br/>', 'Fridge Guard Voltage Protection', '2024-09-03 21:08:27', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(37, 2150, 20, 'Powerful 115dB Dual Tone <br/>\r\nQuality of security assurances <br/>\r\nDurable, reliable and anti-corrosion, <br/>\r\nAnti-dust and Moisture-proof <br/> \r\nTwo-Terminal <br/>\r\n12V Use Only <br/>\r\nHigh Tone – 510Hz <br/>\r\nLow Tone – 410Hz <br/>\r\nIIRBW Know-how in acoustic design <br/>\r\nPulsating air column creates soft, melodic two-tone sound with fan-like sound propagation <br/>\r\nHorn sound could continue 1 minute <br/>\r\nLong service life and reliable quality <br/>\r\nHigh quality diaphragms and contact points v Microporous Teflon filter for protection against dirt and humidity <br/>\r\nWeather-resistant materials, fully functionality even under harsh environment <br/>\r\nAnti-corrosion <br/>\r\nApproved quality <br/>\r\nOEM application <br/>\r\nSpecification surpass ECE and DIN Standards <br/>\r\nMini and fashion Design <br/>\r\nCompact design permits easy installation <br/>', 'Kaier Horn (Snail Shaped)', '2024-09-03 21:11:20', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(38, 3750, 10, 'Universal Rear View Camera <br/>                                                           \r\nIp rating Ip66 <br/>\r\nTV System PAL/NTSC <br/>\r\nResolution (TV Lines) 420 <br/>\r\nLens Angle (DIAGONAL): 1200 - 1700 <br/>\r\nPower Supply (DCV) 12V <br/>\r\nStorage Temperature (Deg.C): -20 ~ +60 (RH95%Max) <br/> \r\n', 'Kenwood Rear view Camera ', '2024-09-03 21:19:14', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(39, 3150, 20, 'World Receiver with High Sensitivity <br/>                                     \r\nAM/FM/SW-1 Radio <br/>\r\nHigh Sensitivity <br/>\r\n3600 and ultralong antenna <br/>\r\nAC:220V/50Hz <br/>\r\nBatteries not included <br/>\r\n', 'KNStar Pocket Radio', '2024-09-03 21:21:37', 300, 350, 1, 2, 'tharinduchanaka6@gmail.com', 1),
	(40, 2500, 15, 'HD Sound <br/>                                                                                                          \r\nWireless Technology <br/>\r\nUSB <br/>\r\nRechargeable Battery <br/>\r\nMicro SD Function <br/>\r\nFM Radio <br/>\r\nOPERATE GUIDE <br/>\r\nOFF/ON: To tum ON/OFF the speaker. <br/>\r\nDC 5V: Plug the Micro USB cable to the speaker and connect \r\nother end USB port to the power source. (DC 5V) <br/>\r\nUSB slot: Used to read the song files in FAT32 format with \r\nmaximum size of 32GB <br/>\r\nTF slot: Used to read the song files in FAT32 format \r\nwith maximum size of 32GB <br/>\r\nPlay/Pause: Under USB/TF/Smart mode, short press for play and pause; <br/>\r\nM:To change mode during USB/TF,Smart,FM mode <br/>\r\nPREV/VOL-: USB/TF/Wireless/FM mode:Swipe left to move previous FM channel track. <br/>\r\nSwipe left and long press to decrease the volume. <br/>\r\nNEXT/WOL+USB/TF/Smart/FM mode:Swipe right to move next FM channel track. <br/>\r\nSwipe right and long press to increase the volume. <br/>\r\nFM:FM radio mode<br/>\r\nSCAN:Search for radio stations <br/>\r\n', 'Portable multi Radio 3 inche', '2024-09-03 21:23:24', 300, 350, 1, 2, 'tharinduchanaka6@gmail.com', 1),
	(41, 3200, 20, 'Blow and Nourish 2500w Hair Dryer <br/>\r\nMaximum care and power <br/>\r\nHot and Cold Wind <br/>\r\n3 Heats/ 2Speeds for total control of heat and airflow <br/>\r\nHanging Loop for convenient storage <br/>\r\n2500W for quick drying <br/>\r\nModel: NV-7110 <br/>\r\nRate power: 2500W <br/>\r\nRate voltage: AC220V <br/>\r\nRate frequency: 50Hz <br/>\r\n', 'NOVA Hair Dryer ', '2024-09-03 21:25:06', 300, 350, 1, 2, 'tharinduchanaka6@gmail.com', 1),
	(42, 11750, 10, 'Easy to achieve real-time remote viewing <br/> \r\nWireless <br/>\r\nTwo-way Audio <br/>\r\nHuman Intrusion Detection <br/>\r\nCloud Storage <br/>\r\nDay/Night Vision <br/>\r\nModel: SC02-4MP-4G <br/>\r\nAPP: V380PRO <br/>\r\nPower: DC12V 2A <br/>\r\nStandard: 4G <br/> ', 'Smart Wi-fi Camera V380', '2024-09-03 21:30:27', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(43, 3750, 20, 'Advanced pre-setting one week before <br/>\r\nDigital electronic time switch with daily programs <br/>\r\nLithium battery power reserve <br/>\r\nAuto time error correction weekly<br/>\r\nVoltage rating: AC 220V 50/60Hz <br/>\r\nVoltage Limit: AC 180V-250V <br/>\r\nHysteresis: < 1 sec/day (250C) <br/>\r\nON/OFF Operation: 20 ON & 20 OFF <br/>\r\nPower consumption: 2VA (max) <br/>\r\nDisplay: LCD <br/>\r\nService life: Mechanical 107, Electrically 105 <br/>\r\nMinimum interval: 1 minute <br/>\r\nWeight: approx. 100g <br/>', 'Timer Programmable ', '2024-09-03 21:32:17', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(44, 2200, 30, 'Power protection against voltage fluctuations <br/>\r\nProtects from over voltage, power-back surges, surges & spikes <br/>\r\nProtects your Photocopies, FAX, LCD, TV & Video, HIFI, Laptops, Satellite Dishes, Mobile Phones, All Electronic Equipment <br/>\r\nAutomatically disconnects the power when it’s bad and Reconnects after 5 seconds when it’s good <br/>\r\nEliminates the need to switch off appliances when the electricity fals <br/>\r\nCurrent rating: 13 Amps <br/>\r\nProtection: Over-voltage, surges & spikes, power-back <br/>\r\nNominal voltage: 220/240V <br/>\r\nWait time: 5secs <br/>\r\nDisconnects voltage: 260V These specifications are for a standard 220/240V unit. <br/>\r\nOther specifications are available. Refer to your manual <br/>\r\n', 'TV Guard Power Protection', '2024-09-03 21:33:54', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(45, 3200, 20, 'True wireless earbuds connect fast <br/>\r\nNew generation of resist wind noise technology <br/> \r\nComfortable and stable ear wear <br/>\r\nSuper long standby time <br/>\r\n4 Hour continuous service <br/>\r\nCall time: 5 hours <br/>\r\nStand-by time: Up to 90 days <br/>\r\nCharging time: 1 hour <br/>\r\n', 'Wireless Earbud Black', '2024-09-03 21:35:17', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(46, 1050, 20, 'INPUT : DC12V - DC24V & Output : 2.1A <br/>\r\nUSB port : Dual & Micro USB Cable<br/>\r\nFast charging and highly durable <br/>\r\nLength - 2 meters', 'Car Charger RECRSI CAR-01', '2024-09-05 23:48:21', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(47, 1200, 15, 'Input Voltage: 100-240 V <br/>\r\nOutput Voltage: (5 .0V – 2.0A OR 9.0V-1.67A) <br/>\r\nCompatible with: Fast charging with Samsung Huawei Nokia Xiaomi and any android devices. <br/>\r\nCharging For All Mobile Phones,MP3,MP4,GPS Cell Phone,Bluetooth Device,Table And Other Digital Products <br/>\r\n100% brand new and high quality <br/>\r\nInput Voltage: AC 220V 50/60Hz 0.3A <br/>\r\nOutput Voltage: 9.0V 3.1A Or 5.0V 3.1 <br/>', 'Quick Charging RECRSI CH-47', '2024-09-05 23:54:56', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(48, 600, 30, '<b>SUITABLE FOR ANY CELL PHONE, PDA, PDA CELL PHONE AND DIGITAL CAMERA BATTERIES </b> <br/>\r\n- LCD universal charger for all types of lithium battery <br/>\r\n- Intelligently control the charging process, and automatically stop when the battery is full <br/>\r\n- Lightweight and easy to carry <br/>\r\n- Easy to use: instant plug-in and charge! <br/>\r\nINPUT: AC 110-240V~50/60Hz <br/>\r\nOUTPUT:4.2V 250mAh <br/>\r\nUSB:5.0V 300mA <br/>', 'LCD USB Charger', '2024-09-05 23:58:40', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(49, 800, 20, 'Best Quality Charger Combo For iPhone X <br/>\r\n5W USB power Adapter mobile Charger <br/> \r\n1 high Quality Foxconn Apple to Lightning Data Sync Fast Charging Cable <br/>\r\nSturdy Design: Compact, lightweight, stylish, easy to store. fits in the palm of your hand, portable design allows for easy storage and convenience, Simply connect with a USB cable (not included) and plug it into a wall. <br/>\r\nAuthentic Apple 8 pin Data Cable compatible all 8 pin devices like the iPhone 5 5S 5C 6,7,8 and X and Plus Models and iPads <br/>\r\nPowerful rapid charger. 1 Amp / 1000 mAh <br/>\r\nAuthentic Adapter will work with any phone provided you have the appropriate data cable. Fits in any standard Pakistani outlet\r\nAuthentic Apple product A1385 / MD818ZM/A <br/>\r\nCharger Plug: Input: 100-240V, 50/60Hz, 0.15A Output: 5V, 1A lightning Cable: USB 2.0 cable <br/>', 'iPhone mobile charger 5W ', '2024-09-06 00:11:04', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(50, 900, 20, 'Over Current Protection <br/>\r\nShort Circuit Protection<br/>\r\n5 V output function can e widely used for mobile phones, tablets and nearly all digital devices<br/>\r\nsupport Charging 18W + 2.4A <br/>\r\nMade in China', 'Car Charger High Quality RECRSI', '2024-09-06 00:18:59', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(51, 1700, 20, 'Name:Xiaomi MI Travel Power Adapter<br/>\r\nFeatures:With Cable & Power Bank Connector  <br/>\r\nType:TypeC <br/>\r\nCertification:ULCertification <br/>\r\nMax. Output Power:27W  <br/>\r\nInput : 100 -240V <br/>\r\nModel : MDY-11-EX <br/>\r\n', 'Xiaomi Fast Charger 27W', '2024-09-06 00:25:15', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(52, 2100, 20, '<br>RECRSI 68W Super Fast Charger With Type-C Cable </b><br/>\r\n• Brand: RECRSI <br/>\r\n• Model: CH-FA38 3pin  <br/>\r\n• Name: 68W Fast Charger <br/>\r\n• Cable Type: Type-C USB Data Cable  <br/>\r\n• Plug: UK Plug <br/>\r\n• Output: 5.0V=2.0A 10W, 11.0V=4.1A 68W Max <br/>\r\n• Over charging protection <br/>\r\n• Over voltage protection <br/>\r\n• Over current protection <br/>\r\n• Temperature protection <br/>\r\n• Over power protection <br/>\r\n• Short circuit protection<br/>', 'RECRSI 68W Fast Charger', '2024-09-06 00:28:03', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(53, 1800, 20, 'Brand: General Mobile<br/>\r\nFunction: Power Supply, Quick Charge<br/>\r\n<b>Product Details </b><br/>\r\nAdapter Output: USB-A<br/>\r\nBody Material: Hard Plastic – ABS<br/>\r\nInput Power: 100 - 240V <br/>\r\nFrequency: 50-60Hz 0.5A <br/>\r\nOutput Power: 5.0V – 2.5A | 9V – 2A | 12V – 1.5A <br/>\r\nEfficiency: High Power Capacity for Faster Charging <br/>', 'SAMSUNG Turbo Charger Adapter', '2024-09-06 00:36:47', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(54, 3500, 10, 'Wireless Bluetooth Speaker <br/>\r\nRechargeable Battery <br/>\r\nBig Sound & Good Bass <br/>\r\nFM Radio Function <br/>\r\nUSB & Micro SD Card Supported <br/>\r\nPlay/Pause & Previous/Forward Buttons <br/>\r\nVolume up/down Buttons <br/>\r\nWireless transmission range: up to 10m <br/>\r\nSpeaker drive size : 3 inch <br/>\r\nOutput Power: 5W <br/>\r\nFrequency response : 100Hz-20kHz <br/>\r\nSignal to noise ratio : >=80dB <br/>\r\nFM scan range : 87.5-108.0mHz <br/>\r\nUSB Charging: DC 5V <br/>\r\nBattery Capacity: 500mAh <br/>\r\nMax memory support(USB/SD) : 32GB  <br/>\r\nPlaytime: up to 1 hour at 75% volume <br/>\r\nCharging time: 2 hours <br/>\r\nWarranty Covered: All our speakers are QC TESTED before we send to you - Shipped within 24 Hrs 14 Day free return, checking warranty included. <br/>\r\n<b>PLEASE NOTE: FM Radio, AUX, MIC Features NOT available for all models only some models. Please check the Model Number and features in the description below before buying. </b>\r\nThese speakers are the best Value for Money on Daraz  <br/>\r\nULTRA LOUND Extra bass with bass enhancers for party and dance music <br/>\r\nEngineered for Music Lover -Wireless music streaming via Bluetooth with 5W Power Output <br/>\r\nPORTABLE AND LIGHTWEIGHT so carry it wherever you go for both indoors and outdoors as well Powerful connectivity speakers for enhanced Stereo sound <br/>\r\nPower Source: USB Chargeable, RECHARGEABLE BATTERY  <br/>\r\nLong Battery life: with 3-5 HOURS Play time and only 2Hr full Charging time <br/>\r\nWireless range: 5 m <br/>\r\nWireless music streaming via Bluetooth <br/>\r\nOther music inputs: Memory Card Slot, USB Size : 16cm x 25cm x 12cm Easy carrying <br/>', 'Bluetooth Speaker Mini Wireless Speaker', '2024-09-07 00:22:32', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(55, 4100, 10, 'High-value mirror LED digital alarm clock, which is both an alarm clock and a decoration <br/>\r\nIt can be hung on the wall or placed on the countertop in two ways, and it can be used more freely <br/>\r\nHigh-definition LED display: date (year/month/day displayed on the same screen), temperature, humidity, time (12/24 hour conversion) <br/>\r\nThree levels of brightness adjustment, in night mode (18:00-7:00), the LED light will automatically dim at night <br/>\r\nTwo power supply methods: USB interface power supply/3 AAA batteries (batteries not included) <br/>\r\nDimensions: 23 x 7 x 3.5cm <br/>', 'Digital LED Alarm Clock', '2024-09-07 00:28:59', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(57, 2150, 20, 'Rechargeable & Excellent Clipping function <br/>\r\nPush-type switch for easy operation <br/>\r\nIndicator light function <br/>\r\nLength is easily changeable <br/>\r\nHair & Beard Trimmer with Hair Clippers <br/>\r\nGeemy Hair Trimmer (GM-6265) <br/>\r\nGeemy GM-6265 Cordless Electric Hair Clipper features a modern design and an ergonomic grip which enables excellent clipping function with wireless use. Fully charged, GM-6265 can provide about 45 minutes of wireless use. The Stainless steel blades of this electric hair clippers are detachable for easy cleaning. Push-type switch for easy operation. Replaceable rechargeable battery ', 'Rechargeable Hair & Beard Trimmer', '2024-09-07 00:40:00', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(58, 950, 30, '<b>Features </b>\r\nThe product is mainly made of natural surface active agent with fast penetration and cleaning property and powerful dirt removing performance. <br/>\r\nApply advanced technology, contain non-toxin anti-microbial <br/>\r\nFree of phosphor and harmful organic solvent remove animal and plant oil, lubricant etc. <br/>\r\nIt can substitute such organic solvents as ethanol and gasoline, do not corrode the desired surface  <br/>\r\nIt also applicable for water scald, bitumen, ink and carbon powder  <br/>\r\nPlenty of foam, high adhesion, convenient for washing  <br/>\r\nIt generates elegant fragrance after use  <br/> <br/>\r\n\r\n<b>Product details of Herios Foam Cleaner for Computers and Screens</b>\r\nComes from the brand other  <br/>\r\nCleans the plastic parts only  <br/>\r\nFor computers and screens  <br/>\r\nEasy to use & Good product  <br/>', 'HERIOS Universal Foam Cleaner', '2024-09-07 00:47:49', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(59, 750, 30, '<b>Powerful Cleaning Performance</b><br/> \r\nThe RELIFE RL530 Environmental Cleaner offers powerful cleaning performance to effectively remove dirt, stains, and grime from various surfaces. It is designed to provide a thorough and deep clean, leaving your surfaces looking fresh and spotless.<br/> \r\n\r\n<b>Environmental-Friendly Formula </b><br/> \r\nThis cleaner is formulated with an environmental-friendly formula, making it safe to use and reducing its impact on the environment. It does not contain harsh chemicals that could be harmful to you or the surfaces you are cleaning. <br/> \r\n\r\n<b>Versatile Application</b><br/>\r\nThe RL530 Environmental Cleaner can be used on a wide range of surfaces, including countertops, floors, tiles, glass, metal, and more. It is suitable for both household and commercial cleaning applications, providing versatility and convenience.<br/> \r\n\r\n<b>Easy to Use</b><br/> \r\nThe cleaner is designed for ease of use. Simply apply the cleaner to the desired surface, allow it to sit for a short period, and then wipe it away with a clean cloth or sponge. It does not require extensive scrubbing or rinsing, saving you time and effort.  <br/> \r\n\r\n<b>Fresh and Pleasant Scent</b><br/> \r\nThis cleaner leaves a fresh and pleasant scent behind after cleaning, helping to eliminate unpleasant odors and leaving your space smelling clean and inviting.<br/> ', 'Contact Cleaner RL530', '2024-09-07 01:03:09', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(60, 2200, 10, 'Motion sensor and security camera design to deter intruders. <br/>\r\nBright white light for increased visibility. <br/>\r\nSolar panel with sensor for automatic charging. <br/>\r\nEnergy-saving dim light mode when no motion is detected. <br/>\r\nAutomatic on when darkness is detected. <br/>\r\nLong-lasting internal rechargeable battery. <br/>\r\nDurable material: ABS. <br/>\r\nLED quantity: 77. <br/>\r\nSolar panel: 5.5V 1.8W. <br/>\r\nHighlight delay: 20 seconds. <br/>\r\nBattery capacity: 2400mAh. <br/>\r\nSensing distance: 3-5 meters. <br/>\r\nCharging method: solar. <br/>\r\nIncludes remote control for convenient operation from a distance <br/>\r\nThe outdoor LED light offers 3 lighting modes that can be easily switched <br/>', 'Solar Monitoring Lamp', '2024-09-07 01:10:07', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(61, 2700, 20, 'Solar powered luminaires are becoming an increasingly preferred way to illuminate the yard and the garden. <br/>\r\nThe reasons are a natural, inexpensive, efficient and inexhaustible method. <br/>\r\nThe solar lamps placed between the flowers in your garden are very beautiful, but they do not provide enough light to move peacefully into the yard when it gets dark. <br/>\r\nDo not worry, we have the solution for you outdoor lamp with solar panel with LED diodes 5500K light and motion sensor. <br/>\r\nThe model is waterproof and you do not have to keep it all the time. <br/>\r\nSimply mount in a sunny place so the solar panel can be charged and enjoy the light. And when we mentioned the installation, the pattern is fixed with a double-adhesive tape, preferably on a smooth surface. <br/>\r\nThe motion sensor allows activation only when needed, ie. when you are moving. Its stylish vision fits perfectly into every home.<br/>\r\nEasy cordless installation and auto-activation sensor Fully autonomous power supply Inexpensive and environmentally friendly way to illuminate the yard Easy to mount Motion sensor Waterproof housing Stylish and clear appearance Bright light Works with a built-in solar panel <br/> \r\nSolar panel: 0.55W 17% efficiency. <br/>\r\nPower LED: 0.2W, 5000K to 5500K <br/>\r\nSets the travel angle and distance: 120 degrees, 3m <br/>\r\nLithium-ion battery: 1200 mAh, 3.7V COB LED: COB 28W 1pcs. <br/>\r\n1000lm Delay time: 10 seconds <br/>\r\nNight sensor: 10lux. Lighting button: Off / Size: 18.8x11.8x5 cm <br/>', 'Solar Sensor wall light', '2024-09-07 01:19:36', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(62, 1750, 20, 'solar lamp, very bright new arrival. <br/>\r\nThere is a switch and can be set as an automatic system. <br/>\r\nThe sensor light will automatically turn on / off during the night.Solar charging Detect within 5 meters Easy to install,\r\nweather resistant, outdoor use. <br/>\r\nWith 4 watt solar panels, white light<br/>\r\n120 degrees wide light 8 hours in the sun <br/>\r\nbright for about 30 hours. <br/><br/>\r\n\r\n<b> CL-2566 SOLAR SENSOR WALL LIGHT Round LED </b><br/>\r\nsolar lamp, very bright new arrival.There is a switch and can be set as an automatic system.The sensor light will automatically turn on & off during the night. Solar charging Detect within 5 meters Easy to install, weather resistant, outdoor use. With 4 watt solar panels, white light, 120 degrees wide light 8 hours in the sun, bright for about 30 hours.', 'Solar Sensor Wall Light CL 2566', '2024-09-07 01:26:30', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(63, 5000, 5, '<b>Features</b><br/>\r\nHTC Professional Hair Clipper CT-7107. This is Extremely powerful motor with a long service life and overheat protection. <br/>\r\nIt comes with a powerful motor<br/>\r\nIt has adjustable cutting settings<br/>\r\nIt has variable cutting length <br/>\r\nComes with precision cutting blades<br/>\r\nErgonomically shaped body<br/>\r\nHigh Carbon Steel Blades<br/>\r\nSlim And Fitting Design With Soft Touch Grip<br/>\r\nPaint Spray With Rubberized Shell<br/>\r\nAdjustable Blade Lever<br/>\r\nWith Blade Guard<br/>\r\nFull Set Of Barber Accessories For Professional Use<br/>\r\n6 Moths Warranty<br/>\r\n\r\n<b>Accessories:</b><br/>\r\n4 Trimming attachment Comb (3, 6, 9, 12mm) <br/>\r\n1 Barber comb <br/>\r\n1 Cleaning brush <br/>\r\n1 Lubricating Oil <br/>', 'HTC Wired Hair Clipper', '2024-09-07 01:38:42', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(64, 10000, 10, '<b>About this item</b><br/>\r\nActive Noise Cancellation blocks outside noise, so you can immerse yourself in music <br/>\r\nTransparency mode for hearing and interacting with the world around you <br/>\r\nSpatial audio with dynamic head tracking places sound all around you <br/>\r\nAdaptive EQ automatically tunes music to your ears <br/>\r\nThree sizes of soft, tapered silicone tips for a customizable fit <br/>\r\nForce sensor lets you easily control your entertainment, answer or end calls, and more <br/>\r\nMore than 24 hours total listening time with the MagSafe Charging Case <br/>\r\nQuick access to Siri by saying Hey Siri<br/>\r\nEffortless setup, in-ear detection, and automatic switching for a magical experience. Connectivity- Bluetooth 5.0 <br/>', 'Apple AirPods Pro Wireless Earbuds', '2024-09-07 01:48:53', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(65, 750, 20, 'THE CAN WITH THOUSANDS OF USES Known as WD-40 protects metal from rust and corrosion, penetrates stuck parts, displaces moisture, and lubricates just about anything <br/>\r\nCleans and protects chrome, garden tools from rusting <br/>\r\nRemoves stickers, gum, wax, residue from household items <br/>\r\nLubricates locks, door hinges, luggage zippers, wheels and more <br/>', 'WD 40 Multi Use Spray 400 ML', '2024-09-07 23:30:59', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(66, 2200, 20, 'Professional Hair Trimmer <br/>\r\nStainless Steel Blade,easy to cut hair <br/>\r\nPass Type switch easy to operation <br/>\r\nCharging Indicator <br/>\r\nRechargeable Battery <br/>\r\nEasy And Stylish <br/>\r\nPrecision Cutting <br/>\r\nErgonomic Design For Easier Handling <br/>\r\nLight & compact <br/>\r\nStainless steel blade <br/>\r\nEasy to cut your hair <br/>\r\nPress type switch <br/>\r\nCharging indicator <br/>\r\nNot water proof <br/>\r\nCleaning brush and oil bottle included ', 'Geemy GM 769 Trimmer', '2024-09-07 23:43:14', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(67, 5650, 20, 'Titanium Blade Technology <br/>\r\nTurbo boost feature <br/>\r\nRechargeable <br/>\r\nCord & Cordless <br/>\r\nTrimmer Blade Professional Grade Blades To Define Your Facial Style, Dual Shaver Ultra Close Shave & Ability To Edge With Precision, Nose & ear Trimmer Safe,easy & Hygienic Grooming, Precision Trimmer Define Both Straight Or Curved Lines And Edges', 'Gemei 7 In 1 Rechargeable Trimmer', '2024-09-07 23:55:41', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(68, 2200, 20, 'Excellent Clipping Function with Sharp Stainless Steel Blade for Endurance. <br/>\r\nPerfect for Trimming Beard And Mustaches. <br/>\r\n4 Attachment Combs For Ultimate Trimming Versatility. <br/>\r\nWireless Operation and Indicator light function. <br/>\r\nDurable Powerful Motor And Switch for Easy On/Off <br/>\r\nHigh efficiency battery for 45 minutes non stop usage after full charge. <br/>\r\nRechargeable battery - Charging time 4-8 hours. <br/>\r\nAvailable Colors - Blue & Red <br/>\r\nInput 220V-240V 50Hz-60Hz 3w. <br/>\r\nTrimmer, User Manuel, 4 Size Comb Clips, Lubricant Oil, Cleaning Brush. <br/>', 'Geemy Gm-6055 Rechargeable Trimmer', '2024-09-08 00:07:44', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(69, 1150, 20, 'Wave effect plate &Temperature control <br/>\r\nPower: 45W <br/>\r\nLong cable <br/>\r\nVoltage 220-240 v Heating temperature: 160 - 200 ° C <br/>\r\n360 swivel power cord  <br/>\r\nFreely create the ideal hairstyle and be satisfied with soft and shiny hair <br/>\r\nCeramic coating <br/>\r\nPower indicator light <br/>\r\nFor all hair types <br/>\r\nPTC heater with rapid heating <br/>\r\nProduct type: Hair Straighteners', 'Geemy Gm-2995 Hair Straightener', '2024-09-08 00:22:28', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(70, 2900, 20, 'High compatibility, play with all standard USB devices, computer, laptop, tablet, etc. <br/>\r\nMini size, easy to carry, only take small area on desktop. <br/>\r\nUse good quality speaker module, amazing sound performance. <br/>', 'Kisonli K100 Computer Speaker System', '2024-09-08 00:32:00', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(71, 2000, 20, 'The Humaira Laser Pointer is a powerful and versatile tool designed for professionals and enthusiasts. Emitting a 1000nW green light, this laser pointer provides enhanced visibility for presentations, teaching, stargazing, and outdoor activities. The laser pointer features a rotating cap, allowing users to change the laser beam pattern to suit their needs. For added security, it comes with two keys and a keyhole at the back, ensuring it can be turned off when not in use. The rechargeable 6800 mAh battery ensures long-lasting performance, and the pack includes a charger for easy and convenient recharging. With a wavelength of 532nm + 10, the Humaira Laser Pointer is a Class III B laser product, meeting safety standards for reliable and safe operation. Crafted with durability in mind, this laser pointer is made from high-quality materials and precise engineering. Its user-friendly interface and controls make it easy to use for various applications.', 'Laser Pointer Green Light', '2024-09-08 00:44:03', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(72, 1950, 20, 'Note: In voice change mode, the speech will echo to ensure that you can hear the voice change effect clearly. <br/>\r\nEarphones & mic work with any 3.5mm jack Light weights <br/>\r\nRemote (Play/Pause button) is supported by all Samsung models <br/>\r\nSuperb sound quality & Deep brass and effective noise isolation <br/>\r\nUltra lightweight & Support voice memos <br/>\r\nOn cable mic/remote for easy and hands free calling. <br/>\r\nHigh purity copper wire, perfect anti-interference performance <br/>\r\n3.5mm jack in-ear earphones, compatible with most of smart phones <br/>\r\nSupport songs switching and volume control <br/>\r\nAdopted 10mm loudspeaker <br/>\r\nHigh purity copper wire, perfect anti-interference performance <br/>\r\nThe horn size: 14mm membranes <br/>\r\nImpedance: 32ohoms, Spirit acuity: 108DB+/- 3DB, Line length: 135cm, Product weight: about 15g <br/>\r\nType: Earphones (Earbuds / In-Ear) <br/>\r\nFunctions: Song switch,Volume Control <br/>\r\nColor: White, Headphone jack: 3.5mm <br/>\r\nFrequency Range: 20 - 20000Hz <br/>\r\nSpeaker size: 10mm Cable <br/>\r\nSensitivity: 95 dB & plusmn : 3 dB. <br/>\r\nMicrophone: equipped. <br/>', 'Wireless 3 Inches Speaker KTS-1720', '2024-09-08 00:56:15', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(73, 3500, 10, 'Condition: and high quality <br/>\r\nAngel eye light color: White <br/> \r\nFog light color: White <br/>\r\nDiameter: 3.5inch(89mm) <br/>\r\nVoltage: 12V <br/>\r\nMaterial: aluminum alloy <br/>\r\n5W x 2=10W <br/>\r\nCOB led chips <br/>\r\nLuminance:1200LM <br/><br/>\r\n<b>Features</b><br/>\r\nIt is for one set Lens projector LED fog light with COB LED angel eye halo rings. <br/>\r\nYou can pretty much install these for any cars, SUV either replacing the existing fog or as fog lights. <br/>\r\nLED lighting output,super brightness.<br/>\r\nIt is come with a glass projector lens, which makes the light beam very focus and projects the light much farer than regular model. <br/>\r\nLED lights consume much less power than halogen bulbs. <br/>\r\nThe service much than halogen bulbs, average lifespan of LED light is 50,000 working hour. <br/>\r\nAs long as your vehicle on the lower bumper have enough clearance space, you can install this for your vehicle. <br/>', '2Pcs Car Universal Fog Light', '2024-09-08 01:16:01', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(74, 3500, 30, 'Voltage 12V <br/>\r\nPlace of Origin Guangdong, China <br/>\r\nModel Number BB142 <br/>\r\nMaterial	plastic <br/>\r\nColor White+White ring/Blue ring <br/>\r\nLifespan	50000 Hours <br/>\r\nOEM OEM Service <br/>\r\nPackage	Color Box <br/>\r\nPower 20W', '3inch Led Round Fog Light', '2024-09-08 01:23:37', 300, 300, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(75, 2800, 5, 'Supports VESA Compatible 100mm x 100mm to 400mm x 400mm, for 14-42 inches TVs. <br/>\r\n-Solid, heavy-gauge steel construction with a durable coated finish and safely accommodates up to a 110lbs TV <br/>\r\n-Adjustable swivel arm and tilt plate provide maximum viewing flexibility. <br/>\r\n-It articulates out from the wall from 80mm to 550mm and cable management saves valuable living space <br/>\r\n-It is suitable for smaller rooms or apartments where space is limited, as well as large spaces allowing anyone in the room to see clearly <br/>', 'Universal TV Wall Mount for 14-42 Inches', '2024-09-08 01:35:27', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(76, 1200, 10, 'Built-in high-precision limited flow chip, the effective club is excellent for overpressure, overflow, short circuit and high temperature <br/>\r\nAdopt the international common AC 100v-240v wide voltage input and 50-60Hz voltage  <br/>\r\nFrequency to meet the needs of different countries and regions, The shell is made of fireproof material with high strength and heat resistance <br/>\r\nCompact size,easy to carry  <br/>\r\nSuitable for mainstream brands such as apple and android phones and tablets <br/>', '2 in 1 EXcellent Quick Charger', '2024-09-08 01:52:00', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1),
	(77, 1850, 10, '<b>Product features</b><br/>\r\nQualcomm Quick Charge 3.0<br/>\r\nHigh-precision circuit board, not only built-in smart charging chip <br/>\r\nAutomatically match the appropriate current, but also compatible with all currents Intelligent device.<br/>\r\nAdapt to 100-240V wide voltage, global universal voltage range, voltage level can be Work normally without damaging the equipment.<br/>\r\nSupport 3A fast charging and fast charging of mobile phones and tablets.<br/>\r\nWhen charging a single device, the charging speed will increase at the same time. Standard British power interface.<br/>\r\nMADE IN KOREA\r\n', 'Fast Charger with Cable 18W', '2024-09-08 01:56:37', 300, 350, 1, 1, 'tharinduchanaka6@gmail.com', 1);

-- Dumping structure for table ceonline.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.profile_image: ~4 rows (approximately)
REPLACE INTO `profile_image` (`path`, `user_email`) VALUES
	('resources/proimg/Dhanushka_667433e3b3dc1.jpeg', 'dhanushkalakmal@gmail.com'),
	('resources/proimg/Gemy_6679a7890d767.jpeg', 'gemhush@gmail.com'),
	('resources/proimg/Kasuni_667430f6ee5e9.jpeg', 'kasunijayamali.kj@gmail.com'),
	('resources/proimg/Sadeesha_6674329b1632f.jpeg', 'sadeeshanilakshi25@gmail.com'),
	('resources/proimg/Maleesha_66743613bf5dd.jpeg', 'shehanjsmmaleesha@gmail.com'),
	('resources/proimg/Tharindu_667432c9c038b.jpeg', 'tharinduchanaka6@gmail.com');

-- Dumping structure for table ceonline.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `province_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.province: ~8 rows (approximately)
REPLACE INTO `province` (`id`, `province_name`) VALUES
	(1, 'Uva'),
	(2, 'Western'),
	(3, 'Northern'),
	(4, 'Southern'),
	(5, 'North Central'),
	(6, 'North West'),
	(7, 'Eastern'),
	(8, 'Sabaragamuwa'),
	(9, 'Central');

-- Dumping structure for table ceonline.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `recent_status` int NOT NULL,
  `removed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_product1_idx` (`product_id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.recent: ~0 rows (approximately)

-- Dumping structure for table ceonline.status
CREATE TABLE IF NOT EXISTS `status` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`s_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.status: ~2 rows (approximately)
REPLACE INTO `status` (`s_id`, `s_name`) VALUES
	(1, 'Active'),
	(2, 'Deactivate');

-- Dumping structure for table ceonline.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.supplier: ~2 rows (approximately)
REPLACE INTO `supplier` (`id`, `name`) VALUES
	(1, 'Super Light Electronics'),
	(2, 'TV Center'),
	(3, 'Dissanayaka Electronics');

-- Dumping structure for table ceonline.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `password` varchar(25) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `join_date` date NOT NULL,
  `verification_code` varchar(25) DEFAULT NULL,
  `status` int NOT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.user: ~7 rows (approximately)
REPLACE INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `join_date`, `verification_code`, `status`, `gender_id`) VALUES
	('dhanushkalakmal@gmail.com', 'Dhanushka', 'Lakmal', 'WMDLkmal67@56', '0753795742', '2024-06-20', NULL, 1, 1),
	('emtylee@gmail.com', 'Eminem', 'Tyler', 'emtyLEE#890', '0781441090', '2024-06-25', NULL, 1, 1),
	('gemhush@gmail.com', 'Gemy', 'Hustler', 'genHish%#889', '0751561764', '2024-06-24', NULL, 1, 1),
	('kasunijayamali.kj@gmail.com', 'Kasuni', 'Jayamali', 'kasuniJayaMali789', '0715555909', '2024-06-20', '66766875c3af7', 1, 2),
	('sadeeshanilakshi25@gmail.com', 'Sadeesha', 'Nilakshini', 'Sadee#0325', '0743528374', '2024-04-03', NULL, 1, 2),
	('shehanjsmmaleesha@gmail.com', 'Maleesha', 'Shehan', 'SJMaleesha456@', '0704832705', '2024-06-20', NULL, 1, 1),
	('tharinduchanaka6@gmail.com', 'Tharindu', 'Chanaka', 'TharinduCHA@8754', '0751441764', '2024-03-29', '667e5f3b640d6', 1, 1);

-- Dumping structure for table ceonline.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text NOT NULL,
  `line2` text NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.user_has_address: ~6 rows (approximately)
REPLACE INTO `user_has_address` (`id`, `line1`, `line2`, `postal_code`, `user_email`, `city_id`) VALUES
	(1, '291/1', 'Uduhulpotha', '90100', 'tharinduchanaka6@gmail.com', 1),
	(2, 'No.303/2', 'Bogahamadiththa', '90060', 'sadeeshanilakshi25@gmail.com', 4),
	(3, 'Jayamali Niwasa, Pussala', 'B/Kalupahana', '90060', 'kasunijayamali.kj@gmail.com', 12),
	(4, 'Vasipana', 'Badalkumbura', '90550', 'dhanushkalakmal@gmail.com', 1),
	(5, 'Jayasri, Helakirindha', 'Guruthalawa', '90100', 'shehanjsmmaleesha@gmail.com', 5),
	(6, 'No, 123 B', 'High Level Road', '11222', 'gemhush@gmail.com', 7);

-- Dumping structure for table ceonline.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishlist_product1_idx` (`product_id`),
  KEY `fk_wishlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_wishlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_wishlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.wishlist: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
