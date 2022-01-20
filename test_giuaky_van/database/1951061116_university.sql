-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2022 lúc 08:12 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `1951061116_university`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `magv` int(50) UNSIGNED NOT NULL,
  `hovaten` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trinhdo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chuyenmon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hocham` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hocvi` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coquan` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`magv`, `hovaten`, `ngaysinh`, `gioitinh`, `trinhdo`, `chuyenmon`, `hocham`, `hocvi`, `coquan`) VALUES
(1, 'van', '2001-12-03', 'nu', 'dai hoc', 'tieng nhat', 'dai hoc', 'cu nhan', 'dai hoc thuy loi'),
(2, 'tuan', '2001-01-02', 'nam', 'dai hoc', 'tieng anh', 'dai hoc', 'tien si', 'dai hoc dien luc'),
(3, 'vu', '2001-12-12', 'nam', 'dai hoc', 'tieng phap', 'dai hoc', 'thac si', 'dai hoc cong nghiep'),
(4, 'alan', '2001-02-01', 'nu', 'dai hoc', 'tieng nga', 'dai hoc', 'cu nhan', 'dai hoc thuy loi'),
(5, 'hello', '2021-01-01', 'nam', 'dh', 'cuoi', 'dh', 'dh', 'dhthu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `magv` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
