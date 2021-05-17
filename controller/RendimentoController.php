<?php

require_once(__DIR__."./../dao/UsuarioDAO.php");
require_once(__DIR__."./../dao/AtividadeDAO.php");
require_once(__DIR__."./../dao/TurmaDAO.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(array_key_exists("getByTurmaCodigo", $_GET)) {
        $codigo = $_GET["getByTurmaCodigo"];
        $turma = TurmaDAO::buscarTurmaCodigo($codigo);

        $response = array();
        $response["usuarios"] = UsuarioDAO::buscarUsuariosDaTurma($codigo);
        $response["atividades"] = AtividadeDAO::buscarAtividadesDaTurma($codigo);
        $response["turmaNome"] = $turma->nome;
        
        foreach($response["usuarios"] as $index => $user) {
            $response["usuarios"][$index]["notas"] = AtividadeDAO::buscarNotasDeUmUsuarioNaTurma($user["email"], $codigo);
        }

        echo json_encode($response);
    }
}