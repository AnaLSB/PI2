<?php

require_once '../Class/Service.php';
require_once '../Class/Format.php';
require_once '../Class/RequestService.php';

$service = new Service();
$format = new Format();
$requestService = new RequestService();

$id = $_GET['id'];


if(isset($_POST['delete'])){
  
    if ($_POST['delete'] == 'remover'){
        $_POST['delete'] = 1;
        
       $service->queryDelete($_POST['delete'], $id);
    }

  }



  




?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
        <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="./update-ride.css" rel="stylesheet" />
       
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
                                              <h4>Atualizar carona</h4>
                                              
                                          </div>
                                      </div>
                                      <div class="row ">
                                          <div class="col-md-12">

                                                <?php


                                                if(isset($id)){
                                                $value = $service->querySelection($id);
                                                
                                                
                                                if ( $value > 0 )  { 
                                                    
                                                
                                                ?>

                                             <p> Data e hora</p>
                                            <form metho="post">

                                                    

                                                    <label class="container-check">ida e volta
                                                        <input id="roundtrip" name="roundtrip" type="checkbox" checked="checked" onclick="bloqueio()">
                                                        <span class="checkmark"></span>
                                                    </label> 
                                                    
                                                
                                                    <label for="">Vai sair que horas?</label>
                                                    <input id="sourceDate" name="sourceDate" type="date" required="required" class="input-date">
                                                    <input id="sourceHour" name="sourceHour" type="time" required="required" class="input-hour">
                                                    
                                                    <div id="destinyDateHour">
                                                        <label for="" class="destiny">Vai voltar que horas?</label>
                                                        <input id="destinyDate" name="destinyDate" type="date" class="input-date">
                                                        <input id="destinyHour" name="destinyHour"  type="time" class="input-hour">
                                                    </div>
                    
                                                    <hr>
                    
                                                    <p>Detalhes</p>
                    
                                                    
                                                    <div class="slidecontainer">
                                                        <label for="">Preço</label>
                                                        <input type="range" min="10" max="100" value="30" class="slider" id="myRange" name="price" required="required" >
                                                        <p class="price">Valor: R$ <span id="demo"></span></p>
                                                    
                                                        <label class="input-label"for="">Vagas</label>
                                                        <input  class="input-places" type="number"  min="1" value="1" name="places" id="places" required="required" >
                                                    
                                                    </div>

                                                    <div style='margin-top: 35px; float: right;'>
                                                            <input name="submit" type="submit" class="btn btn-cyan" value="continuar">    
                                                    </div>
                    

                                            </form>

                                            <form method="post"> 
                                                <div>
                                                    <label for="delete"><span style='color: rgb(243, 37, 18); font-size: 26px; cursor: pointer; margin-top: 30px;' class="glyphicon glyphicon-trash"></span></label>
                                                    <input name="id" type="hidden" value="<?=$value['IDCARONA']?>">
                                                    <input class="btn btn-reject" id="delete" type="submit" name="delete" value="remover">
                                                </div>
                                                
                                            </form>


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

<script>

        $(document).ready(function(){
        $("#menu-toggle").click(function(e){
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
        });

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
        output.innerHTML = this.value;
        }

        


    </script>


    <script  type="text/javascript"> // Checkbox ida e volta

        
        function bloqueio() {
        	if (document.getElementById("destinyDateHour").style.display == "none"){
                 document.getElementById("destinyDateHour").style.display = "block";
            } else {
                document.getElementById("destinyDateHour").style.display = "none";	  	  
              }  
              
        }
    </script>
        
    
    </body>
    </html>
