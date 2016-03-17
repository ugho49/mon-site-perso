-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 17 Mars 2016 à 21:12
-- Version du serveur :  5.5.46-0+deb8u1
-- Version de PHP :  5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ughostephan`
--

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE IF NOT EXISTS `informations` (
  `key` varchar(25) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `button_name` varchar(30) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
`id` int(11) NOT NULL,
  `type_skill_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` mediumint(9) NOT NULL,
  `color_hexa` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#5E8A9F'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
`id` int(11) NOT NULL,
  `id_type_timeline` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_skills`
--

CREATE TABLE IF NOT EXISTS `type_skills` (
`id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_timeline`
--

CREATE TABLE IF NOT EXISTS `type_timeline` (
`id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `background_class` varchar(50) NOT NULL,
  `ico_class` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `informations`
--
ALTER TABLE `informations`
 ADD PRIMARY KEY (`key`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
 ADD PRIMARY KEY (`id`), ADD KEY `index_skills_on_type_skill_id` (`type_skill_id`), ADD KEY `type_skill_id` (`type_skill_id`);

--
-- Index pour la table `timeline`
--
ALTER TABLE `timeline`
 ADD PRIMARY KEY (`id`), ADD KEY `id_type_exp_form` (`id_type_timeline`), ADD KEY `id_type_timeline` (`id_type_timeline`);

--
-- Index pour la table `type_skills`
--
ALTER TABLE `type_skills`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_timeline`
--
ALTER TABLE `type_timeline`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `timeline`
--
ALTER TABLE `timeline`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `type_skills`
--
ALTER TABLE `type_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `type_timeline`
--
ALTER TABLE `type_timeline`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`type_skill_id`) REFERENCES `type_skills` (`id`);

--
-- Contraintes pour la table `timeline`
--
ALTER TABLE `timeline`
ADD CONSTRAINT `timeline_ibfk_1` FOREIGN KEY (`id_type_timeline`) REFERENCES `type_timeline` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
