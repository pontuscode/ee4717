<?php
include "php/db_connect.php";
$sql = "SELECT product_name, product_description, product_price FROM f32ee.de_products";
if(!$result = mysqli_query($conn, $sql)) {
    echo "Something went wrong when fetching product info: " . mysqli_error($conn);
}
for($i = 1; $i <= $result->num_rows; $i++) {
    $row = $result->fetch_assoc();
	${'product_name_' . $i} = $row["product_name"];
	${'product_description_' . $i} = $row["product_description"];
	${'product_price_' . $i} = $row["product_price"];
}
$sql = "SELECT category_name, category_description FROM f32ee.de_category";
if(!$result = mysqli_query($conn, $sql)) {
	echo "Something went wrong when fetching category info: " . mysqli_error($conn);
}
for($i = 1; $i <= $result->num_rows; $i++) {
	$row = $result->fetch_assoc();
	${'category_name_' . $i} = $row["category_name"];
	${'category_description_' . $i} = $row["category_description"];
}
mysqli_close($conn);
?>