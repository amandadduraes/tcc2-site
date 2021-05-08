<?php

require_once (__DIR__."/../dao/QuestaoDAO.php");

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(array_key_exists("getByAtividadeId", $_GET)) {
        $atividadeId = $_GET["getByAtividadeId"];

        $questoes = QuestaoDAO::getByAtividadeId($atividadeId);
        shuffle($questoes);
        echo json_encode($questoes);
    }
}