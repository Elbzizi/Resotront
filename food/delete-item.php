<?php
require "../config/config.php";
require "../lisb/App.php";
require "../includes/header.php";
$app = new App;
if(isset($_GET['id'])){
$id_item=$_GET['id'];
$query="DELETE  from cart where id=$id_item and user_id= $_SESSION[user_id] ";
$path="cart.php";
$app->Delete($query,$path);
}
?>