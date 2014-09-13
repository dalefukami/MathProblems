<?php

class HTML
{
    protected function div($contents, $attributes)
    {
        return $this->tag("div", $contents, $attributes);
    }

    protected function span($contents, $attributes)
    {
        return $this->tag("span", $contents, $attributes);
    }

    protected function tag($name, $contents, $attributes)
    {
        $result = "<{$name} ";
        $result .= $this->attributesToString($attributes).">";
        $result .= $contents;
        $result .= "</{$name}>";

        return $result;
    }

    private function attributesToString($attributes)
    {
        $result = "";
        foreach($attributes as $name => $value) {
            $result .= "{$name}='{$value}' ";
        }
        return $result;
    }
}
