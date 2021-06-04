SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `api_riot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `champion_mastery_dto`
--

CREATE TABLE `champion_mastery_dto` (
  `region` varchar(5) NOT NULL,
  `championId` int(5) NOT NULL, -- long - Champion ID for this entry.
  `championLevel` int(1) NOT NULL, -- int - Champion level for specified player and champion combination.
  `championPoints` int(10) NOT NULL, -- int - Total number of champion points for this player and champion combination - they are used to determine championLevel.
  `lastPlayTime` int(13) NOT NULL, -- long - Last time this champion was played by this player - in Unix milliseconds time format.
  `championPointsSinceLastLevel` int(10) NOT NULL, -- long - Number of points earned since current level has been achieved.
  `championPointsUntilNextLevel` int(10) NOT NULL, -- long - Number of points needed to achieve next level. Zero if player reached maximum champion level for this champion.
  `chestGranted` tinyint(1) NOT NULL, -- boolean - Is chest granted for this champion or not in current season.
  `tokensEarned` int(10) NOT NULL, -- int - The token earned for this champion at the current championLevel. When the championLevel is advanced the tokensEarned resets to 0.
  `summonerId` varchar(63) NOT NULL -- string - Summoner ID for this entry. (Encrypted)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `champion_mastery_dto`
--

/* ALTER TABLE `champion_mastery_dto`
  ADD PRIMARY KEY (`id`); */


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
