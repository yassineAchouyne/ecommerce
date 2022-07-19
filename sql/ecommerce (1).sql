-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 19 juil. 2022 à 09:39
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passworde` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `firstName`, `lastName`, `email`, `passworde`) VALUES
(1, 'yassine', 'achouyne', 'yassine.achouyne@ordishop.ma', 'ordishop');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `nom_blog` varchar(225) NOT NULL,
  `tag_blog` varchar(225) NOT NULL,
  `img_blog` varchar(1000) NOT NULL,
  `dateNew_blog` date NOT NULL,
  `description_blog` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_blog`, `nom_blog`, `tag_blog`, `img_blog`, `dateNew_blog`, `description_blog`) VALUES
(1, 'Over 90,000 â€œRAMinatorâ€ downloads', 'CompuRAM Redaktion', 'RAMinator.png', '2022-06-19', 'For more than 5 years our popular in-house analysis tool for determining system information for a RAM upgrade is available free of charge.'),
(2, 'Samsung Server SSD, but which one?', 'SSD', 'ssd.jpg', '2022-06-19', 'Samsung offers a variety of SSD, but what are the differences? And which SSD is best for which requirements? Our...');

-- --------------------------------------------------------

--
-- Structure de la table `clien`
--

DROP TABLE IF EXISTS `clien`;
CREATE TABLE IF NOT EXISTS `clien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passworde` varchar(45) DEFAULT NULL,
  `profil` varchar(1000) NOT NULL,
  `adress` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clien`
--

INSERT INTO `clien` (`id`, `firstName`, `lastName`, `email`, `passworde`, `profil`, `adress`) VALUES
(1, 'YASSINE', 'ACHOUYNE', 'achouyne.yassine@ofppt-edu.ma', 'yassine', 'LGGENE.jpg', 'Safi'),
(2, 'Yassine', 'Achouyne', 'yachouyne@gmail.com', '123', 'default.jpg', ''),
(3, 'ali', 'radi', 'ali@gmail.com', 'ali', 'PC.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `comande`
--

DROP TABLE IF EXISTS `comande`;
CREATE TABLE IF NOT EXISTS `comande` (
  `id_comande` int(11) NOT NULL AUTO_INCREMENT,
  `nom_clien` varchar(225) NOT NULL,
  `id_clien` int(11) NOT NULL,
  `comande` varchar(500) NOT NULL,
  `prix_total` int(11) DEFAULT NULL,
  `adresse_client` varchar(500) NOT NULL,
  `payer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_comande`),
  KEY `id_clien` (`id_clien`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentes`
--

