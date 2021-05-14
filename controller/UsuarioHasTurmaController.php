<?php
require_once(__DIR__."/../DAO/TurmaDAO.php");
require_once(__DIR__."/../DAO/UsuarioHasTurmaDAO.php");
require_once(__DIR__."/../model/UsuarioHasTurma.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (array_key_exists("save", $_POST)){
        session_start();

        $senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_STRING); 

        // echo $codigo ."<br>" .$senha;
    
        $turma = TurmaDAO::buscarTurmaCodigo($codigo);
        if(isset($turma)){
            if($turma->senha == $senha){
                try{
                    $emailUsuarioLogado = $_SESSION["user_email"];
                    $usuarioTurma = new UsuarioHasTurma();
                    $usuarioTurma->usuario_email = $emailUsuarioLogado;
                    $usuarioTurma->turma_codigo  = $codigo;
                    UsuarioHasTurmaDAO::create($usuarioTurma);
                    $res["error"] = false;
                    $res["msg"] = "Operação realizada com sucesso!";
                }catch(Exception $ex){
                    $res["error"] = true;
                    $res["msg"] = $ex;
                }
            }else{
                $res["error"] = true;
                $res["msg"] = "Senha Inválida!";
            }
        }else{
            $res["error"] = true;
            $res["msg"] = "Não foi encontrada uma turma com o código informado!";
        }

        echo json_encode($res);
       // $res = TurmaDAO::criarUsuarioTurma(array($_POST'[$senha ,$codigo]))

    }
}