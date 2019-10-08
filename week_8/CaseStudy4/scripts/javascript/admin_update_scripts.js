var priceArray = [2.0,2.0,3.0,4.75,5.75]; //Array with 5 elements, 1 for each different cup of coffee (large, small etc).

function updatePrice(id){
    switch(id){
        case 1:
            priceArray[0] = document.getElementById("regular").value;
            document.getElementById("regularPrice").innerHTML = getCurrentPrice(1);
            break;
        case 2:
            priceArray[1] = document.getElementById("cafeLow").value;
            priceArray[2] = document.getElementById("cafeHigh").value;
            document.getElementById("cafeLowPrice").innerHTML = getCurrentPrice(2);
            document.getElementById("cafeHighPrice").innerHTML = getCurrentPrice(3);
            break;
        case 3:
            priceArray[3] = document.getElementById("cappuccinoLow").value;
            priceArray[4] = document.getElementById("cappuccinoHigh").value;
            document.getElementById("cappuccinoLowPrice").innerHTML = getCurrentPrice(4);
            document.getElementById("cappuccinoHighPrice").innerHTML = getCurrentPrice(5);
            break;
    }
}
function getCurrentPrice(id){ //Temporary function for testing purposes until database is set up.
    for(i = 0; i < priceArray.length; i++){
        if((i+1) === id){
            return priceArray[i];
        }
    }
}

function updateInputStatus(id){
    //declaring variables outside the switch statement to avoid duplicate declarations
    let inputLow = document.getElementById("cafeLow");
    let inputHigh = document.getElementById("cafeHigh");
    switch(id){
        case 1:
            inputLow = document.getElementById("regular");
            if(document.getElementById("regularCheck").checked){ //If button is checked, show the input form
                inputLow.value = getCurrentPrice(1);
                inputLow.type = "number";
            }
            else{ //If button is unchecked, update the price and hide it.
                inputLow.type = "hidden";
                updatePrice(1);
            }
            break;
        case 2:
            if(document.getElementById("cafeCheck").checked){
                inputLow.type = "number";
                inputLow.value = getCurrentPrice(2);
                inputHigh.type = "number";
                inputHigh.value = getCurrentPrice(3);
            }
            else{ //Hide forms again and update prices
                inputLow.type = "hidden";
                inputHigh.type = "hidden";
                updatePrice(2);
            }
            break;
        case 3:
            inputLow = document.getElementById("cappuccinoLow");
            inputHigh = document.getElementById("cappuccinoHigh");
            if(document.getElementById("cappuccinoCheck").checked){
                inputLow.type = "number";
                inputLow.value = getCurrentPrice(4);
                inputHigh.type = "number";
                inputHigh.value = getCurrentPrice(5);
            }
            else{ //Hide forms, update prices
                inputLow.type = "hidden";
                inputHigh.type = "hidden";
                updatePrice(3);
            }
            break;
    }
}
function init(){
    document.getElementById("regularPrice").innerHTML = getCurrentPrice(1).toFixed(2);
    document.getElementById("cafeLowPrice").innerHTML = getCurrentPrice(2).toFixed(2);
    document.getElementById("cafeHighPrice").innerHTML = getCurrentPrice(3).toFixed(2);
    document.getElementById("cappuccinoLowPrice").innerHTML = getCurrentPrice(4).toFixed(2);
    document.getElementById("cappuccinoHighPrice").innerHTML = getCurrentPrice(5).toFixed(2);
}
window.onload=init;