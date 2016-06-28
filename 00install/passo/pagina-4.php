<?php
include 'header.php';
?>

<body class="hold-transition login-page skin-purple">
<div class="login-box">
  <div class="login-logo">
    <img src="http://www.linksearch.com.br/wp-content/uploads/2014/09/logo.png" />
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Pronto, agora você ja pode acessar o sistema.</p>
    <p class="login-box-msg">Mas antes apague a pasta 'install'.</p>
        <form role="form" method="post">
              
              <div class="box-body">
                <div class="form-group">
                  <?php 
                  if($insere):
                    echo '
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
                        Dados inseridos com sucesso. <a href="cliente-listar.php">Exibir cadastros</a>
                      </div>';
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
               
              </div>
               
              
              <!-- /.box-body -->
              

              <div class="box-footer">
                <a href="../index.php" class="btn btn-primary btn-block btn-flat">Logar</a>
              </div>
        </form>
    </div>
</div>
    </body>
</html>