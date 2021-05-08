<?php

require_once(__DIR__."/Connection.php");
require_once(__DIR__."/../model/Turma.php");

class TurmaDAO {
    public static function read(array $args) {
        if ($args[0] == "findByProfessorEmail") {
            return self::buscarTodasTurmas($args[1]);
        } 
    }

    public static function buscarTodasTurmas($email) {
        try {
            $conn = Connection::getConn();

            $sql = $conn->prepare(
                'SELECT * FROM turma 
                 WHERE turma.professor_email = ?
                 ORDER BY turma.criado_em'
            ); 
            $sql->bindValue(1, $email);

            $sql->execute();
            
            if($sql->rowCount() > 0) {
                $resultado = $sql->fetchAll();
                if($resultado) {
                    $res = array();
                    foreach($resultado as $r)
                    {
                        $nova_turma = new Turma( $r );
                        $nova_turma->carregarObjetoDoBancoDeDados($r);
                        array_push($res, $nova_turma);
                    }
                    return $res;
                }   
                else {
                    return "Erro";
                }
            }
            else    
                echo "null";

             
        } catch (Exception $e) {
            echo $e;
        }
    }

    public static function criarTurma(Turma $novaTurma) {
        try {
            
            $conn = Connection::getConn();

            $sql = $conn->prepare("INSERT INTO turma(codigo,nome,senha,professor_email,criado_em) VALUES (?, ?, ?,?,?)");
            $sql->bindValue(1, $novaTurma->codigo);
            $sql->bindValue(2, $novaTurma->nome);
            $sql->bindValue(3, $novaTurma->senha);
            $sql->bindValue(4, $novaTurma->professor_email);
            $sql->bindValue(5, $novaTurma->criado_em);
            

            $res = $sql->execute();
            
            echo $res;
            return $res;
        } catch(Exception $e) {
            echo $e;
            $sql->debugDumpParams();
        }
    }

    public static function buscarTurmaCodigo($codigo){
        try {
            $conn = Connection::getConn();
    
            $sql = $conn->prepare("SELECT * FROM turma WHERE codigo = ?");
            $sql->bindValue(1,$codigo);
    
            $res = $sql->execute();

            if ($res == 1 ) {
                if ($sql->rowCount() > 0) {
                    $dados = $sql->fetch();
                    $turma = new Turma();
                    $turma->carregarObjetoDoBancoDeDados($dados);
                    return $turma;
                }
                else return NULL;
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }    
 }
}
