<?php

namespace Test\Constants;

use Test\Analyzer;

include_once dirname(__DIR__, 2).'/Test/Analyzer.php';

class ConstRecommended extends Analyzer {
    /* 4 methods */

    public function testConstants_ConstRecommended01()  { $this->generic_test('Constants_ConstRecommended.01'); }
    public function testConstants_ConstRecommended02()  { $this->generic_test('Constants_ConstRecommended.02'); }
    public function testConstants_ConstRecommended03()  { $this->generic_test('Constants_ConstRecommended.03'); }
    public function testConstants_ConstRecommended04()  { $this->generic_test('Constants_ConstRecommended.04'); }
}
?>