<?php

    require_once './CON/Conexao.php';

    class Sabor {
        
        private $id;
        private $nome;
        private $descricao;

        
        function __construct( 
            $id, 
            $nome, 
            $descricao
        ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->descricao = $descricao;

        }

        //Getters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

     
        //Listar Registros (SELECT)
        public static function list() {

            //Array de Sabor Vazio (Retorno)
            $sabores = [];

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  

            //Prepara Query e Executa
            $query = $connection->prepare('SELECT * FROM pizza');            
            $query->execute();

            //Loop nos Resultados populando o Array de Objetos de Retorno
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $sabores[] = new Sabor(
                    $result['id'],
                    $result['nome'],
                    $result['descricao']
                );
            }

            return $sabores;
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
                    pizza p'
            );            
            $query->execute(
                [
                    ':id' => $id
                ]
            );

            //Monta Objeto de Retorno
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $sabor = new Sabor(
                $result['id'],
                $result['nome'],
                $result['descricao'],

            );

            return $sabor;
        }

        //Cria um Registro (CREATE)
        public static function store( 
            $nome, 
            $descricao
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
                    nome,
                    descricao
                ) 
                VALUES (
                    :nome,
                    :descricao
                )'
            );                

            //Executa a Query passando cada parâmetro correspondente ( :parametro )
            $query->execute([
                ':nome' => $nome,
                ':descricao' => $descricao
            ]);

        }
        
        //Atualiza um Registro (UPDATE)
        public static function update( 
            $id, 
            $nome, 
            $descricao
        ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection(); 

            ##################
            # TABELA   SABOR #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                UPDATE pizza SET 
                    nome = :nome,
                    descricao = :descricao
                WHERE
                    id = :id
            ');

            //Executa a Query passando cara parâmetro correspondente ( :parametro )
            $query->execute([
                ':nome' => $nome,
                ':descricao' => $descricao,
                ':id' => $id
            ]);

        }

        //Remove um Registro (DELETE)
        public static function delete( $id ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();

            ##################
            # TABELA   SABOR #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                DELETE FROM pizza WHERE id = :id
            ');

            //Executa a Query
            $query->execute([
                ':id' => $id
            ]);
        }
    }
?>