<?php //http://codecanyon.net/item/freelance-cockpit-2-project-management/4203727
include "sistema/config.inc.php";
include "sistema/funcoes.php";
session_start();
verificaLogin();
verificaTempoInativo();
$sql = "SELECT * FROM usuarios WHERE email='$user'";
$res = DBExecute($sql);

$row = mysqli_fetch_array($res);
$_SESSION['nome'] = $row['nome'];
$foto = $row['foto'];
$_SESSION['foto'] = $foto;
$_SESSION['id'] = $row['id'];
/*
echo '<pre>';
print_r($row); 
echo '</pre>';
*/
//tempoAgora('debug');


        $simbolo =  strtolower(tempoAgora('condicao'));
        
        

?>
  <?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <h3 class="widget-user-username"><?php saudacao(); echo ' '.$row['nome'];?></h3>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $foto;?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">Projetos Cadastrados</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">Projetos Ativos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">Projetos Inativos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <div class='box-widget bg-aqua'>
              <div class="row ">
                <div class="col-md-6">
                  <div class="bg-aqua" style="padding: 2rem;text-align: center;">
                    <div class="inner">
                      <span class="icon-<?php echo $simbolo;?>" style="font-size: 10rem;"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="bg-aqua">
                    <div class="inner" style="text-align:center">
                      <span style="font-size: 8rem;"><?php echo tempoAgora('temperatura'); ?>ºC</span><br>
                      <small style="text-align: center;position: relative;top: -25px;"><?php echo tempoAgora('cidade'); ?></small>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-solid" style="position: relative;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Calendario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
        </div><!--col-md-4 -->
        <div class="col-md-4">
          
        </div><!--col-md-4 -->
        
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include('footer.php') ?>
