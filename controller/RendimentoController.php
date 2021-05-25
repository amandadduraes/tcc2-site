<?php


require_once(__DIR__."/../dao/UsuarioDAO.php");
require_once(__DIR__."/../dao/AtividadeDAO.php");
require_once(__DIR__."/../dao/TurmaDAO.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(array_key_exists("getByTurmaCodigo", $_GET)) {
        $codigo = $_GET["getByTurmaCodigo"];
        $turma = TurmaDAO::buscarTurmaCodigo($codigo);

        $response = array();
        $usuariosDaTurma = UsuarioDAO::buscarUsuariosDaTurma($codigo);
        $atividadesDaTurma = AtividadeDAO::buscarAtividadesDaTurma('poo1');

        $response["usuarios"] = $usuariosDaTurma;
        $response["atividades"] = $atividadesDaTurma;
        $response["turmaNome"] = $turma->nome;
        
        foreach($response["usuarios"] as $index => $user) {
            $response["usuarios"][$index]["notas"] = AtividadeDAO::buscarNotasDeUmUsuarioNaTurma($user["email"], 'poo1');
        }

        echo json_encode($response);
    }
}