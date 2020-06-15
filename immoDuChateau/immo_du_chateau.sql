-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 juin 2020 à 14:01
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
-- Base de données : `immo_du_chateau`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `afficher_par_type` (IN `libelle_cat` VARCHAR(250))  BEGIN
    SELECT biens_immobiliers.*
    FROM biens_immobiliers,categories
    WHERE categories.id_categorie = biens_immobiliers.id_categorie AND categories.lib_categorie=libelle_cat;  -- Utilisation du paramètre
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `association_img`
--

CREATE TABLE `association_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_image` int(10) UNSIGNED NOT NULL,
  `image_principale` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `biens_immobiliers`
--

CREATE TABLE `biens_immobiliers` (
  `id` int(11) UNSIGNED NOT NULL,
  `titre` varchar(100) NOT NULL,
  `nbr_pieces` int(11) NOT NULL,
  `surface` decimal(6,2) NOT NULL,
  `prix_vente` decimal(11,2) NOT NULL,
  `description` text DEFAULT NULL,
  `ges` char(1) NOT NULL,
  `classe_eco` char(1) NOT NULL,
  `meuble` tinyint(1) NOT NULL,
  `localisation` mediumtext DEFAULT NULL,
  `num_departement` char(3) NOT NULL,
  `ville` varchar(70) NOT NULL,
  `charges_annuelles` decimal(11,2) NOT NULL,
  `id_utilisateur_commercial` int(10) UNSIGNED NOT NULL,
  `id_categorie` int(10) UNSIGNED NOT NULL,
  `id_proprietaire` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `biens_immobiliers`
--

INSERT INTO `biens_immobiliers` (`id`, `titre`, `nbr_pieces`, `surface`, `prix_vente`, `description`, `ges`, `classe_eco`, `meuble`, `localisation`, `num_departement`, `ville`, `charges_annuelles`, `id_utilisateur_commercial`, `id_categorie`, `id_proprietaire`) VALUES
(1, 'Maison de maître au bord du Lac ', 5, '150.00', '550000.00', 'Belle maison de style située au bord du lac D\'Annecy...Emplacement avec vue sur le lac.', 'D', 'C', 0, 'Idéalement situé à 2 pas du centre de la vieille ville, quartier sud  ', '74', 'Annecy', '0.00', 1, 2, 2),
(2, 'Beau F3 MEUBLE\r\n', 3, '94.00', '220000.00', 'Beau F3 situé au 1er étage d\'une résidence avec vue sur le lac.', 'B', 'C', 0, 'A 2 pas du centre ville et des commerces , dans le quartier vieille ville, rue de l\'Ours', '74', 'Annecy', '2000.00', 2, 1, 3),
(3, 'Belle villa orienté plein sur avec belle vue les les Pyrénées', 6, '391.00', '606210.00', 'Situé à seulement 5minutes de la mer, cette villa vous offrira une belle vue sur les Pyrénées, proche des commerces et au calme vous profiterez de la vie  ', 'B', 'C', 1, '28 rue du lilas', '64', 'Bidart', '235.00', 1, 2, 3),
(4, 'Centre ville de Bayonne', 3, '45.00', '196000.00', 'Un bel appartement situé au centre ville de Bayonne avec une belle vue sur la Nive, principalement piétonnier vous avez tout à coté, à seulement 3 minutes à pieds des transports en commun.', 'D', 'D', 0, '26 Rue du centre ville', '64', 'Bayonne', '0.00', 1, 1, 2),
(5, 'Terrain à bâtir dans les landes', 0, '8500.00', '86000.00', 'Un beau terrain plat située à coté de la forêt idéal pour construire votre futur maison', 'A', 'A', 1, '877 route de labenne-océan', '40', 'Labenne', '0.00', 2, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) UNSIGNED NOT NULL,
  `lib_categorie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `lib_categorie`) VALUES
(1, 'Appartement'),
(2, 'Maison'),
(3, 'Terrains'),
(4, 'LocauxPro');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id_document` int(10) UNSIGNED NOT NULL,
  `titre_doc` varchar(250) NOT NULL,
  `chemin_doc` varchar(300) NOT NULL,
  `auteur_doc` varchar(100) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `habilitations`
--

CREATE TABLE `habilitations` (
  `id_niveau` int(10) UNSIGNED NOT NULL,
  `libelle_niveau` varchar(50) NOT NULL,
  `droits_habilitation` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `habilitations`
--

INSERT INTO `habilitations` (`id_niveau`, `libelle_niveau`, `droits_habilitation`) VALUES
(1, 'Superadmin', 'Accès tous dossier de ventes'),
(2, 'Agent_commercial', 'Accès à ses dossiers uniquement');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) UNSIGNED NOT NULL,
  `titre_image` varchar(250) NOT NULL,
  `chemin_image` varchar(300) NOT NULL,
  `texte_alternatif` varchar(250) NOT NULL,
  `extension` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaires`
--

CREATE TABLE `proprietaires` (
  `id_proprietaire` int(10) UNSIGNED NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(80) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `office_notarial_titre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `proprietaires`
--

INSERT INTO `proprietaires` (`id_proprietaire`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `telephone`, `mail`, `statut`, `office_notarial_titre`) VALUES
(2, 'HADDOCK', 'Archibald', 'rue de Moulinsard', 74000, 'Annecy', '0635353535', 'ahaddock@gmail.com', 'nom propre', 'étude de  M. Séraphin Lampion '),
(3, 'Tournesol', 'Tryphon', '36, Rue Cornavin ', 74000, 'Annecy', '038815151515', 'ttournesol@gmail.com', 'Gérant SCI ', 'Etude de M. Séraphin lampion');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(10) UNSIGNED NOT NULL,
  `nom_utilisateur` varchar(60) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(150) NOT NULL,
  `pass_utilisateur` varchar(400) NOT NULL,
  `id_niveau` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `pass_utilisateur`, `id_niveau`) VALUES
(1, 'CASTAFIORE', 'Bianca', 'bcastafiore@gmail.com', 'bianca', 2),
(2, 'Szut', 'Piotr', 'Pszut@gmail.com', 'piotr', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `association_img`
--
ALTER TABLE `association_img`
  ADD PRIMARY KEY (`id`,`id_image`),
  ADD KEY `fk_images` (`id_image`);

--
-- Index pour la table `biens_immobiliers`
--
ALTER TABLE `biens_immobiliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur_commercial` (`id_utilisateur_commercial`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `fK_proprietaire` (`id_proprietaire`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `habilitations`
--
ALTER TABLE `habilitations`
  ADD PRIMARY KEY (`id_niveau`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  ADD PRIMARY KEY (`id_proprietaire`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `id_niveau` (`id_niveau`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `biens_immobiliers`
--
ALTER TABLE `biens_immobiliers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `habilitations`
--
ALTER TABLE `habilitations`
  MODIFY `id_niveau` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  MODIFY `id_proprietaire` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association_img`
--
ALTER TABLE `association_img`
  ADD CONSTRAINT `association_img_ibfk_1` FOREIGN KEY (`id`) REFERENCES `biens_immobiliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_images` FOREIGN KEY (`id_image`) REFERENCES `images` (`id_image`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `biens_immobiliers`
--
ALTER TABLE `biens_immobiliers`
  ADD CONSTRAINT `biens_immobiliers_ibfk_1` FOREIGN KEY (`id_utilisateur_commercial`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `biens_immobiliers_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `fK_proprietaire` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaires` (`id_proprietaire`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id`) REFERENCES `biens_immobiliers` (`id`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `habilitations` (`id_niveau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
