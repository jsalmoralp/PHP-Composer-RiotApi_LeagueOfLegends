<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class ChampionMasteryScore {
    private String $region;
    private String $summonerId;
    private Int $score;

    public function __construct(
        String $region,
        String $summonerId,
        Int $score
    ) {
        $this->region = $region;
        $this->summonerId = $summonerId;
        $this->score = $score;
    }

    public function get_region() : String {
        return $this->region;
    }

    public function get_summonerId() : String {
        return $this->summonerId;
    }

    public function get_score() : Int {
        return $this->score;
    }
}
