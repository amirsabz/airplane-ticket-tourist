-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 09:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourismdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `logo`, `slug`) VALUES
(1, 'هما', '1600999080_kisspng-flight-indonesia-airasia-airasia-japan-airline-tic-asia-5abad146966736.8321896415221927106161.jpg', 'هما'),
(2, 'هواپیمایی آسمان', '1600999020_kisspng-flight-indonesia-airasia-airasia-japan-airline-tic-asia-5abad146966736.8321896415221927106161.jpg', 'هواپیمایی-آسمان');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `name`, `slug`) VALUES
(1, 'شیراز', '	 شیراز'),
(2, 'تهران', 'تهران'),
(4, 'اصفهان', 'اصفهان'),
(5, 'اهواز', 'اهواز');

-- --------------------------------------------------------

--
-- Table structure for table `booked_flight`
--

CREATE TABLE `booked_flight` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booked_flight`
--

INSERT INTO `booked_flight` (`id`, `flight_id`, `name`, `address`, `contact`) VALUES
(3, 1, 'مشتری 1', 'شیراز', '09121234444'),
(4, 1, 'مشتری 2', 'شیراز', '09121231290'),
(5, 2, 'محمد محمدی', 'شیراز', '09121234500'),
(6, 2, 'ایمان رئیسی', 'شیراز', '09121234444'),
(7, 1, 'مشتری 3', 'شیراز', '09121237711'),
(8, 1, 'مشتری4', 'شیراز', '09121239876'),
(9, 1, 'مشتری5', 'شیراز', '09121268890'),
(10, 1, 'مشتری 6', 'شیراز', '09121233131'),
(11, 1, 'مشتری 7', 'شیراز', '09121234412'),
(12, 1, 'مشتری 8', 'شیراز', '09121237777'),
(13, 1, 'مشتری 9', 'شیراز', '09121236262'),
(16, 1, 'مشتری 11', 'شیراز', '09121236411'),
(17, 1, 'مشتری 12', 'شیراز', '09121232109'),
(18, 1, 'مشتری 13', 'شیراز', '09121237981'),
(19, 1, 'مشتری 15', 'شیراز', '09121237690'),
(20, 1, 'مشتری 16', 'شیراز', '09121213216'),
(22, 1, 'مریم علیزاده', 'ارومیه', '09141238090'),
(23, 5, 'مریم علیزاده', 'ارومیه', '09121234800');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) UNSIGNED NOT NULL,
  `province_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `name`) VALUES
