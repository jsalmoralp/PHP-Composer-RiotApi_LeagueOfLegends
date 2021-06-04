<?php
namespace jsalmoralp\RiotAPI\Native\DB;

use jsalmoralp\RiotAPI\RiotAPI\Classes\SummonerDTO;

class SummonerDTOQuerys {
    private ConnectionWithPDO $connection;

    public function __construct() {
        $this->connection = new ConnectionWithPDO();
    }

    public function insertInto_fromSummonerDTO(SummonerDTO $summoner) : String {
        $sqlInsertIntoDatabase = "insert into summoner_dto (region, id, accountId, puuid, name, profileIconId, revisionDate, summonerLevel) values (";
        $sqlInsertIntoDatabase .= "'" . $summoner->get_region() . "', ";
        $sqlInsertIntoDatabase .= "'" . $summoner->get_id() . "', ";
        $sqlInsertIntoDatabase .= "'" . $summoner->get_accountId() . "', ";
        $sqlInsertIntoDatabase .= "'" . $summoner->get_puuid() . "', ";
        $sqlInsertIntoDatabase .= "'" . $summoner->get_name() . "', ";
        $sqlInsertIntoDatabase .= $summoner->get_profileIconId() . ", ";
        $sqlInsertIntoDatabase .= $summoner->get_revisionDate() . ", ";
        $sqlInsertIntoDatabase .= $summoner->get_summonerLevel() . ")";

        @$this->connection->execute($sqlInsertIntoDatabase);
        if (!$this->connection->get_query()) {
            $infoString = "\n--- Good (Insert To Database) ---\n";
            $infoString .= "- Se a añadido el SummonerDTO a la Base de Datos.\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        } else {
            $infoString = "\n--- Bad (Insert To Database) ---\n";
            $infoString .= "- No se a añadido el SummonerDTO a la Base de Datos.\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        }
    }

    public function selectAll_fromSummonerDto_whereRegion_whereAccountId(
        String $region,
        String $accountId
    ) {
        $sqlIsInMyDatabase = "select * from summoner_dto where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "' ";
        $sqlIsInMyDatabase .= "and accountId = '" . $accountId . "'";
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }

    public function selectAll_fromSummonerDto_whereRegion_whereName(
        String $region,
        String $name
    ) {
        $sqlIsInMyDatabase = "select * from summoner_dto where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "' ";
        $sqlIsInMyDatabase .= "and name = '" . $name . "'";
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }

    public function selectAll_fromSummonerDto_whereRegion_wherePuuid(
        String $region,
        String $puuid
    ) {
        $sqlIsInMyDatabase = "select * from summoner_dto where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "' ";
        $sqlIsInMyDatabase .= "and puuid = '" . $puuid . "'";
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }

    public function selectAll_fromSummonerDto_whereRegion_whereId(
        String $region,
        String $id
    ) {
        $sqlIsInMyDatabase = "select * from summoner_dto where ";
        $sqlIsInMyDatabase .= "region = '" . $region . "' ";
        $sqlIsInMyDatabase .= "and id = '" . $id . "'";
        @$this->connection->execute($sqlIsInMyDatabase);
        return $this->connection->get_query();
    }
}
