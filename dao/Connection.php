<?php

    class Connection {  
        protected static  $conn;
        private function __construct () {
            self::$conn = new PDO('mysql:host=localhost;dbname=tcc2;charset=utf8', 'root', '');
        }

        public static function getConn () {
            if(!self::$conn)
                new Connection();
            return self::$conn;
        } 
    }
    
?>
