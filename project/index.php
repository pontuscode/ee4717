<?php
include "php/setup_session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Home</title>
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
            <div class="active_element">
                Home
            </div>
        </a>
    </div>
</div>
    <div class="wrapper">
        <div class="pic">
            <img src="media/pics/durian_pizza3.jpg" class="pic_left">
            <div class="para_right_box">
                <h2>
                    Durian Pizza
                </h2>
                <p>
                    Enjoy the unique taste of our signature dish: The Original. By combining Durian and Pizza, the two best things in the world, we can guarantee that you will
                    love this dish. If you dont love it, you get your money back, and a lifetime supply of Durian to your doorstep! Its a win-win situation!<br>
                    Order now for $12.95!
                </p>
                <form method="get" action="php/add_to_cart_hp_dotd.php">
                    <label><input type=submit value="Add to cart" name="pizza_homepage"></label>
                </form>
            </div>
        </div>
        <div class="pic" id="drink_homepage">
            <img src="media/pics/durian_drink2.png" class="pic_right">
            <div class="para_left_box">
                <h2>Durian Drink</h2>
                <p>Introducing the Mango/Durian juice. With a unique blend of Mango and Durian,
                    we are proud to present the best juice in the world!
                    Get yours today for the low price of $2.95, while stocks last!
                </p>
                <form method="get" action="php/add_to_cart_hp_dotd.php" style="float:left;clear:left;">
                    <label><input type=submit value="Add to cart" name="drink_homepage"></label>
                </form>
            </div>
        </div>
        <div class="pic" id="dessert_homepage">
            <img src="media/pics/durian_dessert1.jpg" class="pic_left">
            <div class="para_right_box">
                <h2>Durian Dessert</h2>
                <p>A Durian pancake is the best way to finish a meal. With loving hands, our expert chefs mix the pancake batter into a smooth blend. After frying the
                pancakes for a minute, they flip the pancake and add the Durian jam, allowing the jam to get luke-warm before serving.<br>
                Order yours now for just $5.95.
                </p>
                <form method="get" action="php/add_to_cart_hp_dotd.php">
                    <label><input type="submit" value="Add to cart" name="dessert_homepage"></label>
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