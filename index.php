
<?php
if (isset($_COOKIE['uname'])){
$prijavljen=true;
$razina=$_COOKIE['razina'];
}
else {
$prijavljen=false;
$razina=0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function(){
        $('.form-control').keyup(function(){$("#txtHint").load("trazilica.php?s=" + $(this).val());
    });
        
});

    </script>
    <script type="text/javascript">
        function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "trazilica.php?s=" + str, true);
        xmlhttp.send();
    }
}
    </script>
    <title>Autokuca Dragoja</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="index.php">Start Bootstrap</a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="opcenito.html">Općenito</a>
                    </li>
                    <li>
                        <a href="mvc.php">Detaljnije</a>
                    </li>
                    <li>
                        <a href="#">Kontakt</a>
                    </li>
                   
                    
                </ul>
<?php
if(!isset($_COOKIE['uname']))
    {
                echo' <form method="post" action="prijava.php" >
                     <ul class="nav navbar-nav" style="float: right; padding: 1%">
                    
                     <li>
                    <input type="email" class="form-control" placeholder="Korisnicko ime:" name="username">
                    </li>
                    <li>
                    <input type="password" class="form-control" placeholder="Lozinka:" name="password">
                    </li>
                    <input class="btn btn-primary" type="submit" name="Prijava " value="Prijavi se" >
                    </ul>
                    </form>';
                }
                else
                {
                    echo '
                    <form method="post" action="logout.php" >
                    <ul class="nav navbar-nav" style="float: right; padding: 1%">
                    <li>
                    <input class="btn btn-primary" type="submit" name="Prijava " value="Odjavi se" >
                    </li
                    </ul>
                    </form>
                    ';
                }
                    ?>
                }
                </div>
           
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        
      
            
        
            <div class="col-md-3">
            
        
                <p class="lead">Vrste auta</p>
                <div class="list-group">
                <?php
                include("connect.php");
                $query="SELECT `tip` FROM `vrsta_auta`";
                $result=$con->query($query);
                while($row = mysqli_fetch_array($result))
                { 
                    $tip_auta=$row['tip'];
                    echo'<a href="#" class="list-group-item">'.$tip_auta.'</a>';
                }
                ?>
                   <!-- <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>-->
                </div>
                <input type="text" class="form-control" placeholder="Tražilica AJAX:" name="trazilica">
                <input type="text" class="form-control" placeholder="Tražilica JQ:" name="trazilica" onkeyup="showHint(this.value)">
                

                

            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/slider/merc.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slider/bmw.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slider/gold.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slider/audi.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row"> <!--prvi div za prikaz auta-->
                <div id="txtHint"></div>
                <?php
                 include ("connect.php");
                $query = "SELECT `idauta`, `naziv`,`cijena`, `opis_auta` FROM `automobili` LIMIT 7";
                $result = $con->query($query);

                while($row = mysqli_fetch_array($result))
                  { 
                      $id = $row['idauta'];
                      $naziv=$row['naziv'];
                      $cijena = $row['cijena'];
                      $opis=$row['opis_auta'];
                       $queryy = "SELECT `lokacija` FROM `slike` WHERE `auto_idauta`=".$id."";
                    $resulte = $con->query($queryy);
                    while($rez=$resulte->fetch_array())
                    {
                    $slika=$rez['lokacija'];
                    }
                    /* echo ' <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="'.$slika.'" alt="">
                            <div class="caption">
                                <h4 class="pull-right">'.$cijena.'KM</h4>
                                <h4><a href="#">'.$naziv.'</a>
                                </h4>
                                <p>'.$opis.'</p>
                            </div>
                           
                        </div>
                    </div>';*/
                  }
                ?>
                    <?php
                if (isset($_REQUEST["naziv"])){
                    $naziv=$_REQUEST["naziv"];
                    $params=$naziv;
					
                    //echo "Ispis  auta:  ".$naziv.""; 
                    try{
                        ini_set('soap.wsdl_cache_enabled',0);
                        ini_set('soap.wsdl_cache_ttl',0);
                      
                      $sClient = new SoapClient('ispis.wsdl',
                      array(
                      'cache_wsdl'=>WSDL_CACHE_NONE,
                      'trace'=>1,
                      'user' => 'root',
                      'pass' => '',
                      'exceptions' => 0
                    ));
                      
                      $response = $sClient->doHello($params);
                        
                      echo "<br><br><br>ODGOVOR:<br>";
                      
                        
                      $risponz = $sClient->__getLastResponse();
                      
                      $json_2 = str_replace( array('[',']') , ''  , $risponz );
                        
                      //echo '<pre>';
                     // var_dump($risponz);
					 
                     
                      //echo $rez;
                      
                     // print_r($rez);
                      //echo '</pre>';


					
					

                     // $queryy = "SELECT `lokacija` FROM `slike` WHERE `auto_idauta``=".$rez[1]->{'idauta'}."";
					  //$queryy = "SELECT * FROM `korisnik` WHERE `idkorisnik`=".$rez[1]->{'idkorisnik'}."";
					$queryy ="SELECT *  FROM automobili where naziv	= \"" .$risponz[0]->{'Naziv_automobila'}."\"";
                    $resulte = $con->query($queryy);
                    while($rezu=$resulte->fetch_array())
                    {
                    //$slika=$rezu['lokacija'];
                    }
                    echo ' <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="'.$slika.'" alt="">
                            <div class="caption">
                                <h4 class="pull-right">'.$risponz[0]->{'Cijena'}.'eura</h4>
                                <h4><a href="#">'.$risponz[0]->{'Naziv auta'}.'</a>
                                </h4>
                                <p>'.$risponz[0]->{'Opis'}.'</p>
                            </div>
                           
                        </div>
                    </div>';







                    } catch(SoapFault $e){
                        echo $e->getMessage();
                    }
                }
                else {
if(isset($_COOKIE['uname']))
    {
                    echo "<p>Ukoliko želite registrirati novog korisnika kliknite <a href=indexcrud.php>ovdje</a></p>";
					
					echo "<p></p>";
					echo "<p></p>";
                    echo "<p>Forma poziva web servis koji pretražuje automobile s nazivom koji ste unijeli</p> ";
                    echo "<form method=\"get\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">";
                    echo "Naziv auta: <input type=\"text\" name=\"naziv\">";
                    echo " <input type=\"submit\" name=\"submit\" value=\"Pretraga\"> ";
                    echo "</form>";
                    }
                }
                
                ?>
                <?php # HelloClient.php
