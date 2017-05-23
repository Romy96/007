<?php
if(isset($_POST['email'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jurre.kon@gmail.com";
    $email_subject = "Afspraak of Vraag";
 
    function died($error) {
        // your error code can go here
        echo "Onze excuses, er zijn wat problemen ontstaan tijdens het versturen. ";
        echo "Zie onderstaande problemen.<br /><br />";
        echo $error."<br /><br />";
        echo "Klik op de terug knop om deze problemen op te lossen.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['email']) || !isset($_POST['telephone']) || !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $first_name = $_POST['first_name']; // required 
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$first_name)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }

    if(!preg_match($string_exp,$last_name)) {
        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    }

    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }
 
    if(strlen($error_message) > 0) {
        died($error_message);
    }
 
    $email_message = "Contact gegevens\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message .= "Voornaam: ".clean_string($first_name)."\n"; 
    $email_message .= "Achternaam: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telefoon: ".clean_string($telephone)."\n";
    $email_message .= "Vraag of afspraak: ".clean_string($comments)."\n";
 
    // create email headers

    $headers = 'From: '.$email_from."\r\n". 
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  

    // header('location: verzonden.php');
 
	// $redirect = "";
	// if(!isset($_GET["redirect"])){
	// 	$redirect = 'Contact.php';
 //    }
	// else{
	// 	$redirect = str_replace("_","/",$_GET["redirect"].".php");
 //    }
}
?>