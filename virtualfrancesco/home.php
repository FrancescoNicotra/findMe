<?php
require_once 'class.php';
require_once 'session.php';
$db = new db_class();
?>
<script>
    window.__PUBLIC_PATH__ = '/bootstrap-italia/fonts'
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agostino</title>
    <link rel="stylesheet" href="./bootstrap-italia/css/bootstrap-italia.min.css">
    <script src="./bootstrap-italia/js/bootstrap-italia.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="verifica_campi.js"></script>
</head>
<body>
<div class="it-header-center-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="it-header-center-content-wrapper">
                    <div class="it-brand-wrapper">
                        <a href="#">
                            <svg class="icon" aria-hidden="true">
                                <img src="620851.png" width="80px"height="80px" style="filter: invert(100%)">
                            </svg>
                            <div class="it-brand-text">
                                <div class="it-brand-title">Agostino</div>
                            </div>
                        </a>
                    </div>
                    <div class="it-right-zone">
                        <div class="it-socials d-none d-md-flex">
                            <span>Seguici su</span>
                            <ul>
                                <li>
                                    <a href="#" aria-label="Facebook" target="_blank">
                                        <svg class="icon">
                                            <use href="/bootstrap-italia/svg/sprites.svg#it-facebook"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" aria-label="Github" target="_blank">
                                        <svg class="icon">
                                            <use href="/bootstrap-italia/svg/sprites.svg#it-github"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" aria-label="Twitter" target="_blank">
                                        <svg class="icon">
                                            <use href="/bootstrap-italia/svg/sprites.svg#it-twitter"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="mb-3 p-4 d-flex">
    <div class="p-2 bd-highlight">
    <button type="button" class="btn btn-primary btn-success btn-block" name="aggiungi" id="aggiungi" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg class="icon">
            <use href="/bootstrap-italia/svg/sprites.svg#it-plus"></use>
        </svg>Aggiungi oggetto</button>
    </div>

    <div class="p-2 bd-highlight">
        <button type="button" class="btn btn-warning btn-primary btn-block modifica" name="modifica" id="modifica" data-bs-toggle="modal" data-bs-target="#modal" aria-haspopup="true" aria-expanded="false">
        <svg class="icon"><use href="/bootstrap-italia/svg/sprites.svg#it-tool"></use></svg>Modifica oggetto
    </button>
    </div>
    <div class="p-2 bd-highlight">
    <button type="button" class="btn btn-danger btn-primary btn-block cancella" id="cancella" name="cancella" data-bs-toggle="modal" data-bs-target="#modal" aria-haspopup="true" aria-expanded="false">
        <svg class="icon"><use href="/bootstrap-italia/svg/sprites.svg#it-delete"></use></svg>Cancella oggetto
    </button>
    </div>
    <div class="ms-auto p-2 form-group">
        <input type="text" name="ricerca" id="ricerca" placeholder="Cerca...">
    </div>
    <div class="p-2 bd-highlight">
    <button type="button" class="btn"name="btn-ricerca" id="btn-ricerca">
        <svg class="icon"><use href="/bootstrap-italia/svg/sprites.svg#it-search"></use></svg>
    </button>
    </div>
    <div class="p-2 bd-highlight">
        <button type="button" class="btn"name="btn-logout" id="btn-logout">
            <svg class="icon"><use href="/bootstrap-italia/svg/sprites.svg#it-close-circle"></use></svg>LOGOUT
        </button>
    </div>
