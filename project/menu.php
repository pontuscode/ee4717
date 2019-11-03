<?php
    include "php/get_menu_info.php";
	include "php/setup_session.php";
	include "php/db_connect.php";
?>
<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Menu</title>
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
            <div class="active_element">
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
        <h2 class="centeredheader" style="color:#FFFF00">
            Menu
        </h2>
        <p class="centeredparagraph" style="color:#FFFF00">
            Place an order by choosing the amount and then clicking Add to cart.
        </p>
       <form action="php/add_to_cart_menu.php" method="get">
            <table id="menutable">
                <?php
                    $sql = "SELECT product_name, product_description, product_price FROM f32ee.de_products";
                    if(!$menu_result = mysqli_query($conn, $sql)){
                        echo "Something went wrong when fetching data from product table: " . mysqli_error($conn);
                    }
                    $sql = "SELECT category_name, category_description FROM f32ee.de_category";
                    if(!$category_result = mysqli_query($conn, $sql)){
                        echo "Something went wrong when fetching data from product table: " . mysqli_error($conn);
                    }
                    for($i = 1; $i <= $menu_result -> num_rows; $i++){
                        $menu_row = mysqli_fetch_assoc($menu_result);
                        if($i === 1 || $i === 6 || $i === 7 || $i === 10){
                            $category_row = mysqli_fetch_assoc($category_result);
                            echo '<tr><th colspan="4" class="category_header">' . $category_row['category_name'] . '</th></tr>';
                            echo '<tr><td colspan="4" class="category_description">' . $category_row['category_description'] . '</td></tr>';
                        }
                        $numinput = "numinput" . $i;
                        echo '<tr><th>' . $menu_row['product_name'] . '</th><td>' . $menu_row['product_description'] . '<td>$' . '<span id=' . 'product_' . $i . '>' . $menu_row['product_price'] . '</span></td>';
                        ?>
                        <td><input class="numberinput" type="number" id="numinput<?php echo $i; ?>" min="0" value="0" onchange="updatePrice('<?php echo $numinput;?>', '<?php echo $menu_row['product_name'];?>', <?php echo $menu_row['product_price'];?>)"></td>
                        <?php
                    }
                ?>
            </table>
            <input class="numberinput" type="hidden" id="prod_names" name="prod_names" value="">
            <input class="numberinput" type="hidden" id="prod_quants" name="prod_quants" value="">
            <input class="numberinput" type="hidden" id="prod_prices" name="prod_prices" value="">
            <div id="price_and_cart">
                <span style="color:#FFFF00">Total price: S$</span><span id="menu_total_price" style="color:#FFFF00">0.00</span> <br>
                <input class="menusubmit" type="submit" value="Add to cart" onclick="compile_cart()">
            </div>
        </form>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
