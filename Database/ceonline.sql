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
	('chanakaelectro@gmail.com', 'Chanaka', 'Electronics', '667d3761340ff'),
	('tharinduchanaka6@gmail.com', 'Tharindu', 'Chanaka', '6625fe8cad517');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.cart: ~12 rows (approximately)
REPLACE INTO `cart` (`id`, `qty`, `user_email`, `product_id`) VALUES
	(3, 3, 'sadeeshanilakshi25@gmail.com', 2),
	(4, 5, 'sadeeshanilakshi25@gmail.com', 1),
	(9, 4, 'tharinduchanaka6@gmail.com', 1),
	(10, 1, 'tharinduchanaka6@gmail.com', 3),
	(13, 1, 'sadeeshanilakshi25@gmail.com', 3),
	(14, 2, 'kasunijayamali.kj@gmail.com', 3),
	(15, 1, 'kasunijayamali.kj@gmail.com', 1),
	(16, 1, 'dhanushkalakmal@gmail.com', 1),
	(19, 1, 'gemhush@gmail.com', 5),
	(20, 1, 'gemhush@gmail.com', 4),
	(21, 1, 'emtylee@gmail.com', 7),
	(22, 1, 'shehanjsmmaleesha@gmail.com', 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.chat: ~4 rows (approximately)
REPLACE INTO `chat` (`chat_id`, `message`, `datetime`, `status`, `toadmin`, `fromuser`) VALUES
	(1, 'Hello Admin', '2024-06-23 17:08:40', 1, 'chanakaelectro@gmail.com', 'sadeeshanilakshi25@gmail.com'),
	(7, 'I am Tharindu', '2024-06-23 21:33:25', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(17, 'Hellooo There', '2024-06-23 23:18:05', 1, 'chanakaelectro@gmail.com', 'shehanjsmmaleesha@gmail.com'),
	(18, 'hello I am new here', '2024-06-24 17:22:53', 1, 'chanakaelectro@gmail.com', 'kasunijayamali.kj@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.chat2: ~10 rows (approximately)
REPLACE INTO `chat2` (`chat2_id`, `message`, `datetime`, `status`, `Fromadmin`, `touser`) VALUES
	(1, 'Hello ! User', '2024-06-23 17:49:18', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(2, 'Hello ! Sadee', '2024-06-23 17:49:43', 1, 'chanakaelectro@gmail.com', 'sadeeshanilakshi25@gmail.com'),
	(7, 'hello maleesha', '2024-06-24 17:01:11', 1, 'chanakaelectro@gmail.com', 'shehanjsmmaleesha@gmail.com'),
	(8, 'how you doing', '2024-06-24 17:03:30', 1, 'chanakaelectro@gmail.com', 'sadeeshanilakshi25@gmail.com'),
	(9, 'hello', '2024-06-24 17:05:44', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(14, 'how is going', '2024-06-24 17:20:22', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(15, 'wassup brotherr', '2024-06-24 17:21:36', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(16, 'ohh welcome to our online store', '2024-06-24 17:23:51', 1, 'chanakaelectro@gmail.com', 'kasunijayamali.kj@gmail.com'),
	(17, 'hey there', '2024-06-24 17:31:08', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com'),
	(21, 'hello', '2024-06-24 18:56:39', 1, 'chanakaelectro@gmail.com', 'tharinduchanaka6@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.feedback: ~14 rows (approximately)
REPLACE INTO `feedback` (`feed_id`, `type`, `feedback`, `date`, `product_id`, `user_email`, `Feed_status`) VALUES
	(1, 5, 'good product', '2024-04-01', 1, 'sadeeshanilakshi25@gmail.com', 1),
	(2, 2, 'some parts are broken', '2024-04-01', 2, 'tharinduchanaka6@gmail.com', 2),
	(3, 3, 'recommended Product', '2024-04-01', 3, 'sadeeshanilakshi25@gmail.com', 2),
	(4, 5, 'I ordered the product 2 days ago and I had it quick in delivery. Also the delivery cost is very reasonable and had a friendly service.. Thank you  ', '2024-04-02', 1, 'tharinduchanaka6@gmail.com', 1),
	(5, 4, 'I ordered the product a week days ago and I had it yesterday. Also the delivery cost is bit high but the product is quality and had a friendly service.. Thank you', '2024-04-02', 1, 'sadeeshanilakshi25@gmail.com', 1),
	(6, 2, 'I had the product quick in delivery but the strip does not fit to my television.  ', '2024-04-02', 1, 'tharinduchanaka6@gmail.com', 1),
	(7, 5, 'I recommended to buy this product. It also contain quality product, reasonable price and low delivery cost ', '2024-04-02', 3, 'sadeeshanilakshi25@gmail.com', 1),
	(8, 5, 'Quality Product, Reasonable Price ', '2024-04-02', 1, 'tharinduchanaka6@gmail.com', 1),
	(9, 4, 'Quality Product, Reasonable Price but delivery time is bit slow and cost a lot for one piece ', '2024-04-02', 2, 'sadeeshanilakshi25@gmail.com', 1),
	(10, 1, 'I have delivered the product but it is not working ', '2024-04-02', 2, 'tharinduchanaka6@gmail.com', 2),
	(11, 5, 'Recommended Product I successfully done my project', '2024-04-02', 2, 'tharinduchanaka6@gmail.com', 1),
	(12, 4, 'Quality Product, I have done my robotics project successfully.', '2024-04-02', 2, 'sadeeshanilakshi25@gmail.com', 1),
	(13, 1, 'My purchased one is broken. it indicates the yellow light but when I connected it to pc it is not working ', '2024-04-02', 2, 'tharinduchanaka6@gmail.com', 1),
	(14, 5, 'This Product is really well made and durable', '2024-06-08', 3, 'tharinduchanaka6@gmail.com', 1),
	(21, 5, 'I love this new body color design and also it increased the durability and high quality', '2024-06-14', 3, 'tharinduchanaka6@gmail.com', 1),
	(22, 5, 'This product is amazing and the valuable thing is you can also have 1 year Warranty with it ', '2024-06-22', 6, 'kasunijayamali.kj@gmail.com', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.image: ~49 rows (approximately)
REPLACE INTO `image` (`img_id`, `code`, `product_id`) VALUES
	(7, 'category/Product/rice1.jpg', 3),
	(8, 'category/Product/rice2.jpg', 3),
	(9, 'category/Product/rice3.jpg', 3),
	(10, 'category/Product/rice4.jpg', 3),
	(11, 'category/Product/hikvisionCamera1.jpg', 4),
	(12, 'category/Product/hikvisionCamera.jpg', 4),
	(13, 'category/Product/hikvisionCamera2.jpg', 4),
	(14, 'category/Product/hikvisionCamera3.jpg', 4),
	(15, 'category/Product/hikvisionCamera4.jpg', 4),
	(16, 'category/Product/hikvisionCamera5.jpg', 4),
	(17, 'category/Product/nintendo4.png', 5),
	(18, 'category/Product/nintendo0.jpg', 5),
	(19, 'category/Product/nintendo1.jpg', 5),
	(20, 'category/Product/nintendo2.jpg', 5),
	(21, 'category/Product/nintendo3.jpg', 5),
	(22, 'category/Product/nintendo5.jpg', 5),
	(23, 'category/Product/nintendo6.jpg', 5),
	(24, 'category/Product/nintendo7.jpg', 5),
	(25, 'category/Product/nintendo8.jpg', 5),
	(26, 'category/Product/pigeon4.jpg', 6),
	(27, 'category/Product/pigeon0.jpg', 6),
	(28, 'category/Product/pigeon1.jpg', 6),
	(29, 'category/Product/pigeon2.jpg', 6),
	(30, 'category/Product/pigeon3.png', 6),
	(31, 'category/Product/pigeon5.jpg', 6),
	(64, 'category//Product//Asus Prime A520M-E MICRO ATX Motherboard_0_6675d5afbb6c0.jpeg', 7),
	(65, 'category//Product//Asus Prime A520M-E MICRO ATX Motherboard_1_6675d5afbc660.png', 7),
	(66, 'category//Product//Asus Prime A520M-E MICRO ATX Motherboard_2_6675d5afbd1ad.jpeg', 7),
	(67, 'category//Product//Asus Prime A520M-E MICRO ATX Motherboard_3_6675d5afbe09d.png', 7),
	(68, 'category//Product//Asus Prime A520M-E MICRO ATX Motherboard_4_6675d5afbebae.jpeg', 7),
	(69, 'category//Product//Asus Prime A520M-E MICRO ATX Motherboard_5_6675d5afbfb7d.jpeg', 7),
	(105, 'category//Product//LA7840 NPN ( Bulk - 50)_0_6675d93732b99.jpeg', 8),
	(106, 'category//Product//LA7840 NPN ( Bulk - 50)_1_6675d937379ca.jpeg', 8),
	(107, 'category//Product//LA7840 NPN ( Bulk - 50)_2_6675d9373864c.jpeg', 8),
	(108, 'category//Product//LA7840 NPN ( Bulk - 50)_3_6675d937395c5.png', 8),
	(109, 'category//Product//LA7840 NPN ( Bulk - 50)_4_6675d9373a48e.jpeg', 8),
	(114, 'category//Product//Arduino Uno Rev3_0_6678323289045.jpeg', 2),
	(115, 'category//Product//Arduino Uno Rev3_1_6678323289f71.jpeg', 2),
	(116, 'category//Product//Arduino Uno Rev3_2_667832328a9dd.jpeg', 2),
	(117, 'category//Product//Arduino Uno Rev3_3_667832328b74a.jpeg', 2),
	(118, 'category//Product//Sony PlayStation 5 Slim_0_667b14ed25f93.jpeg', 9),
	(119, 'category//Product//Sony PlayStation 5 Slim_1_667b14ed2705d.jpeg', 9),
	(120, 'category//Product//Sony PlayStation 5 Slim_2_667b14ed27c5b.jpeg', 9),
	(121, 'category//Product//Sony PlayStation 5 Slim_3_667b14ed283ad.jpeg', 9),
	(122, 'category//Product//Abans 32D52 TV Backlight Strips_0_667bcb21c91e3.jpeg', 1),
	(123, 'category//Product//Abans 32D52 TV Backlight Strips_1_667bcb21c9f58.jpeg', 1),
	(124, 'category//Product//Abans 32D52 TV Backlight Strips_2_667bcb21cace7.jpeg', 1),
	(125, 'category//Product//Abans 32D52 TV Backlight Strips_3_667bcb21cb702.jpeg', 1),
	(126, 'category//Product//Abans 32D52 TV Backlight Strips_4_667bcb21cc6f7.jpeg', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.invoice: ~13 rows (approximately)
REPLACE INTO `invoice` (`id`, `order_id`, `date`, `total`, `d_status`, `iqty`, `product_id`, `user_email`, `remove_status`) VALUES
	(1, '660a619a832da', '2024-04-01', 4200, 5, 2, 1, 'tharinduchanaka6@gmail.com', 2),
	(2, '660a6361b8bbf', '2024-04-01', 4200, 3, 2, 1, 'sadeeshanilakshi25@gmail.com', 1),
	(3, '660a6e2d3258f', '2024-06-14', 3550, 5, 1, 2, 'sadeeshanilakshi25@gmail.com', 1),
	(4, '666f282ceb236', '2024-06-16', 7000, 5, 2, 2, 'sadeeshanilakshi25@gmail.com', 2),
	(5, '666f2a8d35e1e', '2024-06-16', 10200, 2, 5, 1, 'sadeeshanilakshi25@gmail.com', 1),
	(6, '666f2b68b5ae2', '2024-06-16', 6200, 5, 3, 1, 'sadeeshanilakshi25@gmail.com', 1),
	(7, '6670a529803df', '2024-06-18', 38500, 1, 11, 2, 'sadeeshanilakshi25@gmail.com', 1),
	(8, '6670a6cdecd22', '2024-06-18', 15300, 0, 1, 3, 'tharinduchanaka6@gmail.com', 1),
	(9, '667326b0ab2a3', '2024-06-20', 10200, 2, 5, 1, 'sadeeshanilakshi25@gmail.com', 1),
	(10, '667431c13ad89', '2024-06-20', 10500, 0, 3, 2, 'kasunijayamali.kj@gmail.com', 1),
	(11, '6674341b027fb', '2024-06-20', 46200, 0, 23, 1, 'dhanushkalakmal@gmail.com', 1),
	(12, '66743681700b2', '2024-06-20', 15300, 0, 1, 3, 'shehanjsmmaleesha@gmail.com', 1),
	(13, '6676670601769', '2024-06-22', 12100, 2, 1, 6, 'kasunijayamali.kj@gmail.com', 1),
	(14, '6679e03d3a9a6', '2024-06-25', 3010, 0, 50, 8, 'shehanjsmmaleesha@gmail.com', 1),
	(15, '667d0ce4ea76f', '2024-06-27', 16760, 0, 1, 4, 'tharinduchanaka6@gmail.com', 1);

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
  PRIMARY KEY (`id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_admin1_idx` (`admin_email`),
  CONSTRAINT `fk_product_admin1` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.product: ~9 rows (approximately)
REPLACE INTO `product` (`id`, `price`, `qty`, `description`, `title`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`, `status_id`, `category_id`, `admin_email`) VALUES
	(1, 2000, 200, '\r\nLG TV Models: 32LB5800-UG 32LB5610 32LB570B 32LB580V 32LB570V 32LF5610 32LF580V 32LF565B 32LB5700 32LB561B 32LB550U 32LB550B 32LB550B-UC 32LB5600-UH 32LB560B-UZ 32LX330C-UA 32LF5600-UB BUSFLJM 32LB5600-UZ 32LF595B-UB 32LB580 32LF550A\r\nItem type: Abans 32LB  led backlight panel <br/>\r\nPCB Material: Aluminum <br/>\r\nPCB Thickness:1OZ <br/>\r\nLED Source: SMD 3030/3535 Led Chip<br/>\r\nLED Power:	2W/LED <br/>\r\nLED Voltage:	6V/LED <br/>\r\nLens: Original from Korea <br/>\r\nColor Temperature: 7000k-13000k <br/>\r\nColor: Cold white <br/>\r\nLed bar Size:	590*15*1.0 <br/>\r\nOne Set:	3PCS ', 'Abans 32" TV Backlight', '2024-03-29 19:03:46', 300, 200, 1, 3, 'chanakaelectro@gmail.com'),
	(2, 3500, 90, 'The Arduino UNO is the best board to get started with electronics and coding. If this is your first experience tinkering with the platform, the UNO is the most robust board you can start playing with. The UNO is the most used and documented board of the whole Arduino family', 'Arduino Uno Rev3', '2024-04-02 17:14:36', 50, 30, 1, 3, 'chanakaelectro@gmail.com'),
	(3, 15000, 18, '2.8L Capacity\r\nNew color body in one design\r\nAuto matic keep warm function\r\nAccessorice including IM rice spoon and measuring cup\r\nadditional accessories : external aluminium steamer\r\nFashionable flower body option\r\nDurable and high qulity\r\nPower : 220-240V\r\nFrequency 50Hz\r\nWatts :1000W\r\n2.8L Capacity\r\nNew color body in one design\r\nAuto matic keep warm function\r\nAccessorice including IM rice spoon and measuring cup\r\nadditional accessories : external aluminium steamer\r\nFashionable flower body option\r\nDurable and high qulity\r\nPower : 220-240V\r\nFrequency 50Hz', 'TechSonic Rice Cooker 2.8L', '2024-04-22 12:03:48', 150, 300, 1, 2, 'chanakaelectro@gmail.com'),
	(4, 16600, 31, '1080P/WIFI/2M CAM/F2.0/APP\r\n\r\n1.Video: up to 1080p resolution, with 115° FOV\r\n2.Storage: supports TF card storage (Max.128GB) and recording overwrite\r\n3.G-sensor: adopts built-in G-sensor, supports lock and backup the recordings when collision occurs, supports event detection\r\n4.Communication: built-in Wi-Fi module\r\n5.APP: supports preview, playback and editing parameters via APP\r\n6.Easy installation and operation\r\n7.Auto recording once the device is powered on\r\n8.Low power consumption and high performance\r\n9.Color options:Black/Pink(TBD)/Yellow(TBD)/Green(TBD)', 'Hikvision AE-DC2015-B1 CCTV', '2024-06-21 00:33:03', 250, 160, 1, 1, 'chanakaelectro@gmail.com'),
	(5, 49500, 50, 'Switch and play: Anytime, anywhere, with anyone\r\nThree play modes: TV mode, tabletop mode and handheld mode\r\nShare the fun with Joy-Con - attach the two Joy-Con to the Joy-Con grip, it will work like a traditional controller and without the grip they work as two individual, fully-functioning controllers\r\nLocal and online multiplayer: Link up to eight consoles for multiplayer; online play with friends far away and players around the world\r\nNintendo support contact : 03456050247', 'Nintendo Neon R/ B Switch', '2024-06-21 00:51:46', 250, 499, 1, 1, 'chanakaelectro@gmail.com'),
	(6, 11600, 9, 'Feather touch control\r\n1800 Watt Power Consumption. Power Input: AC 230 - 250 V, 50 Hz\r\n35% energy savings compared to LPG Cooking\r\nPreset timer - Auto switch off\r\n8 Menus - Installed Induction cooktop\r\nLED Display for temperature indication\r\nSmart timer for hands-free cooking\r\nSuitable for making dosa, roti, deep fry, idli, heating milk, making curry\r\nThis cooktop comes with high-grade electrical that protects against short circuits.\r\nIts superior-top plate cans with-stand very high temperatures, making it very durable, Cord length: 1.5 meter', 'Pigeon Induction Cooktop', '2024-06-21 00:59:32', 600, 500, 1, 2, 'chanakaelectro@gmail.com'),
	(7, 30000, 25, 'CPU	 	\r\nAMD AM4 Socket for AMD Ryzen™ 5000 Series/ 5000 G-Series/ 4000 G-Series/ 3000 Series Desktop Processors 	 	 \r\nChipset	 AMD A520\r\nDual Channel Memory Architecture   ECC Memory (ECC mode) support varies by CPU.	 	 \r\nGraphic	 1  x D-Sub\r\nAMD Ryzen™ 5000 Series/ 5000 G-Series/ 4000 G-Series/ 3000 Series Desktop Processors\r\nStorage	Total supports 1 x M.2 slot(s) and 4 x SATA 6Gb/s ports\r\nLAN	 Realtek RTL8111H 1Gb Ethernet  ASUS LANGuard\r\nAudio	Realtek ALC887/897 7.1 Surround Sound High Definition Audio CODEC * 	 	 \r\nUSB Ports	 	\r\nRear USB Port ( Total 7  )\r\n 1 x USB 3.2 Gen 2 port(s)\r\n 4 x USB 3.2 Gen 1 port(s)(4 x Type-A)\r\n 2 x USB 2.0 port(s)(2 x Type-A)\r\n Front USB Port ( Total 6  )\r\n 2 x USB 3.2 Gen 1 port(s)(2 x Type-A)\r\n 4 x USB 2.0 port(s)(4 x Type-A)	 	 \r\nASUS Special Features	 	\r\nASUS 5X PROTECTION III\r\nASUS DIGI+ VRM\r\nASUS LANGuard\r\nASUS Overvoltage Protection\r\nASUS SafeSlot Core\r\nASUS Stainless-Steel Back I/O\r\nASUS Q-Design\r\nASUS Q-DIMM\r\nASUS Q-Slot\r\nASUS Thermal Solution\r\nAluminum heatsink design\r\nASUS Lighting Control\r\n 	 	 \r\nBack I/O Ports	 	\r\n1 x PS/2 keyboard/mouse combo port(s) 	 \r\nInternal I/O Ports	 	\r\n1 x CPU Fan connector(s)\r\n1 x Chassis Fan connector(s)\r\n1 x USB 3.2 Gen 1(up to 5Gbps) connector(s) support(s) additional 2 USB 3.2 Gen 1 port(s)\r\n2 x USB 2.0 connector(s) support(s) additional 4 USB 2.0 port(s)\r\n1 x M.2 Socket 3 with M key, type 2242/2260/2280 storage devices support (SATA & PCIE 3.0 x 4 mode)\r\n1 x SPI TPM header\r\n4 x SATA 6Gb/s connector(s)\r\n1 x S/PDIF out header(s)\r\n1 x 24-pin EATX Power connector(s)\r\n1 x 8-pin EATX 12V Power connectors\r\n1 x Front panel audio connector(s) (AAFP)\r\n1 x Clear CMOS jumper(s)\r\n1 x System panel connector\r\n1 x COM port header\r\n1 x Speaker connector\r\nBIOS 256 Mb Flash ROM, UEFI AMI BIOS	 	 \r\nManageability  WOL by PME, PXE\r\nOperating System  Windows® 10 64-bit\r\nForm Factor   mATX Form Factor\r\n8.9  inch x 8.7  inch ( 22.6  cm x 22.1  cm )', 'Asus Prime A520M-E MICRO ATX Motherboard', '2024-06-21 23:50:16', 430, 180, 1, 3, 'chanakaelectro@gmail.com'),
	(8, 60, 450, 'Bulk delivery minimum QTY 50 Pcs. \r\nThe LA7840 is a vertical deflection output IC for TVs and CRT displays with excellent image quality that use a BUS control system signal processing IC. This IC can drive the direct (even including a DC component) deflection yoke with the sawtooth wave output from the BUS control system signal processing IC. When used in conjunction with Sanyo LA7615 series of BUS control system signal processing ICs for TVs this IC can process all color television signal system functions through the BUS system. Because the maximum deflection current is 1.8 App the LA7840 is suited for small and medium screen sets.', 'LA7840 NPN ( Bulk - 50)', '2024-06-22 00:09:47', 15, 10, 1, 3, 'chanakaelectro@gmail.com'),
	(9, 200000, 56, 'Slim Design\r\nWith PS5®, players get powerful gaming technology packed inside a sleek and compact console design.\r\n1TB of Storage\r\nKeep your favorite games ready and waiting for you to jump in and play with 1TB of SSD storage built in\r\nUltra-High Speed SSD\r\nMaximize your play sessions with near instant load times for installed PS5® games.\r\nIntegrated I/O\r\nThe custom integration of the PS5® console’s systems lets creators pull data from the SSD so quickly that they can design games in ways never before possible.\r\nRay Tracing\r\nImmerse yourself in worlds with a new level of realism as rays of light are individually simulated, creating true-to-life shadows and reflections in supported PS5® games.\r\n4K-TV Gaming\r\nPlay your favorite PS5® games on your stunning 4K TV.\r\nUp to 120fps with 120Hz output\r\nEnjoy smooth and fluid high frame rate gameplay at up to 120fps for compatible games, with support for 120Hz output on 4K displays.\r\n\r\nHDR Technology\r\nWith an HDR TV, supported PS5® games display an unbelievably vibrant and lifelike range of colors.\r\nTempest 3D AudioTech\r\nImmerse yourself in soundscapes where it feels as if the sound comes from every direction. Your surroundings truly come alive with Tempest 3D AudioTech in supported games.\r\nHaptic Feedback\r\nExperience haptic feedback via the DualSense® wireless controller in select PS5® titles and feel the effects and impact of your in-game actions through dynamic sensory feedback.\r\n\r\nAdaptive Triggers\r\nGet to grips with immersive adaptive triggers, featuring dynamic resistance levels which simulate the physical impact of in-game activities in select PS5® games.\r\n\r\nIncludes ASTROS Playroom\r\nExplore four worlds, each one showcasing innovative gameplay using the versatile features of the DualSense® wireless controller, in this game included for all PS5® console users.\r\nBackwards Compatibility & Game Boost\r\nThe PS5® console can play over 4,000 PS4® games. With the Game Boost feature, you can even enjoy faster and smoother frame rates in some of the PS4® consoles greatest games.\r\n', 'Sony PlayStation 5 Slim', '2024-06-26 00:35:17', 500, 600, 1, 1, 'chanakaelectro@gmail.com');

-- Dumping structure for table ceonline.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.profile_image: ~5 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.recent: ~16 rows (approximately)
REPLACE INTO `recent` (`id`, `product_id`, `user_email`, `recent_status`, `removed`) VALUES
	(1, 2, 'sadeeshanilakshi25@gmail.com', 1, '2024-06-16 18:01:16'),
	(2, 1, 'sadeeshanilakshi25@gmail.com', 1, '2024-06-16 18:01:18'),
	(3, 2, 'tharinduchanaka6@gmail.com', 1, '2024-06-16 18:01:18'),
	(4, 3, 'sadeeshanilakshi25@gmail.com', 1, '2024-06-16 18:01:19'),
	(5, 3, 'tharinduchanaka6@gmail.com', 1, '2024-06-16 18:01:20'),
	(6, 1, 'tharinduchanaka6@gmail.com', 1, '2024-06-16 18:01:20'),
	(7, 1, 'sadeeshanilakshi25@gmail.com', 1, '2024-06-16 18:01:21'),
	(8, 2, 'sadeeshanilakshi25@gmail.com', 1, '2024-06-16 18:04:27'),
	(9, 3, 'sadeeshanilakshi25@gmail.com', 1, '2024-06-18 21:11:32'),
	(10, 2, 'tharinduchanaka6@gmail.com', 1, '2024-06-22 14:47:07'),
	(11, 1, 'tharinduchanaka6@gmail.com', 1, '2024-06-22 18:47:12'),
	(12, 2, 'tharinduchanaka6@gmail.com', 1, '2024-06-22 18:47:14'),
	(13, 3, 'tharinduchanaka6@gmail.com', 1, '2024-06-22 18:47:15'),
	(14, 2, 'shehanjsmmaleesha@gmail.com', 1, '2024-06-25 02:21:35'),
	(15, 1, 'shehanjsmmaleesha@gmail.com', 1, '2024-06-25 02:21:37'),
	(16, 3, 'shehanjsmmaleesha@gmail.com', 1, '2024-06-25 02:27:24');

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
	('tharinduchanaka6@gmail.com', 'Tharindu', 'Chanaka', 'TharinduCHA@8754', '0751441764', '2024-03-29', '66781f8bb9af2', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ceonline.wishlist: ~14 rows (approximately)
REPLACE INTO `wishlist` (`id`, `product_id`, `user_email`) VALUES
	(16, 1, 'sadeeshanilakshi25@gmail.com'),
	(17, 2, 'kasunijayamali.kj@gmail.com'),
	(18, 1, 'kasunijayamali.kj@gmail.com'),
	(19, 2, 'dhanushkalakmal@gmail.com'),
	(20, 1, 'dhanushkalakmal@gmail.com'),
	(21, 3, 'dhanushkalakmal@gmail.com'),
	(23, 6, 'kasunijayamali.kj@gmail.com'),
	(24, 4, 'kasunijayamali.kj@gmail.com'),
	(25, 5, 'kasunijayamali.kj@gmail.com'),
	(26, 4, 'tharinduchanaka6@gmail.com'),
	(27, 5, 'tharinduchanaka6@gmail.com'),
	(28, 2, 'tharinduchanaka6@gmail.com'),
	(29, 7, 'gemhush@gmail.com'),
	(30, 6, 'gemhush@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
