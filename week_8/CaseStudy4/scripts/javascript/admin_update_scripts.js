function updateInputStatus(id){
    //declaring variables outside the switch statement to avoid duplicate declarations
    let inputLow = document.getElementById("smallCafe");
    let inputHigh = document.getElementById("largeCafe");
    switch(id){
        case 1:
            inputLow = document.getElementById("regular");
            if(document.getElementById("regularCheck").checked){ //If button is checked, show the input form
                inputLow.type = "number";
				document.getElementById("regularCheck").disabled = true;
            }
           /* else{ //If button is unchecked, hide the form.
                inputLow.type = "hidden";
            }*/
            break;
        case 2:
            if(document.getElementById("cafeCheck").checked) {
				document.getElementById("cafeCheck").disabled = true;
                inputLow.type = "number";
                inputHigh.type = "number";
            }
           /* else{ //Hide forms
                inputLow.type = "hidden";
                inputHigh.type = "hidden";
            }*/
            break;
        case 3:
            inputLow = document.getElementById("smallCappuccino");
            inputHigh = document.getElementById("largeCappuccino");
            if(document.getElementById("cappuccinoCheck").checked){
				document.getElementById("cappuccinoCheck").disabled = true;
                inputLow.type = "number";
                inputHigh.type = "number";
            }
            /*else{ //Hide forms
                inputLow.type = "hidden";
                inputHigh.type = "hidden";
            }*/
            break;
    }
}