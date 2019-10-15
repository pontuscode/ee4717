<?php 
//Ensure that database connection is good before any code is executed. 
$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	return;
}
//Declare variables 

$regularQuan=$_GET['regularQuan'];
$cafeQuan=$_GET['cafeQuan'];
$cappuccinoQuan=$_GET['cappuccinoQuan'];
$radioCafe=$_GET['radioCafe'];
$radioCap=$_GET['radioCappuccino'];

if($regularQuan == 0 && $cafeQuan == 0 && $cappuccinoQuan == 0) {
	echo "Select products you'd like to order before submitting.<br>";
	return;
}
$sql = "SELECT product_price FROM f32ee.jj_products WHERE product_id = 1;";
if ($result = mysqli_query($conn, $sql)) {
	$sql = "SELECT totals FROM f32ee.jj_total_sales WHERE product_id = 1;";
	if ($result = mysqli_query($conn, $sql)) {
		updateSalesTable(getCurrentTotals(1) + ($regularQuan * getCurrentPrice(1)), 1);
		$regularTotal = $regularQuan * getCurrentPrice(1);
	}
}
$cafeTotal = 0.0;
$cappuccinoTotal = 0.0;
//Insert new orders into database and update total_sales
if ($regularQuan > 0) {
	updateOrderTable($regularQuan, 1);
}
if ($cafeQuan > 0) {
	if ($radioCafe == "smallCafe") {
		updateOrderTable($cafeQuan, 2);
		updateSalesTable(getCurrentTotals(2) + ($cafeQuan * getCurrentPrice(2)), 2);
		$cafeTotal = $cafeQuan * getCurrentPrice(2);
	} elseif($radioCafe == "largeCafe") {
		updateOrderTable($cafeQuan, 3);
		updateSalesTable(getCurrentTotals(3) + ($cafeQuan * getCurrentPrice(3)), 3);
		$cafeTotal = $cafeQuan * getCurrentPrice(3);
	}
}
if ($cappuccinoQuan > 0) {
	if ($radioCap == "smallCappuccino") {
		updateOrderTable($cappuccinoQuan, 4);
		updateSalesTable(getCurrentTotals(4) + ($cappuccinoQuan * getCurrentPrice(4)), 4);
		$cappuccinoTotal = $cappuccinoQuan * getCurrentPrice(4);
	} elseif($radioCap == "largeCappuccino") {
		updateOrderTable($cappuccinoQuan, 5);
		updateSalesTable(getCurrentTotals(5) + ($cappuccinoQuan * getCurrentPrice(5)), 5);
		$cappuccinoTotal = $cappuccinoQuan * getCurrentPrice(5);
	}
}
mysqli_close($conn);
$totalOrder = "Order placed for:<br>";
if ($regularQuan > 0){
	$totalOrder .= "$regularQuan Regular for $$regularTotal<br>";
}
if ($cafeQuan > 0) {
	$totalOrder .= "$cafeQuan Cafe au Lait for $$cafeTotal<br>";
}
if ($cappuccinoQuan > 0) {
	$totalOrder .= "$cappuccinoQuan Cappuccino for $$cappuccinoTotal<br><br>";
}
echo $totalOrder;
$menuLink = "<a href='../../menu.php'>Click here</a>";
echo "Redirecting you to Menu page in 10 seconds. $menuLink to return to menu page now.";
header("refresh:10;url=../../menu.php");
return;

function updateOrderTable($quantity, $product_id) {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return;
	}
 	$sql = "INSERT INTO f32ee.jj_orders (order_id, product_id, quantity) VALUES (NULL, $product_id, $quantity);";
	if (!mysqli_query($conn, $sql)) {
		echo "Failed to update database: " . mysqli_error($conn);
		mysqli_close($conn);
	}
}
function updateSalesTable($total, $product_id) {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return;
	}

	$sql = "UPDATE f32ee.jj_total_sales SET totals = $total WHERE product_id = $product_id;";
	if (!mysqli_query($conn, $sql)) {
		echo "Failed to update value for product id $product_id : " . mysqli_error($conn);
	}
}

function getCurrentPrice($product_id) {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return;
	}
	$sql = "SELECT product_price FROM f32ee.jj_products WHERE product_id = $product_id;";
	if (!$result = mysqli_query($conn, $sql)) {
		echo "Failed to get price for product $product_id : " . mysqli_error($conn);
	}
	$result = mysqli_fetch_row($result);
	return $result[0];
}

function getCurrentTotals($product_id) {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return;
	}
	$sql = "SELECT totals FROM f32ee.jj_total_sales WHERE product_id = $product_id;";
	if (!$result = mysqli_query($conn, $sql)) {
		echo "Failed to get totals for product $product_id : " . mysqli_error($conn);
	}
	$result = mysqli_fetch_row($result);
	return $result[0];
}

?>