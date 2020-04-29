<?php
echo "Задание 1 <br>";
echo "Заданы числа: <br>";
$a = 5;
$b = -3;
echo $a, "<br>", $b, "<br>";

if (($a >= 0) && ($b >= 0)) {
    $s = $a - $b;
    echo "Разность положительных чисел равна: {$s}";
} elseif (($a < 0) && ($b < 0)) {
    $s = $a * $b;
    echo "Произведение отрицательных чисел равно: {$s}";
} else {
    $s = $a + $b;
    echo "Сумма положительного и отрицательного чисел равна: {$s}";
}
//--------------------------------------------------------------------
echo "<p> Задание 3 и 4 <p>";
function mySumm($argument1, $argument2)
{
    return $argument1 + $argument2;
}

function myDiff($argument1, $argument2)
{
    return $argument1 - $argument2;
}

function myProd($argument1, $argument2)
{
    return $argument1 * $argument2;
}

function myDiv($argument1, $argument2)
{
    return $argument1 / $argument2;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "сложение":
            return mySumm($arg1, $arg2);
        case "вычитание":
            return myDiff($arg1, $arg2);
        case "умножение":
            return myProd($arg1, $arg2);
        case "деление":
            return myDiv($arg1, $arg2);
        default:
            return null; //возвращаем null значение, если такой опреации нет в нашем списке
    }
}

$inputOperation = "вычитание";
$taskResult = mathOperation($a, $b, $inputOperation);
if ($taskResult != null) {
    echo "Операция: {$inputOperation} результат: {$taskResult} <br>";
} else {
    echo "Неизвестная математическая операция - {$inputOperation} <br>";
}

$inputOperation = "корень числа";
$taskResult = mathOperation($a, $b, $inputOperation);
if ($taskResult != null) {
    echo "Операция: {$inputOperation} результат: {$taskResult} <br>";
} else {
    echo "Неизвестная математическая операция - {$inputOperation} <br>";
}

//-------------------------------------------------------------------
echo "Задание 5 <br>";
$currentYear = new DateTime(); //встроенные функции PHP

//Преобразуем текущую дату к строковому значению ГОД
echo "Copyright MAW " . $currentYear->format('Y') . "<br>";

//-------------------------------------------------------------------
echo "Задание 6 <br>"; //рекурсивная функция возведения числа в степень

function power($val, $pow)
{
    if ($pow == 0) return 1;    //любое число в степени 0 равно единице.
    if ($pow == 1) return $val; //в степени 1
    if ($pow > 1) {             // степень - положительное число
        return $val *= power($val, ($pow - 1));
    }
    if ($pow < 0) {              // степень - отрицательное число
        return $val = 1 / ($val * power($val, -($pow + 1)));
    }
}

$userNumber = 2;
$userDegree = 3;
$powResult = power($userNumber, $userDegree);
echo "Число ${userNumber} возведенное в степень ${userDegree} равно ${powResult} <br>";
$userNumber = 2;
$userDegree = -3;
$powResult = power($userNumber, $userDegree);
echo "Число ${userNumber} возведенное в степень ${userDegree} равно ${powResult} <br>";

//--------------------------------------------------------------------
