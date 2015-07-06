<?php
/*
 * Copyright 2012-2015 Damien Seguy – Exakat Ltd <contact(at)exakat.io>
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


namespace Analyzer\Structures;

use Analyzer;

class FileUsage extends Analyzer\Analyzer {
    public function analyze() {
        $this->atomFunctionIs(array('fopen', 'file_get_contents', 'file_put_contents'));
        $this->prepareQuery();

        $fileClasses = array('\\SplFileObject', '\\SplTempFileObject', '\\SplFileInfo');

        $this->atomIs('New')
             ->outIs('NEW')
             ->tokenIs(array('T_STRING', 'T_NS_SEPARATOR'))
             ->atomIsNot(array('Variable', 'Array', 'Property', 'Staticproperty', 'Methodcall', 'Staticmethodcall'))
             ->fullnspath($fileClasses);
        $this->prepareQuery();

        $this->atomIs('Staticmethodcall')
             ->outIs('CLASS')
             ->fullnspath($fileClasses);
        $this->prepareQuery();

        $this->atomIs('Staticproperty')
             ->outIs('CLASS')
             ->fullnspath($fileClasses);
        $this->prepareQuery();

        $this->atomIs('Staticconstant')
             ->outIs('CLASS')
             ->fullnspath($fileClasses);
        $this->prepareQuery();
    }
}

?>
