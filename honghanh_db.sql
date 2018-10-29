-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2018 lúc 08:04 AM
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
-- Cơ sở dữ liệu: `honghanh_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `slug`, `title`, `description`, `content`, `avatar`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `is_activated`) VALUES
(1, 've-chung-toi', 'Về Chúng Tôi', 'Về Chúng Tôi', 'Về Ch&uacute;ng T&ocirc;i', '', 'c2b907be1a8fd645483a27c8f37892b8.jpg', '2018-10-23 15:07:29', 'administrator', '2018-10-23 15:07:29', 'administrator', 1, 0),
(2, 'lich-su', 'Lịch Sử', 'Lịch Sử', 'Lịch Sử', '', 'e8d179e8b6a15215e290020904b46384.jpg', '2018-10-23 15:14:17', 'administrator', '2018-10-23 15:14:17', 'administrator', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accessary`
--

CREATE TABLE `accessary` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accessary`
--

INSERT INTO `accessary` (`id`, `title`, `slug`, `image`, `file`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'áđá', 'ada', '', 'e255a354e06616e8bb3b407af7a57571.pdf', 1, '2018-10-24 14:44:14', 'administrator', '2018-10-24 14:44:14', 'administrator'),
(2, 'Dầu nhớt', 'dau-nhot', '743269a38cdec13cf98370b2dd6e01fb.jpg', '409c6d6d5c20d859b86a89af5c789fce.pdf', 0, '2018-10-24 16:19:31', 'administrator', '2018-10-24 16:19:31', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0: active; 1:deactive',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_activated`, `is_deleted`) VALUES
(1, 'test', 'test', '', '2018-10-29 11:08:44', 'administrator', '2018-10-29 11:08:44', 'administrator', 0, 0),
(2, 'asdas', 'asdasda', '3c04b971aa792db0dd4e0e0c489bb2fc.png', '2018-10-29 11:09:45', 'administrator', '2018-10-29 11:09:45', 'administrator', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1d6d2ef5cbe48491b53b5c2ae95d1d4f14c98f82', '::1', 1516590779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363539303735363b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353134333939313533223b);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `numberphone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `map` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `company`, `address`, `numberphone`, `email`, `website`, `map`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'Hồng Hạnh', '252 Phố Huế - Hai Bà Trưng - Hà Nội, 7 Âu Cơ - Tây Hồ - Hà Nội, 18 Lê Đức Thọ - Nam Từ Liêm - Hà Nội, 54 Nguyễn Trãi, Dĩ An, Bình Dương', '0243.974.9797, 0243.718.8037, 0243.75.65.999, 02743795856', 'cr@honghanh.vn', 'www.honghanh.com', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.505760025493!2d105.849474314225!3d21.01243998600728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8b5acea4ef%3A0x957cbf4fe0fc6b2f!2zMjUyIEh14bq_LCBCw7lpIFRo4buLIFh1w6JuLCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1540549888698\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen&gt;&lt;/iframe&gt;', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_library`
--

INSERT INTO `image_library` (`id`, `title`, `slug`, `avatar`, `image`, `description`, `content`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4, 'Thư VIện Ảnh 1', 'thu-vien-anh-1', 'a27aab28d4b0f6b9a7ca708b80957b4c.jpg', '[\"a27aab28d4b0f6b9a7ca708b80957b4c.jpg\",\"1e700e2badb59edb2825a87e75fa8fb8.jpg\",\"e3bb402114030f45f3ef2429f325a9e2.png\"]', 'Thư VIện Ảnh 1', 'Thư VIện Ảnh 1', 1, '2018-10-25 17:14:31', 'administrator', '2018-10-25 17:14:31', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `post_category_id`, `slug`, `title`, `description`, `content`, `avatar`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `is_activated`) VALUES
(1, 3, 'bai-viet-dich-vu', 'Bài Viết Dịch Vụ', 'Bài Viết Dịch Vụ', 'B&agrave;i Viết Dịch Vụ', '', 'ecc8cfd1d0535799014745b81152e94a.jpg', '2018-10-23 14:57:23', 'administrator', '2018-10-23 14:57:23', 'administrator', 1, 0),
(2, 3, 'test', 'test', 'test', 'test', '', 'efd7d8ea8a328038b849da542a8b9bad.jpg', '2018-10-23 14:56:54', 'administrator', '2018-10-23 14:56:54', 'administrator', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `sort` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0 : service; 1 : news',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_category`
--

INSERT INTO `post_category` (`id`, `slug`, `title`, `content`, `project`, `image`, `sort`, `type`, `is_activated`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'dv-sua-chua', 'DV SỬA CHỮA', 'DV SỬA CHỮA<br /><br /><img src=\"http://localhost/honghanh//source/PRIMITIVO%20DI%20MANDURIA%20RISERVA%20DEL%20FONDATORE%20piccola_1.jpg?1540270018104\" alt=\"PRIMITIVO DI MANDURIA RISERVA DEL FONDATORE piccola_1\" />', '', '60357f12726ae8986db45c090d78a0df.jpg', NULL, 0, 0, 0, '2018-10-23 11:47:00', 'administrator', '2018-10-23 11:47:00', 'administrator'),
(2, 'tin-tong-hop', 'TIN TỔNG HỢP 1', 'TIN TỔNG HỢP', '', '28f011e45b16fd618ee16b2a1b740497.jpg', NULL, 0, 1, 1, '2018-10-23 10:56:27', 'administrator', '2018-10-23 10:56:27', 'administrator'),
(3, 'tin-dn', 'TIN DN', 'TIN DN', '', 'fabc75735cd53771112611a32c4e044a.jpg', NULL, 1, 0, 0, '2018-10-23 11:01:32', 'administrator', '2018-10-23 11:01:32', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `metakeywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metadescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `design` text COLLATE utf8_unicode_ci NOT NULL,
  `technology` text COLLATE utf8_unicode_ci NOT NULL,
  `untilities` text COLLATE utf8_unicode_ci NOT NULL,
  `mass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `altitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brightinterval` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fuelrange` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fronttiresize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `afterwards` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `engine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cylindercapacity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `piston` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `compressionratio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maximumpower` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `torque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bootsystem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inclination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scanlength` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frontbrake` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brakeafter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `banner` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `design_img` text COLLATE utf8_unicode_ci NOT NULL,
  `technology_img` text COLLATE utf8_unicode_ci NOT NULL,
  `untilities_img` text COLLATE utf8_unicode_ci NOT NULL,
  `version_img` text COLLATE utf8_unicode_ci NOT NULL,
  `version_icon` text COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `slug`, `title`, `description`, `content`, `metakeywords`, `metadescription`, `design`, `technology`, `untilities`, `mass`, `size`, `distance`, `altitude`, `brightinterval`, `fuelrange`, `fronttiresize`, `forks`, `afterwards`, `engine`, `cylindercapacity`, `piston`, `compressionratio`, `maximumpower`, `torque`, `capacity`, `motion`, `bootsystem`, `inclination`, `scanlength`, `frontbrake`, `brakeafter`, `version`, `avatar`, `image`, `banner`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `design_img`, `technology_img`, `untilities_img`, `version_img`, `version_icon`, `price`, `is_activated`, `type`) VALUES
(1, 1, 'vision-110cc', 'Vision 110cc', '', '', 'Vision 110cc', 'Vision 110cc', '[{\"title\":\"96 kg\",\"content\":\"96 kg\",\"image\":\"0c547966dde35c6e29795c2aad7ab068.jpg\"}]', '[{\"title\":\"96 kg\",\"content\":\"96 kg\",\"image\":\"caea9e1c3413c032774ac9ddf58f0b82.jpg\"},{\"title\":\"96 kg\",\"content\":\"96 kg\",\"image\":\"9eaa7e2e4068292d98495f889de1fd39.jpg\"}]', '[{\"title\":\"96 kg\",\"content\":\"96 kg\",\"image\":\"6d2381cdfc6845f1becd88fb2a267604.jpg\"}]', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '96 kg', '', '', '', '', '[{\"title\":\"vision\",\"content\":[{\"title\":\"vision\",\"code\":\"vision\",\"image\":\"a3b67a1a20e8bfa0fff6854499c1ae79.jpg\",\"icon\":\"fcfc345c7f7116517b2978ad43d88eca.jpg\"},{\"title\":\"vision\",\"code\":\"vision\",\"image\":\"020c6ebf94edd5fbbecbd64b587bfe85.jpg\",\"icon\":\"a315eea1a86c195a920c737d45ffc1af.jpg\"}]},{\"title\":\"vision\",\"content\":[{\"title\":\"vision-110cc\",\"code\":\"vision-110cc\",\"image\":\"a65856565e2c315760185c1b68221414.jpg\",\"icon\":\"83fe703e21918f3dcf02c027ed4a6e43.jpg\"}]}]', '', '[\"aba27c6ac87e63fa49f3b97335a10d57.jpg\",\"4815eaab94c0b15ed267cf24adce91e6.jpg\",\"bcae0911fe2a8f8131b98d13dd5d9e6c.jpg\"]', '[\"c9b9beb76a811bc48a48e7134138bf35.jpg\",\"c6a89a16d7b2bb8a832740e29abed6f5.jpg\"]', '2018-10-26 16:15:24', 'administrator', '2018-10-26 16:15:24', 'administrator', 0, '', '', '', '', '', '', 0, 0),
(3, 1, 'pcx-hybrid-1', 'Pcx hybrid', '', '', 'Pcx hybrid', 'Pcx hybrid', '[{\"title\":\"M\\u00e0u s\\u1eafc \\u0111\\u1eb7c tr\\u01b0ng\",\"content\":\"PCX HYBRID mang h\\u00ecnh \\u1ea3nh \\u0111\\u1eadm n\\u00e9t t\\u01b0\\u01a1ng lai nh\\u1edd m\\u00e0u xanh \\u0111\\u1eb7c tr\\u01b0ng, \\u0111\\u1ea7y \\u1ea5n t\\u01b0\\u1ee3ng.\",\"image\":\"a731fd836ce41b037d06ac0ef160a376.jpg\"}]', '[{\"title\":\"M\\u00f4 t\\u01a1 h\\u1ed7 tr\\u1ee3\",\"content\":\"M\\u00f4 men xo\\u1eafn c\\u1ee7a PCX HYBRID \\u0111\\u01b0\\u1ee3c c\\u1ea3i thi\\u1ec7n \\u0111\\u00e1ng k\\u1ec3, t\\u0103ng 26% t\\u1ea1i v\\u00f2ng tua m\\u00e1y 4000v\\/p so v\\u1edbi PCX150 \\u0111\\u1ed9ng c\\u01a1 x\\u0103ng, gi\\u00fap xe ph\\u1ea3n \\u1ee9ng t\\u1ee9c th\\u00ec theo s\\u1ef1 thay \\u0111\\u1ed5i c\\u1ee7a tay ga v\\u00e0 t\\u0103ng t\\u1ed1c m\\u1ea1nh m\\u1ebd.\",\"image\":\"a5906dbef624a1fe001fa7d5bb1ad1e6.jpg\"}]', '[{\"title\":\"H\\u1ed9c \\u0111\\u1ef1ng \\u0111\\u1ed3\",\"content\":\"H\\u1ed9c \\u0111\\u1ef1ng \\u0111\\u1ed3 tr\\u01b0\\u1edbc v\\u00e0 h\\u1ed9c \\u0111\\u1ef1ng \\u0111\\u1ed3 d\\u01b0\\u1edbi y\\u00ean \\u0111\\u01b0\\u1ee3c thi\\u1ebft k\\u1ebf ti\\u1ec7n l\\u1ee3i, gi\\u00fap ng\\u01b0\\u1eddi d\\u00f9ng ch\\u1ee9a \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u v\\u1eadt d\\u1ee5ng c\\u00e1 nh\\u00e2n.\",\"image\":\"5350e9d9591ac8c9fd133ebc64820c50.jpg\"}]', '134kg', '1.923 x 745 x 1.107mm', '1.313mm', '764mm', '137mm', '8,2 lít', 'Trước: 100/80-14 M/C 48P  Sau: 120/70-14 M/C 61P', 'Ống lồng, giảm chấn thủy lực', 'Lò xo trụ, giảm chấn thủy lực', 'PGM-FI, Xăng, 4 kỳ, 1 xy lanh, làm mát bằng dung dịch', '149,3cm3', '57,3 x 57,9mm', '10,6:1', '10,8 kW/8.500 vòng/phút (Động cơ)  1,4 kW/3.000 vòng/phút (Mô tơ)', '13,6 N.m/6.500 vòng/phút (Động cơ)  4,3 N.m/3.000 vòng/phút (Mô tơ)', '0,9 lít khi rã máy/ 0,8 lít khi thay nhớt', 'Dây đai, biến thiên vô cấp', 'Điện', '', '', '', '', '[{\"title\":\"Phi\\u00ean b\\u1ea3n m\\u1edbi\",\"content\":[{\"title\":\"Xanh \\u0111en\",\"code\":\"Xanh \\u0111en\",\"image\":\"4f53b3b9c8cc47a57fe5f4b1d130755d.jpg\",\"icon\":\"5582ce5f383ef5f032c8534b52b44686.jpg\",\"price\":\"0\"}]}]', '', '[\"11168f976ee57eb0a402f1cf168d51db.jpg\"]', '[\"9729560e3770ac8aefbbc44349e5819a.jpg\"]', '2018-10-26 16:11:19', 'administrator', '2018-10-26 16:11:19', 'administrator', 0, '[\"a731fd836ce41b037d06ac0ef160a376.jpg\"]', '[\"a5906dbef624a1fe001fa7d5bb1ad1e6.jpg\"]', '[\"5350e9d9591ac8c9fd133ebc64820c50.jpg\"]', '[[\"4f53b3b9c8cc47a57fe5f4b1d130755d.jpg\"]]', '[[\"5582ce5f383ef5f032c8534b52b44686.jpg\"]]', '[\"0\"]', 0, 0),
(4, 1, 'q', 'q', '', '', '', '', '[]', '[]', '[]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[{\"title\":\"1\",\"content\":[{\"title\":\"a\",\"code\":\"\",\"image\":\"\",\"icon\":\"\"},{\"title\":\"a\",\"code\":\"\",\"image\":\"\",\"icon\":\"\"}]}]', '', '[]', '[]', '2018-10-26 16:11:03', 'administrator', '2018-10-26 16:11:03', 'administrator', 1, '[]', '[]', '[]', '[[\"\",\"\"]]', '[[\"\",\"\"]]', '', 0, 0),
(5, 1, 've-chung-toi', 'Về chúng tôi', '', '', 'Về chúng tôi', 'Về chúng tôi', '[]', '[]', '[]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[{\"title\":\"V\\u1ec1 ch\\u00fang t\\u00f4i\",\"content\":[{\"title\":\"1\",\"code\":\"1\",\"price\":\"1\",\"image\":\"\",\"icon\":\"\"},{\"title\":\"2\",\"code\":\"2\",\"price\":\"\",\"image\":\"\",\"icon\":\"\"}]},{\"title\":\"V\\u1ec1 ch\\u00fang t\\u00f4i\",\"content\":[{\"title\":\"3\",\"code\":\"3\",\"price\":\"\",\"image\":\"\",\"icon\":\"\"},{\"title\":\"4\",\"code\":\"4\",\"price\":\"4\",\"image\":\"\",\"icon\":\"\"}]}]', '', '[]', '[]', '2018-10-26 16:08:41', 'administrator', '2018-10-26 16:08:41', 'administrator', 1, '[]', '[]', '[]', '[[\"\",\"\"],[\"\",\"\"]]', '[[\"\",\"\"],[\"\",\"\"]]', '[\"1\",\"0\",\"0\",\"4\"]', 0, 0),
(6, 1, 'pcx-hybrid', 'PCX hybrid', '', '', 'PCX hybrid', 'PCX hybrid', '[{\"title\":\"M\\u00e0u s\\u1eafc \\u0111\\u1eb7c tr\\u01b0ng\",\"content\":\"PCX HYBRID mang h\\u00ecnh \\u1ea3nh \\u0111\\u1eadm n\\u00e9t t\\u01b0\\u01a1ng lai nh\\u1edd m\\u00e0u xanh \\u0111\\u1eb7c tr\\u01b0ng, \\u0111\\u1ea7y \\u1ea5n t\\u01b0\\u1ee3ng.\",\"image\":\"1a3fce0b3f6a9a6283f260a61b1b2771.png\"},{\"title\":\"M\\u1eb7t \\u0111\\u1ed3ng h\\u1ed3 LCD\",\"content\":\"M\\u00e0n h\\u00ecnh LCD \\u00e2m b\\u1ea3n hi\\u1ec7n \\u0111\\u1ea1i hi\\u1ec3n th\\u1ecb h\\u00e0i h\\u00f2a th\\u00f4ng tin c\\u00e1c t\\u00ednh n\\u0103ng m\\u1edbi c\\u1ee7a h\\u1ec7 th\\u1ed1ng HYBRID: ch\\u1ebf \\u0111\\u1ed9 l\\u00e1i D\\/S\\/Idling, m\\u1ee9c h\\u1ed7 tr\\u1ee3 c\\u1ee7a M\\u00f4 t\\u01a1, m\\u1ee9c s\\u1ea1c b\\u00ecnh \\u0111i\\u1ec7n HYBRID v\\u00e0 l\\u01b0\\u1ee3ng \\u0111i\\u1ec7n c\\u00f2n l\\u1ea1i, gi\\u00fap ng\\u01b0\\u1eddi l\\u00e1i quan s\\u00e1t ti\\u1ec7n l\\u1ee3i.\",\"image\":\"47e848c08b5fa23fca326147e313dec6.jpg\"},{\"title\":\"\\u0110\\u00e8n \\u0111\\u1ecbnh v\\u1ecb\",\"content\":\"\\u0110\\u00e8n \\u0111\\u1ecbnh v\\u1ecb \\u0111\\u01b0\\u1ee3c thi\\u1ebft k\\u1ebf v\\u1edbi c\\u00e1c d\\u1ea3i m\\u00e0u xanh ph\\u00eda sau ch\\u00f3a \\u0111\\u00e8n, t\\u1ea5t c\\u1ea3 t\\u1ea1o n\\u00ean hi\\u1ec7u \\u1ee9ng m\\u00e0u xanh \\u0111\\u1eb9p m\\u1eaft.\\n\\nThi\\u1ebft k\\u1ebf\\n\",\"image\":\"d9852803a41fb36cc1332221a30ee068.jpg\"}]', '[{\"title\":\"M\\u00f4 t\\u01a1 h\\u1ed7 tr\\u1ee3\",\"content\":\"M\\u00f4 men xo\\u1eafn c\\u1ee7a PCX HYBRID \\u0111\\u01b0\\u1ee3c c\\u1ea3i thi\\u1ec7n \\u0111\\u00e1ng k\\u1ec3, t\\u0103ng 26% t\\u1ea1i v\\u00f2ng tua m\\u00e1y 4000v\\/p so v\\u1edbi PCX150 \\u0111\\u1ed9ng c\\u01a1 x\\u0103ng, gi\\u00fap xe ph\\u1ea3n \\u1ee9ng t\\u1ee9c th\\u00ec theo s\\u1ef1 thay \\u0111\\u1ed5i c\\u1ee7a tay ga v\\u00e0 t\\u0103ng t\\u1ed1c m\\u1ea1nh m\\u1ebd.\",\"image\":\"75a129775048765ee8e49216120a1bfb.jpg\"},{\"title\":\"Th\\u1eddi gian kh\\u1edfi \\u0111\\u1ed9ng c\\u1ee7a Idling Stop\",\"content\":\"Th\\u1eddi gian \\u0111\\u1ec3 ch\\u1ebf \\u0111\\u1ed9 Idling Stop ho\\u1ea1t \\u0111\\u1ed9ng gi\\u1ea3m t\\u1eeb 03 gi\\u00e2y xu\\u1ed1ng c\\u00f2n 0,5 gi\\u00e2y, g\\u00f3p ph\\u1ea7n gi\\u1ea3m ti\\u00eau hao nhi\\u00ean li\\u1ec7u (~2% so v\\u1edbi PCX150 \\u0111\\u1ed9ng c\\u01a1 x\\u0103ng). Ngo\\u00e0i ra, M\\u00f4 t\\u01a1 h\\u1ed7 tr\\u1ee3 \\u0111\\u1ea3m b\\u1ea3o ph\\u1ea3n \\u1ee9ng nhanh nh\\u1ea1y c\\u1ee7a xe khi chuy\\u1ec3n t\\u1eeb tr\\u1ea1ng th\\u00e1i d\\u1eebng sang tr\\u1ea1ng th\\u00e1i chuy\\u1ec3n \\u0111\\u1ed9ng (so v\\u1edbi nh\\u1eefng \\u0111\\u1eddi xe hi\\u1ec7n t\\u1ea1i c\\u00f3 Idling Stop).\",\"image\":\"c54e00dd9166e32ef4ec32c42c5a204f.jpg\"},{\"title\":\"C\\u00e1c ch\\u1ebf \\u0111\\u1ed9 l\\u00e1i\",\"content\":\"Kh\\u00e1ch h\\u00e0ng c\\u00f3 th\\u1ec3 chuy\\u1ec3n \\u0111\\u1ed5i c\\u00e1c ch\\u1ebf \\u0111\\u1ed9 l\\u00e1i: D, S, Idling d\\u1ec5 d\\u00e0ng d\\u1ef1a theo s\\u1edf th\\u00edch ho\\u1eb7c theo t\\u1eebng t\\u00ecnh hu\\u1ed1ng b\\u1eb1ng c\\u00f4ng t\\u1eafc tr\\u00ean tay l\\u00e1i b\\u00ean tr\\u00e1i.\\nCh\\u1ebf \\u0111\\u1ed9 D \\u0111em l\\u1ea1i c\\u1ea3m gi\\u00e1c xe ch\\u1ea1y th\\u01b0 gi\\u00e3n, v\\u1edbi m\\u1ee9c h\\u1ed7 tr\\u1ee3 ti\\u00eau chu\\u1ea9n. Ch\\u1ebf \\u0111\\u1ed9 S v\\u1edbi m\\u1ee9c h\\u1ed7 tr\\u1ee3 cao, \\u0111em l\\u1ea1i ni\\u1ec1m vui trong t\\u1eebng chuy\\u1ec3n \\u0111\\u1ed9ng. Ch\\u1ebf \\u0111\\u1ed9 Idling s\\u1ebd ng\\u1eaft ho\\u1ea1t \\u0111\\u1ed9ng c\\u1ee7a Idling Stop nh\\u01b0ng c\\u1ea3m gi\\u00e1c v\\u1eabn tho\\u1ea3i m\\u00e1i nh\\u01b0 ch\\u1ebf \\u0111\\u1ed9 D.\",\"image\":\"f113340e8bcbcd9a3fc4343b07c752db.jpg\"}]', '[{\"title\":\"H\\u1ed9c \\u0111\\u1ef1ng \\u0111\\u1ed3\",\"content\":\"H\\u1ed9c \\u0111\\u1ef1ng \\u0111\\u1ed3 tr\\u01b0\\u1edbc v\\u00e0 h\\u1ed9c \\u0111\\u1ef1ng \\u0111\\u1ed3 d\\u01b0\\u1edbi y\\u00ean \\u0111\\u01b0\\u1ee3c thi\\u1ebft k\\u1ebf ti\\u1ec7n l\\u1ee3i, gi\\u00fap ng\\u01b0\\u1eddi d\\u00f9ng ch\\u1ee9a \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u v\\u1eadt d\\u1ee5ng c\\u00e1 nh\\u00e2n.\",\"image\":\"c9c132a964622e0883a5b6fd8bda3156.jpg\"},{\"title\":\"Gi\\u1ea3m x\\u00f3c hi\\u1ec7n \\u0111\\u1ea1i\",\"content\":\"H\\u00e0nh tr\\u00ecnh phu\\u1ed9c sau d\\u00e0i, c\\u00f9ng l\\u00f2 xo 3 c\\u1ea5p xo\\u1eafn t\\u1ea1o c\\u1ea3m gi\\u00e1c l\\u00e1i tho\\u1ea3i m\\u00e1i tr\\u00ean m\\u1ecdi \\u0111i\\u1ec1u ki\\u1ec7n m\\u1eb7t \\u0111\\u01b0\\u1eddng.\",\"image\":\"9b5f95a37adbb2c733fdcfb63b247884.jpg\"},{\"title\":\"H\\u1ec7 th\\u1ed1ng kh\\u00f3a th\\u00f4ng minh\",\"content\":\"H\\u1ec7 th\\u1ed1ng kh\\u00f3a th\\u00f4ng minh kh\\u00f4ng ch\\u1ec9 \\u0111em l\\u1ea1i nh\\u1eefng ti\\u1ec7n \\u00edch cao c\\u1ea5p m\\u00e0 c\\u00f2n kh\\u1eb3ng \\u0111\\u1ecbnh m\\u1ea1nh m\\u1ebd h\\u00ecnh \\u1ea3nh HYBRID nh\\u1edd v\\u1ecf b\\u1ecdc m\\u00e0u xanh \\u0111\\u1eb7c tr\\u01b0ng c\\u1ee7a ch\\u00eca kh\\u00f3a.\",\"image\":\"802952a92ed36082f6841a3b02d35176.jpg\"}]', '134kg', '1.923 x 745 x 1.107mm', '1.313mm', '764mm', '137mm', '8,2 lít', 'Trước: 100/80-14 M/C 48P  Sau: 120/70-14 M/C 61P', 'Ống lồng, giảm chấn thủy lực', 'Lò xo trụ, giảm chấn thủy lực', 'PGM-FI, Xăng, 4 kỳ, 1 xy lanh, làm mát bằng dung dịch', '149,3cm3', '57,3 x 57,9mm', '10,6:1', '10,8 kW/8.500 vòng/phút (Động cơ)  1,4 kW/3.000 vòng/phút (Mô tơ)', '13,6 N.m/6.500 vòng/phút (Động cơ)  4,3 N.m/3.000 vòng/phút (Mô tơ)', '0,9 lít khi rã máy/ 0,8 lít khi thay nhớt', 'Dây đai, biến thiên vô cấp', 'Điện', '', '', '', '', '[{\"title\":\"Phi\\u00ean b\\u1ea3n duy nh\\u1ea5t\",\"content\":[{\"title\":\"Xanh \\u0111en\",\"code\":\"PCX HYBRID\",\"price\":\"89990000\",\"image\":\"661b8f7b12e9d09c302c45131cc0ee87.png\",\"icon\":\"65a94b2a548288eed525b2408f3bcb37.png\"}]}]', '', '[\"92a9c5e2b0ab3a036ac744dcd8454fde.jpg\"]', '[\"6eadc414d213107860ac5211941580f3.jpg\"]', '2018-10-26 16:08:39', 'administrator', '2018-10-26 16:08:39', 'administrator', 0, '[\"1a3fce0b3f6a9a6283f260a61b1b2771.png\",\"47e848c08b5fa23fca326147e313dec6.jpg\",\"d9852803a41fb36cc1332221a30ee068.jpg\"]', '[\"75a129775048765ee8e49216120a1bfb.jpg\",\"c54e00dd9166e32ef4ec32c42c5a204f.jpg\",\"f113340e8bcbcd9a3fc4343b07c752db.jpg\"]', '[\"c9c132a964622e0883a5b6fd8bda3156.jpg\",\"9b5f95a37adbb2c733fdcfb63b247884.jpg\",\"802952a92ed36082f6841a3b02d35176.jpg\"]', '[[\"661b8f7b12e9d09c302c45131cc0ee87.png\"]]', '[[\"65a94b2a548288eed525b2408f3bcb37.png\"]]', '[\"89990000\"]', 0, 0),
(7, 1, 'q-1', 'q', '', '', 'q', 'q', '[]', '[]', '[]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '[]', '[]', '2018-10-25 09:39:23', 'administrator', '2018-10-25 09:39:23', 'administrator', 1, '[]', '[]', '[]', '[[]]', '[[]]', '[]', 1, 0),
(8, 2, 'q-2', 'q', '', '', 'q', 'q', '[]', '[]', '[]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '[]', '[]', '2018-10-25 09:40:39', 'administrator', '2018-10-25 09:40:39', 'administrator', 1, '[]', '[]', '[]', '[]', 'null', '[]', 0, 0),
(9, 2, 'gold-wing', 'Gold Wing', 'Điều gì đang đợi chúng ta phía bên kia đường chân trời? Bên kia thành phố nơi chúng ta sống? Bên kia những điều quen thuộc và chẳng mấy bất ngờ? Và đâu là cách để trải nghiệm trọn vẹn nhất những điều thật mới mẻ kia? Chúng tôi chọn cách ngao du trên những chiếc mô tô cỡ lớn nhưng linh hoạt, dễ điều khiển, mang trọn cảm hứng “chất ngất”. Hãy thử lướt trên cùng một con đường bằng xe hơi hay xe đạp, đến cùng một nhà hàng, ngắm nhìn cùng một cảnh vật rồi sau đó nói cho chúng tôi biết đâu mới là chuyến đi đáng nhớ nhất.\r\n\r\nHonda Gold Wing 2018 được thiết kế để bạn trải nghiệm hết mình trong mỗi chuyến hành trình. Việc đổi sang sử dụng một chiếc xe chất lượng và tinh tế như Gold Wing không phải là chuyện nhỏ. Vì thế, chúng tôi đã nỗ lực đưa vào các yếu tố: Kỹ thuật, Khả năng kiểm soát, Công nghệ, Trải nghiệm thoải mái, Tính năng vận hành. Tất cả những tính năng này chúng tôi đưa vào Gold Wing nhằm biến nó thật sự trở thành một cỗ máy hoàn hảo, xứng đáng cho những ai dám sở hữu. Điều gì đang đợi phía trước? Hãy cầm chắc tay lái và khám phá đi thôi.', '', 'Gold Wing', 'Gold Wing', '[{\"title\":\"H\\u1ec7 Th\\u1ed1ng Treo Thanh Gi\\u1eb1ng K\\u00e9p Cho Gi\\u1ea3m X\\u00f3c Tr\\u01b0\\u1edbc\",\"content\":\"Thay th\\u1ebf c\\u00e1c c\\u1ea5u tr\\u00fac gi\\u1ea3m x\\u00f3c d\\u00f9ng phu\\u1ed9c \\u1ed1ng l\\u1ed3ng quen thu\\u1ed9c, Gold Wing s\\u1eed d\\u1ee5ng h\\u1ec7 th\\u1ed1ng treo v\\u1edbi hai khung ch\\u00e2n v\\u1eefng ch\\u00e3i v\\u1edbi k\\u1ebft c\\u1ea5u ch\\u1eef \\u201cA\\u201d v\\u00e0 m\\u1ed9t l\\u00f2 xo tr\\u1ee5 \\u0111\\u01a1n. Thi\\u1ebft k\\u1ebf n\\u00e0y gi\\u00fap thay \\u0111\\u1ed5i h\\u01b0\\u1edbng di chuy\\u1ec3n c\\u1ee7a b\\u00e1nh tr\\u01b0\\u1edbc khi l\\u00f2 xo n\\u00e9n l\\u1ea1i, gi\\u00fap b\\u00e1nh xe di chuy\\u1ec3n l\\u00ean xu\\u1ed1ng theo ph\\u01b0\\u01a1ng th\\u1eb3ng \\u0111\\u1ee9ng h\\u01a1n, gi\\u00fap gi\\u1ea3m thi\\u1ec3u rung ch\\u1ea5n t\\u00e1c \\u0111\\u1ed9ng l\\u00ean xe v\\u00e0 ng\\u01b0\\u1eddi l\\u00e1i, \\u0111em l\\u1ea1i c\\u1ea3m gi\\u00e1c tho\\u1ea3i m\\u00e1i t\\u1ed1i \\u0111a khi v\\u1eadn h\\u00e0nh. \",\"image\":\"5ca18eaf716746044ae3e6b77e08fd8f.jpg\"}]', '', '', '383kg', '2,575mm x 905mm x 1,555mm', '1,695mm', '745mm', '130mm', '21L', 'Lốp trước: 130/70 R18 Lốp sau: 200/55 R16', 'Hệ thống treo thanh giằng kép với lò xo trụ đơn, tải trước lò xo và mức giảm chấn điều chỉnh điện tử', 'Lò xo trụ đơn Pro-link, giảm chấn thuỷ lực, tải trước lò xo và mức giảm chấn điều chỉnh điện tử', 'SOHC, 4 kỳ, 6 xi lanh, PGM-FI, làm mát bằng chất lỏng', '1,833cc', '73mm x 73mm', '10.5:1', '93 kW / 5,500 vòng/phút', '170 Nm / 4,500 vòng/phút', '4.4L khi thay nhớt  4.6L khi thay nhớt và bộ lọc', 'DCT, 7 số', 'Điện', '30°30\'', '109mm', 'Đĩa thuỷ lực kép, 6 pít tông, ABS', 'Đĩa thuỷ lực đơn, 3 pít tông, ABS', '[{\"title\":\"\\u0110\\u1ecf \\u0111en b\\u1ea1c\",\"code\":\"NH463\",\"price\":\"1200000000\",\"image\":\"a62b32747ccea04ed2d8959f915e7136.jpg\"},{\"title\":\"1\",\"code\":\"1\",\"price\":\"1\",\"image\":\"ea40482c20514ca1189aa7bfc1e28bc6.jpg\"}]', '', '[\"5b9c5c3b16194b3d877af39992d7a3cb.jpg\"]', '[\"eff36d7019540abd8572efa2ded6c67d.jpg\"]', '2018-10-25 12:56:23', 'administrator', '2018-10-25 12:56:23', 'administrator', 0, '[\"5ca18eaf716746044ae3e6b77e08fd8f.jpg\"]', '', '', '[\"a62b32747ccea04ed2d8959f915e7136.jpg\",\"ea40482c20514ca1189aa7bfc1e28bc6.jpg\"]', 'null', '[\"1200000000\",\"1\"]', 0, 1),
(10, 1, 'blade-110cc', 'Blade 110cc', '', '', 'Blade 110cc', 'Blade 110cc', '[{\"title\":\"1\",\"content\":\"2\",\"image\":\"18c938d021aa61aa9d3eef2ee57d0ba2.jpg\"}]', '[]', '[]', 'Phiên bản tiêu chuẩn: 98kg  Phiên bản thể thao: 99kg', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', 'Phiên bản tiêu chuẩn: 1.920 x 690 x 1.075 mm  Phiên bản thể thao: 1.920 x 702 x 1.075 mm', '', '', '', '', '[{\"title\":\"a\",\"content\":[{\"title\":\"2\",\"code\":\"1\",\"price\":\"3\",\"image\":\"0fbd04b2917eb71f1466986a64230841.png\",\"icon\":\"44dafa62e1b9cfacc392764f2590fc2e.png\"}]}]', 'c05619f30ef8391d51bad21793c8f3eb.jpg', '[\"c05619f30ef8391d51bad21793c8f3eb.jpg\"]', '[\"9f3fc7e10e62cdb5f1eb7fca022b2e5e.jpg\",\"fba8d7bf447b13cb8674dc6f4f734f25.jpg\"]', '2018-10-26 16:08:36', 'administrator', '2018-10-26 16:08:36', 'administrator', 0, '[\"18c938d021aa61aa9d3eef2ee57d0ba2.jpg\"]', '[]', '[]', '[[\"0fbd04b2917eb71f1466986a64230841.png\"]]', '[[\"44dafa62e1b9cfacc392764f2590fc2e.png\"]]', '[\"3\"]', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakeywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `sort` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0 : xe thông dụng; 1 : motor',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `slug`, `title`, `content`, `metakeywords`, `metadescription`, `project`, `image`, `sort`, `type`, `is_activated`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'dv-sua-chua', 'DV SỬA CHỮA', 'DV SỬA CHỮA', 'DV SỬA CHỮA', 'DV SỬA CHỮA', '', 'fbcfc4fc31889909a7b8579fb84a7142.jpg', NULL, 0, 0, 0, '2018-10-26 14:22:37', 'administrator', '2018-10-26 14:22:37', 'administrator'),
(2, 'tin-tong-hop', 'TIN TỔNG HỢP 1', 'TIN TỔNG HỢP', '', '', '', '28f011e45b16fd618ee16b2a1b740497.jpg', NULL, 1, 0, 0, '2018-10-23 10:56:27', 'administrator', '2018-10-23 10:56:27', 'administrator'),
(3, 'tin-dn', 'TIN DN', 'TIN DN', 'TIN DN', 'TIN DN', '', 'd6358378f341ed04fc62627c0db001ab.jpg', NULL, 1, 0, 0, '2018-10-26 14:35:44', 'administrator', '2018-10-26 14:35:44', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `shop_type_id` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `region` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: bac, 2: trung, 3: nam',
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`id`, `title`, `image`, `shop_type_id`, `address`, `region`, `phone`, `email`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Cửa Hàng', '1598c23ed6d4b48c8adb669b84636b45.jpg', 1, '19 Nguyễn Bỉnh Khiêm', 1, '0916595514', 'luongquochung.249@gmail.com', 1, '2018-10-23 17:59:53', 'administrator', '2018-10-23 17:59:53', 'administrator'),
(2, 'Cửa Hàng 1', '5ae00afd967bc109b2497e6ca12df220.jpg', 2, '19 Nguyễn Bỉnh Khiêm 1', 1, '0916595514', 'luongquochung.249@gmail.com', 0, '2018-10-26 14:30:29', 'administrator', '2018-10-26 14:30:29', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_type`
--

CREATE TABLE `shop_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shop_type`
--

INSERT INTO `shop_type` (`id`, `title`, `slug`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'HEAD', 'head', 0, '2018-10-23 15:53:09', 'administrator', '2018-10-23 15:53:09', 'administrator'),
(2, 'Honda Moto', 'honda-moto', 0, '2018-10-23 16:03:53', 'administrator', '2018-10-23 16:03:53', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_sessions`
--

CREATE TABLE `site_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `site_sessions`
--

INSERT INTO `site_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('07nrdddkcvq4bveca1vodfv7p26j3mb4', '::1', 1540522317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532323331373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('0ame3nfcmhveo44r1fu41cmbeoppklv7', '::1', 1540527146, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532373134363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('0il1m3ib0asqvhv3jbp5uc0h7unekn86', '1.55.93.60', 1532924292, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533323932343238343b6c616e67416262726576696174696f6e7c733a323a227669223b),
('0jufp7t7dnnecdcdnpamgf6b6mul83vs', '::1', 1540292377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303239323337373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('0uo33kqp8n1kshmbkucpbivjdg3pf1fq', '::1', 1540459907, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435393930373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('0v3h07vh88omv6bjqc3e8s7132qbc0vg', '::1', 1533013079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333031333037393b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353332353932383937223b6c6173745f636865636b7c693a313533333031323735313b),
('0vqtr6c21v2ivtmhko7o7gg69uf78tv2', '::1', 1540264710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236343731303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('14ad3kjh7aauqgubb3sikbmdejvknn7u', '::1', 1540267260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236373236303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('1oaijp48pe6a5odn7ms4e3rel3j7pf1p', '::1', 1540461860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436313836303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('284kfd1qdg7qka05aimqruahi02r51e9', '::1', 1540454938, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435343933383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('2gteekcalfev6sitbm7133b45m1ng5r2', '::1', 1540375971, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337353937313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('3agg9frl16vfpjj8hrnn92tc710i7hv1', '::1', 1533021602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333032313630323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353333303132373531223b6c6173745f636865636b7c693a313533333032313236363b6c616e67416262726576696174696f6e7c733a323a227669223b),
('3els456blnpd2b7nq4ili3beusk9jqpk', '::1', 1540460547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436303534373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('3j2p9ekr2i7l7sf240tnbsv1tkfm6vn4', '::1', 1540458088, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435383038383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('3llmlaaao4t8gphrjdj7n1a58v2f4vo6', '::1', 1540266932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236363933323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('3lvsm25kuue70e8pf8q6rsurjc8tteef', '::1', 1540462195, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436323139353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('4mqbplj28oa9ldel2a7o6ltumfcfld69', '::1', 1540538002, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303533383030323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('4ocgrtpelgbq60u4u0jesakkki5or10j', '::1', 1540376277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337363237373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('569m5rhs9lqfcrls5jcm0tqhvdo8rg52', '::1', 1540457308, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435373330383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('5n2qvbkkdfq5qd73h76d0qboffaj4dc5', '::1', 1533013471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333031333437313b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353332353932383937223b6c6173745f636865636b7c693a313533333031323735313b),
('5sav09g787h5veuudsko1tljltoa5sg5', '::1', 1540279271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303237393237313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('645l754nfmo5sqtfjcphcfjpm6ose9kt', '::1', 1540268694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236383639343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('66ragco25gf1jf6fqa0j4junfrumgu0c', '::1', 1540372075, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337323037353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('6ae8qbah1kpc66oh9u613m92cbtiirm6', '::1', 1540456673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435363637333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226e6577223b7d),
('6d28jhd9c65lgtg4reb6albf1dep81es', '::1', 1540287999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238373939393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('6knnd7dasc3srl446l46aec6c954ns5c', '::1', 1540269070, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236393037303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('76l7j4c0uajpeju4q4s6j3j2qdpeoil9', '::1', 1540529402, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532393430323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('7b7s2mvhnmcnd9rrplhbh6pt4qkodbeh', '::1', 1540375306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337353330363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('7o6rct2jul1mgpf697siamv5nnukjsbs', '::1', 1540460224, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436303232343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('7pr4ke51q0tbhl0pufed9v4qfu5q1rrr', '::1', 1540456325, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435363332353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('8cfj3jm3dtqbb9kta3c6okq765pd4b5n', '::1', 1540786939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303738363836323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('8cjs3difvjfmg2vvmvam04nbfmbf166o', '::1', 1533267195, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333236373139353b6c616e67416262726576696174696f6e7c733a323a227669223b),
('8eqt3fk4kkku6p4ji6p5t82mdks6jbk4', '::1', 1540278025, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303237383032353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('8id9rnhknr7l3cukea2a5r9vf0vji685', '::1', 1540366169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336363136393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('90ugp70m118umnu80b482cqfq4hc8sg1', '::1', 1540458830, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435383833303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('926s2vonuoav5m20cn9119uvpag2r2qg', '::1', 1540269372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236393337323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b6d6573736167655f737563636573737c733a31393a2253e1bbad61207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('9obtd19hi18p82l3lr4oa296ikjp0q82', '::1', 1540454271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435343237313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('aqgab7mgk78u2sii5k7c2lgavnfnrq18', '::1', 1540538724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303533383732343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('as4jskgo87jpd5i5263k25rceba9dqkb', '::1', 1540204277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303230343237363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353335303137313135223b6c6173745f636865636b7c693a313534303230323335303b),
('ascrb65c86c7f047vkagu6g2vs3o425r', '::1', 1540269958, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236393935383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('au2sf7i7mfl2rg17bclbipgkp079e7uc', '::1', 1540372380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337323338303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('b4g5jmtho0stsamvh30akset9c7vgq18', '::1', 1540280862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238303836323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('b93gf1dcevmdqt0lrft3qvju0v36as92', '::1', 1540282242, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238323234323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('bjvm6boogfdmusqea0f61d7qmcj1g4bs', '117.1.113.94', 1533009213, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333030393231323b6c616e67416262726576696174696f6e7c733a323a227669223b),
('c1lmmgp7sh848m2sbhbk85086q3u0in4', '::1', 1540265704, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236353730343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('c2fkgl1lc0idej1dcmf6r9homaonq18a', '::1', 1533012777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333031323737373b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353332353932383937223b6c6173745f636865636b7c693a313533333031323735313b),
('c8g30nbpmna3kgbqjb2bd7e7lknsk1t1', '::1', 1540459141, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435393134313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('cbfu6kbsj8udo1a4dps35l7l8hkpj8jd', '::1', 1540290315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303239303331353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('cbof7g4f711drvk5s4jc20fli6t86bft', '::1', 1540367256, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336373235363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226e6577223b7d),
('cln42em022avvrb4ecn17idg9usjketr', '::1', 1534498733, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533343439383733333b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353333313934303636223b6c6173745f636865636b7c693a313533343439343938303b),
('cucgucnpqfnrrt51fn465e8bf8ako1au', '::1', 1540284626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238343632363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('d24a8o8560de3n80vkc7pu1vv0bh7ksd', '::1', 1540280543, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238303534333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('d79ngj2h55je0sdpgmrvo2l3m271cr29', '::1', 1535015948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353031353638383b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353334343934393830223b6c6173745f636865636b7c693a313533353031353639383b),
('d89kou4suo2akjhpmrg6eotfagn0pn3b', '::1', 1540528113, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532383131333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('e60bicbs102q9ftr19cb4jgrs5g791r6', '::1', 1540463779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436333737393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('e6g5j787nc41vhgdnhcnef8m0tudiqea', '::1', 1540364788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336343738383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('eb74ohkg9bkq65utm58k19v74hb19g6f', '14.162.147.211', 1532941748, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533323934313731393b6c616e67416262726576696174696f6e7c733a323a227669223b),
('ec0dpjj7iugf3188i9inj2edps459bip', '::1', 1540365265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336353236353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('ejjsgrnd51l2c89varidik7237a5djjc', '::1', 1533013879, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333031333837393b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353332353932383937223b6c6173745f636865636b7c693a313533333031323735313b),
('el0sk4ejc5m3g63k5r1i022p9tdjdh6k', '::1', 1537954636, ''),
('euoo0ul7i9e94it3mr0dhudr91v84srf', '::1', 1540278959, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303237383935393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('f5los7i8iadu095vheu66ga85ocss70r', '::1', 1540373914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337333931343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('f7lt7tq532j77n1occlmeht5ei2dtg8e', '::1', 1540290668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303239303636383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('frk4314iq902ng65l8bqlemsc64g6m3b', '::1', 1540281932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238313933323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('fuf1r1ehgti4urfs5q5fv91sev6bg18u', '::1', 1540284945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238343934353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('gf6k5j3gfjnvq67njvvc32dgmom89cld', '::1', 1540452443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435323434333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('glqped68v05ft81e47l52op57nb6g9dp', '::1', 1540285319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238353331393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('gs23idb9has1eurco44mrvd4rduacncm', '::1', 1540453970, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435333937303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('gs8gpdnk4lo56rihc5rjrpslsj34kkoe', '::1', 1540521985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532313938353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('gsgq7dv1l57cmiss5gq86h0sp04f5l8n', '::1', 1540463298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436333239383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('h3j6j0hq1u0fe3j6jhkvqrrko6b3kjq6', '::1', 1540265395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236353339353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('hpoei72sjohbjgnj9bn9et095j7idri4', '::1', 1540786091, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303738363039313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('icdfcvr3sagh422e5qul3lnsd4pcqqm4', '::1', 1540266462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236363436323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b6d6573736167655f737563636573737c733a31393a2253e1bbad61207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('ie7jaa3v8n5k3qvj4hkl01jcs57e9kfc', '::1', 1540264404, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236343430343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('if32nlvtebk5lpu9kaifk699d7u1k1pr', '::1', 1540461511, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436313531313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('ircpheq0b9qd1jc4bi17fq74fb5g181k', '::1', 1540291017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303239313031373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('j6c5dobt8h0pg5onhelqp1refiucocbf', '::1', 1533267200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333236373139353b6c616e67416262726576696174696f6e7c733a323a227669223b),
('jk5qqqoqqrdtv1g7ajebrtpnqtb04bf9', '::1', 1540785789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303738353738393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('jna236q96us45m9kr4j169nkd5n1r4hh', '::1', 1540522832, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532323833323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('jpqetl1ljou3usfi11app201s7ah314t', '::1', 1540281321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238313332313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('k09f1v6lhsl3ubs15tcjatejredu51q5', '::1', 1540375620, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337353632303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('k4v3rqlkss7rtsk3d3fuo6jhthlirgdk', '::1', 1540457006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435373030363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('k5uvmovc1edpoeart6vhtmuhg4m7qk4n', '::1', 1540372763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337323736333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6d6573736167655f737563636573737c733a31393a2253e1bbad61207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('kgsuv7pqmpb91sde1cgd2jqlqitg5oap', '::1', 1540459449, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435393434393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('lbb3rjkh29m4nbh0nvd57clplfre6p1u', '::1', 1540452119, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435323131393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('lh530pddlsuht76hapdp4bktmeeebkfi', '::1', 1540370054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337303035343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('lvgnchkhldecu543d3srph2uf5anqsan', '::1', 1540455532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435353533323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('mg2eftpdeha2r5hqi019r7dpv5kkhf1p', '::1', 1540265031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236353033313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('mkijfl5mvbqh00efgsop5j4klu0bvltk', '::1', 1533014122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333031333837393b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353332353932383937223b6c6173745f636865636b7c693a313533333031323735313b),
('mt9n0o9pk0if365imj45arau35alcrca', '::1', 1535017129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353031373130353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353335303135363938223b6c6173745f636865636b7c693a313533353031373131353b),
('n1s1ua92m7g004rvl36bqib3qpi6h1im', '::1', 1540366799, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336363739393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('ndpg650h0e9ldbf0g5lbl00u4qne77ce', '::1', 1533021775, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333032313630323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353333303132373531223b6c6173745f636865636b7c693a313533333032313236363b6c616e67416262726576696174696f6e7c733a323a227669223b),
('njfmrsgjupn60en4pvb4r523p7fa0i9i', '::1', 1540263482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236333438323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('np3g3aqtt75q67nrt2594sem46eg3p87', '::1', 1540260790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236303436353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323032333530223b6c6173745f636865636b7c693a313534303236303535363b),
('o3et72n9glr83gbugrq8vj89b9gc0raf', '::1', 1540454572, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435343537323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('oj5d7tlp9g63vgb6empm2k1vlaojp50h', '::1', 1540291320, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303239313332303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('p0g55t6l7riutddk2mhj9s3db27mv5fn', '::1', 1540282616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238323631363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('p6l0d0039a5jkmoa3j02inu0gni6kt8m', '::1', 1540527781, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532373738313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('p6m1361n8c196lh22sltlkj31ae1if6q', '::1', 1540540097, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303534303039373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('pcvh9b8a6umql2cei38a6erhe7hcjiec', '::1', 1540292471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303239323337373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('phj8ta3utahsbk0nklvu4mb57a5hgrs2', '::1', 1540281623, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238313632333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('pj3iuut8o0deiukorfb895t4strf6b0r', '::1', 1540785473, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303738353437333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('pplrgcqf3eotgd279thtnjomjsgvbb4f', '::1', 1540365817, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336353831373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('pqujat2mcvgvbhqst4khoa2cga1421eh', '::1', 1540280225, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238303232353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('pr80n5eo8bluict0p5cbvq3n9836g24r', '::1', 1540292072, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303239323037323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('pt7427d5dpsr25kc5s547f4lgf97jpgv', '::1', 1540374252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337343235323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('q5oa37a75nin9q73pehupoakep03d5c2', '::1', 1540457735, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435373733353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('q90026eeniur4t451la212eh6befg10h', '::1', 1540268073, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236383037333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('qarvgqb97pl72do892hkt0tchomoguq3', '::1', 1540462512, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436323531323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('qhbs7utm39bampn52orho826f8j7fqbb', '::1', 1540363758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336333735383b),
('qkag23fu5q5vfa73b59jtt0vu8v1q39d', '::1', 1540279918, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303237393931383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('r703rq1mj47qdovue4naraei9rohrd3v', '::1', 1540527477, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303532373437373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('ru589773vtr1o9ir5edr7q9obqdfum9h', '::1', 1540376580, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337363538303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('s09otaues6g8k57d770n2hqp2cniv1cn', '::1', 1540286778, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238363737383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('s6rekj34r8cuka19tu3h1amthfmu456q', '::1', 1540458517, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435383531373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('s91tn17j3slpd5hvognles433qabbc7d', '::1', 1540455890, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303435353839303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('sd7bckp94l4kfvh78ub08045kpig1lk1', '::1', 1533194077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333139343035343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353333303231323636223b6c6173745f636865636b7c693a313533333139343036363b),
('t1incjcct0k5apq88jvs2nkkpt21p1jj', '::1', 1540543080, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303534333038303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('tctvbstom76o7le67uk9btlvto1mj5rf', '::1', 1540204276, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303230343237363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353335303137313135223b6c6173745f636865636b7c693a313534303230323335303b);
INSERT INTO `site_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('tp5sastgv3ptbfuhtf36fv5eca6isom4', '::1', 1540461028, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436313032383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('u06ivc0igb2usa7mdb8vcj9vc7eiga20', '::1', 1540364246, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303336343234363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('u3ip4nuuhk8v43036equb4covde44n78', '::1', 1534498753, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533343439383733333b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353333313934303636223b6c6173745f636865636b7c693a313533343439343938303b),
('u83dgq988vhnv44coln7es913ddca7cu', '::1', 1540538409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303533383430393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('udmdb5a36cpavdp2p5nn5bttkk7tt09e', '::1', 1540287136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238373133363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('uj7h1q45tchtc99ubhb2m3vbp4e4hk8o', '::1', 1540374974, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337343937343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('upc4fjn8lf4s7e78vss1bh1kedmibupm', '::1', 1540786862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303738363836323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('v425ntagnkrf27k08d49jtq4ijjiseu9', '::1', 1540203011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303230333031313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353335303137313135223b6c6173745f636865636b7c693a313534303230323335303b),
('v8j1r2qgr7g9iq8ikrv5inujrippm95g', '::1', 1540370475, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337303437353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('v9pdr4u165d2rul3vovmd8uvt1np8auk', '::1', 1540539029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303533393032393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('vb82qps1793qs8f0ut1b634ucgte2i03', '::1', 1540374559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303337343535393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b),
('vh4e686q70iqsg9u8rlihqdc9kt9ddee', '::1', 1540796598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303739363535343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373830223b6c6173745f636865636b7c693a313534303739363536323b),
('vjpmtinidt8jpa6fvj4vu8hjqto20bit', '::1', 1540286417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303238363431373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b),
('vl8810cb2s995vi7eeg7h0hh2t9qqvb1', '::1', 1540462909, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303436323930393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430333633373732223b6c6173745f636865636b7c693a313534303336333738303b6c616e67416262726576696174696f6e7c733a323a227669223b),
('vo7nc9k3bt2v2atgsrlq2f07cikslbip', '::1', 1540202678, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303230323637383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353335303137313135223b6c6173745f636865636b7c693a313534303230323335303b),
('vss77cjuthg2kbsjrgi0vmsaomiirp9v', '::1', 1540263999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303236333939393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353430323630353536223b6c6173745f636865636b7c693a313534303236313539373b);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `age`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1540796562, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL),
(2, '::1', 'asdas', '$2y$08$PpWSK2unjydxp3spURaQIeF0XLE0W70gsd0TD9pit699I.YgN2DAC', NULL, 'admin@admin.com1', NULL, NULL, NULL, NULL, 1527177316, NULL, 0, '', 'asdas', '', '121231', ''),
(3, '::1', 'minhtruong', '$2y$08$YPNhvgbGnA7jbd9HyjXO0./rYZmIXRje/UcB7523ZAy1xg5BOjfGa', NULL, 'minhtruong93gtvt@gmail.com', NULL, NULL, NULL, NULL, 1527177780, 1527179552, 1, '', 'minhtruong', 'mato', '123', '1'),
(4, '::1', 'a', '$2y$08$kDxKWvqs.XWwiD7LHvs2AuG.Uzu4NWhm498URqvjIUYfV3PzfQHim', NULL, 'minhtruong93gtvt@gmail.com1', NULL, NULL, NULL, NULL, 1527178136, NULL, 0, '', 'a', 'mato', '123123', '12'),
(5, '::1', 'Minh Trường', '$2y$08$RzELUGHvx8MtPpATO4/1xuQqG3iKiVsluuuuW9GHcd/lijGyPt8YC', NULL, 'minhtruong93gtvt@gmail.com2', NULL, NULL, NULL, NULL, 1527178552, NULL, 1, '', 'Minh Trường', 'mato', '0985767862', '25'),
(6, '::1', 'Minh Trường', '$2y$08$eFnAMTSd9nK8tyZQNcNlVeWv82KfRkF18pF8Lh7gxbJWCSZF3grMG', NULL, 'minhtruong93gtvt@gmail.com2', NULL, NULL, NULL, NULL, 1527178625, NULL, 1, '', 'Minh Trường', 'mato', '0985767862', '25'),
(7, '::1', 'asd', '$2y$08$VLybd2Ow93i3lknQtDqpIeoMf3xP7v38m9JYML2VM8dowCepDvyP.', NULL, 'a@gmail.com', NULL, NULL, NULL, NULL, 1527179462, NULL, 1, '', 'asd', '', '123', ''),
(8, '::1', 'Minh', '$2y$08$SbJuXh7GnCBqPBvYRTEcMONjoU8TZ8u0ZzDez2z3QP7TivGnE/iH.', NULL, 'hanguyen@user.com', NULL, NULL, NULL, NULL, 1527432498, NULL, 1, '', 'Minh', 'mato', '0985767862', '26'),
(9, '::1', '1232', '$2y$08$FF9cU4VevU3PqW8SJ39bcuVDOVvauKoECc68nn.3CDc6bl8GindX2', NULL, 'asdas@gmail.com', NULL, NULL, NULL, NULL, 1527433031, NULL, 1, '', '1232', '', '1231', ''),
(10, '::1', 'asdasd', '$2y$08$o/tFkN0LG5IxWpsDHNK0KemUM8OvGEiY3Ao1B7eJO6uvB5lrpYALm', NULL, 'aa@gmail.com', NULL, NULL, NULL, NULL, 1527504887, NULL, 1, '', 'asdasd', 'asda', '123123', '12'),
(11, '::1', 'Minh Truong', '$2y$08$Bi2qBwrxcSPkgFlq0xCwLOQbnQH348SZpZt5IRG5mT7/t/y3dbT6G', NULL, 'minhtruong93gtvt@gmail.com111', NULL, NULL, NULL, NULL, 1527523354, NULL, 1, '', 'Minh Truong', 'mato', '0985767862', '26'),
(12, '::1', 'Test', '$2y$08$WIF4VSIReuADjylqq0PeIO/0xapxmvMq9EL8/osUzL.X9MdnvFute', NULL, 'minhtruong93gtvt@gmail.com12', NULL, NULL, NULL, NULL, 1528288091, 1528295244, 1, '', 'Test', 'Mato', '0985767862', '25'),
(13, '::1', 'Do Minh Minh', '$2y$08$BconVYwp22s1nsQX8.X6iewac3bdgoQ4QPY2Qc8GaLrynqT4M7HfW', NULL, 'minhtruong93gtvt@gmail.com123', NULL, NULL, NULL, '/2NIvlwW8v3xZvePhIOIS.', 1528295320, 1528295517, 1, '', 'Do Minh Minh', 'MatoCreative', '0985767862', '25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2),
(11, 10, 2),
(12, 11, 2),
(13, 12, 2),
(14, 13, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video_library`
--

CREATE TABLE `video_library` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iframe` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `video_library`
--

INSERT INTO `video_library` (`id`, `title`, `iframe`, `description`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Video 1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/O_T1boJt4pU\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Video 1', 1, '2018-10-26 11:15:11', 'administrator', '2018-10-26 11:15:11', 'administrator'),
(2, 'Video 3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/RjrnTgoS_tE\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Video 2', 1, '2018-10-26 11:32:08', 'administrator', '2018-10-26 11:32:08', 'administrator');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `accessary`
--
ALTER TABLE `accessary`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Chỉ mục cho bảng `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_type`
--
ALTER TABLE `shop_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `site_sessions`
--
ALTER TABLE `site_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  ADD KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE;

--
-- Chỉ mục cho bảng `video_library`
--
ALTER TABLE `video_library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `accessary`
--
ALTER TABLE `accessary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `shop_type`
--
ALTER TABLE `shop_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `video_library`
--
ALTER TABLE `video_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

--
-- Các ràng buộc cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
