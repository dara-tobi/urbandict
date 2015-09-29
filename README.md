#Urban Dictionary
The urban dictionary is a compilation of city
slangs. It is a simple project that demonstrates
the use of simple and basic programming concepts.

#Design

Classes
 - DictStire: The main dictionary
 - DictTool: The data access layer, responsible for
   performing CRUD operations on the dictionary.
 - DictRank: Returns a word count in descending order of
   words used in sample sentences in the dictionary


#Testing
 The phpunit framework for testing is used to perform
 unit test on the classes. The TDD principle has been
 employed to make the application robust
 
 Run this on bash to execute the tests
 ```````bash
 /vendor/bin/phpunit
`````````

#Install

- To install this package, PHP 5.5+ and Composer are required

````bash
composer require verem/dictionary
``````

#usage


- Instantiating the Dictionary

``````
$dictionary = new DictStore();
``````

- Instantiating the Dictionary tool

````````
$dictTool = new DictTool();
````````

- Get a slang's meaning from the dictionary

``````
$meaning = $dictTool->getSlang($dictionary,'crash');
``````

- Add a slang to the dictionary

``````
$dictTool->addSlang($dictionary, 'jump', 'To run from the police', 'Tunde will jump despite the warning from the judge');
``````

- Edit a slang in the dictionary

``````
$dictTool->editSlang($dictionary,'tight','A very impressive performance');
``````

-Delete a slang from the dictionary

``````
$delete = $dictTool->deleteSlang($dictionary,'tight');
``````



## Change log
Please check out [CHANGELOG](CHANGELOG.md) file for information on what has changed recently.

## Contributing
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits
Open-source Evangelist is maintained by `Dara Oladosu`.

## License
UrbanDict is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for more details.