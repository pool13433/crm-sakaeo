-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 06:51 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL COMMENT 'รหัสของรางวัล',
  `gift_code` varchar(15) NOT NULL,
  `gift_name` varchar(150) NOT NULL COMMENT 'ชื่อของรางวัล',
  `gift_date` datetime NOT NULL COMMENT 'วันที่เพิ่มของรางวัน',
  `gift_no` int(11) NOT NULL,
  `gift_point` int(11) NOT NULL COMMENT 'แแต้มขั้นต่ำที่ใช้แลก',
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `gift_code`, `gift_name`, `gift_date`, `gift_no`, `gift_point`, `type_id`) VALUES
(1, '0000000001', 'ตุ๊กตา', '2016-10-06 23:24:24', 100, 200, 7),
(2, '0000000002', 'มือถือ', '2016-10-06 23:26:43', 42, 5000, 8),
(3, '0000000003', 'รองเท้า', '2016-10-06 23:13:55', 12, 150, 5),
(4, '0000000004', 'จักรยาน', '2016-10-06 23:23:48', 5, 250, 6),
(6, 'GIFT0000005', 'Iphone5', '2016-10-06 23:13:22', 1000, 100, 2),
(7, 'GIFT0000006', 'กางเกง รีวาย', '2016-10-06 23:14:31', 500, 100, 5),
(8, 'GIFT0000007', 'NoteBook i7', '2016-10-06 23:26:58', 20, 50000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `gift_type`
--

CREATE TABLE `gift_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(150) NOT NULL,
  `type_detail` text NOT NULL,
  `type_date` datetime NOT NULL,
  `type_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gift_type`
--

INSERT INTO `gift_type` (`type_id`, `type_name`, `type_detail`, `type_date`, `type_image`) VALUES
(1, 'อุปกรณ์ช่าง', 'อุปกรณ์ช่าง', '2016-10-06 23:13:11', 'xxxx'),
(2, 'โทรศัพท์มือถือ', 'โทรศัพท์มือถือ', '2016-10-06 23:12:56', 'xxxx'),
(5, 'เครื่องแต่งกาย', 'เครื่องแต่งกาย', '2016-10-06 23:13:43', 'xxxx'),
(6, 'กีฬา', 'กีฬา', '2016-10-06 23:23:41', 'xxxx'),
(7, 'ของเล่น', 'ของเล่น', '2016-10-06 23:24:16', 'xxxx'),
(8, 'อิเล็กทรอนิก', 'อิเล็กทรอนิก', '2016-10-06 23:26:32', 'xxxx');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `per_id` int(11) NOT NULL COMMENT 'รหัส',
  `per_serial` varchar(30) NOT NULL COMMENT 'รหัสที่แสดง QRCode',
  `per_code` varchar(20) NOT NULL COMMENT 'โค๊ด',
  `per_username` varchar(50) NOT NULL,
  `per_password` varchar(50) NOT NULL,
  `per_fname` varchar(100) NOT NULL COMMENT 'ชื่อจริง',
  `per_lname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `per_idcard` varchar(15) NOT NULL COMMENT 'รหัสบัตร',
  `per_gender` enum('M','F') NOT NULL COMMENT 'เพศ',
  `per_email` varchar(50) NOT NULL COMMENT 'อีเมลล์',
  `per_mobile` varchar(15) NOT NULL COMMENT 'มือถือ',
  `per_address` text NOT NULL,
  `per_birthday` date NOT NULL COMMENT 'วันเกิด',
  `per_status` int(2) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`per_id`, `per_serial`, `per_code`, `per_username`, `per_password`, `per_fname`, `per_lname`, `per_idcard`, `per_gender`, `per_email`, `per_mobile`, `per_address`, `per_birthday`, `per_status`) VALUES
