<?php

require_once 'config.php';

//Check input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['id'])  && isset($_POST['action']) && $_POST['action'] == 'edit_profile') {
    
    
    $uid = $_POST['id'];
    $name = test_input($_POST['update_name']);
    $nic = test_input($_POST['update_nic']);
    $tel = test_input($_POST['update_tel']);
    $email = test_input($_POST['update_email']);
    $addr = test_input($_POST['update_addr']);

    $email_err = $nic_err = false;
    $sql = "SELECT * FROM users WHERE id='" . $uid . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);

    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE email = ?";

    if ($stmt = $link->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_email);

        // Set parameters
        $param_email = $email;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            /* store result */
            $stmt->store_result();

            if ($stmt->num_rows() >= 1 && $email != $data['email']) {
                echo "email_duplicate";
                $email_err = true;
            }
        }
        // Close statement
        $stmt->close();
    }


    $sql = "SELECT id FROM users WHERE nic = ? ";

    if ($stmt = $link->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_nic);

        // Set parameters
        $param_nic = $nic;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            /* store result */
            $stmt->store_result();

            if ($stmt->num_rows() >= 1 && $nic != $data['nic']) {
                echo "nic_duplicate";
                $nic_err = true;
            }
        }
        // Close statement
        $stmt->close();
    }


    if ($email_err === false && $nic_err === false) {

        $sql = "UPDATE users SET name=? , nic=?,contactNo=?,homeAddress=?, email=? WHERE id=?";
        if ($stmt = $link->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            if ($stmt->bind_param("ssssss", $param_name, $param_nic, $param_contact, $param_address, $param_email, $param_id))

                // Set parameters
                $param_name = $name;
            $param_nic = $nic;
            $param_contact = $tel;
            $param_address = $addr;
            $param_email = $email;
            $param_id = $uid;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $action = "updated";
                echo $action . "#" . $name;
            } else {

                echo "Something went wrong when executing. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }
}


if (isset($_POST['id'])  && isset($_POST['action']) && $_POST['action'] == 'password_change') {

    $uid = $_POST['id'];
    $password = test_input($_POST['old_pass']);
    $new_pass = test_input($_POST['new_pass']);
    $confirm_pass = test_input($_POST['confirm_pass']);

    $sql = "SELECT * FROM users WHERE id='" . $uid . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);

    $pass_err = $cpass_err=false;


    if ($new_pass != $confirm_pass) {
        echo "mismatch";
        $cpass_err = true;
    }
   else  if (!password_verify($password, $data['password'])) {
        echo "invalid_pwd";
        $pass_err=true;
    }


    else if ($pass_err === false && $cpass_err===false) {

        $hashPass = password_hash($new_pass, PASSWORD_DEFAULT);

        // Prepare an insert statement
        $sql = "UPDATE users SET password = '" . $hashPass . "' WHERE  id='" . $uid . "'";
        $update = mysqli_query($link, $sql);
        if ($update) {

            $action = "updated";
            echo "updated";
        } else {
            echo "Something went wrong when executing. Please try again later.";
        }
    }
}
