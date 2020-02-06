<?php
require_once('PHPMailer/PHPMailerAutoload.php');
class Mail {
        public static function sendMail($subject, $body, $address) {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465';
                $mail->isHTML();
                $mail -> Username = 'jgordon9501@gmail.com';
                $mail -> Password = 'oshtakokapan1!2';
                $mail -> SetFrom('noreply@zencompliancetracker');
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($address);

                $mail->Send();
        }
}
?>
