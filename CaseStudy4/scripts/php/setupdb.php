<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$database = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//Testing if database exists with a random query. 
/*
$sql = "SELECT * from javajam.products";

if (!mysqli_query($conn, $sql)) { //If the DB doesn't exist, we need to create it. Else, go to line 68 and close the DB. 

	// If DB doesn't exist, we create it 

	$sql = "CREATE DATABASE IF NOT EXISTS javajam";

	if (!mysqli_query($conn, $sql)) {
		echo "Error creating database: " . mysqli_error($conn);
		mysqli_close($conn);
	}

	//Switch to javajam database.
*/
$sql = "use f32ee";
if (!mysqli_query($conn, $sql)) {
	echo "Failed to switch tables, check use statement.";
	mysqli_close($conn);
}

//Add some tables to the database

$sql = "CREATE TABLE IF NOT EXISTS jj_products (
product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
product_name VARCHAR(30) NOT NULL,
product_price DOUBLE NOT NULL
)";

if (!mysqli_query($conn, $sql)) {
	echo "Error creating Products table: " . mysqli_error($conn);
	mysqli_close($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS jj_orders (
							 order_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
							 product_id INT UNSIGNED, 
							 quantity INT, 
							 FOREIGN KEY (product_id) REFERENCES jj_products(product_id)
							 )";
if (!mysqli_query($conn, $sql)) {
	echo "Error creating Orders table: " . mysqli_error($conn);
	mysqli_close($conn);
}
$sql = "CREATE TABLE IF NOT EXISTS jj_total_sales (
								  product_id INT UNSIGNED PRIMARY KEY, 
								  totals DOUBLE,
								  FOREIGN KEY (product_id) REFERENCES jj_products(product_id)
								  )";
if (!mysqli_query($conn, $sql)) {
	echo "Error creating Total sales table: " . mysqli_error($conn);
	mysqli_close($conn);
}

//Fill tables with data

$sql = "INSERT INTO jj_products (product_id, product_name, product_price)
VALUES (NULL, 'Endless cup', 2.00);";
$sql .= "INSERT INTO jj_products (product_id, product_name, product_price)
VALUES (NULL, 'Small Cafe au Lait', 3.00);";
$sql .= "INSERT INTO jj_products (product_id, product_name, product_price)
VALUES (NULL, 'Large Cafe au Lait', 4.00);";
$sql .= "INSERT INTO jj_products (product_id, product_name, product_price)
VALUES (NULL, 'Small Cappuccino', 4.75);";
$sql .= "INSERT INTO jj_products (product_id, product_name, product_price)
VALUES (NULL, 'Large Cappuccino', 5.75);";

$sql .= "INSERT INTO jj_total_sales (product_id, totals)
VALUES (1, 0.0);";
$sql .= "INSERT INTO jj_total_sales (product_id, totals)
VALUES (2, 0.0);";
$sql .= "INSERT INTO jj_total_sales (product_id, totals)
VALUES (3, 0.0);";
$sql .= "INSERT INTO jj_total_sales (product_id, totals)
VALUES (4, 0.0);";
$sql .= "INSERT INTO jj_total_sales (product_id, totals)
VALUES (5, 0.0);";
if (!mysqli_multi_query($conn, $sql)) {
	echo "Failed to fill tables with data: " . mysqli_error($conn);
	mysqli_close($conn);
}
mysqli_close($conn);
?>