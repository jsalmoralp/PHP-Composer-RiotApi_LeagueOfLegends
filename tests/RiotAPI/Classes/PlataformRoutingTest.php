<?php
namespace jsalmoralp\RiotAPI\Tests\RiotAPI\Classes;

use jsalmoralp\RiotAPI\RiotAPI\Classes\PlataformRouting;

class PlataformRoutingTest {
    /**
     * Hace todos los tests de los métodos de la clase PlataformRoutingTest.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @uses PlataformRoutingTest::makeTest_existEnvParameter $existEnvParameter
     * @uses PlataformRoutingTest::makeTest_canSetCorrectLanguage $canSetCorrectLanguage
     * @uses PlataformRoutingTest::makeTest_canGetLanguage $canGetLanguage
     * 
     * @return Bool
     */
    public function doCompleteTest() : Bool {
        $existEnvParameter = $this->makeTest_existEnvParameter();
        $canSetCorrectlyPlataformRouting = $this->makeTest_canSetCorrectlyPlataformRouting();
        $canGetPlataformRouting = $this->makeTest_canGetPlataformRouting();

        if (
            $existEnvParameter &&
            $canSetCorrectlyPlataformRouting &&
            $canGetPlataformRouting
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Undocumented function
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @return Bool
     */
    public function makeTest_existEnvParameter() : Bool {
        return isset($_ENV['API_RIOT_PLATAFORM_ROUTING']);
    }

    /**
     * Undocumented function
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var PlataformRouting $plataform
     * 
     * @return Bool
     */
    public function makeTest_canSetCorrectlyPlataformRouting() : Bool {
        try {
            $plataform = new PlataformRouting("EUW1");
            return $plataform->get_plataform() == "EUW1";
        }
        catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }

    /**
     * Undocumented function
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var PlataformRouting $plataform
     * 
     * @return Bool
     */
    public function makeTest_canGetPlataformRouting() : Bool {
        try {
            $plataform = new PlataformRouting();
            if ($plataform->get_plataform()) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }

    /**
     * Undocumented function
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var PlataformRouting $plataform
     * 
     * @return Bool
     */
    public function makeTest_canGetPlataformRouting_host() : Bool {
        try {
            $plataform = new PlataformRouting();
            if ($plataform->get_plataformHost()) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }
    
}