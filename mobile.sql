-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 10:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(5, 'LG'),
(6, 'Iphone'),
(7, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `model` varchar(150) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `model`, `photo`, `qty`, `price`, `total_amount`) VALUES
(1, 6, '0', 1, '', 'a4.JPG', 10, 30000, 300000),
(2, 5, '0', 1, '', 'a3.JPG', 1, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Mobile '),
(2, 'Battery'),
(3, 'Mobile Charger'),
(4, 'Tab'),
(5, 'MP3'),
(6, 'MP4');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `seen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `seen`) VALUES
(6, 'mew', 'm@gmail.com', 'test', 'this is test', 'Unseen');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `real_pass` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `phone`, `email`, `password`, `real_pass`, `img`) VALUES
(1, 'admin', '01688615255', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '5af1a710d14af5aec720d42247panda.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `order_id`
--

CREATE TABLE `order_id` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datee` varchar(100) NOT NULL,
  `delevery_status` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_id`
--

INSERT INTO `order_id` (`id`, `user_id`, `datee`, `delevery_status`, `address`) VALUES
(1, 1, '03-May-2018', 'Non Delevery', 'jskfhh'),
(2, 2, '08-May-2018', 'Non Delevery', 'uttara');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(100) NOT NULL,
  `cart_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `model` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `datee` varchar(100) NOT NULL,
  `delevery_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `cart_id`, `order_id`, `p_id`, `ip_add`, `user_id`, `model`, `photo`, `qty`, `price`, `total_amount`, `datee`, `delevery_status`) VALUES
(1, 4, 1, 6, '0', 1, '', 'a4.JPG', 5, 30000, 150000, '03-May-2018', ''),
(2, 4, 1, 5, '0', 1, '', 'a3.JPG', 1, 10000, 10000, '03-May-2018', ''),
(3, 4, 1, 9, '0', 1, '', 'a7.JPG', 1, 0, 0, '03-May-2018', ''),
(4, 4, 1, 8, '0', 1, '', 'a6.JPG', 1, 200, 200, '03-May-2018', ''),
(5, 4, 2, 13, '0', 2, 'i-10', '5af0918094bb4dfg.jpg', 1, 85000, 85000, '08-May-2018', ''),
(6, 4, 2, 12, '0', 2, 'S7', '5af07e9502e2d4.png', 1, 50000, 50000, '08-May-2018', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL,
  `details` varchar(4000) NOT NULL,
  `present_price` varchar(100) NOT NULL,
  `prev_price` varchar(500) NOT NULL,
  `qty` int(100) NOT NULL,
  `approve` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `product_keyword` varchar(300) NOT NULL,
  `special` varchar(100) NOT NULL,
  `posted_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand`, `category`, `model`, `details`, `present_price`, `prev_price`, `qty`, `approve`, `photo`, `product_keyword`, `special`, `posted_email`) VALUES
(1, 'Samsung', 'Mobile ', 'S9', 'jdfjd  dksfjdjfj fdj fjg jjgf gfh\r\njdfjd  dksfjdjfj fdj fjg jjgf gfh\r\njdfjd  dksfjdjfj fdj fjg jjgf gfh\r\njdfjd  dksfjdjfj fdj fjg jjgf gfh\r\njdfjd  dksfjdjfj fdj fjg jjgf gfh', '90000', '90500', 6, 'Approve', '5aea9f331292ee06e12a855c7f5f64a9e9acac94299a6.jpg', ' Samsung LG 5000-10000', 'Special', ''),
(2, 'Sony', 'Mobile ', 'lm2', 'jdfgjhg', '30000', '30300', 1, 'Approve', '5aeaced60bb1dbooks-3348990_960_720.jpg', '80.1', 'Special', ''),
(4, 'Iphone', 'Mobile ', 'ip-9', 'Title            :     ip-9\r\nBrand         :     Iphone\r\nProcessor  :     dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    16 GB\r\nBattery       :     3120mAh ', '35000', '50000', 0, 'Approve', '5af1ade2ba791th (11).jpg', 'fgjjhmbm  hg,khgk,kg ', 'Special', ''),
(5, 'Sony', 'Mobile ', 'xperia c5', 'Title            :     xperia c5\r\nBrand         :     Sony\r\nProcessor  :     dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    15 GB\r\nBattery       :     3120mAh ', '28000', '38000', 0, 'Approve', '5af1aeb5bf428Sony-Xperia-C5-Ultra-Dual-SDL210917326-1-44fb8.jpg', 'Title            :     xperia c5 Brand         :     Sony Processor  :     dual core Ram           :     2 GB Camera      :    13 megapixel Rom           :    15 GB Battery       :     3120mAh ', 'Non Special', ''),
(6, 'Sony', 'Mobile ', 'xperia c3', 'Title            :     xperia c3\r\nBrand         :     Sony\r\nProcessor  :     dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    12 GB\r\nBattery       :     3120mAh ', '28900', '32000', 0, 'Approve', '5af1af4a1c6a2th (24).jpg', ' Processor  :     dual core Ram           :     2 GB Camera      :    13 megapixel Rom           :    12 GB Battery       :     3120mAh ', 'Non Special', ''),
(7, 'Xiaomi', 'Mobile ', 'xiaomi redmi 4', 'Title            :     Xiaomi Redmi 4\r\nBrand         :     Xiaomi\r\nProcessor  :     dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom            :    16 GB\r\nBattery       :     3120mAh', '24000', '29990', 0, 'Approve', '5af1b02de9b6fth.jpg', 'Title            :     Xiaomi Redmi 4 Brand         :     Xiaomi Processor  :     dual core Ram           :     2 GB Camera      :    13 megapixel Rom            :    16 GB Battery       :     3120mAh', 'Non Special', ''),
(8, 'Xiaomi', 'Mobile ', 'xiaomi Redmi 4A', 'Title            :     Xiaomi Redmi 4A\r\nBrand         :     Xiaomi\r\nProcessor  :      quadcore\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    16 GB\r\nBattery       :     3120mAh', '35000', '40000', 0, 'Approve', '5af1b0f3ecd40th (27).jpg', '     :     Xiaomi Processor  :      quadcore Ram           :     2 GB Camera      :    13 megapixel Rom           :    16 GB Battery       :     3120mAh', 'Non Special', ''),
(9, 'LG', 'Mobile ', 'LG122', 'Title            :     LGB122\r\nBrand         :     LG\r\nProcessor   :    dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    12 GB\r\nBattery       :     3000mAh ', '15000', '17800', 0, 'Approve', '5af1ad3536b04th (17).jpg', 'dualcore 2GB medium', 'Non Special', ''),
(11, 'Samsung', 'Mobile ', 'S9', 'Title            :     S9\r\nBrand         :     Samsung\r\nProcessor  :     dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    16 GB\r\nBattery       :     3120mAh', '50000', '55000', 0, 'Approve', '5af076fe9141dxf.jpg', 'Samsung', 'Special', 'admin@gmail.com'),
(12, 'Samsung', 'Mobile ', 'S7', 'Title            :     S7\r\nBrand         :     Samsung\r\nProcessor  :      dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    16 GB\r\nBattery       :     3120mAh', '50000', '55000', 0, 'Approve', '5af07e9502e2d4.png', 'Samsung', 'Non Special', 'admin@gmail.com'),
(13, 'Iphone', 'Mobile ', 'i-10', 'Title            :     i-10\r\nBrand         :     Iphone\r\nProcessor  :     quadcore\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    16 GB\r\nBattery       :     3120mAh', '85000', '88000', 0, 'Approve', '5af0918094bb4dfg.jpg', 'Iphone', 'Non Special', 'admin@gmail.com'),
(14, 'Samsung', 'Mobile ', 'Sj8', 'Title            :     Sj8\r\nBrand         :     Samsung\r\nProcessor  :     dual core\r\nRam           :     2 GB\r\nCamera      :    13 megapixel\r\nRom           :    16 GB\r\nBattery       :     3120mAh ', '14990', '18000', 0, 'Approve', '5af1abb93315e4.png', 'dualcore 2GB High performance ', 'Non Special', 'bithi@gmail.com'),
(15, 'Samsung', 'Batery', 's9 battery', '3120Amh', '600', '800', 0, 'Approve', '5af28dbac1d94download (12).jpg', 'medium ', 'Non Special', 'admin@gmail.com'),
(16, 'Samsung', 'Battery', 's3 battery', '3210Amh', '500', '600', 0, 'Approve', '5af28ecd2c3c4download (13).jpg', 'medium', 'Non Special', 'admin@gmail.com'),
(17, 'Iphone', 'Battery', 'ip-9 battery', '13000 Amh', '1000', '1100', 0, 'Approve', '5af28f500000ci2.jpg', 'high', 'Non Special', 'admin@gmail.com'),
(18, 'Iphone', 'Battery', 'ip-10 battery', '13000 mAh', '11000', '11500', 0, 'Approve', '5af28f9211ab2i3.jpg', 'high', 'Non Special', 'admin@gmail.com'),
(19, 'Samsung', 'Mobile Charger', 's3 charger', 'uegrehlgiugeh\r\nyefglregliureh', '300', '350', 0, 'Approve', '5af28ff28989edownload (3).jpg', 'rgbhyjnyr', 'Non Special', 'admin@gmail.com'),
(20, 'Samsung', 'Mobile Charger', 's9 charger', 'rgrihlieul\r\nuhreghiehgi', '350', '400', 0, 'Approve', '5af2903a9ec5cimages (7).jpg', 'tujtt', 'Non Special', 'admin@gmail.com'),
(21, 'Sony', 'Mobile Charger', 'sony xperia1', 'rtshrhhhhh\r\nygiutgiytuhyhurp\r\nughuehuig\r\n', '380', '400', 0, 'Approve', '5af2907fd4facimages (6).jpg', 'fhrt', 'Non Special', 'admin@gmail.com'),
(22, 'Xiaomi', 'Mobile Charger', 'redmi 4', 'uthgiuwitg\r\nygreyeytu\r\nyheryigey', '250', '300', 0, 'Approve', '5af290e319c49images (9).jpg', 'ghyety', 'Non Special', 'admin@gmail.com'),
(23, 'LG', 'Battery', 'LG', 'uhy5ihuj\r\nhtgliueiul\r\nhgluhuhgu', '250', '280', 0, 'Approve', '5af291109f05cimages (17).jpg', 'hty', 'Non Special', 'admin@gmail.com'),
(24, 'Samsung', 'Tab', 'Galaxy Tab3', '10.1-Inch \r\nSamsung Galaxy Tab 3 \r\n- Carbon Black: ', '20000', '21900', 0, 'Approve', '5af29196537ef81PpV3ZnswL._SL1500_.jpg', ' Logitech Folio for 10.1-Inch Samsung Galaxy Tab 3 - Carbon Black: Logitech: Computers & Accessories', 'Special', 'admin@gmail.com'),
(25, 'Samsung', 'Tab', 'Galaxy Tab1', '10.1-Inch \r\nSamsung Galaxy Tab 3 \r\n- Carbon Black', '20020', '22000', 0, 'Approve', '5af29379d3deeimages (2).jpg', 'egsth', 'Non Special', 'admin@gmail.com'),
(26, 'Sony', 'Tab', 'S Tab2', '10.0-Inch \r\nSony Tab 2\r\n- White', '30000', '31000', 0, 'Approve', '5af293e56d859images (3).jpg', 'hy5sh tthssssrj', 'Non Special', 'admin@gmail.com'),
(27, 'Xiaomi', 'Tab', 'X2', '11.1-Inch Samsung \r\nXiaomi Tab2 \r\n- Carbon Black', '25000', '25900', 0, 'Approve', '5af2943f815e7download (1).jpg', 'fhfs', 'Non Special', 'admin@gmail.com'),
(28, 'LG', 'MP3', 'LGmp', 'jstho\r\nieuutgeihgiu\r\nuehyguyug', '1500', '1550', 0, 'Approve', '5af2947bf2a8fdownload (6).jpg', 'ghr', 'Non Special', 'admin@gmail.com'),
(29, 'LG', 'MP3', 'LG12mp3', 'uhgiu4\r\nuygt5ytgy\r\nuehgiu', '1400', '1500', 0, 'Approve', '5af294bd030d7download (7).jpg', 'dnjt', 'Non Special', 'admin@gmail.com'),
(30, 'Samsung', 'MP4', 's1mp4', 'hituhwiuh\r\niuhiugeitg', '2000', '2200', 0, 'Approve', '5af2950711ed6download (9).jpg', 'rhrhe', 'Non Special', 'admin@gmail.com'),
(31, 'Sony', 'MP4', 'sony mp4', 'ugtsehweuhy\r\niugeeywye\r\nyyttiutyiytpy4tu\r\nuygorutuyeugr', '2100', '2500', 0, 'Approve', '5af29545700efdownload (11).jpg', '54tww4wt', 'Non Special', 'admin@gmail.com'),
(32, 'LG', 'MP4', 'Lgmp4', 'hguysrgryu\r\nyrhgyusre\r\nughliushigu', '2000', '2060', 0, 'Approve', '5af295807cb55images (14).jpg', 'ygguy', 'Non Special', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `details` varchar(150) NOT NULL,
  `save` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `details`, `save`, `photo`) VALUES
(1, 'Big Save', 'Get flat Cashback', '100', 'banner2.jpg'),
(2, 'Healthy Saving', 'Get Upto Off', '300', 'banner1.jpg'),
(3, 'Save savw', 'This day  off off', '30', 'banner3.jpg'),
(4, 'Save', 'This day Off', '10', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cart`
--

CREATE TABLE `sub_cart` (
  `id` int(100) NOT NULL,
  `cart_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `model` varchar(200) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `phone`, `password`, `address1`, `address2`) VALUES
(2, 'bithi', 'bristibithi143@gmail.com', '017777777', '75958', 'uttara', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `real_pass` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `approve` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `phone`, `email`, `password`, `real_pass`, `brand`, `img`, `approve`) VALUES
(1, 'Moon', '017243693782  ', 'moon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '', '5af1a66cbaeadvideoimg2.png', 'Non Approve'),
(2, 'bithi', '01724369378', 'bithi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Samsung', '5af1a6c12393e5ac35e06f2e8201042_brazomarbeach_2560x1600.jpg', 'Approve');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_id`
--
ALTER TABLE `order_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cart`
--
ALTER TABLE `sub_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_id`
--
ALTER TABLE `order_id`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_cart`
--
ALTER TABLE `sub_cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
