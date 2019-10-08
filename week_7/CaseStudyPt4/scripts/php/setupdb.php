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

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS javajam";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn);
	mysqli_close($conn);
}

//Switch to javajam database.

$sql = "use javajam";

if (mysqli_query($conn, $sql)) {
	echo "Switched to javajam table successfully.<br>";
} else {
	echo "Failed to switch tables, check use statement.";
	mysqli_close($conn);
}

//Add some tables to the database

$sql = "CREATE TABLE products (
product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
product_name VARCHAR(30) NOT NULL,
product_price DOUBLE NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Added tables successfully.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
	mysqli_close($conn);
}

//Fill tables with data

$sql = "INSERT INTO products (product_id, product_name, product_price)
VALUES (NULL, 'Endless regular', 2.00);";
$sql .= "INSERT INTO products (product_id, product_name, product_price)
VALUES (NULL, 'Small café au lait', 3.00);";
$sql .= "INSERT INTO products (product_id, product_name, product_price)
VALUES (NULL, 'Large café au lait', 4.00);";
$sql .= "INSERT INTO products (product_id, product_name, product_price)
VALUES (NULL, 'Small cappuccino', 4.75);";
$sql .= "INSERT INTO products (product_id, product_name, product_price)
VALUES (NULL, 'Large cappuccino', 5.75);";

if (mysqli_multi_query($conn, $sql)) {
	echo "Filled tables successfully.<br>";
} else {
	echo "Failed to fill tables with data: " . mysqli_error($conn);
	mysqli_close($conn);
}
mysqli_close($conn);
?>