<?php
ob_start(); // Start output buffering

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = "thoriqmahendrasekolah@gmail.com"; // Replace this with your email address
        $subject = "New Message from Contact Form";
        $body = "Name: $name\nEmail: $email\nMessage: $message";

        if (mail($to, $subject, $body)) {
            header("Location: index.html"); // Redirect back to the original HTML page
            exit();
        } else {
            echo "Failed to send message. Please try again.";
        }
    } else {
        echo "Please fill out all the fields in the form.";
    }
}

ob_end_flush(); // Flush the output buffer
?>