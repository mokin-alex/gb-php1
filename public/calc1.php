<?php
require_once __DIR__ . '\..\config\main.php';
require ENGINE_DIR . "base.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST);
    $num1 = (int) post("num1");
    $num2 = (int) post("num2");
    switch (post("operation")){
        case  "+":
            $calcResult = $num1 + $num2;
            break;
        case "-":
            $calcResult = $num1 - $num2;
            break;
        case  "*":
            $calcResult = $num1 * $num2;
            break;
        case "/":
            if ($num2 == 0){
                $calcResult = "деление на ноль!";
            } else {
                $calcResult = $num1 / $num2;
            }
            break;
    }
}

include VIEWS_DIR . "view_calc1.php";