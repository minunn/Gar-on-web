-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 20 juil. 2020 à 12:05
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `websitedatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

CREATE TABLE `cartes` (
  `ID_cartes` int(11) NOT NULL,
  `nom_carte` varchar(25) NOT NULL,
  `ID_marqueur` int(25) DEFAULT NULL,
  `ID_plage` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`ID_cartes`, `nom_carte`, `ID_marqueur`, `ID_plage`) VALUES
(1, 'Carte 1', 1, NULL),
(2, 'Carte 1', 2, NULL),
(6, 'Carte 2', 5, NULL),
(7, 'Carte 3', 6, NULL),
(8, 'Carte 3', 7, NULL),
(9, 'Carte 3', 8, NULL),
(10, 'Carte 3', 9, NULL),
(11, 'Carte 4', 10, NULL),
(13, 'Carte 4', 12, NULL),
(14, 'Carte 5', 13, NULL),
(15, 'Carte 5', 11, NULL),
(16, 'Carte 5', 1872, NULL),
(17, 'Carte 5', 1873, NULL),
(18, 'Carte 6', 1874, NULL),
(19, 'Carte 6', 1877, NULL),
(20, 'Carte 6', 1878, NULL),
(21, 'Carte 6', 1879, NULL),
(22, 'Carte 7', 1880, NULL),
(23, 'Carte 7', 1881, NULL),
(24, 'Carte 7', 1882, NULL),
(25, 'Carte 8', 1883, NULL),
(26, 'Carte 8', 1884, NULL),
(27, 'Carte 8', 1885, NULL),
(28, 'Carte 8', 1886, NULL),
(29, 'Carte 9', 1887, NULL),
(30, 'Carte 9', 1888, NULL),
(31, 'Carte 9', 1889, NULL),
(32, 'Carte 10', 1890, NULL),
(34, 'Carte 10', 1892, NULL),
(35, 'Carte 11', 1893, NULL),
(36, 'Carte 11', 1894, NULL),
(37, 'Carte 12', 1895, NULL),
(38, 'Carte 12', 1896, NULL),
(40, 'Carte 12', 1898, NULL),
(41, 'Carte 13', 1899, NULL),
(42, 'Carte 13', 1900, NULL),
(43, 'Carte 14', 1901, NULL),
(44, 'Carte 14', 1902, NULL),
(45, 'Carte 14', 1903, NULL),
(46, 'Carte 14', 1904, NULL),
(47, 'Carte 15', 1905, NULL),
(48, 'Carte 15', 1906, NULL),
(63, 'Carte 1', NULL, 7),
(64, 'Carte 1', NULL, 8),
(65, 'Carte 1', NULL, 9),
(66, 'Carte 1', NULL, 10),
(67, 'Carte 2', NULL, 11),
(68, 'Carte 2', NULL, 12),
(69, 'Carte 2', NULL, 13),
(70, 'Carte 2', NULL, 14),
(71, 'Carte 3', NULL, 15),
(72, 'Carte 3', NULL, 16),
(73, 'Carte 3', NULL, 17),
(74, 'Carte 3', NULL, 18),
(75, 'Carte 4', NULL, 19),
(76, 'Carte 4', NULL, 20),
(77, 'Carte 4', NULL, 21),
(78, 'Carte 5', NULL, 22),
(79, 'Carte 5', NULL, 23),
(80, 'Carte 5', NULL, 24),
(81, 'Carte 5', NULL, 25),
(82, 'Carte 5', NULL, 26),
(83, 'Carte 6', NULL, 27),
(84, 'Carte 6', NULL, 28),
(85, 'Carte 6', NULL, 29),
(86, 'Carte 6', NULL, 30),
(87, 'Carte 6', NULL, 31),
(88, 'Carte 7', NULL, 32),
(89, 'Carte 7', NULL, 33),
(90, 'Carte 8', NULL, 34),
(91, 'Carte 9', NULL, 35),
(92, 'Carte 10', NULL, 36),
(93, 'Carte 11', NULL, 37);

-- --------------------------------------------------------

--
-- Structure de la table `liste_cartes`
--

CREATE TABLE `liste_cartes` (
  `ID` int(11) NOT NULL,
  `nom_carte` varchar(25) NOT NULL,
  `limites` polygon NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste_cartes`
--

