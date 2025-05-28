-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 08:24 AM
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
  `class_ID` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `number_of_pupil` varchar(255) NOT NULL,
  `assigned_teacher` varchar(255) NOT NULL,
  `assistant` varchar(255) NOT NULL,
  `Room` varchar(255) NOT NULL,
  `class_score` varchar(255) NOT NULL,
  `study_time` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_ID`, `class_name`, `age`, `number_of_pupil`, `assigned_teacher`, `assistant`, `Room`, `class_score`, `study_time`, `note`) VALUES
(9, '4', 'Lớp 4A1', 'Lớp 4 tuổi', '36', 'Nguyễn Ngọc Thiên Hương', 'Nguyễn Kim Anh', 'phòng số 4', '100/100', '2025', 'Lớp thi đua tốt'),
(11, '3', 'Lớp 3A1', 'Lớp 3 tuổi', '35', 'Nguyễn Ngọc Yến Nhi', 'Nguyễn Ngọc Nhi', 'Phòng số 3', '100/100', '2025', 'Lớp đạt thành tích tốt'),
(12, '2', 'Lớp 2A1', 'Lớp 2 tuổi', '22', 'Nguyễn Thị Hoa', 'Nguyễn Thị Mai', 'phòng số 2', '100/100', '2025', 'Lớp thi đua tốt'),
(13, '1', 'Lớp 1A1', 'Lớp 5 tuổi', '36', 'Nguyễn Thị Mai', 'Nguyễn Thị Hương', 'phòng học số 5', '100/100', 'năm 2025', 'Lớp thi đua tốt'),
(14, '6', 'Lớp 5A1', 'Lớp 5 tuổi', '22', 'Nguyễn Thị Nhung', 'Nguyễn Thị Hương', '12', '100/100', '2024', 'Lớp thi đua tốt');

-- --------------------------------------------------------

--
-- Table structure for table `class_detail`
--

CREATE TABLE `class_detail` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `attendance` enum('yes','no') DEFAULT 'no',
  `id_student` int(11) DEFAULT NULL,
  `assigned_teacher` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `id_class` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_detail`
--

