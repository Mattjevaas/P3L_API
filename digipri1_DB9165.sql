-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2020 at 11:44 AM
-- Server version: 5.7.29-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digipri1_DB9165`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `idCustomer_Member` int(11) NOT NULL,
  `namaCustomer` varchar(45) DEFAULT NULL,
  `tglLahir` date NOT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `noTelp` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`idCustomer_Member`, `namaCustomer`, `tglLahir`, `alamat`, `noTelp`, `email`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'Paijo', '1990-10-01', 'jl. Sana Sini', '0813450192', 'paijo@gmail.com', '2020-03-03 09:29:50', '2020-03-20 14:41:45', '2020-03-20 14:41:45', 2),
(2, 'Agan', '1999-08-06', 'jl. sana situ', '0822123300192', 'hapie2@hapie2.com', '2020-03-03 09:29:50', '2020-03-20 14:45:44', NULL, 2),
(3, 'Johnny', '2001-10-28', 'jl. Amerika Utara', '0819276157', 'johny@gmail.com', '2020-03-03 09:30:56', NULL, NULL, 2),
(4, 'Greg', '1998-04-10', 'jl. Aspal Miring', '08198267387', 'greg@gmail.com', '2020-03-03 09:30:56', NULL, NULL, 2),
(5, 'Dony', '1997-01-23', 'jl. Atma Djaja', '0816728901', 'dony@gmail.com', '2020-03-03 09:30:56', NULL, NULL, 2),
(6, 'Gaga', '2020-03-10', 'jl. sana sini', '09123133311', 'hapie1@hapie1.com', '2020-03-20 14:44:26', '2020-03-20 14:44:26', NULL, 2),
(7, 'hapieman', '2000-10-11', 'jl. hapie', '0891234231', 'asd@asd.com', '2020-03-29 18:42:45', '2020-03-30 14:59:11', '2020-03-30 14:59:11', 2),
(8, 'John', '2000-10-11', 'jl. Kesana', '08231233921', 'john@john.com', '2020-03-29 18:50:42', '2020-03-29 18:50:42', NULL, 2),
(9, 'Ace', '2000-10-11', 'jl. simians', '08923112233', 'ccc@ccc.com', '2020-03-29 18:53:46', '2020-03-29 18:53:46', NULL, 2),
(10, 'Assa', '2000-10-11', 'jl. Kantau', '08922333244', 'ass@ass.com', '2020-03-30 07:14:24', '2020-03-30 15:08:51', '2020-03-30 15:08:51', 2),
(11, 'Halo', '2000-10-11', 'jl. Halogan', '08923312332', 'gan@gan.com', '2020-03-30 07:22:59', '2020-03-30 15:08:21', '2020-03-30 15:08:21', 2),
(12, 'Bee', '2000-10-11', 'jl. Kronggahan', '08923231132', 'bee@bee.com', '2020-03-30 07:49:42', '2020-03-30 07:49:42', NULL, 2),
(13, 'Bee', '2000-10-11', 'jl. living', '089232323232', 'bee@bee.com', '2020-03-30 07:50:41', '2020-03-30 09:05:36', '2020-03-30 09:05:36', 2),
(14, 'Wiku', '2000-10-11', 'jl. wiki wiki', '08232322922', 'wiku@wiku.com', '2020-03-30 07:52:45', '2020-03-30 07:52:45', NULL, 2),
(15, 'Kay', '2000-10-11', 'jl. asdads', '08923212', 'kay@kay.com', '2020-03-30 07:59:17', '2020-03-30 07:59:17', NULL, 2),
(16, 'Test', '2000-10-11', 'jl. test', '08323293833', 'test@test.com', '2020-03-30 08:54:09', '2020-03-30 09:15:51', '2020-03-30 09:15:51', 2),
(17, 'Udin', '2000-10-11', 'jl. kedondong', '08956756443', 'udin@udin.com', '2020-03-30 15:00:57', '2020-03-30 15:01:24', '2020-03-30 15:01:24', 2),
(18, 'Koko', '2000-10-11', 'jl. cocoa', '08923367002', 'koko@koko.com', '2020-03-30 15:18:24', '2020-03-30 15:20:11', '2020-03-30 15:20:11', 2),
(19, 'Hono', '2000-10-11', 'jl. Texas', '0889678464', 'hon@hon.com', '2020-03-30 15:36:47', '2020-03-31 03:36:40', '2020-03-31 03:36:40', 2),
(20, 'Good', '2000-10-11', 'jl. bag us', '089232123322', 'goo@goo.com', '2020-03-31 04:36:40', '2020-03-31 04:38:51', '2020-03-31 04:38:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `harga_layanan`
--

CREATE TABLE `harga_layanan` (
  `idHargaLayanan` int(11) NOT NULL,
  `hargaLayanan` double DEFAULT NULL,
  `idUkuranHewan` int(11) NOT NULL,
  `idJenisHewan` int(11) NOT NULL,
  `idLayanan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harga_layanan`
--

INSERT INTO `harga_layanan` (`idHargaLayanan`, `hargaLayanan`, `idUkuranHewan`, `idJenisHewan`, `idLayanan`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 80000, 3, 1, 1, '2020-03-03 09:29:50', NULL, NULL, 1),
(2, 50000, 1, 2, 2, '2020-03-03 09:29:50', NULL, NULL, 1),
(3, 100000, 4, 1, 1, '2020-03-03 09:29:50', NULL, NULL, 1),
(4, 150000, 5, 1, 4, '2020-03-03 09:29:50', NULL, NULL, 1),
(5, 80000, 4, 1, 4, '2020-03-03 09:29:50', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `idHewan` int(11) NOT NULL,
  `namaHewan` varchar(45) DEFAULT NULL,
  `tglLahir` datetime DEFAULT NULL,
  `idUkuranHewan` int(11) NOT NULL,
  `idJenisHewan` int(11) NOT NULL,
  `idCustomer_Member` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`idHewan`, `namaHewan`, `tglLahir`, `idUkuranHewan`, `idJenisHewan`, `idCustomer_Member`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'Sisi', '2018-12-16 00:00:00', 4, 1, 5, '2019-12-16 09:35:22', NULL, NULL, 3),
(2, 'Simon', '2019-08-26 00:00:00', 1, 5, 4, '2020-03-03 01:57:12', NULL, NULL, 3),
(3, 'Pako', '2019-06-10 00:00:00', 3, 2, 3, '2020-03-03 09:37:21', NULL, NULL, 3),
(4, 'Rokcy', '2019-07-30 00:00:00', 2, 4, 1, '2020-03-03 09:37:21', NULL, NULL, 2),
(5, 'Abu', '2019-12-07 00:00:00', 2, 3, 2, '2020-03-03 09:37:21', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hewan`
--

