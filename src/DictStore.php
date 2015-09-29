<?php
namespace Dara\UrbanDict;

class DictStore
{
    use FindSlang;
    /**
     * Static array of Dictionary data
     *
     * @var array(array("key" => "value"))
     */
    public $dictData = [
          [
            "slang"           => "Tight",
            "description"     => "When someone performs an awesome task.",
            "sample-sentence" => "Andrei: Prosper, Have you finished the curriculum? Prosper: Yes. Andrei: Tight, Tight, Tight!!!"
        ],
        [
            "slang"           => "Crash",
            "description"     => "To sleep in an unusual location.",
            "sample-sentence" => "It's been a while since I crashed at a friend's, Can I crash at your place?"
        ],
        [
            "slang"           => "Lift",
            "description"     => "To steal an item",
            "sample-sentence" => "Seyi still can't believe Amitab could lift her phone."
        ],
    ];
}