# Copyright (c) 2005 by Dr. Herong Yang
#  
    if (isset($_REQUEST["trazilicax"])){$naziv=$_REQUEST['trazilicax'];
   $client = new SoapClient(null, array(
      'location' => "http://localhost/Prodaja_auta/HelloServer.php",
      'uri'      => "urn://neretva.fsr.ba/hello",
      'trace'    => 1 ));
   $r=$client->hello("$naziv");
   $rr=json_decode($r);
   $return = $client->__soapCall("hello",array("$naziv"));
     $queryy = "SELECT `lokacija` FROM `slike` WHERE `auto_idauta``=".$rr[0]->{'Id auto'}."";
                    $resulte = $con->query($queryy);
                    while($rezu=$resulte->fetch_array())
                    {
                    $slika=$rezu['lokacija'];
                    }
                    echo ' <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="'.$slika.'" alt="">
                            <div class="caption">
                                <h4 class="pull-right">'.$rr[0]->{'Cijena'}.'KM</h4>
                                <h4><a href="#">'.$rr[0]->{'Naziv automobila'}.'</a>
                                </h4>
                                <p>'.$rr[0]->{'Opis'}.'</p>
                            </div>
                           
                        </div>
                    </div>';}
else{
    if(isset($_COOKIE['uname']))
    {
echo "<form method=\"get\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">";
                    echo "Naziv auta: <input type=\"text\" name=\"trazilicax\"  placeholder=\"Tražilica bez wsdl:\">";
                    echo " <input type=\"submit\" name=\"submit\" value=\"Pretraga\"> ";
                    echo "</form>";
                }
    }
?>
               
                </div>  <!--prvi div za prikaz auta-->

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Autokuca Dragoja @2018</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
