-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2021 lúc 05:38 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangluong`
--

CREATE TABLE `bangluong` (
  `id` int(11) NOT NULL,
  `tenbangluong` varchar(255) NOT NULL,
  `mabangluong` varchar(255) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `tinhtrang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bangluong`
--

INSERT INTO `bangluong` (`id`, `tenbangluong`, `mabangluong`, `ngaybatdau`, `ngayketthuc`, `tinhtrang`) VALUES
(2, 'Bảng lương tháng 1', 'TENPHIEU1', '2021-01-15', '2021-01-31', 'Chưa nhập'),
(6, 'Bảng lương tháng 2', 'TENPHIEU3', '2021-02-01', '2021-02-28', '7/8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong_details`
--

CREATE TABLE `chamcong_details` (
  `id` int(11) NOT NULL,
  `id_CC` int(11) NOT NULL,
  `id_NV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chamcong_details`
--

INSERT INTO `chamcong_details` (`id`, `id_CC`, `id_NV`) VALUES
(4, 3, 5),
(7, 3, 2),
(8, 3, 4),
(9, 3, 6),
(10, 3, 1),
(11, 4, 1),
(14, 4, 5),
(15, 4, 6),
(17, 4, 7),
(18, 4, 11),
(19, 4, 10),
(22, 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_chamcong`
--

CREATE TABLE `cms_chamcong` (
  `id_CC` int(255) NOT NULL,
  `ngaycham` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cms_chamcong`
--

INSERT INTO `cms_chamcong` (`id_CC`, `ngaycham`) VALUES
(3, '2021-02-01'),
(4, '2021-02-02'),
(5, '2021-02-03'),
(6, '2021-02-04'),
(7, '2021-01-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `id_CV` int(255) NOT NULL,
  `maCV` varchar(255) NOT NULL,
  `tenCV` varchar(255) NOT NULL,
  `id_PB` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`id_CV`, `maCV`, `tenCV`, `id_PB`, `created_at`, `updated_at`) VALUES
(1, 'CV1', 'Trưởng nhóm', 1, '2021-01-15 09:45:08', '2021-01-15 09:45:08'),
(2, 'CV-1', 'Phó nhóm', 2, '2021-01-15 09:45:06', '2021-01-15 09:45:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `id` int(11) NOT NULL,
  `id_NV` int(11) NOT NULL,
  `id_BL` int(11) NOT NULL,
  `hesoluong` int(255) NOT NULL,
  `ngaycong` int(255) NOT NULL,
  `luong` int(255) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`id`, `id_NV`, `id_BL`, `hesoluong`, `ngaycong`, `luong`, `trangthai`, `created_at`) VALUES
(10, 5, 6, 100000, 2, 200000, 0, '2021-01-15 16:15:44'),
(11, 2, 6, 100000, 2, 200000, 1, '2021-01-15 16:16:44'),
(12, 4, 6, 100000, 1, 100000, 1, '2021-01-15 14:14:31'),
(13, 6, 6, 100000, 2, 200000, 1, '2021-01-14 19:09:10'),
(14, 1, 6, 100000, 2, 200000, 1, '2021-01-15 14:14:32'),
(15, 7, 6, 100000, 1, 100000, 1, '2021-01-15 14:14:25'),
(16, 11, 6, 100000, 1, 100000, 1, '2021-01-15 14:14:32'),
(17, 10, 6, 100000, 1, 100000, 1, '2021-01-14 18:58:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghiphep`
--

CREATE TABLE `nghiphep` (
  `id_NP` int(255) NOT NULL,
  `batdau` date NOT NULL,
  `ketthuc` date NOT NULL,
  `lydo` varchar(225) NOT NULL,
  `sdt` int(255) NOT NULL,
  `id_NV` int(255) NOT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `tinhtrang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nghiphep`
--

INSERT INTO `nghiphep` (`id_NP`, `batdau`, `ketthuc`, `lydo`, `sdt`, `id_NV`, `ghichu`, `tinhtrang`, `created_at`, `updated_at`) VALUES
(1, '2021-01-11', '2021-01-12', 'Nhà có việc bận', 994756356, 1, 'h', 'đã duyệt', '2021-01-15 05:53:12', '2021-01-10 19:10:05'),
(2, '2021-01-11', '2021-01-20', 'Nhà có việc bận', 335132811, 1, NULL, 'Không duyệt', '2021-01-12 02:04:45', '2021-01-10 19:10:16'),
(4, '2021-01-11', '2021-01-12', 'Nhà có việc bận', 335132811, 2, 'xin nghỉ', 'Không duyệt', '2021-01-12 02:04:46', '2021-01-11 10:45:41'),
(5, '2021-01-11', '2021-01-15', 'Nhà có việc bận', 335132811, 2, 'xin nghỉ', 'Không duyệt', '2021-01-12 02:04:46', '2021-01-11 10:57:10'),
(6, '2021-01-12', '2021-01-13', 'Nhà có việc bận', 2944323, 11, NULL, 'đã duyệt', '2021-01-12 02:04:25', '2021-01-11 18:59:42'),
(7, '2021-01-12', '2021-01-13', 'Ốm', 994756356, 12, 'xin nghỉ', 'chưa duyệt', '2021-01-11 19:49:59', '2021-01-11 19:49:59'),
(8, '2021-01-12', '2021-01-14', 'Về quê', 994756356, 5, 'xin nghỉ', 'chưa duyệt', '2021-01-11 19:50:53', '2021-01-11 19:50:53'),
(9, '2021-01-12', '2001-01-13', 'Nhà có việc bận', 335132811, 7, 'xin nghỉ', 'đã duyệt', '2021-01-12 02:53:30', '2021-01-11 19:51:43'),
(10, '2021-01-12', '2021-01-14', 'Nhà có việc bận', 335132811, 9, 'xin nghỉ', 'đã duyệt', '2021-01-12 02:53:30', '2021-01-11 19:52:26'),
(11, '2021-01-12', '2021-01-14', 'Nhà có việc bận', 335132811, 9, 'xin nghỉ', 'đã duyệt', '2021-01-12 02:53:29', '2021-01-11 19:52:32'),
(12, '2021-01-14', '2021-01-15', 'Nhà có việc bận', 335132811, 9, 'xin nghỉ', 'đã duyệt', '2021-01-12 02:53:41', '2021-01-11 19:53:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `id_PB` int(255) NOT NULL,
  `ma_PB` varchar(255) NOT NULL,
  `ten_PB` varchar(255) NOT NULL,
  `id_TP` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`id_PB`, `ma_PB`, `ten_PB`, `id_TP`, `created_at`, `updated_at`) VALUES
(1, 'PB-1', 'Phòng nhân sự', 4, '2021-01-15 21:09:40', '2021-01-15 21:09:40'),
(2, 'PB-1', 'Phòng tài chính', 7, '2021-01-15 21:10:14', '2021-01-15 21:10:14'),
(3, 'PB-3', 'Phòng IT', 0, '2021-01-11 02:21:06', '2021-01-11 02:21:06'),
(4, 'PB-4', 'Phòng Maketing', 0, '2021-01-12 00:55:33', '2021-01-12 00:55:33'),
(5, 'PB-5', 'Phòng kế hoạch', 0, '2021-01-12 02:38:35', '2021-01-12 02:38:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id_TD` int(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `sodienthoai` int(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `soCM` int(20) NOT NULL,
  `gioitinh` varchar(100) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `quequan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `maNV` varchar(255) NOT NULL,
  `tenNV` varchar(255) NOT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `soCM` int(100) NOT NULL,
  `quequan` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `quyenhan` int(255) NOT NULL,
  `id_PB` int(255) DEFAULT NULL,
  `id_CV` int(255) DEFAULT NULL,
  `hsluong` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `maNV`, `tenNV`, `anh`, `email`, `matkhau`, `gioitinh`, `sdt`, `soCM`, `quequan`, `diachi`, `ngaysinh`, `quyenhan`, `id_PB`, `id_CV`, `hsluong`, `created_at`, `updated_at`) VALUES
(1, 'NV-1', 'Phạm Minh Hiếu', 'bia-larue-xanh-330ml-202003251400361047.jpg', 'hieu@gmail.com', '123456', 'nam', 99876544, 676546786, 'Hải Dương', 'Đà Nẵng', '2021-01-02', 0, NULL, 1, NULL, '2021-01-15 09:59:11', '2021-01-10 10:07:12'),
(2, 'MV-2', 'Phạm Đức Hàn Lâm', '12355295334598982240478275301061418362790341o-1604796850875485398213-crop-16047968724001068574379.jpg', 'lam@gmail.com', '123456', 'nam', 335132800, 73639282, 'Quảng Nam', 'Đà Nẵng', '2021-01-02', 3, 1, NULL, NULL, '2021-01-11 16:31:39', '2021-01-11 04:41:37'),
(4, 'MV-3', 'Trần Văn Hợp', 'Son_Tung_M-TP_1_(2017).png', 'hop@gmail.com', '123456', 'nam', 368886784, 197407158, 'Quảng trị', 'Quảng  trị', '2001-04-14', 1, 1, NULL, NULL, '2021-01-11 16:31:39', '2021-01-11 04:45:57'),
(5, 'MV-5', 'Đinh Phan Bảo Long', 'TUDORXDAVIDBECKHAMBBSG3-800x1067.jpg', 'long@gmail.com', '123456', 'nam', 945658688, 765849230, 'Quảng Bình', 'Quảng Bình', '0004-03-23', 3, 1, NULL, NULL, '2021-01-12 03:55:24', '2021-01-11 20:55:24'),
(6, 'MV-6', 'Công Thành', 'Capture.PNG', 'thanh@gmail.com', '123456', 'nam', 98675848, 463758975, 'Kwang Ngãi', 'Kwang Ngãi', '2001-04-01', 3, 1, NULL, NULL, '2021-01-11 16:31:39', '2021-01-11 04:51:23'),
(7, 'MV-7', 'Quốc Huy ( Đại gia)', 'unnamed.jpg', 'huy@gmail.com', '123456', 'nam', 998343360, 967859734, 'Nghệ An', 'Nghệ An', '2001-04-02', 1, 2, NULL, NULL, '2021-01-12 03:46:41', '2021-01-11 20:46:41'),
(8, 'MV-8', 'Quốc Tuấn', 'Image-ExtractWord-1-Out-3007-1502960558.png', 'tuan@gmail.com', '123456', 'nam', 894736512, 768593766, 'Đăk Lăk', 'Đà Nẵng', '2001-06-05', 3, 2, NULL, NULL, '2021-01-11 16:31:39', '2021-01-11 04:54:27'),
(9, 'MV-9', 'Hoàng LX', 'sontung.PNG', 'hoang@gmail.com', '123456', 'nam', 987678784, 876589765, 'Quảng Bình', 'Đà Nẵng', '2001-11-06', 3, 2, NULL, NULL, '2021-01-11 16:31:39', '2021-01-11 04:55:27'),
(10, 'MV-10', 'Hiền Hồ', 'hien_zing_1.jpg', 'hienho@gmail.com', '123456', 'nữ', 966666888, 987675876, 'Hồ Chí Minh', 'Đà Nẵng', '1996-04-09', 3, 2, NULL, NULL, '2021-01-12 05:10:50', '2021-01-11 05:01:07'),
(11, 'MV-11', 'Bích Phương', 'bichphuong21572234802210838909853_1.jpg', 'bichphuong@gmail.com', '123456', 'nữ', 987677777, 987874536, 'Đăk Lăk', 'Đà Nẵng', '1997-08-06', 3, 2, NULL, NULL, '2021-01-12 05:10:24', '2021-01-11 05:01:36'),
(12, 'MV-12', 'Hải Hà', 'Image-ExtractWord-1-Out-3007-1502960558.png', 'ha@gmail.com', '123456', 'nam', 986753664, 987654567, 'Quảng trị', 'Đà Nẵng', '2001-02-09', 3, 2, NULL, NULL, '2021-01-11 16:31:39', '2021-01-11 05:00:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chamcong_details`
--
ALTER TABLE `chamcong_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cms_chamcong`
--
ALTER TABLE `cms_chamcong`
  ADD PRIMARY KEY (`id_CC`);

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`id_CV`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  ADD PRIMARY KEY (`id_NP`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id_PB`);

--
-- Chỉ mục cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id_TD`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chamcong_details`
--
ALTER TABLE `chamcong_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `cms_chamcong`
--
ALTER TABLE `cms_chamcong`
  MODIFY `id_CC` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `congviec`
--
ALTER TABLE `congviec`
  MODIFY `id_CV` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  MODIFY `id_NP` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `id_PB` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id_TD` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
