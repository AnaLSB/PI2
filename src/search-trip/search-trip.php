<?php

require_once '../Class/Service.php';

$service = new Service();


if(isset($_POST['submit'])){

    $from = $_POST['from'];
    $to = $_POST['to'];


    header("location: /PI2-profile_branch/src/ride/ride.php?from=$from&to=$to");

}







?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./search-trip.css" rel="stylesheet" />
    <script language="JavaScript" type="text/javascript" src="../cidades-estados.js"></script>
   
    <title>Buscar Caronas</title>

    <style>
    /*the container must be positioned relative:*/

      

        .input-form { 
            color: rgb(129, 129, 129);
            font-weight: bold;
            text-indent: 10px;
            border-radius: 18px;
            background-color: rgb(240, 236, 236);
            margin-left: 50px;
            margin-top: 7px;
            border: 1px solid rgb(126, 179, 179);
            border-radius: 18px;
            font-size: 26px;
            width: 80%;
            height: 50px;
        }

   

    
        .input-form-state{
            color: rgb(129, 129, 129);
            font-weight: bold;
            text-indent: 10px;
            border-radius: 18px;
            background-color: rgb(240, 236, 236);
            margin-top: 7px;
            border: 1px solid rgb(126, 179, 179);
            margin-left: 25px;
            font-size: 26px;
            width: 50%;
            height: 45px;
        }

        @media (max-width: 768px) {

            .autocomplete input {
                margin-left: 60px !important;
            }

            .autocomplete-items {
                margin-left: 60px !important;
            }
        }
    </style>
</head>
<body>
    
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

                        <form  autocomplete="off" method="post" action="search-trip.php">
                            <div class="text-center container-title">

                                    <img src="../../imagens/map-pointer-gif.gif" alt="">

                                    <p> Para onde vamos hoje? </p> 
                                   




                                    <table style="width: 100%">
                                        <tr>
                                        <td>
                                            <input style="display: inline;  width: 30%; font-size: 18px" type="text" id="estado1" class="input-form-state"/>
                                        <input style="display: inline; width: 50%; font-size: 18px" placeholder="Saindo de" required="required" class="input-form" type="text" name="from" id="cidade1"/>
                                        </td>
                                        <script language="JavaScript" type="text/javascript" charset="utf-8">
                                        new dgCidadesEstados({
                                            cidade: document.getElementById('cidade1'),
                                            estado: document.getElementById('estado1'),
                                            change: true
                                        })
                                        </script>
                                        </tr>

                                        <tr>
                                        <td>

                                        <input style="display: inline;  width: 30%; font-size: 18px" type="text" id="estado2" class="input-form-state"/>
                                        <input style="display: inline; width: 50%; font-size: 18px" name="to" placeholder="Para" required="required" class="input-form" type="text" id="cidade2"/></td>
                                        <script language="JavaScript" type="text/javascript" charset="utf-8">
                                        new dgCidadesEstados({
                                            cidade: document.getElementById('cidade2'),
                                            estado: document.getElementById('estado2'),
                                            change: true
                                        })
                                        </script>
                                        </tr>
                                    </table>

                                
                                    
                            </div>         
                            <div class="container-date">
                                <hr>
                                <p> Data e hora </p>     
                                <input id="Date" name="Date" type="date" class="input-date">
                                <input id="Hour" name="Hour" type="time" class="input-hour">
                                
                            </div>   

                            <div class="right margin-top">
                                    <input style="width: 200px;" type="submit" name="submit" class="btn btn-cyan" value="Continuar">    
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
    </script>

    

</body>
</html>