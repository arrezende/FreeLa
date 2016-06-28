<?php 
verificaLogin();

$id = $_GET['id'];

//$seleciona = DBSelectS('clientes','WHERE id = "$id"', '*');
$seleciona = DBSelectS('clientes','WHERE id = "'.$id.'"', '*');
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

  $insere = DBDelete('clientes', $clientes);
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
              <h1 class="box-title">Excluir Cliente</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <p><?php echo $seleciona['0']['nome'];?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <p><?php echo $seleciona['0']['email']?></p>
                </div>
                <div class="form-group">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Atenção</h4>
                        Os dados Excluidos dos dados sera permanente, não tendo como opção a recuperação!.
                    </div>
                    
                </div>
              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
                <button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
