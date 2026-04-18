<?php
if (isset($_POST["submit"])) {
    $name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim(strip_tags($_POST['message'])) : '';
    $subject = 'Portfolio Contact Form Message';

    if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.html");
        exit;
    }

    $to = 'muhammad.munajad96@gmail.com';
    $body = "From: $name\nE-Mail: $email\nSubject: $subject\nMessage:\n$message";
    $headers = "From: Portfolio Website <no-reply@localhost>\r\n";
    $headers .= "Reply-To: $email\r\n";

    mail($to, $subject, $body, $headers);
    header("Location: thank-you.html");
    exit;
}
?>
