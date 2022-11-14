<?php
session_start();
if(!$_SESSION['id_persona']) {
    header("location: index.php");
}