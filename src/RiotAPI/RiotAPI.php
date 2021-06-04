<?php
namespace jsalmoralp\RiotAPI\RiotAPI;

use jsalmoralp\RiotAPI\RiotAPI\Calls\ChampionMastery_V4;
use jsalmoralp\RiotAPI\RiotAPI\Calls\Summoner_V4;
use jsalmoralp\RiotAPI\RiotAPI\Classes\Language;
use jsalmoralp\RiotAPI\RiotAPI\Classes\PlataformRouting;

class RiotAPI {
    
    private Language $language;
    private Language $non_language;
    private PlataformRouting $plataform;
    private PlataformRouting $non_plataform;

    public function __construct(
        String $lang = null,
        String $plataform = null
    ) {
        $this->language = new Language($lang);
        if ($lang == null) {
            $this->non_language = new Language();
        }
        $this->plataform = new PlataformRouting($plataform);
        if ($plataform == null) {
            $this->non_plataform = new PlataformRouting();
        }
    }
    
    public function api_Summoner_V4(String $plataform = null) : Summoner_V4 {
        if ($plataform == null) {
            if (!isset($this->non_plataform)){
                return new Summoner_V4($this->plataform->get_plataform());
            } else {
                return new Summoner_V4($this->non_plataform->get_plataform());
            }
        } else {
            $plat = new PlataformRouting($plataform);
            return new Summoner_V4($plat->get_plataform());
        }
    }

    public function api_ChampionMastery_V4(String $plataform = null) : ChampionMastery_V4 {
        if ($plataform == null) {
            if (!isset($this->non_plataform)){
                return new ChampionMastery_V4($this->plataform->get_plataform());
            } else {
                return new ChampionMastery_V4($this->non_plataform->get_plataform());
            }
        } else {
            $plat = new PlataformRouting($plataform);
            return new ChampionMastery_V4($plat->get_plataform());
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
