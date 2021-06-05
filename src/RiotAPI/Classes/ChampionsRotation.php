<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class ChampionsRotation {
    private String $region;
    private Array $freeChampionIds;
    private Array $freeChampionIdsForNewPlayers;
    private Int $maxNewPlayerLevel;
    private Int $weekNumber;
    private Int $year;

    public function __construct(
        String $region,
        Array $freeChampionIds,
        Array $freeChampionIdsForNewPlayers,
        Int $maxNewPlayerLevel,
        Int $weekNumber,
        Int $year
    ) {
        $this->region = $region;
        $this->freeChampionIds = $freeChampionIds;
        $this->freeChampionIdsForNewPlayers = $freeChampionIdsForNewPlayers;
        $this->maxNewPlayerLevel = $maxNewPlayerLevel;
        $this->weekNumber = $weekNumber;
        $this->year = $year;
    }

    public function get_region() : String {
        return $this->region;
    }

    public function get_freeChampionIds() : Array {
        return $this->freeChampionIds;
    }

    public function get_freeChampionIds_convertedToString() : String {
        $string = "";
        foreach ($this->freeChampionIds as $freeChampionId){
            $string .= $freeChampionId . " ";
        }
        return $string;
    }

    public function get_freeChampionIdsForNewPlayers() : Array {
        return $this->freeChampionIdsForNewPlayers;
    }

    public function get_freeChampionIdsForNewPlayers_convertedToString() : String {
        $string = "";
        foreach ($this->freeChampionIdsForNewPlayers as $freeChampionIdForNewPlayers) {
            $string .= $freeChampionIdForNewPlayers . " ";
        }
        return $string;
    }
 
    public function get_maxNewPlayerLevel() : Int {
        return $this->maxNewPlayerLevel;
    }

    public function get_weekNumber() : Int {
        return $this->weekNumber;
    }

    public function get_year() : Int {
        return $this->year;
    }
}
