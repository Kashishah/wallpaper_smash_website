<?php
// include_once "../includes/session.php";
?>

<?php

$to = $_POST['user_email'];
$security_code = rand(100000, 999999);
$_SESSION["security_code"] = $security_code;


$subject = "Password Reset Security Code";
$message = "Dear {$to},<br><br>";
$message .= "We've received a request to reset the password associated with your account. To ensure the security of your account, we need to verify your identity.<br><br>";
$message .= "Please use the following security code to proceed with the password reset process:<br><br>";
$message .= "Security Code:  <span style='color: blue; text-decoration: underline;'>{$security_code}</span><br><br>";
$message .= "Once you receive this email, please navigate back to the password reset page and enter the security code provided above. If you did not request this password reset, please ignore this email. Your account security is important to us.<br><br>";
$message .= "Thank you for your cooperation.<br><br>";
$message .= "Best regards,<br>";
$message .= "[Kashish Shah]<br>";
$message .= "[CEO]<br>";
$message .= "[Contact Information : 9925867805]";

$header = "From: wallpapersmash@wallpapersmash.com \r\n";
$header .= "Content-type: text/html; charset=UTF-8\r\n";

$result = mail($to, $subject, $message, $header);

if ($result == true) {
    echo 1;
} else {
    echo 0;
}


?>