<?php

$listPhotos = getGallery(); //получим список фото из базы в том числе и непосредственно фото из базы
closeConnection();

echo render("view_gallery", ['listPhotos' => $listPhotos]);


