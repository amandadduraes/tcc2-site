<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php  
include_once "../model/Usuario.php";
session_start();
if(!isset($_SESSION["user"])){
  header("Location: ../index.php");
}

$usuario = $_SESSION["user"];

/*if($usuario->perfil == 'professor'){
  navProfessor();
}else{
  navAluno();
}*/
?> 
</body>
</html>