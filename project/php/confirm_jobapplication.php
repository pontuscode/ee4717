<?php
    include "setup_session.php";
    include "db_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Application success</title>
	<link rel="stylesheet" href="../stylesheet.css">
	<script src="../javascript/script.js"></script>
</head>
<body>
    <div class="header_div">
        <a href="../index.php">
            <img src="../media/pics/header_pic.png" class="header_pic">
        </a>
            <div class="shopping_cart">
                <a href="../catalogue.php">
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
            <a href="../jobs.php">
                <div class="navbar_element">
                    Jobs
                </div>
            </a>
            <a href="../deals.php">
                <div class="navbar_element">
                    Deals of the Day
                </div>
            </a>
            <a href="../menu.php">
                <div class="navbar_element">
                    Menu
                </div>
            </a>
            <a href="../index.php">
                <div class="navbar_element">
                    Home
                </div>
            </a>
        </div>
    </div>
    <div class="wrapper">
        <?php
            $to = 'f32ee@localhost';
            $headers = 'From: f32ee@localhost' . "\r\n" .
            'Reply-To: f32ee@localhost' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $position = $_POST['position'];
            $email = $_POST['email'];
            $experience = "n/a";
            if(strlen(trim($_POST['experience'])) > 0){
                $experience = $_POST['experience'];
            }
            $subject = "Job application";
            $message = "Dear " . $firstName . " " . $lastName . ". Thank you for your application! <br> You entered the following: <br><br>" ;
            $email_message = "Dear " . $firstName . " " . $lastName . ". Thank you for your application!\nYou entered the follow:\n\n";
            $message .= "<br>First name: " . $firstName . "<br>" . "Last name: " . $lastName . "<br>";
            $email_message .= "\nFirst name: " . $firstName . "\nLast name: " . $lastName . "\n";
            $sql = "SELECT position_name FROM f32ee.de_positions WHERE position_id=$position";
            if(!$result = mysqli_query($conn, $sql)){
                echo "Something went wrong when fetching position name from database: " . mysqli_error($conn);
            }
            $row = mysqli_fetch_assoc($result);
            $message .= "Applied for position: " . $row['position_name'] . "<br>";
            $email_message .= "Applied for position: " . $row['position_name'] . "\n";
            if(strlen($experience) > 0){
                $message .= "Experience: " . $experience . "<br>";
                $email_message .= "Experience: " . $experience . "\n";
            }
            do{
                $rand = rand();
            } while($rand === 0);
            $message .= "<br>You application id is: " . $rand . "<br>Please save your id!<br>";
            $email_message .= "\nYou application id is: " . $rand . "\nPlease save your id!\n";
            $sql = "INSERT INTO f32ee.de_applicants (application_id, applied_for, first_name, last_name, email, experience) VALUES ($rand, '$position', '$firstName', '$lastName', '$email', '$experience')";
            if(!$result = mysqli_query($conn, $sql)){
                echo "Something went wrong when inserting data to database: " . mysqli_error($conn);
            }
            $message .= "<br>Confirmation mail sent to " . $email;
            echo '<span style="display:block;margin-top:30px;text-align:center;">' . $message . '</span>';
            mail($to, $subject, $email_message, $headers, '-ff32ee@localhost');
        ?>
    </div>
    <footer>
        <p>Copyright &copy; The Durian Company 2019. </p>
        <p>Hiranandani Gardens, Mumbai, Maharashtra 400076, India </p>
        <p><a href="mailto:durianMcD@durian.dur">durian_experience@email.com</a></p>
    </footer>
</body>
</html>