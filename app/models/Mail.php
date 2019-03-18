<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require dirname(dirname(__FILE__)).'/libraries/vendor/PHPMailer/src/Exception.php';
require dirname(dirname(__FILE__)).'/libraries/vendor/PHPMailer/src/PHPMailer.php';
require dirname(dirname(__FILE__)).'/libraries/vendor/PHPMailer/src/SMTP.php';

class Mail {

    public function __construct(){
        // Bla bla bla
    }

    public function sendActivationMail($sendaddress, $activationcode){
        $mail = new PHPMailer();

        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "ts3adresim@gmail.com";
        $mail->Password = "holidaytest07";
        $mail->setFrom('ts3adresim@gmail.com', 'Teamspeak Adresim');
        $mail->addAddress($sendaddress);
        $mail->Subject = 'ALKÜ Personel İzin Takip Sistemi - Aktivasyon Kodu';
        $mail->msgHTML('Aktivasyon kodunuz: <b>'.$activationcode.'</b>');
        if(!$mail->send()){
            //echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        }else{
            //echo "Message sent!";
            return true;
        }
    }

}