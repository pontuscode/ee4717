<?php
    include "php/get_menu_info.php";
	include "php/setup_session.php";
	include "php/db_connect.php";
    if(isset($_GET['plus'])){
        $_SESSION['cart'][$_GET['plus']]++;
    }
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
        <img src="media/pics/durian_pizza4.png" class="menu_image">
            <div class="menuwrapper">
                <table class="menutable">
                    <?php
                        $sql = "SELECT product_name, product_description, product_price, product_allergen FROM f32ee.de_products";
                        if(!$menu_result = mysqli_query($conn, $sql)){
                            echo "Something went wrong when fetching data from product table: " . mysqli_error($conn);
                        }
                        $sql = "SELECT category_name, category_description FROM f32ee.de_category";
                        if(!$category_result = mysqli_query($conn, $sql)){
                            echo "Something went wrong when fetching data from product table: " . mysqli_error($conn);
                        }
                        $total = 0;
                        for($i = 1; $i <= $menu_result -> num_rows; $i++){
                            $menu_row = mysqli_fetch_assoc($menu_result);
                            if($i === 1 || $i === 6 || $i === 7 || $i === 10){
                                $category_row = mysqli_fetch_assoc($category_result);
                                echo '<tr><th colspan="4" class="category_header">' . $category_row['category_name'] . '</th></tr>';
                                echo '<tr><td colspan="4" class="category_description">' . $category_row['category_description'] . '</td></tr>';
                            }
                            $numinput = "numinput" . $i;
                            echo '<tr><th>' . $menu_row['product_name'] . '</th><td>' . $menu_row['product_description'] . '<td>$' . '<span id=' . 'product_' . $i . '>' . $menu_row['product_price'] . '</span></td>';
                            echo '<td style="width:80px;"><a href="'. "?plus=" . ($i-1) . '"><img src="media/pics/add_to_cart.png" class="menu_addtocart"></a></td>';
                            ?>
                            <td style="width:20px;height:20px;padding-left:10px;">
                                <div class="allergen_wrapper">
                                    <img src="media/pics/info_symbol.png" class="menu_info_symbol">
                                    <div class="allergen_info">
                                        Allergens<?php echo ": " . $menu_row['product_allergen']; ?>
                                    </div>
                                </div>
                            </td>
                            <?php
                            $total = $total + (double)$menu_row['product_price'] * (int)$_SESSION['cart'][$i-1];
                        }
                        echo "<tr>";
                        echo "<th><b>Total price</b></td>";
                        echo "<td>$" . number_format($total, 2) . "</td>";
                        echo "</tr>";
                    ?>
                </table>
            </div>
            <img src="media/pics/durian_salad1.jpg" class="menu_image">
        </div>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
