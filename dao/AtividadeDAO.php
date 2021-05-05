<?php

require_once (__DIR__."/./Connection.php");
require_once (__DIR__."/../model/Atividade.php");

class AtividadeDAO {
  public static function getByTurmaCodigo($turmaCodigo) {
    try {
		$conn = Connection::getConn();

			$sql = $conn->prepare(
				'SELECT * FROM atividade
				 WHERE turma_codigo = ?'
      );
      
      $sql->bindValue(1, $turmaCodigo);

			$sql->execute();
			
			if($sql->rowCount() > 0) {
				$atividades = $sql->fetchAll();
				if($atividades) {
          $res = array();
          foreach($atividades as $a) {
            $aux = new Atividade();
            $aux->carregarObjetoDoBancoDeDados($a);
            array_push($res, $aux);
          }
          return $res;
        }
        else {
          return "Erro";
        }
			}
			else
				echo "null";
	        
	    } catch(Exception $e) {
        var_dump($e);
		}	
  }
}