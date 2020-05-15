<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calc No 2</title>
</head>
<body>
<h2>Калькулятор 2</h2>
<form id="calc2" action="" method="post">
    <p><input name="num1" type="number" step="0.1"/></p>
    <p><input name="num2" type="number" step="0.1"/></p>
    <input name="operation" value="+" type="submit"/>
    <input name="operation" value="-" type="submit"/>
    <input name="operation" value="*" type="submit"/>
    <input name="operation" value="/" type="submit"/>
</form>
    <p>Результат: <?= $calcResult ?></p>
</body>
</html>
