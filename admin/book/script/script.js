function call(link){
	document.getElementById("content").innerHTML = "<iframe src = 'list/" + link + "' height = 300px width = 1230px>";
}
function logout(){
	document.location = "../logout/logout.php";
}