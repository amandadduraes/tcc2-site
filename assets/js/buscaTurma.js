$(document).ready(function() {
    $("#formId").submit(function(e) {
        e.preventDefault()
        const codigo = $("#codigo").val()
        const senha = $("#senha").val()

        console.log({codigo, senha});

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
                }
            }
        });
    });
});