<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BPS Quiz App - Create A Question</title>
        <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alegreya Sans SC" rel="stylesheet">
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link href="../quiztheme.css" rel="stylesheet" type="text/css">
        <script src="buildSession.js"></script>
    </head>
    <body>
        <div class="row header">
            <h1>Bass Pro Shoppe Quiz App</h1>
            <h3>Fish for some learning!</h3>
        </div>
        <div class="container-fluid quizcontainer">
            <div class="row user"></div>
            <div class="login jumbotron">
                <?php
                $answerErr = "";
                ?>

                	  <div class="row title">
	  
	  <div class="col-sm-10"><h1>Create A Question</h1></div><div class="col-sm-2"><a href="../mainDashboard.html"><button class='btn btn-sm btn-primary btn-block form-control' type='submit' id='btnresults'>Back to Main</button></a></div> 
	  
	  </div>

                <form  id="questionForm" action="results.php" method="POST">
                    Question ID <input type="number" name="questionID" class="form-control" min="0" required>
                    <br>
                    Title <input type="text" name="title" class="form-control" required>
                    <br>
                    Number of Choices 
                    <select name="numberofchoices" id="numberofchoices" class="form-control">
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                    </select>
                    <br>
                    <div id="choices">
                    </div>
                    Answer <input type="text" id="answer" class="form-control" name="answer" required>
                    <span id="error" class="error"></span>
                    <br>
                    Points <input type="number" name="points" class="form-control" min="1" required>
                    <br>
                    <button id="submitButton" class='btn btn-sm btn-primary btn-block form-control' type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row footer"> Created by Coffee Fueled Enterprises. </div>
    <div class="row"> </div>
</body>
</html>
