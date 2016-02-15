-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 25, 2016 at 09:22 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `SunScore`
--

-- --------------------------------------------------------

--
-- Table structure for table `TestData`
--

CREATE TABLE `TestData` (
  `dataid` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Id` int(11) NOT NULL,
  `Setting` text NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Lat_of_house` float NOT NULL,
  `Long_of_house` float NOT NULL,
  `marker_direction` text NOT NULL,
  `obs_type` text NOT NULL,
  `Lat_of_obs` float NOT NULL,
  `Long_of_obs` float NOT NULL,
  `ans` double NOT NULL,
  `mcq_north` text NOT NULL,
  `mcq_south` text NOT NULL,
  `mcq_East` text NOT NULL,
  `mcq_West` text NOT NULL,
  `North_D` float NOT NULL,
  `South_D` float NOT NULL,
  `East_D` float NOT NULL,
  `West_D` float NOT NULL,
  `Obs_around_step` text NOT NULL,
  `website_token` text NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TestData`
--
ALTER TABLE `TestData`
  ADD PRIMARY KEY (`dataid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TestData`
--
ALTER TABLE `TestData`
  MODIFY `dataid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;