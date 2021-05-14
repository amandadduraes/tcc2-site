<?php

class UsuarioHasTurmaDAO{
    public static function create(UsuarioHasTurma $usuarioTurma){
        try {
            $conn = Connection::getConn();

            $sql = $conn->prepare("INSERT INTO usuario_has_turma(usuario_email,turma_codigo) VALUES (?, ?)");
            $sql->bindValue(1, $usuarioTurma->usuario_email);
            $sql->bindValue(2, $usuarioTurma->turma_codigo);            

            $res = $sql->execute();
            
            return $res;
        } catch(Exception $e) {
            echo $e;
            $sql->debugDumpParams();
        }

    }
}