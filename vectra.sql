-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 07:50 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vectra`
--

-- --------------------------------------------------------

--
-- Table structure for table `vectra_album`
--

CREATE TABLE `vectra_album` (
  `id` int(100) NOT NULL,
  `album_name` varchar(50) NOT NULL,
  `album_artist` varchar(50) NOT NULL,
  `album_cover` text NOT NULL,
  `released_year` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vectra_album`
--

INSERT INTO `vectra_album` (`id`, `album_name`, `album_artist`, `album_cover`, `released_year`, `date_created`, `isActive`) VALUES
(2, 'Beatiful', 'DJ Sbu', '154085947901-Beautiful-feat-Portia-Monique-mp3-image.jpg', '2018-10-01', '2018-10-30 02:31:19', 1),
(3, 'Oh well', 'DJ Slique', '1540859634Bis.jpg', '2018-08-08', '2018-10-30 02:33:54', 1),
(4, 'Vatel', 'Moozlie', '1540859771Moozlie-FT_-Kid-X.png', '2018-09-12', '2018-10-30 02:36:11', 1),
(5, 'Nalingi', 'Manu WorldStar', '154085997301-NaLingi-mp3-image.jpg', '2018-08-09', '2018-10-30 02:39:33', 1),
(6, 'Nginothando', 'karabo', '1540924197nginothando.jpg', '2018-08-15', '2018-10-30 20:29:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vectra_reviews`
--

CREATE TABLE `vectra_reviews` (
  `id` int(100) NOT NULL,
  `album_id` int(100) NOT NULL,
  `Review` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vectra_reviews`
--

INSERT INTO `vectra_reviews` (`id`, `album_id`, `Review`, `name`, `isActive`, `date_created`) VALUES
(1, 2, 'This album is whack', 'Thulani Godfrey ', 1, '2018-10-30 12:26:48'),
(2, 3, 'im in love with this album', 'Thulani Godfrey ', 1, '2018-10-30 12:27:58'),
(3, 5, 'hey African music', 'Godfrey timba', 1, '2018-10-30 19:01:19'),
(4, 5, 'most beautiful song eva', 'godfrey thing', 1, '2018-10-30 19:01:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vectra_album`
--
ALTER TABLE `vectra_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vectra_reviews`
--
ALTER TABLE `vectra_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign` (`album_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vectra_album`
--
ALTER TABLE `vectra_album`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vectra_reviews`
--
ALTER TABLE `vectra_reviews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vectra_reviews`
--
ALTER TABLE `vectra_reviews`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`album_id`) REFERENCES `vectra_album` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
