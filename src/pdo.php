<?php

$pdo = new PDO('mysql:host=localhost;dbname=ughostephan;charset=utf8', 'ughostephan', 'MK7vAEXCqhEmAUzt', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

return $pdo;
