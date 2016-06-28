<?php $seleciona = DBSelectS('itens','', '*');?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      
     <div class="col-xs-12">
       <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h2>150 PROJETOS</h2>
              <p>ATRIBUÍDO A MIM</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
      <!-- Fim das estatisticas -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listagem dos Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Nome</th>
                  <th>Tipo</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
                <?php 
                    if($seleciona != ""){
                        foreach($seleciona as $valor){ ?>
                        
                        <tr> 
                          <td><?php echo $valor['nome']; ?></td>
                          <td><?php echo $valor['tipo']; ?></td>
                          <td>R$ <?php echo $valor['valor']; ?></td>
                          <td><div class="btn-group"><a href="itens.php?p=editar&id=<?php echo $valor['id']; ?>" class="btn bg-orange" title="Editar"><i class="fa fa-edit"></i></a><a href="itens.php?p=excluir&id=<?php echo $valor['id']; ?>" class="btn bg-red" title="Deletar"><i class="fa fa-remove"></i></a></div></td>
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
