-- phpMyAdmin SQL Dump
-- version 3.3.7deb3build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-02-2011 a las 22:07:20
-- Versión del servidor: 5.1.49
-- Versión de PHP: 5.3.3-1ubuntu9.3

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
-- Estructura de tabla para la tabla `md5_decryptor`
--
-- Creación: 03-02-2011 a las 22:03:24
--

DROP TABLE IF EXISTS `md5_decryptor`;
CREATE TABLE IF NOT EXISTS `md5_decryptor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `string` varchar(50) NOT NULL,
  `hash` char(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `string` (`string`,`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=70 ;

--
-- Volcar la base de datos para la tabla `md5_decryptor`
--

INSERT INTO `md5_decryptor` (`id`, `string`, `hash`) VALUES
(52, 'ads', '2deb000b57bfac9d72c14d4ed967b572'),
(39, 'boniato', '9edea89ac8ed7884999e6cb020b426d3'),
(38, 'carlos', 'dc599a9972fde3045dab59dbd1ae170b'),
(67, 'dfde', '404d5969805e5acb4736b8acb734abbf'),
(65, 'dsagfd', '16d7c8b26068855e8b42fb481a81762c'),
(55, 'dsd5', '15e0a7232cc2375917779fa9dcbc8627'),
(58, 'encriptar', 'f969c5b9320c33912948824ec4553eea'),
(46, 'favds', 'c13c9e5af1ea1a6d3e38bb0cc97eab02'),
(53, 'g', 'b2f5ff47436671b6e533d8dc3614845d'),
(63, 'gatorade', '55712537786b86a6856caeb5fdcd7684'),
(54, 'godwana', 'c4cf7d297739e6951bdc67d5135877b5'),
(45, 'gogo', '1406f37190e825427440bc020919218a'),
(56, 'grvcb', '6ee8796f9955dbad47dc798e7d226a76'),
(61, 'hg', '40fe9ad4949331a12f5f19b477133924'),
(68, 'jffghf', 'c742a900bed006075799bedf2dcb8809'),
(37, 'juan', 'a94652aa97c7211ba8954dd15a3cf838'),
(40, 'jupiter', '27a5148ea0fbddae22d902bea9a19531'),
(62, 'kjjkm', '024041d805c086e9b1bfd7d82d72b22f'),
(57, 'kk', 'dc468c70fb574ebd07287b38d0d0676d'),
(48, 'KoSs', '18600b5273b77470bb58100bad764d6e'),
(49, 'koss', '99ead7315b67b3160309f512046e3690'),
(44, 'llop', '541583733855abf1479ea9fb9dede9fd'),
(69, 'lol', '9cdfb439c7876e703e307864c9167a15'),
(60, 'md5', '1bc29b36f623ba82aaf6724fd3b16718'),
(47, 'Pedro', '38e2b2e31c0fce9537f735dda9fdf10a'),
(36, 'pepe', '926e27eecdbc7a18858b3798ba99bddd'),
(66, 'rtg', '1da33616e19f532fca9bf8e3c095d11d'),
(50, 'serc', '441932710d3be09db869820f52c4c6db'),
(51, 'sg', '5dae429688af1c521ad87ac394192c6d'),
(42, 'super', '1b3231655cebb7a1f783eddf27d254ca'),
(41, 'superman', '84d961568a65073a3bcf0eb216b2a576'),
(64, 'ulJKB ASLIC', '8b904f6b919af2f32be5bad3e53d44d2'),
(59, 'wFASFASZ', '3177ea519839f67d700319e27b694444'),
(43, 'yo', '6d0007e52f7afb7d5a0650b0ffb8a4d1');
