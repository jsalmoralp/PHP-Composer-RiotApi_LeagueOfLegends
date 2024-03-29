<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Calls;

use jsalmoralp\RiotAPI\Native\DB\Query\ChampionMasteryQuerys;
use jsalmoralp\RiotAPI\Native\Request\RequestToAPI;
use jsalmoralp\RiotAPI\RiotAPI\Classes\ChampionMasteryDTO;
use jsalmoralp\RiotAPI\RiotAPI\Classes\ChampionMasteryScore;
use jsalmoralp\RiotAPI\RiotAPI\Classes\PlataformRouting;

class ChampionMastery_V4 {
    private PlataformRouting $plataformRouting;
    private RequestToAPI $requestToApi;
    private ChampionMasteryQuerys $querysChampionMastery;
    private ?ChampionMasteryDTO $championMastery;
    private ?Array $championsMasteries;
    private ?ChampionMasteryScore $championMasteryScore;
    
    public function __construct(String $plataformRouting = null) {
        if ($plataformRouting) {
            $this->plataformRouting = new PlataformRouting($plataformRouting);
        } else {
            $this->plataformRouting = new PlataformRouting();
        }
        $this->requestToApi = new RequestToAPI();
        $this->querysChampionMastery = new ChampionMasteryQuerys();
        $this->championMastery = null;
        $this->championsMasteries = null;
        $this->championMasteryScore = null;
    }

    public function get_ChampionMasteryDTO() : ?ChampionMasteryDTO{
        return $this->championMastery;
    }

    public function get_ChampionsMasteriesDTO() : ?Array {
        return $this->championsMasteries;
    }

    public function get_ChampionMasteryScore() : ?ChampionMasteryScore {
        return $this->championMasteryScore;
    }

