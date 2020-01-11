-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2019 pada 13.11
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_akses`, `akses`) VALUES
(1, 'admin'),
(2, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_stock` int(11) NOT NULL,
  `id_merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga`, `total_stock`, `id_merk`) VALUES
('B01', 'Mesin Cuci', 2000000, 48, 'M03'),
('B02', 'Kipas Angin', 300000, 43, 'M01'),
('B03', 'Cooker Hood PX 6001', 712500, 36, 'M02'),
('B04', 'Daikin MCK55TVM6', 5640000, 44, 'M01'),
('B05', 'Stand Mixer MUM44RI', 2835000, 44, 'M01'),
('B06', 'TOTO CW421+TCW07S', 2100000, 28, 'M03'),
('B07', 'Kompor', 200000, 38, 'M02'),
('B08', 'Dispenser Air', 300000, 7, 'M02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuser`
--

CREATE TABLE `cuser` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuser`
--

INSERT INTO `cuser` (`id_user`, `username`, `password`, `nama`, `id_akses`) VALUES
('1111', 'admin', 'b59c67bf196a4758191e42f76670ceba', 'Faqih', 1),
('2222', 'kasir', '934b535800b1cba8f96a5d72f72f1611', 'Hany', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `initialisasi`
--

CREATE TABLE `initialisasi` (
  `nota` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `initialisasi`
--

INSERT INTO `initialisasi` (`nota`, `nama_perusahaan`) VALUES
(28, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id_merk` varchar(20) NOT NULL,
  `merk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id_merk`, `merk`) VALUES
('M01', 'Electronic'),
('M02', 'Kitchen'),
('M03', 'Bathroom'),
('M04', 'Lavotary');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`) VALUES
('1111', 'Ridho', 'jakarta', '087834668738'),
('2222', 'Diki', 'bandung', '08457893032'),
('3333', 'Doddy', 'jakarta', '0812938490');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detil`
--

CREATE TABLE `penjualan_detil` (
  `id_detil` int(11) NOT NULL,
  `nomor_faktur` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan_detil`
--

INSERT INTO `penjualan_detil` (`id_detil`, `nomor_faktur`, `kode_barang`, `jumlah_beli`, `harga_satuan`, `total`) VALUES
(19, '20191100014', 'b01', 1, 100000, 100000),
(21, '20191100006', 'B03', 1, 712500, 712500),
(22, '20191100007', 'B05', 1, 2835000, 2835000),
(23, '20191100008', 'B04', 1, 5640000, 5640000),
(24, '20191100009', 'B02', 1, 300000, 300000),
(25, '20191100009', 'B02', 2, 300000, 600000),
(26, '20191100009', 'B01', 1, 2000000, 2000000),
(27, '20191100010', 'B01', 1, 2000000, 2000000),
(28, '20191100010', 'B03', 1, 712500, 712500),
(30, '20191100011', 'B04', 1, 5640000, 5640000),
(31, '20191100011', 'B02', 1, 300000, 300000),
(32, '20191100012', 'B01', 1, 2000000, 2000000),
(33, '20191100012', 'B06', 1, 2100000, 2100000),
(34, '20191100013', 'B07', 1, 200000, 200000),
(36, '20191100014', 'B04', 1, 5640000, 5640000),
(37, '20191100015', 'B07', 1, 200000, 200000),
(38, '20191100016', 'B05', 1, 2835000, 2835000),
(39, '20191100017', 'B04', 1, 5640000, 5640000),
(40, '20191100018', 'B04', 1, 5640000, 5640000),
(41, '20191100018', 'B08', 1, 300000, 300000),
(42, '20191100019', 'B03', 1, 712500, 712500),
(43, '20191100020', 'B05', 1, 2835000, 2835000),
(44, '20191100021', 'B02', 1, 300000, 300000),
(45, '20191100022', 'B08', 1, 300000, 300000),
(46, '20191100022', 'B08', 1, 300000, 300000),
(47, '20191100023', 'B02', 1, 300000, 300000),
(48, '20191100023', 'B04', 1, 5640000, 5640000),
(49, '20191100024', 'B02', 1, 300000, 300000),
(51, '20191100024', 'B01', 1, 2000000, 2000000),
(52, '20191100024', 'B05', 1, 2835000, 2835000),
(53, '20191200026', 'B06', 1, 2100000, 2100000),
(54, '20191200027', 'B05', 1, 2835000, 2835000),
(55, '20191200028', 'B03', 1, 712500, 712500),
(56, '20191200028', 'B05', 1, 2835000, 2835000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_header`
--

CREATE TABLE `penjualan_header` (
  `nomor_faktur` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan_header`
--

INSERT INTO `penjualan_header` (`nomor_faktur`, `tanggal`, `id_pelanggan`, `grand_total`, `bayar`, `id_user`, `keterangan`) VALUES
('20190900011', '2019-09-16', '2222', 200000, 200000, '1111', 'Harus dikirim sekarang'),
('20191000012', '2019-10-17', '1111', 1000000, 1000000, '1111', 'Keren'),
('20191100006', '2019-11-27', '2222', 712500, 750000, '2222', ''),
('20191100007', '2019-11-27', '3333', 2835000, 3000000, '2222', ''),
('20191100008', '2019-11-28', '3333', 5640000, 6000000, '2222', ''),
('20191100009', '2019-11-28', '3333', 2900000, 3000000, '2222', ''),
('20191100010', '2019-11-28', '1111', 8352500, 0, '2222', ''),
('20191100011', '2019-11-28', '3333', 5940000, 6000000, '2222', ''),
('20191100012', '2019-11-28', '3333', 4100000, 0, '2222', ''),
('20191100013', '2019-11-28', '1111', 500000, 0, '2222', ''),
('20191100014', '2019-11-28', '1111', 5740000, 6000000, '2222', ''),
('20191100015', '2019-11-28', '2222', 200000, 200000, '2222', ''),
('20191100016', '2019-11-28', '3333', 2835000, 3000000, '2222', ''),
('20191100017', '2019-11-28', '1111', 5640000, 6000000, '2222', ''),
('20191100018', '2019-11-28', '2222', 5940000, 6000000, '2222', ''),
('20191100019', '2019-11-30', '1111', 712500, 720000, '2222', ''),
('20191100020', '2019-11-30', '2222', 2835000, 3000000, '2222', ''),
('20191100021', '2019-11-30', '2222', 300000, 300000, '2222', ''),
('20191100022', '2019-11-30', '2222', 300000, 300000, '2222', ''),
('20191100023', '2019-11-30', '2222', 5940000, 6000000, '2222', 'Harus Cepat Dikirim '),
('20191100024', '2019-11-30', '3333', 5135000, 5200000, '2222', ''),
('20191200026', '2019-12-02', '1111', 2100000, 2100000, '2222', ''),
('20191200027', '2019-12-02', '2222', 2835000, 6000000, '2222', ''),
('20191200028', '2019-12-13', '2222', 3547500, 4000000, '2222', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indeks untuk tabel `cuser`
--
ALTER TABLE `cuser`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indeks untuk tabel `initialisasi`
--
ALTER TABLE `initialisasi`
  ADD PRIMARY KEY (`nota`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan_detil`
--
ALTER TABLE `penjualan_detil`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `nomor_faktur` (`nomor_faktur`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `penjualan_header`
--
ALTER TABLE `penjualan_header`
  ADD PRIMARY KEY (`nomor_faktur`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penjualan_detil`
--
ALTER TABLE `penjualan_detil`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`);

--
-- Ketidakleluasaan untuk tabel `cuser`
--
ALTER TABLE `cuser`
  ADD CONSTRAINT `cuser_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
