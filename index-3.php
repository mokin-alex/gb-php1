<?php
//Задание 1: вывести числа делящиеся без остатка на 3
$i = 1;
while ($i <= 100) {
    if (!($i % 3)) {
        echo $i . ", ";
    }
    $i++;
}
//-----------------------------------------------

//Задание 2:
function chetNeChet()
{
    $i = 0;
    do {
        if ($i == 0) {
            echo "<br>" . $i . " - ноль; <br>";
            $i++;
            continue;
        }
        if ($i % 2) {
            echo "{$i} - нечетное число;<br>";
        } else {
            echo "{$i} - четное число;<br>";
        }
        $i++;
    } while ($i <= 10);
}

chetNeChet();
//-----------------------------------------------

//Задание 3: Вывод массива с городами по областям.
echo "<br>Задание 3 Города по каждой области (массив) <br>";
$maps = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Курганская область' => ['Курган', 'Шадринск', 'Куртамыш', 'Щучье', 'Шумиха'],
];

foreach ($maps as $region => $cities) {
    echo $region . ":<br>";
    $listCities = implode(', ', $cities);
    echo $listCities;
    echo "<br>";
}
//-----------------------------------------------

//Задача 8. Вывести только города на букву К
echo "<br>Задание 8* Города только на букву К <br>";
$theFistSymbol = "К";
foreach ($maps as $region => $cities) {
    echo $region . ":<br>";
    foreach ($maps[$region] as $town) {
        $pos = strpos($town, $theFistSymbol);
        if ($pos === 0) {   //строгое сравнение, иначе будет false
            echo $town . "<br>";
        }
    }
    echo "<br>";
}
//-----------------------------------------------

//Задача 4: Объявить массив, индексами которого являются буквы русского языка,
// а значениями – соответствующие латинские буквосочетания
//Написать функцию транслитерации.
function stringToTranslit($string)
{
    $spelling = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch', 'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    ];
    return strtr($string, $spelling);
}

echo stringToTranslit("Задание 4: Перевод с русского на транслит!") . "<br>";
//-----------------------------------------------

//Задание 5: Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку
function stringWithoutSpaces($string)
{
    return str_replace(' ', '_', $string);
}
echo "<br>" . stringWithoutSpaces("Задание 5: Эта строка совершенно без пробелов!");

//-----------------------------------------------

//Задание 7:
echo "<br>Задание 7:Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла <br>";
for ($i = 1; $i <= 9; print($i++)) {
}
//-----------------------------------------------

echo "<br> Задание 9:<br>";
function str2url($str)
{
    $str = stringToTranslit($str);
    $str = stringWithoutSpaces($str);
    $str = strtolower($str);            //приведем к нижнему регистру
    $str = preg_replace('/[;:,\!\.\?]/', '-', $str); // уберем знаки препинания
    $str = trim($str, '-');     //уберем начальные и конечные "минусы"
    return $str;
}
echo str2url("Пример: полагаю, что это - результат выполнения функции перевода строки в url!");

//-----------------------------------------------

//Задание 6: Необходимо представить пункты меню как элементы массива и вывести их циклом.
$menu = [
    'Catalog' => ['For Men', 'For Women', 'For Childes'],
    'Brands' => ['Adibas', 'Pumka', 'Reebook'],
    'Cart' => ['Cart', 'Shipping'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP1 HomeWork 3</title>
</head>
<body>
<ul class="menu">
    <?php foreach ($menu as $key => $items): ?>
    <li><a href="#"><?= $key?></a>
        <ul class="menu">
            <?php foreach ($menu[$key] as $item): ?>
            <li><a href="#"><?= $item ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
