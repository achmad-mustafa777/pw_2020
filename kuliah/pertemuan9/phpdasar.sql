-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2021 at 10:14 AM
-- Server version: 10.5.13-MariaDB-1:10.5.13+maria~bullseye
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `nrp` char(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `Nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(2, 'Achmad Mustafa ', '0001', 'achmad@gmail.com', 'Tehnik Informatika', '6184899876843.jpg'),
(3, 'Naruto ', '0002', 'n2@yahoo.com', 'Tehnik Industri', '618489a34c50a.jpg'),
(4, 'Rogher ', '0003', 'r2@gmail.com', 'Tehnik Keuangan', '618489c8ad97b.jpg'),
(5, 'Zoro ', '0004', 'z2@yahoo.com', 'Tehnik Pedang', '618489da49d9f.jpeg'),
(6, 'Ucup ', '0005', 'u2@gmail.com', 'Tehnik Cukur', '618489e663c88.jpg'),
(7, 'Abdullah ', '0006', 'at@ymail.com', 'Tehnik Pedang', '61848a096577a.jpg'),
(8, 'Topa ', '0007', 't2@yamil.com', 'Cyber Security', '61848a1ccfa3a.jpeg'),
(9, 'Yuji ', '0008', 'y2@gmail', 'Tehnik Olahraga', '61848a29eeaa4.jpeg'),
(10, 'Lutfi ', '0009', 'l2@gmail.com', 'Tehnik Perkapalan', '61848a3872494.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'topa', '$2y$10$872Cu9l0dAmqqfC4b/GfvOHyKpMzgcEr.FYMAiIb.ksWkWrNp6Iey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
