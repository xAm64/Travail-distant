-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 mai 2020 à 08:19
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tprestaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `duchemin`
--

CREATE TABLE `duchemin` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nom` varchar(60) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `commentaire` text NOT NULL,
  `note` double NOT NULL,
  `dateVisite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `duchemin`
--

INSERT INTO `duchemin` (`id`, `nom`, `adresse`, `prix`, `commentaire`, `note`, `dateVisite`) VALUES
(0000000001, 'Jean-Yves  SchillInger ', '17 Rue de la Poissonnerie, 68000 Colmar', '50.00', 'Le JY\'S est un restaurant différent des autres avec un décor cosy et résolument contemporain qui attire une très belle clientèle cosmopolite. Jean-Yves Schillinger est un chef doublement étoilé créatif qui vous entraînera dans une ronde dépaysante à souhait où la cuisine du monde est à l\'honneurLe chef décline la cuisine fusion à sa façon. Une carte régulièrement renouvelée s\'égaye de créations audacieuses et de plats revisités avec modernité et pertinence.', 9, '2019-12-05 14:21:11'),
(0000000002, 'L’Adriatico', '6 route de Neuf Brisach, 68000, Colmar', '25.00', 'Une des meilleurs pizzéria de la région Service très agréable, efficace et souriant Salle principale un peu bruyante mais cela donne un côté italien je recommande.', 8, '2020-02-04 21:40:13'),
(0000000007, 'Jean-Pierre Coffe', 'Dans un magsin Leader Price', '2.99', 'Mais c\'est dla meeeerrrrrrde!!!!', 1, '2020-04-01 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `duchemin`
--
ALTER TABLE `duchemin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `duchemin`
--
ALTER TABLE `duchemin`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
