<?php
require "config/config.php";
require("lisb/App.php");
require "includes/header.php";

if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href='" . APPURL . "'</script>";
    exit;
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "<script>window.location.href='" . APPURL . "/Auth/login.php'</script>";
}
if (isset($_POST['submit'])) {
    if (
        empty($_POST['name']) || empty($_POST['num_people']) ||
        empty($_POST['email']) || empty($_POST['date']) || empty($_POST['Special_Request'])
    ) {
        echo "<script>alert('Tout les chomps est obligatoire !!')</script>";
        echo "<script>window.location.href='" . APPURL . "</script>";
    } else {
        $name = $_POST['name'];
        $num_people = $_POST['num_people'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $Special_Request = $_POST['Special_Request'];
        $status = 'pending';
    }
    if ($date > date("m/d/Y h:i:sa")) {
        $query = "INSERT INTO bookings values (default,?,?,?,?,?,?,?,default)";
        $arry = [$name, $email, $date, $num_people, $Special_Request, $status, $user_id];
        $path = "index.php";
        $message="booking successful";
        $app->Insert($query, $arry, $path, $message);
    } else {
        echo "<script>alert('date invalide choisissez une date à partir de demain')</script>";
        echo "<script>window.location.href='" . APPURL . "/404.php'</script>";
    }

}

require "includes/footer.php";
?>