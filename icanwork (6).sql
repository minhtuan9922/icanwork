-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 05:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icanwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1:candidate, 2:recruit',
  `date_create` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0:not active, 1:account normal, 2:account leve 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `password`, `active_code`, `type`, `date_create`, `status`) VALUES
('hoang.trinh@dsiviet.com.vn', '$2y$13$m4wd6/P6GCiu8qtSixexcOybyLlBXlXFnIGGmOBkQTLwCOejD9oCK', '253863', 2, '2017-10-09 15:00:08', 1),
('hoangngoctrinh1911@gmail.com', '$2y$13$ITn6ZlRj419feO9zvNIIteH5HMhV2Y8oLJttvJULqn9zil0LArqKO', '166989', 1, '2017-10-06 16:59:52', 1),
('ngocngan@gmail.com', '$2y$13$ITn6ZlRj419feO9zvNIIteH5HMhV2Y8oLJttvJULqn9zil0LArqKO', '166989', 1, '2017-10-06 16:59:52', 1),
('nguyentrungkien@gmail.com', '$2y$13$ITn6ZlRj419feO9zvNIIteH5HMhV2Y8oLJttvJULqn9zil0LArqKO', '166989', 1, '2017-10-06 16:59:52', 1),
('phanhuycuong@gmail.com', '$2y$13$ITn6ZlRj419feO9zvNIIteH5HMhV2Y8oLJttvJULqn9zil0LArqKO', '166989', 1, '2017-10-06 16:59:52', 1),
('thanhthao@gmail.com', '$2y$13$ITn6ZlRj419feO9zvNIIteH5HMhV2Y8oLJttvJULqn9zil0LArqKO', '166989', 1, '2017-10-06 16:59:52', 2),
('tranquangcuong@gmail.com', '$2y$13$ITn6ZlRj419feO9zvNIIteH5HMhV2Y8oLJttvJULqn9zil0LArqKO', '166989', 1, '2017-10-06 16:59:52', 1),
('trinh.le@dsiviet.com.vn', '$2y$13$m4wd6/P6GCiu8qtSixexcOybyLlBXlXFnIGGmOBkQTLwCOejD9oCK', '253863', 2, '2017-10-09 15:00:08', 1),
('trinhle@gmail.com', '$2y$13$ITn6ZlRj419feO9zvNIIteH5HMhV2Y8oLJttvJULqn9zil0LArqKO', '166989', 1, '2017-10-06 16:59:52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_id_create` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(254) UNSIGNED NOT NULL,
  `account_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1:male, 2:female',
  `birthday` date DEFAULT NULL,
  `marriage` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `literacy` int(10) UNSIGNED DEFAULT NULL,
  `experience` int(10) UNSIGNED DEFAULT NULL,
  `career` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_work` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` int(10) UNSIGNED DEFAULT NULL,
  `wage` int(10) UNSIGNED DEFAULT NULL,
  `target` text COLLATE utf8_unicode_ci,
  `education_json` text COLLATE utf8_unicode_ci,
  `language_json` text COLLATE utf8_unicode_ci,
  `work_experience_json` text COLLATE utf8_unicode_ci,
  `date_update` datetime DEFAULT NULL,
  `status_profile` int(11) DEFAULT NULL COMMENT '0:no active,1:normal, 2:new, 3:hot',
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` text COLLATE utf8_unicode_ci,
  `date_file_update` datetime DEFAULT NULL,
  `status_file` int(11) UNSIGNED DEFAULT NULL,
  `status_search` int(11) UNSIGNED DEFAULT NULL,
  `confrim_admin` int(11) UNSIGNED DEFAULT NULL,
  `date_confrim_admin` datetime DEFAULT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `account_email`, `name`, `img`, `phone`, `gender`, `birthday`, `marriage`, `address`, `title`, `literacy`, `experience`, `career`, `location`, `type_work`, `rank`, `wage`, `target`, `education_json`, `language_json`, `work_experience_json`, `date_update`, `status_profile`, `file_name`, `file_path`, `date_file_update`, `status_file`, `status_search`, `confrim_admin`, `date_confrim_admin`, `view`) VALUES