</div>
<div class="it-example-modal">
    <div class="modal" tabindex="-1" role="dialog" id="exampleModal" aria-labelledby="modal4Title">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title h5 " id="modal4Title">Inserisci l'oggetto</h2>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Chiudi finestra modale">
                        <svg class="icon">
                            <use href="/bootstrap-italia/svg/sprites.svg#it-close"></use>
                        </svg>
                    </button>
                </div>
                <div class="modal-body" id="campi-obbligatori">
                    <div class="form-group">
                        <input type="text" name="nome_oggetto" id="nome_oggetto" placeholder="Fai la tua richiesta">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nome_oggetto_cercato" id="nome_oggetto_cercato" hidden>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nome_oggetto_manuale" id="nome_oggetto_manuale" placeholder="Inserisci il nome dell'oggetto" hidden>
                    </div>
                    <div class="form-group">
                        <input type="text" name="oggetto" id="oggetto" placeholder="Inserisci l'oggetto" hidden>
                    </div>
                    <div class="form-group">
                        <input type="datetime-local" name="data_deposito" id="data_deposito" placeholder="Data rilascio" hidden>
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobile" id="mobile" placeholder="Mobile (Es. Cassetto cucina)" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" type="button" name="invia" id="invia" >Invia</button>
                    <button class="btn btn-primary btn-sm" type="button" name="invia2" id="invia2" hidden>Invia</button>
                    <button class="btn btn-primary btn-sm" type="button" name="invia3" id="invia3" hidden>Invia</button>
                    <button class="btn btn-primary btn-sm" type="button" name="manuale" id="manuale">Inserisci manualmente</button>
                </div>

            </div>
        </div>
    </div>
</div>

    <div class="it-example-modal">
        <div class="modal" tabindex="-1" role="dialog" id="modal" aria-labelledby="modal4Title">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title h5 " id="modal4Title">Scegli una opzione</h2>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Chiudi finestra modale">
                            <svg class="icon">
                                <use href="/bootstrap-italia/svg/sprites.svg#it-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" id="modifcaElemento">
                            <input type="text" name="cercaElemento" id="cercaElemento" placeholder="Quale oggetto vuoi modifcare?">
                            <div id="risultati"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nome_oggetto_modifica" id="nome_oggetto_modifica" placeholder="Nome oggetto">
                        </div>
                        <div class="form-group">
                            <input type="datetime-local" name="data_deposito_modifica" id="data_deposito_modifica" placeholder="Data rilascio">
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile_modifica" id="mobile_modifica" placeholder="Mobile (Es. Cassetto cucina)">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm btn-warning" type="button" name="inviaModifica" id="inviaModifica" value="Modifica"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="d-flex justify-content-between" id="risultati-ricerca-mobile"></div>


<div class="d-flex justify-content-between">
<table class="table" id="data-table">
    <thead>
    <tr>
        <th scope="col" >Nome oggetto</th>
        <th scope="col">Data deposito</th>
    </tr>
    </thead>
    <tbody>
        <?php

            $tbl_user = $db->display_object($_SESSION['id_persona']);
            //$count = 1;
            while($fetch=$tbl_user->fetch_array()){
                //while($fetch2=$tbl_mobile->fetch_array()){
                    $id_oggetto = $fetch['id_oggetto'];
                    $nome_oggetto = $fetch['nome_oggetto'];
                    $data_deposito = $fetch['data_deposito'];
                    //$nome_mobile = $fetch2['nome_mobile'];

        ?>
        <tr>
            <td><?php echo $nome_oggetto?></td>
            <td><?php echo $data_deposito?></td>
        </tr>
            <?php
            }
            ?>
    </tbody>
