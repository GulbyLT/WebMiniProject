<?php
//php Global variables
$database   = "duckdata";
$servername = "localhost";
$username = "User";
$password = "pass";
$tablename = "ducktable";
$entrspecies = "temp";
$entrygenus = "temp";
$entryfamily = "temp";
$entrypicture = "temp";
$ducknamearray = array();

//Funtion that connects to the duckdata database using mymysqli_connect and exits with an error message if no connection could be establised
$conn = mysqli_connect($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Function that send an SQL query to the datbase that retrieves all database entries and stores the Species from each entry in an array to use in the clien seach funtionality
function readFromDB() {
    global $ducknamearray;
    global $tablename;
    global $conn;
    $sql = "SELECT * FROM  $tablename";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
           array_push($ducknamearray,$row['Species']);
        }
    } else {
        echo "0 results";
    }
}
//Function that uses text recieve from an ajax post and searches through the ducknamearray and spawns buttons on the client page to use in selecting searched entries
function createTable(){
    global $ducknamearray;
    global $duckname;
    if($duckname != null){
        foreach($ducknamearray as $dname){
                if(strpos($dname,$duckname) !== false){
                    echo '<button type="button" class=button style="border: 1px;border-style: solid;border-collapse: collapse;margin: 0px;padding: 0px;">'.$dname.'</button>';
                    //echo "<br>";
                }
            }        
    }
    
}
//Function that is called when a button spawned using createTable is clicked. 
//The function sends an SQL query that retrieves entries in the database where the species contains the data parsed through the input variable $name
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
    }
}
//Function that is used to update the HTML in DuckClient.html and show display the data retrived from database by echoing a series of elements to the clien through Ajax
function updateDisplay(){
   global $entrspecies, $entrygenus, $entryfamily, $entrypicture;
   echo '
   <h1 id="duckspecies" class=duckSpecies> Species: ' . $entrspecies . '</h1>
   <h1 id="duckgenus" class=duckGenus>Genus: ' . $entrygenus .'</h1>
   <h1 class=duckFamily>Family: ' . $entryfamily . '</h1>
   <h1 class=duckPhotoText>Photo: <br> <img src="'.$entrypicture.'" alt="duck" width="500"> </h1>
   ';
    
}
//This function protects the Ajax PHP system from code injection by running trim which remove any whitespace from the begennign and end of the input, 
//stripslash which removes quetation marks and htmlspecialchars which converts special characters to HTML entities making it so any code injection would be made into something that the system can not recognize as code anymore.
function sec($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//Check if server has recieved a post from the client
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if the post variable needed to run the functions related to the client search function has been recieved and run the appropriate functions
    if (isset($_POST['ducksearch'])){
        $duckname = sec($_POST['ducksearch']);
        readFromDB();
        createTable();
    }
    //check if the post variable needed to run the functions related to display a database entry to the client has been recieved and run the appropriate functions
    if (isset($_POST['selectedduck'])){
        $selectedentryname = sec($_POST['selectedduck']);
        getDBEntryFromName($selectedentryname);
        updateDisplay();
        }
}



?>