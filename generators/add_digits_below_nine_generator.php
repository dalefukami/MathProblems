<?php

require_once('lib/Generator.php');

class AddDigitsBelowNineGenerator extends Generator {
    var $short_name = 'Addition - digits total below 9 (I.E., no carrying)';

    public function newQuestion() {
        $html = array();
        $firstPair = $this->getDigitPair();
        $secondPair = $this->getDigitPair();
        $html[] =   "<div class='first'>". $this->getNumberString($firstPair[0],$secondPair[0]) ."</div>";
        $html[] =   "<div class='second'>+&nbsp;&nbsp;". $this->getNumberString($firstPair[1],$secondPair[1]) ."</div>";
        return implode("\n", $html);
    }

    private function getDigitPair() {
        $first = rand(0,9);
        $second = rand(0,9-$first);
        return array($first,$second);
    }

    private function getNumberString($first, $second) {
        $numberString = ($first > 0) ? $first : '&nbsp;';
        $numberString .= $second;
        return $numberString;
    }
}

?>
