<?php 
include "scripts/php/filltable.php";
?>
<head>
    <meta charset="UTF-8">
    <title>JavaJam Admin - Update Prices</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="scripts/javascript/admin_update_scripts.js"></script>
</head>
<body>
<header>

</header>
<div class="wrapper">
    <div class="navbar">
        <nav>
            <ul style="color:#000000; font-weight: bold;font-size:large;font-family: Arial, sans-serif;">
                <li><a href="admin.php"><< Go back</a></li>
                <li>Product Price</li>
                <li>Update</li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>Click to update product prices</h1>
        <form action="scripts/php/updateDB.php" method="get">
            <table id="admintable">
                <tr>
                    <td style="width:15px;">
                        <input type="checkbox" name="regularCheck" id="regularCheck" onclick="updateInputStatus(1)">
                    </td>
                    <th>Just Java</th>
                    <td>Regular house blend, decaffeinated coffee, or flavor of the day. <br>
                       Endless cup $<span id="regularPrice"></span><input style="width:40px;" step="0.01" formnovalidate type="hidden" id="regular" name="regular">
					   <?php insert_table_row(1) ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:15px;">
                        <input type="checkbox" name="cafeCheck" id="cafeCheck"  onclick="updateInputStatus(2)">
                    </td>
                    <th>Cafe au Lait</th>
                    <td>House blended coffee infused into a smooth, steamed milk.<br>
                        Single $<span id="cafeLowPrice"></span><input style="width: 40px;" step="0.01" type="hidden" id="smallCafe" name="smallCafe">
						<?php insert_table_row(2) ?>
                        Double $<span id="cafeHighPrice"></span><input style="width: 40px;" step="0.01" type="hidden" id="largeCafe" name="largeCafe">
						<?php insert_table_row(3) ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:15px;">
                        <input type="checkbox" name="cappuccinoCheck" id="cappuccinoCheck" onclick="updateInputStatus(3)">
                    </td>
                    <th>Iced Cappuccino</th>
                    <td>Sweetened espresso blended with icy-cold milk and served in a chilled glass<br>
                        Single $<span id="cappuccinoLowPrice"></span><input style="width: 40px;" step="0.01" type="hidden" id="smallCappuccino" name="smallCappuccino">
						<?php insert_table_row(4) ?>
                        Double $<span id="cappuccinoHighPrice"></span><input style="width: 40px;" step="0.01" type="hidden" id="largeCappuccino" name="largeCappuccino">
						<?php insert_table_row(5) ?>	
                </tr>
                <tr>
                    <td></td><td></td><td><input type="submit" value="Apply changes" style="float:right;"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<footer><br>Copyright &copy; 2014 JavaJam Coffee House<br>
    <a href="mailto:pontus@jarnemyr.com">pontus@jarnemyr.com</a>
</footer>
</div>
</body>