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
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/turma.js"></script>

   

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
     
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Cadastrar Nova Turma</h2>
            </div>
            <div class="modal-body">
                <form  id="cadastrar" name="cadastrar"> 
                    <div class="input-div w50 pr8">
                        <div class="i">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <div>
                            <h5>Nome: </h5>
                            <input  id="nome" type="text" name ="nome" class="input" placeholder="Nome" required maxlength="128">
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
                    </div>
                    <div class="button-div">
                    <button class="custom-btn" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <img src="../assets/img/education.svg" alt="" class="wave"> -->


   <!-- <div class="menu-wrap">
        <input type="checkbox" class="toggler">
        <div class="hamburger">
          <div></div>
        </div>
        <div class="menu">
          <div>
            <div>
              <ul>
                <li><a href="../index.html">Início</a></li>
                <li><a href="./videos.html">Vídeos</a></li>
                <li><a href="./atividades.html">Atividades Teóricas</a></li>
                <li><a href="./praticas.html">Atividades Práticas</a></li>
                <li><a href="#">Rendimento</a></li>
                <li><a href="./mais.html">Mais</a></li>
              </ul>
            </div>
          </div>
        </div>
    </div> -->

    <div class="menuAluno"></div>

	<div id="turmas-div" class="main-section">
		<!-- <div class="dashbord">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Turma 1</small> <br><br>
			</div>
			<div class="detail-section">
				<a href="#">Mais informações </a>
			</div>
		</div>
		<div class="dashbord dashbord-green">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Turma 2</small> <br><br>
			</div>
			<div class="detail-section">
				<a href="#">Mais informações </a>
			</div>
		</div>
		<div class="dashbord dashbord-orange">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Estrutura de Dados 1 (2020)</small> <br><br>
			</div>
			<div class="detail-section">
				<a href="#">Mais informações </a>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Turma 4</small> <br><br>
			</div>
			<div class="detail-section">
				<a href="#">Mais informações </a>
			</div>
		</div>
		<div class="dashbord dashbord-red">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Turma 5</small> <br><br>
			</div>
			<div class="detail-section">
				<a href="#">Mais informações</a>
			</div>
		</div>
		<div class="dashbord dashbord-skyblue">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Turma 6</small> <br><br>
			</div>
			<div class="detail-section">
				<a href="#">Mais informações</a>
			</div>
        </div> -->
    </div>
    
    <div class="centralizar">
        <button id="myBtn" class="custom-btn">Nova Turma</button>
    </div>
   

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
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