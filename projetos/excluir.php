<?php 
verificaLogin();

$id = $_GET['id'];

//$seleciona = DBSelectS('clientes','WHERE id = "$id"', '*');
$seleciona = DBSelectS('projetos','WHERE id = "'.$id.'"', '*');
/*echo '<pre>';
print_r($seleciona['0']);
echo '</pre>';*/

if(isset($_POST['excluir'])):

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $logo = $_POST['logo'];
  $senha = md5($_POST['senha']);
  $ativo = ($_POST['ativo']=='on') ? 1 : 0;


  $clientes = $id;

  $insere = DBDelete('projetos', $clientes);
    if($insere):
      echo "<script>window.location = 'cliente-listar.php'</script>";
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
              <h1 class="box-title">Excluir Projeto</h1>
            </div>
            <!-- /.box-header -->
            <div class="form-group">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Atenção</h4>
                        Os dados Excluidos serão permanentes, não tendo como opção a recuperação!
                    </div>
                    
                </div>
            <!-- form start -->
            
            <form role="form" method="post">
              <div class="box-body">
                  <div class="form-group">
                  <label for="exampleInputEmail1">ID do Projeto</label>
                  <p><?php echo $seleciona['0']['idprojeto']; ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Item a ser feito</label>
                  <p><?php echo $seleciona['0']['item']; ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cliente</label>
                  <p><?php echo $seleciona['0']['cliente']; ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Data Final</label>
                  <p><?php echo $seleciona['0']['data']; ?></p>
                </div>
             
               
              </div>
              <!-- /.box-body -->
              <!-- /.box-body -->
              
              <div class="box-footer">
                <button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
