<?php
    include './PHP/controllers/clientes.php';
?>
<!-- PAGINA DE CLIENTES -->
<div>
            
    <!-- Clientes cadastrados -->
    <div class="card text-white bg-dark">
        
        <!-- Cabeçalho da Tabela -->
        <div class="card-header">
            <div class="p-2 bd-highlight input-group">
                <h2 class="pe-2 bi bi-people-fill"></h2><!-- Icone da página cliente -->
                <h2><?php echo $cliente->getNome(); ?></h2>
            </div>
            
            <!-- Adicionar um novo cliente -->
            <a class="icon-link icon-link-hover p-2 bd-highlight" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="tela.php?dir=PHP/views/clientes&file=create">
                <i class="bi bi-person-fill-add"></i>
            </a>
        </div>        
    </div>
</div>

<!-- Estilizar como Preferir -->
<div class="mt-4">
    <div>
        <strong>ID:</strong> <?php echo $cliente->getId(); ?>
    </div>
    <div>
        <strong>Nome:</strong> <?php echo $cliente->getNome(); ?>
    </div>
    <div>
        <strong>Telefone:</strong> <?php echo $cliente->getTelefone(); ?>
    </div>
    <div>
        <strong>Status:</strong> <?php echo $cliente->getStatus()->getNome(); ?>
    </div>
    <div>
        <strong>Rua:</strong> <?php echo $cliente->getRua(); ?>
    </div>
    <div>
        <strong>Número:</strong> <?php echo $cliente->getNumero(); ?>
    </div>
    <div>
        <strong>Telefone:</strong> <?php echo $cliente->getTelefone(); ?>
    </div>
    <div>
        <strong>CEP:</strong> <?php echo $cliente->getCep(); ?>
    </div>
</div>