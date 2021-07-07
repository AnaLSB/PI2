<?php
if(!isset($_SESSION)){
    session_start();
}

require_once '../Class/Service.php';
require_once '../Class/Format.php';
require_once '../Class/RequestService.php';

$id = $_SESSION['IDUSUARIO'];

$service = new Service();
$format = new Format();
$reqService = new RequestService();

if(isset($_GET['search'])){
    $search = $_GET['search'];
    echo $search;
}

if (isset($_GET['from'])){
    
    $from = $_GET['from'];
    $to = $_GET['to'];
}

?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="./my-routes.css" rel="stylesheet" />
   
    <title>Caronas</title>

    <style>
        body{
             font-family: 'Roboto', sans-serif;
             font-size: 16px;
        }
        .bg{
          position: fixed;
          top: 0px;
          left: 0px;
          width: 100%;
          height: 100%;
          background-image: url(./bg.png);
          background-size: 100%;
          background-repeat: no-repeat;
        }


        h3{
            margin-top: 100px;
            color: #468D8F;
        }

        .NumSolicit {
            margin-right: -18px;
            width: 35px;
            height: 35px;
            font-size: 25px;
            color: #FFF !important;
            background: #336b77;
            border-radius: 50%;
        }

        .NumSolicit:hover {
            margin-right: -22px;
            width: 40px;
            height: 40px;
            font-size: 27px;
        }

        .container-ride:hover {
            margin-left: 6px;
        }
    
        @media (max-width: 768px) {
            .date {
                font-size: 80%;
            }
        }

        .price {
          position: absolute;
          font-weight: bold;
          color: rgb(1, 248, 112) !important;
          font-size: 18px;
          left: 0px;
          width: 100px;
        }
        .btn-price{
          background-color: rgb(1, 248, 112);
          color: #FFF;
          border-radius: 18px 0px 0px 0px;
          font-weight: bold;
        }
        .container-ride {
          margin: 20px auto;
          position: relative;
          border-radius: 18px;
          width: cover;
          height: 220px;
          -webkit-box-shadow: 0px 3px 5px 0px rgba(184,175,184,1);
          -moz-box-shadow: 0px 3px 5px 0px rgba(184,175,184,1);
          box-shadow: 0px 3px 5px 0px rgba(184,175,184,1);
          min-width: 100%;
          max-width: 700%;
        }
        .arrow {
          margin-top: 20px;
          transform: rotate(-45deg);
          -webkit-transform: rotate(-45deg);
        }
        .sair{
            width: 250px;
            height: 50px;
            padding-top: 15px;
        }
        .sair:hover{
            background-color: #104b77
        }
    </style>
</head>
<body>
    <div class="bg"></div>
    
        <div id="wrapper">
                <!-- Sidebar -->
            <div id="sidebar-wrapper">
                
                <ul class="sidebar-nav">
                <li><a href="../home/inicial.html">Home</a></li>
                <li><a href="../search-trip/search-trip.php">Buscar</a></li>
                <li><a href="../offer-lift/offer-lift.php">Oferecer</a></li>
                <li><a href="../my-routes/my-routes.php">Rotas</a></li>
                <li><a href="../profile/profile.php">Meus Dados</a></li>
                <a style=" color: white; position: absolute; bottom: 0px;left: 0px;" href="../../sair.php">
                    <div class="sair"><h5>Sair</h5></div>
                </a>
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
                        
                    <h3 align="center" style="color: #336b77; margin: 50px 0px auto;">Minhas Rotas</h3>
                        

                        <?php 
                                foreach($service->querySelect($id) as $value ) { 
                            
                            ?>
                            <div class="container-ride" style="background: #FFF;color: #84afb9">

                                
                                    <a href="../ride-pending/ride-pending.php?id=<?=$value['IDCARONA']?>"><p class="NumSolicit right"><?=$reqService->querySelectNumRows($value['IDCARONA']);?></p></a>

                                    <a href="../update-ride/update-ride.php?id=<?=$value['IDCARONA']?>">
                                        

                                        <!--#84afb9-->
                                        <button class="btn btn-price">R$ <?= $value['PRECO'] ?></button>
                                        <p style="margin: 0px auto; color: #84afb9; font-size: 20px"><?= $value['ORIGEM'] ?> &nbsp; 
                                        <i class="arrow"></i>
                                        <i class="arrow"></i>
                                        <i class="arrow"></i>       
                                        &nbsp; <?= $value['DESTINO'] ?> </p>


                                        <p style="margin: 2% auto;color: #84afb9; font-size: 20px;"><?= $time = $format->formatTime($value['HORAOR'])?> &nbsp;

                                            <span class="glyphicon glyphicon-time"></span>

                                        &nbsp; <?= $timetwo = $format->formatTime($value['HORADEST'])?></p>

                                        <p class="date" style="margin: 2% auto; color: #84afb9; font-size: 20px;">                             
                                            <?= $data = $format->formatDate($value['DATAOR']); ?>
                                        </p>
                                   </a>
                            </div>
                        <?php
                                }
                        ?>
                        </div>
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
