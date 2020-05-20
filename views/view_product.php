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
            <form action="" method="post" class="form">
                <input type="number" name="quantity" value="1">
                <input type="submit" name="buy" value="Купить">
            </form>
        </div>
    </div>
    <div class="comment">
        <h3>Оставьте отзыв:</h3>
        <form action="" method="post" class="form">
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


