<?php
$msg = $_POST['msg'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$arquivo = $_FILES['logo'];
$assunto = $_POST['assunto'];
if($assunto == ''): $assunto = 'Nova Interação no Cronograma'; endif;
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require_once("phpmailer/class.smtp.php");
require_once("phpmailer/class.phpmailer.php");
// Inicia a classe PHPMailer

$mail = new PHPMailer();
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
$mail->Port = 587;
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'arrezende@gmail.com'; // Usuário do servidor SMTP
$mail->Password = '4l3x1989'; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "relatorios@linksearch.com.br"; // Seu e-mail
$mail->FromName = "FreeLa"; // Seu nome
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress($email, $nome);
//$mail->AddAddress('arrezende@gmail.com');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
$mail->CharSet = 'UTF-8';
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = $assunto; // Assunto da mensagem
$mail->Body = $msg;
$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );  // Insere um anexo

 //Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
// Exibe uma mensagem de resultado
