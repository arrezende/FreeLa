<?php 
include "sistema/config.inc.php";
include "sistema/funcoes.php";
session_start();
verificaLogin();
$id = $_GET['id'];
$seleciona = DBSelectS('usuarios','WHERE id = "'.$id.'"', '*');
/*echo '<pre>';
print_r($seleciona['0']);
echo '</pre>';*/

if(isset($_POST['cadastrar'])):

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $logo = $_POST['logo'];
  $senha = md5($_POST['senha']);
  $ativo = ($_POST['ativo']=='on') ? 1 : 0;
  $arquivo = $_POST['logo'];
  require_once 'recebe_upload.php';
  
  $clientes = array(
    'nome' => $_POST['nome'],
    'email' => $_POST['email'],
    'foto' =>  $_UP['pasta'] . $nome_final,
    'senha' => $_POST['senha']
    );

  $insere = DBUpDate('usuarios', $clientes,'WHERE id = "'.$id.'"');
 
    if($insere):
      
      //echo "<script>window.location = 'cliente-editar.php?id=".$id."'</script>";
      
    else:
      echo "Houve um erro, tente novamente!";
    endif;
endif;// end cadastrar

?>
  <?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="box box-purple">
            <div class="box-header with-border">
              <h1 class="box-title">Editar Perfil</h1>
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
                <div class="form-group">
                  <label for="exampleInputFile">Foto</label>
                  <input type="file" id="exampleInputFile" name="logo">
                  <p class="help-block">Coloque aqui uma imagem para seu perfil</p>
                  <img src="<?php echo $seleciona['0']['foto']?>" width='150' />
                  
                </div>
                <label for="exampleInputFile">Ativo?</label>
                <div class="onoffswitch">
                  <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" <?php echo ($seleciona['0']['ativo'] == 1)? 'checked="checked"' : '';?>>
                  <label class="onoffswitch-label" for="myonoffswitch">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                  </label>
              </div>
               
              </div>
              <!-- /.box-body -->
              

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
              </div>
              <input type="hidden" name="pasta" value="img/"/>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include('footer.php') ?>
