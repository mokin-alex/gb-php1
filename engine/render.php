<?php
function renderMenu(array $menu): string
{
    $result = "<ul>";
    foreach ($menu as $item) {
        $result .= "<li><a href='#'>{$item}</a></li>";
    }
    $result .= "</ul>";
    return $result;
}

/**
 * @param $imgDir   - папка с эскизами
 * @param $fullImgDir - папка с полными исходными изображениями.
 * @return string     - сгенерированный блок div с картинками
 */
function renderGallery($imgDir, $fullImgDir)
{
    $imgDir .= "/";
    $absoluteImgDir = SITE_DIR . $imgDir;
    $thumbnails = scandir($absoluteImgDir);
    $result = "<div class='thumbnails'>";
    foreach ($thumbnails as $item) {
        if (is_file($absoluteImgDir . $item)) {
            $imgURL = $imgDir . $item;
            $fullImgURL = $fullImgDir . "/" . $item;
            $result .= "<a href='$fullImgURL' target='_blank'><img src='$imgURL' class='thumbnails_img'></img></a>";
        }
    }
    $result .= "</div>";
    return $result;
}