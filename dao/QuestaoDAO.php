<?php


require_once(__DIR__."/Connection.php");
require_once(__DIR__."/../model/Questao.php");
require_once(__DIR__."/../dao/AtividadeDAO.php");

class QuestaoDAO {
  public static function getByAtividadeId($atividadeId) {
    try {
			$conn = Connection::getConn();

			$sql = $conn->prepare(
				'SELECT * FROM questao
				 WHERE atividade_id = ?'
      );
      
      $sql->bindValue(1, $atividadeId);

			$sql->execute();
			
			if($sql->rowCount() > 0) {
				$questoes = $sql->fetchAll();
				if($questoes) {
          $res = array();
          foreach($questoes as $q) {
            $aux = new Questao();
            $aux->carregarObjetoDoBancoDeDados($q);
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