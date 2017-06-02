<?php
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jurre.kon@gmail.com";
    $email_subject = "Nieuw wachtwoord";

    $email_message = "";
 
    // create email headers

    $headers = 'From: '.$email_from."\r\n". 
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
?>