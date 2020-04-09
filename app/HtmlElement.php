<?php

namespace App;


class HtmlElement
{

    private $name;
    private $content;
    private $attributes;

    public function __construct(string $name, array $attributes = [], $content = null)
    {
        $this->name = $name;
        $this->attributes = new HtmlAttributes($attributes);
        $this->content = $content;
    }

    public function render(): string
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
        return $this->attributes->render();
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
