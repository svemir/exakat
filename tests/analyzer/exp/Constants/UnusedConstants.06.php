<?php

$expected     = array(  '\'\\\\A\\\\B\\\\C\\\\D\\\\FOO5\'', 
                        '\'A\\\\B\\\\C\\\\D\\\\FOO6\'', 
                        '\'\\\\A\\\\B\\\\C\\\\D\\\\FOO2\'', 
                        '\'\\\\A\\\\B\\\\C\\\\D\\\\FOO\'', 
                        '\'\\\\A\\\\B\\\\C\\\\FOO4\'', 
                        '\'\\\\A\\\\B\\\\FOO5\'', 
                        '\'\\\\A\\\\B\\\\FOO2\'', 
                        '\'\\\\A\\\\B\\\\FOO\'', 
                        '\'\\\\FOO\'');

$expected_not = array('FOO3',
                      'FOO', // the third one
                      'FOO4');

?>