<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Rendimento</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" type="text/css" href="../assets/css/rendimento.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.tablesorter.min.js"></script>
  <script src="../assets/js/rendimento.js"></script>

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

  <div id="wrapper">
    <input type="hidden" id="turmaCodigo" value="<?php echo $_GET["turmaCodigo"]; ?>">
    <h1 id="title"></h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th><span>Aluno</span></th>
          <!-- append -->
        </tr>
      </thead>
      <tbody>
        <!-- append -->
      </tbody>
    </table>
  </div>
</body>

</html>