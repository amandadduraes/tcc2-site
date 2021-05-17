<?php

require_once (__DIR__."./Connection.php");

class UsuarioHasAtividadeDAO {
    public static function create(UsuarioHasAtividade $userAtiv) {
        try {
            $conn = Connection::getConn();
            
            $sql = $conn->prepare("INSERT INTO usuario_has_atividade(usuario_email, atividade_id, data_inicio) values (?, ?, ?)");
            $sql->bindValue(1, $userAtiv->usuario_email);
            $sql->bindValue(2, $userAtiv->atividade_id);
            $sql->bindValue(3, $userAtiv->data_inicio);
            
            return $sql->execute();
        }
        catch(Exception $ex) {
            var_dump($ex);
        }
    }

    public static function read(array $args) {
        switch($args[0]) {
            case "findById": return self::findById($args[1], $args[2]);
            case "findByTurmaCodigo": return self::findByTurmaCodigo($args[1]);
        }
    }

    public static function update(UsuarioHasAtividade $userAtiv) {
        try {
            $conn = Connection::getConn();
            
            $sql = $conn->prepare("
                UPDATE usuario_has_atividade
                SET
                    data_fim = ?,
                    nota = ? 
                WHERE
                    usuario_email = ? AND atividade_id = ?

            ");

            $sql->bindValue(1, $userAtiv->data_fim);
            $sql->bindValue(2, $userAtiv->nota);
            $sql->bindValue(3, $userAtiv->usuario_email);
            $sql->bindValue(4, $userAtiv->atividade_id);
            $res = $sql->execute();

            return $res;
        }
        catch(Exception $ex) {
            var_dump($ex);
        }
    }

    protected static function findById($usuario_email, $atividadeId) {
        try {

            $conn = Connection::getConn();
            
            $sql = $conn->prepare('
            SELECT *
            FROM usuario_has_atividade
            WHERE usuario_has_atividade.usuario_email = ?
                AND usuario_has_atividade.atividade_id = ?
            ');
            $sql->bindValue(1, $usuario_email);
            $sql->bindValue(2, $atividadeId);
            
            $res = $sql->execute();

            if($res == 1) {
                if($sql->rowCount() > 0) {
                    $userAtiv = new UsuarioHasAtividade();
                    return $userAtiv->carregarObjetoDoBanco($sql->fetch());
                }
                else
                    return NULL;
            }
        }
        catch(Exception $ex) {
            var_dump($ex);
        }
    }

    protected static function findByTurmaCodigo($usuario_email, $atividadeId){
        try{

            $conn = Connection::getConn();
            
            $sql = $conn->prepare('
            SELECT *
            FROM usuario_has_atividade
            WHERE usuario_has_atividade. = ?
                AND usuario_has_atividade.atividade_id = ?
            ');
            $sql->bindValue(1, $usuario_email);
            $sql->bindValue(2, $atividadeId);
            
            $res = $sql->execute();

            if($res == 1) {
                if($sql->rowCount() > 0) {
                    $userAtiv = new UsuarioHasAtividade();
                    return $userAtiv->carregarObjetoDoBanco($sql->fetch());
                }
                else
                    return NULL;
            }

        }catch(Exception $ex){

        }
    }
}