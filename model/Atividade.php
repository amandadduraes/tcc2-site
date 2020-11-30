<?php

class Atividade {
    public $id;
    public $descricao;
    public $turma_codigo;
    

    public function carregarObjetoDoBancoDeDados( array $tupla ) {
    
        $this->id = $tupla["id"];
        $this->descricao = $tupla["descricao"];
        $this->turma_codigo = $tupla["turma_codigo"]; 
    }
}
