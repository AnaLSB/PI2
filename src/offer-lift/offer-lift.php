<?php
if(!isset($_SESSION)){
    session_start();
}
require_once '../Class/Service.php';

$service = new Service();


$id = $_SESSION['IDUSUARIO'];

if (isset($_POST['fb'])){
    $service->insertFacebookUser($_POST['fb'], $id);
    $_SESSION['fb'] = $_POST['fb'];
}

if (isset($_POST['submit'])){
    if($service->queryInsert($_POST, $id) == 'ok'){
        header("location: /PI2-profile_branch/src/search-trip/search-trip.php");
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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script language="JavaScript" type="text/javascript" src="../../cidades-estados.js"></script>
   
    <title>Oferecer Carona</title>

    <style type="text/css">
        body{
             font-family: 'Roboto', sans-serif;
             font-size: 16px;
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
            width: 50%;
            height: 45px;
        }

        .container label {
            font-weight: bold;
            margin-top: 10px;
            font-size: 18px;
            color: #84afb9;
        }

        .btn-cyan{
          margin-bottom: 20px;
          background-color: #336b77;
          color: #FFF;
        }

        .btn-cyan:hover{
          background-color: #6198a5;
          color: white
        }

        /* The slider itself */
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

        .container-check input:checked ~ .checkmark {
          background-color: #336b77;
        }

        .input-places {
          position: absolute;
          bottom: 10px;
          right: 0;
          width: 50px;
          height: 25px;
          text-indent: 50%;
          background: #336b77;
          border-radius: 8px;
          border: none;
          color: rgb(255, 255, 255);
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

<?php 

if (!isset($_SESSION['fb'])){

?>
<div class="container">

  <!-- Modal -->
  <div class="modal fade" data-backdrop="static" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="color: #336b77">Só mais uma coisa :)</h4>
          <button type="button" class="close right" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="offer-lift.php" method="post">
          <p>Informe o link do seu facebook.</p>
          <input type="text" name="fb" required="required" placeholder="Ex: breno.cota.39" class="input-form-state">
          <input type="submit" class="btn btn-cyan margin-top right" value="OK" style="width: 20%;">
        </form>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script type="text/javascript">
  $(window).load(function()
{
    $('#myModal').modal('show');
});
</script>

<?php
}
?>
    
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
                    </div>

                    <div class="container text-center container-title">

                            <img src="../../imagens/ride.gif" alt="">

                            <p class="text-center" style="font-family: 'Roboto', sans-serif; color: #336b77"> Vamos dar aquela carona! </p> 
                           
                    </div>         
                    <div class="col-8 margin-top container container-offer" style="width: 550px;padding: 0px">


                            <form autocomplete="off" action="offer-lift.php" method="post">

                                <table style="width: 100%">
                                        <tr>
                                            <td><label for="" style="display: block;">De onde vai sair?</label></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                        <td style="width: 20%">
                                            <input style="display: inline;  width: 50%; height: 45px; font-size: 18px; padding: 0px; margin: 0px; margin-left: 30%" type="text" id="estado1" class="input-form-state"/>
                                        </td>
                                        <td style="padding: 0px">
                                            <input style="display: inline; width: 100%; height: 45px; font-size: 18px; padding: 0px; margin: 0px;" name="source" placeholder="Exemplo: Praça do forúm, Araçuai" required="required" class="input-form-state" type="text" id="cidade1"/>
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
                                            <td><label for="" style="display: block;">Para onde vai?</label></td>
                                        </tr>
                                        <tr>

                                        <td style="width: 20%;">
                                            <input style="display: inline;  width: 50%; height: 45px; font-size: 18px; padding: 0px; margin: 0px; margin-left: 30%" type="text" id="estado2" class="input-form-state"/>
                                        </td>
                                        <td>
                                            <input style="display: inline; width: 100%; height: 45px; font-size: 18px; padding: 0px; margin: 0px;" name="destiny" placeholder="Exemplo: Virgem da Lapa" required="required" class="input-form-state" type="text" id="cidade2"/>
                                        </td>
                                        <script language="JavaScript" type="text/javascript" charset="utf-8">
                                        new dgCidadesEstados({
                                            cidade: document.getElementById('cidade2'),
                                            estado: document.getElementById('estado2'),
                                            change: true
                                        })
                                        </script>
                                        </tr>
                                    </table>
                                    <br>

                                <label class="container-check">Ida e volta
                                    <input id="roundtrip" name="roundtrip" type="checkbox" checked="checked" onclick="bloqueio()">
                                    <span class="checkmark"></span>
                                </label> 
                                
                    
                                <label for="">Vai sair quando?</label>
                                <table>
                                    <tr>
                                        <td>
                                            <input style="width: 170px; height: 30px; font-size: 15px; margin-left: 25%" id="sourceDate" name="sourceDate" type="date" min="<?=date("Y-m-d")?>" required="required" class="input-form-state">
                                        </td>
                                        <td>
                                            <input style="width: 100px; height: 30px; font-size: 15px; margin-left: 50%" id="sourceHour" name="sourceHour" type="time" min="<?=date("Y-m-d")?>" required="required" class="input-form-state">
                                        </td>
                                    </tr>
                                </table>
                                
                                <div id="destinyDateHour">
                                    <label for="" class="destiny">Vai voltar quando?</label>
                                    <table>
                                        <tr>
                                            <td>
                                                <input style="width: 170px; height: 30px; font-size: 15px; margin-left: 25%" id="destinyDate" name="destinyDate" type="date" class="input-form-state">
                                            </td>
                                            <td>
                                                <input style="width: 100px; height: 30px; font-size: 15px; margin-left: 50%" id="destinyHour" name="destinyHour"  type="time" class="input-form-state">
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    
                                </div>

                                <hr> 

                                <p>Detalhes</p>

                                
                                <div class="slidecontainer">
                                    <label for="">Preço</label>
                                    <input type="range" min="10" max="100" value="30" class="slider" id="myRange" name="price" required="required" >
                                    <p style="color: #336b77" class="price">Valor: R$ <span id="demo"></span></p>
                                
                                    <label class="input-label"for="">Vagas</label>
                                    <input  style="width: 50px" class="input-places" type="number"  min="1" value="1" name="places" id="places" required="required" >
                                
                                </div>


                                <div class="right margin-top">
                                    <input style="width: 200px; height: 40px; border-radius: 10px;" type="submit" name="submit" class="btn btn-cyan" value="Continuar">    
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

    <script>
    function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
        }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
    }

    /*An array containing all the country names in the world:*/
    var countries = 
        ['Salvador','Abaíra','Abaré','Acajutiba','Adustina','Água Fria','Aiquara','Alagoinhas','Alcobaça','Almadina','Amargosa','Amélia Rodrigues','América Dourada','Anagé','Andaraí','Andorinha','Angical','Anguera','Antas','Antônio Cardoso','Antônio Gonçalves','Aporá','Apuarema','Araças','Aracatu','Araci','Aramari','Arataca','Aratuípe','Aurelino Leal','Baianópolis','Baixa Grande','Banzaê','Barra','Barra da Estiva','Barra do Choça','Barra do Mendes','Barra do Rocha','Barreiras','Barro Alto','Barrocas','Barro Preto','Belmonte','Belo Campo','Biritinga','Boa Nova','Boa Vista do Tupim','Bom Jesus da Lapa','Bom Jesus da Serra','Boninal','Bonito','Boquira','Botuporã','Brejões','Brejolândia','Brotas de Macaúbas','Brumado','Buerarema','Buritirama','Caatiba','Cabaceiras do Paraguaçu','Cachoeira','Caculé','Caém','Caetanos','Caetité','Cafarnaum','Cairu','Caldeirão Grande','Camacan','Camaçari','Camamu','Campo Alegre de Lourdes','Campo Formoso','Canápolis','Canarana','Canavieiras','Candeal','Candeias','Candiba','Cândido Sales','Cansanção','Canudos','Capela do Alto Alegre','Capim Grosso','Caraíbas','Caravelas','Cardeal da Silva','Carinhanha','Casa Nova','Castro Alves','Catolândia','Catu','Caturama','Central','Chorrochó','Cícero Dantas','Cipó','Coaraci','Cocos','Conceição da Feira','Conceição do Almeida','Conceição do Coité','Conceição do Jacuípe','Conde','Condeúba','Contendas do Sincorá','Coração de Maria','Cordeiros','Coribe','Coronel João Sá','Correntina','Cotegipe','Cravolândia','Crisópolis','Cristópolis','Cruz das Almas','Curaçá','Dário Meira','Dias d\'Ávila','Dom Basílio','Dom Macedo Costa','Elísio Medrado','Encruzilhada','Entre Rios','Érico Cardoso','Esplanada','Euclides da Cunha','Eunápolis','Fátima','Feira da Mata','Feira de Santana','Filadélfia','Firmino Alves','Floresta Azul','Formosa do Rio Preto','Gandu','Gavião','Gentio do Ouro','Glória','Gongogi','Governador Mangabeira','Guajeru','Guanambi','Guaratinga','Heliópolis','Iaçu','Ibiassucê','Ibicaraí','Ibicoara','Ibicuí','Ibipeba','Ibipitanga','Ibiquera','Ibirapitanga','Ibirapuã','Ibirataia','Ibitiara','Ibititá','Ibotirama','Ichu','Igaporã','Igrapiúna','Iguaí','Ilhéus','Inhambupe','Ipecaetá','Ipiaú','Ipirá','Ipupiara','Irajuba','Iramaia','Iraquara','Irará','Irecê','Itabela','Itaberaba','Itabuna','Itacaré','Itaeté','Itagi','Itagibá','Itagimirim','Itaguaçu da Bahia','Itaju do Colônia','Itajuípe','Itamaraju','Itamari','Itambé','Itanagra','Itanhém','Itaparica','Itapé','Itapebi','Itapetinga','Itapicuru','Itapitanga','Itaquara','Itarantim','Itatim','Itiruçu','Itiúba','Itororó','Ituaçu','Ituberá','Iuiú','Jaborandi','Jacaraci','Jacobina','Jaguaquara','Jaguarari','Jaguaripe','Jandaíra','Jequié','Jeremoabo','Jiquiriçá','Jitaúna','João Dourado','Juazeiro','Jucuruçu','Jussara','Jussari','Jussiape','Lafaiete Coutinho','Lagoa Real','Laje','Lajedão','Lajedinho','Lajedo do Tabocal','Lamarão','Lapão','Lauro de Freitas','Lençóis','Licínio de Almeida','Livramento de Nossa Senhora','Luís Eduardo Magalhães','Macajuba','Macarani','Macaúbas','Macururé','Madre de Deus','Maetinga','Maiquinique','Mairi','Malhada','Malhada de Pedras','Manoel Vitorino','Mansidão','Maracás','Maragogipe','Maraú','Marcionílio Souza','Mascote','Mata de São João','Matina','Medeiros Neto','Miguel Calmon','Milagres','Mirangaba','Mirante','Monte Santo','Morpará','Morro do Chapéu','Mortugaba','Mucugê','Mucuri','Mulungu do Morro','Mundo Novo','Muniz Ferreira','Muquém de São Francisco','Muritiba','Mutuípe','Nazaré','Nilo Peçanha','Nordestina','Nova Canaã','Nova Fátima','Nova Ibiá','Nova Itarana','Nova Redenção','Nova Soure','Nova Viçosa','Novo Horizonte','Novo Triunfo','Olindina','Oliveira dos Brejinhos','Ouriçangas','Ourolândia','Palmas de Monte Alto','Palmeiras','Paramirim','Paratinga','Paripiranga','Pau Brasil','Paulo Afonso','Pé de Serra','Pedrão','Pedro Alexandre','Piatã','Pilão Arcado','Pindaí','Pindobaçu','Pintadas','Piraí do Norte','Piripá','Piritiba','Planaltino','Planalto','Poções','Pojuca','Ponto Novo','Porto Seguro','Potiraguá','Prado','Presidente Dutra','Presidente Jânio Quadros','Presidente Tancredo Neves','Queimadas','Quijingue','Quixabeira','Rafael Jambeiro','Remanso','Retirolândia','Riachão das Neves','Riachão do Jacuípe','Riacho de Santana','Ribeira do Amparo','Ribeira do Pombal','Ribeirão do Largo','Rio de Contas','Rio do Antônio','Rio do Pires','Rio Real','Rodelas','Ruy Barbosa','Salinas da Margarida','Santa Bárbara','Santa Brígida','Santa Cruz Cabrália','Santa Cruz da Vitória','Santa Inês','Santa Luzia','Santa Maria da Vitória','Santa Rita de Cássia','Santa Teresinha','Santaluz','Santana','Santanópolis','Santo Amaro','Santo Antônio de Jesus','Santo Estêvão','São Desidério','São Domingos','São Felipe','São Félix','São Félix do Coribe','São Francisco do Conde','São Gabriel','São Gonçalo dos Campos','São José da Vitória','São José do Jacuípe','São Miguel das Matas','São Sebastião do Passé','Sapeaçu','Sátiro Dias','Saubara','Saúde','Seabra','Sebastião Laranjeiras','Senhor do Bonfim','Sento Sé','Serra do Ramalho','Serra Dourada','Serra Preta','Serrinha','Serrolândia','Simões Filho','Sítio do Mato','Sítio do Quinto','Sobradinho','Souto Soares','Tabocas do Brejo Velho','Tanhaçu','Tanque Novo','Tanquinho','Taperoá','Tapiramutá','Teixeira de Freitas','Teodoro Sampaio','Teofilândia','Teolândia','Terra Nova','Tremedal','Tucano','Uauá','Ubaíra','Ubaitaba','Ubatã','Uibaí','Umburanas','Una','Urandi','Uruçuca','Utinga','Valença','Valente','Várzea da Roça','Várzea do Poço','Várzea Nova','Varzedo','Vera Cruz','Vereda','Vitória da Conquista','Wagner','Wanderley','Wenceslau Guimarães','Xique-Xique',
        'Vitória','Afonso Cláudio','Água Doce do Norte','Águia Branca','Alegre','Alfredo Chaves','Alto Rio Novo','Anchieta','Apiacá','Aracruz','Atilio Vivacqua','Baixo Guandu','Barra de São Francisco','Boa Esperança','Bom Jesus do Norte','Brejetuba','Cachoeiro de Itapemirim','Cariacica','Castelo','Colatina','Conceição da Barra','Conceição do Castelo','Divino de São Lourenço','Domingos Martins','Dores do Rio Preto','Ecoporanga','Fundão','Governador Lindenberg','Guaçuí','Guarapari','Ibatiba','Ibiraçu','Ibitirama','Iconha','Irupi','Itaguaçu','Itapemirim','Itarana','Iúna','Jaguaré','Jerônimo Monteiro','João Neiva','Laranja da Terra','Linhares','Mantenópolis','Marataizes','Marechal Floriano','Marilândia','Mimoso do Sul','Montanha','Mucurici','Muniz Freire','Muqui','Nova Venécia','Pancas','Pedro Canário','Pinheiros','Piúma','Ponto Belo','Presidente Kennedy','Rio Bananal','Rio Novo do Sul','Santa Leopoldina','Santa Maria de Jetibá','Santa Teresa','São Domingos do Norte','São Gabriel da Palha','São José do Calçado','São Mateus','São Roque do Canaã','Serra','Sooretama','Vargem Alta','Venda Nova do Imigrante','Viana','Vila Pavão','Vila Valério','Vila Velha',
        'Goiânia','Abadia de Goiás','Abadiânia','Acreúna','Adelândia','Água Fria de Goiás','Água Limpa','Águas Lindas de Goiás','Alexânia','Aloândia','Alto Horizonte','Alto Paraíso de Goiás','Alvorada do Norte','Amaralina','Americano do Brasil','Amorinópolis','Anápolis','Anhanguera','Anicuns','Aparecida de Goiânia','Aparecida do Rio Doce','Aporé','Araçu','Aragarças','Aragoiânia','Araguapaz','Arenópolis','Aruanã','Aurilândia','Avelinópolis','Baliza','Barro Alto','Bela Vista de Goiás','Bom Jardim de Goiás','Bom Jesus de Goiás','Bonfinópolis','Bonópolis','Brazabrantes','Britânia','Buriti Alegre','Buriti de Goiás','Buritinópolis','Cabeceiras','Cachoeira Alta','Cachoeira de Goiás','Cachoeira Dourada','Caçu','Caiapônia','Caldas Novas','Caldazinha','Campestre de Goiás','Campinaçu','Campinorte','Campo Alegre de Goiás','Campo Limpo de Goiás','Campos Belos','Campos Verdes','Carmo do Rio Verde','Castelândia','Catalão','Caturaí','Cavalcante','Ceres','Cezarina','Chapadão do Céu','Cidade Ocidental','Cocalzinho de Goiás','Colinas do Sul','Córrego do Ouro','Corumbá de Goiás','Corumbaíba','Cristalina','Cristianópolis','Crixás','Cromínia','Cumari','Damianópolis','Damolândia','Davinópolis','Diorama','Divinópolis de Goiás','Doverlândia','Edealina','Edéia','Estrela do Norte','Faina','Fazenda Nova','Firminópolis','Flores de Goiás','Formosa','Formoso','Gameleira de Goiás','Goianápolis','Goiandira','Goianésia','Goianira','Goiás','Goiatuba','Gouvelândia','Guapó','Guaraíta','Guarani de Goiás','Guarinos','Heitoraí','Hidrolândia','Hidrolina','Iaciara','Inaciolândia','Indiara','Inhumas','Ipameri','Ipiranga de Goiás','Iporá','Israelândia','Itaberaí','Itaguari','Itaguaru','Itajá','Itapaci','Itapirapuã','Itapuranga','Itarumã','Itauçu','Itumbiara','Ivolândia','Jandaia','Jaraguá','Jataí','Jaupaci','Jesúpolis','Joviânia','Jussara','Lagoa Santa','Leopoldo de Bulhões','Luziânia','Mairipotaba','Mambaí','Mara Rosa','Marzagão','Matrinchã','Maurilândia','Mimoso de Goiás','Minaçu','Mineiros','Moiporá','Monte Alegre de Goiás','Montes Claros de Goiás','Montividiu','Montividiu do Norte','Morrinhos','Morro Agudo de Goiás','Mossâmedes','Mozarlândia','Mundo Novo','Mutunópolis','Nazário','Nerópolis','Niquelândia','Nova América','Nova Aurora','Nova Crixás','Nova Glória','Nova Iguaçu de Goiás','Nova Roma','Nova Veneza','Novo Brasil','Novo Gama','Novo Planalto','Orizona','Ouro Verde de Goiás','Ouvidor','Padre Bernardo','Palestina de Goiás','Palmeiras de Goiás','Palmelo','Palminópolis','Panamá','Paranaiguara','Paraúna','Perolândia','Petrolina de Goiás','Pilar de Goiás','Piracanjuba','Piranhas','Pirenópolis','Pires do Rio','Planaltina','Pontalina','Porangatu','Porteirão','Portelândia','Posse','Professor Jamil','Quirinópolis','Rialma','Rianápolis','Rio Quente','Rio Verde','Rubiataba','Sanclerlândia','Santa Bárbara de Goiás','Santa Cruz de Goiás','Santa Fé de Goiás','Santa Helena de Goiás','Santa Isabel','Santa Rita do Araguaia','Santa Rita do Novo Destino','Santa Rosa de Goiás','Santa Tereza de Goiás','Santa Terezinha de Goiás','Santo Antônio da Barra','Santo Antônio de Goiás','Santo Antônio do Descoberto','São Domingos','São Francisco de Goiás','São João d\'Aliança','São João da Paraúna','São Luís de Montes Belos','São Luíz do Norte','São Miguel do Araguaia','São Miguel do Passa Quatro','São Patrício','São Simão','Senador Canedo','Serranópolis','Silvânia','Simolândia','Sítio d\'Abadia','Taquaral de Goiás','Teresina de Goiás','Terezópolis de Goiás','Três Ranchos','Trindade','Trombas','Turvânia','Turvelândia','Uirapuru','Uruaçu','Uruana','Urutaí','Valparaíso de Goiás','Varjão','Vianópolis','Vicentinópolis','Vila Boa','Vila Propício',
        'Belo Horizonte','Abadia dos Dourados','Abaeté','Abre Campo','Acaiaca','Açucena','Água Boa','Água Comprida','Aguanil','Águas Formosas','Águas Vermelhas','Aimorés','Aiuruoca','Alagoa','Albertina','Além Paraíba','Alfenas','Alfredo Vasconcelos','Almenara','Alpercata','Alpinópolis','Alterosa','Alto Caparaó','Alto Jequitibá','Alto Rio Doce','Alvarenga','Alvinópolis','Alvorada de Minas','Amparo do Serra','Andradas','Andrelândia','Angelândia','Antônio Carlos','Antônio Dias','Antônio Prado de Minas','Araçaí','Aracitaba','Araçuaí','Araguari','Arantina','Araponga','Araporã','Arapuá','Araújos','Araxá','Arceburgo','Arcos','Areado','Argirita','Aricanduva','Arinos','Astolfo Dutra','Ataléia','Augusto de Lima','Baependi','Baldim','Bambuí','Bandeira','Bandeira do Sul','Barão de Cocais','Barão de Monte Alto','Barbacena','Barra Longa','Barroso','Bela Vista de Minas','Belmiro Braga','Belo Oriente','Belo Vale','Berilo','Berizal','Bertópolis','Betim','Bias Fortes','Bicas','Biquinhas','Boa Esperança','Bocaina de Minas','Bocaiúva','Bom Despacho','Bom Jardim de Minas','Bom Jesus da Penha','Bom Jesus do Amparo','Bom Jesus do Galho','Bom Repouso','Bom Sucesso','Bonfim','Bonfinópolis de Minas','Bonito de Minas','Borda da Mata','Botelhos','Botumirim','Brás Pires','Brasilândia de Minas','Brasília de Minas','Brasópolis','Braúnas','Brumadinho','Bueno Brandão','Buenópolis','Bugre','Buritis','Buritizeiro','Cabeceira Grande','Cabo Verde','Cachoeira da Prata','Cachoeira de Minas','Cachoeira de Pajeú','Cachoeira Dourada','Caetanópolis','Caeté','Caiana','Cajuri','Caldas','Camacho','Camanducaia','Cambuí','Cambuquira','Campanário','Campanha','Campestre','Campina Verde','Campo Azul','Campo Belo','Campo do Meio','Campo Florido','Campos Altos','Campos Gerais','Cana Verde','Canaã','Canápolis','Candeias','Cantagalo','Caparaó','Capela Nova','Capelinha','Capetinga','Capim Branco','Capinópolis','Capitão Andrade','Capitão Enéas','Capitólio','Caputira','Caraí','Caranaíba','Carandaí','Carangola','Caratinga','Carbonita','Careaçu','Carlos Chagas','Carmésia','Carmo da Cachoeira','Carmo da Mata','Carmo de Minas','Carmo do Cajuru','Carmo do Paranaíba','Carmo do Rio Claro','Carmópolis de Minas','Carneirinho','Carrancas','Carvalhópolis','Carvalhos','Casa Grande','Cascalho Rico','Cássia','Cataguases','Catas Altas','Catas Altas da Noruega','Catuji','Catuti','Caxambu','Cedro do Abaeté','Central de Minas','Centralina','Chácara','Chalé','Chapada do Norte','Chapada Gaúcha','Chiador','Cipotânea','Claraval','Claro dos Poções','Cláudio','Coimbra','Coluna','Comendador Gomes','Comercinho','Conceição da Aparecida','Conceição da Barra de Minas','Conceição das Alagoas','Conceição das Pedras','Conceição de Ipanema','Conceição do Mato Dentro','Conceição do Pará','Conceição do Rio Verde','Conceição dos Ouros','Cônego Marinho','Confins','Congonhal','Congonhas','Congonhas do Norte','Conquista','Conselheiro Lafaiete','Conselheiro Pena','Consolação','Contagem','Coqueiral','Coração de Jesus','Cordisburgo','Cordislândia','Corinto','Coroaci','Coromandel','Coronel Fabriciano','Coronel Murta','Coronel Pacheco','Coronel Xavier Chaves','Córrego Danta','Córrego do Bom Jesus','Córrego Fundo','Córrego Novo','Couto de Magalhães de Minas','Crisólita','Cristais','Cristália','Cristiano Otoni','Cristina','Crucilândia','Cruzeiro da Fortaleza','Cruzília','Cuparaque','Curral de Dentro','Curvelo','Datas','Delfim Moreira','Delfinópolis','Delta','Descoberto','Desterro de Entre Rios','Desterro do Melo','Diamantina','Diogo de Vasconcelos','Dionísio','Divinésia','Divino','Divino das Laranjeiras','Divinolândia de Minas','Divinópolis','Divisa Alegre','Divisa Nova','Divisópolis','Dom Bosco','Dom Cavati','Dom Joaquim','Dom Silvério','Dom Viçoso','Dona Euzébia','Dores de Campos','Dores de Guanhães','Dores do Indaiá','Dores do Turvo','Doresópolis','Douradoquara','Durandé','Elói Mendes','Engenheiro Caldas','Engenheiro Navarro','Entre Folhas','Entre Rios de Minas','Ervália','Esmeraldas','Espera Feliz','Espinosa','Espírito Santo do Dourado','Estiva','Estrela Dalva','Estrela do Indaiá','Estrela do Sul','Eugenópolis','Ewbank da Câmara','Extrema','Fama','Faria Lemos','Felício dos Santos','Felisburgo','Felixlândia','Fernandes Tourinho','Ferros','Fervedouro','Florestal','Formiga','Formoso','Fortaleza de Minas','Fortuna de Minas','Francisco Badaró','Francisco Dumont','Francisco Sá','Franciscópolis','Frei Gaspar','Frei Inocêncio','Frei Lagonegro','Fronteira','Fronteira dos Vales','Fruta de Leite','Frutal','Funilândia','Galiléia','Gameleiras','Glaucilândia','Goiabeira','Goianá','Gonçalves','Gonzaga','Gouveia','Governador Valadares','Grão Mogol','Grupiara','Guanhães','Guapé','Guaraciaba','Guaraciama','Guaranésia','Guarani','Guarará','Guarda-Mor','Guaxupé','Guidoval','Guimarânia','Guiricema','Gurinhatã','Heliodora','Iapu','Ibertioga','Ibiá','Ibiaí','Ibiracatu','Ibiraci','Ibirité','Ibitiúra de Minas','Ibituruna','Icaraí de Minas','Igarapé','Igaratinga','Iguatama','Ijaci','Ilicínea','Imbé de Minas','Inconfidentes','Indaiabira','Indianópolis','Ingaí','Inhapim','Inhaúma','Inimutaba','Ipaba','Ipanema','Ipatinga','Ipiaçu','Ipuiúna','Iraí de Minas','Itabira','Itabirinha de Mantena','Itabirito','Itacambira','Itacarambi','Itaguara','Itaipé','Itajubá','Itamarandiba','Itamarati de Minas','Itambacuri','Itambé do Mato Dentro','Itamogi','Itamonte','Itanhandu','Itanhomi','Itaobim','Itapagipe','Itapecerica','Itapeva','Itatiaiuçu','Itaú de Minas','Itaúna','Itaverava','Itinga','Itueta','Ituiutaba','Itumirim','Iturama','Itutinga','Jaboticatubas','Jacinto','Jacuí','Jacutinga','Jaguaraçu','Jaíba','Jampruca','Janaúba','Januária','Japaraíba','Japonvar','Jeceaba','Jenipapo de Minas','Jequeri','Jequitaí','Jequitibá','Jequitinhonha','Jesuânia','Joaíma','Joanésia','João Monlevade','João Pinheiro','Joaquim Felício','Jordânia','José Gonçalves de Minas','José Raydan','Josenópolis','Juatuba','Juiz de Fora','Juramento','Juruaia','Juvenília','Ladainha','Lagamar','Lagoa da Prata','Lagoa dos Patos','Lagoa Dourada','Lagoa Formosa','Lagoa Grande','Lagoa Santa','Lajinha','Lambari','Lamim','Laranjal','Lassance','Lavras','Leandro Ferreira','Leme do Prado','Leopoldina','Liberdade','Lima Duarte','Limeira do Oeste','Lontra','Luisburgo','Luislândia','Luminárias','Luz','Machacalis','Machado','Madre de Deus de Minas','Malacacheta','Mamonas','Manga','Manhuaçu','Manhumirim','Mantena','Mar de Espanha','Maravilhas','Maria da Fé','Mariana','Marilac','Mário Campos','Maripá de Minas','Marliéria','Marmelópolis','Martinho Campos','Martins Soares','Mata Verde','Materlândia','Mateus Leme','Mathias Lobato','Matias Barbosa','Matias Cardoso','Matipó','Mato Verde','Matozinhos','Matutina','Medeiros','Medina','Mendes Pimentel','Mercês','Mesquita','Minas Novas','Minduri','Mirabela','Miradouro','Miraí','Miravânia','Moeda','Moema','Monjolos','Monsenhor Paulo','Montalvânia','Monte Alegre de Minas','Monte Azul','Monte Belo','Monte Carmelo','Monte Formoso','Monte Santo de Minas','Monte Sião','Montes Claros','Montezuma','Morada Nova de Minas','Morro da Garça','Morro do Pilar','Munhoz','Muriaé','Mutum','Muzambinho','Nacip Raydan','Nanuque','Naque','Natalândia','Natércia','Nazareno','Nepomuceno','Ninheira','Nova Belém','Nova Era','Nova Lima','Nova Módica','Nova Ponte','Nova Porteirinha','Nova Resende','Nova Serrana','Nova União','Novo Cruzeiro','Novo Oriente de Minas','Novorizonte','Olaria','Olhos-d\'Água','Olímpio Noronha','Oliveira','Oliveira Fortes','Onça de Pitangui','Oratórios','Orizânia','Ouro Branco','Ouro Fino','Ouro Preto','Ouro Verde de Minas','Padre Carvalho','Padre Paraíso','Pai Pedro','Paineiras','Pains','Paiva','Palma','Palmópolis','Papagaios','Pará de Minas','Paracatu','Paraguaçu','Paraisópolis','Paraopeba','Passa Quatro','Passa Tempo','Passa-Vinte','Passabém','Passos','Patis','Patos de Minas','Patrocínio','Patrocínio do Muriaé','Paula Cândido','Paulistas','Pavão','Peçanha','Pedra Azul','Pedra Bonita','Pedra do Anta','Pedra do Indaiá','Pedra Dourada','Pedralva','Pedras de Maria da Cruz','Pedrinópolis','Pedro Leopoldo','Pedro Teixeira','Pequeri','Pequi','Perdigão','Perdizes','Perdões','Periquito','Pescador','Piau','Piedade de Caratinga','Piedade de Ponte Nova','Piedade do Rio Grande','Piedade dos Gerais','Pimenta','Pingo-d\'Água','Pintópolis','Piracema','Pirajuba','Piranga','Piranguçu','Piranguinho','Pirapetinga','Pirapora','Piraúba','Pitangui','Piumhi','Planura','Poço Fundo','Poços de Caldas','Pocrane','Pompéu','Ponte Nova','Ponto Chique','Ponto dos Volantes','Porteirinha','Porto Firme','Poté','Pouso Alegre','Pouso Alto','Prados','Prata','Pratápolis','Pratinha','Presidente Bernardes','Presidente Juscelino','Presidente Kubitschek','Presidente Olegário','Prudente de Morais','Quartel Geral','Queluzito','Raposos','Raul Soares','Recreio','Reduto','Resende Costa','Resplendor','Ressaquinha','Riachinho','Riacho dos Machados','Ribeirão das Neves','Ribeirão Vermelho','Rio Acima','Rio Casca','Rio do Prado','Rio Doce','Rio Espera','Rio Manso','Rio Novo','Rio Paranaíba','Rio Pardo de Minas','Rio Piracicaba','Rio Pomba','Rio Preto','Rio Vermelho','Ritápolis','Rochedo de Minas','Rodeiro','Romaria','Rosário da Limeira','Rubelita','Rubim','Sabará','Sabinópolis','Sacramento','Salinas','Salto da Divisa','Santa Bárbara','Santa Bárbara do Leste','Santa Bárbara do Monte Verde','Santa Bárbara do Tugúrio','Santa Cruz de Minas','Santa Cruz de Salinas','Santa Cruz do Escalvado','Santa Efigênia de Minas','Santa Fé de Minas','Santa Helena de Minas','Santa Juliana','Santa Luzia','Santa Margarida','Santa Maria de Itabira','Santa Maria do Salto','Santa Maria do Suaçuí','Santa Rita de Caldas','Santa Rita de Ibitipoca','Santa Rita de Jacutinga','Santa Rita de Minas','Santa Rita do Itueto','Santa Rita do Sapucaí','Santa Rosa da Serra','Santa Santo Antônio do Grama','Santo Antônio do Itambé','Santo Antônio do Jacinto','Santo Antônio do Monte','Santo Antônio do Retiro','Santo Antônio do Rio Abaixo','Santo Hipólito','Santos Dumont','São Bento Abade','São Brás do Suaçuí','São Domingos das Dores','São Domingos do Prata',
         'São Félix de Minas','São Francisco','São Francisco de Paula','São Francisco de Sales','São Francisco do Glória','São Geraldo','São Geraldo da Piedade','São Geraldo do Baixio','São Gonçalo do Abaeté','São Gonçalo do Pará','São Gonçalo do Rio Abaixo','São Gonçalo do Rio Preto','São Gonçalo do Sapucaí','São Gotardo','São João Batista do Glória','São João da Lagoa','São João da Mata','São João da Ponte','São João das Missões','São João del Rei','São João do Manhuaçu','São João do Manteninha','São João do Oriente','São João do Pacuí','São João do Paraíso','São João Evangelista','São João Nepomuceno','São Joaquim de Bicas','São José da Barra','São José da Lapa','São José da Safira','São José da Varginha','São José do Alegre','São José do Divino','São José do Goiabal','São José do Jacuri','São José do Mantimento','São Lourenço','São Miguel do Anta','São Pedro da União','São Pedro do Suaçuí','São Pedro dos Ferros','São Romão','São Roque de Minas','São Sebastião da Bela Vista','São Sebastião da Vargem Alegre','São Sebastião do Anta','São Sebastião do Maranhão','São Sebastião do Oeste','São Sebastião do Paraíso','São Sebastião do Rio Preto','São Sebastião do Rio Verde','São Thomé das Letras','São Tiago','São Tomás de Aquino','São Vicente de Minas','Sapucaí-Mirim','Sardoá','Sarzedo','Sem-Peixe','Senador Amaral','Senador Cortes','Senador Firmino','Senador José Bento','Senador Modestino Gonçalves','Senhora de Oliveira','Senhora do Porto','Senhora dos Remédios','Sericita','Seritinga','Serra Azul de Minas','Serra da Saudade','Serra do Salitre','Serra dos Aimorés','Serrania','Serranópolis de Minas','Serranos','Serro','Sete Lagoas','Setubinha','Silveirânia','Silvianópolis','Simão Pereira','Simonésia','Sobrália','Soledade de Minas','Tabuleiro','Taiobeiras','Taparuba','Tapira','Tapiraí','Taquaraçu de Minas','Tarumirim','Teixeiras','Teófilo Otoni','Timóteo','Tiradentes','Tiros','Tocantins','Tocos do Moji','Toledo','Tombos','Três Corações','Três Marias','Três Pontas','Tumiritinga','Tupaciguara','Turmalina','Turvolândia','Ubá','Ubaí','Ubaporanga','Uberaba','Uberlândia','Umburatiba','Unaí','União de Minas','Uruana de Minas','Urucânia','Urucuia','Vargem Alegre','Vargem Bonita','Vargem Grande do Rio Pardo','Varginha','Varjão de Minas','Várzea da Palma','Varzelândia','Vazante','Verdelândia','Veredinha','Veríssimo','Vermelho Novo','Vespasiano','Viçosa','Vieiras','Virgem da Lapa','Virgínia','Virginópolis','Virgolândia','Visconde do Rio Branco','Volta Grande','Wenceslau Braz',
	
    ]
    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("source"), countries);
        autocomplete(document.getElementById("destiny"), countries);
    </script>
    



    

</body>
</html>
