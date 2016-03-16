-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `012-ci-login`
--

-- --------------------------------------------------------

--
-- Структура на таблица `b_products`
--

CREATE TABLE `b_products` (
  `id_product` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `img_url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `b_products`
--

INSERT INTO `b_products` (`id_product`, `type`, `brand`, `model`, `price`, `img_url`) VALUES
(1, 'keyboard', 'Trust', 'A5000', 20, '1.png'),
(2, 'keyboard', 'Logitech', 'L3310', 25, '2.png'),
(3, 'headphones', 'Sony', 'SH 300', 30, '3.png'),
(4, 'headphones', 'Samsung', 'SHG 4567', 22, '4.png'),
(5, 'headphones', 'JBL', 'JH5600', 33, '5.png'),
(63, 'monitor', 'Sony', 'SN500', 300, '63.png'),
(64, 'mouse', 'Logitech', 'LGT56', 25, '64.png'),
(65, 'mouse', 'Trust', 'red_wheel', 35, '65.png');

-- --------------------------------------------------------

--
-- Структура на таблица `b_users`
--

CREATE TABLE `b_users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `b_users`
--

INSERT INTO `b_users` (`email`, `password`, `name`, `surname`) VALUES
('ale@gmail.com', '123456', 'Alejandro', 'Ramallo'),
('stoyo@yahoo.com', 'aaaaaa', 'stoyan', 'elenkov');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_products`
--
ALTER TABLE `b_products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `b_users`
--
ALTER TABLE `b_users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_products`
--
ALTER TABLE `b_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
