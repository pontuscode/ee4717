<?php
    include "php/setup_session.php";
    if (isset($_GET['empty'])) {
    	unset($_SESSION['cart']);
    	header('location: ' . $_SERVER['PHP_SELF']);
    	exit();
    }
    if(isset($_GET['delete'])){
        unset($_SESSION['cart']);
    }
    include "php/db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product catalog</title>
</head>
<body>

    <p>Your shopping cart contains <?php
        $total = 0;
        for($i = 0; $i < count($_SESSION['cart']); $i++){
            $total += $_SESSION['cart'][$i];
         }
         if($total == 1){
            echo $total . " item.";
         }
         else{
            echo $total . " items.";
         }
    ?></p>

    <table border="1">
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
                        echo "<td align='right'>" .$_SESSION['cart'][$i]. "</td>";
                        echo "<td align='right'>$" .$row['product_price']. "</td>";
                        echo "<td><a href='?delete=$i'>Delete</a></td>";
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
    <p><a href="cart.php">Continue to checkout</a>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1">Empty your cart</a></p>

</body>
</html>