CREATE TABLE `jenis_hewan` (
  `idJenisHewan` int(11) NOT NULL,
  `jenisHewan` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_hewan`
--

INSERT INTO `jenis_hewan` (`idJenisHewan`, `jenisHewan`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'Anjing', '2020-03-03 09:27:15', NULL, NULL, 1),
(2, 'Kucing', '2020-03-03 09:27:15', NULL, NULL, 1),
(3, 'Burung', '2020-03-03 09:27:38', NULL, NULL, 1),
(4, 'Ular', '2020-03-03 09:27:38', NULL, NULL, 1),
(5, 'Hamster', '2020-03-03 09:27:38', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `idLayanan` int(11) NOT NULL,
  `namaLayanan` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`idLayanan`, `namaLayanan`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'Grooming Anjing', '2020-03-03 07:22:04', NULL, NULL, 1),
(2, 'Grooming Kucing', '2020-03-03 07:22:05', NULL, NULL, 1),
(3, 'Potong Kuku Anjing', '2020-03-03 07:22:24', NULL, NULL, 1),
(4, 'Vaksin Anjing', '2020-03-03 07:22:24', NULL, NULL, 1),
(5, 'Vaksin Kucing', '2020-03-03 07:22:24', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Pegawai`
--

CREATE TABLE `Pegawai` (
  `idPegawai` int(11) NOT NULL,
  `namaPegawai` varchar(120) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `tglLahir` datetime DEFAULT NULL,
  `noTelp` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Pegawai`
--

INSERT INTO `Pegawai` (`idPegawai`, `namaPegawai`, `alamat`, `tglLahir`, `noTelp`, `jabatan`, `email`, `password`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'Tisu', 'jl. Pegangsaan Timur', '2000-01-18 00:00:00', '0814356234', 'Admin', 'admin@admin.com', '$2y$10$X1XKMe3CDuZc5Nz5APiBOOUjw5xekHjLbUYPItQUaOwe078oZ2k76', '2020-03-03 07:27:21', NULL, NULL, 1),
(2, 'Sulaiman', 'jl. Saya Tahu', '2000-03-18 00:00:00', '08123175980', 'CS', '', '0', '2020-03-03 07:27:21', NULL, NULL, 1),
(3, 'Anton', 'jl. Kaliurang Selatan', '1999-03-02 00:00:00', '0814353234', 'CS', '', '0', '2020-03-03 07:28:56', NULL, NULL, 1),
(4, 'Saitama', 'jl. Kanan Kiri', '2020-07-20 00:00:00', '0813491823', 'Kasir', '', '0', '2020-03-03 07:28:56', NULL, NULL, 1),
(5, 'Chelsea', 'jl. Totenham Utara', '1998-08-06 00:00:00', '0813419236', 'Kasir', '', '0', '2020-03-03 07:28:56', '2020-03-20 02:32:05', '2020-03-20 02:32:05', 1),
(6, 'Paijo', 'jl. sana sini', '1999-08-06 00:00:00', '09123133311', 'Kasir', 'hapie@hapie.com', 'eyJpdiI6Ik9DTllYaHVyOXBNdGMrVmUzM09xd0E9PSIsInZhbHVlIjoiMnhMN1ZPZFdhd1lrbG13SGJkSTdvUT09IiwibWFjIjoiMGRlMDk4YTI4NjRiN2JmNzc0NjI0ZDAwN2MyMDRiZDA3YThjN2IxMTY2OWNiY2M1NmMzNDQwNDAxZGYxZGYxYiJ9', '2020-03-20 03:05:52', '2020-03-20 03:12:44', '2020-03-20 03:12:44', 1),
(7, 'saitamansari', 'jl. sana sini', '1999-08-06 00:00:00', '09123133311', 'Kasir', 'hapie1@hapie1.com', 'eyJpdiI6InJRcGJpWkpiMWJRdkVESHNUdy83Zmc9PSIsInZhbHVlIjoibTdYY1M0ZTVRMC8zSmZEL1o1dkREUT09IiwibWFjIjoiM2MyNGFmYzY1YTM3YzQ4NDAzYmE3NjQ2ZDJiMGUzYTMwOWJlZWRiZGQwZWEwZDc2ZjJhNDcxMDE0ZDU0MjlhYyJ9', '2020-03-20 03:24:21', '2020-03-20 03:32:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_barang`
--

CREATE TABLE `pengadaan_barang` (
  `idPengadaanBarang` int(11) NOT NULL,
  `namaPengadaan` varchar(45) DEFAULT NULL,
  `tglPengadaan` timestamp NULL DEFAULT NULL,
  `statusBrgDatang` varchar(45) NOT NULL,
  `statusCetak` varchar(255) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengadaan_barang`
--

INSERT INTO `pengadaan_barang` (`idPengadaanBarang`, `namaPengadaan`, `tglPengadaan`, `statusBrgDatang`, `statusCetak`, `idSupplier`, `idPegawai`, `total`) VALUES
(1, 'Restock Satu', '2020-03-03 09:39:17', 'Selesai', 'Sudah Cetak', 2, 1, 0),
(2, 'Restock Dua', '2020-03-03 09:39:17', 'Selesai', 'Sudah Cetak', 2, 1, 0),
(3, 'Restock Tiga', '2020-03-03 09:39:17', 'Selesai', 'Sudah Cetak', 3, 1, 0),
(4, 'Restock Empat', '2020-03-03 09:39:17', 'Selesai', 'Sudah Cetak', 3, 1, 0),
(5, 'Restock Lima', '2020-03-03 09:39:17', 'Selesai', 'Sudah Cetak', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(45) DEFAULT NULL,
  `satuan` varchar(45) NOT NULL,
  `jumlahProduk` int(11) DEFAULT NULL,
  `hargaJual` double DEFAULT NULL,
  `hargaBeli` double NOT NULL,
  `stokMinimal` int(11) DEFAULT NULL,
  `linkGambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `satuan`, `jumlahProduk`, `hargaJual`, `hargaBeli`, `stokMinimal`, `linkGambar`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'Wiskas', 'box', 10, 10000, 5000, 5, 'wiskas.jpg', '2020-03-03 07:23:16', NULL, NULL, 1),
(2, 'Royal Kitten', 'pack', 20, 30000, 15000, 5, 'kitten.jpg', '2020-03-03 07:23:16', NULL, NULL, 1),
(3, 'Pantin Conditioner', 'pack', 30, 50000, 25000, 5, 'pantin.jpg', '2020-03-03 07:25:12', NULL, NULL, 1),
(4, 'Vitaman Dog', 'box', 40, 70000, 35000, 5, 'vitaman.jpg', '2020-03-03 07:25:12', NULL, NULL, 1),
(5, 'Universal Kitten', 'box', 50, 90000, 45000, 5, 'universal.jpg', '2020-03-03 07:25:12', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pembelian`
--

CREATE TABLE `rincian_pembelian` (
  `idRincianPembelian` int(11) NOT NULL,
  `jumlahBeli` int(11) NOT NULL,
  `jenisPembelian` varchar(45) NOT NULL,
  `idProduk` int(11) DEFAULT NULL,
  `idHargaLayanan` int(11) DEFAULT NULL,
  `idTransaksiPembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pembelian`
--

INSERT INTO `rincian_pembelian` (`idRincianPembelian`, `jumlahBeli`, `jenisPembelian`, `idProduk`, `idHargaLayanan`, `idTransaksiPembayaran`) VALUES
(1, 12, 'Produk', 3, 1, 1),
(2, 1, 'Layanan', 1, 3, 2),
(3, 10, 'Produk', 2, 1, 3),
(4, 5, 'Produk', 5, 1, 3),
(5, 10, 'Produk', 4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pengadaan`
--

CREATE TABLE `rincian_pengadaan` (
  `idRincianPengadaan` int(11) NOT NULL,
  `jumlahBeli` int(11) DEFAULT NULL,
  `idPengadaanBarang` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengadaan`
--

INSERT INTO `rincian_pengadaan` (`idRincianPengadaan`, `jumlahBeli`, `idPengadaanBarang`, `idProduk`) VALUES
(1, 10, 1, 4),
(2, 20, 1, 2),
(3, 10, 2, 1),
(4, 5, 3, 5),
(5, 30, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int(11) NOT NULL,
  `namaSupplier` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) NOT NULL,
  `noTelp` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `namaSupplier`, `alamat`, `noTelp`, `email`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'Nico', 'jl.babarsari', '085787897689', 'nico@gmail.com', '2020-03-03 07:20:32', NULL, NULL, 1),
(2, 'Agus', 'jl.krodan', '087656789765', 'agus@gmail.com', '2020-03-03 07:20:32', NULL, NULL, 1),
(3, 'John', 'jl.maguwoharjo', '086426738943', 'john@gmail.com', '2020-03-03 07:21:09', NULL, NULL, 1),
(4, 'Siti', 'jl.jogja-solo', '086728635718', 'siti@gmail.com', '2020-03-03 07:21:09', NULL, NULL, 1),
(5, 'Neena', 'jl.hariri', '086927647829', 'neena@gmail.com', '2020-03-03 07:21:09', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembayaran`
--

CREATE TABLE `transaksi_pembayaran` (
  `idTransaksiPembayaran` int(11) NOT NULL,
  `totalBayar` double DEFAULT NULL,
  `tglTransaksi` timestamp NULL DEFAULT NULL,
  `statusLunas` varchar(45) DEFAULT NULL,
  `idPegawai` int(11) NOT NULL,
  `idHewan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_pembayaran`
--

INSERT INTO `transaksi_pembayaran` (`idTransaksiPembayaran`, `totalBayar`, `tglTransaksi`, `statusLunas`, `idPegawai`, `idHewan`) VALUES
(1, 80000, '2020-03-03 09:43:59', 'Lunas', 4, 2),
(2, 80000, '2020-03-03 09:43:59', 'Belum Lunas', 4, 4),
(3, 80000, '2020-03-03 09:43:59', 'Lunas', 5, 4),
(4, 80000, '2020-03-03 09:43:59', 'Lunas', 5, 5),
(5, 80000, '2020-03-03 09:43:59', 'Lunas', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_hewan`
--

CREATE TABLE `ukuran_hewan` (
  `idUkuranHewan` int(11) NOT NULL,
  `ukuranHewan` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ukuran_hewan`
--

INSERT INTO `ukuran_hewan` (`idUkuranHewan`, `ukuranHewan`, `created_at`, `edited_at`, `deleted_at`, `edited_by`) VALUES
(1, 'S', '2020-03-03 07:18:28', NULL, NULL, 1),
(2, 'M', '2020-03-03 07:18:28', NULL, NULL, 1),
(3, 'L', '2020-03-03 07:18:28', NULL, NULL, 1),
(4, 'XL', '2020-03-03 07:18:28', NULL, NULL, 1),
(5, 'XXL', '2020-03-03 07:18:28', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`idCustomer_Member`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `harga_layanan`
--
ALTER TABLE `harga_layanan`
  ADD PRIMARY KEY (`idHargaLayanan`),
  ADD KEY `idUkuranHewan` (`idUkuranHewan`),
  ADD KEY `idJenisHewan` (`idJenisHewan`),
  ADD KEY `idLayanan` (`idLayanan`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`idHewan`),
  ADD KEY `idUkuranHewan` (`idUkuranHewan`),
  ADD KEY `idJenisHewan` (`idJenisHewan`),
  ADD KEY `idCustomer_Member` (`idCustomer_Member`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `jenis_hewan`
--
ALTER TABLE `jenis_hewan`
  ADD PRIMARY KEY (`idJenisHewan`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`idLayanan`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `Pegawai`
--
ALTER TABLE `Pegawai`
  ADD PRIMARY KEY (`idPegawai`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  ADD PRIMARY KEY (`idPengadaanBarang`),
  ADD KEY `idSupplier` (`idSupplier`),
  ADD KEY `idPegawai` (`idPegawai`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD PRIMARY KEY (`idRincianPembelian`),
  ADD KEY `idProduk` (`idProduk`),
  ADD KEY `idHargaLayanan` (`idHargaLayanan`),
  ADD KEY `idTransaksiPembayaran` (`idTransaksiPembayaran`);

--
-- Indexes for table `rincian_pengadaan`
--
ALTER TABLE `rincian_pengadaan`
  ADD PRIMARY KEY (`idRincianPengadaan`),
  ADD KEY `idPengadaanBarang` (`idPengadaanBarang`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indexes for table `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  ADD PRIMARY KEY (`idTransaksiPembayaran`),
  ADD KEY `idPegawai` (`idPegawai`),
  ADD KEY `idHewan` (`idHewan`);

--
-- Indexes for table `ukuran_hewan`
--
ALTER TABLE `ukuran_hewan`
  ADD PRIMARY KEY (`idUkuranHewan`),
  ADD KEY `edited_by` (`edited_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `idCustomer_Member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `harga_layanan`
--
ALTER TABLE `harga_layanan`
  MODIFY `idHargaLayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hewan`
--
ALTER TABLE `hewan`
  MODIFY `idHewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_hewan`
--
ALTER TABLE `jenis_hewan`
  MODIFY `idJenisHewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `idLayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Pegawai`
--
ALTER TABLE `Pegawai`
  MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  MODIFY `idPengadaanBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  MODIFY `idRincianPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rincian_pengadaan`
--
ALTER TABLE `rincian_pengadaan`
  MODIFY `idRincianPengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  MODIFY `idTransaksiPembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ukuran_hewan`
--
ALTER TABLE `ukuran_hewan`
  MODIFY `idUkuranHewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `harga_layanan`
--
ALTER TABLE `harga_layanan`
  ADD CONSTRAINT `harga_layanan_ibfk_1` FOREIGN KEY (`idUkuranHewan`) REFERENCES `ukuran_hewan` (`idUkuranHewan`),
  ADD CONSTRAINT `harga_layanan_ibfk_2` FOREIGN KEY (`idJenisHewan`) REFERENCES `jenis_hewan` (`idJenisHewan`),
  ADD CONSTRAINT `harga_layanan_ibfk_3` FOREIGN KEY (`idLayanan`) REFERENCES `layanan` (`idLayanan`),
  ADD CONSTRAINT `harga_layanan_ibfk_4` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `hewan`
--
ALTER TABLE `hewan`
  ADD CONSTRAINT `hewan_ibfk_1` FOREIGN KEY (`idUkuranHewan`) REFERENCES `ukuran_hewan` (`idUkuranHewan`),
  ADD CONSTRAINT `hewan_ibfk_2` FOREIGN KEY (`idJenisHewan`) REFERENCES `jenis_hewan` (`idJenisHewan`),
  ADD CONSTRAINT `hewan_ibfk_3` FOREIGN KEY (`idCustomer_Member`) REFERENCES `Customer` (`idCustomer_Member`),
  ADD CONSTRAINT `hewan_ibfk_4` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `jenis_hewan`
--
ALTER TABLE `jenis_hewan`
  ADD CONSTRAINT `jenis_hewan_ibfk_1` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `Pegawai`
--
ALTER TABLE `Pegawai`
  ADD CONSTRAINT `Pegawai_ibfk_1` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  ADD CONSTRAINT `pengadaan_barang_ibfk_1` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`idSupplier`),
  ADD CONSTRAINT `pengadaan_barang_ibfk_2` FOREIGN KEY (`idPegawai`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD CONSTRAINT `rincian_pembelian_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`),
  ADD CONSTRAINT `rincian_pembelian_ibfk_2` FOREIGN KEY (`idHargaLayanan`) REFERENCES `harga_layanan` (`idHargaLayanan`),
  ADD CONSTRAINT `rincian_pembelian_ibfk_3` FOREIGN KEY (`idTransaksiPembayaran`) REFERENCES `transaksi_pembayaran` (`idTransaksiPembayaran`);

--
-- Constraints for table `rincian_pengadaan`
--
ALTER TABLE `rincian_pengadaan`
  ADD CONSTRAINT `rincian_pengadaan_ibfk_1` FOREIGN KEY (`idPengadaanBarang`) REFERENCES `pengadaan_barang` (`idPengadaanBarang`),
  ADD CONSTRAINT `rincian_pengadaan_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);

--
-- Constraints for table `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  ADD CONSTRAINT `transaksi_pembayaran_ibfk_1` FOREIGN KEY (`idPegawai`) REFERENCES `Pegawai` (`idPegawai`),
  ADD CONSTRAINT `transaksi_pembayaran_ibfk_2` FOREIGN KEY (`idHewan`) REFERENCES `hewan` (`idHewan`);

--
-- Constraints for table `ukuran_hewan`
--
ALTER TABLE `ukuran_hewan`
  ADD CONSTRAINT `ukuran_hewan_ibfk_1` FOREIGN KEY (`edited_by`) REFERENCES `Pegawai` (`idPegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
