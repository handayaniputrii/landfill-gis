-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2018 pada 14.18
-- Versi Server: 5.6.11
-- Versi PHP: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `moora_map`
--
CREATE DATABASE IF NOT EXISTS `moora_map` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `moora_map`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE IF NOT EXISTS `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `luas_lahan` int(10) NOT NULL,
  `harga_lahan` int(10) NOT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `warna` varchar(16) DEFAULT NULL,
  `area` text,
  PRIMARY KEY (`kode_alternatif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`, `luas_lahan`, `harga_lahan`, `total`, `rank`, `lat`, `lng`, `warna`, `area`) VALUES
('A03', 'Gandus 2', 14, 2856000, 2.4470703107359, 5, -3.009942984032783, 104.67664426724696, '#bfbf00', 'lsjQe}{}RT_CjBKfAuA~BhBrBgAjF|Ao@rDmBpCs@`@rF`E]`Bs@fByENyCm@aIuCkC{@'),
('A02', 'Gandus 1', 47, 9588000, 2.8376370436784, 1, -2.9951575156421626, 104.68340343395994, '#80ff80', 'lkhQov{}R,dohQud|}RuErKoQsOk_@ad@|EiKbTqa@hKlInQfMlDjHfJrK'),
('A01', 'Keramasan', 3, 285000, 1.9303604289238, 17, -3.0278851846294543, 104.72956649431762, '#ff80ff', 'rpnQywe~RZuCX_E?[cE_@cEg@u@E_AtJ'),
('A04', 'Gandus 3', 4, 1104000, 2.1428037437994, 15, -3.0066430562703728, 104.67295354763928, '#ffff80', 'b_jQswz}RzDpAn@s@l@kAjBw@tAGGsBIw@oJeABrD'),
('A05', 'Gandus 4', 20, 5520000, 2.4603098170966, 4, -3.0004503077541247, 104.6647996322306, '#808040', 'zphQyyx}RJkFUgJ`@cJrBmAjFUlGOz@tA`@dFCnGm@fEaCn@_AbAa@fBa@zB_Cd@aE?'),
('A06', 'Gandus 5', 8, 2208000, 2.3301209061158, 6, -3.001286009430269, 104.66956323544309, '#ff0000', 'jjiQ{`z}RxAuAn@w@s@iBm@]p@eC{@]sBCcAd@_CBaBi@o@h@yCf@k@`Bb@nBo@lAbAh@hCGhEQtCO'),
('A07', 'Gandus 6', 21, 5796000, 2.5904987280774, 2, -3.000600305537922, 104.65945667187498, '#ffff00', 'zciQ{bx}RbAMtAn@v@Kh@_Fj@uHp@qGkAO}AY{@UmCX{@bABfDaBhCmEzBcDfAa@~KOrIxCJjD?fAP'),
('A08', 'Sukarami 1', 5, 5610000, 1.8855921210475, 18, -2.8863344090098475, 104.69732215514227, '#8080ff', 'jqrPio_~RQw@OcAYiAb@O]oBzBYt@xAnA]Iy@YmAa@_@Y]YE[_A]EW[Fe@_@_@Y?Me@Cm@zCMHx@Xv@f@VRH`Af@Cn@Jp@Rr@AbANX^RGxAE`@Tp@Hn@'),
('A09', 'Sukarami 2', 3, 591000, 2.190092897713, 12, -2.882991253765689, 104.68783786406561, '#a8ffa8', 'p}qPus}}RTRnBNn@JPmAh@yFRgC{A_@aASeAlG'),
('A10', 'Sukarami 3', 8, 3624000, 2.190092897713, 13, -2.8872666332382613, 104.68174388518378, '#c0c0c0', 'x_sPej|}Rx@VXLx@_Cd@cBhBgFb@eBm@WaA[c@`ASz@a@d@o@i@_Ak@cA_@mAe@sAc@kBUc@DSTOZ?h@?h@Dx@SDzBVbBnAVlAr@pB`Cj@@'),
('A11', 'Sukarami 4', 2, 906000, 2.0059779741333, 16, -2.892152761503423, 104.67832138648077, '#808080', 'xysPoy{}Ra@a@k@iAUW_ARn@iCnAiD`@jAVn@t@_@f@a@Zd@Xx@Sp@Jj@Nd@Zf@@XKPk@^c@E]Q'),
('A12', 'Sukarami 5', 4, 1812000, 2.190092897713, 11, -2.8855629125183326, 104.67160513510748, '#004000', 'dgrPutz}RpB_CRONRr@y@vAfB~BkAnBe@~@lB[lAkA|BkFd@qBo@'),
('A13', 'Sukarami 6', 1, 453000, 2.190092897713, 9, -2.887513083193793, 104.67912068476721, '#000000', 'basPwa|}Re@YD]d@qAL_@HKs@Fs@@m@@W?MBOHGNQPKTEx@LTRTPTHBDBNBHBLBL?LAV?EXEz@I'),
('A14', 'Kalidoni 2', 3, 4180400, 2.1460059825361, 14, -2.954366161289357, 104.84467811586615, '#007979', '|_`Qog|~Rx@o@n@}@Yk@Ee@^SJo@WgBe@s@aBPeAb@k@n@SDjAX\Z~@Xl@Xl@'),
('A15', 'Kalidoni 3', 1, 2090200, 2.2248239379653, 7, -2.9598252245249492, 104.8427254677033, '#800080', 'zaaQe}{~RTa@r@gAd@k@PWwAyAi@o@KKyA|@ZNq@|@q@|@j@^|@j@x@p@'),
('A16', 'Kalidoni 4', 5, 7465000, 2.2248239379653, 8, -2.9610841803380157, 104.84300441744085, '#408080', 'njaQe{{~RwA_BaBsBXWkB{BKQpDcDXSrAfDf@pAh@dBh@`B'),
('A17', 'Jalan Jepang', 8, 29912000, 2.190092897713, 10, -2.920939950597346, 104.68941685697541, '#800040', 'bqyPyu}}RxEyDe@{@~BuAiEqG_EkD}CoBcHnG'),
('A18', 'Kalidoni sungai butat', 15, 22395000, 2.5423300112624, 3, -2.956991229398045, 104.85593266489263, '#ff8000', 'll_Qmy~~RrDsHbDcHz@i@nJlEjD{GbA}ApVtTfFrGuLdTkE`GoBdB}LqJyNgN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `atribut` varchar(16) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `atribut`, `bobot`) VALUES
('C01', 'Batas Administrasi', 'min', 0.16482735308619),
('C02', 'Status Kepemilikan Lahan', 'min', 0.14651722039371),
('C03', 'Intensitas Hujan', 'max', 0.11149476290169),
('C04', 'Bahaya Banjir', 'max', 0.091171020797541),
('C05', 'Tata Guna Lahan', 'max', 0.076234821529333),
('C06', 'Kemiringan Lereng', 'max', 0.065309547240216),
('C07', 'Jarak Terhadap Sungai', 'max', 0.065874419835536),
('C08', 'Jarak Terhadap Pemukiman', 'max', 0.059867939138544),
('C09', 'Jarak Terhadap Lapangan Terbang', 'max', 0.056301780427981),
('C10', 'Jarak ke Pusat Kota', 'max', 0.047239632661736),
('C11', 'Jarak ke Jalan', 'max', 0.044805784043477),
('C12', 'Daerah Lindung', 'max', 0.031887252008021),
('C13', 'Kawasan Strategis', 'max', 0.02666807628123),
('C14', 'Luas Lahan', 'max', 0.01180038965479);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_options`
--

CREATE TABLE IF NOT EXISTS `tb_options` (
  `option_name` varchar(16) NOT NULL,
  `option_value` text,
  PRIMARY KEY (`option_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_options`
--

INSERT INTO `tb_options` (`option_name`, `option_value`) VALUES
('default_lat', '-8.419019363368195'),
('default_lng', '115.21277381054688'),
('default_zoom', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rel_alternatif`
--

CREATE TABLE IF NOT EXISTS `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `kode_sub` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `kode_pelamar` (`kode_alternatif`),
  KEY `kode_kriteria` (`kode_kriteria`),
  KEY `kode_indikator` (`kode_sub`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=451 ;

--
-- Dumping data untuk tabel `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `kode_alternatif`, `kode_kriteria`, `kode_sub`) VALUES
(252, 'A04', 'C12', 36),
(253, 'A04', 'C13', 39),
(254, 'A04', 'C14', 41),
(199, 'A01', 'C01', 3),
(219, 'A02', 'C07', 25),
(220, 'A02', 'C08', 28),
(221, 'A02', 'C09', 29),
(222, 'A02', 'C10', 33),
(223, 'A02', 'C11', 34),
(224, 'A02', 'C12', 36),
(225, 'A02', 'C13', 39),
(226, 'A02', 'C14', 46),
(227, 'A03', 'C01', 3),
(202, 'A01', 'C04', 15),
(201, 'A01', 'C03', 12),
(200, 'A01', 'C02', 4),
(203, 'A01', 'C05', 21),
(204, 'A01', 'C06', 23),
(205, 'A01', 'C07', 25),
(206, 'A01', 'C08', 28),
(207, 'A01', 'C09', 29),
(212, 'A01', 'C14', 41),
(211, 'A01', 'C13', 40),
(210, 'A01', 'C12', 36),
(209, 'A01', 'C11', 35),
(208, 'A01', 'C10', 33),
(213, 'A02', 'C01', 3),
(214, 'A02', 'C02', 4),
(215, 'A02', 'C03', 12),
(216, 'A02', 'C04', 15),
(217, 'A02', 'C05', 20),
(218, 'A02', 'C06', 23),
(251, 'A04', 'C11', 35),
(250, 'A04', 'C10', 33),
(249, 'A04', 'C09', 29),
(248, 'A04', 'C08', 28),
(247, 'A04', 'C07', 25),
(246, 'A04', 'C06', 23),
(245, 'A04', 'C05', 20),
(244, 'A04', 'C04', 15),
(243, 'A04', 'C03', 12),
(242, 'A04', 'C02', 4),
(241, 'A04', 'C01', 3),
(240, 'A03', 'C14', 42),
(239, 'A03', 'C13', 39),
(238, 'A03', 'C12', 36),
(237, 'A03', 'C11', 34),
(236, 'A03', 'C10', 33),
(235, 'A03', 'C09', 29),
(234, 'A03', 'C08', 28),
(233, 'A03', 'C07', 25),
(232, 'A03', 'C06', 23),
(231, 'A03', 'C05', 20),
(230, 'A03', 'C04', 15),
(229, 'A03', 'C03', 12),
(228, 'A03', 'C02', 4),
(255, 'A05', 'C01', 3),
(256, 'A05', 'C02', 4),
(257, 'A05', 'C03', 12),
(258, 'A05', 'C04', 15),
(259, 'A05', 'C05', 20),
(260, 'A05', 'C06', 23),
(261, 'A05', 'C07', 25),
(262, 'A05', 'C08', 28),
(263, 'A05', 'C09', 29),
(264, 'A05', 'C10', 31),
(265, 'A05', 'C11', 35),
(266, 'A05', 'C12', 36),
(267, 'A05', 'C13', 39),
(268, 'A05', 'C14', 42),
(269, 'A06', 'C01', 3),
(270, 'A06', 'C02', 4),
(271, 'A06', 'C03', 12),
(272, 'A06', 'C04', 15),
(273, 'A06', 'C05', 20),
(274, 'A06', 'C06', 23),
(275, 'A06', 'C07', 25),
(276, 'A06', 'C08', 28),
(277, 'A06', 'C09', 29),
(278, 'A06', 'C10', 31),
(279, 'A06', 'C11', 35),
(280, 'A06', 'C12', 36),
(281, 'A06', 'C13', 39),
(282, 'A06', 'C14', 41),
(283, 'A07', 'C01', 3),
(284, 'A07', 'C02', 4),
(285, 'A07', 'C03', 12),
(286, 'A07', 'C04', 15),
(287, 'A07', 'C05', 20),
(288, 'A07', 'C06', 23),
(289, 'A07', 'C07', 25),
(290, 'A07', 'C08', 28),
(291, 'A07', 'C09', 29),
(292, 'A07', 'C10', 31),
(293, 'A07', 'C11', 35),
(294, 'A07', 'C12', 36),
(295, 'A07', 'C13', 39),
(296, 'A07', 'C14', 43),
(297, 'A08', 'C01', 3),
(298, 'A08', 'C02', 4),
(299, 'A08', 'C03', 12),
(300, 'A08', 'C04', 15),
(301, 'A08', 'C05', 22),
(302, 'A08', 'C06', 23),
(303, 'A08', 'C07', 26),
(304, 'A08', 'C08', 28),
(305, 'A08', 'C09', 30),
(306, 'A08', 'C10', 31),
(307, 'A08', 'C11', 35),
(308, 'A08', 'C12', 36),
(309, 'A08', 'C13', 39),
(310, 'A08', 'C14', 41),
(311, 'A09', 'C01', 3),
(312, 'A09', 'C02', 4),
(313, 'A09', 'C03', 12),
(314, 'A09', 'C04', 15),
(315, 'A09', 'C05', 20),
(316, 'A09', 'C06', 23),
(317, 'A09', 'C07', 25),
(318, 'A09', 'C08', 28),
(319, 'A09', 'C09', 30),
(320, 'A09', 'C10', 31),
(321, 'A09', 'C11', 35),
(322, 'A09', 'C12', 36),
(323, 'A09', 'C13', 39),
(324, 'A09', 'C14', 41),
(325, 'A10', 'C01', 3),
(326, 'A10', 'C02', 4),
(327, 'A10', 'C03', 12),
(328, 'A10', 'C04', 15),
(329, 'A10', 'C05', 20),
(330, 'A10', 'C06', 23),
(331, 'A10', 'C07', 25),
(332, 'A10', 'C08', 28),
(333, 'A10', 'C09', 30),
(334, 'A10', 'C10', 31),
(335, 'A10', 'C11', 35),
(336, 'A10', 'C12', 36),
(337, 'A10', 'C13', 39),
(338, 'A10', 'C14', 41),
(339, 'A11', 'C01', 3),
(340, 'A11', 'C02', 4),
(341, 'A11', 'C03', 12),
(342, 'A11', 'C04', 15),
(343, 'A11', 'C05', 22),
(344, 'A11', 'C06', 23),
(345, 'A11', 'C07', 25),
(346, 'A11', 'C08', 28),
(347, 'A11', 'C09', 30),
(348, 'A11', 'C10', 31),
(349, 'A11', 'C11', 35),
(350, 'A11', 'C12', 36),
(351, 'A11', 'C13', 39),
(352, 'A11', 'C14', 41),
(353, 'A12', 'C01', 3),
(354, 'A12', 'C02', 4),
(355, 'A12', 'C03', 12),
(356, 'A12', 'C04', 15),
(357, 'A12', 'C05', 20),
(358, 'A12', 'C06', 23),
(359, 'A12', 'C07', 25),
(360, 'A12', 'C08', 28),
(361, 'A12', 'C09', 30),
(362, 'A12', 'C10', 31),
(363, 'A12', 'C11', 35),
(364, 'A12', 'C12', 36),
(365, 'A12', 'C13', 39),
(366, 'A12', 'C14', 41),
(367, 'A13', 'C01', 3),
(368, 'A13', 'C02', 4),
(369, 'A13', 'C03', 12),
(370, 'A13', 'C04', 15),
(371, 'A13', 'C05', 20),
(372, 'A13', 'C06', 23),
(373, 'A13', 'C07', 25),
(374, 'A13', 'C08', 28),
(375, 'A13', 'C09', 30),
(376, 'A13', 'C10', 31),
(377, 'A13', 'C11', 35),
(378, 'A13', 'C12', 36),
(379, 'A13', 'C13', 39),
(380, 'A13', 'C14', 41),
(381, 'A14', 'C01', 3),
(382, 'A14', 'C02', 4),
(383, 'A14', 'C03', 12),
(384, 'A14', 'C04', 15),
(385, 'A14', 'C05', 22),
(386, 'A14', 'C06', 23),
(387, 'A14', 'C07', 25),
(388, 'A14', 'C08', 28),
(389, 'A14', 'C09', 29),
(390, 'A14', 'C10', 31),
(391, 'A14', 'C11', 35),
(392, 'A14', 'C12', 36),
(393, 'A14', 'C13', 39),
(394, 'A14', 'C14', 41),
(395, 'A15', 'C01', 3),
(396, 'A15', 'C02', 4),
(397, 'A15', 'C03', 12),
(398, 'A15', 'C04', 15),
(399, 'A15', 'C05', 21),
(400, 'A15', 'C06', 23),
(401, 'A15', 'C07', 25),
(402, 'A15', 'C08', 28),
(403, 'A15', 'C09', 29),
(404, 'A15', 'C10', 33),
(405, 'A15', 'C11', 34),
(406, 'A15', 'C12', 36),
(407, 'A15', 'C13', 39),
(408, 'A15', 'C14', 41),
(409, 'A16', 'C01', 3),
(410, 'A16', 'C02', 4),
(411, 'A16', 'C03', 12),
(412, 'A16', 'C04', 15),
(413, 'A16', 'C05', 21),
(414, 'A16', 'C06', 23),
(415, 'A16', 'C07', 25),
(416, 'A16', 'C08', 28),
(417, 'A16', 'C09', 29),
(418, 'A16', 'C10', 33),
(419, 'A16', 'C11', 34),
(420, 'A16', 'C12', 36),
(421, 'A16', 'C13', 39),
(422, 'A16', 'C14', 41),
(423, 'A17', 'C01', 3),
(424, 'A17', 'C02', 4),
(425, 'A17', 'C03', 12),
(426, 'A17', 'C04', 15),
(427, 'A17', 'C05', 20),
(428, 'A17', 'C06', 23),
(429, 'A17', 'C07', 25),
(430, 'A17', 'C08', 28),
(431, 'A17', 'C09', 30),
(432, 'A17', 'C10', 31),
(433, 'A17', 'C11', 35),
(434, 'A17', 'C12', 36),
(435, 'A17', 'C13', 39),
(436, 'A17', 'C14', 41),
(437, 'A18', 'C01', 3),
(438, 'A18', 'C02', 4),
(439, 'A18', 'C03', 12),
(440, 'A18', 'C04', 15),
(441, 'A18', 'C05', 21),
(442, 'A18', 'C06', 23),
(443, 'A18', 'C07', 25),
(444, 'A18', 'C08', 28),
(445, 'A18', 'C09', 29),
(446, 'A18', 'C10', 31),
(447, 'A18', 'C11', 34),
(448, 'A18', 'C12', 36),
(449, 'A18', 'C13', 39),
(450, 'A18', 'C14', 42);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rel_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_rel_kriteria` (
  `ID1` varchar(16) NOT NULL,
  `ID2` varchar(16) NOT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`ID1`,`ID2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rel_kriteria`
--

INSERT INTO `tb_rel_kriteria` (`ID1`, `ID2`, `nilai`) VALUES
('C01', 'C01', 1),
('C01', 'C02', 3),
('C01', 'C03', 3),
('C01', 'C04', 3),
('C01', 'C05', 3),
('C01', 'C06', 3),
('C01', 'C07', 3),
('C01', 'C08', 3),
('C01', 'C09', 3),
('C01', 'C10', 3),
('C01', 'C11', 3),
('C01', 'C12', 3),
('C01', 'C13', 3),
('C01', 'C14', 9),
('C02', 'C01', 0.333333333),
('C02', 'C02', 1),
('C02', 'C03', 5),
('C02', 'C04', 5),
('C02', 'C05', 3),
('C02', 'C06', 5),
('C02', 'C07', 2),
('C02', 'C08', 2),
('C02', 'C09', 2),
('C02', 'C10', 4),
('C02', 'C11', 2),
('C02', 'C12', 3),
('C02', 'C13', 3),
('C02', 'C14', 5),
('C03', 'C01', 0.333333333),
('C03', 'C02', 0.2),
('C03', 'C03', 1),
('C03', 'C04', 5),
('C03', 'C05', 3),
('C03', 'C06', 5),
('C03', 'C07', 2),
('C03', 'C08', 2),
('C03', 'C09', 2),
('C03', 'C10', 2),
('C03', 'C11', 2),
('C03', 'C12', 3),
('C03', 'C13', 3),
('C03', 'C14', 5),
('C04', 'C01', 0.333333333),
('C04', 'C02', 0.2),
('C04', 'C03', 0.2),
('C04', 'C04', 1),
('C04', 'C05', 3),
('C04', 'C06', 5),
('C04', 'C07', 2),
('C04', 'C08', 2),
('C04', 'C09', 2),
('C04', 'C10', 2),
('C04', 'C11', 2),
('C04', 'C12', 3),
('C04', 'C13', 3),
('C04', 'C14', 5),
('C05', 'C01', 0.333333333),
('C05', 'C02', 0.333333333),
('C05', 'C03', 0.333333333),
('C05', 'C04', 0.333333333),
('C05', 'C05', 1),
('C05', 'C06', 3),
('C05', 'C07', 2),
('C05', 'C08', 2),
('C05', 'C09', 2),
('C05', 'C10', 2),
('C05', 'C11', 2),
('C05', 'C12', 3),
('C05', 'C13', 3),
('C05', 'C14', 5),
('C06', 'C01', 0.333333333),
('C06', 'C02', 0.2),
('C06', 'C03', 0.2),
('C06', 'C04', 0.2),
('C06', 'C05', 0.333333333),
('C06', 'C06', 1),
('C06', 'C07', 2),
('C06', 'C08', 2),
('C06', 'C09', 2),
('C06', 'C10', 2),
('C06', 'C11', 2),
('C06', 'C12', 3),
('C06', 'C13', 3),
('C06', 'C14', 5),
('C07', 'C01', 0.333333333),
('C07', 'C02', 0.5),
('C07', 'C03', 0.5),
('C07', 'C04', 0.5),
('C07', 'C05', 0.5),
('C07', 'C06', 0.5),
('C07', 'C07', 1),
('C07', 'C08', 2),
('C07', 'C09', 2),
('C07', 'C10', 2),
('C07', 'C11', 2),
('C07', 'C12', 3),
('C07', 'C13', 3),
('C07', 'C14', 5),
('C08', 'C01', 0.333333333),
('C08', 'C02', 0.5),
('C08', 'C03', 0.5),
('C08', 'C04', 0.5),
('C08', 'C05', 0.5),
('C08', 'C06', 0.5),
('C08', 'C07', 0.5),
('C08', 'C08', 1),
('C08', 'C09', 2),
('C08', 'C10', 2),
('C08', 'C11', 2),
('C08', 'C12', 3),
('C08', 'C13', 3),
('C08', 'C14', 5),
('C09', 'C01', 0.333333333),
('C09', 'C02', 0.5),
('C09', 'C03', 0.5),
('C09', 'C04', 0.5),
('C09', 'C05', 0.5),
('C09', 'C06', 0.5),
('C09', 'C07', 0.5),
('C09', 'C08', 0.5),
('C09', 'C09', 1),
('C09', 'C10', 2),
('C09', 'C11', 2),
('C09', 'C12', 3),
('C09', 'C13', 3),
('C09', 'C14', 7),
('C10', 'C01', 0.333333333),
('C10', 'C02', 0.25),
('C10', 'C03', 0.5),
('C10', 'C04', 0.5),
('C10', 'C05', 0.5),
('C10', 'C06', 0.5),
('C10', 'C07', 0.5),
('C10', 'C08', 0.5),
('C10', 'C09', 0.5),
('C10', 'C10', 1),
('C10', 'C11', 2),
('C10', 'C12', 3),
('C10', 'C13', 3),
('C10', 'C14', 5),
('C11', 'C01', 0.333333333),
('C11', 'C02', 0.5),
('C11', 'C03', 0.5),
('C11', 'C04', 0.5),
('C11', 'C05', 0.5),
('C11', 'C06', 0.5),
('C11', 'C07', 0.5),
('C11', 'C08', 0.5),
('C11', 'C09', 0.5),
('C11', 'C10', 0.5),
('C11', 'C11', 1),
('C11', 'C12', 3),
('C11', 'C13', 3),
('C11', 'C14', 5),
('C12', 'C01', 0.333333333),
('C12', 'C02', 0.333333333),
('C12', 'C03', 0.333333333),
('C12', 'C04', 0.333333333),
('C12', 'C05', 0.333333333),
('C12', 'C06', 0.333333333),
('C12', 'C07', 0.333333333),
('C12', 'C08', 0.333333333),
('C12', 'C09', 0.333333333),
('C12', 'C10', 0.333333333),
('C12', 'C11', 0.333333333),
('C12', 'C12', 1),
('C12', 'C13', 3),
('C12', 'C14', 5),
('C13', 'C01', 0.333333333),
('C13', 'C02', 0.333333333),
('C13', 'C03', 0.333333333),
('C13', 'C04', 0.333333333),
('C13', 'C05', 0.333333333),
('C13', 'C06', 0.333333333),
('C13', 'C07', 0.333333333),
('C13', 'C08', 0.333333333),
('C13', 'C09', 0.333333333),
('C13', 'C10', 0.333333333),
('C13', 'C11', 0.333333333),
('C13', 'C12', 0.333333333),
('C13', 'C13', 1),
('C13', 'C14', 5),
('C14', 'C01', 0.111111111),
('C14', 'C02', 0.2),
('C14', 'C03', 0.2),
('C14', 'C04', 0.2),
('C14', 'C05', 0.2),
('C14', 'C06', 0.2),
('C14', 'C07', 0.2),
('C14', 'C08', 0.2),
('C14', 'C09', 0.142857142),
('C14', 'C10', 0.2),
('C14', 'C11', 0.2),
('C14', 'C12', 0.2),
('C14', 'C13', 0.2),
('C14', 'C14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub`
--

CREATE TABLE IF NOT EXISTS `tb_sub` (
  `kode_sub` int(5) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nama_sub` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`kode_sub`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data untuk tabel `tb_sub`
--

INSERT INTO `tb_sub` (`kode_sub`, `kode_kriteria`, `nama_sub`, `nilai`) VALUES
(1, 'C01', 'Dalam batas administrasi', 3),
(3, 'C01', 'Diluar batas administrasi', 1),
(4, 'C02', 'Pemerintah daerah / pusat', 5),
(5, 'C02', 'Pribadi', 4),
(8, 'C01', 'Diluar batas administrasi dalam satu sistem pengelolaan TPA sampah terpadu', 2),
(9, 'C02', 'Swasta / Perusahaan', 3),
(10, 'C02', 'Lebih dari satu pemilik hak / status kepemilikan', 2),
(11, 'C02', 'Organisasi sosial / agama', 1),
(12, 'C03', 'Dibawah 500 mm per tahun', 3),
(13, 'C03', 'Antara 500 mm sampai 1000 mm per tahun', 2),
(14, 'C03', 'Di atas 1000 mm per tahun', 1),
(15, 'C04', 'Tidak ada bahaya banjir', 3),
(18, 'C04', 'Kemungkinan banjir > 25 tahun', 2),
(19, 'C04', 'Kemungkinan banjir < 25 tahun', 1),
(20, 'C05', 'Hutan, belukar, Rumput, tegalan', 3),
(21, 'C05', 'Sawah', 2),
(22, 'C05', 'Pemukiman, kebun, air tawar', 1),
(23, 'C06', 'Kurang dari 20%', 2),
(24, 'C06', 'Lebih dari 20 %', 1),
(25, 'C07', 'Lebih dari 300 m', 2),
(26, 'C07', 'Kurang dari 300 m', 1),
(27, 'C08', 'Lebih dari 1500 m', 2),
(28, 'C08', 'Kurang dari 1500 m', 1),
(29, 'C09', 'Lebih dari 3000 m', 2),
(30, 'C09', 'Kurang dari 3000 m', 1),
(31, 'C10', '10000 - 20000 m', 3),
(32, 'C10', '> 20000 m ', 2),
(33, 'C10', '< 10000 m', 1),
(34, 'C11', 'Terletak 500 m dari jalan umum', 2),
(35, 'C11', 'Terletak kurang 500 m dari jalan umum', 1),
(36, 'C12', 'Diluar kawasan lindung', 3),
(37, 'C12', 'Didalam kawasan lindung namun tidak terkena dampak negatif', 2),
(38, 'C12', 'Di dalam kawasan lindung dan bisa terkena dampak negatif', 1),
(39, 'C13', 'Berada di luar kawasan strategis', 2),
(40, 'C13', 'Berada di dalam kawasan strategis', 1),
(41, 'C14', '< 11 Ha', 1),
(42, 'C14', '11 - 20 Ha', 2),
(43, 'C14', '21 - 30 Ha', 3),
(45, 'C14', '31 - 40 Ha', 4),
(46, 'C14', '> 40 Ha', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `kode_user` varchar(16) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `nama_user`, `user`, `pass`, `level`) VALUES
('U001', 'Admin', 'Sutrisno', 'admin', 'admin'),
('U002', 'Handayani Putri', 'handayaniputrii', '12345', 'pimpinan'),
('U03', 'ayu', 'ayuuuuu', 'ayu', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
