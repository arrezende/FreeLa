<?php 
verificaLogin();
$selecionaCliente = DBSelectS('itens','', '*');

if(isset($_POST['cadastrar'])):

  $nome = $_POST['nome'];
 
  $clientes = array(
    'nome' => $_POST['nome'], 
    'valor' => $_POST['valor'],
    'tipo' => $_POST['tipo'],
    'descricao' => $_POST['descricao']
    );
  
  $verifica = existeRegistro('itens','WHERE nome="'.$nome.'"');
  
  if($verifica == 1):
    
  else:
    $insere = DBInsere('itens', $clientes);
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
              <h1 class="box-title">Cadastrar Passo a Passo</h1>
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
                        Dados inseridos com sucesso. <a href="itens.php?p=listar">Exibir cadastros</a>
                      </div>';
                  endif;
                  if($verifica == 1):
                    echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                      Erro, Cronograma ja cadastrado.
                    </div>
                    ';
                  endif;
                  ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" class="form-control" id="" placeholder="Nome do Item" name="nome">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Valor</label>
                  <input type="text" class="form-control" id="" placeholder="Valor do item" name="valor">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipo</label>
                  <input type="text" class="form-control" id="" placeholder="Tipo do item" name="tipo">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Descrição</label>
                  <input type="text" class="form-control" id="" placeholder="Descrição do item" name="descricao">
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
