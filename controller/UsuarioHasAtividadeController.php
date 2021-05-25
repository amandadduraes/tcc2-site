<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();

require_once(__DIR__."/../model/UsuarioHasAtividade.php");
require_once(__DIR__."/../dao/UsuarioHasAtividadeDAO.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $atividadeId = $_POST["atividadeId"];
    $loggedUserEmail = $_SESSION["user_email"];
    $dataInicio = date('Y-m-d H:i:s');

    $userAtiv = new UsuarioHasAtividade();
    $userAtiv->atividade_id = $atividadeId;
    $userAtiv->usuario_email = $loggedUserEmail;
    $userAtiv->data_inicio = $dataInicio;

    $res["res"] = UsuarioHasAtividadeDAO::create($userAtiv);
    echo json_encode($res);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(array_key_exists("save", $_POST)) {

        $atividadeId = $_POST["atividadeId"];
        $loggedUserEmail = $_SESSION["user_email"];
        $dataInicio = date('Y-m-d H:i:s');
        
        $userAtiv = new UsuarioHasAtividade();
        $userAtiv->atividade_id = $atividadeId;
        $userAtiv->usuario_email = $loggedUserEmail;
        $userAtiv->data_inicio = $dataInicio;
        
        $res["res"] = UsuarioHasAtividadeDAO::create($userAtiv);
        echo json_encode($res);
    }

    if(array_key_exists("update", $_POST)) {
        $loggedUserEmail = $_SESSION["user_email"];
        $atividadeId = $_POST["atividadeId"];
        $nota = $_POST["nota"];
        $dataFim = date('Y-m-d H:i:s');

        $userAtivAtual = UsuarioHasAtividadeDAO::read(array(
            "findById",
            $loggedUserEmail,
            $atividadeId
        ));

        if(isset($userAtivAtual) && $nota > $userAtivAtual->nota) {
            $userAtiv = new UsuarioHasAtividade();
            $userAtiv->usuario_email = $loggedUserEmail;
            $userAtiv->atividade_id = $atividadeId;
            $userAtiv->nota = $nota;
            $userAtiv->data_fim = $dataFim;
            $res["res"] = UsuarioHasAtividadeDAO::update($userAtiv);
            echo json_encode($res);
        }
        else {
            echo "{}";
        }
    }
}