<?php

require_once './PHP/models/Pedido.php';
try {

    //Inserir
    if( isset( $_POST['inserir'] ) ) {

        Sabor::store(
            $_POST['data_hora'],
            $_POST['cliente_id']
        );     
        
        header('Location: tela.php?dir=PHP/views/pedidos&file=index');
    }

    //Editar
    elseif( isset( $_POST['editar'] ) ) {

        try {
            Sabor::update(
                $_POST['id'],
                $_POST['data_hora'],
                $_POST['cliente_id']
            );

            header('Location: tela.php?dir=PHP/views/pedidos&file=index');

        }
        catch( Exception $e ) {
            die('Erro ao Editar');
        }
    }

    //Tela de Edição
    if( $_GET['action'] == 'edit' ) {

        if( isset( $_GET['id'] ) ) {
            $pedido = Pedido::find( $_GET['id'] );
        }
        else {
            die('Pedido não Encontrado!');
        }
    }

    //Tela de Edição e Criação
    if( $_GET['file'] == 'edit' || $_GET['file'] == 'create' ) { 
        $statusList = Status::list();                    
    }

    //Excluir    
    if( isset( $_GET['deleteid'] ) ) {
        Pedido::delete( $_GET['deleteid'] );
    }
    
    //Listagem
    if( $_GET['file'] == 'index' ) { 

        try {
            $pedidos = Pedido::list();        
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
