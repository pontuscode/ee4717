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
    <div class="header_div">
        <a href="../index.php">
            <img src="../media/pics/header_pic.png" class="header_pic">
        </a>
            <div class="shopping_cart">
                <a href="../catalogue.php">
                    <span id="shopping_cart">
                        <div class="cart_image">
                            <?php
                                echo '0';
                            ?>
                        </div>
                    </span>
                </a>
            </div>
        <div class="navbar">
            <a href="../jobs.php">
                <div class="navbar_element">
                    Jobs
                </div>
            </a>
            <a href="../deals.php">
                <div class="navbar_element">
                    Deals of the Day
                </div>
            </a>
            <a href="../menu.php">
                <div class="navbar_element">
                    Menu
                </div>
            </a>
            <a href="../index.php">
                <div class="navbar_element">
                    Home
                </div>
            </a>
        </div>
    </div>
    <div class="wrapper">
        <?php
            include "db_connect.php";
            $to = 'f32ee@localhost';
            $email = $_POST['email'];
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $streetAddress = $_POST['streetaddress'];
            $zip = $_POST['zipcode'];
            $payment_method = $_POST['payment_method'];
            $subject = "Order confirmation";
            $headers = 'From: f32ee@localhost' . "\r\n" .
            'Reply-To: f32ee@localhost' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            if($payment_method === 'creditcard'){
                $cc_number = $_POST['creditcard_number'];
            }

            do {
                $rand = rand();
            } while($rand === 0);
            $message = "Dear " . $firstName . " " . $lastName . ". Thank you for your order! <br> Your receipt number is $rand, please show this number to the delivery driver! <br><br>You ordered: <br><br>" ;
            $email_message = "Dear " . $firstName . " " . $lastName . ". Thank you for your order!\nYour receipt number is $rand, please show this number to the delivery driver!\n\nYou ordered:\n\n" ;
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
                    $email_message .= $_SESSION['cart'][$i] . "x " . $row['product_name'] . " for $" . ($_SESSION['cart'][$i] * $row['product_price']) . "\n";
                    $sql = "INSERT INTO f32ee.de_sales (receipt_no, product_id, quantity) VALUES ($rand, ($i + 1), $quan)";
                    if(!$hejsan = mysqli_query($conn, $sql)){
                        echo "Something went wrong when inserting data into database: " . mysqli_query($conn);
                    }
                    $_SESSION['cart'][$i] = 0; //Clears the cart.
                 }
             }
            $message .= "<br>The items will be delivered to:<br>" . $streetAddress . "<br>" . $zip . "<br>";
            $email_message .= "\nThe items will be delivered to:\n" . $streetAddress . "\n" . $zip . "\n\n";
            $message .= "<br>Your payment method was by " . $payment_method . ".";
            $email_message .= "Your payment method was by " . $payment_method . ".";
            if($payment_method === 'creditcard'){
                $message .= "<br>Credit card used: **** **** **** " . substr($cc_number, 12, 16) . "<br>";
                $email_message .= "\nCredit card used: **** **** **** " . substr($cc_number, 12, 16) . "\n";
            }
            $message .= "<br>Confirmation mail sent to " . $email . "<br>";
            echo '<span style="display:block;margin-top:30px;color:#FFFF00;text-align:center;">' . $message . '</span>';
            mail($to, $subject,$email_message, $headers, '-ff32ee@localhost');
        ?>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
</html>