<?php # HelloClient.php
# Copyright (c) 2005 by Dr. Herong Yang
#  
	$naziv=$_POST['trazilicax'];
   $client = new SoapClient(null, array(
      'location' => "http://localhost/Prodaja_auta/wsBwsd/HelloServer.php",
      'uri'      => "urn://neretva.fsr.ba/hello",
      'trace'    => 1 ));

   $return = $client->__soapCall("hello",array("$naziv"));
   	echo("\n<pre>".var_dump($return))."</pre>";


   	
?>