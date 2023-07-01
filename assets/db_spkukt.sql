-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 06:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkukt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_beasiswa`
--

CREATE TABLE `tb_beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_beasiswa`
--

INSERT INTO `tb_beasiswa` (`id_beasiswa`, `nama_beasiswa`) VALUES
(5, 'Beasiswa Prestasi'),
(6, 'Beasiswa KIP'),
(7, 'Beasiswa Non Akademik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_mahasiswa`
--

CREATE TABLE `tb_data_mahasiswa` (
  `id_data_mahasiswa` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data_mahasiswa`
--

INSERT INTO `tb_data_mahasiswa` (`id_data_mahasiswa`, `id_mahasiswa`, `id_kriteria`, `value`, `dokumen`) VALUES
(6, 2, 1, '2', 'Docs_1_2_25052023.pdf'),
(7, 2, 6, '3.4', 'Docs_6_2_25052023.pdf'),
(8, 2, 7, '2000000', 'Docs_7_2_25052023.pdf'),
(9, 2, 8, 'Anggota', 'Docs_8_2_25052023.pdf'),
(10, 2, 9, '3', 'Docs_9_2_25052023.pdf'),
(11, 3, 10, '2', 'Docs_10_3_30052023.pdf'),
(12, 3, 11, '3.80', 'Docs_11_3_30052023.pdf'),
(13, 3, 12, '2000000', 'Docs_12_3_30052023.pdf'),
(14, 3, 13, '3', 'Docs_13_3_30052023.pdf'),
(15, 3, 14, 'Anggota', 'Docs_14_3_30052023.png'),
(16, 4, 10, '7', 'Docs_10_4_30052023.pdf'),
(17, 4, 11, '2.50', 'Docs_11_4_30052023.pdf'),
(18, 4, 12, '1200000', 'Docs_12_4_30052023.pdf'),
(19, 4, 13, '2', 'Docs_13_4_30052023.pdf'),
(20, 4, 14, 'Anggota', 'Docs_14_4_30052023.pdf'),
(21, 5, 10, '3', 'Docs_10_5_14062023.pdf'),
(22, 5, 11, '3.82', 'Docs_11_5_14062023.pdf'),
(23, 5, 12, '2000000', 'Docs_12_5_14062023.pdf'),
(24, 5, 13, '1', 'Docs_13_5_14062023.pdf'),
(25, 5, 14, 'Anggota', 'Docs_14_5_14062023.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_beasiswa`
--

CREATE TABLE `tb_detail_beasiswa` (
  `id_detail_beasiswa` int(11) NOT NULL,
  `id_beasiswa` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `bobot_beasiswa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_beasiswa`
--

INSERT INTO `tb_detail_beasiswa` (`id_detail_beasiswa`, `id_beasiswa`, `id_kriteria`, `bobot_beasiswa`) VALUES
(2, 2, 1, 0.2),
(3, 2, 6, 0.1),
(4, 2, 7, 0.4),
(5, 2, 9, 0.3),
(6, 4, 1, 0.2),
(7, 4, 6, 0.6),
(8, 4, 7, 0.1),
(9, 4, 9, 0.1),
(10, 3, 1, 0.3),
(11, 3, 6, 0.2),
(12, 3, 8, 0.5),
(13, 5, 10, 0.2),
(14, 5, 11, 0.6),
(15, 5, 12, 0.1),
(16, 5, 13, 0.1),
(17, 6, 10, 0.2),
(18, 6, 11, 0.1),
(19, 6, 12, 0.4),
(20, 6, 13, 0.3),
(21, 7, 10, 0.3),
(22, 7, 11, 0.2),
(23, 7, 14, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_hasil`
--

CREATE TABLE `tb_detail_hasil` (
  `id_detail_hasil` int(11) NOT NULL,
  `id_hasil` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `bobot_hasil` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_hasil`
--

INSERT INTO `tb_detail_hasil` (`id_detail_hasil`, `id_hasil`, `id_kriteria`, `bobot_hasil`) VALUES
(16, 6, 10, 0.2),
(17, 6, 11, 0.6),
(18, 6, 12, 0.2),
(19, 6, 13, 0.1),
(20, 7, 10, 0.2),
(21, 7, 11, 0.1),
(22, 7, 12, 0.05),
(23, 7, 13, 0.3),
(24, 8, 10, 0.3),
(25, 8, 11, 0.2),
(26, 8, 14, 0.02),
(27, 9, 10, 0.2),
(28, 9, 10, 0.05),
(29, 9, 11, 0.6),
(30, 9, 11, 0.0166667),
(31, 9, 12, 0.2),
(32, 9, 12, 0.1),
(33, 9, 13, 0.1),
(34, 9, 13, 0.2),
(35, 10, 10, 0.2),
(36, 10, 10, 0.05),
(37, 10, 11, 0.1),
(38, 10, 11, 0.1),
(39, 10, 12, 0.05),
(40, 10, 12, 0.4),
(41, 10, 13, 0.3),
(42, 10, 13, 0.0666667),
(43, 11, 10, 0.3),
(44, 11, 10, 0.0333333),
(45, 11, 11, 0.2),
(46, 11, 11, 0.05),
(47, 11, 14, 0.02),
(48, 11, 14, 0.02);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_kriteria`
--

CREATE TABLE `tb_detail_kriteria` (
  `id_detail_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `min_value` float NOT NULL,
  `max_value` float NOT NULL,
  `bobot_detail_kriteria` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_kriteria`
--

INSERT INTO `tb_detail_kriteria` (`id_detail_kriteria`, `id_kriteria`, `min_value`, `max_value`, `bobot_detail_kriteria`) VALUES
(2, 1, 1, 2, 3),
(3, 1, 3, 4, 2),
(4, 1, 5, 7, 1),
(5, 6, 0, 3.4, 1),
(6, 6, 3.41, 3.7, 2),
(7, 6, 3.71, 4, 3),
(8, 7, 0, 1500000, 3),
(9, 7, 1500000, 3000000, 2),
(10, 7, 3000000, 500000000, 1),
(11, 9, 0, 1, 1),
(12, 9, 2, 2, 2),
(13, 9, 3, 100, 3),
(14, 8, 0, 0, 1),
(15, 8, 1, 1, 2),
(16, 8, 2, 2, 3),
(17, 10, 1, 2, 3),
(18, 10, 3, 4, 2),
(19, 10, 5, 7, 1),
(20, 11, 0, 3.4, 1),
(21, 11, 3.41, 3.7, 2),
(22, 11, 3.71, 4, 3),
(23, 12, 0, 1500000, 3),
(24, 12, 1500000, 3000000, 2),
(25, 12, 3000000, 10000000, 1),
(26, 13, 0, 1, 1),
(27, 13, 2, 2, 2),
(28, 13, 3, 10, 3),
(29, 14, 0, 0, 1),
(30, 14, 0, 0, 2),
(31, 14, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_beasiswa` int(11) DEFAULT NULL,
  `status_hasil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_mahasiswa`, `id_beasiswa`, `status_hasil`) VALUES
(6, 3, 5, 'eligible'),
(7, 3, 6, 'eligible'),
(8, 3, 7, 'pending'),
(9, 4, 5, 'eligible'),
(10, 4, 6, 'eligible'),
(11, 4, 7, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(255) DEFAULT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`) VALUES
(10, 'C1', 'Semester'),
(11, 'C2', 'Nilai IP'),
(12, 'C3', 'Penghasilan Ortu'),
(13, 'C4', 'Tanggungan Ortu'),
(14, 'C3', 'Surat Keterangan Organisasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuota`
--

CREATE TABLE `tb_kuota` (
  `id_kuota` int(11) NOT NULL,
  `id_beasiswa` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kuota`
--

INSERT INTO `tb_kuota` (`id_kuota`, `id_beasiswa`, `id_prodi`, `kuota`) VALUES
(1, 2, 1, 5),
(2, 3, 1, 15),
(3, 5, 2, 3),
(4, 6, 2, 5),
(5, 7, 2, 5),
(7, 5, 3, 3),
(8, 6, 3, 5),
(9, 7, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `nim_mahasiswa` varchar(255) DEFAULT NULL,
  `alamat_mahasiswa` text DEFAULT NULL,
  `email_mahasiswa` varchar(255) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim_mahasiswa`, `alamat_mahasiswa`, `email_mahasiswa`, `id_prodi`) VALUES
(3, 'Al Ghifari', '001', 'Malang                                            ', 'mhs1@gmail.com', 2),
(4, 'Yolan Meldi Saputra', '002', 'Malang                                            ', 'mhs2@gmail.com', 2),
(5, 'Muhammad Ghaziy Al Ghifari Anwar', '003', 'Jl Kemantren III No. 37', 'email003@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`) VALUES
(2, 'Sistem Informasi'),
(3, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, '', 'Al Ghifari', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, '', 'Al Ghifari', '22510023', '7c12b14ba6fbc4d470bd2d4217388865', 'mahasiswa'),
(3, '', 'Ahmad', 'ahmad', 'ahmad123', 'kaprodi'),
(4, '', 'Al Ghifari', '001', '914a4a042559f036225b303e55b1ba2b', 'mahasiswa'),
(5, '', 'Yolan Meldi Saputra', '002', 'dd77f76029511442782547b267445c72', 'mahasiswa'),
(6, '', 'Kaprodi Ahmad', 'kaprodi', '12345', 'kaprodi'),
(7, '', 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(8, '', 'Kaprodi', 'kaprodi', '827ccb0eea8a706c4c34a16891f84e7b', 'kaprodi'),
(9, 'alghifari@gmail.com', 'Ghifa', 'ghifa', '202cb962ac59075b964b07152d234b70', 'kaprodi'),
(10, 'email003@gmail.com', 'Muhammad Ghaziy Al Ghifari Anwar', '003', '202cb962ac59075b964b07152d234b70', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `tb_data_mahasiswa`
--
ALTER TABLE `tb_data_mahasiswa`
  ADD PRIMARY KEY (`id_data_mahasiswa`);

--
-- Indexes for table `tb_detail_beasiswa`
--
ALTER TABLE `tb_detail_beasiswa`
  ADD PRIMARY KEY (`id_detail_beasiswa`);

--
-- Indexes for table `tb_detail_hasil`
--
ALTER TABLE `tb_detail_hasil`
  ADD PRIMARY KEY (`id_detail_hasil`);

--
-- Indexes for table `tb_detail_kriteria`
--
ALTER TABLE `tb_detail_kriteria`
  ADD PRIMARY KEY (`id_detail_kriteria`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  ADD PRIMARY KEY (`id_kuota`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_data_mahasiswa`
--
ALTER TABLE `tb_data_mahasiswa`
  MODIFY `id_data_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_detail_beasiswa`
--
ALTER TABLE `tb_detail_beasiswa`
  MODIFY `id_detail_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_detail_hasil`
--
ALTER TABLE `tb_detail_hasil`
  MODIFY `id_detail_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_detail_kriteria`
--
ALTER TABLE `tb_detail_kriteria`
  MODIFY `id_detail_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
