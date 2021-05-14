
<html>
   <head>   
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/cadastro.css">
      <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="../assets/js/buscaTurma.js"></script>

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
      <div class="container-cadastro">
         <div class="signup-more">
            <img src="../assets/img/turmas.svg" alt="">
         </div>
         <div class="wrap-signup">
            <form id="formId" class="signup-form" name="cadastro">
               <span class="signup-form-title">Turmas</span>
               <div class="wrap-input">
                  <span class="label-iput">Código</span>
                  <input type="text" class="input" name="codigo" placeholder="Código da Turma"  id="codigo" required>
                  <span class="focus-input"></span>
               </div>
               <div class="wrap-input">
                  <span class="label-input">Senha</span>
                  <input type="password" class="input" name="senha" placeholder="Senha"  id="senha" required>
                  <span class="focus-input"></span>
               </div>
               <input id="pesquisar" type="submit" class="btn" value="Cadastrar na Turma">
               <a href="./login.html" class="link-to-login"> Já é cadastrado? Clique aqui para fazer login.</a>
            </form>
         </div>
      </div>
   </body>
</html>