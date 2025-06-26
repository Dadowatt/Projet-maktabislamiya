-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 juin 2025 à 21:28
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET FOREIGN_KEY_CHECKS = 0;

-- [Données omises pour lisibilité, seront restaurées ici dans la vraie version]

-- Exemple de table corrigée (extrait simplifié)
DROP TABLE IF EXISTS `livres`;
CREATE TABLE `livres` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_couverture` varchar(255) DEFAULT NULL,
  `pdf_url` varchar(255) DEFAULT NULL,
  `auteur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categorie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Données d'exemple (réduites)
INSERT INTO `livres` (`id`, `titre`, `description`, `image_couverture`, `pdf_url`, `auteur_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(3, '60 Interrogations sur les Menstrues', '...', 'livres/images/d2x8Aqkp71RSZgutrSFqUrVxFHp2LoqRuUKunJjU.jpg', 'livres/pdfs/PNdvxfBOL2zRymJvOxyvDacWAn60MteUW3iXV7Kk.pdf', 6, 3, '2025-05-30 21:15:26', '2025-06-04 14:11:46');

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
