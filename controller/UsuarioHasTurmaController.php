<?php
session_start();

require_once(__DIR__."/../dao/TurmaDAO.php");
require_once(__DIR__."/../dao/UsuarioHasTurmaDAO.php");
require_once(__DIR__."/../model/UsuarioHasTurma.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (array_key_exists("save", $_POST)){
        $senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_STRING); 
    
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
    }

    if(array_key_exists("deleteByCodigoTurma", $_POST)) {
        $codigo = $_POST["codigoTurma"];
        $res["res"] = UsuarioHasTurmaDAO::delete(array("deleteByCodigoTurma", $codigo));
        
        echo json_encode($res);
    }
}