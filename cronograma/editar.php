<?php
if(isset($_SESSION['logado'])):
    $user = $_SESSION['userLogado'];
else:
    echo "<script>window.location = 'index.php?erro=1'</script>";
endif;

$nome = $_GET['nome'];
$setor = $_GET['setor'];
$id = $seleciona['0']['id'];
//$seleciona = DBSelectS('clientes','WHERE id = "$id"', '*');
$seleciona = DBSelectS('r_passos','WHERE nome = "'.$nome.'" AND setor = "'.$setor.'"', '*');
$seleciona2 = DBInnerSelectS('clientes','r_passos','clientes.nome=r_passos.nome', '*');
$email = $seleciona2['0']['email'];

/*echo '<pre>';
print_r($seleciona2['0']); 
echo '</pre>';
*/
$id = $seleciona['0']['id'];

$msg = '<center><table border="0" cellspacing="0" cellpadding="0" width="603">
	<tbody>
	 	<tr>
	  		<td style="padding:0">
	  			<p>
	  				<span>
	  					<img width="603" height="69" src="'.BASE.'img/image001.jpg" alt="Logo Linksearch">
	  				</span>
	  			</p>
	  		</td>
	 	</tr>
	 	<tr>
	  		<td style="padding:0">
	  			<br>';
$msg .= 'Olá <b>'.$nome.'</b>.<br>
Você recebeu um nova interação sobre o nosso Cronograma.<br>
Foi anexado um arquivo a esse e-mail, após a sua analise e aprovação, altere o status do andamento através desse <a href="' .BASE.'passoapasso.php" target="_blank">link</a>.
<br><br>
Abraços';
$msg .= '</td>
	 	</tr>
	 	<tr>
	 		<td>
	 			<p style="line-height:11.25pt">
	 				<b>
	 					<span style="font-size:10.0pt;font-family:Arial,sans-serif;color:#794E7C">Linkseach</span>
	 				</b>
	 				<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363"><br>
					  R. Álvaro Rodrigues, 152 - Conj. 72<br>
					  04582-000 - Brooklin - São Paulo – Brasil<br>
					  Phone&nbsp;<span>&nbsp;</span>+55 11 5096 2326<br>
					  Phone&nbsp;
					</span>
					<span>
						<span>&nbsp;</span>
					</span>
					<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">+55 11 5093 2551<br>
					</span>
					<span class="apple-converted-space">
						<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363"></span>
					</span>
					<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">
					Internet
					</span>
					<span class="apple-converted-space">
						<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">&nbsp;</span>
					</span>
					<span style="font-size:9.0pt;font-family:Arial,sans-serif;color:#636363">
						<a href="http://www.linksearch.com.br/">
							<span style="color:#404040">www.linksearch.com.br</span>
						</a>
						<span class="apple-converted-space">&nbsp;</span>|<span class="apple-converted-space">&nbsp;</span>
					</span>
					<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:#636363">
						<a href="http://twitter.com/#!/_linksearch"><span style="color:#636363">Twitter</span></a>
						<span class="apple-converted-space">&nbsp;</span>|<span class="apple-converted-space">&nbsp;</span>
						<a href="http://www.facebook.com/agencialinksearch"><span style="color:#636363">Facebook</span></a>
					</span>
				</p>
			</td>
		</tr>
	</tbody>
</table>
</center>';
if(isset($_POST['cadastrar'])):
  
  $nome = $_GET['nome'];
  $arquivo = $_POST['logo'];
  $_POST['msg'] = $msg;
  
  //require_once 'envia-arquivos.php';
  
    

  $clientes = array(
    'nome'       => $_GET['nome'],
    'estagio'    => $_POST['estagio'],
    'ok'         => $_POST['ok-cliente'],
    'setor'      => $_POST['setor'],
    );

  $insere = DBUpDate('r_passos', $clientes, 'WHERE nome = "'.$nome.'" AND setor = "'.$setor.'"');
  
  
  
  
  if($_POST['ativo'] == 'on'): include 'envia-email.php'; endif;
  unset($_POST);
endif;// end cadastrar

?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">Editar Clientes</h1>
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
                        Dados inseridos com sucesso. <a href="relatorio.php?r=cronograma&p=listar">Exibir cadastros</a><br>
                        <a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>
                      </div>';
                  endif;
                  if($enviado): 
                   echo '
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
                        E-mail enviado com sucesso!</a>
                      </div>';
                  endif;
                  ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome do Cliente:</label>
                  <p><?php echo $seleciona['0']['nome']?></p>
                  <input type="hidden" name="nome" value="<?php echo $seleciona['0']['nome']?>">
                  <input type="hidden" name="email" value="<?php echo $email?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Setor:</label>
                  <p><?php echo $seleciona['0']['setor']?></p>
                  <input type="hidden" name="setor" value="<?php echo $seleciona['0']['setor']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Estágio do Projeto:</label>
                  <select class="form-control" name="estagio">
                    <option value="1"<?php echo ($seleciona['0']['estagio'] == 1) ? 'selected' : '';?>>Estudo de Palavras-chave</option>
                    <option value="2"<?php echo ($seleciona['0']['estagio'] == 2) ? 'selected' : '';?>>Auditoria Inicial</option>
                    <option value="3"<?php echo ($seleciona['0']['estagio'] == 3) ? 'selected' : '';?>>Relatório Tecnico Inicial</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status do Cliente</label>
                  <select class="form-control" name="ok-cliente">
                    <option value="1" <?php echo ($seleciona['0']['ok'] == 1) ? 'selected' : '';?>>Aguardando OK do Cliente</option>
                    <option value="2" <?php echo ($seleciona['0']['ok'] == 2) ? 'selected' : '';?>>OK do Cliente</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Anexar Arquivo?</label>
                  <input type="file" id="exampleInputFile" name="logo">
                  <p class="help-block">Coloque aqui o Relatório para ser enviado.</p>
                  <img src="<?php echo $seleciona['0']['logo']?>" />
                </div>
                
                <!--div class="form-group">
                  <label for="exampleInputFile">Download Arquivo Anexado</label>
                  <?php //echo '<a href="' . $seleciona['0']['arquivo']. '" target="_blank">Download</a>'; ?>
                  <input type="hidden" name="nomearquivo" value="<?php //echo $_UP['pasta'] . $nome_final ?>">
                </div-->
                
                <div class="form-group">
                    <div class="">
                      <label><i class="fa fa-envelope-o"></i> Enviar e-mail para o cliente?</label>
                      
                          <div class="onoffswitch">
                            <input type="checkbox" name="ativo" class="onoffswitch-checkbox" id="myonoffswitch">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                    </div>
                </div>
                <!--div class="form-group">
                  <div class="">
                    <label>Preview do e-mail</label>
                    <textarea class="form-control" rows="10" cols='10' placeholder="" name="msg"><?php //echo $msg;?></textarea>
                  </div>
                </div>--
                
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
