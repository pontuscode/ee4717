function validateName(){
    var name = document.getElementById("name").value;
    name.trim(); //remove any whitespace from both ends of the string
    if(name.length > 0){ //make sure it is not empty
        var regexp = /^([A-z',.\s?]+)$/;
        if(regexp.test(name)){
            return true;
        }
        else{
            alert("Name has incorrect format, please enter alphabetical symbols separated with a blankspace.");
            return false;
        }
    }
    alert("Please fill in your name.");
    return false;
}
function validateEmail(){
    var email = document.getElementById("email").value;
    email.trim();
    if(email.length > 0){ //make sure it is not empty
        var regexp = /^([\w\.-])+@([\w]+\.){1,3}([\w]){2,3}$/;
        if(regexp.test(email)){
            return true;
        }
        else{
            alert("Email entered in wrong format.");
            return false;
        }
    }
    alert("Please fill in your email.");
    return false;
}
function validateDate(){
    var date = new Date(document.getElementById("date").value);
    var currentDate = new Date();
    if((date.getFullYear() >= currentDate.getFullYear()) && (date.getMonth() >= currentDate.getMonth()) && (date.getDate() > currentDate.getDate())){
        return true;
    }
    alert("Date must be in the future.");
    return false;
}