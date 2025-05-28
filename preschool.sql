-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 06:21 PM
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
-- Database: `preschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `content`, `author`, `date`) VALUES
(2, 'Kỷ niệm ngày 8/3', '<span style=\"font-family: Arial; text-align: justify;\">Ngày Quốc tế Phụ nữ được kỷ niệm vào ngày 8/3 hàng năm, đây là ngày được thiết lập nhằm tôn vinh vai trò và đóng góp của phụ nữ trong xã hội, đồng thời cũng là dịp để nhấn mạnh tình hữu nghị, tình đoàn kết và sự giải phóng cho phụ nữ trên toàn thế giới.</span>', 'Hiệu trưởng', '2025-03-12 04:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assignment_type` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `assignment_name`, `assignment_type`, `download`, `date`) VALUES
(7, 'Hát', 'Bài tập ngày lễ', 'http://localhost/Truongmamnon2/uploads/files/zcsgk18o4q9ur_v.pdf', '2025-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
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
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `id_class_detail`, `attendance_date`, `status`, `note`, `created_at`) VALUES
(14, 10, '2025-04-24', 'no', NULL, '2025-04-24 03:12:31'),
(15, 9, '2025-04-24', 'no', NULL, '2025-04-24 03:12:32'),
(16, 8, '2025-04-24', 'no', NULL, '2025-04-24 03:12:33'),
(17, 11, '2025-04-24', 'no', NULL, '2025-04-24 03:15:48'),
(19, 13, '2025-04-25', 'yes', NULL, '2025-04-25 09:23:01'),
(21, 11, '2025-04-25', 'yes', NULL, '2025-04-25 09:23:04'),
(22, 10, '2025-04-25', 'yes', NULL, '2025-04-25 09:23:05'),
(23, 9, '2025-04-25', 'yes', NULL, '2025-04-25 09:23:06'),
(24, 14, '2025-04-26', 'yes', NULL, '2025-04-25 23:54:26'),
(25, 13, '2025-04-26', 'yes', NULL, '2025-04-25 23:54:30'),
(27, 11, '2025-04-26', 'yes', NULL, '2025-04-25 23:54:37'),
(28, 14, '2025-04-29', 'yes', NULL, '2025-04-29 09:03:10'),
(29, 13, '2025-04-29', 'yes', NULL, '2025-04-29 09:03:12'),
(31, 11, '2025-04-29', 'yes', NULL, '2025-04-29 09:03:13'),
(32, 10, '2025-04-29', 'yes', NULL, '2025-04-29 09:03:14'),
(33, 9, '2025-04-29', 'yes', NULL, '2025-04-29 09:03:16'),
(34, 8, '2025-04-29', 'yes', NULL, '2025-04-29 09:03:18'),
(35, 14, '2025-05-17', 'yes', NULL, '2025-05-17 03:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `tuition_fee` int(11) NOT NULL,
  `food_costs` int(11) NOT NULL,
  `event_registration_fee` int(11) NOT NULL,
  `course_registration_fee` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `number_of_pupil` varchar(255) NOT NULL,
  `head_teacher` varchar(255) NOT NULL,
  `assistant` varchar(255) NOT NULL,
  `Room` varchar(255) NOT NULL,
  `class_score` varchar(255) NOT NULL,
  `study_time` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `age`, `number_of_pupil`, `head_teacher`, `assistant`, `Room`, `class_score`, `study_time`, `note`) VALUES
(9, 'Lớp 4A1', '4', '36', 'Nguyễn Ngọc Thiên Hương', 'Nguyễn Kim Anh', 'phòng số 4', '100/100', '2025', 'Lớp thi đua tốt'),
(11, 'Lớp 3A1', 'Lớp 3 tuổi', '35', 'Nguyễn Ngọc Yến Nhi', 'Nguyễn Ngọc Nhi', 'Phòng số 3', '100/100', '2025', 'Lớp đạt thành tích tốt'),
(12, 'Lớp 2A1', 'Lớp 2 tuổi', '22', 'Nguyễn Thị Hoa', 'Nguyễn Thị Mai', 'phòng số 2', '100/100', '2025', 'Lớp thi đua tốt'),
(13, 'Lớp 5A1', 'Lớp 5 tuổi', '36', 'Nguyễn Thị Mai', 'Nguyễn Thị Hương', 'phòng học số 5', '100/100', 'năm 2025', 'Lớp thi đua tốt');

