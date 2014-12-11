CREATE DATABASE  IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecommerce`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.5.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'calitexas321@gmail.com','12345678','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (25,'PHP Stack','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,'JS Stack','0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'Full stack developer','0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,'SQL Database','0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,'Bug fixer','0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'Front-end','0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'Mobile','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `products_ID` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordered_product`
--

DROP TABLE IF EXISTS `ordered_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordered_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ordered_product_orders1_idx` (`orders_id`),
  KEY `fk_ordered_product_products1_idx` (`product_id`),
  CONSTRAINT `fk_ordered_product_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ordered_product_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordered_product`
--

LOCK TABLES `ordered_product` WRITE;
/*!40000 ALTER TABLE `ordered_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordered_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_users_idx` (`user_id`),
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `inventory_count` int(11) DEFAULT NULL,
  `quantity_sold` int(11) DEFAULT NULL,
  `images_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (50,'Front-end PHP',50,'Can use PHP with HTML, CSS, JQuery','0000-00-00 00:00:00','0000-00-00 00:00:00',20,5,NULL),(51,'MEAN stack specialist',70,'Can do anything using Mondo DB, express, node or angular.','0000-00-00 00:00:00','0000-00-00 00:00:00',15,7,NULL),(52,'Everything',40,'These guys know a little bit about a lot of things. They learn very quickly','0000-00-00 00:00:00','0000-00-00 00:00:00',40,25,NULL),(53,'MySQL database specialist',45,'Knows everything to know about queries and ERD\'s','0000-00-00 00:00:00','0000-00-00 00:00:00',10,3,NULL),(54,'Fantastic De-bugger',85,'Really great at trouble shooting!','0000-00-00 00:00:00','0000-00-00 00:00:00',25,7,NULL),(55,'ANYTHING javascript',75,'Knows everything from jquery to angular','0000-00-00 00:00:00','0000-00-00 00:00:00',30,10,NULL),(56,'Amazon Tools',45,'Can work with all amazon tools!','0000-00-00 00:00:00','0000-00-00 00:00:00',60,15,NULL),(57,'Apple Expert',100,'Can help with any apple application on mobile OR desktop','0000-00-00 00:00:00','0000-00-00 00:00:00',40,12,NULL),(58,'Node',95,'Can implement node to make your website more effectinve!','0000-00-00 00:00:00','0000-00-00 00:00:00',10,2,NULL),(60,'Beautiful Design!',90,'Implements  beautiful front-end design with word press and bootstrap','0000-00-00 00:00:00','0000-00-00 00:00:00',20,8,NULL),(61,'Designer + Developer',150,'These two work seamlessly together and can implement ANY design feature you could possible want!','0000-00-00 00:00:00','0000-00-00 00:00:00',5,1,NULL),(62,'Clean up old codes',120,'Do you have old codes that are too hard to read? Our guy can sort through everything and clean up your entire project!','0000-00-00 00:00:00','0000-00-00 00:00:00',7,3,NULL),(63,'Android ',119.99,'Can help with ANY android app','0000-00-00 00:00:00','0000-00-00 00:00:00',60,10,NULL),(64,'Git specialist',135,'Will help train your staff and implement github for your entire company','0000-00-00 00:00:00','0000-00-00 00:00:00',8,3,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_has_category`
--

DROP TABLE IF EXISTS `products_has_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_has_category` (
  `products_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`,`category_id`),
  KEY `fk_products_has_category_category1_idx` (`category_id`),
  KEY `fk_products_has_category_products1_idx` (`products_id`),
  CONSTRAINT `fk_products_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_category_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_has_category`
--

LOCK TABLES `products_has_category` WRITE;
/*!40000 ALTER TABLE `products_has_category` DISABLE KEYS */;
INSERT INTO `products_has_category` VALUES (50,25),(51,26),(55,26),(58,26),(52,27),(56,27),(57,27),(64,27),(53,28),(54,29),(62,29),(60,30),(61,30),(63,31);
/*!40000 ALTER TABLE `products_has_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city_state` varchar(255) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'AmyBeall','1524 California St','San FranciscoCa',94109,'2014-12-10 09:53:58','2014-12-10 09:53:58'),(7,'Arthur Mak','555 San Jose avenue','Mountain ViewCA',94687,'2014-12-10 09:56:16','2014-12-10 09:56:16'),(8,'KellyChen','444 Pacific ave','San JoseCA',94232,'2014-12-10 09:57:15','2014-12-10 09:57:15'),(9,'MishDev','12345 Community st','San JoseCA',94806,'2014-12-10 09:57:56','2014-12-10 09:57:56'),(10,'ChrisMastree','2536 holiday dr','San MateoCA',94086,'2014-12-10 09:59:20','2014-12-10 09:59:20'),(11,'Johnny Smithery','2436 Washington ave','San LeandroCA',45209,'2014-12-10 10:00:23','2014-12-10 10:00:23'),(12,'CrystinWellington','23432 Goforth st','OaklandCa',93784,'2014-12-10 10:01:29','2014-12-10 10:01:29'),(13,'CoriFreeland','1250 California st','San Francisco CA 94109',0,'2014-12-10 10:02:11','2014-12-10 10:02:11'),(14,'Raul Gonzalez','1233453 Ciudad way','San FranciscoCA ',24347,'2014-12-10 10:03:09','2014-12-10 10:03:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-10 11:20:36
