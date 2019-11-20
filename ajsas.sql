-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 01:06 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajsas`
--

-- --------------------------------------------------------

--
-- Table structure for table `academe`
--

CREATE TABLE `academe` (
  `academe_id` int(4) NOT NULL COMMENT 'รหัสสถานศึกษา',
  `academe_name` varchar(100) NOT NULL COMMENT 'ชื่อสถานศึกษา',
  `address` varchar(100) NOT NULL COMMENT 'ที่อยู่สถานศึกษา',
  `phonenumber` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ดำเนินการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(7) NOT NULL COMMENT 'รหัสบทความวิชาการ',
  `user_id` int(7) NOT NULL COMMENT 'รหัสผู้ใช้งานระบบ',
  `type_article_id` int(3) NOT NULL COMMENT 'รหัสประเภทบทความ',
  `article_name_th` varchar(100) NOT NULL COMMENT 'ชื่อบทความภาษาไทย',
  `article_name_en` varchar(100) NOT NULL COMMENT 'ชื่อบทความภาษาอังกฤษ',
  `abstract_th` text NOT NULL COMMENT 'บทคัดย่อภาษาไทย',
  `abstract_en` text NOT NULL COMMENT 'บทคัดย่อภาษาอังกฤษ',
  `keyword_th` varchar(100) NOT NULL COMMENT 'คำสำคัญภาษาไทย',
  `keyword_en` varchar(100) NOT NULL COMMENT 'คำสำคัญภาษาอังกฤษ',
  `attach_article` varchar(150) NOT NULL COMMENT 'แนบไฟล์บทความ',
  `date_article` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `user_id`, `type_article_id`, `article_name_th`, `article_name_en`, `abstract_th`, `abstract_en`, `keyword_th`, `keyword_en`, `attach_article`, `date_article`) VALUES
(3, 0, 5, 'ระบบงานวารสาร', 'ชื่อบทความ(ภาษาอังกฤษ)', 'บทคัดย่อ(ภาษาไทย)', 'บทคัดย่อ(ภาษาอังกฤษ)*', 'คำสำคัญ(ภาษาไทย)*', 'คำสำคัญ(ภาษาอังกฤษ)*', '1565277136_5549.docx', '2019-09-03 11:18:29'),
(4, 0, 6, 'ระบบกิจกรรมชุมนุมออนไลน์1', 'System activity', '', '', 'กิจกรรมชุมนุม ', 'Activities', '1566219985_3070.docx', '2019-09-03 11:18:47'),
(5, 0, 2, 'วารสารมหาลัย', 'System activity', 'ๆไำๆกฟหกฟหัดกากดทาสกวด', 'jjoidfjgsugin;asdirew', 'คำสำคัญ ภาษาไทย', 'Activities', '1566387130_79.docx', '2019-09-03 11:18:21'),
(6, 0, 3, 'วารสารนิกเอง', 'System activity', 'ๆไำไๆำฟหกฟหก', 'sddfsdfsdfzcxxzc', 'คำสำคัญ(ภาษาไทย)*', 'คำสำคัญ(ภาษาอังกฤษ)*', '1567087771_3748.docx', '2019-09-03 11:18:25'),
(7, 0, 1, 'ไทย', 'thai', 'ภาษาไทยแต่กำเนิดนั้น....', 'The native Thai language ....', 'ไทย , ภาษาไทย', 'Thai , Thai language', '1567509472_1930.docx', '2019-09-03 11:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assessment_id` int(2) NOT NULL COMMENT 'รหัสคะแนนการประเมิน',
  `assessment_type` varchar(50) NOT NULL COMMENT 'คะแนนการประเมิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessment_id`, `assessment_type`) VALUES
