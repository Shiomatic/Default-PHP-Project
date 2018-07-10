<?php

use core\mailer;

//# autoload
require_once('/vendor/autoload.php');

// collect data
$firstname  = $_POST['firstname'];
$lastname   = $_POST['lastname'];
$email      = $_POST['email'];
$comment    = $_POST['comment'];

// send mail
$mail = new mailer();
$sending = $mail->send($email, $fistname.' '.$lastname, array('konstantin.haendel@pp-systeme.de'), 'Contact Request', $comment);

echo $sending;