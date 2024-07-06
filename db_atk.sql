-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2024 pada 06.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_atk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `id_supplier`) VALUES
(1, 'Pensil Faber Castell 2B', 'Pensil Faber-Castell 2B adalah salah satu jenis pensil yang diproduksi oleh perusahaan Faber-Castell, sebuah perusahaan terkenal dalam industri alat tulis.', 46000, 1),
(2, 'Stapler Kenko', 'Stapler adalah alat yang digunakan untuk menggabungkan lembaran-lembaran kertas dengan menggunakan klip logam yang disebut staples.', 26000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_produk`, `qty`) VALUES
(1, 1, 12),
(2, 2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_telp_supplier` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`) VALUES
(1, 'Andri Firman', 'Jl. Amd Babakan Pocis no.69', '087808675313'),
(4, 'Aldo Hermawan Suryana', 'Jl. Boulevard BSD no. 88', '085810727518');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Pegawai','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(1, 'Murod', 'murod', '$2y$10$yGu7M6Nf/iJtGgfwhDEv/u.rAYAIPY..tGEzrn3AqUZfV226ShXDS', 'Admin'),
(2, 'Rizky Febriansyah', 'rizky', '$2y$10$yGu7M6Nf/iJtGgfwhDEv/u.rAYAIPY..tGEzrn3AqUZfV226ShXDS', 'Pegawai'),
(4, 'Irgi', 'irgi', '$2y$10$aplsBLPHeLxugQ3sdA1Z6.iJ/TxBf.sswgJj0u3r/ds3psCHXOOcC', 'Pegawai'),
(5, 'Bani', 'bani', '$2y$10$vaRXl8PsyRnmIHaHoAKGnORFvnXRuHe.teeaN0.f2qiBD4VbMotsa', 'Admin'),
(6, 'Aisyah', 'aisyah', '$2y$10$Y1HS6gCi5b79J7KUH9275eYx2V3TjBvnd9LAu1UTyaq0myFABg3OS', 'Pegawai'),
(7, 'Mawar', 'mawar', '$2y$10$YJarKpsx6ha5WuyktaYIquz6I0S9g7pTUSpxFY.XxZoCIP2W5QFYW', 'Pegawai'),
(8, 'Pongki', 'pongki', '$2y$10$htkzpcm92bWwy3WsvLPUEueliZaHjE78KO7p2t1MIX7lo8YIrjMzC', 'Pegawai'),
(9, 'Kusuma', 'kusuma', '$2y$10$zUw3tAxeIHYTIVsqqzi1K.g3jQu5yvHF8STDv4kQvxF743eej6.Yq', 'Pegawai'),
(10, 'Maskur', 'maskur', '$2y$10$5iNkdvkLivghiKNnW.p5Q.FrdriGTmiSneikf/ZFgOL/Ga0vYFtmW', 'Pegawai'),
(11, 'Riski', 'riski', '$2y$10$YSqPKa9jd1aB5dFmMYfCIuAMGOmmHbqKZxwDpfTOCXa2qhoWAPy52', 'Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD CONSTRAINT `tb_stok_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
