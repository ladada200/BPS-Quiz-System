/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = function() {
    gettempuser();
}

function gettempuser() {
    var url = "account/";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var resp = JSON.parse(xmlhttp.responseText);
            console.log(resp);
        }
    };
    xmlhttp.open("tempUser", url, true);
    //xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    //xmlhttp.send(JSON.stringify(obj));
}

/*
var car = document.querySelector(".highlighted").querySelectorAll("td");
     var obj = {
        carID: car[0].innerHTML,
        carYear: car[1].innerHTML,
        carMake: car[2].innerHTML,
        carModel: car[3].innerHTML,
        carColour: car[4].innerHTML,
        carPrice: car[5].innerHTML
    }
*/  