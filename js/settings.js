window.onload = function () {

	getUser();
	showPassword();

}

function getUser() {
	var url = "user12227.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			showUser(xmlhttp.responseText); // do something when server responds
			showDelete(xmlhttp.responseText);
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();

}

function getUserList(text) {

	var url = "userlist.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			showUserList(xmlhttp.responseText); // do something when server responds
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();

}

function showUser(text) {


	var userDiv = document.querySelector(".user");

	var user = JSON.parse(text);

	var content = "";

	content += "Welcome, User " + user.userName + "! <a href='settings.html' target='_blank'>Settings</a>";

	userDiv.innerHTML = content;
}

function showPassword() {
	
	var div = document.querySelector(".password");
	
	var content = "<div class='col-sm-8'><h3>Change Password</h3><br><h4>Password</h4> <input type='text' id='inputUsername' class='form-control' required autofocus><h4>Confirm Password</h4><input type=password id='inputConfirmPassword' class='form-control' required autocomplete=password><br> <button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btnchangepass'>Submit</button></div>";
	
	div.innerHTML = content;
	
}

function showDelete(text) {
	
	var user = JSON.parse(text);
	
	var div = document.querySelector(".delete");
	
	var content = "";
	
	if (user.permission == "user") { 
		
		content = "<div class='col-sm-2'><h3></3><br><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btndeleteself'>Delete Account</button></div>";
		
	} else if (user.permission == "admin" || user.permission == "super") {
		
		content = "<div class='col-sm-2'><br><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btndeleteself'>Delete Account</button></div><div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btndeleteother'>Delete Other Account</button></div>";
	}
	
	div.innerHTML = content;

}