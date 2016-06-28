<?php 
if(isset($_SESSION['logado'])){
    $user = $_SESSION['userLogado'];
}else{
    echo "<script>window.location = 'index.php?erro=1'</script>";
}

$seleciona = DBInnerSelectS('clientes','r_passos','clientes.nome=r_passos.nome', '*');
$setor = $seleciona['0']['setor'];
/*echo '<pre>';
print_r($seleciona);
echo '</pre>';*/
function verificaStatus($estagio){
    $estagio = $estagio;
    $cliente = $cliente;
        switch ($estagio) {
            case 0:
                echo 'Projeto Iniciado';
                break;
            case '1':
                echo 'Estudo de Palavras-chave';
                break;
            
            case 2:
                echo 'Auditoria Inicial';
                break;
                
            case 3:
                echo 'Relatório Tecnico Inicial';
                break;
        }
}
function verificaStatusCliente($cliente){
        switch ($cliente) {
            case 0:
                echo 'Projeto Iniciado';
                break;
                
            case 1:
                echo 'Aguardando OK do Cliente';
                break;
            case 2:
                echo 'OK do Cliente';
                break;
        }
    
}


?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
     <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listagem dos Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>Logo</th>
                  <th>Cliente</th>
                  <th>Status do Cronograma</th>
                  <th>Status do Cliente</th>
                  <th>Setor</th>
                  <th>Ações</th>
                </tr>
                <?php 
                    if($seleciona != ""){
                        foreach($seleciona as $valor){ ?>
                        <tr> 
                          <td><img src="<?php echo $valor['logo']; ?>" width='100' height='50' /></td>
                          <td><?php echo $valor['nome']; ?></td>
                          <td><?php verificaStatus($valor['estagio']); ?></td>
                          <td><?php verificaStatusCliente($valor['ok']); ?></td>
                          <td><?php echo $valor['setor']; ?></td>
                          <td><div class="btn-group"><a href="relatorio.php?p=editar&r=cronograma&nome=<?php echo $valor['nome']; ?>&setor=<?php echo $valor['setor']; ?>" class="btn bg-orange" title="Editar"><i class="fa fa-edit"></i></a><a href="relatorio.php?p=excluir&r=cronograma&nome=<?php echo $valor['nome']; ?>&setor=<?php echo $valor['setor']; ?>" class="btn bg-red" title="Deletar"><i class="fa fa-remove"></i></a></div></td>
                        </tr>
                        <?php
                            
                        }
                    }
                    else { echo "Nenhum registro de contato encontrado.";}// end Listar?>
                 </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
