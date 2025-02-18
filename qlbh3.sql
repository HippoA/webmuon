-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh3`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

CREATE TABLE `chitiethd` (
  `mact` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahd` int(11) NOT NULL,
  `masp` varchar(40) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`mact`, `soluong`, `mahd`, `masp`, `gia`) VALUES
(171, 1, 80, 'cpm', 25000),
(172, 1, 80, 'chanhl', 28000),
(173, 1, 81, 'cpd', 20000),
(174, 1, 81, 'cldt', 30000),
(177, 1, 83, 'cps', 23000),
(178, 1, 83, 'cxl', 28000),
(179, 9, 84, 'matchal', 28000),
(180, 2, 85, 'matchal', 28000),
(181, 1, 86, 'cldt', 30000),
(182, 1, 87, 'matcham', 23000),
(183, 1, 88, 'tsdaul', 28000),
(184, 1, 89, 'cpm', 25000),
(185, 1, 89, 'daul', 28000),
(186, 1, 90, 'cpm', 25000),
(187, 1, 91, 'daum', 25000),
(188, 1, 92, 'cpm', 25000),
(189, 1, 93, 'matchal', 28000),
(190, 1, 94, 'cpd', 20000),
(191, 1, 95, 'matchal', 28000),
(192, 1, 96, 'cpm', 25000),
(193, 1, 97, 'cpm', 25000),
(194, 1, 98, 'tsdaul', 28000),
(195, 1, 98, 'cpm', 25000),
(199, 1, 100, 'ygxoai', 30000),
(200, 1, 102, 'tsdaul', 28000);

-- --------------------------------------------------------

--
-- Table structure for table `chitiettopping`
--

