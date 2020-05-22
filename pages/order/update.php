<?php
if (!isset($_SESSION['user_id'])) {
    redirect('/auth/login');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderIds = post('order_item');

    if (isset($_POST['pay'])) {
        setOrderStatus($orderIds, ORDER_PAYED); //Оплачен заказ
    }
    if (isset($_POST['cancel'])) {
        setOrderStatus($orderIds, ORDER_CANCEL); //отмена заказа
    }
    if (isset($_POST['close'])) {
        setOrderStatus($orderIds, ORDER_CLOSED); //закрыть заказ как законченный
    }
    if (isset($_POST['delivery'])) {
        setOrderStatus($orderIds, ORDER_DELIVERED); //заказ доставлен
    }
    if (isAdmin()) {
        closeConnection();
        redirect('/order/manage');
    } else {
        closeConnection();
        redirect('/order');
    }
}