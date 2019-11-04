<?php
    include "php/db_connect.php";
    include "php/setup_session.php";
    if (isset($_GET['empty'])) {
    	unset($_SESSION['cart']);
    	header('location: ' . $_SERVER['PHP_SELF']);
    	exit();
    }
    if(isset($_GET['plus'])){
		$_SESSION['cart'][$_GET['plus']]++;
    }
    if(isset($_GET['minus'])){
     		$_SESSION['cart'][$_GET['minus']]--;
     }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product catalog</title>
	<link rel="stylesheet" href="stylesheet.css">
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
        <p class="centeredparagraph">
            <?php
            $total = 0;
                echo '<span class="cc_cart_items">';
                    for($i = 0; $i < count($_SESSION['cart']); $i++){
                        $total += $_SESSION['cart'][$i];
                     }
                     if($total == 1){
                        echo 'Your shopping cart contains ' . $total . " item.";
                     } elseif($total > 1){
                        echo 'Your shopping cart contains ' . $total . " items.";
                     } else {
                        echo 'Your shopping cart is empty.';
                        displayEmpty();
                        return;
                     }
                 echo '</span>';
            ?>
        </p>
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
                                echo '<td align="center"><a href="'. "?minus=" .$i. '"><img src="media/pics/minus_symbol.png" class="cc_minus"></a>';
                                echo $_SESSION["cart"][$i];
                                echo '<a href="'. "?plus=" .$i. '"><img src="media/pics/plus_symbol.png" class="cc_plus"></a>';
                                echo "<td align='center'>$" .$row['product_price']. "</td>";
                                echo "</tr>";
                                $total = $total + (double)$row['product_price'] * (int)$_SESSION['cart'][$i];
                             }
                         }
                        echo "<tr>";
                        echo "<td colspan=2 align='left' style='padding-left:35px;font-size:20px; font-weight:bold;'>Total price </td>";
                        echo "<td align='center' style='font-size:20px;font-weight:bold;'>$" . number_format($total, 2) . "</td>";
                        echo "</tr>";
                    ?>
                </tbody>
            </table>
            <p class="centeredparagraph"><a href="cart.php" class="cc_links" style="margin-right:13%;">Continue to checkout</a>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1" class="cc_links">Empty your cart</a></p>
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