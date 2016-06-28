<?php
verificaLogin();
$selecionaCliente = DBSelectS('clientes','', '*');


if(isset($_POST['cadastrar'])):
  $idprojeto = 'PRO'.$_POST['idprojeto'];  
  $verifica = existeRegistro('projetos','WHERE idprojeto="'.$idprojeto.'"', 'idprojeto');

  if($verifica == 1):
    
  else:
    
    $clientes = array(
    'idprojeto' => 'PRO'.$_POST['idprojeto'],
    'item' => $_POST['item'],
    'cliente' => $_POST['cliente'],
    'datafinal' => $_POST['data']);
    $insere = DBInsere('projetos', $clientes);
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
              <h1 class="box-title">Cadastrar Projetos</h1>
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
                        Dados inseridos com sucesso. <a href="projetos.php">Exibir cadastros</a>
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
                  <label for="exampleInputEmail1">ID do Projeto</label>
                  <input type="text" class="form-control" id="e" placeholder="Ex.: 0001" name="idprojeto">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Item a ser feito</label>
                  <input type="text" class="form-control" id="e" placeholder="Ex.: Construção de Site, E-mail Mkt, Banners" name="item">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cliente</label>
                  <select class="form-control" name="cliente">
                    <?php 
                    if($selecionaCliente != ""){
                        foreach($selecionaCliente as $valor){ ?>
                          <option value="<?php echo $valor['nome']; ?>"><?php echo $valor['nome']; ?></option>
                        
                        <?php
                            
                        }
                    }
                    else { echo "Nenhum registro de contato encontrado.";}// end Listar?>
                  </select>                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Data Final</label>
                  <input type="text" class="form-control" id="data" placeholder="Data" name="data">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
