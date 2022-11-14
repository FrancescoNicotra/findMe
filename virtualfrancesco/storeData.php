<?php
require_once "class.php";
    if(isset($_REQUEST)) {
        $db = new db_class();
        $nome = $_REQUEST['nome'];
        $cognome = $_REQUEST['cognome'];
        $email = $_REQUEST['email'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $num_tel = $_REQUEST['numero_tel'];
        $db->add_user($nome, $cognome, $email, $username, $password, $num_tel);
        $userData = [
            'nome'=>$nome,
            'cognome'=>$cognome,
            'email'=>$email,
            'username'=>$username,
            'password'=>$password,
            'numero_tel'=>$num_tel
        ];

        echo $userJSONData = json_encode($userData);
    }