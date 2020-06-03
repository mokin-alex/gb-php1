<?php
if (!isset($_SESSION['user_id'])) {
    redirect('/auth/login');
}

if (isAdmin()) {
    echo render('view_manage');
} else {
    redirect('/auth/login');
}