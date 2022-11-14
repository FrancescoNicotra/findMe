<script>
    window.__PUBLIC_PATH__ = '/bootstrap-italia/fonts'
</script>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find Me</title>
    <link rel="stylesheet" href="./bootstrap-italia/css/bootstrap-italia.min.css">

    <script src="./bootstrap-italia/js/bootstrap-italia.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="verifica_psw.js"></script>
    <script src="verifica_num_tel.js"></script>
    <script src="verifica_email.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card overflow-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-color-blue mb-4">Accesso utenti</h1>
                                    </div>

                                        <div class="form-group">
                                            <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="cognome" class="form-control" name="cognome" placeholder="Cognome">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" value="" class="form-control" name="email" placeholder="Email" id="email">
                                            <div class="mb-5">
                                                <p id="result">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username o numero di telefono">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="firstPass" id="firstPass" placeholder="Nuova password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="secondPass" id="secondPass" placeholder="Conferma la password">
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="tel" id="num_tel" class="form-control" name="num_tel" value="" onkeyup=" return verificaNum(this.value);" placeholder="Inserisci il numero di telefono">
                                            </div>
                                            <div class="mb-5">
                                                <label for="formGroupExampleInput2" id="isInvalid" hidden>Numero di telefono non corretto</label>
                                                <label for="formGroupExampleInput2" id="isValid" hidden>Numero di telefono corretto</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-success btn-block" id="submit" name="accedi">Invia</button>
                                </div>
                                <script>
                                        $("#submit").click(function (e){
                                            var nome = $('#nome').val();
                                            var cognome = $('#cognome').val();
                                            var email = $('#email').val().toLowerCase();
                                            var username = $('#username').val().toLowerCase();
                                            var password = $('#secondPass').val();
                                            var num_tel = $('#num_tel').val();
                                            $.ajax({
                                                type: "POST",
                                                url: "storeData.php",
                                                data: {
                                                    nome: nome,
                                                    cognome: cognome,
                                                    email: email,
                                                    username: username,
                                                    password: password,
                                                    numero_tel: num_tel

                                                },
                                                dataType: "json",
                                                success: function (data){
                                                    window.location='home.php';
                                                },
                                                error: function (xhr){
                                                    console.error(xhr);
                                                }
                                            });
                                        });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>