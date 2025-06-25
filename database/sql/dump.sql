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


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maktabislamiya`
--
SET FOREIGN_KEY_CHECKS = 0;
-- --------------------------------------------------------
-- Déchargement des données de la table `users`
--
DELETE FROM `users`;
INSERT INTO `users` (`id`, `nom`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dado', 'dado@gmail.com', NULL, '$2y$12$1hSek7Ub.xJlBDh0/wPageQqCkFQbWS1amj1d2NfnD3SdVyzjvYYO', 'admin', NULL, '2025-05-30 18:48:41', '2025-05-30 18:48:41'),
(2, 'User', 'user@gmail.com', NULL, '$2y$12$T4Rh7ksemhRvmII8C.h1POxIt3X/lGm/zrzoMgnVxMU787sD2RT1S', 'user', NULL, '2025-05-30 18:48:41', '2025-05-30 18:48:41'),
(7, 'Mamy Niang', 'mamita@gmail.com', NULL, '$2y$12$M/FQr79nGX88oR3altCjMOcy7A/nsgNDHxcMIhG1iRpze7J4gRVIm', 'user', NULL, '2025-06-16 18:10:48', '2025-06-16 18:10:48'),
(8, 'Omar Sarr', 'omzo@gmail.com', NULL, '$2y$12$.NclCMTUt4tcq0eTe8Z16OVpmqO8YBrxIt0gPXtlYK0SMP1fDHg..', 'user', NULL, '2025-06-16 18:16:52', '2025-06-16 18:16:52'),
(9, 'Awa Diop', 'awa@gmail.com', NULL, '$2y$12$D.c0ZimVpVXr0sAoF93dfOfwC1i147WyWBtISZoRb4XfmQqn4lqPq', 'user', NULL, '2025-06-16 18:23:33', '2025-06-16 18:23:33');
--
-- Déchargement des données de la table `auteurs`
--
DELETE FROM `auteurs`;
INSERT INTO `auteurs` (`id`, `nom`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Abd Al\'Azîz Ibn Bâz', 'auteurs/BhQTP5sDyZUuHQbVpU0TTVth3xOzqBIQTw6mGFzc.jpg', '2025-05-30 20:15:53', '2025-05-31 14:04:51'),
(2, 'Abdou Errazzaq Al-Badr', 'auteurs/zcUKVszkCzJYVvttl5TkrJ1CHJ6UKo9aKK2Xt9n2.jpg', '2025-05-30 20:17:11', '2025-05-30 21:27:49'),
(3, 'Taqî ad-Dîn Ahmad ibn Taymiyya', 'auteurs/5xsRPaeVLZo8bXVLTGkZRVUtUqJojPySYDutsmmp.jpg', '2025-05-30 20:18:50', '2025-06-03 12:57:20'),
(4, 'Mouhammad ibn Abd al-Wahhâb', 'auteurs/zflvx4brmqCl0v8M3lftoY7Ju9SAJD02JVWELZ3U.webp', '2025-05-30 20:19:52', '2025-05-31 14:04:17'),
(5, 'Ibn Qayyim al-Jawziyya', 'auteurs/63gOwXHwpZU7Nn21pKihufV6DiQyvncjArMixq3s.webp', '2025-05-30 20:20:50', '2025-06-03 12:55:22'),
(6, 'Mouhammad ibn Salih El Outheymîn', 'auteurs/62R1sQYdBI5GuN8ySRdL27bz6dTEuGCIjLWaEyNP.jpg', '2025-05-30 20:22:21', '2025-05-30 20:24:35'),
(7, 'Sa\'id Ibn Wahf Al Qahtâni', 'auteurs/PYUiFDXONpEovcqyFoS1VI91Odu1eHuEhVbU3cVO.jpg', '2025-05-30 20:27:02', '2025-05-30 20:27:02'),
(8, 'Salih Al-Fawzan', 'auteurs/MWe5p8JXGGTpTHagNKCeXoTa93CVZpbvkFLozUxC.jpg', '2025-05-30 20:27:43', '2025-06-03 12:58:43'),
(9, 'Abdoul Malick Mujahid', 'auteurs/oANuZQngQxUoKtUntMMS6bOcyMchfEeQPFVUjD7f.jpg', '2025-05-30 20:28:42', '2025-05-30 20:28:42'),
(10, 'Safiyyu ar-Rahmân Al-Mubârakfûrî', 'auteurs/g3LpsvllQZyrCdXuLWa6bBJJxJ0h9fjtS7sGjWw1.png', '2025-06-03 12:50:04', '2025-06-03 12:50:04'),
(11, 'Omar Al-Achqar', 'auteurs/ZMzn4q77zdItWniTOANua5viMsUVeS9Jd57eVRwB.webp', '2025-06-03 13:48:53', '2025-06-03 13:48:53'),
(12, 'Abdal Raḥmān ibn Zaydān', 'auteurs/aE3sI3yBTRNj5RkuxWREFelXI3SBkXrEDQVwCfo3.png', '2025-06-03 14:02:53', '2025-06-03 14:02:53');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `auteur_suivis`
--
DELETE FROM `auteur_suivis`;
INSERT INTO `auteur_suivis` (`id`, `user_id`, `auteur_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 7, NULL, NULL),
(3, 2, 6, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 2, 3, NULL, NULL),
(8, 2, 5, NULL, NULL),
(19, 2, 9, NULL, NULL),
(31, 7, 4, NULL, NULL),
(32, 7, 8, NULL, NULL),
(33, 7, 10, NULL, NULL),
(34, 7, 1, NULL, NULL),
(35, 7, 2, NULL, NULL),
(36, 7, 3, NULL, NULL),
(37, 8, 1, NULL, NULL),
(38, 8, 2, NULL, NULL),
(39, 8, 9, NULL, NULL),
(40, 8, 11, NULL, NULL),
(41, 9, 9, NULL, NULL),
(42, 9, 1, NULL, NULL),
(43, 9, 2, NULL, NULL),
(44, 7, 9, NULL, NULL);

