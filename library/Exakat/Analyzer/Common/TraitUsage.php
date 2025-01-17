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


namespace Exakat\Analyzer\Common;

use Exakat\Analyzer\Analyzer;

class TraitUsage extends Analyzer {
    protected $traits = array();
    
    public function setTraits($traits) {
        $this->traits = $traits;
    }
    
    public function analyze() {
        $traits =  makeFullNsPath($this->traits);

        $this->atomIs('Staticmethodcall')
             ->outIs('CLASS')
             ->atomIs(array('Identifier', 'Nsname', 'Self', 'Parent', 'Static'))
             ->fullnspathIs($traits);
        $this->prepareQuery();

        $this->atomIs('Staticproperty')
             ->outIs('CLASS')
             ->atomIs(array('Identifier', 'Nsname', 'Self', 'Parent', 'Static'))
             ->fullnspathIs($traits);
        $this->prepareQuery();

        // Staticconstant are not defined in traits
        
        // Instanceof doesn't use traits

// Check that... Const/function and aliases
        $this->atomIs('Usetrait')
             ->outIs('USE')
             ->outIsIE('NAME')
             ->tokenIs(array('T_STRING', 'T_NS_SEPARATOR'))
             ->fullnspathIs($traits);
        $this->prepareQuery();
    }
}

?>
