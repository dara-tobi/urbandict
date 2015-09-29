<?php
namespace Dara\UrbanDict;

Trait FindSlang
{
    public function getIndex($array, $needle)
    {
        $arr = $array;
        $valueExists = false;
        $needle = strtolower($needle);
        for ($i = 0; $i < count($arr); $i++) {
            if ($needle === strtolower($arr[$i]['slang'])) {
                $valueExists = true;
                $index = $i;
                break;
            }
        }
        if ($valueExists == false) {
            return false;
        } else {
           return $index;
        }
    }

    public function find(DictStore $dictStore, $needle)
    {
        $dictionary = $dictStore->dictData;
        $checkSlangExists = $this->getIndex($dictionary, $needle);

        if ($checkSlangExists === false) {
            return false;
        } else {
            $slangIndex = $checkSlangExists;
            $slang = new \stdClass();
            $slang->index = $slangIndex;
            $slang->meaning = $dictionary[$slangIndex]['description'];
            $slang->example = $dictionary[$slangIndex]['sample-sentence'];
            return $slang;
        }
    }
}
