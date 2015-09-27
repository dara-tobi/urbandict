<?php
namespace Dara\UrbanDict\Test;

use Dara\UrbanDict\DictTool;
use Dara\UrbanDict\DictStore;

class DictToolTest extends \PHPUnit_Framework_TestCase
{
  protected $dictStore;
  protected $dictTool;

  protected function setUp()
  {
    $this->dictTool = new DictTool();
    $this->dictStore = new DictStore();
  }

  public function testAddSlang()
  {
    $this->assertCount(3, $this->dictStore->dictData);

    $add = $this->dictTool->addSlang($this->dictStore, 'slang','meaning','usage');
    $this->assertCount(4, $add);
  }

  public function testGetSlang()
  {
    $getSlang = $this->dictTool->getSlang($this->dictStore, 'dara');
    $this->assertStringStartsWith('No', $getSlang);

    $getSlang = $this->dictTool->getSlang($this->dictStore, 'tight');
    $this->assertStringStartsWith('\'', $getSlang);
  }

  public function testEditSlang()
  {
    $newMeaning = 'New meaning';
    $editSlang = $this->dictTool->editSlang($this->dictStore, 'dara', $newMeaning);
    $this->assertStringStartsWith('Could', $editSlang);

    $editSlang = $this->dictTool->editSlang($this->dictStore, 'tight', $newMeaning);
    $this->assertStringStartsWith($newMeaning, $editSlang['description']);
  }

  public function testDeleteSlang()
  {
    $deleteSlang = $this->dictTool->deleteSlang($this->dictStore, 'dara');
    $this->assertStringStartsWith('Could', $deleteSlang);

    $deleteSlang = $this->dictTool->deleteSlang($this->dictStore, 'tight');
    $this->assertCount(2, $deleteSlang->dictData);
  }
}