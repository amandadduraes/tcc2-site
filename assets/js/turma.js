const user_email = localStorage.getItem("user_email");

$(document).ready(function () {
    $.get("../controller/TurmaController.php", {"findByProfessorEmail": user_email}, function(data, response) {
        var turmas = response == "success" && JSON.parse(data) ? JSON.parse(data) : false

        if (turmas) {
            carregarTurmasNaTela(turmas)
        }
    });

    $('#cadastrar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        var senha = $("#senha").val();
        var codigo = $("#codigo").val();
        

        if(senha.length < 5) {
           alert("O campo senha deve conter no mínimo 5 caracteres!")
           return;
        }

        $.ajax({
           type: "POST",
           url: "../controller/TurmaController.php",
           data: {
              save: 1,
              nome,
              senha,
              codigo
              
           }, 
           success: function(data) {
              var value=JSON.parse(data);
              if (value.error)
              {
                 alert("Turma já cadastrado!")
                 return
              }
              alert(
                 data 
                    ? "Turma cadastrada com sucesso!"
                    : "Erro ao realizar cadastro!"
              )

              //location.href="./turmas.php"
           },
           error: function (data) {
              alert("Erro inesperado, tente novamente!")
              console.log(data)
           }
        })
      })
});

function carregarTurmasNaTela(turmas) {
    var turmasDiv = $("#turmas-div")

    turmas.forEach(turma => {
        let data = moment(turma.criado_em).format("DD/MM/YYYY");

        turmasDiv.append(`
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fa fa-users" aria-hidden="true"></i><br>
                    <small>${turma.nome}</small> <br><br>
                </div>
                <div>
                    <span style="font-size: 14px;">Criado em: ${data}</span>
                </div>
            </div>
        `)
    });
}