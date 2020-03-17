-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 17 mars 2020 à 20:18
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
(4, 'jlassimahrzia111@gmail.com', '$2y$10$lWBCEO/bjpVPuOGLMbxH4uClrw9Co4634NFbfA86jhsyifCsZNNRi');

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
(33, 'catégorie1'),
(35, 'catégorie2');

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
  `id_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `url_image`, `prix`, `id_categ`) VALUES
(32, 'PARODONTAX', 'is a toothpaste that is clinically proven to help reduce bleeding gums. When used twice daily, it significantly reduces plaque and bleeding gums after 12 weeks.', '5e7109bd7aaa5_1584466365.png', 50, 33),
(33, 'nova dent', 'Teeth whitening is one of the safest and conservative forms of cosmetic dental treatment', '5e7109ad621c1_1584466349.jpg', 12.5, 33),
(34, 'RESINE DENTAIRE BLANCHE', 'Résine dentaire blanche pour réparation des dents artificielles des prothèses dentaires pour resceller des facettes dentaires des dents prothètiques', '5e5057f9be1d7_1582323705.jpg', 40.6, 35),
(35, 'blanchiment des dents', 'Les produits de blanchiment des dents vendus sans ordonnance peuvent constituer le moyen le moins cher pour obtenir un sourire hollywoodien et peuvent être très efficaces', '5e5058bc7d008_1582323900.jpg', 20, 35),
(36, 'BRAND', 'Blanchiment des annonces de pâte dentifrice Modèle de dent et design d\'emballage de produit', '5e505992b07a7_1582324114.jpg', 8000, 35),
(37, 'Poussée dentaire, 30 x 1 ml', 'Tout médicament ou produit de santé naturel peut causer des effets indésirables sérieux ou des interactions avec d’autres médicaments.', '5e505a127f023_1582324242.png', 9000, 35),
(38, 'produit', 'description', '5e71069d18717_1584465565.jpg', 10.56, 33);

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
  ADD KEY `id_categ` (`id_categ`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
