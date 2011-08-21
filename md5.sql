-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-08-2011 a las 10:14:31
-- Versión del servidor: 5.1.54
-- Versión de PHP: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `md5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decryptor`
--
-- Creación: 21-08-2011 a las 12:13:48
--

DROP TABLE IF EXISTS `decryptor`;
CREATE TABLE IF NOT EXISTS `decryptor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `string` varchar(50) NOT NULL,
  `hash` char(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `string` (`string`,`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=35 ;

--
-- Volcar la base de datos para la tabla `decryptor`
--

INSERT INTO `decryptor` (`id`, `string`, `hash`) VALUES
(1, 'ads', '2deb000b57bfac9d72c14d4ed967b572'),
(2, 'boniato', '9edea89ac8ed7884999e6cb020b426d3'),
(3, 'carlos', 'dc599a9972fde3045dab59dbd1ae170b'),
(4, 'dfde', '404d5969805e5acb4736b8acb734abbf'),
(5, 'dsagfd', '16d7c8b26068855e8b42fb481a81762c'),
(6, 'dsd5', '15e0a7232cc2375917779fa9dcbc8627'),
(7, 'encriptar', 'f969c5b9320c33912948824ec4553eea'),
(8, 'favds', 'c13c9e5af1ea1a6d3e38bb0cc97eab02'),
(9, 'g', 'b2f5ff47436671b6e533d8dc3614845d'),
(10, 'gatorade', '55712537786b86a6856caeb5fdcd7684'),
(11, 'godwana', 'c4cf7d297739e6951bdc67d5135877b5'),
(12, 'gogo', '1406f37190e825427440bc020919218a'),
(13, 'grvcb', '6ee8796f9955dbad47dc798e7d226a76'),
(14, 'hg', '40fe9ad4949331a12f5f19b477133924'),
(15, 'jffghf', 'c742a900bed006075799bedf2dcb8809'),
(16, 'juan', 'a94652aa97c7211ba8954dd15a3cf838'),
(17, 'jupiter', '27a5148ea0fbddae22d902bea9a19531'),
(18, 'kjjkm', '024041d805c086e9b1bfd7d82d72b22f'),
(19, 'kk', 'dc468c70fb574ebd07287b38d0d0676d'),
(20, 'KoSs', '18600b5273b77470bb58100bad764d6e'),
(21, 'koss', '99ead7315b67b3160309f512046e3690'),
(22, 'llop', '541583733855abf1479ea9fb9dede9fd'),
(23, 'lol', '9cdfb439c7876e703e307864c9167a15'),
(24, 'md5', '1bc29b36f623ba82aaf6724fd3b16718'),
(25, 'Pedro', '38e2b2e31c0fce9537f735dda9fdf10a'),
(26, 'pepe', '926e27eecdbc7a18858b3798ba99bddd'),
(27, 'rtg', '1da33616e19f532fca9bf8e3c095d11d'),
(28, 'serc', '441932710d3be09db869820f52c4c6db'),
(29, 'sg', '5dae429688af1c521ad87ac394192c6d'),
(30, 'super', '1b3231655cebb7a1f783eddf27d254ca'),
(31, 'superman', '84d961568a65073a3bcf0eb216b2a576'),
(32, 'ulJKB ASLIC', '8b904f6b919af2f32be5bad3e53d44d2'),
(33, 'wFASFASZ', '3177ea519839f67d700319e27b694444'),
(34, 'yo', '6d0007e52f7afb7d5a0650b0ffb8a4d1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--
-- Creación: 21-08-2011 a las 12:14:12
-- Última actualización: 21-08-2011 a las 12:14:12
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7da01fd32511b502dfa1f25640e58c71', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686; rv:5.0) Gecko/20100101 Firefox/5.0', 1313413282, 'a:1:{s:8:"language";s:2:"es";}'),
('6581979b008acaf9204a9bac7592d867', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686; rv:6.0) Gecko/20100101 Firefox/6.0', 1313776840, 'a:1:{s:8:"language";s:2:"es";}');
