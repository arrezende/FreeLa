<?php 
verificaLogin();
$seleciona = DBInnerSelectS('clientes','valores','clientes.nome=valores.nome', '*');
$setor = $seleciona['0']['setor'];
/*echo '<pre>';
print_r($seleciona);
echo '</pre>';*/
function verificaStatus($cliente){

        switch ($cliente) {
            case 01:
                echo 'Janeiro';
                break;
                
            case 02:
                echo 'Fevereiro';
                break;
            case 03:
                echo 'Março';
                break;
            case 04:
                echo 'Abril';
                break;
            case 05:
                echo 'Maio';
                break;
            case 06:
                echo 'Junho';
                break;
            case 07:
                echo 'Julho';
                break;
            case 08:
                echo 'Agosto';
                break;
            case 09:
                echo 'Setembro';
                break;
            case 10:
                echo 'Outubro';
                break;
            case 11:
                echo 'Novembro';
                break;
            case 12:
                echo 'Dezembro';
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
              <h3 class="box-title">Listagem dos Valores dos Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>Logo</th>
                  <th>Cliente</th>
                  <th>Meses de Contrato</th>
                  <th>Mês Inicial</th>
                  <th>Valor por Mês</th>
                  <th>Ações</th>
                </tr>
                <?php 
                    if($seleciona != ""){
                        foreach($seleciona as $valor){ ?>
                        <tr>
                          <td><img src="<?php echo $valor['logo']; ?>" width='100' height='50' /></td>
                          <td><?php echo $valor['nome']; ?></td>
                          <td><?php echo $valor['meses']; ?></td>
                          <td><?php verificaStatus($valor['mes_inicio']); ?></td>
                          <td><?php echo $valor['valor']; ?></td>
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
