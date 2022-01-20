-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 02:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_pengguna`, `username`, `password`) VALUES
(12, 22, 'admin', 'admin');

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
(4, 'Kegiatan_Asu2.png', 'Kegiatan Asu', '2021-08-27', 'Aktif'),
(5, 'Kegiatan_Asu2.png', 'Kegiatan Asu', '2021-08-27', 'Aktif'),
(6, 'Kegiatan_Asu2.png', 'Kegiatan Asu', '2021-08-27', 'Aktif'),
(7, 'Kegiatan_Asu2.png', 'Kegiatan Asu', '2021-08-27', 'Nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(225) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_author` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `isi`, `foto`, `judul`, `tanggal`, `id_author`, `status`) VALUES
(5, '<p>\r\n\r\nOleh karena itu, cara teraman untuk memeriksa tipe dari suatu file adalah: dengan memeriksa <em>mime type</em>-nya. Insyaallah nanti akan kita bahas hal ini pada kesempatan yang lainnya\r\n\r\n</p>', 'How_to_Analyze_Survey_Data_with_Python_for_Beginners1.JPG', 'How to Analyze Survey Data with Python for Beginner', '2021-09-19', 'Andi', 'Aktif'),
(6, '<p>\r\n\r\nOleh karena itu, cara teraman untuk memeriksa tipe dari suatu file adalah: dengan memeriksa <em>mime type</em>-nya. Insyaallah nanti akan kita bahas hal ini pada kesempatan yang lainnya\r\n\r\n</p>', 'How_to_Analyze_Survey_Data_with_Python_for_Beginners1.JPG', 'How to Analyze Survey Data with Python for Beginner', '2021-09-19', 'Andi', 'Aktif'),
(7, '<p>\r\n\r\nOleh karena itu, cara teraman untuk memeriksa tipe dari suatu file adalah: dengan memeriksa <em>mime type</em>-nya. Insyaallah nanti akan kita bahas hal ini pada kesempatan yang lainnya\r\n\r\n</p>', 'How_to_Analyze_Survey_Data_with_Python_for_Beginners1.JPG', 'How to Analyze Survey Data with Python for Beginner', '2021-09-19', 'Andi', 'Nonaktif');

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
  `icon` varchar(225) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `keterangan`, `icon`, `foto`) VALUES
