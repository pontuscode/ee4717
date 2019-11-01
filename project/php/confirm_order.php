<?php
    include "setup_session.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order success</title>
	<link rel="stylesheet" href="../stylesheet.css">
	<script src="../javascript/script.js"></script>
</head>
<body>
<header>
    <div class="shopping_cart">
        <a href="catalogue.php">
            <span id="shopping_cart">
                <div class="cart_image">
                    <?php
                        $total = 0;
                        for($i = 0; $i < count($_SESSION['cart']); $i++){
                            if($_SESSION['cart'][$i] > 0){
                                 $total += $_SESSION['cart'][$i];
                             }
                        }
                        echo $total;
                    ?>
                </div>
            </span>
        </a>
    </div>
</header>
 <div class="navbar">
        <a href="../index.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Home
            </div>
        </a>
        <a href="../menu.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Menu
            </div>
        </a>
        <a href="../deals.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Deals of the day
            </div>
        </a>
        <a href="../jobs.php">
            <div class="navbar_element">
                Jobs
            </div>
        </a>
    </div>
    <?php
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
        do {
            $rand = rand();
            $sql = "SELECT order_id FROM f32ee.de_orders";
            if(!$result = mysqli_query($conn, $sql)){
                echo "Something went wrong when fetching order id from order table: " . mysqli_error($conn);
                return;
            }
        } while($rand === 0); //Check if error message contains "Duplicate". If it does, rand() again.
        $message = "Dear " . $firstName . " " . $lastName . ". Thank you for your order! <br> Your receipt number is $rand, please show this number to the delivery driver! <br><br>You ordered: <br><br>" ;
        $total = 0;
        $sql = "SELECT product_name, product_price FROM f32ee.de_products";
        if(!$result = mysqli_query($conn, $sql)){
            echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
        }
        $sql = "INSERT INTO f32ee.de_orders (order_id, order_date) VALUES ($rand, CURDATE())";
        if(!$hejsan = mysqli_query($conn, $sql)){
            echo "Something went wrong when inserting data into order table: " . mysqli_error($conn);
        }
        for($i = 0; $i < count($_SESSION['cart']); $i++){
             $row = mysqli_fetch_assoc($result);
             if($_SESSION['cart'][$i] > 0){
                $quan = $_SESSION['cart'][$i];
                $message .= $_SESSION['cart'][$i] . "x " . $row['product_name'] . " for $" . ($_SESSION['cart'][$i] * $row['product_price']) . "<br>";
                $sql = "INSERT INTO f32ee.de_sales (receipt_no, product_id, quantity) VALUES ($rand, ($i + 1), $quan)";
                if(!$hejsan = mysqli_query($conn, $sql)){
                    echo "Something went wrong when inserting data into database: " . mysqli_query($conn);
                }
                $_SESSION['cart'][$i] = 0; //Clears the cart.
             }
         }
        $message .= "<br>The items will be delivered to:<br>" . $streetAddress . "<br>" . $zip . "<br>";
        $message .= "<br>Your payment method was by " . $payment_method . ".";
        if($payment_method === 'creditcard'){
            $message .= "<br>Credit card used: **** **** **** " . substr($cc_number, 12, 16) . "<br>";
        }
        $message .= "<br>Confirmation mail sent to " . $to . "<br>";
        echo '<span style="margin-top:30px;display:inherit;color:#FFFF00;text-align:center;">' . $message . '</span>';
        mail($to, $subject, $message);
    ?>
</body>
</html>