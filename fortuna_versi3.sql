-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 05:06 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fortuna_versi3`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE IF NOT EXISTS `advertise` (
`id_advertise` int(5) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id_advertise`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'Advertise 1', '#', 'Fortuna_587127advertise.png', '2015-12-17'),
(2, 'Advertise 2', '#', 'Fortuna_633361advertise.png', '2015-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`id_bank` int(11) NOT NULL,
  `no_rekening` varchar(128) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `no_rekening`, `nama`, `nama_bank`, `gambar`) VALUES
(1, '4564782248', 'Ida Ratri Kartika Sari', 'BCA', '400421Bca.jpg'),
(3, '137-00-0619918-2', 'Ida Ratri Kartika Sari', 'MANDIRI', '837341Logo-Bank-Mandiri.png');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`id_banner` int(5) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'Banner 1', '#', 'Fortuna_3425591.jpg', '2015-12-10'),
(2, 'Banner 2', '#', 'Fortuna_4752192.jpg', '2015-12-10'),
(3, 'Banner 3', '#', 'Fortuna_3631893.jpg', '2015-12-10'),
(4, 'Banner 4', '#', 'Fortuna_517089banner_4.jpg', '2015-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(11) NOT NULL,
  `nama_berita` varchar(128) DEFAULT NULL,
  `isi_berita` text,
  `gambar` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `seo` varchar(128) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `nama_berita`, `isi_berita`, `gambar`, `tanggal`, `seo`) VALUES
(1, 'Tips Memilih Random Access Memory (RAM)', '<p><span style="font-family: ''times new roman'', times; font-size: 12pt;">RAM (Random Access Memory) merupakan salah satu dari sekian banyaknya perangkat, yang digunakan untuk menjalankan sebuah komputer. Sebuah RAM dengan kapasitas yang tinggi dapat menunjang performa komputer agar berjalan lebih baik. Pemilihan RAM dengan performa yang bagus tidak hanya dilihat dari kemampuannya&nbsp;saja, namun dari merk dan jenisnya juga.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 12pt; font-family: ''times new roman'', times;">Perbedaan RAM yang mahal dengan umum terdapat pada performa kecepatan dan sistem overclocking dari vendornya. Untuk RAM yang mahal walau tanpa overclocking vendor tetap saja sama dengan RAM yang harga umum. Namun, jika Anda berbelanja di toko hardware komputer, tentu sang penjual menawarkan Anda harga yang lebih mahal tentunya.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 12pt; font-family: ''times new roman'', times;">Untuk membedakan mana RAM yang masih memiliki keadaan standar atau umum dan overclock dapat kita jabarkan sebagai berikut :</span></p>\r\n<p style="padding-left: 30px;"><span style="font-size: 12pt; font-family: ''times new roman'', times;">1. RAM yang sudah di overclocking bisa Anda cek melalui stiker yang tertempal pada RAM tersebut. Jika jenis RAM nya sama-sama DDR3 coba lihat kapasitasnya. RAM berjenis DDR3 ini memiliki varian clock berbeda-beda mulai dari 1 gb, 2 gb, 4 gb, hingga sekarang mencapai 8 gb perkepingnya.</span></p>\r\n<p style="padding-left: 30px;"><span style="font-size: 12pt; font-family: ''times new roman'', times;">2.Biasanya RAM yang memiliki clock yang tinggi dipasangi berupa pendingin atau heatsink khusus agar hasil overclocking dari RAM tersebut tidak membuat RAM tersebut kepanasan.</span></p>\r\n<p><span style="font-family: ''times new roman'', times; font-size: 12pt;">Memilih RAM untuk PC Gaming juga harus berhati-hati. Perhatikan socket yang ada pada motherboard Anda terlebih dahulu. Karena, setiap socket motherboard berbeda-beda bentuk dan ukurannya untuk RAM. Jenis RAM memang berbeda seiring dengan perkembangan jaman yaitu DDR1, DDR2, dan yang sekarang yang terbaru ada DDR3. RAM dengan performa terbaik saat ini adalah DDR3. Bentuk RAM dari DDR3 yaitu memiliki satu patahan kecil pada bagian bawahnya. Atau untuk mengetahuinya bisa juga dengan melihat stiker atau tulisan yang melekat pada papan PCB RAM tersebut.</span></p>\r\n<p><span style="font-family: ''times new roman'', times; font-size: 12pt;">Semakin tinggi clock memory pada RAM tersebut, semakin bagus pula performanya untuk menjalankan aplikasi-aplikasi berat. Biasanya para gamers selalu memilih RAM yang memiliki performa terbaik dengan clock tertinggi yaitu 8 gb. RAM dengan clock seperti ini memang sangat membantu sebuah PC untuk bekerja lebih optimal dan maksimal. Sehingga kemampuan merender aplikasi 3 Dimensi dapat dengan cepat terpenuhi.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-family: ''times new roman'', times; font-size: 12pt;">Sumber: <a href="http://segiempat.com/tips-dan-cara/teknologi/komputer/tips-memilih-ram-yang-bagus-untuk-pc-gaming/"><strong>Segiempat.com</strong></a></span></p>', '28442RAM-corsair.jpg', '2015-01-20', 'tips-memilih-random-access-memory-ram');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`id_brand` int(11) NOT NULL,
  `nama_brand` varchar(128) NOT NULL,
  `seo` varchar(128) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `seo`, `gambar`) VALUES
(2, 'Maspion', 'maspion', 'Fortuna_424468maspion.png'),
(3, 'Quantum', 'quantum', 'Fortuna_440734Quantum.png'),
(4, 'Rinnai', 'rinnai', 'Fortuna_652465rinnai.png'),
(5, 'Philips', 'philips', 'Fortuna_976898philips.png'),
(6, 'Panasonic', 'panasonic', 'Fortuna_933013panasonic.png'),
(7, 'Yong Ma', 'yong-ma', 'Fortuna_12817yong_ma.png');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
`id_catalog` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `seo` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
`id_color` int(11) NOT NULL,
  `color` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id_color`, `color`) VALUES
(6, '#ff0000'),
(5, '#ffffff'),
(4, '#000000'),
(7, '#0000ff');

-- --------------------------------------------------------

--
-- Table structure for table `custom_link`
--

CREATE TABLE IF NOT EXISTS `custom_link` (
`id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `link` varchar(225) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `custom_link`
--