    private function prepareSql_insertIntoChampionMasteryDto_fromObject(Mixed $object) : String {
        $this->championMastery = null;
        if (is_object($object) ) {
            if (!empty($object)) {
                if (isset($object->status->status_code)) {
                    $infoString = "\n--- Info (Bad Object) ---\n";
                    $infoString .= "[Status Code] = " . $object->status->status_code . "\n";
                    $infoString .= "[Message]     = " . $object->status->message . "\n";
                    $infoString .= "-------------------------\n";
                    return $infoString;
                } else if (isset($object->championPoints)) {
                    $this->championMastery = new ChampionMasteryDTO(
                        $this->plataformRouting->get_plataform(),
                        $object->championId,
                        $object->championLevel,
                        $object->championPoints,
                        $object->lastPlayTime,
                        $object->championPointsSinceLastLevel,
                        $object->championPointsUntilNextLevel,
                        $object->chestGranted,
                        $object->tokensEarned,
                        $object->summonerId
                    );
                    return $this->querysChampionMastery->insertInto_ChampionMasteryDto($this->championMastery);
                } else {
                    $infoString = "\n--- Bad (Unexpected Object) ---\n";
                    $infoString .= "- El objeto tiene un contenido inesperado.\n";
                    $infoString .= "-------------------------\n";
                    return $infoString;
                }
            } else {
                $infoString = "\n--- Bad (Json Decode) ---\n";
                $infoString .= "- La decodificación devolvió un objeto vacío.\n";
                $infoString .= "-------------------------\n";
                return $infoString;
            }
        } else if (is_string($object)) {
            return $object;
        } else {
            $infoString = "\n--- Bad (Json Decode) ---\n";
            $infoString .= "- No se decodifico correctamente\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        }
    }

    private function prepareSql_insertIntoChampionMasteryDto_fromArrayOfObjects(Mixed $objects) : String {
        $this->championsMasteries = array();
        if (is_object($objects)){
            if (isset($objects->status->status_code)) {
                $infoString = "\n--- Info (Bad Object) ---\n";
                $infoString .= "[Status Code] = " . $objects->status->status_code . "\n";
                $infoString .= "[Message]     = " . $objects->status->message . "\n";
                $infoString .= "-------------------------\n";
                return $infoString;
            } else {
                $infoString = "\n--- Bad (Unexpected Object) ---\n";
                $infoString .= "- El objeto tiene un contenido inesperado.\n";
                $infoString .= "-------------------------\n";
                return $infoString;
            }
        } else if (is_array($objects)){
            if (!empty($objects)) {
                $forReturn = "";
                foreach ($objects as $object) {
                    $championMastery = new ChampionMasteryDTO(
                        $this->plataformRouting->get_plataform(),
                        $object->championId,
                        $object->championLevel,
                        $object->championPoints,
                        $object->lastPlayTime,
                        $object->championPointsSinceLastLevel,
                        $object->championPointsUntilNextLevel,
                        $object->chestGranted,
                        $object->tokensEarned,
                        $object->summonerId
                    );
                    array_push($this->championsMasteries, $championMastery);
                    $query = $this->querysChampionMastery->insertInto_ChampionMasteryDto($championMastery);
                    $forReturn .= $query . "\n\n";
                }
                return $forReturn;
            } else {
                $infoString = "\n--- Wrong (Json Decode) ---\n";
                $infoString .= "- No se decodifico correctamente, el array esta vacio.\n";
                $infoString .= "-------------------------\n";
                return $infoString;
            }
        } else if (is_string($objects)) {
            return $objects;
        } else {
            $infoString = "\n--- Bad (Json Decode) ---\n";
            $infoString .= "- No se decodifico correctamente\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        }
    }

    private function prepareSql_insertIntoChampionMasteryScore(String $summonerId, Int $score) : String {
        $this->championMasteryScore = null;
        if (is_object($score) ) {
            if (isset($score->status->status_code)) {
                $infoString = "\n--- Info (Bad Object) ---\n";
                $infoString .= "[Status Code] = " . $score->status->status_code . "\n";
                $infoString .= "[Message]     = " . $score->status->message . "\n";
                $infoString .= "-------------------------\n";
                return $infoString;
            } else {
                $infoString = "\n--- Bad (Unexpected Object) ---\n";
                $infoString .= "- El objeto tiene un contenido inesperado.\n";
                $infoString .= "-------------------------\n";
                return $infoString;
            }
        } else if (is_integer($score)) {
            $this->championMasteryScore = new ChampionMasteryScore(
                $this->plataformRouting->get_plataform(),
                $summonerId,
                $score
            );
            return $this->querysChampionMastery->insertInto_ChampionMasteryScore($this->championMasteryScore);
        } else if (is_string($score)) {
            return $score;
        } else {
            $infoString = "\n--- Bad (Json Decode) ---\n";
            $infoString .= "- No se decodifico correctamente\n";
            $infoString .= "-------------------------\n";
            return $infoString;
        }
    }

    private function convertFromQueryToChampionMasteryDTO(Array $array, Bool $isMultiple = false) : String {
        if (!$isMultiple) {
            $this->championMastery = null;
        } else {
            $this->championsMasteries = array();
        }
        foreach ($array as $clave => $valor) {
            $championMastery = new ChampionMasteryDTO(
                $valor['region'],
                $valor['championId'],
                $valor['championLevel'],
                $valor['championPoints'],
                $valor['lastPlayTime'],
                $valor['championPointsSinceLastLevel'],
                $valor['championPointsUntilNextLevel'],
                $valor['chestGranted'],
                $valor['tokensEarned'],
                $valor['summonerId']
            );
            if (!$isMultiple) {
                $this->championMastery = $championMastery;
            } else {
                array_push($this->championsMasteries, $championMastery);
            }
        }
        if (!$isMultiple) {
            $infoString = "\n--- Good (Data Conversion To ChampionMasteryDTO) ---\n";
            $infoString .= "- Hemos convertido nuestra información a un objeto ChampionMasteryDTO.\n";
            $infoString .= "-------------------------\n";
        } else {
            $infoString = "\n--- Good (Data Conversion To Array of ChampionMasteryDTO) ---\n";
            $infoString .= "- Hemos convertido nuestra información a un array de objetos ChampionMasteryDTO.\n";
            $infoString .= "-------------------------\n";
        }
        return $infoString;
    }

    private function convertFromQueryToChampionMasteryScore(Array $array, Bool $isMultiple = false) : String {
        if (!$isMultiple) {
            $this->championMasteryScore = null;
        } else {
            $this->championMasteryScores = array();
        }
        foreach ($array as $clave => $valor) {
            $championMasteryScore = new ChampionMasteryScore(
                $valor['region'],
                $valor['summonerId'],
                $valor['score']
            );
            if (!$isMultiple) {
                $this->championMasteryScore = $championMasteryScore;
            } else {
                array_push($this->championMasteryScores, $championMasteryScore);
            }
        }
        if (!$isMultiple) {
            $infoString = "\n--- Good (Data Conversion To ChampionMasteryScore) ---\n";
            $infoString .= "- Hemos convertido nuestra información a un objeto ChampionMasteryScore.\n";
            $infoString .= "-------------------------\n";
        } else {
            $infoString = "\n--- Good (Data Conversion To Array of ChampionMasteryScore) ---\n";
            $infoString .= "- Hemos convertido nuestra información a un array de objetos ChampionMasteryScore.\n";
            $infoString .= "-------------------------\n";
        }
        return $infoString;
    }

    public function getChampionsMasteries_bySummonerId(String $summonerId) : String {
        $queryIsInMyDatabase = $this->querysChampionMastery
            ->selectAll_fromChampionMasteryDto_whereRegion_whereSummonerId(
                $this->plataformRouting->get_plataform(),
                $summonerId);
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= "/lol/champion-mastery/v4/champion-masteries/by-summoner/" . $summonerId;
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $objects = $this->requestToApi->getObject_fromJsonUrl($url);
            
            return $this->prepareSql_insertIntoChampionMasteryDto_fromArrayOfObjects($objects);
        } else {
            return $this->convertFromQueryToChampionMasteryDTO($queryIsInMyDatabase, true);
        }
    }

    public function getChampionMastery_bySummonerId_byChampionId(String $summonerId, Int $championId) : String {
        $queryIsInMyDatabase = $this->querysChampionMastery
            ->selectAll_fromChampionMasteryDto_whereRegion_whereSummonerId_whereChampionId(
                $this->plataformRouting->get_plataform(),
                $summonerId, $championId);
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= " /lol/champion-mastery/v4/champion-masteries/by-summoner/" . $summonerId . "/by-champion/" . $championId;
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $object = $this->requestToApi->getObject_fromJsonUrl($url);

            return $this->prepareSql_insertIntoChampionMasteryDto_fromObject($object);
        } else {
            return $this->convertFromQueryToChampionMasteryDTO($queryIsInMyDatabase);
        }
    }

    public function getChampionMasteryScore_bySummonerId(String $summonerId) : String {
        $queryIsInMyDatabase = $this->querysChampionMastery
            ->selectAll_fromChampionMasteryScore_whereRegion_whereSummonerId(
                $this->plataformRouting->get_plataform(),
                $summonerId);
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= "/lol/champion-mastery/v4/scores/by-summoner/" . $summonerId;
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $score = $this->requestToApi->getObject_fromJsonUrl($url);

            return $this->prepareSql_insertIntoChampionMasteryScore($summonerId, $score);
        } else {
            return $this->convertFromQueryToChampionMasteryScore($queryIsInMyDatabase);
        }
    }
}