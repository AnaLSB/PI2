<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./profile.css" rel="stylesheet" />
   
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
                                          <h4>Informações pessoais</h4>
                                          <hr>
                                      </div>
                                  </div>
                                  <div class="row ">
                                      <div class="col-md-12">
                                          <form>
                                                <div class="form-group row">
                                                  <label for="username" class="col-4 col-form-label">Nome de usuario</label> 
                                                  <div class="col-8">
                                                    <input id="username" name="username" value="brenog" class="form-control here" required="required" type="text">
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="email" class="col-4 col-form-label">Email</label> 
                                                  <div class="col-8">
                                                    <input id="email" name="email" placeholder="example@" required="required" class="form-control here" type="text">
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="name" class="col-4 col-form-label">Nome Completo</label> 
                                                  <div class="col-8">
                                                    <input id="name" name="name" value="Breno Cota" class="form-control here" type="text">
                                                  </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                  <label for="tel" class="col-4 col-form-label">Telefone</label> 
                                                  <div class="col-8">
                                                    <input id="tel" name="tel" placeholder="(55) 33XXX-XXXX" class="form-control here" type="text">
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="dataNasc" class="col-4 col-form-label">Data de nascimento</label> 
                                                  <div class="col-8">
                                                    <input id="dataNasc" name="dataNasc" value="29/10/1999" class="form-control here" required="required" type="text">
                                                  </div>
                                                </div>
                                                
                                               
                                               
                                                  <div class="right">
                                                    <button name="submit" type="submit" class="btn btn-cyan">Salvar</button>
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