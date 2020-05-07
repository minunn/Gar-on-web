-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 mai 2020 à 14:40
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

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
-- Structure de la table `marqueur_image`
--

CREATE TABLE `marqueur_image` (
  `id` int(50) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `marqueur_position`
--

CREATE TABLE `marqueur_position` (
  `id` int(50) NOT NULL,
  `X` float NOT NULL,
  `Y` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `marqueur_texte`
--

CREATE TABLE `marqueur_texte` (
  `id` int(50) NOT NULL,
  `texte` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `plages_images`
--

CREATE TABLE `plages_images` (
  `id` int(50) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `plages_position`
--

CREATE TABLE `plages_position` (
  `id` int(50) NOT NULL,
  `X` float NOT NULL,
  `Y` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `plages_texte`
--

CREATE TABLE `plages_texte` (
  `id` int(50) NOT NULL,
  `texte` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'test', '$2y$10$LdVlzWO/X9FQb8J4fg.EFu9vLYc2VAYiMnZU1FsS1afpvYa7Vmguu'),
(3, 'hugo', '$2y$10$Kv3SfURul5ZKfdeX9IkA3.rowiM8A6w.nOQ0pt0lr0hQ721ZacYsi'),
(4, 'marco', '$2y$10$EYeCxs5bbWf.gqrPVN0CF.mQeiuKz3Wc9P.x1ZksqbOqHpMA3JtUK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `marqueur_image`
--
ALTER TABLE `marqueur_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marqueur_position`
--
ALTER TABLE `marqueur_position`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marqueur_texte`
--
ALTER TABLE `marqueur_texte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plages_images`
--
ALTER TABLE `plages_images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plages_position`
--
ALTER TABLE `plages_position`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plages_texte`
--
ALTER TABLE `plages_texte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
