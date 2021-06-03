<?php
namespace jsalmoralp\RiotAPI\Tests\RiotAPI\Classes;

use jsalmoralp\RiotAPI\RiotAPI\Classes\Language;

class LanguageTest {
    /**
     * Hace todos los tests de los métodos de la clase LanguageTest.
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @uses LanguageTest::makeTest_existEnvParameter $existEnvParameter
     * @uses LanguageTest::makeTest_canSetCorrectlyLanguage $canSetCorrectlyLanguage
     * @uses LanguageTest::makeTest_canGetLanguage $canGetLanguage
     * 
     * @return Bool
     */
    public function doCompleteTest() : Bool {
        $existEnvParameter = $this->makeTest_existEnvParameter();
        $canSetCorrectlyLanguage = $this->makeTest_canSetCorrectlyLanguage();
        $canGetLanguage = $this->makeTest_canGetLanguage();

        if (
            $existEnvParameter &&
            $canSetCorrectlyLanguage &&
            $canGetLanguage
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
     * @var Language $language
     * 
     * @return Bool
     */
    public function makeTest_existEnvParameter() : Bool {
        return isset($_ENV['API_RIOT_LANGUAGE']);
    }

    /**
     * Undocumented function
     *
     * @author Joan Salmoral Parramon <raskan> email:<jsalmoralp@gmail.com>
     *
     * @var Language $language
     * 
     * @return Bool
     */
    public function makeTest_canSetCorrectlyLanguage() : Bool {
        try {
            $language = new Language("es_ES");
            return $language->get_lang() == "es_ES";
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
     * @var Language $language
     * 
     * @return Bool
     */
    public function makeTest_canGetLanguage() : Bool {
        try {
            $language = new Language();
            if ($language->get_lang()) {
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