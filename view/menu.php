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
            <li><a href="../index.php">Início</a></li>
            <li><a href="./videos.php">Vídeos</a></li>
            <li><a href="./atividades.php">Atividades</a></li>
            <li><a href="./turmas.php">Turmas</a></li>
            <li><a href="./editaPerfil.php">Editar Perfil</a></li> 
            <li><a href="./buscaTurma.php">Buscar Turmas</a></li>
            <li><a href="./material.php">Material Complementar</a></li>
            <li><a href="./mais.php">Mais</a></li>
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
        <li><a href="../index.php">Início</a></li>
        <li><a href="./videos.php">Vídeos</a></li>
        <li><a href="./atividades.php">Atividades</a></li>
        <li><a href="./turmas.php">Turmas</a></li>
        <li><a href="./editaPerfil.php">Editar Perfil</a></li> 
        <li><a href="./material.php">Material Complementar</a></li>
        <li><a href="./mais.php">Mais</a></li>
        <li><a class="nav-link" href="../controller/UsuarioController.php?deslogar=1"> Sair</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>';
}
?>