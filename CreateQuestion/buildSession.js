window.onload = function () {
    
    getUser();
     addChoices();     
     
    var numDropDown = document.querySelector("#numberofchoices").addEventListener("change", addChoices);

    var submitButton = document.querySelector("#questionForm").addEventListener("submit", submission);

};

//Adds different text inputs in an ordered list in the div setup for them.
function addChoices() {

    var numSelected = Number(document.querySelector("#numberofchoices").value);

    var div = document.querySelector("#choices");
    
    var input = "";
    
    if (numSelected > 3) {
        
        div.innerHTML = "";
    }
    
    input += "<ol type='a'>";

    for (i = 0; i < numSelected; i++) {

        input += "<li><input type='text' id='choice' class='form-control' name='choice" + i + "' required></li>";
    }
    
    input +="</ol>";

    div.innerHTML = input;


}

//Goes through and checks each one of the choices entered compared to the answer used. If one of the choices is not the same as the answer, submission is stopped.
function submission(e) {

var choicesSelect = document.querySelectorAll("#choice");

var answerSelect = document.querySelector("#answer");

var answer = answerSelect.value;

var counter = 0;

for(var i = 0; i < choicesSelect.length; i++) {
    
    var choice = choicesSelect[i].value;
    
    
    if(answer !== choice) { 
    
    counter++;
      
   }
}

if (counter === choicesSelect.length) {
    
        var span = document.querySelector("#error");
        
        span.innerHTML = "Error: answer must match choice!";
        e.preventDefault();
}
else {
    console.log("stuff");
}
}

function getUser() {
	var url = "../user12227.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			showUser(xmlhttp.responseText); // do something when server responds
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