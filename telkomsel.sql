-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 11:24 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkomsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_corporate`
--

CREATE TABLE `tb_corporate` (
  `id_corporate` int(15) NOT NULL,
  `nama_corporate` varchar(50) NOT NULL,
  `alamat_corporate` text NOT NULL,
  `nama_pimpinan_corporate` varchar(50) NOT NULL,
  `jabatan_pimpinan_corporate` varchar(50) NOT NULL,
  `nama_pic_corporate` varchar(50) NOT NULL,
  `jabatan_pic_corporate` varchar(50) NOT NULL,
  `nomor_hp_pic_corporate` varchar(13) NOT NULL,
  `email_pic_corporate` varchar(100) NOT NULL,
  `nomor_tlp_kantor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_corporate`
--

INSERT INTO `tb_corporate` (`id_corporate`, `nama_corporate`, `alamat_corporate`, `nama_pimpinan_corporate`, `jabatan_pimpinan_corporate`, `nama_pic_corporate`, `jabatan_pic_corporate`, `nomor_hp_pic_corporate`, `email_pic_corporate`, `nomor_tlp_kantor`) VALUES
(101, 'PT. Mirage Bali Distribution', 'swssdwdwdwdwd', 'Thusen', 'Owner', 'Thusen', 'Owner', '811386772', 'mirage.bali@gmail.com', '121332'),
(102, 'PT. Bpr Sri Artha Lestari', 'wdwddw', 'Luh Ketut Citarasmini', 'Kadiv HCM & Complience', 'Ribka Kristin', 'Staff HCM', '823772382', 'ribka.kristin@bprlestari.com', '2147483647'),
(103, 'Potato Head And Club', 'Jl. Peti Tenget 51B Seminyak, Kuta, Badung, Bali', 'Ario Bimo Wicaksono', 'Financial Controller', 'Ni Ketut Suarini', 'Manager GA', '2147483647', 'suryani@pttfamily.com', '323234'),
(104, 'PT. Livit International Indonesia', 'Rukan No 14 Perum Bumi Santi, Banjar Sasih,Jl. Pratu Made Rembug Batu Bulan 80571, Gianyar, Bali', 'Nicholas John Martin', 'Operational Director', 'Ni Luh Putu Yunari', 'Finance & Operation Assistant', '2147483647', 'invoice@liv.it', '361292123'),
(105, 'coba', 'coba', 'coba', 'coba', 'coba', 'coba', '1212122', 'coba@coba.com', '12212');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_nomor`
--

