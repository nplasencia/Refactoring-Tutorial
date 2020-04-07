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
        if (!empty($this->attributes)) {
            $htmlAttributes = '';

            foreach ($this->attributes as $key => $value) {
                if (is_numeric($key)) {
                    //For example: 'required'
                    $htmlAttributes .= " $value";
                } else {
                    $htmlAttributes .= " $key=\"".htmlentities($value, ENT_QUOTES, 'UTF-8')."\"";
                }
            }

            $result = "<{$this->name}$htmlAttributes>";
        } else {
            $result = "<{$this->name}>";
        }

        // If the element is void, we have to return
        if (in_array($this->name, ['br', 'hr', 'img', 'input', 'meta'])) {
            return $result;
        }

        //Print element content
        $result .= htmlentities($this->content, ENT_QUOTES, 'UTF-8');

        // Close the element
        $result .= "</{$this->name}>";

        return $result;
    }
}
