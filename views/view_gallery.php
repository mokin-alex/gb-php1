<?php
/** @var array $listPhotos */
?>

<h1>Галерея репродукций</h1>
<div class="gallery">
<?php foreach ($listPhotos as $image): ?>
    <div class="gallery_block">
        <p class="gallery_txt"><?= $image['photo'] ?></p>
        <?php
        include VIEWS_DIR . "view_theOneImage.php"
        ?>
        <p class="gallery_txt"><?= "viewers: " . $image['viewers'] ?> </p>
    </div>
<?php endforeach; ?>
</div>
