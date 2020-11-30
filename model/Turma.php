<?php

class Turma {
    public $codigo;
    public $nome;
    public $senha;
    public $professor_email;

    public function carregarObjetoDoBancoDeDados( array $tupla ) {
    
        $this->codigo = $tupla["codigo"];
        $this->nome = $tupla["nome"];
        $this->senha = $tupla["senha"]; 
        $this->professor_email = $tupla["professor_email"]; 
    }
}