</table>
<table class="table" id="data-table-mobile">
    <thead>
    <tr>
        <th scope="col">Mobile</th>
    </tr>
    </thead>
    <tbody id="tabella_intera">
        <?php
        $tbl_mobile = $db->display_mobile($_SESSION['id_persona']);
            while($fetch2=$tbl_mobile->fetch_array()){
                $nome_mobile = $fetch2['nome_mobile'];
            ?>
        <tr>
            <td><?php echo $nome_mobile?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
<div id="risultati-ricerca-oggetti"></div>
<div class="d-flex align-items-end flex-row-reverse">
    <button type="button" hidden name="btn-indietro" id="btn-indietro" class="btn btn-primary"><svg class="icon"><use href="/bootstrap-italia/svg/sprites.svg#it-arrow-left "></use></svg>Indietro</button>
</div>



<script>
        $("#manuale").parent().on("click", "#manuale", function () {
            $("#data_deposito").prop("hidden", false);
            $("#mobile").prop("hidden", false);
            $("#nome_oggetto").prop("hidden",true);
            $("#nome_oggetto_manuale").prop("hidden",false);
            $("#manuale").attr('id', 'automatico').html('Automatico')
        });
        $("#manuale").parent().on("click", "#automatico", function () {
            $("#data_deposito").prop("hidden", true);
            $("#mobile").prop("hidden", true);
            $("#nome_oggetto").prop("hidden",false);
            $("#nome_oggetto_manuale").prop("hidden",true);
            $("#automatico").attr('id', 'manuale').html('Inserisci manualmente');
        });
        $("#invia").parent().on("click", "#invia", function () {
            //alert("LAPAZZA");
            var nome_oggetto = $("#nome_oggetto").val().toLowerCase();
            if(nome_oggetto.startsWith("agostino") === false && nome_oggetto!=='') alert("La frase deve cominciare con 'agostino'");
                //var mobile=null;
                //var data_deposito;
                //if ($('#data_deposito').val() !== '') data_deposito = $('#data_deposito').val();
                //console.log(data_deposito);
            else{
                if(nome_oggetto=='' && $("#nome_oggetto_cercato").val()!=='') nome_oggetto = $("#nome_oggetto_cercato").val();
                if ($("#mobile").val() !== '') mobile = $("#mobile").val().toLowerCase();
                //alert(nome_oggetto+data_deposito+mobile);
                $.ajax({
                    type: "POST",
                    url: "addObject.php",
                    data: {
                        nome_oggetto: nome_oggetto,
                        //data_deposito: data_deposito,
                        //mobile: mobile
                    },
                    dataType: 'JSON',

                    success: function (response) {
                        alert("oggetto inserito");
                        //window.location.reload();
                    },
                    error: function (xhr) {
                        console.error(xhr);

                        ajaxCall2();
                        //window.location.reload();
                    }
                })
            }

        })

    function ajaxCall2(){
        $("#mobile").prop("hidden",false);
        $("#mobile").prop("hidden",false);
        $("#invia2").prop("hidden",false);
        $("#invia").prop("hidden",true);
        $("#invia2").parent().on("click","#invia2",function (){
            var nome_oggetto = $("#nome_oggetto").val().toLowerCase();
            if(nome_oggetto=='' && $("#nome_oggetto_cercato").val()!=='') nome_oggetto = $("#nome_oggetto_cercato").val();
            //if ($('#data_deposito').val() !== '') data_deposito = $('#data_deposito').val();
            var mobile = $("#mobile").val().toLowerCase();
            if(mobile == '') alert("inserisci il nome del mobile");
            else{
                //alert("QUI DOVREI FARE LA CHIAMATA AJAX");
                $.ajax({
                    type: "POST",
                    url: "addObject.php",
                    data: {
                        nome_oggetto: nome_oggetto,

                        mobile: mobile
                    },
                    dataType: 'JSON',
                    //async: false,
                    success: function () {
                        alert("oggetto inserito");
                        //window.location.reload();
                    },
                    error: function (xhr) {
                        console.error(xhr);
                        alert("Ops... oggetto non trovato");
                        ajaxCall3();
                        //window.location.reload();
                    }
                })
            }
        })

    }
    function ajaxCall3(){
            alert("Non sono riuscito a capire l'oggetto, per favore inseriscilo manualmente");
            $("#invia2").prop("hidden",true);
            $("#invia3").prop("hidden",false);
            $("#oggetto").prop("hidden",false);
            $("#nome_oggetto").prop("hidden",true);
            $("#invia3").parent().on("click","#invia3",function (){
                var nome_oggetto = $("#oggetto").val().toLowerCase();
                //var data_deposito;
                //if ($('#data_deposito').val() !== '') data_deposito = $('#data_deposito').val();
                var mobile = $("#mobile").val().toLowerCase();
                if(mobile == '' && nome_oggetto==''){
                    alert("Riempi tutti i campi");
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "addObject.php",
                        data: {
                            nome_oggetto: nome_oggetto,
                            //data_deposito: data_deposito,
                            mobile: mobile
                        },
                        dataType: "JSON",
                        //async: false,
                        success: function (){
                            alert("Oggetto inserito correttamente");
                            //window.location.reload();
                        },
                        error: function (xhr){
                            console.error(xhr);
                            alert("errore durante l'inserimento dell'oggetto: oggetto già esistente ");
                            //window.location.reload();
                        }
                    })
                }
            })

    }
