<?php
require_once('vendor/autoload.php');
require_once "../../config.php";


\Stripe\Stripe::setApiKey('key');

$POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);

$amount=$POST['amount'];
$token=$POST['stripeToken'];
$application_id=$_POST['application_id1'];


//create customer in STripe

$customer=\Stripe\Customer::create(array(
    "source"=>$token
    
));

//Charge customer

$charge=\Stripe\Charge::create(array(
    "amount"=>$amount*100,
    "currency"=>"lkr",
    "description"=>"Funding",
    "customer"=>$customer->id
));

$con = mysqli_connect("localhost", "root", "", "project");


$sql = "INSERT INTO donations (donator_id,application_id,amount,token ) VALUES (?,?,?,?)";


    if ($stmt = $con->prepare($sql)) {


        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param(
            "iiis",
            $param_did,
            $param_aid,
            $param_amount,
            $param_token,
         
        ))

            // Set parameters
            $param_did=$_SESSION['id'];
            $param_aid=$application_id;
            $param_amount=$amount;
            $param_token=$token;


        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Success";
            header('Location: success.php');
        } else {

            echo  $stmt->error;
            echo "Something went wrong when executing. Please try again later.";
        }
        // Close statement
        $stmt->close();
    }
//redirect 
