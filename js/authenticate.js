/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = () => {
    //empty
    ceh();
}

function ceh() {
    document.querySelector("#btnLogin").addEventListener("click", getUser, false);
    document.querySelector("#btnContinueAsGuest").addEventListener("click", getUser, false);
}

function evth(e) {
    e.preventDefault();
    
    if (e.srcElement.id == "btnLogin") {
        var uName = document.querySelector("#inputUsername").value;
        var pWord = document.querySelector("#inputPassword").value;
        var obj = {
            username: uName,
            password: pWord
        };
        var url = "account/";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                var resp = this.responseText;
                console.log(resp);
            }
        };
        xmlhttp.open("login", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(JSON.stringify(obj));
        
    } else if (e.srcElement.id == "btnContinueAsGuest") {
        
    }
    
    
}

function getUser(e) {
    
    var url = "";
    
    if (e.srcElement.id == "btnLogin") {
	url = "user12227.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
//			showUser(xmlhttp.responseText); // do something when server responds
//			showSearch(xmlhttp.responseText);
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
    } else if (e.srcElement.id == "btnContinueAsGuest") {
        
        	url = "guest.json"; // file name or server-side process name
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
//			showUser(xmlhttp.responseText); // do something when server responds
//			showSearch(xmlhttp.responseText);
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
        
    }
}

function storeUser()