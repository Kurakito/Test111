<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';
require_once 'config.php';


class Mailer {

    private static $mailer = null;

    private static function getMailer()
    {
        if (static::$mailer === null) {
            static::$mailer = new PHPMailer(true);
            //static::$mailer->SMTPDebug = SMTP::DEBUG_SERVER;
            static::$mailer->isSMTP();
            static::$mailer->Host = 'smtp.googlemail.com';
            static::$mailer->SMTPAuth = true;
            static::$mailer->Username = MAIL_USERNAME;
            static::$mailer->Password = MAIL_PASSWORD;
            static::$mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            static::$mailer->Port = 465; 
            static::$mailer->setFrom(MAIL_USERNAME, MAIL_NAME);
            static::$mailer->isHTML(true);
            static::$mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        }

        return static::$mailer;
    }

    public static function sendMessage($to, $subject, $body)
    {
        try{
            $mail = static::getMailer();
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->send();
            return true;
        } catch (Exception $e)
        {
            return false;
        } finally {
            static::$mailer = null;
        }
    }
}