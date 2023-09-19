<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $recipient = 'info@elektrorepairmortsel.be';
        $subject = 'Contact via e-mailformulier Elektro repair Mortsel - ' . $_POST['name'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $typenumber = $_POST['typenumber'];
        $message = $_POST['message'];

        $mail->setFrom($_ENV['MAIL_USERNAME'], 'Elektro repair Mortsel');
        $mail->addAddress($recipient, 'Elektro repair Mortsel');

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = "Naam: $name\nTelnr.: $phone\nE-mail: $email\n\nTypenummer toestel: $typenumber\n\nBericht:\n$message";

        $mail->send();
        echo json_encode(['success' => $_POST]);
    } catch (Exception $e) {
        echo json_encode(['no-succes' => $e->getMessage()]);
    }
}
