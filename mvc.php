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
    <title>Iznajmljivanje automobila</title>

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
                        <a href="index.php">Naslovna</a>
                    </li>

                    <li>
                        <a href="about.html">Općenito</a>
                    </li>
                    <li>
                        <a href="mvc.php">mvp</a>
                    </li>
                    <li>
                        <a href="#">Kontakt</a>
                    </li>
                    <li>
                        <a href="#">Login</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        
      
            
        
            <div class="col-md-3">
            
        
                <p class="lead">Vrste automobila</p>
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
                                    <img class="slide-image" src="img/slider/audi.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slider/gold.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slider/bmw.jpg" alt="">
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

                <div class="row"> <!--prvi div za prikaz automobila-->
                <div id="txtHint"></div>
                <?php 
    include_once("controller/Controller.php");

    $controller = new Controller();
    $controller->invoke();

?>
                </div>  <!--prvi div za prikaz automobila-->

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
                    <p>Auto kuća Dragoja @2018</p>
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
