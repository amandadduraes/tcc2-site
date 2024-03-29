<?php 
  include_once "menu.php";
  include_once "../model/Usuario.php";
  
  session_start();

  if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
  }

  $usuario = $_SESSION["user_perfil"];
  
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <link rel="stylesheet" href="../assets/css/teorica.css">
      <link rel="stylesheet" href="../assets/css/main1.css">
      <title>Atividades</title>
      
      <script src="../assets/js/jquery.min.js"></script>
      <script>
        $(document).ready(function () {
          $.ajax({
            url: "../controller/AtividadeController.php",
            type: "GET",
            data: {
              getByTurmaCodigo: 'poo1',
            },
            success: function (data) {
              const atividades = JSON.parse(data)
              atividades.forEach(({ id, descricao }, i) => {
                $(".events ul").append(`
                  <li>
                    <div class="time">
                        <h2>  <br> <span>${i + 1}</span></h2>
                    </div>
                    <div class="details">
                      <h3>${descricao}</h3>
                      <a href="./perguntas.php?ativ=${id}">Iniciar Quiz</a>
                    </div>
                  </li>
                `)
              });
            }
          })
        });
      </script>
    </head>
    <body>
        
<?php
if($usuario == 'professor'){
    navProfessor();
}else{
    navAluno();
}
?>
          <section>
              <div class="leftBox">
                  <div class="content">
                      <h1>Atividades</h1>
                      <p>De acordo com o aprendizado em sala de aula nesta seção o aluno deverá
                          aplicar todo o conhecimento adquirido em diversas atividades 
                          relacionadas ao Paradigma de Orientação a Objetos.
                      </p>
                  </div>  
              </div>
              <div class="events">
                <ul></ul>
              </div>
          </section>  

    </body>
</html>