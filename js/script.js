/*
My big file of javascript
*/

var carArray = new Array('car-blue.png','car-green.png','car-pink.png','car-red.png', 'car-yellow.png');

function changeCar() {
	var banger = carArray[Math.floor(Math.random() * carArray.length)];
	document.getElementById('car').src = 'img/' + banger;
}

function startTimer() {
	setInterval(changeMotd, 3000);
	
	// later I want to add some more automated stuff
}

var motdArray = new Array('It\'s a great day to sell cars!', 'Welcome to Bodys Used Motors. The finest cars left!', 'Today is \"SALE FEVER\" day!!!', 'A name you can surely trust!', 'Seen a car you like? Tell us it\'s reg number and we\'ll get it for you!', 'Never knowingly oversold!');

// The important message of the day (motd)
function changeMotd(){
	var randomMotd = motdArray[Math.floor(Math.random() * motdArray.length)];
	document.getElementById("motd").innerHTML=randomMotd;
}

function calculateCarValue(form) {
	
	var purchasePrice = form.carPurchasePrice.value;
	var carAge = form.carAge.value;
	
	if(carAge <= 2) value = calculateCarPrice(purchasePrice, 2);
	if(carAge == 3) value = calculateCarPrice(purchasePrice, 3);
	if(carAge == 4) value = calculateCarPrice(purchasePrice, 4);
	
	// If the car is 5 or more years we want it
	// More cheap stock is what we need!
	if(carAge == 5 || carAge > 5){
		window.alert('I would be happy to take this rust bucket.... I mean car off your hands. It\'s too old if it\'s ' + carAge + ' years old.');
		return;
	}
	
	window.alert('We would be happy to offer you \u00a3' + Math.round(value) + ' for your lovely car!');
}

function calculateCarPrice(purchasePrice, carAge){
	
	// I think this was meant to be at 10% not 1000%. We might make some money then.
	var purchaseRate = 10;
	
	var value = ((purchasePrice / 100) * purchaseRate) * (1 / carAge);
	return value;
}

function calculateLoan(){
	
	var borrowValue = parseInt(document.getElementById('borrowValue').value);
	
	// I think this was in months?
	var borrowTime = parseInt(document.getElementById('borrowTime').value);
	
	// We need at least 50% interest - i want a new hot tub
	var interestRate = 50;
	var monthlyInterestRate = interestRate / 12;
	
	var totalMessage = "";
	
	// We don't want to give loans under £1000
	// We want to make stacks of money, not just pocket change
	if(borrowValue < 1000){
		var message = 'I\'m sorry that is too little to borrow. Perhaps borrow &pound;1,000,000. It won\'t cost much, you can trust us.';
	}
	else {
		// my special interest rate calculation
		// passed down through my family
		var monthlyTotal = borrowValue * (monthlyInterestRate / (1 - (Math.pow((1 + monthlyInterestRate),(borrowTime * -1)))));
		var monthlyTotalRounded = Math.round(monthlyTotal);
		
		var message = 'We are happy to loan you &pound;' + numberWithCommas(borrowValue) + '. It will only cost <b>&pound;' + numberWithCommas(monthlyTotalRounded) + '</b> a month! That\'s a steal!';
		
		
		var totalRepayable = borrowValue + (borrowTime * monthlyTotal);
		var totalRepayableRounded = Math.round(totalRepayable);
		
		var totalMessage = 'Total repayable: <b>&pound;' + numberWithCommas(totalRepayableRounded) + '</b>';
	}
	
	
	document.getElementById('borrowTotalMonthly').innerHTML = message;
	document.getElementById('borrowTotalMonthly').style.display = 'block';
	
	document.getElementById('borrowTotal').innerHTML = totalMessage;
	document.getElementById('borrowTotal').style.display = 'block';
}

// I found this on the "Internet" - it's amazing what's there
function numberWithCommas(number) {
	return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}