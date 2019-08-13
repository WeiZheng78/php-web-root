<?php

/**
 * Configuration for database connection
 *
 */

$host       = getenv('MYSQL_HOST');
$username   = getenv('MYSQL_USER');
$password   = getenv('MYSQL_PASSWORD');
$dbname     = getenv('MYSQL_DBNAME');
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
