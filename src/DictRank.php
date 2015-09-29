<?php
namespace Dara\UrbanDict;

class DictRank
{
    use FindSlang;

    public function __construct($dictStore)
    {
        $this->dictStore = $dictStore;
    }
    public function rank($slang)
    {
        $slang = $this->find($this->dictStore, $slang);
        $allWords = $slang->example;

        $rank = array_count_values(str_word_count($allWords, 1));
        array_multisort($rank);
        $rank = array_reverse($rank);
        
        foreach ($rank as $key => $value) {
            var_export($key." => ".$value."<br />");
        }
    }
}