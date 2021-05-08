<?php

require_once (__DIR__."./../model/UsuarioHasAtividade.php");
require_once (__DIR__."./../dao/UsuarioHasAtividadeDAO.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $atividadeId = $_POST["atividadeId"];
    $loggedUserEmail = $_SESSION["user_email"];
    $dataInicio = date('Y-m-d H:i:s');

    $userAtiv = new UsuarioHasAtividade();
    $userAtiv->atividade_id = $atividadeId;
    $userAtiv->usuario_email = $loggedUserEmail;
    $userAtiv->data_inicio = $dataInicio;

    $res["res"] = UsuarioHasAtividadeDao::create($userAtiv);
    echo json_encode($res);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
	parse_str(file_get_contents('php://input'), $_PUT);

    session_start();

    $loggedUserEmail = $_SESSION["user_email"];
    $atividadeId = $_PUT["atividadeId"];
    $nota = $_PUT["nota"];
    $dataFim = date('Y-m-d H:i:s');

    $userAtiv = new UsuarioHasAtividade();
    $userAtiv->usuario_email = $loggedUserEmail;
    $userAtiv->atividade_id = $atividadeId;
    $userAtiv->nota = $nota;
    $userAtiv->data_fim = $dataFim;

    $res["res"] = UsuarioHasAtividadeDAO::update($userAtiv);
    echo json_encode($res);

}