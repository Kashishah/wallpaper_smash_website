<?php

include_once 'includes/conn.php';

$email = $_POST['user_email'];
$tableName = 'user_account';


$sql = "SELECT `user_email` FROM {$tableName} WHERE user_email = '{$email}' ;";
// echo $sql;

$result = $conn->query($sql);


if ($result->num_rows != 0) {
    echo 1;
} else {
    echo 0;
}

?>