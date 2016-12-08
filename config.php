<?php
/*Pre Configuartion*/
//Set TZ
date_default_timezone_set('Etc/UTC');

//Using PHPMailer (Look in CREDITS)
require './includes/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP(); //Tell PHPMailer to use SMTP

//Set SMTP Server Configuration
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';

//get cards count
$cards = new FilesystemIterator(__DIR__."/cards", FilesystemIterator::SKIP_DOTS);
$cards = iterator_count($cards);
/*END Pre Configuration*/

/*User Configuartion*/
//Set your mail address
$mail->Username = "username";
$mail->Password = "password";

//Set Headers
//Use the first one if you want to give a different 'From address'
$mail->setFrom('fromAddress', 'B\'Day Greeter');
//$mail->setFrom($mail->Username, 'B\'Day Greeter');

//Set an alternative reply-to address (optional)
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set the subject line
$mail->Subject = 'B\'Day Greeter';

//Confiure SQL Connection
$servername = "localhost";
$username = "guru";
$password = "1123581321";
/*END User Configuartion*/ 
?>

