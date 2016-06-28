<?php 
verificaLogin();
$id = $_GET['id'];

//$seleciona = DBSelectS('clientes','WHERE id = "$id"', '*');
$seleciona = DBSelectS('faturas','WHERE id = "'.$id.'"', '*');

$idfatura = $seleciona['0']['idfatura'];
$emissao = $seleciona['0']['emissao'];
$vencimento = $seleciona['0']['vencimento'];

$item = DBSelectS('itens','', '*');
$clientes = DBInnerSelectS('clientes','faturas','clientes.idcliente=faturas.idcliente', '*');
$cliente = $clientes['0']['nome'];
$contato = $clientes['0']['contato'];

$itens = $seleciona['0']['item'];
$qtd = $seleciona['0']['qtd'];
$descricao = $seleciona['0']['descricao'];
$valorunidade = $seleciona['0']['valorunidade'];
$valortotal = $seleciona['0']['valortotal'];

$itens = explode('|',$itens);
$itens = array("Item" => $itens);
$qtd = explode('|',$qtd);
$qtd = array("qtd" => $qtd);
$descricao = explode('|',$descricao);
$descricao = array("Descricao" => $descricao);

$valorunidade = explode('|',$valorunidade);
$valorunidade = array("valorunidade" => $valorunidade);

$valortotal = explode('|',$valortotal);
$valortotal = array("valortotal" => $valortotal);

$itemTotal = array_merge($itens,$qtd,$descricao,$valorunidade,$valortotal);
if(isset($_POST['enviar'])):
  
  $qtd = $_POST['qtd'];
  $item = $_POST['item'];
  $descricao = $_POST['descricao'];
  $valorunidade = $_POST['valorunidade'];
  $valorTotal = $_POST['valortotal'];
  $qtd2 = implode('|',$qtd);
  
  $item = implode('|',$item);
  $descricao = implode('|',$descricao);
  $valorunidade = implode('|',$valorunidade);
  $valorTotal = implode('|',$valorTotal);
  $clientes = array(
    'qtd' => $qtd2,
    'item' => $item,
    'descricao' => $descricao,
    'valorunidade' => $valorunidade,
    'valorTotal' => $valorTotal
    );
    
    $insere = DBUpDate('faturas', $clientes,'WHERE id = "'.$id.'"');
    if($insere):
      
      echo "<script>window.location = 'faturas.php?p=visualizar&id=".$id."&s=sucesso'</script>";
      
    else:
      echo "Houve um erro, tente novamente!";
    endif;
endif;