DROP TABLE IF EXISTS `commentes`;
CREATE TABLE IF NOT EXISTS `commentes` (
  `id_client` int(11) DEFAULT NULL,
  `id_ordinateur` int(11) DEFAULT NULL,
  `commente` varchar(1000) DEFAULT NULL,
  `date_pub` date DEFAULT NULL,
  `star` int(11) NOT NULL,
  KEY `id_client` (`id_client`),
  KEY `id_ordinateur` (`id_ordinateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentes`
--

INSERT INTO `commentes` (`id_client`, `id_ordinateur`, `commente`, `date_pub`, `star`) VALUES
(1, 4, 'avc', '2022-07-16', 5),
(1, 15, 'a', '2022-07-16', 5),
(1, 15, 'b', '2022-07-16', 4),
(1, 18, 'c', '2022-07-16', 4),
(3, 14, 'read', '2022-07-16', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentescouffre`
--

DROP TABLE IF EXISTS `commentescouffre`;
CREATE TABLE IF NOT EXISTS `commentescouffre` (
  `id_client` int(11) DEFAULT NULL,
  `id_ordinateur` int(11) DEFAULT NULL,
  `commente` varchar(1000) DEFAULT NULL,
  `date_pub` date DEFAULT NULL,
  `star` int(11) NOT NULL,
  KEY `id_client` (`id_client`),
  KEY `id_ordinateur` (`id_ordinateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentescouffre`
--

INSERT INTO `commentescouffre` (`id_client`, `id_ordinateur`, `commente`, `date_pub`, `star`) VALUES
(1, 3, 'a', '2022-07-16', 5),
(1, 4, 'cc', '2022-07-16', 3);

-- --------------------------------------------------------

--
-- Structure de la table `fornisseur`
--

DROP TABLE IF EXISTS `fornisseur`;
CREATE TABLE IF NOT EXISTS `fornisseur` (
  `id_fornisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fornisseur` varchar(225) NOT NULL,
  `img_fornisseur` varchar(1000) NOT NULL,
  `description_fornisseur` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_fornisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fornisseur`
--

INSERT INTO `fornisseur` (`id_fornisseur`, `nom_fornisseur`, `img_fornisseur`, `description_fornisseur`) VALUES
(1, 'Marque Hp', 'hp.png', 'HP (Hewlett-Packard) est une Marque multinationale amÃ©ricaine dâ€™Ã©lectronique et d\'informatique qui fabricante et spÃ©cialiste en informatique, les imprimantes, les serveurs et rÃ©seaux, le logiciel et le multimÃ©dia.'),
(2, 'Marque Assus', 'asus.png', 'Liste de produits de la marque Asus disponibles chez OrdiShop : PC Portable, Ecran et autres articles de bonne qualitÃ© Ã  prix raisonnable'),
(3, 'Marque Dell ', 'dell.png', 'Liste de produits de la marque Dell disponibles chez OrdiShop : PC portable, Ordinateur bureau, Serveur, Ecran, Moniteur, Barrette mÃ©moire, unitÃ© centrale, consommable pour imprimante et autres articles de bonne qualitÃ© Ã  prix raisonnable.');

-- --------------------------------------------------------

--
-- Structure de la table `nos_couffre`
--

DROP TABLE IF EXISTS `nos_couffre`;
CREATE TABLE IF NOT EXISTS `nos_couffre` (
  `id_nos_Couffre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_nos_Couffre` varchar(225) NOT NULL,
  `img_nos_Couffre` varchar(1000) NOT NULL,
  `prix_nos_Couffre` int(11) NOT NULL,
  `description_nos_Couffre` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_nos_Couffre`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nos_couffre`
--

INSERT INTO `nos_couffre` (`id_nos_Couffre`, `nom_nos_Couffre`, `img_nos_Couffre`, `prix_nos_Couffre`, `description_nos_Couffre`) VALUES
(3, ' CELERON LENOVO', '4d7a2c403b505939f4a3028a30fe2a0c_Rishop_ma.png', 2999, 'PC PORTABLE IDEAPAD CELERON LENOVO'),
(4, 'PC GAMER', 'e4016ea1a22d8844510adb365c924938_Rishop_ma.png', 11290, 'PC GAMER LEGION Y530 CORE i5 LENOVO'),
(5, 'Pack de PC portable', 'R (1).jpg', 10500, 'Pack de PC portable Lenovo G5045 + Imprimante Canon PIXMA MG2440 + Sacoche Port Designs 15,6\" + Souris sans fil');

-- --------------------------------------------------------

--
-- Structure de la table `produits_ordinateur`
--

DROP TABLE IF EXISTS `produits_ordinateur`;
CREATE TABLE IF NOT EXISTS `produits_ordinateur` (
  `id_ordinateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ordinateur` varchar(225) NOT NULL,
  `img_ordinateur` varchar(1000) NOT NULL,
  `marque_ordinateur` varchar(225) NOT NULL,
  `type_ordinateur` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_ordinateur` int(11) NOT NULL,
  `dscription_ordinateur` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_ordinateur`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits_ordinateur`
--

INSERT INTO `produits_ordinateur` (`id_ordinateur`, `nom_ordinateur`, `img_ordinateur`, `marque_ordinateur`, `type_ordinateur`, `quantite`, `prix_ordinateur`, `dscription_ordinateur`) VALUES
(15, 'Hp', 'kindpng_4211048.png', 'Hp', 'Ordinateurs_de_portable', 5, 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n'),
(14, 'Asus', 'mini3.jpg', 'Asus', 'Mini_PC', 3, 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n'),
(17, 'Asus', 'kindpng_450523.png', 'Asus', 'Ordinateurs_de_portable', 2, 2000, 'Asus Travelmate P414-51 14Â´Â´ i51135G7/16GB/512GB SSD Laptop'),
(18, 'Acus', 'bureau3.jpg', 'Acus', 'Ordinateurs_de_bureau', 1, 3500, 'Acus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n'),
(19, 'Acus', 'bureau2.jpg', 'Acus', 'Ordinateurs_de_bureau', 10, 3500, 'Acus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n'),
(20, 'Hp', 'bureau1.jpg', 'Hp', 'Ordinateurs_de_bureau', 8, 3400, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,\r\n              Windows 10.\r\n'),
(22, 'Hp', '81aANc5rI7L._AC_UY218_.jpg', 'Hp', 'Ordinateurs_de_portable', 6, 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n'),
(23, 'Dell', 'R.jpg', 'Dell', 'Ordinateurs_de_portable', 1, 16590, 'PC Portable Dell Latitude 5420 i7-1185G7 14â€³ 16Gb 512Go SSD (N032L542014EMEA)'),
(29, 'Samsung ', '45-450042_samsung-laptop-laptop-png-transparent-png.jpg', 'Samsung', 'Ordinateurs_de_portable', 5, 3000, '15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.');

-- --------------------------------------------------------

--
-- Structure de la table `produit_panier`
--

DROP TABLE IF EXISTS `produit_panier`;
CREATE TABLE IF NOT EXISTS `produit_panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit_panier` int(11) NOT NULL,
  `nom_produit_panier` varchar(225) DEFAULT NULL,
  `img_produit_panier` varchar(1000) DEFAULT NULL,
  `prix_produit_panier` int(11) DEFAULT NULL,
  `dscription_produit_panier` varchar(1000) DEFAULT NULL,
  `id_clien` int(11) NOT NULL,
  `quantit` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clien` (`id_clien`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit_panier`
--

INSERT INTO `produit_panier` (`id`, `id_produit_panier`, `nom_produit_panier`, `img_produit_panier`, `prix_produit_panier`, `dscription_produit_panier`, `id_clien`, `quantit`, `statut`) VALUES
(19, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 0, 'revenir'),
(18, 15, 'Hp', 'kindpng_4211048.png', 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 0, 'revenir'),
(17, 15, 'Hp', 'kindpng_4211048.png', 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 0, 'revenir'),
(16, 19, 'Acus', 'bureau2.jpg', 3500, 'Acus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 0, 'revenir'),
(14, 15, 'Hp', 'kindpng_4211048.png', 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 0, 'revenir'),
(15, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 0, 'revenir'),
(13, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 0, 'revenir'),
(12, 15, 'Hp', 'kindpng_4211048.png', 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 0, 'revenir'),
(20, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 1, 'revenir'),
(21, 4, 'PC GAMER', 'e4016ea1a22d8844510adb365c924938_Rishop_ma.png', 11290, 'PC GAMER LEGION Y530 CORE i5 LENOVO', 1, 1, 'revenir'),
(22, 18, 'Acus', 'bureau3.jpg', 3500, 'Acus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 1, 'revenir'),
(23, 15, 'Hp', 'kindpng_4211048.png', 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 1, 'revenir'),
(24, 19, 'Acus', 'bureau2.jpg', 3500, 'Acus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 1, 'revenir'),
(25, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 1, 'revenir'),
(26, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 1, 'revenir'),
(27, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 1, 'revenir'),
(28, 18, 'Acus', 'bureau3.jpg', 3500, 'Acus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 1, 'instance'),
(29, 17, 'Asus', 'kindpng_450523.png', 2000, 'Asus Travelmate P414-51 14Â´Â´ i51135G7/16GB/512GB SSD Laptop', 1, 1, 'instance'),
(30, 19, 'Acus', 'bureau2.jpg', 3500, 'Acus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 1, 'instance'),
(31, 4, 'PC GAMER', 'e4016ea1a22d8844510adb365c924938_Rishop_ma.png', 11290, 'PC GAMER LEGION Y530 CORE i5 LENOVO', 1, 1, 'instance'),
(32, 15, 'Hp', 'kindpng_4211048.png', 1000, 'HP, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive, Windows 10.\r\n', 1, 1, 'instance'),
(33, 14, 'Asus', 'mini3.jpg', 16000, 'Asus, 15.6\" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,Windows 10.\r\n', 1, 1, 'instance');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
