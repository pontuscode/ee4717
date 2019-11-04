<?php
    include "php/setup_session.php";
	
    if (isset($_GET['empty'])) {
        unset($_SESSION['cart']);
        header('location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Product catalog</title>
	<link rel="stylesheet" href="stylesheet.css">
	<script src="javascript/script.js"></script>
</head>
<body>
    <div class="header_div">
        <a href="index.php">
            <img src="media/pics/header_pic.png" class="header_pic">
        </a>
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
        <div class="navbar">
            <a href="jobs.php">
                <div class="navbar_element">
                    Jobs
                </div>
            </a>
            <a href="deals.php">
                <div class="navbar_element">
                    Deals of the Day
                </div>
            </a>
            <a href="menu.php">
                <div class="navbar_element">
                    Menu
                </div>
            </a>
            <a href="index.php">
                <div class="navbar_element">
                    Home
                </div>
            </a>
        </div>
    </div>
    <div class="wrapper">
        <p class="centeredparagraph"><?php
            $total = 0;
            echo '<span class="cc_cart_items">';
            for($i = 0; $i < count($_SESSION['cart']); $i++){
                $total += $_SESSION['cart'][$i];
             }
             if($total == 1){
                echo "Your shopping cart contains " . $total . " item.";
             } elseif($total > 1){
                echo "Your shopping cart contains " . $total . " items.";
             } else {
                echo '<span style="color:#FFFF00;font-size:30px;">Your shopping cart is empty.</span>';
                displayEmpty();
                return;
             }
             echo '</span>';
        ?></p>
        <div class="cc_menu_wrapper">
            <table class="cc_table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $total = 0;
                        $sql = "SELECT product_name, product_price FROM f32ee.de_products";
                        if(!$result = mysqli_query($conn, $sql)){
                            echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
                        }
                        for($i = 0; $i < count($_SESSION['cart']); $i++){
                             $row = mysqli_fetch_assoc($result);
                             if($_SESSION['cart'][$i] > 0){
                                echo "<tr>";
                                echo "<td align='center'>" .$row['product_name']. "</td>";
                                echo "<td align='center'>" .$_SESSION['cart'][$i]. "</td>";
                                echo "<td align='center'>$" .$row['product_price']. "</td>";
                                echo "</tr>";
                                $total = $total + (double)$row['product_price'] * (int)$_SESSION['cart'][$i];
                             }
                         }
                        echo "<tr>";
                        echo "<td colspan=2 align='left' style='padding-left:35px;font-size:20px; font-weight:bold;'>Total price</td>";
                        echo "<td align='center' style='font-size:20px; font-weight:bold;'>$" . number_format($total, 2) . "</td>";
                        echo "</tr>";
                    ?>
                </tbody>
            </table>
            <p class="centeredparagraph"><a href="index.php" class="cc_links" style="margin-right:14%;">Continue shopping</a>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1" class="cc_links">Empty your cart</a></p>
        </div>
            <div class="application_wrapper">
                <h2 class="centeredheader">
                    Place order
                </h2>
                <p class="centeredparagraph">
                    Please fill in the fields below. All fields with an asterisk* are required.<br>
                    You will get a confirmation e-mail once we receive the order!
                </p>
                <form method="post" action="php/confirm_order.php" onsubmit="return validateForm('order');">
                    <label for="firstname" class="label_jobapplication">First name*</label><input class="input_jobapplication" name="firstname" id="firstname" type="text" placeholder="First name" required><br>
                    <label for="lastname" class="label_jobapplication">Last name*</label><input class="input_jobapplication" name="lastname" id="lastname" type="text" placeholder="Last name" required><br>
                    <label for="email" class="label_jobapplication">E-mail*</label><input class="input_jobapplication" name="email" id="email" type="email" placeholder="E-mail address" required><br>
                    <label for="streetaddress" class="label_jobapplication">Street address*</label><input class="input_jobapplication" name="streetaddress" id="streetaddress" type="text" placeholder="Street address" required><br>
                    <label for="zipcode" class="label_jobapplication">Zip code*</label><input class="input_jobapplication" name="zipcode" id="zipcode" type="text" placeholder="Zip code" required><br>
                    <label for="additional_info" class="label_jobapplication">Additional info</label><textarea class="input_jobapplication" id="additional_info" rows="4" cols="40" placeholder="Additional info to driver"></textarea><br>
                    <label for="payment" class="label_jobapplication">Payment*</label>
                    <select class="input_jobapplication" name='payment_method' required onchange="displayCreditcardInfo()">
                        <option selected disabled>Choose here</option>
                        <option value="cash">Cash</option>
                        <option id="creditcard" value='creditcard'>Credit card</option>
                        <option value="invoice">Invoice</option>
                    </select><br>
                    <label for="creditcard_number" class="label_jobapplication" id="creditcard_number_label"></label>
                        <input class="input_jobapplication" name="creditcard_number" id="creditcard_number" placeholder="Creditcard number" type="hidden"><br>
                    <label for="cvc_number" class="label_jobapplication" id="cvc_number_label"></label>
                        <input class="input_jobapplication" id="cvc_number" placeholder="CVC" type="hidden"><br>
                    <br><br>
                    <input class="submit_jobapplication" type="submit" value="Confirm order">
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
</html>

<?php
    function displayEmpty(){
        echo '<p class="centeredparagraph"><a href="index.php" class="cc_empty_links">Continue shopping</a>';
        echo '<footer>
            <p>Copyright &copy; The Durian Company 2019. </p>
            <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
            <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
        </footer>';
    }
?>