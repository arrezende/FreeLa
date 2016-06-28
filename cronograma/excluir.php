<?php
if(isset($_SESSION['logado'])):
    $user = $_SESSION['userLogado'];
else:
    echo "<script>window.location = 'index.php?erro=1'</script>";
endif;

$nome = $_GET['nome'];
$setor = $_GET['setor'];
//$seleciona = DBSelectS('clientes','WHERE id = "$id"', '*');
$seleciona = DBSelectS('r_passos','WHERE nome = "'.$nome.'" AND setor = "'.$setor.'"', '*');
/*echo '<pre>';
print_r($seleciona['0']); 
echo '</pre>';
*/
$id = $seleciona['0']['id'];

if(isset($_POST['cadastrar'])):
  $nome = $_GET['nome'];
  $clientes = $id;

  $insere = DBDelete('r_passos', $clientes);
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
              <h1 class="box-title">Excluir Cronograma</h1>
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
                        Dados Removidos. <a href="relatorio.php?r=cronograma&p=listar">Exibir cadastros</a>
                      </div>';
                  endif
                  ?>
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nome do Cliente:</label>
                  <?php echo $seleciona['0']['nome']?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Estágio do Projeto:</label>
                   <?php echo ($seleciona['0']['estagio'] == 1) ? 'Estudo de Palavras-chave' : '';?>
                   <?php echo ($seleciona['0']['estagio'] == 2) ? 'Auditoria Inicial' : '';?>
                   <?php echo ($seleciona['0']['estagio'] == 3) ? 'Relatório Tecnico Inicial' : '';?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status do Cliente</label>
                    <?php echo ($seleciona['0']['ok'] == 1) ? 'Aguardando OK do Cliente' : '';?>
                    <?php echo ($seleciona['0']['ok'] == 2) ? 'OK do Cliente' : '';?>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-danger" name="cadastrar">Excluir</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->