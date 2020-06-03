<?php

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

echo render('view_product', ['photo' =>$photo, 'listComments' => $listComments]);

