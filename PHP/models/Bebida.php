<?php

    require_once './CON/Conexao.php';

    class Bebida {
        
        private $id;
        private $marca;
        private $valor;

        
        function __construct( 
            $id, 
            $marca, 
            $valor
        ) {
            $this->id = $id;
            $this->marca = $marca;
            $this->valor = $valor;            

        }

        //Getters
        public function getId() {
            return $this->id;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function getValor() {
            return $this->valor;
        }

     
        //Listar Registros (SELECT)
        public static function list() {

            //Array de Bebidas Vazio (Retorno)
            $bebidas = [];

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  

            //Prepara Query e Executa
            $query = $connection->prepare('SELECT * FROM bebida');            
            $query->execute();

            //Loop nos Resultados populando o Array de Objetos de Retorno
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $bebidas[] = new Bebida(
                    $result['id'],
                    $result['marca'],
                    $result['valor']
                );
            }

            return $bebidas;
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
                    bebida b'
            );            
            $query->execute(
                [
                    ':id' => $id
                ]
            );

            //Monta Objeto de Retorno
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $bebida = new Bebida(
                $result['id'],
                $result['marca'],
                $result['valor'],

            );

            return $bebida;
        }

        //Cria um Registro (CREATE)
        public static function store( 
            $marca, 
            $valor
        ) {

            ##################
            # TABELA BEBIDA #
            ##################

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  
            
            //Prepara Query
            $query = $connection->prepare('
                INSERT INTO bebida (
                    marca,
                    valor
                ) 
                VALUES (
                    :marca,
                    :valor
                )'
            );                

            //Executa a Query passando cada parâmetro correspondente ( :parametro )
            $query->execute([
                ':marca' => $marca,
                ':valor' => $valor
            ]);

        }
        
        //Atualiza um Registro (UPDATE)
        public static function update( 
            $id, 
            $marca, 
            $valor
        ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection(); 

            ##################
            # TABELA BEBIDAS #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                UPDATE bebida SET 
                    marca = :marca,
                    valor = :valor
                WHERE
                    id = :id
            ');

            //Executa a Query passando cara parâmetro correspondente ( :parametro )
            $query->execute([
                ':marca' => $marca,
                ':valor' => $valor,
                ':id' => $id
            ]);

        }

        //Remove um Registro (DELETE)
        public static function delete( $id ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();

            ##################
            # TABELA BEBIDAS #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                DELETE FROM bebida WHERE id = :id
            ');

            //Executa a Query
            $query->execute([
                ':id' => $id
            ]);
        }
    }
?>