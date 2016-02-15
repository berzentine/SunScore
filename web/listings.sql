-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 25, 2016 at 08:57 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ecodigs`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `address` varchar(255) NOT NULL,
  `lat` float(12,8) NOT NULL,
  `lng` float(12,8) NOT NULL,
  `location` point NOT NULL,
  `neighbourhood_id` int(11) NOT NULL,
  `rental_type` varchar(255) NOT NULL,
  `beds` int(5) NOT NULL,
  `baths` int(5) NOT NULL,
  `rent` int(11) NOT NULL,
  `utilities` int(5) DEFAULT '0',
  `area` int(5) DEFAULT NULL,
  `rating` float(8,5) NOT NULL,
  `reviews` int(5) NOT NULL,
  `availability_status` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `highprice` int(5) NOT NULL,
  `url` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `lowprice` int(5) NOT NULL,
  `lowarea` int(5) NOT NULL,
  `higharea` int(5) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `lowbed` int(2) NOT NULL,
  `highbed` int(2) NOT NULL,
  `electricity_low` float(12,4) NOT NULL DEFAULT '0.0000',
  `electricity_high` float(12,4) NOT NULL DEFAULT '0.0000',
  `electricity_estimate` float(12,4) NOT NULL DEFAULT '0.0000',
  `gas_low` float(12,4) NOT NULL DEFAULT '0.0000',
  `gas_high` float(12,4) NOT NULL DEFAULT '0.0000',
  `gas_estimate` float(12,4) NOT NULL DEFAULT '0.0000',
  `gas_only` tinyint(4) DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `walkscore` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1254 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

;
;
;
;
;
;
;
;
;
;
;
;
;
;
;
;
;
;
;
;
;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD SPATIAL KEY `location` (`location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1254;