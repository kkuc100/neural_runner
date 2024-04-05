<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Validate input (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($message)) {
        // If any field is empty, redirect back to the contact page with an error message
        header("Location: contact.php?error=empty_fields");
        exit();
    }

    // Create the email content
    $to = "kkuc234@gmail.com";
    $subject = "New Contact Form Submission";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $email_body)) {
        // If the email is sent successfully, redirect back to the contact page with a success message
        header("Location: contact.php?success=true");
        exit();
    } else {
        // If there's an error sending the email, redirect back to the contact page with an error message
        header("Location: contact.php?error=email_failed");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to the contact page
    header("Location: contact.php");
    exit();
}

