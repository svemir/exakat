<?php

namespace Analyzer\Namespaces;

use Analyzer;

class Namespacesnames extends Analyzer\Analyzer {

    function analyze() {
        $this->atomIs("Namespace")
             ->outIs('NAMESPACE');
    }
}

?>