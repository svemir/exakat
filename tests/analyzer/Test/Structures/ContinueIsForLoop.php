<?php

namespace Test\Structures;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class ContinueIsForLoop extends Analyzer {
    /* 1 methods */

    public function testStructures_ContinueIsForLoop01()  { $this->generic_test('Structures/ContinueIsForLoop.01'); }
}
?>