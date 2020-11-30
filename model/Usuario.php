<?php

class Usuario {
    public $nome;
    public $email;
    public $senha;
    public $perfil;
    public $instituicao;

    public function carregarObjetoDoBancoDeDados( array $tupla ) {
        $this->nome = $tupla["nome"];
        $this->email = $tupla["email"];
        $this->senha = $tupla["senha"];
        $this->perfil = $tupla["perfil"];
        $this->insituicao = $tupla["instituicao"];
    }
}