<?php

require_once '../Class/Service.php';
require_once '../Class/Format.php';



$service = new Service();
$format = new Format();

session_start();
    
$id = $_SESSION['IDUSUARIO'];

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
    <link href="./ride.css" rel="stylesheet" />
   
    <title>Caronas</title>

    <style>

        .container-ride:hover {
            margin-left: 8px;
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
                        
                    <form class="search-form form-inline md-form form-sm mt-0">
                            
                            <a href="../search-trip/search-trip.php" name="search" class="form-control form-control-sm ml-3 w-75"
                                aria-label="Buscar"><span  style="position: absolute; top: 15;" class="glyphicon glyphicon-search"></span></a>
                    </form>
                        

                        <?php 
                        
                        
                        if(!isset($_GET['from']) && !isset($_GET['to'])){
                                    
                            echo "
                                <img style='border-radius: 50%; width: 160px; margin-left: 30%; margin-top: 30%' src='../../imagens/broken.gif' >
                                <h4 style='margin-left: 35%; color: #657F80; margin-top: 10%; white-space: nowrap; '> OOPS :'(</h4>
                                <h5 style='margin-left: 25%; color: #657F80; white-space: nowrap; '> Pesquise por uma carona!</h5>
                                  
                            ";
                        }
                        
                            if(isset($_GET['from']) && isset($_GET['to'])){
                            
                                if ($service->querySearch($from, $to, $id) == 0){
                                    $from = $format->formatUcWords($from);
                                    $to = $format->formatUcWords($to);
                                    echo "
                                        <img style='border-radius: 50%; width: 160px; margin-left: 30%; margin-top: 30%' src='../../imagens/broken.gif' >
                                        <h4 style='margin-left: 35%; color: #657F80; margin-top: 10%; white-space: nowrap; '> OOPS :'(</h4>
                                        <h5 style='text-align: center; color: #657F80; white-space: nowrap; '> Não há caronas de $from para $to!</h5>
                                        
                                    ";
                                } else {

                                foreach($service->querySearch($from, $to, $id) as $value ) { 
                            
                            ?>
                        
                            <div class="container-ride" style="background: #FFF;">
                                <a href="../ride-details/ride-details.php?id=<?=$value['IDCARONA']?>">

                                <p class="price right">R$ <?= $value['PRECO'] ?></p>

                                <img src="../../imagens/profile-pic.png" alt="" class="img-ride">
                                <p><?= $value['ORIGEM'] ?> &nbsp; <i class="arrow"></i>
                                <i class="arrow"></i>
                                <i class="arrow"></i>       
                                &nbsp; <?= $value['DESTINO'] ?> </p>

                                <a class="right" style="position: absolute; top: -10px; left: 10px;" target="_blank" href="https://api.whatsapp.com/send?phone=55<?=$value['DDD'].$value['TELEFONE']?>&text=Olá%20<?=$value['NOME']?>,%20Gostaria%20de%20saber%20mais%20sobre%20a%20carona!">
                                    <img style="width: 40px;" src="../../imagens/whatsapp.png" alt="">
                                </a>

                                <?php
                                if($value['FACEBOOK'] != null){
                                ?>
                                <a class="right" style="position: absolute; top: -5px; left: 60px;" target="_blank" href="https://www.facebook.com/<?=$value['FACEBOOK']?>">
                                  <img style="width: 26px; border-radius: 6px;" src="../../imagens/facebook.png" alt="">
                                </a>
                                <?php
                                }
                                ?>

                                <p><?= $time = $format->formatTime($value['HORARIO'])?> &nbsp;

                                    <span class="glyphicon glyphicon-time"></span>

                                &nbsp; <?= $timetwo = $format->formatTime($value['HORAVOLTA'])?></p>


                                
                               
                                
                        
                                <p class="date" style="position: absolute; bottom: -10px; left: 22%; color: #657F80;">                             
                                    <?= $data = $format->formatDate($value['DATA']); ?>
                                </p>
                               
                                    

                                </a>

                                
                            </div>

                        <?php

                                }
                    
                            }
                        
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