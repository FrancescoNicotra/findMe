<?php
require_once 'class.php';
session_start();
ini_set("display_errors",1);
error_reporting(E_ALL);
if(isset($_REQUEST)){
    $db = new db_class();
    if(isset($_REQUEST['username']))$username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $db->login($username,$password);
    $get_id = $db->login($username,$password);
    if($get_id['count']>0){
        $_SESSION['id_persona'] = $get_id['id_persona'];
        unset($_SESSION['message']);
        $Data = [
            'username'=>$username,
            'password'=>$password
        ];
        echo $JSONData = json_encode($Data);
    }
    else{
        $_SESSION['message'] = "Username o password non validi";
    }

}