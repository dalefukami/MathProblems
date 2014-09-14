<?php

require_once('lib/Generator.php');

class AddBelowTenGenerator extends Generator {
    var $short_name = 'Addition below 10 (I.E., no totals above ten but some that equal ten)';

    public function newQuestion() {
        $html = array();
        $first = rand(0,9);
        $second = rand(0,10-$first);
        $html[] =   "<div class='first'>$first</div>";
        $html[] =   "<div class='second'>+ $second</div>";
        return implode("\n", $html);
    }
}

?>
