<?php
if (!isset($_SESSION['user_id'])) {
    redirect('/auth/login');
}

if (isAdmin()) {
    $orders = getOrdersAllUsers();
    closeConnection();
    echo render('view_orders_adm', ['orders' => $orders]);
} else {
    closeConnection();
    redirect('/auth/login');
}

