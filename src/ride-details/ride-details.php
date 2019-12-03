<?php

require_once '../Class/Service.php';
require_once '../Class/Format.php';
require_once '../Class/RequestService.php';

$service = new Service();
$format = new Format();
$requestService = new RequestService();

session_start();

$idUser = $_SESSION['IDUSUARIO'];


if(isset($_POST['rating'])){
    $nEvaluate = $service->getEvaluate($_POST['idUser']);
    
    $service->setEvaluate($_POST['rating'], $_POST['idUser'], $nEvaluate);
      
}



if(isset($_GET['id'])){
    $id = $_GET['id'];
} elseif (isset($_POST['submit']) && isset($_POST['idRide']) && isset($_POST['idUser'])){
    
    $places = $requestService->getPlaces($_POST['idRide']);
    
    if($requestService->setSolicit($_POST, $places) == 'ok'){
        header("location: /PI2-profile_branch/src/SucessErrorPage/Sucess.php");
    } else {
        header("location: /PI2-profile_branch/src/SucessErrorPage/Error.php");
    }
}



if(isset($_POST['submit'])){       
    $sendMessage = $_POST['link'];
    header("Location: $sendMessage");
}


$stateRequest = $requestService->verifySolicit($idUser, $id);


?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./ride-details.css" rel="stylesheet" />
   
    <title>Caronas</title>

    
    <style>

    .evaluate:hover{
        cursor: pointer;
    }

    
    
        @media (max-width: 768px) {
            .container-ride p {
                font-size: 100%;
            }

            #star, #star-empty {
                
                position: absolute; 
                top: 93.6%; 
                left: 23.2% !important; 

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

                    <div class="container container-title">
                        
                       

                       <?php


                       if(isset($id)){
                       $value = $service->querySelection($id);
                       
                       
                       if ( $value > 0 )  { 
                           
                       
                       ?>
                            <div class="container-ride">
                       
                            
                                <a href="<?=$_SERVER['HTTP_REFERER']?>" class="icon-arrow glyphicon glyphicon-arrow-left"></a>
                                <h3>Detalhes da Carona</h3>

                                <a target="_blank" class="right" href="https://api.whatsapp.com/send?phone=55<?=$value['DDD'].$value['TELEFONE']?>&text=Olá%20<?=$value['NOME']?>,%20Gostaria%20de%20saber%20mais%20sobre%20a%20carona!">
                                    <img style="width: 50px;" src="../../imagens/whatsapp.png" alt="">
                                </a>

                                <?php
                                if($value['FACEBOOK'] != null){
                                ?>
                                <a class="right" target="_blank" href="https://www.facebook.com/<?=$value['FACEBOOK']?>">
                                  <img style="width: 32; border-radius: 6px; margin-top: 9px;" src="../../imagens/facebook.png" alt="">
                                </a>
                                <?php
                                }
                                ?>

                                <p> <?= $value['ORIGEM']?> &nbsp; <i class="arrow"></i>
                                    <i class="arrow"></i>
                                    <i class="arrow"></i>       
                                    &nbsp;<?= $value['DESTINO']?> </p>

                                    <p><?= $time = $format->formatTime($value['HORARIO'])?> &nbsp;

                                        <span class="glyphicon glyphicon-time"></span>

                                &nbsp; <?= $timetwo = $format->formatTime($value['HORAVOLTA'])?></p>

                                <p style="color: #657F80;">                             
                                    <?= $data = $format->formatDate($value['DATA']); ?>
                                </p>

                                <span style="color: #657F80;"><?=$validateRoundTrip = $format->roundTripValidate($value['IDAVOLTA'], $value['DATA'], $value['DATAVOLTA'], $value['HORAVOLTA']);
                                ?></span>

                                <p style="color: #657F80; font-size: 18px;"><?= $format->formatPlaces($value['VAGAS'])?></p>

                                <hr>

                            </div>  

                            <div class="container-especs">
                                <p>Valor da passagem</p>
                                <p style="font-size: 20px;" class="price">R$<?= $value['PRECO']?></p>
                               

                                <hr>



                                <p style="font-size: 20px;"><?=$value['NOME']?></p>

                                <span style="font-size: 20px;" class="evaluate"  data-toggle="modal" data-target="#myModal">avaliação <?= $format->formatEvaluation($value['AVALIACAO']) ?></span>

                                
                               
                                

                                <img class="img-circle-ride" src="../../imagens/profile-pic.png" alt="">
                        
                               
                            <?php

                                if($value['VAGAS'] > 0 && $stateRequest  == null){

                            ?>
                        
                           
                               <form action="ride-details.php" method="post">
                                    <div class="right margin-top">
                                        <input type="hidden" name="idUser" value="<?=$value['IDUSUARIO']?>">
                                        <input type="hidden" name="idRide" value="<?=$value['IDCARONA']?>">
                                        <input type="hidden" name="link" value="https://api.whatsapp.com/send?phone=55<?=$value['DDD'].$value['TELEFONE']?>&text=Olá%20<?=$value['NOME']?>,%20Solicitação%20Enviada!">
                                        <input name="submit" type="submit" class="btn btn-cyan" value="solicitar carona">    
                                    </div>
                               </form>

                            <?php 
                                }
                            ?>

                            <?php 
                                
                                $format->verifyState($stateRequest);

                            ?>

                                                        

                            <!-- Modal Avaliação -->
                         
                            <div class="container">
                            
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" style="color: rgb(126, 179, 179)">Avaliar</h4>
                                    <button type="button" class="close right" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <div class="rating"  style="color: rgb(126, 179, 179)">
                                        <form method="post">
                                            <input type="hidden" name="idUser" value="<?=$value['IDUSUARIO']?>">
                                            <input type="radio" id="star5" name="rating" value="1" /><label for="star5">  1&nbsp;</label>
                                            <input type="radio" id="star4" name="rating" value="2" /><label for="star4"> 2&nbsp;</label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"> 3&nbsp;</label>
                                            <input type="radio" id="star2" name="rating" value="4" /><label for="star2"> 4&nbsp;</label>
                                            <input type="radio" id="star1" name="rating" value="5" /><label for="star1">  5&nbsp;</label>
                                            <input type="submit" class="btn btn-cyan margin-top right" value="OK">
                                        </form>
                                        </div>

                                    </div>
                                   
                                    
                                    
                                </div>
                                
                                </div>
                            </div>
                            
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


                            <script type="text/javascript">
                            $(window).load(function()
                            {
                                $('#myModal').modal('');
                            });
                            </script>

                          
                         

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



<?php 
                       }
 }

?>
    

</body>
</html>