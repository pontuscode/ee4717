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
    // value: {item_quantity, item_price}
    if( typeof items == 'undefined' ) {
        items = new Map();
    }

    // get the value of the quantity box
    var new_quantity = parseInt(document.getElementById('' + quantity_box_id).value);

    // this is to check what the quantity WAS (before the change).
    // get the quantity value if it is in there, else we add the product.
    if (items.has(item_name)) {
        var old_quantity = items.get(item_name)[1];
    }
    else {
        items.set(item_name, [item_price, 0]);
        var old_quantity = 0;
    }

    // scalar depending on if we added or removed from the quantity
    var scalar = ((new_quantity > old_quantity) ?  1 : -1);

    // update the new product quantity in the map
    items.set(item_name, [item_price, items.get(item_name)[1] + scalar]);

    // update the total price
    var current_total = document.getElementById('menu_total_price').innerHTML;
    var new_total = (parseFloat(current_total) + scalar * parseFloat(item_price)).toFixed(2);
    document.getElementById('menu_total_price').innerHTML = new_total;
}