(1, 'ยอมรับการตีพิมพ์ แบบไม่ต้องแก้ไข'),
(2, 'ยอมรับการตีพิมพ์ แบบมีเงื่อนแก้ไข'),
(3, 'ไม่ยอมรับการตีพิมพ์');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_journal`
--

CREATE TABLE `calendar_journal` (
  `journal_id` int(5) NOT NULL COMMENT 'รหัสวารสารวิชาการ',
  `cal_type` int(1) NOT NULL COMMENT 'ประเภทการดำเนินงาน',
  `date_start` date NOT NULL COMMENT 'วันที่เริ่ม',
  `date_end` date NOT NULL COMMENT 'วันที่สิ้นสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `combine_doc`
--

CREATE TABLE `combine_doc` (
  `combine_doc_id` int(6) NOT NULL COMMENT 'รหัสการส่งคืนคอมเมนต์',
  `article_id` int(7) NOT NULL COMMENT 'รหัสบทความวิชาการ',
  `attach_doc` varchar(100) NOT NULL COMMENT 'แนบไฟล์',
  `date_doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่ดำเนินงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment_article`
--

CREATE TABLE `comment_article` (
  `comment_id` int(6) NOT NULL COMMENT 'รหัสการส่งคืนคอมเมนต์',
  `article_id` int(7) NOT NULL COMMENT 'รหัสบทความวิชาการ',
  `attach_comment` varchar(50) NOT NULL COMMENT 'แนบไฟล์',
  `addcomment` text NOT NULL COMMENT 'ข้อเสนอแนะ',
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่ดำเนินงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_sys`
--

