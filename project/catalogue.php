<?php
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_GET['buy'])) {
        $_SESSION['cart'][] = $_GET['buy'];
        header('location: ' . $_SERVER['PHP_SELF']. '?' . SID);
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product catalog</title>
</head>
<body>
    <?php
        $items = explode(";", $_GET['prod_names']);
        $prices = explode(" ", $_GET['prod_prices']);
        $quantities = explode(" ", $_GET['prod_quants']);

        // remove duplicate items
        for ($i=0; $i<count($items)-1; $i++) {
            for ($k=$i+1; $k<count($items)-1; $k++) {
                if ($items[$i] == $items[$k]) {
                   $quantities[$i] += $quantities[$k];

                   \array_splice($items, $k, 1);
                   \array_splice($prices, $k, 1);
                   \array_splice($quantities, $k, 1);
                }
            }
        }
    ?>

    <p>Your shopping cart contains <?php echo count($items) - 1; ?> items.</p>

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

                for ($i=0; $i<count($items)-1; $i++) {
                    echo "<tr>";
                    echo "<td>" .$items[$i]. "</td>";
                    echo "<td align='right'>" .$quantities[$i]. "</td>";
                    echo "<td align='right'>$" .$prices[$i]. "</td>";
                    echo "<td><a href='" .$_SERVER['PHP_SELF']. '?buy=' .$i. "'>Buy</a></td>";
                    echo "</tr>";

                    $total = $total + $prices[$i] * $quantities[$i];
                }
                echo "<tr>";
                echo "<td colspan=2 align='left'><b>Total price </b></td>";
                echo "<td align='right'>$" . number_format($total, 2) . "</td>";
                echo "</tr>";
            ?>
        </tbody>
    </table>

    <p><a href="cart.php">Continue to checkout</a></p>

</body>
</html>