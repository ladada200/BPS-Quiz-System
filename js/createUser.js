// JavaScript Document

window.onload = function () {

	getUser();
	getScores();
	getQuizzes();
	

}

function getUser() {
	var url = "user12227.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			showUser(xmlhttp.responseText); // do something when server responds
			showSearch(xmlhttp.responseText);
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
