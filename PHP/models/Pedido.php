<?php

    require_once './CON/Conexao.php';

    class Pedido {
        
        private $id;
        private $data_hora;
        private $cliente_id;

        
        function __construct( 
            $id, 
            $data_hora, 
            $cliente_id
        ) {
            $this->id = $id;
            $this->data_hora = $data_hora;
            $this->cliente_id = $cliente_id;

        }

        //Getters
        public function getId() {
            return $this->id;
        }

        public function getDataHora() {
            return $this->data_hora;
        }

        public function getClienteId() {
            return $this->cliente_id;
        }

     
        //Listar Registros (SELECT)
        public static function list() {

            //Array de Sabor Vazio (Retorno)
            $pedidos = [];

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  

            //Prepara Query e Executa
            $query = $connection->prepare('SELECT * FROM pedido');            
            $query->execute();

            //Loop nos Resultados populando o Array de Objetos de Retorno
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $pedidos[] = new Pedido(
                    $result['id'],
                    $result['data_hora'],
                    $result['cliente_id']
                );
            }

            return $pedidos;
        }

        //Busca um Registro (SELECT WHERE ID)
        public static function find( $id ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  

            //Prepara Query e Executa
            $query = $connection->prepare('
                SELECT 
                    * 
                FROM 
                    pedido p'
            );            
            $query->execute(
                [
                    ':id' => $id
                ]
            );

            //Monta Objeto de Retorno
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $pedido = new Pedido(
                $result['id'],
                $result['data_hora'],
                $result['cliente_id'],

            );

            return $pedido;
        }

        //Cria um Registro (CREATE)
        public static function store( 
            $data_hora, 
            $cliente_id
        ) {

            ##################
            # TABELA   SABOR #
            ##################

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  
            
            //Prepara Query
            $query = $connection->prepare('
                INSERT INTO pizza (
                    data_hora,
                    cliente_id
                ) 
                VALUES (
                    :data_hora,
                    :cliente_id
                )'
            );                

            //Executa a Query passando cada parâmetro correspondente ( :parametro )
            $query->execute([
                ':data_hora' => $data_hora,
                ':cliente_id' => $cliente_id
            ]);

        }
        
        //Atualiza um Registro (UPDATE)
        public static function update( 
            $id, 
            $data_hora, 
            $cliente_id
        ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection(); 

            ##################
            # TABELA  PEDIDO #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                UPDATE pedido SET 
                    data_hora = :data_hora,
                    cliente_id = :cliente_id
                WHERE
                    id = :id
            ');

            //Executa a Query passando cara parâmetro correspondente ( :parametro )
            $query->execute([
                ':data_hora' => $data_hora,
                ':cliente_id' => $cliente_id,
                ':id' => $id
            ]);

        }

        //Remove um Registro (DELETE)
        public static function delete( $id ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();

            ##################
            # TABELA  PEDIDO #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                DELETE FROM pedido WHERE id = :id
            ');

            //Executa a Query
            $query->execute([
                ':id' => $id
            ]);
        }
    }
?>