<?php
    include "db_connect.php";
	include "setup_session.php";
    $items = explode(";", $_GET['prod_names']);
    $prices = explode(" ", $_GET['prod_prices']);
    $quantities = explode(";", $_GET['prod_quants']);

    // remove duplicate items
    for ($i=0; $i<count($items)-1; $i++) {
        for ($k=$i+1; $k<count($items)-1; $k++) {
            if ($items[$i] == $items[$k]) {
               $quantities[$i] += $quantities[$k];
               \array_splice($items, $k, 1);
               \array_splice($prices, $k, 1);
               \array_splice($quantities, $k, 1);
            }
        }
    }
    $sql = "SELECT product_id, product_name FROM f32ee.de_products";
    if(!$result=mysqli_query($conn, $sql)){
        echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
    }
    $found_items = 0;
    while($found_items < count($items)){
        if(($row = mysqli_fetch_assoc($result)) == NULL){
			$sql = "SELECT product_id, product_name FROM f32ee.de_products";
			if(!$result=mysqli_query($conn, $sql)){
				echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
			}
		}
        if($row['product_name'] == $items[$found_items]){
            $index = (int)$row['product_id']-1;
            if($index >= 0){
                $_SESSION['cart'][$index] += (int)$quantities[$found_items];
                $found_items++;
            } else {
                $found_items++;
            }
        }
    }
   header("location:../menu.php");
?>