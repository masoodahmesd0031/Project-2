<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "Info@batcontracting.com";  // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email content
    $email_content = "
    <html>
    <head>
        <title>Contact Form Submission</title>
    </head>
    <body>
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Phone:</strong> {$phone}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong></p>
        <p>{$message}</p>
    </body>
    </html>
    ";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you for your message. We will get back to you shortly.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    echo "There was a problem with your submission. Please try again.";
}
?>