(1, 1, 'تبريز'),
(2, 1, 'كندوان'),
(3, 1, 'بندر شرفخانه'),
(4, 1, 'مراغه'),
(5, 1, 'ميانه'),
(6, 1, 'شبستر'),
(7, 1, 'مرند'),
(8, 1, 'جلفا'),
(9, 1, 'سراب'),
(10, 1, 'هاديشهر'),
(11, 1, 'بناب'),
(12, 1, 'كليبر'),
(13, 1, 'تسوج'),
(14, 1, 'اهر'),
(15, 1, 'هريس'),
(16, 1, 'عجبشير'),
(17, 1, 'هشترود'),
(18, 1, 'ملكان'),
(19, 1, 'بستان آباد'),
(20, 1, 'ورزقان'),
(21, 1, 'اسكو'),
(22, 1, 'آذر شهر'),
(23, 1, 'قره آغاج'),
(24, 1, 'ممقان'),
(25, 1, 'صوفیان'),
(26, 1, 'ایلخچی'),
(27, 1, 'خسروشهر'),
(28, 1, 'باسمنج'),
(29, 1, 'سهند'),
(30, 2, 'اروميه'),
(31, 2, 'نقده'),
(32, 2, 'ماكو'),
(33, 2, 'تكاب'),
(34, 2, 'خوي'),
(35, 2, 'مهاباد'),
(36, 2, 'سر دشت'),
(37, 2, 'چالدران'),
(38, 2, 'بوكان'),
(39, 2, 'مياندوآب'),
(40, 2, 'سلماس'),
(41, 2, 'شاهين دژ'),
(42, 2, 'پيرانشهر'),
(43, 2, 'سيه چشمه'),
(44, 2, 'اشنويه'),
(45, 2, 'چایپاره'),
(46, 2, 'پلدشت'),
(47, 2, 'شوط'),
(48, 3, 'اردبيل'),
(49, 3, 'سرعين'),
(50, 3, 'بيله سوار'),
(51, 3, 'پارس آباد'),
(52, 3, 'خلخال'),
(53, 3, 'مشگين شهر'),
(54, 3, 'مغان'),
(55, 3, 'نمين'),
(56, 3, 'نير'),
(57, 3, 'كوثر'),
(58, 3, 'كيوي'),
(59, 3, 'گرمي'),
(60, 4, 'اصفهان'),
(61, 4, 'فريدن'),
(62, 4, 'فريدون شهر'),
(63, 4, 'فلاورجان'),
(64, 4, 'گلپايگان'),
(65, 4, 'دهاقان'),
(66, 4, 'نطنز'),
(67, 4, 'نايين'),
(68, 4, 'تيران'),
(69, 4, 'كاشان'),
(70, 4, 'فولاد شهر'),
(71, 4, 'اردستان'),
(72, 4, 'سميرم'),
(73, 4, 'درچه'),
(74, 4, 'کوهپایه'),
(75, 4, 'مباركه'),
(76, 4, 'شهرضا'),
(77, 4, 'خميني شهر'),
(78, 4, 'شاهين شهر'),
(79, 4, 'نجف آباد'),
(80, 4, 'دولت آباد'),
(81, 4, 'زرين شهر'),
(82, 4, 'آران و بيدگل'),
(83, 4, 'باغ بهادران'),
(84, 4, 'خوانسار'),
(85, 4, 'مهردشت'),
(86, 4, 'علويجه'),
(87, 4, 'عسگران'),
(88, 4, 'نهضت آباد'),
(89, 4, 'حاجي آباد'),
(90, 4, 'تودشک'),
(91, 4, 'ورزنه'),
(92, 6, 'ايلام'),
(93, 6, 'مهران'),
(94, 6, 'دهلران'),
(95, 6, 'آبدانان'),
(96, 6, 'شيروان چرداول'),
(97, 6, 'دره شهر'),
(98, 6, 'ايوان'),
(99, 6, 'سرابله'),
(100, 7, 'بوشهر'),
(101, 7, 'تنگستان'),
(102, 7, 'دشتستان'),
(103, 7, 'دير'),
(104, 7, 'ديلم'),
(105, 7, 'كنگان'),
(106, 7, 'گناوه'),
(107, 7, 'ريشهر'),
(108, 7, 'دشتي'),
(109, 7, 'خورموج'),
(110, 7, 'اهرم'),
(111, 7, 'برازجان'),
(112, 7, 'خارك'),
(113, 7, 'جم'),
(114, 7, 'کاکی'),
(115, 7, 'عسلویه'),
(116, 7, 'بردخون'),
(117, 8, 'تهران'),
(118, 8, 'ورامين'),
(119, 8, 'فيروزكوه'),
(120, 8, 'ري'),
(121, 8, 'دماوند'),
(122, 8, 'اسلامشهر'),
(123, 8, 'رودهن'),
(124, 8, 'لواسان'),
(125, 8, 'بومهن'),
(126, 8, 'تجريش'),
(127, 8, 'فشم'),
(128, 8, 'كهريزك'),
(129, 8, 'پاكدشت'),
(130, 8, 'چهاردانگه'),
(131, 8, 'شريف آباد'),
(132, 8, 'قرچك'),
(133, 8, 'باقرشهر'),
(134, 8, 'شهريار'),
(135, 8, 'رباط كريم'),
(136, 8, 'قدس'),
(137, 8, 'ملارد'),
(138, 9, 'شهركرد'),
(139, 9, 'فارسان'),
(140, 9, 'بروجن'),
(141, 9, 'چلگرد'),
(142, 9, 'اردل'),
(143, 9, 'لردگان'),
(144, 9, 'سامان'),
(145, 10, 'قائن'),
(146, 10, 'فردوس'),
(147, 10, 'بيرجند'),
(148, 10, 'نهبندان'),
(149, 10, 'سربيشه'),
(150, 10, 'طبس مسینا'),
(151, 10, 'قهستان'),
(152, 10, 'درمیان'),
(153, 11, 'مشهد'),
(154, 11, 'نيشابور'),
(155, 11, 'سبزوار'),
(156, 11, 'كاشمر'),
(157, 11, 'گناباد'),
(158, 11, 'طبس'),
(159, 11, 'تربت حيدريه'),
(160, 11, 'خواف'),
(161, 11, 'تربت جام'),
(162, 11, 'تايباد'),
(163, 11, 'قوچان'),
(164, 11, 'سرخس'),
(165, 11, 'بردسكن'),
(166, 11, 'فريمان'),
(167, 11, 'چناران'),
(168, 11, 'درگز'),
(169, 11, 'كلات'),
(170, 11, 'طرقبه'),
(171, 11, 'سر ولایت'),
(172, 12, 'بجنورد'),
(173, 12, 'اسفراين'),
(174, 12, 'جاجرم'),
(175, 12, 'شيروان'),
(176, 12, 'آشخانه'),
(177, 12, 'گرمه'),
(178, 12, 'ساروج'),
(179, 13, 'اهواز'),
(180, 13, 'ايرانشهر'),
(181, 13, 'شوش'),
(182, 13, 'آبادان'),
(183, 13, 'خرمشهر'),
(184, 13, 'مسجد سليمان'),
(185, 13, 'ايذه'),
(186, 13, 'شوشتر'),
(187, 13, 'انديمشك'),
(188, 13, 'سوسنگرد'),
(189, 13, 'هويزه'),
(190, 13, 'دزفول'),
(191, 13, 'شادگان'),
(192, 13, 'بندر ماهشهر'),
(193, 13, 'بندر امام خميني'),
(194, 13, 'اميديه'),
(195, 13, 'بهبهان'),
(196, 13, 'رامهرمز'),
(197, 13, 'باغ ملك'),
(198, 13, 'هنديجان'),
(199, 13, 'لالي'),
(200, 13, 'رامشیر'),
(201, 13, 'حمیدیه'),
(202, 13, 'دغاغله'),
(203, 13, 'ملاثانی'),
(204, 13, 'شادگان'),
(205, 13, 'ویسی'),
(206, 14, 'زنجان'),
(207, 14, 'ابهر'),
(208, 14, 'خدابنده'),
(209, 14, 'كارم'),
(210, 14, 'ماهنشان'),
(211, 14, 'خرمدره'),
(212, 14, 'ايجرود'),
(213, 14, 'زرين آباد'),
(214, 14, 'آب بر'),
(215, 14, 'قيدار'),
(216, 15, 'سمنان'),
(217, 15, 'شاهرود'),
(218, 15, 'گرمسار'),
(219, 15, 'ايوانكي'),
(220, 15, 'دامغان'),
(221, 15, 'بسطام'),
(222, 16, 'زاهدان'),
(223, 16, 'چابهار'),
(224, 16, 'خاش'),
(225, 16, 'سراوان'),
(226, 16, 'زابل'),
(227, 16, 'سرباز'),
(228, 16, 'نيكشهر'),
(229, 16, 'ايرانشهر'),
(230, 16, 'راسك'),
(231, 16, 'ميرجاوه'),
(232, 17, 'شيراز'),
(233, 17, 'اقليد'),
(234, 17, 'داراب'),
(235, 17, 'فسا'),
(236, 17, 'مرودشت'),
(237, 17, 'خرم بيد'),
(238, 17, 'آباده'),
(239, 17, 'كازرون'),
(240, 17, 'ممسني'),
(241, 17, 'سپيدان'),
(242, 17, 'لار'),
(243, 17, 'فيروز آباد'),
(244, 17, 'جهرم'),
(245, 17, 'ني ريز'),
(246, 17, 'استهبان'),
(247, 17, 'لامرد'),
(248, 17, 'مهر'),
(249, 17, 'حاجي آباد'),
(250, 17, 'نورآباد'),
(251, 17, 'اردكان'),
(252, 17, 'صفاشهر'),
(253, 17, 'ارسنجان'),
(254, 17, 'قيروكارزين'),
(255, 17, 'سوريان'),
(256, 17, 'فراشبند'),
(257, 17, 'سروستان'),
(258, 17, 'ارژن'),
(259, 17, 'گويم'),
(260, 17, 'داريون'),
(261, 17, 'زرقان'),
(262, 17, 'خان زنیان'),
(263, 17, 'کوار'),
(264, 17, 'ده بید'),
(265, 17, 'باب انار/خفر'),
(266, 17, 'بوانات'),
(267, 17, 'خرامه'),
(268, 17, 'خنج'),
(269, 17, 'سیاخ دارنگون'),
(270, 18, 'قزوين'),
(271, 18, 'تاكستان'),
(272, 18, 'آبيك'),
(273, 18, 'بوئين زهرا'),
(274, 19, 'قم'),
(275, 5, 'طالقان'),
(276, 5, 'نظرآباد'),
(277, 5, 'اشتهارد'),
(278, 5, 'هشتگرد'),
(279, 5, 'كن'),
(280, 5, 'آسارا'),
(281, 5, 'شهرک گلستان'),
(282, 5, 'اندیشه'),
(283, 5, 'كرج'),
(284, 5, 'نظر آباد'),
(285, 5, 'گوهردشت'),
(286, 5, 'ماهدشت'),
(287, 5, 'مشکین دشت'),
(288, 20, 'سنندج'),
(289, 20, 'ديواندره'),
(290, 20, 'بانه'),
(291, 20, 'بيجار'),
(292, 20, 'سقز'),
(293, 20, 'كامياران'),
(294, 20, 'قروه'),
(295, 20, 'مريوان'),
(296, 20, 'صلوات آباد'),
(297, 20, 'حسن آباد'),
(298, 21, 'كرمان'),
(299, 21, 'راور'),
(300, 21, 'بابك'),
(301, 21, 'انار'),
(302, 21, 'کوهبنان'),
(303, 21, 'رفسنجان'),
(304, 21, 'بافت'),
(305, 21, 'سيرجان'),
(306, 21, 'كهنوج'),
(307, 21, 'زرند'),
(308, 21, 'بم'),
(309, 21, 'جيرفت'),
(310, 21, 'بردسير'),
(311, 22, 'كرمانشاه'),
(312, 22, 'اسلام آباد غرب'),
(313, 22, 'سر پل ذهاب'),
(314, 22, 'كنگاور'),
(315, 22, 'سنقر'),
(316, 22, 'قصر شيرين'),
(317, 22, 'گيلان غرب'),
(318, 22, 'هرسين'),
(319, 22, 'صحنه'),
(320, 22, 'پاوه'),
(321, 22, 'جوانرود'),
(322, 22, 'شاهو'),
(323, 23, 'ياسوج'),
(324, 23, 'گچساران'),
(325, 23, 'دنا'),
(326, 23, 'دوگنبدان'),
(327, 23, 'سي سخت'),
(328, 23, 'دهدشت'),
(329, 23, 'ليكك'),
(330, 24, 'گرگان'),
(331, 24, 'آق قلا'),
(332, 24, 'گنبد كاووس'),
(333, 24, 'علي آباد كتول'),
(334, 24, 'مينو دشت'),
(335, 24, 'تركمن'),
(336, 24, 'كردكوي'),
(337, 24, 'بندر گز'),
(338, 24, 'كلاله'),
(339, 24, 'آزاد شهر'),
(340, 24, 'راميان'),
(341, 25, 'رشت'),
(342, 25, 'منجيل'),
(343, 25, 'لنگرود'),
(344, 25, 'رود سر'),
(345, 25, 'تالش'),
(346, 25, 'آستارا'),
(347, 25, 'ماسوله'),
(348, 25, 'آستانه اشرفيه'),
(349, 25, 'رودبار'),
(350, 25, 'فومن'),
(351, 25, 'صومعه سرا'),
(352, 25, 'بندرانزلي'),
(353, 25, 'كلاچاي'),
(354, 25, 'هشتپر'),
(355, 25, 'رضوان شهر'),
(356, 25, 'ماسال'),
(357, 25, 'شفت'),
(358, 25, 'سياهكل'),
(359, 25, 'املش'),
(360, 25, 'لاهیجان'),
(361, 25, 'خشک بيجار'),
(362, 25, 'خمام'),
(363, 25, 'لشت نشا'),
(364, 25, 'بندر کياشهر'),
(365, 26, 'خرم آباد'),
(366, 26, 'ماهشهر'),
(367, 26, 'دزفول'),
(368, 26, 'بروجرد'),
(369, 26, 'دورود'),
(370, 26, 'اليگودرز'),
(371, 26, 'ازنا'),
(372, 26, 'نور آباد'),
(373, 26, 'كوهدشت'),
(374, 26, 'الشتر'),
(375, 26, 'پلدختر'),
(376, 27, 'ساري'),
(377, 27, 'آمل'),
(378, 27, 'بابل'),
(379, 27, 'بابلسر'),
(380, 27, 'بهشهر'),
(381, 27, 'تنكابن'),
(382, 27, 'جويبار'),
(383, 27, 'چالوس'),
(384, 27, 'رامسر'),
(385, 27, 'سواد كوه'),
(386, 27, 'قائم شهر'),
(387, 27, 'نكا'),
(388, 27, 'نور'),
(389, 27, 'بلده'),
(390, 27, 'نوشهر'),
(391, 27, 'پل سفيد'),
(392, 27, 'محمود آباد'),
(393, 27, 'فريدون كنار'),
(394, 28, 'اراك'),
(395, 28, 'آشتيان'),
(396, 28, 'تفرش'),
(397, 28, 'خمين'),
(398, 28, 'دليجان'),
(399, 28, 'ساوه'),
(400, 28, 'سربند'),
(401, 28, 'محلات'),
(402, 28, 'شازند'),
(403, 29, 'بندرعباس'),
(404, 29, 'قشم'),
(405, 29, 'كيش'),
(406, 29, 'بندر لنگه'),
(407, 29, 'بستك'),
(408, 29, 'حاجي آباد'),
(409, 29, 'دهبارز'),
(410, 29, 'انگهران'),
(411, 29, 'ميناب'),
(412, 29, 'ابوموسي'),
(413, 29, 'بندر جاسك'),
(414, 29, 'تنب بزرگ'),
(415, 29, 'بندر خمیر'),
(416, 29, 'پارسیان'),
(417, 29, 'قشم'),
(418, 30, 'همدان'),
(419, 30, 'ملاير'),
(420, 30, 'تويسركان'),
(421, 30, 'نهاوند'),
(422, 30, 'كبودر اهنگ'),
(423, 30, 'رزن'),
(424, 30, 'اسدآباد'),
(425, 30, 'بهار'),
(426, 31, 'يزد'),
(427, 31, 'تفت'),
(428, 31, 'اردكان'),
(429, 31, 'ابركوه'),
(430, 31, 'ميبد'),
(431, 31, 'طبس'),
(432, 31, 'بافق'),
(433, 31, 'مهريز'),
(434, 31, 'اشكذر'),
(435, 31, 'هرات'),
(436, 31, 'خضرآباد'),
(437, 31, 'شاهديه'),
(438, 31, 'حمیدیه شهر'),
(439, 31, 'سید میرزا'),
(440, 31, 'زارچ');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `airline_id` int(11) NOT NULL,
  `flight_number` varchar(255) NOT NULL,
  `departure_airport_id` int(11) NOT NULL,
  `arrival_airport_id` int(11) NOT NULL,
  `departure_datetime` datetime NOT NULL,
  `arrival_datetime` datetime NOT NULL,
  `seats` int(10) NOT NULL,
  `price` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `airline_id`, `flight_number`, `departure_airport_id`, `arrival_airport_id`, `departure_datetime`, `arrival_datetime`, `seats`, `price`, `date_created`) VALUES
