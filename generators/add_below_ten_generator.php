<?php

class AddBelowTenGenerator {
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
