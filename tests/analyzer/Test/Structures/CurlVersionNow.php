<?php

namespace Test\Structures;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class CurlVersionNow extends Analyzer {
    /* 1 methods */

    public function testStructures_CurlVersionNow01()  { $this->generic_test('Structures/CurlVersionNow.01'); }
}
?>