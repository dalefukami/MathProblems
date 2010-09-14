<?php

class SubtractBelowTenGenerator {
    public function newQuestion() {
        $html = array();
        $first = rand(0,9);
        $second = rand(0,10-$first);
        $total = $first + $second;
        $html[] = "<div class='first'>$total</div>";
        $html[] = "<div class='second'>- $first</div>";
        return implode("\n", $html);
    }
}

?>
