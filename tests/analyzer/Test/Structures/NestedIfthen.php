<?php

namespace Test\Structures;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class NestedIfthen extends Analyzer {
    /* 2 methods */

    public function testStructures_NestedIfthen01()  { $this->generic_test('Structures/NestedIfthen.01'); }
    public function testStructures_NestedIfthen02()  { $this->generic_test('Structures/NestedIfthen.02'); }
}
?>