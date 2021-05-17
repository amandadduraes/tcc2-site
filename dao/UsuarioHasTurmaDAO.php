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

    public static function delete(array $args){
        if($args[0] == "deleteByCodigoTurma"){
            try {
                $conn = Connection::getConn();
        
                $delete = $conn->prepare(
                  'DELETE FROM usuario_has_turma
                   WHERE turma_codigo = ?'
                );
        
                $delete->bindValue(1, $args[1]);
        
                $delete->execute();
        
                return $delete->rowCount() == '0' ? FALSE:TRUE;
        
            } catch ( Exception $e ) {
                echo $e->getMessage();
            }
        }
    }

}