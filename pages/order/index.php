<?php
if (!isset($_SESSION['user_id'])) {
    redirect('/auth/login');
}

$orders = getOrders((int)session_get('user_id'));
echo render('view_orders', ['orders' => $orders]);