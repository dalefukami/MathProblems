<?php
require_once('lib/HTML.php');

class Generator extends HTML {
    public function newQuestion() {
        return "Not implemented";
    }

    protected function finalRow($operator, $value) {
        return $this->div(
            $this->span($operator, array('class'=>'operator')) . $value,
            array('class'=>'lastRow')
        );
    }
}

?>