</script>


<script>
       $('#cancella').click(function(){
            $('#nome_oggetto_modifica').hide();
            $('#data_deposito_modifica').hide();
            $('#mobile_modifica').hide();
            $('#inviaModifica').removeClass('btn-warning').addClass('btn-danger').html("Elimina");
            $("#inviaModifica").click(function (){
               var oggettoCercato = $("#cercaElemento").val().toLowerCase();
               $.ajax({
                   type: "POST",
                   url: "deleteObject.php",
                   data: {nome_oggetto: oggettoCercato},
                   success: function (response){
                       //window.location.reload();
                   },
                   error: function (xhr){
                       console.error(xhr);
                   }
               })
           })
        })
       $('#modifica').click(function (){
           $('#nome_oggetto_modifica').show();
           $('#data_deposito_modifica').show();
           $('#mobile_modifica').show();
           $('#inviaModifica').removeClass('btn-danger').addClass('btn-warning').html("Modifica");
           $("#inviaModifica").click(function (){
               var nome_oggetto_cercato = $("#cercaElemento").val().toLowerCase();
               var nome_oggetto = $("#nome_oggetto_modifica").val().toLowerCase();
               var data_deposito = $("#data_deposito_modifica").val();
               var nome_mobile = $("#mobile_modifica").val().toLowerCase();
               $.ajax({
                   type: "POST",
                   url: "modifyObj.php",
                   data: {
                       nome_oggetto_cercato: nome_oggetto_cercato,
                       nome_oggetto: nome_oggetto,
                       data_deposito: data_deposito,
                       mobile: nome_mobile
                   },
                   dataType: "JSON",
                   success: function (){
                       alert("Oggetto modificato con successo")
                       //window.location.reload();
                   },
                   error: function (xhr){
                       console.error(xhr);
                   }
               });
           });
       })

</script>


<script>
    $("#btn-ricerca").click(function (){
        var ricerca = $("#ricerca").val().toLowerCase();
        if(ricerca===''){
            //window.location.reload();
        }
        else{
            $.ajax({
                type: "POST",
                url: "findObj.php",
                data: 'keyword='+ricerca,
                success: function (data){
                    //alert("Oggetti trovati");
                    $("#data-table").remove();
                    $("#data-table-mobile").remove();
                    $("#risultati-ricerca-oggetti").prop("hidden",false).show().html(data);
                    //$("#risultati-ricerca-mobile").show().html(data);
                    $("#btn-indietro").prop("hidden",false).click(function (){
                        //window.location.reload();
                    });
                },
                error: function (response){
                    //console.error();
                    alert("Nessun oggetto esistente");
                    //window.location.reload();
                }
            })
        }
    })
</script>


<script>
    $(document).ready(function (){
        $("#cercaElemento").keyup(function (){
            $.ajax({
                type: "POST",
                url: "searchObj.php",
                data: 'keyword='+$(this).val().toLowerCase(),
                beforeSend: function() {
                    $("#risultati").css("background", "#FFF url(._Iphone-spinner-2.gif) no-repeat 165px");
                },
                success: function (data){
                    $("#risultati").show().html(data);

                },
                error: function (xhr){
                    console.error(xhr);
                }
            });
        });
    })
    function selectObject(val){
        $("#cercaElemento").val(val);
        //console.log("LAPAZZA"+val);
        $("#risultati").hide();
    }
    $("#btn-logout").parent().on("click","#btn-logout",function (){
        $.ajax({
            type: "POST",
            url:"logout.php",
            success: function (response){
                //window.location.reload();
            }

        })
    })

</script>
</body>
</html>