var xhttp = new XMLHttpRequest();

function signupSubmit(e) {
	var data = $("#signupForm").serialize();
	var url = "../src/php/signup_action.php";
	var urlData = url + "?" + data;
	xhttp.open("POST", urlData, true);
	xhttp.send();
	xhttp.onreadystatechange = function () {

		var res = JSON.parse(this.responseText);

		if (res["status"] == 200) {
			window.location.replace("../public/home.php");
		} else {
			alert(res["Error in signing up!"]);
		}

	}
	e.preventDefault();
}

function signinSubmit(e) {
	var data = $("#signinForm").serialize();
	var url = "../src/php/signin_action.php";
	var urlData = url + "?" + data;
	xhttp.open("POST", url, true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
	xhttp.onreadystatechange = function () {
		if(xhttp.readyState == 4 && xhttp.status == 200){
			alert(xhttp.responseText)
		}
		// var res = JSON.parse(this.responseText);

		// if (res["status"] == 200) {
		// 	window.location.replace("../public/home.php");
		// } else {
		// 	alert(res["Error in signing up!"]);
		// }
		
	}
	xhttp.send(data);
	e.preventDefault();
}



function signoutClick(e) {
	var url = "../src/php/signout_action.php";
	xhttp.open("POST", url, true);
	xhttp.send();
	xhttp.onreadystatechange = function () {

		var res = JSON.parse(this.responseText);

		if (res["status"] == 200) {
			window.location.replace("../public/index.php");
		} else {
			alert(res["Error in signing out!"]);
		}

	}
	e.preventDefault();
}