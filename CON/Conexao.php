<?php
    class Conexao {

        protected const DB_DRIVER = 'mysql';
        protected const DB_HOST = '127.0.0.1:3306';
        protected const DB_NAME = 'pizzaria';
        protected const DB_USER = 'root';
        protected const DB_PASSWORD = 'secret';
        
        public static function getConnection() {
    
            $pdoConfig = 
                Conexao::DB_DRIVER . ":". 
                "host=" . Conexao::DB_HOST . ";".
                "dbname=".Conexao::DB_NAME.";";
    
            try {

                if(!isset($connection)){
                        $connection =  new PDO($pdoConfig, Conexao::DB_USER, Conexao::DB_PASSWORD);
                        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                return $connection;

            } 
            catch (PDOException $e) {

                $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
                $mensagem .= "\nErro: " . $e->getMessage();
                throw new Exception($mensagem);
             }
         }
    }
?>