<?php
    include "php/get_menu_info.php";
	include "php/setup_session.php";
?>

<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Menu</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="javascript/script.js"></script>
</head>
<body>
    <header>
		<a href="catalogue.php">
			<span id="shopping_cart" class="shopping_cart">
			    <?php
			        $total = 0;
			        for($i = 0; $i < count($_SESSION['cart']); $i++){
                        $total += $_SESSION['cart'][$i];
			        }
			        echo $total;
                ?>
			</span>
		</a>
    </header>
    <div class="navbar">
        <a href="index.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Home
            </div>
        </a>
        <a href="menu.php">
            <div class="active_element" style="margin-right: 1%;">
                Menu
            </div>
        </a>
        <a href="deals.php">
            <div class="navbar_element" style="margin-right: 1%;">
                Deals of the Day
            </div>
        </a>
        <a href="jobs.php">
            <div class="navbar_element">
                Jobs
            </div>
        </a>
    </div>
    <div class="wrapper">
        <h2 class="centeredheader">
            Menu
        </h2>
        <p class="centeredparagraph">
            Place an order by choosing the amount and then clicking Add to cart.
        </p>
       <form action="php/add_to_cart_menu.php" method="get">
            <table id="menutable">
				<tr>
					<th colspan="4" class="category_header"> <?php echo $category_name_1; ?> </th>
				</tr>
				<tr>
					<td colspan="4" class="category_description"> <?php echo $category_description_1; ?> </td>
				</tr>
                <tr>
                    <th> <?php echo $product_name_1; ?> </th>
                    <td> <?php echo $product_description_1; ?> </td>
                    <td> <?php echo "$";?><span id="product_1"><?php echo $product_price_1;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput1" min="0" value=0 onchange="updatePrice('numinput1','<?php echo $product_name_1; ?>', <?php echo $product_price_1;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_2; ?> </th>
                    <td> <?php echo $product_description_2; ?> </td>
                    <td> <?php echo "$";?><span id="product_2"><?php echo $product_price_2;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput2" min="0" value=0 onchange="updatePrice('numinput2','<?php echo $product_name_2; ?>', <?php echo $product_price_2;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_3; ?> </th>
                    <td> <?php echo $product_description_3; ?> </td>
                    <td> <?php echo "$";?><span id="product_3"><?php echo $product_price_3;?></span></td>
                    <td>
                        <input class="numberinput" type="number" min="0" id="numinput3" value=0 onchange="updatePrice('numinput3','<?php echo $product_name_3; ?>', <?php echo $product_price_3;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_4; ?> </th>
                    <td> <?php echo $product_description_4; ?> </td>
                    <td> <?php echo "$";?><span id="product_4"></span><?php echo $product_price_4; ?> </td>
                    <td>
                        <input class="numberinput" type="number" id="numinput4" min="0" value=0 onchange="updatePrice('numinput4','<?php echo $product_name_4; ?>', <?php echo $product_price_4;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_5; ?> </th>
                    <td> <?php echo $product_description_5; ?> </td>
                    <td> <?php echo "$";?><span id="product_5"></span><?php echo $product_price_5; ?> </td>
                    <td>
                        <input class="numberinput" type="number" id="numinput5" min="0" value=0 onchange="updatePrice('numinput5','<?php echo $product_name_5; ?>', <?php echo $product_price_5;?>)">
                    </td>
                </tr>
				<tr>
					<th colspan="4" class="category_header"> <?php echo $category_name_2; ?> </th>
				</tr>
				<tr>
					<td colspan="4" class="category_description"> <?php echo $category_description_2; ?> </td>
				</tr>
                <tr>
                    <th> <?php echo $product_name_6; ?> </th>
                    <td> <?php echo $product_description_6; ?> </td>
                    <td> <?php echo "$";?><span id="product_6"><?php echo $product_price_6;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput6" min="0" value=0 onchange="updatePrice('numinput6','<?php echo $product_name_6; ?>', <?php echo $product_price_6;?>)">
                    </td>
                </tr>
                <tr>
				<tr>
					<th colspan="4" class="category_header"> <?php echo $category_name_3; ?> </th>
				</tr>
				<tr>
					<td colspan="4" class="category_description"> <?php echo $category_description_3; ?> </td>
				</tr>
                    <th> <?php echo $product_name_7; ?> </th>
                    <td> <?php echo $product_description_7; ?> </td>
                    <td> <?php echo "$";?><span id="product_7"><?php echo $product_price_7;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput7" min="0" value=0 onchange="updatePrice('numinput7','<?php echo $product_name_7; ?>', <?php echo $product_price_7;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_8; ?> </th>
                    <td> <?php echo $product_description_8; ?> </td>
                    <td> <?php echo "$";?><span id="product_8"><?php echo $product_price_8;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput8" min="0" value=0 onchange="updatePrice('numinput8','<?php echo $product_name_8; ?>', <?php echo $product_price_8;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_9; ?> </th>
                    <td> <?php echo $product_description_9; ?> </td>
                    <td> <?php echo "$";?><span id="product_9"><?php echo $product_price_9;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput9" min="0" value=0 onchange="updatePrice('numinput9', '<?php echo $product_name_9; ?>', <?php echo $product_price_9;?>)">
                    </td>
                </tr>
				<tr>
					<th colspan="4" class="category_header"><?php echo $category_name_4; ?> </th>
				</tr>
				<tr>
					<td colspan="4" class="category_description"><?php echo $category_description_4; ?> </td>
				</tr>
				<tr>
                    <th> <?php echo $product_name_10; ?> </th>
                    <td> <?php echo $product_description_10; ?> </td>
                    <td> <?php echo "$";?><span id="product_10"><?php echo $product_price_10;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput10" min="0" value=0 onchange="updatePrice('numinput10','<?php echo $product_name_10; ?>', <?php echo $product_price_10;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_11; ?> </th>
                    <td> <?php echo $product_description_11; ?> </td>
                    <td> <?php echo "$";?><span id="product_11"><?php echo $product_price_11;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput11" min="0" value=0 onchange="updatePrice('numinput11','<?php echo $product_name_11; ?>', <?php echo $product_price_11;?>)">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_12; ?> </th>
                    <td> <?php echo $product_description_12; ?> </td>
                    <td> <?php echo "$";?><span id="product_12"><?php echo $product_price_12;?></span></td>
                    <td>
                        <input class="numberinput" type="number" id="numinput12" min="0" value=0 onchange="updatePrice('numinput12','<?php echo $product_name_12; ?>', <?php echo $product_price_12;?>)">
                    </td>
                </tr>
            </table>

            <input class="numberinput" type="hidden" id="prod_names" name="prod_names" value="">
            <input class="numberinput" type="hidden" id="prod_quants" name="prod_quants" value="">
            <input class="numberinput" type="hidden" id="prod_prices" name="prod_prices" value="">

            <div id="price_and_cart">
                total price: S$<span id="menu_total_price">0.00</span> <br>
                <input class="menusubmit" type="submit" value="Add to cart" onclick="compile_cart()">
            </div>
        </form>
    </div>
    <footer>
        Copyright &copy; The Durian Company 2019.
    </footer>
</body>
