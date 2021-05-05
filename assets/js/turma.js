const user_email = localStorage.getItem("user_email");

$(document).ready(function () {
    $.get("../controller/TurmaController.php", {"findByProfessorEmail": user_email}, function(data, response) {
        var turmas = response == "success" && JSON.parse(data) ? JSON.parse(data) : false

        if (turmas) {
            carregarTurmasNaTela(turmas)
        }
    });
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