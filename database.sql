-- phpMyAdmin SQL Dump
-- version 2.11.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 06. Januari 2009 jam 20:22
-- Versi Server: 5.0.67
-- Versi PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smanband_LCW`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `dikirim` datetime NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `konten` longtext NOT NULL,
  `tampilkan` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `dikirim`, `judul`, `pengirim`, `konten`, `tampilkan`) VALUES
(1, '2008-12-25 13:21:48', 'Selamat Datang', 'Administrator', 'Selamat datang di website tidak resmi SMA Negeri 20 Bandung.<br />\r\nUntuk sementara website ini sedang dalam tahap pengembangan dan pemeliharaan.<br />\r\nTerima kasih.<br />\r\n<br />\r\nICT 20', 1),
(2, '2008-12-25 14:35:52', 'Merry Christmas &amp; Happy New Year', 'Administrator', 'Kami segenap warga SMA Negeri 20 Bandung mengucapkan Selamat Hari Natal dan Tahun Baru 2009.', 1),
(3, '2008-12-25 14:37:40', 'KBM Semester Genap', 'Administrator', 'Perlu diberitahukan kepada seluruh siswa-siswi SMA Negeri 20 Bandung, bahwa kegiatan belajar mengajar awal semester genap akan dilaksanakan pada tanggal 12 Januari 2009.<br />\r\nKegiatan belajar mengajar akan berlangsung seperti biasa.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE IF NOT EXISTS `bukutamu` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` mediumtext NOT NULL,
  `dikirim` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `nama`, `email`, `pesan`, `dikirim`) VALUES
