<?php

require_once '../config.php';

//Check input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['id'])) {


    $applicant_id = test_input($_POST['id']);
    $story = test_input($_POST['story']);
    $anonymous = test_input($_POST['option']);
   


    $sql = "INSERT INTO survivor_stories (survivor_id,story,anonymous) VALUES (?,?,?)";
    if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param(
            "iss",
            $param_id,
            $param_story,
            $param_an

        ))

            // Set parameters
        $param_id = $applicant_id;
        $param_story = $story;
        $param_an = $anonymous;
       

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Success";
        } else {

            echo  $stmt->error;
            echo "Something went wrong when executing. Please try again later.";
        }
        // Close statement
        $stmt->close();
    }
}
// Close connection
$link->close();
