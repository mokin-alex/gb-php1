<?php
require_once __DIR__ . '\..\config\main.php';
//уже не используем: require_once ENGINE_DIR . 'render.php';
require_once VENDOR_DIR . 'funcImgResize.php';
require_once ENGINE_DIR . 'funcRedirect.php';
require_once ENGINE_DIR . 'crudBase.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['my_file'])) {
        if (!file_exists(UPLOADS_DIR)) {
            mkdir(UPLOADS_DIR);
        }
        if (!file_exists(THUMBNAILS_DIR)) {
            mkdir(THUMBNAILS_DIR);
        }

        $pos = strpos($_FILES['my_file']['type'], 'image');
        if ($pos !== 0) {
            $resultMsg = "Ошибка. Загружать можно только изображения";
        } elseif ($_FILES['my_file']['size'] > MAX_IMAGE_SIZE) {
            $resultMsg = "Ошибка. Слишком большой файл для загрузки";
        } else {
            $photo = $_FILES['my_file']['name'];

            move_uploaded_file(
                $_FILES['my_file']['tmp_name'],
                UPLOADS_DIR . $photo
            );

            img_resize(UPLOADS_DIR . $photo,
                THUMBNAILS_DIR . $photo,
                THUMBNAILS_WIDTH,
                THUMBNAILS_HEIGHT);

            //запишем нужные данные в базу:
            addPhoto($photo,
                "thumbnails/" . $photo,
                "img/" . $photo);

            $resultMsg = "Успешно загружено!";
        }
    }
    redirect('/');
}
$listPhotos = getGallery(); //получим список фото из базы

include VIEWS_DIR . "views_head.php";
include VIEWS_DIR . "upload_form.php";
include VIEWS_DIR . "views_gallery.php";



