<?php


namespace app\Service;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


class MailerService
{
    protected PHPMailer $mailer;

    public function __construct() {

        $this->mailer = new PHPMailer();
        // Настройки SMTP
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.example.com';
        $this->mailer->Port = 587;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'your_username@example.com';
        $this->mailer->Password = 'your_password';
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->setFrom('your_username@example.com', 'Your Name');

    }

    public function sendEmail($to, $subject, $body) {
        try {

            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function templateMail($path, $data) {

        $data = $data;
        return include $path;
    }
}