CREATE TABLE `config_sys` (
  `config_sys _id` int(4) NOT NULL COMMENT 'รหัส',
  `status` int(2) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `editor _id` int(4) NOT NULL COMMENT 'รหัสบรรณาธิการ',
  `user_id` int(7) NOT NULL COMMENT 'รหัสผู้ใช้งานระบบ',
  `date_editor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่',
  `status` int(2) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation_id` int(4) NOT NULL COMMENT 'รหัสการประเมิน',
  `article_id` int(7) NOT NULL COMMENT 'รหัสบทความวิชาการ',
  `highness _id` int(4) NOT NULL COMMENT 'รหัสผู้ทรงวุฒิฯ',
  `assessment_id` int(3) NOT NULL COMMENT 'คะแนนการประเมิน',
  `comment_eva` varchar(100) NOT NULL COMMENT 'คอมเมนต์',
  `comment_type` varchar(255) NOT NULL COMMENT 'ข้อเสนอแนะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`evaluation_id`, `article_id`, `highness _id`, `assessment_id`, `comment_eva`, `comment_type`) VALUES
(3, 3, 0, 1, '1567086641_3443.docx', 'ผ่าน');

-- --------------------------------------------------------

--
-- Table structure for table `highness`
--

CREATE TABLE `highness` (
  `highness _id` int(4) NOT NULL COMMENT 'รหัสผู้ทรงวุฒิฯ',
  `user_id` int(7) NOT NULL COMMENT 'รหัสผู้ใช้งานระบบ',
  `status` int(2) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `journal_doc`
--

CREATE TABLE `journal_doc` (
  `journal_doc_id` int(6) NOT NULL COMMENT 'รหัสเอกสารวารสารวิชาการ',
  `year` char(10) NOT NULL COMMENT 'ปี',
  `title` varchar(20) NOT NULL COMMENT 'ชื่อฉบับ',
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่สิ้นสุด',
  `status` int(2) NOT NULL COMMENT 'สถานะวารสาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(5) NOT NULL COMMENT 'รหัสข่าวประชาสัมพันธ์',
  `editor_id` int(8) NOT NULL COMMENT 'รหัสบรรณาธิการ',
  `title_news` varchar(100) NOT NULL COMMENT 'หัวข้อข่าวประชาสัมพันธ์',
  `news_text` text NOT NULL COMMENT 'เนื้อหาข่าวประชาสัมพันธ์',
  `status_publish` int(1) NOT NULL COMMENT 'สถานะการเผยแพร่',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ดำเนินการ',
  `user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pre`
--

CREATE TABLE `pre` (
  `pre _id` int(4) NOT NULL COMMENT 'รหัสคำนำหน้า',
  `pre_th` varchar(20) NOT NULL COMMENT 'รหัสคำนำหน้าทางวิชาภาษาไทย',
  `pre_en` varchar(20) NOT NULL COMMENT 'รหัสคำนำหน้าทางวิชาภาษาอังกฤษ',
  `pre_th_short` varchar(20) NOT NULL COMMENT 'คำนำหน้าทางวิชาการ ภาษาไทยตัวย่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prefixes`
--

CREATE TABLE `prefixes` (
  `prefixes _id` int(2) NOT NULL COMMENT 'รหัสคำนำหน้า',
  `prefixes_th` varchar(10) NOT NULL COMMENT 'รหัสคำนำหน้าภาษาไทย',
  `prefixes_en` varchar(10) NOT NULL COMMENT 'รหัสคำนำหน้าภาษาอังกฤษ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `read_ article`
--

CREATE TABLE `read_ article` (
  `read_ article _id` int(4) NOT NULL COMMENT 'รหัสการอ่านบทความ',
  `article_id` int(7) NOT NULL COMMENT 'รหัสบทความววิชาการ',
  `highness _id` int(4) NOT NULL COMMENT 'รหัสผู้ทรงวุฒิฯ',
  `date_read` date NOT NULL COMMENT 'วันที่ทำรายการ',
  `accept_status` int(2) NOT NULL COMMENT 'การตอบรับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `spacialization`
--

CREATE TABLE `spacialization` (
  `type_article_id` int(4) NOT NULL COMMENT 'รหัสประเภทบทความ',
  `user_id` int(7) NOT NULL COMMENT 'รหัสผู้ใช้งานระบบ',
  `type_article_group_id` int(4) NOT NULL COMMENT 'รหัสประเภทบทความ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_article`
--

CREATE TABLE `type_article` (
  `type_article_id` int(3) NOT NULL,
  `type_article_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_article`
--

INSERT INTO `type_article` (`type_article_id`, `type_article_name`) VALUES
(1, 'ฟิสิกส์'),
(2, 'เคมี'),
(3, 'ชีววิทยา'),
(4, 'คณิตศาสตร์'),
(5, 'วิทยาศาสตร์สิ่งแวดล้อม'),
(6, 'วิทยาการคอมพิวเตอร์'),
(7, 'เทคโนโลยีสารสนเทศ'),
(8, 'วิทยาศาสตร์การกีฬา'),
(9, 'วิทยาศาสตร์สุขภาพ'),
(10, 'วิทยาการเข้ารหัสลับข้อมูล'),
(11, 'อื่น ๆ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(7) NOT NULL COMMENT 'รหัสผู้ใช้งานระบบ',
  `type_user_id` int(3) NOT NULL COMMENT 'รหัสประเภทผู้ใช้งานระบบ',
  `email` varchar(50) NOT NULL COMMENT 'อีเมล์ในการเข้าสู่ระบบ',
  `password` varchar(32) NOT NULL COMMENT 'รหัสผ่าน',
  `academe_id` int(4) NOT NULL COMMENT 'รหัสสถานศึกษา',
  `prefixes_th` varchar(7) NOT NULL COMMENT 'คำนำหน้าภาษาไทย',
  `prefixes_en` varchar(7) NOT NULL COMMENT 'คำนำหน้าภาษาอังกฤษ',
  `pre_th` varchar(30) NOT NULL COMMENT 'คำนำหน้าทางวิชาการ ภาษาไทยตัวเต็ม',
  `pre_th_short` varchar(10) NOT NULL COMMENT 'คำนำหน้าทางวิชาการ ภาษาไทยตัวย่อ',
  `pre_en` varchar(10) NOT NULL COMMENT 'คำนำหน้าทางวิชาการ ภาษาอังกฤษ',
  `name_th` varchar(40) NOT NULL COMMENT 'ชื่อภาษาไทย',
  `surname_th` varchar(40) NOT NULL COMMENT 'นามสกุลภาษาไทย',
  `name_en` varchar(30) NOT NULL COMMENT 'ชื่อภาษาอังกฤษ',
  `surname_en` varchar(30) NOT NULL COMMENT 'นามสกุลภาษาอังกฤษ',
  `address` varchar(100) NOT NULL COMMENT 'ที่อยู่',
  `zipcode` char(5) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `phonenumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `type_user_id`, `email`, `password`, `academe_id`, `prefixes_th`, `prefixes_en`, `pre_th`, `pre_th_short`, `pre_en`, `name_th`, `surname_th`, `name_en`, `surname_en`, `address`, `zipcode`, `phonenumber`) VALUES
(1, 4, 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0, '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academe`
--
ALTER TABLE `academe`
  ADD PRIMARY KEY (`academe_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assessment_id`);

--
-- Indexes for table `calendar_journal`
--
ALTER TABLE `calendar_journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `combine_doc`
--
ALTER TABLE `combine_doc`
  ADD PRIMARY KEY (`combine_doc_id`);

--
-- Indexes for table `comment_article`
--
ALTER TABLE `comment_article`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `config_sys`
--
ALTER TABLE `config_sys`
  ADD PRIMARY KEY (`config_sys _id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`editor _id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`);

--
-- Indexes for table `highness`
--
ALTER TABLE `highness`
  ADD PRIMARY KEY (`highness _id`);

--
-- Indexes for table `journal_doc`
--
ALTER TABLE `journal_doc`
  ADD PRIMARY KEY (`journal_doc_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `pre`
--
ALTER TABLE `pre`
  ADD PRIMARY KEY (`pre _id`);

--
-- Indexes for table `prefixes`
--
ALTER TABLE `prefixes`
  ADD PRIMARY KEY (`prefixes _id`);

--
-- Indexes for table `read_ article`
--
ALTER TABLE `read_ article`
  ADD PRIMARY KEY (`read_ article _id`);

--
-- Indexes for table `spacialization`
--
ALTER TABLE `spacialization`
  ADD PRIMARY KEY (`type_article_id`);

--
-- Indexes for table `type_article`
--
ALTER TABLE `type_article`
  ADD PRIMARY KEY (`type_article_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academe`
--
ALTER TABLE `academe`
  MODIFY `academe_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานศึกษา';
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(7) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบทความวิชาการ', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assessment_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคะแนนการประเมิน', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `calendar_journal`
--
ALTER TABLE `calendar_journal`
  MODIFY `journal_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสวารสารวิชาการ';
--
-- AUTO_INCREMENT for table `combine_doc`
--
ALTER TABLE `combine_doc`
  MODIFY `combine_doc_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการส่งคืนคอมเมนต์';
--
-- AUTO_INCREMENT for table `comment_article`
--
ALTER TABLE `comment_article`
  MODIFY `comment_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการส่งคืนคอมเมนต์';
--
-- AUTO_INCREMENT for table `config_sys`
--
ALTER TABLE `config_sys`
  MODIFY `config_sys _id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';
--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `editor _id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบรรณาธิการ';
--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการประเมิน', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `highness`
--
ALTER TABLE `highness`
  MODIFY `highness _id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ทรงวุฒิฯ';
--
-- AUTO_INCREMENT for table `journal_doc`
--
ALTER TABLE `journal_doc`
  MODIFY `journal_doc_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเอกสารวารสารวิชาการ';
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสข่าวประชาสัมพันธ์';
--
-- AUTO_INCREMENT for table `pre`
--
ALTER TABLE `pre`
  MODIFY `pre _id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำนำหน้า';
--
-- AUTO_INCREMENT for table `prefixes`
--
ALTER TABLE `prefixes`
  MODIFY `prefixes _id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำนำหน้า';
--
-- AUTO_INCREMENT for table `read_ article`
--
ALTER TABLE `read_ article`
  MODIFY `read_ article _id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการอ่านบทความ';
--
-- AUTO_INCREMENT for table `spacialization`
--
ALTER TABLE `spacialization`
  MODIFY `type_article_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทบทความ';
--
-- AUTO_INCREMENT for table `type_article`
--
ALTER TABLE `type_article`
  MODIFY `type_article_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งานระบบ', AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
