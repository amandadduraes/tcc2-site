<?php

/*$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "tcc2";

// Criando a conexão
$conn = mysqli_connect($servidor,$usuario, $senha, $dbname);
*/
// Criando oonexão para o Login
    class Connection {  
        protected static  $conn;

        //mysql:host=localhost;dbname=appherbicida;charset=utf8', 'root', '');

        private function __construct () {
            self::$conn = new PDO('mysql:host=localhost;dbname=tcc2;charset=utf8', 'root', '');
            //$this->conn = new PDO('mysql:host=fdb20.awardspace.net;dbname=3145258_appherbicida;charset=utf8', '3145258_appherbicida', 'herbicida2019');
        }

        public static function getConn () {
            if(!self::$conn)
                new Connection();
            return self::$conn;
        } 
    }
    
?>
