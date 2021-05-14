<?php
function navAluno(){
    echo ' <div class="menu-wrap">
    <input type="checkbox" class="toggler">
    <div class="hamburger">
      <div></div>
    </div>
    <div class="menu">
      <div>
        <div>
          <ul>
            <li><a href="../index.php">Inicío</a></li>
            <li><a href="./videos.php">Vídeos</a></li>
            <li><a href="./atividades.php">Atividades Teóricas</a></li>
            <li><a href="./praticas.php">Atividades Práticas</a></li>
            <li><a href="./turmas.php">Turmas</a></li>
            <li><a href="./editaPerfil.php">Editar Perfil</a></li> 
            <li><a href="./mais.php">Mais</a></li>
            <li><a href="./ranking.php">Ranking</a></li>
            <li><a class="nav-link" href="../controller/UsuarioController.php?deslogar=1"> Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>';
}
function navProfessor(){
   echo ' <div class="menu-wrap">
  <input type="checkbox" class="toggler">
  <div class="hamburger">
    <div></div>
  </div>
  <div class="menu">
    <div>
      <div>
        <ul>
          <li><a href="../index.php">Inicío</a></li>
          <li><a href="./videos.php">Vídeos</a></li>
          <li><a href="./atividades.php">Atividades Teóricas</a></li>
          <li><a href="./praticas.php">Atividades Práticas</a></li>
          <li><a href="./rendimento.php">Rendimento</a></li> 
          <li><a href="./turmas.php">Turmas</a></li> 
          <li><a href="./mais.php">Mais</a></li>
          <li><a href="./editaPerfil.php">Editar Perfil</a></li>
          <li><a class="nav-link" href="../controller/UsuarioController.php?deslogar=1"> Sair</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>';
}
?>