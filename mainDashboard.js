// JavaScript Document

window.onload=function() {
	
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
	

	var div = document.querySelector(".user");
	
	var user = JSON.parse(text);
	
	var content = "";
	
	content += "User " + user.userName + " <a href='settings.html' target='_blank'>Settings</a>";
	
	div.innerHTML = content;
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
	
	content += "Min: " + score.min + " Max: " + score.max + " Average: " + score.average;
	
	div.innerHTML = content;
	
}

function showSearch(text) {
		
	var resultsdiv = document.querySelector(".searchResults");
	var quizdiv = document.querySelector(".searchQuiz");
	
	var contentResults = "";
	var contentQuiz = "";
	
	var user = JSON.parse(text);
	
	contentResults += "<h2>Results Search</h2>";
	contentQuiz += "<h2>Quiz Search</h2>";
	
	if(user.permission == "user") {
		contentResults +="user results search <br>";
		contentQuiz += "quiz results search";
	}
	else if(user.permission == "admin" || user.permission == "super") {
		contentResults +="admin results search <br>";
		contentQuiz += "quiz results search";
	}
	
	resultsdiv.innerHTML = contentResults;
	quizdiv.innerHTML = contentQuiz;
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
	
	content = "<h2>Popular Quizzes</h2>";
	
	for (var i = 0; i < length; i++) {
		
		content += quizzes.quizzes[i] + "<br>";
	}
	
	div.innerHTML = content;
}