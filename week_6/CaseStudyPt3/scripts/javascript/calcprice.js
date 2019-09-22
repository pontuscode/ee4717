var priceArray = [0.0,0.0,0.0];

function updatePrice(id){
    switch(id){
        case 1:
            priceArray[0] = 2*getQuantity(1);
            document.getElementById("regularTotal").innerHTML = priceArray[0].toFixed(2);
            break;
        case 2:
            if(document.getElementById("cafeLow").checked){
                priceArray[1] = 2.0*getQuantity(2);
            }
            else {
                priceArray[1] = 3.0*getQuantity(2);
            }
            document.getElementById("cafeTotal").innerHTML = priceArray[1].toFixed(2);
            break;
        case 3:
            if(document.getElementById("cappuccinoLow").checked){
                priceArray[2] = 4.75*getQuantity(3);
            }
            else{
                priceArray[2] = 5.75*getQuantity(3);
            }
            document.getElementById("cappuccinoTotal").innerHTML = priceArray[2].toFixed(2);
            break;
    }
    calculateTotal();
}
function calculateTotal(){
    const total = priceArray[0] + priceArray[1] + priceArray[2];
    document.getElementById("totalPrice").innerHTML = total.toFixed(2);
}
function getQuantity(id){
    switch(id){
        case 1:
            return document.getElementById("regularQuan").value;
        case 2:
            return document.getElementById("cafeQuan").value;
        case 3:
            return document.getElementById("cappuccinoQuan").value;
    }
}
function init(){
    updatePrice(1);
    updatePrice(2);
    updatePrice(3);
    document.getElementById("regularTotal").innerHTML = priceArray[0].toFixed(2);
    document.getElementById("cafeTotal").innerHTML = priceArray[1].toFixed(2);
    document.getElementById("cappuccinoTotal").innerHTML = priceArray[2].toFixed(2);
    document.getElementById("totalPrice").innerHTML = (priceArray[0] + priceArray[1] + priceArray[2]).toFixed(2);
}
window.onload=init;
