<?php

$expected     = array('$onlyInCLosure',
                      '$onlyInCLosure',
                      '$seemsInBothClosuresButNot',
                      '$seemsInBothClosuresButNot',
                      '$ca1',
                      '$ca2',
                      '$cb1',
                      '$cb2',
                      '$fromXOnly',
                      '$fromXInUse1AndInCLosure',
                      '$fromXInUse2AndInCLosure',
                     );

$expected_not = array('$fromXInUse1',
                      '$fromXInUse2',
                      '$fromXOnlyTwice',
                     );

?>