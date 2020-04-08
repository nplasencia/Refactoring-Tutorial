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
        $result = $this->open();

        if ($this->isVoid()) {
            return $result;
        }

        $result .= $this->contentEscaped();

        $result .= $this->close();

        return $result;
    }

    public function open(): string
    {
        return "<{$this->name}{$this->attributes()}>";
    }

    public function attributes(): string
    {
        if (empty($this->attributes)) {
            return '';
        }

        $htmlAttributes = '';

        foreach ($this->attributes as $key => $value) {
            $htmlAttributes .= $this->renderAttribute($key, $value);
        }

        return $htmlAttributes;
    }

    protected function renderAttribute($key, $value)
    {
        if (is_numeric($key)) {
            //For example: 'required'
            return " $value";
        }
        return " $key=\"" . htmlentities($value, ENT_QUOTES, 'UTF-8') . "\"";

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
