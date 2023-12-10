-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 03:24 AM
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
-- Database: `si_duk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bidang`
--

CREATE TABLE `data_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `updated` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_bidang`
--

INSERT INTO `data_bidang` (`id_bidang`, `nama_bidang`, `updated`) VALUES
(1, 'Diskominfosantik', '2023-09-11 02:46:55'),
(2, 'Sekretariat', '2023-09-11 02:47:09'),
(3, 'Sub Bagian Umum dan Kepegawaian', '2023-11-01 15:19:46'),
(4, 'Sub Bagian Keuangan dan Aset', '2023-11-01 15:20:04'),
(5, 'Bidang Pengelolaan Informasi Publik', '2023-09-11 02:47:31'),
(6, 'Bidang Pengelolaan Komunikasi Publik', '2023-09-11 02:47:42'),
(7, 'Bidang Teknologi Informasi dan Komunikasi', '2023-09-11 02:47:50'),
(8, 'Seksi Pengelolaan Data Statistik dan Informasi', '2023-11-01 15:20:41'),
(9, 'Bidang Layanan E-Governement', '2023-09-11 02:57:40'),
(10, 'Bidang Persandian', '2023-09-11 02:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `data_pribadi`
--

CREATE TABLE `data_pribadi` (
  `id_data_pribadi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `agama` enum('Islam','Kristen-Protestan','Kristen-Katholik','Hindu','Buddha','Khonghucu') NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pribadi`
--

INSERT INTO `data_pribadi` (`id_data_pribadi`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `usia`, `email`, `no_hp`, `foto`, `alamat`, `agama`, `updated`) VALUES
(75, 'Astria Febiolaaaaaaaa', 'Perempuan', 'Palangka Raya', '2002-05-13', '21 tahun 6 bulan', 'astrid@gmail.com', '081212121212', 'boss.jpg', 'Jl. Nanas No.12', 'Islam', '2023-11-15 06:38:37'),
(81, 'Danarian Evalopa', 'Laki-laki', 'Balikpapan', '2002-01-01', '21 tahun 10 bulan', 'danaddd@gmail.com', '081256121234', 'pasfoto(1) (3).jpg', 'Jl. Sumbawa No.99', 'Islam', '2023-11-20 01:30:16'),
(82, 'Inda Fitria Maharisty ST.', 'Perempuan', 'Gunung Mas', '2002-01-01', '21 tahun 10 bulan', 'indaa@gmail.com', '081256181289', 'Dina Meiliana.jpg', 'Jl. Hendrik Timang No.99', 'Islam', '2023-11-20 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`, `updated`) VALUES
(1, 'Juru Muda (I/a)', '2023-09-11 02:49:40'),
(2, 'Juru Muda Tingkat I (I/b)', '2023-09-11 02:50:08'),
(3, 'Juru (I/c)', '2023-09-11 02:50:21'),
(4, 'Juru Tingkat I (I/d)', '2023-11-22 01:57:59'),
(5, 'Pengatur Muda (II/a)', '2023-09-11 02:50:32'),
(6, 'Pengatur Muda Tingkat I (II/b)', '2023-09-11 02:51:03'),
(7, 'Pengatur (II/c)', '2023-09-11 02:51:30'),
(8, 'Pengatur Tingkat I (II/d)', '2023-09-11 02:51:45'),
(9, 'Penata Muda (III/a)', '2023-09-11 02:52:16'),
(10, 'Penata Muda Tingkat I (III/b)', '2023-09-11 02:52:30'),
(11, 'Penata (III/c)', '2023-09-11 02:52:43'),
(12, 'Penata Tingkat I (III/d)', '2023-09-11 02:53:01'),
(13, 'Pembina (IV/a)', '2023-09-11 02:53:28'),
(14, 'Pembina Tingkat I (IV/b)', '2023-09-11 02:53:49'),
(15, 'Pembina Utama Muda (IV/c)', '2023-09-11 02:54:04'),
(16, 'Pembina Utama Madya (IV/d)', '2023-09-11 02:54:19'),
(17, 'Pembina Utama (IV/e)', '2023-09-11 02:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` bigint(18) NOT NULL,
  `id_data_pribadi` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `status` enum('Pensiun','Pegawai_Aktif','Mutasi') DEFAULT NULL,
  `npwp` bigint(16) NOT NULL,
  `nama_golongan` varchar(50) DEFAULT NULL,
  `tmt_golongan` date NOT NULL,
  `nomor_sk_golongan` varchar(50) DEFAULT NULL,
  `sk_pangkat` text DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `nomor_sk_jabatan` varchar(50) DEFAULT NULL,
  `sk_jabatan` text DEFAULT NULL,
  `tmt_jabatan` date NOT NULL,
  `penempatan` varchar(50) DEFAULT NULL,
  `masa_kerja_tahun` varchar(10) NOT NULL,
  `masa_kerja_bulan` varchar(10) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `id_data_pribadi`, `id_bidang`, `id_golongan`, `status`, `npwp`, `nama_golongan`, `tmt_golongan`, `nomor_sk_golongan`, `sk_pangkat`, `jabatan`, `nomor_sk_jabatan`, `sk_jabatan`, `tmt_jabatan`, `penempatan`, `masa_kerja_tahun`, `masa_kerja_bulan`, `updated`) VALUES
(200201012024010100, 81, 4, 9, 'Pegawai_Aktif', 2002010120240101, 'Penata Muda (III/a)', '2023-12-12', 'sss/ccc', 'SK pangkat_terakhir.pdf', 'Pranata Keuangan', 'aa/moqwe', 'SK jabatan.pdf', '2023-12-12', 'Sub Bagian Keuangan dan Aset', '12', '05', '2023-11-20 01:31:13'),
(200201012025010100, 82, 6, 9, 'Pegawai_Aktif', 2002010120250101, 'Penata Muda (III/a)', '2023-12-12', 'aa/aaa', 'SK pangkat_terakhir.pdf', 'Pranata Humas', 'AA/AAA', 'SK jabatan.pdf', '2023-12-12', 'Bidang Pengelolaan Komunikasi Publik', '12', '05', '2023-11-20 03:35:14'),
(202201032002020100, 75, 4, 9, 'Pegawai_Aktif', 123456789123456, 'Penata Muda (III/a)', '2027-01-12', '22/sss/v/ad', 'pergub Jaldis.pdf', 'Pranata Keuangan', '1222/22aa/121', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2024-12-12', 'Bidang Pengelolaan Komunikasi Publik', '12', '10', '2023-11-22 01:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_diklat`
--

CREATE TABLE `riwayat_diklat` (
  `id_diklat` int(11) NOT NULL,
  `nip` bigint(18) NOT NULL,
  `jenis_diklat` enum('Jabatan','Teknis') NOT NULL,
  `nama_diklat` varchar(50) NOT NULL,
  `tahun_diklat` year(4) NOT NULL,
  `jmlh_jam` varchar(10) NOT NULL,
  `dokumen_diklat` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_diklat`
--

INSERT INTO `riwayat_diklat` (`id_diklat`, `nip`, `jenis_diklat`, `nama_diklat`, `tahun_diklat`, `jmlh_jam`, `dokumen_diklat`, `updated`) VALUES
(142, 202201032002020100, 'Teknis', 'PIM IV', '2020', '12', 'SOAL UTS TBO.pdf', '2023-11-15 06:38:37'),
(143, 202201032002020100, 'Jabatan', 'PIM I', '2020', '12', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-15 06:38:37'),
(144, 202201032002020100, 'Jabatan', 'PIM IV', '2015', '12', '203020503041.pdf', '2023-11-15 06:42:33'),
(153, 200201012024010100, 'Teknis', 'Prajabatan', '2022', '12', 'pergub Jaldis.pdf', '2023-11-20 01:30:16'),
(154, 200201012024010100, 'Jabatan', 'PIM', '2023', '12', 'Perpres Nomor 33 Tahun 2020 - Lampiran I.pdf', '2023-11-20 01:30:16'),
(155, 200201012025010100, 'Teknis', 'Prajabatan', '2022', '123', 'SK pns.pdf', '2023-11-20 03:29:52'),
(156, 200201012025010100, 'Jabatan', 'PIM III', '2022', '12', 'SK jabatan.pdf', '2023-11-20 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_mutasi`
--

CREATE TABLE `riwayat_mutasi` (
  `no_mtsi` int(11) NOT NULL,
  `nip` bigint(18) NOT NULL,
  `catatan_mutasi` text NOT NULL,
  `nomor_sk` varchar(50) DEFAULT NULL,
  `tmt_mutasi` date DEFAULT NULL,
  `dokumen_mutasi` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_mutasi`
--

INSERT INTO `riwayat_mutasi` (`no_mtsi`, `nip`, `catatan_mutasi`, `nomor_sk`, `tmt_mutasi`, `dokumen_mutasi`, `updated`) VALUES
(118, 202201032002020100, 'Pranata Humas Bidang Pengelolaan Komunikasi Publik Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', 'aa/fff', '2023-01-12', '203020503041_Dina Meiliana_UTS TBO.pdf', '2023-11-15 06:38:37'),
(119, 202201032002020100, 'Pranata Humas Bidang TIK', 'aa/2020', '2021-12-12', 'Tampilkan PDF.pdf', '2023-11-15 06:38:37'),
(134, 202201032002020100, 'Pranata Humas Andaa Sub Bagian Keuangan dan Aset Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', 'aa/fff', NULL, 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-19 21:16:40'),
(135, 202201032002020100, 'Pranata Anddd  Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', 'aaa/ccc/1323', NULL, '203020503041_Dina Meiliana_UTS TBO.pdf', '2023-11-19 21:20:12'),
(136, 202201032002020100, 'Pranata Anddd  Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', 'aaa/ccc/1323', '2019-12-12', '203020503041_Dina Meiliana_UTS TBO.pdf', '2023-11-19 21:20:35'),
(137, 202201032002020100, 'Pranata Anddd  Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', 'aaa/ccc/1323', '2019-12-12', '203020503041_Dina Meiliana_UTS TBO.pdf', '2023-11-19 21:20:54'),
(138, 202201032002020100, 'Pranata Keuangan  Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', '1222/22aa/121', NULL, 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-20 00:15:15'),
(139, 202201032002020100, 'Pranata Keuangan  Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', '1222/22aa/121', NULL, 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-20 00:15:53'),
(140, 202201032002020100, 'Pranata Keuangan  Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', '1222/22aa/121', '2024-12-12', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-20 00:16:13'),
(141, 200201012024010100, 'Pranata Keuangan Sub Bagian Keuangan dan Aset Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', 'aa/moqwe', '2023-12-12', 'SK jabatan.pdf', '2023-11-20 01:30:16'),
(142, 200201012025010100, 'Pranata Humas Bidang Pengelolaan Komunikasi Publik Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah', 'AA/AAA', '2023-12-12', 'SK jabatan.pdf', '2023-11-20 03:29:52'),
(143, 200201012025010100, 'Pranata Humas Bidang Sekretariat Dinas Komunikasi, Informatika, Persandian, dan Statistik Provinsi Kalimantan Tengah', '1221/aaa', '2023-12-12', 'SK pangkat_terakhir.pdf', '2023-11-20 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pangkat`
--

CREATE TABLE `riwayat_pangkat` (
  `id_sk` int(11) NOT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `jenis_sk` enum('cpns','pns','pangkat') DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `nomor_sk` varchar(50) DEFAULT NULL,
  `tmt_sk` date DEFAULT NULL,
  `dokumen_sk` text DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pangkat`
--

INSERT INTO `riwayat_pangkat` (`id_sk`, `nip`, `jenis_sk`, `keterangan`, `nomor_sk`, `tmt_sk`, `dokumen_sk`, `updated`) VALUES
(40, 202201032002020100, 'cpns', 'SK CPNS', 'aa/2020', '2020-12-12', 'Tampilkan PDF.pdf', '2023-11-15 06:38:37'),
(41, 202201032002020100, 'pns', 'SK PNS', 'aa/2020', '2022-12-12', 'Tampilkan PDF.pdf', '2023-11-15 06:38:37'),
(42, 202201032002020100, 'pangkat', 'Penata Muda (III/a)', 'aaaa', '2022-12-12', '203020503041_Bukti Pembayaran I.pdf', '2023-11-15 06:41:25'),
(63, 202201032002020100, 'pangkat', 'Juru Muda (I/a)', '22/sss/v', '2024-01-12', 'Perpres Nomor 33 Tahun 2020 - Lampiran I.pdf', '2023-11-19 21:15:44'),
(64, 202201032002020100, 'pangkat', 'Pengatur Muda Tingkat I (II/b)', '22/sss/v', '2024-01-12', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-19 21:40:24'),
(65, 202201032002020100, 'pangkat', 'Pengatur Muda Tingkat I (II/b)', '22/sss/v', '2024-01-12', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-19 21:40:42'),
(66, 202201032002020100, 'pangkat', '', '22/sss/v/ads', '2024-01-12', 'Kepmen Nomor 656 Tentang Nomenklatur Jabatan Pelaksana.pdf', '2023-11-19 21:41:10'),
(67, 202201032002020100, 'pangkat', 'Penata (III/c)', '2025-01-12', '0000-00-00', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-19 21:57:00'),
(68, 202201032002020100, 'cpns', 'Penata (III/c)', '2025-01-12', '0000-00-00', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-19 21:57:55'),
(69, 202201032002020100, 'pangkat', 'Penata (III/c)', '2025-01-12', '0000-00-00', 'Perpres Nomor 53 Tahun 2023 - Lampiran I.pdf', '2023-11-19 21:58:09'),
(70, 202201032002020100, 'pangkat', 'Penata Tingkat I (III/d)', '2026-01-12', '0000-00-00', 'Kepmen Nomor 656 Tentang Nomenklatur Jabatan Pelaksana.pdf', '2023-11-19 22:03:10'),
(71, 202201032002020100, 'pangkat', 'Pembina Tingkat I (IV/b)', '2027-01-12', '0000-00-00', 'pergub Jaldis.pdf', '2023-11-20 00:17:41'),
(73, 200201012024010100, 'pangkat', 'Penata Muda (III/a)', 'sss/ccc', '2023-12-12', 'SK pangkat_terakhir.pdf', '2023-11-20 01:30:16'),
(74, 200201012024010100, 'cpns', 'SK CPNS', 'aacc/vv', '2020-12-12', 'SK cpns.pdf', '2023-11-20 01:30:16'),
(75, 200201012024010100, 'pns', 'SK PNS', 'cccc/aaa', '2022-12-12', 'SK cpns.pdf', '2023-11-20 01:30:16'),
(76, 200201012025010100, 'pangkat', 'Penata Muda (III/a)', 'aa/aaa', '2023-12-12', 'SK pangkat_terakhir.pdf', '2023-11-20 03:29:52'),
(77, 200201012025010100, 'cpns', 'SK CPNS', '1221/aaa', '2022-12-12', 'SK cpns.pdf', '2023-11-20 03:29:52'),
(78, 200201012025010100, 'pns', 'SK PNS', 'aa/ccc', '2023-12-12', 'SK pns.pdf', '2023-11-20 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `no_pnd` int(11) NOT NULL,
  `nip` bigint(18) NOT NULL,
  `strata` enum('SMA','SMK','S1','S2','S3') NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `konsentrasi` varchar(50) NOT NULL,
  `nama_kampus` varchar(50) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `ijazah` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`no_pnd`, `nip`, `strata`, `jurusan`, `konsentrasi`, `nama_kampus`, `tahun_lulus`, `ijazah`, `updated`) VALUES
(107, 202201032002020100, 'SMA', 'IPA', '-', 'SMAN 1 PALANGKA RAYA', '2020', 'SKRIPSI November 2023.pdf', '2023-11-15 06:38:37'),
(108, 202201032002020100, 'S1', 'KIMIA', 'KIMIA MURNI', 'UPR', '2022', 'Tampilkan PDF.pdf', '2023-11-15 06:38:37'),
(117, 200201012024010100, 'SMA', 'MIPA', '-', 'SMAN 1 PALANGKARAYA ', '2020', '203020503041_Dina Meiliana_UTS TBO.pdf', '2023-11-20 01:30:16'),
(118, 200201012024010100, 'S1', 'TEKNIK INFORMATIKA', 'TEKNIK INFORMATIKA', 'UNIVERSITAS BRAWIJAYA', '2022', 'Perpres Nomor 33 Tahun 2020 - Lampiran I.pdf', '2023-11-20 01:30:16'),
(119, 200201012025010100, 'SMA', 'MIPA', '-', 'SMAN 1 KUALA KURUN', '2020', 'Tampilkan PDF.pdf', '2023-11-20 03:29:52'),
(120, 200201012025010100, 'S1', 'TEKNIK INFORMATIKA', 'TEKNIK INFORMATIKA', 'UNIVERSITAS PALANGKA RAYA', '2024', 'Tampilkan PDF.pdf', '2023-11-20 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` int(5) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `pass`, `level`, `reset_token`, `updated`) VALUES
(1, 'Dina Meiliana', 'dinameiliana452@gmail.com', 'dinana12', '827ccb0eea8a706c4c34a16891f84e7b', 1, '5UMM4', '2023-09-27 11:15:28'),
(2, 'Astrid', 'dinafauzi123@gmail.com', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 2, '', '2023-10-01 03:52:52'),
(4, 'user', 'a@gmail.com', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 3, NULL, '2023-11-15 03:35:54'),
(8, 'Inda', 'indaa@gmail.com', 'indaa', 'inda123', 2, ' ', '2023-11-20 03:39:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bidang`
--
ALTER TABLE `data_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  ADD PRIMARY KEY (`id_data_pribadi`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`,`tmt_golongan`),
  ADD KEY `id_data_pribadi` (`id_data_pribadi`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indexes for table `riwayat_diklat`
--
ALTER TABLE `riwayat_diklat`
  ADD PRIMARY KEY (`id_diklat`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_mutasi`
--
ALTER TABLE `riwayat_mutasi`
  ADD PRIMARY KEY (`no_mtsi`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `data_sk_ibfk_1` (`nip`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`no_pnd`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bidang`
--
ALTER TABLE `data_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  MODIFY `id_data_pribadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `riwayat_diklat`
--
ALTER TABLE `riwayat_diklat`
  MODIFY `id_diklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `riwayat_mutasi`
--
ALTER TABLE `riwayat_mutasi`
  MODIFY `no_mtsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `no_pnd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_data_pribadi`) REFERENCES `data_pribadi` (`id_data_pribadi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `data_bidang` (`id_bidang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_diklat`
--
ALTER TABLE `riwayat_diklat`
  ADD CONSTRAINT `riwayat_diklat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_mutasi`
--
ALTER TABLE `riwayat_mutasi`
  ADD CONSTRAINT `riwayat_mutasi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  ADD CONSTRAINT `riwayat_pangkat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
