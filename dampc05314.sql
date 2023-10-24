-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 19, 2023 lúc 11:40 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dampc05314`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `note`, `create_at`) VALUES
(1, 'Giày Nam', 'MWC', '2023-07-31 21:44:29'),
(2, 'Giày Nữ ', 'MWC', '2023-07-31 21:51:44'),
(3, 'BALO', 'MWC', '2023-07-31 21:52:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `see_comment` int DEFAULT NULL,
  `creat_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `see_comment`, `creat_at`) VALUES
(32, 11, 120, '2023-10-07 22:24:55'),
(33, 9, 242, '2023-10-07 22:33:49'),
(34, 12, 29, '2023-10-07 22:33:55'),
(35, 15, 6, '2023-10-07 22:34:14'),
(36, 10, 100, '2023-10-08 20:08:52'),
(37, 13, 5, '2023-10-10 11:44:58'),
(38, 19, 3, '2023-10-10 12:44:55'),
(39, 16, 3, '2023-10-10 13:03:32'),
(40, 24, 3, '2023-10-10 15:28:31'),
(41, 17, 3, '2023-10-10 15:51:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_detail`
--

CREATE TABLE `comment_detail` (
  `id` int NOT NULL,
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_detail`
--

INSERT INTO `comment_detail` (`id`, `comment_id`, `user_id`, `content`, `created_at`) VALUES
(33, 32, 53, 'dsa', '2023-10-07 22:29:39'),
(34, 32, 53, 'yhjtyh', '2023-10-07 22:29:45'),
(37, 35, 53, 'sad', '2023-10-07 22:34:14'),
(38, 36, 1, 'hàng tuyệt xuất sắc', '2023-10-08 22:27:08'),
(39, 32, 1, 'hàng này ăn được không', '2023-10-08 22:50:09'),
(40, 32, 1, 'hàng đẹp cho 10 sao ', '2023-10-08 20:17:32'),
(220, 36, 55, 'loi dep trai', '2023-10-10 20:42:53'),
(222, 33, 53, 'hàng đẹp quá ', '2023-10-12 14:08:30'),
(223, 33, 53, 'hàng này tôi cho 5 sao <3', '2023-10-12 14:08:42'),
(224, 33, 53, 'cho tôi hàng này được không ', '2023-10-12 14:13:05'),
(226, 36, 53, 'hàng cho 5 sao ', '2023-10-13 16:48:33'),
(229, 34, 55, 'hàng tuyệt ', '2023-10-19 14:21:11'),
(230, 34, 55, 'hàng nhập khẩu ', '2023-10-19 14:21:19'),
(231, 34, 72, 'tuyệt vời ', '2023-10-19 14:23:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `money` float NOT NULL,
  `quantity` int NOT NULL,
  `color` int NOT NULL,
  `size` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL,
  `describe` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `money`, `quantity`, `color`, `size`, `create_at`, `updated_at`, `category_id`, `describe`, `img`) VALUES
(9, 'Dép Cao Gót MWC - 4334 Dép Cao Gót 2 Quai', 195000, 2, 4, 1, '2023-08-07 17:16:28', '2023-08-07 17:16:28', 2, 'MWC', 'cg3.jpg'),
(10, 'Giày cao gót MWC NUCG- 4400 Sandal Cao Gót', 195000, 2, 1, 1, '2023-08-07 17:17:07', '2023-08-07 17:17:07', 2, 'MWC', 'cg1.jpg'),
(11, 'Giày cao gót MWC NUCG- 4401 Sandal Cao Gót', 195000, 2, 1, 1, '2023-08-07 17:20:07', '2023-08-07 17:20:07', 2, 'MWC', 'cg2.jpg'),
(12, 'Giày cao gót MWC NUCG- 4393 Cao Gót Nữ Da', 195000, 2, 4, 1, '2023-08-07 17:20:41', '2023-08-07 17:20:41', 2, 'MWC', 'cg4.jpg'),
(13, 'Balô Túi Đeo Chéo MWC - 0834 Balô Túi Đeo Chéo Nam Nữ Unisex Nhiều Ngăn Tiện Ích', 250000, 5, 1, 1, '2023-08-07 22:50:26', '2023-08-07 22:50:26', 3, 'MWC', 'bl1.jpg'),
(14, 'BALO MWC - 1145 BALO Unisex Chống Sốc Chống Nước Nhiều Ngăn', 250000, 5, 1, 1, '2023-08-07 22:53:31', '2023-08-07 22:53:31', 3, 'MWC', 'bl2.jpg'),
(15, 'BALO MWC- 1150 Balo Unisex Chống Sốc Chống Nước Nhiều Ngăn', 250000, 5, 1, 1, '2023-08-07 22:55:55', '2023-08-07 22:55:55', 3, 'MWC', 'bl3.jpg'),
(16, 'BALO MWC - 1164 Balo Phong Cách Basic Cao Cấp Chất Vải Mềm Mịn,Đa Năng Đi Học ', 250000, 5, 2, 1, '2023-08-07 22:56:37', '2023-08-07 22:56:37', 3, 'MWC', 'bl4.jpg'),
(17, 'Giày Thể Thao Nam MWC - 5417 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính', 290000, 5, 2, 6, '2023-08-07 23:12:58', '2023-08-07 23:12:58', 1, 'MWC', 'gn1.jpg'),
(18, 'Giày Thể Thao Nam MWC - 5420 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính', 290000, 6, 2, 6, '2023-08-07 23:13:49', '2023-08-07 23:13:49', 1, 'MWC', 'gn2.jpg'),
(19, 'Giày Thể Thao Nam MWC - 5430 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính', 290000, 6, 1, 5, '2023-08-07 23:14:21', '2023-08-07 23:14:21', 1, 'MWC', 'gn3.jpg'),
(24, 'Giày Thể Thao Nam MWC - 5421 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính', 290000, 2, 1, 2, '2023-08-15 19:20:11', '2023-08-15 19:20:11', 1, 'MWC', 'gn4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `create_at`, `updated_at`, `role_id`) VALUES
(1, 'loi', '$2y$10$Ia.qY4Lsaj336w.g25dAROlKbrHAvE9yVVIhv4782i.nhxl9HkT2m', 'loist@gmai.com', '123456789', '2023-07-30 11:44:10', '2023-09-21 07:02:13', 1),
(29, 'tinh', '$2y$10$9jB4qfO.nL20nCCeMTOq6OZo4LCs//rBAXO8Y1jU.5ElQdwtzTVvC', 'tinh@gmail.com', '12345687', '2023-08-16 18:06:17', '2023-09-21 06:57:52', 1),
(33, 'loist', '$2y$10$ikkK4fr6DMEq1oE6Ct3Idulwd0NtvbXnH5lDJrZxrrPCGlwVl2m6W', 'sad@gmail', '123', '2023-09-19 20:36:10', '2023-09-19 20:36:10', 1),
(53, 'loi', '$2y$10$y5WP.7seoXWSxToldeq8xu3ZN7kwAI5oiS7bqHbxtzi5G/zGk.IQu', 'loi123@gmail.com', '123', '2023-10-02 20:32:32', '2023-10-05 14:07:41', 2),
(55, 'hoa', '$2y$10$p4t922OJty9KJ3MucIYz/ew3/02UiDJAHUgDK6WHgsNV3qag5lVxC', 'stbumbumst@gmail.com', '0975035680', '2023-10-05 14:49:34', '2023-10-19 14:22:05', 2),
(72, 'hoaloist', '$2y$10$KT1c4u2VVeK61EZEC45UFOmaZVNv/pkqenfjA./D82Ms7ciWGuLAS', 'hoasad@gmail.com', '123345', '2023-10-19 13:55:05', '2023-10-19 14:23:21', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order`
--

CREATE TABLE `user_order` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tinh` int NOT NULL,
  `quan` int NOT NULL,
  `phuong` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_order`
--

INSERT INTO `user_order` (`id`, `username`, `phone`, `address`, `tinh`, `quan`, `phuong`, `create_at`, `updated_at`, `total`, `user_id`) VALUES
(140, 'loi', '123', 'st', 95, 9, 10, '2023-10-07 19:56:07', '2023-10-07 19:56:07', 2730000, 55),
(142, 'loi', '123', 'ct', 95, 10, 10, '2023-10-19 14:32:53', '2023-10-19 14:32:53', 585000, 72),
(143, 'loist', '213', 'st', 96, 1, 1, '2023-10-19 14:35:55', '2023-10-19 14:35:55', 195000, 72);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order_detail`
--

CREATE TABLE `user_order_detail` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `order_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transfer_money` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_order_detail`
--

INSERT INTO `user_order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`, `order_code`, `transfer_money`, `created_at`, `updated_at`) VALUES
(137, 140, 10, 1, 195000, '6167', 'VNBANK', '2023-10-07 19:56:07', '2023-10-07 19:56:07'),
(138, 140, 11, 13, 195000, '6167', 'VNBANK', '2023-10-07 19:56:07', '2023-10-07 19:56:07'),
(141, 142, 11, 3, 195000, '9847', 'tienmat', '2023-10-19 14:32:53', '2023-10-19 14:32:53'),
(143, 143, 11, 1, 195000, '8745', 'tienmat', '2023-10-19 14:35:55', '2023-10-19 14:35:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `comment_detail`
--
ALTER TABLE `comment_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `user_order_detail`
--
ALTER TABLE `user_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `comment_detail`
--
ALTER TABLE `comment_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `user_order_detail`
--
ALTER TABLE `user_order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `comment_detail`
--
ALTER TABLE `comment_detail`
  ADD CONSTRAINT `comment_detail_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_detail_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `user_order_detail`
--
ALTER TABLE `user_order_detail`
  ADD CONSTRAINT `user_order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
