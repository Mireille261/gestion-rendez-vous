-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 mars 2026 à 18:12
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
-- Base de données : `gestion_rdv`
--

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `statut` enum('en_attente','confirmé','annulé') DEFAULT 'en_attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id`, `nom`, `date`, `heure`, `statut`) VALUES
(1, 'Rouamba Flore', '2026-11-23', '07:12:00', 'en_attente');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date_rdv` date NOT NULL,
  `heure_rdv` time NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `nom`, `date_rdv`, `heure_rdv`, `date_creation`) VALUES
(7, 'Flore Joel', '2026-03-24', '03:55:00', '2026-03-24 01:55:18'),
(11, 'Rouamba Anna', '2026-02-07', '08:08:00', '2026-03-24 02:08:34'),
(13, 'KOMBERE JOEL', '2026-06-19', '08:24:00', '2026-03-24 02:24:15'),
(15, 'TRAORE Fahida', '2026-03-28', '07:00:00', '2026-03-25 10:04:46'),
(16, 'Rouamba Anna', '2026-03-25', '12:29:00', '2026-03-25 12:29:11'),
(23, 'YAYA YERBANGA', '2026-03-25', '14:51:00', '2026-03-25 14:56:35'),
(25, 'BAGNAN Lemuel', '2026-05-24', '15:30:00', '2026-03-25 15:21:15'),
(26, 'BAGNAN Lemuel', '2026-05-24', '17:04:00', '2026-03-25 17:04:27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
