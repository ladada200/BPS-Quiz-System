<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="lib/main.css" />
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alegreya Sans SC" rel="stylesheet">
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="quiztheme.css" type="text/css">
        <script type="text/javascript">

            window.onload = function () {
                document.querySelector("#btnSubmit").addEventListener("click", simple, false);
            }

            function simple(e) {
                e.preventDefault();
                try {
                    var allInputs = document.querySelectorAll("input");
                    allInputs.forEach(function (item) {
                        if (item.value == null || item.value.length == 0 || item.value == "") {
                            throw "***ERROR***";
                        }
                    });
                    var obj = {
                        "username": allInputs[0].value,
                        "password": allInputs[1].value,
                        "email": allInputs[2].value
                    }
                    var url = "account/";
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = () => {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            console.log(xmlhttp.responseText);
                        }
                    };
                    xmlhttp.open("POST", url, true);
                    xmlhttp.send(JSON.stringify(obj));
                } catch (ex) {
                    console.log(ex);
                }
            }

        </script>
    </head>
    <body>
        <div class="row header">
            <h1>Bass Pro Shoppe Quiz App</h1>
            <h3>Fish for some learning!</h3>
        </div>
        <div class="container-fluid quizcontainer">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 main">
                <div class="login jumbotron">

                    <form method="POST">
                         <div class="row">
                             <div class="fish"><img src="largemouth-bass-slippers-29119.jpg"></div>
                             <br>
                             
                            <div>Username: <input type="text" id="username" required></div>
                            <div>Password: <input type="password" id="password" required aria-complete="list" aria-autocomplete="list"></div>
                            <div>Email: <input type="email" id="email" required></div>
                            <div><button btn btn-lg btn-primary btn-block id="btnSubmit">Submit</button></div>
                            <br>
                            <a href="settings.html">Settings</a>
                            <br>
                            <a href="login.html">Login</a>
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row footer">
        Created by Coffee Fueled Enterprises. 
    </div>
</body>
</html>
