<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" type="text/css" href="../assets/css/teorica.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta charset="utf-8"/>

        <title>Atividades Práticas</title>
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
                      <h1>Atividades Práticas</h1>
                      <p>De acordo com o aprendizado em sala de aula nesta seção o aluno deverá
                          aplicar todo o conhecimento adquirido em diversas atividades teóricas relacionadas ao Paradigma de Orientação a Objetos.
                      </p>
                  </div>
              </div>
             <div class="events">
                  <ul>
                      <li>
                          <div class="time">
                              <h2>  <br> <span> 1</span></h2>
                          </div>
                          <div class="details">
                            <h3>Atividade 1</h3>
                            <p>este vídeo ira detalha um pouco sobre o que e objeto pra que serve qual a sua finalidade</p>
                            <a href="#">Detalhes</a>
                          </div>
                          
                      </li>
                      <li>
                        <div class="time">
                            <h2>  <span> 2 </span></h2>
                        </div>
                        <div class="details">
                          <h3>Atividade 2</h3>
                          <p>ISTO É UM EXEMPLO</p>
                          <a href="#">Detalhes</a>
                        </div>
                        
                    </li>
                    <li>
                      <div class="time">
                          <h2>  <span> 3</span></h2>
                      </div>
                      <div class="details">
                        <h3>Atividade 3</h3>
                        <p>ISTO É UM EXEMPLO</p>
                        <a href="#">Detalhes</a>
                      </div>
                     
                  </li>
                  
                  </ul>
                </div>
          </section>

    </body>
</html>