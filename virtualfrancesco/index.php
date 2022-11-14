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
    <title>Find Me</title>
    <link rel="stylesheet" href="./bootstrap-italia/css/bootstrap-italia.min.css">
    <script src="./bootstrap-italia/js/bootstrap-italia.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username o numero di telefono">
                                        </div>
                                        <div class="form-group">

                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <?php
                                            session_start();
                                            if(isset($_SESSION['message'])){
                                                echo "<label class='text-danger'>".$_SESSION['message']."</label>";
                                            }
                                        ?>
                                        <button type="submit" class="btn btn-primary btn-success btn-block" id="accedi" name="accedi">Accedi</button>
                                    <form method="post" action="registrazione.php" class="mt-3">
                                        <button type="submit" class="btn btn-secondary btn-light btn-block" id="registrazione" name="registrazione">Crea account</button>
                                    </form>
                                </div>
                                <script>
                                    $('#accedi').click(function (e){
                                        var username = $('#username').val();
                                        var password = $('#password').val();
                                        $.ajax({
                                            type: "POST",
                                            url: "login.php",
                                            data:{
                                                username: username,
                                                password: password
                                            },
                                            dataType: "json",
                                            success:function (data){
                                                window.location='home.php';
                                            },
                                            error: function (xhr){
                                                console.error(xhr);
                                            }
                                        })
                                    })
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