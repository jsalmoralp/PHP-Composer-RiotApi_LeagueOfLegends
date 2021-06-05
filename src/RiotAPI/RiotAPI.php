<?php
namespace jsalmoralp\RiotAPI\RiotAPI;

use jsalmoralp\RiotAPI\RiotAPI\Calls\ChampionMastery_V4;
use jsalmoralp\RiotAPI\RiotAPI\Calls\Summoner_V4;
use jsalmoralp\RiotAPI\RiotAPI\Classes\Language;
use jsalmoralp\RiotAPI\RiotAPI\Classes\PlataformRouting;

class RiotAPI {
    
    private Language $language;
    private PlataformRouting $plataformRouting;

    public function __construct(
        String $language = null,
        String $plataformRouting = null
    ) {
        if ($language) {
            $this->language = new Language($language);
        } else {
            $this->language = new Language();
        }
        if ($plataformRouting) {
            $this->plataformRouting = new PlataformRouting($plataformRouting);
        } else {
            $this->plataformRouting = new PlataformRouting();
        }
    }
    
    public function api_Summoner_V4(String $plataformRouting = null) : Summoner_V4 {
        if ($plataformRouting) {
            $plataform = new PlataformRouting($plataformRouting);
            return new Summoner_V4($plataform->get_plataform());
        } else {
            return new Summoner_V4($this->plataformRouting->get_plataform());
        }
    }

    public function api_ChampionMastery_V4(String $plataformRouting = null) : ChampionMastery_V4 {
        if ($plataformRouting) {
            $plataform = new PlataformRouting($plataformRouting);
            return new ChampionMastery_V4($plataform->get_plataform());
        } else {
            return new ChampionMastery_V4($this->plataformRouting->get_plataform());
        }
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
