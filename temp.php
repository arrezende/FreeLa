
<?php 
include "sistema/config.inc.php";
include "sistema/funcoes.php";
session_start();
verificaLogin();

 // Dados do usuario
$woeid = "26799173";
$unit = "c";
// Obter JSON retornado pela API do yahoo weather, usando a file_get_contents
// Caso a allow_url_fopen esteja desativada no servidor você pode usar a dica abaixo
// http://blogmrcs.blogspot.com/2015/08/alternativa-filegetcontents-usando-curl.html
$yql = "select * from weather.forecast where woeid='$woeid' and u='$unit'";
$json = file_get_contents('http://query.yahooapis.com/v1/public/yql?q=' . urlencode($yql) . '&format=json');
// criar um array associativo, contendo o retorno da função json_decode
$weather = json_decode($json, true);
// Criamos outras array para facilitar o acesso aos dados
$channel = $weather['query']['results']['channel'];
$atmosphere = $channel['atmosphere'];
$condition = $channel['item']['condition'];
$forecast = $channel['item']['forecast'];
echo "</pre>
<hr />
<h5>" . htmlentities("Informações") . "</h5>
<pre>
";
echo "Data: " . $condition['date'];
echo "
Cidade: " . $channel['location']['city'];
echo "
". htmlentities("País: ") . $channel['location']['country'];
echo "</pre>
<hr />
<h5>Hoje (" .$condition['date'] . ")</h5>
<pre>
";
echo htmlentities("Condição: ") . $condition['text'];
echo "
" . htmlentities("Temperatura (°C): ") . $condition['temp'];
echo "
" . htmlentities("Humidade: ") . $atmosphere['humidity'] . "%";
echo "
" . htmlentities("Minimo (°C): ") . $forecast[0]['low'];
echo "
" . htmlentities("Máximo (°C): ") . $forecast[0]['high'];
echo "</pre>
<hr />
<h5>" . htmlentities("Amanhã (") . $forecast[1]['date'] . ")</h5>
<pre>
";
echo htmlentities("Condição: ") . $forecast[1]['text'];
echo "
" . htmlentities("Minimo (°C): ") . $forecast[1]['low'];
echo "
" . htmlentities("Máximo (°C): ") . $forecast[1]['high'];
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
  </head>
  <body>
    <span class="cidade"></span> <span class="temperatura"><?php echo $condition['temp']?></span><br>
    <span class="descricao"></span><br>
    Nascer do Sol: <span class="nascer_do_sol"></span> - Pôr do Sol: <span class="por_do_sol"></span><br>
    Velocidade do vento: <span class="vento"></span><br>
    <img src="imagens/44.png" class="imagem-do-tempo"><br>

    <a href="#" class="obter-localizacao">Obter localização</a>
  </body>
</html>