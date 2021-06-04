<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class ChampionMasteryScore {
    private String $region;
    private String $summonerId;
    private Int $score;

    public function __construct(
        $region,
        $summonerId,
        $score
    ) {
        $this->region = $region;
        $this->summonerId = $summonerId;
        $this->score = $score;
    }

    public function get_region() {
        return $this->region;
    }

    public function get_summonerId() {
        return $this->summonerId;
    }

    public function get_score() {
        return $this->score;
    }
}
