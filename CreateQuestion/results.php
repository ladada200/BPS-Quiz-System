<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>

            var data = <?php echo json_encode($_POST) ?>;

            function sendQuestion() {

                var url = JSON.stringify(data); // file name or server-side process name
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        var resp = xmlhttp.responseText;
//			showUser(); // do something when server responds
                        console.log("test" + resp);

                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();

            }
        </script>
    </head>
    <body>


    </body>
</html>
