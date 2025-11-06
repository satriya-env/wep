-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2025 at 11:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kdns`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga` int(6) NOT NULL,
  `dipesan` int(7) NOT NULL,
  `deskrip` text NOT NULL,
  `gambar` text NOT NULL,
  `date` date NOT NULL DEFAULT '2025-11-02',
  `time` time NOT NULL DEFAULT '18:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `dipesan`, `deskrip`, `gambar`, `date`, `time`) VALUES
(1, 'Rendang Serenteng', 21000, 92, 'string ', 'rendangcik.jpg', '2025-11-02', '18:00:00'),
(2, 'Teh Hijau', 14000, 89, 'string   ', 'item2.png', '2025-11-02', '18:00:00'),
(3, 'Lemon Tea', 12500, 87, 'string ', 'item1.jpg', '2025-11-02', '18:00:00'),
(4, 'Mie Ayam Sultan', 18500, 86, 'string ', 'item3.png', '2025-11-02', '18:00:00'),
(5, 'Comb Waffle', 17000, 107, 'string  ', 'item4.png', '2025-11-02', '18:00:00'),
(8, 'Baso Sultan', 18500, 99, 'string ', 'item5.jpg', '2025-11-02', '18:00:00'),
(9, 'Sate Maranggi', 20000, 52, 'string ', 'item6.jpg', '2025-11-06', '14:25:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
