<?php
require_once __DIR__ . "\..\config\main.php";
require_once ENGINE_DIR . "base.php";
require_once ENGINE_DIR . "calc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = (float) post("num1");
    $num2 = (float) post("num2");
    $operation = post("operation");
    $calcResult = calc($num1,$num2,$operation);
}

include VIEWS_DIR . "view_calc2.php";