<?php

namespace Tests;

use App\HtmlAttributes;

class HtmlAttributesTest extends TestCase
{
    /** @test */
    function it_render_attributes()
    {
        $element = new HtmlAttributes(['id' => 'my_span', 'class' => 'my_class']);
        $this->assertSame(' id="my_span" class="my_class"', $element->render());
    }
}
