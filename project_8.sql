-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 02 mars 2018 à 13:55
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
(1, 'Le premier voyage', '<p>I hope this letter finds you well. I can hear your complaint already, &ldquo;Gertie Fremont, we have not heard from you in ages!&rdquo; Well, if you care to hear excuses, I have plenty, the greatest of them being I&rsquo;ve been in other dimensions and whatnot, unable to reach you by the usual means. This was the case until eighteen months ago, when I experienced a critical change in my circumstances, and was redeposited on these shores. In the time since, I have been able to think occasionally about how best to describe the intervening years, my years of silence. I do first apologize for the wait, and that done, hasten to finally explain (albeit briefly, quickly, and in very little detail) events following those described in my previous letter (referred to herewith as Epistle 2).</p>', '2018-03-02 13:45:55', '2018-03-02 13:48:24'),
(2, 'L\'arrivée', '<p>To begin with, as you may recall from the closing paragraphs of my previous missive, the death of Elly Vaunt shook us all. The Research &amp; Rebellion team was traumatized, unable to be sure how much of our plan might be compromised, and whether it made any sense to go on at all as we had intended. And yet, once Elly had been buried, we found the strength and courage to regroup. It was the strong belief of her brave son, the feisty Alex Vaunt, that we should continue on as his mother had wished. We had the Antarctic coordinates, transmitted by Elly&rsquo;s long-time assistant, Dr. Jerry Maas, which we believed to mark the location of the lost luxury liner Hyperborea. Elly had felt strongly that the Hyperborea should be destroyed rather than allow it to fall into the hands of the Disparate. Others on our team disagreed, believing that the Hyperborea might hold the secret to the revolution&rsquo;s success. Either way, the arguments were moot until we found the vessel. Therefore, immediately after the service for Dr. Vaunt, Alex and I boarded a seaplane and set off for the Antarctic; a much larger support team, mainly militia, was to follow by separate transport.</p>', '2018-03-02 13:49:54', '2018-03-02 14:09:10'),
(3, 'Nova Prospekt', '<p>It is still unclear to me exactly what brought down our little aircraft. The following hours spent traversing the frigid waste in a blizzard are also a jumbled blur, ill-remembered and poorly defined. The next thing I clearly recall is our final approach to the coordinates Dr. Maas had provided, and where we expected to find the Hyperborea. What we found instead was a complex fortified installation, showing all the hallmarks of sinister Disparate technology. It surrounded a large open field of ice. Of the Hyperborea itself there was no sign&hellip;or not at first. But as we stealthily infiltrated the Disparate installation, we noticed a recurent, strangely coherent auroral effect&ndash;as of a vast hologram fading in and out of view. This bizarre phenomenon initially seemed an effect caused by an immense Disparate lensing system, Alex and I soon realized that what we were actually seeing was the luxury liner Hyperborea itself, phasing in and out of existence at the focus of the Disparate devices. The aliens had erected their compound to study and seize the ship whenever it materialized. What Dr. Maas had provided were not coordinates for where the sub was located, but instead for where it was predicted to arrive. The liner was oscillating in and out of our reality, its pulses were gradually steadying, but there was no guarantee it would settle into place for long&ndash;or at all. We determined that we must put ourselves into position to board it at the instant it became completely physical.</p>', '2018-03-02 13:51:42', NULL),
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
