<?php


class UsuarioAtividade {
    public $usuario_email;
    public $atividade_id;
    public $data_inicio;
    public $data_fim;
    public $nota;   
    

    public function carregarObjetoDoBancoDeDados( array $tupla ) {
    
        $this->usuario_email = $tupla["usuario_email"];
        $this->atividade_id = $tupla["atividade_id"];
        $this->data_inicio = $tupla["data_inicio"];
        $this->data_fim = $tupla["data_fim"]; 
        $this->nota = $tupla["nota"]; 
    }
}
