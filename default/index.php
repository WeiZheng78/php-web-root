<?php

switch ($_GET['action'] ?? '') {
    case 'mysql':    
        $MYSQL_PORT = getenv('MYSQL_PORT', true) ?: getenv('MYSQL_PORT');
        $HOSTPORT_ARRAY_0  = explode("//", getenv('MYSQL_PORT'));
        $HOSTPORT_ARRAY_1  = explode(":", $HOSTPORT_ARRAY_0[1]);
        $host       = $HOSTPORT_ARRAY_1[0];
        $port       = $HOSTPORT_ARRAY_1[1];
        $dbname     = getenv('MYSQL_DBNAME', true) ?: getenv("MYSQL_DBNAME");
        $dsn        = "mysql:host=$host;port=$port;dbname=$dbname";
        $options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
        $username   = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
        $password   = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
        $pdo = new PDO($dsn, $username, $password);
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
            <li><a href="?action=phpinfo">phpinfo()</a></li>
        </ul>
    </body>
</html>
