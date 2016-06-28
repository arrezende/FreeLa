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
        $relatorio = $_GET['r'];
        
        include $relatorio.'/'.$pagina.'.php';
        
        else:
            include 'relatorio/cadastrar.php';
        endif;
    ?>


 <?php include('footer.php') ?>