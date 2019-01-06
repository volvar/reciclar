-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2018 a las 23:10:22
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `p1_diego_tobar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `Id_url` int(7) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`Id_url`, `estado`, `enlace`, `imagen`) VALUES
(5, 0, 'www.google.com', 'files/1544813806.jpeg'),
(6, 0, 'www.google.com', 'files/1544813813.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `TITULO` varchar(255) NOT NULL,
  `RESUMEN` varchar(255) NOT NULL,
  `CUERPO` text NOT NULL,
  `FECHA` date NOT NULL,
  `ID_NOTICIA` int(6) NOT NULL,
  `CATEGORIA` varchar(12) NOT NULL,
  `IMAGEN` varchar(255) NOT NULL,
  `QR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`TITULO`, `RESUMEN`, `CUERPO`, `FECHA`, `ID_NOTICIA`, `CATEGORIA`, `IMAGEN`, `QR`) VALUES
('HOLA', 'ASDSASDSASDSASRSFSSF', 'KLASDHFKJAGYOBHVKQWUSDFASFADSFasrwds', '2018-12-13', 1, 'farandula', 'https://lolstatic-a.akamaihd.net/frontpage/apps/prod/LolGameInfo-Harbinger/es_AR/8588e206d560a23f4d6dd0faab1663e13e84e21d/assets/assets/images/gi-landing-top.jpg', 'files/01544821296.png'),
('CHAO', 'ASDSASDSASDSASRSFSSF', 'KLASDHFKJAGYOBHVKQWUSDFASFADSFasrwds', '2018-12-07', 2, 'POLICIAL', 'https://lolstatic-a.akamaihd.net/frontpage/apps/prod/LolGameInfo-Harbinger/es_AR/8588e206d560a23f4d6dd0faab1663e13e84e21d/assets/assets/images/gi-landing-top.jpg', 'files/11544821296.png'),
('esperanza?', 'asdsa', 'can it be?', '2018-12-02', 3, 'deporte', 'https://lolstatic-a.akamaihd.net/frontpage/apps/prod/LolGameInfo-Harbinger/es_AR/8588e206d560a23f4d6dd0faab1663e13e84e21d/assets/assets/images/gi-landing-top.jpg', 'files/21544821296.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`Id_url`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`ID_NOTICIA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `Id_url` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `ID_NOTICIA` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
