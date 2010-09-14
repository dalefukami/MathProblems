<?php

require_once( 'lib/Generator.php' );

class SubtractDigitsBelowTenGenerator extends Generator {
    var $short_name = 'Subraction - digits below 10';

    public function newQuestion() {
        $html = array();
        $firstPair = $this->getDigitPair();
        $secondPair = $this->getDigitPair();
        $html[] = $this->div($this->getNumberString($firstPair[0],$secondPair[0]), array('class'=>'first'));
        $html[] = $this->finalRow( '-', $this->getNumberString($firstPair[1],$secondPair[1]) );
        return implode("\n", $html);
    }

    private function getDigitPair() {
        $first = rand(0,9);
        $second = rand(0,$first);
        return array($first,$second);
    }

    private function getNumberString($first, $second) {
        $numberString = ($first > 0) ? $first : '&nbsp;';
        $numberString .= $second;
        return $numberString;
    }
}

?>
