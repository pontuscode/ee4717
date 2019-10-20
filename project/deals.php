<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Deals</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        Welcome to a new world of Durian cuisine.
    </header>
    <div class="navbar">
        <a href="index.html">
            <div class="navbar_element" style="margin-right: 1%;">
                Home
            </div>
        </a>
        <a href="menu.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Menu
            </div>
        </a>
        <a href="deals.html">
            <div class="active_element" style="margin-right: 1%;">
                Todays deals
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
        <p class="centeredparagraph">
            These are the products of the day, place an order now for an extra low price!
        </p>
        <form method="get">
            <div class="dealwrapper">
                <img src="media/pics/durian_pizza3.jpg" class="dealimage">
                <p>
                    Gud vad gott det ska bli, MUMS!
                </p>
                <input class="numberinput" type="number" value=0 min="0" onchange="updatePrice('numinput1','<?php echo $product_name_1; ?>', <?php echo $product_price_6;?>)">
            </div>
            <div class="dealwrapper">
                <img src="media/pics/smoothie.jpg" class="dealimage">
                <p>
                    Gud vad gott det ska bli, MUMS!
                </p>
                <input class="numberinput" type="number" value=0 min="0" onchange="updatePrice('numinput2','<?php echo $product_name_2; ?>', <?php echo $product_price_6;?>)">
            </div>
            <div class="dealwrapper">
                <img src="media/pics/durian_dessert1.jpg" class="dealimage">
                <p>
                    Gud vad gott det ska bli, MUMS!
                </p>
                <input class="numberinput" type="number" value=0 min="0" onchange="updatePrice('numinput3','<?php echo $product_name_3; ?>', <?php echo $product_price_6;?>)">
            </div>
        </form>
        <input class="dealsubmit" type="submit" value="Add to cart">
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019.</p>
    </footer>
</body>
</html>