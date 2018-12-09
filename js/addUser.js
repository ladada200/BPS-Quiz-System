window.onload = function() {
  ehs();
}

function ehs() {
  var btns = document.querySelectorAll("button");
  btns.forEach(function(item) {
    item.addEventListener("click", checkInputs, false);
  });

}

function checkInputs(e) {
  var allInputs = document.querySelectorAll("input");

  try {
    allInputs.forEach(function(item) {
      if (item.value == null || item.value == "") {
        throw (item.id + " contains Null value");
      }
    });
    var obj = {
        "username": document.querySelector("#userNameInput").value,
        "password": document.querySelector("#passwordInput").value,
        "email": document.querySelector("#emailInput").value
    };
    var url = "account/";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var resp = this.responseText;
            if (resp.includes("added")) {
              window.location.href="login.html";
            } else {
              alert(resp);
            }
        }
    };
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(JSON.stringify(obj));
  } catch (ex) {
    console.log(ex);
  }



}
