-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 28 juin 2021 à 15:54
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(4, 'admin@gmail.com', '$2y$10$EsLyWz/B4XeWsEJGF4RCquWw1LH0i2P.IYdIdxlBs7fzkHUiViA.S');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(37, 'category 2'),
(38, 'category 3'),
(39, 'category 1');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `url_image` varchar(500) NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `id_categ` int(11) NOT NULL,
  `id_sous_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `url_image`, `prix`, `id_categ`, `id_sous_categ`) VALUES
(6, 'PARODONTAX', 'is a toothpaste that is clinically proven to help reduce bleeding gums. When used twice daily, it significantly reduces plaque and bleeding gums after 12 weeks.', '60d9d32a77a72_1624888106.jpg', 400, 39, 8),
(7, 'nova dent', 'Teeth whitening is one of the safest and conservative forms of cosmetic dental treatment', '60d9d374421ba_1624888180.jpg', 400, 39, 9),
(8, 'RESINE DENTAIRE BLANCHE', 'Résine dentaire blanche pour réparation des dents artificielles des prothèses dentaires pour resceller des facettes dentaires des dents prothètiques', '60d9d39e8911f_1624888222.jpg', 50, 37, 3),
(9, 'blanchiment des dents', 'Les produits de blanchiment des dents vendus sans ordonnance peuvent constituer le moyen le moins cher pour obtenir un sourire hollywoodien et peuvent être très efficaces', '60d9d3d2530f0_1624888274.jpg', 40, 37, 4),
(10, 'BRAND', 'Blanchiment des annonces de pâte dentifrice Modèle de dent et design d\\\'emballage de produit', '60d9d3fb6ff69_1624888315.jpg', 50, 37, 4),
(11, 'Poussée dentaire, 30 x 1 ml', 'Tout médicament ou produit de santé naturel peut causer des effets indésirables sérieux ou des interactions avec d’autres médicaments.', '60d9d41ddc1b3_1624888349.png', 50, 38, 5);

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE `souscategorie` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souscategorie`
--

INSERT INTO `souscategorie` (`id`, `name`, `id_categorie`) VALUES
(3, 'category 2.1', 37),
(4, 'category 2.2', 37),
(5, 'category 3.1', 38),
(6, 'category 3.2', 38),
(8, 'category 1.1', 39),
(9, 'category 1.2', 39);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categ` (`id_categ`),
  ADD KEY `fk_produit_souscategorie` (`id_sous_categ`);

--
-- Index pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_categorie_sousCategorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_souscategorie` FOREIGN KEY (`id_sous_categ`) REFERENCES `souscategorie` (`id`),
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `Fk_categorie_sousCategorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
