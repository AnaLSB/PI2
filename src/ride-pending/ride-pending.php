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


  $id = $_GET['id'];
  

    if (isset($_POST['accept']) && isset($_POST['id']) && isset($_POST['places'])){

      $sendMessage = $_POST['link'];
      $places = $requestService->getPlaces($_POST['places']);

        if($requestService->acceptSolicit($_POST['accept'], $_POST['id'], $places, $id) == 'ok'){
          header("Location: $sendMessage");
        } else {
          header("location: /PI2-profile_branch/src/SucessErrorPage/Error.php");
         }
    } else if (isset($_POST['reject']) && isset($_POST['id']) && isset($_POST['places'])){
      
      $places = $requestService->getPlaces($_POST['places']);
      if($requestService->acceptSolicit($_POST['reject'], $_POST['id'], $places, $id)  == 'ok'){
        header("Location: $sendMessage");
      } else {
        header("location: /PI2-profile_branch/SucessErrorPage/Error.php");
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
          color: #657F80 !important;
          margin-top: 10px;
          margin-left: 30px;
          margin-bottom: 50px;
        }
    
        .name {
              color: rgb(126, 179, 179);
              font-size: 18px;
        }

        .img-circle-ride {
          margin-top: -20px;
          float: right;
          border-radius: 50%;
          width: 50px;
          height: 50px;
        }

        .btn {
          border-radius: 5px;
        }

        .btn-reject {
          background-color: rgb(243, 37, 18);
          color: #FFF;
        }

        .btn-accept {
          background-color: rgb(29, 167, 114);
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

        .wpp-icon{
          float: right;
        }

        @media (max-width: 768px) {
  
        #wrapper.menuDisplayed #sidebar-wrapper{
            width:220px;
        }

        .container {
          margin-left: -20px;
          min-width: 340px;
        }
        .container-ride {
          white-space: nowrap;
          margin-left: 0px;
          max-width: 340px;
        }

        .card{ 
          margin-left: -120px;
        }
        .card-body{
          max-width: 340px;
        }
        .price {
          font-size: 14px;
        }


        .search-form input {
          margin-top: 60px;
          min-width: 260px;
        }

        .search-form span {
          margin-left: 10px;
          margin-top: 60px;
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
                                      <div class="container">
                                          <div class="container-ride">

                                        

                                            <?php

                                         
                                          
                                          if(isset($_GET['id'])){
                                            $id = $_GET['id'];

                                            if($requestService->querySelection($id) == 0){

                                                echo "
                                                      <span style='color: rgb(126, 179, 179); font-size: 20px; text-align: center;'>Ainda não há solicitações!<span>
                                                ";
                                            } else { 

                                                foreach($requestService->querySelection($id) as $value ) { 
                                                

                                            ?>

                                            <div>
                                                <p class="name"><?=$value['NOME']?></p>
                                                <a target="_blank" class="wpp-icon" href="https://api.whatsapp.com/send?phone=55<?=$value['DDD'].$value['TELEFONE']?>&text=Olá%20<?=$value['NOME']?>,%20Recebi%20sua%20solicitação%20para%20a%20carona!">
                                                    <img style="width: 50px;" src="../../imagens/whatsapp.png" alt="">
                                                </a>
                                                <a class="right" target="_blank" href="https://www.facebook.com/<?=$value['FACEBOOK']?>">
                                                  <img style="width: 32; border-radius: 6px; margin-top: 9px;" src="../../imagens/facebook.png" alt="">
                                                </a>

                                              
                                                <form method="post"> 
                                                    <div>
                                                        <input name="id" type="hidden" value="<?=$value['IDUSUARIO']?>">   
                                                        <input name="places" type="hidden" value="<?=$value['IDCARONA']?>"> 
                                                        <input type="hidden" name="link" value="https://api.whatsapp.com/send?phone=55<?=$value['DDD'].$value['TELEFONE']?>&text=Olá%20<?=$value['NOME']?>,%20Solicitação%20Respondida!">
                                                        <input class="btn btn-accept" type="submit" name="accept" value="aceitar">
                                                        <input class="btn btn-reject" type="submit" name="reject" value="rejeitar">
                                                    </div>
                                                    
                                                </form>
                                                <hr>
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