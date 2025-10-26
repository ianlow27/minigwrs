<?php
$lspeeddesc="done";
if(isset($_POST['speeddesc'])){
  $lspeeddesc=$_POST['speeddesc'];
}
// The recipient email address
$to = "???@???.???";
// Additional headers
$headers = "From: no-reply@test.com" . "\r\n" .
       "Reply-To: no-reply@test.com" . "\r\n" .
       "X-Mailer: PHP/" . phpversion();
// Check if the 'message' is passed
date_default_timezone_set('Europe/London');
$ldate = date("ymd-hi");
file_put_contents("./_11", $_POST['homepage'] );
if(isset($_POST['message'])) {
    $message = $_POST['message'];
    // Subject of the email
    //$subject = $_POST['subject'] . " ". $ldate;
    $subject =  "WlshHmwrk_". $ldate. ": ". $_POST['message'];
    // Send the email
    if(mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
        addStarToButton($_POST['modref'], $_POST['homepage']);      
    } else {
        echo "Failed to send email.";
    }
} else if(isset($_POST['essay'])) {
    $homeURL =  $_POST['homeurl'] ;
    $message =  $_POST['essay'] ;
    // Subject of the email
    $subject = $_POST['initials'] . " (". $_POST['module'].") Essay" . " ". $ldate;
    // Send the email
    if(mail($to, $subject, $message, $headers)) {
        echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Essay Submitted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 60px;
            background-color: #f9f9f9;
        }

        .home-icon {
            font-size: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        .message {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .instructions {
            font-size: 18px;
            color: #666;
        }

        .home-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <!-- Home Icon -->
    <a href="'. $homeURL .'" class="home-icon" title="Go to Home Page">🏠</a>

    <!-- Thank You Message -->
    <div class="message">Thank you for submitting your essay!</div>

    <!-- Instructions -->
    <div class="instructions">To return to your exercise homepage please click on the home icon above.</div>

</body>
</html>        
        
        ';
        
        addStarToButton($_POST['module'], $_POST['homeurl']);          
        
    } else {
        echo "Failed to send email.";
    }
        
    
    
    
    
} else {
    echo "No message received.";
}



function addStarToButton($modref, $homepage){
global $lspeeddesc;    
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// Ensure POST data exists
//if (!isset($_POST['usr']) || !isset($_POST['modref'])) {
if (!isset($homepage) || !isset($modref)) {
file_put_contents("./_0a", $_POST['homepg'] );
}else {
    
file_put_contents("./_0",  $_POST['homepg'] );    

$usr = basename($homepage);        // sanitize to prevent path traversal
$usr = pathinfo($usr, PATHINFO_FILENAME);

$filePath = "./$usr.html";

file_put_contents("./_1", $filePath );
// Check if the file exists and is writable
if (!file_exists($filePath)) {
    die("User file not found.");
}
file_put_contents("./_2", "");
if (!is_writable($filePath)) {
    die("File is not writable.");
}

file_put_contents("./_3", "");
// Create a backup
$timestamp = date("Ymd_His");
$backupPath = "./{$usr}.bak_{$timestamp}";

if (!copy($filePath, $backupPath)) {
    die("Failed to create backup.");
}

file_put_contents("./_4", "");
// Read the file
$fileContents = file_get_contents($filePath);
if ($fileContents === false) {
    die("Failed to read the file.");
}

file_put_contents("./_5", "");


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

//cheetah, lion, horse, hare, elk, zebra, kangaroo, squirrel      
// Prepare patterns and replacement
$pattern1 = preg_quote($modref . "html_2do',", '/');
$pattern2 = preg_quote($modref . "html',", '/');
$pattern3 = preg_quote($modref . "html_done',", '/');
$pattern4 = preg_quote($modref . "html_cheetah',", '/');
$pattern5 = preg_quote($modref . "html_lion',", '/');
$pattern6 = preg_quote($modref . "html_horse',", '/');
$pattern7 = preg_quote($modref . "html_hare',", '/');
$pattern8 = preg_quote($modref . "html_elk',", '/');
$pattern9 = preg_quote($modref . "html_zebra',", '/');
$pattern10 = preg_quote($modref . "html_kangaroo',", '/');
$pattern11 = preg_quote($modref . "html_squirrel',", '/');

file_put_contents("./_6", $modref . "__". $lspeeddesc);


//---------------------------------------------
if( ($lspeeddesc == "cheetah")
|| ($lspeeddesc == "lion")
|| ($lspeeddesc == "horse")
|| ($lspeeddesc == "hare")
|| ($lspeeddesc == "elk")
|| ($lspeeddesc == "zebra")
|| ($lspeeddesc == "kangaroo")
|| ($lspeeddesc == "squirrel")
){
  $modifiedContents = preg_replace( ["/$pattern1/", "/$pattern2/", "/$pattern3/", "/$pattern4/", "/$pattern5/", "/$pattern6/", "/$pattern7/", "/$pattern8/", "/$pattern9/", "/$pattern10/", "/$pattern11/"],
    $modref . "html_". $lspeeddesc. "',", $fileContents );

}else {
  $modifiedContents = preg_replace( ["/$pattern1/", "/$pattern2/", "/$pattern3/", "/$pattern4/", "/$pattern5/", "/$pattern6/", "/$pattern7/", "/$pattern8/", "/$pattern9/", "/$pattern10/", "/$pattern11/"],
    $modref . "html_done',", $fileContents );
}
//---------------------------------------------

file_put_contents("./_7", "");
// Save changes back to the original file
$result = file_put_contents($filePath, $modifiedContents);

file_put_contents("./_8", "");
if ($result === false) {
    die("Failed to write to the file.");
}
file_put_contents("./_9", "");
//echo "File updated successfully. Backup saved as: " . basename($backupPath);
}//endif
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
}

?>
