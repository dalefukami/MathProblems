<?php

require_once('lib/Generator.php');

class SubtractGenerator extends Generator {
    var $numberOfDigits = 1;
    var $short_name = 'Subtraction';

    public function __construct($params = array()) {
        $numberOfDigits = 0;
        if( !empty($params['number_of_digits']) ) {
            $numberOfDigits = $params['number_of_digits'];
        }
        $this->numberOfDigits = max(1, $numberOfDigits);
    }

    public function getAdditionalInfoBlock() {
        $inputName = get_class($this)."_param_number_of_digits";
        return "
            <div style='border: 1px solid black;'>
                <div>Subtraction questions</div>
                Number of Digits <input name='{$inputName}' value=3></input>
            </div>
        ";
    }

    public function newQuestion() {
        $html = array();
        $maxValue = 0;
        for ( $i=0; $i < $this->numberOfDigits; $i++ ) { 
            $maxValue = ($maxValue * 10) + 9;
        }
        $total = rand(0,$maxValue);

        $value = rand(0,$total);

        $html[] = $this->div( $total, array('class'=>'first') );
        $html[] = $this->div(
            $this->span('-', array('class'=>'operator') ) . $value,
            array('class'=>'second')
        );
        return implode("\n", $html);
    }
}

?>
