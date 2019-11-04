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
                <div class="navbar_element">
                    Home
                </div>
            </a>
        </div>
    </div>
    <div class="wrapper">
        <div class="application_wrapper">
            <h2 class="centeredheader">
                Application for
                <?php
                    if(isset($_POST['cook'])){
                        echo "cook";
                        $position = 1;
                    }
                    elseif(isset($_POST['manager'])){
                        echo "manager.";
                        $position = 2;
                    }
                    elseif(isset($_POST['driver'])){
                        echo "delivery driver.";
                        $position = 3;
                    }
                ?>
            </h2>
            <p class="centeredparagraph">
                Please fill in the fields below. All fields with an asterisk* are required.  We will reply as soon as possible!<br>
                You will get a confirmation e-mail once we receive the application!
            </p>
            <form method="post" action="php/confirm_jobapplication.php" onsubmit="validateForm('jobs')">
                <label for="firstname" class="label_jobapplication">First name*</label><input class="input_jobapplication" name="firstname" id="firstname" type="text" placeholder="First name" required><br>
                <label for="lastname" class="label_jobapplication">Last name*</label><input class="input_jobapplication" name="lastname" id="lastname" type="text" placeholder="Last name" required><br>
                <label for="email" class="label_jobapplication">E-mail*</label><input class="input_jobapplication" name="email" id="email" type="email" placeholder="E-mail address" required><br>
                <label for="experience" class="label_jobapplication">Experience</label><textarea class="input_jobapplication" name="experience" id="experience" rows="4" cols="40" placeholder="Experience"></textarea><br>
                <input type="hidden" name="position" value="<?php echo $position; ?>"<br>
                <input class="submit_jobapplication" type="submit" value="Send application">
            </form>
        </div>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
</html>