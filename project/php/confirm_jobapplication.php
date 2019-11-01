<?php
    include "setup_session.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order success</title>
	<link rel="stylesheet" href="../stylesheet.css">
	<script src="../javascript/script.js"></script>
</head>
<body>
<header>
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
</header>
 <div class="navbar">
        <a href="../index.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Home
            </div>
        </a>
        <a href="../menu.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Menu
            </div>
        </a>
        <a href="../deals.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Deals of the day
            </div>
        </a>
        <a href="../jobs.php">
            <div class="navbar_element">
                Jobs
            </div>
        </a>
    </div>
<?php
    include "db_connect.php";
    $to = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $position = $_POST['position'];
    if(strlen(trim($_POST['experience'])) > 0){
        $experience = $_POST['experience'];
    }
    $subject = "Job application";
    $message = "Dear " . $firstName . " " . $lastName . ". Thank you for your application! <br> You entered the following: <br><br>" ;
    $message .= "<br>First name: " . $firstName . "<br>" . "Last name: " . $lastName . "<br>";
    $sql = "SELECT position_name FROM f32ee.de_positions WHERE position_id=$position";
    if(!$result = mysqli_query($conn, $sql)){
        echo "Something went wrong when fetching position name from database: " . mysqli_error($conn);
    }
    $row = mysqli_fetch_assoc($result);
    $message .= "Applied for position: " . $row['position_name'] . "<br>";
    if(strlen($experience) > 0){
        $message .= "Experience: " . $experience . "<br>";
    }
    do{
        $rand = rand();
    } while($rand === 0);
    $message .= "<br>You application id is: " . $rand . "<br>Please save your id!<br>";
    $sql = "INSERT INTO f32ee.de_applicants (application_id, applied_for, first_name, last_name, email) VALUES ($rand, '$position', '$firstName', '$lastName', '$to')";
    if(!$result = mysqli_query($conn, $sql)){
        echo "Something went wrong when inserting data to database: " . mysqli_error($conn);
    }
    $message .= "<br>Confirmation mail sent to " . $to;
    echo '<span style="margin-top:30px;display:inherit;color:#FFFF00;text-align:center;">' . $message . '</span>';
    mail($to, $subject, $message);
?>

</body>
</html>