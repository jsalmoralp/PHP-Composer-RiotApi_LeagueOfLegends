<?php
namespace jsalmoralp\RiotAPI\Native\DB;

use jsalmoralp\RiotAPI\RiotAPI\Classes\ChampionMasteryDTO;
use jsalmoralp\RiotAPI\RiotAPI\Classes\ChampionMasteryScore;

class ChampionMasteryDTOQuerys {
    private ConnectionWithPDO $connection;

    public function __construct() {
        $this->connection = new ConnectionWithPDO();
    }

    public function insertInto_ChampionMasteryDto(ChampionMasteryDTO $championMastery) : String {
        $sqlInsertIntoDatabase = "insert into champion_mastery_dto (region, championId, championLevel, championPoints, lastPlayTime, championPointsSinceLastLevel, championPointsUntilNextLevel, chestGranted, tokensEarned, summonerId) values (";
        $sqlInsertIntoDatabase .= "'" . $championMastery->get_region() . "', ";
        $sqlInsertIntoDatabase .= $championMastery->get_championId() . ", ";
        $sqlInsertIntoDatabase .= $championMastery->get_championLevel() . ", ";
        $sqlInsertIntoDatabase .= $championMastery->get_championPoints() . ", ";
        $sqlInsertIntoDatabase .= $championMastery->get_lastPlayTime() . ", ";
        $sqlInsertIntoDatabase .= $championMastery->get_championPointsSinceLastLevel() . ", ";
        $sqlInsertIntoDatabase .= $championMastery->get_championPointsUntilNextLevel() . ", ";
        $sqlInsertIntoDatabase .= ($championMastery->get_chestGranted()?"true":"false") . ", ";
        $sqlInsertIntoDatabase .= $championMastery->get_tokensEarned() . ", ";
        $sqlInsertIntoDatabase .= "'" . $championMastery->get_summonerId() . "')";

        @$this->connection->execute($sqlInsertIntoDatabase);
        if (!$this->connection->get_query()) {
            $infoString = "\n--- Good (Insert To Database) ---\n";
            $infoString .= "- Se a añadido el ChampionMasteryDTO a la Base de Datos.\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        } else {
            $infoString = "\n--- Bad (Insert To Database) ---\n";
            $infoString .= "- No se a añadido el ChampionMasteryDTO a la Base de Datos.\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        }
    }

    public function insertInto_ChampionMasteryScore(ChampionMasteryScore $championMasteryScore) : String {
        $sqlInsertIntoDatabase = "insert into champion_mastery_score (region, summonerId, score) values (";
        $sqlInsertIntoDatabase .= "'" . $championMasteryScore->get_region() . "', ";
        $sqlInsertIntoDatabase .= "'" . $championMasteryScore->get_summonerId() . "',";
        $sqlInsertIntoDatabase .= $championMasteryScore->get_score() . ")";

        @$this->connection->execute($sqlInsertIntoDatabase);
        if (!$this->connection->get_query()) {
            $infoString = "\n--- Good (Insert To Database) ---\n";
            $infoString .= "- Se a añadido el ChampionMasteryScore a la Base de Datos.\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        } else {
            $infoString = "\n--- Bad (Insert To Database) ---\n";
            $infoString .= "- No se a añadido el ChampionMasteryScore a la Base de Datos.\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        }
    }

    public function selectAll_fromChampionMasteryDto_whereRegion_whereSummonerId(
        String $region,
        String $summonerId
    ) {
        $sqlIsInMyDatabase = "select * from champion_mastery_dto where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "' ";
        $sqlIsInMyDatabase .= "and summonerId = '" . $summonerId . "'";
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }

    public function selectAll_fromChampionMasteryDto_whereRegion_whereSummonerId_whereChampionId(
        String $region,
        String $summonerId,
        Int $championId
    ) {
        $sqlIsInMyDatabase = "select * from champion_mastery_dto where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "' ";
        $sqlIsInMyDatabase .= "and summonerId = '" . $summonerId . "'";
        $sqlIsInMyDatabase .= "and championId = " . $championId;
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }

    public function selectAll_fromChampionMasteryScore_whereRegion_whereSummonerId(
        String $region,
        String $summonerId
    ) {
        $sqlIsInMyDatabase = "select * from champion_mastery_score where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "' ";
        $sqlIsInMyDatabase .= "and summonerId = '" . $summonerId . "'";
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }
}
