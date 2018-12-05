window.onload = function () {

	getUser();
	

}

function getUser() {
	var url = "user12227.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			showUser(xmlhttp.responseText); // do something when server responds
			showPassword(xmlhttp.responseText);
			showDelete(xmlhttp.responseText);
			showCreateUser(xmlhttp.responseText);
			showCreateQuestion(xmlhttp.responseText);
			showCreateQuiz(xmlhttp.responseText);
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

function showPassword(text) {

	var div = document.querySelector(".password");
	
	var user = JSON.parse(text);
	
	var content = "";
	
	if (user.permission == "user" || user.permission == "admin" || user.permission == "super") {
		
			content += "<div class='col-sm-8'><h3>Change Password</h3><br><h4>Password</h4> <input type='text' id='inputUsername' class='form-control' required autofocus><h4>Confirm Password</h4><input type=password id='inputConfirmPassword' class='form-control' required autocomplete=password><br> <button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btnchangepass'>Submit</button></div><br>";
		
	}



	div.innerHTML = content;

}

function showDelete(text) {

	var user = JSON.parse(text);

	var div = document.querySelector(".delete");

	var content = "";

	content += "<h3>Account Administration</h3><br>";

	if (user.permission == "user") {

		content += "<div class='col-sm-2'><h3></3><br><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btndeleteself'>Delete Account</button></div>";

	} else if (user.permission == "admin" || user.permission == "super") {
		
		getUserList();

		content += "<div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btndeleteself'>Delete Account</button></div><div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btndeleteother'>Delete Other Account</button></div><div class='col-sm-4 userList'></div>";
		
		
	} else {
		
		content += "<div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btncreateUser'>Create Account</button>";
	}

	div.innerHTML = content;

}

function showUserList(text) {

	var userList = JSON.parse(text);

	var div = document.querySelector(".userList");

	var content = "";

	content += "<select class='form-control userSelect'>";

	for (var i = 0; i < userList.users.length; i++) {

		content += "<option value='" + userList.users[i] + "'> User " + userList.users[i] + "</option>";

	}

	content += "</select>";

	div.innerHTML = content;
}

function showCreateUser(text) {

	var user = JSON.parse(text);

	var div = document.querySelector(".createUser");

	var content = "";

	if (user.permission == "admin") {

		content = "<div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btncreateUser'>Create Account</button>";

	} else if (user.permission == "super") {

		content = "<div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btncreateUser'>Create Account</button></div><div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btncreateAdmin'>Create Admin Account</button></div><div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btncreateSuper'>Create Super Account</button></div>";

	}

	div.innerHTML = content;

}

function showCreateQuestion(text) {

	var user = JSON.parse(text);

	var div = document.querySelector(".createQuestion");

	var content = "";


	if (user.permission == "admin" || user.permission == "super") {
		
		content = "<h3>Create Questions and Quizzes</h3><br><div class='col-sm-2'><a href='CreateQuestion/index.php'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btncreateQuestion'>Create Question</button></a></div>";
		
	}
	
	div.innerHTML = content;

}

function showCreateQuiz(text) {

	var user = JSON.parse(text);


	var div = document.querySelector(".createQuiz");

	var content = "";

	if (user.permission == "admin" || user.permission == "super") {
		
		content += "<div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btncreateQuiz'>Create Quiz</button></div>";
		
	}
	
	div.innerHTML = content;

}