(1, 'ADMIN0000000001', 'ADMIN0000000001', 'admin', '1234', 'Administrator', 'Administrator', '0123456781011', 'M', 'admin@gmail.com', '0800000000', 'Administrator', '2016-10-08', 1),
(2, '81056287674266139841', 'CUS0000000000', 'user', '1234', 'สมชาย', 'สุชใจ', '123456789101112', 'M', 'somchai@gmail.com', '0800000000', 'สระแก้ว', '2016-09-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(20) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_status` enum('active','inactive') NOT NULL,
  `prod_promote` enum('active','inactive') NOT NULL,
  `prod_date` date NOT NULL,
  `type_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_name`, `prod_price`, `prod_status`, `prod_promote`, `prod_date`, `type_id`, `store_id`) VALUES
(1, '000000000001', 'Honda CRV', 550000, 'active', 'active', '2016-09-17', 1, 0),
(2, '000000000002', 'Fino', 45000, 'active', 'active', '2016-09-17', 2, 0),
(3, '000000000003', 'Mio', 48000, 'active', 'active', '2016-09-17', 2, 0),
(4, '000000000004', 'Toyota Rivo', 780000, 'active', 'active', '2016-10-08', 1, 3),
(5, '000000000005', 'Mitsubichi Triton', 920000, 'active', 'active', '2016-09-17', 1, 0),
(6, '111', '1111', 500, 'active', 'active', '2016-10-06', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `prom_id` int(11) NOT NULL,
  `prom_name` varchar(150) NOT NULL,
  `prom_detail` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `prom_startdate` date NOT NULL,
  `prom_enddate` date NOT NULL,
  `prom_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`prom_id`, `prom_name`, `prom_detail`, `type_id`, `prom_startdate`, `prom_enddate`, `prom_date`) VALUES
(1, 'เติมน้ำมันแถม น้ำดื่ม1', 'เติมน้ำมันแถม น้ำดื่ม', 1, '2016-11-10', '1970-01-01', '2016-10-04 22:42:07'),
(2, 'ซื้อมอเตอร์ไซต์ แถม สร้อยคอทองคำ 1 สลึง', 'ซื้อมอเตอร์ไซต์ แถม สร้อยคอทองคำ 1 สลึง', 2, '2016-10-02', '2016-10-16', '2016-10-02 22:51:46'),
(3, 'ออกรถวันนี้ได้รับฟรีแต้มสะสม 1000 แต้ม', 'ออกรถวันนี้ได้รับฟรีแต้มสะสม 1000 แต้ม', 1, '2016-10-02', '2016-10-09', '2016-10-02 22:12:16'),
(6, 'ซื้อ 1 แถม 1', 'ซื้อ 1 แถม 1', 2, '2016-10-31', '2016-10-31', '2016-10-04 23:03:28'),
(7, 'ซื้อ 2 แถม 1', 'ซื้อ 2 แถม 1', 1, '2016-10-04', '2016-10-04', '2016-10-04 22:41:10'),
(8, 'ซื้อ ชิ้นที่ 2 ลกราคา 50 %', 'ซื้อ ชิ้นที่ 2 ลกราคา 50 %', 1, '2016-10-15', '2016-10-31', '2016-10-02 22:28:58'),
(11, 'โปรโมชั่นแหง่ปี', 'โปรโมชั่นแหง่ปี', 2, '2016-10-01', '2016-10-31', '2016-10-02 22:52:31'),
(35, 'ddddddddddddd', 'ddddddddddddd', 1, '2016-12-10', '1970-01-01', '2016-10-04 22:42:46'),
(36, 'จัดการข้อมูลโปรโมชั่น', 'จัดการข้อมูลโปรโมชั่นจัดการข้อมูลโปรโมชั่นจัดการข้อมูลโปรโมชั่น', 1, '2016-10-04', '2016-10-04', '2016-10-04 22:43:22'),
(37, 'จัดการข้อมูลโปรโมชั่น', 'จัดการข้อมูลโปรโมชั่นจัดการข้อมูลโปรโมชั่น', 1, '2016-03-10', '2016-06-10', '2016-10-04 22:43:46'),
(38, '$form', '$form', 1, '2016-10-03', '2016-10-10', '2016-10-04 23:01:30'),
(39, '$form$form$form', '$form$form$form$form', 1, '2016-10-22', '2016-10-26', '2016-10-04 23:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_type`
--

CREATE TABLE `promotion_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(150) NOT NULL,
  `type_detail` text NOT NULL,
  `type_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion_type`
--

INSERT INTO `promotion_type` (`type_id`, `type_name`, `type_detail`, `type_date`) VALUES
(1, 'ซื้อเยอะแลก point', 'ซื้อเยอะแลก point', '2016-10-02'),
(2, 'ซื้อน้อยไม่ได้อะไร', 'ซื้อน้อยไม่ได้อะไร', '2016-10-02'),
(4, 'ซื้อบ่อยเอาแต้มไปเลย', 'ซื้อบ่อยเอาแต้มไปเลย', '2016-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_code` varchar(15) NOT NULL,
  `store_name` varchar(150) NOT NULL,
  `store_address` text NOT NULL,
  `store_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_code`, `store_name`, `store_address`, `store_date`) VALUES
