<?php

switch ($_GET['action'] ?? '') {
    case 'mysql':
        $dsn = 'mysql:host=' . getenv('MYSQL_HOST') .
            ';port=' . getenv('MYSQL_PORT') .
            ';dbname=' . getenv('MYSQL_DBNAME');
        $pdo = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
        echo $pdo ? 'success' : 'fail';
        exit;

    case 'redis':
        $redis = new Redis();
        $success = $redis->connect(getenv('REDIS_HOST'), getenv('REDIS_PORT'));
        echo $success ? 'success' : 'fail';
        exit;

    case 'phpinfo':
        phpinfo();
        exit;
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>
        <style>
            a { text-decoration: none; color: blue; }
        </style>
    </head>
    <body>
        <h1>Congratulations!</h1>
        <ul>
            <li><a href="?action=mysql">check MySQL</a></li>
            <li><a href="?action=redis">check Redis</a></li>
            <li><a href="?action=phpinfo">phpinfo()</a></li>
        </ul>
    </body>
</html>
