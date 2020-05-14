<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calc No 1</title>
</head>
<body>
<h2>Простейший калькулятор</h2>
<form id="calc1" action="" method="post">
    <input name="num1" type="number" size="10"/>
    <select name="operation" id="">
        <option value="+">Сложение</option>
        <option value="-">Вычитание</option>
        <option value="*">Умножение</option>
        <option value="/">Деление</option>
    </select>
    <input name="num2" type="number"/>
    <input name="submit" value="Рассчитать" type="submit"/>
</form>
    <p>Результат: <?= $calcResult ?></p>
</body>
</html>
