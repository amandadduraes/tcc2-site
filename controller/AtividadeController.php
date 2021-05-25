<?php

require_once(__DIR__."/../dao/AtividadeDAO.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if(array_key_exists("getByTurmaCodigo", $_GET)) {
    $turmaCodigo = $_GET["getByTurmaCodigo"];

    $atividades = AtividadeDAO::getByTurmaCodigo($turmaCodigo);
    echo json_encode($atividades);
  }
}