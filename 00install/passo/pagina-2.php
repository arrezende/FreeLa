<?php
include 'header.php';
if(isset($_POST['enviar'])):
    // "SHOW TABLES LIKE '$table'"
    $sql = 'SHOW TABLES LIKE "usuarios"';
    //$sql = "SELECT * FROM usuarios WHERE email='$user' AND senha='$senha'";
    $mysqli = DBConnect();
    $res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli)); 
    $linha = mysqli_num_rows($res);
    //echo $linha;
    
    if($linha != 0): //Redireciona para próxima etapa, se for o caso.
        header('Location: ./?passo=3');
    endif;
endif;
?>
<body class="hold-transition login-page skin-purple">
<div class="login-box">
  <div class="login-logo">
    <img src="http://www.linksearch.com.br/wp-content/uploads/2014/09/logo.png" />
  </div>
  <div class="login-box-body">
        <p class="login-box-msg">Faça o upload <a href="banco.sql">desse arquivo</a> para seu banco de dados e depois teste</p>
        <p><?php 
        if(isset($_POST['enviar'])):
            if($linha == 0): 
                echo '
                          <div class="alert alert-error alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Atenção!</h4>
                            Opa, parece que você não subiu o arquivo. Verifique por favor!
                          </div>';
            endif;
        endif;
        ?></p>
        
        <form action="" method="post">
            <input type="submit" class="btn btn-primary btn-block btn-flat" name="enviar" value="Testar"/>
        </form>
    </div>
</div>
    </body>
</html>