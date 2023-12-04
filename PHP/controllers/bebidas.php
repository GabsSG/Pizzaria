<?php

require_once './PHP/models/Bebida.php';
try {

    //Inserir
    if( isset( $_POST['inserir'] ) ) {

        Bebida::store(
            $_POST['marca'],
            $_POST['valor']
        );     
        
        header('Location: tela.php?dir=PHP/views/bebidas&file=index');
    }

    //Editar
    elseif( isset( $_POST['editar'] ) ) {

        try {
            Bebida::update(
                $_POST['id'],
                $_POST['marca'],
                $_POST['valor']
            );

            header('Location: tela.php?dir=PHP/views/bebidas&file=index');

        }
        catch( Exception $e ) {
            die('Erro ao Editar');
        }
    }

    //Tela de Edição
    if( $_GET['action'] == 'edit' ) {

        if( isset( $_GET['id'] ) ) {
            $bebida = Bebida::find( $_GET['id'] );
        }
        else {
            die('Bebida não Encontrado!');
        }
    }

    //Tela de Edição e Criação
    if( $_GET['file'] == 'edit' || $_GET['file'] == 'create' ) { 
        $statusList = Status::list();                    
    }

    //Excluir    
    if( isset( $_GET['deleteid'] ) ) {
        Bebida::delete( $_GET['deleteid'] );
    }
    
    //Listagem
    if( $_GET['file'] == 'index' ) { 

        try {
            $bebidas = Bebida::list();        
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
