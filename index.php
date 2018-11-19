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
    </head>
    <body>
        <?php
        // put your code here
        require('lib/accessor.php');
        ?>
        <div>
            <form method="POST" action="" >
                <div id="infoTable">
                    <div class="rightAlign">
                        <div>Database Name:</div>
                        <div>Username:</div>
                        <div>Password:</div>
                    </div>
                    <div class="leftAlign">
                        <div><input type="text" name="dbName" /></div>
                        <div><input type="text" name="dbuName" /></div>
                        <div><input type="password" name="dbpword" /></div>
                    </div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </body>
</html>
