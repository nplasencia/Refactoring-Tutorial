<?php

require '../vendor/autoload.php';

use App\HtmlElement;

$htmlElement = new HtmlElement('p', [],'This is the content');
echo htmlentities($htmlElement->render(), ENT_QUOTES, 'UTF-8');

echo "<br><br>";

$htmlElement = new HtmlElement('p', ['id' => 'my_paragraph'],'This is the content with attributes');
echo htmlentities($htmlElement->render(), ENT_QUOTES, 'UTF-8');

echo "<br><br>";

$htmlElement = new HtmlElement('p', ['id' => 'my_paragraph', 'class' => 'paragraph'],'This is the content with attributes');
echo htmlentities($htmlElement->render(), ENT_QUOTES, 'UTF-8');

echo "<br><br>";

$htmlElement = new HtmlElement('img', ['src' => 'img/auret.png']);
echo htmlentities($htmlElement->render(), ENT_QUOTES, 'UTF-8');

echo "<br><br>";

$htmlElement = new HtmlElement('img', ['src' => 'img/auret.png', 'title' => '"Refactoring" course']);
echo htmlentities($htmlElement->render(), ENT_QUOTES, 'UTF-8');

echo "<br><br>";

$htmlElement = new HtmlElement('input', ['required']);
echo htmlentities($htmlElement->render(), ENT_QUOTES, 'UTF-8');
