-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 12:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agile`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `descript` varchar(259) NOT NULL,
  `posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `gambar`, `descript`, `posted_date`) VALUES
(15, 'zelda_poll_art_by_averagehuman123_dguwwi5-pre.jpg', '', '2024-02-10'),
(16, 'toothless_by_wazzy88_dgqfl1e-pre.jpg', '', '2024-02-10'),
(17, '_pack_74__jinx_by_ayyasap_dgpecs3-fullview.jpg', '', '2024-02-10'),
(19, '38a5332ad8f9cc4d4242b642b8ec0e42.jpg', '', '2024-02-10'),
(20, 'battle_march_of_the_witcher_by_bobsuggs_dgpbvqs-pre.jpg', '', '2024-02-10'),
(21, '5910f16ea1274b809afb19a4457e3863.jpg', '', '2024-02-10'),
(22, '2024_01_09_22_30_42_8465_by_imaginarycanvadart_dgp6ru1-414w-2x.jpg', '', '2024-02-10'),
(26, 'frieren_in_the_city_v2__pixai_art__by_krifi95_dghjgyt-pre.jpg', '', '2024-02-10'),
(27, '0a710cac4a1244ec8e9e7000aad81111.jpg', '', '2024-02-10'),
(28, 'd5429da678ca32105283d9cbe5c4522e.jpg', '', '2024-02-10'),
(29, 'eccece8f1241dbc4c8c5dd58257ae198.jpg', '', '2024-02-10'),
(30, 'bloodborne_sobre_a_luz_do_luar_by_ladantuwan_dgp4y5f-pre.jpg', '', '2024-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
