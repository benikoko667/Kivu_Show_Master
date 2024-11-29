-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 oct. 2024 à 11:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spectacle`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE `acteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image_profil` text NOT NULL,
  `type_spectacle` varchar(50) NOT NULL,
  `bloquer` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image_profil` text NOT NULL,
  `bloquer` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `email`, `password`, `image_profil`, `bloquer`) VALUES
(1, 'Admin', 'projettutore@gmail.com', 'admin', '../../img/profil1.png', b'0');

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `type_billet` varchar(50) NOT NULL,
  `date_obtention` datetime NOT NULL,
  `validation_gerant` bit(1) NOT NULL,
  `date_validation` datetime NOT NULL,
  `id_spectacle` int(11) NOT NULL,
  `id_spectateur` int(11) NOT NULL,
  `type_spectateur` varchar(50) NOT NULL,
  `identifiant_transaction` text NOT NULL,
  `id_etablissement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `type_billet`, `date_obtention`, `validation_gerant`, `date_validation`, `id_spectacle`, `id_spectateur`, `type_spectateur`, `identifiant_transaction`, `id_etablissement`) VALUES
(1, 'Standard', '2024-10-10 04:33:35', b'1', '2024-10-10 11:33:44', 1, 1, 'spectateur', 'i_3tfg', 1),
(2, 'VIP', '2024-10-10 09:13:57', b'1', '2024-10-10 09:23:54', 3, 1, 'spectateur', 'ID_4567BHD_5648jFDY', 1),
(3, 'VIP', '2024-10-10 11:37:03', b'1', '2024-10-10 11:37:52', 2, 1, 'spectateur', 'i_3tfg', 1),
(4, 'VIP', '2024-10-10 11:37:15', b'1', '2024-10-10 11:38:05', 1, 1, 'spectateur', 'i_3tfgRRFDWD', 1);

-- --------------------------------------------------------

--
-- Structure de la table `erreurs_authentifications`
--

CREATE TABLE `erreurs_authentifications` (
  `id` int(11) NOT NULL,
  `email_utiliser` text NOT NULL,
  `password_utiliser` text NOT NULL,
  `date_tentative` date NOT NULL,
  `terminal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `erreurs_authentifications`
--

