<?php
 namespace jsalmoralp\RiotAPI\Tests\RiotAPI\Classes;

use jsalmoralp\RiotAPI\Tests\RiotAPI\Classes\LanguageTest;
use jsalmoralp\RiotAPI\Tests\RiotAPI\Classes\PlataformRoutingTest;

class ClassesTest {
    /**
     * Función que devuelve en "True | False" todos los Tests de las Classes.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var LanguageTest $languageTest
     * @var PlataformRoutingTest $plataformRoutingTest
     * 
     * @return Bool
     */
    public function run() : Bool {
        $languageTest = new LanguageTest();
        $plataformRoutingTest = new PlataformRoutingTest();

        if (
            $languageTest->doCompleteTest() &&
            $plataformRoutingTest->doCompleteTest()
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función que devuelve en Texto todos los Tests de las Classes.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var String $response
     *
     * @return String
     */
    public function runDebug() : String {
        $response = "\n[[[ START Test Clases ]]]\n";

        $response .= $this->languageTestDebug();
        $response .= $this->plataformRoutingTestDebug();

        $response .= "\n[[[ FIN Test Clases ]]]\n";
        return $response;
    }
    
    /**
     * Función que devuelve en Texto los Tests de "LanguageTest".
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var LanguageTest $languageTest
     * @var String $response
     *
     * @return String
     */
    private function languageTestDebug() : String {
        $languageTest = new LanguageTest();
        $response = "\n";

        if ($languageTest->doCompleteTest()) {
            $response .= "-- Test de Language -> Correcto\n";
        } else {
            $response .= "-- Test de Language --\n";
            
            if ($languageTest->makeTest_existEnvParameter()) {
                $response .= "\nOK   -> Existe variable de entorno para Language";
            } else {
                $response .= "\nFAIL -> Existe variable de entorno para Language";
            }

            if ($languageTest->makeTest_canSetCorrectlyLanguage()) {
                $response .= "\nOK   -> Se puede definir el Lenguaje";
            } else {
                $response .= "\nFAIL -> Se puede definir el Lenguaje";
            }

            if ($languageTest->makeTest_canGetLanguage()) {
                $response .= "\nOK   -> Se puede obtener el Lenguaje";
            } else {
                $response .= "\nFAIL -> Se puede obtener el Lenguaje";
            }

            $response .= "\n----------------------\n";
        }
        return $response;
    }

    /**
     * Función que devuelve en Texto los Tests de "PlataformRoutingTest".
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var PlataformRoutingTest $plataformRoutingTest
     * @var String $response
     *
     * @return String
     */
    private function plataformRoutingTestDebug() : String {
        $plataformRoutingTest = new PlataformRoutingTest();
        $response = "\n";

        if ($plataformRoutingTest->doCompleteTest()) {
            $response .= "-- Test de PlataformRouting -> Correcto\n";
        } else {
            $response .= "-- Test de PlataformRouting --\n";
            
            if ($plataformRoutingTest->makeTest_existEnvParameter()) {
                $response .= "\nOK   -> Existe variable de entorno para PlataformRouting";
            } else {
                $response .= "\nFAIL -> Existe variable de entorno para PlataformRouting";
            }

            if ($plataformRoutingTest->makeTest_canSetCorrectlyPlataformRouting()) {
                $response .= "\nOK   -> Se puede definir el PlataformRouting";
            } else {
                $response .= "\nFAIL -> Se puede definir el PlataformRouting";
            }

            if ($plataformRoutingTest->makeTest_canGetPlataformRouting()) {
                $response .= "\nOK   -> Se puede obtener el PlataformRouting";
            } else {
                $response .= "\nFAIL -> Se puede obtener el PlataformRouting";
            }

            $response .= "\n----------------------\n";
        }
        return $response;
    }
}
