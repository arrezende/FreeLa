<?php $seleciona = DBSelectS('clientes','', '*');?>  
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
                <tbody><tr>
                  <th>Logo</th>
                  <th>ID do Cliente</th>
                  <th>Nome</th>
                  <th>Contato Principal</th>
                  <th>Site</th>
                  <th>E-mail</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                <?php 
                    if($seleciona != ""){
                        foreach($seleciona as $valor){ ?>
                        <tr> 
                          <td><img src="<?php echo $valor['logo']; ?>" width='100' height='50' /></td>
                          <td><?php echo $valor['idcliente']; ?></td>
                          <td><?php echo $valor['nome']; ?></td>
                          <td><?php echo $valor['contato']; ?></td>
                          <td><?php echo $valor['site']; ?></td>
                          <td><?php echo $valor['email']; ?></td>
                          <td><?php if($valor['ativo']){ echo '<span class="label label-success">Ativo</span>';}else{ echo '<span class="label label label-danger">Inativo</span>';} ?></td>
                          <td><div class="btn-group"><a href="cliente.php?p=editar&id=<?php echo $valor['id']; ?>" class="btn bg-orange" title="Editar"><i class="fa fa-edit"></i></a><a href="cliente.php?p=excluir&id=<?php echo $valor['id']; ?>" class="btn bg-red" title="Deletar"><i class="fa fa-remove"></i></a></div></td>
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
