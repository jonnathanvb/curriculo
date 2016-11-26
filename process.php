<?php 

try {
    

$name = $_GET["name"];
$email = $_GET["email"];
$message = $_GET["message"];

$corpo = "<b>Nome:</b> " . $name . "<br />";
$corpo .= "<b>email:</b> " . $email . "<br />";
$corpo .= "<b>Messagem:</b> <br />" . str_replace("\n", "<br />", $message) . "<br />";

$htmlPart = new MimePart($corpo);
$htmlPart->type = 'text/html';
$htmlPart->charset = 'utf-8';
$htmlMsg = new MimeMessage();
$htmlMsg->addPart($htmlPart);


$email = new Message();
$email->addTo("jonnathan@smartcodes.com.br", "Jonnathan Venancio");
$email->setSubject("Contato realizado pelo site");
$email->addFrom("administrador@lsacontabil.com", "Contato");

$email->setBody($htmlMsg);



$config = array(
    'host' => 'mx1.hostinger.com.br',
    'connection_class' => 'login',
    'connection_config' => array(
        'ssl' => 'ssl',
        'username' => 'administrador@jonnathanvb.com',
        'password' => 'hinata25'
        ),
    'port' => '465'
    );
$transport = new Smtp();
$option = new SmtpOptions($config);
$transport->setOptions($option);

$transport->send($email);

} catch (Exception $e) {
    echo "false";
    die();
}

echo "sucesso";
