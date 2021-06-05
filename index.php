<?php

session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Tela inicial</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>

  <div class="container">
    <div class="content">
      <h2>Aprendendo Orientação a Objetos</h2>
      <p>O nosso objetivo é apoiar estudantes de Programação Orientada
        a Objetos no aprendizado dos conceitos e práticas deste paradigma. Venha aprender com a gente!"</p>
      <a href="./view/cadastro.php" class="btn">Cadastro</a>
      <a href="view/login.php" class="btn">Login</a>
      
      <a href = "./view/Ajuda.html" class="btn"><i class="fa fa-question-circle" aria-hidden="true" title="Ajuda"></i></a> 
    </div>
  </div>
</body>

</html>