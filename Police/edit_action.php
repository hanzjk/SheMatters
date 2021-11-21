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
    $uname = test_input($_POST['update_name']);
    $pname=test_input($_POST['update_pname']);
    $tel = test_input($_POST['update_tel']);
    $addr = test_input($_POST['update_addr']);

    $email_err = false;
    $sql = "SELECT * FROM police_users WHERE police_id='" . $uid . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);

    // Prepare a select statement
    $sql = "SELECT police_id FROM police_users WHERE police_username = ?";

    if ($stmt = $link->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_email);

        // Set parameters
        $param_email = $uname;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            /* store result */
            $stmt->store_result();

            if ($stmt->num_rows() >= 1 && $uname != $data['police_username']) {
                echo "email_duplicate";
                $email_err = true;
            }
        }
        // Close statement
        $stmt->close();
    }



    if ($email_err === false ) {

        $sql = "UPDATE police_users SET police_username = ? , police_name = ? , police_contact = ?, police_address=?  WHERE police_id=?";
        if ($stmt = $link->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            if ($stmt->bind_param("ssssi", $param_uname,$param_name, $param_contact, $param_addr, $param_id))

                // Set parameters
           $param_uname=$uname;
           $param_name=$pname;
           $param_contact=$tel;
           $param_addr=$addr;
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $action = "updated";
                echo $action . "#" . $pname;
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

    $sql = "SELECT * FROM police_users WHERE police_id='" . $uid . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);

    $pass_err = $cpass_err=false;


    if ($new_pass != $confirm_pass) {
        echo "mismatch";
        $cpass_err = true;
    }
   else  if (!password_verify($password, $data['police_pwd'])) {
        echo "invalid_pwd";
        $pass_err=true;
    }


    else if ($pass_err === false && $cpass_err===false) {

        $hashPass = password_hash($new_pass, PASSWORD_DEFAULT);

        // Prepare an insert statement
        $sql = "UPDATE police_users SET police_pwd = '" . $hashPass . "' WHERE  police_id='" . $uid . "'";
        $update = mysqli_query($link, $sql);
        if ($update) {

            $action = "updated";
            echo "updated";
        } else {
            echo "Something went wrong when executing. Please try again later.";
        }
    }
}
