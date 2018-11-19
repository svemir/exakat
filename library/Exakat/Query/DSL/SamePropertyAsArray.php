<?php
/*
 * Copyright 2012-2018 Damien Seguy – Exakat Ltd <contact(at)exakat.io>
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


namespace Exakat\Query\DSL;

use Exakat\Query\Query;
use Exakat\Analyzer\Analyzer;

class SamePropertyAsArray extends DSL {
    public function run() {
        list($property, $name, $caseSensitive) = func_get_args();

        $this->assertProperty($property);
        $this->assertVariable($name);

        if ($property === 'label') {
            return new Command('filter{ it.get().label() in '.$name.'}');
        } elseif ($property === 'id') {
            return new Command('filter{ it.get().id() in '.$name.'}');
        } elseif ($property === 'self') {
            return new Command('filter{ it.get() in '.$name.'}');
        } elseif ($property === 'code' || $property === 'lccode') {
            if ($caseSensitive === Analyzer::CASE_SENSITIVE) {
                return new Command('filter{ it.get().value("code") in '.$name.'}');
            } else {
                return new Command('filter{ it.get().value("lccode") in '.$name.'}');
            }
        } elseif (in_array($property, array('line', 'rank', 'propertyname', 'boolean', 'count'))) {
            return new Command('filter{ it.get().value("'.$property.'") in '.$name.'}');
        } else {
            $caseSensitive = $caseSensitive === Analyzer::CASE_SENSITIVE ? '' : '.toLowerCase()';

            return new Command('filter{ it.get().value("'.$property.'")'.$caseSensitive.' in '.$name.$caseSensitive.'}');
        }
    }
}
?>
