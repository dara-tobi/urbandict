<?php
namespace Dara\UrbanDict;

include('FindSlang.php');

class DictTool
{
  use FindSlang;
  /**
   * Check if a slang exists
   * 
   * @param  DictStore $dictStore An instance of the DictStore class
   * 
   * @param  String    $needle    Slang to be located
   * 
   * @return stdClass  $slang     Slang index, meaning and it's sample sentence        
   */
  private static function find(DictStore $dictStore, String $needle)
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
   * @param DictStore $dictStore 
   *
   * @param  String   $slang  Slang whose definition is being sought for
   * 
   * @return String   $result Definition of the slang being searched for
   */
  public static function getSlang(DictStore $dictStore, $slang = null)
  {
    $searchResult = self::find($dictStore, $slang);
    if ($searchResult === false) {
      $result =  'No definition found for \''.$slang.'\'';
      return $result;
    } else {
      $result =  '\''.$slang.'\' means: '.$searchResult->meaning.' <br/> Example: '.$searchResult->example;
      return $result;
    } 
  }

  /**
   * Insert a new Slang into the dictData array of the DictStore class
   * 
   * @param  DictStore $dictStore  
   * 
   * @param  String    $slang       Slang to be added
   * 
   * @param  String    $definition  Definition of the slang
   * 
   * @param  String    $example     Example sentence of the slang's usage
   * 
   * @return Array     $dictionary  Modified array with the new slang added
   */
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

  /**
   * Add a new slang to the Dictionary
   *
   * @param  DictStore $dictStore  An instance of the DictStore class
   * 
   * @param  String    $slang      Slang to be added to the dictionary
   *
   * @param  String    $definition Definiton of the slang
   *
   * @param  String    $example    Example useage of the slang
   *
   * @return DictStore $dictStore  DictStore instance to which the intended slang has been added
   */
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
   * @param  DictStore $dictStore 
   * 
   * @param  String    $slang     Slang to be deleted
   * 
   * @return DictStore $dictStore DictStore instance from which the intended slang has been deleted
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
  
  /**
   * Edit a given slang's details
   *
   * @param  DictStore $dictStore 
   *
   * @param  String    $slang Slang to be edited
   *
   * @param  String    $newMeaning New definition to be assigned to the slang
   * 
   * @return DictStore $dictStore DictStore instance in which the intended slang has been edited
   */
  public static function editSlang(DictStore $dictStore, $slang, $newMeaning)
  {
    $dictCheck = self::find($dictStore, $slang);
    if ($dictCheck !== false) {
      $dictStore->dictData[$dictCheck->index]['description'] = $newMeaning;
      return $dictStore;
    }
  } 
}