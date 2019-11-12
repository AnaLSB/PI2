<?php

require_once '../Class/Service.php';
require_once '../Class/Format.php';

$service = new Service();
$format = new Format();

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
                            <a href="../search-trip/search-trip.php" name="search" class="form-control form-control-sm ml-3 w-75"
                                aria-label="Buscar"> </a>
                    </form>
                        

                        <?php 
                        
                        
                        if(!isset($_GET['from']) && !isset($_GET['to'])){
                                    
                            echo "
                                <img style='border-radius: 50%; width: 160px; margin-left: 30%; margin-top: 30%' src='https://i.pinimg.com/originals/5b/27/01/5b270123bd7f65a53d4f889baa8609d7.gif' >
                                <h4 style='margin-left: 35%; color: rgb(0, 139, 139); margin-top: 10%; white-space: nowrap; '> OOPS :'(</h4>
                                <h5 style='margin-left: 25%; color: rgb(0, 139, 139); white-space: nowrap; '> Pesquise por uma carona!</h5>
                                  
                            ";
                        }
                        
                            if(isset($_GET['from']) && isset($_GET['to'])){
                            
                                if ($service->querySearch($from, $to) == 0){
                                    echo "
                                        <img style='border-radius: 50%; width: 160px; margin-left: 30%; margin-top: 30%' src='https://i.pinimg.com/originals/5b/27/01/5b270123bd7f65a53d4f889baa8609d7.gif' >
                                        <h4 style='margin-left: 35%; color: rgb(0, 139, 139); margin-top: 10%; white-space: nowrap; '> OOPS :'(</h4>
                                        <h5 style='text-align: center; color: rgb(0, 139, 139); white-space: nowrap; '> Não há caronas de $from para $to hoje!</h5>
                                        
                                    ";
                                } else {

                                foreach($service->querySearch($from, $to) as $value ) { 
                            
                            ?>
                        
                            <div class="container-ride">
                                <a href="../ride-details/ride-details.php?id=<?=$value['IDCARONA']?>">

                                <p class="price right">R$ <?= $value['PRECO'] ?></p>

                                <img src="https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png" alt="" class="img-ride">
                                <p><?= $value['ORIGEM'] ?> &nbsp; <i class="arrow"></i>
                                <i class="arrow"></i>
                                <i class="arrow"></i>       
                                &nbsp; <?= $value['DESTINO'] ?> </p>

                                <a class="right" style="position: absolute; top: -10px; left: 10px;" href="https://api.whatsapp.com/send?phone=5533999078936&text=Olá">
                                    <img style="width: 40px;" src="../../imagens/whatsapp.png" alt="">
                                </a>

                                <p><?= $time = $format->formatTime($value['HORARIO'])?> &nbsp;

                                    <span class="glyphicon glyphicon-time"></span>

                                &nbsp; <?= $timetwo = $format->formatTime($value['HORAVOLTA'])?></p>


                                
                               
                                
                        
                                <p style="position: absolute; bottom: -10px; left: 22%; color: rgb(126, 179, 179);">                             
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