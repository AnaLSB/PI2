<?php

require_once '../Class/Service.php';

$service = new Service();



?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./ride.css" rel="stylesheet" />
   
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

                    <div class="container">
                        
                    <form class="search-form form-inline md-form form-sm mt-0">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                                aria-label="Buscar">
                    </form>
                        <a href="#" class="right filter" style="color: rgb(0, 139, 139)">Filtros</a>
                        

                        <?php foreach($service->querySelect() as $value ) { 
                           
                            
                            ?>
                        
                            <div class="container-ride">
                                <a href="../ride-details/ride-details.php?id=<?=$value['IDCARONA']?>">

                                <p class="price right">R$ <?= $value['PRECO'] ?></p>

                                <img src="https://i.ytimg.com/vi/EvuRPLKc1JQ/maxresdefault.jpg" alt="" class="img-ride">
                                <p><?= $value['ORIGEM'] ?> &nbsp; <i class="arrow"></i>
                                <i class="arrow"></i>
                                <i class="arrow"></i>       
                                &nbsp; <?= $value['DESTINO'] ?> </p>

                                <a class="right" style="position: absolute; top: -10px; left: 10px;" href="https://api.whatsapp.com/send?phone=5533999078936&text=Olá">
                                    <img style="width: 40px;" src="../../imagens/whatsapp.png" alt="">
                                </a>

                                <p><?= $value['HORARIO']?> &nbsp;

                                    <span class="glyphicon glyphicon-time"></span>

                                &nbsp; <?= $value['HORAVOLTA'] ?></p>
                               

                                </a>

                                
                            </div>

                        <?php } ?>

                            <!--Containers estaticos-->


                            
                        


                        
                        
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