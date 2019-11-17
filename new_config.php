<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'appandroid');
define('DB_PASSWORD', 'pass');
define('DB_NAME', 'appandroid');
 
/* Attempt to connect to MySQL database */
$dsn = 'mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME;
$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
