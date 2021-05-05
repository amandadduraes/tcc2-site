<?php

    require_once(__DIR__."/Connection.php");
require_once(__DIR__."/../model/Turma.php");

class TurmaDAO {
    public static function read(array $args) {
        if ($args[0] == "findByProfessorEmail") {
            return self::buscarTodasTurmas($args[1]);
        } 
    }

    private function buscarTodasTurmas($email) {
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
}
