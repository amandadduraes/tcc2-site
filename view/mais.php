<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contato</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/mais.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
        
        
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
  <?php
include_once "menu.php";
include_once "../model/Usuario.php";
session_start();


if(!isset($_SESSION["user"])){
    header("Location: ../index.php");
}

        $usuario = $_SESSION["user_perfil"];


if($usuario == 'professor'){
    navProfessor();
}else{
    navAluno();
}
?>
    
    <input type="hidden" name="success_url" value="./mais.php"/>
    <input type="hidden" name="error_url" value="./mais.php?err=1"/>

    <div class="container">
      <span class="big-circle"></span>
      <img src="../assets/img/corpo.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Sobre o Trabalho</h3>
          <p class="text">
           Trabalho desenvolvido pela aluna Amanda Durães juntamente com a professora Alessandra Paulino com o objetivo de ajudar alunos na disciplina
           de Paradigma de Orientação a Objetos, fazendo com que a evasão e reprovação sejam diminuídas.
          </p>

          <div class="info">
            <div class="information">
                <img src="../assets/img/ufu.png" class="icon" alt="" />
              <p>Universidade Federal de Uberlândia</p>
            </div>
            <div class="information">
              <img src="../assets/img/e-mail.png" class="icon" alt="" />
              <p>amandaduraes@ufu.br</p>
               
            </div>
            <div class="information">
                <img src="../assets/img/e-mail.png" class="icon" alt="" />
              <p>alessandra@ufu.br</p>
            </div>
          </div>

          
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="https://postmail.invotes.com/send" method="post" id="email_form" autocomplete="off">
            <h3 class="title">Contato</h3>
            <div class="input-container">
            <input type="text" class="input" name="subject" placeholder="Assunto" />
            </div>
            <div class="input-container">
            <input type="text" class="input" name="extra_phone_number" placeholder="Nome">
          </div>
          <div class="input-container">
            <textarea name="text" class="input" placeholder="Mensagem"></textarea>
            <span>Mensagem</span>
            </div>
            <input type="hidden"  name="access_token"  value="sg9863u4nixgjg1ic1kjn78v" />
      
          <input id="submit_form" type="submit" class="btn input" value="Enviar" />
    
          </form>
        </div>
      </div>
    </div>

    <script>
      var submitButton = document.getElementById("submit_form");
      var form = document.getElementById("email_form");
      form.addEventListener("submit", function (e) {
          setTimeout(function() {
              submitButton.value = "Enviando...";
              submitButton.disabled = true;
          }, 1);
      });
  </script>
  </body>
</html>