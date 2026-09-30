<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    public static function send(
        string $to,
        string $subject,
        string $body,
        string $altBody = ''
    ): bool {

        $mail = new PHPMailer(true);

        try {

            // SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;

            $mail->Username   = 'be.yourself61@gmail.com';
            $mail->Password   = STMPPASS;

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Sender
            $mail->setFrom(
                'YOUR_GMAIL@gmail.com',
                'UniYar'
            );

            // Receiver
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $altBody ?: strip_tags($body);

            $mail->send();

            return true;

        } catch (Exception $e) {

            // فعلاً برای توسعه
            error_log('UniYar Mail Error: ' . $mail->ErrorInfo);

            return false;
        }
    }
}