-- --------------------------------------------------------

--
-- Table structure for table `class_detail`
--

CREATE TABLE `class_detail` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gender` varchar(80) DEFAULT NULL,
  `class` varchar(80) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `year_of_birth` varchar(80) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `attendance` enum('yes','no') DEFAULT 'no',
  `id_student` int(11) DEFAULT NULL,
  `id_class` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `assigned_teacher` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_detail`
--

INSERT INTO `class_detail` (`id`, `surname`, `last_name`, `photo`, `gender`, `class`, `note`, `year_of_birth`, `first_name`, `attendance`, `id_student`, `id_class`, `year`, `assigned_teacher`) VALUES
(8, '', '', '', 'Male', NULL, 'đâf', NULL, '', 'no', 7, NULL, NULL, NULL),
(9, '', '', '', 'Male', NULL, 'đâf', NULL, '', 'no', 6, NULL, NULL, NULL),
(10, '', '', '', 'Male', NULL, 'đâf', NULL, '', 'no', 5, NULL, NULL, NULL),
(11, '', '', '', NULL, NULL, NULL, NULL, '', 'no', 4, 1, 2025, NULL),
(13, '', '', '', NULL, NULL, NULL, NULL, '', 'no', 3, 1, 2025, NULL),
(14, '', '', '', NULL, NULL, NULL, NULL, '', 'no', 2, 1, 2025, NULL),
(15, '', '', '', NULL, NULL, NULL, NULL, '', 'no', 1, 1, 2025, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `terms` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `content`, `date`, `terms`, `fee`) VALUES
(4, 'Lễ ra trường', '<p><img src=\"http://localhost/Truongmamnon2/uploads/files/z1l4f9i2rxuo5vn.jpg\"><br></p>', '2025-05-15', 'Lớp 5 tuổi', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

CREATE TABLE `event_registration` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_care`
--

CREATE TABLE `health_care` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `eye_sight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_care`
--

INSERT INTO `health_care` (`id`, `student_id`, `month`, `height`, `weight`, `eye_sight`) VALUES
(5, 1, 2025, 90, 13, 10),
(6, 6, 1, 100, 20, 10),
(7, 6, 2, 102, 20, 10),
(8, 6, 3, 105, 21, 10),
(9, 6, 4, 105, 20, 10),
(10, 6, 5, 107, 21, 10);

-- --------------------------------------------------------

--
-- Table structure for table `how_to_make_payment`
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
-- Dumping data for table `how_to_make_payment`
--

INSERT INTO `how_to_make_payment` (`id`, `fullname_of_depositor`, `payment_method`, `transaction_code`, `amount`, `transaction_date`, `comments`) VALUES
(2, 'Trường mầm non ABC', 'bank', '12245678765432345', '4.500.000đ', '2025-03-12 08:59:07', 'Phụ huynh ghi rõ họ tên, mã học sinh vào trong thông tin chuyển khoản');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id_meal` int(11) NOT NULL,
  `date` date NOT NULL,
  `lunch` text NOT NULL,
  `lunch_img` varchar(255) NOT NULL,
  `afternoon` text NOT NULL,
  `afternoon_img` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id_meal`, `date`, `lunch`, `lunch_img`, `afternoon`, `afternoon_img`, `created_by`) VALUES
(5, '2025-05-20', 'Bò hầm rau củ, Canh hà bí xanh', 'http://localhost/Truongmamnon2/uploads/files/h91y0r5wz2jc_b7.jpg', 'Phở gà nấm hương', 'http://localhost/Truongmamnon2/uploads/files/ghaidb9t83f576l.jpg', 'Nhân viên bếp ăn');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id_parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_day` date NOT NULL,
  `sex` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id_parent`, `name`, `birth_day`, `sex`, `phone`, `address`, `id_user`) VALUES
(1, 'Nguyễn Thu Trang', '2000-05-10', 'Nữ', '0935822111', 'Hải Phòng', 17);

-- --------------------------------------------------------

--
-- Table structure for table `parent_child`
--

CREATE TABLE `parent_child` (
  `STT` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_pupils` int(11) NOT NULL,
  `relationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_child`
--

INSERT INTO `parent_child` (`STT`, `id_parent`, `id_pupils`, `relationship`) VALUES
(1, 1, 1, 'Mẹ - Con');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `pupils_full_name` varchar(255) NOT NULL,
  `birth_day` date NOT NULL,
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
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `pupils_full_name`, `birth_day`, `class`, `father_name`, `mother_name`, `father_contact`, `mother_contact`, `guardian_name`, `guardian_contact`, `note`, `special_need`, `photo`, `gender`) VALUES
(1, 'Nguyễn Bình An', '2022-11-09', 'Lớp 2A1', 'Nguyễn Bình', 'Nguyễn Huyền', '0983242224', '0983247432', 'Nguyễn Binh', '0983242224', 'Bé biếng ăn', 'Không', 'http://localhost/Truongmamnon2/uploads/files/grs6a1fhbktn4xo.jpg', 'Nam'),
(2, 'Đỗ Ngọc Ánh Dương', '2022-11-03', 'Lớp 4A1', 'Đỗ Hoài Nam', 'Nguyễn Phương Thảo', '0833424233', '0833425533', 'Đỗ Hoài Nam', '0833424233', 'Bé có năng khiếu mỹ thuật', 'Không', 'http://localhost/Truongmamnon2/uploads/files/zrc0eouwmkiv3p7.jpg', 'Nữ'),
(3, 'Vũ Nhật Minh', '2020-11-04', 'Lớp 5A1', 'Vũ Văn Lâm', 'Nguyễn Ngọc Hương', '0934132422', '0984242223', 'Vũ Văn Lâm', '0934132422', 'Bé có năng khiếu về ngôn ngữ', 'Không', 'http://localhost/Truongmamnon2/uploads/files/70l2yq9i64gs_1k.jpg', 'Nam'),
(4, 'Nguyễn Thanh Thảo', '2022-11-17', 'Lớp 5A1', 'Nguyễn Thanh Bình', 'Lương Nhật Hạ', '0976543685', '0964357575', 'Lương Nhật Hạ', '0964357575', 'Bé có năng khiếu mỹ thuật', 'Không', 'http://localhost/Truongmamnon2/uploads/files/tk6gh08i3syf7rj.jpg', 'Nữ'),
(5, 'Lương Thế Tài', '2021-11-18', 'Lớp 5A1', 'Lương Thế Vinh', 'Tạ Thanh Tú', '0923142412', '0834343244', 'Tạ Thanh Tú', '0834343244', 'Bé có năng khiếu về ngôn ngữ', 'Không', 'http://localhost/Truongmamnon2/uploads/files/4gqpu95nwo0re8j.jpg', 'Nam'),
(6, 'Lương Hiểu Minh', '2021-11-18', 'Lớp 5A1', 'Lương Thế Vinh', 'Tạ Thanh Tú', '0923142412', '0834343244', 'Tạ Thanh Tú', '0834343244', 'Bé có năng khiếu mỹ thuật', 'Không', 'http://localhost/Truongmamnon2/uploads/files/k3ghzj7v4oum9si.jpg', 'Nam'),
(7, 'Nguyễn Ngọc Quang', '2022-11-04', 'Lớp 3A1', 'Nguyễn Xuân Trình', 'Phạm Ngọc Dung', '0986436786', '0975435678', 'Phạm Ngọc Dung', '0975435678', 'Bé có năng khiếu về ngôn ngữ', 'Không', 'http://localhost/Truongmamnon2/uploads/files/p7zc3n4ylm2a8ux.jpg', 'Nam');

