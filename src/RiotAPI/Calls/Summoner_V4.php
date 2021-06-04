<?php
namespace jsalmoralp\RiotAPI\RiotAPI\Calls;

use jsalmoralp\RiotAPI\Native\DB\Query\SummonerDTOQuerys;
use jsalmoralp\RiotAPI\Native\Request\RequestToAPI;
use jsalmoralp\RiotAPI\RiotAPI\Classes\PlataformRouting;
use jsalmoralp\RiotAPI\RiotAPI\Classes\SummonerDTO;

class Summoner_V4 {
    private PlataformRouting $plataformRouting;
    private RequestToAPI $requestToApi;
    private SummonerDTOQuerys $querysSummoner;
    private ?SummonerDTO $summoner;
    private Mixed $object;
    

    public function __construct($plataform = null) {
        $this->plataformRouting = new PlataformRouting($plataform);
        $this->requestToApi = new RequestToAPI();
        $this->querysSummoner = new SummonerDTOQuerys();
        $this->summoner = null;
    }

    public function get_summonerDTO() : ?SummonerDTO{
        return $this->summoner;
    }

    private function prepareSql_insertInto_fromObject(Mixed $object) : String {
        if (is_object($object) ) {
            if (!empty($object)) {
                if (!isset($object->status->status_code)) {
                    $this->summoner = new SummonerDTO(
                        $this->plataformRouting->get_plataform(),
                        $object->id,
                        $object->accountId,
                        $object->puuid,
                        $object->name,
                        $object->profileIconId,
                        $object->revisionDate,
                        $object->summonerLevel
                    );
                    return $this->querysSummoner->insertInto_fromSummonerDTO($this->summoner);
                } else {
                    $infoString = "\n--- Info (Bad Object) ---\n";
                    $infoString .= "[Status Code] = " . $object->status->status_code . "\n";
                    $infoString .= "[Message]     = " . $object->status->message . "\n";
                    $infoString .= "-------------------------\n";
                    return $infoString;
                }
            } else {
                $infoString = "\n--- Wrong (Json Decode) ---\n";
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

    private function convertFromQueryToSummonerDTO(Array $array) : String {
        foreach ($array as $clave => $valor) {
            $this->summoner = new SummonerDTO(
                $valor['region'],
                $valor['id'],
                $valor['accountId'],
                $valor['puuid'],
                $valor['name'],
                $valor['profileIconId'],
                $valor['revisionDate'],
                $valor['summonerLevel']
            );
        }
        $infoString = "\n--- Good (Data Conversion To SummonerDTO) ---\n";
        $infoString .= "- Hemos convertido nuestra información a un objeto SummonerDTO.\n";
        $infoString .= "-------------------------\n";
        return $infoString;
    }

    public function getSummoner_byAccountId(String $accountId) : String {
        $queryIsInMyDatabase = $this->querysSummoner
            ->selectAll_fromSummonerDto_whereRegion_whereAccountId(
                $this->plataformRouting->get_plataform(),
                $accountId);
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= "/lol/summoner/v4/summoners/by-account/" . $accountId;
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $this->object = $this->requestToApi->getObject_fromJsonUrl($url);

            return $this->prepareSql_insertInto_fromObject($this->object);
        } else {
            return $this->convertFromQueryToSummonerDTO($queryIsInMyDatabase);
        }
    }

    public function getSummoner_byName(String $name) : String {
        $queryIsInMyDatabase = $this->querysSummoner
            ->selectAll_fromSummonerDto_whereRegion_whereName(
                $this->plataformRouting->get_plataform(),
                $name);;
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= "/lol/summoner/v4/summoners/by-name/" . $name;
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $this->object = $this->requestToApi->getObject_fromJsonUrl($url);

            return $this->prepareSql_insertInto_fromObject($this->object);
        } else {
            return $this->convertFromQueryToSummonerDTO($queryIsInMyDatabase);
        }
    }

    public function getSummoner_byPuuid(String $puuid) : String {
        $queryIsInMyDatabase = $this->querysSummoner
            ->selectAll_fromSummonerDto_whereRegion_wherePuuid(
                $this->plataformRouting->get_plataform(),
                $puuid);
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= "/lol/summoner/v4/summoners/by-puuid/" . $puuid;
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $this->object = $this->requestToApi->getObject_fromJsonUrl($url);

            return $this->prepareSql_insertInto_fromObject($this->object);
        } else {
            return $this->convertFromQueryToSummonerDTO($queryIsInMyDatabase);
        }
    }

    public function getSummoner_byId(String $id) : String {
        $queryIsInMyDatabase = $this->querysSummoner
            ->selectAll_fromSummonerDto_whereRegion_whereId(
                $this->plataformRouting->get_plataform(),
                $id);
        if (empty($queryIsInMyDatabase)) {
            $url = "https://" . $this->plataformRouting->get_plataformHost();
            $url .= "/lol/summoner/v4/summoners/" . $id;
            $url .= "?api_key=" . $_ENV['API_RIOT_KEY'];

            $this->object = $this->requestToApi->getObject_fromJsonUrl($url);

            return $this->prepareSql_insertInto_fromObject($this->object);
        } else {
            return $this->convertFromQueryToSummonerDTO($queryIsInMyDatabase);
        }
    }
}
