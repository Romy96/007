<?php

// Da Vinci network EDUROAM does not work.
// ICT Academy network ICTA-WLAB 

echo "<h1>Installation</h1>";
echo "Before running this page, install phpmailer";
echo "<pre>composer require phpmailer/phpmailer</pre>";

echo "trying to send email...";

flush();
ob_flush();

//require __DIR__ . '/vendor/autoload.php';
require (ROOT . 'view/login/sendgmail/vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

$mail             = new PHPMailer();

$body             = file_get_contents(ROOT . 'view/login/sendgmail/contents.html');
$body             = eregi_replace("/[\]/i",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->Debugoutput = 'html';
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "davinciAO007@gmail.com";  // GMAIL username
$mail->Password   = "Studentje1";            // GMAIL password

$mail->SetFrom('99034766@mydavinci.nl', '007');
$mail->AddReplyTo("99034766@mydavinci.nl","007");

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "99034766@mydavinci.nl";
$mail->AddAddress($address, "Jurre Kon");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
    