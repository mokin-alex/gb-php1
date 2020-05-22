<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['my_file'])) {

        $pos = strpos($_FILES['my_file']['type'], 'image');
        if ($pos !== 0) {
            $resultMsg = "Ошибка. Загружать можно только изображения";
        } elseif ($_FILES['my_file']['size'] > MAX_IMAGE_SIZE) {
            $resultMsg = "Ошибка. Слишком большой файл для загрузки";
        } else {

            $photo = $_FILES['my_file']['name'];
            //данные из формы:
            $author = post('author');
            $description = post('description');
            $price = post('price');
            //получаем данные файла для записи его в БД:
            $imageData = addslashes(file_get_contents($_FILES['my_file']['tmp_name']));
            $imageProperties = getimageSize($_FILES['my_file']['tmp_name']);

            //запишем нужные данные в базу:
            addPhoto($photo,
                $imageProperties['mime'],
                $imageData,
                $author,
                $description,
                $price);

            $resultMsg = "Успешно загружено!";
        }
    }
    redirect('/product/add');
}
echo render('view_add_product', ['resultMsg' =>$resultMsg]);