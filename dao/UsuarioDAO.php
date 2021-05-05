<?php

require_once (__DIR__."./Connection.php");
require_once (__DIR__."./../model/Usuario.php");

class UsuarioDAO {
    public static function criarUsuario( Usuario $novoUsuario ) {
        try {
            $conn = Connection::getConn();

            $sql = $conn->prepare("INSERT INTO usuario(email, senha, nome, instituicao, perfil) VALUES (?, ?, ?, ?, ?)");
            $sql->bindValue(1, $novoUsuario->email);
            $sql->bindValue(2, $novoUsuario->senha);
            $sql->bindValue(3, $novoUsuario->nome);
            $sql->bindValue(4, $novoUsuario->instituicao);
            $sql->bindValue(5, $novoUsuario->perfil);

            $res = $sql->execute();
            
            return $res;
        } catch(Exeption $e) {
            echo $e;
            $sql->debugDumpParams();
        }
    }

    public static function fazerLogin($email, $senha) {
        try {
            $conn = Connection::getConn();
    
            $sql = $conn->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
            $sql->bindValue(1,$email);
            $sql->bindValue(2,$senha);
    
            $res = $sql->execute();

            if ($res == 1 ) {
                if ($sql->rowCount() > 0) {
                    $dados = $sql->fetch();
                    $usuario = new Usuario();
                    $usuario->carregarObjetoDoBancoDeDados($dados);
                    return $usuario;
                }
                else return NULL;
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }    
    }
    
    public static function buscarUsuarioEmail($email){
        try {
            $conn = Connection::getConn();
    
            $sql = $conn->prepare("SELECT * FROM usuario WHERE email = ?");
            $sql->bindValue(1,$email);
    
            $res = $sql->execute();

            if ($res == 1 ) {
                if ($sql->rowCount() > 0) {
                    $dados = $sql->fetch();
                    $usuario = new Usuario();
                    $usuario->carregarObjetoDoBancoDeDados($dados);
                    return $usuario;
                }
                else return NULL;
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }    
 }

}

