<?php

require '../vendor/autoload.php';

use App\HtmlElement;

$htmlElement = new HtmlElement();

echo $htmlElement->render();
