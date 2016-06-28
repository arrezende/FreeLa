<?php

//$con = mysqli_connect(HOST, USER, PASSWORD);
//mysqli_select_db($con, DBNAME);

function DBConnect(){
$mysqli = new mysqli(HOST, USER, PASSWORD,DBNAME);
// Verifica se ocorreu algum erro
if (mysqli_connect_error()) {
die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
exit();
}
return $mysqli;
}

function  DBClose($mysqli){
 mysqli_close($mysqli);
}

function DBExecute($sql, $insertId = false){
 $mysqli= DBConnect();
 $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli)); 
 if($insertId)
  $result = mysqli_insert_id($mysqli); 
  DBClose($mysqli);
  return $result;
}
function DBInsere($tabela, array $data){ 
 $tabela = $tabela;  
 $campos = implode(', ', array_keys($data));
 $valores = "'".implode("', '", $data)."'"; 
 $sql = "INSERT INTO {$tabela} ( {$campos} ) VALUES ( {$valores} )"; 
 return DBExecute($sql);
}

function DBUpDate($tabela, array $data, $where = null)
{
foreach ($data as $key => $valor){
$campos[] = "{$key} = '{$valor}'";
} 
$campos = implode(', ', $campos); 
$tabela = $tabela;
$where = ($where) ? " {$where}" : null;
$sql = "UPDATE {$tabela} SET {$campos}{$where}";
//echo $sql.'<br>';
return DBExecute($sql);
}

function DBDelete($tabela, $codigo = null)
{
$tabela = $tabela;
$codigo = $codigo ;
$codigo = (int) $codigo ; 
$sql = "DELETE FROM {$tabela} WHERE id = {$codigo }";
return DBExecute($sql);
}

function DBSelectS($tabela, $where = null, $campos = '*')
{
$tabela = $tabela;
$where = ($where) ? " {$where}" : null;
$campos = ($campos) ? " {$campos}" : '*';
$campos = DBEscape($campos); 
$sql = "SELECT {$campos} FROM {$tabela} {$where}";
$result = DBExecute($sql);

if(!mysqli_num_rows($result))
{
$data = "";
}
else
{
while ($res = mysqli_fetch_assoc($result))
{
$data[] = $res;
}
return $data; 
}
}

//Protege contra SQL injection
	function DBEscape($data){
		$link = DBConnect();
		
		if(!is_array($data))
			$dados = mysqli_real_escape_string($link, $data);
		else{
			
			$arr = $data;
			
			foreach ($arr as $key => $value){
				$key   = mysqli_real_escape_string($link, $key);
				$value = mysqli_real_escape_string($link, $value);
				
				$data[$key] = $value;
			}
		}
		
		DBClose($link);
		return $data;		
	} 

function DBInnerSelectS($tabela, $tabela2, $where = null, $campos = '*')
{
$tabela = $tabela;
$tabela2 = $tabela2;
$where = ($where) ? " {$where}" : null;
$campos = ($campos) ? " {$campos}" : '*';
$campos = DBEscape($campos); 
$sql = "SELECT {$campos} FROM {$tabela} INNER JOIN {$tabela2} ON {$where}";
//$sql = "SELECT {$campos} FROM {$tabela} {$where}";
$result = DBExecute($sql);

if(!mysqli_num_rows($result))
{
$data = "";
}
else
{
while ($res = mysqli_fetch_assoc($result))
{
$data[] = $res;
}
return $data; 
}
}

function existeRegistro($tabela,$campo=NULL,$valor=NULL){
  $tabela = $tabela;
  $where  = $campo;
  $campos = $valor;
  if ($campo!=NULL && $valor!=NULL):
    $select = DBSelectS($tabela, $where, $campos);
    if ($select):
     return $select = 1;
    else:
     return $select = 0;
    endif;
  endif;
}

function verificaLogin(){
    
    if(isset($_SESSION['logado'])):
        verificaTempoInativo();
        global $user;
        $user = $_SESSION['userLogado'];
        $ativo = 1;
        $_SESSION['ativo'] = 1;
        $ativo = $_SESSION['ativo'];
        if(isset($_SESSION['cliente'])):
            echo "<script>window.location = 'passoapasso.php'</script>";
        endif;
    else:
        echo "<script>window.location = 'index.php?erro=1'</script>";
    endif;
}

function verificaTempoInativo(){
    if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > 300)) {
        // última atividade foi mais de 60 minutos atrás
        //session_unset();     // unset $_SESSION  
       // session_destroy();   // destroindo session data 
        
        $ativo = 0;
        echo "<script>window.location = 'prelogin.php'</script>";
        echo $ativo;
    }else{$ativo = 1;}
    $_SESSION['ultima_atividade'] = time(); // update da ultima atividade
        
}

function saudacao(){
 date_default_timezone_set('America/Sao_Paulo');
    $bomDia = "12:00";
    $boaTarde = "18:00";
    $horaAtual = date('H:i');
    //echo $horaAtual;
    if ($horaAtual < $bomDia) :
      $saudacao = "Bom dia";
      echo $saudacao;
    elseif ($horaAtual < $boaTarde):
      $saudacao = "Boa Tarde";
      echo $saudacao;
    else:
      $saudacao = "Boa Noite";
      echo $saudacao;
    endif;
}

function tempoAgora($var){
    $woeid = "26799173";
    $unit = "c";
    $yql = "select * from weather.forecast where woeid='$woeid' and u='$unit'";
    $json = file_get_contents('http://query.yahooapis.com/v1/public/yql?q=' . urlencode($yql) . '&format=json');
    // criar um array associativo, contendo o retorno da função json_decode
    $weather = json_decode($json, true);
    // Criamos outras array para facilitar o acesso aos dados
    $channel = $weather['query']['results']['channel'];
    $atmosphere = $channel['atmosphere'];
    $condition = $channel['item']['condition'];
    $forecast = $channel['item']['forecast'];
    $cidade = $channel['location']['city'];
    $condicao = $condition['text'];
    $temp = $condition['temp'];
    
    switch($var):
        case 'cidade':
            return $cidade;
            break;
        case 'condicao':
            return $condicao;
            break;
        case 'temperatura':
            return $temp;
            break;
        case 'debug':
            echo '<pre>';
            print_r($channel);
            echo '</pre>';
            break;
    endswitch;
    
}
?>