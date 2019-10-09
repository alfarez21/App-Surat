-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 03:45 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `sifat`
--

CREATE TABLE `sifat` (
  `idSifat` int(11) NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sifat`
--

INSERT INTO `sifat` (`idSifat`, `sifat`) VALUES
(1, 'penting'),
(2, 'biasa'),
(3, 'segera');

-- --------------------------------------------------------

--
-- Table structure for table `sttsbacal`
--

CREATE TABLE `sttsbacal` (
  `idBacaL` int(11) NOT NULL,
  `sttsbaca` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sttsbacal`
--

INSERT INTO `sttsbacal` (`idBacaL`, `sttsbaca`) VALUES
(1, 'sudah'),
(2, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `sttsbacap`
--

CREATE TABLE `sttsbacap` (
  `idBacaP` int(11) NOT NULL,
  `sttsbaca` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sttsbacap`
--

INSERT INTO `sttsbacap` (`idBacaP`, `sttsbaca`) VALUES
(1, 'sudah'),
(2, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `sttsbacat`
--

CREATE TABLE `sttsbacat` (
  `idBacaT` int(11) NOT NULL,
  `sttsbaca` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sttsbacat`
--

INSERT INTO `sttsbacat` (`idBacaT`, `sttsbaca`) VALUES
(1, 'sudah'),
(2, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `sttsdisposisi`
--

CREATE TABLE `sttsdisposisi` (
  `idDisposisi` int(11) NOT NULL,
  `sttsDis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sttsdisposisi`
--

INSERT INTO `sttsdisposisi` (`idDisposisi`, `sttsDis`) VALUES
(1, 'sudah'),
(2, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `sttsditerima`
--

CREATE TABLE `sttsditerima` (
  `idStts` int(11) NOT NULL,
  `sttsDit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sttsditerima`
--

INSERT INTO `sttsditerima` (`idStts`, `sttsDit`) VALUES
(1, 'sudah'),
(2, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `idSMasuk` int(11) NOT NULL,
  `noRegister` varchar(20) NOT NULL,
  `tglMasuk` date NOT NULL,
  `tglSurat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `idDisposisi` int(11) NOT NULL,
  `idStts` int(11) NOT NULL,
  `idSifat` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idBacaL` int(11) DEFAULT NULL,
  `pics` text NOT NULL,
  `idBacaT` int(11) DEFAULT NULL,
  `idBacaP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `profile` text,
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `fullname`, `profile`, `idLevel`) VALUES
(1, 'tatausaha', '1', 'Diaaaa', 'avatar.png', 2),
(2, 'pemimpin', '1', 'saya pemimpin', 'avatar.png', 1),
(3, 'pegawai', '1', 'Muhamad Rifky', 'avatar.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `userslevel`
--

CREATE TABLE `userslevel` (
  `idLevel` int(11) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userslevel`
--

INSERT INTO `userslevel` (`idLevel`, `level`) VALUES
(1, 'pemimpin'),
(2, 'tatausaha'),
(3, 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sifat`
--
ALTER TABLE `sifat`
  ADD PRIMARY KEY (`idSifat`);

--
-- Indexes for table `sttsbacal`
--
ALTER TABLE `sttsbacal`
  ADD PRIMARY KEY (`idBacaL`);

--
-- Indexes for table `sttsbacap`
--
ALTER TABLE `sttsbacap`
  ADD PRIMARY KEY (`idBacaP`);

--
-- Indexes for table `sttsbacat`
--
ALTER TABLE `sttsbacat`
  ADD PRIMARY KEY (`idBacaT`);

--
-- Indexes for table `sttsdisposisi`
--
ALTER TABLE `sttsdisposisi`
  ADD PRIMARY KEY (`idDisposisi`);

--
-- Indexes for table `sttsditerima`
--
ALTER TABLE `sttsditerima`
  ADD PRIMARY KEY (`idStts`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`idSMasuk`),
  ADD KEY `idDisposisi` (`idDisposisi`,`idStts`),
  ADD KEY `fk_sttsditerima` (`idStts`),
  ADD KEY `idSifat` (`idSifat`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idBaca` (`idBacaL`),
  ADD KEY `idBacaT` (`idBacaT`),
  ADD KEY `idBacaP` (`idBacaP`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Indexes for table `userslevel`
--
ALTER TABLE `userslevel`
  ADD PRIMARY KEY (`idLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sifat`
--
ALTER TABLE `sifat`
  MODIFY `idSifat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sttsbacal`
--
ALTER TABLE `sttsbacal`
  MODIFY `idBacaL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sttsbacap`
--
ALTER TABLE `sttsbacap`
  MODIFY `idBacaP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sttsbacat`
--
ALTER TABLE `sttsbacat`
  MODIFY `idBacaT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sttsdisposisi`
--
ALTER TABLE `sttsdisposisi`
  MODIFY `idDisposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sttsditerima`
--
ALTER TABLE `sttsditerima`
  MODIFY `idStts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `idSMasuk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userslevel`
--
ALTER TABLE `userslevel`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD CONSTRAINT `fk_sifat` FOREIGN KEY (`idSifat`) REFERENCES `sifat` (`idSifat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sttsbacal` FOREIGN KEY (`idBacaL`) REFERENCES `sttsbacal` (`idBacaL`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sttsbacap` FOREIGN KEY (`idBacaP`) REFERENCES `sttsbacap` (`idBacaP`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sttsbacat` FOREIGN KEY (`idBacaT`) REFERENCES `sttsbacat` (`idBacaT`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sttsdiposisi` FOREIGN KEY (`idDisposisi`) REFERENCES `sttsdisposisi` (`idDisposisi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sttsditerima` FOREIGN KEY (`idStts`) REFERENCES `sttsditerima` (`idStts`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_userslevel` FOREIGN KEY (`idLevel`) REFERENCES `userslevel` (`idLevel`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
