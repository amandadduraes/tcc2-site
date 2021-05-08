<?php

require_once (__DIR__."/../dao/AlternativaDAO.php");

class Questao {
    public $id;
    public $descricao;
    public $valor;
    public $atividade_id;
    public $alternativa_correta_id;   
    

    public function carregarObjetoDoBancoDeDados( array $tupla ) {
    
        $this->id = $tupla["id"];
        $this->descricao = $tupla["descricao"];
        $this->valor = $tupla["valor"];
        $this->atividade_id = $tupla["atividade_id"]; 
        $this->alternativa_correta_id = $tupla["alternativa_correta_id"]; 

        $alternativas = AlternativaDAO::getByQuestaoId($this->id);
        shuffle($alternativas);
        
        $this->alternativas = $alternativas;
    }
    
}
