<?php 
$report=$_GET['report'];

if ($report == "total") {
	totalReport();
} elseif ($report == "quant") {
	quantReport();
} else {
	echo "something went wrong";
}

return;

function totalReport() {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return;
	}
	$sql = "SELECT * FROM javajam.total_sales;";
	if (!$result = mysqli_query($conn, $sql)) {
		echo "Failed to get total sales: " . mysqli_error($conn);
	}
	for($i = 0; $i < $result->num_rows; $i++) {
		$row = $result->fetch_assoc();
		echo "Product id: " . $row['product_id'] . "     Total sales: $" . $row['totals'] . "<br>";
	}
}

function quantReport() {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return;
	}
	$sql = "SELECT * FROM javajam.orders GROUP BY product_id;";
	if (!$result = mysqli_query($conn, $sql)) {
		echo "Failed to get sales quantity: " . mysqli_error($conn);
	}
	for($i = 0; $i < $result->num_rows; $i++) {
		$row = $result->fetch_assoc();
		echo "Product id: " . $row['product_id'] . "    Quantity: " . $row['quantity'] . "<br>";
	}
}

?>