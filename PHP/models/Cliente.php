<?php

    require_once './CON/Conexao.php';
    require_once './PHP/models/Status.php';

    class Cliente {
        
        private $id;
        private $nome;
        private $telefone;
        private $status_id;
        private $rua;
        private $numero;
        private $bairro;
        private $cep;
        
        function __construct( 
            $id, 
            $nome, 
            $telefone, 
            $status_id,
            $rua = null,
            $numero = null,
            $bairro = null,
            $cep = null
        ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->status_id = $status_id;            
            $this->rua = $rua;
            $this->numero = $numero;
            $this->bairro = $bairro;
            $this->cep = $cep;
        }

        //Getters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getStatus() {
            return Status::find( $this->status_id );
        }

        public function getRua() {
            return $this->rua;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function getBairro() {
            return $this->bairro;
        }

        public function getCep() {
            return $this->cep;
        }

        //Listar Registros (SELECT)
        public static function list() {

            //Array de Clientes Vazio (Retorno)
            $clientes = [];

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  

            //Prepara Query e Executa
            $query = $connection->prepare('SELECT * FROM cliente');            
            $query->execute();

            //Loop nos Resultados populando o Array de Objetos de Retorno
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $clientes[] = new Cliente(
                    $result['id'],
                    $result['nome'],
                    $result['telefone'],
                    $result['status_id']
                );
            }

            return $clientes;
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
                    cliente c
                    JOIN cliente_endereco ce ON c.id = ce.id
                WHERE 
                    c.id = :id'
            );            
            $query->execute(
                [
                    ':id' => $id
                ]
            );

            //Monta Objeto de Retorno
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $cliente = new Cliente(
                $result['id'],
                $result['nome'],
                $result['telefone'],
                $result['status_id'],
                $result['rua'],
                $result['numero'],
                $result['bairro'],
                $result['cep']
            );

            return $cliente;
        }

        //Cria um Registro (CREATE)
        public static function store( 
            $nome, 
            $telefone, 
            $status_id = 1,
            $rua,
            $numero,
            $bairro,
            $cep
        ) {

            ##################
            # TABELA CLIENTE #
            ##################

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();  
            
            //Prepara Query
            $query = $connection->prepare('
                INSERT INTO cliente (
                    nome,
                    telefone,
                    status_id
                ) 
                VALUES (
                    :nome,
                    :telefone,
                    :status_id
                )'
            );                

            //Executa a Query passando cada parâmetro correspondente ( :parametro )
            $query->execute([
                ':nome' => $nome,
                ':telefone' => $telefone,
                ':status_id' => $status_id
            ]);

            ###########################
            # TABELA CLIENTE ENDERECO #
            ###########################
            
            //Prepara Query
            $query = $connection->prepare('
                INSERT INTO cliente_endereco (
                    id,
                    rua,
                    numero,
                    bairro,
                    cep
                ) 
                VALUES (
                    :id,
                    :rua,
                    :numero,
                    :bairro,
                    :cep
                )'
            );                

            //Executa a Query passando cada parâmetro correspondente ( :parametro )
            $query->execute([
                ':id' => $connection->lastInsertId(),
                ':rua' => $rua,
                ':numero' => $numero,
                ':bairro' => $bairro,
                ':cep' => $cep,
            ]);
        }
        
        //Atualiza um Registro (UPDATE)
        public static function update( 
            $id, 
            $nome, 
            $telefone, 
            $status_id = 1,
            $rua,
            $numero,
            $bairro,
            $cep
        ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection(); 

            ##################
            # TABELA CLIENTE #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                UPDATE cliente SET 
                    nome = :nome,
                    telefone = :telefone,
                    status_id = :status_id
                WHERE
                    id = :id
            ');

            //Executa a Query passando cara parâmetro correspondente ( :parametro )
            $query->execute([
                ':nome' => $nome,
                ':telefone' => $telefone,
                ':status_id' => $status_id,
                ':id' => $id,
            ]);

            ###########################
            # TABELA CLIENTE ENDERECO #
            ###########################

            //Prepara Query
            $query = $connection->prepare('
                UPDATE cliente_endereco SET 
                    rua = :rua,
                    numero = :numero,
                    bairro = :bairro,
                    cep = :cep
                WHERE
                    id = :id
            ');

            //Executa a Query passando cara parâmetro correspondente ( :parametro )
            $query->execute([
                ':rua' => $rua,
                ':numero' => $numero,
                ':bairro' => $bairro, 
                ':cep' => $cep, 
                ':id' => $id,
            ]);
        }

        //Remove um Registro (DELETE)
        public static function delete( $id ) {

            //Cria Conexão
            $connection = new Conexao();
            $connection = $connection->getConnection();

            ###########################
            # TABELA CLIENTE ENDERECO #
            ###########################

            //Prepara Query
            $query = $connection->prepare('
                DELETE FROM cliente_endereco WHERE id = :id
            ');

            //Executa a Query
            $query->execute([
                ':id' => $id
            ]);

            ##################
            # TABELA CLIENTE #
            ##################

            //Prepara Query
            $query = $connection->prepare('
                DELETE FROM cliente WHERE id = :id
            ');

            //Executa a Query
            $query->execute([
                ':id' => $id
            ]);
        }
    }
?>