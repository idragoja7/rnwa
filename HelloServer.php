<?php # HelloServer.php
# Copyright (c) 2005 by Dr. Herong Yang, http://www.herongyang.com/
#
function hello($someone) { 
  $username = "root";
$password = "";
$hostname = "localhost"; 

$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

$selected = mysql_select_db("iznajmljivanje_auta",$dbhandle)
  or die("Could not select iznajmljivanje_auta");

$result = mysql_query("SELECT *  FROM automobili where NAZIV= \"" . $someone."\"");
$response = array();
  
  while ($row = mysql_fetch_array($result)) {

$tmp            = array();
		$tmp["Naziv auta"]        = $row["naziv"]; 
		$tmp["Broj_vrata"]        = $row["broj_vrata"];
		$tmp["Broj_brzina"]        = $row["broj_brzina"];
		$tmp["Cijena"]        = $row["cijena"];
		
    $tmp["Dimenzije"]        = $row["dimenzije"];
    $tmp["Grad Id"]        = $row["grad_id_grad"];
    $tmp["Id_auta"]        = $row["idauta"];
    
    $tmp["Opis"]        = $row["opis_auta"];
    $tmp["Vrsta Id"]=$row["vrsta_auta_id_vrsta_auta"];
    $tmp["Zupanija"]        = $row["zupanija_id_zupanija"];

								      

        array_push($response, $tmp);

    $privremeni = $privremeni
      ."\n Naziv_nekretnine: " . $row["naziv"]
      ."\n Broj_vrata: " . $row["broj_vrata"]
      ."\n Broj_brzina: " . $row["broj_brzina"]
      ."\n Cijena: " . $row["cijena"]
      .
      ."\n Grad_Id: " . $row["grad_id_grad"]
      ."\n Id_auta: " . $row["idauta"]
     
      ."\n Dimenzije: " . $row["dimenzije"]
      ."\n Opis: " . $row["opis_auta"]
      ."\n Vrsta_Id: " . $row["vrsta_auta_id_vrsta_auta"]
       ."\n Zupanija: " . $row["zupanija_id_zupanija"]
      ."\n \n";
}



    $jsonn = json_encode($response);
  
  
  //return $jsonn;
      return $privremeni;
} 
   $server = new SoapServer(null, 
      array('uri' => "urn://www.herong.home/res"));
   $server->addFunction("hello"); 
   $server->handle(); 
?>