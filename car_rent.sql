-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 05:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_pengguna`) VALUES
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `akses`) VALUES
(2, 'Admin'),
(3, 'Customer'),
(4, 'Partner'),
(5, 'Karyawan'),
(6, 'Pengajuan Partner');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `thumbnail` varchar(225) NOT NULL,
  `nama_album` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `thumbnail`, `nama_album`, `tanggal`, `status`) VALUES
(4, 'Kegiatan_Asu2.png', 'Kegiatan Asu', '2021-08-27', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(225) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_author` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `isi`, `foto`, `judul`, `tanggal`, `id_author`, `status`) VALUES
(5, '<p>asdasdasdasd</p>', 'How_to_Analyze_Survey_Data_with_Python_for_Beginners1.JPG', 'How to Analyze Survey Data with Python for Beginne', '2021-09-19', 'Andi', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `berkas` varchar(225) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `judul`, `berkas`, `id_pemilik`, `daftar`) VALUES
(10, 'aasd', 'SI_Alumni_FT_UPR1.pdf', 4, '2021-08-03'),
(13, 'How to Analyze Survey Data with Python for Beginne', 'Wisuda3.pdf', 6, '2021-08-03'),
(17, 'aasd', '6210031102980001_kartuAkun_(1)2.pdf', 7, '2021-08-05'),
(18, 'sdfsdf', '6210031102980001_kartuDaftar.pdf', 4, '2021-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `daftar` date NOT NULL,
  `id_album` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto`, `daftar`, `id_album`, `judul`) VALUES
(3, 'How_to_Analyze_Survey_Data_with_Python_for_Beginners.jpg', '2021-08-27', 4, 'How to Analyze Survey Data with Python for Beginne');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `keterangan` tinytext NOT NULL,
  `icon` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `keterangan`, `icon`) VALUES
(1, '24 Hours Suport', 'Assumenda integer, accumsanvitae felis. Sodales sunt est', 'fa-user'),
(2, 'Free Registration', 'Free Registration', 'fa-phone');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `thumbnail` varchar(225) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `jenis` varchar(40) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `transmisi` varchar(10) NOT NULL,
  `info` text NOT NULL,
  `daftar` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `sewa` int(11) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_pemilik`, `thumbnail`, `tipe`, `jenis`, `warna`, `jumlah_kursi`, `transmisi`, `info`, `daftar`, `status`, `sewa`, `diskon`, `tarif`) VALUES
(4, 2, '2.jpg', 'ZX', 'asdasd', 'Red', 4, 'Manual', '', '0000-00-00', 'tersedia', 111111, NULL, 2222222),
(5, 2, '2.PNG', 'ZX', 'asdasd', 'Red', 4, 'Manual', '', '0000-00-00', 'tersedia', 111111, NULL, 2222222),
(7, 4, '4.png', 'ZX', 'asdasd', 'Red', 4, 'Manual', '', '2021-08-05', 'tersedia', 2222222, 0, 2222222);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `daftar` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `salary` int(11) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `id_akses` int(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `nik`, `email`, `username`, `password`, `no_hp`, `jenis_kelamin`, `daftar`, `alamat`, `foto`, `salary`, `jabatan`, `id_akses`, `tempat_lahir`, `tanggal_lahir`) VALUES
(7, 'Andi', '6210031102980001222', 'nyahuidjabar@gmail.com', 'admin', 'admin', '456456', 'Laki-laki', '2021-08-05', 'Jlasans', '62100311029800012221.jpg', 100000, 'Kuli', 5, 'X', '1970-01-01'),
(11, 'PEBRI ANDHI HERRY PRATAMA', '1231111', 'nyahuidjabar@gmail.com', 'cust', 'cust', '456456', 'Laki-laki', '2021-08-06', 'Jlasans', '5564564.JPG', 0, NULL, 2, 'Tewah, Kalimantan Te', '2021-08-18'),
(12, '123123123', '123123123', 'nyahuidjabar@gmail.com', 'admin', '123', '456456', 'Laki-Laki', '2021-09-25', 'asdasdasd', '', 0, NULL, 2, 'Tewah, Kalimantan Te', '2021-09-29'),
(13, 'PEBRI ANDHI HERRY PRATAMA', '4444', 'nyahuidjabar@gmail.com', 'x', 'admin', '456456', 'Laki-Laki', '2021-09-25', 'asdasdasd', '', 0, NULL, 2, 'Tewah, Kalimantan Te', '2021-09-21'),
(16, 'Andi Nyahui Djabar', '62100311029800022', 'harajuku777.ac@gmail.com', 'andi', '1111', '+6281256733006', 'Laki-Laki', '2021-10-03', 'Palangkaraya', '', 0, NULL, 4, 'Tewah, Kalimantan Te', '2021-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `os` varchar(30) NOT NULL,
  `online` varchar(225) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `ip`, `browser`, `os`, `online`, `tanggal`) VALUES
(1, '::1', 'Chrome', 'Windows 10', '1633235420', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nama_rental` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `sejarah` text NOT NULL,
  `logo` varchar(225) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `misi` text NOT NULL,
  `visi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_rental`, `alamat`, `email`, `no_hp`, `sejarah`, `logo`, `lokasi`, `misi`, `visi`) VALUES
(1, 'asdasda', 'asdasd', 'asdasd', '08123217662', '<p>asdasdasd</p>', '1.png', 'asdasd', '<p>\r\n\r\n</p><div><div>dawdqdqwdqwdqwd</div></div><p></p>', '<p>id_profil<small>dasdasdad</small><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `bintang` int(11) NOT NULL,
  `isi` tinytext NOT NULL,
  `id_mobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `opsi` varchar(20) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `dp` int(2) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_mobil`, `id_penyewa`, `alamat`, `status`, `opsi`, `tanggal_transaksi`, `tanggal_pinjam`, `tanggal_kembali`, `dp`, `denda`, `bayar`) VALUES
(1, 7, 11, 'Jlasans', 'selesai', 'ambil', '2021-08-10 00:00:00', '2021-08-08', '2021-10-03', 100000, NULL, 2122222),
(2, 7, 11, 'Jlasans', 'disewa', 'ambil', '2021-08-21 00:00:00', '2021-08-01', '2021-08-02', 100000, NULL, 2122222),
(3, 7, 11, 'Jlasans', 'disewa', 'ambil', '2021-08-21 00:00:00', '2021-08-01', '2021-08-02', 100000, NULL, 2122222),
(4, 7, 11, 'Jlasans', 'disewa', 'ambil', '2021-08-21 00:00:00', '2021-08-01', '2021-08-02', 0, NULL, 2222222),
(5, 7, 11, 'Jlasans', 'disewa', 'ambil', '2021-08-21 00:00:00', '2021-08-01', '2021-08-03', 0, NULL, 4444444),
(11, 7, 7, 'JL xaxaxxas', 'disewa', 'antar', '2021-09-26 00:00:00', '2021-09-27', '2021-09-28', 2222222, 4444444, 4444444),
(12, 7, 7, 'JL xaxaxxas', 'disewa', 'ambil', '2021-10-03 00:00:00', '2021-09-27', '2021-09-28', 2222222, 4444444, 4444444);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_penyewa` (`id_penyewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_review`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_penyewa`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
