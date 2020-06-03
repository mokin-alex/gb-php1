<?php
include_once ENGINE_DIR . "db.php";

function addPhoto(string $photo, string $imageType, $imageData, string $author, string $description, $price)
{
    $sql = "INSERT INTO gallery(photo, imageType ,imageData, author,description, price)
	                VALUES('{$photo}', 
	                       '{$imageType}',
	                       '{$imageData}',
	                       '{$author}',
	                       '{$description}',
	                       '{$price}')";
    return execute($sql);
}

function delPhoto(int $id)
{
    $sql = "DELETE FROM gallery WHERE id = {$id}";
    return execute($sql);
}

function getGallery(): array
{
    $sql = "SELECT * FROM gallery ORDER BY viewers DESC;";
    //return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);
    return queryAll($sql);
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

function addOrder(int $user_id)
{
    $sql = "INSERT INTO `order` (user_id)  VALUES ('{$user_id}')";
    return execute($sql);
}

function addProductToOrder(int $orderId, int $productId, int $quantity)
{
    $sql = "INSERT INTO `order_product` (order_id, product_id, quantity)  
                                 VALUES ('{$orderId}', 
                                         '{$productId}',
                                         '{$quantity}')";
    return execute($sql);

}

function getOrders(int $userId)
{
    $sql = "SELECT `order`.id, `order`.date, `order_status`.status, count(order_product.product_id) as  product_quantity, sum(order_product.quantity) as copies, sum(gallery.price * order_product.quantity) as summa
FROM `order`,
     `order_product`,
     `gallery`,
     `order_status`
WHERE order_product.order_id = `order`.id
  and order_product.product_id = gallery.id
  and order_status.id=`order`.status
  and `order`.user_id = '{$userId}'
group by `order`.id;";
    return queryAll($sql);
}

function getOrdersAllUsers()
{
    $sql = "SELECT `order`.user_id, `order`.id, `order`.date, `order_status`.status, count(order_product.product_id) as  product_quantity, sum(order_product.quantity) as copies, sum(gallery.price * order_product.quantity) as summa
FROM `order`,
     `order_product`,
     `gallery`,
     `order_status`
WHERE order_product.order_id = `order`.id
  and order_product.product_id = gallery.id
  and order_status.id=`order`.status 
group by `order`.user_id, `order`.id, `order`.date
ORDER BY `order`.date DESC";
    return queryAll($sql);
}

function setOrderStatus(array $orderIds, int $status)
{
    $in = implode(", ", $orderIds);
    $sql = "UPDATE `order` SET status ='{$status}' WHERE id IN ({$in})";
    return execute($sql);
}