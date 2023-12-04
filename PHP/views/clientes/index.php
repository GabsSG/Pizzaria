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
                <h2>Clientes cadastrados</h2>
            </div>
            
        </div>        
    </div>
    
    <nav class="navbar">
        <div class="container-fluid d-flex justify-content-end">
            <!-- Barra de busca da pagina clientes -->
            <form class="d-flex justify-content-end">
                <input class="form-control" type="search" placeholder="Search">
                <button class="btn btn-dark bi bi-search" type="submit"></button>
            </form>
            <!-- Adicionar um novo cliente -->
            <a class="icon-link icon-link-hover p-2 bd-highlight" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="tela.php?dir=PHP/views/clientes&file=create">
                <i class="clearlink pe-2 bi bi-person-fill-add"></i>
            </a>
        </div>
    </nav>

    <!-- Tabela de clientes cadastrados -->
    <table class="table table-striped table-hover card-body">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Status</th>
                <th scope="col" width="10%">Visualizar</th>
                <th scope="col" width="10%">Editar</th>
                <th scope="col" width="10%">Excluir</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($clientes as $cliente) { ?>            

            <tr>
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getTelefone(); ?></td>
                <td><?php echo $cliente->getStatus()->getNome(); ?></td>
                <td>
                    <a class="clearlink" href="tela.php?dir=PHP/views/clientes&file=show&id=<?php echo $cliente->getId(); ?>">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                </td>
                <td>
                    <a class="clearlink" href="tela.php?dir=PHP/views/clientes&file=edit&id=<?php echo $cliente->getId(); ?>">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
                <td>
                    <a class="clearlink" href="tela.php?dir=PHP/views/clientes&file=index&deleteid=<?php echo $cliente->getId(); ?>">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </td>
            </tr>

            <?php } ?>          
            
        </tbody>
    </table>

    <!-- Paginação da tela cliente -->
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm d-flex justify-content-end">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>   
</div>