<?php
namespace Dara\UrbanDict;

include('FindSlang.php');

class DictTool
{
  use FindSlang;
  /**
   * Add a new slang to the Dictionary
   *
   * @param string $slang Slang to be added to the dictionary
   *
   * @param string $definition Definiton of the slang
   *
   * @param string $example Example useage of the slang
   *
   * @return string Confirmation of addition of slang intended to be added
   */
  
  private static function find(DictStore $dictStore, $needle)
  {
    $dictionary = $dictStore->dictData;
    $checkSlangExists = self::search($dictionary, $needle);

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

  /**
   * Display a slang meaning, and it's sample sentence, from the dictionary
   *
   * @param string $slang Slang whose definition is being sought for
   * 
   * @return string Definition of the slang being searched for
   */
  public static function getSlang(DictStore $dictStore, $slang = null)
  {
    $searchResult =  self::find($dictStore, $slang);
    if ($searchResult === false) {
      return 'No definition found for \''.$slang.'\'';
    } else {
      return '\''.$slang.'\' means: '.$searchResult->meaning.' <br/> Example: '.$searchResult->example;
    } 
  }
}