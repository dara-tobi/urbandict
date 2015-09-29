<?php
namespace Dara\UrbanDict;

trait FindSlang
{

    public function getIndex($dictionaryArray, $slang)
    {
        $arr = $dictionaryArray;
        $valueExists = false;
        $slang = strtolower($slang);

        for ($i = 0; $i < count($arr); $i++) {
            if ($slang === strtolower($arr[$i]['slang'])) {
                $valueExists = true;
                $index = $i;
                break;
            }
        }

        return ($valueExists == false) ? false : $index;
    }

    public function find(DictStore $dictStore, $slang)
    {
        $dictionary = $dictStore->dictData;
        $checkSlangExists = $this->getIndex($dictionary, $slang);

        if ($checkSlangExists === false) {
            return false;
        } else {
            $slangIndex = $checkSlangExists;
            $slang = [];
            $slang['index'] = $slangIndex;
            $slang['meaning'] = $dictionary[$slangIndex]['description'];
            $slang['example'] = $dictionary[$slangIndex]['sample-sentence'];
            return $slang;
        }
    }
}
