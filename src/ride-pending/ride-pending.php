<?php

require_once '../Class/Service.php';
require_once '../Class/Format.php';
require_once '../Class/RequestService.php';

$service = new Service();
$format = new Format();
$requestService = new RequestService();


if(isset($_POST['accept']) || isset($_POST['reject'])){
  
    if ($_POST['accept'] == 'aceitar'){
        $_POST['accept'] = 1;
    } 

    if ($_POST['reject'] == 'rejeitar'){
      $_POST['reject'] = 0;
    } 

}


    if (isset($_POST['accept']) && isset($_POST['id'])){

      $places = $requestService->getPlaces($_POST['places']);
      var_dump($places);
        if($requestService->acceptSolicit($_POST['accept'], $_POST['id'], $places) == 'ok'){
          header("location: /PI2.0/PI2/src/my-routes/my-routes.php");
        } else {
            echo '<script type="text/javascript"> alert("Erro ao solicitar carona.")</script>';
        }
    } else if (isset($_POST['reject']) && isset($_POST['id'])){
      
      $places = $requestService->getPlaces($_POST['places']);
      if($requestService->acceptSolicit($_POST['reject'], $_POST['id'], $places)  == 'ok'){
        header("location: /PI2.0/PI2/src/my-routes/my-routes.php");
      } else {
          echo '<script type="text/javascript"> alert("Erro ao solicitar carona.")</script>';
      }
    }




?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
        <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="./ride-pending.css" rel="stylesheet" />
       
        <title>Perfil</title>

        <style>

        h4{
          margin-top: 10px;
          margin-left: 30px;
        }
    
        .name {
              color: rgb(126, 179, 179);
              font-size: 18px;
        }

        .img-circle-ride {
          margin-top: -50px;
          float: right;
          border-radius: 50%;
          width: 50px;
          height: 50px;
        }

        .btn {
          border-radius: 5px;
        }

        .btn-reject {
          background-color: rgb(248, 1, 1);
          color: #FFF;
        }

        .btn-accept {
          background-color: rgb(30, 255, 0);
          color: #FFF;
        }

        a {
          font-size: 14px;
        }
        a:hover {
            text-decoration: none;
        }

        .icon-arrow {
            top: 30;
            color: rgb(0, 139, 139);
            font-size: 20px;
        }
        .icon-arrow:hover{
            color: rgb(126, 179, 179);
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
                            <input id="photo"  name="photo" type="file">
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
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-lg-12">
                            <a href="#" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger icon"></span></a>
                            
                          </div>
    
                      
    
                          <div class="col-md-9">
                              <div class="card profile-info">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <a href="<?=$_SERVER['HTTP_REFERER']?>" class="icon-arrow glyphicon glyphicon-arrow-left"></a>
                                              <h4>Solicitações de carona</h4>
                                              
                                          </div>
                                      </div>
                                      <div class="row ">
                                          <div class="col-md-12">

                                        

                                            <?php

                                         
                                          
                                          if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                          

                                            foreach($requestService->querySelection($id) as $value ) { 
                                                

                                            ?>

                                            <div>
                                                <p class="name"><?=$value['NOME']?></p>
                                                <img class="img-circle-ride" src="../../imagens/profile-pic.png" alt="">

                                              
                                                <form method="post"> 
                                                    <div>
                                                        <input name="id" type="hidden" value="<?=$value['IDUSUARIO']?>">   
                                                        <input name="places" type="hidden" value="<?=$value['IDCARONA']?>"> 
                                                        <input class="btn btn-accept" type="submit" name="accept" value="aceitar">
                                                        <input class="btn btn-reject" type="submit" name="reject" value="rejeitar">
                                                    </div>
                                                    
                                                </form>
                                                <hr>
                                            </div>

                                           <?php
                                             }
                                            }
                                           ?>

                                          </div>
    
                                        
                                      </div>
    
                                    </div>
                                  </div>
                              </div>
                            </div>
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