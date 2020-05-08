<?php
require_once __DIR__ . '\..\config\main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'funcImgResize.php';

$menu = [
    "Главная",
    "Каталог",
    "Корзина",
];

echo renderMenu($menu);
$errorMsg = "";

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
            move_uploaded_file(
                $_FILES['my_file']['tmp_name'],
                UPLOADS_DIR . $_FILES['my_file']['name']
            );

            img_resize(UPLOADS_DIR . $_FILES['my_file']['name'],
                THUMBNAILS_DIR . $_FILES['my_file']['name'],
                THUMBNAILS_WIDTH,
                THUMBNAILS_HEIGHT);

            $resultMsg = "Успешно загружено!";
        }
    }
}

$form_title = "Загрузка файлов";
include VIEWS_DIR . "upload_form.php";

// Первый параметр это папка с эскизами, второй параметр папка с исходными изображениями.
echo renderGallery("thumbnails", "img");
//echo renderGallery("img"); //тут можно подсунуть папку с большими картинками и будет работать



