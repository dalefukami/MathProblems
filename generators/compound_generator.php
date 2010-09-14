<?php

class CompoundGenerator {
    var $generators = array();

    public function add($generator) {
        $this->generators[] = $generator;
    }

    public function newQuestion() {
        $generator_index = rand(0,count($this->generators)-1);
        return $this->generators[$generator_index]->newQuestion();
    }
}

?>
