<?php
include_once 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Fetch email and password through AJAX
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];


    // giving table name manually 
    $tableName = 'user_account';

    // giving column fields
    $column_fields = [
        'email' => 'user_email',
        'password' => 'user_password'
    ];

    // Create a select query
    $sql = "SELECT `{$column_fields['email']}`,`{$column_fields['password']}`  FROM {$tableName} WHERE `{$column_fields['email']}` = '{$email}';";

    // execute the query and store in result 
    $result = $conn->query($sql);

    // This condition checks result stores only one row or not because everyone has a different credentials 
    if ($result->num_rows == 1) {

        // $row stores fetch data from $result  using fetch_Assoc()
        $row = $result->fetch_assoc();

        // fieldpassword stores the password from sql database
        $fieldPassword = $row['user_password'];

        // checks the hash password matches the password
        if (password_verify($password, $fieldPassword)) {
            // If all the credentials are right then it sends response to the ajax 1; 
            echo '1';
        } else {
            // If only password is wrong then it sends response to the ajax 2; 
            echo '2';
        }
    } else {
        // if email not match in DB then ut sends 0 to the ajax 
        echo 0;
    }


}

?>