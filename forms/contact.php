<?php
  // Replace with your email address
  $receiving_email_address = 'loik.daigle@protonmail.com';

  // Check if the form is submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate input fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
      die('Error: All fields are required.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      die('Error: Invalid email address.');
    }

    // Create the email content
    $email_content = "From: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($receiving_email_address, $subject, $email_content, $email_headers)) {
      echo 'Message sent successfully!';
    } else {
      echo 'Error: Unable to send your message. Please try again later.';
    }
  } else {
    die('Error: Invalid request.');
  }
?>
