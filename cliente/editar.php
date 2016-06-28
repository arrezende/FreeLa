<?php 
verificaLogin();

$id = $_GET['id'];

//$seleciona = DBSelectS('clientes','WHERE id = "$id"', '*');
$seleciona = DBSelectS('clientes','WHERE id = "'.$id.'"', '*');
/*echo '<pre>';
print_r($seleciona['0']);
echo '</pre>';*/

if(isset($_POST['cadastrar'])):

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $logo = $_POST['logo'];
  $senha = md5($_POST['senha']);
  $ativo = ($_POST['ativo']=='on') ? 's' : 'n';

  require_once 'recebe_upload.php';
  //echo 'erroooo'.$_FILES['logo']['error'];
  $clientes = array(
    'idcliente' =>  $_POST['idcliente'],
    'nome' =>  $_POST['nome'],
    'contato' =>  $_POST['contato'],
    'email' => $_POST['email'],
    'site' => $_POST['site'],
    'logo' =>  $_UP['pasta'] . $nome_final,
    'senha' => $_POST['senha'],
    'ativo' => ($_POST['ativo']=='on') ? '1' : '0'
    );
    
  $insere = DBUpDate('clientes', $clientes,'WHERE id = "'.$id.'"');
    if($insere):
      
      echo "<script>window.location = 'cliente.php?p=editar&id=".$id."&s=sucesso'</script>";
      
    else:
      echo "Houve um erro, tente novamente!";
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
              <h1 class="box-title">Editar Clientes</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" >
              
              <div class="box-body">
                <div class="form-group">
                  <?php 
                  if($_GET['e']):
                    $status = $_GET['e'];
                    switch($status):
                      case 'extensoes':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        Erro no formato do arquivo. Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif
                      </div>';
                      break;
                      case 'tamanho':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O arquivo enviado é muito grande, envie arquivos de até 2Mb.
                      </div>';
                      break;
                      case 'error1':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O arquivo no upload é maior do que o limite do PHP.
                      </div>';
                      break;
                      case 'error2':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O arquivo ultrapassa o limite de tamanho especifiado no HTML.
                      </div>';
                      break;
                      case 'error3':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O upload do arquivo foi feito parcialmente.
                      </div>';
                      break;
                      case 'error4':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        Não foi feito o upload do arquivo.
                      </div>';
                      break;
                    endswitch;
                  endif;
                  
                  if($_GET['s']):
                    $status = $_GET['s'];
                    switch($status):
                      case 'sucesso':
                      echo '
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
                        Dados inseridos com sucesso. <a href="cliente-listar.php">Exibir cadastros</a>
                      </div>';
                      break;
                      
                    endswitch;
                    
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
                  <label for="exampleInputEmail1">ID do Cliente</label>
                  <input type="text" class="form-control" id="e" placeholder="ID do Cliente" name="idcliente" value="<?php echo $seleciona['0']['idcliente']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome da Empresa</label>
                  <input type="text" class="form-control" id="e" placeholder="Nome Completo" name="nome" value="<?php echo $seleciona['0']['nome']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contato Principal</label>
                  <input type="text" class="form-control" id="e" placeholder="Contato Principal" name="contato" value="<?php echo $seleciona['0']['contato']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="email" class="form-control" id="" placeholder="E-mail" name="email" value="<?php echo $seleciona['0']['email']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Site</label>
                  <input type="email" class="form-control" id="" placeholder="Site" name="site" value="<?php echo $seleciona['0']['site']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Senha</label>
                  <input type="password" class="form-control" id="" placeholder="Senha" name="senha" value="<?php echo $seleciona['0']['senha']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Logo</label>
                  <input type="file" id="exampleInputFile" name="logo" value="<?php echo $seleciona['0']['logo']?>">
                  <input type="hidden" name="pasta" value="cliente/" />
                  <p class="help-block">Coloque aqui o logo da Empresa</p>
                  <img src="<?php echo $seleciona['0']['logo']?>" width="100" />
                  
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
             
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
