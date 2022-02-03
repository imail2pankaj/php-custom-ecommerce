-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 10:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `catogary`
--

CREATE TABLE `catogary` (
  `id` int(11) NOT NULL,
  `catogary_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catogary`
--

INSERT INTO `catogary` (`id`, `catogary_name`, `created_at`) VALUES
(1, 'Electronics', '2022-01-10 12:42:48'),
(2, 'Mobiles', '2022-01-10 12:42:56'),
(3, 'Fashion', '2022-01-10 12:43:03'),
(4, 'Grocery', '2022-01-10 15:03:40'),
(5, 'Home Decor', '2022-01-10 15:04:30'),
(6, 'Furniture', '2022-01-10 15:09:06'),
(7, 'Cars', '2022-01-31 18:42:56'),
(8, 'Home Appliances', '2022-01-31 18:48:21'),
(9, 'Flowers', '2022-01-31 18:48:48'),
(10, 'Home', '2022-01-31 18:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `home_slides`
--

CREATE TABLE `home_slides` (
  `id` int(11) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slides`
--

INSERT INTO `home_slides` (`id`, `slider_image`, `slider_name`, `description`, `created_at`) VALUES
(43, '1642240002-5.JPG', 'palace', 'A palace is a grand residence, especially a royal residence, or the home of a head of state or some other high-ranking dignitary, such as a bishop or archbishop. ... The word is also sometimes used to describe a lavishly ornate building used for public entertainment or exhibitions such as a movie palace.', '2022-01-15 15:00:29'),
(56, '1642596286-wallpaper2you_169015.jpg', 'wallpaper', 'sun with tree', '2022-01-19 18:14:46'),
(57, '1642596391-awesome-beach-sunset-1024x768-wallpaper.jpg', 'beach', 'A beach is a narrow strip of land separating a body of water from inland areas. Beaches are usually made of sand, tiny grains of rocks and minerals that have been worn down by constant pounding by wind and waves. ... A beach is a narrow, gently sloping strip of land that lies along the edge of an ocean, lake, or river.', '2022-01-19 18:16:31'),
(58, '1643634675-wp2208685.png', 'wall', 'wall', '2022-01-31 18:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `address_id` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending,1-accepted,\r\n2-rejected,3-paid,4-failed,5-confirmed,6-shipped,7-completed,8-canceled',
  `transaction_id` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` text NOT NULL,
  `catogary_id` int(50) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1-active,0-inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_image`, `catogary_id`, `product_desc`, `product_price`, `selling_price`, `status`, `created_at`) VALUES
(60, 'Flower', 'Hydrangeas.jpg', 9, 'thor', 100, 80, 1, '2022-01-13 19:01:52'),
(61, 'Flower', 'Tulips.jpg', 9, 'fasfaf', 299, 249, 1, '2022-01-13 19:04:30'),
(64, 'Palace', '5.JPG', 10, 'palace', 2000, 1899, 0, '2022-01-15 14:57:15'),
(65, 'Palace', 'Lighthouse.jpg', 10, 'palace ', 5000000, NULL, 1, '2022-01-15 19:28:13'),
(67, 'nature', 'Desert.jpg', 8, 'desert ', 49999, NULL, 0, '2022-01-17 11:11:46'),
(71, 'Hyundai verna', 'verna.jpg', 7, 'the best hyundai car.', 700000, 699999, 1, '2022-01-19 17:27:06'),
(72, 'Hyundai santro', 'hyundai.jpg', 7, 'hyundai small but comfortable car.', 600000, 599999, 1, '2022-01-19 17:28:33'),
(73, 'MG', 'mg.jpg', 7, 'the best MG car.', 1800000, 1700000, 1, '2022-01-19 17:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `height` float NOT NULL,
  `password` text NOT NULL,
  `user_type` int(4) NOT NULL DEFAULT 2 COMMENT '1-admin,2-user',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `status`, `email`, `dob`, `gender`, `height`, `password`, `user_type`, `created_at`) VALUES
(1, 'admin', 'admin', 'active', 'admin@gmail.com', '1999-05-18', 'Male', 165, 'e10adc3949ba59abbe56e057f20f883e', 1, '2022-01-06 18:59:16'),
(2, 'kisan', 'gadoya', 'active', 'kisan@gmail.com', '2000-08-15', 'Male', 0, 'fb0dbd3051227208e0c7362d1bd714af', 2, '2022-01-06 01:41:49'),
(3, 'urvish', 'joshi', 'active', 'urvish@gmail.com', '1999-02-15', 'Male', 0, 'a24c5d7c6a1886676f3851fde78da92b', 2, '2022-01-06 01:42:32'),
(4, 'aaa', 'dd', 'active', 'abc@gmail.com', '1990-09-11', 'Male', 155, 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-01-07 12:02:58'),
(5, 'a', 'l', 'active', 'al@gmaiil.com', '1993-09-15', 'Male', 165, 'f5bb0c8de146c67b44babbf4e6584cc0', 2, '2022-01-07 16:41:39'),
(6, 'abc', 'jkj', 'active', 'kjk@gmail.com', '2000-12-15', 'Male', 155, 'cd78617d2f58605ffd218167685726e1', 2, '2022-01-07 16:42:57'),
(7, 'def', 'dj', 'inactive', 'fhghf@gmail.com', '2004-04-04', 'Male', 165, '6fdce2f14f4baf2d666fa13dfd8d1945', 2, '2022-01-07 16:45:20'),
(8, 'jkl', 'jd', 'active', 'ssdfsd@gmail.com', '2004-04-04', 'Male', 165, 'b3ddbc502e307665f346cbd6e52cc10d', 2, '2022-01-07 16:46:17'),
(13, 'Stella ', 'Ramsey', 'active', 'Stella@gmail.com', '1994-09-21', 'Female', 155, '96e79218965eb72c92a549dd5a330112', 2, '2022-01-22 15:31:51'),
(14, 'john', 'john', 'active', 'john1@gmail.com', '1974-11-22', 'Male', 165, '96e79218965eb72c92a549dd5a330112', 2, '2022-02-02 18:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `name`, `phone`, `address`, `pincode`, `city`, `state`) VALUES
(12, 1, 'Marguerite Turner', '6896128762', 'Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016', 360003, 'Bangalore', 'Karnataka'),
(13, 11, 'Elsie Strickland', '7891451891', '7981 Augusta Dr.\nMechanicsburg, PA 17050', 3611131, 'Mechanicsburg', 'Pennsylvania'),
(14, 12, 'Barbara Norton', 'addas', '72 Creekside St.\nRoy, UT 84067', 360003, 'Roy', 'Utah'),
(15, 12, 'Norton', '917818525', '612 Buckingham St.\nGrosse Pointe, MI 48236', 521525, 'Grosse Pointe', 'Michigan'),
(16, 12, 'Barbara ', '917818525', '836 Beaver Ridge Drive\nRichmond, VA 23223', 521525, 'Richmond', 'Vignia'),
(17, 12, 'Barbton', '67573543543', '3 North Street\nLondon\nEC08 6PK', 43535, 'London', 'UK'),
(18, 1, 'Tony Drake', '917818525', '7488 West Beaver Ridge Drive\nBronx, NY 10467', 360003, 'New york', 'US'),
(21, 1, 'admin', '7891451891', 'asdadasdasdsada', 3611131, 'abc', 'sadasd'),
(24, 13, 'sdasd', '768546845', 'fsdasdadsd', 546342, 'uk', 'uk'),
(25, 13, 'sdasd', '768546845', 'fsdasdadsd', 546342, 'uk', 'uk'),
(26, 13, 'sdasd', '768546845', 'fsdasdadsd', 546342, 'uk', 'uk'),
(27, 13, 'Andres de fonlosa', '768546845', 'Avda. Rio Nalon 79\nPiloña, Asturias(O), 33530\n', 546342, 'madraid', 'spain'),
(28, 13, 'fghfh', '768546845', 'fsdasdadsd', 546342, 'uk', 'uk'),
(29, 14, 'john', '86576456345', 'Grimnitzer Str 11, 16247\r\nJoachimsthal', 54352, 'Hamburg', 'Berlin'),
(30, 14, 'john', '86576456345', 'Grimnitzer Str 11, 16247\r\nJoachimsthal', 54352, 'Hamburg', 'Berlin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catogary`
--
ALTER TABLE `catogary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slides`
--
ALTER TABLE `home_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catogary_id` (`catogary_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catogary`
--
ALTER TABLE `catogary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home_slides`
--
ALTER TABLE `home_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `foreign_key_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`catogary_id`) REFERENCES `catogary` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