-- --------------------------------------------------------
CREATE TABLE `book_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre_livre` varchar(255) NOT NULL,
  `nom_auteur` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Déchargement des données de la table `book_requests`
--

INSERT INTO `book_requests` (`id`, `titre_livre`, `nom_auteur`, `user_name`, `email`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Lahdariyou', NULL, 'user', 'user@gmail.com', 'j\'aimerais avoir le livre lahdariyou si possibe, j\'ignore le nom de l\'auteur. merci', '2025-06-06 19:02:13', '2025-06-06 19:02:13'),
(2, 'la vie du prophète', NULL, 'mamy', 'mamita@gmail.com', 'est-il possible d\'avoir le livre la vie du prohète vol 2?', '2025-06-09 19:25:02', '2025-06-09 19:25:02');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Adoration', '2025-05-30 20:13:13', '2025-05-30 20:13:13'),
(2, 'Comportement', '2025-05-30 20:13:28', '2025-05-30 20:13:28'),
(3, 'Apprentissage', '2025-05-30 20:13:50', '2025-05-30 20:13:50'),
(4, 'Biographie', '2025-05-30 20:14:00', '2025-05-30 20:14:00'),
(5, 'Hajj & Umra', '2025-05-30 20:14:16', '2025-05-30 20:14:16'),
(6, 'Prières et Purification', '2025-05-30 20:14:42', '2025-05-30 20:14:42'),
(7, 'Invocations', '2025-05-30 20:14:54', '2025-05-30 20:14:54'),
(8, 'Mariage', '2025-05-30 20:15:05', '2025-05-30 20:15:05'),
(9, 'Hadith', '2025-06-02 21:03:35', '2025-06-02 21:04:00'),
(10, 'Jeûne & Zakat', '2025-06-06 13:05:51', '2025-06-06 13:06:05'),
(11, 'La Femme en Islam', '2025-06-06 13:13:27', '2025-06-06 13:13:27'),
(12, 'Qur\'an & Exegèse', '2025-06-06 13:14:50', '2025-06-06 13:14:50');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `categorie_user`
--

