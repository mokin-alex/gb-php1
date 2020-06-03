<?php
function getConnection()
{
    $dbConfig = include_once CONFIG_DIR . "db.php";
    static $conn = null;
    if (is_null($conn)) {
        $conn = mysqli_connect(
            $dbConfig['host'],
            $dbConfig['login'],
            $dbConfig['password'],
            $dbConfig['db_name']
        );
    }
    return $conn;
}

function execute(string $sql)
{
    return mysqli_query(getConnection(), $sql);
}

function queryAll($sql)
{
    return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);
}

function queryOne($sql)
{
    if (is_null(queryAll($sql)[0])) {
        return false;
    } else {
        return queryAll($sql)[0];
    }
}

function closeConnection()
{
    return mysqli_close(getConnection());
}

function getLastId()
{
    return mysqli_insert_id(getConnection());
}