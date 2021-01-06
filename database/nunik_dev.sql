-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 05:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nunik_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kode_akun` varchar(3) NOT NULL,
  `nama_akun` varchar(20) NOT NULL,
  `header_akun` int(11) NOT NULL,
  `saldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kode_akun`, `nama_akun`, `header_akun`, `saldo`) VALUES
('101', 'Kas', 1, 0),
('102', 'Persediaan Barang', 1, 0),
('401', 'Penjualan', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(20) NOT NULL,
  `kode_klasifikasi` char(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `volume_penggunaan` int(20) NOT NULL,
  `jml_stok_minimal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_klasifikasi`, `nama_barang`, `satuan`, `harga`, `volume_penggunaan`, `jml_stok_minimal`) VALUES
('BRG-0001', 'B', 'Bubuk Choco Cream', 'Sachet', 0, 5, 0),
('BRG-0002', 'A', 'Cherry Dragon', 'Sachet', 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penerimaan_barang`
--

CREATE TABLE `detail_penerimaan_barang` (
  `no_penerimaan` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penerimaan_barang`
--

INSERT INTO `detail_penerimaan_barang` (`no_penerimaan`, `kode_barang`, `qty`, `harga`, `subtotal`) VALUES
('BM-0001', 'BRG-0002', 25, 15000, 375000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran_barang`
--

CREATE TABLE `detail_pengeluaran_barang` (
  `no_pengeluaran` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pengeluaran_barang`
--

INSERT INTO `detail_pengeluaran_barang` (`no_pengeluaran`, `kode_barang`, `qty`, `harga`, `subtotal`) VALUES
('BK~0001', 'BRG-0001', 5, 15000, 75000),
('BK~0001', 'BRG-0002', 3, 15000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `harga_jual`
--

CREATE TABLE `harga_jual` (
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_jual`
--

INSERT INTO `harga_jual` (`nominal`, `keterangan`) VALUES
(15000, 'Menjual seharga lima belas ribu');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `no` int(11) NOT NULL,
  `id_trans` char(20) NOT NULL,
  `kode_akun` varchar(3) NOT NULL,
  `total` int(20) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`no`, `id_trans`, `kode_akun`, `total`, `posisi`, `tanggal`) VALUES
(1, 'BM-0002', '102', 25000, 'Debit', '2020-12-14'),
(2, 'BM-0002', '101', 25000, 'Kredit', '2020-12-14'),
(3, 'BK~0001', '102', 20000, 'Debit', '2020-12-20'),
(4, 'BK~0001', '101', 20000, 'Kredit', '2020-12-20'),
(5, 'BK~0001', '101', 20000, 'Debit', '2020-12-20'),
(6, 'BK~0001', '401', 20000, 'Kredit', '2020-12-20'),
(7, 'BM-0001', '102', 20000, 'Debit', '2020-12-20'),
(8, 'BM-0001', '101', 20000, 'Kredit', '2020-12-20'),
(9, 'BM-0001', '102', 375000, 'Debit', '2020-12-23'),
(10, 'BM-0001', '101', 375000, 'Kredit', '2020-12-23'),
(11, 'BK~0001', '101', 120000, 'Debit', '2021-01-03'),
(12, 'BK~0001', '401', 120000, 'Kredit', '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `kode_klasifikasi` char(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `ketentuan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`kode_klasifikasi`, `nama`, `keterangan`, `ketentuan`) VALUES
('A', 'Kategori A', 'Kategori persediaan barang yang memiliki nilai tinggi', 0.05),
('B', 'Kategori B', 'Kategori persediaan barang yang memiliki nilai sedang', 0.1),
('C', 'Kategori C', 'Kategori persediaan barang yang memiliki nilai rendah untuk perusahaan', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `midtrans`
--

CREATE TABLE `midtrans` (
  `order_id` varchar(255) NOT NULL,
  `kode_pelanggan` varchar(10) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transaction_time` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `va_number` text NOT NULL,
  `pdf_url` text NOT NULL,
  `status_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `midtrans`
--

INSERT INTO `midtrans` (`order_id`, `kode_pelanggan`, `kelas`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`) VALUES
('1444134857', 'PLG~0003', 'KA-02', 100000, 'bank_transfer', '2020-12-26 09:01:42', 'bca', '12730611936', 'https://app.sandbox.midtrans.com/snap/v1/transactions/19c1d28e-9614-49e7-84bd-0088b6ec741c/pdf', '201');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama`, `no_hp`, `alamat`) VALUES
('PLG~0001', 'Miranda Arianty', '082251512470', 'Jalan Sukapura belakang soejo'),
('PLG~0002', 'Putri Ainun Zariyah', '082128814762', 'Jalan Jendral Katamso, taman pahlawan Bandung'),
('PLG~0003', 'Sri Ayu Wahyuni', '085314018613', 'Mangga 2'),
('PLG~0004', 'Alfridus Dosinaen', '0878330661966', 'Jalan AH Nasution, Antapani Wetan');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_barang`
--

CREATE TABLE `penerimaan_barang` (
  `no_penerimaan` char(20) NOT NULL,
  `tgl_penerimaan` date NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `kode_supplier` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerimaan_barang`
--

INSERT INTO `penerimaan_barang` (`no_penerimaan`, `tgl_penerimaan`, `total`, `keterangan`, `kode_supplier`) VALUES
('BM-0001', '2020-12-23', 375000, 'Been Processed', 'SPL-0003');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_barang`
--

CREATE TABLE `pengeluaran_barang` (
  `no_pengeluaran` char(20) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `kode_pelanggan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran_barang`
--

INSERT INTO `pengeluaran_barang` (`no_pengeluaran`, `tgl_pengeluaran`, `total`, `keterangan`, `kode_pelanggan`) VALUES
('BK~0001', '2020-12-23', 120000, 'Been Processed', 'PLG~0003'),
('BK~0002', '2020-12-28', 0, 'Unprocessed', 'PLG~0004'),
('BK~0003', '2021-01-02', 0, 'Unprocessed', 'PLG~0001');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama`, `no_hp`, `alamat`) VALUES
('SPL-0001', 'China Warehouse', '081355924846', 'Jalan Terusan Buah Batu no.1'),
('SPL-0002', 'Hwang Group', '081355924846', 'Jl. HOS Cokro Aminoto Sumenep II / 02'),
('SPL-0003', 'ABC Warehouse', '081355924846', 'Jalan Jend A. Nasution Antapani Wetan'),
('SPL-0004', 'China Supplier', '081355924846', 'Jalan Soekarno Hatta Malang'),
('SPL-0005', 'Coffe Land', '087825958155', 'Jl. Istana Elok No.10, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` char(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `rola` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_klasifikasi` (`kode_klasifikasi`);

--
-- Indexes for table `detail_penerimaan_barang`
--
ALTER TABLE `detail_penerimaan_barang`
  ADD PRIMARY KEY (`no_penerimaan`,`kode_barang`);

--
-- Indexes for table `detail_pengeluaran_barang`
--
ALTER TABLE `detail_pengeluaran_barang`
  ADD PRIMARY KEY (`no_pengeluaran`,`kode_barang`);

--
-- Indexes for table `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD PRIMARY KEY (`nominal`);

--
-- Indexes for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`kode_klasifikasi`);

--
-- Indexes for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD PRIMARY KEY (`no_penerimaan`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `pengeluaran_barang`
--
ALTER TABLE `pengeluaran_barang`
  ADD PRIMARY KEY (`no_pengeluaran`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_klasifikasi`) REFERENCES `klasifikasi` (`kode_klasifikasi`);

--
-- Constraints for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD CONSTRAINT `fk_penerimaan_1` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