(1, 'hoangngoctrinh1911@gmail.com', 'Trinh Ngoc Hoang', 'asset/img/user/090994731142571716.jpg', '0909947311', 1, '1996-11-19', 1, '130 Ni sư Huỳnh Liên P10 Quận TB', 'IT', 1, 2, '1,2', '1,3', '1,2', 1, 1, '1%^&*2%^&*Mong muon thang tien nhu dieu gap gio abcdas asdasdasdasd', '[{"id":"4156","school":"Trường cao đẳng kỹ thuật cao thắng","specialized":"IT","classify":"1","edu_begin":"2017-10-04","edu_end":"2017-10-05"}]', '[{"id":"7573","language":"1","certificate":"1","point":"999"},{"id":"8871","language":"2","certificate":"9","point":"10"}]', '[{"id":"4966","name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"},{"id":9128,"name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"}]', '2017-10-23 04:12:48', NULL, 'Cv hoang', 'asset/file/cv/cv_hoang_33104.pdf', '2017-10-19 09:23:33', 1, 1, NULL, NULL, NULL),
(2, 'nguyentrungkien@gmail.com', 'Nguyễn Trung Kiên', '', '0909947311', 1, '1996-11-19', 1, '130 Ni sư Huỳnh Liên P10 Quận TB', 'IT', 1, 2, '1', '1', '1', 1, 1, '1%^&*2%^&*Mong muon thang tien nhu dieu gap gio abcdas asdasdasdasd', '[{"id":"4156","school":"CKC","specialized":"IT","classify":"1","edu_begin":"2017-10-04","edu_end":"2017-10-05"}]', '[{"id":"7573","language":"1","certificate":"1","point":"999"},{"id":"8871","language":"2","certificate":"9","point":"10"}]', '[{"id":"4966","name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"},{"id":9128,"name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"}]', '2017-10-19 03:43:08', 1, 'Cv hoang', 'asset/file/cv/cv_hoang_33104.pdf', '2017-10-19 09:23:33', 1, 1, NULL, NULL, NULL),
(3, 'phanhuycuong@gmail.com', 'Phan Huy Cường', 'asset/img/user/090994731142571716.jpg', '0909947311', 1, '1996-11-19', 1, '130 Ni sư Huỳnh Liên P10 Quận TB', 'IT', 1, 2, '1,2', '1,3', '1,2', 1, 1, '1%^&*2%^&*Mong muon thang tien nhu dieu gap gio abcdas asdasdasdasd', '[{"id":"4156","school":"CKC","specialized":"IT","classify":"1","edu_begin":"2017-10-04","edu_end":"2017-10-05"}]', '[{"id":"7573","language":"1","certificate":"1","point":"999"},{"id":"8871","language":"2","certificate":"9","point":"10"}]', '[{"id":"4966","name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"},{"id":9128,"name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"}]', '2017-10-19 03:43:08', 1, 'Cv hoang', 'asset/file/cv/cv_hoang_33104.pdf', '2017-10-19 09:23:33', 1, 1, NULL, NULL, NULL),
(4, 'tranquangcuong@gmail.com', 'Trần Quang Cường', '', '0909947311', 1, '1996-11-19', 1, '130 Ni sư Huỳnh Liên P10 Quận TB', 'IT', 1, 2, '1', '1', '1', 1, 1, '1%^&*2%^&*Mong muon thang tien nhu dieu gap gio abcdas asdasdasdasd', '[{"id":"4156","school":"CKC","specialized":"IT","classify":"1","edu_begin":"2017-10-04","edu_end":"2017-10-05"}]', '[{"id":"7573","language":"1","certificate":"1","point":"999"},{"id":"8871","language":"2","certificate":"9","point":"10"}]', '[{"id":"4966","name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"},{"id":9128,"name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"}]', '2017-10-19 03:43:08', 1, 'Cv hoang', 'asset/file/cv/cv_hoang_33104.pdf', '2017-10-19 09:23:33', 1, 1, NULL, NULL, NULL),
(5, 'trinhle@gmail.com', 'Trinh Lê', '', '0909947311', 2, '1997-09-27', 1, '130 Ni sư Huỳnh Liên P10 Quận TB', 'IT', 1, 2, '1', '1', '1', 1, 1, '1%^&*2%^&*Mong muon thang tien nhu dieu gap gio abcdas asdasdasdasd', '[{"id":"4156","school":"CKC","specialized":"IT","classify":"1","edu_begin":"2017-10-04","edu_end":"2017-10-05"}]', '[{"id":"7573","language":"1","certificate":"1","point":"999"},{"id":"8871","language":"2","certificate":"9","point":"10"}]', '[{"id":"4966","name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"},{"id":9128,"name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"}]', '2017-10-19 03:43:08', 1, 'Cv hoang', 'asset/file/cv/cv_hoang_33104.pdf', '2017-10-19 09:23:33', 1, 1, NULL, NULL, NULL),
(6, 'thanhthao@gmail.com', 'Nguyễn Ngọc Thanh Thảo', '', '0909947311', 2, '1996-02-17', 1, '130 Ni sư Huỳnh Liên P10 Quận TB', 'IT', 1, 2, '1,2', '1,3', '1,2', 1, 1, '1%^&*2%^&*Mong muon thang tien nhu dieu gap gio abcdas asdasdasdasd', '[{"id":"4156","school":"CKC","specialized":"IT","classify":"1","edu_begin":"2017-10-04","edu_end":"2017-10-05"}]', '[{"id":"7573","language":"1","certificate":"1","point":"999"},{"id":"8871","language":"2","certificate":"9","point":"10"}]', '[{"id":"4966","name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"},{"id":9128,"name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"}]', '2017-10-19 03:43:08', 1, 'Cv hoang', 'asset/file/cv/cv_hoang_33104.pdf', '2017-10-19 09:23:33', 1, 1, NULL, NULL, NULL),
(7, 'ngocngan@gmail.com', 'Nguyễn Ngọc Ngân', '', '0909947311', 2, '1995-04-30', 1, '130 Ni sư Huỳnh Liên P10 Quận TB', 'IT', 1, 2, '1', '1', '1', 1, 1, '1%^&*2%^&*Mong muon thang tien nhu dieu gap gio abcdas asdasdasdasd', '[{"id":"4156","school":"CKC","specialized":"IT","classify":"1","edu_begin":"2017-10-04","edu_end":"2017-10-05"}]', '[{"id":"7573","language":"1","certificate":"1","point":"999"},{"id":"8871","language":"2","certificate":"9","point":"10"}]', '[{"id":"4966","name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"},{"id":9128,"name_company":"DSI VIET","office":"IT","num_wage":"4500000","currency":"1","time_start":"2017-10-04","time_end":"2017-10-05","description":"L&agrave;m những c&ocirc;ng việc được giao: code Website, Kiểm tra hosting, Gia hạn hosting"}]', '2017-10-19 03:43:08', 1, 'Cv hoang', 'asset/file/cv/cv_hoang_33104.pdf', '2017-10-19 09:23:33', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `career_id` int(11) UNSIGNED NOT NULL,
  `career_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`career_id`, `career_name`, `career_status`, `lang`) VALUES
(1, 'IT phần mềm', 1, 1),
(2, 'IT phần cứng', 1, 1),
(3, 'Tài chính ngân hàng', 1, 1),
(4, 'Kinh doanh', 1, 1),
(5, 'Điện tử tin học', 1, 1),
(6, 'Bưu chính viễn thông', 1, 1),
(7, 'Bán hàng', 1, 1),
(8, 'Quản lý điều hành', 1, 1),
(9, 'Xây dựng', 1, 1),
(10, 'Bất động sản', 1, 1),
(11, 'Thực phẩm/DV ăn uống', 1, 1),
(12, 'Thiết kế mỹ thuật', 1, 1),
(13, 'Ngoại ngữ', 1, 1),
(14, 'Y tế', 1, 1),
(15, 'Bán hàng', 1, 1),
(16, 'Chăm sóc khách hàng', 1, 1),
(17, 'Phát triển thị trường', 1, 1),
(18, 'Nhân sự', 1, 1),
(19, 'Tư vấn bảo hiểm', 1, 1),
(20, 'Nông lâm sản', 1, 1),
(21, 'Điện ảnh', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `cer_id` int(11) UNSIGNED NOT NULL,
  `cer_language` int(11) UNSIGNED NOT NULL,
  `cer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cer_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`cer_id`, `cer_language`, `cer_name`, `cer_status`) VALUES
