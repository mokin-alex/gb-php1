<?php
function calc(float $num1, float $num2, string $operation): string
{
    switch ($operation) {
        case  "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case  "*":
            return $num1 * $num2;
        case "/":
            if ($num2 == 0) {
                return "деление на ноль!";
            } else {
                return  $num1 / $num2;
            }
    }
}