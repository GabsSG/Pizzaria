<?php

    require_once './CON/Conexao.php';

    class Status {

        private $id;
        private $nome;

        function __construct( 
            $id, 
            $nome
        ) {
            $this->id = $id;
            $this->nome = $nome;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        //Listar Registros
        public static function list() {

            //Array de Clientes Vazio (Retorno)
            $status = [];

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  

            //Prepara Query e Executa
            $query = $connection->prepare('SELECT * FROM status');            
            $query->execute();

            //Loop nos Resultados populando o Array de Objetos de Retorno
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $status[] = new Status(
                    $result['id'],
                    $result['nome']
                );
            }

            return $status;
        }

        //Busca um Registro
        public static function find( $id ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  

            //Prepara Query e Executa
            $query = $connection->prepare('
                SELECT 
                    * 
                FROM 
                    status
                WHERE 
                    id = :id'
            );            
            $query->execute([
                ':id' => $id
            ]);

            //Monta Objeto de Retorno
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $cliente = new Status(
                $result['id'],
                $result['nome']
            );

            return $cliente;
        }
    }

?>