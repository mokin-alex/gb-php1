<?php
require_once __DIR__ . '\..\config\main.php';
require_once ENGINE_DIR . 'crudBase.php';

$id = $_GET['id'];
incPhotoViewers($id);
$photo = getOriginalPhoto($id);
//$id = $_GET['id'];
//var_dump($id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $photo['photo'] ?></title>
</head>
<body>
<p>просмотров: <?= $photo['viewers'] ?></p>
<img src="<?= $photo['original'] ?>" alt="">
</body>
</html>


