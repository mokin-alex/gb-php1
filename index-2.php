<?php
echo "<h2> Задание 1 </h2>";
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
echo "<h2> Задание 3 и 4 </h2>";
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
echo "<h2> Задание 5 </h2>";
$currentYear = new DateTime(); //встроенные функции PHP

//Преобразуем текущую дату к строковому значению ГОД
echo "Copyright MAW " . $currentYear->format('Y') . "<br>";

//-------------------------------------------------------------------
echo "<h2> Задание 6 </h2>"; //рекурсивная функция возведения числа в степень

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
echo "<h2> Задание 7 </h2>";

function declension($number, $wordForm1, $wordForm2, $wordForm3)
{
    $num10 = $number % 10;   //остаток от деления на 10
    $num100 = $number % 100;

    if ($num100 > 10 && $num100 < 20) return $wordForm3;
    if ($num10 == 1) return $wordForm1;
    if ($num10 > 1 && $num10 < 5) return $wordForm2;
    return $wordForm3;
}

function whatTimeIsIt()
{
    $hours = date("G");    //часы 24-формат без ведущих нулей
    $minutes = date("i");  // минуты
    //$hours = 21;    //тестовые значения
    //$minutes = 36;  //тестовые значения
    $declHours = declension($hours, "час", "часа", "часов");
    $declMinutes = declension($minutes, "минута", "минуты", "минут");
    return "{$hours} {$declHours} {$minutes} {$declMinutes}";
}

$currentTime = whatTimeIsIt();
echo "<p>Сейчас {$currentTime}</p> ";