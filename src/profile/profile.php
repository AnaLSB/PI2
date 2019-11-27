<?php
    require_once '../../Classes/usuarios.php';
    $u = new Usuario;
    $u->conectar("integrador","localhost","root", "");
    session_start();
    

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link  href="../../node_modules/glyphicons-only-bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./profile.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../CSS/global.css">
   
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
                              <h4>Informações pessoais</h4>
                              <hr>
                          </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-12">
                          <?php
                            $select = $pdo->query("SELECT NOME, DATANASC, EMAIL, DDD, TELEFONE FROM usuario WHERE IDUSUARIO = ".$_SESSION['IDUSUARIO']."");
                            $res = $select->fetch();
                          ?>
                          <form method="POST" action="profile.php">
                            <div class="form-group row">
                              <label for="nome" class="col-4 col-form-label">Nome Completo</label> 
                              <div class="col-8">
                                <input id="name" name="nome" value="<?php echo $res['NOME'] ?>" class="form-control here" type="text">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="dataNasc" class="col-4 col-form-label">Data de nascimento</label> 
                              <div class="col-8">
                                <input id="dataNasc" name="data" value="<?php echo $res['DATANASC'] ?>" class="form-control here" required="required" type="date">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="email" class="col-4 col-form-label">Email</label> 
                              <div class="col-8">
                                <input id="email" name="email" value="<?php echo $res['EMAIL'] ?>" required="required" class="form-control here" type="email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="tel" class="col-4 col-form-label">DDD</label> 
                              <div class="col-8">
                                <input id="tel" name="ddd" value="<?php echo $res['DDD'] ?>" class="form-control here" type="number">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="tel" class="col-4 col-form-label">Telefone</label> 
                              <div class="col-8">
                                <input id="tel" name="telefone" value="<?php echo $res['TELEFONE'] ?>" class="form-control here" type="number">
                              </div>
                            </div>
                            <div class="left">
                              <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#AltSenha">
                                Alterar Senha
                              </button>
                            </div>
                            <div class="right">
                              <input style="color: white" type="submit" value="Salvar" name="submit" class="btn btn-cyan">
                            </div>
                          </form>
                          <?php
                                // Verificar se clicou no botao de cadastro
                                if(isset($_POST['nome'])){
                                    $nome = addslashes($_POST['nome']);
                                    $data = addslashes($_POST['data']);
                                    $email = addslashes($_POST['email']);
                                    $ddd = addslashes($_POST['ddd']);
                                    $telefone = addslashes($_POST['telefone']);

                                    //Verificar se está preenchido
                                    if(!empty($nome) && !empty($data) && !empty($ddd) && !empty($telefone) && !empty($email)){
                                        if($u->msgErro == ""){
                                          if($u->alterarDados($nome, $data, $email, $ddd, $telefone, $_SESSION['IDUSUARIO'])){
                                              ?>
                                              <div class="msg-sucesso">
                                                Dados Atualizados com sucesso!
                                            </div>
                                            <?php
                                          }
                                          else{
                                            ?>
                                              <div class="msg-erro">
                                                E-mail já cadastrado.
                                              </div>
                                            <?php
                                          }
                                        }
                                        else{
                                            echo "Erro: ".$u->msgErro;
                                        }
                                    }
                                    else{
                                        ?>
                                        <div class="msg-erro">
                                          Preencha todos os campos.
                                      </div>
                                      <?php
                                    }
                                }
                                
                            ?>

                          <div class="modal fade" id="AltSenha" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado">Alteração de senha</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST">
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Senha atual</label> 
                                      <div class="col-8">
                                        <input id="name" name="oldsenha" class="form-control here" type="password">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Nova Senha</label> 
                                      <div class="col-8">
                                        <input id="name" name="newsenha" class="form-control here" type="password">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Confirme a Senha</label> 
                                      <div class="col-8">
                                        <input id="name" name="confnewsenha" class="form-control here" type="password">
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                  <input style="color: white" type="submit" value="Salvar" name="submit" class="btn btn-cyan">
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <?php
                                // Verificar se clicou no botao de salvar
                                if(isset($_POST['oldsenha'])){
                                    $oldsenha = addslashes($_POST['oldsenha']);
                                    $newsenha = addslashes($_POST['newsenha']);
                                    $confnewsenha = addslashes($_POST['confnewsenha']);
                                    //Verificar se está preenchido
                                    if(!empty($oldsenha) && !empty($newsenha) && !empty($confnewsenha)){
                                        if($u->msgErro == ""){
                                          if($u->comparaSenha($oldsenha, $_SESSION['IDUSUARIO'])){
                                            if($newsenha == $confnewsenha){
                                              if($u->alterarSenha($newsenha, $_SESSION['IDUSUARIO'])){
                                                ?>
                                                <div class="msg-sucesso">
                                                  Senha Atualizada com sucesso!
                                                </div>
                                              <?php
                                              }
                                              else{
                                                ?>
                                                <div class="msg-erro">
                                                  Erro ao atualizar a senha.
                                                </div>
                                              <?php
                                              }
                                            }
                                          }
                                          else{
                                            ?>
                                              <div class="msg-erro">
                                                A Senha inserida não confere com a senha atual.
                                              </div>
                                            <?php
                                          }
                                        }
                                        else{
                                            echo "Erro: ".$u->msgErro;
                                        }
                                    }
                                    else{
                                        ?>
                                        <div class="msg-erro">
                                          Preencha todos os campos.
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