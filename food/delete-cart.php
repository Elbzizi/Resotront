<?php
require("../config/config.php");
require("../lisb/App.php");
require("../includes/header.php");
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    echo "<script>window.location.href='".APPURL."'</script>";
    exit;
}
$app=new App;
$app->Delete("DELETE from cart where user_id= $_SESSION[user_id]",APPURL);
?>