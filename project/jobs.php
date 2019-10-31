<?php 
	include "php/setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Jobs</title>
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
                Deals of the Day
            </div>
        </a>
        <a href="jobs.php">
            <div class="active_element">
                Jobs
            </div>
        </a>
    </div>
    <div class="wrapper">
        <h2 class="centeredheader">
            Open job offers
        </h2>
        <div class="jobwrapper">
            <div class="jobimage">
                <img src="media/pics/pizza-maker.png" style="width:100%;height:100%;">
            </div>
            <div class="jobtext">
                We need an experienced baker to help us cope with ever-increasing demands!<br>
                Are you who we're looking for? Apply now!
            </div>
            <div class="jobapplication">
                <form action="jobapplication.php">
                    <input class="jobsubmit" type="submit" value="Apply now">
                </form>
            </div>
        </div>
        <div class="jobwrapper">
            <div class="jobimage">
                <img src="media/pics/delivery-guy.png" style="width:100%;height:100%;">
            </div>
            <div class="jobtext">
                No driver's license required, we will handle the fines! Just show up and start delivering!<br>
                Sound interesting? Apply now!
            </div>
            <div class="jobapplication">
                <form action="jobapplication.php">
                    <input class="jobsubmit" type="submit" value="Apply now">
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