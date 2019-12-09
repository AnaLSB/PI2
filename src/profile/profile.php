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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/b1a932bc63.js" crossorigin="anonymous"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../CSS/global.css">
    <style type="text/css">
      body{
           font-family: 'Roboto', sans-serif;
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
        .sair{
            width: 250px;
            height: 50px;
            padding-top: 15px;
        }
        .sair:hover{
            background-color: #104b77
        }
    </style>
   
    <title>Perfil</title>
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
                              <h4  style="color: #336b77">Informações pessoais</h4>
                              <hr>
                          </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-12">
                          <?php
                            $select = $pdo->query("SELECT NOME, DATANASC, EMAIL, DDD, TELEFONE FROM usuario WHERE IDUSUARIO = ".$_SESSION['IDUSUARIO']."");
                            $res = $select->fetch();
                          ?>
                          <div class="form-group row">
                            <label for="nome" class="col-4 col-form-label">Nome Completo</label> 
                            <div class="col-8">
                              <h5 style="display: inline" id="name"><?php echo $res['NOME'] ?></h5>
                              <div class="right">
                                <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#AltNome" style="background-color: #336b77">
                                  <i style="display: inline;" class="far fa-edit">Editar</i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="dataNasc" class="col-4 col-form-label">Data de nascimento</label> 
                            <div class="col-8">
                              <h5 style="display: inline" id="name"><?php echo $res['DATANASC'] ?></h5>
                              <div class="right">
                                <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#AltData" style="background-color: #336b77">
                                  <i style="display: inline" class="far fa-edit">Editar</i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email</label> 
                            <div class="col-8">
                              <h5 style="display: inline" id="name"><?php echo $res['EMAIL'] ?></h5>
                              <div class="right">
                                <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#AltEmail" style="background-color: #336b77">
                                  <i style="display: inline" class="far fa-edit">Editar</i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="tel" class="col-4 col-form-label">DDD</label> 
                            <div class="col-8">
                              <h5 style="display: inline" id="name"><?php echo $res['DDD'] ?></h5>
                              <div class="right">
                                <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#AltDDD" style="background-color: #336b77">
                                  <i style="display: inline" class="far fa-edit">Editar</i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="tel" class="col-4 col-form-label">Telefone</label> 
                            <div class="col-8">
                              <h5 style="display: inline" id="name"><?php echo $res['TELEFONE'] ?></h5>
                              <div class="right">
                                <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#AltTel" style="background-color: #336b77">
                                  <i style="display: inline" class="far fa-edit">Editar</i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="left">
                            <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#AltSenha" style="background-color: #336b77">
                              Alterar Senha
                            </button>
                          </div>
                          
                          <!--Modal Aterar Senha-->
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

                          <!--Modal Alterar Nome-->

                          <div class="modal fade" id="AltNome" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado">Alteração de Nome</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST">
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Novo Nome</label> 
                                      <div class="col-8">
                                        <input id="name" name="newNome" class="form-control here" type="text">
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
                            if(isset($_POST['newNome'])){
                              $nome = addslashes($_POST['newNome']);
                              if(!empty($nome)){
                                if($u->msgErro == ""){
                                  if($u->alterarNome($nome, $_SESSION['IDUSUARIO'])){
                                    ?>
                                    <div class="msg-sucesso">
                                      Nome Atualizado com sucesso!
                                    </div>
                                  <?php
                                  }
                                  else{
                                    ?>
                                    <div class="msg-erro">
                                      Erro ao atualizar o nome.
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
                                    Preencha o campo.
                                </div>
                                <?php
                              }
                            }
                            
                          ?>

                          <!--Modal Alterar Data de Nascimento-->
                          <div class="modal fade" id="AltData" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado">Alteração de Data de Nascimento</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST">
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Nova Data</label> 
                                      <div class="col-8">
                                        <input id="name" name="newData" class="form-control here" type="date">
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
                            if(isset($_POST['newData'])){
                              $data = addslashes($_POST['newData']);
                              if(!empty($data)){
                                if($u->msgErro == ""){
                                  if($u->alterarData($data, $_SESSION['IDUSUARIO'])){
                                    ?>
                                    <div class="msg-sucesso">
                                      Data de Nascimento atualizada com sucesso!
                                    </div>
                                  <?php
                                  }
                                  else{
                                    ?>
                                    <div class="msg-erro">
                                      Erro ao atualizar a data.
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
                                    Preencha o campo.
                                </div>
                                <?php
                              }
                            }
                            
                          ?>


                          <!--Modal Alterar Email-->
                          <div class="modal fade" id="AltEmail" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado">Alteração de E-mail</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST">
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Novo E-mail</label> 
                                      <div class="col-8">
                                        <input id="name" name="newEmail" class="form-control here" type="email">
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
                            if(isset($_POST['newEmail'])){
                              $email = addslashes($_POST['newEmail']);
                              if(!empty($email)){
                                if($u->msgErro == ""){
                                  if($u->alterarEmail($email, $_SESSION['IDUSUARIO'])){
                                    ?>
                                    <div class="msg-sucesso">
                                      E-mail atualizado com sucesso!
                                    </div>
                                  <?php
                                  }
                                  else{
                                    ?>
                                    <div class="msg-erro">
                                      E-mail já cadastrado. Tente um diferente.
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
                                    Preencha o campo.
                                </div>
                                <?php
                              }
                            }
                            
                          ?>

                          

                          <!--Modal Alterar DDD-->
                          <div class="modal fade" id="AltDDD" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado">Alteração de DDD</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST">
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Novo DDD</label> 
                                      <div class="col-8">
                                        <input id="name" name="newDDD" class="form-control here" type="number">
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
                            if(isset($_POST['newDDD'])){
                              $ddd = addslashes($_POST['newDDD']);
                              if(!empty($ddd)){
                                if($u->msgErro == ""){
                                  if($u->alterarDDD($ddd, $_SESSION['IDUSUARIO'])){
                                    ?>
                                    <div class="msg-sucesso">
                                      DDD atualizado com sucesso!
                                    </div>
                                  <?php
                                  }
                                  else{
                                    ?>
                                    <div class="msg-erro">
                                      Erro ao atualizar o DDD.
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
                                    Preencha o campo.
                                </div>
                                <?php
                              }
                            }
                            
                          ?>

                          <!--Modal Alterar Telefone-->
                          <div class="modal fade" id="AltTel" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado">Alteração de Telefone</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST">
                                    <div class="form-group row">
                                      <label for="nome" class="col-4 col-form-label">Novo Telefone</label> 
                                      <div class="col-8">
                                        <input id="name" name="newTel" class="form-control here" type="number">
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
                            if(isset($_POST['newTel'])){
                              $tel = addslashes($_POST['newTel']);
                              if(!empty($tel)){
                                if($u->msgErro == ""){
                                  if($u->alterarTelefone($tel, $_SESSION['IDUSUARIO'])){
                                    ?>
                                    <div class="msg-sucesso">
                                      Telefone atualizado com sucesso!
                                    </div>
                                  <?php
                                  }
                                  else{
                                    ?>
                                    <div class="msg-erro">
                                      Erro ao atualizar o Telefone.
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
                                    Preencha o campo.
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