INSERT INTO `liste_cartes` (`ID`, `nom_carte`, `limites`) VALUES
(1, 'Carte 1', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(2, 'Carte 2', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(3, 'Carte 3', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(4, 'Carte 4', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(5, 'Carte 5', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(6, 'Carte 6', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(7, 'Carte 7', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(8, 'Carte 8', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(9, 'Carte 9', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(10, 'Carte 10', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(11, 'Carte 11', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(12, 'Carte 12', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(13, 'Carte 13', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(14, 'Carte 14', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(15, 'Carte 15', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000),
(16, 'Carte 16', 0x000000000103000000010000000400000000000000000000000000000000000000000000000000f03f000000000000f03f0000000000000040000000000000004000000000000000000000000000000000);

-- --------------------------------------------------------

--
-- Structure de la table `marqueurs`
--

CREATE TABLE `marqueurs` (
  `ID_marqueur` int(255) NOT NULL,
  `Nom` text NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Texte` text DEFAULT NULL,
  `Photo` longblob DEFAULT NULL,
  `Image_type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marqueurs`
--

INSERT INTO `marqueurs` (`ID_marqueur`, `Nom`, `Latitude`, `Longitude`, `Texte`, `Photo`, `Image_type`) VALUES
(1, 'Bourdelles', 44.5525, -0.000494, 'Bénéficie d\'une cale très pratique et dispose également d\'une aire de pique-nique et de sanitaires.', NULL, NULL),
(2, 'Hure', 44.5513, -0.002662, 'Dispose d\'une cale à 1 km du village où on peut trouver une épicerie et un club d\'avirons.', NULL, NULL),
(3, 'passe de coldefer', 44.5451, 0.038063, NULL, NULL, NULL),
(4, 'meilhan sur garonne', 44.5241, 0.03742, NULL, NULL, NULL),
(5, 'banc de plage de meilhan sur garonne', 44.5186, 0.043642, 'Une plage très accessible permet de rejoindre le camping tout proche et le port sur le canal avec des sanitaires et une buvette. Le village situé à 1 km sur la hauteur dispose de tous les services', NULL, NULL),
(6, 'passe des îles de couthures', 44.5326, 0.078695, 'Nombreux hauts fonds et un\r\nenrochement qui découvre à l\'étiage rive gauche.', NULL, NULL),
(7, 'Couthures sur garonne', 44.5139, 0.079699, 'dernier port de pêche encore en activité.\r\nSiège de Gens de Garonne. Le village dispose d\'une cale de mise à\r\nl\'eau, d\'une aire de pique nique, de sanitaires et de restaurants.', NULL, NULL),
(8, 'Couthures sur garonne cale', 44.514, 0.079549, 'Vue de la cale de mise à l\'eau et de la plage.\r\nUne zone de vitesse est délimitée en aval de la cale', NULL, NULL),
(9, 'pont sur la departementale', 44.5099, 0.081688, 'Vue depuis l\'aval. La passe se situe rive droite, de nombreux\r\nenrochements dans l\'axe et sur la rive gauche. Un duc d\'albe découvre à 1m. sous l\'étiage, proche de la pile,\r\nrive droite.', NULL, NULL),
(10, 'embouchure de l avance', 44.5002, 0.105485, 'Un enrochement important s\'aligne rive gauche et découvre à l\'étiage.\r\nUne ligne haute tension traverse la Garonne à 1 km en aval, au PK 91.\r\nLe tirant d\'air est de 10m. à l\'étiage. Elle constitue un danger en période\r\nde hautes eaux (côte supérieure à 4m.)', NULL, NULL),
(11, 'pont suspendu de marmande', 44.5022, 0.139173, 'La passe se situe sous la deuxième arche rive gauche.\r\nUne autre ligne haute tension traverse la Garonne à 200 m. en aval.\r\nLe tirant d\'air est de 10m. à l\'étiage. Elle constitue un danger en période\r\nde hautes eaux (côte supérieure à 4m.)', NULL, NULL),
(12, 'la passe à la tête des travaux de thivras', 44.5029, 0.126083, 'La passe à \"la tête des travaux de Thivras\" au PK 88 est une succession de hauts fonds et d\'enrochements\r\nqui découvrent à l\'étiage', NULL, NULL),
(13, 'pont de la voie rapide à marmande', 44.5018, 0.147198, 'Hauts fonds en aval\r\nrive droite. La passe est dans l\'axe.', NULL, NULL),
(1871, 'pont du chemain de fer de marmande', 44.4988, 0.155866, 'Une cale de mise a l eau sur rive droite', NULL, NULL),
(1872, 'passe des îles de ballia', 44.4849, 0.169251, 'Sur 2 kms au PK 84 on trouve une succession\r\nd\'enrochements, d\'îles et de bancs de sable.\r\nCette passe est difficile sous l\'étiage même pour des petites embarcations et reste impraticable\r\nà moins 1m. pour les bateaux à moteur', NULL, NULL),
(1873, 'en amont de la passe des îles de ballia', 44.4851, 0.172797, 'En amont de la passe \"des îles de Ballia\" au PK 83 la plage est\r\naccessible depuis l\'amont rive gauche', NULL, NULL),
(1874, 'au niveau de Fourques sur Garonne.', 44.4534, 0.171057, 'Passage étroit avec de nombreux rochers affleurant qui découvrent à l\'étiage', NULL, NULL),
(1877, 'méandre de caumont', 44.4442, 0.176681, 'Au PK 78 dans le méandre de Caumont sur Garonne une succession de\r\nroches isolées rive droite et rive gauche.', NULL, NULL),
(1878, 'en amont de caumont', 44.446, 0.19273, 'En amont de Caumont sur Garonne: roches isolées rive droite', NULL, NULL),
(1879, 'vestige d\'un puits', 44.4454, 0.177407, 'Vestige d\'un puits sur la rive droite à moins 1m côté Taillebourg.\r\nRoches isolées rive gauche qui découvrent à l\'étiage', NULL, NULL),
(1880, 'île du mas d agenais', 44.4196, 0.213888, 'Vue aérienne de l\'île du Mas d\'Agenais. La passe se\r\nsitue rive droite entre l\'île et la cale.', NULL, NULL),
(1881, 'sortie de la passe ', 44.4148, 0.217226, 'Sortie de la passe rive gauche et vue de la cale du Mas\r\nd\'Agenais. Halte nautique sur le canal à 100m. Tous les services\r\ndans le village à 500m.', NULL, NULL),
(1882, 'pont suspendu du mas d agenais', 44.412, 0.222125, 'Pont suspendu du Mas d\'Agenais. Passage dans l\'axe.\r\nRoches isolées rive droite.', NULL, NULL),
(1883, 'embouchure de tareyre', 44.4022, 0.244139, 'Vue de l\'embouchure de Tareyre à Lagruère au\r\nPort des Rêves.', NULL, NULL),
(1884, 'cale de mise à l eau au port des rêves', 44.4023, 0.242863, 'Cale de mise à l\'eau au Port des Rêves.\r\nAire de pique nique, sanitaires. Proximité du canal latéral,\r\nliaison possible pour les petites embarcations.', NULL, NULL),
(1885, 'port des rêves sanitaire', 44.4019, 0.243453, 'Port des Rêves sanitaire', NULL, NULL),
(1886, 'passe à l\'aval du gravier du caillou rond', 44.4109, 0.257319, 'passe à \"l\'aval du gravier du\r\ncaillou rond\". Important banc de roches avant l\'embouchure du Tolzac.\r\nLa passe se situe rive gauche.', NULL, NULL),
(1887, 'roches isolées rive gauche', 44.3978, 0.288745, 'Roches isolées rive gauche à Lamarque (commune\r\nde Lagruère) qui découvrent à l\'étiage.', NULL, NULL),
(1888, 'embouchure de l', 44.3937, 0.293761, 'Embouchure de l\'Ourbise', NULL, NULL),
(1889, 'pont de tonneins', 44.389, 0.301619, 'Pont de Tonneins. Passe dans l\'axe\r\nBancs de sable importants rive gauche', NULL, NULL),
(1890, 'port de tonneins cales', 44.3889, 0.304972, 'Vue générale du port de Tonneins avec les deux cales principales rive droite. Club de canoës kayaks, bateau promenade. Tous les services en ville.', NULL, NULL),
(1891, 'port de tonneins cales', 44.3978, 0.309505, NULL, NULL, NULL),
(1892, 'passe des roches de reculay', 44.3772, 0.304096, 'passe des roches de Reculay., une des plus difficiles de Moyenne Garonne\r\navec une chute d\'eau de 2m sur 500m. Le chenal rive gauche permettait la remontée\r\ndes bateaux par le halage et la passe rive droite était traditionnellement utilisée à\r\nla descente. Lieu très prisé des kayakistes. La navigation y est très difficile en dessous\r\nd\'1m voire impraticable pour les embarcations à moteurs à partir de moins 0.50m\r\nsous l\'étiage.', NULL, NULL),
(1893, 'village de Monheurt', 44.3393, 0.308802, 'Village de Monheurt : restaurant, sanitaires. Petit port avec Cale de\r\nmise à l\'eau.', NULL, NULL),
(1894, 'le plan d\'eau profond', 44.3343, 0.312552, 'Le plan d\'eau profond est une zone de vitesse', NULL, NULL),
(1895, 'embouchure du lot', 44.3063, 0.339094, 'Au PK 2 sur le Lot le pont de chemin de fer,\r\npassage rive gauche. L\'accès est difficile en basses eaux.', NULL, NULL),
(1896, 'pont traversant le lot', 44.3058, 0.342076, 'Pont traversant le Lot, route départementale\r\n813. Cale de mise à l\'eau sous la 1ère arche rive gauche.', NULL, NULL),
(1898, 'pont de saint léger', 44.2895, 0.32032, 'Pont de Saint Léger. Passe rive gauche', NULL, NULL),
(1899, 'cale de mise à l', 44.2889, 0.319596, 'Cale de mise à l\'eau sous le pont de Saint Léger', NULL, NULL),
(1900, 'quai d', 44.2885, 0.32066, 'Quai d\'amarrage rive gauche, stationnement en attente d\'éclusage.', NULL, NULL),
(1901, 'Chenal d’entrée à l’écluse de Clairac', 44.3061, 0.345056, 'Chenal d’entrée à l’écluse de Clairac', NULL, NULL),
(1902, 'ecluse de clairac', 44.356, 0.377628, 'Ecluse de Clairac', NULL, NULL),
(1903, 'barrage en aval de clairac', 44.3568, 0.377478, 'Barrage en aval de Clairac', NULL, NULL),
(1904, 'Ecluse d’entrée du canalet au Lot, rive droite, au niveau du moulin.', 44.3065, 0.344056, 'Ecluse d’entrée du canalet au Lot, rive droite,\r\nau niveau du moulin.', NULL, NULL),
(1905, 'pont de clairac', 44.3581, 0.381771, 'Pont de Clairac, sortie du chenal rive gauche.', NULL, NULL),
(1906, 'vue du port de la ville de clairac', 44.3586, 0.380148, 'Vue du port et de la ville de Clairac (tous les services)', NULL, NULL),
(1907, 'cale de mise à l\'eau', 44.3588, 0.383617, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `plages`
--

CREATE TABLE `plages` (
  `ID_plage` int(25) NOT NULL,
  `Nom` text NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Texte` text DEFAULT NULL,
  `Photo` longblob DEFAULT NULL,
  `Image_type` varchar(20) DEFAULT NULL,
  `polygon` polygon DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plages`
--

INSERT INTO `plages` (`ID_plage`, `Nom`, `Latitude`, `Longitude`, `Texte`, `Photo`, `Image_type`, `polygon`) VALUES
(7, 'Banc de sable 1', 44.5514, -0.001979, 'Banc de sable', NULL, NULL, NULL),
(8, 'Banc de sable 2', 44.5431, 0.031672, 'Banc de sable', NULL, NULL, NULL),
(9, 'Banc de sable 3', 44.5435, 0.041506, 'Banc de sable', NULL, NULL, NULL),
(10, 'Banc de sable 4', 44.5345, 0.035974, 'Banc de sable', NULL, NULL, NULL),
(11, 'Banc de sable 5', 44.524, 0.037568, 'banc de sable ', NULL, NULL, NULL),
(12, 'Banc de sable 6', 44.5184, 0.044568, 'Banc de sable', NULL, NULL, NULL),
(13, 'Banc de sable 7', 44.5364, 0.058688, 'Banc de sable', NULL, NULL, NULL),
(14, 'Banc de sable 8', 44.5401, 0.068311, 'Banc de sable', NULL, NULL, NULL),
(15, 'Banc de sable 9', 44.5317, 0.07912, 'Banc de sable', NULL, NULL, NULL),
(16, 'Banc de sable 10', 44.5193, 0.08264, 'Banc de sable', NULL, NULL, NULL),
(17, 'Banc de sable 11', 44.5097, 0.083037, 'Banc de sable', NULL, NULL, NULL),
(18, 'Banc de sable 12', 44.5004, 0.105336, 'Banc de sable', NULL, NULL, NULL),
(19, 'Banc de sable 13', 44.5024, 0.123084, 'Banc de sable', NULL, NULL, NULL),
(20, 'Banc de sable 14', 44.503, 0.13079, 'Banc de sable', NULL, NULL, NULL),
(21, 'Banc de sable 15', 44.5029, 0.135731, 'Banc de sable', NULL, NULL, NULL),
(22, 'Banc de sable 16', 44.5004, 0.152775, 'Banc de sable', NULL, NULL, NULL),
(23, 'Banc de sable 17', 44.4884, 0.156518, 'Banc de sable', NULL, NULL, NULL),
(24, 'Banc de sable 18', 44.4844, 0.164862, 'Banc de sable', NULL, NULL, NULL),
(25, 'Banc de sable 19', 44.4851, 0.172788, 'Banc de sable', NULL, NULL, NULL),
(26, 'Banc de sable 20', 44.4806, 0.181677, 'Banc de sable', NULL, NULL, NULL),
(27, 'Banc de sable 21', 44.469, 0.183174, 'Banc de sable', NULL, NULL, NULL),
(28, 'Banc de sable 22', 44.4637, 0.180889, 'Banc de sable', NULL, NULL, NULL),
(29, 'Banc de sable 23', 44.4511, 0.170702, 'Banc de sable', NULL, NULL, NULL),
(30, 'Banc de sable 24', 44.444, 0.177822, 'Banc de sable', NULL, NULL, NULL),
(31, 'Banc de sable 25', 44.4456, 0.194106, 'Banc de sable', NULL, NULL, NULL),
(32, 'Banc de sable 26', 44.4286, 0.21055, 'Banc de sable', NULL, NULL, NULL),
(33, 'Banc de sable 27', 44.4185, 0.214256, 'Banc de sable', NULL, NULL, NULL),
(34, 'Banc de sable 28', 44.4036, 0.243368, 'Banc de sable', NULL, NULL, NULL),
(35, 'Banc de sable 29', 44.3868, 0.30867, 'Banc de sable', NULL, NULL, NULL),
(36, 'Banc de sable 30', 44.3832, 0.314935, 'Banc de sable', NULL, NULL, NULL),
(37, 'Banc de sable 31', 44.324, 0.332375, 'Banc de sable', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin1', '$2a$04$erbmS.QCHcEpn0rTZR.h9.i4t.dQis4Dx0w5EnrGDYX75CAL7X2uW'),
(3, 'admin2', '$2a$04$iV93usUdkosS8PWZG4Q1YOkRS1wtsVztycEmhJgfbiNnELO02QFUy'),
(4, 'admin3', '$2a$04$QOdc4yEvMIWHiewblILz.eV5fdy5Q4bd4Gpwn20CvfoLnlulYKHLa');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_marqueurs`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vue_marqueurs` (
`ID_marqueur` int(255)
,`Latitude` float
,`Longitude` float
,`Texte` text
,`Photo` longblob
);

-- --------------------------------------------------------

--
-- Structure de la vue `vue_marqueurs`
--
DROP TABLE IF EXISTS `vue_marqueurs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_marqueurs`  AS  select `marqueurs`.`ID_marqueur` AS `ID_marqueur`,`marqueurs`.`Latitude` AS `Latitude`,`marqueurs`.`Longitude` AS `Longitude`,`marqueurs`.`Texte` AS `Texte`,`marqueurs`.`Photo` AS `Photo` from `marqueurs` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cartes`
--
ALTER TABLE `cartes`
  ADD PRIMARY KEY (`ID_cartes`);

--
-- Index pour la table `liste_cartes`
--
ALTER TABLE `liste_cartes`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `marqueurs`
--
ALTER TABLE `marqueurs`
  ADD PRIMARY KEY (`ID_marqueur`);

--
-- Index pour la table `plages`
--
ALTER TABLE `plages`
  ADD PRIMARY KEY (`ID_plage`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cartes`
--
ALTER TABLE `cartes`
  MODIFY `ID_cartes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `liste_cartes`
--
ALTER TABLE `liste_cartes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `marqueurs`
--
ALTER TABLE `marqueurs`
  MODIFY `ID_marqueur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1909;

--
-- AUTO_INCREMENT pour la table `plages`
--
ALTER TABLE `plages`
  MODIFY `ID_plage` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
