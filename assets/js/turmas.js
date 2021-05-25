const user_email = localStorage.getItem("user_email");

$(document).ready(function () {
    
    $('#turmas-div').on('click', '.atividade', function() {
        const codigo = $(this).parent().find(".hidden-turma-id").val();
        location.href = '../view/atividades.php?turmaCodigo=' + codigo;
    })

    $('#turmas-div').on('click', '.rendimento', function() {
        const codigo = $(this).parent().find(".hidden-turma-id").val();
        location.href = '../view/rendimento.php?turmaCodigo=' + codigo;
    })

    $('#turmas-div').on('click', '.excluir', function() {
        if (confirm("Realmente deseja excluir a turma?")){
            const element = $(this);
            const codigoTurma = element.parent().find(".hidden-turma-id").val();

            $.ajax({
                url: "../controller/UsuarioHasTurmaController.php",
                method: "POST", 
                data: {
                    deleteByCodigoTurma: 1,
                    codigoTurma
                },
                success: function(data){
                    const response = JSON.parse(data);
                    if(response.res){
                       // $(this).parent().parent().remove();
                        alert("Turma excluída com sucesso!")
                        element.parent().parent().remove();
                    }else{
                        alert("Erro ao efetuar a operação!")
                    }
                }
            })
        }
    })

    $.get("../controller/TurmaController.php", {"findByEmail": user_email}, function(data, response) {
        var turmas = response == "success" && JSON.parse(data) ? JSON.parse(data) : false

        if (turmas) {
            carregarTurmasNaTela(turmas)
        }
    });

    $('#formProfessor').submit(function(e) {
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
                var value = JSON.parse(data);
                if (value.error) {
                    alert("Turma já cadastrado!")
                    return
                }
                alert(data 
                        ? "Turma cadastrada com sucesso!"
                        : "Erro ao realizar cadastro!"
                )

                window.location.reload();
           },
           error: function (data) {
              alert("Erro inesperado, tente novamente!")
           }
        })
      })

    $("#formAluno").submit(function(e) {
        e.preventDefault()
        const codigo = $("#codigo").val()
        const senha = $("#senha").val()

        $.ajax({
            url: "../controller/UsuarioHasTurmaController.php",
            method: "POST",
            data: {
                save: 1,
                codigo,
                senha
            },
            success: function(response) {
                if(response && JSON.parse(response)) {
                    const data = JSON.parse((response))
                    alert(data.msg);

                    if(!data.error) {
                        window.location.reload();
                    }
                }
            }
        });
    });
});

function carregarTurmasNaTela(turmas) {
    const loggedPerfil = localStorage.getItem('user_perfil');
    var turmasDiv = $("#turmas-div")
    var aux = loggedPerfil == "professor"
        ? ""
        : `<div class="action excluir">
                <i class="fa fa-trash" aria-hidden="true" title="Excluir"></i>
            </div>`;

    turmas.forEach(turma => {
        turmasDiv.append(`
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fa fa-users" aria-hidden="true"></i><br>
                    <small>${turma.nome}</small> <br><br>
                </div>
                <div class="buttons-div">
                    <input type="hidden" class="hidden-turma-id" value="${turma.codigo}">
                    <div class="action atividade">
                        <i class="fa fa-tasks" aria-hidden="true" title="Atividades da Turma"></i>
                    </div>
                    <div class="action rendimento" >
                        <i class="fa fa-line-chart" aria-hidden="true" title="Rendimento dos Alunos da Turma"></i>
                    </div>
                    ${aux}
                </div>
            </div>
        `)
    });
}