--
-- Triggers `student`
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
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `title`, `content`, `date`, `terms`, `fee`) VALUES
(5, 'Âm nhạc', 'http://localhost/Nhi1/uploads/files/tslcav_u90xkbde.xlsx', '2025-03-12 06:12:08', 'Lớp 4 tuổi', 100000),
(6, 'Tiếng Anh', 'http://localhost/Nhi1/uploads/files/jke0trq4_3965dh.jpg', '2025-03-12 06:12:57', 'Lơp 4 tuổi', 0),
(7, 'Mỹ thuật', 'http://localhost/Truongmamnon2/uploads/files/l6cu9ebhkvr_wy0.pdf', '2025-04-03 16:34:22', 'Lơp 4 tuổi', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `subject_register`
--

CREATE TABLE `subject_register` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `birth_day` date NOT NULL,
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
  `account_status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `photo`, `birth_day`, `resdence`, `phone`, `username`, `password`, `email`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `role`, `account_status`) VALUES
(14, 'Nguyễn', 'Nhi', 'http://localhost/Truongmamnon2/uploads/files/zo2m8vywl3xj9fb.jpeg', '2000-05-07', 'Hải Phòng', '91234456', 'admin', '$2y$10$ol3Cz1cESR9tlzkp1jPtJO6t5L1C66tQ6WZk9qJ5bMXlds2YODjPW', 'admin@gmail.com', NULL, NULL, '2025-05-17 16:53:22', '2207762c4b431336b0324d4e253d67b5', 'admin', 'Active'),
(15, 'Đỗ', 'Phương', 'http://localhost/Truongmamnon2/uploads/files/cbqk9nsw84dur2y.jpg', '2000-05-01', 'Hải Phòng', '98754312', 'phuong', '$2y$10$GUEE0j.KIHq0PBBo8kuwku0u7WBwy/lPxgFA5amXC/5WNrk4JfVY6', 'phuong94155@st.vimaru.edu.vn', NULL, NULL, '2025-05-10 17:49:07', 'b9eb6bde4b43e9f11f28519e4e8eaa42', 'headteacher', 'Active'),
(16, 'Nguyễn', 'Dương', 'http://localhost/Truongmamnon2/uploads/files/dwhjn8q4s01b9op.jpg', '2001-05-10', 'Hải Phòng', '0998763231', 'user1', '$2y$10$Q.fCw5jgxOHWCH/ZzoaCduVdTT8asQSrYCanC4PhWtDaPWzcMU6WS', 'user1@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active'),
(17, 'Nguyễn Thu', 'Trang', 'http://localhost/Truongmamnon2/uploads/files/dam789hbos_vctu.jpg', '2000-05-10', 'Hải Phòng', '0935822111', 'trang', '$2y$10$cY7BxuccEjtGoaMJe8jLXO.r4/ewSyNNwhSdbhVzUdI95x2J/M/na', 'phuhuynh1@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'parents', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class_detail` (`id_class_detail`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `bill_ibfk_4` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_detail`
--
ALTER TABLE `class_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_class_detail_student` (`id_student`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `health_care`
--
ALTER TABLE `health_care`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `how_to_make_payment`
--
ALTER TABLE `how_to_make_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id_meal`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id_parent`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `parent_child`
--
ALTER TABLE `parent_child`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `id_parent` (`id_parent`),
  ADD KEY `parent_child_ibfk_2` (`id_pupils`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_register`
--
ALTER TABLE `subject_register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_detail`
--
ALTER TABLE `class_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_care`
--
ALTER TABLE `health_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `how_to_make_payment`
--
ALTER TABLE `how_to_make_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id_meal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id_parent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent_child`
--
ALTER TABLE `parent_child`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject_register`
--
ALTER TABLE `subject_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD CONSTRAINT `attendance_log_ibfk_1` FOREIGN KEY (`id_class_detail`) REFERENCES `class_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_detail`
--
ALTER TABLE `class_detail`
  ADD CONSTRAINT `fk_class_detail_student` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD CONSTRAINT `event_registration_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_registration_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_registration_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `health_care`
--
ALTER TABLE `health_care`
  ADD CONSTRAINT `health_care_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent_child`
--
ALTER TABLE `parent_child`
  ADD CONSTRAINT `parent_child_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `parents` (`id_parent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_child_ibfk_2` FOREIGN KEY (`id_pupils`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_register`
--
ALTER TABLE `subject_register`
  ADD CONSTRAINT `subject_register_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_register_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subject_register_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
