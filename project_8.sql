-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 17 fév. 2018 à 20:11
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
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'le premier voiyage', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-02-07 14:07:00'),
(2, 'le dexieme reflex', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-02-07 14:08:00'),
(3, 'what\'s beyond that', 'Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-02-07 15:16:00'),
(4, 'the begining of the end', 'Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '2018-02-07 15:17:00'),
(33, 'test200', '<p>Lorem sdkhsdjkhsf sdgjskhkshgs; qjqkhkqhfqfhjkqhfqqjqf,qkfdfhsdhdsjksdfhdsf</p>\r\n<p>sdfjhsjhsdfjhsdjksjkhjhsdfhdsozerzeierzjerer</p>\r\n<p>iztiuztouzoeutozuetozutozuotueous</p>\r\n<p>sfsdisfkhskkshjhsfjshfdjsfjhsdsdf</p>\r\n<p>sdsddsf</p>\r\n<p>sdsf</p>', '2018-02-17 19:51:41'),
(21, 'test3', 'sdfdsfsdfsdfsdfsdf<br />fdssdfsfdsdfsdfsdfsdfsdf<br />sdfsdfsdfsfdsdf', '2018-02-17 08:36:54'),
(22, 'test4', 'fdfgdthfghgfhfghfhgfghfg<br />fhfghfghfghfhfghfhfghfgh<br />fghfghfhfhfghfghfhfghfhfghfgfh', '2018-02-17 08:38:49'),
(23, 'test5', 'fgdfgdfgdfgdfgdfgdfgdfdfg<br />dfgdfgdffgdfgfdfgdgfdfgdfdfgdfg<br /><br />', '2018-02-17 08:43:16'),
(24, 'efsdsdfsdf', 'sdfsfsdgsdgsgs', '2018-02-17 08:50:21'),
(25, 'sgsfsgsgsdg', '<p>dfsdfsgsgsfgsfgsfgsfgsfgsg</p>\r\n<p>sfgsgfsfgsfg</p>', '2018-02-17 08:51:42'),
(26, 'azeazeaze', 'azazeazeazeaze<br />aezazeaze', '2018-02-17 08:52:56'),
(27, 'sdfsdfsdfsdfsfd', 'iuyiyiyeyrizyryzeyrzieryizyeriyzeryzieryziyerizyeryzieryzieyrizyerizyeriyziyerizyeiryziyerizyeryizyieriyzr<br />zeirziyeriuzyeuryzieyrizyeiryziyeiryziyer<br />ezrizerizuyeruzyueyruzyeuiyryzeuyruzyeruyzeyriuzyeuryziueyruyzeyrizeyrizyery', '2018-02-17 08:54:26'),
(32, 'lorem', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2018-02-17 19:49:11'),
(35, 'test0', '<p>Bonjour,</p>\r\n<p>ici se trouve un article ecrit a l\'aide de tinyMce qui n\'est pas tres pratique a utiliser cuz it make everything worse and it take a lot of time to figure out the problem in php,so i want to test this out to find what may be the problem in the code...see you soon after i validate this project :)</p>\r\n<p>bye</p>', '2018-02-17 20:00:56');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `chapter_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'tuto', 'Lorem ipsum dolor sit amet, consectetur', '2018-02-07 14:10:00'),
(2, 1, 'test', 'Lorem ipsum dolor', '2018-02-07 14:11:00'),
(3, 2, 'lolo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n', '2018-02-07 14:15:00'),
(4, 2, 'trolol', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna ', '2018-02-07 14:16:00'),
(5, 3, 'not important', 'nice article :)', '2018-02-07 15:19:00'),
(6, 4, 'soon', 'what about adding some action ??', '2018-02-07 15:20:00'),
(7, 3, 'mii', 'zouma', '2018-02-08 19:55:54'),
(8, 1, 'gg', 'hello', '2018-02-08 19:57:42'),
(9, 2, 'test', 'Hi', '2018-02-14 14:53:53'),
(10, 4, 'test', 'hi', '2018-02-14 19:37:04'),
(11, 2, 'tuto', 'hi', '2018-02-14 19:38:13'),
(12, 4, 'another', 'test', '2018-02-14 19:40:21'),
(13, 2, 'qfdfsgsfg', 'sdgssgsg\r\nsdgsdgsgds', '2018-02-17 18:58:07'),
(14, 2, 'hkjhkh', 'khkjhkhkh', '2018-02-17 19:02:16');

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
(1, 'test', 'test@test.fr', '$2y$10$cRqf53rdDg9otbjbloytj.JqJa./2IxTX2TP6SZRTg0IHXP8xs9hu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
