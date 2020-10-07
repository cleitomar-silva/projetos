<?php

include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/SMTP.php";

$email = new PHPMailer\PHPMailer\PHPMailer();
$email->isSMTP();

$email->Port ="465";
$email->Host = "smtp.gmail.com";
$email->IsHTML(true);
$email->SMTPSecure = "ssl";
$email->Mailer = "smtp";
$email->CharSet = "UTF-8";

$email->SMTPAuth = true;
$email->Username = "cleitomarrodrigues@gmail.com";
$email->Password = "cle8844@";

$email->SingleTo = true;

$email->From = "cleitomarrodrigues@gmail.com";
$email->FromName = "Equipe Sistema de Acesso";
$email->addAddress("cleitomarrodrigues@gmail.com");
$email->Subject = "Confirmação do endereço de email";
$email->Body = "Esse é um email de teste";

if(!$email->send()){
    echo $email->ErrorInfo;
}




