-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2022 lúc 04:49 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlytracnghiem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `MaCH` varchar(20) NOT NULL,
  `NoiDung` varchar(300) NOT NULL,
  `HinhAnh` varchar(250) DEFAULT NULL,
  `MaMH` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`MaCH`, `NoiDung`, `HinhAnh`, `MaMH`) VALUES
('CH0001', 'Khi thực thi biến câu lệnh $a = $b % $c; thì kiểu dữ liệu (type) của biến a là:                                                    ', '', 'PTPMMNM'),
('CH0002', 'Ký hiệu nào dùng để kết thúc câu lệnh trong PHP?                                                    ', '', 'PTPMMNM'),
('CH0003', 'Kiểu dữ liệu (type) nào sẽ được gán cho biến var khi thực hiện lệnh $var = 50.0;                                                    ', '', 'PTPMMNM'),
('CH0005', 'Phần mềm nào sau đây đọc được tập tin PDF                                              ', '', 'THCS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachquyen`
--

CREATE TABLE `danhsachquyen` (
  `IDNhom` varchar(20) NOT NULL,
  `IDQuyen` varchar(50) NOT NULL,
  `GhiChu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhsachquyen`
--

INSERT INTO `danhsachquyen` (`IDNhom`, `IDQuyen`, `GhiChu`) VALUES
('GIANGVIEN', 'QUANLYDANHMUC', NULL),
('GIANGVIEN', 'QUANLYSINHVIEN', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dapan`
--

CREATE TABLE `dapan` (
  `MaDA` varchar(20) NOT NULL,
  `DapAn` varchar(300) NOT NULL,
  `DungSai` tinyint(4) NOT NULL,
  `MaCH` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dapan`
--

INSERT INTO `dapan` (`MaDA`, `DapAn`, `DungSai`, `MaCH`) VALUES
('DA0001', 'double                                ', 0, 'CH0001'),
('DA0002', 'integer                                                    ', 1, 'CH0001'),
('DA0003', 'string                                              ', 0, 'CH0001'),
('DA0004', 'boolean                                                    ', 0, 'CH0001'),
('DA0005', 'dấu cảm thán ( ! )                                                                            ', 0, 'CH0002'),
('DA0006', 'dấu chấm đôi ( :: )                                                                            ', 0, 'CH0002'),
('DA0007', 'dấu phẩy ( , )                                                   ', 0, 'CH0002'),
('DA0008', 'dấu chấm phẩy ( ; )                                                    ', 1, 'CH0002'),
('DA0009', 'boolean                                                ', 0, 'CH0003'),
('DA0010', 'double                                                   ', 1, 'CH0003'),
('DA0011', 'string                                             ', 0, 'CH0003'),
('DA0012', 'integer                                                ', 0, 'CH0003'),
('DA0013', 'Foxit Reader                                                    ', 1, 'CH0005'),
('DA0014', 'Microsoft Excel                                              ', 0, 'CH0005'),
('DA0015', 'Microsoft Powerpoint                                                    ', 0, 'CH0005'),
('DA0016', 'Microsoft Word                                                    ', 0, 'CH0005');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(11) NOT NULL,
  `SoCauDung` int(11) NOT NULL,
  `SoCauSai` int(11) NOT NULL,
  `SoCauChuaChon` int(11) NOT NULL,
  `DiemSo` double NOT NULL,
  `maSV` varchar(10) DEFAULT NULL,
  `MaKT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`id`, `SoCauDung`, `SoCauSai`, `SoCauChuaChon`, `DiemSo`, `maSV`, `MaKT`) VALUES
(43, 2, 1, 0, 6.67, 'SV0001', 'KT0001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kythi`
--

CREATE TABLE `kythi` (
  `MaKT` varchar(20) NOT NULL,
  `TenKT` varchar(50) NOT NULL,
  `ThoiGian` int(11) NOT NULL,
  `ThoiGianBD` datetime(3) NOT NULL,
  `ThoiGianKT` datetime(3) NOT NULL,
  `maNV` varchar(10) NOT NULL,
  `MaMH` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kythi`
--

INSERT INTO `kythi` (`MaKT`, `TenKT`, `ThoiGian`, `ThoiGianBD`, `ThoiGianKT`, `maNV`, `MaMH`) VALUES
('KT0001', 'Kiểm tra giữa kì PHP', 1, '2022-01-03 17:35:00.000', '2022-01-03 17:54:00.000', 'NV0001', 'PTPMMNM'),
('KT0002', 'Kiểm tra 15p THCS', 15, '2022-01-03 18:00:00.000', '2022-01-03 18:45:00.000', 'NV0002', 'THCS'),
('KT0003', 'Kiểm tra giữa kì thiết kế web', 60, '2022-01-03 18:26:00.000', '2022-01-03 19:26:00.000', 'NV0003', 'TKW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kythi_cauhoi`
--

CREATE TABLE `kythi_cauhoi` (
  `MaKT` varchar(20) NOT NULL,
  `MaCH` varchar(20) NOT NULL,
  `GhiChu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kythi_cauhoi`
--

INSERT INTO `kythi_cauhoi` (`MaKT`, `MaCH`, `GhiChu`) VALUES
('KT0001', 'CH0001', NULL),
('KT0001', 'CH0002', NULL),
('KT0001', 'CH0003', NULL),
('KT0002', 'CH0005', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsubailam`
--

CREATE TABLE `lichsubailam` (
  `MaKT` varchar(20) NOT NULL,
  `maSV` varchar(10) NOT NULL,
  `MaCH` varchar(20) NOT NULL,
  `MaDA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lichsubailam`
--

INSERT INTO `lichsubailam` (`MaKT`, `maSV`, `MaCH`, `MaDA`) VALUES
('KT0001', 'SV0001', 'CH0001', 'DA0002'),
('KT0001', 'SV0001', 'CH0002', 'DA0008'),
('KT0001', 'SV0001', 'CH0003', 'DA0009'),
('KT0002', 'SV0001', 'CH0005', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaLop` varchar(10) NOT NULL,
  `TenLop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`) VALUES
('60CNTT1', 'Khóa 60 tin học 1'),
('60CNTT2', 'Khóa 60 tin học 2'),
('60CNTT3', 'Khóa 60 tin học 3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMH` varchar(10) NOT NULL,
  `TenMH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMH`, `TenMH`) VALUES
('PTPMMNM', 'Phát triển phần mềm mã nguồn mở'),
('THCS', 'Tin học cơ sở'),
('THTHCS', 'Thực hành tin học cơ sở'),
('TKW', 'Thiết kế web');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNV` varchar(10) NOT NULL,
  `tenNV` varchar(50) NOT NULL,
  `gioiTinh` tinyint(4) NOT NULL,
  `ngaySinh` date NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `hinhAnh` varchar(250) NOT NULL,
  `IDNhom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`maNV`, `tenNV`, `gioiTinh`, `ngaySinh`, `diaChi`, `email`, `password`, `sdt`, `hinhAnh`, `IDNhom`) VALUES
('NV0001', 'Nguyễn Văn Trí', 1, '2000-10-17', 'Cam Ranh', 'tri@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0365062796', 'tri_avatar.jpg', 'ADMIN'),
('NV0002', 'Hoàng Thanh Sơn', 1, '2000-04-07', 'Cam Lâm', 'sonhoang.070400@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0358405987', 'son_avatar.PNG', 'ADMIN'),
('NV0003', 'Trương Thị Thùy Trang', 0, '2000-03-30', 'Nha Trang', 'truongthithuytrang011@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0354037706', 'trang_avatar.PNG', 'GIANGVIEN'),
('NV0004', 'Nguyễn Tấn Phát', 1, '2000-01-09', 'Nha Trang', 'phat.nt.60cntt@ntu.edu.vn', '81dc9bdb52d04dc20036dbd8313ed055', '0342334966', 'phat_avatar.PNG', 'ADMIN'),
('NV0005', 'Đặng Ngọc Luyến', 1, '2000-01-01', 'Nha Trang', 'dnluyenit2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0977715564', 'luyen_avatar.jpg', 'ADMIN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomnhanvien`
--

CREATE TABLE `nhomnhanvien` (
  `IDNhom` varchar(20) NOT NULL,
  `TenNhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhomnhanvien`
--

INSERT INTO `nhomnhanvien` (`IDNhom`, `TenNhom`) VALUES
('ADMIN', 'Quản trị hệ thống'),
('GIANGVIEN', 'Giảng Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `IDQuyen` varchar(50) NOT NULL,
  `TenQuyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`IDQuyen`, `TenQuyen`) VALUES
('PHANQUYEN', 'Phân quyền'),
('QUANLYDANHMUC', 'Quản lý danh mục'),
('QUANLYSINHVIEN', 'Quản lý sinh viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `maSV` varchar(10) NOT NULL,
  `tenSV` varchar(50) NOT NULL,
  `gioiTinh` tinyint(4) NOT NULL,
  `ngaySinh` date NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `hinhAnh` varchar(250) NOT NULL,
  `MaLop` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`maSV`, `tenSV`, `gioiTinh`, `ngaySinh`, `diaChi`, `email`, `password`, `sdt`, `hinhAnh`, `MaLop`) VALUES
('SV0001', 'Nguyễn Văn Trí', 1, '2000-10-17', 'Cam Ranh', 'svtri@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0365062796', 'tri_avatar.jpg', '60CNTT2'),
('SV0002', 'Hoàng Thanh Sơn', 1, '2000-04-07', 'Cam Lâm', 'svson@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0358405987', 'son_avatar.PNG', '60CNTT2'),
('SV0003', 'Trương Thị Thùy Trang', 0, '2022-01-14', 'Bình Định', 'svtrang@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0354037706', 'trang_avatar.PNG', '60CNTT1'),
('SV0004', 'Đặng Ngọc Luyến', 1, '2022-01-07', 'Gia Lai', 'svluyen@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0354445556', 'luyen_avatar.jpg', '60CNTT3'),
('SV0005', 'Nguyễn Tấn Phát', 1, '2022-01-07', 'Nha Trang', 'svphat@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0354037745', 'phat_avatar.PNG', '60CNTT3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`MaCH`),
  ADD KEY `ch_mh_fk` (`MaMH`);

--
-- Chỉ mục cho bảng `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  ADD PRIMARY KEY (`IDNhom`,`IDQuyen`),
  ADD KEY `dsq_q_fk` (`IDQuyen`);

--
-- Chỉ mục cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD PRIMARY KEY (`MaDA`),
  ADD KEY `da_ch_fk` (`MaCH`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kq_sv_fk` (`maSV`),
  ADD KEY `kq_kt_fk` (`MaKT`);

--
-- Chỉ mục cho bảng `kythi`
--
ALTER TABLE `kythi`
  ADD PRIMARY KEY (`MaKT`),
  ADD KEY `kt_mh_fk` (`MaMH`),
  ADD KEY `kt_nv_fk` (`maNV`);

--
-- Chỉ mục cho bảng `kythi_cauhoi`
--
ALTER TABLE `kythi_cauhoi`
  ADD PRIMARY KEY (`MaKT`,`MaCH`),
  ADD KEY `ktch_ch_fk` (`MaCH`);

--
-- Chỉ mục cho bảng `lichsubailam`
--
ALTER TABLE `lichsubailam`
  ADD PRIMARY KEY (`MaKT`,`maSV`,`MaCH`) USING BTREE,
  ADD KEY `lslb_ch_fk` (`MaCH`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNV`),
  ADD KEY `nv_nnv_fk` (`IDNhom`);

--
-- Chỉ mục cho bảng `nhomnhanvien`
--
ALTER TABLE `nhomnhanvien`
  ADD PRIMARY KEY (`IDNhom`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`IDQuyen`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`maSV`),
  ADD KEY `sv_l_fk` (`MaLop`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `ch_mh_fk` FOREIGN KEY (`MaMH`) REFERENCES `monhoc` (`MaMH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  ADD CONSTRAINT `dsq_nnv_fk` FOREIGN KEY (`IDNhom`) REFERENCES `nhomnhanvien` (`IDNhom`),
  ADD CONSTRAINT `dsq_q_fk` FOREIGN KEY (`IDQuyen`) REFERENCES `quyen` (`IDQuyen`);

--
-- Các ràng buộc cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD CONSTRAINT `da_ch_fk` FOREIGN KEY (`MaCH`) REFERENCES `cauhoi` (`MaCH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `kq_kt_fk` FOREIGN KEY (`MaKT`) REFERENCES `kythi` (`MaKT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kq_sv_fk` FOREIGN KEY (`maSV`) REFERENCES `sinhvien` (`maSV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kythi`
--
ALTER TABLE `kythi`
  ADD CONSTRAINT `kt_mh_fk` FOREIGN KEY (`MaMH`) REFERENCES `monhoc` (`MaMH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kt_nv_fk` FOREIGN KEY (`maNV`) REFERENCES `nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kythi_cauhoi`
--
ALTER TABLE `kythi_cauhoi`
  ADD CONSTRAINT `ktch_ch_fk` FOREIGN KEY (`MaCH`) REFERENCES `cauhoi` (`MaCH`),
  ADD CONSTRAINT `ktch_kt_fk` FOREIGN KEY (`MaKT`) REFERENCES `kythi` (`MaKT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichsubailam`
--
ALTER TABLE `lichsubailam`
  ADD CONSTRAINT `lslb_ch_fk` FOREIGN KEY (`MaCH`) REFERENCES `cauhoi` (`MaCH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lslb_kt_fk` FOREIGN KEY (`MaKT`) REFERENCES `kythi` (`MaKT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nv_nnv_fk` FOREIGN KEY (`IDNhom`) REFERENCES `nhomnhanvien` (`IDNhom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sv_l_fk` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
