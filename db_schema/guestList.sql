-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2015 at 11:21 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guestList`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_event`
--

CREATE TABLE IF NOT EXISTS `ci_event` (
`event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_desc` text NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `event_location` varchar(200) NOT NULL,
  `event_picture` varchar(200) DEFAULT NULL,
  `event_status` int(11) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_event`
--

INSERT INTO `ci_event` (`event_id`, `user_id`, `event_name`, `event_desc`, `facebook_url`, `start_time`, `end_time`, `event_location`, `event_picture`, `event_status`, `created_on`) VALUES
(1, 1, 'Event 111', 'ndustry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'google.com', '2015-04-03 00:00:00', '2015-04-25 00:00:00', 'Panjim Goa!', 'event2.jpg', 1, '2015-04-22 18:14:15'),
(2, 0, 'Event 2', 'ndustry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Panjim Goa', 'event2.jpg', 0, '2015-04-22 18:14:15'),
(3, 4, 'Event', 'ndustry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Panjim Goa', 'event3.jpg', 1, '2015-04-22 18:14:15'),
(4, 1, 'Event 4', 'ndustry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2015-04-24 00:00:00', '2015-04-25 00:00:00', 'Panjim Goa', 'event1.jpg', 1, '2015-04-22 18:14:15'),
(5, 1, 'Event 5', 'ndustry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Panjim Goa', 'event2.jpg', 1, '2015-04-22 18:14:15'),
(6, 1, 'Some Event', 'Desc', '', '2015-04-24 00:00:00', '2015-04-24 00:00:00', 'Panjim', 'event2.jpg', 1, '2015-04-23 12:51:27'),
(7, 4, 'Club Event', 'Club envet', '', '2015-04-24 00:00:00', '2015-04-25 00:00:00', 'Panjim Goa', 'event2.jpg', 0, '2015-04-23 12:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `ci_guest`
--

CREATE TABLE IF NOT EXISTS `ci_guest` (
`id` int(11) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `fb_uri` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_guest`
--

INSERT INTO `ci_guest` (`id`, `fb_id`, `fb_uri`, `name`, `email`, `mobile_no`) VALUES
(1, '10206658287198867', '', 'Prasana Kumar', 'epynic@gmail.com', '9999999999'),
(2, '10206658287198867', '', 'Cloned', 'cloney@gmail.com', '9999999999'),
(4, '890838260978096', 'https://www.facebook.com/app_scoped_user_id/890838260978096/', 'Mobic Goa', 'mobicgoa@gmail.com', '9898989898');

-- --------------------------------------------------------

--
-- Table structure for table `ci_guest_pass`
--

CREATE TABLE IF NOT EXISTS `ci_guest_pass` (
`pass_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `approval_status` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_guest_pass`
--

INSERT INTO `ci_guest_pass` (`pass_id`, `event_id`, `guest_id`, `approval_status`, `created_on`) VALUES
(1, 1, 1, 1, '2015-04-23 14:35:17'),
(2, 7, 2, 1, '2015-04-23 14:35:17'),
(3, 1, 4, 0, '2015-04-23 20:03:14'),
(4, 5, 4, 0, '2015-04-23 20:05:28'),
(5, 2, 4, 0, '2015-04-23 20:09:41'),
(6, 3, 4, 0, '2015-04-24 09:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('059d8691df0d0963b36869718dc70a42', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429866803, ''),
('0dbb8cd436054e40a03f55ad55b45bd3', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429867252, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}'),
('173659fd59ac21e5870eab21e884d122', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429820035, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"2";}'),
('2442955b04381817cd5a488f5f6d0f0c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429815572, ''),
('313cb7472c02059f3b45c78a98416736', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429866534, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}'),
('3a631ee5d7a58e31e88f4ab1cac59970', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429867252, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}'),
('3b9093db497d8b7fc2c0bc1ea8f7263b', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429867073, ''),
('50fdc320f377f8c7f620b76d0304c8f2', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429821326, ''),
('7bbaa3f537d85f952e0a72ee06280833', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429819801, ''),
('7e562e44c49813691def27c2d122967a', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429819539, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}'),
('887c4e9754e1ae13a573e9272b1ed434', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429815618, ''),
('9dd4ba0c0aa7f10e337b9f4787a68921', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429819780, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}'),
('a994957fbad4082a28262122edf0b6d9', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429815545, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"2";}'),
('a9b4b56de9761ebfc6f98138f678347e', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429866761, ''),
('be3b78f54cddb9dec81c708039ebfd44', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429866623, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}'),
('c20ea2536faa4f59ad09714838631464', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429864549, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"2";}'),
('c36f9b9de33e3909b1883f0d939f7a3f', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429821326, 'a:7:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"2";s:4:"name";s:5:"Admin";s:2:"id";s:1:"1";s:9:"user_type";s:5:"ADMIN";s:14:"admin_loggedin";b:1;}'),
('c699a947d050afcfaa0c974ca1b72cec', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429866880, ''),
('cceb904c8098b22dcab1a535a17d74b9', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429815440, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"2";}'),
('e0b9a3588c5287e7bd20aec31621bd3d', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429814466, ''),
('e2ee3c502c58be4e04cdea80032ed3ba', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429867252, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}'),
('e664012bcd2485e7d63fc3bab63eb0bf', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429854831, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"2";}'),
('ee5d058c6279972b75d8c6d07f6d9137', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429854831, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"2";}'),
('f94b5b2a25125b04bef75273c5bd0f67', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1429867252, 'a:3:{s:9:"user_data";s:0:"";s:8:"loggedin";b:1;s:8:"guest_id";s:1:"4";}');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE IF NOT EXISTS `ci_users` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL COMMENT 'ADMIN CLUB'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `password`, `name`, `profile_pic`, `user_type`) VALUES
(1, 'admin', 'bdd78ad644f248bd3dd1f40509c3ba8dd860dfbb0107d837bd073f6367070dbf4ff223bf6e76c978b091f7c1b1356558218f63b60f870f3ab6e147a8cef7015b', 'Admin', '', 'ADMIN'),
(4, 'club', '10d76ee359b4dde1ff5dfef0631af336f9b8c25b24bbcebfdeae5625ff380980a1195b2b7da93b403b5a449a72563e7c4e306e14da533b50d407ee1a8e263978', 'club', NULL, 'CLUB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_event`
--
ALTER TABLE `ci_event`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `ci_guest`
--
ALTER TABLE `ci_guest`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_guest_pass`
--
ALTER TABLE `ci_guest_pass`
 ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_event`
--
ALTER TABLE `ci_event`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ci_guest`
--
ALTER TABLE `ci_guest`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ci_guest_pass`
--
ALTER TABLE `ci_guest_pass`
MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
