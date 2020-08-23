-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 23 août 2020 à 17:49
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api_entissab`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `email`, `pass`) VALUES
(1, 'almor@gmail.com', '123456'),
(2, 'admin@gmail.com', 'admin'),
(3, 'client@gmail.com', '123456'),
(4, 'zsx@zsx.zsx', 'zsx');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_existed`
--

CREATE TABLE `etudiant_existed` (
  `id` int(11) NOT NULL,
  `massar` varchar(200) NOT NULL,
  `date_naiss` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant_existed`
--

INSERT INTO `etudiant_existed` (`id`, `massar`, `date_naiss`) VALUES
(1, 'd123456', '16/03/1994');

-- --------------------------------------------------------

--
-- Structure de la table `inscription_nv`
--

CREATE TABLE `inscription_nv` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `nom_fr` varchar(200) NOT NULL,
  `prenon_fr` varchar(200) NOT NULL,
  `nom_ar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `prenom_ar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cin` varchar(200) NOT NULL,
  `date_naiss` varchar(200) NOT NULL,
  `lieux_naiss` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `adress_ar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fct_pere` varchar(200) NOT NULL,
  `fct_mere` varchar(200) NOT NULL,
  `pays` varchar(200) NOT NULL,
  `annee_bac` varchar(200) NOT NULL,
  `serie_bac` varchar(200) NOT NULL,
  `montion_bac` varchar(200) NOT NULL,
  `img_bac` varchar(200) NOT NULL,
  `img_cin` varchar(200) NOT NULL,
  `img_relever` varchar(200) NOT NULL,
  `img_etudiant` varchar(200) NOT NULL,
  `terms` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant_existed`
--
ALTER TABLE `etudiant_existed`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription_nv`
--
ALTER TABLE `inscription_nv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etudiant_existed`
--
ALTER TABLE `etudiant_existed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `inscription_nv`
--
ALTER TABLE `inscription_nv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
