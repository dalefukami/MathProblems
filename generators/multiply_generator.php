<?php
require_once('lib/Generator.php');

class MultiplyGenerator extends Generator {
    var $highestValue = 100;
    var $short_name = 'Multiplication';

    public function __construct($params = array()) {
        $highestValue = 0;
        if( !empty($params['highest_value']) ) {
            $highestValue = $params['highest_value'];
        }
        $this->highestValue = max(1, $highestValue);
    }

    public function getAdditionalInfoBlock() {
        $inputName = get_class($this)."_param_highest_value";
        return "
            <div style='border: 1px solid black;'>
                <div>Multiplication questions</div>
                Highest Value <input name='{$inputName}' value=12></input>
            </div>
        ";
    }

    public function newQuestion() {
        $html = array();

        $firstValue = rand(0, $this->highestValue);
        $secondValue = rand(0, $this->highestValue);

        $html[] = $this->div( $firstValue, array('class'=>'first') );
        $html[] = $this->div(
            $this->span('X', array('class'=>'operator') ) . $secondValue,
            array('class'=>'second')
        );
        return implode("\n", $html);
    }
}

?>
