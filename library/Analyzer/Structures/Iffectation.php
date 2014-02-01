<?php

namespace Analyzer\Structures;

use Analyzer;

class Iffectation extends Analyzer\Analyzer {

    function analyze() {
        $this->atomIs("Ifthen")
             ->outIs('CONDITION')
             ->atomInside('Assignation')
             ->hasNoIn('ARGUMENT');
        $this->prepareQuery();
    }
}

?>