INSERT INTO `class_detail` (`id`, `photo`, `gender`, `class`, `note`, `attendance`, `id_student`, `assigned_teacher`, `student_name`, `id_class`, `year`) VALUES
(33, 'http://localhost/DoAnTotNghiep/uploads/files/g9a2yt3m4h6icxf.jpg', 'Nam', 'Lớp 2A1', 'Bé biếng ăn', 'no', 27, 'Nguyễn Thị Hoa', 'Nguyễn Bình An', '12', 2025),
(35, 'http://localhost/DoAnTotNghiep/uploads/files/qobj804z6fikha_.jpg', 'Nữ', 'Lớp 3A1', 'Bé có năng khiếu mỹ thuật', 'no', 28, 'Nguyễn Ngọc Yến Nhi', 'Đỗ Ngọc Ánh Dương', '11', 2025),
(37, 'http://localhost/DoAnTotNghiep/uploads/files/5rixdtvjgqmpyl4.jpg', 'Nam', 'Lớp 5A1', 'Bé có năng khiếu về ngôn ngữ', 'no', 29, 'Nguyễn Thị Nhung', 'Vũ Nhật Minh', '14', 2025),
(39, 'http://localhost/DoAnTotNghiep/uploads/files/a0b3he78xzqgjt6.jpg', 'Nữ', 'Lớp 5A1', 'Bé có năng khiếu mỹ thuật', 'no', 30, 'Nguyễn Thị Nhung', 'Nguyễn Thanh Thảo', '14', 2025),
(41, 'http://localhost/DoAnTotNghiep/uploads/files/3d4uzpshqmar86f.jpg', 'Nam', 'Lớp 4A1', 'Bé có năng khiếu về ngôn ngữ', 'no', 31, 'Nguyễn Ngọc Thiên Hương', 'Lương Thế Tài', '9', 2025),
(43, 'http://localhost/DoAnTotNghiep/uploads/files/r2i4c8abygz1vlk.jpg', 'Nam', 'Lớp 4A1', 'Bé có năng khiếu về ngôn ngữ', 'no', 32, 'Nguyễn Ngọc Thiên Hương', 'Lương Hiểu Minh', '9', 2025),
(45, 'http://localhost/DoAnTotNghiep/uploads/files/tqja7e6l9_y05rf.jpg', 'Nam', 'Lớp 3A1', 'Bé có năng khiếu về ngôn ngữ', 'no', 33, 'Nguyễn Ngọc Yến Nhi', 'Nguyễn Ngọc Quang', '11', 2025);

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
(4, 'Lễ ra trường', '<p><br><img src=\"http://localhost/DoAnTotNghiep/uploads/files/vixfktc10pmz8e5.jpg\"></p>', '2025-05-15', 'Lớp 5 tuổi', 50000);

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
(5, '2025-05-20', 'Bò hầm rau củ, Canh hà bí xanh', 'http://localhost/DoAnTotNghiep/uploads/files/7gihxvw39lokm0u.jpg', 'Phở gà nấm hương', 'http://localhost/DoAnTotNghiep/uploads/files/adb6uxwqrc8_yt9.jpg', 'Nhân viên bếp ăn');

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

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `pupils_full_name` varchar(255) NOT NULL,
  `pupils_ID` varchar(255) NOT NULL,
  `birth_day` date NOT NULL,
  `class` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_contact` varchar(255) NOT NULL,
  `mother_contact` varchar(255) NOT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_contact` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `special_need` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `assigned_teacher` varchar(255) NOT NULL,
  `class_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `pupils_full_name`, `pupils_ID`, `birth_day`, `class`, `father_name`, `mother_name`, `father_contact`, `mother_contact`, `guardian_name`, `guardian_contact`, `note`, `special_need`, `photo`, `gender`, `assigned_teacher`, `class_ID`) VALUES
(27, 'Nguyễn Bình An', '1', '2022-11-09', 'Lớp 2A1', 'Nguyễn Bình', 'Nguyễn Huyền', '0983242224', '0983247432', 'Nguyễn Binh', '0983242224', 'Bé biếng ăn', 'Không', 'http://localhost/DoAnTotNghiep/uploads/files/g9a2yt3m4h6icxf.jpg', 'Nam', 'Nguyễn Thị Hoa', 12),
(28, 'Đỗ Ngọc Ánh Dương', '2', '2022-10-03', 'Lớp 3A1', 'Đỗ Hoài Nam', 'Nguyễn Phương Thảo', '0833424233', '0833425533', 'Đỗ Hoài Nam', '0833424233', 'Bé có năng khiếu mỹ thuật', 'Không', 'http://localhost/DoAnTotNghiep/uploads/files/qobj804z6fikha_.jpg', 'Nữ', 'Nguyễn Ngọc Yến Nhi', 11),
(29, 'Vũ Nhật Minh', '3', '2020-10-11', 'Lớp 5A1', 'Vũ Văn Lâm', 'Nguyễn Ngọc Hương', '0934132422', '0984242223', 'Vũ Văn Lâm', '0934132422', 'Bé có năng khiếu về ngôn ngữ', 'Không', 'http://localhost/DoAnTotNghiep/uploads/files/5rixdtvjgqmpyl4.jpg', 'Nam', 'Nguyễn Thị Nhung', 14),
(30, 'Nguyễn Thanh Thảo', '4', '2020-10-17', 'Lớp 5A1', 'Nguyễn Thanh Bình', 'Lương Nhật Hạ', '0976543685', '0964357575', 'Lương Nhật Hạ', '0964357575', 'Bé có năng khiếu mỹ thuật', 'Không', 'http://localhost/DoAnTotNghiep/uploads/files/a0b3he78xzqgjt6.jpg', 'Nữ', 'Nguyễn Thị Nhung', 14),
(31, 'Lương Thế Tài', '5', '2021-10-18', 'Lớp 4A1', 'Lương Thế Vinh', 'Tạ Thanh Tú', '0923142412', '0834343244', 'Tạ Thanh Tú', '0834343244', 'Bé có năng khiếu về ngôn ngữ', 'Không', 'http://localhost/DoAnTotNghiep/uploads/files/3d4uzpshqmar86f.jpg', 'Nam', 'Nguyễn Ngọc Thiên Hương', 9),
(32, 'Lương Hiểu Minh', '6', '2021-10-21', 'Lớp 4A1', 'Lương Thế Vinh', 'Tạ Thanh Tú', '0923142412', '0834343244', 'Tạ Thanh Tú', '0834343244', 'Bé có năng khiếu về ngôn ngữ', 'Không', 'http://localhost/DoAnTotNghiep/uploads/files/r2i4c8abygz1vlk.jpg', 'Nam', 'Nguyễn Ngọc Thiên Hương', 9),
(33, 'Nguyễn Ngọc Quang', '7', '2022-04-21', 'Lớp 3A1', 'Nguyễn Xuân Trình', 'Phạm Ngọc Dung', '0986436786', '0975435678', 'Phạm Ngọc Dung', '0975435678', 'Bé có năng khiếu về ngôn ngữ', 'Không', 'http://localhost/DoAnTotNghiep/uploads/files/tqja7e6l9_y05rf.jpg', 'Nam', 'Nguyễn Ngọc Yến Nhi', 11);

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
  `account_status` varchar(255) DEFAULT 'Pending',
  `assigned_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `photo`, `birth_day`, `resdence`, `phone`, `username`, `password`, `email`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `role`, `account_status`, `assigned_teacher`) VALUES
