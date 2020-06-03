<?php
require_once __DIR__ . '\..\config\main.php';
require ENGINE_DIR . "autoload.php";
session_start();

if (!$requestUri = preg_replace(['#^/#', "#[?].*#"], "", $_SERVER['REQUEST_URI'])) {
    $requestUri = 'product';
}

$parts = explode("/", $requestUri);
$page = $parts[0];
$action = $parts[1] ?? "index";

$scriptName = PAGES_DIR . $page . "/" . $action . ".php";

if (file_exists($scriptName)) {
    include $scriptName;
} else {
    echo render('view_404');
}