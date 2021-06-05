SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `api_riot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `champions_rotation`
--

CREATE TABLE `champions_rotation` (
  `region` varchar(5) NOT NULL,
  `freeChampionIds` varchar(100) NOT NULL, -- base64_encode(List[int]) -- 
  `freeChampionIdsForNewPlayers` varchar(100) NOT NULL, -- base64_encode(List[int]) -- 
  `maxNewPlayerLevel` int(10) NOT NULL, -- int - 
  `weekNumber` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `champions_rotation`
--

/* ALTER TABLE `champions_rotation`
  ADD PRIMARY KEY (`id`); */


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
