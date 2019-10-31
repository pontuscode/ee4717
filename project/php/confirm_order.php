<!DOCTYPE html>
<html>
<body>
<h1>Success!</h1>
<?php
    include "setup_session.php";
    include "db_connect.php";
    $to = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $streetAddress = $_POST['streetaddress'];
    $zip = $_POST['zipcode'];
    $payment_method = $_POST['payment_method'];
    if($payment_method === 'creditcard'){
        $cc_number = $_POST['creditcard_number'];
    }

    $subject = "Order confirmation";
    $message = "Dear " . $firstName . " " . $lastName . ". Thank you for your order! <br> You ordered: <br><br>" ;
    $total = 0;
    $sql = "SELECT product_name, product_price FROM f32ee.de_products";
    if(!$result = mysqli_query($conn, $sql)){
        echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
    }
    for($i = 0; $i < count($_SESSION['cart']); $i++){
         $row = mysqli_fetch_assoc($result);
         if($_SESSION['cart'][$i] > 0){
            $message .= $_SESSION['cart'][$i];
            $message .= " ";
            $message .= $row['product_name'] . " for $" . ($_SESSION['cart'][$i] * $row['product_price']) . ".";
            $message .= "<br>";
         }
     }
    $message .= "<br>The items will be delivered to:<br>" . $streetAddress . "<br>" . $zip . "<br>";
    $message .= "<br>Your payment method was by " . $payment_method . ".";
    if($payment_method === 'creditcard'){
        $message .= "<br>Credit card used: **** **** **** " . substr($cc_number, 12, 16) . "<br>";
    }
    echo "$message";
    mail($to, $subject, $message);
    echo("Confirmation mail sent to " . $to);
?>

</body>
</html>