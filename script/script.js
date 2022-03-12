function myTimer() {
	var d = new Date();
	document.getElementById("jam").innerHTML = d.toLocaleTimeString();
}
var myVar = setInterval(function() {
	myTimer();
}, 100);
	