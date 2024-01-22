<?php
require "config/config.php";
require("lisb/App.php");
require "includes/header.php";

if(!isset($_SERVER['HTTP_REFERER'])){
    echo "<script>window.location.href='".APPURL."'</script>";
    exit;
}

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    echo "<script>window.location.href='".APPURL."/Auth/login.php'</script>";
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $num_people = $_POST['num_people'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $Special_Request = $_POST['Special_Request'];
    $status = 'pending';
    if ($date > date("m/d/Y h:i:sa")) {
        $query = "INSERT INTO bookings values (default,?,?,?,?,?,?,?,default)";
        $arry = [$name, $email, $date, $num_people, $Special_Request, $status, $user_id];
        $path = "index.php";
        $app->Insert($query, $arry, $path);
    } else {
        echo "<script>alert('date invalide choisissez une date à partir de demain')</script>";
        echo "<script>window.location.href='" . APPURL . "/404.php'</script>";
    }

}

require "includes/footer.php";
?>