/*echo '<pre style="margin-left: 50%;">';
print_r($clientes);
echo '</pre>';*/
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        Detalhes da Fatura
        <small><?php echo $idfatura;?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> FreeLa 
            <small class="pull-right">Data da Emissão:<?php echo $emissao;?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          <b>ID da Fatura: <?php echo $idfatura;?></b><br>
          <b>Data da Emissão:</b> <?php echo $emissao;?><br>
          <b>Data do Vencimento:</b> <?php echo $vencimento;?><br>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
            <div class="col-sm-4 invoice-col">
              <b>Empresa: <?php echo $cliente;?></b><br>
              <b>Nome do Contato:</b> <?php echo $contato;?><br>
              <br>
            </div>
        </div>
      </div>
      <!-- /.row -->
        <section class="content-header">
          <h2>Itens da Fatura</h2>
        </section>
        <?php 
                  if($_GET['e']):
                    $status = $_GET['e'];
                    switch($status):
                      case 'extensoes':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        Erro no formato do arquivo. Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif
                      </div>';
                      break;
                      case 'tamanho':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O arquivo enviado é muito grande, envie arquivos de até 2Mb.
                      </div>';
                      break;
                      case 'error1':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O arquivo no upload é maior do que o limite do PHP.
                      </div>';
                      break;
                      case 'error2':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O arquivo ultrapassa o limite de tamanho especifiado no HTML.
                      </div>';
                      break;
                      case 'error3':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        O upload do arquivo foi feito parcialmente.
                      </div>';
                      break;
                      case 'error4':
                      echo '
                      <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                        Não foi feito o upload do arquivo.
                      </div>';
                      break;
                    endswitch;
                  endif;
                  
                  if($_GET['s']):
                    $status = $_GET['s'];
                    switch($status):
                      case 'sucesso':
                      echo '
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
                        Fatura Alterada com sucesso!
                      </div>';
                      break;
                      
                    endswitch;
                    
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
      <!-- Table row -->
      <form role="form" method="post" enctype="multipart/form-data" >
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-right" data-toggle="modal" data-target="#myModal">Adicionar Item</a>
          <button type="submit" class="btn btn-sm btn-danger btn-flat pull-right" name="enviar">Salvar</button>

          <table class="table table-striped" id="products-table">
            <thead>
            <tr>
              <th>Qtd</th>
              <th>Item</th>
              <th>Descrição</th>
              <th>Preço por Unidade</th>
              <th>Subtotal</th>
              <th>Ações</th>
            </tr>
            </thead>
            <tbody>
              
              <?php
                    if($seleciona != ""){
                       for($i = 0; $i < count($itemTotal['Item']); ++$i) {
                        echo '<tr>';
                        echo '<td>'.$itemTotal['qtd'][$i].'</td>';
                        echo '<td>'.$itemTotal['Item'][$i].'</td>';
                        echo '<td>'.$itemTotal['Descricao'][$i].'</td>';
                        echo '<td>'.$itemTotal['valorunidade'][$i].'</td>';
                        echo '<td class="valor-final">'.$itemTotal['valortotal'][$i].'</td>';
                        echo '<td><button onclick="RemoveTableRow(this)" type="button">Remover</button></td>';
                        echo '<input type="hidden" value="'.$itemTotal['valortotal'][$i].'" name="valortotal[]" />';
                        echo '<input type="hidden" value="'.$itemTotal['qtd'][$i].'" name="qtd[]" />';
                        echo '<input type="hidden" value="'.$itemTotal['Item'][$i].'" name="item[]" />';
                        echo '<input type="hidden" value="'.$itemTotal['Descricao'][$i].'" name="descricao[]" />';
                        echo '<input type="hidden" value="'.$itemTotal['valorunidade'][$i].'" name="valorunidade[]" />';
                        echo '</tr>';
                    }
                        
                    }
                    else { echo "Nenhum registro de contato encontrado.";}// end Listar?>
              
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </form>
      </div>
      <!-- /.row -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form role="form" method="post" enctype="multipart/form-data" >
       <div class="form-group">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
             
                  
            </div>
            <div class="modal-body">
               <div class="box-body">
                 <div class="form-group">
                  
                  <label for="exampleInputEmail1">Adicionar Item</label>
                  <select class="form-control" id='itens' name="exemplo-sete">
                  <?php 
                  foreach($item as $valor): ?>
                    <option value="<?php echo $valor['nome'].','.$valor['descricao'].',R$'.$valor['valor']; ?>"><?php echo $valor['nome'].' R$'.$valor['valor']; ?></option>
                  <?php
                  endforeach;
                  ?>
                  </select>
                </div>
                <div  class="form-group">
                  <label for="exampleInputEmail1">Qtd</label>
                  <input type="text" name="qtd" value="1" id="qtd"/>
                </div>
                
                <div  class="form-group">
                  <label for="exampleInputEmail1">valor</label>
                  <input type="text" name="valor"  value=""/>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" onclick="AddTableRow();" >Adicionar</button>
                          </div>
          </div>
        </div>
        
      </form>
  </div>
</div>




      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Vencimento <?php echo $vencimento;?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total:</th>
                <td class="total"></td>
              </tr>
              <tr>
                <th> </th>
                <td><button type="button" class="btn btn-default" onclick="AtualizaTotal();" >Atualizar Valores</button></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right" name="enviar"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->