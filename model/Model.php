<?php

include_once("model/Automobili.php");

class Model {
	public function getAutomobili()
	{
		// here goes some hardcoded values to simulate the database
		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iznajmljivanje_auta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM automobili";
//mysql_query("SET NAMES 'utf8'", $connection);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$arej = array();
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
   
    array_push($arej, new automobili($row["naziv"], $row["opis_auta"], $row["broj_vrata"], $row['idauta'], $row['cijena']));

	}
} else { 
$arej = array();
    //echo "0 results";
}
$conn->close();
		return $arej;
	}
	
	public function getAutomobili($naziv)
	{

		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iznajmljivanje_auta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM automobili WHERE naziv = ". $naziv;
//mysql_query("SET NAMES 'utf8'", $connection);
$result = $conn->query($sql);
$test = new Automobili("a", "b", "c");
if ($result->num_rows > 0) {
	$arej = array();
    // output data of each row
	
    while($row = $result->fetch_assoc()) {

	    array_push($arej, new automobili($row["naziv"], $row["opis_auta"], $row["broj_vrata"]));

	$test = new automobili($row["naziv"], $row["opis_auta"], $row["broj_vrata"]);
	}
} else { 
$arej = array();

    //echo "0 results";
}
$conn->close();
		return $test;
	}
	
	}
	

?>