<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = (isset($_POST['database'])) ? trim($_POST['database']) : null;
    $username = (isset($_POST['username'])) ? trim($_POST['username']) : null;
    $password = (isset($_POST['password'])) ? trim($_POST['password']) : null;
    $hostname = (isset($_POST['hostname'])) ? trim($_POST['hostname']) : null;
    $base     = (isset($_POST['base'])) ? trim($_POST['base']) : null;

    if (!empty($database) || !empty($username) || !empty($hostname)) {

        //Nesse caso em especifico, precisamos fazer uma conexão com o banco
        //usando os dados informados pelo usuário, para ter certeza de que estão
        //corretos.

        function dbTest($host, $user, $pass, $db) {
            try {
                $pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8", $user, $pass);
                return $pdo;
            } catch (PDOException $e) {
                return false;
            }
        }

        if (dbTest($hostname, $username, $password, $database)) {

            //Se a conexão der certo, cria (caso não exista) o arquivo config.inc.php
            //dentro da pasta system e escreve os dados nele.
            file_put_contents('../sistema/config.inc.php',
                '<?php'
              . '    define(\'HOST\', ' . "'{$hostname}'); \n"
              . '    define(\'USER\' ,' . "'{$username}'); \n"
              . '    define(\'PASSWORD\', ' . "'{$password}'); \n"
              . '    define(\'DBNAME\',  ' . "'{$database}'); \n"
              . '    define(\'BASE\', '. "'{$base}'); \n"
              
             

            );

            //Redireciona para próxima etapa, se for o caso.
            header('Location: ./?passo=2');
        } else {
            echo 'Desculpe, mas não foi possível conectar-se ao banco de dados informado.';
        }
    } else {
        echo 'Por favor, preencha os campos corretamente...';
    }
}

require 'header.php';
?>
<body class="hold-transition login-page skin-purple">
<div class="login-box">
  <div class="login-logo">
    <img src="http://www.linksearch.com.br/wp-content/uploads/2014/09/logo.png" />
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Preencha os dados sobre o Banco de dados</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
            <label for="database">Nome do banco</label>
            <input class="form-control" type="text" id="database" name="database"><br>
            </div>
            <div class="form-group has-feedback">
            <label for="username">Usuário</label>
            <input class="form-control" type="text" id="username" name="username"><br>
            </div>
            <div class="form-group has-feedback">
            <label for="password">Senha</label>
            <input class="form-control" type="password" id="password" name="password"><br>
            </div>
            <div class="form-group has-feedback">
            <label for="hostname">Servidor MySQL</label>
            <input class="form-control" type="text" id="hostname" name="hostname" value="localhost"><br>
            </div>
            <div class="form-group has-feedback">
            <label for="base">URL do site</label>
            <input class="form-control" type="text" id="base" name="base">
            <hr>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Ir para próxima etapa</button>
            </div>
        </form>
    </div>
</div>
    </body>
</html>