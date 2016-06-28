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
        switch($pagina):
            case 'listar':
                include 'projetos/listar.php';
                break;
            case 'editar':
                include 'projetos/editar.php';
                break;
            case 'excluir':
                include 'projetos/excluir.php';
                break;
        endswitch;
        else:
            include 'projetos/cadastrar.php';
        endif;
    ?>


 <?php include('footer.php') ?>