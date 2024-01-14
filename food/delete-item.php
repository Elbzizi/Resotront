<?php
require "../config/config.php";
require "../lisb/App.php";
require "../includes/header.php";
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    echo "<script>window.location.href='" . APPURL . "'</script>";
    exit;
}
$app = new App;
if (isset($_GET['id'])) {
    $id_item = $_GET['id'];
    $query = "DELETE  from cart where id=$id_item and user_id= $_SESSION[user_id] ";
    $path = "cart.php";
    $app->Delete($query, $path);
} else {
    echo "<script>window.location.href='" . APPURL . "/404.php'</script>";
}
?>