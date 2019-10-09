<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Testing if database exists with a random query. 

$sql = "SELECT * from javajam.products";

if (!mysqli_query($conn, $sql)) { //If the DB doesn't exist, we need to create it. Else, go to line 68 and close the DB. 

	// If DB doesn't exist, we create it database

	$sql = "CREATE DATABASE IF NOT EXISTS javajam";

	if (!mysqli_query($conn, $sql)) {
		echo "Error creating database: " . mysqli_error($conn);
		mysqli_close($conn);
	}

	//Switch to javajam database.

	$sql = "use javajam";

	if (!mysqli_query($conn, $sql)) {
		echo "Failed to switch tables, check use statement.";
		mysqli_close($conn);
	}

	//Add some tables to the database

	$sql = "CREATE TABLE products (
	product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	product_name VARCHAR(30) NOT NULL,
	product_price DOUBLE NOT NULL
	)";

	if (!mysqli_query($conn, $sql)) {
		echo "Error creating table: " . mysqli_error($conn);
		mysqli_close($conn);
	}

	//Fill tables with data

	$sql = "INSERT INTO products (product_id, product_name, product_price)
	VALUES (NULL, 'Endless cup', 2.00);";
	$sql .= "INSERT INTO products (product_id, product_name, product_price)
	VALUES (NULL, 'Small Cafe au Lait', 3.00);";
	$sql .= "INSERT INTO products (product_id, product_name, product_price)
	VALUES (NULL, 'Large Cafe au Lait', 4.00);";
	$sql .= "INSERT INTO products (product_id, product_name, product_price)
	VALUES (NULL, 'Small Cappuccino', 4.75);";
	$sql .= "INSERT INTO products (product_id, product_name, product_price)
	VALUES (NULL, 'Large Cappuccino', 5.75);";

	if (!mysqli_multi_query($conn, $sql)) {
		echo "Failed to fill tables with data: " . mysqli_error($conn);
		mysqli_close($conn);
	}
}
mysqli_close($conn);
?>