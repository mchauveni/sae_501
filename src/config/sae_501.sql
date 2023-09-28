-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 sep. 2023 à 14:30
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_501`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `nom_entreprise` varchar(100) NOT NULL,
  `dpt_entreprise` varchar(100) NOT NULL,
  `ville_entreprise` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `dpt_entreprise`, `ville_entreprise`) VALUES
(2, 'Solo-Q', 'Malte', 'La Valette'),
(3, 'Schneider', 'Charente', 'Angoulême'),
(4, 'Carrefour', 'Auvergne', 'Givors'),
(5, 'Solicis', 'Charente', 'Gond-pontouvre'),
(6, 'Webperfect', 'Charente', 'Saint-Yrieix-sur-Charente');

-- --------------------------------------------------------

--
-- Structure de la table `entretien`
--

CREATE TABLE `entretien` (
  `id_entretien` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `entretien`
--

INSERT INTO `entretien` (`id_entretien`, `id_etudiant`, `id_entreprise`) VALUES
(9, 8, 3),
(10, 8, 4),
(11, 9, 5),
(12, 11, 5),
(13, 11, 3),
(14, 11, 6),
(15, 13, 3),
(16, 13, 6),
(17, 1, 5),
(18, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `nom_etudiant` varchar(100) NOT NULL,
  `prenom_etudiant` varchar(100) NOT NULL,
  `tel_etudiant` varchar(50) NOT NULL,
  `email_etudiant` varchar(100) NOT NULL,
  `mp_etudiant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `id_formation`, `nom_etudiant`, `prenom_etudiant`, `tel_etudiant`, `email_etudiant`, `mp_etudiant`) VALUES
(1, 2, 'Smirnov', 'Ilya', '06 30 12 45 68', 'ismirnov@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(8, 4, 'Naudé', 'Nathan', '06 35 25 48 65', 'nnaude@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(9, 3, 'Leroux', 'Gaston', '06 47 56 90 15', 'gleroux@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(10, 2, 'Beaumont', 'Marcel', '06 15 48 69 87', 'mbeaumont@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(11, 2, 'Jeannin', 'Antoine', '06 48 67 92 54', 'ajeannin@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(12, 3, 'Cochet', 'Miryam', '06 49 37 64 28', 'mcochet@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(13, 2, 'Arsenault', 'Élise', '06 37 48 69 45', 'earsenault@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(14, 5, 'Bonneau', 'Liam', '06 58 94 37 68', 'lbonneau@etu.univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `nom_BUT` varchar(50) NOT NULL,
  `annee_BUT` int(1) NOT NULL,
  `nom_resp_stage` varchar(50) NOT NULL,
  `prenom_resp_stage` varchar(50) NOT NULL,
  `email_resp_stage` varchar(50) NOT NULL,
  `mp_resp_stage` varchar(255) NOT NULL,
  `date_deb_insc` date NOT NULL,
  `date_fin_insc` date NOT NULL,
  `nb_max_entretiens` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom_BUT`, `annee_BUT`, `nom_resp_stage`, `prenom_resp_stage`, `email_resp_stage`, `mp_resp_stage`, `date_deb_insc`, `date_fin_insc`, `nb_max_entretiens`) VALUES
(2, 'MMI', 3, 'Bachir', 'Smail', 'sbachir@univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2023-09-14', '2023-10-05', 3),
(3, 'MMI', 2, 'Chaulet', 'Bernadette', 'bchaulet@univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2023-09-12', '2023-09-27', 3),
(4, 'MMI', 1, 'Barre', 'Marielle', 'mbarre@univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2023-09-30', '2023-10-04', 3),
(5, 'QLIO', 3, 'Solé', 'Brigitte', 'bsole@univ-poitiers.fr', 'ab6fd602559fab6fadd1559fab6fcbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2023-09-14', '2023-10-13', 3);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `fichier_offre` varchar(50) NOT NULL,
  `ref_offre` varchar(50) NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `id_entreprise`, `id_formation`, `fichier_offre`, `ref_offre`, `commentaires`) VALUES
(7, 2, 2, 'brochure.pdf', 'MMI3_éééétournageIRL', 'faut tourner la vidéo sexe là xxx attention c cho!!!!!'),
(11, 5, 2, 'MMI3_offre_11.pdf', 'MMI3_SolicisDevWeb', 'Création d\'applications Web.'),
(12, 5, 3, 'MMI2_offre_12.pdf', 'MMI2_SolicisDevWeb', 'Mise à jour d\'applications Web.'),
(13, 6, 2, 'MMI3_offre_13.pdf', 'MMI3_WebperfectComm', 'Mise à jour de sites web avec des outils de communication pertinents.'),
(14, 3, 4, 'MMI1_offre_14.pdf', 'MMI1_SchneiderCréaNum', 'Mise à jour du contenu multimédia sur le site web et les réseaux.'),
(15, 3, 2, 'MMI3_offre_15.pdf', 'MMI3_SchneiderCréaNum', 'Mise à jour du contenu multimédia sur le site web et les réseaux.'),
(16, 4, 4, 'MMI1_offre_16.pdf', 'MMI1_CarrefourDevWeb', 'Création site web simple pour le supermarché de secteur.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `entretien`
--
ALTER TABLE `entretien`
  ADD PRIMARY KEY (`id_entretien`),
  ADD KEY `FK_id_etudiant_entretien` (`id_etudiant`),
  ADD KEY `FK_id_entreprise_entretien` (`id_entreprise`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `FK_id_formation_etud` (`id_formation`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `FK_id_entreprise` (`id_entreprise`),
  ADD KEY `FK_id_formation` (`id_formation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `entretien`
--
ALTER TABLE `entretien`
  MODIFY `id_entretien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entretien`
--
ALTER TABLE `entretien`
  ADD CONSTRAINT `FK_id_entreprise_entretien` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_etudiant_entretien` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_id_formation_etud` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `FK_id_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_formation` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
