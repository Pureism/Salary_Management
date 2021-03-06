-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2021 pada 07.21
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(7, 'Staff Marketing', '3100000', '400000', '800000'),
(8, 'Staff Planning', '3100000', '700000', '300000'),
(9, 'Staff Konsumsi', '4000000', '800000', '800000'),
(10, 'Staff Data', '3200000', '400000', '800000'),
(11, 'Staff Promosi', '4300000', '400000', '300000'),
(13, 'Staff Kebersihan', '500000', '200000', '200000'),
(14, 'Admin', '12000000', '1500000', '400000'),
(15, 'Staff Tata Usaha', '2500000', '500000', '300000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `izin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`, `izin`) VALUES
(5, 'November2021', '112134', 'Ammar Nabil', 'Laki-laki', 'Staff Data', 15, 10, 3, '5'),
(6, 'December2021', '12345', 'Annisa Kunarji Sari', 'Perempuan', 'Staff Data', 23, 2, 1, '1'),
(7, 'December2021', '112134', 'Ammar Nabil', 'Laki-laki', 'Staff Data', 28, 1, 1, '0'),
(8, 'December2021', '112131', 'Rafli Hillan Y', 'Laki-laki', 'Staff Marketing', 29, 0, 0, '0'),
(9, 'December2021', '131313', 'Adam Rizky', 'Laki-laki', 'Admin', 21, 1, 1, '1'),
(10, 'December2021', '43245342', 'Annisa Kunarji Sari', 'Perempuan', 'Staff Data', 29, 0, 0, '0'),
(11, 'December2021', '3231', 'Fanya Kartika', 'Perempuan', 'Admin', 30, 0, 0, '0'),
(12, 'December2021', '4611419066', 'Pandu A', 'Laki-laki', 'Staff Promosi', 15, 12, 0, '0'),
(13, 'December2021', '4611419069', 'Sandi Loka', 'Laki-laki', 'Staff Planning', 1, 1, 0, '0'),
(14, 'January2017', '131313', 'Adam Rizky', 'Laki-laki', 'Admin', 30, 0, 1, '0'),
(15, 'January2017', '112134', 'Ammar Nabil', 'Laki-laki', 'Staff Data', 31, 0, 0, '0'),
(16, 'January2017', '43245342', 'Annisa Kunarji Sari', 'Perempuan', 'Staff Data', 25, 4, 2, '0'),
(17, 'January2017', '4611419069', 'Kartika Fanya', 'Perempuan', 'Staff Planning', 29, 0, 0, '2'),
(18, 'January2017', '4611419066', 'Rafli Hillan', 'Laki-laki', 'Staff Promosi', 31, 0, 0, '0'),
(19, 'February2018', '131313', 'Adam Rizky', 'Laki-laki', 'Admin', 25, 1, 1, '1'),
(20, 'February2018', '46114190000', 'Alexander Junaidi', 'Laki-laki', 'Staff Tata Usaha', 25, 2, 0, '1'),
(21, 'February2018', '112134', 'Ammar Nabil', 'Laki-laki', 'Staff Data', 27, 0, 0, '1'),
(22, 'February2018', '43245342', 'Annisa Kunarji Sari', 'Perempuan', 'Staff Data', 26, 0, 1, '1'),
(23, 'February2018', '4611419069', 'Kartika Fanya', 'Perempuan', 'Staff Planning', 28, 0, 0, '0'),
(24, 'February2018', '4611419066', 'Rafli Hillan', 'Laki-laki', 'Staff Promosi', 25, 1, 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(14, '112134', 'Ammar Nabil', 'ammar', '25f9e794323b453885f5181f1b624d0b', 'Laki-laki', 'Staff Data', '2021-12-01', 'Pegawai Kontrak', 'nabil.png', 2),
(17, '43245342', 'Annisa Kunarji Sari', 'annisa', 'c9d2cce909ea37234be8af1a1f958805', 'Perempuan', 'Staff Data', '2021-12-14', 'Magang', 'ava5.png', 1),
(19, '4611419069', 'Kartika Fanya', 'fanyaa', 'a3ac010b10d8f5cbbfabc3df27fc363d', 'Perempuan', 'Staff Planning', '2021-12-11', 'Magang', 'ava4.png', 2),
(20, '4611419066', 'Rafli Hillan', 'rafli', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'Staff Promosi', '2021-12-02', 'Pegawai Tetap', 'ava3.png', 1),
(21, '131313', 'Adam Rizky', 'adam', '25f9e794323b453885f5181f1b624d0b', 'Laki-laki', 'Admin', '2021-12-10', 'Pegawai Tetap', 'ava2.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(1, 'Alpha', 100000),
(9, 'Pensiun', 200000),
(10, 'BPJS', 75000),
(11, 'Asuransi', 100000),
(13, 'Kas', 25000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