INSERT INTO `categorie_user` (`id`, `categorie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 3, 2, NULL, NULL),
(22, 3, 7, NULL, NULL),
(23, 6, 7, NULL, NULL),
(24, 8, 7, NULL, NULL),
(25, 2, 8, NULL, NULL),
(26, 4, 8, NULL, NULL),
(27, 5, 8, NULL, NULL),
(28, 7, 9, NULL, NULL),
(29, 10, 9, NULL, NULL),
(30, 12, 9, NULL, NULL);

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Déchargement des données de la table `demande_livres`
--

INSERT INTO `demande_livres` (`id`, `titre_livre`, `nom_auteur`, `user_name`, `email`, `details`, `created_at`, `updated_at`) VALUES
(1, 'la vie du propgète', NULL, 'user', 'user@gmail.com', 'pouvez-vous poster le livre la vie du prophète, merci pour votre partage', '2025-06-15 18:06:16', '2025-06-15 18:06:16'),
(2, 'Le jardin des Vertueux', NULL, 'oumar', 'omzo@gmail.com', 'j\'aimerais lire cet ouvrage si possible, merci', '2025-06-15 18:10:58', '2025-06-15 18:10:58'),
(4, 'Pour toi soeur musulmane', NULL, 'Awa Diop', 'awa@gmail.com', 'salam, merci pour votre travaille. je souhaiterais pouvoir lire l\'ouvrage cité ci-dessous. merci', '2025-06-16 18:53:29', '2025-06-16 18:53:29');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `livre_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '2025-05-30 21:23:18', '2025-05-30 21:23:18'),
(3, 6, 2, '2025-05-31 19:04:03', '2025-05-31 19:04:03'),
(5, 5, 2, '2025-06-02 18:08:18', '2025-06-02 18:08:18'),
(6, 7, 2, '2025-06-03 10:26:56', '2025-06-03 10:26:56'),
(11, 9, 2, '2025-06-06 14:03:57', '2025-06-06 14:03:57'),
(16, 4, 7, '2025-06-16 18:12:02', '2025-06-16 18:12:02'),
(17, 5, 7, '2025-06-16 18:13:07', '2025-06-16 18:13:07'),
(18, 6, 7, '2025-06-16 18:14:32', '2025-06-16 18:14:32'),
(19, 8, 8, '2025-06-16 18:17:45', '2025-06-16 18:17:45'),
(20, 6, 8, '2025-06-16 18:18:59', '2025-06-16 18:18:59'),
(21, 9, 8, '2025-06-16 18:19:21', '2025-06-16 18:19:21'),
(22, 12, 9, '2025-06-16 18:24:11', '2025-06-16 18:24:11'),
(23, 7, 9, '2025-06-16 18:24:27', '2025-06-16 18:24:27'),
(24, 11, 9, '2025-06-16 18:24:45', '2025-06-16 18:24:45');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`

-- --------------------------------------------------------

--
-- Déchargement des données de la table `lectures`
--

INSERT INTO `lectures` (`id`, `livre_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2025-05-30 22:14:57', '2025-05-30 22:14:57'),
(4, 4, 2, '2025-06-01 19:24:36', '2025-06-01 19:24:36'),
(5, 5, 2, '2025-06-02 18:08:52', '2025-06-02 18:08:52'),
(6, 3, 2, '2025-06-03 10:27:26', '2025-06-03 10:27:26'),
(13, 7, 2, NULL, NULL),
(17, 3, 7, NULL, NULL),
(18, 4, 7, NULL, NULL),
(19, 5, 7, NULL, NULL),
(20, 8, 8, NULL, NULL),
(21, 6, 8, NULL, NULL),
(22, 9, 8, NULL, NULL),
(23, 12, 9, NULL, NULL),
(24, 7, 9, NULL, NULL),
(25, 11, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `description`, `image_couverture`, `pdf_url`, `auteur_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(3, '60 Interrogations sur les Menstrues', 'En raison de la multitude des questions posées aux savants concernant les dispositions légales relatives aux pratiques religieuses de la femme en période de menstrues, il nous a semblé utile de regrouper les questions les plus fréquemment posées et qui ne sont toujours pas traitées de manière détaillée. Cette présentation a été rédigée dans un style clair et simple afin que ce guide soit d\'un usage aisé, à la portée du lecteur, car la compréhension de la jurisprudence est capitale pour une pratique cultuelle Intelligente et correcte.', 'livres/images/d2x8Aqkp71RSZgutrSFqUrVxFHp2LoqRuUKunJjU.jpg', 'livres/pdfs/PNdvxfBOL2zRymJvOxyvDacWAn60MteUW3iXV7Kk.pdf', 6, 3, '2025-05-30 21:15:26', '2025-06-04 14:11:46'),
(4, 'Les 40 Hadiths', 'Les « 40 hadiths » (al-Arba\'un an-Nawawiyah) sont une collection de quarante hadiths importants compilés par l\'Imam An-Nawawi. Ces hadiths abordent divers aspects fondamentaux de l\'Islam, tels que les enseignements de base, l\'intention et la sincérité. Plusieurs savants ont également écrit des ouvrages sur le sujet. Les 40 hadiths sont considérés comme une introduction essentielle à la compréhension de l\'Islam.', 'livres/images/CkiDr050Bfp393gV5wvcRfGVS8AsdEe0E7TmR38w.jpg', 'livres/pdfs/YzMmBtR4izM3nvFNnt4nD7SBI6QpyvMvxcShhGAJ.pdf', 12, 9, '2025-05-30 21:16:38', '2025-06-04 17:31:09'),
(5, 'Précieuses Histoires sur Khadija', 'Khadija, première épouse de Muhammad (paix et salut sur lui), est un exemple éclatant pour tous les Musulmans, hommes et femmes. Cette collection de récits authentiques souligne son intelligence, sont dévouement à la religion, sa croyance sincère en Allah et sa persévérance dans les circonstances les plus difficiles, un voyage à l\'époque des premiers temps de l\'Islam, à travers une connaissance approfondie de sa vie et de celle de ses enfants et petits-enfants. Cet ouvrage est une magnifique addition, merveilleusement documentée, aux travaux biographiques relatant la vie du Prophète (paix et salut sur lui), de sa famille, de ses Compagnons et de ses partisans.', 'livres/images/ALWkLjE2KhL6XsdNuyZkMD72cK8fB51CcoTgGowF.jpg', 'livres/pdfs/qyfUsvZSnGmcuf1XR33E1CWUMx9WMRDL2lMkIYEP.pdf', 9, 4, '2025-05-30 21:17:29', '2025-06-04 17:36:38'),
(6, 'Le Nectar Cacheté', 'Le Nectar Cacheté (Ar-Rahîq Al-Makhtoum) est une biographie du Prophète Muhammad (SAW). Cet ouvrage de référence, écrit par Cheikh Safiy Ar-Rahmân Al-Mubârakfûrî, a remporté le premier prix mondial d\'un concours sur la biographie prophétique. Il est considéré comme une synthèse des biographies existantes, présentant une vue d\'ensemble et contemporaine de la vie du Prophète.', 'livres/images/JOnS16vG1sMNsVOsL39sUSkFftnNrsIB1kUx7NH0.jpg', 'livres/pdfs/I1YoDuXNX4BNa0HXn06uBSPS6rzBA0dp6qJlNrAB.pdf', 10, 4, '2025-05-30 21:18:24', '2025-06-04 18:41:35'),
(7, 'Purification des cœurs', 'Le livre « Purification des cœurs » d\'Ibn Qayyim est un ouvrage important traitant de la spiritualité et du développement personnel. Il explore les états du cœur et les moyens de le purifier, en s\'appuyant sur des sources islamiques telles que le Coran et les hadiths authentiques. Ce livre est considéré comme un guide pour améliorer sa condition spirituelle et est très apprécié par ceux qui cherchent à approfondir leur foi et leur compréhension de la vie intérieure. Il offre des perspectives précieuses sur le bien-être spirituel et la quête de la perfection morale.', 'livres/images/Yd64EzFvgHr8h3LBBnG2nctKOxeH88dhkQPG9AVn.jpg', 'livres/pdfs/PxXdLVx2jXHBJTUN1v9Hjdsw7RMsrVqlud4iKzTw.pdf', 5, 6, '2025-05-30 21:19:15', '2025-06-04 18:10:28'),
(8, 'Les Enseignements Tirés du Récit de Luqman', 'Le récit de Luqman offre des enseignements précieux et des conseils bénéfiques. Il contient des recommandations sur la bonne conduite, incluant des avertissements contre l\'arrogance et le mépris d\'autrui. Les paroles de Luqman sont considérées comme bénies et riches de sagesse, destinées à guider les individus vers la vertu.', 'livres/images/Avx1E4jseg33QsOHb7ONPNOb8y7lWdSHGJ4GzsrA.jpg', 'livres/pdfs/LMaF2sMHCY3aIcwRlFN5yX46Fiuieskmz5pvui4G.pdf', 2, 3, '2025-06-04 18:35:58', '2025-06-04 18:35:58'),
(9, 'Les Maladies du cœur Et leurs Remèdes', 'Le livre \"Les Maladies du cœur Et leurs Remèdes\" de Shaykh al-Islâm ibn Taymiyah est une œuvre importante qui explore les aspects spirituels et émotionnels de la santé du cœur. Il analyse différentes \"maladies\" du cœur et propose des \"remèdes\" basés sur les enseignements islamiques, notamment le Coran. Le livre est reconnu pour la profondeur de son analyse de l\'âme humaine et est considéré comme essentiel pour ceux qui cherchent à comprendre et à améliorer leur état spirituel.', 'livres/images/i6e2YR1yDzWLLhsUIngVd0Vhr5YWwuBLcpJGlysY.jpg', 'livres/pdfs/Wkg7ZWEkVGD7seYiHilIvAZJMPQ4XoQ8KspyrRwV.pdf', 3, 2, '2025-06-04 18:39:58', '2025-06-04 18:39:58'),
(10, 'Les Annulatifs de l\'Islam', 'Les Annulatifs de l\'islam / Les Quatre Règles / Les Six Fondements. Ce livre regroupe 3 textes courts de Cheikh al Islam Muhammad ibn \'abdilWahhâb, qu\'Allah lui fasse miséricorde. Bien qu\'il soit très concis ces écrits sont d\'une importance capitale. Le livre est entièrement vocalisé en français - arabe en vis à vis.', 'livres/images/X6oN8gIzbJ8xXG1bURRaL197dhA3I7UZ4UH28ZQx.jpg', 'livres/pdfs/uMlLa0VDSutNYJeJHPAPi45FSOhztGFVX6VeGdmp.pdf', 4, 1, '2025-06-04 20:04:00', '2025-06-04 20:04:00'),
(11, 'Hajj & Umra', 'L\'ouvrage de Cheikh Abd Al Aziz Ibn Baz sur le Hajj et l\'Umra est un guide détaillé et exhaustif, souvent traduit et publié sous différents formats. Il explique les rituels du Hajj et de l\'Umra, étape par étape, en incluant des explications sur les aspects juridiques et pratiques.', 'livres/images/LSoMeQNNkDJtqkHBLM75jpdyKqvQFUnDfqJlD3JC.jpg', 'livres/pdfs/IWfkI8YfgzSgiyDb7xsgQJoiJWsWCb95QDNHk1LA.pdf', 1, 5, '2025-06-04 20:28:08', '2025-06-04 20:28:08'),
(12, 'La Citadelle du Musulman', 'Ouvrage de rappels et d’invocations, aujourd’hui le plus utilisé. Les invocations sont tirées du Coran et de la Sunna du Prophète. L’ouvrage, en 2 couleurs, est bilingue (arabe-français), toutes les invocations sont translittérées (phonétique). Ainsi, le lecteur francophone pourra tirer profit de ces belles invocations à réciter régulièrement.', 'livres/images/ArpoOVAjEJtfMm8aIiODMeR590AwWJ6V90RBZux8.jpg', 'livres/pdfs/XuU2ccSzTGgkYIvuWZLBQjWDdPfJs2Am7SAYW1QJ.pdf', 7, 3, '2025-06-04 20:31:29', '2025-06-04 20:31:29');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `livre_user`
--

INSERT INTO `livre_user` (`id`, `user_id`, `livre_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL),
(2, 2, 6, NULL, NULL),
(3, 2, 7, NULL, NULL),
(4, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--

-- --------------------------------------------------------

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `livre_id`, `user_id`, `valeur`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 3, '2025-05-30 21:21:45', '2025-05-30 21:21:45'),
(2, 3, 2, 5, '2025-05-30 22:40:53', '2025-05-30 22:40:53'),
(3, 7, 2, 5, '2025-05-31 18:55:20', '2025-05-31 18:55:20'),
(4, 6, 2, 3, '2025-05-31 19:05:26', '2025-05-31 19:05:26'),
(7, 5, 2, 5, '2025-06-02 18:08:28', '2025-06-02 18:08:28'),
(15, 8, 2, 4, '2025-06-06 14:03:48', '2025-06-06 14:03:48'),
(16, 10, 2, 2, '2025-06-06 14:04:11', '2025-06-06 14:04:11'),
(17, 9, 2, 2, '2025-06-06 14:04:30', '2025-06-06 14:04:30'),
(18, 12, 2, 5, '2025-06-06 14:04:48', '2025-06-06 14:04:48'),
(23, 3, 7, 3, '2025-06-16 18:11:31', '2025-06-16 18:11:31'),
(24, 4, 7, 3, '2025-06-16 18:12:23', '2025-06-16 18:12:23'),
(25, 6, 7, 5, '2025-06-16 18:14:40', '2025-06-16 18:14:40'),
(26, 8, 8, 4, '2025-06-16 18:17:36', '2025-06-16 18:17:36'),
(27, 6, 8, 4, '2025-06-16 18:18:54', '2025-06-16 18:18:54'),
(28, 9, 8, 3, '2025-06-16 18:19:12', '2025-06-16 18:19:12'),
(29, 11, 9, 1, '2025-06-16 18:24:39', '2025-06-16 18:24:39');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('awa@gmail.com', '$2y$12$7eea12Fic4pmS9p35Vamje73nHEBCHMW0JbTNAfzvMnSoI1oahXyK', '2025-05-31 23:07:55');

-- -------------------------------------------------------

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lQkVPalPnw2e2nXXT2erHkgBqOOQ0C9fcTew4GxS', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS3BQa3JKdVFXbThHY2h0THZBdW9naUZnZmU0NlZ6aFdqYWRFODBTSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2NhdGVnb3JpZXMvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1750879592);

-- --------------------------------------------------------

--
SET FOREIGN_KEY_CHECKS = 1;

--
-- Index pour les tables déchargées
--

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
