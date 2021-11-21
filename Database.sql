-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 01:53 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_ltweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(5) DEFAULT NULL,
  `MSHH` int(5) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaDatHang` int(11) DEFAULT NULL,
  `GiamGia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(4, 27, 30, 30000, 0),
(4, 25, 3, 40000, 0),
(4, 24, 5, 30000, 0),
(5, 27, 8, 30000, 0),
(5, 26, 11, 30000, 0),
(5, 25, 10, 40000, 0),
(7, 27, 1, 30000, 0),
(7, 26, 3, 30000, 0),
(7, 28, 3, 40000, 0),
(8, 28, 1, 40000, 0),
(8, 26, 1, 30000, 0),
(8, 27, 1, 30000, 0),
(8, 29, 1, 40000, 0),
(9, 26, 2, 30000, 0),
(9, 24, 1, 30000, 0),
(10, 26, 1, 30000, 0),
(10, 37, 1, 30000, 0),
(10, 38, 1, 30000, 0),
(11, 42, 1, 25000, 0),
(11, 43, 1, 40000, 0),
(11, 39, 1, 20000, 0),
(11, 36, 1, 20000, 0),
(12, 27, 1, 30000, 0),
(12, 26, 2, 30000, 0),
(12, 41, 1, 25000, 0),
(12, 34, 1, 50000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(5) NOT NULL,
  `NgayDH` date DEFAULT current_timestamp(),
  `NgayGH` date DEFAULT NULL,
  `DiaChiGH` varchar(100) DEFAULT NULL,
  `TrangThaiDH` varchar(100) DEFAULT NULL,
  `MSKH` int(5) DEFAULT NULL,
  `MSNV` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `NgayDH`, `NgayGH`, `DiaChiGH`, `TrangThaiDH`, `MSKH`, `MSNV`) VALUES
