<?php

namespace Test\Arrays;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class CurlyArrays extends Analyzer {
    /* 1 methods */

    public function testArrays_CurlyArrays01()  { $this->generic_test('Arrays/CurlyArrays.01'); }
}
?>