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
</head>
<body>
<header>
	<a href="catalogue.php">
		<span id="shopping_cart" class="shopping_cart">
			<?php
				$total = 0;
				for($i = 0; $i < count($_SESSION['cart']); $i++){
					$total += $_SESSION['cart'][$i];
				}
				echo $total;
			?>
		</span>
	</a>
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
                Today's deals
            </div>
        </a>
        <a href="jobs.php">
            <div class="navbar_element">
                Jobs
            </div>
        </a>
    </div>
    <p class="centeredparagraph">Your shopping cart contains <?php
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

    <table class="centeredtable" border="1">
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
    <p class="centeredparagraph"><a href="index.php" class="cc_links">Continue shopping</a>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1" class="cc_links">Empty your cart</a></p>
    <div class="wrapper">
        <div class="application_wrapper">
            <h2 class="centeredheader">
                Place order
            </h2>
            <p class="centeredparagraph">
                Please fill in the fields below. All fields with an asterisk* are required.<br>
                You will get a confirmation e-mail once we receive the order!
            </p>
            <form method="post" class="formjobapplication">
                <label for="firstname" class="label_jobapplication">First name*</label><input class="input_jobapplication" id="firstname" type="text" placeholder="First name" required><br>
                <label for="lastname" class="label_jobapplication">Last name*</label><input class="input_jobapplication" id="lastname" type="text" placeholder="Last name" required><br>
                <label for="email" class="label_jobapplication">E-mail*</label><input class="input_jobapplication" id="email" type="email" placeholder="E-mail address" required><br>
                <label for="experience" class="label_jobapplication">Experience</label><textarea class="input_jobapplication" id="experience" rows="4" cols="40" placeholder="Experience"></textarea><br>
                <input class="submit_jobapplication" type="submit" value="Confirm order">
            </form>
        </div>
    </div>
</body>
</html>