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


  private static function populateDictionary(DictStore $dictStore, $slang = null, $definition = null, $example = null) 
  {
    if ($slang == null || $definition == null || $example == null) {
      return "Not enough arguments!";
    } else {
      $dictionary = $dictStore->dictData;
      $newSlang['slang'] = $slang;
      $newSlang['description'] = $definition;
      $newSlang['sample-sentence'] = $example;
      array_push($dictionary, $newSlang);
      return $dictionary;
    }
  }

  public static function addSlang(DictStore $dictStore, $slang = null, $definition = null, $example = null)
  {
    if (self::find($dictStore, $slang) !== false) {
      return 'Slang already exists';
    } else {
      $dictStore = self::populateDictionary($dictStore, $slang, $definition, $example);
      return $dictStore;
    }
  }

  /**
   * Delete a given slang from the dictionary, along with it's definition
   *
   * @param string $slang Slang to be deleted
   * 
   * @return string Confirmation of deletion of slang intended to be deleted
   *
   */
  public static function deleteSlang(DictStore $dictStore, $slang)
  {
    $dictCheck = self::find($dictStore, $slang);
    if (self::find($dictStore, $slang) !== false) {
      unset($dictStore->dictData[$dictCheck->index]);
      return $dictStore;
    }
  }
 
}