CREATE TABLE `tb_list_nomor` (
  `id_list_msisdn` int(15) NOT NULL,
  `id_corporate` int(15) NOT NULL,
  `msisdn` int(12) NOT NULL,
  `user` varchar(30) NOT NULL,
  `division` varchar(30) NOT NULL,
  `short_code` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_list_nomor`
--

INSERT INTO `tb_list_nomor` (`id_list_msisdn`, `id_corporate`, `msisdn`, `user`, `division`, `short_code`, `deskripsi`) VALUES
(10001, 101, 323232, 'fvf', 'fvf', 'vfv', 'vf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(11) NOT NULL,
  `nama_paket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`) VALUES
('P001', 'My Group'),
('P002', 'MVPN'),
('P003', 'Flash'),
('P004', 'Flash Denom'),
('P005', 'Web2sms');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pic_telkomsel`
--

CREATE TABLE `tb_pic_telkomsel` (
  `id_pic_telkomsel` varchar(15) NOT NULL,
  `nama_pic_telkomsel` varchar(50) NOT NULL,
  `jabatan_pic_telkomsel` varchar(50) NOT NULL,
  `nomor_hp_pic_telkomsel` int(14) NOT NULL,
  `email_pic_telkomsel` varchar(50) NOT NULL,
  `nomor_tlp_kantor` int(12) NOT NULL,
  `alamat_kantor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pic_telkomsel`
--

INSERT INTO `tb_pic_telkomsel` (`id_pic_telkomsel`, `nama_pic_telkomsel`, `jabatan_pic_telkomsel`, `nomor_hp_pic_telkomsel`, `email_pic_telkomsel`, `nomor_tlp_kantor`, `alamat_kantor`) VALUES
('73245', 'Ida Bagus Wisnu Singarsa', 'Account Manager', 811391737, 'ida_bw_singarsa@telkomsel.co.id', 361244235, 'dsds'),
('87928', 'Ni Komang Meigawati', 'Account Manager', 811390008, 'nikomang_meigawati@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234'),
('88132', 'Pandu Adi Setiawan', 'Account Manager', 2147483647, 'pandu_a_setiawan@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234'),
('88145', 'Jonathan', 'Account Manager', 2147483647, 'jonathan@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234'),
('90532', 'Andhi Prabowo', 'Account Manager', 2147483647, 'andhi_prabowo@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pimpinan_telkomsel`
--

CREATE TABLE `tb_pimpinan_telkomsel` (
  `id_pimpinan_telkomsel` varchar(15) NOT NULL,
  `nama_pimpinan_telkomsel` varchar(50) NOT NULL,
  `jabatan_pimpinan_telkomsel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pimpinan_telkomsel`
--

INSERT INTO `tb_pimpinan_telkomsel` (`id_pimpinan_telkomsel`, `nama_pimpinan_telkomsel`, `jabatan_pimpinan_telkomsel`) VALUES
('67292', 'Roeswandi', 'GM Account Management Jawa Bali'),
('71829', 'Ihsan', 'GM Sales Bali Nusra');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pks`
--

CREATE TABLE `tb_pks` (
  `id_pks` int(15) NOT NULL,
  `nomor_pks` varchar(50) NOT NULL,
  `id_pimpinan_telkomsel` varchar(15) NOT NULL,
  `id_pic_telkomsel` varchar(15) NOT NULL,
  `id_corporate` int(15) NOT NULL,
  `id_paket` varchar(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sign_pimpinan_corporate` varchar(5) NOT NULL,
  `sign_pic_corporate` varchar(5) NOT NULL,
  `sign_pimpinan_telkomsel` varchar(5) NOT NULL,
  `sign_pic_telkomsel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pks`
--

INSERT INTO `tb_pks` (`id_pks`, `nomor_pks`, `id_pimpinan_telkomsel`, `id_pic_telkomsel`, `id_corporate`, `id_paket`, `start_date`, `end_date`, `sign_pimpinan_corporate`, `sign_pic_corporate`, `sign_pimpinan_telkomsel`, `sign_pic_telkomsel`) VALUES
(2001, '010/LG.05/CM.73/VIII/2017', '67292', '87928', 103, 'P002', '2017-09-01', '2018-09-01', 'F', 'F', 'F', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `pass`, `nama`, `level`) VALUES
(99, 'azizah@telkomsel.co.id', '1234', 'Azizarssdd,l,l,', 'Administrasi'),
(106, 'aldi@telkomsel.co.id', '1234', 'paijo91115', 'Administrasi'),
(108, 'imade_abimayu@telkomsel.co.id', '1234', 'I Made Abimayu', 'SPV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_corporate`
--
ALTER TABLE `tb_corporate`
  ADD PRIMARY KEY (`id_corporate`);

--
-- Indexes for table `tb_list_nomor`
--
ALTER TABLE `tb_list_nomor`
  ADD PRIMARY KEY (`id_list_msisdn`),
  ADD KEY `id_corporate` (`id_corporate`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pic_telkomsel`
--
ALTER TABLE `tb_pic_telkomsel`
  ADD PRIMARY KEY (`id_pic_telkomsel`);

--
-- Indexes for table `tb_pimpinan_telkomsel`
--
ALTER TABLE `tb_pimpinan_telkomsel`
  ADD PRIMARY KEY (`id_pimpinan_telkomsel`);

--
-- Indexes for table `tb_pks`
--
ALTER TABLE `tb_pks`
  ADD PRIMARY KEY (`id_pks`),
  ADD KEY `id_pimpinan_telkomsel` (`id_pimpinan_telkomsel`),
  ADD KEY `id_corporate` (`id_corporate`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_corporate`
--
ALTER TABLE `tb_corporate`
  MODIFY `id_corporate` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `tb_list_nomor`
--
ALTER TABLE `tb_list_nomor`
  MODIFY `id_list_msisdn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `tb_pks`
--
ALTER TABLE `tb_pks`
  MODIFY `id_pks` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_list_nomor`
--
ALTER TABLE `tb_list_nomor`
  ADD CONSTRAINT `FK_corporate_list` FOREIGN KEY (`id_corporate`) REFERENCES `tb_corporate` (`id_corporate`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pks`
--
ALTER TABLE `tb_pks`
  ADD CONSTRAINT `FK_corporate_pks` FOREIGN KEY (`id_corporate`) REFERENCES `tb_corporate` (`id_corporate`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_paket` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pic_telkomsel` FOREIGN KEY (`id_pimpinan_telkomsel`) REFERENCES `tb_pimpinan_telkomsel` (`id_pimpinan_telkomsel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pimpinan_telkomsel` FOREIGN KEY (`id_pimpinan_telkomsel`) REFERENCES `tb_pimpinan_telkomsel` (`id_pimpinan_telkomsel`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
