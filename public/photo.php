<?php
require_once __DIR__ . '\..\config\main.php';
require_once ENGINE_DIR . 'crudBase.php';
require_once ENGINE_DIR . 'base.php';

$id = htmlspecialchars(strip_tags(get('id')));
incPhotoViewers($id);
$photo = getOriginalPhoto($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    addComment($id, htmlspecialchars(strip_tags(post('comment'))));
}

$listComments = getComments($id);
closeConnection();

include VIEWS_DIR . "view_product.php";


