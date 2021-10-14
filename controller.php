<?php
    session_start();
    include "header.php";
    include "conexion.php";
    $anuncio="";
    $username=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    
   if(((new Conexion())->auth($username, $password))[0]==1){
    
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location:lab.php");
    }else{
        $anuncio="Contraseña o usuario incorrectos";
        setcookie("anuncio", $anuncio);
        header("Location:login.php");
    }
    
?>