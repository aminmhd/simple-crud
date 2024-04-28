<?php 

include "init.php";
include "helpers.php";


if($_GET["action"] == "create"){
    $func->create($_POST);
    return redirect();
  }

if($_GET["action"] == "edit"){
   return redirect("?action=update&user_id={$_GET["user_id"]}");
  }
if($_GET["action"] == "update"){
    $user_id = $_GET["user_id"];
    $_POST["user_id"] = $user_id;
    $func->update($_POST);
    return redirect();
}
if ($_GET["action"] == "delete"){
   var_dump("delete");
   
  }

if($_GET["action"] == "delete"){
    $func->delete($_GET["user_id"]);
    return redirect();
}
