-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2021 pada 11.32
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `kategori` varchar(64) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Nike Red Blood', 'Sepatu yang berwarna red', 'Sepatu Pria', 300000, 7, 'Sepatu.jpg'),
(6, 'Sepatu Anti Maling', 'Sepatu dengan security maximal', 'Sepatu Pria', 3000200, 9, 'radek-skrzypczak-WlB8TsI_th0-unsplash_(1).jpg'),
(7, 'Sepatu Grey', 'Warna grey', 'Sepatu Wanita', 7000000, 13, 'imani-bahati-LxVxPA1LOVM-unsplash.jpg'),
(8, 'Sepatu roda', 'Sepatu dari Roda ', 'Sepatu Anak-Anak', 7000000, 11, 'istockphoto-1306205629-170667a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'anwar', 'parigi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Anwar Ramdhani', 'parigi', '2021-11-24 00:07:28', '2028-07-13 00:07:28'),
(3, 'anwar', 'parigi', '2021-11-24 00:09:32', '2021-11-24 00:09:32'),
(4, 'Anwar Ramdhani', 'parigi', '2021-11-24 00:11:40', '2021-11-25 00:11:40'),
(5, '', '', '2021-11-24 04:29:07', '2021-11-25 04:29:07'),
(6, '', '', '2021-11-28 12:31:53', '2021-11-29 12:31:53'),
(7, 'asea', 'adasd', '2021-11-29 08:38:05', '2021-11-30 08:38:05'),
(8, 'Vinan Ramadhan', 'tasikmalaya', '2021-11-29 11:38:29', '2021-11-30 11:38:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(64) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 2, 'Sepatu Kulit', 1, 300000, ''),
(2, 2, 2, 'Sepatu Kulit', 1, 300000, ''),
(3, 2, 1, 'Sepatu', 2, 300000, ''),
(4, 3, 1, 'Sepatu', 1, 300000, ''),
(5, 4, 2, 'Sepatu Kulit', 1, 300000, ''),
(6, 5, 2, 'Sepatu Kulit', 1, 300000, ''),
(7, 5, 1, 'Nike Red Blood', 2, 300000, ''),
(8, 6, 2, 'Sepatu Kulit', 1, 300000, ''),
(9, 7, 2, 'Sepatu Kulit', 1, 300000, ''),
(10, 8, 6, 'Sepatu Anti Maling', 2, 3000200, ''),
(11, 8, 1, 'Nike Red Blood', 1, 300000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_jual` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah WHERE id_brg=NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(9, 'admin', 'Admin@gmail.com', 'default.jpg', '$2y$10$Hicr4kH8c3IZBdH.3av9iexGQDxae65eYpmHjpU91vuhIAol0scb6', 1, 1, 1638155302),
(10, 'username1', 'username01@gmail.com', 'default.jpg', '$2y$10$attbRdD0Wb5yRaZXqmQn7.IN1yvImBWYJjt/7QeGQOhxb.MoA2mI2', 2, 1, 1638156648),
(11, 'Vinan Ramadhan', 'vinan@gmail.com', 'default.jpg', '$2y$10$vGzXb8yTG8vpy49d6PoO1.VVo9b/VT0rH4YwIoHjO2kNMtkCJWpBm', 2, 1, 1638160361);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Anwar Ramdhani', 'ramdhanie038@gmail.com', 'default.jpg', '$2y$10$C7A6giCBP3.2tgzA2CrguudALr45mLg8VQUfuDmtzWrROhqR1xSia', 2, 1, 1638020739),
(2, 'Anwar Ramdhani', 'anwarramdhanie@gmail.com', 'default.jpg', '$2y$10$guO7ewYDbvLxBagoCX/iQu3BTyWg3ECT3raOPPuAQgO38IST.GmGu', 2, 1, 1638020806),
(3, 'anwar', 'cr_madrid68@gmail.com', 'default.jpg', '$2y$10$N3sXpnfdsojq94vEy4gD3O9tQmAdk8eh52NL1AoI6e9plWI0N/AGy', 2, 1, 1638020948),
(4, 'Anwar Ramdhani', 'ramdhanie038@gamil.com', 'default.jpg', '$2y$10$AknarvVvFY.fmwY5qIERiurVmCD4rMglCr5QgHsF5suoLF83VIhoG', 2, 1, 1638021670);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
