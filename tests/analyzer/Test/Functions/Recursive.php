<?php

namespace Test\Functions;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class Recursive extends Analyzer {
    /* 7 methods */

    public function testFunctions_Recursive01()  { $this->generic_test('Functions_Recursive.01'); }
    public function testFunctions_Recursive02()  { $this->generic_test('Functions_Recursive.02'); }
    public function testFunctions_Recursive03()  { $this->generic_test('Functions_Recursive.03'); }
    public function testFunctions_Recursive04()  { $this->generic_test('Functions/Recursive.04'); }
    public function testFunctions_Recursive05()  { $this->generic_test('Functions/Recursive.05'); }
    public function testFunctions_Recursive06()  { $this->generic_test('Functions/Recursive.06'); }
    public function testFunctions_Recursive07()  { $this->generic_test('Functions/Recursive.07'); }
}
?>