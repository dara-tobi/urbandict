<?php
namespace Dara\UrbanDict\Test;

use Dara\UrbanDict\DictStore;

class DictStoreTest extends \PHPUnit_Framework_TestCase
{
  protected $dictStore;
  
  protected function setUp()
  {
    $this->dictStore = new DictStore();
  }

  public function testArray()
  {
    $this->assertCount(3, $this->dictStore->dictData);
    var_dump($this->dictStore->dictData);

    $this->assertArrayHasKey('slang', $this->dictStore->dictData[0]);
  }
}