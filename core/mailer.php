<?php

namespace core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * sending mails
 *
 * mailer description.
 *
 * @version 1.0
 * @author konstantin.haendel
 */
class mailer
{
    public $mailer;
    public $config;
    private $response;
    public function __construct() {
        $this->mailer = new PHPMailer();
        $config = new config();
        $this->config = $config->config;
        $this->response = (object) array(
                'error' => array(),
                'success' => array(),
            );
    }
    /**
     * sending an email through smtp set in app config
     * @param string $fromemail email-address of sender
     * @param string $fromname name of sender
     * @param array $to collection of recipients (names and email addresses or just email addresses)
     * @param string $replytoemail email-address for reply
     * @param string $replytoname name for reply
     * @param array $cc collection of carbon copy recipients (names and email addresses or just email addresses)
     * @param string $subject subject of email
     * @param string $body email content
     * @param string $altbody alternative email content
     * @param array $attachements email attachements with relative paths (paths and additional names or just paths)
     * @return object repsonse with error and success
     */
    public function send($from_email, $from_name, $to, $subject, $body, $replyto_email = '', $replyto_name = '', $cc = array(),  $altbody = '', $attachements = array()) {
        if($this->config->mail->host) {
            // set default values
            if($from_email) $from_email = $this->config->mail->username;
            if($replyto_email) $replyto_email = $this->config->mail->username;

            if($from_email) {
                if($subject) {
                    //Server settings
                    $this->mailer->SMTPDebug    = 2;
                    $this->mailer->isSMTP();
                    $this->mailer->Host         = $this->config->mail->host;
                    $this->mailer->SMTPAuth     = true;
                    $this->mailer->Username     = $this->config->mail->username;
                    $this->mailer->Password     = $this->config->mail->password;
                    $this->mailer->SMTPSecure   = $this->config->mail->secure;
                    $this->mailer->Port         = $this->config->mail->port;

                    //Recipients
                    $this->mailer->setFrom($from_email, $from_name);

                    foreach($to as $rec) {
                        if($rec['name']) {
                            $this->mailer->addAddress($rec['email'], $rec['name']);
                        }
                        else {
                            $this->mailer->addAddress($rec);

                        }
                    }
                    $this->mailer->addReplyTo($replyto_email, $replyto_name);
                    if(count($cc)) {
                        foreach($cc as $rec) {
                            if($rec['name']) {
                                $this->mailer->addCC($rec['email'], $rec['name']);
                            }
                            else {
                                $this->mailer->addCC($rec);
                            }
                        }
                    }

                    //Attachments
                    if(count($attachements)) {
                        foreach($attachements as $att) {
                            if($att['name']) {
                                $this->mailer->addAttachment($att['path'], $att['name']);
                            }
                            else {
                                $this->mailer->addAttachment($att);
                            }
                        }
                    }

                    //Content
                    $this->mailer->isHTML(true);
                    $this->mailer->Subject = $subject;
                    $this->mailer->Body    = $body;
                    $this->mailer->AltBody = $altbody;

                    $this->mailer->send();

                    // collect error
                    $this->response->error[] = $this->mailer->ErrorInfo;
                }
                else {
                    $this->response->error[] = 'no subject available';
                }
            }
            else {
                $this->response->error[] = 'no sender email address detected';
            }
        }
        else {
            $this->response->error[] = 'missing or incorrect smtp settings';
        }

        return $this->response;
    }
}