(1, '24 Hours Suport', 'Assumenda integer, accumsanvitae felis. Sodales sunt est', 'fa-user', '24_Hours_Suport.jpg');

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
(5, 2, '2.PNG', 'ZX', 'asdasd', 'Red', 4, 'Manual', '', '0000-00-00', 'tersedia', 111111, NULL, 2222222),
(7, 4, '4.png', 'ZX', 'asdasd', 'Red', 4, 'Manual', '', '2021-08-05', 'tersedia', 2222222, 0, 2222222),
(9, 24, '16.jpg', 'werwer', 'erwerwe', 'werwerwe', 4, 'Manual', 'dwewed', '2021-10-17', 'tersedia', 100000, 0, 200000);

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
(11, 'PEBRI ANDHI HERRY PRATAMA', '1231111', 'nyahuidjabar@gmail.com', 'cust', 'cust', '456456', 'Laki-laki', '2021-08-06', 'Jlasans', '5564564.JPG', 0, NULL, 2, 'Tewah, Kalimantan Te', '2021-08-18'),
(12, '123123123', '123123123', 'nyahuidjabar@gmail.com', 'admin', '123', '456456', 'Laki-Laki', '2021-09-25', 'asdasdasd', '', 0, NULL, 2, 'Tewah, Kalimantan Te', '2021-09-29'),
(13, 'PEBRI ANDHI HERRY PRATAMA', '4444', 'nyahuidjabar@gmail.com', 'x', 'admin', '456456', 'Laki-Laki', '2021-09-25', 'asdasdasd', '', 0, NULL, 2, 'Tewah, Kalimantan Te', '2021-09-21'),
(16, 'Andi Nyahui Djabar', '62100311029800022', 'harajuku777.ac@gmail.com', 'partner', 'partner', '+6281256733006', 'Perempuan', '2021-10-24', 'Palangkaraya', '62100311029800022.jpg', 0, NULL, 4, 'Tewah, Kalimantan Te', '2021-09-22'),
(19, 'asdasdasd', '123123123123132', 'asdasdasdasd', 'partner', 'partner', 'asdasdasd', 'Laki-laki', '2021-10-17', '1232', '', 0, NULL, 2, 'adasdas', '2021-10-26'),
(20, '123', 'hhhh', 'asdasdasdasd', 'partner', 'partner', 'asdasdasd', 'Laki-laki', '2021-10-17', 'asdasd', 'hhhh.jpg', 0, NULL, 2, '123', '2021-10-27'),
(22, 'asdasdasd', '1231231231231324444', 'asdasdasdasd', 'admin', 'admin', 'asdasdasd', 'Laki-laki', '2021-10-17', '1232', '1231231231231324444.jpg', 33333, '12312333', 5, 'adasdas', '2021-10-26'),
(24, 'asdasdasd', '123123122', 'harajuku777.ac@gmail.com', 'xxx', 'xxx', '123', 'Laki-laki', '2021-11-01', '1232', '', 0, NULL, 4, 'adasdas', '2021-09-26');

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
(1, '::1', 'Chrome', 'Windows 10', '1633235420', '2021-10-03'),
(2, '::1', 'Chrome', 'Windows 10', '1634481525', '2021-10-17'),
(3, '::1', 'Chrome', 'Windows 10', '1634565203', '2021-10-18'),
(4, '::1', 'Chrome', 'Windows 10', '1635838633', '2021-11-02'),
(5, '::1', 'Chrome', 'Windows 10', '1635904149', '2021-11-03'),
(6, '::1', 'Chrome', 'Windows 10', '1635999497', '2021-11-04'),
(7, '::1', 'Chrome', 'Windows 10', '1636085034', '2021-11-05'),
(8, '::1', 'Chrome', 'Windows 10', '1636820472', '2021-11-13'),
(9, '::1', 'Chrome', 'Windows 10', '1636894679', '2021-11-14'),
(10, '::1', 'Chrome', 'Windows 10', '1637039091', '2021-11-16'),
(11, '::1', 'Chrome', 'Windows 10', '1637391650', '2021-11-20'),
(12, '::1', 'Chrome', 'Windows 10', '1638798573', '2021-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `pesan`, `tanggal`, `status`) VALUES
(1, 'andi', 'harajuku777.ac@gmail.com', 'asdasdasd', '2021-10-18', 'read');

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
(1, 'Mari Bersaudara', 'asdasd', 'asdasd', '08123217662', '<p>asdasdasd</p>', '11.png', 'asdasd', '<p>\r\n\r\n</p><div><div>dawdqdqwdqwdqwd</div></div><p></p>', '<p>id_profil<small>dasdasdad</small><br></p>');

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
(41, 9, 24, 'JL TIngang 20', 'selesai', '', '2021-11-04 00:00:00', '2021-11-01', '2021-11-05', 100000, 100000, 800000),
(42, 9, 24, 'JL TIngang 20', 'pengajuan', 'ambil', '2021-11-04 00:00:00', '2021-11-01', '2021-11-05', 0, 0, 600000),
(43, 9, 24, 'JL TIngang 20', 'pengajuan', 'ambil', '2021-11-10 00:00:00', '2021-11-10', '2021-11-12', 100000, 400000, 300000),
(44, 7, 24, 'JL TIngang 20', 'pengajuan', 'ambil', '2021-11-10 00:00:00', '2021-11-10', '2021-11-12', 100000, 4444444, 4344444),
(45, 9, 24, 'JL TIngang 20', 'pengajuan', 'antar', '2021-11-10 00:00:00', '2021-11-10', '2021-11-12', 100000, 400000, 300000);

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
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
