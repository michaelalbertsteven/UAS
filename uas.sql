-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2024 pada 19.29
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
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `adminuser`
--

INSERT INTO `adminuser` (`id`, `name`, `username`, `email`, `password`, `repassword`) VALUES
(8, 'default', 'default', 'michaelalbertsteven27@gmail.com', '$2y$10$oatCWHJykxmDKbe3qhit4Oggv87jKIRzxyII4HTRZDRXpis/JGDba', '1234'),
(9, 'Michael Albert Steven', 'albert', 'michaelalbertsteven27@gmail.com', '$2y$10$pehGN/LbR9W8tpQyEGmuv.NaNDByuavjNdxSb6l5Vdb5U/dleb1Zu', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `esp32_table_dht11_leds_record`
--

CREATE TABLE `esp32_table_dht11_leds_record` (
  `id` varchar(255) NOT NULL,
  `board` varchar(255) NOT NULL,
  `temperature` float(10,2) NOT NULL,
  `humidity` int(3) NOT NULL,
  `status_read_sensor_dht11` varchar(255) NOT NULL,
  `LED_01` varchar(255) NOT NULL,
  `LED_02` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `esp32_table_dht11_leds_record`
--

INSERT INTO `esp32_table_dht11_leds_record` (`id`, `board`, `temperature`, `humidity`, `status_read_sensor_dht11`, `LED_01`, `LED_02`, `time`, `date`) VALUES
('VYYQawSmVh', 'esp32_01', 26.90, 70, 'SUCCEED', 'OFF', 'OFF', '13:01:42', '2024-06-25'),
('W461US2caQ', 'esp32_01', 27.00, 71, 'SUCCEED', 'OFF', 'OFF', '13:03:48', '2024-06-25'),
('WO5474Dn9h', 'esp32_01', 27.30, 71, 'SUCCEED', 'OFF', 'OFF', '13:06:55', '2024-06-25'),
('wzVKwAEZy7', 'esp32_01', 27.30, 71, 'SUCCEED', 'OFF', 'OFF', '13:06:38', '2024-06-25'),
('XbeilW4wpi', 'esp32_01', 27.20, 72, 'SUCCEED', 'OFF', 'OFF', '13:06:19', '2024-06-25'),
('XGG2jK4nOH', 'esp32_01', 27.10, 71, 'SUCCEED', 'OFF', 'OFF', '13:04:41', '2024-06-25'),
('YJz4cVTCL3', 'esp32_01', 27.10, 71, 'SUCCEED', 'OFF', 'OFF', '13:05:02', '2024-06-25'),
('yt1O7uqwR0', 'esp32_01', 27.20, 72, 'SUCCEED', 'OFF', 'OFF', '13:11:28', '2024-06-25'),
('z7FsaZ0GCl', 'esp32_01', 27.30, 72, 'SUCCEED', 'OFF', 'OFF', '13:08:47', '2024-06-25'),
('ZN7UEcSgZD', 'esp32_01', 27.10, 72, 'SUCCEED', 'OFF', 'OFF', '13:10:19', '2024-06-25'),
('zogSWGCZe2', 'esp32_01', 27.30, 72, 'SUCCEED', 'OFF', 'OFF', '13:11:55', '2024-06-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `esp32_table_dht11_leds_update`
--

CREATE TABLE `esp32_table_dht11_leds_update` (
  `id` varchar(255) NOT NULL,
  `temperature` float(10,2) NOT NULL,
  `humidity` int(3) NOT NULL,
  `status_read_sensor_dht11` varchar(255) NOT NULL,
  `LED_01` varchar(255) NOT NULL,
  `LED_02` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `esp32_table_dht11_leds_update`
--

INSERT INTO `esp32_table_dht11_leds_update` (`id`, `temperature`, `humidity`, `status_read_sensor_dht11`, `LED_01`, `LED_02`, `time`, `date`) VALUES
('esp32_01', 27.30, 72, 'SUCCEED', 'OFF', 'OFF', '13:13:28', '2024-06-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `esp32_table_test`
--

CREATE TABLE `esp32_table_test` (
  `id` varchar(255) NOT NULL,
  `temperature` float(10,2) NOT NULL,
  `humidity` int(3) NOT NULL,
  `status_read_sensor_dht11` varchar(255) NOT NULL,
  `LED_01` varchar(255) NOT NULL,
  `LED_02` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `esp32_table_test`
--

INSERT INTO `esp32_table_test` (`id`, `temperature`, `humidity`, `status_read_sensor_dht11`, `LED_01`, `LED_02`) VALUES
('esp32_01', 0.00, 0, 'SUCCESS', 'OFF', 'OFF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `repassword` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `repassword`, `password`) VALUES
(73, 'Michael Albert Steven', 'michael', 'michaelalbertsteven27@gmail.com', '1234', '$2y$10$55T1PuIr1qAPkPlWUvQSFe2esG552qFfcBYtynr8/psaqezypBgoW'),
(74, 'damana', 'damana', 'michaelalbertsteven27@gmail.com', '12345678', '$2y$10$vP8DmmHpD7u/25H95GruAOOVOgrW1tCaiKuyROu2FiPAFd0gptkoi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `esp32_table_dht11_leds_record`
--
ALTER TABLE `esp32_table_dht11_leds_record`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `esp32_table_dht11_leds_update`
--
ALTER TABLE `esp32_table_dht11_leds_update`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `esp32_table_test`
--
ALTER TABLE `esp32_table_test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
