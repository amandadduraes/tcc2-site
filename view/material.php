<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/materias.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
  <meta charset="utf-8" />
  <title>Vídeos</title>
</head>

<body>
  <?php
  include_once "menu.php";
  include_once "../model/Usuario.php";

  session_start();

  if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
  }

  $usuario = $_SESSION["user_perfil"];


  if ($usuario == 'professor') {
    navProfessor();
  } else {
    navAluno();
  }
  ?>
 <div class="container-principal">
    <div class="container-esquerda">
    </div>
    <div class="container-direita">
    
     

      <a href="./BoasPraticas.html">Lista de Boas Práticas de Programação Orientada a Objetos</a>
      <a href="./MasPraticas.html">Lista de Más Práticas de Programação Orientada a Objetos</a>
      <a href="./Sugestoes.html"> Sugestões sobre Programação Orientada a Objetos     </a>
        
      </div>
    </div>
  
 

</html>