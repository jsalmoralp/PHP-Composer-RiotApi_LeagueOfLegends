SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `api_riot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `champion_mastery_score`
--

CREATE TABLE `champion_mastery_score` (
  `region` varchar(5) NOT NULL,
  `summonerId` varchar(63) NOT NULL, -- string - Summoner ID for this entry. (Encrypted)
  `score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `champion_mastery_score`
--

ALTER TABLE `champion_mastery_score`
  ADD PRIMARY KEY (`summonerId`);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
