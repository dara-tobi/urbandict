<?php
namespace Dara\UrbanDict;

Trait FindSlang
{
  private static function search($array, $needle)
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
}
