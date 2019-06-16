-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 01:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(6, 'Rules', 'Forum Rules:\r\nNo Self-Advertising\r\nNo Spamming\r\netc\r\n'),
(10, 'Requests', 'Where users can request for new categories to be added by admins.\r\nThis is admin controlled to prevent spam.'),
(14, 'Suggestions', 'Add suggestions on how we can improve our site and discuss with one another how we can make our services and website better. Thank you.'),
(15, 'Discussions', 'Connect with other photographers, create threads, communicate and work together.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(2, 'No Spamming other users with messages.\r\n', '2019-05-20 09:37:49', 3, 3),
(9, 'Rules Suck', '2019-05-26 22:39:26', 3, 3),
(10, 'Yeet', '2019-05-26 22:41:18', 3, 3),
(12, 'Finally\r\n', '2019-05-26 23:19:28', 3, 3),
(14, 'Increasing the rules boiis', '2019-05-27 00:33:21', 6, 3),
(15, 'SSSSSSSSs', '2019-05-27 00:33:38', 3, 3),
(24, 'SSSSSSSS', '2019-05-27 01:04:51', 6, 3),
(28, 'Hello', '2019-05-27 01:10:55', 3, 4),
(29, 'he', '2019-05-27 01:11:22', 3, 4),
(36, 'Kindly add a report feature in future to protect users from harassment online.', '2019-06-15 22:28:17', 11, 6),
(37, 'Could you add a member list to the website?', '2019-06-15 22:29:26', 12, 6),
(39, 'Welcome', '2019-06-15 22:30:07', 14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(3, 'Rule 1', '2019-05-20 09:37:49', 6, 3),
(6, 'More Rules', '2019-05-27 00:33:21', 6, 3),
(11, 'Reports Widget', '2019-06-15 22:28:17', 14, 6),
(12, 'Member List', '2019-06-15 22:29:26', 10, 6),
(14, 'New Users', '2019-06-15 22:30:07', 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime DEFAULT NULL,
  `user_level` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(3, 'Ace', 'a6bfc35250672f309829b503a7d8cde05c3b7f4d', 'firefist@gmail.com', '2019-05-18 13:52:56', 1),
(4, 'James', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jamesbay@abc.com', '2019-05-27 01:07:30', 0),
(5, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@pak.co.ke', '2019-06-15 18:10:47', 1),
(6, 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'user1@pak.co.ke', '2019-06-15 22:26:46', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `unique_cat_name` (`cat_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
