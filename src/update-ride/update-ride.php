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
        .slider {
          -webkit-appearance: none;
          margin-left: 90px;
          margin-top: -30px;
          width: 150px;
          display: block;
          height: 15px;
          border-radius: 5px;  
          background: #d3d3d3;
          outline: none;
          -webkit-transition: .2s;
          transition: opacity .2s;
        }
        
        .slider::-webkit-slider-thumb {
          -webkit-appearance: none;
          appearance: none;
          width: 25px;
          height: 25px;
          border-radius: 50%; 
          background: #336b77;
          cursor: pointer;
        }
        
        .slider::-moz-range-thumb {
          width: 25px;
          height: 25px;
          border-radius: 50%;
          background: rgb(0, 139, 139);
          cursor: pointer;
        }
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
                                              <a style="color: #336b77" href="<?=$_SERVER['HTTP_REFERER']?>" class="icon-arrow glyphicon glyphicon-arrow-left"></a>
                                              <h4 align="center" style="color: #336b77">Atualizar carona</h4>
                                              
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-12">

                                                <?php


                                                if(isset($id)){
                                                $value = $service->querySelection($id);
                                                
                                                
                                                if ( $value > 0 )  { 
                                                    
                                                
                                                ?>

                                             <p> Data e hora</p>
                                            <form metho="post">

                                                    

                                                    <label class="container-check">ida e volta
                                                        <input style="background-color: #336b77" name="roundtrip" type="checkbox" checked="checked" onclick="bloqueio()">
                                                        <span class="checkmark"></span>
                                                    </label> 
                                                    
                                                
                                                    <label for="">Vai sair que horas?</label><br>
                                                    <input name="sourceDate" type="date" required="required" style="color: rgb(129, 129, 129);font-weight: bold;text-indent: 10px;border-radius: 18px;background-color: rgb(240, 236, 236);margin-top: 7px;border: 1px solid rgb(126, 179, 179);margin-left: 25px;width: 31%;height: 35px;display: inline;">
                                                    <input name="sourceHour" type="time" required="required" style="color: rgb(129, 129, 129);font-weight: bold;text-indent: 10px;border-radius: 18px;background-color: rgb(240, 236, 236);margin-top: 7px;border: 1px solid rgb(126, 179, 179);margin-left: 25px;width: 20%;height: 35px;display: inline;">
                                                    
                                                    <div id="destinyDateHour"> 
                                                        <label style="margin-top: 10px;" for="" class="destiny">Vai voltar que horas?</label><br>
                                                        <input name="destinyDate" type="date" style="color: rgb(129, 129, 129);font-weight: bold;text-indent: 10px;border-radius: 18px;background-color: rgb(240, 236, 236);margin-top: 7px;border: 1px solid rgb(126, 179, 179);margin-left: 25px;width: 31%;height: 35px;display: inline;">
                                                        <input id="destinyHour" name="destinyHour"  type="time" style="color: rgb(129, 129, 129);font-weight: bold;text-indent: 10px;border-radius: 18px;background-color: rgb(240, 236, 236);margin-top: 7px;border: 1px solid rgb(126, 179, 179);margin-left: 25px;width: 20%;height: 35px;display: inline;">
                                                    </div>
                    
                                                    <hr>
                    
                                                    <p>Detalhes</p>
                    
                                                    
                                                    <div class="slidecontainer">
                                                        <label style="color: #336b77" for="">Preço</label>
                                                        <input style="color: #336b77" type="range" min="10" max="100" value="30" class="slider" id="myRange" name="price" required="required" >
                                                        <p style="color: #336b77; margin-right: 15px" class="price">Valor: R$ <span id="demo"></span></p>
                                                    
                                                        <label style="color: #336b77" class="input-label"for="">Vagas</label>
                                                        <input style="margin-right: 15px; background-color: #336b77" class="input-places" type="number"  min="1" value="1" name="places" id="places" required="required" >
                                                    
                                                    </div>

                                                    <div style='margin-top: 35px; float: right;'>
                                                            <input class="btn btn-cyan" style="width: 200px; height: 40px; border-radius: 10px; background-color: #336b77" name="submit" type="submit"  value="Continuar">    
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
