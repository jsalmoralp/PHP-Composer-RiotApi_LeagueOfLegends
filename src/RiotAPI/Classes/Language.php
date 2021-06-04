<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Classes;

class Language {
    /**
     * Variable con todos los tipos de posibles de Language.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var Array $langs
     */
    private Array $langs = array(
        "en_US",
        "cs_CZ",
        "de_DE",
        "el_GR",
        "en_AU",
        "en_GB",
        "en_PH",
        "en_SG",
        "es_AR",
        "es_ES",
        "es_MX",
        "fr_FR",
        "hu_HU",
        "id_ID",
        "it_IT",
        "ja_JP",
        "ko_KR",
        "pl_PL",
        "pt_BR",
        "ro_RO",
        "ru_RU",
        "th_TH",
        "tr_TR",
        "vn_VN",
        "zh_CN",
        "zh_MY",
        "zh_TW"
    );
    /**
     * Variable privada para almacenar el tipo de Language que se usará.
     *
     * @var String $lang
     */
    private String $lang;

    /**
     * Funcion constructor de Language,
     * donde se hace "set" de tipo que se usará.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @param String $lang
     */
    public function __construct(?String $lang = null) {
        $this->set_lang($lang);
    }

    /**
     * Funcion "set" de la variable $lang.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @param String $lang
     * @var String $this->lang
     */
    public function set_lang(?String $lang) {
        if ($lang) {
            if (in_array($lang, $this->langs)) {
                $this->lang = $lang;
            } else {
                $this->lang = "es_ES";
            }
        } else {
            $lang = $_ENV['API_RIOT_LANGUAGE'];
            if (in_array($lang, $this->langs)) {
                $this->lang = $lang;
            } else {
                $this->lang = "es_ES";
            }
        }
    }

    /**
     * Funcion "get" de la variable $lang.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var String $this->lang
     *
     * @return String
     */
    public function get_lang() : String {
        return $this->lang;
    }
}
