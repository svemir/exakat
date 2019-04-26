<?php

namespace Test\Classes;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class UseClassOperator extends Analyzer {
    /* 3 methods */

    public function testClasses_UseClassOperator01()  { $this->generic_test('Classes/UseClassOperator.01'); }
    public function testClasses_UseClassOperator02()  { $this->generic_test('Classes/UseClassOperator.02'); }
    public function testClasses_UseClassOperator03()  { $this->generic_test('Classes/UseClassOperator.03'); }
}
?>