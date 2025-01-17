<?php
/*
 * Copyright 2012-2019 Damien Seguy – Exakat SAS <contact(at)exakat.io>
 * This file is part of Exakat.
 *
 * Exakat is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Exakat is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Exakat.  If not, see <http://www.gnu.org/licenses/>.
 *
 * The latest code can be found at <http://exakat.io/>.
 *
*/

namespace Exakat\Analyzer\Structures;

use Exakat\Analyzer\Analyzer;

class RepeatedRegex extends Analyzer {
    public function analyze() {
        // pcre_last_error is too much here
        $functions = $this->loadIni('pcre.ini', 'functions');
        $functionsList = '"\\\\' . implode('", "\\\\', $functions) . '"';
    
        $repeatedRegex = $this->query(<<<GREMLIN
g.V().hasLabel("Functioncall").has("fullnspath", within($functionsList))
     .out("ARGUMENT")
     .hasLabel("String").not(where(__.out("CONCAT")))
     .groupCount("m").by("code").cap("m").next().findAll{ a,b -> b > 1}.keySet()
GREMLIN
)->toArray();
                              
        if (empty($repeatedRegex)) {
            return;
        }

        // regex
        $this->atomFunctionIs(array('\\preg_match'))
             ->outIs('ARGUMENT')
             ->atomIs('String')
             ->hasNoOut('CONCAT')
             ->codeIs($repeatedRegex, self::NO_TRANSLATE)
             ->back('first');
        $this->prepareQuery();
    }
}

?>
