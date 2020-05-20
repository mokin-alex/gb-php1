<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>MAW PHP1 HW</title>
</head>
<body>
<header>
    <div class="logo">Интернет-магазин</div>
    <div class="header_left">
        <button class="btn-cart" type="button"><a href="index.php">Галерея</a></button>
        <button class="btn-cart" type="button"><a href="cart.php">Корзина</a></button>
        <button class="btn-cart" type="button"><a href="login.php">Вход</a></button>
    </div>
</header>
<main>
    <?= $content ?>
</main>
<footer>
</footer>
</body>
</html>
