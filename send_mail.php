<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Your email address
    $to = "sarojpokhrel41@gmail.com";
    $subject = "New Message from Website Contact Form";

    // Compose the email
    $body = "You have received a new message from your website contact form.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location = 'index.html';</script>";
    } else {
        echo "<script>alert('Failed to send the message. Please try again later.'); window.location = 'index.html';</script>";
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: index.html");
    exit();
}
?>
