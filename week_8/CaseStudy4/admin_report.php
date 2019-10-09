<?php 
include "scripts/php/generatereport.php";
?>
<head>
    <meta charset="UTF-8">
    <title>JavaJam Admin - Main Page</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<header>

</header>
<div class="wrapper">
    <div class="navbar">
        <nav>
            <ul style="color:#000000; font-weight: bold;font-size:large;font-family: Arial, sans-serif;">
                <li><a href="admin.html"><< Go back</a></li>
                <li>Daily</li>
                <li>Sales</li>
                <li>Report</li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>Click to generate daily sales report:<br></h1>
        <label style="font-weight: bold; font-size: 24px; font-family: Arial, sans-serif;"><input type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;Total dollar sales by product<br></label>
        <label style="font-weight: bold; font-size: 24px; font-family: Arial, sans-serif;"><input type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;Sales quantities by product categories<br></label>
    </div>
</div>
<footer><br>Copyright &copy; 2014 JavaJam Coffee House<br>
    <a href="mailto:pontus@jarnemyr.com">pontus@jarnemyr.com</a>
</footer>
</body>