(1, 'SK0000001', 'สาขา 1', 'สระแก้ว', '2016-09-17 18:23:00'),
(2, 'SK0000002', 'ร้าน หมูกระทะ', 'สระแก้ว', '2016-09-17 21:00:00'),
(3, 'SK0000003', 'สระแก้ว อะไหล่', 'สระแก้ว', '2016-09-17 18:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `tran_buy`
--

CREATE TABLE `tran_buy` (
  `buy_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `buy_number` int(11) NOT NULL,
  `buy_point` int(11) NOT NULL,
  `buy_desc` varchar(255) NOT NULL,
  `buy_date` datetime NOT NULL,
  `buy_by` int(11) NOT NULL,
  `buy_status` int(1) NOT NULL COMMENT '0=รออนุมัติ ,1 = สำเร็จ , 2 = เกิดข้อผิดพลาด',
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tran_buy`
--

INSERT INTO `tran_buy` (`buy_id`, `per_id`, `prod_id`, `buy_number`, `buy_point`, `buy_desc`, `buy_date`, `buy_by`, `buy_status`, `store_id`) VALUES
(1, 2, 1, 5, 1000, 'xxxxxx', '2016-10-07 00:00:00', 1, 1, 0),
(2, 2, 1, 5, 500, 'xxxxxx', '2016-10-07 00:00:00', 1, 1, 0),
(3, 2, 1, 5, 200, 'xxxxxx', '2016-10-07 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tran_swop`
--

CREATE TABLE `tran_swop` (
  `swop_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `swop_number` int(11) NOT NULL,
  `swop_point` int(11) NOT NULL,
  `swop_desc` varchar(255) NOT NULL,
  `swop_date` datetime NOT NULL,
  `swop_status` int(1) NOT NULL COMMENT '0= รออนุมัติ, 1 = สำเร็จ , 2 = เกิดข้อผิดพลาด',
  `swop_by` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tran_swop`
--

INSERT INTO `tran_swop` (`swop_id`, `per_id`, `gift_id`, `swop_number`, `swop_point`, `swop_desc`, `swop_date`, `swop_status`, `swop_by`, `rec_id`) VALUES
(3, 2, 1, 2, 1000, 'xxxxxxxxx', '2016-09-17 00:00:00', 1, 0, 0),
(4, 2, 3, 1, 500, '', '2016-09-18 00:00:00', 1, 0, 0),
(5, 2, 1, 1, 100, 'เล่นเกมได้รางวัล', '2016-09-18 00:00:00', 1, 0, 0),
(6, 1, 1, 1, 500, '', '2016-09-17 00:00:00', 1, 0, 0),
(7, 1, 2, 10, 500, 'yyyyyy', '2016-10-07 00:00:00', 1, 0, 0),
(8, 2, 8, 1, 90, 'แลกสินค้า', '2016-10-08 23:23:40', 0, -1, 0),
(9, 2, 4, 1, 250, 'แลกสินค้า', '2016-10-08 23:23:40', 0, -1, 0),
(10, 2, 8, 1, 99, 'แลกสินค้า', '2016-10-08 23:26:26', 0, -1, 2),
(11, 2, 4, 1, 250, 'แลกสินค้า', '2016-10-08 23:26:26', 0, -1, 2),
(12, 2, 8, 1, 99, 'แลกสินค้า', '2016-10-08 23:26:36', 0, -1, 3),
(13, 2, 4, 1, 250, 'แลกสินค้า', '2016-10-08 23:26:36', 0, -1, 3),
(14, 2, 8, 1, 50000, 'แลกสินค้า', '2016-10-08 23:28:43', 0, -1, 4),
(15, 2, 4, 1, 250, 'แลกสินค้า', '2016-10-08 23:28:43', 0, -1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tran_swop_receive`
--

CREATE TABLE `tran_swop_receive` (
  `rec_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cust_fname` varchar(50) NOT NULL,
  `cust_lname` varchar(50) NOT NULL,
  `cust_mobile` varchar(15) NOT NULL,
  `cust_address` text NOT NULL,
  `rec_type` varchar(15) NOT NULL,
  `store_id` int(11) NOT NULL,
  `rec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tran_swop_receive`
--

INSERT INTO `tran_swop_receive` (`rec_id`, `cust_id`, `cust_fname`, `cust_lname`, `cust_mobile`, `cust_address`, `rec_type`, `store_id`, `rec_date`) VALUES
(1, 2, 'สมชาย', 'สุชใจ', '0800000000', 'สระแก้ว', 'store', 1, '2016-10-08'),
(2, 2, 'สมชาย', 'สุชใจ', '0800000000', 'สระแก้ว', 'store', 1, '2016-10-08'),
(3, 2, 'สมชาย', 'สุชใจ', '0800000000', 'สระแก้ว', 'store', 1, '2016-10-08'),
(4, 2, 'สมชาย', 'สุชใจ', '0800000000', 'สระแก้ว', 'store', 3, '2016-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_date` date NOT NULL,
  `type_min_price` int(11) NOT NULL COMMENT 'ราคาเริ่มคิด point',
  `type_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `type_date`, `type_min_price`, `type_points`) VALUES
(1, 'รถยนต์', '2016-09-17', 100000, 100),
(2, 'มอเตอร์ไซต์', '2016-10-05', 10000, 10),
(3, 'น้ำมันเครื่อง', '2016-10-05', 500, 10),
(7, 'ของเล่น', '2016-10-05', 1, 1),
(8, '111111', '2016-10-06', 111, 1111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `gift_type`
--
ALTER TABLE `gift_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`prom_id`);

--
-- Indexes for table `promotion_type`
--
ALTER TABLE `promotion_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tran_buy`
--
ALTER TABLE `tran_buy`
  ADD PRIMARY KEY (`buy_id`);

--
-- Indexes for table `tran_swop`
--
ALTER TABLE `tran_swop`
  ADD PRIMARY KEY (`swop_id`),
  ADD KEY `per_id` (`per_id`),
  ADD KEY `per_id_2` (`per_id`),
  ADD KEY `tran_date` (`swop_date`);

--
-- Indexes for table `tran_swop_receive`
--
ALTER TABLE `tran_swop_receive`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสของรางวัล', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gift_type`
--
ALTER TABLE `gift_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `prom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `promotion_type`
--
ALTER TABLE `promotion_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tran_buy`
--
ALTER TABLE `tran_buy`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tran_swop`
--
ALTER TABLE `tran_swop`
  MODIFY `swop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tran_swop_receive`
--
ALTER TABLE `tran_swop_receive`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
