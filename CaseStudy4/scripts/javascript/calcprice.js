var priceArray = [0.0,0.0,0.0];

function calculatePrice(id){
    switch(id){
        case 1:
            priceArray[0] = getPrice(1)*getQuantity(id);
            document.getElementById("regularTotal").innerHTML = priceArray[0].toFixed(2);
            break;
        case 2:
            if(document.getElementById("smallCafe").checked){
                priceArray[1] = getPrice(2)*getQuantity(id);
            }
            else {
                priceArray[1] = getPrice(3)*getQuantity(id);
            }
            document.getElementById("cafeTotal").innerHTML = priceArray[1].toFixed(2);
            break;
        case 3:
            if(document.getElementById("smallCappuccino").checked){
                priceArray[2] = getPrice(4)*getQuantity(id);
            }
            else{
                priceArray[2] = getPrice(5)*getQuantity(id);
            }
            document.getElementById("cappuccinoTotal").innerHTML = priceArray[2].toFixed(2);
            break;
    }
    document.getElementById("totalPrice").innerHTML = calculateTotal().toFixed(2);
}
function calculateTotal(){
    return (priceArray[0] + priceArray[1] + priceArray[2]);
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

function getPrice(id){
	switch(id){
		case 1:
			return (parseFloat(document.getElementById("regularPrice").textContent));
		case 2:
			return (parseFloat(document.getElementById("smallCafePrice").textContent));
		case 3:
			return (parseFloat(document.getElementById("largeCafePrice").textContent));
		case 4:
			return (parseFloat(document.getElementById("smallCappuccinoPrice").textContent));
		case 5:
			return (parseFloat(document.getElementById("largeCappuccinoPrice").textContent));
	}
}
function init(){
	document.getElementById("regularTotal").innerHTML = priceArray[0].toFixed(2);
	document.getElementById("cafeTotal").innerHTML = priceArray[1].toFixed(2);
	document.getElementById("cappuccinoTotal").innerHTML = priceArray[2].toFixed(2);
	document.getElementById("totalPrice").innerHTML = calculateTotal().toFixed(2);
}
