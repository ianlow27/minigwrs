<?php
// Check if the 'message' is passed
if(isset($_POST['message'])) {
    $message = $_POST['message'];
    
    // The recipient email address
    $to = "XXX@XXX.XXX";
    
    // Subject of the email
    $subject = $_POST['subject'];
    
    // Additional headers
    $headers = "From: no-reply@test.com" . "\r\n" .
               "Reply-To: no-reply@test.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if(mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
        
        
        
        
        
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// Ensure POST data exists
if (!isset($_POST['usr']) || !isset($_POST['modref'])) {

}else {

$usr = basename($_POST['usr']);        // sanitize to prevent path traversal
$modref = $_POST['modref'];
$filePath = "./home/$usr.html";

file_put_contents("./home/_1", $filePath );
// Check if the file exists and is writable
if (!file_exists($filePath)) {
    die("User file not found.");
}
file_put_contents("./home/_2", "");
if (!is_writable($filePath)) {
    die("File is not writable.");
}

file_put_contents("./home/_3", "");
// Create a backup
$timestamp = date("Ymd_His");
$backupPath = "./home/{$usr}.bak_{$timestamp}";

if (!copy($filePath, $backupPath)) {
    die("Failed to create backup.");
}

file_put_contents("./home/_4", "");
// Read the file
$fileContents = file_get_contents($filePath);
if ($fileContents === false) {
    die("Failed to read the file.");
}

file_put_contents("./home/_5", "");


// Transform $modref into desired pattern: moduleXYZ-suffix
$modref = preg_replace_callback(
    '/^([a-zA-Z0-9]+)-/',
    function ($matches) {
        // Pad the part before the hyphen to 3 characters with leading zeros
        $padded = str_pad($matches[1], 3, '0', STR_PAD_LEFT);
        return 'modiwl' . $padded . '-';
    },
    $modref
);

$modref .= ".";

// Prepare patterns and replacement
$pattern1 = preg_quote($modref . "html_2do',", '/');
$pattern2 = preg_quote($modref . "html',", '/');

file_put_contents("./home/_6", $modref);

$modifiedContents = preg_replace(
    ["/$pattern1/", "/$pattern2/"],
    $modref . "html_done',",
    $fileContents
);
file_put_contents("./home/_7", "");
// Save changes back to the original file
$result = file_put_contents($filePath, $modifiedContents);

file_put_contents("./home/_8", "");
if ($result === false) {
    die("Failed to write to the file.");
}
file_put_contents("./home/_9", "");
echo "File updated successfully. Backup saved as: " . basename($backupPath);
}//endif

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "No message received.";
}
?>