INSERT INTO `erreurs_authentifications` (`id`, `email_utiliser`, `password_utiliser`, `date_tentative`, `terminal`) VALUES
(1, 'projettutore@gmail.com', '1234', '2024-10-10', '::1'),
(2, 'spectactateur@gmail.com', '1234', '2024-10-10', '::1'),
(3, 'projettutore@gmail.com', 'adiin', '2024-10-10', '::1'),
(4, 'testweb@gmail.com', '1234', '2024-10-10', '::1'),
(5, 'benintibonera667@gmail.com', '1234', '2024-10-10', '::1'),
(6, 'benintibonera667@gmail.com', '1234', '2024-10-10', '::1'),
(7, 'benintibonera@gmail.com', '1234', '2024-10-10', '::1'),
(8, 'benintibonera667@gmail.com', '12345', '2024-10-10', '::1'),
(9, 'benintibonera667@gmail.com', '1234', '2024-10-10', '::1'),
(10, 'benintibonera@gmail.com', '12345', '2024-10-10', '::1'),
(11, 'benintibonera@gmail.com', '1234', '2024-10-10', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement_spectacles`
--

CREATE TABLE `etablissement_spectacles` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type_spectacle` varchar(50) NOT NULL,
  `id_gerant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etablissement_spectacles`
--

INSERT INTO `etablissement_spectacles` (`id`, `nom`, `type_spectacle`, `id_gerant`) VALUES
(1, 'La Manne', 'concert', 1);

-- --------------------------------------------------------

--
-- Structure de la table `gerants`
--

CREATE TABLE `gerants` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image_profil` text NOT NULL,
  `bloquer` bit(1) NOT NULL,
  `id_etablissement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gerants`
--

INSERT INTO `gerants` (`id`, `nom`, `email`, `password`, `image_profil`, `bloquer`, `id_etablissement`) VALUES
(1, 'Gerant La Manne', 'testweb@gmail.com', '1234', '../../img/profil.png', b'0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `nombre_connexions`
--

CREATE TABLE `nombre_connexions` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nombre_connexions`
--

INSERT INTO `nombre_connexions` (`id`, `nombre`, `date`, `heure`) VALUES
(1, 3, '2024-10-10', '04:32:24');

-- --------------------------------------------------------

--
-- Structure de la table `propositions`
--

CREATE TABLE `propositions` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `numero` varchar(15) NOT NULL,
  `type_destinataire` varchar(50) NOT NULL,
  `id_etablissement` int(11) NOT NULL,
  `message_visiteur` text NOT NULL,
  `autorisation_newleter` varchar(15) NOT NULL,
  `type_utilisateur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `spectacles`
--

CREATE TABLE `spectacles` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `acteur_principale` varchar(50) NOT NULL,
  `autres_acteurs` text NOT NULL,
  `salle` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `type_spectacle` varchar(50) NOT NULL,
  `etat_terminer` bit(1) NOT NULL,
  `moyen_payement` text NOT NULL,
  `billet_vendu` int(11) NOT NULL,
  `id_etablissement` int(11) NOT NULL,
  `validation_admin` bit(1) NOT NULL,
  `prix_billet_standard` double NOT NULL,
  `prix_billet_vip` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `spectacles`
--

INSERT INTO `spectacles` (`id`, `nom`, `image`, `description`, `acteur_principale`, `autres_acteurs`, `salle`, `date`, `heure_debut`, `heure_fin`, `type_spectacle`, `etat_terminer`, `moyen_payement`, `billet_vendu`, `id_etablissement`, `validation_admin`, `prix_billet_standard`, `prix_billet_vip`) VALUES
(1, 'Zero Polemique', './img/FB_IMG_1728190022323.jpg', 'Spectacle d\'humour rassamblant les meilleurs humouristes de Bukavu', 'JOYEUX BIN KABOJO', 'HERMAN HAMISI, FIDO DRC, ...', 'COLLEGE ALFAJIRI', '2024-10-12', '18:24:00', '22:22:00', 'theatre', b'0', 'AIRTEL MONEY: +243978684557', 2, 1, b'1', 50, 10),
(2, 'Concert', './img/FB_IMG_1728190248444.jpg', 'Concert Chretien ', 'Ton talent Bukavu', 'Mass Masilya, ', 'Celestine', '2024-10-17', '14:39:00', '17:40:00', 'concert', b'0', 'AIRTEL MONEY: +243978684557', 1, 1, b'1', 10000, 5000),
(3, 'FESTIRAS EDITION 2', './img/FB_IMG_1728190164373.jpg', 'Festival de musique organisé par FESTIRAS', 'Hiro le Coq', 'Darassa, Afande Ready', 'COLLEGE ALFAJIRI', '2024-10-13', '16:43:00', '21:00:00', 'concert', b'0', 'AIRTEL MONEY: +243978684557, +243998356453', 1, 1, b'1', 10, 25);

-- --------------------------------------------------------

--
-- Structure de la table `spectateurs`
--

CREATE TABLE `spectateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image_profil` text NOT NULL,
  `bloquer` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `spectateurs`
--

INSERT INTO `spectateurs` (`id`, `nom`, `email`, `password`, `image_profil`, `bloquer`) VALUES
(1, 'Beni Ntibonera', 'benintibonera667@gmail.com', '1234', '../../img/profil.png', b'0');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_connecter`
--

CREATE TABLE `utilisateurs_connecter` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `type_utilisateur` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `terminal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs_connecter`
--

INSERT INTO `utilisateurs_connecter` (`id`, `id_utilisateur`, `type_utilisateur`, `date`, `terminal`) VALUES
(1, 1, 'gerant', '2024-10-10 03:21:00', '::1'),
(2, 1, 'admin', '2024-10-10 03:24:41', '::1'),
(3, 1, 'spectateur', '2024-10-10 04:32:24', '::1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk3_idx` (`id_spectacle`),
  ADD KEY `fk4_idx` (`id_etablissement`);

--
-- Index pour la table `erreurs_authentifications`
--
ALTER TABLE `erreurs_authentifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etablissement_spectacles`
--
ALTER TABLE `etablissement_spectacles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_idx` (`id_gerant`);

--
-- Index pour la table `gerants`
--
ALTER TABLE `gerants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nombre_connexions`
--
ALTER TABLE `nombre_connexions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `propositions`
--
ALTER TABLE `propositions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `spectacles`
--
ALTER TABLE `spectacles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2_idx` (`id_etablissement`);

--
-- Index pour la table `spectateurs`
--
ALTER TABLE `spectateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs_connecter`
--
ALTER TABLE `utilisateurs_connecter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `erreurs_authentifications`
--
ALTER TABLE `erreurs_authentifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `etablissement_spectacles`
--
ALTER TABLE `etablissement_spectacles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `gerants`
--
ALTER TABLE `gerants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `nombre_connexions`
--
ALTER TABLE `nombre_connexions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `propositions`
--
ALTER TABLE `propositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `spectacles`
--
ALTER TABLE `spectacles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `spectateurs`
--
ALTER TABLE `spectateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs_connecter`
--
ALTER TABLE `utilisateurs_connecter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billets`
--
ALTER TABLE `billets`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`id_spectacle`) REFERENCES `spectacles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement_spectacles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etablissement_spectacles`
--
ALTER TABLE `etablissement_spectacles`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_gerant`) REFERENCES `gerants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `spectacles`
--
ALTER TABLE `spectacles`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement_spectacles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
