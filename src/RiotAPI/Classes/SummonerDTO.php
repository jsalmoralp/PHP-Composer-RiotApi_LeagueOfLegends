<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class SummonerDTO {
    private $region;
    private $id;
    private $accountId;
    private $puuid;
    private $name;
    private $profileIconId;
    private $revisionDate;
    private $summonerLevel;

    public function __construct(
        $region,
        $id,
        $accountId,
        $puuid,
        $name,
        $profileIconId,
        $revisionDate,
        $summonerLevel
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

    public function get_region() {
        return $this->region;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_accountId() {
        return $this->accountId;
    }

    public function get_puuid() {
        return $this->puuid;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_profileIconId() {
        return $this->profileIconId;
    }

    public function get_revisionDate() {
        return $this->revisionDate;
    }

    public function get_summonerLevel() {
        return $this->summonerLevel;
    }
}