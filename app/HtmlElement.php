<?php

namespace App;


class HtmlElement
{

    private $name;
    private $content;
    /**
     * @var array
     */
    private $attributes;

    public function __construct(string $name, array $attributes = null, $content = null)
    {
        $this->name = $name;
        $this->attributes = $attributes;
        $this->content = $content;
    }

    public function render()
    {
        if ($this->isVoid()) {
            return $this->open();
        }

        return $this->open().$this->contentEscaped().$this->close();
    }

    public function open(): string
    {
        return "<{$this->name}{$this->attributes()}>";
    }

    public function attributes(): string
    {
        return array_reduce(array_keys($this->attributes), function($result, $key) {
            return $result . $this->renderAttribute($key);
        }, '');
    }

    protected function renderAttribute($key)
    {
        if (is_numeric($key)) {
            //For example: 'required'
            return " {$this->attributes[$key]}";
        }
        return " $key=\"" . htmlentities($this->attributes[$key], ENT_QUOTES, 'UTF-8') . "\"";

    }

    public function isVoid(): bool
    {
        return in_array($this->name, ['br', 'hr', 'img', 'input', 'meta']);
    }

    public function contentEscaped(): string
    {
        return htmlentities($this->content, ENT_QUOTES, 'UTF-8');
    }

    public function close(): string
    {
        return "</{$this->name}>";
    }

}
