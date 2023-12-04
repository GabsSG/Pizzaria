<?php

require_once './PHP/models/Sabor.php';
try {

    //Inserir
    if( isset( $_POST['inserir'] ) ) {

        Sabor::store(
            $_POST['nome'],
            $_POST['descricao']
        );     
        
        header('Location: tela.php?dir=PHP/views/sabores&file=index');
    }

    //Editar
    elseif( isset( $_POST['editar'] ) ) {

        try {
            Sabor::update(
                $_POST['id'],
                $_POST['nome'],
                $_POST['descricao']
            );

            header('Location: tela.php?dir=PHP/views/sabores&file=index');

        }
        catch( Exception $e ) {
            die('Erro ao Editar');
        }
    }

    //Tela de Edição
    if( $_GET['action'] == 'edit' ) {

        if( isset( $_GET['id'] ) ) {
            $sabor = Sabor::find( $_GET['id'] );
        }
        else {
            die('Sabor não Encontrado!');
        }
    }

    //Tela de Edição e Criação
    if( $_GET['file'] == 'edit' || $_GET['file'] == 'create' ) { 
        $statusList = Status::list();                    
    }

    //Excluir    
    if( isset( $_GET['deleteid'] ) ) {
        Sabor::delete( $_GET['deleteid'] );
    }
    
    //Listagem
    if( $_GET['file'] == 'index' ) { 

        try {
            $sabores = Sabor::list();        
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
