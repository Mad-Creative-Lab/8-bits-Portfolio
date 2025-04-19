-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 17 avr. 2025 à 15:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `8bits_portfolio_form`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sujet` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `sujet`, `message`, `created_at`) VALUES
(1, 'Mad', 'anonymad68@gmail.com', NULL, 'Demande de prix pour une prod asap svp. Merci !', '2025-04-17 08:18:02'),
(2, 'Mad', 'anonymad68@gmail.com', '', 'Des nouvelles ?!', '2025-04-17 08:21:50'),
(3, 'Mad', 'anonymad68@gmail.com', '', 'Des nouvelles ?!', '2025-04-17 08:31:57'),
(4, 'Mad', 'anonymad68@gmail.com', '', 'Peux-tu assurer d\'autres prod ?!', '2025-04-17 08:32:44'),
(5, 'Mad', 'anonymad68@gmail.com', '', 'Yo !', '2025-04-17 08:35:02'),
(6, 'Mad', 'anonymad68@gmail.com', '', 'Bien le bonjour. ', '2025-04-17 12:43:09'),
(7, 'Imade', 'anonymad68@gmail.com', '', 'Bonjour, je souhaite des informations sur votre musique.', '2025-04-17 12:44:25'),
(8, 'Mad', 'anonymad68@gmail.com', '', 'Combien pour la prod ?!', '2025-04-17 13:03:00'),
(9, 'Mad', 'anonymad68@gmail.com', '', 'Je souhaite créer uns ite internet.', '2025-04-17 13:12:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