(14, 'Nguyễn', 'Nhi', 'http://localhost/DoAnTotNghiep/uploads/files/m4a1khquc820xj_.jpeg', '2000-05-07', 'Hải Phòng', '91234456', 'admin', '$2y$10$ol3Cz1cESR9tlzkp1jPtJO6t5L1C66tQ6WZk9qJ5bMXlds2YODjPW', 'admin@gmail.com', NULL, NULL, '2025-05-17 16:53:22', '2207762c4b431336b0324d4e253d67b5', 'admin', 'Active', ''),
(15, 'Đỗ', 'Phương', 'http://localhost/DoAnTotNghiep/uploads/files/n13tw8bmghpdfrs.jpg', '2000-05-01', 'Hải Phòng', '98754312', 'phuong', '$2y$10$GUEE0j.KIHq0PBBo8kuwku0u7WBwy/lPxgFA5amXC/5WNrk4JfVY6', 'phuong94155@st.vimaru.edu.vn', NULL, NULL, '2025-05-10 17:49:07', 'b9eb6bde4b43e9f11f28519e4e8eaa42', 'headteacher', 'Active', ''),
(16, 'Nguyễn', 'Dương', 'http://localhost/DoAnTotNghiep/uploads/files/sargtl7i3uv5wym.jpg', '2001-05-10', 'Hải Phòng', '0998763231', 'user1', '$2y$10$Q.fCw5jgxOHWCH/ZzoaCduVdTT8asQSrYCanC4PhWtDaPWzcMU6WS', 'user1@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'headteacher', 'Active', ''),
(17, 'Nguyễn Thu', 'Trang', 'http://localhost/DoAnTotNghiep/uploads/files/cwpngxufy5d8jva.jpg', '2000-05-10', 'Hải Phòng', '0935822111', 'trang', '$2y$10$cY7BxuccEjtGoaMJe8jLXO.r4/ewSyNNwhSdbhVzUdI95x2J/M/na', 'phuhuynh1@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'parents', 'Active', 'Nguyễn Ngọc Thiên Hương'),
(22, 'Nguyễn Thị', 'Lan', 'http://localhost/DoAnTotNghiep/uploads/files/0ltju63hpbe4dqs.jpg', '2000-05-11', 'Hải Phòng', '0982231312', 'lan', '$2y$10$qk0D4eGhueKGTOfPguwvwuQ45H6yoUQTVyxmatWBGSVWCXcxeAscq', 'phuhuynh2@gmail.com', NULL, NULL, '2021-04-21 00:00:00', NULL, 'parents', 'Active', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_detail`
--
ALTER TABLE `class_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
