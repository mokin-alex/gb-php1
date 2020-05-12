<?php
/** @var array $listPhotos */
//var_dump($listPhotos);
?>
<h1>Галерея фотографий</h1>
<div class="gallery">
<?php foreach ($listPhotos as $item): ?>
    <div class="gallery_block">
        <p class="gallery_txt"><?= $item['photo'] ?></p>
        <a href="photo.php?id=<?= $item['id'] ?>" target="_blank"><img src="<?= $item['smallpic'] ?>"
                                                                       alt="<?= $item['photo'] ?>"></a>
        <p class="gallery_txt"><?= "viewers: " . $item['viewers'] ?> </p>
    </div>
<?php endforeach; ?>
</div>
