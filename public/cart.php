<?php
require_once __DIR__ . '\..\config\main.php';
require_once ENGINE_DIR . "autoload.php";

session_start();
if (isset($_SESSION['user_name'])) {
    $userName = $_SESSION['user_name'];
} else {
    $userName ="Посетитель";
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    $cartInfo = $userName . ", корзина пуста";
} else {
    $cartInfo = $userName . ", Ваш заказ";
}

$cart = $_SESSION['cart']; //получим текущее состояние корзины из сессии
//Для вывода на экран добавим в массив Корзины  фото, взяв его из базы по id продукта:
foreach ($cart as $prod => $itm) {
    $image = getOriginalPhoto($itm['id']);
    $cart[$prod]['imageType'] = $image['imageType'];
    $cart[$prod]['imageData'] = $image['imageData'];
}
closeConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remove'])) { //Удалить один или несколько продуктов из массива(в сессии)
        foreach ($_POST['product_item'] as $product_line) {
            unset($_SESSION['cart'][$product_line]);
        }
    }
    if (isset($_POST['removeAll'])) { //Очистить корзину
        unset($_SESSION['cart']);
    }
    redirect('/cart.php');
}

//include VIEWS_DIR . "view_cart.php";
echo render('view_cart', ['cart' => $cart]);