<?php

use jsalmoralp\RiotAPI\RiotAPI\Calls\Champion_V3;
use jsalmoralp\RiotAPI\RiotAPI\Calls\ChampionMastery_V4;

include_once __DIR__ . "/main.php";

/**
 * La rotación de campeones de la próxima semana generalmente se lanza
 * el lunes entre las 5pm - 10pm PST.
 */

$championsRotation1 = new Champion_V3();

$info_championsRotation1 = $championsRotation1->getChampionsRotation();

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_championsRotation1;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($championsRotation1->get_ChampionsRotation()) {
    echo "\n**=** [Start] INFO CHAMPIONS ROTATION **=**\n";

    echo "\nChampionMasteryScore (region)                       = " . $championsRotation1->get_ChampionsRotation()->get_region() . "\n";
    echo "ChampionMasteryScore (freeChampionIds)              = " . $championsRotation1->get_ChampionsRotation()->get_freeChampionIds_convertedToString() . "\n";
    echo "ChampionMasteryScore (freeChampionIdsForNewPlayers) = " . $championsRotation1->get_ChampionsRotation()->get_freeChampionIdsForNewPlayers_convertedToString() . "\n";
    echo "ChampionMasteryScore (maxNewPlayerLevel)            = " . $championsRotation1->get_ChampionsRotation()->get_maxNewPlayerLevel() . "\n";
    echo "ChampionMasteryScore (weekNumber)                   = " . $championsRotation1->get_ChampionsRotation()->get_weekNumber() . "\n";
    echo "ChampionMasteryScore (year)                         = " . $championsRotation1->get_ChampionsRotation()->get_year() . "\n";
    
    echo "\n**=** [Final] INFO CHAMPIONS ROTATION **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DE CHAMPIONS ROTATION **=**\n";
}
