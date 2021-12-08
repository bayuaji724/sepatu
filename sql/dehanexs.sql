-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 01:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dehanexs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `role` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `role`) VALUES
(3, 'bayu', 'admin', '$2y$10$u1kAgZpp80rI7agY1Bh0u.xINgAJgdJKvy9DD9A7ibwREMYazc6H.', '85892855902', 'bayuadmin@gmail.com', 'Indonesia, DKI Jakarta', 'admin'),
(5, 'dika', 'member', '$2y$10$u1kAgZpp80rI7agY1Bh0u.xINgAJgdJKvy9DD9A7ibwREMYazc6H.', '12131123', 'dikaadmin@gmail.com', 'Indonesia, DKI Jakarta', 'member'),
(18, 'Hairul Lana', 'hairullana', '$2y$10$uDaHTPpEUkF4ihtdAn5lQuHW/v2UTqPvrHeA5aORVBYmBuae18NBy', '083119526456', 'hairullana@gmail.com', 'Jl. Kampus Unud No 99A', 'member'),
(19, 'tes', 'tes', '$2y$10$2m5HEQWTny3MyrabEhWUPujqgJoL1ms8/6TszEYD5vvantcRC7jRG', '08512371298', 'admin@mimpy.com', 'Jl Jember No 33', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `id_user`, `id_product`, `total`, `status`) VALUES
(13, 18, 8, 1, 'Diproses'),
(14, 18, 7, 2, 'Diproses'),
(15, 18, 9, 1, 'Diproses'),
(16, 18, 9, 1, 'Dikirim'),
(17, 18, 8, 1, 'Pesanan Baru'),
(18, 18, 7, 2, 'Pesanan Baru'),
(19, 18, 9, 1, 'Pesanan Baru'),
(20, 18, 9, 1, 'Pesanan Baru'),
(22, 18, 9, 1, 'Pesanan Baru'),
(23, 18, 9, 1, 'Pesanan Baru'),
(24, 18, 8, 1, 'Pesanan Baru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`category_id`, `category_name`) VALUES
(7, 'kategori 1'),
(8, 'kategori 2'),
(9, 'kategori 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`) VALUES
(7, 7, 'produk 1', 1, '1', '61b03dba9e39e.jpg', 1),
(8, 8, 'Produk 2', 123, 'ewqd', '61b03dca59d0f.jpg', 0),
(9, 7, 'Produk 3', 235, 'wdeq wq', '61b03de653a87.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
