<?php
// Verifica se existe o arquivo de Configuração
if (!file_exists('sistema/config.inc.php')) {
    echo "Clique <a href='./install/' title='Iniciar instalacao'>aqui</a> para iniciar a instalacao do sistema.";
    exit;
}
// Verifica se existe a pasta de Instalação
if (file_exists('install/')) {
    echo "Por favor, delete a pasta install.";
    exit;
}
/*Inicia a sessão*/
session_start();
/* Verifica se ja existe uma sessao aberta*/
if(isset($_SESSION['logado'])){ //Sim
    $_SESSION['userLogado'];
    echo "<script>window.location = 'painel.php'</script>";
}

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
<body class="hold-transition login-page skin-blue">
<div class="login-box">
  <div class="login-logo">
     <a href="<?php echo BASE;?>" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Free</b>La</span>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Faça Login para iniciar a sessão</p>

    <form action="teste.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name='email'>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Senha" name='senha'>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!--div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
        
      </div>
      <div class="row">
        <div class="col-xs-12">
          <a href="esqueci.php">Esqueci minha senha</a><br>
        </div>
      </div>
    </form>

    <!--div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->
	<!--
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>
	-->
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