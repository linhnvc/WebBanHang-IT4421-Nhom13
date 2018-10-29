-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2018 lúc 10:32 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clothes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `userName` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `linkFacebook` varchar(50) NOT NULL,
  `linkInstagram` varchar(50) NOT NULL,
  `linkTwitter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `email`, `address`, `phoneNumber`, `linkFacebook`, `linkInstagram`, `linkTwitter`) VALUES
(1, 'trungtq', '123456', 'trungbka1997@gmail.com', 'abc', '0389721127', 'https://www.facebook.com/trung.tranquang.9484', 'abc.inst', 'abc.twitter');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `billId` int(11) NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetail`
--

CREATE TABLE `billdetail` (
  `billId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`categoryId`, `name`, `group`) VALUES
(2, 'Dresses', 'Dress'),
(4, 'Party Dresses', 'Dress'),
(5, 'Tops', 'Common'),
(6, 'Swimwear', 'Beach'),
(7, 'Beachwear', 'Beach'),
(10, 'Skirts', 'Common'),
(12, 'Shorts', 'Common');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `firm`
--

CREATE TABLE `firm` (
  `firmId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `information` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `firm`
--

INSERT INTO `firm` (`firmId`, `name`, `information`) VALUES
(1, 'Under Armour', 'The sports retailer made more than $3 billion in revenue last year. It may be far from eclipsing Nike\'s global empire, but it continues to grow and sign major deals with impressive athletes, like Stephen Curry and Jordan Spieth.'),
(2, ' American Eagle', 'Annual revenue: $3.3 billion. American Eagle implemented new techniques to help its business after comparable sales decreased by 5% in fiscal 2014. It launched a one-size-fits-all brand called Don\'t Ask Why to connect with more of a teen audience.'),
(3, 'Tommy Hilfiger', 'Annual revenue: $3.6 billion. This iconic American brand recently celebrated its 30th anniversary, and it definitely hasn\'t lost its luster. The company reported a fourth consecutive earnings beat in the most recent fiscal quarter. Revenues increased 3%, and earnings per share grew 20%, according to an earnings call.'),
(4, 'Coach', 'Annual revenue: $4.3 billion. This luxury fashion house recently reported disappointing sales, and some believe that its decline lies in its decision to open too many outlet stores. Millennials are less inclined to spend more money on luxury apparel, which is hurting brands like Coach.'),
(5, 'Michael Kors', 'Annual revenue: $4.4 billion. Michael Kors, like Coach, is affected by millennials\' gravitation away from luxury brands. Michael Kors\' decline is affecting large department stores like Macy\'s; many believe the brand\'s time has passed because it got too popular, and it\'s name no longer holds the same value.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `imageId` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`imageId`, `link`, `productId`) VALUES
(46, 'Dresses/1_1.jpg', 1),
(47, 'Dresses/1_2.jpg', 1),
(48, 'Dresses/1_3.jpg', 1),
(49, 'Dresses/1_4.jpg', 1),
(50, 'Dresses/2_1.jpg', 2),
(51, 'Dresses/2_2.jpg', 2),
(52, 'Dresses/2_3.jpg', 2),
(53, 'Dresses/2_4.jpg', 2),
(54, 'Dresses/3_1.jpg', 3),
(55, 'Dresses/3_2.jpg', 3),
(56, 'Dresses/3_3.jpg', 3),
(57, 'Dresses/3_4.jpg', 3),
(58, 'Dresses/4_1.jpg', 4),
(59, 'Dresses/4_2.jpg', 4),
(60, 'Dresses/4_3.jpg', 4),
(61, 'Dresses/4_4.jpg', 4),
(62, 'Dresses/5_1.jpg', 5),
(63, 'Dresses/5_2.jpg', 5),
(64, 'Dresses/5_3.jpg', 5),
(65, 'Dresses/5_4.jpg', 5),
(66, 'Dresses/6_1.jpg', 6),
(67, 'Dresses/6_2.jpg', 6),
(68, 'Dresses/6_3.jpg', 6),
(69, 'Dresses/6_4.jpg', 6),
(70, 'Dresses/7_1.jpg', 7),
(71, 'Dresses/7_2.jpg', 7),
(72, 'Dresses/7_3.jpg', 7),
(73, 'Dresses/7_4.jpg', 7),
(74, 'Dresses/8_1.jpg', 8),
(75, 'Dresses/8_2.jpg', 8),
(76, 'Dresses/8_3.jpg', 8),
(77, 'Dresses/8_4.jpg', 8),
(78, 'Dresses/9_1.jpg', 9),
(79, 'Dresses/9_2.jpg', 9),
(80, 'Dresses/9_3.jpg', 9),
(81, 'Dresses/9_4.jpg', 9),
(82, 'Dresses/10_1.jpg', 10),
(83, 'Dresses/10_2.jpg', 10),
(84, 'Dresses/10_3.jpg', 10),
(85, 'Dresses/10_4.jpg', 10),
(86, 'Dresses/11_1.jpg', 11),
(87, 'Dresses/11_2.jpg', 11),
(88, 'Dresses/11_3.jpg', 11),
(89, 'Dresses/11_4.jpg', 11),
(90, 'Dresses/12_1.jpg', 12),
(91, 'Dresses/12_2.jpg', 12),
(92, 'Dresses/12_3.jpg', 12),
(93, 'Dresses/12_4.jpg', 12),
(94, 'Dresses/13_1.jpg', 13),
(95, 'Dresses/13_2.jpg', 13),
(96, 'Dresses/13_3.jpg', 13),
(97, 'Dresses/13_4.jpg', 13),
(98, 'Dresses/14_1.jpg', 14),
(99, 'Dresses/14_2.jpg', 14),
(100, 'Dresses/14_3.jpg', 14),
(101, 'Dresses/14_4.jpg', 14),
(102, 'Dresses/15_1.jpg', 15),
(103, 'Dresses/15_2.jpg', 15),
(104, 'Dresses/15_3.jpg', 15),
(105, 'Dresses/15_4.jpg', 15),
(106, 'Dresses/16_1.jpg', 16),
(107, 'Dresses/16_2.jpg', 16),
(108, 'Dresses/16_3.jpg', 16),
(109, 'Dresses/16_4.jpg', 16),
(110, 'Dresses/17_1.jpg', 17),
(111, 'Dresses/17_2.jpg', 17),
(112, 'Dresses/17_3.jpg', 17),
(113, 'Dresses/17_4.jpg', 17),
(198, 'Dresses/18_1.jpg', 18),
(199, 'Dresses/18_2.jpg', 18),
(200, 'Dresses/18_3.jpg', 18),
(201, 'Dresses/18_4.jpg', 18),
(202, 'Dresses/19_1.jpg', 19),
(203, 'Dresses/19_2.jpg', 19),
(204, 'Dresses/19_3.jpg', 19),
(205, 'Dresses/19_4.jpg', 19),
(298, 'Dresses/20_1.jpg', 20),
(299, 'Dresses/20_2.jpg', 20),
(300, 'Dresses/20_3.jpg', 20),
(301, 'Dresses/20_4.jpg', 20),
(302, 'Dresses/21_1.jpg', 21),
(303, 'Dresses/21_2.jpg', 21),
(304, 'Dresses/21_3.jpg', 21),
(305, 'Dresses/21_4.jpg', 21),
(306, 'Dresses/22_1.jpg', 22),
(307, 'Dresses/22_2.jpg', 22),
(308, 'Dresses/22_3.jpg', 22),
(309, 'Dresses/22_4.jpg', 22),
(310, 'Dresses/23_1.jpg', 23),
(311, 'Dresses/23_2.jpg', 23),
(312, 'Dresses/23_3.jpg', 23),
(313, 'Dresses/23_4.jpg', 23),
(314, 'Dresses/24_1.jpg', 24),
(315, 'Dresses/24_2.jpg', 24),
(316, 'Dresses/24_3.jpg', 24),
(317, 'Dresses/24_4.jpg', 24),
(318, 'Dresses/25_1.jpg', 25),
(319, 'Dresses/25_2.jpg', 25),
(320, 'Dresses/25_3.jpg', 25),
(321, 'Dresses/25_4.jpg', 25),
(322, 'Dresses/26_1.jpg', 26),
(323, 'Dresses/26_2.jpg', 26),
(324, 'Dresses/26_3.jpg', 26),
(325, 'Dresses/26_4.jpg', 26),
(326, 'Dresses/27_1.jpg', 27),
(327, 'Dresses/27_2.jpg', 27),
(328, 'Dresses/27_3.jpg', 27),
(329, 'Dresses/27_4.jpg', 27),
(330, 'Dresses/28_1.jpg', 28),
(331, 'Dresses/28_2.jpg', 28),
(332, 'Dresses/28_3.jpg', 28),
(333, 'Dresses/28_4.jpg', 28),
(334, 'Dresses/29_1.jpg', 29),
(335, 'Dresses/29_2.jpg', 29),
(336, 'Dresses/29_3.jpg', 29),
(337, 'Dresses/29_4.jpg', 29),
(338, 'Dresses/30_1.jpg', 30),
(339, 'Dresses/30_2.jpg', 30),
(340, 'Dresses/30_3.jpg', 30),
(341, 'Dresses/30_4.jpg', 30),
(342, 'Dresses/31_1.jpg', 31),
(343, 'Dresses/31_2.jpg', 31),
(344, 'Dresses/31_3.jpg', 31),
(345, 'Dresses/31_4.jpg', 31),
(346, 'Dresses/32_1.jpg', 32),
(347, 'Dresses/32_2.jpg', 32),
(348, 'Dresses/32_3.jpg', 32),
(349, 'Dresses/32_4.jpg', 32),
(350, 'Dresses/33_1.jpg', 33),
(351, 'Dresses/33_2.jpg', 33),
(352, 'Dresses/33_3.jpg', 33),
(353, 'Dresses/33_4.jpg', 33),
(354, 'Dresses/34_1.jpg', 34),
(355, 'Dresses/34_2.jpg', 34),
(356, 'Dresses/34_3.jpg', 34),
(357, 'Dresses/34_4.jpg', 34),
(358, 'Dresses/35_1.jpg', 35),
(359, 'Dresses/35_2.jpg', 35),
(360, 'Dresses/35_3.jpg', 35),
(361, 'Dresses/35_4.jpg', 35),
(362, 'Dresses/36_1.jpg', 36),
(363, 'Dresses/36_2.jpg', 36),
(364, 'Dresses/36_3.jpg', 36),
(365, 'Dresses/36_4.jpg', 36),
(366, 'Dresses/37_1.jpg', 37),
(367, 'Dresses/37_2.jpg', 37),
(368, 'Dresses/37_3.jpg', 37),
(369, 'Dresses/37_4.jpg', 37),
(370, 'Dresses/38_1.jpg', 38),
(371, 'Dresses/38_2.jpg', 38),
(372, 'Dresses/38_3.jpg', 38),
(373, 'Dresses/38_4.jpg', 38),
(374, 'Dresses/39_1.jpg', 39),
(375, 'Dresses/39_2.jpg', 39),
(376, 'Dresses/39_3.jpg', 39),
(377, 'Dresses/39_4.jpg', 39),
(378, 'Dresses/40_1.jpg', 40),
(379, 'Dresses/40_2.jpg', 40),
(380, 'Dresses/40_3.jpg', 40),
(381, 'Dresses/40_4.jpg', 40),
(382, 'Dresses/41_1.jpg', 41),
(383, 'Dresses/41_2.jpg', 41),
(384, 'Dresses/41_3.jpg', 41),
(385, 'Dresses/41_4.jpg', 41),
(386, 'Dresses/42_1.jpg', 42),
(387, 'Dresses/42_2.jpg', 42),
(388, 'Dresses/42_3.jpg', 42),
(389, 'Dresses/42_4.jpg', 42),
(390, 'Dresses/43_1.jpg', 43),
(391, 'Dresses/43_2.jpg', 43),
(392, 'Dresses/43_3.jpg', 43),
(393, 'Dresses/43_4.jpg', 43),
(394, 'Dresses/44_1.jpg', 44),
(395, 'Dresses/44_2.jpg', 44),
(396, 'Dresses/44_3.jpg', 44),
(397, 'Dresses/44_4.jpg', 44),
(398, 'Dresses/45_1.jpg', 45),
(399, 'Dresses/45_2.jpg', 45),
(400, 'Dresses/45_3.jpg', 45),
(401, 'Dresses/45_4.jpg', 45),
(402, 'Dresses/46_1.jpg', 46),
(403, 'Dresses/46_2.jpg', 46),
(404, 'Dresses/46_3.jpg', 46),
(405, 'Dresses/46_4.jpg', 46),
(406, 'Dresses/47_1.jpg', 47),
(407, 'Dresses/47_2.jpg', 47),
(408, 'Dresses/47_3.jpg', 47),
(409, 'Dresses/47_4.jpg', 47),
(410, 'Dresses/48_1.jpg', 48),
(411, 'Dresses/48_2.jpg', 48),
(412, 'Dresses/48_3.jpg', 48),
(413, 'Dresses/48_4.jpg', 48),
(414, 'Dresses/49_1.jpg', 49),
(415, 'Dresses/49_2.jpg', 49),
(416, 'Dresses/49_3.jpg', 49),
(417, 'Dresses/49_4.jpg', 49),
(418, 'Dresses/50_1.jpg', 50),
(419, 'Dresses/50_2.jpg', 50),
(420, 'Dresses/50_3.jpg', 50),
(421, 'Dresses/50_4.jpg', 50),
(422, 'Dresses/51_1.jpg', 51),
(423, 'Dresses/51_2.jpg', 51),
(424, 'Dresses/51_3.jpg', 51),
(425, 'Dresses/51_4.jpg', 51),
(426, 'Dresses/52_1.jpg', 52),
(427, 'Dresses/52_2.jpg', 52),
(428, 'Dresses/52_3.jpg', 52),
(429, 'Dresses/52_4.jpg', 52),
(430, 'Dresses/53_1.jpg', 53),
(431, 'Dresses/53_2.jpg', 53),
(432, 'Dresses/53_3.jpg', 53),
(433, 'Dresses/53_4.jpg', 53),
(434, 'Dresses/54_1.jpg', 54),
(435, 'Dresses/54_2.jpg', 54),
(436, 'Dresses/54_3.jpg', 54),
(437, 'Dresses/54_4.jpg', 54),
(438, 'Dresses/55_1.jpg', 55),
(439, 'Dresses/55_2.jpg', 55),
(440, 'Dresses/55_3.jpg', 55),
(441, 'Dresses/55_4.jpg', 55),
(442, 'Dresses/56_1.jpg', 56),
(443, 'Dresses/56_2.jpg', 56),
(444, 'Dresses/56_3.jpg', 56),
(445, 'Dresses/56_4.jpg', 56),
(446, 'Dresses/57_1.jpg', 57),
(447, 'Dresses/57_2.jpg', 57),
(448, 'Dresses/57_3.jpg', 57),
(449, 'Dresses/57_4.jpg', 57),
(450, 'Dresses/58_1.jpg', 58),
(451, 'Dresses/58_2.jpg', 58),
(452, 'Dresses/58_3.jpg', 58),
(453, 'Dresses/58_4.jpg', 58),
(454, 'Dresses/59_1.jpg', 59),
(455, 'Dresses/59_2.jpg', 59),
(456, 'Dresses/59_3.jpg', 59),
(457, 'Dresses/59_4.jpg', 59),
(458, 'Dresses/60_1.jpg', 60),
(459, 'Dresses/60_2.jpg', 60),
(460, 'Dresses/60_3.jpg', 60),
(461, 'Dresses/60_4.jpg', 60),
(462, 'Dresses/61_1.jpg', 61),
(463, 'Dresses/61_2.jpg', 61),
(464, 'Dresses/61_3.jpg', 61),
(465, 'Dresses/61_4.jpg', 61),
(466, 'Dresses/62_1.jpg', 62),
(467, 'Dresses/62_2.jpg', 62),
(468, 'Dresses/62_3.jpg', 62),
(469, 'Dresses/62_4.jpg', 62),
(470, 'Dresses/63_1.jpg', 63),
(471, 'Dresses/63_2.jpg', 63),
(472, 'Dresses/63_3.jpg', 63),
(473, 'Dresses/63_4.jpg', 63),
(474, 'Dresses/64_1.jpg', 64),
(475, 'Dresses/64_2.jpg', 64),
(476, 'Dresses/64_3.jpg', 64),
(477, 'Dresses/64_4.jpg', 64),
(478, 'Dresses/65_1.jpg', 65),
(479, 'Dresses/65_2.jpg', 65),
(480, 'Dresses/65_3.jpg', 65),
(481, 'Dresses/65_4.jpg', 65);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(50) NOT NULL,
  `salePrice` int(50) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `FirmId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `name`, `size`, `color`, `quantity`, `description`, `price`, `salePrice`, `categoryId`, `FirmId`) VALUES
(1, 'Metallic Plunge Halter Mini Bodycon Dress', '10', 'SILVER', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 2, 1),
(2, 'Sequin & Mesh Strappy Maxi Dress', '10', 'ROSE', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 1),
(3, 'Sequin Long Sleeve Plunge Bodycon Dress', '10', 'RED', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 2),
(4, 'Sequin & Mesh Plunge Neck Midi Dress', '10', 'COBALT', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 3),
(5, 'Satin Drape Wrap Mini Bodycon Dress', '10', 'BLACK', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 4),
(6, 'Leopard Print Off The Shoulder Midi Dress', '10', 'BROWN', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 5),
(7, 'Tan Snake Print Polo Neck Midi Dress', '10', 'TAN', 100, '95% Viscose, 5% Elastane. Wash with similar colours. Do not dry clean. Cool iron on reverse. Model Wears UK Size 10.', 400000, 400000, 2, 5),
(8, 'Tan Snake Print Square Neck Skater Dress', '10', 'TAN', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 5),
(9, '95% Viscose, 5% Elastane. Wash with similar colours. Do not dry clean. Cool iron on reverse. Model Wears UK Size 10.', '10', 'CAMEL', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 5),
(10, 'Mock Horn Button Rib Off Shoulder Midi Dress', '10', 'PINK', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 1),
(11, 'Off The Shoulder Button Detail Bodycon Dress', '10', 'PINK', 100, '100% Polyester. Hand Wash. Model Wears UK Size 10.', 400000, 400000, 2, 1),
(12, 'Leopard Print Puff Sleeve Dress', '10', 'BROWN', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(13, 'Plus High Neck Long Sleeve Leopard Mini Dress', '10', 'BROWN', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(14, 'Petite Leopard Print Button Detail Wrap Dress', '10', 'BROWN', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(15, 'Tall Halloween Leopard Print Bodycon Dress', '10', 'BROWN', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(16, 'Horn Button Detail Luxe Shirt Dress', '10', 'BLACK', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(17, 'Satin Strappy Cupped Bodycon Mini Dress', '10', 'PINK', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(18, 'Satin Double Breasted Blazer Dress', '10', 'PURPLE', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(19, 'Satin Twist Knot Detail Dress', '10', 'PINK', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(20, 'Petite Sequin Aztec Split Detail Bodycon Dress', '10', 'BLACK', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(21, 'Petite Velvet and Sequin Split Hem Bodycon Hem', '10', 'BLACK', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(22, 'Plus Metallic Square Neck Bodycon', '10', 'BLACK', 100, '95% Polyester 5% Elastane. Machine Wash. Model Wears UK Size 10.', 400000, 400000, 4, 1),
(23, 'Oversized Slogan T-Shirt', '10', 'PINK', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(24, 'Oversized Slogan T-Shirt', '10', 'PINK', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(25, 'California West Coast Slogan Hoody', '10', 'PINK', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(26, 'Slogan Cropped Hoody', '10', 'WHITE', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(27, 'Honey Oversized Slogan Hoody', '10', 'PINK', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(28, 'Snake Print Tie Waist Top', '10', 'SILVER', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(29, 'Velvet Ruched Off The Shoulder Crop', '10', 'PINK', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(30, 'Metallic Rib Angel Sleeve Plunge Pep Top', '10', 'PURPLE', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(31, 'Metallic Bell Sleeve Wrap Over Top', '10', 'PINK', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(32, 'Boxy Leopard Print Long Sleeve Crop', '10', 'BROWN', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(33, 'Sleeve Detail Rib long Sleeve Top', '10', 'WHITE', 100, 'Machine Washable. 95% Polyester 5% Elastane. Model Wears UK Size 10', 400000, 400000, 5, 1),
(34, 'Tropical Leaf Cut Out Beach Dress', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(35, 'Mesh Maxi Beach Cover Up', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(36, 'Paisley Crop Top & Split Trouser Beach Co-ord', '10', 'BROWN', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(37, 'Net Beach Trouser', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(38, 'Split Leg Beach Trousers', '10', 'BROWN', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(39, 'Two Tier Ruffle Bardot Swimsuit', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(40, 'Scarf Print Maxi Beach Kimono', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(41, 'Elastic Printed Trim Swimsuit', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(42, 'Leopard Print Maxi Beach Kimono', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(43, 'Boutique Lace Up Front Tie Side Swimsuit', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(44, 'Monochrome Print Maxi Beach Kaftan', '10', 'SILVER', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 100000, 100000, 6, 2),
(45, 'Mesh Sequin Maxi Beach Kimono', '10', 'BLACK', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 200000, 200000, 7, 3),
(46, 'Stripe Beach Trouser', '10', 'WHITE', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 200000, 200000, 7, 3),
(47, 'Chain Print Beach Trouser', '10', 'WHITE', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 200000, 200000, 7, 3),
(48, 'Chain Print Maxi Beach Kimono', '10', 'WHITE', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 200000, 200000, 7, 3),
(49, 'Stripe Print Lace Up Beach Playsuit', '10', 'SILVER', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 200000, 200000, 7, 3),
(50, 'Crochet Chevron V Neck Kimono', '10', 'BROWN', 100, 'Body: 82% Polyamide, 18% Elastane. Lining: 100% Polyester. Machine Wash. Model Wears UK Size 10. This Item Is Returnable Only If The Hygiene Strip Is In Place And The Product Is Unworn.', 200000, 200000, 7, 3),
(51, 'High Waist Mock Horn Button Belted Mini Skirt', '10', 'KHAKI', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(52, 'Ruched Front Slinky Mini Skirt', '10', 'BLACK', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(53, 'Zebra Print Jersey Mini Skirt', '10', 'BLACK', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(54, 'Satin Micro Mini Skirt', '10', 'GOLD', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(55, 'Satin Midi Skirt', '10', 'BLACK', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(56, 'Woven Tartan Wrap Mini Skirt', '10', 'RED', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(57, 'Velvet Wrap Midi Skirt', '10', 'BLACK', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(58, 'Leopard Woven Jacquard Mini Skirt', '10', 'WINE', 100, '100% Cotton. Machine Washable. Measured on a UK Size 10. Model Wears a UK Size 10. KEEP AWAY FROM FIRE.', 200000, 200000, 10, 3),
(59, 'Jumbo Rib High Waist Cycling Short', '10', 'KHAKI', 100, '5% ELASTANE, 95% POLYESTER. MACHINE WASH ONLY. KEEP AWAY FROM FIRE. MODEL WEARS A SIZE 10', 100000, 100000, 12, 4),
(60, 'Zebra Jacquard Cycling Shorts', '10', 'CAMEL', 100, '5% ELASTANE, 95% POLYESTER. MACHINE WASH ONLY. KEEP AWAY FROM FIRE. MODEL WEARS A SIZE 10', 100000, 100000, 12, 4),
(61, 'Slinky Cycling Short', '10', 'BLACK', 100, '5% ELASTANE, 95% POLYESTER. MACHINE WASH ONLY. KEEP AWAY FROM FIRE. MODEL WEARS A SIZE 10', 100000, 100000, 12, 4),
(62, 'Cycling Shorts', '10', 'BLACK', 100, '5% ELASTANE, 95% POLYESTER. MACHINE WASH ONLY. KEEP AWAY FROM FIRE. MODEL WEARS A SIZE 10', 100000, 100000, 12, 4),
(63, 'Double Layer High Waist Cycling Shorts', '10', 'BLACK', 100, '5% ELASTANE, 95% POLYESTER. MACHINE WASH ONLY. KEEP AWAY FROM FIRE. MODEL WEARS A SIZE 10', 100000, 100000, 12, 4),
(64, 'Slinky Longline Cycling Shorts', '10', 'STONE', 100, '5% ELASTANE, 95% POLYESTER. MACHINE WASH ONLY. KEEP AWAY FROM FIRE. MODEL WEARS A SIZE 10', 100000, 100000, 12, 4),
(65, 'Slinky Cycling Short', '10', 'SAGE', 100, '5% ELASTANE, 95% POLYESTER. MACHINE WASH ONLY. KEEP AWAY FROM FIRE. MODEL WEARS A SIZE 10', 100000, 100000, 12, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `email`) VALUES
(1, 'Trần Quang Trung', '123456', 'trungbka1997@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billId`),
  ADD KEY `FK_userId` (`userId`);

--
-- Chỉ mục cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`billId`,`productId`),
  ADD KEY `FK_bill_product1` (`productId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`userId`,`productId`),
  ADD KEY `FK_user_product1` (`productId`);

--
-- Chỉ mục cho bảng `firm`
--
ALTER TABLE `firm`
  ADD PRIMARY KEY (`firmId`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `FK_image` (`productId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `FK_categoryId` (`categoryId`),
  ADD KEY `FirmId` (`FirmId`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `billId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `firm`
--
ALTER TABLE `firm`
  MODIFY `firmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Các ràng buộc cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `FK_bill_product` FOREIGN KEY (`billId`) REFERENCES `bill` (`billId`),
  ADD CONSTRAINT `FK_bill_product1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_user_product` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `FK_user_product1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_image` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_categoryId` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`FirmId`) REFERENCES `firm` (`firmId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
