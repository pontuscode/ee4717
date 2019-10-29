<?php
include "php/setup_session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Home</title>
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
            <div class="active_element" style="margin-right: 1%;">
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
                Deals of the Day
            </div>
        </a>
        <a href="jobs.html">
            <div class="navbar_element">
                Jobs
            </div>
        </a>
    </div>
    <div class="wrapper">
        <div class="pic">
            <img src="media/pics/durian_pizza3.jpg" class="pic_left">
            <div class="para_right_box">
                <h2 class="h2_homepage_right">
                    Durian Pizza
                </h2><br><br>
                <p class="para_right">
                    Enjoy the unique taste of our signature dish: The Original. By combining Durian and Pizza, the two best things in the world, we can guarantee that you will
                    love this dish. If you dont love it, you get your money back, and a lifetime supply of Durian to your doorstep! Its a win-win situation!<br>
                    Order now for $12.95!
                </p><br><br><br><br><br>
                <form method="get" action="php/add_to_cart_hp_dotd.php">
                    <label><input type=submit value="Add to cart" name="pizza_homepage"></label>
                </form>
            </div>
        </div>
        <div class="pic">
            <img src="media/pics/smoothie.jpg" class="pic_right">
            <div class="para_left_box">
                <h2 class="h2_homepage_left">Durian Drink</h2><br><br>
                <p class="para_left">Introducing the Mango/Durian smoothie. With a unique blend of Mango and Durian,
                    we are proud to present
                    the worlds best smoothie.
                    Get yours today for the low price of $2.95, while stocks last!
                </p><br><br><br>
                <form method="get" action="php/add_to_cart_hp_dotd.php" style="float:right;clear:left;">
                    <label><input type=submit value="Add to cart" name="drink_homepage"></label>
                </form>
            </div>
        </div>
        <div class="pic">
            <img src="media/pics/durian_dessert1.jpg" class="pic_left">
            <div class="para_right_box">
                <h2 class="h2_homepage_right">Durian Dessert</h2><br><br>
                <p class="para_right">A Durian pancake is the best way to finish a meal. With loving hands, our expert chefs mix the pancake batter into a smooth blend. After frying the
                pancakes for a minute, they flip the pancake and add the Durian jam, allowing the jam to get luke-warm before serving.<br>
                Order yours now for just $5.95.
                </p><br><br><br><br><br>
                <form method="get" action="php/add_to_cart_hp_dotd.php">
                    <label><input type=submit value="Add to cart" name="dessert_homepage"></label>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p style="font-size: small;font-style: italic;">Copyright &copy; The Durian Company 2019.</p>
    </footer>
</body>
</html>