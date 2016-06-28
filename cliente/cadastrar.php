<?php

if(isset($_SESSION['logado'])):
  $user = $_SESSION['userLogado'];
else:
  echo "<script>window.location = 'index.php?erro=1'</script>";
endif;


if(isset($_POST['cadastrar'])):

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);
  $ativo = ($_POST['ativo']) ? 1 : 0;
  $verifica = existeRegistro('clientes','WHERE nome="'.$nome.'"', 'nome');
  
  $logo = $_POST['logo'];
  
  echo $logo;
  
  if($verifica == 1):
    
  else:
    require_once "recebe_upload.php";
    $clientes = array(
    'idcliente' => 'CLI'.$_POST['idcliente'],
    'nome' => $_POST['nome'],
    'contato' => $_POST['contato'],
    'email' => $_POST['email'],
    'site' => $_POST['site'],
    'logo' => $_UP['pasta'] . $nome_final,
    'senha' => md5($_POST['senha']),
    'ativo' => ($_POST['ativo']=='on') ? '1' : '0'
    );
    $insere = DBInsere('clientes', $clientes);
  endif;
 
endif;// end cadastrar
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">Cadastrar Clientes</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <?php 
                  if($insere):
                    echo '
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
                        Dados inseridos com sucesso. <a href="cliente.php?p=listar">Exibir cadastros</a>
                      </div>';
                  endif;
                  if($verifica == 1):
                    echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                      Erro, Cliente já cadastrado.
                    </div>
                    ';
                  endif;
                  ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">ID do Cliente</label>
                  <input type="text" class="form-control" id="e" placeholder="Ex.: 0001" name="idcliente">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome da Empresa</label>
                  <input type="text" class="form-control" id="e" placeholder="Nome Completo" name="nome">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contato Principal</label>
                  <input type="text" class="form-control" id="e" placeholder="Nome do Contato Principal" name="contato">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="email" class="form-control" id="" placeholder="E-mail" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Site</label>
                  <input type="text" class="form-control" id="" placeholder="Site da Empresa" name="site">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Senha</label>
                  <input type="password" class="form-control" id="" placeholder="Senha" name="senha">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Logo</label>
                  <input type="file" id="exampleInputFile" name="logo">

                  <p class="help-block">Coloque aqui o logo da Empresa - Até 2MB</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="flat-red" name="ativo"> Ativo?
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
