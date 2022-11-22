-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 04:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `nis`, `agama`, `jenis_kelamin`, `hp`, `alamat`, `ket`) VALUES
('ANGG000001', 'Nopriko', '32423423', 'Islam', 'L', '324234234', 'asdasdas', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` char(15) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `id_penerbit` varchar(45) NOT NULL,
  `id_pengarang` varchar(45) NOT NULL,
  `thn_terbit` year(4) NOT NULL,
  `stok` int(3) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL,
  `pinjam` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `ISBN`, `judul`, `id_kategori`, `id_penerbit`, `id_pengarang`, `thn_terbit`, `stok`, `ket`, `foto`, `pinjam`) VALUES
('111', '2342-22', 'Belajar Bahasa Indoenesia', 2, '1', '1', 2020, 4, 'Buku bahasa indonesia', '1584847734.jpg', 0),
('112-1', '123-11', 'Sukses Ujian Akhir SMA', 4, '1', '2', 2020, 3, 'Sukses Ujian Akhir SMA', '1584865750.jpg', -2),
('113-1', '1345-222', 'Teknologi Informasi Komunikasi', 3, '4', '3', 2020, 5, 'Teknologi Informasi Komunikasi', '1584865815.jpg', -2),
('234234234', '32423432', 'adasdasdasdas', 5, 'asdascasdasd', 'asdasdasdasd', 2020, 3, 'asdas', '1602001527.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(6) NOT NULL,
  `denda` int(6) NOT NULL,
  `status` enum('A','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `denda`, `status`) VALUES
(5, 3000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `stt` enum('Pinjam','Kembali','Hilang') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_pinjam`, `id_buku`, `stt`) VALUES
(125, 97, '112-1', 'Kembali'),
(130, 98, '112-1', 'Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hilang`
--

CREATE TABLE `tb_hilang` (
  `id` int(15) NOT NULL,
  `id_buku` varchar(15) NOT NULL,
  `denda` varchar(15) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `id_pinjam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hilang`
--

INSERT INTO `tb_hilang` (`id`, `id_buku`, `denda`, `id_anggota`, `id_pinjam`) VALUES
(6, '113-1', '35000', 'ANGG000001', '97');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `no_rak` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `no_rak`) VALUES
(1, 'Pendidikan Agama Islam', '100-1'),
(2, 'Pendidikan Bahasa Indonesia', '102-1'),
(3, 'IPA', '101-2'),
(4, 'IPS', '101-1'),
(5, 'Bahasa Inggris', '101-3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(2) NOT NULL,
  `id_denda` int(6) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_dikembalikan`, `terlambat`, `id_denda`, `denda`) VALUES
(244, 97, '2020-10-06', 2, 5, 6000),
(245, 98, '2020-10-06', 5, 5, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `stts`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('asdasda', '648bd6026fce9e593c85e8298c958acc', 'admin'),
('petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(3) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `kota` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`, `kota`) VALUES
(1, 'Erlangga', 'Jakarta Timur'),
(4, 'Yudhistira', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'Anton Kurnia'),
(2, 'Asma Nadia'),
(3, 'B. Soelarto'),
(4, 'Bastian Tito');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `img`, `jenis_kelamin`, `alamat`, `password`, `agama`, `hp`, `ket`) VALUES
('admin', 'Admin', 'XUE73TBORI8ZN2MYQJF1H64LGAV50PKC9SWD.jpg', 'L', 'bantul', 'admin', 'Islam', '053xxxx', 'testing'),
('asdasda', 'asdas', '4T8S56WUQA7BRLGIP93YND0VFE21JCZXOHKM.jpg', 'L', 'asdas', 'wqeqwe', 'Islam', '32423423', 'asdasd'),
('petugas', 'Petugas', 'LGATSIM9QXWP6O5VZ3J8YB4UKF10DRH7E2NC.jpg', 'L', 'Harnowo', '0806', 'Kristen', '019273981293871', 'sdasdasda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(4) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=belum kembali,1=sudah kembali'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tgl_kembali`, `total_buku`, `status`) VALUES
(84, '2020-03-22', 'ANGG000001', '2020-03-24', 1, 1),
(85, '2020-03-22', 'ANGG000001', '2020-03-25', 2, 1),
(97, '2020-10-01', 'ANGG000001', '2020-10-04', 0, 1),
(98, '2020-10-06', 'ANGG000001', '2020-10-01', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id_tamu` int(11) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id_tamu`, `nis`, `nama`, `tgl`) VALUES
(1, '32423423', 'sadasda', '2020-03-19 00:00:00'),
(2, '32423432', 'asdasda', '2020-03-22 16:26:47'),
(3, '3242342', 'asdasda', '2020-03-22 16:26:54'),
(4, '3423', 'wewqqwe', '2020-03-22 16:29:26'),
(5, 'asd3242342', 'wdadasda', '2020-03-22 22:30:23'),
(6, '34234', 'asdas', '2020-03-22 22:34:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_buku` (`id_buku`,`ISBN`,`judul`,`id_kategori`,`id_penerbit`,`id_pengarang`,`thn_terbit`,`stok`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_anggota` (`id_pinjam`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`,`id_pinjam`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tb_hilang`
--
ALTER TABLE `tb_hilang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_detail` (`id_pinjam`),
  ADD KEY `id_kembali` (`id_kembali`,`id_pinjam`,`tgl_dikembalikan`,`terlambat`,`id_denda`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`stts`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`),
  ADD KEY `id_penerbit` (`id_penerbit`,`nama_penerbit`,`kota`);

--
-- Indexes for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_detail` (`tgl_kembali`),
  ADD KEY `id_buku` (`id_anggota`),
  ADD KEY `id_pinjam` (`id_pinjam`,`tgl_pinjam`,`id_anggota`,`tgl_kembali`,`total_buku`);

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tb_hilang`
--
ALTER TABLE `tb_hilang`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD CONSTRAINT `tb_kembali_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
