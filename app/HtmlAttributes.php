<?php

namespace App;

class HtmlAttributes
{
    public $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function render(): string
    {
        return array_reduce(array_keys($this->attributes), function($result, $key) {
            return $result . $this->renderAttribute($key);
        }, '');
    }

    protected function renderAttribute($key): string
    {
        if (is_numeric($key)) {
            //For example: 'required'
            return " {$this->attributes[$key]}";
        }
        return " $key=\"" . htmlentities($this->attributes[$key], ENT_QUOTES, 'UTF-8') . "\"";
    }
}
