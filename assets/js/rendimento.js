$(document).ready(function(){
    $('#keywords').tablesorter(); 

    $.ajax({
        url: "../controller/RendimentoController.php",
        method: "GET",
        data: {
            getByTurmaCodigo: $("#turmaCodigo").val(),
        },
        success: function(response) {
            const data = JSON.parse(response)

            $("#title").text(`Rendimentos da Turma ${data.turmaNome}`);

            data.atividades.forEach(ativ => {
                const descricao = ativ.descricao;
                $("#keywords > thead > tr").append(`<th><span title="${descricao}">${descricao}</span></th>`);
            });

            data.usuarios.forEach(user => {
                const notas = user.notas
                var aux = "<tr><td>" + user.nome + "</td>";
                
                data.atividades.forEach(ativ => {
                    const nota = notas.find(nota => nota.atividade_id == ativ.id)
                    if(nota) {
                       aux += `<td> ${nota.nota} </td>`
                    }
                    else {
                        aux += "<td>-</td>";
                    }
                });

                aux += "</tr>";

                $("#keywords > tbody").append(aux);
            })
        }
    });
})