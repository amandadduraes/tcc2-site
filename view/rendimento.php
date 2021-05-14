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
    <h1>Rendimento dos alunos </h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th><span>Aluno</span></th>
          <th><span>Atividade 1</span></th>
          <th><span>Atividade 2</span></th>
          <th><span>Atividade 3</span></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Amanda</td>
          <td>10</td>
          <td>5</td>
          <td>5</td>
        </tr>
        <tr>
          <td>César</td>
          <td>6</td>
          <td>7</td>
          <td>8</td>
        </tr>
        <tr>
          <td>João</td>
          <td>1</td>
          <td>2</td>
          <td>10</td>
        </tr>
        
      </tbody>
    </table>
  </div>
</body>

</html>