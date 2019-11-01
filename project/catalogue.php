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
        <a href="index.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Home
            </div>
        </a>
        <a href="menu.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Menu
            </div>
        </a>
        <a href="deals.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Deals of the day
            </div>
        </a>
        <a href="jobs.php">
            <div class="navbar_element">
                Jobs
            </div>
        </a>
    </div>

    <p class="centeredparagraph"><?php
        $total = 0;
        for($i = 0; $i < count($_SESSION['cart']); $i++){
            $total += $_SESSION['cart'][$i];
         }
         if($total == 1){
            echo $total . " item.";
         } elseif($total > 1){
            echo $total . " items.";
         } else {
            echo '<span style="color:#FFFF00;font-size:30px;">Your shopping cart is empty.</span>';
            displayEmpty();
            return;
         }
    ?></p>

    <table class="cc_table" border="0">
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
                        echo "<td>" .$row['product_name']. "</td>";
                        echo '<td align="center"><a href="'. "?minus=" .$i. '"><img src="media/pics/minus_symbol.png" class="cc_minus"></a>';
                        echo $_SESSION["cart"][$i];
                        echo '<a href="'. "?plus=" .$i. '"><img src="media/pics/plus_symbol.png" class="cc_plus"></a>';
                        echo "<td align='right'>$" .$row['product_price']. "</td>";
                        echo "</tr>";
                        $total = $total + (double)$row['product_price'] * (int)$_SESSION['cart'][$i];
                     }
                 }
                echo "<tr>";
                echo "<td colspan=2 align='left'><b>Total price </b></td>";
                echo "<td align='right'>$" . number_format($total, 2) . "</td>";
                echo "</tr>";
            ?>
        </tbody>
    </table>
    <p class="centeredparagraph"><a href="cart.php" class="cc_links">Continue to checkout</a>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1" class="cc_links">Empty your cart</a></p>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
</html>

<?php
    function displayEmpty(){
        echo '<p class="centeredparagraph"><a href="index.php" class="cc_links">Continue shopping</a>';
        echo '<footer>
            <p>Copyright &copy; The Durian Company 2019. </p>
            <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
            <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
        </footer>';
    }
?>