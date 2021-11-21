<?php
date_default_timezone_set('Asia/Colombo');

require_once 'config.php';

//Check input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    $username= test_input($_POST['username']);
    $pwd= test_input($_POST['pwd']);
    $name= test_input($_POST['name']);
      $dist= test_input($_POST['dist']);
      $contact= test_input($_POST['contact']);
      $addr= test_input($_POST['addr']);

    $sql = "INSERT INTO police_users (police_username, police_pwd, police_name, police_district, police_contact, police_address,created_at) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param("sssssss", $param_username, $param_pwd, $param_name, $param_district, $param_contact, $param_addr,$param_date))

            // Set parameters
      $param_username=$username;
      $param_pwd = password_hash($pwd, PASSWORD_DEFAULT); // Creates a password hash

      $param_name=$name;
      $param_district=$dist;
      $param_contact=$contact;
      $param_addr=$addr;
      $param_date=date('Y-m-d H:i:s');

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "success";
        } else {
         echo $stmt->error;
        // echo "Something went wrong when executing. Please try again later.";
        }
        // Close statement
        $stmt->close();
    }
