-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Sep 2018 pada 08.53
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cicooldev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mso_channel`
--

CREATE TABLE IF NOT EXISTS `mso_channel` (
`ID` int(11) NOT NULL,
  `Wilayah` varchar(55) DEFAULT NULL,
  `KodeWilayah` varchar(55) DEFAULT NULL,
  `MSO` varchar(55) DEFAULT NULL,
  `Channel` varchar(55) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mso_channel`
--

INSERT INTO `mso_channel` (`ID`, `Wilayah`, `KodeWilayah`, `MSO`, `Channel`) VALUES
(2, 'WMD', 'A', 'A03', 'PPU'),
(3, 'WMD', 'A', 'A04', 'PPP'),
(4, 'WMD', 'A', 'A09', 'BDP'),
(5, 'WMD', 'A', 'A10', 'MBA'),
(6, 'WMD', 'A', 'A11', 'MBA'),
(7, 'WMD', 'A', 'A12', 'MBA'),
(8, 'WMD', 'A', 'A13', 'MBA'),
(9, 'WMD', 'A', 'A14', 'MBA'),
(10, 'WMD', 'A', 'A15', 'MBA'),
(11, 'WMD', 'A', 'A16', 'MBA'),
(12, 'WMD', 'A', 'A17', 'MBA'),
(13, 'WMD', 'A', 'A18', 'MBA'),
(14, 'WMD', 'A', 'A19', 'MBA'),
(15, 'WMD', 'A', 'A20', 'MBA'),
(16, 'WMD', 'A', 'A21', 'MBA'),
(17, 'WMD', 'A', 'A22', 'MBA'),
(18, 'WMD', 'A', 'A23', 'MBA'),
(19, 'WMD', 'A', 'A24', 'MBA'),
(20, 'WMD', 'A', 'A25', 'MBA'),
(21, 'WMD', 'A', 'A26', 'MBA'),
(22, 'WMD', 'A', 'A27', 'MBA'),
(23, 'WMD', 'A', 'A28', 'MBA'),
(24, 'WMD', 'A', 'A29', 'MBA'),
(25, 'WMD', 'A', 'A30', 'MBA'),
(26, 'WMD', 'A', 'A31', 'MBA'),
(27, 'WPD', 'B', 'B15', 'MBA'),
(28, 'WPD', 'B', 'B16', 'MBA'),
(29, 'WPD', 'B', 'B17', 'MBA'),
(30, 'WPD', 'B', 'B18', 'MBA'),
(31, 'WPD', 'B', 'B19', 'MBA'),
(32, 'WPD', 'B', 'B20', 'MBA'),
(33, 'WPD', 'B', 'B21', 'MBA'),
(34, 'WPD', 'B', 'B22', 'MBA'),
(35, 'WPD', 'B', 'B23', 'MBA'),
(36, 'WPD', 'B', 'B24', 'MBA'),
(37, 'WPD', 'B', 'B25', 'MBA'),
(38, 'WPD', 'B', 'B26', 'MBA'),
(39, 'WPD', 'B', 'B27', 'MBA'),
(40, 'WPD', 'B', 'B28', 'MBA'),
(41, 'WPD', 'B', 'B29', 'MBA'),
(42, 'WPD', 'B', 'B30', 'MBA'),
(43, 'WPD', 'B', 'B31', 'MBA'),
(44, 'WPD', 'B', 'B32', 'MBA'),
(45, 'WPD', 'B', 'B33', 'MBA'),
(46, 'WPD', 'B', 'B34', 'MBA'),
(47, 'WPD', 'B', 'B35', 'MBA'),
(48, 'WPD', 'B', 'B36', 'MBA'),
(49, 'WPD', 'B', 'B37', 'MBA'),
(50, 'WPD', 'B', 'B38', 'MBA'),
(51, 'WPD', 'B', 'B39', 'MBA'),
(52, 'WPD', 'B', 'B40', 'MBA'),
(53, 'WPD', 'B', 'B41', 'MBA'),
(54, 'WPD', 'B', 'B42', 'MBA'),
(55, 'WPD', 'B', 'B43', 'MBA'),
(56, 'WPD', 'B', 'B44', 'MBA'),
(57, 'WPD', 'B', 'B45', 'MBA'),
(58, 'WPD', 'B', 'B46', 'MBA'),
(59, 'WPD', 'B', 'B47', 'MBA'),
(60, 'WPD', 'B', 'B48', 'MBA'),
(61, 'WPD', 'B', 'B49', 'MBA'),
(62, 'WPD', 'B', 'B50', 'MBA'),
(63, 'WPD', 'B', 'B51', 'MBA'),
(64, 'WPD', 'B', 'B52', 'MBA'),
(65, 'WPD', 'B', 'B53', 'MBA'),
(66, 'WPD', 'B', 'B54', 'MBA'),
(67, 'WPD', 'B', 'B55', 'MBA'),
(68, 'WPD', 'B', 'B56', 'MBA'),
(69, 'WPD', 'B', 'B57', 'MBA'),
(70, 'WPD', 'B', 'B58', 'MBA'),
(71, 'WPD', 'B', 'B59', 'MBA'),
(72, 'WPL', 'C', 'C03', 'PPU'),
(73, 'WPL', 'C', 'C04', 'PPP'),
(74, 'WPL', 'C', 'C09', 'BDP'),
(75, 'WPL', 'C', 'C10', 'MBA'),
(76, 'WPL', 'C', 'C11', 'MBA'),
(77, 'WPL', 'C', 'C12', 'MBA'),
(78, 'WPL', 'C', 'C13', 'MBA'),
(79, 'WPL', 'C', 'C14', 'MBA'),
(80, 'WPL', 'C', 'C15', 'MBA'),
(81, 'WPL', 'C', 'C16', 'MBA'),
(82, 'WPL', 'C', 'C17', 'MBA'),
(83, 'WPL', 'C', 'C18', 'MBA'),
(84, 'WPL', 'C', 'C19', 'MBA'),
(85, 'WPL', 'C', 'C20', 'MBA'),
(86, 'WPL', 'C', 'C21', 'MBA'),
(87, 'WPL', 'C', 'C22', 'MBA'),
(88, 'WPL', 'C', 'C23', 'MBA'),
(89, 'WPL', 'C', 'C24', 'MBA'),
(90, 'WPL', 'C', 'C25', 'MBA'),
(91, 'WPL', 'C', 'C26', 'MBA'),
(92, 'WPL', 'C', 'C27', 'MBA'),
(93, 'WPL', 'C', 'C28', 'MBA'),
(94, 'WPL', 'C', 'C29', 'MBA'),
(95, 'WPL', 'C', 'C30', 'MBA'),
(96, 'WPL', 'C', 'C31', 'MBA'),
(97, 'WPL', 'C', 'C32', 'MBA'),
(98, 'WPL', 'C', 'C33', 'MBA'),
(99, 'WPL', 'C', 'C34', 'MBA'),
(100, 'WPL', 'C', 'C35', 'MBA'),
(101, 'WPL', 'C', 'C36', 'MBA'),
(102, 'WPL', 'C', 'C37', 'MBA'),
(103, 'WPL', 'C', 'C38', 'MBA'),
(104, 'WPL', 'C', 'C39', 'MBA'),
(105, 'WPL', 'C', 'C40', 'MBA'),
(106, 'WPL', 'C', 'C41', 'MBA'),
(107, 'WPL', 'C', 'C42', 'MBA'),
(108, 'WPL', 'C', 'C43', 'MBA'),
(109, 'WPL', 'C', 'C44', 'MBA'),
(110, 'WPL', 'C', 'C45', 'MBA'),
(111, 'WPL', 'C', 'C46', 'MBA'),
(112, 'WPL', 'C', 'C47', 'MBA'),
(113, 'WPL', 'C', 'C48', 'MBA'),
(114, 'WPL', 'C', 'C49', 'MBA'),
(115, 'WPL', 'C', 'C50', 'MBA'),
(116, 'WPL', 'C', 'C51', 'MBA'),
(117, 'WPL', 'C', 'C52', 'MBA'),
(118, 'WPL', 'C', 'C53', 'MBA'),
(119, 'WBN', 'D', 'D03', 'PPU'),
(120, 'WBN', 'D', 'D04', 'PPP'),
(121, 'WBN', 'D', 'D09', 'BDP'),
(122, 'WBN', 'D', 'D10', 'MBA'),
(123, 'WBN', 'D', 'D11', 'MBA'),
(124, 'WBN', 'D', 'D12', 'MBA'),
(125, 'WBN', 'D', 'D13', 'MBA'),
(126, 'WBN', 'D', 'D14', 'MBA'),
(127, 'WBN', 'D', 'D15', 'MBA'),
(128, 'WBN', 'D', 'D16', 'MBA'),
(129, 'WBN', 'D', 'D17', 'MBA'),
(130, 'WBN', 'D', 'D18', 'MBA'),
(131, 'WBN', 'D', 'D19', 'MBA'),
(132, 'WBN', 'D', 'D20', 'MBA'),
(133, 'WBN', 'D', 'D21', 'MBA'),
(134, 'WBN', 'D', 'D22', 'MBA'),
(135, 'WBN', 'D', 'D23', 'MBA'),
(136, 'WBN', 'D', 'D24', 'MBA'),
(137, 'WSM', 'E', 'E03', 'PPU'),
(138, 'WSM', 'E', 'E04', 'PPP'),
(139, 'WSM', 'E', 'E09', 'BDP'),
(140, 'WSM', 'E', 'E15', 'MBA'),
(141, 'WSM', 'E', 'E16', 'MBA'),
(142, 'WSM', 'E', 'E17', 'MBA'),
(143, 'WSM', 'E', 'E18', 'MBA'),
(144, 'WSM', 'E', 'E19', 'MBA'),
(145, 'WSM', 'E', 'E20', 'MBA'),
(146, 'WSM', 'E', 'E21', 'MBA'),
(147, 'WSM', 'E', 'E22', 'MBA'),
(148, 'WSM', 'E', 'E23', 'MBA'),
(149, 'WSM', 'E', 'E24', 'MBA'),
(150, 'WSM', 'E', 'E25', 'MBA'),
(151, 'WSM', 'E', 'E26', 'MBA'),
(152, 'WSM', 'E', 'E27', 'MBA'),
(153, 'WSM', 'E', 'E28', 'MBA'),
(154, 'WSM', 'E', 'E29', 'MBA'),
(155, 'WSM', 'E', 'E30', 'MBA'),
(156, 'WSY', 'F', 'F03', 'PPU'),
(157, 'WSY', 'F', 'F04', 'PPP'),
(158, 'WSY', 'F', 'F09', 'BDP'),
(159, 'WSY', 'F', 'F11', 'MBA'),
(160, 'WSY', 'F', 'F12', 'MBA'),
(161, 'WSY', 'F', 'F13', 'MBA'),
(162, 'WSY', 'F', 'F14', 'MBA'),
(163, 'WSY', 'F', 'F15', 'MBA'),
(164, 'WSY', 'F', 'F16', 'MBA'),
(165, 'WSY', 'F', 'F17', 'MBA'),
(166, 'WSY', 'F', 'F18', 'MBA'),
(167, 'WSY', 'F', 'F19', 'MBA'),
(168, 'WSY', 'F', 'F20', 'MBA'),
(169, 'WSY', 'F', 'F21', 'MBA'),
(170, 'WSY', 'F', 'F22', 'MBA'),
(171, 'WSY', 'F', 'F23', 'MBA'),
(172, 'WMK', 'G', 'G03', 'PPU'),
(173, 'WMK', 'G', 'G04', 'PPP'),
(174, 'WMK', 'G', 'G09', 'BDP'),
(175, 'WMK', 'G', 'G10', 'MBA'),
(176, 'WMK', 'G', 'G11', 'MBA'),
(177, 'WMK', 'G', 'G12', 'MBA'),
(178, 'WMK', 'G', 'G13', 'MBA'),
(179, 'WMK', 'G', 'G14', 'MBA'),
(180, 'WMK', 'G', 'G15', 'MBA'),
(181, 'WMK', 'G', 'G16', 'MBA'),
(182, 'WMK', 'G', 'G17', 'MBA'),
(183, 'WMK', 'G', 'G18', 'MBA'),
(184, 'WMK', 'G', 'G19', 'MBA'),
(185, 'WMK', 'G', 'G20', 'MBA'),
(186, 'WMK', 'G', 'G21', 'MBA'),
(187, 'WMK', 'G', 'G22', 'MBA'),
(188, 'WMK', 'G', 'G23', 'MBA'),
(189, 'WMK', 'G', 'G24', 'MBA'),
(190, 'WMK', 'G', 'G25', 'MBA'),
(191, 'WMK', 'G', 'G26', 'MBA'),
(192, 'WMK', 'G', 'G27', 'MBA'),
(193, 'WMK', 'G', 'G28', 'MBA'),
(194, 'WMK', 'G', 'G29', 'MBA'),
(195, 'WMK', 'G', 'G30', 'MBA'),
(196, 'WMK', 'G', 'G31', 'MBA'),
(197, 'WMK', 'G', 'G32', 'MBA'),
(198, 'WMK', 'G', 'G33', 'MBA'),
(199, 'WMK', 'G', 'G34', 'MBA'),
(200, 'WDR', 'H', 'H04', 'PPP'),
(201, 'WDR', 'H', 'H09', 'BDP'),
(202, 'WDR', 'H', 'H10', 'MBA'),
(203, 'WDR', 'H', 'H11', 'MBA'),
(204, 'WDR', 'H', 'H12', 'MBA'),
(205, 'WDR', 'H', 'H13', 'MBA'),
(206, 'WDR', 'H', 'H14', 'MBA'),
(207, 'WDR', 'H', 'H15', 'MBA'),
(208, 'WDR', 'H', 'H16', 'MBA'),
(209, 'WDR', 'H', 'H17', 'MBA'),
(210, 'WDR', 'H', 'H18', 'MBA'),
(211, 'WDR', 'H', 'H19', 'MBA'),
(212, 'WDR', 'H', 'H20', 'MBA'),
(213, 'WDR', 'H', 'H21', 'MBA'),
(214, 'WDR', 'H', 'H22', 'MBA'),
(215, 'WDR', 'H', 'H23', 'MBA'),
(216, 'WDR', 'H', 'H24', 'MBA'),
(217, 'WDR', 'H', 'H25', 'MBA'),
(218, 'WDR', 'H', 'H26', 'MBA'),
(219, 'WDR', 'H', 'H27', 'MBA'),
(220, 'WDR', 'H', 'H28', 'MBA'),
(221, 'WDR', 'H', 'H29', 'MBA'),
(222, 'WDR', 'H', 'H30', 'MBA'),
(223, 'WDR', 'H', 'H31', 'MBA'),
(224, 'WDR', 'H', 'H32', 'MBA'),
(225, 'WDR', 'H', 'H33', 'MBA'),
(226, 'WBJ', 'I', 'I04', 'PPP'),
(227, 'WBJ', 'I', 'I09', 'BDP'),
(228, 'WBJ', 'I', 'I10', 'MBA'),
(229, 'WBJ', 'I', 'I11', 'MBA'),
(230, 'WBJ', 'I', 'I12', 'MBA'),
(231, 'WBJ', 'I', 'I13', 'MBA'),
(232, 'WBJ', 'I', 'I14', 'MBA'),
(233, 'WBJ', 'I', 'I15', 'MBA'),
(234, 'WBJ', 'I', 'I16', 'MBA'),
(235, 'WBJ', 'I', 'I17', 'MBA'),
(236, 'WBJ', 'I', 'I18', 'MBA'),
(237, 'WBJ', 'I', 'I19', 'MBA'),
(238, 'WBJ', 'I', 'I20', 'MBA'),
(239, 'WBJ', 'I', 'I21', 'MBA'),
(240, 'WBJ', 'I', 'I22', 'MBA'),
(241, 'WBJ', 'I', 'I23', 'MBA'),
(242, 'WBJ', 'I', 'I24', 'MBA'),
(243, 'WBJ', 'I', 'I25', 'MBA'),
(244, 'WBJ', 'I', 'I26', 'MBA'),
(245, 'WBJ', 'I', 'I27', 'MBA'),
(246, 'WBJ', 'I', 'I28', 'MBA'),
(247, 'WBJ', 'I', 'I29', 'MBA'),
(248, 'WBJ', 'I', 'I30', 'MBA'),
(249, 'WBJ', 'I', 'I31', 'MBA'),
(250, 'WBJ', 'I', 'I32', 'MBA'),
(251, 'WBJ', 'I', 'I33', 'MBA'),
(252, 'WBJ', 'I', 'I34', 'MBA'),
(253, 'WBJ', 'I', 'I35', 'MBA'),
(254, 'WBJ', 'I', 'I36', 'MBA'),
(255, 'WMO', 'J', 'J10', 'MBA'),
(256, 'WMO', 'J', 'J11', 'MBA'),
(257, 'WMO', 'J', 'J12', 'MBA'),
(258, 'WMO', 'J', 'J13', 'MBA'),
(259, 'WMO', 'J', 'J14', 'MBA'),
(260, 'WMO', 'J', 'J15', 'MBA'),
(261, 'WMO', 'J', 'J16', 'MBA'),
(262, 'WMO', 'J', 'J17', 'MBA'),
(263, 'WMO', 'J', 'J18', 'MBA'),
(264, 'WMO', 'J', 'J19', 'MBA'),
(265, 'WMO', 'J', 'J20', 'MBA'),
(266, 'WMO', 'J', 'J21', 'MBA'),
(267, 'WMO', 'J', 'J22', 'MBA'),
(268, 'WMO', 'J', 'J23', 'MBA'),
(269, 'WMO', 'J', 'J24', 'MBA'),
(270, 'WMO', 'J', 'J25', 'MBA'),
(271, 'WMO', 'J', 'J26', 'MBA'),
(272, 'WMO', 'J', 'J27', 'MBA'),
(273, 'WMO', 'J', 'J28', 'MBA'),
(274, 'WMO', 'J', 'J29', 'MBA'),
(275, 'WMO', 'J', 'J30', 'MBA'),
(276, 'WMO', 'J', 'J31', 'MBA'),
(277, 'WMO', 'J', 'J32', 'MBA'),
(278, 'WPU', 'K', 'K60', 'MBA'),
(279, 'WPU', 'K', 'K61', 'MBA'),
(280, 'WPU', 'K', 'K94', 'MBA'),
(281, 'WPU', 'K', 'K95', 'MBA'),
(282, 'WJS', 'L', 'L92', 'TDP'),
(283, 'WJS', 'L', 'L93', 'PPU'),
(284, 'WJS', 'L', 'L04', 'PPP'),
(285, 'WJS', 'L', 'L09', 'BDP'),
(286, 'WJS', 'L', 'L10', 'MBA'),
(287, 'WJS', 'L', 'L11', 'MBA'),
(288, 'WJS', 'L', 'L12', 'MBA'),
(289, 'WJS', 'L', 'L13', 'MBA'),
(290, 'WJS', 'L', 'L14', 'MBA'),
(291, 'WJS', 'L', 'L15', 'MBA'),
(292, 'WJS', 'L', 'L16', 'MBA'),
(293, 'WJS', 'L', 'L17', 'MBA'),
(294, 'WJS', 'L', 'L18', 'MBA'),
(295, 'WJK', 'M', 'M02', 'TDP'),
(296, 'WJK', 'M', 'M03', 'PPU'),
(297, 'WJK', 'M', 'M04', 'PPP'),
(298, 'WJK', 'M', 'M09', 'BDP'),
(299, 'WJK', 'M', 'M11', 'MBA'),
(300, 'WJK', 'M', 'M30', 'MBA'),
(301, 'WJK', 'M', 'M45', 'MBA'),
(302, 'WJK', 'M', 'M49', 'MBA'),
(303, 'WJK', 'M', 'M52', 'MBA'),
(304, 'WJK', 'M', 'M54', 'MBA'),
(305, 'WJB', 'N', 'N02', 'TDP'),
(306, 'WJB', 'N', 'N03', 'PPU'),
(307, 'WJB', 'N', 'N04', 'PPP'),
(308, 'WJB', 'N', 'N09', 'BDP'),
(309, 'WJB', 'N', 'N16', 'MBA'),
(310, 'WJB', 'N', 'N17', 'MBA'),
(311, 'WJB', 'N', 'N18', 'MBA'),
(312, 'WJB', 'N', 'N19', 'MBA'),
(313, 'WJB', 'N', 'N20', 'MBA'),
(314, 'WJB', 'N', 'N21', 'MBA'),
(315, 'WJB', 'N', 'N22', 'MBA'),
(316, 'WJB', 'N', 'N23', 'MBA'),
(317, 'WJB', 'N', 'N24', 'MBA'),
(318, 'WJB', 'N', 'N25', 'MBA'),
(319, 'WJB', 'N', 'N26', 'MBA'),
(320, 'WJB', 'N', 'N27', 'MBA'),
(321, 'WJB', 'N', 'N28', 'MBA'),
(322, 'WJB', 'N', 'N29', 'MBA'),
(323, 'WJB', 'N', 'N30', 'MBA'),
(324, 'WJB', 'N', 'N31', 'MBA'),
(325, 'WJB', 'N', 'N32', 'MBA'),
(326, 'WJB', 'N', 'N33', 'MBA'),
(327, 'WJB', 'N', 'N34', 'MBA'),
(328, 'WJB', 'N', 'N35', 'MBA'),
(329, 'WJB', 'N', 'N36', 'MBA'),
(330, 'WJB', 'N', 'N37', 'MBA'),
(331, 'WJB', 'N', 'N38', 'MBA'),
(332, 'WJB', 'N', 'N39', 'MBA'),
(333, 'WJB', 'N', 'N40', 'MBA'),
(334, 'WJB', 'N', 'N41', 'MBA'),
(335, 'WJB', 'N', 'N42', 'MBA'),
(336, 'WJB', 'N', 'N43', 'MBA'),
(337, 'WJB', 'N', 'N44', 'MBA'),
(338, 'WJB', 'N', 'N45', 'MBA'),
(339, 'WJB', 'N', 'N46', 'MBA'),
(340, 'WJB', 'N', 'N47', 'MBA'),
(341, 'WJB', 'N', 'N48', 'MBA'),
(342, 'WJB', 'N', 'N49', 'MBA'),
(343, 'WJB', 'N', 'N50', 'MBA'),
(344, 'WJB', 'N', 'N51', 'MBA'),
(345, 'WJB', 'N', 'N52', 'MBA'),
(346, 'WJB', 'N', 'N53', 'MBA'),
(347, 'WJB', 'N', 'N54', 'MBA'),
(348, 'WJB', 'N', 'N55', 'MBA'),
(349, 'WJB', 'N', 'N56', 'MBA'),
(350, 'WJY', 'O', 'O02', 'TDP'),
(351, 'WJY', 'O', 'O03', 'PPU'),
(352, 'WJY', 'O', 'O04', 'PPP'),
(353, 'WJY', 'O', 'O09', 'BDP'),
(354, 'WJY', 'O', 'O10', 'MBA'),
(355, 'WJY', 'O', 'O11', 'MBA'),
(356, 'WJY', 'O', 'O12', 'MBA'),
(357, 'WJY', 'O', 'O13', 'MBA'),
(358, 'WJY', 'O', 'O14', 'MBA'),
(359, 'WJY', 'O', 'O15', 'MBA'),
(360, 'WJY', 'O', 'O16', 'MBA'),
(361, 'WJY', 'O', 'O17', 'MBA'),
(362, 'WJY', 'O', 'O18', 'MBA'),
(363, 'WJY', 'O', 'O19', 'MBA'),
(364, 'WYK', 'R', 'R03', 'PPU'),
(365, 'WYK', 'R', 'R04', 'PPP'),
(366, 'WYK', 'R', 'R09', 'BDP'),
(367, 'WYK', 'R', 'R10', 'MBA'),
(368, 'WYK', 'R', 'R11', 'MBA'),
(369, 'WYK', 'R', 'R12', 'MBA'),
(370, 'WYK', 'R', 'R13', 'MBA'),
(371, 'WYK', 'R', 'R14', 'MBA'),
(372, 'WYK', 'R', 'R15', 'MBA'),
(373, 'WYK', 'R', 'R16', 'MBA'),
(374, 'WMA', 'S', 'S03', 'PPU'),
(375, 'WMA', 'S', 'S04', 'PPP'),
(376, 'WMA', 'S', 'S09', 'BDP'),
(377, 'WMA', 'S', 'S11', 'MBA'),
(378, 'WMA', 'S', 'S12', 'MBA'),
(379, 'WMA', 'S', 'S13', 'MBA'),
(380, 'WMA', 'S', 'S14', 'MBA'),
(381, 'GABUNGAN', 'MSO LAMA', 'XXX', 'CABANG'),
(382, 'WJK', 'MSO LAMA', 'K11', 'MBA'),
(383, 'WJY', 'MSO LAMA', 'K12', 'MBA'),
(384, 'WJB', 'MSO LAMA', 'K16', 'MBA'),
(385, 'WJB', 'MSO LAMA', 'K17', 'MBA'),
(386, 'WJY', 'MSO LAMA', 'K18', 'MBA'),
(387, 'WJY', 'MSO LAMA', 'K20', 'MBA'),
(388, 'WJB', 'MSO LAMA', 'K21', 'MBA'),
(389, 'WJY', 'MSO LAMA', 'K23', 'MBA'),
(390, 'WJS', 'MSO LAMA', 'K29', 'MBA'),
(391, 'WJK', 'MSO LAMA', 'K30', 'MBA'),
(392, 'WJS', 'MSO LAMA', 'K32', 'MBA'),
(393, 'WJB', 'MSO LAMA', 'K33', 'MBA'),
(394, 'WJY', 'MSO LAMA', 'K34', 'MBA'),
(395, 'WJY', 'MSO LAMA', 'K35', 'MBA'),
(396, 'WJS', 'MSO LAMA', 'K40', 'MBA'),
(397, 'WJB', 'MSO LAMA', 'K42', 'MBA'),
(398, 'WJB', 'MSO LAMA', 'K44', 'MBA'),
(399, 'WJK', 'MSO LAMA', 'K45', 'MBA'),
(400, 'WJK', 'MSO LAMA', 'K47', 'MBA'),
(401, 'WJB', 'MSO LAMA', 'K48', 'MBA'),
(402, 'WJK', 'MSO LAMA', 'K49', 'MBA'),
(403, 'WJK', 'MSO LAMA', 'K52', 'MBA'),
(404, 'WJK', 'MSO LAMA', 'K54', 'MBA'),
(405, 'WMD', '9', '901', 'MBR'),
(406, 'WPD', '9', '902', 'MBR'),
(407, 'WPL', '9', '903', 'MBR'),
(408, 'WBN', '9', '904', 'MBR'),
(409, 'WSM', '9', '905', 'MBR'),
(410, 'WSY', '9', '906', 'MBR'),
(411, 'WMK', '9', '907', 'MBR'),
(412, 'WDR', '9', '908', 'MBR'),
(413, 'WBJ', '9', '909', 'MBR'),
(414, 'WJS', '9', '910', 'MBR'),
(415, 'WMO', '9', '911', 'MBR'),
(416, 'WJB', '9', '914', 'MBR'),
(417, 'WJY', '9', '915', 'MBR'),
(418, 'WPU', '9', '916', 'MBR'),
(419, 'WYK', '9', '917', 'MBR'),
(420, 'WMA', '9', '918', 'MBR'),
(421, 'WJK', '9', '920', 'MBR'),
(422, 'EBK', '9', '912', 'MBR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mso_channel`
--
ALTER TABLE `mso_channel`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mso_channel`
--
ALTER TABLE `mso_channel`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=423;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;