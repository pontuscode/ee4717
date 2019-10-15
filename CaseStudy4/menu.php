<?php 
include "scripts/php/filltable.php";
?>
<head>
    <meta charset="UTF-8">
    <title>JavaJam Coffee House Menu</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="scripts/javascript/calcprice.js"></script>
</head>
<body onload="init();">
<header>

</header>
<div class="wrapper">
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="music.html">Music</a></li>
                <li><a href="jobs.html">Jobs</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>Coffee at JavaJam</h1>
		<form action="scripts/php/placeorder.php" method="get">
			<table id="menutable">
				<tr>
					<th>Just Java</th>
					<td>Regular house blend, decaffeinated coffee, or flavor of the day. <br>
						<label><input type="radio" id="regular" name="regularRadio" onchange="calculatePrice(1)" checked>Endless cup $</label>
						<span id="regularPrice"><?php insert_table_row(1) ?></span>
					</td>
					<td>
						<label><input type="number" name="regularQuan" id="regularQuan" value="0" min="0" style="width:30px;" onchange="calculatePrice(1)"></label>
					</td>
					<td style="width:120px;">
						<p>
							Subtotal: $<span id="regularTotal"></span>
						</p>
					</td>
				</tr>
				<tr>
					<th>Cafe au Lait</th>
					<td>House blended coffee infused into a smooth, steamed milk.<br>
						<label><input type="radio" value="smallCafe" id="smallCafe" name="radioCafe" onchange="calculatePrice(2)" checked>Single $</label>
						<span id="smallCafePrice"><?php insert_table_row(2) ?></span>
						<label><input type="radio" value="largeCafe" id="largeCafe" name="radioCafe" onchange="calculatePrice(2)">Double $</label>
						<span id="largeCafePrice"><?php insert_table_row(3) ?></span>
					</td>
					<td>
						<label><input type="number" name="cafeQuan" id="cafeQuan" value="0" min="0" style="width:30px;" onchange="calculatePrice(2)"></label>
					</td>
					<td style="width:120px;">
						<p>
							Subtotal: $<span id="cafeTotal"></span>
						</p>
					</td>
				</tr>
				<tr>
					<th>Iced Cappuccino</th>
					<td>Sweetened espresso blended with icy-cold milk and served in a chilled glass<br>
						<label><input type="radio" value="smallCappuccino" id="smallCappuccino" name="radioCappuccino" onchange="calculatePrice(3)" checked>Single $</label>
						<span id="smallCappuccinoPrice"><?php insert_table_row(4) ?></span>
						<label><input type="radio" value="largeCappuccino" id="largeCappuccino" name="radioCappuccino" onchange="calculatePrice(3)">Double $ </label>
						<span id="largeCappuccinoPrice"><?php insert_table_row(5) ?></span>
					<td>
						<label><input type="number" name="cappuccinoQuan" id="cappuccinoQuan" value="0" style="width:30px;" min="0" onchange="calculatePrice(3)"></label>
					</td>
					<td style="width:120px;">
						<p>
							Subtotal: $<span id="cappuccinoTotal"></span>
						</p>
					</td>
				</tr>
				<tr>
					<td></td><td></td><td></td>
					<td style="width:120px;">
						<p>
							Total: $<span id="totalPrice"></span>
						</p>
					</td>
				</tr>
			</table>
			<input style="margin-left:495px;" type="submit" value="Place order">
		</form>
    </div>
</div>
<footer><br>Copyright &copy; 2014 JavaJam Coffee House<br>
    <a href="mailto:pontus@jarnemyr.com">pontus@jarnemyr.com</a>
</footer>
</div>
</body>