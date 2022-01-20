-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2022 lúc 05:50 PM
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
-- Cơ sở dữ liệu: `check_b`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blood_donor`
--

CREATE TABLE `blood_donor` (
  `bd_id` int(20) UNSIGNED NOT NULL,
  `bd_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bd_sex` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bd_age` int(11) DEFAULT NULL,
  `bd_bgroup` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bd_reg_date` date DEFAULT NULL,
  `bd_phno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blood_donor`
--

INSERT INTO `blood_donor` (`bd_id`, `bd_name`, `bd_sex`, `bd_age`, `bd_bgroup`, `bd_reg_date`, `bd_phno`) VALUES
(1, 'van', 'nu', 20, 'A', '2021-12-01', '0453243423'),
(2, 'tuan', 'nam', 21, 'AB', '2021-11-12', '03423432'),
(3, 'vu', 'nam', 22, 'B', '2021-12-14', '05325234'),
(4, 'alan', 'nu', 20, 'A', '2021-10-01', '0125435234');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`bd_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `bd_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
