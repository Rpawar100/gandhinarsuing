<?php

$dbhost   = 'localhost';
$dbuser   = 'aqdsoft_hmis';
$dbpass   = 'Hmis@123456';

$pdo = new PDO('mysql:dbname='.'aqdsoft_hmis', $dbuser, $dbpass,[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"]);


