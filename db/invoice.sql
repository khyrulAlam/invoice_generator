-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 09:06 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_data`
--

CREATE TABLE `invoice_data` (
  `invoice_id` int(11) NOT NULL,
  `company_id` tinyint(4) NOT NULL COMMENT '1 For Tech World, 2 For Techsolution, 3 for rallyround',
  `invoice_data_json` text NOT NULL,
  `invoice_insert_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_data`
--

INSERT INTO `invoice_data` (`invoice_id`, `company_id`, `invoice_data_json`, `invoice_insert_data`, `invoice_status`) VALUES
(11, 3, '{"bill_to":"Advertisement ","company_name":"Computer City Technology Ltd","address":{"streetAddress":"1283 SW State Road 47 Ste 101","zipCode":"Lake City","city":"FL 32025","state":"1283 SW","country":"Australia"},"issue_date":"2017-11-06","due_date":"2017-11-30","invoice_no":"TS2050909110","item":["Netgear"],"unit_price":["5000"],"quantity":["01"],"total":["5000"],"Grand_Total":"5000","inword":"Five Thousand"}', '2017-11-06 12:02:26', 1),
(12, 2, '{"bill_to":"Website Development","company_name":"Notun Ahsa","address":{"streetAddress":"kochuya","zipCode":"1362","city":"chadpur","state":"Dhaka","country":"Bangladesh"},"issue_date":"2017-11-08","due_date":"2017-11-08","invoice_no":"TS199146545","item":["Domain For 1 year (notun ahsa)","Hosting 4GB ","Website Design & Development"],"unit_price":["1500","1500","15000"],"quantity":["1","4","1"],"total":["1500","6000","15000"],"Grand_Total":"22500","inword":"Twenty Two Thousand Five Hundred"}', '2017-11-15 13:09:55', 1),
(17, 1, '{"bill_to":"Bill for Company Website Development","company_name":"gulbag fashion ","address":{"streetAddress":"1283 SW State Road 47 Ste 101","zipCode":"Lake City","city":"FL 32025","state":"1283 SW","country":"Australia"},"issue_date":"2017-11-12","due_date":"2017-11-20","invoice_no":"TS171113","item":["sfasdf","dfdd dfsdf ","sdf dsfgdsfg sdfgdsfg ","fdgsdfg sdfg sdfg "],"unit_price":["12434","1280","2490","3400"],"quantity":["2","78","6","4"],"total":["24868","99840","14940","13600"],"Grand_Total":"153248","inword":"One Lakhs Fifty Three Thousand Two Hundred and Forty Eight "}', '2017-11-12 16:26:20', 0),
(18, 3, '{"bill_to":"check edit ","company_name":"edit ","address":{"streetAddress":"1283 SW State Road 47 Ste 101","zipCode":"Lake City","city":"FL 32025","state":"1283 SW","country":"Australia"},"issue_date":"2017-11-12","due_date":"2017-11-15","invoice_no":"T171114","item":["asfsdfs","sadfsdf sdfsa","sadfs asdf asdf asdf","sadfsdf ","sdf","",""],"unit_price":["4586","1548","1528","2000","558","",""],"quantity":["5","5","15","15","55","",""],"total":["22930","7740","22920","30000","30690","0","0"],"Grand_Total":"114280","inword":"One Lakhs Fourteen Thousand Two Hundred Eighty "}', '2017-11-12 18:22:27', 0),
(19, 2, '{"bill_to":"Bill For Web Design, Development, Hosting, Domain","company_name":"Khondaker Moin Uddin","address":{"streetAddress":"1283 SW State Road 47 Ste 101","zipCode":"Lake City","city":"FL 32025","state":"1283 SW","country":"Australia"},"issue_date":"2017-11-15","due_date":"2017-11-30","invoice_no":"T171115","item":["Domain For 1 year (gulbaghfashion.com.au)","Hosting Server 3GB","Website Design","Website Development","1 Year Maintains"],"unit_price":["2500","2000","20000","25000","4000"],"quantity":["1","3","1","1","12"],"total":["2500","6000","20000","25000","48000"],"Grand_Total":"101500","inword":"One Lakhs One Thousand Five Hundred "}', '2017-11-15 11:43:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created_date`) VALUES
(1, 'anik alam', 'anik@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2017-08-07 11:21:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_data`
--
ALTER TABLE `invoice_data`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_data`
--
ALTER TABLE `invoice_data`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
