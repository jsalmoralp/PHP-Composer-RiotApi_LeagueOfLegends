<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class ChampionMasteryDTO {
    private String $region;
    private Int $championId;
    private Int $championLevel;
    private Int $championPoints;
    private Int $lastPlayTime;
    private Int $championPointsSinceLastLevel;
    private Int $championPointsUntilNextLevel;
    private Bool $chestGranted;
    private Int $tokensEarned;
    private String $summonerId;

    public function __construct(
        String $region,
        Int $championId,
        Int $championLevel,
        Int $championPoints,
        Int $lastPlayTime,
        Int $championPointsSinceLastLevel,
        Int $championPointsUntilNextLevel,
        Bool $chestGranted,
        Int $tokensEarned,
        String $summonerId
    ) {
        $this->region = $region;
        $this->championId = $championId;
        $this->championLevel = $championLevel;
        $this->championPoints = $championPoints;
        $this->lastPlayTime = $lastPlayTime;
        $this->championPointsSinceLastLevel = $championPointsSinceLastLevel;
        $this->championPointsUntilNextLevel = $championPointsUntilNextLevel;
        $this->chestGranted = $chestGranted;
        $this->tokensEarned = $tokensEarned;
        $this->summonerId = $summonerId;
    }

    public function get_region() : String {
        return $this->region;
    }

    public function get_championId() : Int {
        return $this->championId;
    }

    public function get_championLevel() : Int {
        return $this->championLevel;
    }

    public function get_championPoints() : Int {
        return $this->championPoints;
    }

    public function get_lastPlayTime() : Int {
        return $this->lastPlayTime;
    }

    public function get_championPointsSinceLastLevel() : Int {
        return $this->championPointsSinceLastLevel;
    }

    public function get_championPointsUntilNextLevel() : Int {
        return $this->championPointsUntilNextLevel;
    }

    public function get_chestGranted() : Bool {
        return $this->chestGranted;
    }

    public function get_tokensEarned() : Int {
        return $this->tokensEarned;
    }

    public function get_summonerId() : String {
        return $this->summonerId;
    }
}
