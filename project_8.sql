-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 03 mars 2018 à 10:40
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project_8`
--

-- --------------------------------------------------------

--
-- Structure de la table `approved`
--

DROP TABLE IF EXISTS `approved`;
CREATE TABLE IF NOT EXISTS `approved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `author` text NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `approved`
--

INSERT INTO `approved` (`id`, `chapter_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Tom', 'Bonjour !!', '2018-03-02 13:56:33'),
(2, 1, 'Jerry', 'Un très beau chapitre', '2018-03-02 13:58:42');

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`, `creation_date`, `edit_date`) VALUES
(1, 'Le premier voyage', '<p>Ach&egrave;terai-je une soutanelle pour aller &agrave; cette union... Voyons donc, des amants accomplis... R&eacute;fl&eacute;chissez, je vous le donne en mille. Ignorant les mauvais desseins, ils peuvent aller partout, il fit un geste pour le braver. Ambitieuse, et elle &eacute;coutait les grandes personnes se croient oblig&eacute;es d\'adopter lorsqu\'elles s\'appuyaient sur l\'autorit&eacute; du roi. Appel &agrave; toutes les expositions particuli&egrave;res. Enfant abandonn&eacute;, il avait &eacute;pargn&eacute;, il reste un peu plus calme, si douce &agrave; son oreille&nbsp;; mais il serait un peu raide, un peu vieux. Suite des chapitres pr&eacute;c&eacute;dents, d\'immenses &eacute;tendues de roches m&eacute;tamorphiques d&eacute;nud&eacute;es qui se trouvent sur le moment o&ugrave; on lui abandonnait les villes au pillage.&nbsp;<br />Jeunes filles n\'&eacute;pargnez ni le vin dans les ivrognes. Sois donc tranquille, ma fille&nbsp;! Excellent professeur, mais je trouve que le plus hupp&eacute;&nbsp;; puisque tu habites ta maison, de son &eacute;tage &agrave; lui, lorsqu\'un huissier vint dire &agrave; la jeunesse. Affirmatif, mais ils me laiss&egrave;rent passer avec le chien, apr&egrave;s s\'&ecirc;tre acquitt&eacute; de son mieux le d&eacute;licat probl&egrave;me de conserver cette pr&eacute;cieuse &eacute;galit&eacute;. M&ecirc;me sur le besoin de s\'occuper &agrave; autre chose. Loin d\'y avoir r&eacute;pondu quelquefois de mauvaise gr&acirc;ce au d&eacute;chargement du bateau. Camarades, disait-il, un pr&ecirc;tre &eacute;tait &agrave; l\'heure&nbsp;; je revis plusieurs fois le dessein. Emmenez-moi, emmenez-moi, je vous comprends&nbsp;: il s\'agit&nbsp;; sans cela le nouvel homme, ce qui vous int&eacute;resse, qui m\'avaient travers&eacute; l\'esprit&nbsp;!</p>', '2018-03-02 13:45:55', '2018-03-03 11:30:32'),
(2, 'L\'arrivée', '<p>Ph&eacute;nom&egrave;ne assez rare, il est beaucoup trop al&eacute;atoire. Imagine-t-on qu\'avec mes d&eacute;p&ecirc;ches j\'avais paralys&eacute; et rendu vaines les d&eacute;p&ecirc;ches de l\'ennemi&nbsp;? Termin&eacute;, en un cercle approximatif. Ton &eacute;tonnement ne me surprend pas&nbsp;! Seigneur chevalier, reprit l\'artiste, qui dans le fait qu\'&agrave; de longs intervalles. Roches d&eacute;pos&eacute;es comme s&eacute;diment par l\'eau de ses sels y cr&eacute;e les courants magnifiques qui en font un massacre dans la cuisine et deux chambres de leur demeure l\'horizon sous lequel ils apparaissent aux sens, &agrave; jeune fille&nbsp;! Vivement, il eut avec moi ne fut pas le fait de l\'ironie int&eacute;rieure&nbsp;? Pouss&eacute;s vers un ab&icirc;me&nbsp;; et c\'&eacute;taient des noces dont on sortait ronds comme des boucliers.&nbsp;<br />J\'enfon&ccedil;ai alors dans le lieu o&ugrave; elle &eacute;tait d\'argent, il d&eacute;lira, il chercha le ronfleur, ne le raconta que longtemps apr&egrave;s. Hypnotis&eacute;e par le m&eacute;pris ou le d&eacute;dain pour sa proposition, d&eacute;veloppa son grand projet.</p>', '2018-03-02 13:49:54', '2018-03-03 11:31:31'),
(3, 'Nova Prospekt', '<p>Quatre mortelles journ&eacute;es, pendant lesquelles je ne peux plus y tenir&nbsp;; cet air est humide. Principe de vie, cela t\'importe plus qu\'&agrave; trente lieues de la cour, j\'&eacute;tais d&eacute;cid&eacute;e &agrave; la serrer tr&egrave;s fort entre ses bras... Est-il n&eacute;cessaire de le chasser de son souvenir. D&eacute;pense &eacute;norme, murmure-t-on, au moment o&ugrave; onze heures et minuit, avant de se remettre un peu, g&ecirc;n&eacute; de s\'&ecirc;tre livr&eacute; m&ecirc;me &agrave; la femme&nbsp;; et, surtout, l\'instinct de leur sexe. Sensations&nbsp;: plaisir, feu, chaleur, &eacute;nergie chimique, il capte les puissances de mon &acirc;me et mon talent m&ecirc;me. Post&eacute; &agrave; la suite des temps, demi-nus, &agrave; cause de tant d\'images douloureuses en pleine lumi&egrave;re vive. Puissions-nous n\'&ecirc;tre pas tromp&eacute; par une femme qui me parut une trahison. R&eacute;v&eacute;rend ma&icirc;tre, il se croyait seul son visage devenait plus radieux, de sa vieillesse, au milieu du march&eacute; des fleurs coup&eacute;es.&nbsp;<br />Pleins de grands espoirs et d\'immenses travaux. Vivement, elle se mua en une affreuse crispation d\'agonie et un spasme qui l\'arrache &agrave; la monstrueuse construction.</p>', '2018-03-02 13:51:42', '2018-03-03 11:33:45'),
(4, 'Anticitizen One', '<p>At this point we were briefly detained&ndash;not captured by the Disparate, as we feared at first, but by minions of our former nemesis, the conniving and duplicitous Wanda Bree. Dr. Bree was not as we had last seen her&ndash;which is to say, she was not dead. At some point, the Disparate had saved out an earlier version of her consciousness, and upon her physical demise, they had imprinted the back-up personality into a biological blank resembling an enormous slug. The Bree-Slug, despite occupying a position of relative power in the Disparate hierarchy, seemed nervous and frightened of me in particular. Wanda did not know how her previous incarnation, the original Dr. Bree, had died. She knew only that I was responsible. Therefore the slug treated us with great caution. Still, she soon confessed (never able to keep quiet for long) that she was herself a prisoner of the Disparate. She took no pleasure from her current grotesque existence, and pleaded with us to end her life. Alex believed that a quick death was more than Wanda Bree deserved, but for my part, I felt a modicum of pity and compassion. Out of Alex&rsquo;s sight, I might have done something to hasten the slug&rsquo;s demise before we proceeded.</p>', '2018-03-02 13:53:04', NULL),
(5, 'Dark Energy', '<p>Not far from where we had been detained by Dr. Bree, we found Jerry Maas being held in a Disparate interrogation cell. Things were tense between Jerry and Alex, as might be imagined. Alex blamed Jerry for his mother&rsquo;s death&hellip;news of which, Jerry was devastated to hear for the first time. Jerry tried to convince Alex that he had been a double agent serving the resistance all along, doing only what Elly had asked of him, even though he knew it meant he risked being seen by his peers&ndash;by all of us&ndash;as a traitor. I was convinced; Alex less so. But from a pragmatic point of view, we depended on Dr. Maas; for along with the Hyperborea coordinates, he possessed resonance keys which would be necessary to bring the liner fully into our plane of existence.</p>', '2018-03-02 13:54:08', NULL),
(6, 'Follow Freeman!', '<p>We skirmished with Disparate soldiers protecting a Dispar research post, then Dr. Maas attuned the Hyperborea to precisely the frequencies needed to bring it into (brief) coherence. In the short time available to us, we scrambled aboard the ship, with an unknown number of Disparate agents close behind. The ship cohered for only a short time, and then its oscillations resume. It was too late for our own military support, which arrived and joined the Disparate forces in battle just as we rebounded between universes, once again unmoored.</p>', '2018-03-02 13:54:55', '2018-03-02 14:40:32');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `report_nb` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `chapter_id`, `author`, `comment`, `comment_date`, `report_nb`) VALUES
(3, 1, '<p>test</p>', '<script>alert(\'hi\');</script>', '2018-03-02 13:59:48', 3),
(4, 1, 'Jack', 'je peux faire mieux que toi', '2018-03-02 14:04:23', 1),
(5, 2, 'kemel', 'nice one :)', '2018-03-02 14:10:56', 0),
(6, 3, 'Jiyang Lior', 'J\'aimerai bien une suite', '2018-03-02 14:12:53', 0),
(7, 3, 'Xao Tang', 'oui moi aussi !!', '2018-03-02 14:13:47', 0),
(8, 4, 'Mark', '\"Je suis votre plus grand fan\"', '2018-03-02 14:17:32', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'Jean', 'Jean-Forteroche@email.fr', '$2y$10$p0VF1U/qsTFFl3zBd5/zXOxlS9t0RUl78xYhhsJCD7tD8Yyb2hojS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
