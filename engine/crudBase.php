<?php
include_once ENGINE_DIR . "db.php";

function addPhoto(string $photo, string $imageType, $imageData, string $author, string $description)
{
    $sql = "INSERT INTO gallery(photo, imageType ,imageData, author,description)
	                VALUES('{$photo}', 
	                       '{$imageType}',
	                       '{$imageData}',
	                       '{$author}',
	                       '{$description}')";
    return execute($sql);
}

function getGallery(): array
{
    $sql = "SELECT * FROM gallery ORDER BY viewers DESC;";
    return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);
}

function incPhotoViewers(int $id)
{
    $sql = "UPDATE gallery SET viewers = viewers +1 WHERE id = {$id}";
    return execute($sql);
}

function getOriginalPhoto(int $id): array
{
    $sql = "SELECT * FROM gallery WHERE id = {$id}";
    return queryOne($sql);
}

function getComments(int $id): array
{
    $sql = "SELECT text FROM comments WHERE gallery_id = {$id}";
    return queryAll($sql);
}

function addComment(int $id, string $text)
{
    $sql = "INSERT INTO comments (gallery_id, text)  VALUES ('{$id}', '{$text}')";
    return execute($sql);
}