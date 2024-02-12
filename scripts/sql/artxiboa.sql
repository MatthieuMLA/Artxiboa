-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 fév. 2024 à 09:07
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `atxiboa`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_document` int(11) NOT NULL,
  `Id_feedback` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_action` (`Id`),
  KEY `Id_document` (`Id_document`),
  KEY `Id_Utilisateur` (`Id_Utilisateur`),
  KEY `Id_feedback` (`Id_feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` text NOT NULL,
  `Type` text NOT NULL,
  `Contenu` text NOT NULL,
  `Date_creation` date NOT NULL,
  `Etat` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_template` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_document` (`Id`),
  KEY `Id_template` (`Id_template`),
  KEY `Id_Utilisateur` (`Id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu_feedback` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_section` int(11) NOT NULL,
  `Contenu_section` text NOT NULL,
  `position` int(11) NOT NULL,
  `nom_section` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_section` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_section` int(11) NOT NULL,
  `Id_document` int(11) NOT NULL,
  `Nom_template` text NOT NULL,
  `Contenu_template` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_template` (`Id`),
  KEY `Id_section` (`Id_section`),
  KEY `Id_document` (`Id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Email` text NOT NULL,
  `MdP` text NOT NULL,
  `Role` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_Utilisateur` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `versions`
--

DROP TABLE IF EXISTS `versions`;
CREATE TABLE IF NOT EXISTS `versions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_document` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  `Numero_version` int(11) NOT NULL,
  `Contenu_version` text NOT NULL,
  `Section_version` int(11) NOT NULL,
  `Date_version` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_version` (`Id`),
  KEY `Id_document` (`Id_document`),
  KEY `Id_Utilisateur` (`Id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`Id_document`) REFERENCES `document` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `action_ibfk_3` FOREIGN KEY (`Id_feedback`) REFERENCES `feedback` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `versions` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`Id_section`) REFERENCES `sections` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `template_ibfk_2` FOREIGN KEY (`Id_document`) REFERENCES `document` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `versions`
--
ALTER TABLE `versions`
  ADD CONSTRAINT `versions_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
