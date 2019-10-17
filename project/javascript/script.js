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

function updatePrice(item_price_id) {
    var item_price = document.getElementById('item_price_id').value;
    var total_price = document.getElementById('total_price').value;

    total_price += item_price;
}


