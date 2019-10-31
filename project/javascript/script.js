function validateRegEx(regex, test_string) {
    if ( !(regex.test(test_string)) || test_string === "" )
    {
        alert('Invalid input');
        return false;
    }
    return true;
}

function validateName() {
    var name_string = document.getElementById('name').value;
    var name_regex = /^[A-Za-z\s]*$/;

    return validateRegEx(name_regex, name_string);
}

function validateEmail() {
    var email_string = document.getElementById('email').value;
    var email_regex = /^[a-zA-Z]{1}\w+(\.\w+[@]|[@])[a-zA-Z]{2,}[.][a-zA-Z]{2,3}$/;

    return validateRegEx(email_regex, email_string);
}

function validateDate() {
    var date = document.getElementById('date').value;
    var today = new Date();

    if ( (date.getFullYear() < today.getFullYear())
        || (date.getFullYear() === today.getFullYear())
        && date.getMonth() < today.getMonth()
        || (date.getFullYear() === today.getFullYear())
        && date.getMonth() === today.getMonth()
        && date.getDay() <= today.getDay())
    {
        alert('Invalid date');
        return false;
    }
    return true;
}

/*
* To update the total price, we add or remove directly from the total price by looking at whether we increased
* the quantity of the product or decreased it.
*
* The alternative is to add all the sub-prices together every time we change the quantity of any item. This
* solution would not only require hard-coding each item in this function (less scalable) and would require a
* sub-price to be stored for each item (memory), it would also be less efficient in terms of computing power.
*
* Having a general "updatePrice"-solution also can be used by all the pages to update the price of the cart,
* not just the menu.
* */
function updatePrice(quantity_box_id, item_name, item_price) {
    // static map containing all selected items
    // key: item_name
    // value: {item_price, old_quantity}
    if( typeof items == 'undefined' ) {
        items = new Map();
    }

    // get the value of the quantity box
    var new_quantity = parseInt(document.getElementById('' + quantity_box_id).value);

    // this is to check what the quantity WAS (before the change).
    var old_quantity = (items.has(item_name) ? items.get(item_name)[1] : 0);

    // scalar depending on if we added or removed from the quantity
    var scalar = ((new_quantity > old_quantity) ?  1 : -1);

    // update the total price
    var current_total = document.getElementById('menu_total_price').innerHTML;
    var new_total = (parseFloat(current_total) + scalar * parseFloat(item_price)).toFixed(2);
    document.getElementById('menu_total_price').innerHTML = new_total;

    // update the map with the products quantity, or delete entry if quantity == 0.
    if (new_quantity !== 0) {
        items.set(item_name, [item_price, new_quantity]);
    }
    else {
        items.delete(item_name);
    }
}

/*
* compile_cart() changes the value of three hidden boxes in the html: one that contains all the names of the selected
* products, one for the quantity, and one for the prices. These values are then sent via GET method to php which
* displays a shopping cart.
*/
function compile_cart()
{
    if( typeof items == 'undefined' ) {
        items = new Map();
    }

    // if entry[0] is in document.getElementById('prod_names').value then
    //
    for (const entry of items.entries()) {
        document.getElementById('prod_names').value += entry[0] + ";";
        document.getElementById('prod_prices').value += entry[1][0] + " ";
        document.getElementById('prod_quants').value += entry[1][1] + ";";
    }

    // clear menu
    for (i = 1; i <= 10; ++i) {
        document.getElementById('numinput' + i).value = 0;
    }
}

function creditcard_info() {
    let cc_no = document.getElementById("creditcard_number");
    let cvc_no = document.getElementById("cvc_number");
    if(document.getElementById('creditcard').selected){
        document.getElementById("creditcard_number_label").innerHTML = "Creditcard number*";
        document.getElementById("cvc_number_label").innerHTML = "CVC number*";
        cc_no.type = "text";
        cvc_no.type = "text";
        cc_no.required = "1";
        cvc_no.required = "1";
    } else {
        document.getElementById("creditcard_number_label").innerHTML = "";
        document.getElementById("cvc_number_label").innerHTML = "";
        cc_no.type = "hidden";
        cvc_no.type = "hidden";
        cc_no.required = "0";
        cvc_no.required = "0";
    }
}