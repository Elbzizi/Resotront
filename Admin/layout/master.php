<?php 
 $title="Admin | Dashboard";
 $contante="Admin panel";
include_once("header.php") ;

?>
  <!-- Main Sidebar Container -->
 <?php require_once('sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <?= $contante ; ?>
  <?php include_once('footer.php') ?>