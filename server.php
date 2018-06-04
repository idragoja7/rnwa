<?php
if(!extension_loaded("soap")){
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled",0);
$server = new SoapServer("ispis.wsdl");

function doHello($yourName){
 
$username = "root";
$password = "";
$hostname = "localhost"; 

$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

$selected = mysql_select_db("iznajmljivanje_auta",$dbhandle)
  or die("Could not select iznajmljivanje_auta");

$result = mysql_query("SELECT * FROM `automobili` WHERE `naziv`= \"" . $yourName."\"");
$response = array();
  
  while ($row = mysql_fetch_array($result)) {

$tmp            = array();
		$tmp["Naziv automobila"]        = $row["naziv"]; 
		$tmp["Broj vrata"]        = $row["broj_vrata"];
		$tmp["Broj brzina"]        = $row["broj_brzina"];
		$tmp["Cijena"]        = $row["cijena"];
    $tmp["Vrsta goriva"]        = $row["vrsta_goriva"];
    $tmp["Grad Id"]        = $row["grad_id_grad"];
    $tmp["Id auta"]        = $row["idauta"];
    $tmp["Dimenzije"]        = $row["dimenzije"];
    $tmp["Opis"]        = $row["opis_auta"];
    $tmp["Vrsta Id"]=$row["vrsta_auta_id_vrsta_auta"];
    $tmp["Zupanija"]        = $row["zupanija_id_zupanija"];

								      
	
        array_push($response, $tmp);

    $privremeni = $privremeni
      ."\n Naziv_automobila: " . $row["naziv"]
      ."\n Broj_vrata: " . $row["broj_vrata"]
      ."\n Broj_brzina: " . $row["broj_brzina"]
      ."\n Broj_soba: " . $row["broj_soba"]
      ."\n Cijena: " . $row["cijena"]
      ."\n Vrsta goriva: " . $row["vrsta_goriva"]
      ."\n Grad_Id: " . $row["grad_id_grad"]
      ."\n Id_auta: " . $row["idauta"]
      ."\n Dimenzije: " . $row["dimenzije"]
      ."\n Opis: " . $row["opis_auta"]
      ."\n Vrsta_Id: " . $row["vrsta_auta_id_vrsta_auta"]
       ."\n Zupanija: " . $row["zupanija_id_zupanija"]
      ."\n \n";
}



    $jsonn = json_encode($response);
  
  
  return $jsonn;
  //return $privremeni;
}

$server->AddFunction("doHello");
$server->handle();
?>