CREATE TABLE `chitiettopping` (
  `machitiettp` int(11) NOT NULL,
  `mact` int(11) NOT NULL,
  `matopping` varchar(20) NOT NULL,
  `soluong` int(20) NOT NULL,
  `giatopping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiettopping`
--

INSERT INTO `chitiettopping` (`machitiettp`, `mact`, `matopping`, `soluong`, `giatopping`) VALUES
(23, 171, 'tchk', 1, 12000),
(24, 172, 'tct', 1, 10000),
(25, 173, 'tct', 2, 10000),
(26, 177, 'tcd', 1, 10000),
(27, 178, 'tchk', 1, 12000),
(28, 179, 'tcd', 1, 10000),
(29, 182, 'tct', 1, 10000),
(30, 183, 'tct', 1, 10000),
(31, 184, 'td', 1, 5000),
(32, 185, 'trc', 1, 8000),
(33, 191, 'cn', 1, 8000),
(34, 200, 'tchk', 1, 12000),
(35, 200, 'ttt', 1, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `sl` int(11) NOT NULL,
  `topping` varchar(255) DEFAULT NULL,
  `gia` int(11) NOT NULL,
  `giasp` int(11) NOT NULL,
  `gia_topping` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id`, `tensp`, `size`, `sl`, `topping`, `gia`, `giasp`, `gia_topping`) VALUES
(119, 'Cà phê sữa dừa', NULL, 1, '', 25000, 25000, 0),
(120, 'Sinh tố bơ', NULL, 1, '', 25000, 25000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(11) NOT NULL,
  `ngaymua` datetime NOT NULL,
  `tongtien` int(11) NOT NULL,
  `makh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `ngaymua`, `tongtien`, `makh`) VALUES
(80, '2024-12-10 02:02:36', 97000, 4),
(81, '2024-12-10 02:13:05', 70000, 4),
(83, '2024-12-10 06:07:05', 73000, 5),
(84, '2024-12-10 06:22:59', 342000, 5),
(85, '2024-12-10 06:27:12', 56000, 5),
(86, '2024-12-10 06:27:24', 30000, 5),
(87, '2024-12-10 06:28:26', 33000, 5),
(88, '2024-12-10 06:29:07', 43000, 5),
(89, '2024-12-10 06:33:36', 66000, 5),
(90, '2024-12-10 06:34:10', 25000, 5),
(91, '2024-12-10 06:35:19', 25000, 5),
(92, '2024-12-10 06:35:45', 25000, 5),
(93, '2024-12-10 06:36:50', 28000, 5),
(94, '2024-12-10 06:37:24', 20000, 5),
(95, '2024-12-10 06:37:39', 36000, 5),
(96, '2024-12-10 06:38:52', 25000, 5),
(97, '2024-12-10 06:41:46', 25000, 5),
(98, '2024-12-10 12:54:56', 66000, 6),
(100, '2024-12-09 16:00:45', 30000, 6),
(102, '2024-12-10 07:00:50', 48000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(40) NOT NULL,
  `diachi` varchar(40) NOT NULL,
  `sdt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `sdt`) VALUES
(4, 'Đặng Thành An', 'Vĩnh Long', '0987654321'),
(5, 'Trần Tuấn Tú', 'Cần Thơ', '0328471980'),
(6, 'Võ Hoàng Phúc', 'Bến Tre', '0973821344'),
(7, 'Phạm Thị Như Thủy', 'Trà Vinh', '0997865612'),
(14, 'Võ Hoàng Thái', 'Bến Tre', '09723487283'),
(15, 'Phạm Thị Thảo Nguyên', 'Vĩnh Long', '099337837');

-- --------------------------------------------------------

--
-- Table structure for table `lsbanhang`
--

CREATE TABLE `lsbanhang` (
  `magd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `mahd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lsbanhang`
--

INSERT INTO `lsbanhang` (`magd`, `makh`, `mahd`) VALUES
(5, 5, 87),
(6, 5, 88),
(7, 5, 89),
(8, 5, 90),
(9, 5, 91),
(10, 5, 92),
(11, 5, 93),
(12, 5, 94),
(13, 5, 95),
(14, 5, 96),
(15, 5, 97),
(20, 5, 102),
(16, 6, 98),
(18, 6, 100);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `masp` varchar(40) NOT NULL,
  `tensp` varchar(40) NOT NULL,
  `loai` varchar(20) NOT NULL,
  `gia` int(20) NOT NULL,
  `mota` varchar(100) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `anh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`masp`, `tensp`, `loai`, `gia`, `mota`, `size`, `anh`) VALUES
('aaa', 'Trà đá', 'tra', 2000, '', 'M', 'trachanh.jpg'),
('bmq', 'Bánh mì que', 'trangmieng', 12000, '', '', 'banhmique.jpg'),
('ca', 'Cappuccino', 'caphe', 35000, NULL, NULL, 'cappuccino.png'),
('chanhl', 'Trà chanh', 'tra', 28000, NULL, 'L', 'trachanh.jpg'),
('chanhm', 'Trà chanh', 'tra', 25000, NULL, 'M', 'trachanh.jpg'),
('chocolatel', 'Trà sữa chocolate', 'trasua', 28000, NULL, 'L', 'trasuasocola.jpg'),
('chocolatem', 'Trà sữa chocolate', 'trasua', 23000, NULL, 'M', 'trasuasocola.jpg'),
('cldt', 'Trà chanh leo đác thơm', 'tra', 30000, NULL, NULL, 'trachanhleodacthom.jpg'),
('cpd', 'Cà phê đen', 'caphe', 20000, NULL, NULL, 'capheden.jpg'),
('cpm', 'Cà phê muối', 'caphe', 25000, NULL, NULL, 'caphemuoi.jpg'),
('cps', 'Cà phê sữa', 'caphe', 23000, NULL, NULL, 'caphesua.jpg'),
('cpsd', 'Cà phê sữa dừa', 'caphe', 25000, NULL, NULL, 'caphedua.jpg'),
('cxl', 'Trà chanh xoài', 'tra', 28000, NULL, 'L', 'trachanhxoai.jpg'),
('cxm', 'Trà chanh xoài', 'tra', 25000, NULL, 'M', 'trachanhxoai.jpg'),
('daol', 'Trà đào', 'tra', 28000, NULL, 'L', 'tradao.jpg'),
('daom', 'Trà đào', 'tra', 25000, NULL, 'M', 'tradao.jpg'),
('daul', 'Trà dâu', 'tra', 28000, NULL, 'L', 'tradau.jpg'),
('daum', 'Trà dâu', 'tra', 25000, NULL, 'M', 'tradau.jpg'),
('dlcv', 'Trà dưa lưới cam vàng', 'tra', 30000, NULL, NULL, 'tradualuoicamvang.png'),
('donut', 'Donut', 'trangmieng', 25000, NULL, NULL, 'donut.jpg'),
('matchadx', 'Matcha đá xay', 'khac', 28000, NULL, NULL, 'matchadaxay.jpg'),
('matchal', 'Trà sữa matcha', 'trasua', 28000, NULL, 'L', 'trasuamatcha.jpg'),
('matcham', 'Trà sữa matcha', 'trasua', 23000, NULL, 'M', 'trasuamatcha.jpg'),
('mousse', 'Mousse', 'trangmieng', 30000, NULL, NULL, 'mousse.jpg'),
('ndl', 'Trà nhiệt đới', 'tra', 32000, NULL, 'L', 'tranhietdoi.jpeg'),
('ndm', 'Trà nhiệt đới', 'tra', 28000, NULL, 'M', 'tranhietdoi.jpeg'),
('panna', 'Panna cotta', 'trangmieng', 22000, NULL, NULL, 'panna cotta.jpg'),
('socoladx', 'Chocolate đá xay', 'khac', 28000, NULL, NULL, 'socoladaxay.jpg'),
('stbo', 'Sinh tố bơ', 'khac', 25000, NULL, NULL, 'sinhtobo.jpg'),
('stdau', 'Sinh tố dâu', 'khac', 28000, NULL, NULL, 'sinhtodau.jpg'),
('stmc', 'Sinh tố mãng cầu', 'khac', 28000, NULL, NULL, 'sinhtomangcau.jpg'),
('stsapo', 'Sinh tố sapoche', 'khac', 25000, NULL, NULL, 'sinhtosabo.jpg'),
('stsr', 'Sinh tố sầu riêng', 'khac', 28000, NULL, NULL, 'sinhtosaurieng.jpg'),
('sttcl', 'Sữa tươi trân châu đường đen', 'trasua', 32000, NULL, 'L', 'Sua-tuoi-tran-chau-duong-den.jpg'),
('sttcm', 'Sữa tươi trân châu đường đen', 'trasua', 28000, NULL, 'M', 'Sua-tuoi-tran-chau-duong-den.jpg'),
('stxoai', 'Sinh tố xoài', 'khac', 25000, NULL, NULL, 'sinhtoxoai.jpg'),
('sukem', 'Bánh su kem', 'trangmieng', 20000, '5 cái', NULL, 'sukem.jpeg'),
('tdl', 'Trà sữa thái đỏ', 'trasua', 28000, NULL, 'L', 'trasuathaido.jpg'),
('tdm', 'Trà sữa thái đỏ', 'trasua', 23000, NULL, 'M', 'trasuathaido.jpg'),
('tiramisu', 'Tiramisu', 'trangmieng', 28000, NULL, NULL, 'tiramisu.jpg'),
('tmol', 'Trà tắc mật ong', 'tra', 28000, NULL, 'L', 'tratacmatong.jpg'),
('tmom', 'Trà tắc mật ong', 'tra', 25000, NULL, 'M', 'tratacmatong.jpg'),
('tsdaul', 'Trà sữa dâu', 'trasua', 28000, NULL, 'L', 'trasuadau.jpg'),
('tsdaum', 'Trà sữa dâu', 'trasua', 23000, NULL, 'M', 'trasuadau.jpg'),
('ttxl', 'Trà tắc thái xanh', 'tra', 28000, NULL, 'L', 'tra-tac-thai-xanh.jpg'),
('ttxm', 'Trà tắc thái xanh', 'tra', 25000, NULL, 'M', 'tra-tac-thai-xanh.jpg'),
('txl', 'Trà sữa thái xanh', 'trasua', 28000, NULL, 'L', 'trasuathaixanh.jpg'),
('txm', 'Trà sữa thái xanh', 'trasua', 23000, NULL, 'M', 'trasuathaixanh.jpg'),
('vail', 'Trà vải', 'tra', 28000, NULL, 'L', 'travai.jpg'),
('vaim', 'Trà vải', 'tra', 25000, NULL, 'M', 'travai.jpg'),
('vql', 'Trà sữa việt quốc', 'trasua', 28000, NULL, 'L', 'trasuavietquoc.jpg'),
('vqm', 'Trà sữa việt quốc', 'trasua', 23000, NULL, 'M', 'trasuavietquoc.jpg'),
('ygblue', 'Yogurt việt quốc', 'khac', 30000, NULL, NULL, 'blueyogurt.jpg'),
('ygxoai', 'Yogurt xoài', 'khac', 30000, NULL, NULL, 'yogurtmango.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `sdt` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `quyen` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`sdt`, `pass`, `quyen`) VALUES
('0328471980', '-Hell0', 0),
('09723487283', 'Minhthu123@', 0),
('0973821344', '-Ikemen234', 0),
('0987654321', 'babyyyyyyY0_', 0),
('099337837', 'Han123@', 0),
('0997865612', '@@nhienM4', 0),
('88888', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `matopping` varchar(20) NOT NULL,
  `tentopping` varchar(50) NOT NULL,
  `giatopping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`matopping`, `tentopping`, `giatopping`) VALUES
('cn', 'Củ năng', 8000),
('mix', 'Mix full topping', 14000),
('pmt', 'Phô mai tươi', 12000),
('ss', 'Sương sáo', 5000),
('tcd', 'Trân châu đen', 10000),
('tchk', 'Trân châu hoàng kim', 12000),
('tckm', 'Trân châu khoai môn', 10000),
('tct', 'Trân châu trắng', 10000),
('td', 'Thạch dừa', 5000),
('trc', 'Thạch rau câu', 8000),
('ttt', 'Thạch thủy tinh', 8000),
('tv', 'Thạch vải', 8000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD PRIMARY KEY (`mact`),
  ADD KEY `mahd` (`mahd`),
  ADD KEY `masp` (`masp`);

--
-- Indexes for table `chitiettopping`
--
ALTER TABLE `chitiettopping`
  ADD PRIMARY KEY (`machitiettp`),
  ADD KEY `mact` (`mact`,`matopping`),
  ADD KEY `matopping` (`matopping`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `makh` (`makh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`),
  ADD KEY `sdt` (`sdt`);

--
-- Indexes for table `lsbanhang`
--
ALTER TABLE `lsbanhang`
  ADD PRIMARY KEY (`magd`),
  ADD KEY `makh` (`makh`,`mahd`),
  ADD KEY `mahd` (`mahd`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`masp`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`sdt`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`matopping`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethd`
--
ALTER TABLE `chitiethd`
  MODIFY `mact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `chitiettopping`
--
ALTER TABLE `chitiettopping`
  MODIFY `machitiettp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lsbanhang`
--
ALTER TABLE `lsbanhang`
  MODIFY `magd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethd_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `menu` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiettopping`
--
ALTER TABLE `chitiettopping`
  ADD CONSTRAINT `chitiettopping_ibfk_1` FOREIGN KEY (`mact`) REFERENCES `chitiethd` (`mact`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiettopping_ibfk_2` FOREIGN KEY (`matopping`) REFERENCES `topping` (`matopping`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`sdt`) REFERENCES `taikhoan` (`sdt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lsbanhang`
--
ALTER TABLE `lsbanhang`
  ADD CONSTRAINT `lsbanhang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lsbanhang_ibfk_2` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
