<?php

namespace Tests;

use App\HtmlElement;

class HtmlElementTest extends TestCase
{
    /** @test */
    function it_generates_a_paragraph_with_content() {

        $htmlElement = new HtmlElement('p', [],'This is the content');

        $this->assertSame(
            "<p>This is the content</p>",
            $htmlElement->render()
        );
    }

    /** @test */
    function it_generates_a_paragraph_with_one_attribute_and_content() {

        $htmlElement = new HtmlElement('p', ['id' => 'my_paragraph'],'This is the content with attributes');

        $this->assertSame(
            "<p id=\"my_paragraph\">This is the content with attributes</p>",
            $htmlElement->render()
        );
    }

    /** @test */
    function it_generates_a_paragraph_with_some_attribute_and_content() {

        $htmlElement = new HtmlElement('p', ['id' => 'my_paragraph', 'class' => 'paragraph'],'This is the content with attributes');

        $this->assertSame(
            "<p id=\"my_paragraph\" class=\"paragraph\">This is the content with attributes</p>",
            $htmlElement->render()
        );
    }

    /** @test */
    function it_generates_an_image_without_attributes() {

        $htmlElement = new HtmlElement('img', ['src' => 'img/auret.png']);

        $this->assertSame("<img src=\"img/auret.png\">", $htmlElement->render());
    }

    /** @test */
    function it_generates_an_image_with_attributes_and_it_scapes_it() {

        $htmlElement = new HtmlElement('img', ['src' => 'img/auret.png', 'title' => '"Refactoring" course']);

        $this->assertSame(
            "<img src=\"img/auret.png\" title=\"&quot;Refactoring&quot; course\">",
            $htmlElement->render()
        );
    }

    /** @test */
    function it_generates_an_input_with_boolean_attributes() {

        $htmlElement = new HtmlElement('input', ['required']);

        $this->assertSame("<input required>", $htmlElement->render());
    }
}