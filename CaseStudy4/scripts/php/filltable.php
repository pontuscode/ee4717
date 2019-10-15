<?php
function insert_table_row($id) {
	$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT product_price FROM f32ee.jj_products WHERE product_id = $id;";
	if ($result = mysqli_query($conn, $sql)) {
		$row = mysqli_fetch_row($result);
		echo number_format((float)$row[0], 2, '.', '');
	} else {
		echo "Failed fetching data from database.";
	}
	mysqli_close($conn);
}
?>