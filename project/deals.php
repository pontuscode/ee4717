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
            <div class="active_element" style="margin-right: 1%;">
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
        <h2 class="centeredheader">
            Deals of the day
        </h2>
        <p class="centeredparagraph" style="background-color:rgba(0,0,0,0.5); color:white;">
            These are the products of the day, place an order now for an extra low price!
        </p>
        <form method="get" action="php/add_to_cart_hp_dotd.php">
            <div class="dealwrapper">
                <img src="media/pics/durian_pizza3.jpg" class="dealimage">
                <p class="background_para">
                    Durian and Pizza, what can be better? Just $12.95!
                </p>
                <input class="numberinput" name="numinput1" type="number" value=0 min="0" onchange="updatePrice('numinput1','<?php echo $product_name_1; ?>', <?php echo $product_price_1;?>)">
            </div>
            <div class="dealwrapper">
                <img src="media/pics/smoothie.jpg" class="dealimage">
                <p class="background_para">
                    Try our patented smoothie for just $2.95 a piece!
                </p>
                <input class="numberinput" name="numinput2" type="number" value=0 min="0" onchange="updatePrice('numinput6','<?php echo $product_name_6; ?>', <?php echo $product_price_6;?>)">
            </div>
            <div class="dealwrapper">
                <img src="media/pics/durian_dessert1.jpg" class="dealimage">
                <p class="background_para">
                    Durian Pancake for just $5.95 each!
                </p>
                <input class="numberinput" name="numinput3" type="number" value=0 min="0" onchange="updatePrice('numinput12','<?php echo $product_name_12; ?>', <?php echo $product_price_12;?>)">
            </div>
            <input class="dealsubmit" type="submit" value="Add to cart">
        </form>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019.</p>
    </footer>
</body>
</html>