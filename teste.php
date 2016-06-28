<?php 
include "sistema/config.inc.php";
include "sistema/funcoes.php";


$user = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuarios WHERE email='$user' AND senha='$senha'";
$result = DBExecute($sql); 
$linha = mysqli_num_rows($result);
//echo $linha;
switch ($linha) {
    case 0:
        $sql = "SELECT * FROM clientes WHERE email='$user' AND senha='$senha'";
        $res = DBExecute($sql);
        $linhaCliente = mysqli_num_rows($res);
        if($linhaCliente > 0){
            session_start();
            $_SESSION['userLogado'] = $user;
            $_SESSION['logado'] = TRUE;
            $_SESSION['cliente'] = TRUE;
            
            //print_r($res);
            echo "<script>window.location = 'passoapasso.php'</script>";
        }else{
            echo "<script>window.location = 'index.php'</script>";
        }
        break;
    case 1:
        session_start();
        $_SESSION['userLogado'] = $user;
        $_SESSION['logado'] = TRUE;
        echo "<script>window.location = 'painel.php'</script>";
        break;
}

