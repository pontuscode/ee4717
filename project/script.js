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

function updatePrice(item_name, item_price) {
    // create a static map of all items to calculate total price
    // key: item_name
    // value: {item_quantity : item_price}
    const items = new Map();

    // get the value of the quantity box
    var new_quantity = document.getElementById('numinput2').innerHTML;

    // check if item is in map
    if (items.has(item_name)) {
        // get the value if it is in there
        var old_quantity = items.get(item_name).item_quantity;
    }
    else {
        // if it wasn't then the previous value was definitely 0
        var old_quantity = 0;
    }

    // this is the value of the total price shown under the menu.
    var current_total = document.getElementById('menu_total_price').innerHTML;

    if (new_quantity > old_quantity) {
        var new_total = (parseFloat(current_total) + parseFloat(item_price)).toFixed(2);
    }
    else {
        var new_total = (parseFloat(current_total) - parseFloat(item_price)).toFixed(2);
    }

    // set the new total value
    document.getElementById('menu_total_price').innerHTML = new_total;
}


