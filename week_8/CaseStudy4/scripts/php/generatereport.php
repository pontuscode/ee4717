<?php 

$report=$_GET['report'];

if ($report == "total") {
	totalReport();
} elseif ($report == "quant") {
	quantReport();
} else {
	echo "something went wrong";
}

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
	for($i = 1; $i <= $result->num_rows; $i++) {
		$row = $result->fetch_assoc();
		$sql = "SELECT product_name FROM javajam.products WHERE product_id = $i;";
		if (!$name = mysqli_query($conn, $sql)) {
			echo "Failed to get product name when loading Quantity report" . mysqli_error($conn);
		}
		$name = mysqli_fetch_row($name);
		echo "$name[0]: " . "$" . $row['totals'] . "<br>";
	}
	return;
}

function quantReport() {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return;
	}
	$sql = "SELECT product_id, sum(quantity) FROM javajam.orders GROUP BY product_id;";
	if (!$result = mysqli_query($conn, $sql)) {
		echo "Failed to get sales quantity: " . mysqli_error($conn);
	}
	for($i = 1; $i <= $result->num_rows; $i++) {
		$row = $result->fetch_assoc();
		$sql = "SELECT product_name FROM javajam.products WHERE product_id = $i;";
		if (!$name = mysqli_query($conn, $sql)) {
			echo "Failed to get product name when loading Quantity report" . mysqli_error($conn);
		}
		$name = mysqli_fetch_row($name);
		echo "$name[0]: " .  $row['sum(quantity)'] . "<br>";
	}
	return;
}
?>