(1, 'juniorsev3n', 'juniorsev3n@gmail.com', 'testing', '2008-12-25 12:41:13'),
(2, 'guest', 'test@guest.com', 'test guest', '2009-01-04 15:55:59'),
(3, 'PirraDoZe', 'pizzadox619@yahoo.com', 'webnya keren banget :)', '2009-01-04 16:03:16'),
(4, 'guest', 'guest@guest.com', 'alert(''sip'');', '2009-01-04 16:47:12'),
(5, 'admin', 'admin@sman20bandung.sch.id', 'Semoga kita bisa menang..amin', '2009-01-04 17:54:09'),
(6, 'n4fr1', 'juniorsev3n@gmail.com', 'woy cepat2 !!!', '2009-01-04 22:08:09'),
(14, 'ervan', 'ervan.sugiana@yahoo.co.id', 'alus alus..\r\n\r\nberjuang lar!', '2009-01-06 17:54:19'),
(8, 'gilar', 'morphine.majesty@gmail.com', 'keren abis nih website', '2009-01-05 11:16:09'),
(9, 'juniorsev3n', 'juniorsev3n@gmail.com', 'berdoa,berusaha,tawakal..:D', '2009-01-05 15:34:57'),
(10, 'ZanQier', 'samueltheodore21@yahoo.co.id', 'berjuang terus bro !', '2009-01-05 23:28:56'),
(12, 'irfan', 'juniorsev3n@gmail.com', 'cape...', '2009-01-06 07:51:45'),
(13, 'agunk agriza', 'aku.enji@rocketmail.com', 'keren ..', '2009-01-06 11:51:28'),
(15, 'junedz', 'junedian@yahoo.com', 'alus euy..!', '2009-01-06 20:22:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `emagz`
--

CREATE TABLE IF NOT EXISTS `emagz` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `judul` varchar(1000) collate latin1_general_ci NOT NULL,
  `screenshot` varchar(100) collate latin1_general_ci NOT NULL,
  `rilis` date NOT NULL,
  `deskripsi` mediumtext collate latin1_general_ci NOT NULL,
  `swf` varchar(100) character set latin1 NOT NULL,
  `tampilkan` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `konten` (`swf`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `emagz`
--

INSERT INTO `emagz` (`id`, `judul`, `screenshot`, `rilis`, `deskripsi`, `swf`, `tampilkan`) VALUES
(1, 'MAGA20NE #1', 'v1.jpg', '2009-01-06', '<p>Maga20ne adalah majalah elektornik SMAN 20 Bandung. Maga20ne diambil dari kata magazine yang berarti majalah. Lalu digabungkan dengan 20 sehingga terbentuklah kata maga20ne (baca: magazon).</p>\r\n<p>Cerita cover (1st Edition)<br />Cover Maga20ne edisi pertama, dibuat dengan komposisi warna biru yang terang ditambah garis-garis yang seolah-olah memancar dari sinar matahari. Semua itu terinspirasi oleh pancaran sinar mentari pagi yang cerah tak berawan. Ini juga disesuaikan dengan tema LCW yaitu E-Magz For Enlighten School Life (Majalah Elektronik Untuk Menerangi Kehidupan Sekolah). Garis ditengah cover dan tulisan st di atasnya, mengilustrasikan angka 1(st) yang berarti pertama. Mengilustrasikan juga bahwa e-magz ini adalah edisi pertama.</p>', 'v1.swf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `judul` varchar(50) NOT NULL,
  `konten` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`judul`, `konten`) VALUES
('Selamat Datang', '<p align="left">Selamat datang di unofficial website 20.<br />Untuk sementara website ini sedang dalam tahap pengembangan dan pemeliharaan.<br />Terima kasih<br /><br /> ICT 20</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfig`
--

CREATE TABLE IF NOT EXISTS `konfig` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `value` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `konfig`
--

INSERT INTO `konfig` (`id`, `nama`, `value`) VALUES
(1, 'pid', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poll_data`
--

CREATE TABLE IF NOT EXISTS `poll_data` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `poll_data`
--

INSERT INTO `poll_data` (`id`, `judul`) VALUES
(1, 'Bagaimana pendapat anda tentang website ini ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poll_opsi`
--

CREATE TABLE IF NOT EXISTS `poll_opsi` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `pid` int(5) NOT NULL,
  `opsi` varchar(50) collate latin1_general_ci NOT NULL,
  `hits` int(100) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `poll_opsi`
--

INSERT INTO `poll_opsi` (`id`, `pid`, `opsi`, `hits`) VALUES
(1, 1, 'Istimewa', 20),
(2, 1, 'Bagus', 9),
(3, 1, 'Cukup', 4),
(4, 1, 'Kurang', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `judul` varchar(50) NOT NULL,
  `konten` longtext NOT NULL,
  `tampilkan` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `judul`, `konten`, `tampilkan`) VALUES
(7, 'Sejarah', '<p align="justify">Bangunan sekolah SMA Negeri 20 Bandung yang terletak di Jl. Citarum no. 23 Bandung dibangun pada tahun 1930 di atas tanah seluas 6.205,1 m<sup>2</sup> dengan luas bangunan waktu itu 1.536,1 m<sup>2</sup>.<br /> Fungsi bangunan dari semula hingga sekarang tetap sebagai sekolah dengan pemilik dan pengelolanya Dinas Propinsi Jawa Barat yang kondisi bangunannya terawat baik.</p>\r\n<p align="left">Bangunan ini penting untuk dilestarikan karena:</p>\r\n<ol style="text-align: left;">\r\n<li>Merupakan bangunan hasil karya arsitek yang sampai sekarang belum diketahui.</li>\r\n<li>Sebagai bangunan bernilai sejarah kota, karena bangunan ini dapat meningkatkan kulaitas lingkungan kota Bandung pada masa perjalanan sejarah pembangunan "sarana pendidikan bersejarah".</li>\r\n<li>Merupakan bangunan yang mewakili gaya arsitektur modern fungsional dengan elemen art deco.</li>\r\n<li>Merupakan bangunan yang penting dalam lingkungan karena sebagai elemen bangunan penting dalam suatu kawasan dilihat dari segi visual.</li>\r\n<li>Memiliki bentuk bangunan yang langka dan unik.</li>\r\n<li>Bangunan terletak dalam kawasan dilindungi karena berada di kawasan Perumahan Utara dan Tenggara bersejarah.</li>\r\n<li>Bangunan ini penting untuk ilmu pengetahuan karena merupakan objek penelitian dan sumber inspirasi bagi ilmu arsitektur, struktur dan desain.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p align="justify">Pada tanggal 2 Juni 1987 gedung ini dijadikan tempat belajar siswa SMU Negeri 20 Bandung yang sebelumnya digunakan oleh SPG Negeri 2 Bandung sesuai dengan Surat Keputusan Kakanwil Depdikbud Propisnsi Jawa Barat No.663/IO/R/87, dan kepala Sekolah dijabat Drs. R. Mulyadi.</p>\r\n<p align="justify">Saat ini bangunan SMA Negeri 20 Bandung ini sudah memiliki bangunan tambahan yang tidak mengganggu bangunan asli yang tetap dipertahankan sesuai fungsi sebagai cagar budaya. Dengan adanya tambahan bangunan baru, maka sarana belajar di sekolah ini semakin lengkap dan siswa dapat belajar lebih nyaman dan menyenangkan untuk mencapai prestasi yang maksimal. Saat ini SMA Negeri 20 Bandung berada pada jajaran 5 besar dari 27 SMA Negeri yang ada di Kota Bandung, dan terus berbenah diri untuk mencapai hasil yang lebih baik.</p>', 1),
(8, 'Visi &amp; Misi', '<h3 align="left">VISI</h3>\r\n<p align="left">&quot; BERSIH HATI &quot;<br />\r\n<ul style="text-align: left;">\r\n<li><b>Ber</b>kualitas</li>\r\n<li>Ber<b>sih</b></li>\r\n<li>Se<b>hat</b></li>\r\n<li><b>I</b>ndah</li></ul>\r\n\r\n<h3 align="left">MISI</h3>\r\n<ol style="text-align: left;">\r\n<li>Meningkatkan keimanan dan ketakwaan sehingga tercipta warga sekolah yang soleh dan lingkungan yang religius.</li>\r\n<li>Meningkatkan kreatifitas dan prestasi lainnya.</li>\r\n<li>Meningkatkan kedisiplinan dan ketertiban siswa.</li>\r\n<li>Meningkatkan profesionalisme guru dan tata laksana yang berorientasi mutu dan keunggulan.</li>\r\n<li>Meningkatkan komitmen warga sekolah terhadap visi dan misi sekolah.</li>\r\n<li>Meningkatkan budaya yang berpijak pada semangat kekeluargaan.</li>\r\n<li>Meningkatkan kesejahteraan warga sekolah.</li>\r\n<li>Melengkapi kelengkapan sarana dan prasarana sebagai daya dukung peningkatan mutu pendidikan. </li>\r\n</ol>\r\n', 1),
(9, 'Fasilitas', '<ul style="text-align: left;">\r\n<li>Taman</li>\r\n<li>Tempat Parkir</li>\r\n<li>Ruang Tamu</li>\r\n<li>Ruang Tata Usaha</li>\r\n<li>Ruang Kepala Sekolah</li>\r\n<li>Ruang Wakil Kepala Sekolah</li>\r\n<li>Ruang Guru</li>\r\n<li>Pendopo Masjid</li>\r\n<li>Lapangan Basket </li>\r\n<li>Lapangan Voli</li>\r\n<li>Kantin</li>\r\n<li>Perpustakaan</li>\r\n<li>Ruang Multimedia</li>\r\n<li>Ruang Olahraga</li>\r\n<li>Ruang OSIS</li>\r\n<li>Ruang Pramuka</li>\r\n<li>Ruang Paskibra</li>\r\n<li>Ruang Seni Rupa</li>\r\n<li>Laboratorium Komputer </li>\r\n<li>Laboratorium IPA</li>\r\n<li>Laboratorium Bahasa</li>\r\n<li>22 Ruang Kelas</li>\r\n<li>2 Kamar Mandi </li>\r\n<li>3 Gudang</li>\r\n</ul>', 1),
(10, 'Hymne 20', '<p align="left">Mentari pagi bersinar terang<br />\r\nmenyinari bumi persada<br />\r\ndan kusambut pagi dengan langkah pasti<br />\r\ntuk belajar dan berjuang<br />\r\nmenuju harapan bangsa</p>\r\n<p align="left">\r\nKuakan berbakti padamu<br />\r\nmengabdi padamu<br />\r\nSMA Dua Puluh</p>\r\n', 1),
(11, 'Prestasi', '<p align="left">SMA Negeri 20 Bandung sekarang menduduki tingkat 5 besar dari jajaran Sekolah Menengah Atas Negeri di Bandung dan terus berupaya untuk semakin baik. Selain itu SMA Negeri 20 Bandung juga eksis dalam prestasi ekstrakulikuler.</p>\r\n', 1),
(12, 'Ekstrakulikuler', '<p align="left">Tercatat ada 22 buah kelompok ekstrakulikuler yang aktif dan berprestasi.</p>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blok` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `email`, `blok`) VALUES
(1, 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'administrator', 'admin@sman20bandung.sch.id', 0),
