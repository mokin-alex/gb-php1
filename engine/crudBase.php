<?php
function addPhoto(string $photo, string $smallpic, string $original)
{
    $connect = mysqli_connect(BASE_HOST, BASE_USER, BASE_PASSWORD, BASE_SCHEMA);
    $sql = "INSERT INTO gallery (photo, smallpic, original)  VALUES ('{$photo}', '{$smallpic}', '{$original}')";
    if (!$res = mysqli_query($connect, $sql)) {
        var_dump(mysqli_error($connect));
    }
    mysqli_close($connect);
}

function getGallery(): array
{
    $connect = mysqli_connect(BASE_HOST, BASE_USER, BASE_PASSWORD, BASE_SCHEMA);
    $sql = "SELECT * FROM gallery ORDER BY viewers DESC;";
    if (!$res = mysqli_query($connect, $sql)) {
        var_dump(mysqli_error($connect));
    }
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function incPhotoViewers(int $id)
{
    $connect = mysqli_connect(BASE_HOST, BASE_USER, BASE_PASSWORD, BASE_SCHEMA);

    if ($id = (int)mysqli_real_escape_string($connect, $id)) {
        $sql = "UPDATE gallery SET viewers = viewers +1 WHERE id = {$id}";

        if (!$res = mysqli_query($connect, $sql)) {
            var_dump(mysqli_error($connect));
        }
    }
    mysqli_close($connect);
}

function getOriginalPhoto(int $id):array
{
    $data=[];
    $connect = mysqli_connect(BASE_HOST, BASE_USER, BASE_PASSWORD, BASE_SCHEMA);
    if ($id = (int)mysqli_real_escape_string($connect, $id)) {
        $sql = "SELECT photo, original, viewers FROM gallery WHERE id = {$id}";

        if (!$res = mysqli_query($connect, $sql)) {
            var_dump(mysqli_error($connect));
        }
    $data = mysqli_fetch_assoc($res);
    }
    mysqli_close($connect);
    return $data;
}