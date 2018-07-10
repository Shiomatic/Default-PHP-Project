<?php

use core\mailer;

ini_set('display_errors', 0);

// autoload
require_once(__DIR__ . '/vendor/autoload.php');

// preset
$mail = new mailer();
$response = '';

switch($_POST['action']) {
    case 'contact':
        // collect data
        $firstname  = $_POST['firstname'];
        $lastname   = $_POST['lastname'];
        $email      = $_POST['email'];
        $comment    = $_POST['comment'];
        $to = array(
                array(
                    'name' => 'Konstantin Haendel',
                    'email' => 'konstantin.haendel@pp-systeme.de',
                )
            );

        // send mail
        $sending = $mail->send($email, $fistname.' '.$lastname, $to, 'Contact Request', $comment);

        $response = $sending;
        break;
    default:
        break;
}

print_r($response);
#echo json_encode($response);
