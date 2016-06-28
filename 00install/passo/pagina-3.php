<?php
include 'header.php';
if(isset($_POST['cadastrar'])):

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);

  $clientes = array(
    'nome' => $_POST['nome'],
    'email' => $_POST['email'],
    'senha' => md5($_POST['senha']),
    'ativo' => 's',
    'administrador' => 's'
    );

  $insere = DBInsere('usuarios', $clientes);
  if($insere):
     header('Location: ./?passo=4');
  endif;
 endif;
?>

<body class="hold-transition login-page skin-purple">
<div class="login-box">
  <div class="login-logo">
    <img src="http://www.linksearch.com.br/wp-content/uploads/2014/09/logo.png" />
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Preencha os dados sobre o acesso do Administrador</p>
        <form role="form" method="post">
              
              <div class="box-body">
                <div class="form-group">
                  <?php 
                  if($insere):
                    echo '
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
                        Dados inseridos com sucesso. <a href="cliente-listar.php">Exibir cadastros</a>
                      </div>';
                  /*else:
                    echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                      Erro, revise os dados e veja se não colocou algum campo invalido.
                    </div>
                    ';*/
                  endif
                  ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" class="form-control" id="e" placeholder="Nome Completo" name="nome" value="<?php echo $seleciona['0']['nome']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="email" class="form-control" id="" placeholder="E-mail" name="email" value="<?php echo $seleciona['0']['email']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Senha</label>
                  <input type="password" class="form-control" id="" placeholder="Senha" name="senha" value="<?php echo $seleciona['0']['senha']?>">
                </div>
              </div>
               
              
              <!-- /.box-body -->
              

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="cadastrar">Enviar</button>
              </div>
              <input type="hidden" name="pasta" value="img/"/>
        </form>
    </div>
</div>
    </body>
</html>