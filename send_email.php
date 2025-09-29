<?php
// Check if the 'message' is passed
if(isset($_POST['message'])) {
    $message = $_POST['message'];
    
    // The recipient email address
    $to = "ianlow27@gmail.com";
    
    // Subject of the email
    $subject = $_POST['subject'];
    
    // Additional headers
    $headers = "From: no-reply@test.com" . "\r\n" .
               "Reply-To: no-reply@test.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if(mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "No message received.";
}
?>
