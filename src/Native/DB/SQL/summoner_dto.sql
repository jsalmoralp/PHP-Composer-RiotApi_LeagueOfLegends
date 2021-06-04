SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `api_riot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `summoner_dto`
--

CREATE TABLE `summoner_dto` (
  `region` varchar(5) NOT NULL,
  `id` varchar(63) NOT NULL, -- string - Encrypted summoner ID. Max length 63 characters.
  `accountId` varchar(56) NOT NULL, -- string - Encrypted account ID. Max length 56 characters.
  `puuid` varchar(78) NOT NULL, -- string - Encrypted PUUID. Exact length of 78 characters.
  `name` varchar(50) NOT NULL, -- string - Summoner name.
  `profileIconId` int(10) NOT NULL, -- int - ID of the summoner icon associated with the summoner.
  `revisionDate` int(20) NOT NULL, -- long - Date summoner was last modified specified as epoch milliseconds. The following events will update this timestamp: summoner name change, summoner level change, or profile icon change.
  `summonerLevel` int(5) NOT NULL -- long - Summoner level associated with the summoner.
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `summoner_dto`
--

ALTER TABLE `summoner_dto`
  ADD PRIMARY KEY (`id`);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
