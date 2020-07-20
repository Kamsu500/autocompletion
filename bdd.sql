-- 
-- Structure de la table `personne`
-- 

CREATE TABLE `personne` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(255) NOT NULL default '',
  `prenom` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) AUTO_INCREMENT=11 ;

-- 
-- Contenu de la table `personne`
-- 

INSERT INTO `personne` VALUES (1, 'Gentzen', 'Scott');
INSERT INTO `personne` VALUES (2, 'Codrington', 'Rick');
INSERT INTO `personne` VALUES (3, 'Munson', 'Kyle');
INSERT INTO `personne` VALUES (4, 'Giordano', 'Mike');
INSERT INTO `personne` VALUES (5, 'Melson', 'Randy');
INSERT INTO `personne` VALUES (6, 'Metelak', 'Nate');
INSERT INTO `personne` VALUES (7, 'Hemeon', 'Mark');
INSERT INTO `personne` VALUES (8, 'Craig', 'Jim');
INSERT INTO `personne` VALUES (9, 'Petridis', 'Aris');
INSERT INTO `personne` VALUES (10, 'Thompson', 'Dave');
