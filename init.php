<?php 

include "config.php";
include "db.php";
$db = new DB($database->host, $database->username, $database->password, $database->db_name);
include "function.php";
$func = new Func($db);
$users = $func->index();
