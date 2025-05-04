-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2025 pada 17.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: cafe_restoran
--

-- --------------------------------------------------------

--
-- Struktur dari tabel detail_pesanan
--

CREATE TABLE detail_pesanan (
  id_detail int(20) NOT NULL,
  id_pesanan int(11) NOT NULL,
  id_menu int(11) NOT NULL,
  jumlah int(11) NOT NULL,
  harga int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel keranjang
--

CREATE TABLE keranjang (
  id_keranjang int(11) NOT NULL,
  id_menu int(11) NOT NULL,
  jumlah int(11) NOT NULL,
  session_id varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel menu
--

CREATE TABLE menu (
  id_menu int(20) NOT NULL,
  nama_menu varchar(100) NOT NULL,
  kategori enum('Makanan','Minuman') NOT NULL,
  harga int(11) NOT NULL,
  deskripsi text NOT NULL,
  gambar varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel menu
--

INSERT INTO menu (id_menu, nama_menu, kategori, harga, deskripsi, gambar) VALUES
(1, 'Steak', 'Makanan', 45000, 'Steak daging yang empuk dan juicy', 'steak.jpg'),
(2, 'Nasi Goreng Spesial', 'Makanan', 12000, 'Nasi Goreng dengan Tambahan Toping Seafood', 'nasi goreng spesial.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel pesanan
--

CREATE TABLE pesanan (
  id_pesanan int(11) NOT NULL,
  nama_pelanggan varchar(100) NOT NULL,
  catatan text NOT NULL,
  total_harga int(20) NOT NULL,
  tanggal_pesan datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel detail_pesanan
--
ALTER TABLE detail_pesanan
  ADD PRIMARY KEY (id_detail);

--
-- Indeks untuk tabel keranjang
--
ALTER TABLE keranjang
  ADD PRIMARY KEY (id_keranjang);

--
-- Indeks untuk tabel menu
--
ALTER TABLE menu
  ADD PRIMARY KEY (id_menu);

--
-- Indeks untuk tabel pesanan
--
ALTER TABLE pesanan
  ADD PRIMARY KEY (id_pesanan);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel detail_pesanan
--
ALTER TABLE detail_pesanan
  MODIFY id_detail int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel keranjang
--
ALTER TABLE keranjang
  MODIFY id_keranjang int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel menu
--
ALTER TABLE menu
  MODIFY id_menu int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel pesanan
--
ALTER TABLE pesanan
  MODIFY id_pesanan int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;