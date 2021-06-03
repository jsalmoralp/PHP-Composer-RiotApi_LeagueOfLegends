<?php
namespace jsalmoralp\RiotAPI\RiotAPI;

use jsalmoralp\RiotAPI\RiotAPI\Calls\Summoner_V4;
use jsalmoralp\RiotAPI\RiotAPI\Classes\Language;
use jsalmoralp\RiotAPI\RiotAPI\Classes\PlataformRouting;
use jsalmoralp\RiotAPI\RiotAPI\Classes\SummonerDTO;

class RiotAPI {
    
    private $language;
    private $plataform;

    public function __construct(
        $lang = null,
        $plataform = null
    ) {
        $this->language = new Language($lang);
        $this->plataform = new PlataformRouting($plataform);
    }
    
    public function class_Summoner_V4() : Summoner_V4 {
        return new Summoner_V4($this->plataform);
    }

    public function object_SummonerDTO($region, $id, $accountId, $puuid, $name, $profileIconId, $revisionDate, $summonerLevel) : SummonerDTO {
        return new SummonerDTO($region, $id, $accountId, $puuid, $name, $profileIconId, $revisionDate, $summonerLevel);
    }

    /**
     * Función que no realiza nada,
     * solo es un extra para darme a conocer.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var string $hola
     *
     * @return string
     */
    public function sayHello() {
        $hola = "\n=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=\n";
        $hola .= "\n          Hola soy la API de Riot!\n";
        $hola .= "       He sido creada por JSalmoralP <raskan>.\n";
        $hola .= "       Recuerda visitar https://jsalmoralp.es\n";
        $hola .= "\n=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=\n";
        return $hola;
    }
}