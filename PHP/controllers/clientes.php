<?php

require_once './PHP/models/Cliente.php';
require_once './PHP/models/Status.php';

try {

    //Inserir
    if( isset( $_POST['inserir'] ) ) {

        Cliente::store(
            $_POST['nome'],
            $_POST['telefoneFixo'],
            $_POST['status_id'],
            $_POST['rua'],
            $_POST['numero'],
            $_POST['bairro'],
            $_POST['cep']
        );     
        
        header('Location: tela.php?dir=PHP/views/clientes&file=index');
    }

    //Editar
    elseif( isset( $_POST['editar'] ) ) {

        try {
            Cliente::update(
                $_GET['id'],
                $_POST['nome'],
                $_POST['telefoneFixo'],
                $_POST['status_id'],
                $_POST['rua'],
                $_POST['numero'],
                $_POST['bairro'],
                $_POST['cep']
            );

            header('Location: tela.php?dir=PHP/views/clientes&file=index');

        }
        catch( Exception $e ) {
            die('Erro ao Editar');
        }
    }

    //Tela de Edição e Visualização
    if( $_GET['file'] == 'edit' || $_GET['file'] == 'show' ) { 

        if( isset( $_GET['id'] ) ) {
            $cliente = Cliente::find( $_GET['id'] );
        }
        else {
            die('Cliente não Encontrado!');
        }
    }

    //Tela de Edição e Criação
    if( $_GET['file'] == 'edit' || $_GET['file'] == 'create' ) { 
        $statusList = Status::list();                    
    }

    //Excluir    
    if( isset( $_GET['deleteid'] ) ) {
        Cliente::delete( $_GET['deleteid'] );
    }
    
    //Listagem
    if( $_GET['file'] == 'index' ) { 

        try {
            $clientes = Cliente::list();        
        }
        catch( Exception $e ) {
            var_dump($e);  die;
        }        
    }

}
catch( Exception $e ) {
    echo 'Erro ao se conectar com a Base de Dados!';
    echo '<pre>';
    print_r($e);
    die;
}



