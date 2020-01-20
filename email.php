<?php 
 require_once('phpmailer/PHPMailer.php');
 require_once('phpmailer/Exception.php');
 require_once('phpmailer/SMTP.php');
 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP(); 
 $mail->CharSet = 'UTF-8';
 //$mail->True;
 $mail->Host = "smtp.gmail.com"; // Servidor SMTP
 $mail->SMTPSecure = "tls"; // conexão segura com TLS
 $mail->Port = 587; 
 $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
 $mail->Username = "jerrymoon12345@gmail.com"; // SMTP username
 $mail->Password = ""; // SMTP password
 $mail->From = "jerrymoon12345@gmail.com"; // From
 $mail->FromName = "Le Cube" ; // Nome de quem envia o email
 $mail->AddAddress($email, $nome); // Email e nome de quem receberá //Responder
 $mail->WordWrap = 50; // Definir quebra de linha
 $mail->IsHTML = true ; // Enviar como HTML
 $mail->Subject = "Aprenda cubo mágico!" ; // Assunto
 $mail->AddAttachment("C:/xampp/www/ProjetoCalina/camadas.pdf", "Apostila.pdf");
 $mail->Body = 'Olá '.$nome.', segue em anexo a apostila com todas as dicas necessárias para você finalmente conseguir resolver o cubo mágico!';


if(!$mail->Send()) // Envia o email
 { 
 echo "Erro no envio da mensagem  :  " . $mail->ErrorInfo;
 } 

 header('Location: index.html');
?>