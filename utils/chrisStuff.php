
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
                            throw "***ERROR*** " + item.id + " cannot be empty!";

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


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

                        <form method="POST">
                    <div>
                        <div>Username: <input type="text" id="username" class="form-control" required></div>
                        <div>Password: <input type="password" id="password" class="form-control" required aria-complete="list" aria-autocomplete="list"></div>
                        <div>Email: <input type="email" id="email" class="form-control" required></div>
                        <div><button id="btnSubmit" class="btn btn-lg btn-primary btn-block">Submit</button></div>
                        <br><br>
                        <a href="settings.html">Settings</a>
                        <br>
                        <a href="login.html">Login</a>
                    </div>
                </form>