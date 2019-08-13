<?php

/**
 * Configuration for database connection
 *
 */

$MYSQL_PORT = getenv('MYSQL_PORT', true) ?: getenv('MYSQL_PORT');
$HOSTPORT_ARRAY_0  = explode("//", getenv('MYSQL_PORT'));
$HOSTPORT_ARRAY_1  = explode(":", $HOSTPORT_ARRAY_0[1]);
$host       = $HOSTPORT_ARRAY_1[0];
$port       = $HOSTPORT_ARRAY_1[1];
$dbname     = "application";
$dbname     = getenv('MYSQL_DBNAME', true) ?: getenv("MYSQL_DBNAME");
$dsn        = "mysql:host=$host;port=$port;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
$username   = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
$password   = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
