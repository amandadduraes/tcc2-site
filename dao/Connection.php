<?php


    class Connection {  
        protected static  $conn;
        private function __construct () {
            self::$conn = new PDO('mysql:host=localhost;dbname=tcc2;charset=utf8', 'root', '');
            // self::$conn = new PDO('mysql:host=sql303.epizy.com;dbname=epiz_28655122_aprendendopoo;charset=utf8', 'epiz_28655122', 'KNFsXdk32TgqYpj', array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
        }

        public static function getConn () {
            if(!self::$conn)
                new Connection();
            return self::$conn;
        } 
    }
    
?>
