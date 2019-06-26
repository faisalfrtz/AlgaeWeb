-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 09:19 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algaeDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `BagMateri`
--

CREATE TABLE `BagMateri` (
  `idBagMateri` int(10) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `Nomor` int(3) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Gambar` varchar(50) NOT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BagMateri`
--

INSERT INTO `BagMateri` (`idBagMateri`, `idMateri`, `Nomor`, `Deskripsi`, `Gambar`, `Flag`) VALUES
(1, 1, 1, 'Step 1', 'no.png', 1),
(2, 1, 2, 'setp 2', 'no1.png', 1),
(3, 1, 3, 'Step 3', 'no2.png', 1),
(51, 2, 1, 'awdaw', 'no.png', 1),
(52, 2, 2, 'awdadw', 'no1.png', 1),
(53, 2, 3, 'awdadw', 'no2.png', 1),
(54, 3, 1, 'Naive Bayes adalah .....', 'no.png', 1),
(55, 4, 1, 'step 1', 'no.png', 1),
(56, 4, 2, 'step 2', 'no1.png', 1),
(57, 4, 3, 'step 3', 'no2.png', 1),
(58, 4, 4, 'step 4', 'no3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftarNilaiQuiz`
--

CREATE TABLE `daftarNilaiQuiz` (
  `id` int(5) NOT NULL,
  `idSoal` int(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nilai` int(3) NOT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarNilaiQuiz`
--

INSERT INTO `daftarNilaiQuiz` (`id`, `idSoal`, `Email`, `Nilai`, `Flag`) VALUES
(7, 1, 'coba@coba', 50, 1),
(8, 2, 'coba@coba', 50, 1),
(9, 2, 'admin@admin', 50, 1),
(10, 1, 'ekarima@yahu.com', 50, 1),
(11, 4, 'admin@admin', 67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftarSoal`
--

CREATE TABLE `daftarSoal` (
  `id` int(11) NOT NULL,
  `idSoal` int(5) NOT NULL,
  `Nomor` int(3) NOT NULL,
  `Isi` text NOT NULL,
  `Gambar` varchar(50) DEFAULT NULL,
  `A` varchar(60) NOT NULL,
  `B` varchar(60) NOT NULL,
  `C` varchar(60) NOT NULL,
  `D` varchar(60) NOT NULL,
  `E` varchar(60) NOT NULL,
  `JwbBenar` char(1) NOT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarSoal`
--

INSERT INTO `daftarSoal` (`id`, `idSoal`, `Nomor`, `Isi`, `Gambar`, `A`, `B`, `C`, `D`, `E`, `JwbBenar`, `Flag`) VALUES
(1, 1, 1, '1 + 1 = ...?', NULL, '2', '3', '4', '5', '6', 'A', 1),
(2, 1, 2, '2 +2 = ?', NULL, '4', '454', '44', '22', '33', 'A', 1),
(3, 2, 1, '<p><img alt=\"\" src=\"https://www.mathworks.com/matlabcentral/mlc-downloads/downloads/submissions/63621/versions/1/screenshot.gif\" style=\"height:222px; width:244px\" /></p>\r\n\r\n<p>Berdasarkan Gambar diatas manakah yang termasuk data point ?</p>\r\n', NULL, 'X', 'Itu yang tanda panah', 'yg kotak buled segitiga', 'X mereun', 'Ah lieur', 'C', 1),
(4, 2, 2, '<p>isilah _ dibawah ini !</p>\r\n\r\n<p>if (k == 1){</p>\r\n\r\n<p>&nbsp;&nbsp; k = __</p>\r\n\r\n<p>}</p>\r\n', NULL, '434', 'adw', 'ahh teuing', 'Lieur', 'auu', 'A', 1),
(5, 4, 1, '<p>1 + 1 = .. ?</p>\r\n', NULL, '1', '2', '3', '4', '5', 'B', 1),
(6, 4, 2, '<p>2 + 2 =</p>\r\n', NULL, '1', '2', '3', '4', '5', 'D', 1),
(7, 4, 3, '<p>23 + 2 = ?</p>\r\n', NULL, '1', '2', '3', '4', 'semua salah', 'E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Forum`
--

CREATE TABLE `Forum` (
  `idForum` int(11) NOT NULL,
  `Tipe` varchar(50) NOT NULL,
  `Nama` varchar(60) NOT NULL,
  `Author` varchar(60) NOT NULL,
  `Kategori` varchar(60) NOT NULL,
  `TglPost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `JumRate` int(10) NOT NULL DEFAULT '0',
  `Rate` int(1) NOT NULL DEFAULT '0',
  `Isi` text NOT NULL,
  `Lampiran` varchar(60) DEFAULT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Forum`
--

INSERT INTO `Forum` (`idForum`, `Tipe`, `Nama`, `Author`, `Kategori`, `TglPost`, `JumRate`, `Rate`, `Isi`, `Lampiran`, `Flag`) VALUES
(1, 'Question and Answer', 'Brute Force Problem ???', 'coba@coba', 'Advance Algorithm', '2017-11-16 09:37:19', 0, 4, 'Algoritma brute force merupakan algoritma pencocokan string yang ditulis tanpa memikirkan peningkatan performa. Algoritma ini sangat jarang dipakai dalam praktik, namun berguna dalam studi pembanding dan studi-studi lainnya. lgoritma brute force merupakan algoritma pencocokan string yang ditulis tanpa memikirkan peningkatan performa. Algoritma ini sangat jarang dipakai dalam praktik, namun berguna dalam studi pembanding dan studi-studi lainnya. lgoritma brute force merupakan algoritma pencocokan string yang ditulis tanpa memikirkan peningkatan performa. Algoritma ini sangat jarang dipakai dalam praktik, namun berguna dalam studi pembanding dan studi-studi lainnya. lgoritma brute force merupakan algoritma pencocokan string yang ditulis tanpa memikirkan peningkatan performa. Algoritma ini sangat jarang dipakai dalam praktik, namun berguna dalam studi pembanding dan studi-studi lainnya. lgoritma brute force merupakan algoritma pencocokan string yang ditulis tanpa memikirkan peningkatan performa. Algoritma ini sangat jarang dipakai dalam praktik, namun berguna dalam studi pembanding dan studi-studi lainnya. lgoritma brute force merupakan algoritma pencocokan string yang ditulis tanpa memikirkan peningkatan performa. Algoritma ini sangat jarang dipakai dalam praktik, namun berguna dalam studi pembanding dan studi-studi lainnya.', 'dist/img/photo2.png', 1),
(2, 'Question and Answer', 'Kenapa Ayam menyebrang jalan ?', 'coba@coba', 'Advance Algorithm', '2017-12-05 03:59:58', 0, 3, '<p>Adwaiidan awdnanowd aowdoajwom awdoaowidia awidianwdi anwdiaidn iwanidna</p>\r\n\r\n<p>awdoadoaowjd awidiawnd awndiawdianwdina.</p>\r\n\r\n<p>awdaomwdomawmd awndawdnoawndaownd awdnaowndonawo haahhahahaha.....</p>\r\n', NULL, 1),
(3, 'BEST FORUM', 'Forum Coba coba', 'coba@coba', 'Basic Algorithm', '2017-12-05 04:23:18', 0, 0, '<p>Aaaaaaaaaaaaaaaaaaaaaaa heeyyyyyyyyyyyyyaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p><img alt=\"\" src=\"data:image/jpeg;base64,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\" style=\"height:225px; width:225px\" /></p>\r\n', NULL, 1),
(4, 'Tips and Trick', 'Tips Dari Saya', 'coba@coba', 'Basic Algorithm', '2017-12-05 04:33:42', 0, 0, '<p>INGAT INGAT</p>\r\n', NULL, 0),
(5, 'Tips and Trick', 'Forum Baru 23', 'admin@admin', 'Basic Algorithm', '2017-12-05 09:45:09', 0, 0, '<p>awdadadawda</p>\r\n', NULL, 0),
(6, 'Tips and Trick', 'K Means', 'admin@admin', 'Advance Algorithm', '2017-12-05 18:05:35', 0, 0, '<p>asdfghuytrewq&nbsp; K means adalah....</p>\r\n\r\n<p><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/KnnClassification.svg/220px-KnnClassification.svg.png\" style=\"height:199px; width:220px\" /></p>\r\n\r\n<p>qlawfkoakodwa</p>\r\n\r\n<p>&nbsp;anwkdnao</p>\r\n', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ForumRate`
--

CREATE TABLE `ForumRate` (
  `idRate` int(11) NOT NULL,
  `idForum` int(10) NOT NULL,
  `RatedBy` varchar(60) NOT NULL,
  `RateValue` int(1) NOT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ForumRate`
--

INSERT INTO `ForumRate` (`idRate`, `idForum`, `RatedBy`, `RateValue`, `Flag`) VALUES
(1, 1, 'coba@coba', 4, 1),
(4, 1, 'ucing@gmail.com', 4, 1),
(5, 2, 'coba@coba', 3, 1),
(6, 1, 'admin@admin', 4, 1),
(7, 1, 'ekarima@yahu.com', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `KomenLikeBy`
--

CREATE TABLE `KomenLikeBy` (
  `id` int(1) NOT NULL,
  `idKomentar` int(5) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Value` int(1) DEFAULT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `KomenLikeBy`
--

INSERT INTO `KomenLikeBy` (`id`, `idKomentar`, `Email`, `Value`, `Flag`) VALUES
(3, 1, 'coba@coba', -1, 1),
(4, 2, 'ucing@gmail.com', 0, 1),
(6, 2, 'coba@coba', -1, 1),
(7, 13, 'coba@coba', -1, 1),
(8, 8, 'coba@coba', -1, 1),
(9, 9, 'coba@coba', -1, 1),
(10, 10, 'coba@coba', -1, 1),
(11, 11, 'coba@coba', -1, 1),
(12, 15, 'coba@coba', 1, 1),
(13, 12, 'admin@admin', 1, 1),
(14, 11, 'admin@admin', -1, 1),
(15, 2, 'ekarima@yahu.com', 1, 1),
(16, 8, 'ekarima@yahu.com', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Komentar`
--

CREATE TABLE `Komentar` (
  `idKomentar` int(10) NOT NULL,
  `Isi` text NOT NULL,
  `TglKomen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Author` varchar(50) NOT NULL,
  `idMateri` int(5) NOT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Komentar`
--

INSERT INTO `Komentar` (`idKomentar`, `Isi`, `TglKomen`, `Author`, `idMateri`, `Flag`) VALUES
(1, 'Hahahahahahahaha.....', '2017-11-14 06:22:24', 'coba@coba', 1, 1),
(2, 'Aing Maung', '2017-11-16 05:17:22', 'ucing@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `KomentarForum`
--

CREATE TABLE `KomentarForum` (
  `idKomentar` int(10) NOT NULL,
  `Isi` text NOT NULL,
  `TglKomen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Author` varchar(50) NOT NULL,
  `idForum` int(5) NOT NULL,
  `Value` int(5) NOT NULL DEFAULT '0',
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `KomentarForum`
--

INSERT INTO `KomentarForum` (`idKomentar`, `Isi`, `TglKomen`, `Author`, `idForum`, `Value`, `Flag`) VALUES
(1, 'asaasdaaksmdkmkenviaenvinanevia\r\naefianefaiic\r\nvasisevmiaivmiamva\r\namvmavema', '2017-11-16 07:34:28', 'coba@coba', 1, 0, 1),
(2, 'asdasadasdasasdadasda', '2017-11-21 08:18:20', 'ucing@gmail.com', 1, 1, 1),
(8, 'Aing Maung', '2017-11-29 06:02:50', 'coba@coba', 1, -2, 1),
(9, 'aaaa aaa', '2017-11-29 06:05:56', 'coba@coba', 1, -1, 1),
(10, 'aaaaads', '2017-11-29 06:08:08', 'coba@coba', 1, 0, 1),
(11, 'aaaa', '2017-11-29 06:10:05', 'coba@coba', 1, -2, 1),
(12, 'asdasdad', '2017-11-29 06:11:40', 'coba@coba', 1, 1, 1),
(13, 'aaaaa', '2017-11-29 06:12:54', 'coba@coba', 1, -1, 1),
(14, 'Aing Maung', '2017-11-29 08:48:18', 'coba@coba', 1, 0, 1),
(15, 'Hayu ah gelut', '2017-12-05 04:23:37', 'coba@coba', 3, 1, 1),
(16, 'Hai', '2017-12-05 17:58:05', 'ekarima@yahu.com', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `learnedBy`
--

CREATE TABLE `learnedBy` (
  `id` int(1) NOT NULL,
  `isLearnedBy` varchar(50) NOT NULL,
  `idMateri` int(5) NOT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learnedBy`
--

INSERT INTO `learnedBy` (`id`, `isLearnedBy`, `idMateri`, `Flag`) VALUES
(1, 'coba@coba', 1, 1),
(2, 'coba@coba', 2, 1),
(3, 'admin@admin', 2, 1),
(4, 'ekarima@yahu.com', 1, 1),
(5, 'admin@admin', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Materi`
--

CREATE TABLE `Materi` (
  `idMateri` int(11) NOT NULL,
  `Nama` varchar(60) DEFAULT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Poin` int(10) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Pict` varchar(60) DEFAULT NULL,
  `JumView` int(5) NOT NULL DEFAULT '0',
  `TglPost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsAccept` int(1) DEFAULT NULL,
  `SubmitBy` varchar(50) DEFAULT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Materi`
--

INSERT INTO `Materi` (`idMateri`, `Nama`, `Kategori`, `Poin`, `Author`, `Pict`, `JumView`, `TglPost`, `IsAccept`, `SubmitBy`, `Flag`) VALUES
(1, 'Depth First Search Algorithm', 'Searching Algorithm', 15, 'coba@coba', 'search.jpg', 150, '2017-11-15 11:14:20', 1, 'Admin', 1),
(2, 'K-Nearest Neighbour', 'Classification Algorithm', 50, 'admin@admin', 'Classification Algorithm.jpg', 0, '2017-12-04 07:10:49', 1, 'Admin', 1),
(3, 'Naive Bayes', 'Classification Algorithm', 80, 'admin@admin', 'Classification Algorithm.jpg', 0, '2017-12-05 15:14:16', 1, 'Admin', 0),
(4, 'K means', 'Clustering Algorithm', 50, 'admin@admin', 'Clustering Algorithm.jpg', 0, '2017-12-05 18:06:57', 1, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `guid` varchar(100) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `nickname`, `guid`, `timestamp`) VALUES
(11, 'Aing Macan', 'Macan', 'f82e5358-4e49-0d10-339c-10c94b71742b', 1512293202),
(12, 'Aing Maung', 'Monyet', '5a79cf85-bdb4-234e-2cd8-fac9ab6e140f', 1512293209),
(13, 'Sia Monyet', 'Macan', 'f82e5358-4e49-0d10-339c-10c94b71742b', 1512293217),
(14, 'Sia nu monyet', 'Monyet', '5a79cf85-bdb4-234e-2cd8-fac9ab6e140f', 1512293223),
(15, 'aduh euy', 'Anonymous', '0daec68f-d113-4069-20e9-c361c083c507', 1512293643),
(16, 'Mang jajang oven day now', 'Mang Jajang', 'c455be89-4ae8-d63e-425a-6aa07f65f6ee', 1512293688),
(17, 'ico sayang mama papah', 'Ica Food', '0daec68f-d113-4069-20e9-c361c083c507', 1512293700),
(18, 'aweu', 'Anonymous', 'c455be89-4ae8-d63e-425a-6aa07f65f6ee', 1512293799),
(19, 'hah', 'Anonymous2', '0daec68f-d113-4069-20e9-c361c083c507', 1512293805),
(20, 'alah siah', 'cobian', '02f0e16a-ef30-ec56-3d36-f67a8f44a053', 1512294076),
(21, 'Kunaon bray', 'cobian', '1c569933-74d3-e24a-b3e4-861c969dac32', 1512294863),
(22, 'aweu aweu', 'cobian', 'c74e1993-d820-7301-e377-db7ae7bf5269', 1512299373),
(23, 'Hai', 'Ayam', 'f575a189-b5f4-047d-8dc0-d0928ba566fa', 1512460496),
(24, 'HAi', 'Admin', '22458755-4c7b-c5ca-e058-84d23b1a915e', 1512461349),
(25, 'ahah', 'Anonymous', '219ad750-073b-1a3e-97c3-71d74d8f60fd', 1512469927),
(26, 'aduuh', 'Eka Nugraha', '9723cb86-bd93-42ba-8da9-9a6faf7a1458', 1512471215),
(27, 'hu', 'cobian ah yu', '9723cb86-bd93-42ba-8da9-9a6faf7a1458', 1512471241),
(28, 'resep', 'cobian ah yu', '9723cb86-bd93-42ba-8da9-9a6faf7a1458', 1512471245);

-- --------------------------------------------------------

--
-- Table structure for table `Soal`
--

CREATE TABLE `Soal` (
  `idSoal` int(11) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Poin` int(5) NOT NULL,
  `Waktu` int(3) DEFAULT NULL,
  `TglPost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Pict` varchar(50) DEFAULT NULL,
  `IsAccept` int(1) DEFAULT '0',
  `SubmitBy` varchar(50) DEFAULT NULL,
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Soal`
--

INSERT INTO `Soal` (`idSoal`, `Kategori`, `Nama`, `Author`, `Poin`, `Waktu`, `TglPost`, `Pict`, `IsAccept`, `SubmitBy`, `Flag`) VALUES
(1, 'Searching Algorithm', 'Deep First Search Quiz #1', 'coba@coba', 10, 10, '2017-12-09 03:17:28', 'search.jpg', 1, 'Admin', 1),
(2, 'Classification Algorithm', 'Kuis KNN #3', 'admin@admin', 80, 15, '2017-12-05 10:42:22', 'Classification Algorithm.jpg', 1, 'Admin', 1),
(3, 'Searching Algorithm', 'Quiz Naive Bayes', 'admin@admin', 80, 10, '2017-12-05 15:17:09', 'Searching Algorithm.jpg', 1, 'Admin', 0),
(4, 'Clustering Algorithm', 'K means Quiz 1', 'admin@admin', 60, 5, '2017-12-05 18:12:44', 'Clustering Algorithm.jpg', 1, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Email` varchar(60) NOT NULL,
  `Tipe` int(1) NOT NULL COMMENT '0 =admin, 1 = pelajar',
  `Nama` varchar(80) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Umur` int(3) NOT NULL,
  `Alamat` varchar(80) NOT NULL,
  `Pekerjaan` varchar(80) NOT NULL,
  `Pict` varchar(80) DEFAULT 'dist/img/user1-128x128.jpg',
  `Password` varchar(20) NOT NULL,
  `Level` int(3) NOT NULL DEFAULT '0',
  `TotPoin` int(5) NOT NULL DEFAULT '0',
  `Title` varchar(80) NOT NULL DEFAULT 'Newbie',
  `Flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Email`, `Tipe`, `Nama`, `Gender`, `Umur`, `Alamat`, `Pekerjaan`, `Pict`, `Password`, `Level`, `TotPoin`, `Title`, `Flag`) VALUES
('admin@admin', 0, 'Admin', 'Pria', 32, 'Street', 'Tukang Ban', 'dist/img/user1-128x128.jpg', 'admin', 57, 1180, 'Expert Pisan', 1),
('coba@coba', 1, 'cobian ah yu', 'Pria', 16, 'jln cobian', 'Mahasiswa', 'dist/img/user1-128x128.jpg', 'asd', 7, 170, 'Newbie Senior', 1),
('dias34@gmail.com', 1, 'Dias Pambadi', 'Pria', 17, 'Jln. Sukabirus no. 35', 'Guru', 'dist/img/user1-128x128.jpg', 'asd', 0, 0, 'Newbie', 1),
('dias3@gmail.com', 1, 'Dias 3', 'Pria', 36, 'Jln. Sukabirus no. 32', 'Guru', 'dist/img/user1-128x128.jpg', 'asd', 0, 0, 'Newbie', 1),
('diasdasi@gmail.com', 1, 'Dias Pambudi', 'Pria', 15, 'Jln. Sukabirus no. 33', 'Mahasiswa', 'dist/img/user1-128x128.jpg', 'dias', 0, 0, 'Newbie', 1),
('ekarima@yahu.com', 1, 'Eka Nugraha', 'Wanita', 54, 'Jln. Sukabirus no. 32', 'Mahasiswa', 'dist/img/user1-128x128.jpg', 'asd', 1, 20, 'Newbie', 1),
('ucing@gmail.com', 1, 'Ucing Ucingan Yuk', 'Wanita', 2, 'Jln. Sukabirus depan alfamart sukabirus', 'Guru', 'dist/img/user1-128x128.jpg', 'asda', 0, 0, 'Newbie', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BagMateri`
--
ALTER TABLE `BagMateri`
  ADD PRIMARY KEY (`idBagMateri`);

--
-- Indexes for table `daftarNilaiQuiz`
--
ALTER TABLE `daftarNilaiQuiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarSoal`
--
ALTER TABLE `daftarSoal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Forum`
--
ALTER TABLE `Forum`
  ADD PRIMARY KEY (`idForum`);

--
-- Indexes for table `ForumRate`
--
ALTER TABLE `ForumRate`
  ADD PRIMARY KEY (`idRate`);

--
-- Indexes for table `KomenLikeBy`
--
ALTER TABLE `KomenLikeBy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Komentar`
--
ALTER TABLE `Komentar`
  ADD PRIMARY KEY (`idKomentar`);

--
-- Indexes for table `KomentarForum`
--
ALTER TABLE `KomentarForum`
  ADD PRIMARY KEY (`idKomentar`);

--
-- Indexes for table `learnedBy`
--
ALTER TABLE `learnedBy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Materi`
--
ALTER TABLE `Materi`
  ADD PRIMARY KEY (`idMateri`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Soal`
--
ALTER TABLE `Soal`
  ADD PRIMARY KEY (`idSoal`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BagMateri`
--
ALTER TABLE `BagMateri`
  MODIFY `idBagMateri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `daftarNilaiQuiz`
--
ALTER TABLE `daftarNilaiQuiz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daftarSoal`
--
ALTER TABLE `daftarSoal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Forum`
--
ALTER TABLE `Forum`
  MODIFY `idForum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ForumRate`
--
ALTER TABLE `ForumRate`
  MODIFY `idRate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `KomenLikeBy`
--
ALTER TABLE `KomenLikeBy`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Komentar`
--
ALTER TABLE `Komentar`
  MODIFY `idKomentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `KomentarForum`
--
ALTER TABLE `KomentarForum`
  MODIFY `idKomentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `learnedBy`
--
ALTER TABLE `learnedBy`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Materi`
--
ALTER TABLE `Materi`
  MODIFY `idMateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `Soal`
--
ALTER TABLE `Soal`
  MODIFY `idSoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
