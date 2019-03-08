-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 12:03 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `choduocphamhapu`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaDH` int(11) NOT NULL,
  `MaSP` varchar(11) NOT NULL,
  `GiaSP` int(11) NOT NULL,
  `SoluongSP` int(11) NOT NULL,
  `Thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(30) NOT NULL,
  `Mieuta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDM`, `TenDM`, `Mieuta`) VALUES
(1, 'Thuốc Phúc Vinh', 'Sản phẩm thuốc tân dược của công ty CP dược phẩm Phúc Vinh'),
(2, 'Thuôc Tân á', 'Sản phẩm thuốc tân dược và thực phẩm chức năng của công ty dược phẩm Tân á'),
(4, 'Thuốc Quang Minh', 'Các sản phẩm thuốc của công ty Dược Quang Minh'),
(5, 'Thuốc bôi, nhỏ', 'Các loại thuốc dùng để bôi, thoa, nhỏ mũi, nhỏ mắt...'),
(6, 'Dầu gội kem', 'Các loại dầu gội, kem bôi, kem dưỡng'),
(7, 'Dầu thoa cao', 'Các loại dầu gió, cao xoa bóp, dầu nóng'),
(8, 'Thuốc đông nam dược Bảo Long', 'Các loại thuốc của công ty Đông nam dược Bảo Long'),
(9, 'tbyt Tăm bông', 'Các loại bông tăm vệ sinh tai, mũi'),
(10, 'tbyt Chỉ nha khoa', 'Các mặt hàng chỉ nha khoa dùng để vệ sinh răng miệng'),
(11, 'tbyt Bông gạc y tế', 'Các mặt hàng bông, gạc y tế'),
(12, 'tbyt Bơm kim tiêm truyền', 'Các sản phẩm kim tiêm, dây truyền dịch của Vinahancook và một số hãng khác'),
(13, 'tbyt Khẩu trang găng tay đè lư', 'Khẩu trang giấy, găng tay phẫu thuật, đè lưỡi gỗ trẻ em'),
(14, 'tbyt Miếng dán', 'Các loiaj miếng dán hạ sốt, miếng dán nhiệt'),
(15, 'tbyt Nhiệt độ', 'Các loại nhiệt độ điện tử, thủy ngân...'),
(16, 'tbyt Băng keo dán', 'Các sản phẩm băng dán, băng chun, băng xô, băng lụa, giấy ăn'),
(17, 'tbyt Dụng cụ hút vệ sinh', 'Các sản phẩm dùng để vệ sinh tai, mũi, họng trẻ em, hỗ trợ hút sữa sản phụ'),
(18, 'tbyt Túi chờm', 'Sản phẩm túi chườm nóng, chườm lạnh các loại'),
(19, 'tbyt Bao cao su gen bôi trơn', 'Bao cao su và Gen bôi trơn các loại');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(5) NOT NULL,
  `MaPhuongthucgiao` int(3) NOT NULL,
  `Ngaylapdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ngaygiaohang` datetime NOT NULL,
  `Nguoinhan` varchar(40) NOT NULL,
  `Diachi` varchar(100) NOT NULL,
  `Phivanchuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `giaohang`
--

CREATE TABLE `giaohang` (
  `MaPhuongthucgiao` int(3) NOT NULL,
  `Congty_phuongthuc` varchar(50) NOT NULL,
  `Dienthoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenDangnhap` varchar(30) NOT NULL,
  `Congty` varchar(50) NOT NULL,
  `Hoten_chucdanh` varchar(50) NOT NULL,
  `Matkhau` varchar(30) NOT NULL,
  `Diachi` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Dienthoai` int(11) NOT NULL,
  `MaLoaiKH` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `loaikhachhang`
--

