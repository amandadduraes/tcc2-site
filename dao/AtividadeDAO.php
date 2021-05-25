<?php


require_once(__DIR__."/Connection.php");
require_once(__DIR__."/../model/Atividade.php");
class AtividadeDAO {
  public static function getByTurmaCodigo($turmaCodigo) {
    try {
		$conn = Connection::getConn();

			$sql = $conn->prepare(
				'SELECT * FROM atividade
				 WHERE turma_codigo = ?
         ORDER BY id'
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
				return 0;
	        
	    } catch(Exception $e) {
        var_dump($e);
		}	
  }

  public static function buscarAtividadesDaTurma($turmaCodigo){
    try{
      $conn = Connection::getConn();
        
      $sql = $conn->prepare('
        SELECT ativ.id, ativ.descricao
        FROM atividade ativ
        WHERE ativ.turma_codigo = ?
      ');

      $sql->bindValue(1, $turmaCodigo);
      $sql->execute();

      return $sql->fetchAll();
    }
    catch(Exception $ex){
      var_dump($ex);
    }
  }

  public static function buscarNotasDeUmUsuarioNaTurma($usuarioEmail, $turmaCodigo){
    try{
        $conn = Connection::getConn();
        
        $sql = $conn->prepare('
          SELECT userAtiv.atividade_id, userAtiv.nota
          FROM usuario_has_atividade userAtiv
            INNER JOIN atividade ativ on ativ.id = userAtiv.atividade_id
          WHERE userAtiv.usuario_email = ? and ativ.turma_codigo = ?
        ');

        $sql->bindValue(1, $usuarioEmail);
        $sql->bindValue(2, $turmaCodigo);
        
        $sql->execute();

        return $sql->fetchAll();
    }
    catch(Exception $ex){
      var_dump($ex);
    }
  }
}