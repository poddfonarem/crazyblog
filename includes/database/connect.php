<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=crazyblog', 'root', '-_xYuooBSoHIA0w1',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => true,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]);

} catch (PDOException $e) {
    $_SESSION['error'] = $e->getMessage();
}