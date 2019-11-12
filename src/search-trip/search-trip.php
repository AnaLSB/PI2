<?php

require_once '../Class/Service.php';

$service = new Service();


if(isset($_POST['submit'])){

    $from = $_POST['from'];
    $to = $_POST['to'];


    header("location: /PI2.0/PI2/src/ride/ride.php?from=$from&to=$to");

}







?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./search-trip.css" rel="stylesheet" />
   
    <title>Buscar Caronas</title>
</head>
<body>
    
        <div id="wrapper">
                <!-- Sidebar -->
            <div id="sidebar-wrapper">
                
                <ul class="sidebar-nav">
                <div class="top">
                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/mantia/128.jpg" class="img-circle">
                    
                    <label for="photo" class="input-photo"><span class="glyphicon glyphicon-camera"></span></label>
                    <input id="photo" type="file">
                </div>
                <li><a href="../home/inicial.html">Home</a></li>
                <li><a href="../search-trip/search-trip.php">Buscar</a></li>
                <li><a href="../offer-lift/offer-lift.php">Oferecer</a></li>
                <li><a href="#">Rotas</a></li>
                <li><a href="../profile/profile.php">Meus Dados</a></li>
                </ul>
            </div>
            
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class=" container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger icon"></span></a>
                        </div>
                    </div>

                    <div class="container">

                        <form  method="post" action="search-trip.php">
                            <div class="text-center container-title">

                                    <img src="../../imagens/map-pointer-gif.gif" alt="">

                                    <p> Para onde vamos hoje? </p> 
                                    <div class="col-8 margin-top">
                                            <input id="from" name="from" placeholder="Saindo de" required="required" class="input-form" type="text">
                                            <input id="to" name="to" placeholder="Para" required="required" class="input-form" type="text">
                                    </div>
                            </div>         
                            <div class="container-date">
                                <hr>
                                <p> Data e hora </p>     
                                <input id="Date" name="Date" type="date" class="input-date" required="required" >
                                <input id="Hour" name="Hour" type="time" class="input-hour" required="required" >
                                <hr>
                            </div>   

                            <div class="right margin-top">
                                    <input type="submit" name="submit" class="btn btn-cyan" value="continuar">    
                            </div>
                        </form>

                    
                       
                    </div>
                </div>
            </div>
        </div>
               
                     
    
      

    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.js"></script>

    <script>
    $(document).ready(function(){
    $("#menu-toggle").click(function(e){
        e.preventDefault();
        $("#wrapper").toggleClass("menuDisplayed");
    });
    });
    </script>
    

</body>
</html>