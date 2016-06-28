<?php 
include "sistema/config.inc.php";
include "sistema/funcoes.php";

$hash = md5(rand(1,100));
$msg = '<center><table border="0" cellspacing="0" cellpadding="0" width="603">
	<tbody>
	 	<tr>
	  		<td style="padding:0">
	  			<p>
	  				<span>
	  					<img width="603" height="69" src="'.BASE.'img/image001.jpg" alt="Logo Linksearch">
	  				</span>
	  			</p>
	  		</td>
	 	</tr>
	 	<tr>
	  		<td style="padding:0">
	  			<br>';
$msg .= 'Olá <b>'.$nome.'</b>.<br>
Você solicitou a recuperação de sua senha.<br>
Recupere a senha através desse <a href="' .BASE.'recuperar.php?id='.$hash.'" target="_blank">link</a>.
<br><br>
Abraços';
$msg .= '</td>
	 	</tr>
	 	<tr>
	 		<td>
	 			<p style="line-height:11.25pt">
	 				<b>
	 					<span style="font-size:10.0pt;font-family:Arial,sans-serif;color:#794E7C">Linkseach</span>
	 				</b>
	 				<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363"><br>
					  R. Álvaro Rodrigues, 152 - Conj. 72<br>
					  04582-000 - Brooklin - São Paulo – Brasil<br>
					  Phone&nbsp;<span>&nbsp;</span>+55 11 5096 2326<br>
					  Phone&nbsp;
					</span>
					<span>
						<span>&nbsp;</span>
					</span>
					<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">+55 11 5093 2551<br>
					</span>
					<span class="apple-converted-space">
						<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363"></span>
					</span>
					<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">
					Internet
					</span>
					<span class="apple-converted-space">
						<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">&nbsp;</span>
					</span>
					<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">
						<a href="http://www.linksearch.com.br/">
							<span style="color:#404040">www.linksearch.com.br</span>
						</a>
						<span class="apple-converted-space">&nbsp;</span>|<span class="apple-converted-space">&nbsp;</span>
					</span>
					<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:#636363">
						<a href="http://twitter.com/#!/_linksearch"><span style="color:#636363">Twitter</span></a>
						<span class="apple-converted-space">&nbsp;</span>|<span class="apple-converted-space">&nbsp;</span>
						<a href="http://www.facebook.com/agencialinksearch"><span style="color:#636363">Facebook</span></a>
					</span>
				</p>
			</td>
		</tr>
	</tbody>
</table>
</center>';

if(isset($_POST['recuperar'])):
    $user = $_POST['email'];
    $sql = "SELECT * FROM usuarios WHERE email='$user'";
    $result = DBExecute($sql); 
    $linha = mysqli_num_rows($result);
    if($linha == 1):
        $clientes = array('email' => $_POST['email'], 'hash' => $hash);
        $insere = DBInsere('recupera_senha', $clientes);
        if($insere){
            $user = $_POST['email'];
            $_POST['msg'] = $msg;
            $_POST['assunto'] = 'Recuperação de Senha';
            require 'envia-email.php';
        }
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
    <p class="login-box-msg">Digite o E-mail Cadastrado</p>
    <?php if($insere): 
    echo '
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
        Foi enviado um e-mail contendo informações de como proceder para recuperar a senha!<br>
      </div>';
    
    
    endif; ?>

    <form method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name='email'>
        <!--div class="form-group">
                  <div class="">
                    <label>Preview do e-mail</label>
                    <textarea class="form-control" rows="10" cols='10' placeholder="" name="msg"><?php echo $msg;?></textarea>
                  </div>
                </div>-->
        <input type="hidden" name="nome" value="nome"/>
        <input type="hidden" name="logo" value="logo"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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