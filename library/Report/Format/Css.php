<?php
/*
 * Copyright 2012-2016 Damien Seguy – Exakat Ltd <contact(at)exakat.io>
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


namespace Report\Format;

class Css { 
    private $css         = null;
    private $cssDefault  = null;
    private $cssName     = null; 
    
    public function __construct($cssName, $className) {
        // $cssName already holds the format name as a directory : Devoops/Css/<Css>.json
        if ($cssName === null) {
            $cssName = 'Null';
            // actually, this is OK
        } elseif (file_exists(__DIR__.'/Devoops/Css/'.$cssName.'.json')) {
            $cssName = $cssName;
            $json = file_get_contents(__DIR__.'/Devoops/Css/'.$cssName.'.json');
            $this->css = json_decode($json);
            if ($this->css === null) {
                display( "JSON error in '".$cssName.".json' : ".json_last_error()."\n");
            }
        } else {
            display( "Couldn't find '$cssName.json' file.\n");
        }

        $this->cssDefault = json_decode(file_get_contents(__DIR__.'/Devoops/Css/default/'.$className.'.json'));
    }
    
    public function __get($name) {
        if (isset($this->css->$name)) {
            return $this->css->$name;
        } else {
            if (!property_exists($this->cssDefault, $name)) { 
                display( "Warning : No such default as '$name' in '$this->cssName'\n".
                         print_r($this, true)); 
            }
            return $this->cssDefault->$name;
        }
    }
    
    public function __isset($name) {
        return isset($this->css->$name) && isset($this->cssDefault->$name);
    }
}

?>
