-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2021 pada 06.48
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `gambar` text NOT NULL,
  `sinopsis` text NOT NULL,
  `file_buku` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id`, `judul`, `penulis`, `jenis`, `gambar`, `sinopsis`, `file_buku`) VALUES
(1, 'Dilan 1990', 'Pidi Baiq', 'Novel', '718-dilan.png', 'Milea (Vanesha Prescilla) bertemu dengan Dilan (Iqbaal Ramadhan) di sebuah SMA di Bandung. Itu adalah tahun 1990, saat Milea pindah dari Jakarta ke Bandung. Perkenalan yang tidak biasa kemudian membawa Milea mulai mengenal keunikan Dilan lebih jauh. Dilan yang pintar, baik hati dan romantis... semua dengan caranya sendiri. Cara Dilan mendekati Milea tidak sama dengan teman-teman lelakinya yang lain, bahkan Beni, pacar Milea di Jakarta. Bahkan cara berbicara Dilan yang terdengar kaku, lambat laun justru membuat Milea kerap merindukannya jika sehari saja ia tak mendengar suara itu. Perjalanan hubungan mereka tak selalu mulus. Beni, gank motor, tawuran, Anhar, Kang Adi, semua mewarnai perjalanan itu. Dan Dilan... dengan caranya sendiri...selalu bisa membuat Milea percaya ia bisa tiba di tujuan dengan selamat. Tujuan dari perjalanan ini. Perjalanan mereka berdua. Katanya, dunia SMA adalah dunia paling indah. Dunia Milea dan Dilan satu tingkat lebih indah daripada itu.', 'ZONK.pdf'),
(3, 'Tuhan Ada di Hatimu', 'Husein Jafar Al Hadar', 'Agama', '888-Tuhan Ada di Hatimu.jpg', 'Sejatinya menghadap ke mana pun, kita melihat kebesaran Allah yang membuat kita menyebut nama-Nya. Bukan hanya di Ka\'bah, tapi juga di gubuk-gubuk orang miskin, di rumah-rumah yatim, bahkan di lembaga pemasyarakatan. Masjid bisa roboh, Ka\'bah bisa sepi, tapi hati manusia yang beriman akan abadi dalam ketaatan dan kecintaan pada-Nya.', 'ZONK.pdf'),
(4, 'A Street Cat Named Bob', 'James Bowen', 'Autobiografi', 'bob.jpg', 'Ketika James Bowen menemukan seekor kucing jalanan yang terluka di koridor rumah susunnya, dia tidak tahu bahwa kucing itu akan mengubah hidupnya. James yang sehari-hari menyambung hidup dari mengamen berpenghasilan tak menentu, dia juga tengah terbelit masalah serius terkait, kecanduannya terhadap narkoba.', 'ZONK.pdf'),
(12, 'The Magic of Blender 3D Modelling', 'Hendi Hendratman', 'Buku Pelajaran', '857-blender.png', 'Software Blender 2.8 adalah software visualisi 3D Modelling dan Animasi. Blender biasa digunakan para animator, desainer grafis, arsitek, desainer interior, desainer produk, video effects, game programmer dll. Di indonesia popularitasnya sudah mengalahkan seniornya 3D Studio Max dan Maya.\r\n\r\nKarena fitur Blender sangat luas, buku ini dibatasi pada Modelling / pembuatan objek 3 Dimensi saja, termasuk Vector 2D, Material Texturing, Render Realistis, Render kartun, Filters dan Efek kamera. Tutorial di Buku The Magic of Blender 3D Modelling ini berisi 36 kasus tutorial kategori Introduction Interface, Fundamental, Home Appliance, Product, Outdoor, Architecture, Graphic Design, Organic dan Lain- lain. Materi menggunakan Blender 2.81 namun tetap diikuti untuk pengguna versi di atasnya (2.82, 2,83 dan 2.9x).', 'ZONK.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'saya', 'kunci');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
