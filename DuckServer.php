<?php
$database   = "duckdata";
$servername = "localhost";
$username = "User";
$password = "pass";
$tablename = "tempname";
$entrspecies = "temp";
$entrygenus = "temp";
$entryfamily = "temp";
$entrypicture = "temp";
$entrydiscription = "temp";

$texttosendback = "none";

function connect(){
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
}

function readFromDB() {
$sql = "SELECT * FROM $tablename";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<br/>id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
}


function getDBEntryFromName($name){
    $sql = "SELECT * FROM $tablename WHERE duck = $name";
    while($row = mysqli_fetch_assoc($result)) {
        $entrspecies = $row["id"];
        $entrygenus = $row["firstname"];
        $entryfamily = $row["lastname"];
        $entrypicture = $row["picture"];
        $entrydiscription = $row["discription"];

    }
}

function updateDisplay(){
   echo '
   <h1 id="duckspecies" class=duckSpecies> update:</h1>
   <h1 id="duckgenus" class=duckGenus>UPDATE:</h1>
   <h1 class=duckFamily>Update:</h1>
   <h1 class=duckPhotoText>Works:</h1>
   ';
    
}
if (isset($_POST['selectedduck'])){
    //$selectedentryname = $selectedduck;
    //getDBEntryFromName("'"+$selectedentryname+"'");
    updateDisplay();
    }


?>