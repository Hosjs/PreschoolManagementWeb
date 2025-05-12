-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2025 lúc 06:33 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `preschool`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `content`, `author`, `date`) VALUES
(2, 'Kỷ niệm ngày 8/3', '<span style=\"font-family: Arial; text-align: justify;\">Ngày Quốc tế Phụ nữ được kỷ niệm vào ngày 8/3 hàng năm, đây là ngày được thiết lập nhằm tôn vinh vai trò và đóng góp của phụ nữ trong xã hội, đồng thời cũng là dịp để nhấn mạnh tình hữu nghị, tình đoàn kết và sự giải phóng cho phụ nữ trên toàn thế giới.</span>', 'Hiệu trưởng', '2025-03-12 04:53:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assignment_type` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `assignment`
--

INSERT INTO `assignment` (`id`, `assignment_name`, `assignment_type`, `download`, `date`) VALUES
(5, 'Hát', 'holyday assigment', 'http://localhost/Nhi1/uploads/files/c5gey7i1lp42_j9.png', '2025-04-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendance_log`
--

CREATE TABLE `attendance_log` (
  `id` int(11) NOT NULL,
  `id_class_detail` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('yes','no') NOT NULL DEFAULT 'yes',
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `id_class_detail`, `attendance_date`, `status`, `note`, `created_at`) VALUES
(83, 112, '2025-05-09', 'yes', NULL, '2025-05-09 13:26:07'),
(84, 108, '2025-05-09', 'yes', NULL, '2025-05-09 13:26:08'),
(85, 106, '2025-05-09', 'yes', NULL, '2025-05-09 13:26:08'),
(86, 104, '2025-05-09', 'yes', NULL, '2025-05-09 13:26:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_ID` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `number_of_pupil` varchar(255) NOT NULL,
  `assistant` varchar(255) NOT NULL,
  `Room` varchar(255) NOT NULL,
  `class_score` varchar(255) NOT NULL,
  `study_time` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `assigned_teacher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `class_ID`, `class_name`, `age`, `number_of_pupil`, `assistant`, `Room`, `class_score`, `study_time`, `note`, `assigned_teacher`) VALUES
(14, '1', 'Lớp 2A', '1', '10', 'qưeqaw', '112', '12', '7h-16h', '12312412412', 'Nhi'),
(15, '2', 'Lớp 2B', '2', '22', 'sads', '113', '66', '7h-16h', 'dsfawed', 'Tùng'),
(16, '3', 'Lớp 3A', '3', '22', 'sads', '114', '99', '7h-16h', 'dsfawed', 'Phương'),
(17, '4', 'Lớp 3B', '3', '22', 'sads', '115', '11', '7h-16h', 'dsfawed', 'Hạnh'),
(18, '5', 'Lớp 4A', '4', '39', 'ằefwgawrg', '523', '52', '5h-17h', 'qừq3g', 'Đạt'),
(19, '6', 'Lớp 4B', '4', '22', 'sads', '115', '11', '7h-16h', 'dsfawed', 'Quang'),
(20, '7', 'Lớp 5A', '4', '22', 'sads', '115', '11', '7h-16h', 'dsfawed', 'Liêm'),
(21, '8', 'Lớp 5B', '4', '22', 'sads', '115', '11', '7h-16h', 'dsfawed', 'Duy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_detail`
--

CREATE TABLE `class_detail` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gender` varchar(80) DEFAULT NULL,
  `class` varchar(80) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `attendance` enum('yes','no') DEFAULT 'no',
  `id_student` int(11) DEFAULT NULL,
  `assigned_teacher` varchar(50) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `id_class` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `class_detail`
--

INSERT INTO `class_detail` (`id`, `photo`, `gender`, `class`, `note`, `attendance`, `id_student`, `assigned_teacher`, `student_name`, `id_class`, `year`) VALUES
(104, '', 'Male', 'Lớp 2A', '123', 'yes', 70, 'Nhi', 'DMX', 14, 2025),
(106, '', 'Male', 'Lớp 2A', '123', 'yes', 71, 'Nhi', 'Tupac', 14, 2025),
(108, '', 'Male', 'Lớp 2A', '123', 'yes', 72, 'Nhi', 'Biggie', 14, 2025),
(110, '', 'Male', 'Lớp 2B', '123', 'no', 73, 'Tùng', 'Eminem', 15, 2025),
(112, '', 'Male', 'Lớp 2A', 'dsfawed', 'yes', 74, 'Nhi', 'Andre 3000', 14, 2025),
(114, '', 'Male', 'Lớp 2B', 'dsfawed', 'no', 75, 'Tùng', 'DMX', 15, 2025);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `event`
--

INSERT INTO `event` (`id`, `title`, `content`, `author`, `date`) VALUES
(3, 'Hoạt động nhóm', '<p>qwe</p>', 'Giáo viên', '2025-03-31 12:15:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `health_care`
--

CREATE TABLE `health_care` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `eye_sight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `health_care`
--

INSERT INTO `health_care` (`id`, `student_id`, `year`, `height`, `weight`, `eye_sight`) VALUES
(1, 74, 2022, 123, 40, 10),
(2, 74, 2023, 125, 41, 9),
(3, 74, 2023, 160, 56, 10),
(4, 74, 2024, 182, 75, 10),
(5, 73, 2022, 100, 40, 10),
(6, 73, 2023, 125, 45, 10),
(7, 73, 2024, 145, 100, 10),
(8, 70, 2022, 100, 100, 10),
(9, 72, 2025, 100, 120, 100),
(10, 70, 2025, 100, 101, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `how_to_make_payment`
--

CREATE TABLE `how_to_make_payment` (
  `id` int(11) NOT NULL,
  `fullname_of_depositor` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transaction_date` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `how_to_make_payment`
--

INSERT INTO `how_to_make_payment` (`id`, `fullname_of_depositor`, `payment_method`, `transaction_code`, `amount`, `transaction_date`, `comments`) VALUES
(2, 'Trường mầm non ABC', 'bank', '12245678765432345', '4.500.000đ', '2025-03-12 08:59:07', 'Phụ huynh ghi rõ họ tên, mã học sinh vào trong thông tin chuyển khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `meal`
--

CREATE TABLE `meal` (
  `id_meal` int(11) NOT NULL,
  `date` date NOT NULL,
  `lunch` text DEFAULT NULL,
  `lunch_img` varchar(255) DEFAULT NULL,
  `afternoon` text DEFAULT NULL,
  `afternoon_img` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `meal`
--

INSERT INTO `meal` (`id_meal`, `date`, `lunch`, `lunch_img`, `afternoon`, `afternoon_img`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2025-05-11', 'cut', NULL, 'cut', NULL, 'Tao', '2025-05-12 14:23:36', '2025-05-12 14:23:36'),
(2, '2025-05-14', '123', NULL, '123', NULL, '123', '2025-05-12 16:33:13', '2025-05-12 16:33:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `message`, `sent_at`) VALUES
(16, 1, NULL, 'Tin nhắn test từ phpMyAdmin', '2025-03-26 09:14:01'),
(17, 1, NULL, 'Chào bạn, đây là tin nhắn test', '2025-03-26 09:15:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `pupils_full_name` varchar(255) NOT NULL,
  `pupils_ID` varchar(255) DEFAULT NULL,
  `age` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_contact` varchar(255) NOT NULL,
  `mother_contact` varchar(255) NOT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_contact` varchar(255) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `special_need` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `assigned_teacher` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `pupils_full_name`, `pupils_ID`, `age`, `class`, `father_name`, `mother_name`, `father_contact`, `mother_contact`, `guardian_name`, `guardian_contact`, `note`, `special_need`, `photo`, `gender`, `assigned_teacher`) VALUES
(70, 'DMX', '2445', '2', 'Lớp 2A', '123', '123', '123', '123', '123', '123', '123', 'Không', 'http://localhost/Nhi/uploads/files/7p5hovzbc8l69tk.jpg', 'Male', 'Nhi'),
(71, 'Tupac', '24455', '2', 'Lớp 2A', '123', '123', '123', '123', '123', '123', '123', 'Có', 'http://localhost/Nhi/uploads/files/d5hnk_gjrsf4zva.jpg', 'Male', 'Nhi'),
(72, 'Biggie', '244555', '2', 'Lớp 2A', '123', '123', '123', '123', '123', '123', '123', 'Có', 'http://localhost/Nhi/uploads/files/ex2tjr3b7oi9_p8.jpg', 'Male', 'Nhi'),
(73, 'Eminem', '9082374', '2', 'Lớp 2B', '123', '123', '123', '123', '123', '123', '123', 'Có', 'http://localhost/Nhi/uploads/files/3z245afxcvmtuhi.jpg', 'Male', 'Tùng'),
(74, 'Andre 3000', '9082374123', '2', 'Lớp 2A', '123', 'ádf', '1212412', '132134', '123', '123', 'dsfawed', 'Có', 'http://localhost/Nhi/uploads/files/5_tkwpih4a3ugo2.jpg', 'Male', 'Nhi'),
(75, 'DMX', '9082374123', '2', 'Lớp 2B', '123', 'ádf', '1212412', '132134', '123', '123', 'dsfawed', 'Không', 'http://localhost/Nhi/uploads/files/gep95n1ijq8rw2d.jpg', 'Male', 'Tùng');

--
-- Bẫy `student`
--
DELIMITER $$
CREATE TRIGGER `trg_after_student_insert` AFTER INSERT ON `student` FOR EACH ROW BEGIN
  INSERT INTO class_detail (id_student, id_class, year)
  VALUES (NEW.id, 1, YEAR(CURDATE()));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`id`, `title`, `content`, `date`) VALUES
(5, 'Toán', 'http://localhost/Nhi1/uploads/files/tslcav_u90xkbde.xlsx', '2025-03-12 06:12:08'),
(6, 'Tiếng Anh', 'http://localhost/Nhi1/uploads/files/jke0trq4_3965dh.jpg', '2025-03-12 06:12:57'),
(7, 'Boxing', 'http://localhost/Nhi1/uploads/files/z9f4ahm7qnoyvgp.xlsx', '2025-04-03 16:34:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `birth_day` varchar(255) NOT NULL,
  `resdence` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2021-04-21 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `account_status` varchar(255) DEFAULT 'Pending',
  `assigned_teacher` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `photo`, `birth_day`, `resdence`, `phone`, `username`, `password`, `email`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `role`, `account_status`, `assigned_teacher`) VALUES
(1, 'Pha', 'Tùng', 'http://localhost/Nhi1/uploads/files/u8lghnjdk2w7o_i.jpg', '2003-05-29', 'None', '0707333776', 'Nhi', '$2y$10$F2br6Zvs35l6rg3YM7oSnuTojUqf4ySxVjLQzoXoJf4ifHn.fJYHq', 'kim@gmail.com', '7d3300dc2f13b53d9a399c0aa735add7', NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Nhi'),
(4, 'Tùng', 'Phạm', 'http://localhost/pre-primaryschoolmanagementsystem/uploads/files/sfacl02xohud_y7.jpg', '10/01/1999', 'voi', '09872900827', 'tungg', '123', 'sdas@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'pupil', 'Active', 'Nhi'),
(6, 'Phạm Xuân', 'Tùng', 'http://localhost/Nhi1/uploads/files/nh4o0wujkqtv8xl.jpg', '2003-01-01', '123', '121232', 'Tunghhh', '$2y$10$gZgk3pl2HJhEaDEcFaKbE.Kfvyt8tcyo6/4l8NT2I6Kc0CyGPXZF6', 'Tung290520009@gmail.com', 'fd30a1d65d481df1c9d9fdf42b24a587', NULL, '2021-04-21 00:00:00', NULL, 'pupils', 'Active', 'Nhi'),
(10, 'Phạm Xuân', 'Tùng', 'http://localhost/Nhi1/uploads/files/xhagywo0bsjp7mz.jpg', '2025-04-15', '123', '1212321412', 'Liêm', '$2y$10$AjmYXFTPIJxIdz/z4LTfOunPsy21Hy8eL7B8cMfunp848Lyj3haOy', 'Tung29052003@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Liêm'),
(11, 'Duy', 'Vũ', 'http://localhost/Nhi1/uploads/files/a_fxcr80l1nkqgo.png', '29-5-2003', '123', '1212321412', 'Duy', '$2y$10$EK/ruo1O0ou0BZDNRyGuVOKdx/6kgMau91IdWGcKHzWMfGhNysD5m', 'Tung29ww052003@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Duy'),
(12, 'Duy', 'Vũ', 'http://localhost/Nhi1/uploads/files/hina8yk50fobx6t.jpg', '2003-01-01', '123', '1212321412', '12345', '$2y$10$RAkcR2Es9uCYifZuGCsF5Oad/SedtLwX2Tx1s.cY69fP2OhG6eNyG', 'Tung29ww0jm52003@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'pupils', 'Pending', 'Nhi'),
(13, 'Tùng', 'hà', 'http://localhost/Nhi/uploads/files/hs6c9_z2f8ielrp.jpg', '2003-01-01', 'qưdawfawed', '0347875246', 'Tùng', '$2y$10$zVeEVGHwcVdTBjFjgTLSQObXU5b47F2gwF.y9oEdRgwKX09dFvuv2', 'vuduy300803@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Tùng'),
(14, 'Tùng', 'hà', 'http://localhost/Nhi/uploads/files/5hdfaksn9g1z7vm.png', '2025-05-07', 'qưdawfawed', '0347875246', 'Đạt', '$2y$10$MtZ5X5Z7GVnOgfoxO6bZh.P0DlsoGRYIF8ZWe4TwmGHxpw.0SSMR2', 'vuduy300803123123@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Đạt'),
(15, 'Tùng', 'hà', 'http://localhost/Nhi/uploads/files/zk6tvp2a3gwij1b.png', '2025-05-07', 'qưdawfawed', '0347875246', 'Quang', '$2y$10$RaPVrv.6JgsGUsTqtoHVNedwdx8Li8AvcIUDHVHPUh5wjxmZk3fve', 'vuduy30fdgsd3123123@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Quang'),
(16, 'Tùng', 'hà', 'http://localhost/Nhi/uploads/files/nka76tiqy4zpfu1.png', '2025-05-05', 'qưdawfawed', '0347875246', 'Hạnh', '$2y$10$dPyh.BUlRALKqocxW18PJOwMT.j0lmY52rrYgjayXAT6/piOAvs9S', 'agsdgasdf@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Hạnh'),
(17, 'Tùng', 'hà', 'http://localhost/Nhi/uploads/files/u2n3ojlhe46ip1v.png', '2025-05-08', 'qưdawfawed', '0347875246', 'Phương', '$2y$10$xT8e.AJLRikAbyejztcaIe9XfZig.s/Jl/ks991MmrDS3blxiORda', 'qqwersdf@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', 'Phương'),
(19, 'Admin1', 'hà', 'http://localhost/Nhi/uploads/files/bw31m6fy2ovt59e.jpg', '1969-07-29', 'qưdawfawed', '0347875246', 'Admin1', '$2y$10$8JsWt1Rt0lnSqwWTeKMHYejHddIbmHQLxgYVs1JhVLzczZJpsSaqW', 'vudusdfsdfsy300803@gmail.com', '10991c949b271c302bb973a9da65553c', NULL, '2021-04-21 00:00:00', NULL, 'admin', 'Active', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class_detail` (`id_class_detail`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class_detail`
--
ALTER TABLE `class_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_class_detail_student` (`id_student`);

--
-- Chỉ mục cho bảng `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `health_care`
--
ALTER TABLE `health_care`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Chỉ mục cho bảng `how_to_make_payment`
--
ALTER TABLE `how_to_make_payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id_meal`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `class_detail`
--
ALTER TABLE `class_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `health_care`
--
ALTER TABLE `health_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `how_to_make_payment`
--
ALTER TABLE `how_to_make_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `meal`
--
ALTER TABLE `meal`
  MODIFY `id_meal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD CONSTRAINT `attendance_log_ibfk_1` FOREIGN KEY (`id_class_detail`) REFERENCES `class_detail` (`id`);

--
-- Các ràng buộc cho bảng `class_detail`
--
ALTER TABLE `class_detail`
  ADD CONSTRAINT `fk_class_detail_student` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `health_care`
--
ALTER TABLE `health_care`
  ADD CONSTRAINT `health_care_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
