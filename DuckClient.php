<!DOCTYPE html>
<html>
<link rel="stylesheet" href="stylesheet.css">

<head>
    <script src="jquery-3.6.0.min.js"></script>
    <script>
        function ajaxTest(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("test1").innerHTML = this.responseText;
                }

                xmlhttp.open("GET", "DuckServer.php?selectedduck=" + str, true);
                xmlhttp.send();
            };
        }
    </script>

    <body>
        <p>
            <span> Danish Duck Database</span>
            <b class="beta"> (BETA)</b>
            <p class=undermain>Welcome to the DDD! This website is currently in development.</p>
            <!--Page header-->
            <ul id="buttons">
                <li class=Browse><a href="#">Browse DataBase</a></li>
                <li class=Example><a href="#">ExampleDuck</a></li>
                <!--Buttons WIP. The Random Duck should be switched to 'example duck' and pull info from Wiki w/ Ajax-->
            </ul>
        </p>
        <h1 class=duckSpecies>Species:</h1>
        <p id="test1"></p>
        <h1 class=duckGenus>Genus:</h1>
        <h1 class=duckFamily>Family:</h1>
        <h1 class=duckPhotoText>Picture:</h1>
    </body>
    <!--The script below is a placeholder for Ajax, just to ensure buttons are click-able-->
    <script>
        $('ul').hide().fadeIn(2000);
        $('ul .Example').on('click', function() {
            ajaxTest("duck");
        })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <svg class=frame width="1000" height="1800">
            <rect class=frame x="10" y="70" width="900" height="700"></rect>
            <!--The frame of the main feature, the one to contain and display all the information-->
          </svg>
</head>

</html>