

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
        <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="./ride-pending.css" rel="stylesheet" />
       
        <title>Perfil</title>
    </head>
    <body>
        
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
                          <li><a href="#">Rotas</a></li>
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
                                              <h4>Solicitações de carona</h4>
                                              <hr>
                                          </div>
                                      </div>
                                      <div class="row ">
                                          <div class="col-md-12">

                                            // <br>
                                              &nbsp; &nbsp *TODO* Assim que o usuario for aceito a parte de avaliação pode ser feita
                                            <br>//
                                            <div>
                                                <p>Breno</p>

                                                <form> 
                                                    <div>
                                                        <button name="accept" type="submit" class="btn btn-accept" >Aceitar</button>
                                                
                                                        <button name="reject" type="submit" class="btn btn-reject">Recusar</button>
                                                    </div>
                                                    
                                                </form>
                                                <hr>
                                            </div>

                                            <div>
                                                    <p>Well</p>
                                                    
                                                    <form> 
                                                        <div>
                                                            <button name="accept" type="submit" class="btn btn-accept" >Aceitar</button>
                                                    
                                                            <button name="reject" type="submit" class="btn btn-reject">Recusar</button>
                                                        </div>
                                                        
                                                    </form>
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