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
        $region,
        $championId,
        $championLevel,
        $championPoints,
        $lastPlayTime,
        $championPointsSinceLastLevel,
        $championPointsUntilNextLevel,
        $chestGranted,
        $tokensEarned,
        $summonerId
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

    public function get_region() {
        return $this->region;
    }

    public function get_championId() {
        return $this->championId;
    }

    public function get_championLevel() {
        return $this->championLevel;
    }

    public function get_championPoints() {
        return $this->championPoints;
    }

    public function get_lastPlayTime() {
        return $this->lastPlayTime;
    }

    public function get_championPointsSinceLastLevel() {
        return $this->championPointsSinceLastLevel;
    }

    public function get_championPointsUntilNextLevel() {
        return $this->championPointsUntilNextLevel;
    }

    public function get_chestGranted() {
        return $this->chestGranted;
    }

    public function get_tokensEarned() {
        return $this->tokensEarned;
    }

    public function get_summonerId() {
        return $this->summonerId;
    }
}
