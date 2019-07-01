-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Juillet 2019 à 10:34
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Universiter`
--

-- --------------------------------------------------------

--
-- Structure de la table `Batimat`
--

CREATE TABLE `Batimat` (
  `id_batimat` int(11) NOT NULL,
  `N_batimat` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Batimat`
--

INSERT INTO `Batimat` (`id_batimat`, `N_batimat`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Structure de la table `Boursier`
--

CREATE TABLE `Boursier` (
  `id_b` int(11) NOT NULL,
  `Matricule` int(11) NOT NULL,
  `id_bourse` int(11) NOT NULL,
  `Montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Boursier`
--

INSERT INTO `Boursier` (`id_b`, `Matricule`, `id_bourse`, `Montant`) VALUES
(7, 96, 3, 40000),
(9, 100, 3, 40000),
(10, 101, 2, 20000),
(11, 106, 3, 40000),
(12, 107, 3, 40000),
(13, 108, 3, 40000),
(14, 109, 3, 40000),
(15, 112, 3, 40000),
(16, 113, 3, 40000),
(17, 114, 3, 40000),
(18, 115, 2, 20000);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `N_chambre` int(11) NOT NULL,
  `N_batimat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `N_chambre`, `N_batimat`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Tel` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Datenaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Etudiant`
--

INSERT INTO `Etudiant` (`Matricule`, `Nom`, `Prenom`, `Tel`, `Email`, `Datenaissance`) VALUES
(1, 'Diouf', 'Fatou', 772586412, 'fadiouf@gmail.com', '1994-06-04'),
(95, 'Diallo', 'Amadou', 771231457, 'dialloamaz@yahoo.fr', '1989-06-05'),
(96, 'Gaye', 'Ndiaga', 771817731, 'gaye@gmail.com', '1991-06-10'),
(99, 'Camara', 'Penda', 771582356, 'penda@gmail.com', '1992-07-03'),
(100, 'Sall', 'yacine', 771582412, 'yacesall@gmail.com', '1998-07-13'),
(101, 'Diop', 'Ousmane', 771472325, 'ouzdiop@yahoo.fr', '1998-07-18'),
(102, 'Cisse', 'Tida', 771232458, 'tida25@yahoo.fr', '0989-02-17'),
(103, 'Sow', 'Oumar', 771586321, 'sowoumar@gmail.com', '1992-02-14'),
(104, 'Balde', 'lamarana', 772151412, 'BaldÃ©lamara@yahoo.fr', '1994-03-14'),
(105, 'Bah', 'Ramatoulaye', 771254832, 'rama@yahoo.fr', '1998-05-17'),
(106, 'Gueye', 'babacaar', 775896214, 'babacar64@yahoo.fr', '1998-07-14'),
(107, 'Khouma', 'Thiemokho', 771586932, 'thiÃ©mo@gmail.com', '1989-07-12'),
(108, 'Sarr', 'Moussa', 774521318, 'mous@gmail.com', '1998-07-13'),
(109, 'Ndiaye', 'senghor', 771562315, 'senghor@yahoo.fr', '1989-07-13'),
(110, 'diallo', 'Cellou', 774521319, 'Cellou@yahoo.fr', '2019-07-11'),
(111, 'Mbengue', 'Souleymane', 771231458, 'mbenguesouley@gmail.com', '1989-07-12'),
(112, 'Zale', 'Xavier', 774581236, 'zalÃ©xavier@yahoo.fr', '1989-07-19'),
(113, 'Mangara', 'abdourahmane', 772154732, 'magaraabdou@yahoo.fr', '1989-07-21'),
(114, 'dieye', 'malick', 772145236, 'dieye28@gmail.com', '1989-07-19'),
(115, 'Mboup', 'birame', 771472154, 'birame@gmail.com', '2000-07-06'),
(121, 'Faye', 'Alioune', 771253921, 'aliounefa@gmail.com', '1989-07-06');

-- --------------------------------------------------------

--
-- Structure de la table `Etudiantloger`
--

CREATE TABLE `Etudiantloger` (
  `Matricule` int(50) NOT NULL,
  `N_chambre` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Etudiantloger`
--

INSERT INTO `Etudiantloger` (`Matricule`, `N_chambre`, `id_chambre`) VALUES
(95, 1, 3),
(103, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `nomboursier`
--

CREATE TABLE `nomboursier` (
  `id_` int(11) NOT NULL,
  `Matricule` int(11) NOT NULL,
  `Adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `nomboursier`
--

INSERT INTO `nomboursier` (`id_`, `Matricule`, `Adresse`) VALUES
(3, 99, 'thies'),
(4, 102, 'mbour'),
(5, 103, 'dakar'),
(6, 104, 'thies'),
(7, 105, 'thies'),
(8, 110, 'thies'),
(9, 111, 'dakar');

-- --------------------------------------------------------

--
-- Structure de la table `type_bourse`
--

CREATE TABLE `type_bourse` (
  `id_bourse` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_bourse`
--

INSERT INTO `type_bourse` (`id_bourse`, `Libelle`) VALUES
(2, 'demi_bourse'),
(3, 'bourse_entier');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Batimat`
--
ALTER TABLE `Batimat`
  ADD PRIMARY KEY (`id_batimat`),
  ADD KEY `N_batimat` (`N_batimat`);

--
-- Index pour la table `Boursier`
--
ALTER TABLE `Boursier`
  ADD PRIMARY KEY (`id_b`,`Matricule`),
  ADD KEY `id_bourse` (`id_bourse`),
  ADD KEY `Matricule` (`Matricule`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_batimat` (`N_batimat`);

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`Matricule`);

--
-- Index pour la table `Etudiantloger`
--
ALTER TABLE `Etudiantloger`
  ADD PRIMARY KEY (`Matricule`),
  ADD UNIQUE KEY `Matricule` (`Matricule`),
  ADD UNIQUE KEY `numéro_chambre` (`id_chambre`),
  ADD KEY `id_chambre` (`N_chambre`);

--
-- Index pour la table `nomboursier`
--
ALTER TABLE `nomboursier`
  ADD PRIMARY KEY (`id_`,`Matricule`),
  ADD KEY `Matricule` (`Matricule`);

--
-- Index pour la table `type_bourse`
--
ALTER TABLE `type_bourse`
  ADD PRIMARY KEY (`id_bourse`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Batimat`
--
ALTER TABLE `Batimat`
  MODIFY `id_batimat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Boursier`
--
ALTER TABLE `Boursier`
  MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  MODIFY `Matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT pour la table `nomboursier`
--
ALTER TABLE `nomboursier`
  MODIFY `id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `type_bourse`
--
ALTER TABLE `type_bourse`
  MODIFY `id_bourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Boursier`
--
ALTER TABLE `Boursier`
  ADD CONSTRAINT `Boursier_ibfk_1` FOREIGN KEY (`Matricule`) REFERENCES `Etudiant` (`Matricule`),
  ADD CONSTRAINT `Boursier_ibfk_2` FOREIGN KEY (`id_bourse`) REFERENCES `type_bourse` (`id_bourse`);

--
-- Contraintes pour la table `Etudiantloger`
--
ALTER TABLE `Etudiantloger`
  ADD CONSTRAINT `Etudiantloger_ibfk_1` FOREIGN KEY (`Matricule`) REFERENCES `Etudiant` (`Matricule`),
  ADD CONSTRAINT `Etudiantloger_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`);

--
-- Contraintes pour la table `nomboursier`
--
ALTER TABLE `nomboursier`
  ADD CONSTRAINT `nomboursier_ibfk_1` FOREIGN KEY (`Matricule`) REFERENCES `Etudiant` (`Matricule`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
