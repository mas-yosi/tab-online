-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 27. Mei 2013 jam 19:02
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tab-online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE IF NOT EXISTS `tabungan` (
  `id_tab` int(5) NOT NULL AUTO_INCREMENT,
  `id_user` int(5) NOT NULL,
  `data` text NOT NULL,
  `nominal` int(10) NOT NULL,
  `debit_kredit` varchar(7) NOT NULL,
  `total` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_tab`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id_tab`, `id_user`, `data`, `nominal`, `debit_kredit`, `total`, `tanggal`) VALUES
(88, 24, 'Uang Saku', 200000, 'debit', 200000, '2013-05-27'),
(89, 24, 'Pakan Kucing', 28000, 'kredit', 172000, '2013-05-27'),
(90, 24, 'Simbah Pinjam', 50000, 'kredit', 122000, '2013-05-27'),
(91, 24, 'Beli di Essen', 12000, 'kredit', 110000, '2013-05-27'),
(92, 24, 'Modem', 35000, 'kredit', 75000, '2013-05-27'),
(93, 24, 'Pakan Burung', 5000, 'kredit', 70000, '2013-05-27'),
(94, 24, 'Uang Saku Vino', 5000, 'kredit', 65000, '2013-05-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`) VALUES
(24, 'yosi', 'a'),
(25, 'Syafira', 's');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
