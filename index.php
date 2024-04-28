<?php 

include "init.php";

if (isset($_GET["action"]) && $_GET["action"] == "update"){
    $result = $func->edit($_GET["user_id"]);
    $update = $result;
}else{
    $update = null;
}

include "public/tpl.php";
