-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2016 at 01:19 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chating`
--

CREATE TABLE `chating` (
  `id_chat` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `isi_chat` varchar(250) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chating`
--

INSERT INTO `chating` (`id_chat`, `username`, `isi_chat`, `waktu`) VALUES
(1, 'syarif123', 'bangssaaaat', '2016-11-03 14:53:55'),
(2, 'syarif123', 'fuck', '2016-11-03 14:54:05'),
(3, 'firman123', 'whattttt', '2016-11-03 14:54:34'),
(4, 'syarif123', 'emsya sialan', '2016-11-08 13:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id_threads` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `isi` longtext NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tag` varchar(250) NOT NULL,
  `nama_user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id_threads`, `judul`, `isi`, `waktu`, `tag`, `nama_user`) VALUES
(1, 'membuat aplikasi penjualan', '<p>tessss</p>\r\n', '2016-11-30 23:52:59', 'php', 'syarif123'),
(2, 'resposive', '', '2016-11-30 23:57:49', 'css', 'syarif123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `Alamat` longtext NOT NULL,
  `email` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama_user`, `jenis_kelamin`, `Alamat`, `email`, `foto`, `status`) VALUES
(1537, 'syarif123', '$2y$10$/xR0/ftiFNZQ/Jt.yEbuTuldnt1zn.Pk.zc./vCtGWHTNt.4Lc.5G', 'syarif', 'Laki-Laki', 'jln banua hanyar', 'syarif@stmik.lab.id', 'IMG_1149.JPG', 1),
(1538, 'Firman123', '$2y$10$96LDH5DGAhQFy/A9MN0wOuM7m87VmtF48UBkJh8y39J4wdlQphUHe', 'Firmansyah', 'Laki-Laki', 'jln pal 5', 'firman@gmail.com', 'destined_wallpaper_series___veemon_by_stitchfluffy-d8wd5xo.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chating`
--
ALTER TABLE `chating`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id_threads`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chating`
--
ALTER TABLE `chating`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id_threads` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1539;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
