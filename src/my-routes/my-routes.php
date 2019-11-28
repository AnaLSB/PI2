<?php

require_once '../Class/Service.php';
require_once '../Class/Format.php';
require_once '../Class/RequestService.php';

session_start();
    
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
    <link href="./my-routes.css" rel="stylesheet" />
   
    <title>Caronas</title>

    <style>

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
            background: #64C9CC;
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

    </style>
</head>
<body style="background: #F9F9F9;">
    
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
                <li><a href="../my-routes/my-routes.php">Rotas</a></li>
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
                        
                    <h3>Minhas Rotas</h3>
                        

                        <?php 
                        
                    
                    

                                foreach($service->querySelect($id) as $value ) { 
                            
                            ?>

                   
                        
                            <div class="container-ride" style="background: #FFF;">

                                
                                    <a href="../ride-pending/ride-pending.php?id=<?=$value['IDCARONA']?>"><p class="NumSolicit right"><?=$reqService->querySelectNumRows($value['IDCARONA']);?></p></a>

                                    <a href="../update-ride/update-ride.php?id=<?=$value['IDCARONA']?>">
                                        <p class="price right">R$ <?= $value['PRECO'] ?></p>

                                        
                                        <p><?= $value['ORIGEM'] ?> &nbsp; <i class="arrow"></i>
                                        <i class="arrow"></i>
                                        <i class="arrow"></i>       
                                        &nbsp; <?= $value['DESTINO'] ?> </p>


                                        <p><?= $time = $format->formatTime($value['HORARIO'])?> &nbsp;

                                            <span class="glyphicon glyphicon-time"></span>

                                        &nbsp; <?= $timetwo = $format->formatTime($value['HORAVOLTA'])?></p>


                                        
                                    
                                        
                                
                                        <p class="date" style="position: absolute; bottom: -10px; left: 22%;" >                             
                                            <?= $data = $format->formatDate($value['DATA']); ?>
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