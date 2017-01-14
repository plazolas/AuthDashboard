-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2017 at 03:43 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------


--
-- Table structure for table `attempts`
--

CREATE TABLE IF NOT EXISTS `attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  UNIQUE KEY `setting` (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+180 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '1'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'example@dashboard.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `drinfo`
--

CREATE TABLE IF NOT EXISTS `drinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT 'practice id',
  `drname` varchar(128) DEFAULT NULL,
  `drlicensenum` varchar(128) DEFAULT NULL,
  `drnpi` varchar(8) DEFAULT NULL,
  `drdeanum` varchar(128) DEFAULT NULL,
  `dremail` varchar(128) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `drinfo`
--

INSERT INTO `drinfo` (`id`, `pid`, `drname`, `drlicensenum`, `drnpi`, `drdeanum`, `dremail`, `dt`) VALUES
(1, 1, 'Oz', '123', '123', '123', 'oz@welness.com', '2016-12-12 08:49:38'),
(2, 4, 'Albus Dumbledorf', 'phoenix123', 'nip123', 'Dark Arts, Apparation, Posions', 'albus@hogwarts.com', '0000-00-00 00:00:00'),
(3, 4, 'Severus Snape', 'DEater666', 'Master W', 'Posions, Dark Arts', 'severus@hogwart.com', '0000-00-00 00:00:00'),
(4, 5, 'John Stark', 'Lic 123', 'Howarts ', 'Potions, Adivination', 'john@psm.com', '2017-01-14 08:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `practice`
--

CREATE TABLE IF NOT EXISTS `practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(128) DEFAULT NULL,
  `contactname` varchar(128) DEFAULT NULL,
  `contacttitle` varchar(8) DEFAULT NULL,
  `contactemail` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `address2` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `zip` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `fax` varchar(128) DEFAULT NULL,
  `ACCTID1` varchar(128) DEFAULT NULL,
  `ACCTID2` varchar(128) DEFAULT NULL,
  `region` varchar(8) NOT NULL,
  `locname1` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `locname2` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `locname3` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `locname4` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `practice`
--

INSERT INTO `practice` (`id`, `pname`, `contactname`, `contacttitle`, `contactemail`, `address`, `address2`, `city`, `state`, `zip`, `phone`, `fax`, `ACCTID1`, `ACCTID2`, `region`, `locname1`, `locname2`, `locname3`, `locname4`, `user_id`) VALUES
(1, 'Palm Beach Learning Center', 'Oscar Smith', 'Mr.', 'example@yahoo.com', '123 Military Trail', '', 'Palm Beach Gardens', 'FL', '33245', '555-1212', '123', '', '', 'SE', 'West Palm Beach', 'Kendall', 'Boca Raton', 'Key West', '1'),
(4, 'Hogwarts School of Witchcraft', 'Albus Dumbledorf', 'Head Mas', 'albus@hogwarts.com', '123 Hogsmead St, 301', '301', 'Boston', 'MS', '10952', '2155551212', '2155551212', '', '', 'NE', '', '', '', '', '1'),
(5, 'Pacific School of Magic', 'Dolores Humphrey', 'Dr', 'dolores@psm.com', '777 Main St', '', 'San Francisco', 'FL', '90215', '532-568-1538', '', '', '', 'PAC', 'San Jose', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `techname` varchar(128) NOT NULL,
  `techemail` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `A1` varchar(10) NOT NULL,
  `A2` varchar(10) NOT NULL,
  `A3` varchar(10) NOT NULL,
  `A4` varchar(10) NOT NULL,
  `A5` varchar(10) NOT NULL,
  `A6` varchar(10) NOT NULL,
  `A7` varchar(10) NOT NULL,
  `A8` varchar(10) NOT NULL,
  `A9` varchar(10) NOT NULL,
  `A10` varchar(10) NOT NULL,
  `score` varchar(10) NOT NULL,
  `quiz_datetime` datetime NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `user_id`, `techname`, `techemail`, `location`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `A10`, `score`, `quiz_datetime`, `pid`) VALUES
(1, 1, 'root', 'admin@dashboard.com', 'Predefined good answers', 'C', 'E', 'A', 'D', 'B', 'C', 'A', 'D', 'A', 'D', '100', '2017-01-05 00:00:00', 1),
(2, 1, 'Test', 'test@email.com', 'Kendall', 'A', 'B', 'C', 'D', 'B', 'C', 'C', 'C', 'A', 'C', '0', '2017-01-05 13:54:10', 1),
(3, 1, 'Oscar Dole', 'oscar@gmail.com', 'West Palm Beach', 'C', 'E', 'A', 'D', 'B', 'C', 'A', 'D', 'A', 'A', '0', '2017-01-05 13:59:54', 1),
(4, 1, 'John Adams', 'john@gmail.com', 'West Palm Beach', 'C', 'E', 'A', 'D', 'B', 'C', 'A', 'D', 'A', 'E', '90', '2017-01-05 14:05:59', 1),
(5, 1, 'Oswald Plazola', 'oswald@test.com', 'Boca Raton', 'C', 'E', 'A', 'D', 'B', 'C', 'A', 'D', '', 'C', '80', '2017-01-11 15:47:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(39, 1, '112826f649cd11e335a50f8e9a8d1fb9e0f2bd24', '2017-01-15 00:40:50', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0', '4ee3da8220b89d6024c8f9f579ff0ec19c945a21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `pid` varchar(60) DEFAULT NULL,
  `role` varchar(60) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `region` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `practice` varchar(256) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(256) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pid`, `role`, `name`, `dt`, `region`, `practice`, `password`, `user`) VALUES
(1, 'root@admin.com', '1', 'admin', 'ad,om', '2016-12-12 03:07:11', 'SE', 'Allmed Rx', 'abc123', 'admin'),
(2, 'albus@dumbledorf.com', '4', 'admin', 'Albus Dumbledorf', '2017-01-14 05:06:18', 'NE', 'Hogwarts School of Witchcraft', 'i8o9p0', 'albus'),
(3, 'dolores@psm.com', '5', 'sales', 'Dolores Humphrey', '2017-01-14 08:23:33', 'PAC', 'Pacific School of Magic', 'p0o9i8', 'dolores');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`) VALUES
(1, 'root@admin.com', '$2y$10$lN37vruOCuy.xrqzRT/TQu.K7O3Gm2yig3oX1RyS.lS6DzqRlL26W', 1, '2016-12-11 21:08:50'),
(2, 'albus@dumbledorf.com', '$2y$10$yNw7sCLU.cCZUDqUyawdyuu4UJudLMeb87MGN2b6xKq0DV.H1PZ/.', 1, '2017-01-13 23:06:19'),
(3, 'dolores@psm.com', '$2y$10$jK6ra5Hr5k1.BX34pUJkeei6QDrpAcr9c/Fj/akUIs2l1.axkKZdC', 1, '2017-01-14 02:23:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
