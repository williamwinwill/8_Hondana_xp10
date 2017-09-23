<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$error = "";
$errorMessage = 'Desculpe sua mensagem não foi enviada.';

if(empty($name)||empty($email)||empty($message)) {
    echo "Nome e e-mail campos obrigatórios !";
    header('Location: index.html');
}

$msg =  " Name : $name \r\n"; 
$msg .= " Email: $email \r\n";
$msg .= " Message : ".stripslashes($_POST['message'])."\r\n\n";

$recipient = "carlatorrico@gmail.com";
$sujet =  "E-mail enviado";
$mailheaders = "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n";

if (!$error){
    $sending = mail($recipient, $sujet, $msg, $mailheaders);
    if ($sending) {
            echo "Enviando";
        } else {
            echo $errorMessage;
        }
} else {
    echo $error;
}