<?php
require_once('lib/HTML.php');

class Generator extends HTML {
    var $short_name = 'None';

    public function newQuestion() {
        return "Not implemented";
    }

    public function getShortName() {
        return $this->short_name;
    }

    public function getAdditionalInfoBlock() {
        return "<div style='border: 1px solid red; height: 50px; width: 75px;'>stuff</div>";
    }

    protected function finalRow($operator, $value) {
        return $this->div(
            $this->span($operator, array('class'=>'operator')) . $value,
            array('class'=>'lastRow')
        );
    }
}

?>
