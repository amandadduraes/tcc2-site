<?php

require_once (__DIR__."/./conexao.php");
require_once (__DIR__."/../model/Alternativa.php"); ?? 

class AlternativaDAO {
  public static function getByQuestaoId($questaoId) {
    try {
			$conn = Connection::getConn();

			$sql = $conn->prepare(
				'SELECT * FROM alternativa
				 WHERE questao_id = ?'
      );
      
      $sql->bindValue(1, $questaoId);

			$sql->execute();
			
			if($sql->rowCount() > 0) {
				$alternativas = $sql->fetchAll();
				if($alternativas) {
          $res = array();
          foreach($alternativas as $a) {
            $aux = new Alternativa();
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
		  Connection::showLog($e->getMessage());
		}	
  }
}