<?php

namespace Test\Type;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class Printf extends Analyzer {
    /* 1 methods */

    public function testType_Printf01()  { $this->generic_test('Type/Printf.01'); }
}
?>