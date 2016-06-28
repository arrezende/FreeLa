  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.js"></script>
<!- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>


   
<script>
  //The Calender
  $("#calendar").datepicker({
      language: "pt-BR",
    	todayHighlight: true
    });
    //Date range picker
  $('#data').datepicker({
      autoclose: true,
      dateFormat: 'dd-mm-yy'
    });
    
    (function($) {
      RemoveTableRow = function(handler) {
    var tr = $(handler).closest('tr');
    AtualizaTotal();

    tr.fadeOut(400, function(){ 
      tr.remove(); 
    }); 
    return false;
  };
  
  
  AddTableRow = function() {
    var newRow = $("<tr>");
    var cols = "";
   // Pegar o valor selecionado
    var current = $("#itens").val();
    var implode = current.split(",");
    var valor = implode[2].split("R$");
    var valor = valor[1];
    var total = '';
    var qtd = $('#qtd').val();
    var Somatotal = '';
    var somatorio = '';
    //var desc = $("#itens").txt();
    //alert(valor[1]);
  
    
    cols += '<td>';
    cols += qtd;
    cols += '</td>';
    cols += '<td>';
    cols += implode[0];
    cols += '</td>';
    cols += '<td>';
    cols += implode[1];
    cols += '</td>';
    cols += '<td>';
    cols += implode[2];
    cols += '</td>';
    cols += '<td class="valor-final">';
    cols += qtd*valor;
    cols += '</td>';
    cols += '<td>';
    cols += '<button onclick="RemoveTableRow(this)" type="button">Remover</button>';
    cols += '</td>';
    cols += '<input type="hidden" value="'+qtd*valor+'" name="valortotal[]" />';
    cols += '<input type="hidden" value="'+qtd+'" name="qtd[]" />';
    cols += '<input type="hidden" value="'+implode[0]+'" name="item[]" />';
    cols += '<input type="hidden" value="'+implode[1]+'" name="descricao[]" />';
    cols += '<input type="hidden" value="'+implode[2]+'" name="valorunidade[]" />';

    
    total = qtd*valor;
    somatorio = somatorio+total;
    //alert(somatorio);
    newRow.append(cols);

    $("#products-table").append(newRow);
    AtualizaTotal();
   

    return false;
    //CarregaTotal();
  };


  AtualizaTotal = function(){
    var soma = 0;
    $( ".valor-final" ).each( function() {
        soma += Number( $( this ).html() );
        //alert(soma);
    } );
    $( ".total" ).text( "R$ " + soma );
  }
  
  
})(jQuery);
</script>
</body>
</html>
