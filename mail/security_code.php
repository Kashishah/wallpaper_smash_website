<?php
// include_once "../includes/session.php";
?>

<?php
$session_security_code = $_SESSION['security_code'];
$security_code = $_POST['security_code'];

echo "session :", $session_security_code, "<br>";
echo "post data :", $security_code;


if ($session_security_code === $security_code) {
    echo "same";
} else {
    echo "different";
}
