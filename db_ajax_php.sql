-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2022 pada 16.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ajax_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` text NOT NULL,
  `harga_layanan` int(11) NOT NULL,
  `lama_layanan` int(11) NOT NULL,
  `desk` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_size` int(20) NOT NULL,
  `file_type` varchar(5) NOT NULL,
  `hari1` text NOT NULL,
  `desk1` text NOT NULL,
  `hari2` text NOT NULL,
  `desk2` text NOT NULL,
  `hari3` text NOT NULL,
  `desk3` text NOT NULL,
  `hari4` text NOT NULL,
  `desk4` text NOT NULL,
  `inc1` text NOT NULL,
  `inc2` text NOT NULL,
  `inc3` text NOT NULL,
  `inc4` text NOT NULL,
  `inc5` text NOT NULL,
  `inc6` text NOT NULL,
  `inc7` text NOT NULL,
  `hotel1` varchar(225) NOT NULL,
  `hotel2` varchar(225) NOT NULL,
  `hotel3` varchar(225) NOT NULL,
  `harga1` int(11) NOT NULL,
  `harga2` int(11) NOT NULL,
  `harga3` int(11) NOT NULL,
  `harga4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `harga_layanan`, `lama_layanan`, `desk`, `tgl_upload`, `file_name`, `file_size`, `file_type`, `hari1`, `desk1`, `hari2`, `desk2`, `hari3`, `desk3`, `hari4`, `desk4`, `inc1`, `inc2`, `inc3`, `inc4`, `inc5`, `inc6`, `inc7`, `hotel1`, `hotel2`, `hotel3`, `harga1`, `harga2`, `harga3`, `harga4`) VALUES
(113, '2D1N EXOTIC BROMO JAWA TIMUR', 2600000, 2, 'Gunung Bromo atau dalam bahasa Tengger dieja Brama, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Tinggi gunung ini 2.329 meter di atas permukaan laut', '2021-08-04', '810982021.jpg', 133878, 'jpg', 'HARI 1 : KETIBAAN SURABAYA / MALANG - BROMO (SNACK)', 'Setibanya di Bandara atau stasiun di Surabaya/ Malang, Anda dijemput kemudian diantar menuju Bromo, dengan perjalanan darat kurang lebih 4 jam. Setelah itu diantar menuju hotel untuk check in & istirahat.', 'HARI 2 : BROMO TOUR – KEBERANGKATAN SURABAYA / MALANG (MP)', 'Pkl. 03.00 Morning call dan persiapan by jeep mengikuti Bromo Tour dengan melihat matahari terbit via Penanjakan/ Bukit Kingkong/ Bukit cinta (bila cuaca memungkinkan), selanjutnya menuju ke Lautan Pasir, Kawah Gunung Bromo (Udaranya sangat dingin, pastikan menggunakan jaket tebal dan sepatu anti slip). Kembali ke hotel untuk makan pagi dan check out. Hingga saatnya pengantaran ke Bandara atau stasiun di Surabaya/ Malang. Tour selesai', '', '', '', '', 'Akomodasi 1 (satu) kamar menignap dengan sarapan pagi sesuai pilihan hotel', 'Tour dan makan sesuai itinerari', 'Transportasi sesuai jumlah peserta', 'Jeep di Bromo (maks. 5 orang)', 'Lokal Guide berbahasa Indonesia', 'Air mineral 1 botol/orang/hari', 'Harga WNI', 'Bromo Permai 1', 'Cemara Indah Hotel', 'Cafe Lava Hostel', 2600000, 2600000, 2200000, 2200000),
(114, '3D2N EXOTIC DERAWAN OPEN TRIP', 1850000, 3, 'Kepulauan Derawan adalah sebuah kepulauan yang berada di Kabupaten Berau, Kalimantan Timur. Di kepulauan ini terdapat sejumlah objek wisata bahari menawan', '2021-08-04', 'sumber-indonesiatripid.jpg', 149743, 'jpg', 'HARI 1 : KETIBAAN BERAU – DERAWAN (MM)', 'Tiba di Bandara Kalimarau Berau, anda akan disambut oleh driver. Setelah itu, anda akan menempuh perjalanan darat sekitar 2 jam 30 menit menuju Tanjung Batu dan dilanjutkan dengan speedboat menuju ke Pulau Derawan dengan waktu tempuh kurang lebih 30 menit. Setelah tiba di Pulau Derawan, check in dan acara bebas hingga tiba waktu untuk makan malam, kembali menuju penginapan untuk beristirahat.', 'HARI 2 : SANGALAKI – KAKABAN – MARATUA (MP, MS-BOX, MM)', 'Setelah sarapan, anda akan diajak untuk menikmati tour ke Pulau, dimulai dari Pulau Sangalaki, dimana anda akan melihat manta apabila beruntung dan ke penangkaran penyu. Setelah itu, menuju Pulau Kakaban dan anda akan snorkeling bersama ubur-ubur tanpa racun dan snorkeling di Palung Kakaban untuk melihat keindahan terumbu karang. Setelah itu, anda akan mengunjungi Pantai Maratua, disana anda dapat melakukan kegiatan foto-foto dan snorkeling. Dan sore harinya anda akan menuju Gusung Sanggalau (akan dikondisikan tergantung pasang surut air,karena gusung ini hanya bisa dikunjungi pada saat air surut). Setelah itu, kembali ke Derawan dan acara bebas. Makan malam di rumah makan lokal. Istirahat.', 'HARI 3 : KEBERANGKATAN DERAWAN - BERAU (MP)', 'Setelah sarapan pagi, check-out dari Derawan. Setelah itu, Anda akan diantar menuju Berau menggunakan speedboat, kemudian dilanjutkan perjalanan darat selama 2 jam 30 menit menuju Bandara Kalimarau Berau untuk penerbangan kembali ke kota tujuan. Perjalanan selesai, sampai bertemu di Tour selanjutnya. Terima kasih.', '', '', 'Akomodasi 2 malam dengan makan pagi', 'Tour dan makan sesuai program', 'Tiket masuk objek wisata Derawan, Sangalaki, Kakaban', 'Transportasi Ac (APV/Avanza)', 'Speed boat', 'Guide lokal', 'Alat snorkeling pada hari ke 2 (masker, selang, pelampung)', 'Noah Maratua Resort', 'Borneo Cottage Maratua', 'Derawan Dive Resort', 1850000, 1850000, 1350000, 1550000),
(115, '2D1N EXOTIC IJEN BANYUWANGI', 2750000, 2, 'Gunung Ijen adalah sebuah gunung berapi yang terletak di perbatasan antara Kabupaten Banyuwangi dan Kabupaten Bondowoso, Jawa Timur. Tinggi gunung ini 2.386 mdpl', '2021-08-04', 'ijen.jpg', 1532759, 'jpg', 'HARI 1 : KETIBAAN SURABAYA – BANYUWANGI (SNACK)', 'Setibanya di Bandara Surabaya, Anda dijemput Kemudian diantar Menuju ke Banyuwangi, perjalanan darat kurang lebih 7 jam. Setelah itu diantar menuju hotel di Banyuwangi untuk check in & istirahat.', 'HARI 2 : IJEN TOUR – SURABAYA / TRANSFER OUT (MP,MS)', 'Dini hari rombongan diantar menuju Pos Paltuding. Sesampainya di Pos Paltuding, trekking kurang lebih 1.5 jam menuju puncak Kawah Ijen. jika ingin ke Blue Fire menempuh perjalanan trekking tambahan sekitar 1 jam. setelah puas menikmati pemandangan Kawah Ijen kembali ke Pos Paltuding. hingga saatnya diantar kembali menuju hotel untuk makan pagi & persiapan check out. Kemudian menuju pusat oleh oleh, hingga saatnya diantar kembali kembali menuju Bandara Surabaya. Perjalanan darat kurang lebih 7 jam. Sampai bertemu kembali dengan AVIA Tour.', '', '', '', '', 'Malam menginap di hotel dengan sarapan pagi', 'Tour dan makan sesuai dengan itinerary', 'Transportasi sesuai jumlah perserta', 'Local Guide berbahasa Indonesia', 'Gratis penggunaan standard masker, tongkat bambu', 'Harga WNI ', 'Tiket masuk objek wisata', 'KAMPOENG JOGLO IJEN', 'Grand Harvest Resort', 'Jiwa Jawa Resort Ijen', 2600000, 2600000, 2200000, 2200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `destinasi` varchar(255) NOT NULL,
  `hotel` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti` varchar(64) NOT NULL,
  `pembayaran` set('Lunas','Konfirmasi','Cancel','Diproses') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `kode`, `nama_lengkap`, `email`, `nomor`, `nik`, `alamat`, `destinasi`, `hotel`, `tanggal`, `harga`, `jumlah`, `total`, `bukti`, `pembayaran`, `created_at`, `updated_at`) VALUES
