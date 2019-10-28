<?php
    include "db_connect.php";

    include "setup_session.php";
    if(isset($_GET['pizza_homepage'])){
        $_SESSION['cart'][0]++;
        header("location:../index.php");
        return;
    }
    elseif(isset($_GET['drink_homepage'])){
        $_SESSION['cart'][6]++;
        header("location:../index.php");
        return;
    }
    elseif(isset($_GET['dessert_homepage'])){
        $_SESSION['cart'][11]++;
        header("location:../index.php");
        return;
    }

    $sql = "SELECT product_id, product_name FROM f32ee.de_products";
    if(!$result=mysqli_query($conn, $sql)){
        echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
    }
    $pizza = $_GET['numinput1'];
    $drink = $_GET['numinput2'];
    $dessert = $_GET['numinput3'];
    for($i = 0; $i < 3; $i++){
        switch($i){
            case 0:
                $_SESSION['cart'][0] += $pizza;
                break;
            case 1:
                $_SESSION['cart'][6] += $drink;
                break;
            case 2:
                $_SESSION['cart'][11] += $dessert;
                break;
        }
    }
    header("location:../deals.php");
?>