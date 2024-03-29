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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../assets/css/perguntas.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">

    <script>
        let questions = [];

        function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };

        $(document).ready(function () {
            const atividadeId = getUrlParameter('ativ')
            $("#hiddenAtividadeId").val(atividadeId)

            if(!atividadeId) {
                alert('Erro ao encontrar atividade!')
                return;
            }
            
            $.ajax({
                url: '../controller/QuestaoController.php',
                type: 'GET',
                data: {
                    getByAtividadeId: atividadeId,
                },
                success: function(data) {
                    const questoes = JSON.parse(data);
                    const parsed = questoes.map((q, i) => ({
                        numb: i+1,
                        question: q.descricao,
                        answer: q.alternativas.find((a) => a.id === q.alternativa_correta_id).descricao,
                        options: q.alternativas.map((a) => a.descricao)
                    }));
                    questions = parsed;
                }
            });


            $("#iniciarQuiz").click(function() {
                $.ajax({
                    url: "../controller/UsuarioHasAtividadeController.php",
                    method: "POST",
                    data: {
                        save: 1,
                        atividadeId
                    },
                    success: function(data) {
                        if(data && JSON.parse(data)) {
                            const response = JSON.parse(data)

                            if(!response.res) {
                                console.log("Erro! Tente novamente mais tarde!")
                            }
                        }
                        else {
                            console.log("Tente novamente mais tarde!")
                        }
                    }
                })
            });
        });
    </script>
</head>
<body>
    <input type="hidden" id="hiddenAtividadeId">
  <img src="../assets/img/question.svg" alt="" class="wave">
    <!-- start Quiz button -->
    <div class="centralizar">
        <div class="start_btn">
            <button>Iniciar Quiz!</button>
        </div>
    </div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Intruções e Regras</span></div>
        <div class="info-list">
            <div class="info">1. O aluno terá <span>80 segundos</span> para cada questão.</div>
            <div class="info">2. Uma vez que a resposta for selecionada, não é possível desfazer.</div>
            <div class="info">3. Quando o tempo esgotar não será  possível selecionar nenhuma resposta.</div>
            <div class="info">4. Você poderá sair do quiz clicando no botão sair.</div>
            <div class="info">5. Ao finalizar o rendimento do aluno será exibido.</div>
        </div>
        <div class="buttons">
            <button class="quit">Cancelar</button>
            <button id="iniciarQuiz" class="restart">Continuar</button>
        </div>
    </div>

    <body>
        <?php
      
      
        if ($usuario == 'professor') {
          navProfessor();
        } else {
          navAluno();
        }
        ?>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title"></div>
            <div class="timer">
                <div class="time_left_txt">Tempo</div>
                <div class="timer_sec">80</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Próxima</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">Você completou o Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <!-- <button class="restart">Replay Quiz</button> -->
            <button class="quit">Tentar Novamente</button>
        </div>
    </div>

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
     <script src="../assets/js/perguntas.js"></script>
</body>
</html>

