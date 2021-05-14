<?php

class UsuarioHasTurma {

    public $usuario_email;
    public $turma_codigo;
    public $comentario;

    public function carregarObjetoDoBancoDeDados( array $tupla ) {
    
        $this->usuario_email = $tupla["usuario_email"];
        $this->turma_codigo = $tupla["turma_codigo"];
        $this->comentario = $tupla["comentario"]; 
    }
}