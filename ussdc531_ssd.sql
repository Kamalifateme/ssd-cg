-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2017 at 05:05 AM
-- Server version: 5.5.45
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ussdc531_ssd`
--

-- --------------------------------------------------------

--
-- Table structure for table `fx_account_details`
--

CREATE TABLE IF NOT EXISTS `fx_account_details` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(160) DEFAULT NULL,
  `company` varchar(150) NOT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `vat` varchar(32) NOT NULL,
  `language` varchar(40) DEFAULT 'english',
  `avatar` varchar(32) NOT NULL DEFAULT 'default_avatar.jpg'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fx_account_details`
--

INSERT INTO `fx_account_details` (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES
(1, 1, 'پیام غلامرضایی', '-', '', 'Iran', '', '', '', 'english', 'USER-ADMIN-AVATAR.jpg'),
(2, 2, 'alu', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg'),
(3, 3, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg'),
(4, 4, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg'),
(5, 5, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg'),
(6, 6, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg'),
(7, 7, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fx_activities`
--

CREATE TABLE IF NOT EXISTS `fx_activities` (
  `activity_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `module` varchar(32) CHARACTER SET latin1 NOT NULL,
  `module_field_id` int(11) NOT NULL,
  `activity` varchar(255) CHARACTER SET latin1 NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(32) CHARACTER SET latin1 DEFAULT 'fa-coffee',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_activities`
--

INSERT INTO `fx_activities` (`activity_id`, `user`, `module`, `module_field_id`, `activity`, `activity_date`, `icon`, `deleted`) VALUES
(1, 1, 'Clients', 1, 'Added a new company ghg', '2015-02-19 06:02:49', 'fa-user', 0),
(2, 1, 'Users', 1, 'Updated System User : ', '2015-04-15 09:31:47', 'fa-edit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fx_archiveg`
--

CREATE TABLE IF NOT EXISTS `fx_archiveg` (
  `id` int(11) NOT NULL,
  `sub_g` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_archiveg`
--

INSERT INTO `fx_archiveg` (`id`, `sub_g`, `image`, `saved_by`) VALUES
(1, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/01.JPG', '1'),
(2, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/02.JPG', '1'),
(3, '2', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat2/01''.jpg', '1'),
(4, '2', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat2/03''.jpg', '1'),
(5, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/03.JPG', '1'),
(6, '2', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat2/04''.jpg', '1'),
(7, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/04.jpg', '1'),
(8, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/05.jpg', '1'),
(9, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/06.jpg', '1'),
(10, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/07.jpg', '1'),
(11, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/08.jpg', '1'),
(12, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/09.jpg', '1'),
(13, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/10.jpg', '1'),
(14, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/11.jpg', '1'),
(15, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/12.jpg', '1'),
(16, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/13.jpg', '1'),
(17, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/14.jpg', '1'),
(18, '1', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat1/15.jpg', '1'),
(19, '2', 'http://www.ssd-cg.com/ssd/file/WorkShops/Tashrifat2/06''.jpg', '1'),
(22, '3', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM1/03_R.jpg', '1'),
(23, '3', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM1/04_R.jpg', '1'),
(24, '3', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM1/05_R.jpg', '1'),
(25, '3', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM1/06_R.jpg', '1'),
(26, '3', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM1/07_R.jpg', '1'),
(27, '3', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM1/01_R.jpg', '1'),
(28, '3', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM1/02_R.jpg', '1'),
(29, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/01-Formolasion.jpg', '1'),
(30, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/02-Formolasion.jpg', '1'),
(31, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/03-Formolasion.jpg', '1'),
(32, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/04-Formolasion.jpg', '1'),
(33, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/05-Formolasion.jpg', '1'),
(34, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/06-Formolasion.jpg', '1'),
(35, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/07-Formolasion.jpg', '1'),
(36, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/08-Formolasion.jpg', '1'),
(37, '4', 'http://www.ssd-cg.com/ssd/file/WorkShops/Kashi1/09-Formolasion.jpg', '1'),
(38, '5', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM2/01-Pm2.JPG', '1'),
(39, '5', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM2/02-Pm2.JPG', '1'),
(40, '5', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM2/03-Pm2.JPG', '1'),
(41, '5', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM2/04-Pm2.JPG', '1'),
(42, '5', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM2/05-Pm2.JPG', '1'),
(43, '5', 'http://www.ssd-cg.com/ssd/file/WorkShops/PM2/06-Pm2.JPG', '1'),
(44, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/02-sf.jpg', '1'),
(45, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/01-sf.jpg', '1'),
(46, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/03-sf.jpg', '1'),
(47, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/04-sf.jpg', '1'),
(48, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/05-sf.jpg', '1'),
(49, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/06-sf.jpg', '1'),
(50, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/07-sf.jpg', '1'),
(51, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/08-sf.jpg', '1'),
(52, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/09-sf.jpg', '1'),
(53, '6', 'http://www.ssd-cg.com/ssd/file/WorkShops/Foroosh/10-sf.jpg', '1'),
(54, '7', 'http://www.ssd-cg.com/ssd/file/WorkShops/Loab/01-dle.jpg', '1'),
(55, '7', 'http://www.ssd-cg.com/ssd/file/WorkShops/Loab/02-dle.jpg', '1'),
(56, '7', 'http://www.ssd-cg.com/ssd/file/WorkShops/Loab/03-dle.jpg', '1'),
(57, '7', 'http://www.ssd-cg.com/ssd/file/WorkShops/Loab/04-dle.jpg', '1'),
(58, '8', 'http://www.ssd-cg.com/ssd/file/WorkShops/ChaleshModiriat/01-km.jpg', '1'),
(59, '8', 'http://www.ssd-cg.com/ssd/file/WorkShops/ChaleshModiriat/02-km.JPG', '1'),
(60, '8', 'http://www.ssd-cg.com/ssd/file/WorkShops/ChaleshModiriat/03-km.jpg', '1'),
(61, '8', 'http://www.ssd-cg.com/ssd/file/WorkShops/ChaleshModiriat/04-km.jpg', '1'),
(62, '8', 'http://www.ssd-cg.com/ssd/file/WorkShops/ChaleshModiriat/06-km.jpg', '1'),
(63, '9', 'http://www.ssd-cg.com/ssd/file/WorkShops/Erteash01/photo_2015-11-28_10-18-32.jpg', '1'),
(64, '9', 'http://www.ssd-cg.com/ssd/file/WorkShops/Erteash01/photo_2015-11-28_10-18-49.jpg', '1'),
(65, '9', 'http://www.ssd-cg.com/ssd/file/WorkShops/Erteash01/photo_2015-11-28_10-19-03.jpg', '1'),
(66, '10', 'http://www.ssd-cg.com/ssd/file/WorkShops/JazbMoaser/ME-2.jpg', '1'),
(67, '10', 'http://www.ssd-cg.com/ssd/file/WorkShops/JazbMoaser/ME-3.jpg', '1'),
(68, '10', 'http://www.ssd-cg.com/ssd/file/WorkShops/JazbMoaser/ME-4.jpg', '1'),
(69, '10', 'http://www.ssd-cg.com/ssd/file/WorkShops/JazbMoaser/ME-1.jpg', '1'),
(70, '11', 'http://www.ssd-cg.com/ssd/file/WorkShops/Anbar/01-dagh.jpg', '1'),
(71, '11', 'http://www.ssd-cg.com/ssd/file/WorkShops/Anbar/02-dagh.jpg', '1'),
(72, '11', 'http://www.ssd-cg.com/ssd/file/WorkShops/Anbar/03-dagh.jpg', '1'),
(73, '11', 'http://www.ssd-cg.com/ssd/file/WorkShops/Anbar/04-dagh.jpg', '1'),
(74, '12', 'http://www.ssd-cg.com/ssd/file/WorkShops/Standard Nemunebardari/photo_2016-11-10_10-11-17.jpg', '1'),
(75, '18', 'http://www.ssd-cg.com/ssd/file/WorkShops/کار95/photo_2017-01-19_09-23-21.jpg', '1'),
(76, '19', 'http://www.ssd-cg.com/ssd/file/WorkShops/maliat-bahman95/photo_2017-02-14_11-11-53.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_archiveo`
--

CREATE TABLE IF NOT EXISTS `fx_archiveo` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_archiveo`
--

INSERT INTO `fx_archiveo` (`id`, `name`, `description`, `saved_by`, `url`) VALUES
(1, 'سمینار تشریفات بین المللی تجاری-24 دی  1393', '<p>سمینار تشریفات بین المللی تجاری با سخنرانی دکتر علی محمد بیدارمغز در تاریخ 24 دی ماه 1393 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'Seminar-on-international-trade-procedures'),
(2, 'کارگاه اصول ارتباطات غیرکلامی و آداب شرکت در مهمانی های تجاری بین المللی-6 اسفند 1393', '<p>کارگاه اصول ارتباطات غیرکلامی و آداب شرکت در مهمانی های تجاری بین المللی با سخنرانی دکتر علی محمد بیدارمغز در تاریخ 6 اسفند ماه 1393 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'Workshop-nonverbal-communication'),
(3, 'کارگاه نگهداری و تعمیر برنامه ریزی شده-مقدماتی-25 الی 27 خرداد 1394', '<p>کارگاه نگهداری و تعمیر برنامه ریزی شده-مقدماتی&nbsp;با تدریس دکتر احمد عرب شمالی از تاریخ &nbsp;25 الی 27 خرداد 1394 در سالن کنفرانس مجتمع زنبق برگزار شد.</p>', '1', 'Workshop-planned-maintenance'),
(4, 'دوره آموزشی طراحی فرمولاسیون بدنه انواع کاشی -28 و 29 مردادماه 1394 ', '<p>دوره آموزشی طراحی فرمولاسیون بدنه انواع کاشی با سخنرانی مهندس سیروس ارجمندنیا در تاریخ 28 و 29 مردادماه 1394 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'WorkShop-tile-body-formulation-design'),
(5, 'کارگاه بهینه سازی سیستم نگهداری و تعمیر- پیشرفته -17 و 18 شهریور ماه 1394 ', '<p>کارگاه بهینه سازی سیستم نگهداری و تعمیر- پیشرفته&nbsp;با تدریس دکتر احمد عرب شمالی در تاریخ &nbsp;17 و 18 شهریور 1394 در سالن کنفرانس هتل ارگ جدید یزد برگزار شد.</p>', '1', 'Workshop-Advanced-system-maintenance-and-repair '),
(6, 'سمینار استراتژی فروش در فضای رقابتی - 15 مهرماه 1394 ', '<p dir="RTL"><span lang="AR-SA">سمینار "استراتژی فروش در فضای رقابتی" و همچنین کارگاه "روانشناسی ارتباط با مشتری" با سخنرانی دکتر پرویز درگی در تاریخ 15 مهرماه 1394 در یزد برگزار شد</span><span dir="LTR">.</span></p>', '1', 'Seminar-sales-strategy'),
(7, 'دوره آموزشی طراحی فرمولاسیون لعاب و انگوب بر حسب انواع کاشی - 6 و 7 آبان ماه 1394 ', '<p dir="RTL"><span lang="AR-SA">دوره آموزشی طراحی فرمولاسیون لعاب و انگوب بر حسب انواع کاشی با سخنرانی مهندس سیروس ارجمندنیا در تاریخ 6 و 7 آبان ماه 1394 در محل هتل ارگ یزد برگزار شد</span><span dir="LTR">.</span></p>', '1', 'Workshop-engob-in-terms-of-curriculum-design'),
(8, 'کارگاه آموزشی چالش های مدیریت در مسیر موفقیت - 27 و 28 آبان ماه 1394', '<p>کارگاه آموزشی چالش های مدیریت در مسیر موفقیت با سخنرانی مهندس بهرام رزمان در تاریخ 27 و 28 آبان ماه 1394 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'Workshop-management-challenges'),
(9, 'کارگاه آنالیز ارتعاشات و عیب یابی تجهیزات دوار(سطح 1)- 3  الی  5  آذرماه 1394 ', '<p>کارگاه&nbsp;آنالیز ارتعاشات و عیب یابی تجهیزات دوار(سطح 1)<strong>&nbsp;</strong>با تدریس&nbsp;مهندس غلامرضا کاظمی&nbsp;از تاریخ &nbsp;3 الی 5 آذر 1394 در محل هتل ارگ جدید یزد برگزار شد.</p>', '1', 'Workshop-vibration-analysis'),
(10, 'کارگاه آموزشی روش های موثر جذب در منابع انسانی-24 دی ماه 1394', '<p>کارگاه آموزشی روش های موثر جذب در منابع انسانی با سخنرانی مهندس بهرام رزمان در تاریخ 24 دی ماه 1394 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'Workshop-effective-methods-to-attract'),
(11, 'دوره آموزشی تکنیکهای کنترل موجودی انبار قطعات و لوازم یدکی-7 و 8 بهمن 1394', '<p>دوره آموزشی تکنیکهای کنترل موجودی انبار قطعات و لوازم یدکی<strong>&nbsp;</strong>با سخنرانی دکتر احمد عرب شمالی در تاریخ&nbsp;7 و 8 بهمن 1394 &nbsp;در محل هتل ارگ یزد برگزار شد.</p>', '1', 'Workshop-inventory-control-techniques'),
(12, 'دوره آموزشی استانداردهای نمونه برداری- 19 آبان ماه 1395', '<p>دوره آموزشی استانداردهای نمونه برداری- با تدریس مهندس علیرضا اسکندری در تاریخ 19 آبان ماه 1395 در سالن کنفرانس هتل راه و ما در یزد برگزار گردید.</p>', '1', 'Sampling-standards'),
(13, 'دوره آموزشی آشنایی با قوانین کار 4 بهمن 1394', '<p>دوره آموزشی آشنایی با قوانین کار با تدریس جناب آقای علی شیخی در تاریخ 4 بهمن 1394 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'labor-laws'),
(14, 'دوره آموزشی آشنایی با قوانین بیمه تامین اجتماعی 14 بهمن 1394', '<p>دوره آموزشی آشنایی با قوانین بیمه تامین اجتماعی با تدریس جناب آقای رضا گنجی در تاریخ 14 بهمن 1394 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'insurance-rules'),
(15, 'دوره آموزشی افزایش تعهد و انگیزش کارکنان 30 اردیبهشت 1395', '<p>دوره آموزشی افزایش تعهد و انگیزش کارکنان با تدریس مهندس بهرام رزمان در تاریخ 30 اردیبهشت 1395 در محل هتل ارگ یزد برگزار گردید.</p>', '1', 'increase-employee-engagement'),
(16, 'دوره آموزشی آشنایی با قوانین مالیاتی 11 خرداد 1395', '<p>دوره آموزشی آشنایی با قوانین مالیاتی با تدریس جناب آقای محمد علی حاتمی در تاریخ 11 خرداد 1395 در محل هتل ارگ یزد برگزار شد.</p>', '1', 'tax-laws'),
(17, 'دوره آموزشی عارضه یابی سازمانی 28 مرداد 1395', '<p>دوره آموزشی عارضه یابی سازمانی با تدریس مهندس اسد هاشمی در تاریخ 28 مرداد 1395 در شرکت SSD برگزار شد.</p>', '1', 'organizational-fault-finding'),
(18, 'دوره آموزشی آشنایی با قوانین کار 29 دی 1395', '<p>دوره آموزشی آشنایی با قوانین کار با تدریس جناب آقای علی شیخی، 29 دی 1395 در سالن کنفرانس هتل ارگ یزد برگزار شد.</p>', '1', 'Business-Development'),
(19, 'دوره آموزشی آشنایی با قوانین مالیاتی 21 و 25 بهمن 1395', '<p>دوره آموزشی آشنایی با قوانین مالیاتی با تدریس دکتر محمد حسن بابایی در تاریخ 21 و 25 بهمن 1395 در سالن کنفرانس هتل راه و ما برگزار گردید.</p>', '1', 'tax2');

-- --------------------------------------------------------

--
-- Table structure for table `fx_assign_projects`
--

CREATE TABLE IF NOT EXISTS `fx_assign_projects` (
  `a_id` int(11) NOT NULL,
  `assigned_user` int(11) NOT NULL,
  `project_assigned` int(11) NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_assign_tasks`
--

CREATE TABLE IF NOT EXISTS `fx_assign_tasks` (
  `a_id` int(11) NOT NULL,
  `assigned_user` int(11) NOT NULL,
  `project_assigned` int(11) NOT NULL,
  `task_assigned` int(11) NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_blog`
--

CREATE TABLE IF NOT EXISTS `fx_blog` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `title_sub` text COLLATE utf8_persian_ci NOT NULL,
  `des` text COLLATE utf8_persian_ci NOT NULL,
  `date_a` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `nev` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `viwe` int(11) NOT NULL,
  `rating` float NOT NULL,
  `total_rating` float NOT NULL,
  `total_rates` int(11) NOT NULL,
  `ip_address` longtext COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  `love` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_blog`
--

INSERT INTO `fx_blog` (`id`, `title`, `title_sub`, `des`, `date_a`, `nev`, `image`, `viwe`, `rating`, `total_rating`, `total_rates`, `ip_address`, `url`, `saved_by`, `love`) VALUES
(158, 'همایش رازهای موفقیت در کسب و کار', '1', '<p>در دومین روز از هفته کارآفرینی، همایش رازهای موفقیت در کسب و کار در تاریخ 23 آبان ماه 1395 از ساعت 16 الی 18 در شهرستان بافق با سخنرانی مهندس هاشمی مقدم و با حضور پرسنل محترم شرکت سنگ آهن بافق و عموم مردم برگزار گردید.</p>', 'سه شنبه,۲۵ آبان ۱۳۹۵', 'گروه مشاوران  SSD', '', 0, 0, 0, 0, '', '', 1, ''),
(166, 'اطلاع رسانی SSD', '1', '<p>با سلام و احترام؛</p>\n<p>با توجه به حجم بالای مدارک تحویل نگرفته شده مشتریان؛ در صورت نیاز به مدرک و تحویل گیری حتمی، تا 5 بهمن ماه 1395 با شرکت SSD تماس حاصل فرمائید.</p>\n<p>با تشکر گروه مشاوران SSD</p>', 'دوشنبه,۲۷ دی ۱۳۹۵', '', '', 19, 0, 0, 0, '', 'ssd', 1, ''),
(157, 'همایش ملی انجمن جمعیت شناسی ایران', '1', '<p>حضور شرکت سیمرغ صنعت و دانش، به درخواست اداره کار، تعاون و رفاه اجتماعی جهت بخش اشتغال در هشتمین همایش ملی انجمن جمعیت شناسی ایران با نام تحولات جمعیت، نیروی انسانی و اشتغال که در تاریخ 5 و 6 آبان ماه 1395 در دانشگاه یزد برگزار گردید.</p>', 'سه شنبه,۲۵ آبان ۱۳۹۵', 'گروه مشاوران  SSD', 'http://www.ssd-cg.com/ssd/file/news_ssd/photo_2016-10-27_12-08-26.jpg', 45, 0, 0, 0, '', 'National-conference-on-demography-forum', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `fx_bugs`
--

CREATE TABLE IF NOT EXISTS `fx_bugs` (
  `bug_id` int(11) NOT NULL,
  `issue_ref` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `reporter` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `bug_status` enum('Unconfirmed','Confirmed','In Progress','Resolved','Verified') CHARACTER SET latin1 NOT NULL DEFAULT 'Unconfirmed',
  `priority` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bug_description` text CHARACTER SET latin1 NOT NULL,
  `reported_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` varchar(64) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_bug_comments`
--

CREATE TABLE IF NOT EXISTS `fx_bug_comments` (
  `c_id` int(11) NOT NULL,
  `bug_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `date_commented` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_bug_files`
--

CREATE TABLE IF NOT EXISTS `fx_bug_files` (
  `file_id` int(11) NOT NULL,
  `bug` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_captcha`
--

CREATE TABLE IF NOT EXISTS `fx_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `word` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_captcha`
--

INSERT INTO `fx_captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(116, 1429159508, '127.0.0.1', 'GELp8vjk'),
(117, 1429159981, '127.0.0.1', 'k1Ik4SbW'),
(118, 1429160063, '127.0.0.1', 'p0AhPp7o'),
(119, 1447184676, '127.0.0.1', 'jGCElJ3O'),
(120, 1447184730, '127.0.0.1', 'JIIl3N1C'),
(121, 1447184790, '127.0.0.1', 'S4gBCMKA'),
(122, 1447184793, '127.0.0.1', 'gDoJzUnV'),
(123, 1447184795, '127.0.0.1', 'RPaDAw8z'),
(124, 1447184798, '127.0.0.1', 'aE6gyxP1'),
(125, 1447184853, '127.0.0.1', 'DpQNEFVh'),
(126, 1447263294, '127.0.0.1', '3civvyxg'),
(127, 1447263410, '127.0.0.1', 'axc7eH94'),
(128, 1470728314, '31.57.36.243', 'T4z70zBI'),
(129, 1470728440, '31.57.36.243', 'nft56xWr'),
(130, 1470728463, '31.57.36.243', 'GQdkYC07'),
(131, 1470728471, '31.57.36.243', 'B8qhrtci');

-- --------------------------------------------------------

--
-- Table structure for table `fx_catalog`
--

CREATE TABLE IF NOT EXISTS `fx_catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fx_clinic`
--

CREATE TABLE IF NOT EXISTS `fx_clinic` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `viwe` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_clinic`
--

INSERT INTO `fx_clinic` (`id`, `name`, `description`, `image`, `file`, `url`, `saved_by`, `viwe`) VALUES
(1, 'مسائل حقوقی و بیمه', '<p>در این بخش اطلاعات مربوط به مسائل حقوقی و بیمه ای برای علاقه مندان ارائه میگردد.</p>', '', '', 'Legal-insurance-issues', '1', '26'),
(2, 'مسائل مالیاتی', '<p>دراین بخش اطلاعات مربوط به مسائل مالیاتی برای علاقه مندان ارائه میگردد.</p>\n<p>&nbsp;</p>', '', '', 'tax-issues', '1', '25'),
(3, '	ثبت برند و اختراعات', '<p>علامت تجاری نشانی است که قادر است کالاهای تولیدی یا خدمات ارائه شده توسط یک شخص/بنگاه را از کالاها یا خدمات سایر بنگاه&zwnj;ها با اشخاص متمایز نماید، که بموجب آن می&zwnj;توانید ازعرضه کالاهای یکسان یا مشابه توسط اشخاص ثالث تحت علائم تجاری که عین یا به طریق گمراه کننده&zwnj;ای مشابه علامت تجاری شما هستند جلوگیری نمایید. گروه مشاوران SSD در صدد است در راستای اقدامات مربوط به ثبت علائم تجاری، اختراعات و طرح&zwnj;های صنعتی شما را یاری نماید.</p>\n<p>&nbsp;</p>', 'http://www.ssd-cg.com/ssd/file/کارآفرینی/news7aKRC0.jpg', '', 'Brand-registration-and-inventions', '1', '30'),
(4, 'شناخت و قوانین کسب و کار', '<p>در این بخش اطلاعتی مربوط به بهبود کسب و کار خدمت علاقه مندان ارائه میگردد.</p>', '', '', 'Knowledge-Business-Rules', '1', '22');

-- --------------------------------------------------------

--
-- Table structure for table `fx_comments`
--

CREATE TABLE IF NOT EXISTS `fx_comments` (
  `comment_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_comment_replies`
--

CREATE TABLE IF NOT EXISTS `fx_comment_replies` (
  `reply_id` int(11) NOT NULL,
  `parent_comment` int(11) NOT NULL,
  `reply_msg` text CHARACTER SET latin1 NOT NULL,
  `replied_by` int(11) NOT NULL,
  `del` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_companies`
--

CREATE TABLE IF NOT EXISTS `fx_companies` (
  `co_id` int(11) NOT NULL,
  `company_ref` int(32) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `primary_contact` varchar(10) NOT NULL DEFAULT '-',
  `company_email` varchar(64) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_phone` varchar(64) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `VAT` varchar(64) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_companies`
--

INSERT INTO `fx_companies` (`co_id`, `company_ref`, `company_name`, `primary_contact`, `company_email`, `company_website`, `company_phone`, `company_address`, `city`, `country`, `VAT`, `date_added`) VALUES
(1, 9713767, 'ghg', '-', 'h@fd.ch', '', '44', 'fgfg', '', 'South Africa', '', '2015-02-19 06:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `fx_config`
--

CREATE TABLE IF NOT EXISTS `fx_config` (
  `config_key` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_config`
--

INSERT INTO `fx_config` (`config_key`, `value`) VALUES
('2checkout_private_key', '0EFBDF4-8FEB-43D9-E12-B8ED88F810FB'),
('2checkout_publishable_key', '33198C3-BD30-4EC4-70F-DC2329B39C1A'),
('2checkout_seller_id', '91265175'),
('allowed_files', 'gif|png|jpeg|jpg|pdf|doc|txt|docx|xls|zip|rar|xls|mp4'),
('allow_client_registration', 'TRUE'),
('automatic_email_on_recur', 'TRUE'),
('button_color', 'primary'),
('captcha_registration', 'FALSE'),
('client_create_project', 'TRUE'),
('company_address', 'یزد- بلوار باهنر- جنب پیتزا فروتن- پلاک 194'),
('company_city', 'یزد'),
('company_country', 'Australia'),
('company_domain', 'http://www.drug.unique-web.ir/'),
('company_email', ''),
('company_legal_name', 'Gitbench'),
('company_logo', 'logo.png'),
('company_name', 'گروه مشاوران SSD'),
('company_phone', '03537281281'),
('company_phone_2', ''),
('company_vat', ''),
('company_zip_code', ''),
('contact_person', 'John Doe'),
('cron_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('date_format', '%d-%m-%Y'),
('date_php_format', 'd-m-Y'),
('date_picker_format', 'dd-mm-yyyy'),
('decimal_separator', '.'),
('default_currency', 'USD'),
('default_currency_symbol', '$'),
('default_tax', '0.00'),
('default_terms', 'Thank you for <span style="font-weight: bold;">your</span> business. Please process this invoice within the due date.'),
('demo_mode', 'FALSE'),
('developer', 'ig63Yd/+yuA8127gEyTz9TY4pnoeKq8dtocVP44+BJvtlRp8Vqcetwjk51dhSB6Rx8aVIKOPfUmNyKGWK7C/gg=='),
('display_estimate_badge', 'TRUE'),
('display_invoice_badge', 'TRUE'),
('email_account_details', 'TRUE'),
('email_estimate_message', 'Hi {CLIENT}<br>Thanks for your business inquiry. <br>The estimate EST {REF} is attached with this email. <br>Estimate Overview:<br>Estimate # : EST {REF}<br>Amount: {CURRENCY} {AMOUNT}<br> You can view the estimate online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}'),
('email_invoice_message', 'Hello {CLIENT}<br>Here is the invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}'),
('email_staff_tickets', 'TRUE'),
('enable_languages', 'TRUE'),
('envato_username', ''),
('estimate_color', '#FB6B5B'),
('estimate_language', 'en'),
('estimate_prefix', 'EST'),
('estimate_terms', 'Looking forward to doing business with you.'),
('file_max_size', '80000'),
('increment_invoice_number', 'TRUE'),
('installed', 'TRUE'),
('invoices_due_after', '30'),
('invoice_color', '#53B567'),
('invoice_language', 'en'),
('invoice_logo', 'invoice_logo.png'),
('invoice_prefix', 'INV'),
('language', 'czech'),
('languages', 'czech'),
('locale', 'en_US'),
('login_bg', 'bg-login.jpg'),
('logo_or_icon', 'logo_title'),
('notify_bug_assignment', 'TRUE'),
('notify_bug_comments', 'TRUE'),
('notify_bug_status', 'TRUE'),
('notify_message_received', 'TRUE'),
('notify_project_assignments', 'TRUE'),
('notify_project_comments', 'TRUE'),
('notify_project_files', 'TRUE'),
('notify_task_assignments', 'TRUE'),
('paypal_cancel_url', 'paypal/cancel'),
('paypal_email', 'billing@gitbench.com'),
('paypal_ipn_url', 'paypal/t_ipn/ipn'),
('paypal_live', 'TRUE'),
('paypal_success_url', 'paypal/success'),
('project_prefix', 'PRO'),
('protocol', 'smtp'),
('purchase_code', '4490de0-9c30-4157-f14-2b812a7d063f'),
('reminder_message', 'Hello {CLIENT}<br>This is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}'),
('reset_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('rows_per_table', '25'),
('settings', 'general'),
('show_estimate_tax', 'TRUE'),
('show_invoice_tax', 'TRUE'),
('show_login_image', 'FALSE'),
('show_only_logo', 'FALSE'),
('sidebar_theme', 'dark'),
('sidebar_theme2', 'sample11.css'),
('site_appleicon', 'logo.png'),
('site_author', 'William M.'),
('site_desc', 'Freelancer Office is a Web based PHP application for Freelancers - buy it on Codecanyon'),
('site_favicon', 'logo.png'),
('site_icon', 'fa-flask'),
('smtp_host', 'smtp.mandrillapp.com'),
('smtp_pass', '-Z3WDQjMRK2LoHbHIduThQ'),
('smtp_port', '587'),
('smtp_user', 'uniqueweb.ir@gmail.com'),
('stripe_private_key', 'sk_test_tV5LwTRLk8yYcM94iMONLdF'),
('stripe_public_key', 'pk_test_8t8Ck9sDuSRa2vps1KJlnjT'),
('system_font', 'roboto_condensed'),
('thousand_separator', ','),
('timezone', 'Europe/London'),
('use_gravatar', 'TRUE'),
('use_postmark', 'off'),
('valid_license', 'TRUE'),
('webmaster_email', 'uniqueweb.ir@gmail.com'),
('website_name', 'Freelancer Office');

-- --------------------------------------------------------

--
-- Table structure for table `fx_contact`
--

CREATE TABLE IF NOT EXISTS `fx_contact` (
  `id` int(11) NOT NULL,
  `phone` varchar(13) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `ins` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `phone2` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `phone3` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `phone4` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `phone5` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `phone6` varchar(15) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_contact`
--

INSERT INTO `fx_contact` (`id`, `phone`, `email`, `address`, `ins`, `saved_by`, `phone2`, `phone3`, `phone4`, `phone5`, `phone6`) VALUES
(5, '03537281281', 'info@ssd-cg.com ', ' یزد- بلوار باهنر- جنب پیتزا فروتن- پلاک 194', 'ssd_cg', '1', '03537281282', 'Telegram.me/SSD', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fx_contacts`
--

CREATE TABLE IF NOT EXISTS `fx_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `date2` varchar(16) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fx_countries`
--

CREATE TABLE IF NOT EXISTS `fx_countries` (
  `id` int(6) NOT NULL,
  `value` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_countries`
--

INSERT INTO `fx_countries` (`id`, `value`) VALUES
(1, 'Afghanistan'),
(2, 'Aringland Islands'),
(3, '??'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo'),
(52, ' Democratic Republic'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Ivory Coast (Ivory Coast)'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea (north)'),
(115, 'Korea (south)'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People''s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territories'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Runion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and the Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and the South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen Islands'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syria'),
(210, 'Taiwan'),
(211, 'Tajikistan'),
(212, 'Tanzania'),
(213, 'Thailand'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Vatican City'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (US)'),
(236, 'Wallis and Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `fx_customer`
--

CREATE TABLE IF NOT EXISTS `fx_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fx_dan`
--

CREATE TABLE IF NOT EXISTS `fx_dan` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `viwe` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_dan`
--

INSERT INTO `fx_dan` (`id`, `name`, `description`, `image`, `file`, `url`, `saved_by`, `viwe`) VALUES
(1, 'مقالات کسب و کار', '<ul style="list-style-type: disc;">\n<li>10 استراتژی کاربردی بازاریابی آفلاین</li>\n</ul>\n<p>بازاریابی با گسترش استفاده از موبایل و آنلاین شدن همه چیز شاهد تغییرات قابل توجهی بوده است. ایجاد یک صفحه&zwnj;ی کاری در فیسبوک، قرار دادن اخبار صنایع در توییتر، ارسال اطلاعیه&zwnj;های فروش برای خریداران و ... ؛ کانال&zwnj;های ارتباطی ما با رهبران ومشتریان روزانه در حال تکامل هستند. با وجود تأثیر قابل توجه این خط مشی&zwnj;ها، درصورت نبود آنها از تجارت عقب افتاده ایم. اغلب تجارت&zwnj;های موفق ترکیبی از استراتژی&zwnj;های آنلاین و آفلاین را جهت گسترش راهبردها و ارتقای فروش را به&zwnj;کار بسته&zwnj;اند.</p>\n<p>تبلیغات خیابانی، هدیه های تبلیغاتی (مانند مدادها و تیشرت&zwnj;ها) و خیریه&zwnj;های محلی نمونه&zwnj;هایی از بازاریابی پارتیزانی آفلاین هستند. این اقدامات ساده، راه&zwnj;های آسانی اما مؤثری جهت گسترش زیرکانه نام تجاری هستند. در ادامه به استراتژی &zwnj;های بازاریابی قدیمی که هنوز هم کاربردی هستند خواهیم پرداخت.</p>\n<p>1. از هر فرصتی برای توزیع کارت ویزیت خود استفاده کنید.</p>\n<p>علت قرار گرفتن این مورد در ابتدای لیست یه این دلیل است که&nbsp; شاید آسانترین و ارزانترین گزینه باشد.شما میتوانید این کارت&zwnj;ها را در میان همسایه&zwnj;ها و شرکت های تجاری پخش کنید، میتوانید آن را به تابلوی عمومی اعلانات بزنید، آنها را در میان کتابها و مجلات درون مطب پزشکان قرار دهید و هر اقدام ممکن دیگری را برای پخش آنها صورت دهید. کارت ویز&zwnj;ها نسبت به ابعادشان پتانسل زیادی دارند.</p>\n<p>2. گواهی نامه&zwnj;ها و محصولات تبلیغاتی را به عنوان جایزه در مسابقات اهدا کنید.</p>\n<p>آیا ساختمان دبیرستان شهر شما در در حال برگزاری یک حراج آرام است؟ آیا جریانی خیریه همراه با اهدای جوایز وجود دارد؟ اهدا کنید. این یک راه ساده برای ایجاد یک ارتباط فردی با عوام، با شرکت در یک جنبش و کار خوب، است. در بدبینانه&zwnj;ترین حالت، برندگان از خدمات و یا محصول شما استفاده خواهند کرد، و شما حتی می&zwnj;توانید مراجعه مجدد آنها و دیده شدن را بدست آورید.</p>\n<p>3. در مناسبتها سخنرانی کنید.</p>\n<p>یک مناسبت مرتبط با شرکت خود انتخاب و خود را برای یک سخنرانی علمی و پرمفهوم آماده کنید. این کار یک اثر ماندگار یر ذهن همتایان شما در صنعت خودتان&nbsp; دارد و تجارت شمارا در معرض دید قرار می&zwnj;دهد. اگر احساس می&zwnj;کنید که قدرت تجاری شما برای سخنرانی درمیان همتایانتان کافی نیست، حضور بهم رساندن در آن رویداد هم مفید خواهد بود. خود و شبکه&zwnj;تان را به دیگران معرفی کنید. روابطی که ایجاد می&zwnj;کنید میتواند به ارتقاء درجه بازاریابی شما کمک کند.</p>\n<p>&nbsp;</p>\n<p>4. با انتشارات چاپی محلی خود ارتباط برقرار کنید.</p>\n<p>با وجود رشد دائمی رسانه&zwnj;های آنلاین،&zwnj; صنعت چاپ هنوز هم مؤثر است. یک مطلب مطبوعاتی در یک مجله یا روزنامه به منظور هدف قرار دادن مخاطبین خود چاپ کنید.&nbsp; مطالب مطبوعاتی راهی ساده برای به نمایش درآوردن یک مناسبت مهم یا مرحله&zwnj;ای برجسته در تجارتتان است، و انتشارات درست میتواند توجه ویژه&zwnj;ای را برای شما به ارمغان آورد. فعال بمانید و تا آنجا که ممکن است با انتشارات بیشتری در ارتباط باشید چرا که روزی کارآمد خواهند بود.</p>\n<p>5. نامه بفرستید.</p>\n<p>حتی در عصر ایمیل، ارسال نامه هنوز یک روش قابل قبول برای بازاریابی است. تعداد زیاد افرادی که خواهان پیشنهادات فیزیکی هستند شگفت&zwnj;&zwnj;&zwnj;&zwnj;آور است. ارسال نامه هزینه بیشتری دارد و موجب می&zwnj;شود از اطلاعاتی که از کمپین&zwnj;های ایمیل بدست می&zwnj;اوردید محروم بمانید، اما در میان رقیبان خود که تنها به ایمیل اکتفا می&zwnj;کنند برجسته خواهید بود. برگ تخفیف، نمونه جدید محصولات خود، نامه&zwnj;های خبری یا هرچیزی که به نظرتان به پیشرفت تجارتتان کمک می&zwnj;کند را ارسال کنید. این امر یقیناً یک روش خصوصی سازی شده در بازاریابی خواهد بود.</p>\n<p>6. بازاریابی تلفنی انجام دهید.</p>\n<p>یک لیست از مشتریان بالقوه تهیه کنید و با آنها تماس بگیرید. ابتدا استراتژی بازاریابی تلفنی را ایجاد کنید و سپس با آنها تماس بگیرید. مکالمات را متناسب با هر مشتری صورت دهید و زمان و احتیاجات آنها را نیز در نظر بگیرید. هرچند این امر نوعاً حرکتی در فروش است، بازاریابی تلفنی می&zwnj;تواند در ایجاد روابط همکاری با دیگر مشاغل شما را یاری دهد و به صورت بالقوه تعدادی مشتری جدید در میان راه برای شما به ارمغان آورد.</p>\n<p>7. در نمایشگاه&zwnj;های تجاری شرکت کنید.</p>\n<p>نمایشگاه&zwnj;ّهای نجاری شما را در یک مکان رقابتی قرار می&zwnj;دهند. شما می&zwnj;توانید نحوه استراتژی فروش محصولات رقیبانتان را مطالعه و ابزار و مواد بازاریابیشان را ارزیابی کنید و به طور کلی به بینشی واقعی از استراتژی آنها دست یابید. البته نمایشگاه&zwnj;های تجاری فرصت بسیار مناسبی برای در معرض دید قرار دادن محصولاتتان و بازاریابی برای شرکتتان هستند. با سایر افراد حرفه&zwnj;ای ملاقات کنید و به دنبال فرصت&zwnj;های رشد و ترقی به وسیله کار کردن با یکدیگر باشید.</p>\n<p>8. بسته بندی و عرضه خود را جدید کنید.</p>\n<p>برند خود را با ارزیابی مجدد عرضه خود، تقویت کنید. اینکه چگونه در این رقابت سنجیده می&zwnj;شوید اهمیت دارد. برند&zwnj;سازی و طراحی فروشتان،&zwnj; ماهیت شما را نشان می&zwnj;دهند. شاید زمان آن رسیده است که جلوه&zwnj;ّهای قدیمی&zwnj;ای که پیام درستی به فروشندگان بالقوه&zwnj;ی &zwnj;&zwnj;شما نمی&zwnj;دهند، را بروز کنید. زمانی را برای بازبینی و تکرار اختصاص دهید؛ کمترین تغییرات می&zwnj;توانند بزرگترن تفاوت&zwnj;ها را ایجاد کنند.</p>\n<p>9. موفقیت &zwnj;های خود را جشن بگیرید.</p>\n<p>میزبان یک میهمانی، گردهمایی تجاری یا یک نوع رویداد تجلیلی برای به اشتراک گذاشتن موفقیتتان باشید. شاید شما به یک همکاری بزرگ دست یافته یا یک سرویس جدید ایجاد کرده باشید. از انشارات محلی جهت اشاعه خبر موفقیتتان استفاده کنید. از فرصت برای قدردانی از تیمتان و تشویق موفقیت&zwnj;های آینده، استفاده کنید. جشن&zwnj;ّهایی که برگزار می&zwnj;کنید برای جلب توجه مخاطبان هدف خود و ایمن سازی تجارت آینده&zwnj;تان می&zwnj;باشد.</p>\n<p>&nbsp;</p>\n<p>10. حامی یک رویداد اجتماعی باشید.</p>\n<p>اگر هزینه&zwnj;هایتان اجازه می&zwnj;دهند،&zwnj; این کار یک روش اعجاب&zwnj;آور برای گسترش نامتان است. به جای اینکه تنها دریک رویداد شرکت کنید، رهبری را بدست بگیرید و حامی آن باشید. چندین میلیون تومان کناربگذارید و یا با&nbsp; مؤسسه&zwnj;ای غیرانتفاعی برای راه&zwnj;اندازی یک جریان جمع&zwnj;آوری اعانه تشریک مساعی کنید. زمانی که شما میزبان باشید میتوانید اجناس را در دست بگیرید. کالاهای برند خودتان، کوپن و جزوات و کارت تخفیف اهدا کنید. این کار یک تصویر مثبت که برای مردم قابل احترام است، از برند شما ایجاد خواد نمود.</p>\n<p>سخن پایانی</p>\n<p>این نکات به طور گسترده&zwnj; ای به میزان هزینه و تلاش شما وابسته است، اما هرکدام میتواند بازاریابی شما را ارتقا بخشد. پس پذیرای استراتژی&zwnj;ها و تکنولوژی&zwnj;های نوین باشید، اما ریشه&zwnj;های غیر آنلاین آنها را فراموش نکنید!</p>', '', '', 'Business-Articles', '1', '41'),
(2, '	هوشمند سازی کسب و کار', '<p>در این بخش اطلاعات مربوط به هوشمند سازی کسب و کار برای علاقه مندان ارائه میگردد.</p>', 'http://www.ssd-cg.com/ssd/file/Business/_iStock_000010376631Medium.jpg', '', 'Smart-Business', '1', '25'),
(3, 'مدل های کسب و کار', '<p>در این بخش مدل های کسب و کار برای علاقه مندان ارائه میگردد.</p>', 'http://www.ssd-cg.com/ssd/file/news_ssd/Khabar-5-1.JPG', '', 'Business-model', '1', '44'),
(4, '	رصد فناوری های نوین', '<p>درقرن 21 ام با گسترش استفاده ازشبکه گسترده جهانی، زندگی بشر پیوسته درحال تغییر و ارتقاء است. &nbsp;انسان قرن 21 همواره در جستجوی ابداع روشی برای زندگی با کیفیت تر است. در این بین کسب اطلاع از تکنولوژی های جدید امری مهم و ضروری است. گروه مشاوران SSD در تلاش است تا &nbsp;شما &nbsp;را &nbsp;از بروزترین &nbsp;فناوری ها &nbsp;آگاه سازد.</p>', 'http://www.ssd-cg.com/ssd/file/کارآفرینی/رصدفناوری.png', '', 'Monitoring-new-technologies', '1', '40');

-- --------------------------------------------------------

--
-- Table structure for table `fx_descr`
--

CREATE TABLE IF NOT EXISTS `fx_descr` (
  `id` int(11) NOT NULL,
  `title` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `title_sub` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `title_sub2` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_descr`
--

INSERT INTO `fx_descr` (`id`, `title`, `title_sub`, `saved_by`, `title_sub2`) VALUES
(1, '7', '<p dir="rtl" style="text-align: justify;"><span dir="RTL" lang="FA">این خدمات به کارآفرینان کمک میکند تا سرمایه گذاری های خطر پذیر کارافرینی را پایش و کنترل کنند و بر انجام فعالیت های کسب و کار نظارت داشته باشند.</span></p>', '1', '<p><span dir="RTL" lang="FA">این خدمات به کارآفرینان کمک میکند تا سرمایه گذاری های خطر پذیر کارافرینی ...</span></p>'),
(2, '6', '<p dir="rtl" style="text-align: justify;"><span dir="RTL" lang="FA">ما هستیم تا از رشد و پیشرفت شما در ایجاد یک کسب و کار، توسعه کسب و کار و بهبود مشکلات کسب و کار اطمینان حاصل کنیم.</span></p>', '1', '<p><span dir="RTL" lang="FA">ما هستیم تا از رشد و پیشرفت شما در ایجاد یک کسب و کار...</span></p>'),
(3, '5', '<p dir="rtl" style="text-align: justify;">دانستنی های کسب و کار درک کاملی از عملکرد های کلی کسب و کار و مناطق خاص تحت تجزیه و تحلیل می باشد، داشتن اطلاعات دقیق و کامل از این دانستنی ها برای توسعه ساختار بنیادین سازمان حیاتی است، بر اساس این اطلاعات تحلیلگر می تواند درک درستی از کاربران، مشکلات و احتیاجات آن ها بدست آورد و روش های جدید و پربازده ای را برای انجام وظایف اولیه کاربران طراحی کند.</p>', '1', '<p>دانستنی های کسب و کار درک کاملی از عملکرد های کلی کسب و کار و مناطق خاص تحت تجزیه و تحلیل...</p>'),
(4, '10', '', '1', '<p>گروه مشاوران ما با دید بهبود وترقی وضعیت کسب وکار کشورمان ایران، با راهنمایی وجهت دهی ایده وسرمایه...</p>'),
(5, '4', '<p dir="rtl" style="text-align: justify;">شرکت سیمرغ صنعت و دانش با تکیه بر دانش و تجربه بی بدیل کارشناسان خود سعی در ارائه خدمات منحصر بفرد در زمینه مشاوره صنعتی دارد تا تمامی هموطنان عزیزمان طعم خوش موفقیت را در فعالیت خود حس نمایند.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>', '1', '<p><span dir="RTL" lang="FA">شرکت سیمرغ صنعت و دانش با تکیه بر دانش و تجربه بی بدیل کارشناسان خود سعی در ارائه خدمات منحصر بفرد در زمینه مشاوره صنعتی دارد...</span></p>'),
(6, '3', '<p dir="rtl" style="text-align: justify;">مشاوره نتیجه بخش، مستلزم:</p>\n<p dir="rtl" style="text-align: justify;">&nbsp; &nbsp; تشخیص صحیح مسائل سازمان</p>\n<p dir="rtl" style="text-align: justify;">&nbsp; &nbsp; انتخاب بهترین راهکارها و ابزارها</p>\n<p dir="rtl" style="text-align: justify;">&nbsp; &nbsp; و در نهایت پیاده سازی صحیح و اثربخش راهکارهامی باشد.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;ارائه خدمات مشاوره ای جامع، متمایز و نتیجه بخش،متناسب با مراحل مختلف چرخه عمر سازمان ها توسط تیم مشاوران&nbsp;SSD:</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;تشخیص و درمان عارضه های سازمانی/ تدوین و اجرای استراتژی کسب و کار/ حرفه ای سازی و توسعه&nbsp;کسب و کارهای کوچک/ مدیریت جامع منابع انسانی/ مدیریت مالی و سرمایه گذاری/ مدیریت بازاریابی و فروش و ...</p>', '1', '<p dir="rtl">مشاوره نتیجه بخش، مستلزم؛&nbsp;تشخیص صحیح مسائل سازمان،&nbsp;انتخاب بهترین راهکارها و ابزارها&nbsp;و در نهایت پیاده سازی...</p>'),
(7, '2', '<p dir="rtl" style="text-align: justify;">استفاده از اطلاعات مالی و حسابداری مربوط، قابل اتکاء و مفید مهم ترین وسیله تصمیم گیری برای واحدهای تجاری می باشد و دستیابی به اطلاعات مالی و حسابداری مذکور جز با استفاده از خدمات حسابداران و مشاورین مدیریت امکان پذیر نیست.</p>', '1', '<p><span dir="RTL" lang="AR-SA">استفاده از اطلاعات مالی و حسابداری مربوط، قابل اتکاء و مفید مهم ترین وسیله تصمیم گیری...</span></p>'),
(8, '9', '<p><strong>&nbsp;</strong></p>', '1', '<p>برای موفقیت وتقویت شرکت شما در بازار رقابتی حال حاضر، در کنار شما هستیم تا تغییرات موفقیت آمیز....</p>'),
(9, '8', '', '1', '<p>مزایای شما از شرکت در دوره های آموزشی...</p>\n<p>&nbsp;</p>'),
(11, '1', '<p dir="rtl" style="text-align: justify;">گروه مشاوران&nbsp;SSD&nbsp;با وجود شبکه مشاوران و مدرسان مجرب و حرفه ای توان ارائه دوره های یادگیری عملیاتی در اکثر سطوح مدیریتی و مراحل مختلف&nbsp;&nbsp;چرخه عمر سازمانی اعم از دوره های کارآفرینی و ایجاد کسب و کار تا دوره های خرد و کلان مدیریت سازمان را دارا می باشد. تاکید ما بر کاربردی بودن دوره های یادگیری مان است.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;">دوره های آموزشی ما به چند دسته تقسیم می شود.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;">1-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;کارگاههای آموزشی کوتاه مدت و میان مدت:</p>\n<p dir="rtl" style="text-align: justify;">کارگاههای کوتاه مدت در یک یا حداکثر 3 روز و با موضوعات متنوع و&nbsp;&nbsp;مشخص برگزار می گردد. دوره های میان مدت بین 5 تا 10 روز می باشند. که به صورت جامعتر و با هدف یادگیری موضوعات مهم سازمانی که در یک یا دو کارگاه میگنجد، برگزار می شود.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;">2-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;کارگاههایی که به سفارش مشتریان با موضوع خاص برای پرسنل یک شرکت برگزار می شود:</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;ما با تیم مدرسان و مشاوران مجرب در اکثر زمینه های مدیریتی و فنی مورد نیاز سازمان توانایی برگزاری دوره های مورد نظر را داریم.شما می توانید مدیریت آموزش شرکتتان را برونسپاری کرده و به ما بسپارید.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;">3-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سمینارها و همایش های تخصصی</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;ما با برگزاری سمینارهای تخصصی و کاربردی با موضوعات مورد نیاز جامعه کسب و کار استان به دنبال ارتقاء،به روزرسانی دانش مدیریت،مدیران و علاقمندان مدیریت هستیم.</p>', '1', '<p>ارائه دوره های یادگیری عملیاتی در اکثر سطوح مدیریتی و مراحل مختلف&nbsp;&nbsp;چرخه عمر سازمانی...</p>'),
(12, '11', '<p><sub>&nbsp;</sub></p>', '1', '<p>تصاویر دوره های برگزار شده به تفکیک، در این بخش قابل مشاهده میباشد...</p>'),
(13, '12', '', '1', '<p>دوره های در حال ثبت نام در این بخش قابل مشاهده میباشد...</p>');

-- --------------------------------------------------------

--
-- Table structure for table `fx_email_templates`
--

CREATE TABLE IF NOT EXISTS `fx_email_templates` (
  `template_id` int(11) NOT NULL,
  `email_group` text NOT NULL,
  `template_body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_email_templates`
--

INSERT INTO `fx_email_templates` (`template_id`, `email_group`, `template_body`) VALUES
(25, 'project_updated', '<div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">Project updated</div><div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;"><p>Hi there,</p><p>{PROJECT_TITLE} ) has been updated by {ASSIGNED_BY}.</p><p>You can view this project by logging in to the portal using the link below.</p>-----------------------------------<br><big><b><a href="{PROJECT_URL}">View Project</a></b></big><br><br>Regards<br>The {SITE_NAME} Team</div></div>'),
(26, 'task_updated', '<div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">Task updated</div><div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;"><p>Hi there,</p><p>{TASK_NAME} in {PROJECT_TITLE} has been updated by {ASSIGNED_BY}.</p><p>You can view this project by logging in to the portal using the link below.</p>-----------------------------------<br><big><b><a href="{PROJECT_URL}">View Project</a></b></big><br><br>Regards<br>The {SITE_NAME} Team</div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `fx_estimates`
--

CREATE TABLE IF NOT EXISTS `fx_estimates` (
  `est_id` int(11) NOT NULL,
  `reference_no` varchar(32) CHARACTER SET latin1 NOT NULL,
  `client` varchar(64) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Looking forward for your business.',
  `tax` int(11) NOT NULL DEFAULT '0',
  `status` enum('Accepted','Declined','Pending') CHARACTER SET latin1 NOT NULL DEFAULT 'Pending',
  `date_sent` varchar(64) CHARACTER SET latin1 NOT NULL,
  `est_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailed` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `invoiced` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_estimate_items`
--

CREATE TABLE IF NOT EXISTS `fx_estimate_items` (
  `item_id` int(11) NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_events`
--

CREATE TABLE IF NOT EXISTS `fx_events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `start_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `end_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `time_start` varchar(13) COLLATE utf8_persian_ci NOT NULL,
  `time_end` varchar(13) COLLATE utf8_persian_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fx_fani`
--

CREATE TABLE IF NOT EXISTS `fx_fani` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `viwe` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_fani`
--

INSERT INTO `fx_fani` (`id`, `name`, `description`, `image`, `file`, `url`, `saved_by`, `viwe`) VALUES
(1, 'خدمات مشاوره فنی', '<p dir="rtl" style="text-align: justify;">شرکت سیمرغ صنعت و دانش با تکیه بر دانش و تجربه بی بدیل کارشناسان خود سعی در ارائه خدمات منحصر بفرد در زمینه مشاوره صنعتی دارد تا تمامی هموطنان عزیزمان طعم خوش موفقیت را در فعالیت خود حس نمایند.</p>\n<p dir="rtl" style="text-align: justify;">برخی از خدمات این بخش عبارتند از:</p>\n<ul dir="rtl">\n<li style="text-align: justify;">استقرار و ممیزی سیستم های نوین نگهداری و تعمیرات.</li>\n<li style="text-align: justify;"><strong>CMMS</strong> و پیاده سازی موثر آن در سازمان.</li>\n<li style="text-align: justify;">ممیزی و بازرسی فنی واحد های صنعتی و ارائه راهکارهایی در جهت بهینه سازی خطوط تولید.</li>\n<li style="text-align: justify;">ارائه خدمات در زمینه پایش وضعیت تجهیزات شامل : آنالیز ارتعاشات، بالانس، الایمنت، ترموگرافی.</li>\n<li style="text-align: justify;">کدینگ کالاهای فنی موجود در انبار.</li>\n<li style="text-align: justify;">طراحی ،نصب و راه اندازی سیستم های پنوماتیک.</li>\n<li style="text-align: justify;">طراحی ، نصب و راه اندازی سیستم های هیدرولیک.</li>\n</ul>', '', '', 'Technical-consulting-services', '1', '52'),
(2, 'دانستنی های فنی', '<ul>\n<li dir="rtl" style="text-align: justify;">نگهداری و تعمیرات</li>\n</ul>\n<p dir="rtl" style="text-align: justify;">اتوماسیون تجهیزات و دستگاه های جدید نیازمند سرمایه گذاری بسیار بالایی می باشد و لذا توقفات ، بسیار هزینه ساز خواهد بود. باید به منظور حصول اطمینان از آماده بکاری دستگاه ها و تجهیزات ،نگهداری و تعمیر به طور منظم صورت گیرد. این نگهداری و تعمیر باید در ارتباط با نیازها و برنامه های تولیدی به گونه ای دقیق برنامه ریزی گردد.</p>\n<p dir="rtl" style="text-align: justify;">نگهداری و تعمیرات عبارت است از تمامی فعالیت های انجام شده در جهت حفاظت وضعیت مطلوب و استاندارد یک قسمت یا کل سیستم.</p>\n<p dir="rtl" style="text-align: justify;">وضعیت مطلوب از دیدگاه مدیریت نگهداری و تعمیر عبارتست از:</p>\n<p dir="rtl" style="text-align: justify;">الف) دستگاه ها درحین نیاز، آماده به کار باشند.</p>\n<p dir="rtl" style="text-align: justify;">ب) دستگاه ها در حین بهره برداری، به طور ناگهانی از کار نیافتاده و بتوانند به طور کارآمد و مطابق با برنامه ی تولیدی و خدماتی مورد نظر و سایر توقفات مربوطه کار کنند.</p>\n<p dir="rtl" style="text-align: justify;">ج) زمان توقف جهت انجام نگهداری و تعمیر با برنامه ی تولید تلاقی نداشته باشد.</p>\n<p dir="rtl" style="text-align: justify;">د) زمان توقف ناشی از خرابهای ناگهانی به حداقل برسد.</p>\n<p dir="rtl" style="text-align: justify;">ه) نیاز به مواد، قطعات و لوازم یدکی و سایر تسهیلات در طی پریودهای زمانی آتی مشخص باشد.</p>\n<p dir="rtl" style="text-align: justify;">به کارگیری سیستم نگهداری و تعمیرات خاص یک سازمان،می تواند نقش بسیار زیادی را در کاهش قیمت تمام شده محصول نهایی ایفا نماید. اما این تاثیرات تنها محدود به هزینه نبوده و در سرعت ارائه محصول در کل زنجیره تامین، کیفیت محصول، قابلیت اطمینان، چابکی سازمان و عواملی از این دست نیز تاثیرات خاص خود را خواهد داشت. از این رو می توان به نقش مهم و تاثیرگذار استراتژی های مختلف نگهداری و تعمیرات&nbsp; بر روی کسب و کار یک بنگاه اقتصادی پی برد.</p>\n<p dir="rtl" style="text-align: justify;">برخی از مهمترین استراتژی ها عبارت اند از:</p>\n<p dir="rtl" style="text-align: justify;">&uuml;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; نگهداری وتعمیرات پیشگیرانه (<strong>Preventive Maintenance-PM</strong>)</p>\n<p dir="rtl" style="text-align: justify;">&uuml;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; نگهداری و تعمیرات پیش بینانه(<strong>Predictive Maintenance-PM</strong>)</p>\n<p dir="rtl" style="text-align: justify;">&uuml;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; نگهداری و تعمیرات مبتنی بر وضعیت(<strong>Condition Based Maintenance-CBM</strong>)</p>\n<p dir="rtl" style="text-align: justify;">&uuml;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; نگهداری و تعمیرات مبتنی بر قابلیت اطمینان(<strong>Reliability Centered Maintenance-RCM</strong>)</p>\n<p dir="rtl" style="text-align: justify;">&uuml;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; نگهداری و تعمیرات بهره ور فراگیر(<strong>Total Productive Maintenance-TPM</strong>).</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<ul dir="rtl" style="text-align: justify;">\n<li>پایش وضعیت</li>\n</ul>\n<p dir="rtl" style="text-align: justify;">پایش وضعیت فرآیند تعیین و بررسی تغییر وضعیت ماشین آلات در حالت کاریشان در طول زمان می باشد. کلید یک برنامه پایش وضعیت موفق عبارت است از:</p>\n<p dir="rtl" style="text-align: justify;">o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; دانستن گوش دادن به چه چیزی.</p>\n<p dir="rtl" style="text-align: justify;">o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; چگونگی تفسیر آن.</p>\n<p dir="rtl" style="text-align: justify;">o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; زمان استفاده از این دانش.</p>\n<p dir="rtl" style="text-align: justify;">در نهایت استفاده از این برنامه موجب تعمیر اجزای مشکل دار پیش از شکست می شود. برنامه پایش وضعیت نه تنها باعث کاهش احتمال شکست های فاجعه بار توسط پرسنل کارخانه می شود بلکه به آنها اجازه ی برنامه ریزی جهت سفارش قطعات مورد نیاز تعمیر، تنظیم بارکاری پرسنل تعمیرات و برنامه ریزی های دیگر در طول تعمیرات را می دهد.</p>\n<p dir="rtl" style="text-align: justify;">برنامه پایش وضعیت براساس پارامترهایی مانند ارتعاشات، صدا، روانکاری و دما وضعیت ماشین را تعیین می کند.</p>\n<p>&nbsp;نیازهای اساسی برای راه اندازی سیستم CM با توجه به اندازه و پیچیدگی کارخانه متفاوت است. اما قطع نظر از تفاوتها حداقل های زیر باید در نظر گرفته شوند:</p>\n<p style="padding-right: 30px;">1-&nbsp;&nbsp;&nbsp;&nbsp; حمایت مدیریت.</p>\n<p style="padding-right: 30px;">2-&nbsp;&nbsp;&nbsp; اختصاص نیروهایی خاص CM.</p>\n<p style="padding-right: 30px;">3-&nbsp;&nbsp;&nbsp; تهیه فرآیندهای جمع آوری و آنالیز اطلاعات کارآمد.</p>\n<p style="padding-right: 30px;">4-&nbsp;&nbsp;&nbsp; بانک اطلاعاتی بادوام.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p><strong>1</strong><strong>-حمایت مدیریت اولین و مهمترین رکن موفقیت اجرای یک برنامه </strong>CM<strong> می باشد.</strong></p>\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; بزرگترین چالش اجرای CM بالا بردن کاذب انتظارات مدیریت.</p>\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; مطلع کردن مدیریت از اصول CM گامی موثر در برخورداری از حمایت .</p>\n<p>- &nbsp; &nbsp; &nbsp; در اغلب برنامه های ناموفق مدیریت روی سرمایه گذاری اولیه برای خرید تجهیزات اقدام کرده است اما به منابع لازم برای آموزش، حمایت مشورتی و منابع انسانی که برای موفقیت ضروری هستند کم توجهی کرده است.</p>\n<p>&nbsp;</p>\n<p><strong>2</strong><strong>-اختصاص نیروهای خاص </strong>CM</p>\n<p>همه برنامه های موفق حول يک تيم تعميرات پيشگيرانه تمام وقت ساخته شده اند. مسئوليت پذيری و پاسخگويي عامل موثری است که از يک گروه نت پيش بينانه انتظار می رود.</p>\n<p>آموزش هم در زمينه شناخت سيستمهای نت و هم در زمينه فنی تخصصی آن بسيار حائز اهميت است.</p>\n<p>علاوه بر آموزش های کلی از ماشينهای دوار مکانيکی و برقی، آموزشهای تخصصی ارتعاشات، اطلاعات کافی از ترموگرافی، ترايبولوژی و ديگر اطلاعات مربوط به تجهيزات تحت نظر برنامه CM الزامی می باشد.</p>\n<p>&nbsp;</p>\n<p><strong>3-تهیه فرآیندهای جمع آوری و آنالیز اطلاعات کارآمد</strong></p>\n<p>برنامه ای که خوب طراحی شده باشد همه ماشینها و تجهیزات را به یک اندازه مورد بازرسی قرار نمی دهد.&nbsp; قبل از هر چیز نیاز به طبقه بندی تجهیزات و ماشینهای کارخانه می باشد. آناليز اطلاعات بدون شناخت کافی از ماشين يا تجهيز مورد آناليز تقريبا غير ممکن است. اين اطلاعات عبارتند از :</p>\n<p>&nbsp;&nbsp;مشخصات بيرينگ ها، &nbsp;&nbsp;&nbsp;&nbsp;چرخدنده ها، &nbsp;&nbsp;&nbsp;&nbsp;الکتروموتورها، &nbsp;&nbsp;&nbsp;&nbsp;تيغه های پروانه پمپ ها، کمپرسورها و توربين ها&nbsp;،&nbsp; &nbsp;دور نامي ماشينها ، &nbsp;&nbsp;&nbsp;تهيه کتابچه روغنهای مصرفی &nbsp;&nbsp;و &nbsp;&nbsp;&nbsp;&nbsp;برخي حدود مجاز سازنده تجهیز&nbsp; &nbsp; &nbsp; می باشد.</p>\n<p>&nbsp;</p>\n<p><strong>4</strong><strong>-بانک اطلاعاتی بادوام</strong></p>\n<p>نتیجه کار بستگی به کامل یا ناقص بودن بانک اطلاعاتی دارد. باید برنامه ای منظم برای Back up گیری از بانک اطلاعاتی داشته باشید تا دوام آن تضمین شود.</p>\n<p><strong>&nbsp;</strong></p>\n<p><span style="font-size: 14pt;"><strong>طبقه بندی تجهیزات:</strong></span></p>\n<p style="padding-right: 30px;"><strong>Class I</strong> (<strong>حياتی</strong>).&nbsp; &nbsp; ماشين آلات و تجهيزاتی که برای تداوم توليد بايد بصورت دائمی در سرويس باشند و فقدان يکی از آنها باعث توقف کارخانه و هدر رفتن کلی توليدات خواهد شد.</p>\n<p>همچنين تجهيزاتی که دارای هزينه تعميراتی بسيار زيادی هستند يا زمان تعمير آنها زياد طول می کشد.</p>\n<p>&nbsp;</p>\n<p style="padding-right: 30px;"><strong>C</strong><strong>lass II</strong> (<strong>بحرانی</strong>).&nbsp; &nbsp; ماشين آلاتی که به شدت ظرفيت توليد را محدود می کنند.</p>\n<p>بعنوان يک قانون کلی ماشين آلاتی که آسيب ديدنشان باعث افت 30 درصدی يا بيشتر در توليد می شوند. همچنين ماشينها يا سيستمهايی که سابقه تعميراتی مزمنی دارند يا اينکه هزينه تعميرات يا جايگزينی آنها زياد است.</p>\n<p>&nbsp;</p>\n<p style="padding-right: 30px;"><strong>Class III</strong>&nbsp; (<strong>جدی</strong>). &nbsp; تجهيزاتی که جزء تجهيزات اصلی هستند و هزينه تعميرات را بالا می برند اما ضربات و اثرات چشمگيری روی توليد ندارند.</p>\n<p>دستگاههای آماده بكار(standby) جزء اين کلاس قرار دارند . چرا که باعث تأمين تداوم توليد در موارد خاص می شوند و اگر چه خرابی آنها روی توليد اثر نخواهد گذاشت. اما تأثير مستقيم روی هزينه تعميرات دارند.</p>\n<p>&nbsp;</p>\n<p style="padding-right: 30px;"><strong>Class IV</strong>&nbsp; (<strong>ديگر ماشين آلات</strong>). &nbsp; تجيهزات ديگر که سابقه ثابت شده ای از تأثير روی خط توليد يا هزينه تعميرات دارند.</p>\n<p>همه تجهيزات اين گروه بايد از اين نظر که ارزش مانيتورينگ دارند يا خير مورد ارزيابی قرار گيرند. زيرا در برخی موارد هزينه تعويض کمتر از هزينه ساليانه مانيتور کردن آنها می باشد.</p>\n<p>ابتدا بايد همه انواع ماشين آلات دوار را برای بدست آوردن خط مرز معتبر و درستی از داده ها تحت مانيتورينگ قرار داد. داده برداري بصورت spectrum از اثر انگشت ارتعاش ماشين براي ايجاد بانك اطلاعاتي بعنوان مرجع (reference) وضعيت کارکرد اوليه ماشين آلات بايد انجام شود.</p>\n<p>چند مرحله داده برداری روی همه ماشين آلات نياز است تا اطلاعات کافی برای ريزپردازنده مهيا شود و ترند به حد قابل قبول اطلاعات دسترسی داشته باشد. در اين فاز اندازه گيری معمولا هر دو هفته يکبار انجام می شود. (فاز اول بايد 6 پريود انجام شود يعنی 12 هفته)</p>\n<p>داده های ارتعاشی پایه ای هستند که وقتی کارکرد تجهیز ثابت و معلوم باشد اندازه گیری می شوند و رصد می شوند.</p>\n<p>برای ماشین های با چندین شرایط کارکرد ضروری است برای هر شرایطی یک baseline ایجاد کرد.</p>\n<p>برای تجهیزات نو یا overhaule شده لازم است تغییرات ارتعاش در چند روز یا چند هفته اول ملاحظه شود.</p>\n<p>برای تجهیزی که برای دوره قابل توجهی کار کرده است و برای بار اول مانیتور می شود، یک baseline به عنوان نقطه مبنای مرجع ترند می توان ایجاد کرد.</p>\n<p>بعد از مرحله اول يعنی ارزيابی و ترسيم baseline ماشين آلات، تناوب داده برداری بسته به طبقه بندی ماشين آلات متفاوت خواهد بود.</p>\n<p><strong>&iexcl;&nbsp;&nbsp;&nbsp;&nbsp; </strong>Class I هر دو يا سه هفته يکبار بايد مانيتور شوند.</p>\n<p><strong>&iexcl;&nbsp;&nbsp;&nbsp;&nbsp; </strong>Class II دوره اندازه گيري سه تا چهار هفته ای.</p>\n<p><strong>&iexcl;&nbsp;&nbsp;&nbsp;&nbsp; </strong>Class III تناوب اندازه گيری چهار تا شش هفته ای.</p>\n<p><strong>&iexcl;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Class IV&nbsp;دوره اندازه گيری شش تا ده هفته ای.</p>\n<p><strong>&nbsp; </strong>&nbsp; اين تناوبها قابل تغيير می باشند و برای شرايط واقعی خاص ماشين بايد تنظيم شود.</p>\n<p dir="rtl" style="text-align: justify;"><strong>&nbsp;</strong></p>\n<ul dir="rtl">\n<li style="text-align: justify;">هیدرولیک و پنوماتیک</li>\n<li style="text-align: justify;">نرم افزارهای تخصصی</li>\n</ul>', '', '', 'Technical-Facts', '1', '80');

-- --------------------------------------------------------

--
-- Table structure for table `fx_files`
--

CREATE TABLE IF NOT EXISTS `fx_files` (
  `file_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_image_ip`
--

CREATE TABLE IF NOT EXISTS `fx_image_ip` (
  `id_ip` int(11) NOT NULL,
  `img_id_fk` int(11) NOT NULL,
  `ip_add` varchar(40) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5055 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fx_introduction`
--

CREATE TABLE IF NOT EXISTS `fx_introduction` (
  `id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_introduction`
--

INSERT INTO `fx_introduction` (`id`, `description`, `saved_by`) VALUES
(6, '<p>شرکت تعاونی دانش بنیان سیمرغ صنعت و دانش با نام اختصاری&nbsp;SSD&nbsp;به عنوان نماینده گروه مشاوران رهاورد تلاش ارغوان در منطقه مرکز و جنوب کشور، با بهره گیری از تیم مشاوران مجرب و متخصص در راستای تعالی و تحقق چشم اندازمشتریان خود گام بر می دارد. ما از تشخیص صحیح&nbsp;&nbsp;مسائل سازمان و انتخاب و پیاده سازی بهترین راهکارها و ابزارهای عملیاتی تا حصول نتایج مورد نظر همراهتان هستیم. اشتیاق برای نوآوری، پویایی، نتیجه گرایی و موفقیت مشترک از ارزش های بنیادین سازمان ماست.</p>\n<p>&nbsp;این شرکت به عنوان یکی از با سابقه ترین شرکت های مستقر در مرکز خدمات فناوری و کسب و کار استان یزد که تحت نظر شرکت شهرکهای صنعتی استان است؛ با ارائه خدمات مشاوره و آموزش راهکارهای تعالی کسب و کار در خدمت بنگاههای اقتصادی استان می باشد.<br />ما با تشکیل تیم های متخصص جهت مشاوره و آموزش در زمینه های مختلف مسائل سازمانی از مجموعه های صنفی و صنعتی کوچک تا صنایع بزرگ، با بالاترین کیفیت و تعهد در خدمت صاحبان کسب و کار هستیم.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fx_invoices`
--

CREATE TABLE IF NOT EXISTS `fx_invoices` (
  `inv_id` int(11) NOT NULL,
  `reference_no` varchar(32) CHARACTER SET latin1 NOT NULL,
  `client` varchar(64) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'A finance charge of 1.5% will be made on unpaid balances after due day.Thank you for your business.',
  `allow_paypal` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `tax` int(11) NOT NULL DEFAULT '0',
  `recurring` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `r_freq` int(11) NOT NULL DEFAULT '31',
  `currency` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT 'USD',
  `status` enum('Unpaid','Paid') CHARACTER SET latin1 NOT NULL DEFAULT 'Unpaid',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date_sent` varchar(64) CHARACTER SET latin1 NOT NULL,
  `inv_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailed` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_log`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_log` (
  `id` int(11) NOT NULL,
  `listener_name` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Either IPN or API',
  `transaction_type` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The type of call being made to the listener',
  `transaction_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The unique transaction ID generated by PayPal',
  `status` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The status of the call',
  `message` varchar(512) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Explanation of the call status',
  `ipn_data_hash` varchar(32) CHARACTER SET latin1 DEFAULT NULL COMMENT 'MD5 hash of the IPN post data',
  `detail` text CHARACTER SET latin1 COMMENT 'Detail text (potentially JSON) on this call',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_orders`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_orders` (
  `id` int(11) NOT NULL,
  `notify_version` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `protection_eligibility` varchar(24) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Which type of seller protection the buyer is protected by',
  `charset` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Character set used by PayPal',
  `btn_id` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The PayPal buy button clicked',
  `address_city` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s company name, if customer represents a business',
  `payer_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `receiver_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `order_status` enum('PAID','WAITING','REJECTED') CHARACTER SET latin1 DEFAULT NULL COMMENT 'Additional variable to make payment_status more actionable',
  `discount` decimal(10,2) DEFAULT NULL COMMENT 'Additional variable to record the discount made on the order',
  `shipping_discount` decimal(10,2) DEFAULT NULL COMMENT 'Record the discount made on the shipping',
  `ipn_track_id` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Internal tracking variable added in April 2011',
  `transaction_subject` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Describes the product for a button-based purchase',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_order_items`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `cost_per_item` decimal(10,2) DEFAULT NULL COMMENT 'Cost of an individual item',
  `option_name_1` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 1 name as requested by you',
  `option_selection_1` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_name_2` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection_2` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `option_name_3` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 3 name as requested by you',
  `option_selection_3` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 3 choice as entered by your customer',
  `option_name_4` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 4 name as requested by you',
  `option_selection_4` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 4 choice as entered by your customer',
  `option_name_5` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 5 name as requested by you',
  `option_selection_5` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 5 choice as entered by your customer',
  `option_name_6` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 6 name as requested by you',
  `option_selection_6` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 6 choice as entered by your customer',
  `option_name_7` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 7 name as requested by you',
  `option_selection_7` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 7 choice as entered by your customer',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_items`
--

CREATE TABLE IF NOT EXISTS `fx_items` (
  `item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_items_saved`
--

CREATE TABLE IF NOT EXISTS `fx_items_saved` (
  `item_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` int(11) NOT NULL,
  `deleted` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_learning`
--

CREATE TABLE IF NOT EXISTS `fx_learning` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `title_sub` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_learning`
--

INSERT INTO `fx_learning` (`id`, `name`, `description`, `title_sub`, `saved_by`) VALUES
(8, 'اندازه گیری رضایت کارکنان', '<p>آشنایی با اهمیت و عوامل موثر بر رضایت کارکنان به منظور ارتقای سطح رضایت ایشان</p>', '1', '1'),
(10, 'تكنيك هاي حل مساله', '<p><span dir="RTL" lang="AR-SA">ارائه راهکارهای توسعه خلاقیت به منظور ارائه کارهای تیمی و روشهای خلاق حل مساله</span></p>', '1', '1'),
(11, 'توانمندسازي كاركنان', '<p>ارائه راهکارهای اثربخش در جهت توانمند ساختن کارکنان به منظور افزایش بهره وری ایشان</p>', '1', '1'),
(12, 'توسعه شایستگی های استراتژیک', '<p>آشنایی با انواع شایستگی های استراتژیک کارکنان و روش های ارتقای شایستگی ها</p>', '1', '1'),
(13, 'توسعه كارهاي تيمي', '<p>آشنایی با مفاهیم تیم، گروه و تیم سازی و همچنین ارتقای مهارت های تیمی و روش های توسعه مشارکت کارکنان</p>', '1', '1'),
(15, 'توسعه مشاركت سازماني', '<p>آشنایی فراگیران با مفهوم مشارکت سازمانی و میزان اهمیت آن در پیشبرد اهداف کلان سازمان و همچنین ایجاد محیطی امن در بستر اعتماد</p>', '1', '1'),
(17, 'تیپ های شخصیتی اناگرام', '<p>آشنایی فراگیران با انواع تیپ های شخصیتی، نقاط قوت و نواحی قابل بهبود آن در جهت برقراری&nbsp; ارتباط موثر با دیگران</p>', '1', '1'),
(18, 'جانشین پروری', '<p>آشنایی فراگیران با رویکردها و روش های پرورش مدیران و شناسایی استعدادها و مهارت های ایشان در جهت تقویت ساختار سازمان</p>', '1', '1'),
(19, 'فرهنگ سازماني', '<p>آشنایی فراگیران با اهمیت فرهنگ سازمانی در جهت توسعه شایستگی های استراتژیک کارکنان به منظور توسعه مهارت های رهبری</p>', '1', '1'),
(20, 'مديريت بر خويشتن', '<p>آشنایی فراگیران با اصول نوین مدیریت بر خویشتن جهت ارتقای مهارتهای فردی و سازمانی</p>', '1', '1'),
(21, 'مديريت زمان', '<p>آشنایی مخاطبان با اهمیت روز افزون مدیریت زمان در افزایش بهره وری کارکنان</p>', '1', '1'),
(24, 'استراتژي برند', '<p>آشنایی با چگونگی تدوین و اجرای استراتژی برند در جهت ایجاد وفاداری مشتریان و افزایش منافع ذینفعان</p>', '2', '1'),
(25, 'مدیریت استرس', '<p>آشنایی فراگیران با مفهوم استرس و ضايعاتي كه بر فرد وارد مي كند و شيوه هاي كاهش اثرات تخريبي آن</p>', '1', '1'),
(26, 'مدیریت انگیزش کارکنان', '<p>آشنایی با مفهوم انگیزش، تئوری های انگیزش و روش های حفظ و ارتقای انگیزه کارکنان در جهت بهبود عملکرد ایشان</p>', '1', '1'),
(27, 'مدیریت تعارض', '<p><span dir="RTL" lang="AR-SA">آشنایی با مفهوم تعارض و روش های حل تعارض و توسعه ارتباطات</span></p>', '1', '1'),
(28, 'مدیریت تغییر', '<p>آشنایی با مفهوم تغییر و راهکارهای اثربخش در جهت مدیریت آن</p>', '1', '1'),
(29, 'مدیریت جلسات', '<p>آشنایی فراگیران با تعريف، تقسيم بندي و ضرورت تشکیل جلسات و همینطور تعیین هدف و برنامه ریزی برای اجرا و رسیدن به هدف جلسات با مدیریت مراحل سه گانه (قبل، حین و بعد) جلسات</p>', '1', '1'),
(30, 'مدیریت خطرپذیری', '<p>آشنایی با مفهوم خطرپذیری و مهرات های لازم در جهت مدیریت آن</p>', '1', '1'),
(31, 'مدیریت برند', '<p>آشنایی با مفهوم برند، انواع برند و چگونگی مدیریت و توسعه برند در فضای کسب و کار</p>', '2', '1'),
(32, 'هویت برند', '<p>آشنایی با مفهوم هویت برند و عوامل موثر بر ایجاد هویت برند در بین مشتریان</p>', '2', '1'),
(33, 'مدیریت فرایند نوآوری', '<p>آشنایی با مفاهیم خلاقیت و نوآوری، تفاوت آنها، انواع نوآوری و روش های مدیریت نوآوری در سازمان</p>', '2', '1'),
(34, 'مدیریت تمایز', '<p>آشنایی با روش های ایجاد تمایز در کسب و کار به منظور کسب مزیت رقابتی</p>', '2', '1'),
(35, 'مدیریت اعتماد مشتریان', '<p>آشنایی با تعریف مشتری، اعتماد و تکنیک های جلب اعتماد مشتریان</p>', '2', '1'),
(36, 'رهبری و پارادایم', '<p>آشنایی با مفاهیم اساسی پارادایم و رهبری به منظور نشان دادن اهمیت تغییر نگرش در ایجاد تحولیعظیم در یک کسب و کار</p>', '3', '1'),
(37, 'رهبری و فرهنگ', '<p>آشنایی با تئوری های فرهنگ و رهبری و ارتباط این دو با هم و سطوح رهبری در ساز</p>', '3', '1'),
(38, 'مهارت های رهبری', '<p>آشنایی با مهارت های چندگانه رهبری و عوامل موثر بر ارتقای توانمندی های رهبران</p>', '3', '1'),
(39, 'توسعه رهبری مشارکتی', '<p>آشنایی با روشهای ارتقای مهارت های مشارکتی رهبران</p>', '3', '1'),
(40, 'مدیریت تحول', '<p>آشنایی با مفهوم مدیریت تحول و عوامل موثر بر شکل گیری تحول سازمانی</p>', '3', '1'),
(41, 'مدیریت بحران', '<p>آشنایی با مفهوم بحران و روش های پیش بینی، مقابله با آن و شناسایی فرصت های محیطی</p>', '3', '1'),
(42, 'کارگاه اندازه گیری رضایت مشتری (CSM)', '<p>آشنایی با اهمیت سیستم اندازه گیری رضایتمندی مشتریان و شناخت جایگاه مشتری در آینده کسب و کار است.</p>', '4', '1'),
(43, 'کارگاه EFQM', '<p>از مفاهیم اصلی سازمانی است که بطور متداول در گزارشات مدیریتی مورد استفاده قرار می گیرد، اما هر قدر این مفهوم در کسب و کار رونق بیشتری می یابد، موضوع دسترسی به آن و اندازه گیری آن نیز از اهمیت ویژه ای برخوردار می گردد.</p>', '4', '1'),
(44, 'کارگاه مهندسی مجدد فرایند کسب و کار (BPR)', '<p>هدف، آشنایی با مهندسی مجدد فرایندها و تجدید ساختار سازمانی بر اساس مدیریت فرایندها، مسائل و مشکلات نغییرات سازمان بر اساس مدیریت فرایندها و پپاده سازی آن در سازمان میباشد.</p>', '4', '1'),
(45, 'کارگاه بهینه کاوی', '<p>از مهمترین روشهای یادگیری سازمانی موضوع الگوبرداری یا بهینه کاوی است. اصولاً در مقایسه با بهترین ها است که می توان به گپ ها و فاصله های موجود پی برده و برای تحول و بهبود آنها برنامه ریزی و با نشانگاه قرار دادن بهترین ها به آن سو حرکت کرد. در این کارگاه ضمن دریافت درک مشخصی از با مراحل اجرایی آن نیز آشنا می شویم و با نمونه های عینی و تجربی ضمن دریافت بهتر موضوعات به اهمیت آن نیز دسترسی پیدا می کنیم.</p>', '4', '1'),
(46, 'کارت امتیازی متوازن', '<p>آشنایی با مفهوم استراتژی و ارزیابی پیشرفت آن بر اساس کارت امتیازی متوازن</p>', '4', '1'),
(47, 'تفکر سیستمی', '<p>آشنایی فراگیران با اصول تفکر سیستمی در راستای پیاده سازی آن در سازمان</p>', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_login_attempts`
--

CREATE TABLE IF NOT EXISTS `fx_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `fx_mali`
--

CREATE TABLE IF NOT EXISTS `fx_mali` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `viwe` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_mali`
--

INSERT INTO `fx_mali` (`id`, `name`, `description`, `image`, `file`, `url`, `saved_by`, `viwe`) VALUES
(5, 'خدمات مشاوره مالی', '<p dir="rtl" style="text-align: justify;">استفاده از اطلاعات مالی و حسابداری مربوط، قابل اتکاء و مفید مهم ترین وسیله تصمیم گیری برای واحدهای تجاری می باشد و دستیابی به اطلاعات مالی و حسابداری مذکور جز با استفاده از خدمات حسابداران و مشاورین مدیریت امکان پذیر نیست.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;"><strong>عارضه یابی مالی:</strong></p>\n<p dir="rtl" style="text-align: justify;">آسیب شناسی وکشف مسئله،تشکیل کمیته بهبود،شناسایی اقدامات ضروری،تعین زمان بندی اقدامات بهبود و پیاده سازی اقدامات بهبود.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;"><strong>مدل های مالی:</strong></p>\n<p dir="rtl" style="text-align: justify;">نمایندگی ریاضی از عملیات مالی و صورتهای مالی (با مفروضات مربوط به چگونه برنامه ریزی بودجه) یک شرکت است برای پیش بینی عملکرد مالی آینده شرکت.</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>\n<p dir="rtl" style="text-align: justify;"><strong>بودجه بندی: &nbsp;</strong></p>\n<p dir="rtl" style="text-align: justify;">برنامه ریزی مالی، همانند نقشه ای برای راهنمایی، هماهنگی و کنترل عملیات، جهت دستیابی به اهداف شرکت می باشد.</p>', '', '', 'Financial-Consulting-services', '1', '50'),
(6, 'دانستنی های مالی', '<p dir="rtl" style="text-align: justify;">حسابداری&nbsp; درجهان نزدیک به 6000 سال قدمت دارد ونخستین مدارک کشف شده حسابداری به 3600 سال قبل از میلاد مسیح بر میگردد. دانش حسابداری در ایران نیز از زمان هخامنشیان وجود داشته ودرطول تاریخ، با روش های متنوعی(ممیزی املاک در تمدن ساسانی و مخارج حکومتی در دوران سلجوقیان) استفاده می شده است.</p>', '', '', 'Financial-Facts', '1', '52');

-- --------------------------------------------------------

--
-- Table structure for table `fx_man`
--

CREATE TABLE IF NOT EXISTS `fx_man` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `viwe` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_man`
--

INSERT INTO `fx_man` (`id`, `name`, `description`, `image`, `file`, `url`, `saved_by`, `viwe`) VALUES
(7, 'خدمات مشاوره مدیریتی', '<p dir="rtl" style="text-align: justify;">&nbsp; مشاوره نتیجه بخش، مستلزم:</p>\n<ul dir="rtl" style="text-align: justify;">\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تشخیص صحیح مسائل سازمان</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;انتخاب بهترین راهکارها و ابزارها</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;و در نهایت پیاده سازی صحیح و اثربخش راهکارهامی باشد.</li>\n</ul>\n<p dir="rtl" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;ارائه خدمات مشاوره ای جامع، متمایز و نتیجه بخش،متناسب با مراحل مختلف چرخه عمر سازمان ها توسط تیم مشاوران&nbsp;SSD:</p>\n<p dir="rtl" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;تشخیص و درمان عارضه های سازمانی/ تدوین و اجرای استراتژی کسب و کار/ حرفه ای سازی و توسعه&nbsp;کسب و کارهای کوچک/ مدیریت جامع منابع انسانی/ مدیریت مالی و سرمایه گذاری/ مدیریت بازاریابی و فروش / مدیریت فنی و تولید</p>', '', '', 'Management-consulting-services', '1', '44'),
(8, 'دانستنی های مدیریتی', '<p>در این بخش مقالات بروز و دانستنیهای مربوط به کسب و کار ارائه میگردد.</p>', '', '', 'Knowledge-management', '1', '41');

-- --------------------------------------------------------

--
-- Table structure for table `fx_messages`
--

CREATE TABLE IF NOT EXISTS `fx_messages` (
  `msg_id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `status` enum('Read','Unread') CHARACTER SET latin1 NOT NULL DEFAULT 'Unread',
  `attached_file` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_messages`
--

INSERT INTO `fx_messages` (`msg_id`, `user_to`, `user_from`, `message`, `status`, `attached_file`, `date_received`, `deleted`) VALUES
(1, 1, 1, 'ggg', 'Read', '', '2015-02-21 12:26:19', 'No'),
(2, 1, 1, 'sdfgsdf', 'Unread', '', '2015-02-28 11:53:11', 'No'),
(3, 1, 1, 'sdfgsdf', 'Unread', '', '2015-02-28 11:53:14', 'No'),
(4, 2, 1, 'dfgvdv', 'Unread', '', '2015-02-28 11:53:27', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `fx_newsk`
--

CREATE TABLE IF NOT EXISTS `fx_newsk` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_persian_ci NOT NULL,
  `url` text COLLATE utf8mb4_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `fx_newsk`
--

INSERT INTO `fx_newsk` (`id`, `title`, `url`, `saved_by`) VALUES
(37, 'بند ویژه حمایتی از تولید (95/01/21)', 'http://www.donya-e-eqtesad.com/news/1039433/', '1'),
(38, 'افزایش تعرفه برخی اقلام صنعتی (95/01/22)', 'http://www.donya-e-eqtesad.com/news/1040045/', '1'),
(39, '7هزار واحد شهرک های صنعتی تعطیل شد (95/01/22)', 'http://jahanesanat.ir/?newsid=48694', '1'),
(40, 'تسهیلات ویژه برای قطعه سازان (95/01/24)', 'http://www.donya-e-eqtesad.com/news/1041016/', '1'),
(41, 'پیش نیاز برنامه های حمایتی صادرات (95/01/24)', 'http://www.donya-e-eqtesad.com/news/1041041/', '1'),
(42, 'افزایش سرمایه بانکها برای رونق تولید (94/01/25)', 'http://jahanesanat.ir/?newsid=49162', '1'),
(43, 'بسته گمرک برای رونق تولید (95/01/25)', 'http://www.donya-e-eqtesad.com/news/1041639/', '1'),
(44, 'چهار چالش بنگاههای کوچک (95/01/28)', 'http://www.donya-e-eqtesad.com/news/1043297/', '1'),
(45, 'در فروش عجله نکنیند (95/01/28)', 'http://jahanesanat.ir/?newsid=49370', '1'),
(46, 'پیش بینی رشد صنعتی در بهار (95/01/29)', 'http://www.donya-e-eqtesad.com/news/1043941/', '1'),
(47, 'چالش تجارت خارجی (95/01/29)', 'http://jahanesanat.ir/?newsid=49462', '1'),
(48, 'دو دغدغه بخش خصوصی در سال 95 (95/01/30)', 'http://www.donya-e-eqtesad.com/news/1044637/', '1'),
(49, 'مشکلات اقتصادی امنیت را تهدید میکند (95/01/30)', 'http://jahanesanat.ir/?newsid=49604', '1'),
(50, 'تعیین تکلیف بدهکاران ارزی (95/01/31)', 'http://www.donya-e-eqtesad.com/news/1045440/', '1'),
(51, 'مدیریت ریسک در پساتحریم (95/01/31)', 'http://www.donya-e-eqtesad.com/news/1045324/', '1'),
(52, 'چگونگی ترمیم و مقاوم سازی بدنه اقتصادی (95/02/01)', 'http://jahanesanat.ir/?newsid=49821', '1'),
(53, '82 ماموریت برای بهبود محیط کار (95/02/01)', 'http://www.donya-e-eqtesad.com/news/1045983/', '1'),
(54, 'سه پیشنهاد برای اعطای وام ارزان (95/02/04)', 'http://www.donya-e-eqtesad.com/news/1047068/', '1'),
(55, 'نظام بانکی رونق را به اقتصاد بازگرداند (95/02/04)', 'http://jahanesanat.ir/?newsid=49950', '1'),
(56, 'سود بانکی به مالیات کشید (95/02/05)', 'http://jahanesanat.ir/?newsid=50088', '1'),
(57, 'اکران اطلاعات 85 فرصت صنعتی (95/02/05)', 'http://www.donya-e-eqtesad.com/news/1047786/', '1'),
(58, 'عبور از تنگناهای اقتصادی با اهرم بانکی (95/02/06)', 'http://jahanesanat.ir/?newsid=50327', '1'),
(59, 'بسته مکمل برای مقاوم سازی اقتصاد (95/02/06)', 'http://www.donya-e-eqtesad.com/news/1048334/', '1'),
(60, 'آینده پیش روی سیستم های مالیاتی (95/02/07)', 'http://jahanesanat.ir/?newsid=50541', '1'),
(61, 'حمایت از تولید با اجرای درست قوانین و مقررات (95/02/07)', 'http://www.donya-e-eqtesad.com/news/1049007/', '1'),
(62, 'تنوع بخشی تامین مالی در بستر بازار سرمایه (95/02/08)', 'http://jahanesanat.ir/?newsid=50600', '1'),
(63, 'هفت ماموریت صنعتی 95 (95/02/08)', 'http://www.donya-e-eqtesad.com/news/1049736/', '1'),
(64, 'راه عبور از خشکسالی مالی (95/02/11)', 'http://www.donya-e-eqtesad.com/news/1050511', '1'),
(65, 'نارضایتی در بازار کار (95/02/11)', 'http://jahanesanat.ir/?newsid=50957', '1'),
(66, 'چرخش سرمایه گذاران به صنایع بزرگ (95/02/12)', 'http://www.donya-e-eqtesad.com/news/1050682', '1'),
(67, 'وقتی زیرساخت، اعتماد را زیر سوال میبرد (95/02/12)', 'http://jahanesanat.ir/?newsid=50978', '1'),
(68, 'آینده اقتصاد ایران روشن است (95/02/13)', 'http://www.donya-e-eqtesad.com/news/1050844', '1'),
(69, 'رابطه «برد- برد» با کشورهای بزرگ صنعتی (95/02/13)', 'http://jahanesanat.ir/?newsid=51207', '1'),
(70, 'سه مانع خلق شغل صنعتی (95/02/14)', 'http://www.donya-e-eqtesad.com/news/1050996', '1'),
(71, 'افزایش 3 درصدی نرخ تورم صنعت  (95/02/14)', 'http://jahanesanat.ir/?newsid=51238', '1'),
(72, 'خروج کشور از خشکسالی 15 ساله (95/02/15)', 'http://www.donya-e-eqtesad.com/news/1051186', '1'),
(73, 'ضرورت ورود بخش خصوصی به پروژه های اقتصادی (95/02/15)', 'http://www.donya-e-eqtesad.com/news/1051187', '1'),
(74, 'چالش های کسب و کار در ایران (95/02/18)', 'http://www.donya-e-eqtesad.com/news/1051333', '1'),
(75, 'کسر بیمه از بن کارگری، قانونی است (95/02/18)', 'http://jahanesanat.ir/?newsid=51502', '1'),
(76, 'افزایش نقدینگی به نفع رشد اقتصادی (95/02/19)', 'http://jahanesanat.ir/?newsid=51639', '1'),
(77, 'سه ابزار توقف مونتاژ کاری (95/02/19)', 'http://www.donya-e-eqtesad.com/news/1051493', '1'),
(79, 'بررسی دستورالعمل مشوش های صادراتی (95/02/20)', 'http://www.donya-e-eqtesad.com/news/1051606', '1'),
(80, 'دولت دست بانک ها را بسته است (95/02/21)', 'http://jahanesanat.ir/?newsid=51826', '1'),
(81, 'مجوز یک روزه برای کسب و کار (95/02/21)', 'http://www.donya-e-eqtesad.com/news/1051859', '1'),
(82, 'شفافیت حلقه مفقوده مدیریت (95/02/22)', 'http://jahanesanat.ir/?newsid=51952', '1'),
(83, 'تغییر هویت مزاحمان تولید (95/02/22)', 'http://www.donya-e-eqtesad.com/news/1052044', '1'),
(84, 'موافقت شورای سه جانبه برای تبدیل وضعیت نیروهای شرکتی به قراردای (95/02/25)', 'http://jahanesanat.ir/?newsid=52263', '1'),
(85, '12 گام در جاده کسب و کار (95/02/25)', 'http://www.donya-e-eqtesad.com/news/1052301', '1'),
(86, 'کمبود منابع بانکی مانع فروش اقساطی (95/02/26)', 'http://jahanesanat.ir/?newsid=52397', '1'),
(87, 'دو شزط وام دهی به بنگاهها (95/02/26)', 'http://www.donya-e-eqtesad.com/news/1052437', '1'),
(88, 'بانکها قربانی بازی سیاسی (95/02/27)', 'http://jahanesanat.ir/?newsid=52541', '1'),
(89, 'دغدغه اول تجار خارجی (95/02/27)', 'http://donya-e-eqtesad.com/news/1052660', '1'),
(90, 'جلوی رشد نقدینگی را بگیرید (95/02/28)', 'http://jahanesanat.ir/?newsid=52613', '1'),
(91, 'رشد منفی بخش صنعت در سال 94 (95/02/28)', 'http://donya-e-eqtesad.com/news/1052786', '1'),
(92, 'ناخوشی اقتصادی (95/02/29)', 'http://jahanesanat.ir/?newsid=52780', '1'),
(93, 'ریز نمرات صنعت سال 94 (95/02/29)', 'http://donya-e-eqtesad.com/news/1053005', '1'),
(94, 'معرفی کسب و کارهای جذاب 94 (95/03/01)', 'http://donya-e-eqtesad.com/news/1053302', '1'),
(95, 'انتظار مانع تحرک اقتصادی (94/03/01)', 'http://jahanesanat.ir/?newsid=53093', '1'),
(96, 'تکرار رشد منفی صنعت در 95 (95/03/03)', 'http://jahanesanat.ir/?newsid=53144', '1'),
(97, 'رویکردهای هفت گانه برای جذب سرمایه خارجی (95/03/03)', 'http://donya-e-eqtesad.com/news/1053455', '1'),
(98, 'کاهش ریسک سرمایه گذاری (95/03/04)', 'http://jahanesanat.ir/?newsid=53267', '1'),
(99, 'داور تجاری جهان در ایران (95/03/04)', 'http://donya-e-eqtesad.com/news/1053628', '1'),
(100, 'حاشیه های سیاست در متن اقتصاد (95/03/05)', 'http://jahanesanat.ir/?newsid=53426', '1'),
(101, 'دو مسیر شارژ بنگاه های کوچک (95/03/05)', 'http://donya-e-eqtesad.com/news/1053803', '1'),
(102, 'اصلاح بسته حمایت از صادرات (95/03/08)', 'http://donya-e-eqtesad.com/news/1054077', '1'),
(103, 'اگر روزی فنر رکود اقتصاد باز شود (95/03/08)', 'http://jahanesanat.ir/?newsid=53732', '1'),
(104, 'دو هدف صادراتی 95 (95/03/09)', 'http://donya-e-eqtesad.com/news/1054239', '1'),
(105, 'تحلیل بنیادی 5 صنعت بورس در سال 95 (95/03/09)', 'http://jahanesanat.ir/?newsid=53810', '1'),
(106, 'پیش شرط های رشد اقتصاد پایدار (95/03/10)', 'http://jahanesanat.ir/?newsid=53955', '1'),
(107, 'عوامل مزاحم در اقتصاد سبز (95/03/10)', 'http://donya-e-eqtesad.com/news/1054324', '1'),
(108, 'درمان دارایی های سمی بانک ها برای توسعه (95/03/11)', 'http://jahanesanat.ir/?newsid=54092', '1'),
(109, 'چرا مرگ و میر سازمان ها زیاد شده است؟ (95/03/11)', 'http://donya-e-eqtesad.com/news/1054459', '1'),
(110, 'ابزار مالی راه نجات رکود (95/03/12)', 'http://jahanesanat.ir/?newsid=54193', '1'),
(111, 'انتشار نتایج آمارگیری از کارگاه های صنعتی (95/03/12)', 'http://donya-e-eqtesad.com/news/1054665', '1'),
(112, 'پیمان های پولی و مقتوم سازی اقتصاد (95/03/16)', 'http://donya-e-eqtesad.com/news/1054944', '1'),
(113, 'تلاش برای جذب مشتری (95/03/16)', 'http://jahanesanat.ir/?newsid=54427', '1'),
(114, 'ورشکستگی پنهان در اقتصاد ایران (95/03/17)', 'http://jahanesanat.ir/?newsid=54630', '1'),
(115, 'نوبت عبور از اقتصاد گلخانه ای (95/03/17)', 'http://donya-e-eqtesad.com/news/1055117', '1'),
(116, 'رشد اقتصادی قطعا به 5 درصد میرسد (95/03/18)', 'http://jahanesanat.ir/?newsid=54763', '1'),
(117, '6 مرحله شناسایی طرح های اولویت دار (95/03/18)', 'http://donya-e-eqtesad.com/news/1055277', '1'),
(118, 'حذف سقف حقوقی کارت خرید کالا (95/03/19)', 'http://donya-e-eqtesad.com/news/1055497', '1'),
(119, 'فاجعه در صنعت (95/03/19)', 'http://jahanesanat.ir/?newsid=54856', '1'),
(120, 'راه های مدیریت ریسک نقدینگی در خدمات مالی  (95/05/25)', 'http://jahanesanat.ir/?newsid=61640', '1'),
(121, 'نوسان صفر بازارهای داخلی (95/05/25)', 'http://donya-e-eqtesad.com/news/1064405', '1'),
(122, 'خروج صنعت از رکود (95/05/26)', 'http://jahanesanat.ir/?newsid=61798', '1'),
(123, 'کارآفرینی به شیوه آلمانی (95/05/27)', 'http://donya-e-eqtesad.com/news/1064851', '1'),
(124, 'هدف ایجاد600هزار فرصت شغلی (95/05/30)', 'http://jahanesanat.ir/?newsid=62190', '1'),
(125, 'تکلیف اشتغال مشخص نیست (95/05/30)', 'http://jahanesanat.ir/?newsid=62159', '1'),
(126, 'از عدم شفافیت تا ناکارآمدی سیستم بانکی (95/05/31)', 'http://jahanesanat.ir/?newsid=62300', '1'),
(127, '19 جاذبه فرود سرمایه (95/05/31)', 'http://donya-e-eqtesad.com/news/1065376', '1'),
(128, 'تحقق 95درصدی درآمد های مالیاتی (95/06/01)', 'http://jahanesanat.ir/?newsid=62419', '1'),
(129, 'کارنامه بازارها در میانه تابستان (95/06/01)', 'http://donya-e-eqtesad.com/news/1065490', '1'),
(131, '10 غفلت بزرگ برنامه ششم در بخش صنعت (95/06/02)', 'http://jahanesanat.ir/?newsid=62559', '1'),
(132, 'کارنامه سه ساله صنعت (95/06/02)', 'http://donya-e-eqtesad.com/news/1065699', '1'),
(133, 'گرانی پشت گرانی (95/06/03)', 'http://jahanesanat.ir/?newsid=62717', '1'),
(134, 'تصویر صنعت از 15 محصول استراتژیک (95/06/03)', 'http://donya-e-eqtesad.com/news/1065856', '1'),
(135, 'رونق بخشی بازار سرمایه با اوراق بدهی (95/06/04)', 'http://jahanesanat.ir/?newsid=62863', '1'),
(136, 'علائم دوری از رونق صنعتی (95/06/04)', 'http://donya-e-eqtesad.com/news/1066050', '1'),
(137, 'زنگ خطر تورم (95/06/06)', 'http://donya-e-eqtesad.com/news/1066251', '1'),
(138, 'موانع شکوفایی اقتصاد ایران (95/06/06)', 'http://donya-e-eqtesad.com/news/1066238', '1'),
(139, 'کاهش تورم و مثبت شدن رشد (95/06/07)', 'http://jahanesanat.ir/?newsid=63165', '1'),
(140, 'ایده هایی برای شرکت های بزرگ آینده (95/06/07)', 'http://donya-e-eqtesad.com/news/1066256', '1'),
(141, 'ایجاد 150 هزار شغل صنعتی تا پایان سال (95/06/08)', 'http://jahanesanat.ir/?newsid=63248', '1'),
(142, 'آینده نرخ تورم (95/06/08)', 'http://donya-e-eqtesad.com/news/1066599', '1'),
(143, 'رونق تولید و خروج از رکود از مهمترین سیاست های دولت (95/06/09)', 'http://jahanesanat.ir/?newsid=63343', '1'),
(144, 'ردیابی خروج سرمایه (95/06/09)', 'http://donya-e-eqtesad.com/news/1066760', '1'),
(145, 'تاثیر فناوری اطلاعات در چرخه عمر کسب و کار (95/06/10)', 'http://donya-e-eqtesad.com/news/1066834', '1'),
(146, 'هشت عامل یخبندان بورس (95/06/10)', 'http://donya-e-eqtesad.com/news/1066946', '1'),
(147, 'منافع مشتریان درفضای کسب و کار اینترنتی (95/06/11)', 'http://jahanesanat.ir/?newsid=63625', '1'),
(148, 'سهم بازار; معیاری مناسب برای سنجش موفقیت؟ (95/06/11)', 'http://donya-e-eqtesad.com/news/1067016', '1'),
(149, 'تولید کالای با کیفیت ایرانی صرف ندارد! (95/06/13)', 'http://jahanesanat.ir/?newsid=63748', '1'),
(150, 'هفته خوب سکه های کوچک (95/06/13)', 'http://donya-e-eqtesad.com/news/1067170', '1'),
(151, 'افزایش تولید ملی انتخاب نیست; ضرورت است (95/06/14)', 'http://jahanesanat.ir/?newsid=63883', '1'),
(152, 'هفت صنعت پولساز برای سرمایه گذاران (95/06/14)', 'http://donya-e-eqtesad.com/news/1067387', '1'),
(153, 'گسترش بیکاری نتیجه خصوصی سازی (95/06/15)', 'http://jahanesanat.ir/?newsid=64079', '1'),
(154, 'فرآیند فروش در آینده به چه شکلی خواهد بود؟ (95/06/15)', 'http://donya-e-eqtesad.com/news/1067506', '1'),
(155, 'امضای تفاهم نامه میان سازمان صنایع کوچک و آلمان (95/06/16)', 'http://donya-e-eqtesad.com/news/1067703', '1'),
(156, 'چین تولید فولاد را کاهش می دهد. (95/06/17)', 'http://jahanesanat.ir/?newsid=64247', '1'),
(157, 'فرصت های سبز را به چنگ آورید. (95/06/18)', 'http://donya-e-eqtesad.com/news/1068057', '1'),
(158, 'تداوم روزهای پررمق تولید (95/06/18)', 'http://donya-e-eqtesad.com/news/1068075', '1'),
(159, 'رفع آفت های صنعت و اقتصاد کشور (95/06/20)', 'http://jahanesanat.ir/?newsid=64681', '1'),
(160, 'پنج جریان در اصلاح بازار پول (95/06/20)', 'http://donya-e-eqtesad.com/news/1068215', '1'),
(161, '9 چاشنی برای خیز صنعتی (95/06/21)', 'http://donya-e-eqtesad.com/news/1068396', '1'),
(162, 'رشد2/2 درصد تولیدات صنعتی با اقتصاد نو ظهور (95/06/21)', 'http://donya-e-eqtesad.com/news/1068397', '1'),
(163, 'عارضه یابی بهبود فضای کسب و کار (95/06/23)', 'http://donya-e-eqtesad.com/news/1068554', '1'),
(164, 'سایه اربابان چینی بر غرب (95/06/23)', 'http://donya-e-eqtesad.com/news/1068552', '1'),
(165, 'خطر دو رقمی شدن تورم (95/06/24)', 'http://jahanesanat.ir/?newsid=65011', '1'),
(166, 'فعال سازب بیش از 8 میلیارد دلار طرح معدنی متوقف (95/06/24)', 'http://donya-e-eqtesad.com/news/1068720', '1'),
(167, 'توپ در زمین کارگران (95/06/25)', 'http://jahanesanat.ir/?newsid=65094', '1'),
(168, 'به روز رسانی لیست سرمایه گذاران صنعتی (95/06/25)', 'http://donya-e-eqtesad.com/news/1068929', '1'),
(169, 'بهانه جویی برای رفع مشکلات صنعت; ممنوع (95/06/27)', 'http://donya-e-eqtesad.com/news/1069027', '1'),
(170, 'افزایش تورم در راه است... (95/06/27)', 'http://jahanesanat.ir/?newsid=65216', '1'),
(171, 'گره گشایی بخش خصوصی (95/06/28)', 'http://jahanesanat.ir/?newsid=65394', '1'),
(172, 'مردی که ترکیب فهرست میلیاردرهای جهان را بر هم زد (95/06/28)', 'http://donya-e-eqtesad.com/news/1069167', '1'),
(173, 'ناکامی دولت در تثبیت رشد بخش صنعت (95/06/29)', 'http://jahanesanat.ir/?newsid=65479', '1'),
(174, 'اثر سه ضلع واردات بر تولید (95/06/29)', 'http://donya-e-eqtesad.com/news/1069475', '1'),
(175, 'غفلت دولت از معادن کوچک (95/06/31)', 'http://jahanesanat.ir/?newsid=65603', '1'),
(176, 'معمای عقبگرد در کارآفرینی (95/06/31)', 'http://donya-e-eqtesad.com/news/1069593', '1'),
(177, 'با حذف کمیسیون رفع موانع تولید به بهانه موازی کاری به صنعت کمک نمیشود! (95/07/01)', 'http://jahanesanat.ir/?newsid=65712', '1'),
(178, 'سکوت وزارت صنعت (95/07/03)', 'http://jahanesanat.ir/?newsid=65849', '1'),
(179, 'تقدم واردات بر صادرات (95/07/03)', 'http://donya-e-eqtesad.com/news/1069837', '1'),
(180, 'وضعیت ورود سرمایه به صنایع بزرگ (95/07/04)', 'http://donya-e-eqtesad.com/news/1070079', '1'),
(181, 'جایگاه ایران در میان پر درآمد ترین پتروشیمی های جهان (95/07/04)', 'http://donya-e-eqtesad.com/news/1070054', '1'),
(182, 'توان یادگیری بزرگ ترین امتیاز رقابتی در کسب و کار امروز (95/07/05)', 'http://donya-e-eqtesad.com/news/1070157', '1'),
(183, 'سیل نقدینگی در بازار  (95/07/05)', 'http://jahanesanat.ir/?newsid=66122', '1'),
(184, 'هضم نسبی بیکاری ! (95/07/06)', 'http://jahanesanat.ir/?newsid=66183', '1'),
(185, 'صعود نرخ رشد اقتصاد و صنعت ; رشد ناگهانی ممکن نیست. (95/07/07)', 'http://jahanesanat.ir/?newsid=66301', '1'),
(186, 'چرا تبلیغات باید جنبه سرگرمی داشته باشد؟ (95/07/08)', 'http://donya-e-eqtesad.com/news/1070706', '1'),
(187, 'پرورش و توسعه مدیران در تراز جهانی (95/07/08)', 'http://donya-e-eqtesad.com/news/1070834', '1'),
(188, 'خطر تکرار تجربه بنگاه های زود بازده (95/07/10)', 'http://jahanesanat.ir/?newsid=66549', '1'),
(189, 'مسیر ورود برندهای خارجی (95/07/11)', 'http://donya-e-eqtesad.com/news/1071108', '1'),
(190, 'رانده شدن از بازارهای صادراتی (95/07/11)', 'http://jahanesanat.ir/?newsid=66712', '1'),
(191, 'نقطه تمرکز اشتغال صنعتی (95/07/12)', 'http://donya-e-eqtesad.com/news/1071322', '1'),
(192, 'کاهش 2 درصدی سهم صنعت ! (95/07/13)', 'http://jahanesanat.ir/?newsid=66916', '1'),
(193, 'عامل اعتماد ساز برای سرمایه گذاران (95/07/14)', 'http://donya-e-eqtesad.com/news/1071629', '1'),
(194, 'راه اندازی دوباره واحد های صنعتی و چندنکته (95/07/15)', 'http://donya-e-eqtesad.com/news/1071805', '1'),
(195, 'بازگشت 2800 واحد صنعتی به چرخه تولید (95/07/17)', 'http://donya-e-eqtesad.com/news/1072005', '1'),
(196, 'تصویر محدوده‌ های تخصصی صنعت (95/07/18)', 'http://donya-e-eqtesad.com/news/1072094', '1'),
(197, 'صدور 16هزار پروانه بهره برداری  (95/07/19)', 'http://donya-e-eqtesad.com/news/1072298', '1'),
(198, 'بازگشت به مدار توسعه (95/07/24)', 'http://donya-e-eqtesad.com/news/1072476', '1'),
(199, 'دولت به مدیریت سبز معادن کمک کند (95/07/25)', 'http://donya-e-eqtesad.com/news/1072663', '1'),
(200, 'نظارت اندک و عمق کم (95/07/25)', 'http://donya-e-eqtesad.com/news/1072611', '1'),
(201, 'آیا داشتن روابط دوستانه در محیط کار ضروری است؟ (95/07/26)', 'http://donya-e-eqtesad.com/news/1072792', '1'),
(202, 'نسخه درمان برای بنگاه‌ های کوچک  (95/07/27)', 'http://donya-e-eqtesad.com/news/1073022', '1'),
(203, 'جهش کیفی زندگی ایرانی (95/07/28)', 'http://donya-e-eqtesad.com/news/1073145', '1'),
(204, 'مقررات‌ زدایی با تجربه خارجی‌ ها (اصلاح قوانین سرمایه‌ گذاری کلید می‌خورد؛ نظرخواهی از سرمایه‌گذاران فعال در ایران)  (95/07/29)', 'http://donya-e-eqtesad.com/news/1073355', '1'),
(205, 'راه بازگشت صنایع نیمه تعطیل (95/08/01)', 'http://donya-e-eqtesad.com/news/1073498', '1'),
(206, 'مدل آلمانی برندسازی ( ژرمن‌ها از کسب‌وکار چگونه حمایت می‌کنند؟) (95/08/02)', 'http://donya-e-eqtesad.com/news/1073734', '1'),
(207, 'ساعت درونی سازمان را بیدار کنیم  (عوامل سازمانی موثر بر مدیریت زمان) (95/08/03)', 'http://donya-e-eqtesad.com/news/1073832', '1'),
(208, 'توقف 19 درصد از صنایع کوچک کشور(95/08/03)', 'http://donya-e-eqtesad.com/news/1073894', '1'),
(209, 'انعکاس رشد در تولید صنعتی (95/08/04)', 'http://donya-e-eqtesad.com/news/1073993', '1'),
(210, 'تولید 16 محصول  تولیدی افت کرد. (باوجود پرداخت های میلیاردی به واحد تولیدی) (95/08/05)', 'http://jahanesanat.ir/?newsid=68855', '1'),
(211, 'خیز ایران به سمت انرژی‌های نو (95/08/05)', 'http://donya-e-eqtesad.com/news/1074150', '1'),
(212, 'سه مدل آینده سرمایه‌ گذاری  (95/08/06)', 'http://donya-e-eqtesad.com/news/1074382', '1'),
(213, 'یخ زدایی از سرمایه‌گذاری صنعتی(95/08/08)', 'http://donya-e-eqtesad.com/news/1074465', '1'),
(214, 'رشد صنعتی و تفکر منظم در مورد آینده (95/08/09)', 'http://donya-e-eqtesad.com/news/1077199', '1'),
(215, 'رصد تجارت صنعتی در سه فاز (95/08/10)', 'http://donya-e-eqtesad.com/news/1077383', '1'),
(216, 'کارنامه ورود پول خارجی به صنعت (95/08/11)', 'http://donya-e-eqtesad.com/news/1077611', '1'),
(217, 'کاشی و سرامیک چگونه از رکود خارج می شود؟ (95/08/12)', 'http://jahanesanat.ir/?newsid=69593', '1'),
(218, 'فرصت جذب سرمایه‌ گذاری خارجی (95/08/13)', 'http://donya-e-eqtesad.com/news/1077932', '1'),
(219, 'مراحل مهم در اولین سال شروع کارآفرینی (95/08/15)', 'http://donya-e-eqtesad.com/news/1077981', '1'),
(220, '1500 واحد صنعتی، تحت تملک بانک‌ها (95/08/16)', 'http://donya-e-eqtesad.com/news/1078172', '1'),
(221, 'نگرانی بخش خصوصی از ادامه هجوم چینی‌ها (95/08/16)', 'http://jahanesanat.ir/?newsid=69951', '1'),
(222, 'جذب خارجی‌ها در سه مرحله (95/08/17)', 'http://donya-e-eqtesad.com/news/1078354', '1'),
(223, 'استرس مالی در کسب‌ و‌ کار(95/08/18)', 'http://donya-e-eqtesad.com/news/1078574', '1'),
(224, 'رشد در کمین صنعت (95/08/18)', 'http://jahanesanat.ir/?newsid=70188', '1'),
(225, '16 عامل کارآمدی بازار ایران (95/08/19)', 'http://donya-e-eqtesad.com/news/1078747', '1'),
(226, 'کارنامه قبولی تولید صنعتی، در نیمه اول سال 95 صادر شد. (95/08/20)', 'http://donya-e-eqtesad.com/news/1078900', '1'),
(227, 'عمر کوتاه رشد بالای اقتصادی (95/08/22)', 'http://donya-e-eqtesad.com/news/1079067', '1'),
(228, 'شش تجربه خروج از بن‌بست مالی (95/08/23)', 'http://donya-e-eqtesad.com/news/1079198', '1'),
(229, 'صدرنشینان کسب‌وکار صنعتی (95/08/24)', 'http://donya-e-eqtesad.com/news/1079395', '1'),
(230, 'عملکرد جهان در جذب سرمایه خارجی (95/08/24)', 'http://donya-e-eqtesad.com/news/1079396', '1'),
(231, 'شرایط کسب و کار در ایران از دید اروپایی‌ها (95/08/25)', 'http://donya-e-eqtesad.com/news/1079584', '1'),
(232, 'نقشه انتقال تهران به عمق (95/08/26)', 'http://donya-e-eqtesad.com/news/1079785', '1'),
(233, 'مدیریت کسب‌وکار با رویکرد انسانی (95/08/26)', 'http://donya-e-eqtesad.com/news/1079711', '1'),
(234, 'سه گلوگاه کارآفرینی در ایران (95/08/27)', 'http://donya-e-eqtesad.com/news/1079952', '1'),
(235, 'ارز آورترین صنایع صادراتی (95/08/29)', 'http://donya-e-eqtesad.com/news/1080142', '1'),
(236, 'نقشه صنعتی اشتغال در نیمه اول (95/09/01)', 'http://donya-e-eqtesad.com/news/1080240', '1'),
(237, 'مشاوران به دنبال روش‌های نوین معامله (95/09/02)', 'http://jahanesanat.ir/?newsid=71520', '1'),
(238, 'سرمایه‌ گذاری صنعتی ۲ برابر شد (95/09/03)', 'http://jahanesanat.ir/?newsid=71598', '1'),
(239, '6 اثر اقتصاد زیرزمینی (95/09/03)', 'http://donya-e-eqtesad.com/news/1080607', '1'),
(240, 'اتاق کنترل مسکن 20 کشور(95/09/04)', 'http://donya-e-eqtesad.com/news/1080788', '1'),
(241, 'شناسنامه اقتصادی طرح‌های صنعتی (95/09/06)', 'http://donya-e-eqtesad.com/news/1080929', '1'),
(242, 'چرخش معاملات ملک با قیمت ثابت (95/09/06)', 'http://donya-e-eqtesad.com/news/1080917', '1'),
(244, 'هفت‌ اصل مدیریت تورم (95/09/07)', 'http://donya-e-eqtesad.com/news/1081144', '1'),
(245, 'سیاست آتی دولت نوسازی واحدهای صنعتی (95/09/13)', 'http://jahanesanat.ir/?newsid=72196', '1'),
(246, 'زمان مناسب خرید مسکن (95/09/13)', 'http://donya-e-eqtesad.com/news/1081474', '1'),
(247, 'راهبرد اشتغالزایی نیازمند بازنگری است. (95/09/14)', 'http://jahanesanat.ir/?newsid=72365', '1'),
(248, 'سرعت‌گیر گردش سرمایه‌های ساختمانی (95/09/15)', 'http://donya-e-eqtesad.com/news/1081837', '1'),
(249, 'الگوی شرقی رونق کسب‌ وکار (95/09/16)', 'http://donya-e-eqtesad.com/news/1081993', '1'),
(250, 'ریزش پاییزی اوراق مسکن (95/09/16)', 'http://donya-e-eqtesad.com/news/1081978', '1'),
(251, 'ضربه‌ خوردن صنعت از نوسانات نرخ ارز (95/09/17)', 'http://jahanesanat.ir/?newsid=72645', '1'),
(252, 'آینده صنایع جهان در سال 2017 (95/09/18)', 'http://donya-e-eqtesad.com/news/1082341', '1'),
(253, 'سکته پاییزه سرمایه‌گذاری صنعتی (95/09/20)', 'http://donya-e-eqtesad.com/news/1082508', '1'),
(254, 'تاثیر حذف صفر بر بازارهای مالی (95/09/21)', 'http://donya-e-eqtesad.com/news/1082611', '1'),
(256, 'راه و بیراهه مهار تورم (95/09/22)', 'http://donya-e-eqtesad.com/news/1082862', '1'),
(257, 'اقتصاد برنده شد، ایجاد 8 هزار شغل در ایران (95/09/23)', 'http://jahanesanat.ir/?newsid=73240', '1'),
(258, 'دو اهرم جذب سرمایه (95/09/24)', 'http://donya-e-eqtesad.com/news/1083148', '1'),
(259, 'مسیر نجات کسب‌ و کارهای ورشکسته (95/09/25)', 'http://donya-e-eqtesad.com/news/1083318', '1'),
(260, 'خطر افزایش قیمت مسکن (95/09/25)', 'http://jahanesanat.ir/?newsid=73454', '1'),
(261, 'عطش وام در تولید (95/09/28)', 'http://donya-e-eqtesad.com/news/1083449', '1'),
(262, 'تجارت ایران زیر ذره‌بین بخش‌خصوصی (95/09/29)', 'http://donya-e-eqtesad.com/news/1083637', '1'),
(263, 'نمره صنعت در چهار اپیزود (95/09/30)', 'http://donya-e-eqtesad.com/news/1083842', '1'),
(264, 'گران شدن اشتغال‌زایی صنعتی (95/10/1)', 'http://donya-e-eqtesad.com/news/1083939', '1'),
(265, 'بازار مسکن در خواب  زمستانی (95/10/02)', 'http://jahanesanat.ir/?newsid=74049', '1'),
(266, 'پنج مزاحم جهانی‌ سازی تولید (95/10/02)', 'http://donya-e-eqtesad.com/news/1084084', '1'),
(267, 'خیز صنعت هوایی از دو باند (95/10/04)', 'http://donya-e-eqtesad.com/news/1084262', '1'),
(268, 'انفعال در کمین ساخت و ساز (95/10/05)', 'http://jahanesanat.ir/?newsid=74288', '1'),
(269, 'تشخیص واقعیت در فضای مجازی (95/10/05)', 'http://jahanesanat.ir/?newsid=74284', '1'),
(270, 'خلأ کارگردانی  در بازار مسکن (95/10/06)', 'http://donya-e-eqtesad.com/news/1084536', '1'),
(271, 'معرفی مقصر عقب ماندگی در توسعه معادن (95/10/07)', 'http://donya-e-eqtesad.com/news/1084722', '1'),
(272, 'زمان مناسب برای خریدخانه (95/10/07)', 'http://jahanesanat.ir/?newsid=74526', '1'),
(273, 'موانع رونق پیش‌ فروش مسکن (95/10/08)', 'http://donya-e-eqtesad.com/news/1084834', '1'),
(274, 'چهار چالش صنعت استراتژیک (95/10/09)', 'http://donya-e-eqtesad.com/news/1085046', '1'),
(275, 'رونق تولید در ثلث دوم (95/10/11)', 'http://donya-e-eqtesad.com/news/1085184', '1'),
(276, 'کارد به استخوان تولید (95/10/12)', 'http://jahanesanat.ir/?newsid=74960', '1'),
(277, 'زور دلار به رکود مسکن نمی‌رسد (95/10/13)', 'http://jahanesanat.ir/?newsid=75076', '1'),
(278, 'تضمین ارزی به تجار (95/10/13)', 'http://donya-e-eqtesad.com/news/1085523', '1'),
(279, 'معرفی پنج کانال پولساز (95/10/14)', 'http://donya-e-eqtesad.com/news/1085630', '1'),
(280, 'انجمن «اقتصاد مسکن» آمد (95/10/15)', 'http://donya-e-eqtesad.com/news/1085863', '1'),
(281, 'چشم انداز روشن بازار کالا در 2017 (95/10/16)', 'http://donya-e-eqtesad.com/news/1085922', '1'),
(282, 'رمز رشد معاملات در بازارمسکن (95/10/18)', 'http://donya-e-eqtesad.com/news/1086105', '1'),
(283, 'تغییر ذائقه سرمایه‌گذاری در صنعت (95/10/19)', 'http://donya-e-eqtesad.com/news/1086231', '1'),
(284, 'ایران در سوگ هاشمی رفسنجانی (95/10/20)', 'http://donya-e-eqtesad.com/news/1086442', '1'),
(285, 'ویترین صنعتی تجارت ایران (95/10/22)', 'http://donya-e-eqtesad.com/news/1086513', '1'),
(286, 'عوامل ورشکستگی کارگاه‌های کوچک (95/10/23)', 'http://donya-e-eqtesad.com/news/1086694', '1'),
(287, 'برنامه ساماندهی صنایع خودجوش (95/10/25)', 'http://donya-e-eqtesad.com/news/1086827', '1'),
(288, 'ارزان شدن مسکن به معنی کاهش تولید و اشتغال است (95/10/25)', 'http://jahanesanat.ir/?newsid=76130', '1'),
(289, 'مسکن ۴ سال قفل شد (95/10/26)', 'http://jahanesanat.ir/?newsid=76291', '1'),
(290, 'مدل چین و برزیل در جذب سرمایه (95/10/26)', 'http://donya-e-eqtesad.com/news/1086968', '1'),
(291, 'روند کاهشی خرید و فروش مسکن در کشور ادامه دارد (95/10/27)', 'http://jahanesanat.ir/?newsid=76389', '1'),
(292, 'کانال جدید ارزی برای تولید (95/10/27)', 'http://donya-e-eqtesad.com/news/1087175', '1'),
(293, 'سه اصل جذب پول در معادن (95/10/28)', 'http://donya-e-eqtesad.com/news/1087312', '1'),
(294, 'هزینه‌های برج‌سازی برای تهران (95/10/29)', 'http://donya-e-eqtesad.com/news/1087540', '1'),
(295, 'نتایج برجام از لنز صنعت (95/10/30)', 'http://donya-e-eqtesad.com/news/1087659', '1'),
(296, 'فاجعه «پلاسکو» (95/11/02)', 'http://donya-e-eqtesad.com/news/1087846', '1'),
(297, 'بحران فزاینده در بازار مسکن (95/11/03)', 'http://jahanesanat.ir/?newsid=76950', '1'),
(298, 'تجارت خارجی از 70 میلیارد دلار گذشت (95/11/04)', 'http://donya-e-eqtesad.com/news/1088153', '1'),
(299, 'خیز غیر تورمی معاملات مسکن (95/11/05)', 'http://donya-e-eqtesad.com/news/1088324', '1'),
(300, 'گران‌ترین بازارهای مسکن جهان (95/11/06)', 'http://donya-e-eqtesad.com/news/1088491', '1'),
(301, 'پیشنهاد جدید در بازار مسکن (95/11/07)', 'http://donya-e-eqtesad.com/news/1088675', '1'),
(302, 'صنعت در سربالایی (95/11/09)', 'http://jahanesanat.ir/?newsid=77506', '1'),
(303, 'چهار باند جذب سرمایه (95/11/10)', 'http://donya-e-eqtesad.com/news/1088965', '1'),
(304, 'کانون رشد معاملات مسکن (95/11/11)', 'http://donya-e-eqtesad.com/news/1089148', '1'),
(305, 'محدوده پرترافیک جذب سرمایه (95/11/12)', 'http://donya-e-eqtesad.com/news/1089349', '1'),
(306, 'اولین‌ هایی که در زنجیره معدن به بار نشست (95/11/13)', 'http://jahanesanat.ir/?newsid=77972', '1'),
(307, 'عوامل نوسان تولید صنعتی (95/11/14)', 'http://donya-e-eqtesad.com/news/1089652', '1'),
(308, 'صنایع برتر در سرمایه‌پذیری (95/11/16)', 'http://donya-e-eqtesad.com/news/1089825', '1'),
(309, 'دو تهدید رشد صنعتی ایران (95/11/17)', 'http://donya-e-eqtesad.com/news/1089934', '1'),
(310, 'هفت پیشنهاد برای رقابتی کردن صنایع (95/11/18)', 'http://donya-e-eqtesad.com/news/1090089', '1'),
(311, '160سال پس‌انداز برای خانه 60 متری (95/11/19)', 'http://jahanesanat.ir/?newsid=78583', '1'),
(312, 'حکم «پایان‌کار» بسازو‌بفروش‌ها (95/11/20)', 'http://donya-e-eqtesad.com/news/1090430', '1'),
(313, 'غول‌های معدنی در جهان (95/11/21)', 'http://donya-e-eqtesad.com/news/1090603', '1'),
(314, 'رفع بیکاری راهبرد جامع می‌خواهد (95/11/23)', 'http://jahanesanat.ir/?newsid=78917', '1'),
(315, 'مسیر صعودی تجارت صنعتی (95/11/23)', 'http://donya-e-eqtesad.com/news/1090680', '1'),
(316, 'تثبیت جایگاه طلای سرخ ایران در رتبه نخست دنیا (95/11/25)', 'http://donya-e-eqtesad.com/news/1090960', '1'),
(317, '4 عامل عدم اطمینان در بازارها (95/11/26)', 'http://donya-e-eqtesad.com/news/1091124', '1'),
(318, 'کمبود منابع، افزایش موانع (95/11/27)', 'http://jahanesanat.ir/?newsid=79404', '1'),
(319, 'نسخه مدیریت بحران برای ایمن‌سازی شهری (95/11/28)', 'http://donya-e-eqtesad.com/news/1091484', '1'),
(320, 'نمای سه‌بعدی از مسکن 96 (95/11/30)', 'http://donya-e-eqtesad.com/news/1091652', '1'),
(321, 'غربالگری نیمه‌تمام‌های صنعتی (95/12/01)', 'http://donya-e-eqtesad.com/news/1091822', '1'),
(322, 'دو مسیر پویایی کسب‌وکار‌ ایران (95/12/02)', 'http://donya-e-eqtesad.com/news/1091987', '1'),
(323, 'شهر زیرزمینی در مرکز پایتخت (95/12/03)', 'http://donya-e-eqtesad.com/news/1092127', '1'),
(324, 'تقابل دو نیرو در بازار مسکن (95/12/04)', 'http://donya-e-eqtesad.com/news/1092301', '1'),
(325, 'بسته کارآفرینان برای تجارت (95/12/05)', 'http://donya-e-eqtesad.com/news/1092450', '1'),
(326, 'مسیریابی ارز در سال آینده (95/12/07)', 'http://donya-e-eqtesad.com/news/1092602', '1'),
(327, 'زوج جدا نشدنی صنعت پتروشیمی (95/12/08)', 'http://donya-e-eqtesad.com/news/1092752', '1'),
(328, 'دو پیام قیمتی بازار مسکن95 (95/12/09)', 'http://donya-e-eqtesad.com/news/1092857', '1'),
(329, 'لیدرهای انقلاب صنعتی چهارم (95/12/10)', 'http://donya-e-eqtesad.com/news/1093063', '1'),
(330, 'جذب ۸ میلیارد دلار سرمایه‌گذاری خارجی (95/12/11)', 'http://donya-e-eqtesad.com/news/1093236', '1'),
(331, 'مقصران کسب‌وکار نامساعد (95/12/14)', 'http://donya-e-eqtesad.com/news/1093382', '1'),
(332, 'تعیین مزد96 کارگران کلید خورد (95/12/15)', 'http://jahanesanat.ir/?newsid=80947', '1'),
(333, 'کاهش 3 درصدی قیمت مسکن در بهمن 95 (95/12/15)', 'http://jahanesanat.ir/?newsid=80964', '1'),
(334, 'کانون تقاضا در بازار مسکن 96 (95/12/16)', 'http://donya-e-eqtesad.com/news/1093686', '1'),
(335, '10 توصیه برای رقابت صنعتی (95/12/16)', 'http://donya-e-eqtesad.com/news/1093637', '1'),
(336, 'علائم بهبودی در اقتصاد ایران (95/12/17)', 'http://donya-e-eqtesad.com/news/1093853', '1'),
(337, '130هزار نفر، متقاضی ورود به حرفه مهندسی (95/12/18)', 'http://jahanesanat.ir/?newsid=81305', '1'),
(338, 'زیرساخت‌ها اصلاح شود(96/01/15)', 'http://jahanesanat.ir/?newsid=82518', '1'),
(339, 'چهار محرک رونق تولید (96/01/16)', 'http://donya-e-eqtesad.com/news/1095825', '1'),
(340, 'خروج ساخت‌وساز از کما (96/01/17)', 'http://donya-e-eqtesad.com/news/1096002', '1'),
(341, 'ایجاد 304 هزار شغل صنعتی (96/01/19)', 'http://donya-e-eqtesad.com/news/1096099', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_payments`
--

CREATE TABLE IF NOT EXISTS `fx_payments` (
  `p_id` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `payer_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `payment_method` varchar(64) CHARACTER SET latin1 NOT NULL,
  `amount` float NOT NULL,
  `trans_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `month_paid` varchar(32) CHARACTER SET latin1 NOT NULL,
  `year_paid` varchar(32) CHARACTER SET latin1 NOT NULL,
  `inv_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_payment_methods`
--

CREATE TABLE IF NOT EXISTS `fx_payment_methods` (
  `method_id` int(11) NOT NULL,
  `method_name` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT 'Paypal'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_payment_methods`
--

INSERT INTO `fx_payment_methods` (`method_id`, `method_name`) VALUES
(1, 'Paypal'),
(2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `fx_projects`
--

CREATE TABLE IF NOT EXISTS `fx_projects` (
  `project_id` int(11) NOT NULL,
  `project_code` varchar(32) CHARACTER SET latin1 NOT NULL,
  `project_title` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Project Title',
  `client` int(11) NOT NULL,
  `start_date` varchar(32) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `fixed_rate` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `hourly_rate` float NOT NULL,
  `fixed_price` float NOT NULL,
  `progress` int(11) NOT NULL,
  `notes` text CHARACTER SET latin1 NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `status` enum('On Hold','Active','Done') CHARACTER SET latin1 NOT NULL DEFAULT 'Active',
  `timer` enum('On','Off') CHARACTER SET latin1 NOT NULL DEFAULT 'Off',
  `timer_start` int(11) NOT NULL,
  `time_logged` int(11) NOT NULL,
  `proj_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `auto_progress` enum('TRUE','FALSE') CHARACTER SET latin1 NOT NULL DEFAULT 'FALSE',
  `estimate_hours` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_project_timer`
--

CREATE TABLE IF NOT EXISTS `fx_project_timer` (
  `timer_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `start_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `end_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `date_timed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_roles`
--

CREATE TABLE IF NOT EXISTS `fx_roles` (
  `r_id` int(11) NOT NULL,
  `role` varchar(64) CHARACTER SET latin1 NOT NULL,
  `default` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_roles`
--

INSERT INTO `fx_roles` (`r_id`, `role`, `default`) VALUES
(1, 'admin', 1),
(2, 'client', 2),
(3, 'collaborator', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fx_sabt`
--

CREATE TABLE IF NOT EXISTS `fx_sabt` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `image1` text COLLATE utf8_persian_ci NOT NULL,
  `image2` text COLLATE utf8_persian_ci NOT NULL,
  `image3` text COLLATE utf8_persian_ci NOT NULL,
  `image4` text COLLATE utf8_persian_ci NOT NULL,
  `date2` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_sabt`
--

INSERT INTO `fx_sabt` (`id`, `name`, `description`, `url`, `image1`, `image2`, `image3`, `image4`, `date2`, `saved_by`) VALUES
(2, 'دوره آموزشی آشنایی با قوانین مالیاتی', '<p>دوره آموزشی آشنایی با قوانین مالیاتی</p>\n<p>هدف: آگاهی از وظایف مالیاتی و اثرات و تبعات آن و همچنین شناخت اصلاحات جدید قوانین مالیات</p>\n<p>مدرس: جناب دکتر بابایی</p>\n<p>21 و 28 بهمن ماه 1395</p>\n<p>اطلاعات بیشتر: 37281281</p>', 'tax', 'http://www.ssd-cg.com/ssd/file/WorkShops/maliat-bahman95/ککک (2)_001.jpg', '', '', '', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_saved_tasks`
--

CREATE TABLE IF NOT EXISTS `fx_saved_tasks` (
  `template_id` int(11) NOT NULL,
  `task_name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `task_desc` varchar(255) CHARACTER SET latin1 NOT NULL,
  `visible` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `estimate_hours` float NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `saved_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_saved_tasks`
--

INSERT INTO `fx_saved_tasks` (`template_id`, `task_name`, `task_desc`, `visible`, `estimate_hours`, `added`, `saved_by`) VALUES
(1, 'df', 'Description', 'Yes', 3, '2015-02-18 11:50:37', 1),
(2, 'erf', 'Descriptionsdf', 'Yes', 0, '2015-02-21 09:16:35', 1),
(3, 'dfdf', 'Descriptiondfdf', 'Yes', 0, '2015-02-21 09:16:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fx_service`
--

CREATE TABLE IF NOT EXISTS `fx_service` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `viwe` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_service`
--

INSERT INTO `fx_service` (`id`, `name`, `description`, `image`, `file`, `url`, `saved_by`, `viwe`) VALUES
(1, 'ارزیابی طرح ها', '<p>در این بخش اطلاعات مربوط به ارزیابی طرح ها ارائه میگردد.</p>', 'http://www.ssd-cg.com/ssd/file/کارآفرینی/business-plan-with-glasses-and-pen.jpg', '', 'Plans-evaluation', '1', '25'),
(2, 'راه اندازی و بهبود کسب و کار', '<p>در این بخش اطلاعات مربوط به ابزارهای مدیریتی ارائه میگردد.</p>', '', '', 'Set-up-Improve-Business', '1', '26'),
(3, 'سرمایه گزاری و تامین مالی', '<p>در این بخش اطلاعات مربوط به سرمایه گزاری ارائه میگردد.</p>', '', '', 'Investment-Finaning', '1', '22'),
(4, 'رشد و توسعه کسب و کار', '<p>توسعه&zwnj;بخشیدن یا رشد دادن کسب&zwnj;و&zwnj;کار، منافع و مزایای آشکاری دارد. فرصت برای تنوع&zwnj;بخشی، مبارزه در رقابت کاری، جا انداختن محصولات و خدمات جدید، و نیز مهیاکردن فرصت&zwnj;هایی برای ترقی پرسنل، همگی جذاب هستند و می&zwnj;توانند به درک اهداف و رویاهای&zwnj;تان برای کسب و کار کمک کنند. هرچند قبل از آنکه برای رشد و گسترش نقشه بکشید، مهم است که به چند سوال کلیدی پاسخ دهید؛ &laquo;چقدرتعیین&zwnj;کننده است که پیش از توسعه&zwnj;بخشی کسب و کارتان، ازهرحیث آماده شوید؟ رشد دادن کسب&zwnj;و&zwnj;کارتان هم کار و هم برنامه&zwnj;ریزی بسیار می&zwnj;برد. باید از خود بپرسید؛ لازم است چه چیزهایی را آماده کنم؟&raquo; گروه مشاوران SSD در صدد است در راستای پاسخگویی به این پرسش&zwnj;ها، شما را در مهیا شدن جهت رشد کسب و کارتان بصورت مطمئن و پربازده، یاری رساند.</p>', 'http://www.ssd-cg.com/ssd/file/کارآفرینی/business-development-resized-600.png', '', 'Business-Development', '1', '42');

-- --------------------------------------------------------

--
-- Table structure for table `fx_simt`
--

CREATE TABLE IF NOT EXISTS `fx_simt` (
  `id` int(11) NOT NULL,
  `ssd` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_simt`
--

INSERT INTO `fx_simt` (`id`, `ssd`, `saved_by`) VALUES
(4, '<p dir="rtl" style="text-align: justify;">مزایای شما از شرکت در دوره های آموزشی:</p>\n<ul dir="rtl" style="text-align: justify;">\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; رفع نیاز های آموزشی در جهت بهبود مستمر.</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; به روز رسانی در رابطه با آخرین گرایش ها و پیشرفت ها.</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تبادل اطلاعات و تجارب با&nbsp; کارشناسان صنعت.</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; اجتناب از اشتباه در خرید نرم افزار، تجهیز، قطعه و ...</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ارتباط با شبکه جدیدی از اطلاعات تماس متخصصان.</li>\n</ul>\n<p dir="rtl" style="text-align: justify;">&nbsp;</p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_slider`
--

CREATE TABLE IF NOT EXISTS `fx_slider` (
  `id` int(11) NOT NULL,
  `slider` text COLLATE utf8_persian_ci NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  `link` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_slider`
--

INSERT INTO `fx_slider` (`id`, `slider`, `title`, `saved_by`, `link`) VALUES
(12, 'http://www.ssd-cg.com/ssd/file/slider/6.jpg', 'SSD گروه مشاوران', 1, ''),
(15, 'http://www.ssd-cg.com/ssd/file/slider/1_1.jpg', 'SSD گروه مشاوران', 1, ''),
(21, 'http://www.ssd-cg.com/ssd/file/slider/عیدjpg.jpg', 'گروه مشاوران SSD', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `fx_ssmm`
--

CREATE TABLE IF NOT EXISTS `fx_ssmm` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(12) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_ssmm`
--

INSERT INTO `fx_ssmm` (`id`, `description`, `saved_by`) VALUES
(1, '<p dir="rtl" style="text-align: justify;">برای موفقیت وتقویت شرکت شما در بازار رقابتی حال حاضر، در کنار شما هستیم تا تغییرات موفقیت آمیز سریعی را در محیط شرکت خود شاهد باشید. ما&nbsp; به طور مستقیم و موثر&nbsp; و با تیم مشاورین مجرب خود در جهت ارزیابی نیازها و کشف منابع لازم به منظور تحقق نیاز با شما همکاری می کنیم.گروه مشاوران ما با نیت تعالی سازمان شما در زمینه های</p>\n<ul dir="rtl" style="text-align: justify;">\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;مدیریتی: عارضه یابی ودرمان عارضه ها،جذب وتوانمندسازی پرسنل،افزایش بهره وری سازمان ، تدوین استراتژی های بهبود و توسعه سازمان وهمچنین مدیریت برند.</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; مالی: درک روشن از وضعیت کنونی،حفظ دارایی ها ، مدیریت ریسک برای بهبود مستمر درآمدوافزایش سرمایه.</li>\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; فنی: دستیابی به سطح بالاتری از عملکرد، حذف فعالیت های بدون ارزش افزوده،ارائه راهکارهایی در راستای کاهش هزینه های تولید از قبیل تعمیرات ونگهداری سسیتم ها، پایش وضعیت ،خدمات هیدرولیک وپنومانیک، برق و شبکه.</li>\n</ul>\n<p dir="rtl" style="text-align: justify;">&nbsp;همراهی مطمئن در کنار شما می باشد.&nbsp;</p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_ssmw`
--

CREATE TABLE IF NOT EXISTS `fx_ssmw` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_ssmw`
--

INSERT INTO `fx_ssmw` (`id`, `description`, `saved_by`) VALUES
(1, '<p dir="rtl" style="text-align: justify;">گروه مشاوران ما با دید بهبود وترقی وضعیت کسب وکار کشورمان ایران، با راهنمایی وجهت دهی ایده وسرمایه در چهار چوب ارائه طرح های کسب وکار نوآورانه گام بر می دارد. انواع تامین مالی طرح ها با توجه به ارائه مدل های متنوع کسب وکار (تولیدی،خدماتی وسرمایه گذاری) و ارائه درک روشنی از ریسک سرمایه گذاری و تاثیرات آن روی تصمیمات سرمایه گذاری شما در آینده خدمتی ناچیز از گروه مشاورین ماست.</p>\n<p dir="rtl" style="text-align: justify;">ارائه مشاوره کامل وکاربردی در حوزه های بازرگانی ،حقوقی،مالیاتی، بیمه، وطراحی و بازاریابی وفروش بخشی از خدمات کلینیک کسب و کار SSD می باشد. برگزاری جلسات همفکری با کانون کارآفرینی، جوامع مهندسین، اتاق تعاون و خانه صنعت ، همچنین همراهی شرکت شهرک های صنعتی استان یزد داشته های ما را فزونی می بخشد.</p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_tasks`
--

CREATE TABLE IF NOT EXISTS `fx_tasks` (
  `t_id` int(11) NOT NULL,
  `task_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `project` int(11) NOT NULL,
  `assigned_to` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `visible` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `task_progress` int(11) NOT NULL DEFAULT '0',
  `timer_status` enum('On','Off') CHARACTER SET latin1 NOT NULL DEFAULT 'Off',
  `start_time` int(11) NOT NULL,
  `estimated_hours` int(11) NOT NULL,
  `logged_time` int(11) NOT NULL DEFAULT '0',
  `auto_progress` enum('TRUE','FALSE') CHARACTER SET latin1 NOT NULL DEFAULT 'FALSE',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_tasks_timer`
--

CREATE TABLE IF NOT EXISTS `fx_tasks_timer` (
  `timer_id` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `start_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `end_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `date_timed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_title`
--

CREATE TABLE IF NOT EXISTS `fx_title` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `title_sub` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `fx_title`
--

INSERT INTO `fx_title` (`id`, `title`, `title_sub`, `saved_by`) VALUES
(1, '1', 'کارآفرینی', 1),
(2, '1', 'مالی', 1),
(3, '1', 'فنی', 1),
(4, '1', 'مدیریتی', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fx_title2`
--

CREATE TABLE IF NOT EXISTS `fx_title2` (
  `id` int(11) NOT NULL,
  `sub_title` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_persian_ci NOT NULL,
  `saved_by` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `fx_title2`
--

INSERT INTO `fx_title2` (`id`, `sub_title`, `name`, `saved_by`) VALUES
(1, 4, 'توسعه منابع انساني', '1'),
(2, 4, 'توسعه برند', '1'),
(3, 4, 'توسعه رهبری', '1'),
(4, 4, 'توسعه ابزارهای مدیریتی', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fx_un_sessions`
--

CREATE TABLE IF NOT EXISTS `fx_un_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fx_un_sessions`
--

INSERT INTO `fx_un_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('9a75474673ed64cb1f6e1eda35a4aab7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', 1429170481, 'a:8:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:8:"username";s:5:"admin";s:7:"role_id";s:1:"1";s:6:"status";s:1:"1";s:14:"requested_page";s:58:"http://localhost/FreelancerOffice-v1.5.6/settings/database";s:13:"previous_page";s:49:"http://localhost/FreelancerOffice-v1.5.6/settings";s:4:"lang";s:5:"czech";}');

-- --------------------------------------------------------

--
-- Table structure for table `fx_users`
--

CREATE TABLE IF NOT EXISTS `fx_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fx_users`
--

INSERT INTO `fx_users` (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'ssdadmin', '$P$BG0UyYkDFv4MgN.48F8fgUlInRX5qM/', 'wm@gitbench.com', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '94.183.233.226', '2017-04-08 04:50:06', '2014-10-20 09:17:58', '2017-04-08 04:50:06'),
(2, 'unique', '$P$B.bPfiSbt70bJfYryCvmXeDmSwOVVg/', 'uniqueweb.ir@gmail.com', 2, 1, 0, NULL, '9c8ed2b58cf7d47b303f0a6c27c33445', '2015-04-16 04:54:11', NULL, NULL, '127.0.0.1', '2015-04-15 11:34:28', '2015-02-28 11:23:03', '2015-04-16 04:54:11'),
(3, 'unique.rayaneh@yahoo', '$P$Bo4c2jyJdEK.gl2iSc8DQY.RgQr8TV0', 'uniquewebr.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-15 03:34:15', '2015-04-15 03:34:15'),
(4, 'rezaali', '$P$BGl79oPBVOI4cPYdM5tCNUgWxHSqTO0', 'uniqueweddb.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-16 03:49:56', '2015-04-16 03:49:56'),
(5, 'uuuuuuuuu', '$P$Behk8VsQkrDmH5Qn6AiVqfoOhT.wls/', 'uniquewebjjjjr.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-16 04:17:25', '2015-04-16 04:17:25'),
(6, 'eeeuuuuuuuuu', '$P$Bo0tXYJ89x5sAkfbAO/8s2ghhM0O8N/', 'uniqueweffbjjjjr.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-16 04:20:03', '2015-04-16 04:20:03'),
(7, 'fffffff', '$P$Bn.eTgO9amcuxtXGJT2OY/VPtvf6zp/', 'uniqueweb.ir@gmgail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2015-04-16 04:54:27', '2015-04-16 04:45:36', '2015-04-16 04:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `fx_user_autologin`
--

CREATE TABLE IF NOT EXISTS `fx_user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fx_account_details`
--
ALTER TABLE `fx_account_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_activities`
--
ALTER TABLE `fx_activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `fx_archiveg`
--
ALTER TABLE `fx_archiveg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_archiveo`
--
ALTER TABLE `fx_archiveo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_assign_projects`
--
ALTER TABLE `fx_assign_projects`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `fx_assign_tasks`
--
ALTER TABLE `fx_assign_tasks`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `fx_blog`
--
ALTER TABLE `fx_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_bugs`
--
ALTER TABLE `fx_bugs`
  ADD PRIMARY KEY (`bug_id`),
  ADD UNIQUE KEY `issue_ref` (`issue_ref`);

--
-- Indexes for table `fx_bug_comments`
--
ALTER TABLE `fx_bug_comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `fx_bug_files`
--
ALTER TABLE `fx_bug_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fx_captcha`
--
ALTER TABLE `fx_captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `fx_catalog`
--
ALTER TABLE `fx_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_clinic`
--
ALTER TABLE `fx_clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_comments`
--
ALTER TABLE `fx_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `fx_comment_replies`
--
ALTER TABLE `fx_comment_replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `fx_companies`
--
ALTER TABLE `fx_companies`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `fx_config`
--
ALTER TABLE `fx_config`
  ADD PRIMARY KEY (`config_key`);

--
-- Indexes for table `fx_contact`
--
ALTER TABLE `fx_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_contacts`
--
ALTER TABLE `fx_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_countries`
--
ALTER TABLE `fx_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_customer`
--
ALTER TABLE `fx_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_dan`
--
ALTER TABLE `fx_dan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_descr`
--
ALTER TABLE `fx_descr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_email_templates`
--
ALTER TABLE `fx_email_templates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `fx_estimates`
--
ALTER TABLE `fx_estimates`
  ADD PRIMARY KEY (`est_id`),
  ADD UNIQUE KEY `reference_no` (`reference_no`);

--
-- Indexes for table `fx_estimate_items`
--
ALTER TABLE `fx_estimate_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_events`
--
ALTER TABLE `fx_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_fani`
--
ALTER TABLE `fx_fani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_files`
--
ALTER TABLE `fx_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fx_image_ip`
--
ALTER TABLE `fx_image_ip`
  ADD PRIMARY KEY (`id_ip`);

--
-- Indexes for table `fx_introduction`
--
ALTER TABLE `fx_introduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_invoices`
--
ALTER TABLE `fx_invoices`
  ADD PRIMARY KEY (`inv_id`),
  ADD UNIQUE KEY `reference_no` (`reference_no`);

--
-- Indexes for table `fx_ipn_log`
--
ALTER TABLE `fx_ipn_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_ipn_orders`
--
ALTER TABLE `fx_ipn_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueTransactionID` (`txn_id`);

--
-- Indexes for table `fx_ipn_order_items`
--
ALTER TABLE `fx_ipn_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `fx_items`
--
ALTER TABLE `fx_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_items_saved`
--
ALTER TABLE `fx_items_saved`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_learning`
--
ALTER TABLE `fx_learning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_login_attempts`
--
ALTER TABLE `fx_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_mali`
--
ALTER TABLE `fx_mali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_man`
--
ALTER TABLE `fx_man`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_messages`
--
ALTER TABLE `fx_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `fx_newsk`
--
ALTER TABLE `fx_newsk`
  ADD UNIQUE KEY `a` (`id`);

--
-- Indexes for table `fx_payments`
--
ALTER TABLE `fx_payments`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `fx_payment_methods`
--
ALTER TABLE `fx_payment_methods`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `fx_projects`
--
ALTER TABLE `fx_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `fx_project_timer`
--
ALTER TABLE `fx_project_timer`
  ADD PRIMARY KEY (`timer_id`);

--
-- Indexes for table `fx_roles`
--
ALTER TABLE `fx_roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `fx_sabt`
--
ALTER TABLE `fx_sabt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_saved_tasks`
--
ALTER TABLE `fx_saved_tasks`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `fx_service`
--
ALTER TABLE `fx_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_simt`
--
ALTER TABLE `fx_simt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_slider`
--
ALTER TABLE `fx_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_ssmm`
--
ALTER TABLE `fx_ssmm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_ssmw`
--
ALTER TABLE `fx_ssmw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_tasks`
--
ALTER TABLE `fx_tasks`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `fx_tasks_timer`
--
ALTER TABLE `fx_tasks_timer`
  ADD PRIMARY KEY (`timer_id`);

--
-- Indexes for table `fx_title`
--
ALTER TABLE `fx_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_title2`
--
ALTER TABLE `fx_title2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_un_sessions`
--
ALTER TABLE `fx_un_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `fx_users`
--
ALTER TABLE `fx_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `fx_user_autologin`
--
ALTER TABLE `fx_user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fx_account_details`
--
ALTER TABLE `fx_account_details`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fx_activities`
--
ALTER TABLE `fx_activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_archiveg`
--
ALTER TABLE `fx_archiveg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `fx_archiveo`
--
ALTER TABLE `fx_archiveo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `fx_assign_projects`
--
ALTER TABLE `fx_assign_projects`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_assign_tasks`
--
ALTER TABLE `fx_assign_tasks`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_blog`
--
ALTER TABLE `fx_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `fx_bugs`
--
ALTER TABLE `fx_bugs`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_bug_comments`
--
ALTER TABLE `fx_bug_comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_bug_files`
--
ALTER TABLE `fx_bug_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_captcha`
--
ALTER TABLE `fx_captcha`
  MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `fx_catalog`
--
ALTER TABLE `fx_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_clinic`
--
ALTER TABLE `fx_clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fx_comments`
--
ALTER TABLE `fx_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_comment_replies`
--
ALTER TABLE `fx_comment_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_companies`
--
ALTER TABLE `fx_companies`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_contact`
--
ALTER TABLE `fx_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_contacts`
--
ALTER TABLE `fx_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_countries`
--
ALTER TABLE `fx_countries`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `fx_customer`
--
ALTER TABLE `fx_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_dan`
--
ALTER TABLE `fx_dan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fx_descr`
--
ALTER TABLE `fx_descr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fx_email_templates`
--
ALTER TABLE `fx_email_templates`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `fx_estimates`
--
ALTER TABLE `fx_estimates`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_estimate_items`
--
ALTER TABLE `fx_estimate_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_events`
--
ALTER TABLE `fx_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_fani`
--
ALTER TABLE `fx_fani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_files`
--
ALTER TABLE `fx_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_image_ip`
--
ALTER TABLE `fx_image_ip`
  MODIFY `id_ip` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5055;
--
-- AUTO_INCREMENT for table `fx_introduction`
--
ALTER TABLE `fx_introduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fx_invoices`
--
ALTER TABLE `fx_invoices`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_log`
--
ALTER TABLE `fx_ipn_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_orders`
--
ALTER TABLE `fx_ipn_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_order_items`
--
ALTER TABLE `fx_ipn_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_items`
--
ALTER TABLE `fx_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_items_saved`
--
ALTER TABLE `fx_items_saved`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_learning`
--
ALTER TABLE `fx_learning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `fx_login_attempts`
--
ALTER TABLE `fx_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_mali`
--
ALTER TABLE `fx_mali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fx_man`
--
ALTER TABLE `fx_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fx_messages`
--
ALTER TABLE `fx_messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fx_newsk`
--
ALTER TABLE `fx_newsk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `fx_payments`
--
ALTER TABLE `fx_payments`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_payment_methods`
--
ALTER TABLE `fx_payment_methods`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_projects`
--
ALTER TABLE `fx_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_project_timer`
--
ALTER TABLE `fx_project_timer`
  MODIFY `timer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_roles`
--
ALTER TABLE `fx_roles`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fx_sabt`
--
ALTER TABLE `fx_sabt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_saved_tasks`
--
ALTER TABLE `fx_saved_tasks`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fx_service`
--
ALTER TABLE `fx_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fx_simt`
--
ALTER TABLE `fx_simt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fx_slider`
--
ALTER TABLE `fx_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `fx_ssmm`
--
ALTER TABLE `fx_ssmm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_ssmw`
--
ALTER TABLE `fx_ssmw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_tasks`
--
ALTER TABLE `fx_tasks`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_tasks_timer`
--
ALTER TABLE `fx_tasks_timer`
  MODIFY `timer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_title`
--
ALTER TABLE `fx_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fx_title2`
--
ALTER TABLE `fx_title2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fx_users`
--
ALTER TABLE `fx_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
