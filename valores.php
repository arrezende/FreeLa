<?php 
include "sistema/config.inc.php";
include "sistema/funcoes.php";
session_start();
verificaLogin();

?>
  <?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('sidebar.php'); ?>

    <?php if($_GET['p']):
        $pagina = $_GET['p'];
        
        include 'valores/'.$pagina.'.php';
        
        else:
            include 'valores/cadastrar.php';
        endif;
    ?>


 <?php include('footer.php') ?>