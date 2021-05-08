<?php

class UsuarioHasAtividade {
    public $atividade_id;
    public $usuario_email;
    public $data_inicio;
    public $data_fim;
    public $nota;

    public function carregarObjetoDoBanco(array $tupla) {
        $this->atividade_id = $tupla["atividade_id"];
        $this->usuario_email = $tupla["usuario_email"];
        $this->data_inicio = $tupla["data_inicio"];
        $this->data_fim = $tupla["data_fim"];
        $this->nota = $tupla["nota"];
    }
}