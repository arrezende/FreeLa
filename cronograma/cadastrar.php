<?php 
if(isset($_SESSION['logado'])):
  $user = $_SESSION['userLogado'];
else:
  echo "<script>window.location = 'index.php?erro=1'</script>";
endif;

$selecionaCliente = DBSelectS('clientes','', '*');

if(isset($_POST['cadastrar'])):

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);
  $setor = $_POST['setor'];
  $clientes = array('nome' => $_POST['nome'], 'setor' => $setor);
  
  $verifica = existeRegistro('r_passos','WHERE nome="'.$nome.'" AND setor="'.$setor.'"', 'nome');
  
  if($verifica == 1):
    
  else:
    $insere = DBInsere('r_passos', $clientes);
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
                        Dados inseridos com sucesso. <a href="relatorio.php?r=cronograma&p=listar">Exibir cadastros</a>
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
                  <select class="form-control" name="nome">
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
                  <label for="exampleInputEmail1">Setor</label>
                  <select class="form-control" name="setor">
                    <?php 
                    if($selecionaCliente != ""):?>
                        <option value="SEO">SEO</option>
                        <option value="Links Patrocinados">Links Patrocinados</option>
                        <option value="Redes Sociais">Redes Sociais</option>
                    <?php
                    endif;// end Listar?>
                  </select>
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
