<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remove'])) { //Удалить один или несколько продуктов из массива(в сессии)
        foreach ($_POST['product_item'] as $product_line) {
            unset($_SESSION['cart'][$product_line]);
        }
    }
    if (isset($_POST['removeAll'])) { //Очистить корзину
        unset($_SESSION['cart']);
    }
    redirect('/cart');
}