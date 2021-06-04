<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class PlataformRouting {
    /**
     * Variable con todos los tipos de posibles de PlataformRouting.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var Array
     */
    private Array $plataforms = array(
        "BR1"   => "br1.api.riotgames.com",
        "EUN1"  => "eun1.api.riotgames.com",
        "EUW1"  => "euw1.api.riotgames.com",
        "JP1"	=> "jp1.api.riotgames.com",
        "KR"	=> "kr.api.riotgames.com",
        "LA1"	=> "la1.api.riotgames.com",
        "LA2"	=> "la2.api.riotgames.com",
        "NA1"	=> "na1.api.riotgames.com",
        "OC1"	=> "oc1.api.riotgames.com",
        "TR1"	=> "tr1.api.riotgames.com",
        "RU"	=> "ru.api.riotgames.com"
    );
    
    /**
     * Variable privada para almacenar el tipo de PlataformRouting que se usará.
     *
     * @var String
     */
    private String $plataform;

    /**
     * Funcion constructor de la PlataformRouting,
     * donde se hace "set" de la lengua que se usará.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @param String $plataform
     */
    public function __construct(?String $plataform = null) {
        $this->set_plataform($plataform);
    }

    /**
     * Funcion "set" de la variable $plataform.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @param String $plataform
     * @var String $this->plataform
     */
    public function set_plataform(?String $plataform) {
        if ($plataform) {
            if (in_array($plataform, $this->plataforms)) {
                $this->plataform = $plataform;
            } else {
                $this->plataform = "EUW1";
            }
        } else {
            $plataform = $_ENV['API_RIOT_PLATAFORM_ROUTING'];
            if (in_array($plataform, $this->plataforms)) {
                $this->plataform = $plataform;
            } else {
                $this->plataform = "EUW1";
            }
        }
    }

    /**
     * Funcion "get" de la variable $plataform.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var String $this->plataform
     *
     * @return String
     */
    public function get_plataform() : String {
        return $this->plataform;
    }

    /**
     * Funcion "get" del $valor de la variable $langs obtenido por la $clave de $plataform.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var String $this->plataforms[$this->get_plataform()]
     *
     * @return String
     */
    public function get_plataformHost() : String {
        return $this->plataforms[$this->get_plataform()];
    }
}
