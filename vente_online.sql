-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 01:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vente_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tachat`
--

CREATE TABLE `tachat` (
  `id_achat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `qteAchat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tachat`
--

INSERT INTO `tachat` (`id_achat`, `id_user`, `id_article`, `qteAchat`) VALUES
(1, 1, 6, 0),
(2, 2, 3, 1),
(3, 1, 4, 1),
(4, 1, 3, 1),
(5, 1, 4, 1),
(6, 1, 1, 1),
(7, 6, 1, 1),
(8, 1, 12, 1),
(9, 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tapprovisionnement`
--

CREATE TABLE `tapprovisionnement` (
  `id_approv` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantiteApprov` int(11) NOT NULL,
  `dateApprov` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tapprovisionnement`
--

INSERT INTO `tapprovisionnement` (`id_approv`, `id_article`, `quantiteApprov`, `dateApprov`) VALUES
(1, 3, 10, '2018-Sep-05'),
(2, 3, 38, '2018-Sep-05'),
(3, 3, 33, '2018-Sep-05'),
(4, 2, 19, '2018-Sep-05'),
(5, 2, 1, '2018-Sep-05'),
(6, 3, 6, '2018-Sep-05'),
(7, 4, 6, '2018-Sep-06'),
(8, 1, 12, '2018-Dec-26');

-- --------------------------------------------------------

--
-- Table structure for table `tarticle`
--

CREATE TABLE `tarticle` (
  `id_article` int(11) NOT NULL,
  `nomArticle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detailArticle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anneeFabrication` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `couleurArticle` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `poidsArticle` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prixUnitArticle` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `img_article` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `quantiteStock` int(11) DEFAULT '0',
  `fournisseurArticle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tarticle`
--

INSERT INTO `tarticle` (`id_article`, `nomArticle`, `detailArticle`, `anneeFabrication`, `couleurArticle`, `poidsArticle`, `prixUnitArticle`, `img_article`, `quantiteStock`, `fournisseurArticle`) VALUES
(9, 'Plat', 'RIZ', '2019', 'noir', '4', '35', '6f836d6c86052442148ea8a770e287b6.png', 100, 'WANI'),
(11, 'COCA', 'ENERGETIQUE', '2019', 'COCA', '2', '2', '25766e2f8005273087a3015a3abc06f7.jpg', 12, 'CHINE'),
(12, 'COCA CANNETTE', 'BRALIMA RDC', '2019', 'ORANGE', '56', '23', 'b787d4438e2b6d3f0f39a99416935b94.jpg', 20, 'GLODY'),
(15, 'BOIRE', 'RDC CONGO', '2018', 'ORANGE', '45', '15', '4651555843eab13eb961ccd0dd3130c7.jpg', 0, 'RDC'),
(16, 'SIMBA GROS', 'RDC CONGO', '2018', 'EAU', '15', '45', '8dbc4bd3196083d16073dfecb3ef5286.jpg', 0, 'RDC');

-- --------------------------------------------------------

--
-- Table structure for table `tpanier`
--

CREATE TABLE `tpanier` (
  `id_panier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `etatCommande` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qteCmd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tpanier`
--

INSERT INTO `tpanier` (`id_panier`, `id_user`, `id_article`, `etatCommande`, `qteCmd`) VALUES
(4, 1, 6, 'Valider', 1),
(7, 1, 4, 'Valider', 1),
(8, 1, 2, NULL, 1),
(10, 2, 3, 'Valider', 1),
(11, 1, 4, NULL, 1),
(12, 1, 1, NULL, 1),
(13, 1, 3, 'Valider', 1),
(14, 1, 4, 'Valider', 1),
(15, 1, 1, 'Valider', 1),
(16, 6, 1, 'Valider', 1),
(17, 6, 7, NULL, 1),
(18, 1, 9, 'Valider', 1),
(19, 1, 16, NULL, 1),
(20, 1, 15, NULL, 1),
(21, 1, 12, 'Valider', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(11) NOT NULL,
  `nomUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pwdUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `nomUser`, `pwdUser`, `numTel`, `adresse`) VALUES
(1, 'admin', '1234', '', NULL),
(2, 'julio', '1234', '', NULL),
(3, 'client', '1234', '', NULL),
(4, 'ets familia', '1234', '', NULL),
(5, 'muskam', '1234', '+243976703577', NULL),
(6, 'Tony', 'admin', '0973697114', 'Goma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tachat`
--
ALTER TABLE `tachat`
  ADD PRIMARY KEY (`id_achat`);

--
-- Indexes for table `tapprovisionnement`
--
ALTER TABLE `tapprovisionnement`
  ADD PRIMARY KEY (`id_approv`);

--
-- Indexes for table `tarticle`
--
ALTER TABLE `tarticle`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `tpanier`
--
ALTER TABLE `tpanier`
  ADD PRIMARY KEY (`id_panier`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tachat`
--
ALTER TABLE `tachat`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tapprovisionnement`
--
ALTER TABLE `tapprovisionnement`
  MODIFY `id_approv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tarticle`
--
ALTER TABLE `tarticle`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tpanier`
--
ALTER TABLE `tpanier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
