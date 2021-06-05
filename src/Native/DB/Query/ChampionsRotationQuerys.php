<?php
namespace jsalmoralp\RiotAPI\Native\DB\Query;

use jsalmoralp\RiotAPI\Native\DB\ConnectionWithPDO;
use jsalmoralp\RiotAPI\RiotAPI\Classes\ChampionsRotation;

class ChampionsRotationQuerys {
    private ConnectionWithPDO $connection;

    public function __construct() {
        $this->connection = new ConnectionWithPDO();
    }

    public function insertInto_ChampionsRotation(ChampionsRotation $championsRotation) : String {
        $sqlInsertIntoDatabase = "insert into champions_rotation (region, freeChampionIds, freeChampionIdsForNewPlayers, maxNewPlayerLevel, weekNumber, year) values (";
        $sqlInsertIntoDatabase .= "'" . $championsRotation->get_region() . "', ";
        $sqlInsertIntoDatabase .= "'" . base64_encode(json_encode($championsRotation->get_freeChampionIds())) . "', ";
        $sqlInsertIntoDatabase .= "'" . base64_encode(json_encode($championsRotation->get_freeChampionIdsForNewPlayers())) . "', ";
        $sqlInsertIntoDatabase .= $championsRotation->get_maxNewPlayerLevel() . ", ";
        $sqlInsertIntoDatabase .= $championsRotation->get_weekNumber() . ", ";
        $sqlInsertIntoDatabase .= $championsRotation->get_year() . ")";
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

    public function selectAll_fromChampionsRotation_whereRegion(
        String $region,
   ) : Array {
        $sqlIsInMyDatabase = "select * from champions_rotation where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "'";
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }
}
