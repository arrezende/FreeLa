<?php
verificaLogin();
$selecionaCliente = DBSelectS('clientes','', '*');

if(isset($_POST['cadastrar'])):

  $nome = $_POST['nome'];
  $verifica = existeRegistro('valores','WHERE nome="'.$nome.'"', 'nome');
  
  if($verifica == 1):
    
  else:
    $clientes = array(
    'nome' => $_POST['nome'],
    'meses' => $_POST['meses'],
    'mes_inicio' => $_POST['mes_inicio'],
    'valor' => $_POST['valor'],
    );
    $insere = DBInsere('valores', $clientes);
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
              <h1 class="box-title">Cadastrar Valores</h1>
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
                        Dados inseridos com sucesso. <a href=cadastrar.php">Exibir cadastros</a>
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
                  <label for="exampleInputEmail1">Meses do Contrato</label>
                  <input type="text" class="form-control" id="" placeholder="Utilize sempre dois números. Ex.: 01" name="meses">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mês do Inicio do Projeto</label>
                  <input type="text" class="form-control" id="" placeholder="Utilize sempre dois números. Ex.: 01" name="mes_inicio">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Valor Mensal</label>
                  <input type="text" class="form-control" id="" placeholder="Valor sem Pontuação e sem o R$. EX.: 2.500,00 = 250000" name="valor">
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
