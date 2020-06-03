<h1>Галерея репродукций</h1>
<div class="gallery">
    <?php foreach ($listPhotos as $image): ?>
        <div class="gallery_block">
            <p class="gallery_txt"><?= $image['photo'] ?></p>
            <?php
            echo '<a href="/product/specific?id=' . $image['id'] . '" target="_blank">
      <img width=300 src="data:' . $image['imageType'] . ';base64,' . base64_encode($image['imageData']) . '"/></a>';
            ?>
            <p class="gallery_txt"><?= "viewers: " . $image['viewers'] ?> </p>
        </div>
    <?php endforeach; ?>
</div>
