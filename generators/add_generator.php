<?php
require_once('lib/Generator.php');

class AddGenerator extends Generator {
    var $numberOfDigits = 1;
    var $short_name = 'Addition';

    public function __construct($numberOfDigits = 1) {
        $this->numberOfDigits = max(1, $numberOfDigits);
    }

    public function newQuestion() {
        $html = array();
        $maxValue = 0;
        for ( $i=0; $i < $this->numberOfDigits; $i++ ) { 
            $maxValue = ($maxValue * 10) + 9;
        }
        $total = rand(0,$maxValue);

        $firstValue = rand(0,$total);
        $secondValue = $total - $firstValue;

        $html[] = $this->div( $firstValue, array('class'=>'first') );
        $html[] = $this->div(
            $this->span('+', array('class'=>'operator') ) . $secondValue,
            array('class'=>'second')
        );
        return implode("\n", $html);
    }
}

?>
