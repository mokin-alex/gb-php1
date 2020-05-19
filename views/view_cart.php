<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Корзина</title>
</head>
<body>
<h1><?= $cartInfo ?></h1>
<div class="cart">
    <form action="" method="post">
        <?php foreach ($cart as $products => $items): ?>
            <?php
            echo '<img class="cart_img" src="data:' . $items['imageType'] . ';base64,' . base64_encode($items['imageData']) . '"/>';
            ?>
            <input type="checkbox" name="product_item[]" value="<?= $products ?>" id="<?= $products ?>">
            <label for="<?= $products ?>">Репродукция ID <?= $items['id'] ?> в количестве: <?= $items['quantity'] ?> экз.</label>
            <br>
        <?php endforeach; ?>
        <p><input type=submit name="remove" value="Удалить"></p>
        <p><input type=submit name="removeAll" value="Очистить корзину"></p>
    </form>
</div>

</body>
</html>
