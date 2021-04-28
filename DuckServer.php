<?php
$database   = "duckdata";
$servername = "localhost";
$username = "User";
$password = "pass";
$tablename = "ducktable";
$entrspecies = "temp";
$entrygenus = "temp";
$entryfamily = "temp";
$entrypicture = "temp";
//$entrydiscription = "temp";

$texttosendback = "none";
error_reporting(E_ERROR | E_PARSE);

$conn = mysqli_connect($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function readFromDB() {
    global $tablename;
    global $conn;
    $sql = "SELECT * FROM  $tablename";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo $row['Species']; 
            echo "<br>";
            echo $row['Genus'];
            echo "<br>";
            echo $row['Family'];
            echo "</p>";
        }
    } else {
        echo "0 results";
    }
}


function getDBEntryFromName($name){
    global $tablename;
    global $conn;
    global $entrspecies, $entrygenus, $entryfamily, $entrypicture;
    $sql = "SELECT * FROM $tablename WHERE species = '$name'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        $entrspecies = $row["Species"];
        $entrygenus = $row["Genus"];
        $entryfamily = $row["Family"];
        $entrypicture = $row["Picture_Link"];
        //$entrydiscription = $row["discription"];

    }
}

function updateDisplay(){
   global $entrspecies, $entrygenus, $entryfamily, $entrypicture;
   echo '
   <h1 id="duckspecies" class=duckSpecies> Species: ' . $entrspecies . '</h1>
   <h1 id="duckgenus" class=duckGenus>Genus: ' . $entrygenus .'</h1>
   <h1 class=duckFamily>Family: ' . $entryfamily . '</h1>
   <h1 class=duckPhotoText>Photo: <br> <img src="'.$entrypicture.'" alt="duck" width="500"> </h1>
   ';
    
}
if (isset($_POST['selectedduck'])){
    $selectedentryname = $_POST['selectedduck'];
    getDBEntryFromName($selectedentryname);
    updateDisplay();
    }


?>