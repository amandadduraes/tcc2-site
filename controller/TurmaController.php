<?php 

require_once (__DIR__."/../dao/TurmaDAO.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (array_key_exists ("findByProfessorEmail", $_GET)) {
            $turmas = TurmaDAO::read(array("findByProfessorEmail", $_GET["findByProfessorEmail"])); 
            if (isset($turmas)) {
                echo json_encode($turmas, JSON_UNESCAPED_UNICODE);
            } 
        }
    }