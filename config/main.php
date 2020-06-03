<?php
define("DOCUMENT_ROOT", __DIR__ . "/../");
define("CONFIG_DIR", DOCUMENT_ROOT . "config/");
define("ENGINE_DIR", DOCUMENT_ROOT . "engine/");
define("VIEWS_DIR", DOCUMENT_ROOT . "views/");
define("VENDOR_DIR", DOCUMENT_ROOT . "vendor/");
define("SITE_DIR", DOCUMENT_ROOT . "public/");
define("PAGES_DIR", DOCUMENT_ROOT . "pages/");
define("UPLOADS_DIR", SITE_DIR . "img/");
define("THUMBNAILS_DIR", SITE_DIR . "thumbnails/");
define("THUMBNAILS_WIDTH", 200);
define("THUMBNAILS_HEIGHT", 150);
define("MAX_IMAGE_SIZE", 1500000);
define("ORDER_PAYED", 1);
define("ORDER_DELIVERED", 2);
define("ORDER_CLOSED", 3);
define("ORDER_CANCEL", 9);