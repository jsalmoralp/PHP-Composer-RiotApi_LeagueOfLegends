<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class SummonerDTO {
    private String $region;
    private String $id;
    private String $accountId;
    private String $puuid;
    private String $name;
    private Int $profileIconId;
    private Int $revisionDate;
    private Int $summonerLevel;

    public function __construct(
        String $region,
        String $id,
        String $accountId,
        String $puuid,
        String $name,
        Int $profileIconId,
        Int $revisionDate,
        Int $summonerLevel
    ) {
        $this->region = $region;
        $this->id = $id;
        $this->accountId = $accountId;
        $this->puuid = $puuid;
        $this->name = $name;
        $this->profileIconId = $profileIconId;
        $this->revisionDate = $revisionDate;
        $this->summonerLevel = $summonerLevel;
    }

    public function get_region() : String {
        return $this->region;
    }

    public function get_id() : String {
        return $this->id;
    }

    public function get_accountId() : String {
        return $this->accountId;
    }

    public function get_puuid() : String {
        return $this->puuid;
    }

    public function get_name() : String {
        return $this->name;
    }

    public function get_profileIconId() : Int {
        return $this->profileIconId;
    }

    public function get_revisionDate() : Int {
        return $this->revisionDate;
    }

    public function get_summonerLevel() : Int {
        return $this->summonerLevel;
    }
}
