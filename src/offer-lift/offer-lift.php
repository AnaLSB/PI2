<?php

require_once 'offer-service.php';

$carona = new OfferLift();

if (isset($_POST['submit'])){
    if($carona->queryInsert($_POST) == 'ok'){
        header("location: /PI2.0/PI2/src/search-trip/search-trip.html");
    } else {
        echo '<script type="text/javascript"> alert("Erro ao cadastrar")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./offer-lift.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <title>Oferecer Carona</title>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#"  id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger icon"></span></a>
                        </div>
                    </div>

                    <div class="container text-center container-title">

                            <img src="../../imagens/ride.gif" alt="">

                            <p class="text-center"> Vamos dar aquela carona! </p> 
                           
                    </div>         
                    <div class="col-8 margin-top container container-offer">
                            <p> Ponto de partida</p>

                            <form action="offer-lift.php" method="post">
                                <label for="">De onde vai sair?</label>
                                <input id="source" name="source" placeholder="Exemplo: Praça do forúm, Araçuai" required="required" class="input-form" type="text">
                                <label for="">Para onde vai?</label>
                                <input id="destiny" name="destiny" placeholder="Exemplo: Virgem da Lapa" required="required" class="input-form" type="text">
                            
                                <hr>

                                <p> Data e hora</p>

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


                                <div class="right margin-top">
                                    <input name="submit" type="submit" class="btn btn-cyan" value="continuar">    
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