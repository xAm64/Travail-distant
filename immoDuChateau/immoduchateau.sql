-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 juin 2020 à 13:56
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
-- Base de données : `immoduchateau`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien_immobilier`
--

CREATE TABLE `bien_immobilier` (
  `id` int(11) NOT NULL,
  `Titre` varchar(150) NOT NULL,
  `Nombre_pieces` smallint(6) NOT NULL,
  `Surface` decimal(16,2) NOT NULL,
  `prix_de_vente` decimal(20,2) DEFAULT NULL,
  `Description` text NOT NULL,
  `GES` char(1) NOT NULL,
  `Classe_eco` char(1) NOT NULL,
  `Meubles` tinyint(1) NOT NULL,
  `Departement` char(3) NOT NULL,
  `Ville` varchar(32) NOT NULL,
  `Charges_annuelles` decimal(16,2) DEFAULT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_Propriétaire` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `catégories`
--

CREATE TABLE `catégories` (
  `id_cat` int(11) NOT NULL,
  `libelé_cat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `Id_Document` int(11) NOT NULL,
  `Titre_Document` varchar(41) NOT NULL,
  `Chemin_document` varchar(250) NOT NULL,
  `Auteur_document` varchar(41) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `Id_Image` int(11) NOT NULL,
  `Titre_image` varchar(41) NOT NULL,
  `Text_altternatif` varchar(250) NOT NULL,
  `Extension` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `montrer`
--

CREATE TABLE `montrer` (
  `id` int(11) NOT NULL,
  `Id_Image` int(11) NOT NULL,
  `img_principale` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `Id_niveau` int(11) NOT NULL,
  `libelle_niveau` varchar(50) NOT NULL,
  `Droits_habilitation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `propriétaires`
--

CREATE TABLE `propriétaires` (
  `Id_Propriétaire` int(11) NOT NULL,
  `Nom` varchar(35) NOT NULL,
  `Prenom` varchar(35) NOT NULL,
  `Adresse` varchar(250) NOT NULL,
  `CP` char(5) NOT NULL,
  `Ville` varchar(35) NOT NULL,
  `Tel` varchar(15) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `Office_notarial_titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bien_immobilier`
--
ALTER TABLE `bien_immobilier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Utilisateur` (`Id_Utilisateur`),
  ADD KEY `Id_Propriétaire` (`Id_Propriétaire`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `catégories`
--
ALTER TABLE `catégories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`Id_Document`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`Id_Image`);

--
-- Index pour la table `montrer`
--
ALTER TABLE `montrer`
  ADD PRIMARY KEY (`id`,`Id_Image`),
  ADD KEY `Id_Image` (`Id_Image`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`Id_niveau`);

--
-- Index pour la table `propriétaires`
--
ALTER TABLE `propriétaires`
  ADD PRIMARY KEY (`Id_Propriétaire`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Id_Utilisateur`),
  ADD KEY `Id_niveau` (`Id_niveau`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bien_immobilier`
--
ALTER TABLE `bien_immobilier`
  ADD CONSTRAINT `bien_immobilier_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateurs` (`Id_Utilisateur`),
  ADD CONSTRAINT `bien_immobilier_ibfk_2` FOREIGN KEY (`Id_Propriétaire`) REFERENCES `propriétaires` (`Id_Propriétaire`),
  ADD CONSTRAINT `bien_immobilier_ibfk_3` FOREIGN KEY (`id_cat`) REFERENCES `catégories` (`id_cat`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id`) REFERENCES `bien_immobilier` (`id`);

--
-- Contraintes pour la table `montrer`
--
ALTER TABLE `montrer`
  ADD CONSTRAINT `montrer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `bien_immobilier` (`id`),
  ADD CONSTRAINT `montrer_ibfk_2` FOREIGN KEY (`Id_Image`) REFERENCES `images` (`Id_Image`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`Id_niveau`) REFERENCES `niveaux` (`Id_niveau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
