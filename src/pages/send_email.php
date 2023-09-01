<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipient = 'info@elektrorepairmortsel.be';
    $subject = 'Contact via e-mailformulier Elektro repair Mortsel - ' . $_POST['name'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $emailMessage = "Naam: $name\n";
    $emailMessage .= "Telnr.: $phone\n";
    $emailMessage .= "E-mail: $email\n\n";
    $emailMessage .= "Bericht:\n$message";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    $success = mail($recipient, $subject, $emailMessage, $headers);
    
    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['success' => false]);
}
?>
