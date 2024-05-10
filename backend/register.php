<?php
include_once 'includes/conn.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    try {
        $data = $_POST;
        $tableName = 'user_account';

        $data_keys = array_keys($data);
        $data_fields = implode(',', $data_keys);

        $data_values = array_values($data);
        $data_values = implode("','", $data_values);



        $sql = "INSERT INTO {$tableName} ({$data_fields})
        VALUES ('$data_values');";

        if ($conn->query($sql) === TRUE) {
            echo 1;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    } catch (Exception $e) {

    }




}

?>