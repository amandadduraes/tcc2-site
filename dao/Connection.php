<?php

    class Connection {  
        protected static  $conn;
        private function __construct () {
            self::$conn = new PDO('mysql:host=localhost;dbname=tcc2;charset=utf8', 'root', '');
            //self::$conn = new PDO('mysql:host=fdb20.awardspace.net;dbname=3844642_aprendendopoo;charset=utf8', '3844642_aprendendopoo', '0khpx#4J2_WejuHP', array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
        }

        public static function getConn () {
            if(!self::$conn)
                new Connection();
            return self::$conn;
        } 
    }
    
?>
