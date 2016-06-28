$(document).ready(function(){
  // Inicia com a previsao por Geo IP, sem passar as coordenadas
  atualizarDados();
  
  // Quando o usuario clicar no botao, obtem os dados de geolocalizacao do navegador.
  $('.obter-localizacao').on('click', function(){
    
    // Verifica se o navegador do usuario tem suporte a geolocalizacao
    if(navigator.geolocation){
      // Se tiver, solicita os dados e atualiza a previsao do tempo pela API
      navigator.geolocation.getCurrentPosition(atualizarDados);
    } else {
      alert('Seu navegador não suporta geolocalização.');
    }
  });
  
});

function atualizarDados(localizacao) {
  localizacao = typeof localizacao !== 'undefined' ? localizacao : false;
  
  alert(localizacao);
  
  $.ajax({
    url: 'painel.php'+(!localizacao ? '' : '?lat='+localizacao.coords.latitude+'&lon='+localizacao.coords.longitude),
    dataType: 'json',
    success: function(dados) {
      
      // Loop inserindo os dados no HTML
      $.each(dados, function(dado, valor){
        $('.'+dado).text(valor);
      });
      
      // Insere a imagem
      $('.imagem-do-tempo').attr('src', dados.imagem);
    }
  });
  
}