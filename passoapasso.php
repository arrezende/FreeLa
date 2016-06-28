<?php 
include "sistema/config.inc.php";
include "sistema/funcoes.php";
session_start();
verificaLogin();
$id = $_GET['id'];
$seleciona = DBSelectS('clientes','WHERE email = "'.$user.'"', '*');
$seleciona2 = DBInnerSelectS('clientes','r_passos','clientes.nome=r_passos.nome', '*');

$nome = $seleciona2['0']['nome'];
$estagio = $seleciona2['0']['estagio'];
$logo = $seleciona2['0']['logo'];
$aprovado = $seleciona2['0']['ok'];


$seleciona3 = DBSelectS('r_passos','WHERE id = "'.$id.'"', '*');
/*echo '<pre>';
print_r($seleciona2);
echo '</pre>';
*/
if(isset($_POST['cadastrar'])):
  if($_POST['ativo'] != 'on'): $ok = '1'; else: $ok = '2'; endif;
  $clientes = array(
    'estagio'    => $estagio,
    'ok'         => $ok,
    );

  $insere = DBUpDate('r_passos', $clientes, 'WHERE nome = "'.$nome.'"');
  
  

endif;// end cadastrar
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Linksearch</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-purple sidebar-collapse">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="http://www.linksearch.com.br/wp-content/themes/offbeat/images/logo-rodape-hover.png"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <!--a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a-->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $logo; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $nome ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $logo; ?>" class="img-circle" alt="<?php echo $nome; ?>">

                <p>
                  <?php echo $nome; ?>
                  
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="delsession.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="uploads/<?php echo $logo; ?>" class="img-circle" alt="<?php echo $nome; ?>">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Olá <?php echo $nome ?>, <small>Lorem ipsum dolor</small>
      </h1>
    </section>
<?php 
      foreach($seleciona2 as $valor):
      //print_r($valor);
      ?>
    <!-- Main content -->
    <section class="content">
      <h4><?php echo $valor['setor'] ?></h4>
        <?php switch ($valor['setor']) :
          case 'SEO':?>
            
        <div class="row">
            <div class="col-md-4">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 1)? '<span class="badge bg-green">1</span>': '<span class="badge bg-gray">1</span>'?> Estudo de Palavras-chave</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com o estudo de palavras-chave para a aprovação.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    <?php if ($valor['estagio'] == 1):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?> 

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                  </div><!-- box-footer -->
                  
                </div><!-- /.box -->
            </div>
            
            <div class="col-md-4">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 2)? '<span class="badge bg-green">2</span>': '<span class="badge bg-gray">2</span>'?> Auditoria Inicial</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com a Auditoria Inicial do seu site.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    
                    <?php if ($valor['estagio'] == 2):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?>

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                    
                  </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
            
            <div class="col-md-4">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 3)? '<span class="badge bg-green">3</span>': '<span class="badge bg-gray">3</span>'?> Relatório Tecnico Inicial</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com o Relatório Tecnico Inicial do seu site.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    <?php if ($valor['estagio'] == 3):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?>

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                  </div><!-- box-footer -->
                </div><!-- /.box -->
            </div><!-- /.row -->
      <?php   break;
          
          case 'Links Patrocinados': ?>
           
           <div class="row">
            <div class="col-md-3">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 1)? '<span class="badge bg-green">1</span>': '<span class="badge bg-gray">1</span>'?> Estudo de Palavras-chave</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com o estudo de palavras-chave para a aprovação.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    <?php if ($valor['estagio'] == 1):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?> 

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                  </div><!-- box-footer -->
                  
                </div><!-- /.box -->
            </div>
            
            <div class="col-md-3">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 2)? '<span class="badge bg-green">2</span>': '<span class="badge bg-gray">2</span>'?> Auditoria Inicial</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com a Auditoria Inicial do seu site.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    
                    <?php if ($valor['estagio'] == 2):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?>

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                    
                  </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
            
            <div class="col-md-3">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 3)? '<span class="badge bg-green">3</span>': '<span class="badge bg-gray">3</span>'?> Relatório Tecnico Inicial</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com o Relatório Tecnico Inicial do seu site.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    <?php if ($valor['estagio'] == 3):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?>

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                  </div><!-- box-footer -->
                </div><!-- /.box -->
                
            </div><!-- /.row -->
            <div class="col-md-3">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 3)? '<span class="badge bg-green">3</span>': '<span class="badge bg-gray">3</span>'?> Relatório Tecnico Inicial</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com o Relatório Tecnico Inicial do seu site.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    <?php if ($valor['estagio'] == 3):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?>

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                  </div><!-- box-footer -->
                </div><!-- /.box -->
                
      <?php   break;
          case 'Redes Sociais': ?>
           <div class="row">
            <div class="col-md-6">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 1)? '<span class="badge bg-green">1</span>': '<span class="badge bg-gray">1</span>'?> Estudo de Palavras-chave</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com o estudo de palavras-chave para a aprovação.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    <?php if ($valor['estagio'] == 1):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?> 

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                  </div><!-- box-footer -->
                  
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-purple">
                  <div class="box-header with-border">
                      <h2 class="box-title"><?php echo ($valor['estagio'] == 1)? '<span class="badge bg-green">1</span>': '<span class="badge bg-gray">1</span>'?> Estudo de Palavras-chave</h2>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    Você receberá um e-mail com o estudo de palavras-chave para a aprovação.
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <span class="box-title">Prazos:</span>
                    <ul>
                        <li>Em até dois dias utéis</li>
                    </ul>
                    <?php if ($valor['estagio'] == 1):?>
                      <label for="exampleInputFile">Aprovado?</label>
                      <form role="form" method="post">
                      <?php if($valor['aprovado'] == 2):?>
                        <div class="onoffswitch">
                          <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked" disabled="disabled">
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                        <?php else: ?> 

                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch" checked="checked">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                          
                           <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
                          
                        <?php endif; ?>
                        </form>
                    <?php endif; ?>
                  </div><!-- box-footer -->
                  
                </div><!-- /.box -->
            </div>
            </div>
       <?php break;
        endswitch;?>
            

      

    </section>
    <!-- /.content -->
      <!-- /.content-wrapper -->
<?php endforeach; ?>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="js/bootstrap-switch.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