(1, 1, 'TOEIC', 1),
(2, 1, 'IELTS', 1),
(3, 1, 'TOEFL', 1),
(4, 1, 'SAT', 1),
(5, 1, 'GMAT', 1),
(6, 1, 'GRE', 1),
(7, 2, 'N1', 1),
(8, 2, 'N2', 1),
(9, 2, 'N3', 1),
(10, 2, 'N4', 1),
(11, 2, 'N5', 1),
(12, 3, 'TIỂU HỌC', 1),
(13, 3, 'TRUNG HỌC', 1),
(14, 3, 'PHỔ THÔNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classify`
--

CREATE TABLE `classify` (
  `class_id` int(11) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classify`
--

INSERT INTO `classify` (`class_id`, `class_name`, `class_status`, `lang`) VALUES
(1, 'Xuất xắc', 1, 1),
(2, 'Giỏi', 1, 1),
(3, 'Khá', 1, 1),
(4, 'Trung bình', 1, 1),
(5, 'Khác', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `key` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`key`, `value`) VALUES
('home_career', '9'),
('num_candidate_hlight_right', '10'),
('number_candidate', '10'),
('number_fast', '9'),
('number_page_recruit', '10'),
('number_post_hot', '10'),
('number_post_new', '20'),
('number_recruit', '10');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `edu_id` int(11) UNSIGNED NOT NULL,
  `edu_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edu_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`edu_id`, `edu_name`, `edu_status`, `lang`) VALUES
(1, 'Đại Học', 1, 1),
(2, 'Cao Đẳng', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `exp_id` int(11) UNSIGNED NOT NULL,
  `exp_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exp_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`exp_id`, `exp_name`, `exp_status`, `lang`) VALUES
(1, 'Chưa có kinh nghiệm', 1, 1),
(2, '1 Năm', 1, 1),
(3, '2 Năm', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `lang_id` int(11) UNSIGNED NOT NULL,
  `lang_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `lang_name`, `lang_status`, `lang`) VALUES
(1, 'Tiếng Anh', 1, 1),
(2, 'Tiếng Nhật', 1, 1),
(3, 'Tiếng Việt Nam', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loca_id` int(11) UNSIGNED NOT NULL,
  `loca_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loca_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loca_id`, `loca_name`, `loca_status`, `lang`) VALUES
(1, 'TP.HCM', 1, 1),
(2, 'Hà Nội', 1, 1),
(3, 'Bình Dương', 1, 1),
(4, 'Vũng Tàu', 1, 1),
(5, 'Đồng Nai', 1, 1),
(6, 'Đà nặng', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) UNSIGNED NOT NULL,
  `email_send` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_receive` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `date_send` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(22);

-- --------------------------------------------------------

--
-- Table structure for table `post_recruit`
--

CREATE TABLE `post_recruit` (
  `post_id` int(254) UNSIGNED NOT NULL,
  `recruit_id` int(254) UNSIGNED NOT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `rank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_work` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wage` int(10) UNSIGNED DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `experience` int(10) UNSIGNED DEFAULT NULL,
  `literacy` int(10) UNSIGNED DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `interest` text COLLATE utf8_unicode_ci,
  `requirement_job` text COLLATE utf8_unicode_ci,
  `date_deadline` datetime DEFAULT NULL,
  `language_profile` int(11) DEFAULT NULL,
  `user_contact_post_json` text COLLATE utf8_unicode_ci,
  `date_update` datetime DEFAULT NULL,
  `admin_confrim` int(11) DEFAULT NULL,
  `date_confrim` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0:not active,1:normal, 2:Viec lam noi bat, 3:viec lam gap',
  `view` int(11) UNSIGNED DEFAULT NULL,
  `num_recruitment` int(11) UNSIGNED DEFAULT NULL,
  `icon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_recruit`
--

INSERT INTO `post_recruit` (`post_id`, `recruit_id`, `job`, `number`, `rank`, `type_work`, `wage`, `percent`, `experience`, `literacy`, `gender`, `location`, `career`, `description`, `interest`, `requirement_job`, `date_deadline`, `language_profile`, `user_contact_post_json`, `date_update`, `admin_confrim`, `date_confrim`, `status`, `view`, `num_recruitment`, `icon`) VALUES
(1, 2, 'Lập trình viên PHP senior, junior developer pro', 2, '1', '1', 2, NULL, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-10-28 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:05:02', NULL, NULL, 0, NULL, NULL, NULL),
(2, 2, 'Lập trình viên Java', 1, '1', '1', 1, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-19 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:07:42', NULL, NULL, 1, NULL, NULL, 1),
(3, 2, 'Lập trình viên IOS, Android', 1, '1', '1', 3, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-30 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:08:25', NULL, NULL, 1, NULL, NULL, NULL),
(4, 2, 'Lập trình viên PHP junior', 2, '1', '1', 4, NULL, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-03 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:11:12', NULL, NULL, 1, NULL, NULL, NULL),
(5, 2, 'Lập trình viên C#', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 1, NULL, NULL, NULL),
(6, 2, 'Lập trình viên Unity', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-19 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:07:42', NULL, NULL, 1, NULL, NULL, NULL),
(7, 2, 'Lập trình viên empled', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-30 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:08:25', NULL, NULL, 1, NULL, NULL, NULL),
(8, 2, 'management', 2, '1', '1', 2, NULL, 1, 1, 0, '1,3', '2', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-03 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:11:12', NULL, NULL, 1, NULL, NULL, NULL),
(9, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 1, NULL, NULL, 1),
(10, 2, 'Lập trình viên mạng', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-19 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:07:42', NULL, NULL, 1, NULL, NULL, NULL),
(11, 2, 'Lập trình viên ', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '3', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-30 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:08:25', NULL, NULL, 1, NULL, NULL, NULL),
(12, 2, 'Lập trình viên PHP junior', 2, '1', '1', 2, NULL, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-03 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:11:12', NULL, NULL, 1, NULL, NULL, NULL),
(13, 2, 'Lập trình viên C#', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 1, NULL, NULL, NULL),
(14, 2, 'Lập trình viên Unity', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-19 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:07:42', NULL, NULL, 1, NULL, NULL, 1),
(15, 2, 'Lập trình viên empled', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '4', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-30 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-25 09:08:25', NULL, NULL, 1, NULL, NULL, NULL),
(16, 2, 'management', 2, '1', '1', 2, NULL, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-03 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:11:12', NULL, NULL, 1, NULL, NULL, NULL),
(17, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 1, NULL, NULL, NULL),
(18, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(19, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(20, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(21, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '5', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(22, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(23, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, 1),
(24, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(25, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `post_recruit` (`post_id`, `recruit_id`, `job`, `number`, `rank`, `type_work`, `wage`, `percent`, `experience`, `literacy`, `gender`, `location`, `career`, `description`, `interest`, `requirement_job`, `date_deadline`, `language_profile`, `user_contact_post_json`, `date_update`, `admin_confrim`, `date_confrim`, `status`, `view`, `num_recruitment`, `icon`) VALUES
(26, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, 1),
(27, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(28, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(29, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(30, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 2, NULL, NULL, NULL),
(31, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 2, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL),
(32, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL),
(33, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL),
(34, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 2, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL),
(35, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, 1),
(36, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 3, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL),
(37, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, 1),
(38, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 3, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL),
(39, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 2, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL),
(40, 2, 'Lập trình viên python', 1, '1', '1', 2, 1, 1, 1, 0, '1,3', '1', '- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng. \r\n- Hướng dẫn kh&aacute;ch h&agrave;ng tiềm năng tham quan c&acirc;u lạc bộ v&agrave; tư vấn về c&aacute;c trang thiết bị, dịch vụ, \r\n- Tư vấn chương tr&igrave;nh hội vi&ecirc;n th&iacute;ch hợp nhất cho kh&aacute;ch h&agrave;ng. \r\n- Thuyết phục kh&aacute;ch h&agrave;ng tham gia thẻ hội vi&ecirc;n. \r\n- Thường xuy&ecirc;n li&ecirc;n lạc để kịp thời nắm bắt th&ocirc;ng tin từ hội vi&ecirc;n đảm bảo lu&ocirc;n cung cấp dịch vụ vượt sự mong đợi của kh&aacute;ch h&agrave;ng.\r\n- Địa điểm l&agrave;m việc tại H&agrave; Nội: \r\n1. 72 Nguyễn Tr&atilde;i, Thanh Xu&acirc;n, H&agrave; Nội.\r\n2. 41 Hai B&agrave; Trưng, Ho&agrave;n Kiếm, H&agrave; Nội.\r\n3. 88 L&aacute;ng Hạ, Đống Đa, H&agrave; Nội.', '- Mức lương cạnh tranh, c&aacute;c khoản thưởng theo năng lực h&agrave;ng th&aacute;ng, \r\n- Chương tr&igrave;nh tập luyện miễn ph&iacute; v&agrave; một m&ocirc;i trường l&agrave;m việc năng động l&agrave; một trong những điểm bạn c&oacute; khi l&agrave; th&agrave;nh vi&ecirc;n của California Fitness &amp; Yoga Centers. \r\n- C&aacute;c bảo hiểm theo nh&agrave; nước qui định, bảo hiểm tai nạn 24/24.\r\n- Ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty đa quốc gia, hiện c&oacute; mặt hơn 15 nước, bạn sẽ c&oacute; nhiều cơ hội để học hỏi v&agrave; thể hiện m&igrave;nh.', '- C&oacute; khả năng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.\r\n- Kỹ năng giao tiếp, thuyết phục tốt bằng tiếng Việt v&agrave; tiếng Anh.\r\n- Ngoại h&igrave;nh dễ nh&igrave;n, t&aacute;c phong chuy&ecirc;n nghiệp; tuổi từ 20 - 28.\r\n- Ưu ti&ecirc;n cho ứng vi&ecirc;n c&oacute; 1 năm Kinh nghiệm trong lĩnh vực b&aacute;n h&agrave;ng.', '2017-11-02 00:00:00', 0, '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Ho&agrave;ng","phone_contact":"0909947311"}', '2017-10-23 15:12:29', NULL, NULL, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `rank_id` int(11) UNSIGNED NOT NULL,
  `rank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`rank_id`, `rank_name`, `rank_status`, `lang`) VALUES
(1, 'Nhân viên', 1, 1),
(2, 'Giám đốc', 1, 1),
(3, 'Phó giám đốc', 1, 1),
(4, 'Trưởng nhóm', 1, 1),
(5, 'Khác', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recruit`
--

CREATE TABLE `recruit` (
  `recruit_id` int(254) UNSIGNED NOT NULL,
  `account_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8_unicode_ci,
  `phone_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `city` int(11) DEFAULT NULL,
  `birthday_company` date DEFAULT NULL,
  `address_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scale` int(11) DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_contact_json` text COLLATE utf8_unicode_ci,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recruit`
--

INSERT INTO `recruit` (`recruit_id`, `account_email`, `name_company`, `logo`, `phone_company`, `description`, `city`, `birthday_company`, `address_company`, `scale`, `fax`, `website`, `user_contact_json`, `date_update`) VALUES
(2, 'hoang.trinh@dsiviet.com.vn', 'Công ty TNHH quốc tế Bình Minh', 'asset/img/logo_company/090994731175706481.png', '0909947311', 'Bất động sản', 1, '1996-11-19', 'D34 Bình Dương', 1, '', 'dsiviet.com', '{"email_contact":"hoangngoctrinh1911@gmail.com","name_contact":"Hoàng","phone_contact":"0909947311"}', '2017-10-09 15:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `scale`
--

CREATE TABLE `scale` (
  `scale_id` int(11) UNSIGNED NOT NULL,
  `scale_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scale_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scale`
--

INSERT INTO `scale` (`scale_id`, `scale_name`, `scale_status`, `lang`) VALUES
(1, 'Không xác định', 1, 1),
(2, '10 - 20 người', 1, 1),
(3, '20 - 50 người', 1, 1),
(4, '50 - 100 người', 1, 1),
(5, 'Trên 100 người', 1, 1),
(6, 'Trên 1000 người', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `admin_id_create` int(11) DEFAULT NULL,
  `admin_id_update` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `target_id` int(11) UNSIGNED NOT NULL,
  `target_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`target_id`, `target_name`, `target_status`, `lang`) VALUES
(1, 'Mong muốn tìm được chổ làm ổn định', 1, 1),
(2, 'Mong muốn có cơ hội thăng tiến', 1, 1),
(3, 'Mong muốn mức lương hấp dẫn', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_work`
--

CREATE TABLE `type_work` (
  `work_id` int(11) UNSIGNED NOT NULL,
  `work_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_work`
--

INSERT INTO `type_work` (`work_id`, `work_name`, `work_status`, `lang`) VALUES
(1, 'Toàn thời gian', 1, 1),
(2, 'Bán thời gian', 1, 1),
(3, 'Thời vụ', 1, 1),
(4, 'Ngoài giờ', 1, 1),
(5, 'Khác', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wage`
--

CREATE TABLE `wage` (
  `wage_id` int(11) UNSIGNED NOT NULL,
  `wage_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wage_status` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wage`
--

INSERT INTO `wage` (`wage_id`, `wage_name`, `wage_status`, `lang`) VALUES
(1, '1 - 3 triệu', 1, 1),
(2, '3 - 5 triệu', 1, 1),
(3, '10 triệu', 1, 1),
(4, '> 10 triệu', 1, 1),
(5, 'Thương lượng', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`cer_id`);

--
-- Indexes for table `classify`
--
ALTER TABLE `classify`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loca_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `post_recruit`
--
ALTER TABLE `post_recruit`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `recruit`
--
ALTER TABLE `recruit`
  ADD PRIMARY KEY (`recruit_id`);

--
-- Indexes for table `scale`
--
ALTER TABLE `scale`
  ADD PRIMARY KEY (`scale_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`target_id`);

--
-- Indexes for table `type_work`
--
ALTER TABLE `type_work`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `wage`
--
ALTER TABLE `wage`
  ADD PRIMARY KEY (`wage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(254) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `career_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `cer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `classify`
--
ALTER TABLE `classify`
  MODIFY `class_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `edu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `exp_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `lang_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loca_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_recruit`
--
ALTER TABLE `post_recruit`
  MODIFY `post_id` int(254) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `rank_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recruit`
--
ALTER TABLE `recruit`
  MODIFY `recruit_id` int(254) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `scale`
--
ALTER TABLE `scale`
  MODIFY `scale_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `target_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `type_work`
--
ALTER TABLE `type_work`
  MODIFY `work_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wage`
--
ALTER TABLE `wage`
  MODIFY `wage_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