INSERT INTO `custom_link` (`id`, `nama`, `link`, `tanggal`) VALUES
(2, 'Sample1', 'www.fortunajogja.com', '2015-11-10'),
(3, 'Sample Two', '#', '2015-10-13'),
(4, 'Sample three', '#', '2015-10-13'),
(5, 'Sample Four', '#', '2015-10-13'),
(6, 'Sample Five', '#', '2015-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `desk`
--

CREATE TABLE IF NOT EXISTS `desk` (
`id_desk` int(11) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `deskripsi` tinytext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `desk`
--

INSERT INTO `desk` (`id_desk`, `judul`, `deskripsi`, `gambar`, `tgl_posting`) VALUES
(1, 'MONEY BACK', '<p>30 Day Money Back Guarantee.</p>', 'tes', '2016-01-08'),
(2, 'FREE SHIPPING', '<p>free ship-on oder over $600.00</p>', 'tes', '2016-01-08'),
(3, 'SPECIAL SALE', '<p>All items-sale up to 20% off</p>', 'tes', '2016-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
`id_download` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(128) NOT NULL,
  `nama_file` varchar(128) NOT NULL,
  `jumlah_download` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `tanggal`, `judul`, `nama_file`, `jumlah_download`) VALUES
(1, '2015-01-20', 'Garansi DPJ', 'GARANSI DPJ.pdf', 0),
(2, '2015-01-20', 'Form Dealer DPJ', 'form_dealer Welcom.docx', 0),
(14, '2016-01-07', 'Tidak tahu1', 'tes.docx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
`id_foto` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`id_gallery` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1005 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_produk`, `gambar`) VALUES
(1002, 3, 'fortuna_903472yma_2.jpg'),
(1003, 2, 'fortuna_237976yong_ma_2.jpg'),
(1004, 1, 'fortuna_3172911.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE IF NOT EXISTS `jasa` (
`id_jasa` int(2) NOT NULL,
  `jasa_pengiriman` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `jasa_pengiriman`) VALUES
(1, 'JNE');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `seo` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `seo`) VALUES
(1, 'Produk', 'produk');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
`id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `meta_keyword` varchar(100) NOT NULL,
  `meta_deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
`id_konfirmasi` int(11) NOT NULL,
  `no_order` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `no_rekening` varchar(128) NOT NULL,
  `nama_rekening` varchar(128) NOT NULL,
  `nama_bank` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `approve` varchar(5) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
`id_kontak` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(1, 'Nama', 'email@email.com', 'subjek', 'pesan', '2015-12-07'),
(2, 'tes', 'sule@gmail.com', 'tes', 'tes', '2016-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
`id_kota` int(3) NOT NULL,
  `id_jasa` int(2) NOT NULL,
  `nama_kota` varchar(28) NOT NULL,
  `ongkos_kirim` int(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_jasa`, `nama_kota`, `ongkos_kirim`) VALUES
(1, 1, 'GAMBIR - JAKARTA PUSAT', 18000),
(2, 1, 'TANAH ABANG - JAKARTA PUSAT', 18000),
(3, 1, 'MENTENG - JAKARTA PUSAT', 18000),
(4, 1, 'SENEN - JAKARTA PUSAT', 18000),
(5, 1, 'CEMPAKA PUTIH-JAKARTA PUSAT', 18000),
(6, 1, 'JOHAR BARU - JAKARTA PUSAT', 18000),
(7, 1, 'KEMAYORAN - JAKARTA PUSAT', 18000),
(8, 1, 'SAWAH BESAR - JAKARTA PUSAT', 18000),
(9, 1, 'KOJA - JAKARTA UTARA', 18000),
(10, 1, 'KELAPA GADING-JAKARTA UTARA', 18000),
(11, 1, 'TANJUNGPRIOK-JAKARTA UTARA', 18000),
(12, 1, 'PADEMANGAN-JAKARTA UTARA', 18000),
(13, 1, 'PENJARINGAN-JAKARTA UTARA', 18000),
(14, 1, 'CILINCING-JAKARTA UTARA', 18000),
(15, 1, 'MATRAMAN-JAKARTA TIMUR', 18000),
(16, 1, 'PULOGADUNG-JAKARTA TIMUR', 18000),
(17, 1, 'JATINEGARA-JAKARTA TIMUR', 18000),
(18, 1, 'DUREN SAWIT-JAKARTA TIMUR', 18000),
(19, 1, 'KRAMATJATI-JAKARTA TIMUR', 18000),
(20, 1, 'MAKASAR-JAKARTA TIMUR', 18000),
(21, 1, 'PASAR REBO-JAKARTA TIMUR', 18000),
(22, 1, 'CIRACAS-JAKARTA TIMUR', 18000),
(23, 1, 'CIPAYUNG-JAKARTA TIMUR', 18000),
(24, 1, 'CAKUNG-JAKARTA TIMUR', 18000),
(25, 1, 'KEBAYORANBARU-JAKARTASELATAN', 18000),
(26, 1, 'KEBAYORANLAMA-JAKARTASELATAN', 18000),
(27, 1, 'PESANGGRAHAN-JAKARTA SELATAN', 18000),
(28, 1, 'CILANDAK-JAKARTA SELATAN', 18000),
(29, 1, 'PASARMINGGU-JAKARTA SELATAN', 18000),
(30, 1, 'JAGAKARSA-JAKARTA SELATAN', 18000),
(31, 1, 'MAMPANGPRAPATAN-JAKARTASELAT', 18000),
(32, 1, 'PANCORAN-JAKARTA SELATAN', 18000),
(33, 1, 'TEBET-JAKARTA SELATAN', 18000),
(34, 1, 'SETIABUDI-JAKARTA SELATAN', 18000),
(35, 1, 'CENGKARENG-JAKARTA BARAT', 18000),
(36, 1, 'GROGOLPETAMBURAN-JAKARTA BAR', 18000),
(37, 1, 'KALIDERES-JAKARTA BARAT', 18000),
(38, 1, 'KEBON JERUK-JAKARTA BARAT', 18000),
(39, 1, 'KEMBANGAN-JAKARTA BARAT', 18000),
(40, 1, 'PALMERAH-JAKARTA BARAT', 18000),
(41, 1, 'TAMAN SARI-JAKARTA BARAT', 18000),
(42, 1, 'TAMBORA-JAKARTA BARAT', 18000),
(43, 1, 'ANDIR-BANDUNG', 19000),
(44, 1, 'ANTAPANI-BANDUNG', 19000),
(45, 1, 'ARCAMANIK-BANDUNG', 19000),
(46, 1, 'ASTANAANYAR-BANDUNG', 19000),
(47, 1, 'BABAKANCIPARAY-BANDUNG', 19000),
(48, 1, 'BANDUNG KIDUL-BANDUNG', 19000),
(49, 1, 'BANDUNG KULON-BANDUNG', 19000),
(50, 1, 'BANDUNG WETAN-BANDUNG', 19000),
(51, 1, 'BATUNUNGGAL-BANDUNG', 19000),
(52, 1, 'BOJONGLOA KALER-BANDUNG', 19000),
(53, 1, 'BOJONGLOA KIDUL-BANDUNG', 19000),
(54, 1, 'BUAH BATU-BANDUNG', 19000),
(55, 1, 'CIBEUNYING KALER-BANDUNG', 19000),
(56, 1, 'CIBEUNYING KIDUL-BANDUNG', 19000),
(57, 1, 'CIBIRU-BANDUNG', 19000),
(58, 1, 'CICENDO-BANDUNG', 19000),
(59, 1, 'CIDADAP-BANDUNG', 19000),
(60, 1, 'CINAMBO-BANDUNG', 19000),
(61, 1, 'COBLONG-BANDUNG', 19000),
(62, 1, 'GEDEBAGE-BANDUNG', 19000),
(63, 1, 'KIARACONDONG-BANDUNG', 19000),
(64, 1, 'LENGKONG-BANDUNG', 19000),
(65, 1, 'MANDALAJATI-BANDUNG', 19000),
(66, 1, 'PANYILEUKAN-BANDUNG', 19000),
(67, 1, 'RANCASARI-BANDUNG', 19000),
(68, 1, 'REGOL-BANDUNG', 19000),
(69, 1, 'SUKAJADI-BANDUNG', 19000),
(70, 1, 'SUKASARI-BANDUNG', 19000),
(71, 1, 'SUMURBANDUNG-BANDUNG', 19000),
(72, 1, 'UJUNGBERUNG-BANDUNG', 19000),
(73, 1, 'BABAKAN MADANG-BOGOR', 21000),
(74, 1, 'BOJONGGEDE-BOGOR', 21000),
(75, 1, 'CARINGIN-BOGOR', 21000),
(76, 1, 'CARIU-BOGOR', 21000),
(77, 1, 'CIAMPEA-BOGOR', 21000),
(78, 1, 'CIAWI-BOGOR', 21000),
(79, 1, 'CIBINONG-BOGOR', 21000),
(80, 1, 'CIBUNGBULANG-BOGOR', 21000),
(81, 1, 'CIGOMBONG-BOGOR', 21000),
(82, 1, 'CIGUDEG-BOGOR', 21000),
(83, 1, 'CIJERUK-BOGOR', 21000),
(84, 1, 'CILEUNGSI-BOGOR', 21000),
(85, 1, 'CIOMAS-BOGOR', 21000),
(86, 1, 'CISARUA-BOGOR', 21000),
(87, 1, 'CISEENG-BOGOR', 21000),
(88, 1, 'CITEUREUP-BOGOR', 21000),
(89, 1, 'DRAMAGA-BOGOR', 21000),
(90, 1, 'GUNUNG PUTRI-BOGOR', 21000),
(91, 1, 'GUNUNG SINDUR-BOGOR', 21000),
(92, 1, 'JASINGA-BOGOR', 21000),
(93, 1, 'JONGGOL-BOGOR', 21000),
(94, 1, 'KEMANG-BOGOR', 21000),
(95, 1, 'KLAPANUNGGAL-BOGOR', 21000),
(96, 1, 'LEUWILIANG-BOGOR', 21000),
(97, 1, 'LEUWISADENG-BOGOR', 21000),
(98, 1, 'MEGAMENDUNG-BOGOR', 21000),
(99, 1, 'NANGGUNG-BOGOR', 21000),
(100, 1, 'PAMIJAHAN-BOGOR', 21000),
(101, 1, 'PARUNGPANJANG-BOGOR', 21000),
(102, 1, 'PARUNG-BOGOR', 21000),
(103, 1, 'RANCA BUNGUR-BOGOR', 21000),
(104, 1, 'RUMPIN-BOGOR', 21000),
(105, 1, 'SUKAJAYA-BOGOR', 21000),
(106, 1, 'SUKAMAKMUR-BOGOR', 21000),
(107, 1, 'SUKARAJA-BOGOR', 21000),
(108, 1, 'TAJUR HALANG-BOGOR', 21000),
(109, 1, 'TAMANSARI-BOGOR', 21000),
(110, 1, 'TANJUNGSARI-BOGOR', 21000),
(111, 1, 'TENJO-BOGOR', 21000),
(112, 1, 'TENJOLAYA-BOGOR', 21000),
(113, 1, 'BEJI-DEPOK', 21000),
(114, 1, 'BOJONGSARI-DEPOK', 21000),
(115, 1, 'CILODONG-DEPOK', 21000),
(116, 1, 'CIMANGGIS-DEPOK', 21000),
(117, 1, 'CINERE-DEPOK', 21000),
(118, 1, 'CIPAYUNG-DEPOK', 21000),
(119, 1, 'LIMO-DEPOK', 21000),
(120, 1, 'PANCORAN MAS-DEPOK', 21000),
(121, 1, 'SAWANGAN-DEPOK', 21000),
(122, 1, 'SUKMAJAYA-DEPOK', 21000),
(123, 1, 'TAPOS-DEPOK', 21000),
(124, 1, 'BANTARGEBANG-BEKASI', 21000),
(125, 1, 'BEKASI BARAT-BEKASI', 21000),
(126, 1, 'BEKASI SELATAN-BEKASI', 21000),
(127, 1, 'BEKASI TIMUR-BEKASI', 21000),
(128, 1, 'BEKASI UTARA-BEKASI', 21000),
(129, 1, 'JATIASIH-BEKASI', 21000),
(130, 1, 'JATISAMPURNA-BEKASI', 21000),
(131, 1, 'MEDAN SATRIA-BEKASI', 21000),
(132, 1, 'MUSTIKA JAYA-BEKASI', 21000),
(133, 1, 'PONDOK GEDE-BEKASI', 21000),
(134, 1, 'PONDOK MELATI-BEKASI', 21000),
(135, 1, 'RAWALUMBU-BEKASI', 21000),
(136, 1, 'BANJARSARI-CIAMIS', 35000),
(137, 1, 'BAREGBEG-CIAMIS', 35000),
(138, 1, 'KAB.CIAMIS-CIAMIS', 28000),
(139, 1, 'CIDOLOG-CIAMIS', 35000),
(140, 1, 'CIHAURBEUTI-CIAMIS', 35000),
(141, 1, 'CIJEUNGJING-CIAMIS', 35000),
(142, 1, 'CIKONENG-CIAMIS', 35000),
(143, 1, 'CIMARAGAS-CIAMIS', 35000),
(144, 1, 'CIPAKU-CIAMIS', 35000),
(145, 1, 'CISAGA-CIAMIS', 35000),
(146, 1, 'JATINAGARA-CIAMIS', 35000),
(147, 1, 'KAWALI-CIAMIS', 35000),
(148, 1, 'LAKBOK-CIAMIS', 35000),
(149, 1, 'LUMBUNG-CIAMIS', 35000),
(150, 1, 'PAMARICAN-CIAMIS', 35000),
(151, 1, 'PANAWANGAN,CIAMIS', 35000),
(152, 1, 'PANJALU-CIAMIS', 35000),
(153, 1, 'PANUMBANGAN-CIAMIS', 35000),
(154, 1, 'PURWADADI-CIAMIS', 35000),
(155, 1, 'RAJADESA-CIAMIS', 35000),
(156, 1, 'RANCAH-CIAMIS', 35000),
(157, 1, 'SADANANYA-CIAMIS', 35000),
(158, 1, 'SINDANGKASIH-CIAMIS', 35000),
(159, 1, 'SUKADANA-CIAMIS', 35000),
(160, 1, 'SUKAMANTRI-CIAMIS', 35000),
(161, 1, 'TAMBAKSARI-CIAMIS', 35000),
(162, 1, 'PANJALU-CIAMIS', 35000),
(163, 1, 'AGRABINTA-CIANJUR', 42000),
(164, 1, 'BOJONGPICUNG-CIANJUR', 42000),
(165, 1, 'CAMPAKA-CIANJUR', 42000),
(166, 1, 'CAMPAKA MULYA-CIANJUR', 42000),
(167, 1, 'KAB.CIANJUR-CIANJUR', 33000),
(168, 1, 'CIBEBER-CIANJUR', 42000),
(169, 1, 'CIBINONG-CIANJUR', 42000),
(170, 1, 'CIDAUN-CIANJUR', 42000),
(171, 1, 'CIJATI-CIANJUR', 42000),
(172, 1, 'CIKADU-CIANJUR', 42000),
(173, 1, 'CILAKU-CIANJUR', 42000),
(174, 1, 'CIKALONGKULON-CIANJUR', 42000),
(175, 1, 'CIPANAS-CIANJUR', 42000),
(176, 1, 'CIRANJANG-CIANJUR', 42000),
(177, 1, 'CUGENANG-CIANJUR', 42000),
(178, 1, 'GEKBRONG-CIANJUR', 42000),
(179, 1, 'HAURWANGI-CIANJUR', 42000),
(180, 1, 'KADUPANDAK-CIANJUR', 42000),
(181, 1, 'KARANGTENGAH-CIANJUR', 42000),
(182, 1, 'LELES-CIANJUR', 42000),
(183, 1, 'MANDE-CIANJUR', 42000),
(184, 1, 'NARINGGUL-CIANJUR', 42000),
(185, 1, 'PACET-CIANJUR', 42000),
(186, 1, 'PAGELARAN-CIANJUR', 42000),
(187, 1, 'PASIRKUDA-CIANJUR', 42000),
(188, 1, 'SINDANGBARANG-CIANJUR', 42000),
(189, 1, 'SUKALUYU-CIANJUR', 42000),
(190, 1, 'SUKANEGARA-CIANJUR', 42000),
(191, 1, 'SUKARESMI-CIANJUR', 42000),
(192, 1, 'TAKOKAK-CIANJUR', 42000),
(193, 1, 'TANGGEUNG-CIANJUR', 42000),
(194, 1, 'WARUNGKONDANG-CIANJUR', 42000),
(195, 1, 'ARJAWINANGUN-SUMBER', 35000),
(196, 1, 'ASTANAJAPURA-SUMBER', 35000),
(197, 1, 'BABAKAN-SUMBER', 35000),
(198, 1, 'BEBER-SUMBER', 35000),
(199, 1, 'CILEDUG-SUMBER', 35000),
(200, 1, 'CIWARINGIN-SUMBER', 35000),
(201, 1, 'DEPOK-SUMBER', 35000),
(202, 1, 'DUKUPUNTANG-SUMBER', 35000),
(203, 1, 'GEBANG-SUMBER', 35000),
(204, 1, 'GEGESIK-SUMBER', 35000),
(205, 1, 'GEMPOL-SUMBER', 35000),
(206, 1, 'GREGED-SUMBER', 35000),
(207, 1, 'GUNGUNG JATI-SUMBER', 35000),
(208, 1, 'JAMBLANG-SUMBER', 35000),
(209, 1, 'KALIWEDI-SUMBER', 35000),
(210, 1, 'KAPETAKAN-SUMBER', 35000),
(211, 1, 'KARANGSEMBUNG-SUMBER', 35000),
(212, 1, 'KARANGWARENG-SUMBER', 35000),
(213, 1, 'KEDAWUNG-SUMBER', 35000),
(214, 1, 'KLANGENAN-SUMBER', 35000),
(215, 1, 'LEMAHABANG-SUMBER', 35000),
(216, 1, 'LOSARI-SUMBER', 35000),
(217, 1, 'MUNDU-SUMBER', 35000),
(218, 1, 'PABEDILAN-SUMBER', 35000),
(219, 1, 'PABUARAN-SUMBER', 35000),
(220, 1, 'PALIMANAN-SUMBER', 35000),
(221, 1, 'PANGENAN-SUMBER', 35000),
(222, 1, 'PANGURAGAN-SUMBER', 35000),
(223, 1, 'PASALEMAN-SUMBER', 35000),
(224, 1, 'PLERED-SUMBER', 35000),
(225, 1, 'PLUMBON-SUMBER', 35000),
(226, 1, 'SEDONG-SUMBER', 35000),
(227, 1, 'SUMBER-KAB CIREBON', 28000),
(228, 1, 'SURANENGGALA-SUMBER', 35000),
(229, 1, 'SUSUKAN-SUMBER', 35000),
(230, 1, 'SUSUKAN LEBAK-SUMBER', 35000),
(231, 1, 'TALUN-SUMBER', 35000),
(232, 1, 'WALED-SUMBER', 35000),
(233, 1, 'TENGAH TANI-SUMBER', 35000),
(234, 1, 'WERU-SUMBER', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE IF NOT EXISTS `kurir` (
`id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `megamenu`
--

CREATE TABLE IF NOT EXISTS `megamenu` (
`id_megamenu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `memberarea`
--

CREATE TABLE IF NOT EXISTS `memberarea` (
`id_member` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `blokir` varchar(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_session` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `memberarea`
--

INSERT INTO `memberarea` (`id_member`, `nama`, `password`, `alamat`, `no_telp`, `level`, `blokir`, `email`, `id_session`) VALUES
(1, 'Wahyu Elan', '5a06cc059b39d1b3508efe00d044db05', 'Jalan Kaliurang', '08175425259', 'member', 'N', 'wen_2111@yahoo.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `static_content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(1, 'Profile', '', '<p>Sonju Computer adalah perseroan comanditer (CV) yang berkedudukan di Jl. Gajah Mada No. 23E Purwokinanti, Yogyakarta (SIUP No. 169/12-05/ PI/VI/ 2012 &ndash; 2934/13 NPWP No. 31.497.707.5-541.000). Perusahaan kami bergerak dibidang Perdagangan dan jasa computer 2ND maupun New yang telah memulai usaha pada tanggal 14 November 2005.</p>\r\n<p>Pada perkembangannya kami sudah membuka beberapa cabang di kota Jogja dan Cilacap. Dan untuk meningkatkan pelayanan kami pada konsumen yang tidak memiliki waktu datang langsung ke toko kami, maka kami membuka Online Shop dengan harapan kami bisa menjadi kepercayaan Anda untuk memenuhi kebutuhan computer anda.</p>\r\n<p>Motto kami adalah: &ldquo; Kepuasan Anda adalah kesuksesan kami &ldquo;</p>\r\n<p>Layanan cepat :</p>\r\n<p>SMS Hotline : 085729600201<br /> BBM : 3116FD81/ 2A4506BA</p>', '', 'Y', 'admin', 'Y', 0, ''),
(2, 'Maps', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.904307387988!2d110.36730314959375!3d-7.79995527955704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a578661be5c57%3A0x743a5a3cb6896eeb!2sFortuna!5e0!3m2!1sid!2sid!4v1449562560781" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '', 'Y', 'admin', 'Y', 0, ''),
(3, 'Press', '', '<p>Jalan Kaliurang KM 5.5 Gg Pandega Mandala 2355281, Yogyakarta, Indonesia.</p>\r\n<p>&nbsp;</p>', '', 'Y', 'admin', 'Y', 0, ''),
(4, 'Help', '', '<p>Halaman Help</p>', '', 'Y', 'admin', 'Y', 0, ''),
(5, 'FAQ', '', '<p><strong>Frequently Asked Questions :</strong>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>1. Bagaimana Cara Membeli &amp; Bertransaksi?</p>\r\n<p>&nbsp;</p>\r\n<p>Untuk kemudahan Anda dalam berbelanja &amp; bertransaksi mohon mendaftar pada website kami terlebih dahulu dengan klik SIGN IN lalu klik CREATE ACCOUNT. Bila Anda sudah mendaftar akun pada kami silahkan masukan email dan password Anda klik SIGN IN untuk melanjutkan transaksi.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>2.&nbsp;Syarat &amp; Ketentuan</p>\r\n<p>&nbsp;</p>\r\n<p>Harga dari setiap produk yang ada pada www.dpj.co.id merupakan harga terbaru dan kami senantiasa untuk selalu meng-update harga pada setiap produk yang kami jual. Namun jika anda ingin menyakinkan harga terakhir, anda dapat menguhubungi Customer Service kami via telepon, mesengger, atau email. Harga bisa berubah sewaktu-waktu tanpa pemberitahuan sebelumnya dan kami berhak membatalkan transaksi jika terdapat ketidaksesuaian harga dan informasi.</p>\r\n<p>&nbsp;</p>\r\n<p>Sebelum melakukan transaksi dan memasukan barang dalam chart, sebaiknya terlebih dahulu Anda berkomunikasi dengan Customer Service kami, untuk memastikan ketersediaan barang dan memastikan harga barang yang akan Anda beli.</p>\r\n<p>&nbsp;</p>\r\n<p>Tidak semua produk yang kami tampilkan di website adalah ready stock/tersedia di outlet kami. Mengenai waktu ketersediaan barang/lama pesan silakan menghubungi Customer Service kami.</p>\r\n<p>&nbsp;</p>\r\n<p>Pemesanan baru dianggap Final, bila telah ada dana yang masuk ke rekening bank kami. Kecuali pemesanan melalui COD (Cash on Delivery), barang pesanan akan kami antar ke tempat tujuan setelah kami mem-verifikasi keakuratan data dan alamat tujuan.</p>\r\n<p>&nbsp;</p>\r\n<p>Pengiriman barang akan kami lakukan segera setelah kami menerima pembayaran. Lama pengiriman barang disesuaikan dengan jauh dekatnya alamat yang kami terima dan setiap produk yang di kirim kami sarankan untuk di asuransikan untuk mencegah dari hal-hal yang tidak diinginkan seperti kehilangan atau kerusakan selama dalam perjalanan.</p>\r\n<p>&nbsp;</p>\r\n<p>Setiap perkembangan pengiriman produk yang telah anda beli dari www.dpj.co.id dapat anda lihat di account anda dan akan kami konfirmasikan via email, telepon, atau sms.</p>\r\n<p>&nbsp;</p>\r\n<p>Setiap produk yang dibeli dari www.dpj.co.id mendapatkan garansi sesuai dengan ketentuan yang kami tetapkan.</p>\r\n<p>&nbsp;</p>\r\n<p>Barang yang telah dibeli tidak dapat dikembalikan atau ditukar dengan barang lain, kecuali ada perjanjian terlebih dahulu.</p>\r\n<p>&nbsp;</p>\r\n<p>Segala usaha maksimal telah dilakukan untuk menyakinkan ketepatan seluruh informasi yang dimuat. www.dpj.co.id tidak menjamin dengan segala hormat akan ketepatan data tersebut, termasuk spesifikasi produknya maupun editorial.</p>\r\n<p>&nbsp;</p>\r\n<p>Jika dalam masa garansi, barang yang dibeli terjadi kerusakan, silahkan hubungi Customer Service kami untuk konfirmasi lebih lanjut.</p>\r\n<p>&nbsp;</p>\r\n<p>Jika anda tidak menemukan produk yang anda cari, silakan hubungi Customer Service kami via telepon, mesengger, atau email. Kami akan melayani anda dengan senang hati.</p>', '', 'Y', 'admin', 'Y', 0, ''),
(6, 'Store Location', '', '<p>Jl. Mayor Suryotomo No.14, Gondomanan, Yogyakarta 55122</p>', '', 'Y', 'admin', 'Y', 0, ''),
(18, 'Email', '', 'email@domain.com', '', 'Y', 'admin', 'Y', 0, ''),
(19, 'Opening Time', '', '<p>Monday-Friday:08.00 To 18.00</p>\r\n<p>Saturday:09.00 To 20.00</p>\r\n<p>Sunday:10.00 To 20.00</p>', '', 'Y', 'admin', 'Y', 0, ''),
(7, 'Customer Service', '', '<p>CV. SONJU Computer<br />Jl. Gajah Mada 23E Yogyakarta</p>\r\n<p>Tlp. 0274-543219 / 6819783 / 6922818</p>\r\n<p>Fax. 0274- 549856</p>\r\n<p>SMS hotline: 085729600201</p>\r\n<p>BB Pin: 3116FD81/ 2A4506BA/ 7B1B2340/ 7462DF51</p>', '', 'Y', 'admin', 'Y', 0, ''),
(8, 'Contact Us', '', '<p>CV. SONJU Computer<br />Jl. Gajah Mada 23E Yogyakarta</p>\r\n<p>Tlp. 0274-543219/6819783/6922818</p>\r\n<p>Fax. 0274- 549856</p>\r\n<p>SMS hotline: 085729600201</p>\r\n<p>BB Pin: 3116FD81/ 2A4506BA/ 7B1B2340/ 7462DF51</p>\r\n<p>YM: sonjuonline/ sonju.gbu_market/ sonju_gbumarket @yahoo.com</p>\r\n<p><span style="font-family: times new roman,times; font-size: 12pt;"><span style="font-family: ''book antiqua'', palatino; font-size: 14pt;">Untuk pertanyaan, kritik dan saran. Mohon isi form dibawah ini atau chat via Yahoo Messenger.</span><br /></span></p>', '', 'Y', '', 'Y', 0, ''),
(9, 'Terms and Condition', '', '<div id="content" class="grid_12">\r\n<p><span style="font-size: medium; font-family: times new roman,times;"><span style="text-decoration: underline;"><strong><span style="font-size: 14pt;">Syarat dan Ketentuan pengiriman :</span></strong></span></span></p>\r\n<p>&nbsp;</p>\r\n</div>', '', 'Y', 'admin', 'Y', 0, ''),
(16, 'Keyword Website', '', 'Fortuna Jogja, Toko Fortuna Jogja, Toko berkualitas Jogja', '', 'Y', 'admin', 'Y', 0, ''),
(10, 'Register Account', '', 'Silahkan isi form dibawah ini dengan benar.', '', 'Y', 'admin', 'Y', 0, ''),
(11, 'Payment Confirmation', '', 'payment confirmation, silahkan mengisi form berikut ini untuk konfirmasi pembayaran.', '', 'Y', 'admin', 'Y', 0, ''),
(12, 'Fast Support', '', '0274 - XXX XXX / XXX XXX', '', 'Y', '', 'Y', 0, ''),
(13, 'How to Order', '', '<p>Cara pemesanan masih sedang dalam penginputan data</p>', '', 'Y', 'admin', 'Y', 0, ''),
(14, 'Title Website', '', 'Fortuna - Melengkapi Alat Rumah Tangga Anda', '', 'Y', 'admin', 'Y', 0, ''),
(15, 'Description Website', '', 'Toko Fortuna melengkapi segala kebutuhan rumah tangga Anda. Toko fortuna beralamat di Jalan Mayor Suryotomo No.14, Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122', '', 'Y', 'admin', 'Y', 0, ''),
(17, 'HOTLINE', '', '08XX XXXX XXXX', '', 'Y', 'admin', 'Y', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id_orders` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `nomor` varchar(24) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `status_order` varchar(50) NOT NULL DEFAULT 'Baru',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `nama`, `alamat`, `nomor`, `email`, `id_jasa`, `id_kota`, `status_order`, `tgl_order`, `jam_order`, `id_member`) VALUES
(10, 'GANANG', 'JALAN PARIS', '087838717701', 'admin@admin.com', 1, 20, 'Baru', '2016-01-27', '10:17:02', 0),
(8, 'dasdasda', 'dasdasd', '3423423', 'man@gmail.com', 1, 18, 'Baru', '2016-01-25', '16:53:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_color` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `jumlah`, `id_color`) VALUES
(1, 2, 1, 0),
(2, 9, 1, 0),
(8, 1, 1, 0),
(10, 5, 2, 0),
(10, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
`id_orders_temp` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `stok_temp` varchar(100) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `id_color` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `orders_temp`
--

INSERT INTO `orders_temp` (`id_orders_temp`, `id_produk`, `id_session`, `jumlah`, `stok_temp`, `tgl_order_temp`, `jam_order_temp`, `id_color`) VALUES
(14, 6, 'sfv5ri8su2mk9usb48edbnsvu2', 2, '5', '2016-01-25', '14:13:15', 0),
(13, 8, 'sfv5ri8su2mk9usb48edbnsvu2', 4, '5', '2016-01-25', '13:46:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL,
  `id_subsub` int(11) NOT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `tgl_masuk` datetime NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `produk_seo` varchar(100) DEFAULT NULL,
  `kode` varchar(50) NOT NULL,
  `harga` int(20) DEFAULT NULL,
  `berat` varchar(11) NOT NULL,
  `garansi` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `detail` text,
  `discount` int(3) DEFAULT '0',
  `special` varchar(128) DEFAULT NULL,
  `tampil_depan` varchar(1) NOT NULL DEFAULT 'N',
  `deals` varchar(1) NOT NULL DEFAULT 'N',
  `featured` varchar(1) NOT NULL DEFAULT 'N',
  `best` varchar(1) NOT NULL DEFAULT 'N',
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_subkategori`, `id_subsub`, `id_brand`, `tgl_masuk`, `nama_produk`, `produk_seo`, `kode`, `harga`, `berat`, `garansi`, `stok`, `detail`, `discount`, `special`, `tampil_depan`, `deals`, `featured`, `best`, `gambar`) VALUES
(1, 1, 1, 5, '2015-12-16 13:19:04', 'Setlika', 'setlika', '', 150000, '1', '1 Tahun', 5, '<p>Deskripsi sedang dalam penginputan</p>', 0, '', 'Y', 'Y', 'Y', 'Y', 'fortuna_19832.jpg'),
(2, 1, 2, 7, '2015-12-16 17:25:54', 'Yong Ma', 'yong-ma', '', 150000, '', '1 Tahun', 5, '<p>Sedang dalam penginputan</p>', 0, 'hot', 'Y', 'Y', 'Y', 'Y', 'fortuna_977081yong_ma.jpg'),
(3, 1, 1, 7, '2015-12-16 15:14:26', 'Magic Jar 2', 'magic-jar-2', '', 150000, '2', '1 Tahun', 5, '<p>Deskripsi sedang dalam penginputan data</p>', 10, 'promo', 'Y', 'Y', 'Y', 'Y', 'fortuna_481323yma.jpg'),
(5, 1, 2, 7, '2015-12-16 17:25:54', 'Yong Ma', 'yong-ma', '', 150000, '', '1 Tahun', 5, '<p>Sedang dalam penginputan</p>', 0, 'hot', 'Y', 'Y', 'Y', 'Y', 'fortuna_977081yong_ma.jpg'),
(6, 1, 2, 7, '2015-12-16 17:25:54', 'Yong Ma', 'yong-ma', '', 150000, '', '1 Tahun', 5, '<p>Sedang dalam penginputan</p>', 0, 'hot', 'Y', 'Y', 'Y', 'Y', 'fortuna_977081yong_ma.jpg'),
(7, 1, 2, 7, '2015-12-16 17:25:54', 'Yong Ma', 'yong-ma', '', 150000, '', '1 Tahun', 5, '<p>Sedang dalam penginputan</p>', 0, 'hot', 'Y', 'Y', 'Y', 'Y', 'fortuna_977081yong_ma.jpg'),
(8, 1, 2, 7, '2015-12-16 17:25:54', 'Yong Ma', 'yong-ma', '', 150000, '', '1 Tahun', 5, '<p>Sedang dalam penginputan</p>', 0, 'hot', 'Y', 'Y', 'Y', 'Y', 'fortuna_977081yong_ma.jpg'),
(9, 1, 2, 7, '2015-12-16 17:25:54', 'Yong Ma', 'yong-ma', '', 150000, '', '1 Tahun', 5, '<p>Sedang dalam penginputan</p>', 0, 'hot', 'Y', 'Y', 'Y', 'Y', 'fortuna_977081yong_ma.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
`id_slide` int(11) NOT NULL,
  `judul` varchar(128) DEFAULT NULL,
  `tagline` varchar(128) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `gambar` varchar(128) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `judul`, `tagline`, `link`, `gambar`) VALUES
(1, 'NEW ARRIVAL', 'DISKON HINGGA 50%', '#', 'Fortuna_297851slide1.png'),
(9, 'HOT ITEM', 'JANGAN SAMPAI KEHABISAN', '#', 'Fortuna_133880slide1.png');

-- --------------------------------------------------------

--
-- Table structure for table `sosial`
--

CREATE TABLE IF NOT EXISTS `sosial` (
`id_sosial` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sosial`
--

INSERT INTO `sosial` (`id_sosial`, `judul`, `link`, `gambar`) VALUES
(1, 'Facebook', 'https://www.facebook.com/Sonju Computer', '788302Facebook Round.png'),
(2, 'Twitter', 'https://twitter.com/sonjucomputer', '273506Twitter round.png');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('36.73.83.47', '2015-10-05', 5, '1444041297'),
('::1', '2015-10-06', 20, '1444125177'),
('::1', '2015-10-07', 70, '1444201457'),
('::1', '2015-10-08', 1, '1444292944'),
('::1', '2015-10-13', 1, '1444720890'),
('::1', '2015-10-15', 9, '1444903842'),
('::1', '2015-11-16', 35, '1447642213'),
('::1', '2015-11-24', 1, '1448348652'),
('::1', '2016-01-08', 88, '1452245626'),
('::1', '2016-01-25', 272, '1453715787'),
('::1', '2016-01-26', 1, '1453781825'),
('::1', '2016-01-27', 13, '1453890659'),
('::1', '2016-01-28', 36, '1453951709');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE IF NOT EXISTS `subkategori` (
`id_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `seo` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `id_kategori`, `nama`, `seo`) VALUES
(1, 1, 'Kategori', 'kategori-1'),
(2, 1, 'Kategori 2', 'kategori-2'),
(3, 1, 'Kategori 3', 'kategori-3'),
(4, 1, 'Kategori 4', 'kategori-4');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
`id_subscribe` int(11) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id_subscribe`, `email`) VALUES
(1, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subsub_kategori`
--

CREATE TABLE IF NOT EXISTS `subsub_kategori` (
`id_subsub` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `seo` varchar(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subsub_kategori`
--

INSERT INTO `subsub_kategori` (`id_subsub`, `id_subkategori`, `nama`, `seo`) VALUES
(1, 1, 'Sub Kategori 1', 'sub-kategori-1'),
(2, 1, 'Sub Kategori 2', 'sub-kategori-2'),
(3, 1, 'Sub Kategori 3', 'sub-kategori-3'),
(4, 2, 'Sub Kategori 1', 'sub-kategori-1'),
(5, 2, 'Sub Kategori 2', 'sub-kategori-2'),
(6, 3, 'Sub Kategori 1', 'sub-kategori-1'),
(7, 4, 'Sub Kategori 1', 'sub-kategori-1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_color`
--

CREATE TABLE IF NOT EXISTS `sub_color` (
`id_sub_color` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sub_color`
--

INSERT INTO `sub_color` (`id_sub_color`, `id_color`, `id_produk`) VALUES
(7, 5, 3),
(6, 6, 3),
(8, 4, 3),
(9, 6, 8),
(10, 5, 8),
(11, 4, 8),
(12, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sub_ukuran`
--

CREATE TABLE IF NOT EXISTS `sub_ukuran` (
`id_subukuran` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `price_ukuran` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE IF NOT EXISTS `ukuran` (
`id_ukuran` int(11) NOT NULL,
  `ukuran` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'sales@sonju.com', '0274-549856', 'admin', 'N', '8tgbd5vfvo5h2p9n63qvaiulr7');

-- --------------------------------------------------------

--
-- Table structure for table `ym`
--

CREATE TABLE IF NOT EXISTS `ym` (
`id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ym`
--

INSERT INTO `ym` (`id`, `username`, `nama`) VALUES
(1, 'sonjuonline', 'sonjuonline'),
(2, 'sonju.gbu_market', 'sonju.gbu_market'),
(3, 'sonju_gbumarket', 'sonju_gbumarket');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
 ADD PRIMARY KEY (`id_advertise`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
 ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
 ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `custom_link`
--
ALTER TABLE `custom_link`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desk`
--
ALTER TABLE `desk`
 ADD PRIMARY KEY (`id_desk`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
 ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
 ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
 ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
 ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
 ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `megamenu`
--
ALTER TABLE `megamenu`
 ADD PRIMARY KEY (`id_megamenu`);

--
-- Indexes for table `memberarea`
--
ALTER TABLE `memberarea`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
 ADD PRIMARY KEY (`id_orders_temp`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
 ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `sosial`
--
ALTER TABLE `sosial`
 ADD PRIMARY KEY (`id_sosial`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
 ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
 ADD PRIMARY KEY (`id_subscribe`);

--
-- Indexes for table `subsub_kategori`
--
ALTER TABLE `subsub_kategori`
 ADD PRIMARY KEY (`id_subsub`);

--
-- Indexes for table `sub_color`
--
ALTER TABLE `sub_color`
 ADD PRIMARY KEY (`id_sub_color`);

--
-- Indexes for table `sub_ukuran`
--
ALTER TABLE `sub_ukuran`
 ADD PRIMARY KEY (`id_subukuran`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
 ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ym`
--
ALTER TABLE `ym`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
MODIFY `id_advertise` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `id_banner` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `custom_link`
--
ALTER TABLE `custom_link`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `desk`
--
ALTER TABLE `desk`
MODIFY `id_desk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
MODIFY `id_jasa` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
MODIFY `id_kota` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `megamenu`
--
ALTER TABLE `megamenu`
MODIFY `id_megamenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memberarea`
--
ALTER TABLE `memberarea`
MODIFY `id_member` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sosial`
--
ALTER TABLE `sosial`
MODIFY `id_sosial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
MODIFY `id_subscribe` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subsub_kategori`
--
ALTER TABLE `subsub_kategori`
MODIFY `id_subsub` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sub_color`
--
ALTER TABLE `sub_color`
MODIFY `id_sub_color` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sub_ukuran`
--
ALTER TABLE `sub_ukuran`
MODIFY `id_subukuran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ym`
--
ALTER TABLE `ym`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
