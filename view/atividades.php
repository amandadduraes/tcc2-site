<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <link rel="stylesheet" type="text/css" href="../assets/css/teorica.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      

        <script src="../assets/js/jquery.min.js"></script>
        <script>
          $(document).ready(function () {
            $.ajax({
              url: "../controller/AtividadeController.php",
              type: "GET",
              data: {
                getByTurmaCodigo: 123,
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
                        <a href="./perguntas.html?ativ=${id}">Iniciar Quiz</a>
                      </div>
                    </li>
                  `)
                });
              }
            })
          });
        </script>

        <title>Atividades Teóricas</title>
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

         

          <section>
              <div class="leftBox">
                  <div class="content">
                      <h1>Atividades Teóricas</h1>
                      <p>De acordo com o aprendizado em sala de aula nesta seção o aluno deverá
                          aplicar todo o conhecimento adquirido em diversas atividades teóricas 
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