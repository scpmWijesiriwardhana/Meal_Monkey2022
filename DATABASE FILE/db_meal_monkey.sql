-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 07:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_meal_monkey`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', '40BD001563085FC35165329EA1FF5C5ECBDBBEEF', 'admin@gmail.com', '', '2022-10-20 16:38:40'),
(2, 'admin2', '202cb962ac59075b964b07152d234b70', 'admin2@gmail.com', '', '2022-10-20 16:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(17, 5, 'Chicken Fried Rice', 'Normal', '800.00', '63517f30cc83d.jpg'),
(18, 5, 'Kottu', 'Normal', '450.00', '63517f50bd032.jpg'),
(19, 0, 'Bread', 'Full and Half', '110.00', '63517f79dc386.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(5, 5, 'Darshana Hotel', 'darshana@gmail.com', '0760306113', 'https://www.bing.com/search?q=darshana+hotel+sooriyawewa&cvid=9a70ca6c0a1544ff838662cc34192a21&aqs=edge..69i57j69i11004.9750j0j4&FORM=ANAB01&PC=U531', '7am', '12am', 'Mon-Sat', 'No.92/1B,Aluthgamawaththa,Yakkala', '63517e287ad7a.png', '2022-10-20 16:58:16'),
(6, 6, 'P&S', 'ps@gmail.com', '012456398', 'https://www.bing.com/search?q=darshana+hotel+sooriyawewa&cvid=9a70ca6c0a1544ff838662cc34192a21&aqs=edge..69i57j69i11004.9750j0j4&FORM=ANAB01&PC=U531', '8am', '1am', 'Mon-Sat', 'No.126,Rukmal sewana,pathegama north,kottegoda', '63517e99aed61.png', '2022-10-20 17:00:09'),
(7, 6, 'Pizza Hut', 'pizzahut@gmail.com', '0123654789', 'https://www.bing.com/search?q=darshana+hotel+sooriyawewa&cvid=9a70ca6c0a1544ff838662cc34192a21&aqs=edge..69i57j69i11004.9750j0j4&FORM=ANAB01&PC=U531', '8am', '2am', '24hr-x7', 'No.92/1B,Aluthgamawaththa,Yakkala', '63517ed53470d.png', '2022-10-20 17:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(5, 'Chinese', '2022-10-20 16:57:10'),
(6, 'Short Eats', '2022-10-20 16:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'eric', 'Eric', 'Lopez', 'eric@mail.com', '1458965547', 'a32de55ffd7a9c4101a0c5c8788b38ed', '87 Armbrester Drive', 1, '2022-05-27 08:40:36'),
(2, 'harry', 'Harry', 'Holt', 'harryh@mail.com', '3578545458', 'bc28715006af20d0e961afd053a984d9', '33 Stadium Drive', 1, '2022-05-27 08:41:07'),
(3, 'james', 'James', 'Duncan', 'james@mail.com', '0258545696', '58b2318af54435138065ee13dd8bea16', '67 Hiney Road', 1, '2022-05-27 08:41:37'),
(4, 'christine', 'Christine', 'Moore', 'christine@mail.com', '7412580010', '5f4dcc3b5aa765d61d8327deb882cf99', '114 Test Address', 1, '2022-05-01 05:14:42'),
(5, 'scott', 'Scott', 'Miller', 'scott@mail.com', '7896547850', '5f4dcc3b5aa765d61d8327deb882cf99', '63 Charack Road', 1, '2022-05-27 10:53:51'),
(6, 'liamoore', 'Liam', 'Moore', 'liamoore@mail.com', '7896969696', '5f4dcc3b5aa765d61d8327deb882cf99', '122 Bleck Street', 1, '2022-05-27 12:57:00'),
(7, 'Milini', 'Milini', 'Rajapaksha', 'milinipoornika2000@gmail.com', '0760306113', 'e10adc3949ba59abbe56e057f20f883e', 'No.92/1B,Aluthgamawaththa,Yakkala', 1, '2022-10-20 16:27:54'),
(8, 'chamath', 'chamath', 'wijesiriwardhana', 'chamathrko@gmail.com', '0123654789', 'e10adc3949ba59abbe56e057f20f883e', 'No.92/1B,Aluthgamawaththa,Yakkala', 1, '2022-10-20 18:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(1, 4, 'Spring Rolls', 2, '6.00', 'rejected', '2022-05-27 11:43:26'),
(2, 4, 'Prawn Crackers', 1, '7.00', 'closed', '2022-05-27 11:11:41'),
(3, 5, 'Chicken Madeira', 1, '23.00', 'closed', '2022-05-27 11:42:35'),
(4, 5, 'Cheesy Mashed Potato', 1, '5.00', 'in process', '2022-05-27 11:42:55'),
(5, 5, 'Meatballs Penne Pasta', 1, '10.00', 'closed', '2022-05-27 13:18:03'),
(6, 5, 'Yorkshire Lamb Patties', 1, '14.00', NULL, '2022-05-27 11:40:51'),
(7, 6, 'Yorkshire Lamb Patties', 1, '14.00', 'closed', '2022-05-27 13:04:33'),
(8, 6, 'Lobster Thermidor', 1, '36.00', 'closed', '2022-05-27 13:05:24'),
(9, 6, 'Stuffed Jacket Potatoes', 1, '8.00', 'rejected', '2022-05-27 13:03:53'),
(10, 8, 'Chicken Fried Rice', 5, '800.00', NULL, '2022-10-21 02:47:22'),
(11, 8, 'Kottu', 1, '450.00', NULL, '2022-10-21 02:47:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
