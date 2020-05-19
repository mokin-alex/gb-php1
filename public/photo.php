<?php
require_once __DIR__ . '\..\config\main.php';
require_once ENGINE_DIR . 'crudBase.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'cart.php';

$id = get('id');
incPhotoViewers($id);
$photo = getOriginalPhoto($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ((strlen(post('addComment')) >0) && strlen(post('comment'))>3) {
           addComment($id, post('comment'));
        }
        if ((strlen(post('buy')) >0) && post('quantity')>0) {
            addToCart(['id' =>$id, 'quantity' =>post('quantity')]);
        }
}

$listComments = getComments($id);
closeConnection();
include VIEWS_DIR . "view_product.php";


