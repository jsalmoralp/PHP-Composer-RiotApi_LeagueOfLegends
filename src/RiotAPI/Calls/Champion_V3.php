<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Calls;

use jsalmoralp\RiotAPI\Native\DB\Query\ChampionsRotationQuerys;
use jsalmoralp\RiotAPI\Native\Request\RequestToAPI;
use jsalmoralp\RiotAPI\RiotAPI\Classes\ChampionsRotation;
use jsalmoralp\RiotAPI\RiotAPI\Classes\PlataformRouting;

class Champion_V3 {
    private PlataformRouting $plataformRouting;
    private RequestToAPI $requestToApi;
    private ChampionsRotationQuerys $querysChampionsRotation;
    private ?ChampionsRotation $championsRotation;

    public function __construct(String $plataformRouting = null) {
        if ($plataformRouting) {
            $this->plataformRouting = new PlataformRouting($plataformRouting);
        } else {
            $this->plataformRouting = new PlataformRouting();
        }
        $this->requestToApi = new RequestToAPI();
        $this->querysChampionsRotation = new ChampionsRotationQuerys();
        $this->championsRotation = null;
    }

    public function get_ChampionsRotation() : ?ChampionsRotation{
        return $this->championsRotation;
    }

    private function prepareSql_insertIntoChampionsRotation_fromObject(Mixed $object) : String {
        $this->championsRotation = null;
        if (is_object($object) ) {
            if (!empty($object)) {
                if (isset($object->status->status_code)) {
                    $infoString = "\n--- Info (Bad Object) ---\n";
                    $infoString .= "[Status Code] = " . $object->status->status_code . "\n";
                    $infoString .= "[Message]     = " . $object->status->message . "\n";
                    $infoString .= "-------------------------\n";
                    return $infoString;
                } else if (isset($object->freeChampionIds)) {
                    $this->championsRotation = new ChampionsRotation(
                        $this->plataformRouting->get_plataform(),
                        $object->freeChampionIds,
                        $object->freeChampionIdsForNewPlayers,
                        $object->maxNewPlayerLevel,
                        intval(date("W")),
                        intval(date("Y"))
                    );
                    return $this->querysChampionsRotation->insertInto_ChampionsRotation($this->championsRotation);
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

    private function convertFromQueryToChampionsRotation(Array $array) : String {
        $this->championsRotation = null;
        foreach ($array as $clave => $valor) {
            $this->championsRotation = new ChampionsRotation(
                $valor['region'],
                json_decode(base64_decode($valor['freeChampionIds'])),
                json_decode(base64_decode($valor['freeChampionIdsForNewPlayers'])),
                $valor['maxNewPlayerLevel'],
                $valor['weekNumber'],
                $valor['year']
            );
        }
        $infoString = "\n--- Good (Data Conversion To ChampionsRotation) ---\n";
        $infoString .= "- Hemos convertido nuestra información a un objeto ChampionsRotation.\n";
        $infoString .= "-------------------------\n";
        return $infoString;
    }

    public function getChampionsRotation() : String {
        $queryIsInMyDatabase = $this->querysChampionsRotation
            ->selectAll_fromChampionsRotation_whereRegion(
                $this->plataformRouting->get_plataform());
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= "/lol/platform/v3/champion-rotations";
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $object = $this->requestToApi->getObject_fromJsonUrl($url);
            
            return $this->prepareSql_insertIntoChampionsRotation_fromObject($object);
        } else {
            return $this->convertFromQueryToChampionsRotation($queryIsInMyDatabase);
        }
    }
}