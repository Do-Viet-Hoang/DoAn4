-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 04, 2020 lúc 03:10 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_dienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonban`
--

CREATE TABLE `chitiethoadonban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_hdb` bigint(20) UNSIGNED NOT NULL,
  `id_sp` bigint(20) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadonban`
--

INSERT INTO `chitiethoadonban` (`id`, `id_hdb`, `id_sp`, `soluong`, `gia`, `created_at`, `updated_at`) VALUES
(4, 4, 13, 1, 19000000, '2020-07-01 03:16:21', '2020-07-01 03:16:21'),
(5, 5, 14, 1, 5000000, '2020-07-01 10:18:35', '2020-07-01 10:18:35'),
(6, 6, 20, 6, 29000000, '2020-07-02 03:58:15', '2020-07-02 03:58:15'),
(7, 6, 19, 1, 12000000, '2020-07-02 03:58:15', '2020-07-02 03:58:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tk` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `tong` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonban`
--

CREATE TABLE `hoadonban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tk` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuthich` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonban`
--

INSERT INTO `hoadonban` (`id`, `id_tk`, `hoten`, `diachi`, `sdt`, `chuthich`, `trangthai`, `created_at`, `updated_at`) VALUES
(4, 4, 'Do Viet Hoang', 'Ba vì', '0345300199', 'dddd', 0, '2020-07-01 03:16:21', '2020-07-02 04:00:33'),
(5, 4, 'Do Viet Hoang', 'Ba vì', '0345300199', NULL, 3, '2020-07-01 10:18:35', '2020-07-02 04:00:40'),
(6, 7, 'Do Viet Hoang', 'Ba vì', '0984638735', NULL, 0, '2020-07-02 03:58:15', '2020-07-02 03:58:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`id`, `name`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'IPHONE', 'Còn hàng', '2020-06-15 22:17:48', '2020-06-15 22:17:48'),
(2, 'XIAOMI', 'Còn hàng', '2020-06-15 22:17:53', '2020-06-15 22:17:53'),
(3, 'SAMSUNG', 'Còn hàng', '2020-06-15 22:18:00', '2020-06-15 22:18:00'),
(4, 'OPPO', 'Còn hàng', '2020-06-15 22:18:06', '2020-06-15 22:18:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_12_085412_loai_sp', 1),
(2, '2020_05_12_085425_nha_cung_cap', 1),
(3, '2020_05_12_085440_san_pham', 1),
(4, '2020_05_24_143058_khach_hang', 1),
(5, '2020_06_09_065932_hoadonban', 1),
(6, '2020_06_09_071247_chitiethoadonban', 1),
(7, '2020_06_10_183809_giohang', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `name`, `diachi`, `sdt`, `created_at`, `updated_at`) VALUES
(1, 'APPLE', 'USA', '0984638735', '2020-06-25 06:16:00', '2020-06-25 06:16:00'),
(2, 'XIAOMI', 'Trung Quốc', '0345300199', '2020-06-25 06:16:14', '2020-06-25 06:16:14'),
(3, 'SAMSUNG', 'Hàn Quốc', '0988831822', '2020-06-25 06:16:25', '2020-06-25 06:16:42'),
(5, 'OPPO', 'Trung Quốc', '0345300199', '2020-07-01 02:33:33', '2020-07-01 02:33:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_loai` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hangsp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `manhinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hedieuhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cameratruoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camerasau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `id_loai`, `name`, `hangsp`, `gia`, `manhinh`, `hedieuhanh`, `cpu`, `cameratruoc`, `camerasau`, `ram`, `bonho`, `sim`, `pin`, `hinhanh`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'IPhone 11 Pro Max', 'IPhone', 29000000, 'IPS', 'IOS', 'A13', '6 MP', '12 MP', '4G', '64 GB', '1 sim', '4006', 'Gmpx2A2vSR_1593091070.jpg', NULL, '2020-06-25 06:17:50', '2020-06-25 06:17:50'),
(3, 1, 'IPhone 11 Pro', 'IPhone', 27000000, 'IPS', 'IOS', 'A13', '6 MP', '12 MP', '4G', '64 GB', '1 sim', '3906', 'HKIjWSPj89_1593091113.jpg', NULL, '2020-06-25 06:18:33', '2020-06-25 06:18:33'),
(4, 1, 'IPHONE 11', 'IPhone', 21000000, 'IPS', 'IOS', 'A13', '6 MP', '12 MP', '4G', '64 GB', '1 sim', '3906', 'IHIVkVrkbv_1593091172.jpg', NULL, '2020-06-25 06:19:32', '2020-06-25 06:19:32'),
(5, 1, 'IPhone Xs Max', 'IPhone', 25000000, 'IPS', 'IOS', 'A13', '6 MP', '12 MP', '4G', '64 GB', '1 sim', '4006', 'N3pSwFpa6n_1593091238.jpg', NULL, '2020-06-25 06:20:38', '2020-06-25 06:20:38'),
(6, 3, 'Samsung Galaxy Note 10', 'Samsung', 25000000, 'Full HD', 'Android', 'Samsung A10', '6 MP', '12 MP', '4G', '64 GB', '2 Sim', '4006', 'Dp0dVPVdM1_1593091330.jpg', NULL, '2020-06-25 06:22:10', '2020-06-25 06:22:10'),
(7, 3, 'Samsung Galaxy Note 9', 'Samsung', 25000000, 'Full HD', 'Android', 'Samsung A10', '6 MP', '12 MP', '4G', '64 GB', '2 Sim', '3906', 'Pei7UAy3nw_1593091370.jpg', NULL, '2020-06-25 06:22:50', '2020-06-25 06:22:50'),
(8, 3, 'Samsung Galaxy Note 8', 'Samsung', 12000000, 'Full HD', 'Android', 'Samsung A10', '6 MP', '12 MP', '4G', '64 GB', '2 Sim', '3906', 'phs9rAst8g_1593091420.jpg', NULL, '2020-06-25 06:23:40', '2020-06-25 06:23:40'),
(9, 3, 'Samsung Galaxy A30', 'Samsung', 12000000, 'Full HD', 'Android', 'Samsung A10', '6 MP', '12 MP', '4G', '32 GB', '2 Sim', '4006', 'I024dDr4t2_1593091478.jpg', NULL, '2020-06-25 06:24:39', '2020-06-25 06:24:39'),
(10, 1, 'IPhone Xs', 'IPhone', 25000000, 'IPS', 'IOS', 'A13', '12 MP', '12 MP', '4G', '64 GB', '1 Sim', '4006', 'wCbfhqLj9E_1593091553.jpg', NULL, '2020-06-25 06:25:53', '2020-06-25 06:25:53'),
(11, 1, 'IPHONE 8 Plus', 'IPhone', 12000000, 'IPS', 'IOS', 'A10', '6 MP', '12 MP', '4G', '32 GB', '1 Sim', '3906', 'RJ8TBii2ga_1593091594.jpg', NULL, '2020-06-25 06:26:34', '2020-06-25 06:26:34'),
(12, 1, 'IPhone X', 'IPhone', 15000000, 'IPS', 'IOS', 'A13', '6 MP', '12 MP', '4G', '64 GB', '1 Sim', '3906', 'wPILtnVj6u_1593091659.jpg', NULL, '2020-06-25 06:27:39', '2020-06-25 06:27:59'),
(13, 1, 'IPhone Xr', 'IPhone', 19000000, 'IPS', 'IOS', 'A13', '6 MP', '12 MP', '4G', '32 GB', '1 Sim', '4006', '9XzI2KOoQs_1593091742.jpg', NULL, '2020-06-25 06:29:02', '2020-06-25 06:29:02'),
(14, 2, 'Xiaomi Mi 8 SE', 'Xiaomi', 5000000, 'IPS', 'Android', 'Snapdragon 710', '12 MP', '12 MP', '4G', '32 GB', '1 Sim', '4006', 'yOzMFLn5rq_1593091843.jpg', NULL, '2020-06-25 06:30:43', '2020-06-25 06:30:43'),
(15, 4, 'Oppo K3', 'Oppo', 10000000, 'Full HD', 'Android', 'Samsung A10', '6 MP', '12 MP', '4G', '64 GB', '1 Sim', '4006', 'M1AiosxpOz_1593091896.jpg', NULL, '2020-06-25 06:31:36', '2020-06-25 06:31:36'),
(16, 2, 'XIAOMI S9', 'Xiaomi', 12000000, 'Full HD', 'Android', 'A13', '6 MP', '12 MP', '4G', '32 GB', '2 Sim', '3906', 'Gdxm2PRFLc_1593652852.jpg', NULL, '2020-07-02 01:20:52', '2020-07-02 01:20:52'),
(17, 2, 'Xiaomi Note 8', 'Xiaomi', 25000000, 'Full HD', 'Android', 'A13', '6 MP', '12 MP', '4G', '32 GB', '2 Sim', '4006', 'HOPqgiRzD1_1593652907.jpg', NULL, '2020-07-02 01:21:47', '2020-07-02 01:21:47'),
(18, 2, 'Xiaomi Z9', 'Xiaomi', 25000000, 'Full HD', 'IOS', 'A13', '6 MP', '12 MP', '4G', '32 GB', '2 Sim', '3906', 'dU74TIX7fZ_1593652955.jpg', NULL, '2020-07-02 01:22:35', '2020-07-02 01:22:35'),
(19, 4, 'OPPO F9', 'Oppo', 12000000, 'Full HD', 'Android', 'Samsung A10', '6 MP', '12 MP', '4G', '32 GB', '2 Sim', '4006', '6BHRSPr0Yi_1593653038.jpg', NULL, '2020-07-02 01:23:58', '2020-07-02 01:23:58'),
(20, 4, 'Oppo Z5', 'Oppo', 29000000, 'Full HD', 'Android', 'Samsung A10', '6 MP', '12 MP', '4G', '32 GB', '2 Sim', '3906', 'oaeJZ3Y4TX_1593653117.jpg', NULL, '2020-07-02 01:25:17', '2020-07-02 01:25:17'),
(21, 4, 'OPPO Z4', 'Oppo', 12000000, 'Full HD', 'Android', 'A13', '6 MP', '12 MP', '4G', '32 GB', '2 Sim', '3906', 'WpyoB7Rtyc_1593653185.jpg', NULL, '2020-07-02 01:25:56', '2020-07-02 01:26:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `hoten`, `diachi`, `sdt`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sutu9x1999', '$2y$10$gFY4eZx3DyGiDm.z6qIPFugMTVTBHJOuJ6NoujvFhkBpspgLUfb56', 'Do Viet Hoang', 'Ba vì', '0984638735', 'sunshine160399@gmail.com', NULL, '2020-06-15 22:17:14', '2020-06-15 22:17:14'),
(4, 's2rongcon2000', '$2y$10$fXtEA24VHRA7fFNSFzFkd.U9qfHCAknUQ5etFXybvmz7mtvEHZBJa', 'Do Viet Hoang', 'Ba vì', '0345300199', 'hoangbyn13@gmail.com', NULL, '2020-07-01 03:15:55', '2020-07-01 03:15:55'),
(5, 'sutuhotboy99', '$2y$10$RCRNwZqg830.MUwTbipuEOqSZQu2RJ3jbS5HqWdVH21FGTmnD41a6', 'Nguyen Xuan Tung', 'Trung Quốc', '0984638735', 'hoangbyn13@gmail.com', NULL, '2020-07-02 02:22:35', '2020-07-02 02:22:35'),
(6, '10117197', '$2y$10$n.FH1a46A1jp/tVdif0ITuH1DNvXrihXj7ndePjJJ4mgz9nPNRX6m', '1234', 'Trung Quốc', '0984638735', 'sunshine160399@gmail.com', NULL, '2020-07-02 03:54:15', '2020-07-02 03:54:15'),
(7, 'conhi', '$2y$10$2Bnxc6rER/hMTESXArYoX.cIBD22sK0NmZBoVd9Ql4Mzc8vjPZMzq', 'Do Viet Hoang', 'Ba vì', '0984638735', 'doviethoang3001@gmail.com', NULL, '2020-07-02 03:55:07', '2020-07-02 03:55:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitiethoadonban_id_hdb_foreign` (`id_hdb`),
  ADD KEY `chitiethoadonban_id_sp_foreign` (`id_sp`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giohang_id_tk_foreign` (`id_tk`),
  ADD KEY `giohang_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadonban_id_tk_foreign` (`id_tk`);

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id_loai_foreign` (`id_loai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  ADD CONSTRAINT `chitiethoadonban_id_hdb_foreign` FOREIGN KEY (`id_hdb`) REFERENCES `hoadonban` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiethoadonban_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_id_tk_foreign` FOREIGN KEY (`id_tk`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `giohang_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD CONSTRAINT `hoadonban_id_tk_foreign` FOREIGN KEY (`id_tk`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_id_loai_foreign` FOREIGN KEY (`id_loai`) REFERENCES `loai_sp` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
