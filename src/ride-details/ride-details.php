<?php

require_once '../Class/Service.php';
require_once '../Class/Format.php';

$service = new Service();
$format = new Format();

$id = $_GET['id'];

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./ride-details.css?t=<?php echo date('his'); ?>" rel="stylesheet" />
   
    <title>Caronas</title>
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

                    <div class="container container-title">
                        

                       <?php 

                       $value = $service->querySelection($id);
                       
                       if ( $value > 0 )  { ?>
                            <div class="container-ride">
                                <a href="<?=$_SERVER['HTTP_REFERER']?>" class="icon-arrow glyphicon glyphicon-arrow-left"></a>
                                <h3>Detalhes da Carona</h3>

                                <a class="right" href="https://api.whatsapp.com/send?phone=5533999078936&text=Olá">
                                    <img style="width: 40px;" src="../../imagens/whatsapp.png" alt="">
                                </a>

                                <p> <?= $value['ORIGEM']?> &nbsp; <i class="arrow"></i>
                                    <i class="arrow"></i>
                                    <i class="arrow"></i>       
                                    &nbsp;<?= $value['DESTINO']?> </p>

                                    <p><?= $time = $format->formatTime($value['HORARIO'])?> &nbsp;

                                        <span class="glyphicon glyphicon-time"></span>

                                &nbsp; <?= $timetwo = $format->formatTime($value['HORAVOLTA'])?></p>

                                <span style="color: rgb(126, 179, 179);"><?=$roundTrip = $format->roundTripFormat($value['IDAVOLTA'])?></span>

                                <hr>

                            </div>  

                            <div class="container-especs">
                                <p>Valor da passagem</p>
                                <p class="price"><?= $value['PRECO']?></p>

                                <hr>

                                <p>Tyler Durden</p>
                                <span>5 avaliações</span>
                                <img class="img-circle-ride" src="https://i.ytimg.com/vi/EvuRPLKc1JQ/maxresdefault.jpg" alt="">
                        
                               

                                

                            </div>
                        <?php  }?>


                        
                        
                        
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