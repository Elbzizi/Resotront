<?php
require_once("../config/config.php") ;
require_once("../lisb/App.php"); 
$app= new App();
// Vérifiez si la requête est une requête AJAX et si elle contient les données nécessaires
if(isset($_GET['find']) && isset($_GET['id'])) {
    // Effectuez ici toute logique de récupération des données en fonction de l'ID
    $id = $_GET['id'];
    
    // Par exemple, renvoyons simplement un tableau associatif avec l'ID et une valeur
    $data = $app->SelectOne("SELECT * from Contacte where id='$id'");
    
    // Convertissez le tableau associatif en JSON et renvoyez-le
    echo json_encode($data);
    exit; // Assurez-vous de sortir du script après l'envoi des données
}

?>
