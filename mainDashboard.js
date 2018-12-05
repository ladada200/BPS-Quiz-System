// JavaScript Document

window.onload = function () {

	getUser();
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
	
	if (user.permission == "user" || user.permission == "admin" || user.permission == "super") {
		
		showScores();
		
	}
}



function getScores() {
	var url = "user12227score.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			showScores(xmlhttp.responseText); // do something when server responds
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function showScores(text) {
	var div = document.querySelector(".scores");

	var score = JSON.parse(text);

	var content = "";

	content += "<h2>Your scores: </h2>";

	content += "<div class='col-sm-4'><h3>Min: " + score.min + "</h3></div> <div class='col-sm-4'><h3>Max: " + score.max + "</h3></div> <div class='col-sm-4'><h3>Average: " + score.average + "</h3></div>";

	div.innerHTML = content;

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

function showSearch(text) {

	var resultsdiv = document.querySelector(".searchResults");
	var quizdiv = document.querySelector(".searchQuiz");

	var contentResults = "";
	var contentQuiz = "";

	var user = JSON.parse(text);


	contentResults += "<div class='col-sm-12'><h2>Results Search</h2><br></div>";
	contentQuiz += "<div class='col-sm-12'><h2>Quiz Search</h2><br></div>";

	if (user.permission == "user" || user.permission == "guest") {
		contentResults += "<div class='col-sm-3'><h4>Search for quiz results by: </h4></div> <div class='col-sm-3'><select class='form-control typeSelect'>";
		contentResults += "<option value='title'>Quiz Title</option>";
		contentResults += "<option value='title'>Words in the Title</option>";
		contentResults += "<option value='tags'>Tags</option>";
		contentResults += "<option value='dateRange'>Date Range</option>";
		contentResults += "<option value='scoreRange'>Score Range</option>";
		contentResults += "</select></div>";
		contentResults += " <div class='col-sm-4'><input type='text' id='resultSearch' class='form-control'></div>";
		contentResults += " <div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btnresults'>Go</button></div>";


		contentQuiz += "<div class='col-sm-3'><h4>Search for quizzes by: </h4></div> <div class='col-sm-3'><select class='form-control' name='resultsSelect'>";
		contentQuiz += "<option value='title'>ID</option>";
		contentQuiz += "<option value='title'>Words in the Title</option>";
		contentQuiz += "<option value='tags'>Tags</option>";
		contentQuiz += "</select></div>";
		contentQuiz += " <div class='col-sm-4'><input type='text' id='quizSearch' class='form-control'></div>";
		contentQuiz += " <div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btnquizzes'>Go</button></div>";

	} else if (user.permission == "admin" || user.permission == "super") {


		contentResults += "<div class='col-sm-3'><h4>Search for quiz results by: </h4></div> <div class='col-sm-3'><select class='form-control typeSelect'>";
		contentResults += "<option value='quiztitle'>Quiz Title</option>";
		contentResults += "<option value='wordsintitle'>Words in the Title</option>";
		contentResults += "<option value='tags'>Tags</option>";
		contentResults += "<option value='dateRange'>Date Range</option>";
		contentResults += "<option value='scoreRange'>Score Range</option>";
		contentResults += "</select></div>";
		contentResults += " <div class='col-sm-4'><input type='text' id='resultSearch' class='form-control'></div>";
		contentResults += " <div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btnresults'>Go</button></div>";


		contentQuiz += "<div class='col-sm-3'><h4>Search for quizzes by: </h4></div>";
		contentQuiz += "<div class='col-sm-2 userList'></div>";
		contentQuiz += "<div class='col-sm-2'><select class='form-control resultsSelect'>";
		contentQuiz += "<option value='id'>ID</option>";
		contentQuiz += "<option value='title'>Words in the Title</option>";
		contentQuiz += "<option value='tags'>Tags</option>";
		contentQuiz += "</select></div>";
		contentQuiz += " <div class='col-sm-3'><input type='text' id='quizSearch' class='form-control'></div>";
		contentQuiz += " <div class='col-sm-2'><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btnquizzes'>Go</button></div>";
		
		getUserList();

	}

	resultsdiv.innerHTML = contentResults;
	quizdiv.innerHTML = contentQuiz;

	quizandresultsSearch();
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

function getQuizzes() {
	var url = "quizzes.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			showQuizzes(xmlhttp.responseText); // do something when server responds
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function showQuizzes(text) {

	var quizzes = JSON.parse(text);

	var length = quizzes.quizzes.length;

	var div = document.querySelector(".popularQuiz");

	var content = "";

	content += "<h2>Popular Quizzes</h2>";

	content += "<div class='showQuizzes' id='style-3'>";

	for (var i = 0; i < length; i++) {

		if (i % 2 == 0) {

			content += "<div class='black'>" + quizzes.quizzes[i] + "</div>";

		} else {
			content += "<div class='grey'>" + quizzes.quizzes[i] + "</div>";
		}


	}

	content += "</div>"

	div.innerHTML = content;
}

function quizandresultsSearch() {

	var resultsdiv = document.querySelector(".searchResults");
	var quizdiv = document.querySelector(".searchQuiz");

	quizdiv.querySelector("#btnquizzes").addEventListener("click", sendQuizSearch);
	resultsdiv.querySelector("#btnresults").addEventListener("click", sendResultSearch);

}

function sendResultSearch() {
	
	
	var url = "results/" + usersDropDown + resultsTextInput;
	
	var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
	if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
		var resp = xmlhttp.responseText;
		if (resp.search("ERROR") >= 0 || resp != 1) {
			alert("oh no...");
			console.log(resp);
		} else {
			//getAllItems();
		}
	}
};
xmlhttp.open("SEARCH", url, true);
xmlhttp.send(JSON.stringify(obj));
	
}



function sendQuizSearch(text) {

	var user = JSON.parse(text);

	var resultsTypeDropDown = document.querySelector(".resultsSelect").value;

	var resultsTextInput = document.querySelector("#quizSearch").value;

	var url = "";
	var obj = null;


	if (user.permission == "user") {
		
			obj = {
		"searchType": resultsTypeDropDown,
		"searchInput": resultsTextInput

	};

	url = "results/" + resultsTypeDropDown + resultsTextInput;

	} else if (user.permission == "admin" || user.permission == "super") {
		
		var usersDropDown = document.querySelector(".userSelect").value;

	obj = {
		"userID": usersDropDown,
		"searchType": resultsTypeDropDown,
		"searchInput": resultsTextInput

	};

	url = "results/" + usersDropDown + resultsTypeDropDown + resultsTextInput;


}


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
	if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
		var resp = xmlhttp.responseText;
		if (resp.search("ERROR") >= 0 || resp != 1) {
			alert("oh no...");
			console.log(resp);
		} else {
			//getAllItems();
		}
	}
};
xmlhttp.open("SEARCH", url, true);
xmlhttp.send(JSON.stringify(obj));
}
