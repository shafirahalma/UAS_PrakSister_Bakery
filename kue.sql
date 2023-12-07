-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table kue.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `id` int NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kue.bank: ~4 rows (approximately)
DELETE FROM `bank`;
INSERT INTO `bank` (`id`, `nama_bank`, `alamat`, `telepon`) VALUES
	(1, 'Bank BRI', 'Blitar', '085730161527'),
	(2, 'Bank BNI', 'Surabaya', '085730161527'),
	(3, 'Mandiri', 'Malang', '085648183191'),
	(4, 'Bank BCA', 'Semarang', '085730161527');

-- Dumping structure for table kue.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` varchar(15) NOT NULL,
  `kode_order` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_bank` int NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `tgl_transfer` datetime NOT NULL,
  `bukti` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_order` (`kode_order`),
  KEY `id_bank` (`id_bank`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`kode_order`) REFERENCES `pesanan` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kue.pembayaran: ~1 rows (approximately)
DELETE FROM `pembayaran`;
INSERT INTO `pembayaran` (`id`, `kode_order`, `id_bank`, `rekening`, `nama_rekening`, `tgl_transfer`, `bukti`) VALUES
	('1', '2', 1, 'BRI', 'BRI syariah', '2023-11-29 22:01:47', 'LUNAS');

-- Dumping structure for table kue.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `kode` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `id_kue` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_bayar` float NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`kode`),
  KEY `id_kue` (`id_kue`) USING BTREE,
  CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_kue`) REFERENCES `produk` (`id_kue`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kue.pesanan: ~2 rows (approximately)
DELETE FROM `pesanan`;
INSERT INTO `pesanan` (`kode`, `tgl`, `id_kue`, `jumlah`, `total_bayar`, `deskripsi`) VALUES
	('2', '2023-11-29', 30, 12, 92000, 'enak'),
	('3', '2023-11-29', 31, 13, 93000, 'mantap');

-- Dumping structure for table kue.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_kue` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL DEFAULT 'ada',
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` float NOT NULL,
  PRIMARY KEY (`id_kue`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table kue.produk: ~4 rows (approximately)
DELETE FROM `produk`;
INSERT INTO `produk` (`id_kue`, `kategori`, `nama`, `keterangan`, `gambar`, `harga`) VALUES
	(30, 'Kue Kering', 'Kue Nastar', 'Enak', 'nastar.jpg', 25000),
	(31, 'Kue Basah', 'Kue Lumpur', 'Lezat', 'kuelumpur.jpg', 10000),
	(32, 'Kue Ulang Tahun', 'Kue Ubi', 'Enak', 'KueUbi.jpg', 100000),
	(33, 'Kue Basah', 'Dadar Gulung', 'Lezat dan Manis', 'dadargulung.jpeg', 15000);

-- Dumping structure for table kue.resep
CREATE TABLE IF NOT EXISTS `resep` (
  `id` varchar(11) NOT NULL,
  `id_kue` int NOT NULL DEFAULT '0',
  `bahan` text NOT NULL,
  `cara_buat` text NOT NULL,
  `gambar_resep` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kue` (`id_kue`),
  CONSTRAINT `FK1` FOREIGN KEY (`id_kue`) REFERENCES `produk` (`id_kue`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kue.resep: ~2 rows (approximately)
DELETE FROM `resep`;
INSERT INTO `resep` (`id`, `id_kue`, `bahan`, `cara_buat`, `gambar_resep`) VALUES
	('RSP002', 30, 'Berikut adalah beberapa bahan yang umum digunakan untuk membuat kue nastar:\r\n\r\nTepung terigu: 250 gram\r\nMentega: 200 gram (suhu ruang)\r\nGula bubuk: 50 gram\r\nTelur kuning: 4 butir\r\nVanili bubuk: Â½ sendok teh\r\nKeju cheddar parut: 100 gram (opsional, untuk isian)\r\nSelai nanas: secukupnya (untuk isian)\r\nTopping: kuning telur (untuk mengoles permukaan nastar sebelum dipanggang)\r\n', 'Berikut adalah langkah-langkah umum untuk membuat kue nastar:\r\n\r\nSiapkan bahan-bahan yang diperlukan dan panaskan oven pada suhu 180Â°C (350Â°F).\r\n\r\nDalam sebuah mangkuk besar, campurkan mentega (suhu ruang) dan gula bubuk. Kocok menggunakan mixer dengan kecepatan rendah hingga tercampur rata dan lembut.\r\n\r\nTambahkan telur kuning satu per satu sambil terus mengocok adonan hingga telur tercampur sempurna.\r\n\r\nMasukkan tepung terigu dan vanili bubuk ke dalam adonan. Aduk rata menggunakan spatula atau tangan hingga adonan menjadi kalis (tidak lengket) dan terbentuk adonan yang dapat dipulung.\r\n\r\nAmbil sebagian kecil adonan nastar dan pipihkan dengan tangan. Beri isian selai nanas di tengah adonan yang telah dipipihkan, kemudian rapatkan adonan di sekitar selai nanas dan bulatkan kembali hingga membentuk bola kecil. Ulangi proses ini sampai adonan habis.\r\n\r\nLetakkan nastar yang telah dibentuk di atas loyang yang dilapisi dengan kertas roti atau diolesi dengan mentega.\r\n\r\nKocok kuning telur, kemudian oleskan di permukaan nastar sebagai topping.\r\n\r\nPanggang nastar dalam oven yang telah dipanaskan selama sekitar 15-20 menit, atau sampai bagian bawahnya terlihat kecokelatan.\r\n\r\nSetelah matang, angkat nastar dari oven dan biarkan dingin dalam suhu ruang.\r\n\r\nNastar siap disajikan. Anda dapat menyimpannya dalam wadah kedap udara untuk menjaga kelembapan.', 'nastar.jpg'),
	('RSP003', 31, 'Berikut adalah beberapa bahan yang umum digunakan untuk membuat kue lumpur (molten chocolate cake):\r\n\r\nDark chocolate (cokelat hitam): 200 gram\r\nMentega: 150 gram\r\nTelur: 4 butir\r\nGula pasir: 150 gram\r\nTepung terigu: 80 gram\r\nBubuk kakao: 30 gram\r\nGaram: 1/4 sendok teh\r\nVanilla ekstrak: 1 sendok teh (opsional)\r\nMinyak zaitun atau mentega (untuk melumuri loyang)', 'Berikut adalah langkah-langkah umum untuk membuat kue lumpur (molten chocolate cake):\r\n\r\nPanaskan oven pada suhu 180Â°C (350Â°F). Siapkan loyang muffin atau ramekin yang dilumuri dengan minyak zaitun atau mentega.\r\n\r\nLelehkan dark chocolate dan mentega dalam mangkuk tahan panas di atas panci dengan air mendidih (metode double boiler). Aduk hingga cokelat dan mentega sepenuhnya meleleh dan tercampur rata. Setelah itu, diamkan sebentar untuk mendinginkan.\r\n\r\nDalam mangkuk terpisah, kocok telur dan gula pasir dengan mixer hingga mengembang dan berwarna cerah.\r\n\r\nTuangkan campuran cokelat yang telah meleleh ke dalam adonan telur dan gula. Aduk rata dengan spatula atau whisk.\r\n\r\nTambahkan tepung terigu, bubuk kakao, garam, dan ekstrak vanila (jika menggunakan) ke dalam adonan cokelat. Aduk hingga semua bahan tercampur rata dan tidak ada gumpalan tepung.\r\n\r\nTuang adonan ke dalam loyang muffin atau ramekin yang telah disiapkan, mengisi sekitar 2/3 bagian loyang.\r\n\r\nPanggang dalam oven yang telah dipanaskan selama sekitar 10-12 menit. Waktu ini dapat bervariasi tergantung pada oven masing-masing dan tingkat kematangan yang diinginkan. Kue lumpur harus memiliki bagian luar yang mengeras, tetapi bagian tengahnya masih lembut dan bergerak saat digoyang.\r\n\r\nSetelah matang, keluarkan kue lumpur dari oven dan biarkan dingin selama beberapa menit. Anda dapat mengeluarkannya dari loyang dengan hati-hati menggunakan sendok atau membalikkan loyang dengan hati-hati.\r\n\r\nSajikan kue lumpur segera dengan taburan gula bubuk, es krim vanila, atau buah segar sebagai hiasan opsional. Potong kue lumpur dan nikmati bagian tengah yang leleh (molten) dan lezat.', 'kuelumpur.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