(1, 2, '999111', 2, 1, '2021-05-04 02:22:21', '2021-05-04 04:22:21', 90, 700000, '2021-05-02 02:29:58'),
(2, 1, '78787878', 2, 1, '2021-05-03 07:00:00', '2021-05-03 09:00:00', 150, 640000, '2021-05-02 03:07:31'),
(4, 2, '789805454', 2, 1, '2021-05-03 06:30:00', '2021-05-03 08:00:00', 110, 640000, '2021-05-02 21:30:24'),
(5, 1, '60905599', 4, 5, '2021-05-05 22:27:00', '2021-05-05 23:27:00', 100, 480000, '2021-05-04 22:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `tourist_attraction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'آذربايجان شرقي'),
(2, 'آذربايجان غربي'),
(3, 'اردبيل'),
(4, 'اصفهان'),
(5, 'البرز'),
(6, 'ايلام'),
(7, 'بوشهر'),
(8, 'تهران'),
(9, 'چهارمحال بختياري'),
(10, 'خراسان جنوبي'),
(11, 'خراسان رضوي'),
(12, 'خراسان شمالي'),
(13, 'خوزستان'),
(14, 'زنجان'),
(15, 'سمنان'),
(16, 'سيستان و بلوچستان'),
(17, 'فارس'),
(18, 'قزوين'),
(19, 'قم'),
(20, 'كردستان'),
(21, 'كرمان'),
(22, 'كرمانشاه'),
(23, 'كهكيلويه و بويراحمد'),
(24, 'گلستان'),
(25, 'گيلان'),
(26, 'لرستان'),
(27, 'مازندران'),
(28, 'مركزي'),
(29, 'هرمزگان'),
(30, 'همدان'),
(31, 'يزد');

-- --------------------------------------------------------

--
-- Table structure for table `tourist_attractions`
--

CREATE TABLE `tourist_attractions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `tourist_attractions_cat_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourist_attractions`
--

INSERT INTO `tourist_attractions` (`id`, `name`, `description`, `address`, `photo`, `tourist_attractions_cat_id`, `city_id`, `slug`, `created_at`) VALUES
(3, 'باغ ارم شیراز', '<p>باغ ارم شیراز یکی از ۹ باغ ایرانی است که در فهرست میراث جهانی&nbsp;یونسکو قرار دارد. این باغ یکی از زیبا ترین باغ های کشور است که هر گردشگری را می تواند شیفته خود کند، درختان سر به فلک کشیده و گل های رنگارنگ در کنار&nbsp;معماری اصیل ایرانی فضای زیبا و دلنشینی را به وجود آورده است.</p>', 'استان فارس - شیراز - خیابان ارم', '60917be51e710.png', 1, 232, 'باغ-ارم-شیراز', '2021-05-04 21:22:53'),
(4, 'برج قابوس', '<p>برج&nbsp;قابوس پانزدهمین بنای ایران است که ثبت جهانی شده است، برج قابوس بلند ترین بنای آجری جهان نیز می باشد. برج قابوس با دستور حاکم وقت گرگان (قابوس) ساخته شده و ۷۰ متر از سطح&nbsp;زمین&nbsp;ارتفاع دارد</p><p>این برج در شهر گنبد کاووس قرار دارد که در گذشته گنبد قابوس بوده است، اسم شهر از این بنا گرفته شده است، دو ردیف کتیبه کوفی بدنه برج را آرایش کرده است و به دلیل علاقه قابوس بن وشمگیر به زبان عربی، کتیبه ها با زبان عربی نوشته شده اند.</p>', 'استان گلستان - شهر گنبد کاووس', '60917ca161c2c.jpg', 1, 332, 'برج-قابوس', '2021-05-04 21:26:01'),
(5, 'تخت جمشید', '<p>تخت جمشید مجموعه‌ای از کاخ‌ها و ستون‌های باشکوه که در سال ۵۱۲ قبل از میلاد ساخت آن آغاز و ۱۵۰ سال بعد به اتمام رسید، تخت جمشید هم یکی از آثار ثبت شده ایران در یونسکو است. این بنا در نزدیکی شهر مرودشت و فاصله ای ۶۰ کیلومتری از شمال شیراز واقع شده است. هدف ساخت این بنا نشان دادن عظمت شاهنشاهی بزرگ هخامنشیان به جهانیان بود.</p>', 'استان فارس - مرودشت', '60917d7873aa4_1620147576.jpg', 1, 236, 'تخت-جمشید', '2021-05-04 21:27:22'),
(6, 'قلعه فلک الافلاک', '<p>فلک الافلاک یکی از شاهکارهای معماری جهان است که میزبان بی نظیر&nbsp;گردشگران&nbsp;داخلی و خارجی بوده و این بنای دیدنی در خرم آباد بنا شده و یکی از&nbsp;شاخص&nbsp;ترین بنا ساخته شده در دوران ساسانیان است.</p><p>ارتفاع بلند ترین دیوار این قلعه تا سطح تپه ۲۳ متر و مساحت کلی آن ۵۳۰۰ متر است&nbsp;که این قلعه در طول تاریخ با نام هایی همچون، دژ شاپور خواست، قلعه خرم آباد، کاخ اتابکان از آن نام برده شده و بعد از دوره قاجار به آن فلک الافلاک گفته می‌شود.</p>', 'استان لرستان - خرم آباد', '60917d6dea6f4.jpg', 1, 365, 'قلعه-فلک-الافلاک', '2021-05-04 21:29:25'),
(7, 'آبشار مارگون', '<p>آبشار مارگون واقع در دره های غرب شهرستان سپیدان که ارتفاع &nbsp;آن به ۷۰ و عرض آن ۱۰۰ متر می رسد. &nbsp;یکی از زیبا ترین آبشار های کشور هست که از نظر&nbsp;زیبایی&nbsp;، حجم فشار آب و... با آبشار شوی لرستان در&nbsp;رقابت&nbsp;است.</p><p>این آبشار بزرگترین و مرتفع ترین آبشارچشمه ای&nbsp;جهان&nbsp;است، در گرم ترین روزهای سال آبشار بسیار خنک و دمای آن به زیر ۱۰ درجه می رسد</p>', 'استان فارس - سپیدان', '60917de1e2c79_1620147681.jpg', 6, 241, 'آبشار-مارگون', '2021-05-04 21:31:12'),
(8, 'میدان نقش جهان اصفهان', '<p>نقش جهان میدانی در مرکز شهر اصفهان است که بین سال‌های 997 و 1008 ساخته شده و اکنون یک مکان تاریخی مهم و یکی از میراث جهانی یونسکو به حساب می آید. این میدان علاوه بر داشتن چهار بنای شگفت انگیز در اطراف آن، یک جاذبه گردشگری مهم در ایران و جهان به شمار می‌رود. پیاده‌روی در اطراف میدان و بین بناهای تاریخی با معماری بی‌نظیر در یک روز آفتابی، لذت‌بخش خواهد بود. عالی‌قاپو، مسجد شاه (مسجد امام)، مسجد شیخ لطف‌الله و سردر قیصریه بناهایی هستند که در اطراف این میدان قرار دارند و آماده برای بازدید هستند. با تهیه بلیط هواپیما اصفهان می‌توانید به این شهر سفر کرده و از میدان نقش جهان و بناهای اطراف آن دیدن کنید.</p>', 'اصفهان', '60917e4110252.jpg', 1, 60, 'میدان-نقش-جهان-اصفهان', '2021-05-04 21:32:57'),
(9, 'مسجد نصیرالملک شیراز', '<p>شیراز از پرآوازه ترین شهرهای ایران در جهان به حساب می‌آید که با بناهای تاریخی خود آدمی را خواه ناخواه به خود جلب می‌کند. مسجد نصیرالملک یکی از مساجد قدیمی شیراز است که به آن مسجد صورتی نیز می‌گویند. میرزا حسن علی خان ملقب به نصیرالملک بنای مسجد را در تاریخ 1294 قمری آغاز و در تاریخ 1305 هجری به پایان رسانید که به معماری میرزا محمد حسن و محمد رضا ساخته شده‌است. مسجد نصیرالملک از دیدگاه کاشی کاری از ارزنده‌ترین مساجد ایران و از دیدگاه ساختمان‌سازی به ویژه مقرنس، بی‌مانند است. این اثر در 30 خرداد 1358 به‌ عنوان یکی از آثار ملی ایران به ثبت رسید.</p>', 'فارس - شیراز', '60917e8a29ac3.jpg', 1, 232, 'مسجد-نصیرالملک-شیراز', '2021-05-04 21:34:10'),
(10, 'هتل بزرگ شیراز', '<p>هتل بزرگ شیراز در آبان ماه 1392 با زیربنای 40 هزار متر مربع به بهره برداری رسید. این هتل بر فراز کوه های شمال شرقی شیراز در 14 طبقه بنا شده است. هتل بزرگ با نام دروازه قرآن نیز شناخته می شود. این هتل برای پذیرایی از مهمانان و گردشگرانی که شیراز را مقصد سفر خود برگزیده اند دارای 158 باب اتاق با امکانات کامل اقامتی می باشد که در طبقات هفتم تا دوازدهم واقع شده اند. هتل پنج ستاره بزرگ شیراز از هتل های مجهز در شیراز به شمار می رود که با اقامت در این هتل و پیمودن فاصله ای حدودا 3 کیلومتر، می توان از آرامگاه خواجوی کرمانی نیز دیدن کرد.</p>', 'فارس - شیراز', '60917f05e9fcc.jpg', 2, 232, 'هتل-بزرگ-شیراز', '2021-05-04 21:36:13'),
(11, 'هتل زندیه شیراز', '<p>هتل لوکس پنج ستاره زندیه شیراز با معماری اصیل و سنتی ایرانی در سال 1394 در یکی از بهترین مناطق شیراز بهره برداری شده است. هتل دارای 3 طبقه و 75 باب واحد اقامتی مجهز به تمامی امکانات و خدمات رفاهی میهمانان می باشد. این هتل تا جاذبه های تاریخی، فرهنگی شهر نظیر مجموعه کریمخان زند و موزه پارس فاصله چندانی ندارد. حمام سنتی ایرانی با معماری چشمگیر از خاص ترین خدماتی است که میهمانان عزیز این هتل می توانند از آن بهره مند شود. مجموعه ورزشی هتل با ارائه امکاناتی نظیر بدنسازی، استخر، سونا، جکوزی و ویتامین سرا برای میهمانان این هتل لحظات شاد و سلامتی را فراهم می کند. رستوران سنتی، ایرانی و فرنگی متنوع، بازارچه سنتی، غرفه های تجاری، کافی شاپ، سالن همایش، سالن چند منظور با مدرنترین تکنولوژی روز، آژانس مسافرتی، گالری صنایع دستی، از دیگر امکانات این هتل می باشند.</p>', 'فارس - شیراز', '60917f98622ca.jpg', 2, 232, 'هتل-زندیه-شیراز', '2021-05-04 21:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `tourist_attractions_cat`
--

CREATE TABLE `tourist_attractions_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourist_attractions_cat`
--

INSERT INTO `tourist_attractions_cat` (`id`, `name`, `cat_slug`) VALUES
(1, 'گردشگری', 'گردشگری'),
(2, 'هتل', 'هتل'),
(3, 'رستوران', 'رستوران'),
(4, 'خدمات درمانی', 'خدمات-درمانی'),
(5, 'حمل و نقل', 'حمل-و-نقل'),
(6, 'مکان های تفریحی', 'مکان-های-تفریحی');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `contact_info` varchar(255) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `reset_code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(17, 'maryam.a@test.com', '$2y$10$LIE04G3B6VgNHlXHBlLsxO8VQr0nNsuGkirAKtMHPXrMfWSwyUb.S', 1, 'مریم', 'علیزاده', 'ایران- تهران', '09121234567', '4.jpg', 1, NULL, NULL, '2020-09-01'),
(19, 'marjan.d@test.com', '$2y$10$4dd63ktu/XeJivB5xErVa.agfek869ru5gPzlnG0W5hzgFj5ebf1O', 0, 'مرجان', 'داودی', 'ایران- تهران', '09128007761', 'at3.jpg', 1, NULL, NULL, '2020-09-01'),
(23, 'test@test.com', '$2y$10$PScHwUZxugQfdKCydPTOsO6khyn8/QJTRmh7aZl6ams8cHmqh7cWa', 0, 'تست', 'تستی', '', '', '', 0, NULL, NULL, '2021-02-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_flight`
--
ALTER TABLE `booked_flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourist_attractions`
--
ALTER TABLE `tourist_attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourist_attractions_cat`
--
ALTER TABLE `tourist_attractions_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booked_flight`
--
ALTER TABLE `booked_flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tourist_attractions`
--
ALTER TABLE `tourist_attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tourist_attractions_cat`
--
ALTER TABLE `tourist_attractions_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
