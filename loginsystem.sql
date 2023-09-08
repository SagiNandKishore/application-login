-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 02:50 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE 'users' (
  `id` int (6) UNSIGNED NOT NULL,
  `user_first` varchar (256) NOT NULL,
  `user_last` varchar (256) NOT NULL,
  `user_email` varchar (256) DEFAULT NULL,
  `user_uid` varchar (256) DEFAULT NULL,
  `user_pwd` varchar (256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;