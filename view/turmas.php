<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf8">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/turmas.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
      <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css"> -->
      <script src="https://kit.fontawesome.com/a81368914c.js"></script>
      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/turmas.js"></script>
   </head>
   <body>
      <?php
         include_once "menu.php";
         include_once "../model/Usuario.php";
         session_start();
         
         if (!isset($_SESSION["user"])) {
             header("Location: ../index.php");
         }
         
         $perfil = $_SESSION["user_perfil"];
         
         if($perfil == 'professor'){
             navProfessor();
         }
         else {
             navAluno();
         }
         ?>
      <div id="myModal" class="modal">
         <!-- Modal professor -->
         <div class="modal-content">
            <div class="modal-header">
               <h2><?php if($perfil == 'professor') echo "Cadastrar nova Turma"; else echo "Vincular-se a uma Turma";?> </h2>
               <span class="close">&times;</span>
            </div>
            <div class="modal-body">
               <?php
                  if($perfil == 'professor') {
                    ?>
               <form id="formProfessor">
                  <div class="wrap-input">
                      <span class="label-iput">Nome</span>
                      <input type="text" class="input" name="nome" placeholder="Nome da Turma" id="nome" required>
                      <span class="focus-input"></span>
                  </div>
                  <div class="wrap-input">
                      <span class="label-iput">Código</span>
                      <input type="text" class="input" name="codigo" placeholder="Código da Turma" id="codigo" required>
                      <span class="focus-input"></span>
                  </div>
                  <div class="wrap-input">
                      <span class="label-iput">Senha</span>
                      <input type="password" class="input" name="senha" placeholder="Senha da Turma" id="senha" required>
                      <span class="focus-input"></span>
                  </div>
                  <!-- <div class="input-div w50 pr8">
                     <div class="i">
                        <i class="fas fa-pencil-alt"></i>
                     </div>
                     <div>
                        <h5>Nome: </h5>
                        <input id="nome" type="text" name="nome" class="input" placeholder="Nome" required maxlength="128">
                     </div>
                  </div>
                  <div class="passwords">
                     <div class="input-div w50 pr8">
                        <div class="i">
                           <i class="fas fa-lock"></i>
                        </div>
                        <div>
                           <h5>Senha</h5>
                           <input type="password" name="senha" class="input" placeholder="Senha" id="senha" required maxlength="256">
                        </div>
                     </div>
                  </div>
                  <div class="codigo">
                     <div class="input-div w50 pr8">
                        <div class="i">
                           <i class="fas fa-pencil-alt"></i>
                        </div>
                        <div>
                           <h5>Código da Turma</h5>
                           <input type="input" name="codigo" class="input" placeholder="Código da Turma" id="codigo" required maxlength="64">
                        </div>
                     </div>
                  </div> -->
                  <button class="custom-btn" type="submit">Cadastrar</button>
               </form>
               <?php
                  }
                  else {
                    ?>
               <form id="formAluno">
                  <div class="wrap-input w-50">
                     <span class="label-iput">Código</span>
                     <input type="text" class="input" name="codigo" placeholder="Código da Turma"  id="codigo" required>
                     <span class="focus-input"></span>
                  </div>
                  <div class="wrap-input">
                     <span class="label-input">Senha</span>
                     <input type="password" class="input" name="senha" placeholder="Senha"  id="senha" required>
                     <span class="focus-input"></span>
                  </div>
                  <button class="custom-btn" type="submit" style="height: auto; font-size: 1rem;">Cadastrar</button>
               </form>
               <?php
                  }
                  ?>
            </div>
         </div>
      </div>
      <div id="turmas-div" class="main-section">
         <!-- Append pelo JS -->
      </div>
      <div class="button-div">
         <button id="myBtn" class="custom-btn">Nova Turma</button>
      </div>

      <script>
         // Get the modal
         var modal = document.getElementById("myModal");
         console.log(modal)
         
         // Get the button that opens the modal
         var btn = document.getElementById("myBtn");
         
         // Get the <span> element that closes the modal
         var span = document.getElementsByClassName("close")[0];
         
         // When the user clicks the button, open the modal 
         btn.onclick = function() {
             modal.style.display = "block";
         }
         
         // When the user clicks on <span> (x), close the modal
         span.onclick = function() {
             modal.style.display = "none";
         }
         
         // When the user clicks anywhere outside of the modal, close it
         window.onclick = function(event) {
             if (event.target == modal) {
                 modal.style.display = "none";
             }
         }
      </script>
   </body>
</html>