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
    $emp = test_input($_POST['emp']);
    $income = test_input($_POST['income']);
    $reason = test_input($_POST['reason']);
    $use = test_input($_POST['use']);
    $amount = test_input($_POST['amount']);
    $ref_name = test_input($_POST['r_name']);
    $ref_contact = test_input($_POST['r_contact']);
    $account = test_input($_POST['account']);
    $branch = test_input($_POST['branch']);
    $bankname= $_POST['bankName'];///////////////////



    $sql = "INSERT INTO applications (applicant_id,emp_state,income,reason,use_fund,amount,
    ref_name,ref_contact,accountNo,branch,bank) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param(
            "isississsss",
            $param_id,
            $param_emp,
            $param_income,
            $param_reason,
            $param_use,
            $param_amount,
            $param_refName,
            $param_refContact,
            $param_account,
            $param_branch,
            $param_bank

        ))

            // Set parameters
        $param_id = $applicant_id;
        $param_emp = $emp;
        $param_income = $income;
        $param_reason = $reason;
        $param_use = $use;
        $param_amount = $amount;
        $param_refName = $ref_name;
        $param_refContact = $ref_contact;
        $param_account = $account;
        $param_branch = $branch;
        $param_bank=$bankname;



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
