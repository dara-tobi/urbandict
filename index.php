<?php
namespace Dara\UrbanDict;

require_once 'vendor/autoload.php';
use Dara\UrbanDict\DictTool;
use Dara\UrbanDict\DictStore;
use Dara\UrbanDict\DictRank;

?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      body {
        background: #004;
        color: white;
      }
      #container {
        margin: 10px auto;
        width: 850px;
        min-height: 600px;
        border-radius: 10px;
        border: 1px solid white;
        letter-spacing: 1px;
        padding: 8px;
      }
      #workspace {
        background: #beaeae;
        /*height: 580px;*/
        color: #004;
        padding: 20px 50px 20px 50px;
        font-family: sans-serif;
        font-weight: 100;
        font-size: 120%;
      }
    </style>
  </head>
  <body>

    <div id="container">
      <div id="workspace">
      <?php
        // $handler = new DictTool();
        // $dictionary = new DictStore();
        // echo 'Get  <br/>';
        // $get = $handler->getSlang($dictionary,'crash');
        // var_dump($get);
        // echo "<hr />";
        // echo 'Add <br/>';
        // $add = $handler->addSlang($dictionary,'jump','To run from the police','Tunde will jump despite the warwning from the judge');
        // var_dump($add);
        // echo "<hr />";
        // echo 'Edit <br/>';
        // $edit = $handler->editSlang($dictionary,'tight','A very impressive performance');
        // var_dump($edit);
        // echo "<hr />";
        // echo 'Delete <br/>';
        // $delete = $handler->deleteSlang($dictionary,'tight');
        // var_dump($delete);  
        
        $dictionary = new DictStore();
        $ranker = new DictRank($dictionary);
        $find = $ranker->rank('crash');
        //var_dump($find);

      ?>
      </div>
    </div> 
  </body>
</html>