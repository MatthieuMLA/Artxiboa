-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 fév. 2024 à 17:44
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
-- Base de données : `artxiboa`
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
  `Date_creation` text NOT NULL,
  `Etat` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_template` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_document` (`Id`),
  KEY `Id_template` (`Id_template`),
  KEY `Id_Utilisateur` (`Id_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`Id`, `Titre`, `Type`, `Contenu`, `Date_creation`, `Etat`, `Id_Utilisateur`, `Id_template`) VALUES
(2, 'Facture Apple', 'Facture', 'Nom de l\'entreprise : Apple\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : appleservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi\r\n\r\nInstructions de paiement : Délai de paiement, modalités de paiement, adresse de paiement', '2024-02-21', 3, 1, 2),
(3, 'Facture IGN', 'Facture', 'Nom de l\'entreprise : IGN\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : ignservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 3, 1, 2),
(4, 'Facture Samsung', 'Facture', 'Nom de l\'entreprise : Samsung\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : samsungservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 2, 1, 2),
(5, 'Facture Zalando', 'Facture', 'Nom de l\'entreprise : Zalando\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : zalandoservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 3, 1, 2),
(6, 'Facture IKEA', 'Facture', 'Nom de l\'entreprise : IKEA\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : ikeaservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 3, 1, 2),
(7, 'Facture Garnier', 'Facture', 'Nom de l\'entreprise : Garnier\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : garnierservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 1, 1, 2),
(8, 'Facture Nutella', 'Facture', 'Nom de l\'entreprise : Nutella\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : nutellaservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 1, 1, 2),
(9, 'Facture Disney', 'Facture', 'Nom de l\'entreprise : Disney\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : disneyservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 2, 1, 2),
(10, 'Facture Coca-Cola', 'Facture', 'Nom de l\'entreprise : Coca-Cola\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : cocacolaservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 1, 1, 2),
(11, 'Facture Nespresso', 'Facture', 'Nom de l\'entreprise : Nespresso\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : nespressoservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 1, 1, 2),
(12, 'Facture FNAC', 'Facture', 'Nom de l\'entreprise : Fnac\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : fnacservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 3, 1, 2),
(13, 'Facture UGC', 'Facture', 'Nom de l\'entreprise : UGC\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : ugcservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 1, 1, 2),
(14, 'Facture Decathlon', 'Facture', 'Nom de l\'entreprise : Decathlon\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : decathlonservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 1, 1, 2),
(15, 'Facture LEVI\'S', 'Facture', 'Nom de l\'entreprise : LEVI\'S\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : levisservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi', '2024-02-21', 1, 1, 2),
(28, 'Devis Krys', 'Devis', 'Nom de l\'entreprise : Krys\r\n\r\nAdresse de l\'entreprise : 789, avenue des Consultants, Expertville, État67890\r\n\r\nNuméro de téléphone de l\'entreprise : (987) 654-3210\r\n\r\nAdresse électronique de l\'entreprise : krysconsultants@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 987654321\r\n\r\nDate du devis : 22 février 2024\r\n\r\nNuméro du devis : D2024-001\r\n\r\nDétails des services : Description des services, nombre d\'heures estimées, tarif horaire, montant total, code de service, numéro de référence, TVA\r\n\r\nDurée du devis : Période de validité du devis\r\n\r\nConditions de paiement : Acompte requis, échéances de paiement\r\n\r\nMontant total : Montant total des services estimés\r\n\r\nValidité du devis : Durée de validité du devis, conditions de prolongation\r\n\r\nClause de confidentialité : Accord de non-divulgation (le cas échéant)\r\n\r\nClause de responsabilité : Limites de responsabilité (le cas échéant)\r\n\r\nAcceptation du devis : Espace pour la signature et la date du client, acceptation des termes et conditions\r\n\r\nInformations supplémentaires : Notes spécifiques, demandes spéciales, références', '2024-02-21', 1, 1, 1),
(29, 'Devis Bart', 'Devis', 'Nom de l\'entreprise : Bart Consultants\r\n\r\nAdresse de l\'entreprise : 789, avenue des Consultants, Expertville, État67890\r\n\r\nNuméro de téléphone de l\'entreprise : (987) 654-3210\r\n\r\nAdresse électronique de l\'entreprise : bartconsultants@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 987654321\r\n\r\nDate du devis : 22 février 2024\r\n\r\nNuméro du devis : D2024-001\r\n\r\nDétails des services : Description des services, nombre d\'heures estimées, tarif horaire, montant total, code de service, numéro de référence, TVA\r\n\r\nDurée du devis : Période de validité du devis\r\n\r\nConditions de paiement : Acompte requis, échéances de paiement\r\n\r\nMontant total : Montant total des services estimés\r\n\r\nValidité du devis : Durée de validité du devis, conditions de prolongation\r\n\r\nClause de confidentialité : Accord de non-divulgation (le cas échéant)\r\n\r\nClause de responsabilité : Limites de responsabilité (le cas échéant)\r\n\r\nAcceptation du devis : Espace pour la signature et la date du client, acceptation des termes et conditions\r\n\r\nInformations supplémentaires : Notes spécifiques, demandes spéciales, références', '2024-02-21', 1, 3, 1),
(30, 'Devis Omron', 'Devis', 'Nom de l\'entreprise : Omron Consultants  Adresse de l\'entreprise : 789, avenue des Consultants, Expertville, État67890  Numéro de téléphone de l\'entreprise : (987) 654-3210  Adresse électronique de l\'entreprise : omronconsultants@example.com  Numéro de TVA de l\'entreprise : 987654321  Date du devis : 22 février 2024  Numéro du devis : D2024-001  Détails des services : Description des services, nombre d\'heures estimées, tarif horaire, montant total, code de service, numéro de référence, TVA  Durée du devis : Période de validité du devis  Conditions de paiement : Acompte requis, échéances de paiement  Montant total : Montant total des services estimés  Validité du devis : Durée de validité du devis, conditions de prolongation  Clause de confidentialité : Accord de non-divulgation (le cas échéant)  Clause de responsabilité : Limites de responsabilité (le cas échéant)  Acceptation du devis : Espace pour la signature et la date du client, acceptation des termes et conditions  Informations supplémentaires : Notes spécifiques, demandes spéciales, références', '2024-02-22', 4, 1, 1),
(31, 'Devis ABC', 'Devis', 'Nom de l\'entreprise : ABC Adresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345  Numéro de téléphone de l\'entreprise : (123) 456-7890  Adresse électronique de l\'entreprise : abcservices@example.com  Numéro de TVA de l\'entreprise : 123456789  Mode de paiement : Carte de crédit, Virement bancaire  Détails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA  Sous-total : Montant total des articles/services  Frais de port : Montant des frais de livraison (si applicable)  Montant de la TVA : Montant total de la TVA pour les articles/services  Montant total : Sous-total + Frais de port + Montant de la TVA  Mode de livraison : Détails de l\'expédition, transporteur, numéro de suivi  Instructions de paiement : Délai de paiement, modalités de paiement, adresse de paiement', '2024-02-22', 1, 1, 1),
(32, 'Devis test', 'Devis', 'Nom de l\'entreprise : Test\r\n\r\nAdresse de l\'entreprise : 123, rue des Entreprises, Villeville, État12345\r\n\r\nNuméro de téléphone de l\'entreprise : (123) 456-7890\r\n\r\nAdresse électronique de l\'entreprise : testservices@example.com\r\n\r\nNuméro de TVA de l\'entreprise : 123456789\r\n\r\nMode de paiement : Carte de crédit, Virement bancaire\r\n\r\nDétails de l\'article : Description de l\'article ou du service, quantité, prix unitaire, montant total, code d\'article, numéro de référence, TVA\r\n\r\nSous-total : Montant total des articles/services\r\n\r\nFrais de port : Montant des frais de livraison (si applicable)\r\n\r\nMontant de la TVA : Montant total de la TVA pour les articles/services\r\n\r\nMontant total : Sous-total + Frais de port + Montant de la TVA\r\n\r\nMode de livraison : Détails de l\'expédition, transporteur, numéro de suivi\r\n\r\n', '2024-02-22', 4, 3, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`Id`, `Numero_section`, `Contenu_section`, `position`, `nom_section`) VALUES
(1, 1, 'Lorem ipsum 1', 1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_section` int(11) NOT NULL,
  `Nom_template` text NOT NULL,
  `Contenu_template` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_template` (`Id`),
  KEY `Id_section` (`Id_section`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `template`
--

INSERT INTO `template` (`Id`, `Id_section`, `Nom_template`, `Contenu_template`) VALUES
(1, 1, 'devis', 'contenu devis 1'),
(2, 1, 'facture', 'contenu facture');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` text,
  `firstname` text,
  `login` text,
  `password` text,
  `Role` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_Utilisateur` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `lastname`, `firstname`, `login`, `password`, `Role`) VALUES
(1, 'Simpson', 'Homer', 'donut', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Simpson', 'Marge', 'marge', '519b2f2d0d0c048c6a5d085f79d6012c', 1),
(3, 'Simpson', 'Bart', 'el barto', '172924aadec293666b805437b84c18d7', 2),
(4, 'Simpson', 'Lisa', 'lisa_simpson', 'f61f2e52cef0031f01f332033298f9e9', 2);

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
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `action_ibfk_3` FOREIGN KEY (`Id_feedback`) REFERENCES `feedback` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_2` FOREIGN KEY (`Id_template`) REFERENCES `template` (`Id`),
  ADD CONSTRAINT `document_ibfk_3` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `user` (`Id`);

--
-- Contraintes pour la table `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`Id_section`) REFERENCES `sections` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `versions`
--
ALTER TABLE `versions`
  ADD CONSTRAINT `versions_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
