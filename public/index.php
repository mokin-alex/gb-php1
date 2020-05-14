<?php
require_once __DIR__ . '\..\config\main.php';
require_once ENGINE_DIR . 'crudBase.php';
require_once ENGINE_DIR . 'base.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['my_file'])) {

        $pos = strpos($_FILES['my_file']['type'], 'image');
        if ($pos !== 0) {
            $resultMsg = "Ошибка. Загружать можно только изображения";
        } elseif ($_FILES['my_file']['size'] > MAX_IMAGE_SIZE) {
            $resultMsg = "Ошибка. Слишком большой файл для загрузки";
        } else {
            $photo = $_FILES['my_file']['name'];
            $author = htmlspecialchars(strip_tags(post('author')));
            $description = htmlspecialchars(strip_tags(post('description')));
            $imageData = addslashes(file_get_contents($_FILES['my_file']['tmp_name']));
            $imageProperties = getimageSize($_FILES['my_file']['tmp_name']);

            //запишем нужные данные в базу:
            addPhoto($photo,
                $imageProperties['mime'],
                $imageData,
                $author,
                $description);

            //$resultMsg = "Успешно загружено!";
        }
    }
    redirect('/index.php');
}
$listPhotos = getGallery(); //получим список фото из базы в том числе и непосредственно фото из базы
closeConnection();

include VIEWS_DIR . "view_head.php";
include VIEWS_DIR . "upload_form.php";
include VIEWS_DIR . "view_gallery.php";



