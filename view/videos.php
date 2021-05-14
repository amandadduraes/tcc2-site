<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/videos.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
  <meta charset="utf-8" />
  <title>Vídeos</title>
</head>

<body>
  <?php
  include_once "menu.php";
  include_once "../model/Usuario.php";

  session_start();

  if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
  }

  $usuario = $_SESSION["user_perfil"];


  if ($usuario == 'professor') {
    navProfessor();
  } else {
    navAluno();
  }
  ?>
 <div class="container-principal">
    <div class="container-esquerda">
    </div>
    <div class="container-direita">
      <h1 class="text-info">Vídeos</h1>
      <div class="videos-list">
        <!-- Inserindo um vídeo-->
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px" src="https://www.youtube.com/embed/KlIL63MeyMY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info">O que é Programação Orientada a Objetos?</p>
        </div>
        <!--Finalizando a inserção do vídeo-->
        <!-- Inserindo um vídeo-->
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/Ucyx_QPfDng?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                          gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <p class="text-info">Instalando o JDK e NetBeans</p>
        </div>
        <!--Finalizando a inserção do vídeo-->
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/aR7CKNFECx0?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; 
                          encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <p class="text-info">O que é um Objeto?</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/wNaoX6VOj54?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media;
                          gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <p class="text-info">Criando Classes e Objetos em Java</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/jFI-qqitzwk?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info">O que é Visibilidade em um Objeto?</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/LV2243j4RTQ?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info">Configurando Visibilidade de Atributos e Métodos.</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/g2x9oyBFSco?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Métodos Especiais</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/6i-_R5cAcEc?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info">Métodos Getter, Setter e Construtor</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/1wYRGFXpVlg?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Pilares da POO: Encapsulamento</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/x4JfzV0Wb5w?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Encapsulamento</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/_PZldwo0vVo?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Herança (Parte 1)</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/19IGAeoFKlU?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Herança prática (Parte 1)</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/He887D2WGVw?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Herança (Parte 2)</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/5pwV2WdD-_Y?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Herança prática (Parte 2)</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/9-3-RMEMcq4?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Conceito Polimorfismo (Parte 1)</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/NctjqlfKC0U?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info"> Polimorfismo em Java (Parte 1)</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/hYek1xqWzgs?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info">Conceito Polimorfismo (Parte 1)</p>
        </div>
        <div class="small-img-row">
          <div class="small-img">
            <iframe width="200px" height="200px"
              src="https://www.youtube.com/embed/b7xGYh3NHZU?list=PLHz_AreHm4dkqe2aR0tQK74m8SFe-aGsY" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <p class="text-info">Polimorfismo em Java (Parte 2)</p>
        </div>
      </div>
    </div>
  </div>
 

</html>