<?php 

require_once (__DIR__."/../dao/TurmaDAO.php");
require_once (__DIR__."./../model/Turma.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (array_key_exists ("findByEmail", $_GET)) {
            session_start();
            $perfilUsuarioLogado = $_SESSION["user_perfil"];
            $metodoRead = $perfilUsuarioLogado == "professor"
                ? "findByProfessorEmail"
                : "findByAlunoEmail";
    
            $turmas = TurmaDAO::read(array($metodoRead, $_GET["findByEmail"])); 
            if (isset($turmas)) {
                echo json_encode($turmas, JSON_UNESCAPED_UNICODE);
            } 
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if(array_key_exists("save", $_POST)) {
            $nome =  filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            $codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_STRING); 

                       
    
            if(TurmaDAO::buscarTurmaCodigo($codigo)){
                echo json_encode(array("error"=>true));
                return;
            }
            session_start();
            echo($_SESSION["user_email"]) .'<br>';
            $novaTurma = new Turma();
            $novaTurma->nome = $nome;
            $novaTurma->senha = $senha;
            $novaTurma->codigo = $codigo;
            $novaTurma->professor_email =$_SESSION["user_email"];
            $novaTurma->criado_em =date('Y-m-d');
            
            
            $aux = TurmaDAO::criarTurma($novaTurma);
            echo json_encode($aux);
        }
               
    }