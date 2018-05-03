-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2018 at 10:23 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `purchased_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_x_cart` (`product_id`),
  KEY `user_x_cart` (`user_id`),
  KEY `status_x_cart` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `purchased_at`, `status_id`) VALUES
(1, 1, 1, '2018-04-26 20:23:45', 3),
(7, 1, 1, '2018-04-14 19:01:55', 1),
(11, 4, 1, '0000-00-00 00:00:00', 1),
(12, 5, 1, '0000-00-00 00:00:00', 3),
(13, 9, 1, '0000-00-00 00:00:00', 3),
(14, 3, 1, '0000-00-00 00:00:00', 1),
(29, 2, 6, '2018-05-02 14:28:17', 1),
(30, 1, 6, '2018-05-02 14:28:17', 1),
(31, 3, 6, '2018-05-02 14:28:17', 1),
(32, 6, 6, '2018-05-02 14:28:17', 1),
(33, 5, 6, '2018-05-02 14:28:17', 1),
(34, 2, 6, '2018-05-02 14:28:37', 1),
(35, 7, 6, '2018-05-02 14:28:50', 1),
(36, 2, 6, '2018-05-02 14:29:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Bathroom'),
(2, 'Electronics'),
(3, 'Kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT '',
  `description` text,
  `price` varchar(10) DEFAULT '',
  `url` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `xid` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `price`, `url`) VALUES
(1, 3, 'Kitchen Aid KSM150PS SM Artisan 5 Qt. Stand Mixer', 'Retro styled and easy to use, the Kitchen Aid Artisan stand mixer is the perfect kitchen companion. Employing a unique tilting head to facilitate bowl and content removal, this mixer is undeniably handy. 1- year hassle-free replacement warranty.', '15.99', 'mixer.jpg'),
(2, 3, 'Cuisinart SS-10 Premium Single-Serve Brewer', 'Fully programmable with adjustable brew strength and temperature, this Cuisinart coffee maker gives you single-serve convenience. The K-Cup compatible system has a choice of five cup sizes, from a 4-oz. espresso to a travel-mug- ready 12 oz. A Home Barista re-usable filter cup is included to let you create custom blends.', '7.17', 'coffee-maker.jpg'),
(3, 3, 'Fiesta Dinner Plates', 'Perhaps the name Fiesta was chosen in 1936 because the famous collection comes in so many festive colors. The collection\'s solid colors all coordinate with one another, so feel free to mix and match dinner plates.', '5.65', 'plates.jpg'),
(4, 2, 'Samsung 43 Class LED 1080p Smart HDTV', 'Watch Full HD scenes on this 43-inchSamsung smart LED TV. Its Wi-Fi connectivity and quad-core processor provide seamless performance on multimedia and Internet content, and its Connect Share movie feature lets you view photos and videos from a USB-connected device. This Samsung smart LED TV has two HDMI ports to connect high-definition media components.', '30.90', 'tv.jpg'),
(5, 2, 'HP Spectre X 360 2-in-1 13.3\" Touch-Screen Laptop ', 'Experience better productivity and up to 15 hours of battery life with this 13.3-inch HP Spectre convertible laptop. It includes a stylus compatible with Windows Ink for precise drawing, and its speedy Intel Core i7processor and 8GB of RAM ensure efficient multitasking. This HP Spectre convertible laptop has a 256GB solid-state drive for all your files and programs.', '111.99', 'laptop.jpg'),
(6, 2, 'Sony PlayStation 4 1TB Console Black', 'Conquer virtual enemies with this Sony PlayStation 4. It\'s compatible with the latest game titles to provide hours of entertainment, and it lets you access PlayStation Vue so you can enjoy your favorite shows.', '70.01', 'ps4.jpg'),
(7, 1, 'Hotel Collection Micro Cotton Bath Towel', 'Experience a new level of luxury with the Hotel Collection Ultimate MicroCotton bath towel collection.Ultra-soft and extra-absorbent, thesetowels make a blissful addition to yourbath.', '56.76', 'towel.jpg'),
(8, 1, 'Seventh Generation Hand Wash', '3 pack of Seventh Generation Hand Wash Black Currant &amp; Rosewater 12Oz Stock up with a 3 pack of Seventh Generation Hand Wash Black Currant & Rosewater 12 Oz!', '35.40', 'soap.jpg'),
(9, 1, 'Scott 1000 Toilet Paper', 'Take care of your family with Scott 1000 Bath Tissue, America&#39;s longest lasting roll, and enjoy fewer roll changes and more value for your home.', '22.99', 'tissue.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_type` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_type`) VALUES
(1, 'Purchased'),
(3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `password` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'joe', 'asdfasdf'),
(2, 'dee', 'asdfasdf'),
(3, 'jack', 'j'),
(4, 'jjadkfj', 'j'),
(5, 'joey', 'asdfasdf'),
(6, 'Baris', '123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `prod_x_cart` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `status_x_cart` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_x_cart` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `xid` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
