<?php 
include "sistema/config.inc.php";
include "sistema/funcoes.php";

$hash = $_GET['id'];
if(!isset($hash)): echo 'Acesso não altorizado'; exit; endif;
$seleciona = DBSelectS('recupera_senha','WHERE hash = "'.$hash.'"', '*');
$retornoHash = $seleciona['0']['hash'];

if($hash != $retornoHash ): echo 'Acesso não altorizado'; exit; endif;

$email = $seleciona['0']['email'];
$id = $seleciona['0']['id'];
$seleciona2 = DBSelectS('usuarios','WHERE email = "'.$email.'"', '*');
//print_r($retornoHash);
if(isset($_POST['recuperar'])):
        $senha = md5($_POST['senha']);
        $clientes = array('senha' =>  $senha);
        $insere = DBUpDate('usuarios', $clientes, 'WHERE email = "'.$email.'"');
        if($insere):
            $clientes = $id;
            $del = DBDelete('recupera_senha', $clientes);
        endif;    
endif;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel Relatorios | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page skin-purple">
<div class="login-box">
  <div class="login-logo">
    <img src="http://www.linksearch.com.br/wp-content/uploads/2014/09/logo.png" />
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Digite a Nova Senha!</p>
    <?php if($insere): 
    echo '
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
        Senha alterada com sucesso.!<br>
      </div>';
    
    
    endif; ?>

    <form method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Nova Senha" name='senha'>
        <input type="hidden" name="nome" value="nome"/>
        <input type="hidden" name="logo" value="logo"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="recuperar" value="Recuperar">
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>