(2, '2021-11-14', '2021-11-18', NULL, 'Hủy đơn', 9, 6),
(3, '2021-11-14', '2021-11-14', NULL, 'Đã duyệt', 9, 1),
(4, '2021-11-14', '2021-11-15', NULL, 'Đã duyệt', 9, 6),
(5, '2021-11-14', '2021-11-14', 'Cần Thơ', 'Đã duyệt', 9, 6),
(7, '2021-11-18', '2021-11-20', '9', 'Đã duyệt', 9, 1),
(8, '2021-11-18', '2021-11-18', '9', 'Hủy đơn', 9, 6),
(9, '2021-11-19', '2021-11-20', 'ĐHCT Khu II', 'Đã duyệt', 17, 6),
(10, '2021-11-19', NULL, 'ĐHCT Khu II', 'Chưa duyệt', 9, NULL),
(11, '2021-11-19', NULL, '9', 'Chưa duyệt', 9, NULL),
(12, '2021-11-19', NULL, '9', 'Chưa duyệt', 9, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(5) NOT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `MSKH` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(9, 'Sóc Trăng', 9),
(10, 'Cần Thơ', 9),
(11, 'Kiên Giang', 10),
(19, 'Sóc Trăng', 17),
(20, 'ĐHCT Khu II', 17),
(21, 'ĐHCT Khu II', 9),
(22, 'Kiên Giang', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(5) NOT NULL,
  `TenHH` varchar(100) DEFAULT NULL,
  `MoTa` varchar(10000) DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `SoLuongHang` int(11) DEFAULT NULL,
  `MaLoaiHang` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `MoTa`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
(24, 'Cherry Macarons', 'Cherry Macarons với nhân kem bơ anh đào!', 30000, 29, 7),
(25, 'Lemon Blueberry Cupcakes', 'Bánh cupcake chanh việt quất với kem chanh phủ phô mai.', 40000, 30, 8),
(26, 'Mango Mascarpone Cheesecake', 'Bánh phô mai Mango Mascarpone với đế bánh quy.', 30000, 25, 6),
(27, 'Matcha Pancakes', 'Bánh pancake soufflé của Nhật Bản là một phiên bản cực kỳ nhẹ và xốp của bánh kếp \r\ntruyền thống của Mỹ. Chiều cao ấn tượng của chúng đạt được bằng cách đánh lòng trắng \r\ntrứng đến đỉnh cứng và gấp chúng lại vào bột. Điều này dẫn đến sự thông thoáng giống \r\nnhư súp đặc trưng của họ. Bạn đã sẵn sàng để thưởng thức những chiếc bánh kếp thơm \r\nngon này chứ!', 30000, 29, 6),
(28, 'Caramel & Pear Mousse Cake', 'Bánh quy hạnh nhân joconde, mousse caramel, lê caramel và mousse lê.', 40000, 27, 6),
(29, 'Fudge Brownie Mudslide Ice Cream Cake', 'Cà phê và sô cô la, bánh hạnh nhân và kem: công thức làm bánh kem này là sự kết \r\nhợp hoàn hảo hai lần. Với các lớp bánh hạnh nhân béo ngậy và kem béo ngậy, không \r\ncó kem cà phê, đó là món tráng miệng mùa hè hoàn hảo.', 40000, 30, 6),
(34, 'Vegan Strawberry Cheesecake', 'Món bánh phô mai dâu tây không cần nướng thuần chay dễ làm này được làm với lớp kem \r\nsữa chua dâu tây nhẹ nhàng, thơm ngon và thơm ngon trên lớp vỏ bánh quy giòn đơn giản!', 50000, 30, 9),
(35, 'Red Velvet Cheesecake Cupcakes', 'Red Velvet Cheesecake Cupcakes là một món ăn hoàn hảo trong Ngày lễ tình nhân sẽ \r\nlàm hài lòng bất kỳ ai yêu thích bánh ngọt và chúng cũng vô cùng đáng yêu! Một sự \r\nkết hợp ngon lành của bánh pho mát mịn trên lớp vỏ nhung đỏ.', 25000, 30, 8),
(36, 'Lemon Cupcake', 'Những chiếc bánh cupcake chanh tự làm này mềm mịn, ẩm và phủ lớp kem bơ chanh. \r\nHương cam quýt là sự cân bằng hoàn hảo giữa ngọt ngào và hương thơm, hoàn hảo cho những người yêu thích chanh thực sự.', 20000, 30, 8),
(37, 'Matcha Latte Doughnuts', 'Chiếc bánh rán hoàn hảo để bổ sung tinh thần cho buổi sáng của bạn.', 30000, 30, 15),
(38, 'Matcha Macarons', 'Những chiếc bánh macaron matcha này chứa đầy vị trà xanh đậm đà!', 30000, 30, 7),
(39, 'Oreo Mini Cheesecakes', 'Những chiếc bánh Cheesecakes Mini Oreo thơm ngon này được làm từ nhân bánh phô mát kem và những miếng bánh quy Oreo tạo nên một hương vị tuyệt vời.', 20000, 30, 6),
(40, 'Strawberry Cake with Biscuit Crumbles', 'Những chiếc bánh quy shortcake dâu tây vụn này được làm bằng hỗn hợp bánh kem dâu \r\ntây. Chúng mềm và dai và được phủ một lớp mousse vani thơm ngon', 25000, 30, 6),
(41, 'Red Berry Macarons', 'Bánh macaron nhung đỏ phủ kem phô mai quế.', 25000, 30, 7),
(42, 'Carrot Mini Cupcakes', 'Bánh cupcake cà rốt mềm và ẩm được làm hoàn toàn từ đầu với cà rốt nạo thật và lớp phủ kem phô mai ngọt ngào tuyệt đối.', 25000, 30, 8),
(43, 'Red Velvet Donuts', 'Những chiếc bánh rán nhung đỏ ít calo này không sử dụng bơ! Những chiếc bánh rán \r\nnhung đỏ ít calo này mang đến cho bạn sự hài lòng với ít calo và chất béo hơn.', 40000, 30, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(5) NOT NULL,
  `TenHinh` varchar(100) DEFAULT NULL,
  `MSHH` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(24, '1636192285-Cherry Macarons.jfif', 24),
(25, '1636192337-Lemon Blueberry Cupcakes.jfif', 25),
(26, '1636192381-Mango Mascarpone Cheesecake.jfif', 26),
(27, '1636192448-Matcha Pancakes.jfif', 27),
(28, '1636192543-Caramel & Pear Mousse Cake.jfif', 28),
(29, '1636792064-Fudge Brownie Mudslide Ice Cream Cake.jfif', 29),
(34, '1637303220-Vegan Strawberry Cheesecake.jfif', 34),
(35, '1637303452-Red Velvet Cheesecake Cupcakes.jfif', 35),
(36, '1637303589-Lemon Cupcake.jfif', 36),
(37, '1637303675-Matcha Latte Doughnuts.jfif', 37),
(38, '1637304163-Matcha Macarons.jfif', 38),
(39, '1637304498-Oreo mini Cheesecakes.jfif', 39),
(40, '1637304573-Strawberry Cake with Biscuit Crumbles.jfif', 40),
(41, '1637304647-Red Berry Macarons.jfif', 41),
(42, '1637304955-Carrot Mini Cupcakes.jfif', 42),
(43, '1637305278-Red Velvet Donuts.jfif', 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(50) DEFAULT NULL,
  `TenCongTy` varchar(50) DEFAULT NULL,
  `SoDienThoai` varchar(11) DEFAULT NULL,
  `SoFax` varchar(11) DEFAULT NULL,
  `MatKhau` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `MatKhau`) VALUES
(9, 'Đỗ Thị Hồng An', '', '0387473591', '', '202cb962ac59075b964b07152d234b70'),
(10, 'Phạm Lê', 'PL', '0941649826', '', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Hồng Phúc', '', '0386423258', '', '202cb962ac59075b964b07152d234b70'),
(18, 'An', '', '0387473599', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(5) NOT NULL,
  `TenLoaiHang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(6, 'Cake'),
(7, 'Macarons'),
(8, 'Cupcakes'),
(9, 'Cheesecakes'),
(15, 'Doughnuts');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(100) DEFAULT NULL,
  `ChucVu` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(11) DEFAULT NULL,
  `MatKhau` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `MatKhau`) VALUES
(1, 'Admintrastor', 'Trùm', 'Cần Thơ', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Hồng An', 'Nhân viên', 'Sóc Trăng', '0387473591', '1679091c5a880faf6fb5e6087eb1b2dc'),
(7, 'An An', 'Nhân viên', 'Cần Thơ', '0387474591', '202cb962ac59075b964b07152d234b70');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD KEY `FK_chitietdathang_dathang` (`SoDonDH`),
  ADD KEY `FK_chitietdathang_hanghoa` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `FK_dathang_khachhang` (`MSKH`),
  ADD KEY `FK_dathang_nhanvien` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `FK_diachikh_khachhang` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `FK_hanghoa_loaihanghoa` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `FK_hinhhanghoa_hanghoa` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `FK_chitietdathang_dathang` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitietdathang_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `FK_dathang_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_dathang_nhanvien` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `FK_diachikh_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_hanghoa_loaihanghoa` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `FK_hinhhanghoa_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