(328, 38, 'JLN5079', 'Jamal', 'jamal@gmail.com', 2147483647, 2147483647, 'medan sumut', '2D1N EXOTIC IJEN BANYUWANGI', 'Grand Harvest Resort', '2021-08-25', 2600000, 231, 600600000, '610adfb4360f4.jpg', 'Lunas', '2021-09-20 15:14:04', '2021-09-20 15:14:04'),
(329, 38, 'JLN6603', 'Jamal', 'jamal@gmail.com', 2147483647, 2147483647, 'medan sumut', '3D2N EXOTIC DERAWAN OPEN TRIP', 'Borneo Cottage Maratua', '2021-08-18', 1850000, 231, 427350000, '610adfc623c3d.jpg', 'Lunas', NULL, NULL),
(330, 38, 'JLN2113', 'Jamal', 'jamal@gmail.com', 2147483647, 2147483647, 'medan sumut', '2D1N EXOTIC BROMO JAWA TIMUR', 'Cemara Indah Hotel', '2021-09-02', 2600000, 12, 31200000, '610adfda06765.jpg', 'Lunas', NULL, NULL),
(331, 38, 'JLN6250', 'Jamal', 'jamal@gmail.com', 2147483647, 2147483647, 'medan sumut', '3D2N EXOTIC DERAWAN OPEN TRIP', 'Noah Maratua Resort', '2021-08-28', 1350000, 11, 14850000, '610adff35ad20.jpg', 'Lunas', NULL, NULL),
(332, 40, 'JLN1886', 'angga', 'angga@gmail.com', 2147483647, 2147483647, 'medan sumatera utara ', '2D1N EXOTIC IJEN BANYUWANGI', 'Grand Harvest Resort', '2021-08-24', 2200000, 1, 2200000, '610b203cb93ae.png', 'Lunas', NULL, NULL),
(333, 40, 'JLN4030', 'angga', 'angga@gmail.com', 2147483647, 2147483647, 'medan sumatera utara ', '2D1N EXOTIC IJEN BANYUWANGI', 'KAMPOENG JOGLO IJEN', '2021-08-24', 2600000, 12, 31200000, '610b2067b58d6.jpg', 'Lunas', NULL, NULL),
(334, 40, 'JLN3583', 'angga', 'angga@gmail.com', 2147483647, 2147483647, 'medan sumatera utara ', '2D1N EXOTIC BROMO JAWA TIMUR', 'Bromo Permai 1', '2021-08-26', 2600000, 1, 2600000, '610b207e2dff3.jpg', 'Lunas', NULL, NULL),
(335, 40, 'JLN3383', 'angga', 'angga@gmail.com', 2147483647, 2147483647, 'medan sumatera utara ', '3D2N EXOTIC DERAWAN OPEN TRIP', 'Borneo Cottage Maratua', '2021-08-24', 1850000, 121, 223850000, '610b20983bf4c.jpg', 'Lunas', NULL, NULL),
(336, 41, 'JLN2137', 'Teguh Rahmat Syahputra', 'teguhrahmat911@gmail.com', 2147483647, 2147483647, 'Jl. Banjaran, Biru-Biru, Kabupaten Deli Serdang, Sumatera Utara', '2D1N EXOTIC IJEN BANYUWANGI', 'Grand Harvest Resort', '2021-08-07', 2600000, 11, 28600000, '61283c8b1417f.png', 'Lunas', NULL, NULL),
(337, 41, 'JLN7521', 'Teguh Rahmat Syahputra', 'teguhrahmat911@gmail.com', 2147483647, 2147483647, 'Jl. Banjaran, Biru-Biru, Kabupaten Deli Serdang, Sumatera Utara', '2D1N EXOTIC IJEN BANYUWANGI', 'Grand Harvest Resort', '2021-08-21', 2200000, 123, 270600000, '61283c9f497e3.png', 'Lunas', NULL, NULL),
(338, 41, 'JLN4794', 'Teguh Rahmat Syahputra', 'teguhrahmat911@gmail.com', 2147483647, 2147483647, 'Jl. Banjaran, Biru-Biru, Kabupaten Deli Serdang, Sumatera Utara', '2D1N EXOTIC BROMO JAWA TIMUR', 'Cemara Indah Hotel', '2021-08-01', 2600000, 123, 319800000, '61283cb6a42dc.png', 'Lunas', NULL, NULL),
(339, 41, 'JLN4142', 'Teguh Rahmat Syahputra', 'teguhrahmat911@gmail.com', 2147483647, 2147483647, 'Jl. Banjaran, Biru-Biru, Kabupaten Deli Serdang, Sumatera Utara', '3D2N EXOTIC DERAWAN OPEN TRIP', 'Borneo Cottage Maratua', '2021-08-19', 1850000, 123, 227550000, '61283cd5a150f.png', 'Lunas', NULL, NULL),
(340, 41, 'JLN6261', 'Teguh Rahmat Syahputra', 'teguhrahmat911@gmail.com', 2147483647, 2147483647, 'Jl. Banjaran, Biru-Biru, Kabupaten Deli Serdang, Sumatera Utara', '2D1N EXOTIC IJEN BANYUWANGI', 'Grand Harvest Resort', '2021-09-19', 2600000, 12, 31200000, '614217f4df233.png', 'Konfirmasi', '2021-09-20 15:15:01', '2021-09-20 15:15:01'),
(341, 38, 'JLN1719', 'Jamal', 'jamal@gmail.com', 2147483647, 2147483647, 'medan sumut', '3D2N EXOTIC DERAWAN OPEN TRIP', 'Borneo Cottage Maratua', '2022-11-25', 1350000, 12, 16200000, '636291a54c0dc.jpg', 'Konfirmasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor` int(20) NOT NULL,
  `nik` int(16) NOT NULL,
  `password` varchar(24) NOT NULL,
  `gender` set('Pria','Wanita','Lainnya..','') NOT NULL,
  `alamat` text NOT NULL,
  `role` set('admin','client','') NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `nomor`, `nik`, `password`, `gender`, `alamat`, `role`, `otp`) VALUES
(30, 'Teguh Rahmat Syahputra', 'tghrsyahptra', 'teguhrahmat911@gmail.com', 2147483647, 2147483647, 'asd', 'Pria', 'Jl. Banjaran, Biru-Biru, Kabupaten Deli Serdang, Sumatera Utara', 'admin', 4416),
(38, 'Jamal', 'jamal', 'jamal@gmail.com', 2147483647, 2147483647, 'asd', 'Pria', 'medan sumut', 'client', 1657),
(39, 'chantika', 'chantika', 'chantika@gmail.com', 2147483647, 2147483647, 'asd', 'Wanita', 'medan sumatera utara ', 'client', 6274),
(40, 'angga', 'angga', 'angga@gmail.com', 2147483647, 2147483647, 'asd', 'Pria', 'medan sumatera utara ', 'client', 7542),
(41, 'Teguh Rahmat Syahputra', 'rapstronaut124', 'teguhrahmat911@gmail.com', 2147483647, 2147483647, 'asd', 'Pria', 'Jl. Banjaran, Biru-Biru, Kabupaten Deli Serdang, Sumatera Utara', 'client', 3561);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
