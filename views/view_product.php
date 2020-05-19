<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $photo['author'] ?></title>
</head>
<body>
<h1>Репродукция </h1>
<div class="product">
    <div class="product_block">
        <?php
        echo '<img width="400" src="data:' . $photo['imageType'] . ';base64,' . base64_encode($photo['imageData']) . '"/>';
        ?>
        <p> <?= $photo['author'] ?></p>
        <p> <?= $photo['description'] ?></p>
        <p>просмотров: <?= $photo['viewers'] ?></p>
        <div class="product_bay">
            <form action="" method="post">
                <input type="number" name="quantity" value="1">
                <input type="submit" name="buy" value="Купить">
            </form>
            <a href="cart.php">Перейти в корзину</a>
        </div>
    </div>
    <div class="comment">
        <h3>Оставьте отзыв:</h3>
        <form action="" method="post">
            <p><textarea name="comment" cols="40" rows="4"></textarea></p>
            <input type="submit" name="addComment">
        </form>
        <div class="comment_block">
            <h3>Комментарии:</h3>
            <?php foreach ($listComments as $item): ?>
                <div class="comments_block">
                    <p>  <?= $item['text'] ?> </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>


