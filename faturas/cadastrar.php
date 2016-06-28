<?php
verificaLogin();
$selecionaCliente = DBSelectS('clientes','', '*');


if(isset($_POST['cadastrar'])):
  $idfatura = 'FAT'.$_POST['idfatura'];  
  $verifica = existeRegistro('faturas','WHERE idfatura="'.$idfatura.'"', 'idfatura');

  if($verifica == 1):
    
  else:
    
    $clientes = array(
    'idfatura' => 'FAT'.$_POST['idfatura'],
    'cliente' => $_POST['cliente'],
    'vencimento' => $_POST['data']);
    $insere = DBInsere('faturas', $clientes);
  endif;
  if($insere):
      
      echo "<script>window.location = 'faturas.php?&s=sucesso'</script>";
      
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
              <h1 class="box-title">Cadastrar Faturas</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
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
                        Fatura Alterada com sucesso!
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
                  <label for="exampleInputEmail1">ID da Fatura</label>
                  <input type="text" class="form-control" id="e" placeholder="Ex.: 0001" name="idfatura">
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
                  </select> 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Vencimento</label>
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
