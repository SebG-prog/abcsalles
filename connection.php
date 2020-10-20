<?php

if (getenv('ENV') === 'prod') {
    define('DSN', 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').';charset=utf8');
    define('USER', getenv('DB_USER'));
    define('PASS', getenv('DB_PASSWORD'));
} else {
    require('db_credentials.php');
}

try {
    $db = new PDO(DSN, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}