CREATE TABLE `loaikhachhang` (
  `MaLoaiKH` int(3) NOT NULL,
  `MieutaLoaiKH` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNhaCC` int(5) NOT NULL,
  `TenCongty` varchar(40) NOT NULL,
  `Nguoidaidien` varchar(30) NOT NULL,
  `Diachi` varchar(80) NOT NULL,
  `Thanhpho` varchar(30) NOT NULL,
  `Dienthoai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCC`, `TenCongty`, `Nguoidaidien`, `Diachi`, `Thanhpho`, `Dienthoai`) VALUES
(1, 'Công ty CP Dược phẩm Phúc VInh', 'Đào Văn Bảng', 'Trung Hòa - Hà Nội', '', '0123456789'),
(2, 'Công ty Dược phẩm và Thiết bị y tế Tân Á', 'Đào Văn Khoa', 'Cụm công nghiệp Bích Hòa - Tả Thanh Oai - HN', '', '0989898989');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(5) NOT NULL,
  `Hodem` varchar(20) NOT NULL,
  `Ten` varchar(10) NOT NULL,
  `Chucdanh` varchar(30) NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Diachi` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Matkhau` varchar(30) NOT NULL,
  `Hinhanh` varchar(100) NOT NULL,
  `Luong` int(11) NOT NULL,
  `Dienthoai` int(11) NOT NULL,
  `Role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `Hodem`, `Ten`, `Chucdanh`, `Ngaysinh`, `Diachi`, `Email`, `Matkhau`, `Hinhanh`, `Luong`, `Dienthoai`, `Role`) VALUES
(1, 'Nguyễn Hảo', 'Quân', 'Nhân viên', '1989-02-06', 'Thụy Chính - Thái Thụy - Thái Bình', 'haoquanthaibinh@gmail.com', '1234567', '', 10000000, 976797475, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` varchar(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Mieuta` text NOT NULL,
  `Hinhanh` varchar(150) NOT NULL,
  `Soluongton` int(5) NOT NULL,
  `Soluongnhap` int(5) NOT NULL,
  `Dongiacu` decimal(10,2) NOT NULL,
  `Dongianhap` decimal(10,2) NOT NULL,
  `Giabanmoi` decimal(10,2) NOT NULL,
  `Mucdophanhoi` int(5) NOT NULL,
  `MaDM` int(11) NOT NULL,
  `MaNhaCC` int(5) NOT NULL,
  `Tinhtrang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Mieuta`, `Hinhanh`, `Soluongton`, `Soluongnhap`, `Dongiacu`, `Dongianhap`, `Giabanmoi`, `Mucdophanhoi`, `MaDM`, `MaNhaCC`, `Tinhtrang`) VALUES
('Th001', 'Bổ thận PV', 'Thuốc bổ thận của công ty dược Phú Vinh', '', 50, 100, '100000.00', '98500.00', '100100.00', 0, 1, 1, 1),
('Th002', 'Hoạt huyết PV', 'Thuốc hoạt huyết dưỡng não Phúc Vinh', '', 100, 500, '26000.00', '23000.00', '25000.00', 2, 1, 1, 1),
('Th003', 'La hán quả Tân Á', 'Viên ngậm la hán quả trị ho, đờm của công ty dược phẩm và thiết bị y tế Tân Á', '', 100, 2000, '24000.00', '22300.00', '24500.00', 1, 2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaDH`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `FK_MaKH` (`MaKH`),
  ADD KEY `FK_Phuongthucgiao` (`MaPhuongthucgiao`),
  ADD KEY `FK_MaNV` (`MaNV`) USING BTREE;

--
-- Indexes for table `giaohang`
--
ALTER TABLE `giaohang`
  ADD PRIMARY KEY (`MaPhuongthucgiao`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `FK_MaLoaiKH` (`MaLoaiKH`);

--
-- Indexes for table `loaikhachhang`
--
ALTER TABLE `loaikhachhang`
  ADD PRIMARY KEY (`MaLoaiKH`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCC`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `FK_MaDM` (`MaDM`) USING BTREE,
  ADD KEY `Fk_MaNhaCC` (`MaNhaCC`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giaohang`
--
ALTER TABLE `giaohang`
  MODIFY `MaPhuongthucgiao` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaikhachhang`
--
ALTER TABLE `loaikhachhang`
  MODIFY `MaLoaiKH` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCC` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`MaPhuongthucgiao`) REFERENCES `giaohang` (`MaPhuongthucgiao`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MaLoaiKH`) REFERENCES `loaikhachhang` (`MaLoaiKH`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmucsanpham` (`MaDM`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaNhaCC`) REFERENCES `nhacungcap` (`MaNhaCC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;