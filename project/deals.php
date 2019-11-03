<?php
include "php/setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Deals</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        .background_para {
            background-color:rgba(0,0,0,0.5);
            color:white;
        }
    </style>
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
            <div class="active_element">
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
        <h2 class="centeredheader">
            Deals of the day
        </h2>
        <p class="centeredparagraph">
            These are the products of the day, place an order now for an extra low price!
        </p>
        <form method="get" action="php/add_to_cart_hp_dotd.php">
            <div class="dealwrapper">
                <img src="media/pics/durian_pizza3.jpg" class="dealimage">
                <p>
                    Durian and Pizza, what can be better? Just $12.95!
                </p>
                <label><input type="submit" value="Add to cart" name="pizza_dotd"></label>
            </div>
            <div class="dealwrapper">
                <img src="media/pics/smoothie.jpg" class="dealimage">
                <p>
                    Try our patented smoothie for just $2.95 a piece!
                </p>
                <label><input type="submit" value="Add to cart" name="drink_dotd"></label>
            </div>
            <div class="dealwrapper">
                <img src="media/pics/durian_dessert1.jpg" class="dealimage">
                <p>
                    Durian Pancake for just $5.95 each!
                </p>
                <label><input type="submit" value="Add to cart" name="dessert_dotd"></label>
            </div>
        </form>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
</html>