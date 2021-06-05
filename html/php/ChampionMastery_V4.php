<?php
use jsalmoralp\RiotAPI\RiotAPI\Calls\ChampionMastery_V4;

include_once __DIR__ . "/main.php";

$championsMasteries1 = new ChampionMastery_V4();

$info_championsMasteries1 = $championsMasteries1->getChampionsMasteries_bySummonerId("7TqNXcEhEIWercpsSSxrEwQmVIEI3TLhTePBMKRafk1kp5w");

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_championsMasteries1;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($championsMasteries1->get_ChampionsMasteriesDTO()) {
    echo "\n**=** [Start] INFO CHAMPIONS MASTERIES **=**\n";
    foreach ($championsMasteries1->get_ChampionsMasteriesDTO() as $championMastery) {
        echo "\nChampionMastery (region)                       = " . $championMastery->get_region() . "\n";
        echo "ChampionMastery (championId)                   = " . $championMastery->get_championId() . "\n";
        echo "ChampionMastery (championLevel)                = " . $championMastery->get_championLevel() . "\n";
        echo "ChampionMastery (championPoints)               = " . $championMastery->get_championPoints() . "\n";
        echo "ChampionMastery (lastPlayTime)                 = " . $championMastery->get_lastPlayTime() . "\n";
        echo "ChampionMastery (championPointsSinceLastLevel) = " . $championMastery->get_championPointsSinceLastLevel() . "\n";
        echo "ChampionMastery (championPointsUntilNextLevel) = " . $championMastery->get_championPointsUntilNextLevel() . "\n";
        echo "ChampionMastery (chestGranted)                 = " . ($championMastery->get_chestGranted()?"true":"false") . "\n";
        echo "ChampionMastery (tokensEarned)                 = " . $championMastery->get_tokensEarned() . "\n";
        echo "ChampionMastery (summonerId)                   = " . $championMastery->get_summonerId() . "\n";
    }
    echo "\n**=** [Final] INFO CHAMPIONS MASTERIES **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DE CHAMPIONS MASTERIES **=**\n";
}

echo "\n\n\n";

$championMastery2 = new ChampionMastery_V4();

$info_championMastery2 = $championMastery2->getChampionMastery_bySummonerId_byChampionId("7TqNXcEhEIWercpsSSxrEwQmVIEI3TLhTePBMKRafk1kp5w", 120);

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_championMastery2;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($championMastery2->get_ChampionMasteryDTO()) {
    echo "\n**=** [Start] INFO CHAMPION MASTERY **=**\n";

    echo "\nChampionMastery (region)                       = " . $championMastery2->get_ChampionMasteryDTO()->get_region() . "\n";
    echo "ChampionMastery (championId)                   = " . $championMastery2->get_ChampionMasteryDTO()->get_championId() . "\n";
    echo "ChampionMastery (championLevel)                = " . $championMastery2->get_ChampionMasteryDTO()->get_championLevel() . "\n";
    echo "ChampionMastery (championPoints)               = " . $championMastery2->get_ChampionMasteryDTO()->get_championPoints() . "\n";
    echo "ChampionMastery (lastPlayTime)                 = " . $championMastery2->get_ChampionMasteryDTO()->get_lastPlayTime() . "\n";
    echo "ChampionMastery (championPointsSinceLastLevel) = " . $championMastery2->get_ChampionMasteryDTO()->get_championPointsSinceLastLevel() . "\n";
    echo "ChampionMastery (championPointsUntilNextLevel) = " . $championMastery2->get_ChampionMasteryDTO()->get_championPointsUntilNextLevel() . "\n";
    echo "ChampionMastery (chestGranted)                 = " . ($championMastery2->get_ChampionMasteryDTO()->get_chestGranted()?"true":"false") . "\n";
    echo "ChampionMastery (tokensEarned)                 = " . $championMastery2->get_ChampionMasteryDTO()->get_tokensEarned() . "\n";
    echo "ChampionMastery (summonerId)                   = " . $championMastery2->get_ChampionMasteryDTO()->get_summonerId() . "\n";

    echo "\n**=** [Final] INFO CHAMPION MASTERY **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DE CHAMPION MASTERY **=**\n";
}

echo "\n\n\n";

$championMasteryScore3 = new ChampionMastery_V4();

$info_championMasteryScore3 = $championMasteryScore3->getChampionMasteryScore_bySummonerId("7TqNXcEhEIWercpsSSxrEwQmVIEI3TLhTePBMKRafk1kp5w");

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_championMasteryScore3;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($championMasteryScore3->get_ChampionMasteryScore()) {
    echo "\n**=** [Start] INFO CHAMPION MASTERY SCORE **=**\n";

    echo "\nChampionMasteryScore (region)     = " . $championMasteryScore3->get_ChampionMasteryScore()->get_region() . "\n";
    echo "ChampionMasteryScore (summonerId) = " . $championMasteryScore3->get_ChampionMasteryScore()->get_summonerId() . "\n";
    echo "ChampionMasteryScore (score)      = " . $championMasteryScore3->get_ChampionMasteryScore()->get_score() . "\n";

    echo "\n**=** [Final] INFO CHAMPION MASTERY SCORE **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DE CHAMPION MASTERY SCORE **=**\n";
}
