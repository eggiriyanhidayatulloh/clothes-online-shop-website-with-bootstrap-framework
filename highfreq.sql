-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2021 pada 18.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `highfreq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'higherfrequencies.com', 'highfreq', 'Eduard Sebastian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Light Colors'),
(2, 'Dark Colors');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 10000),
(2, 'Bekasi', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `no_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'rezhafikry2015@gmail.com', 'rezha', 'Rezha Fikry', '089172764412', ''),
(2, 'rifaldyriski2015@gmail.com', 'rifaldy', 'Rifaldy', '081298228665', ''),
(3, 'annawils@rocketmail.com', 'anna', 'Anna Williams', '123456789', 'Rawamangun, Jakarta Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 42, 'Anna Williams', 'BCA', 280000, '2021-07-02', '20210702155700alig.png'),
(3, 43, 'Anna Williams', 'BCA', 285000, '2021-07-19', '202107191216251komyo-ji.jpg'),
(4, 46, 'Anna Williams', 'BCA', 145, '2021-07-30', '20210730090050WhatsApp Image 2021-06-06 at 14.50.45.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(55, 3, 1, '2021-08-04', 415000, 'Jakarta', 10000, 'testigg', 'pending', ''),
(56, 3, 1, '2021-08-04', 145000, 'Jakarta', 10000, 'PPPPPPP', 'pending', ''),
(57, 3, 1, '2021-08-04', 280000, 'Jakarta', 10000, 'coba', 'pending', ''),
(58, 3, 2, '2021-08-04', 150000, 'Bekasi', 15000, 'rwrwerw', 'pending', ''),
(59, 3, 1, '2021-08-04', 145000, 'Jakarta', 10000, 'dfdsfgdfs', 'pending', ''),
(60, 3, 1, '2021-08-04', 145000, 'Jakarta', 10000, 'cobaaaa', 'pending', ''),
(61, 3, 2, '2021-08-04', 270000, 'Bekasi', 15000, ' 24dddwdssd', 'pending', ''),
(62, 3, 1, '2021-08-04', 250000, 'Jakarta', 10000, 'coba yaa', 'pending', ''),
(63, 3, 1, '2021-08-04', 145000, 'Jakarta', 10000, 'tai lu', 'pending', ''),
(64, 3, 1, '2021-08-04', 130000, 'Jakarta', 10000, 'haii', 'pending', ''),
(65, 3, 2, '2021-08-04', 150000, 'Bekasi', 15000, '23232dde', 'pending', ''),
(66, 3, 1, '2021-08-04', 145000, 'Jakarta', 10000, 'ewew', 'pending', ''),
(67, 3, 1, '2021-08-04', 280000, 'Jakarta', 10000, 'tapp', 'pending', ''),
(68, 3, 2, '2021-08-04', 150000, 'Bekasi', 15000, 'tapss', 'pending', ''),
(69, 3, 2, '2021-08-04', 285000, 'Bekasi', 15000, 'endd', 'pending', ''),
(70, 3, 1, '2021-08-05', 280000, 'Jakarta', 10000, 'sw', 'pending', ''),
(71, 3, 2, '2021-08-05', 150000, 'Bekasi', 15000, 'wwww', 'pending', ''),
(72, 3, 2, '2021-08-05', 150000, 'Bekasi', 15000, 'weewew', 'pending', ''),
(73, 3, 2, '2021-08-05', 390000, 'Bekasi', 15000, '123pp', 'pending', ''),
(74, 3, 1, '2021-08-05', 280000, 'Jakarta', 10000, 'pop', 'pending', ''),
(75, 3, 2, '2021-08-05', 375000, 'Bekasi', 15000, 'karawang cilamaya', 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `ukuran` varchar(2) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `ukuran`, `subharga`) VALUES
(32, 67, 9, 2, '528H2 - red maroon Special Edition', 135000, 'L', 270000),
(33, 68, 18, 1, 'Original HF by Kidreezy - black ', 135000, 'L', 135000),
(34, 69, 13, 1, 'Solar Plexus - black Special Edition', 135000, 'XL', 135000),
(35, 69, 17, 1, 'Original HF by Kidreezy - blue navy', 135000, 'XL', 135000),
(39, 73, 11, 1, 'HF Feels Energy - aqua marine', 135000, 'L', 135000),
(40, 73, 20, 2, 'Simple HF - yellow Special Edition', 120000, 'XL', 240000),
(41, 74, 10, 2, 'HF Feels Anxiety - dark purple ', 135000, 'XL', 270000),
(42, 75, 20, 3, 'Simple HF - yellow Special Edition', 120000, 'XL', 360000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `ukuran` varchar(2) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `ukuran`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(8, 1, 'Frequency - white Special Edition', 135000, 'L', 'Frequency - white.jpg', 'Simple Frequency by Kidreezy (White)', 20),
(9, 2, '528H2 - red maroon Special Edition', 135000, 'L', '528H2 - red maroon.jpg', 'Higher Frequencies OG WAVY (Red Maroon)', 20),
(10, 2, 'HF Feels Anxiety - dark purple ', 135000, 'XL', 'Astronaut x HF by Kidreezy - blue.jpg', 'HF FEELS - ANXIETY (Dark Purple)', 16),
(11, 2, 'HF Feels Energy - aqua marine', 135000, 'L', 'Energy - aqua marine.jpg', 'HF FEELS - ENERGY (Aqua Marine)', 25),
(12, 1, 'Solar Plexus - white Special Edition', 135000, 'L', 'Plexus - white.jpg', 'HF 19 - SOLAR PLEXUS (White)', 8),
(13, 2, 'Solar Plexus - black Special Edition', 135000, 'XL', 'Plexus - black.jpg', 'HF 19 - SOLAR PLEXUS (Black)', 8),
(15, 1, 'Astronaut x HF by Kidreezy - blue navy', 135000, 'XL', 'Astronaut x HF by Kidreezy - blue.jpg', 'Higher Frequencies OG ASTRO (Blue Navy)', 5),
(16, 2, 'Astronaut x HF by Kidreezy - red', 135000, 'L', 'Astronaut x HF by Kidreezy - red.jpg', 'Higher Frequencies OG ASTRO (Red)', 5),
(17, 1, 'Original HF by Kidreezy - blue navy', 135000, 'XL', 'Original HF by Kidreezy - blue.jpg', 'Higher Frequencies OG MIND SPIRIT (Blue Navy)', 20),
(18, 2, 'Original HF by Kidreezy - black ', 135000, 'L', 'Original HF by Kidreezy - black.jpg', 'Higher Frequencies OG MIND SPIRIT (black)', 21),
(19, 1, 'Merge Our Frequency - white ', 120000, 'L', 'Merge Our Frequency - white.jpg', 'Merge Our Frequency by Kidreezy - white', 25),
(20, 1, 'Simple HF - yellow Special Edition', 120000, 'XL', 'Simple HF by Kidreezy.jpg', 'Simple HF by Kidreezy (Yellow)', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(2, 33, '12r_tracielouise_dickybeachcaloundrasunshinecoast.jpg'),
(3, 33, '17r_tracielouise_jettykingfisherbayfraserisland.jpg'),
(10, 33, '202107241634331komyo-ji.jpg'),
(11, 34, 'Anxiety - dark purple.jpg'),
(12, 34, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkir` (`id_ongkir`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `pembelian_produk_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
