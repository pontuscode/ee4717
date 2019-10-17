<?php
include "php/get_menu_info.php";
?>
<head>
    <meta charset="UTF-8">
    <title>The Durian Experience - Menu</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        Welcome to a new world of Durian cuisine.
    </header>
    <div class="navbar">
        <a href="index.html">
            <div class="navbar_element" style="margin-right: 1%;">
                Home
            </div>
        </a>
        <a href="menu.html">
            <div class="active_element" style="margin-right: 1%;">
                Menu
            </div>
        </a>
        <a href="deals.html">
            <div class="navbar_element" style="margin-right: 1%;">
                Deals of the Day
            </div>
        </a>
        <a href="jobs.html">
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
        <form method="get">
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
                    <td> <?php echo "$" . $product_price_1; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_2; ?> </th>
                    <td> <?php echo $product_description_2; ?> </td>
                    <td> <?php echo "$" . $product_price_2; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_3; ?> </th>
                    <td> <?php echo $product_description_3; ?> </td>
                    <td> <?php echo "$" . $product_price_3; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_4; ?> </th>
                    <td> <?php echo $product_description_4; ?> </td>
                    <td> <?php echo "$" . $product_price_4; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_5; ?> </th>
                    <td> <?php echo $product_description_5; ?> </td>
                    <td> <?php echo "$" . $product_price_5; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
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
                    <td> <?php echo "$" . $product_price_6; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
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
                    <td> <?php echo "$" . $product_price_7; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_8; ?> </th>
                    <td> <?php echo $product_description_8; ?> </td>
                    <td> <?php echo "$" . $product_price_8; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
                <tr>
                    <th> <?php echo $product_name_9; ?> </th>
                    <td> <?php echo $product_description_9; ?> </td>
                    <td> <?php echo "$" . $product_price_9; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
				<tr>
					<th colspan="4" class="category_header"> <?php echo $category_name_4; ?> </th>
				</tr>
				<tr>
					<td colspan="4" class="category_description"> <?php echo $category_description_4; ?> </td>
				</tr>
				<tr>
                    <th> <?php echo $product_name_10; ?> </th>
                    <td> <?php echo $product_description_10; ?> </td>
                    <td> <?php echo "$" . $product_price_10; ?> </td>
                    <td>
                        <input class="numberinput" type="number" min="0" value="0">
                    </td>
                </tr>
            </table>
            <input class="menusubmit" type="submit" value="Add to cart">
        </form>
    </div>
    <footer>
        Copyright &copy; The Durian Company 2019.
    </footer>
</body>