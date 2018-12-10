/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.onload = function() {
    clickHandlers();
}

function clickHandlers() {
    var allBtns = document.querySelectorAll("button");
    allBtns.forEach(function(item) {
        item.addEventListener("click", eventHandler, false);
    });
}

function eventHandler(e) {
    e.preventDefault();
    console.log(e.target.classList);
    switch (e.target.classList.value) {
        case "add":
            addQuestion();
            break;
        case "remove":
            removeQuestion(this.parentNode);
            break;
        case "more":
            more(this.parentNode);
            break;
        case "less":

            //less(this.parentNode.id);
            break;
        default:
            break;
    }
}

function more(input) {
  document.querySelector("#" + input.id).innerHTML += "<input type=\"text\">\n";
}

function addQuestion() {
    var allQuestions = document.querySelector("#questionList").querySelectorAll("li");
    var x = allQuestions[allQuestions.length -1];
    var q = x.cloneNode(true);
    q.id = Number(allQuestions[allQuestions.length -1].id) + 1;
    document.querySelector("#questionList").appendChild(q);
    clickHandlers();
}

function removeQuestion(input) {
    console.log(input.parentNode);
    var allQuestions = document.querySelector("#questionList").querySelectorAll("li");
    if (allQuestions.length > 1) {
        for(var i = 0; i < allQuestions.length; i++) {
          if (allQuestions[i].id == input.parentNode.id) {
            document.querySelector("#questionList").removeChild(allQuestions[i]);
          }
        }
        clickHandlers();
    }
}

function updateQuestion() {
    var allQuestions = document.querySelectorAll("li");
    document.querySelector("#questionList").innerHTML = "";
    if (allQuestions.length > 1) {
        for(var i = 0; i < allQuestions.length; i++) {
            document.querySelector("#questionList").innerHTML += "<li id=\""+allQuestions[i].id+"\">" + allQuestions[i].innerHTML + "</li>";
        }
    }
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
