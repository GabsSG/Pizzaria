<?php
    include './PHP/controllers/pedidos.php';
?>
<!-- PAGINA DE PEDIDOS -->
<div>             
    
    <!-- Pedidos realizados -->
    <div class="card text-white bg-dark">
        
        <!-- Cabeçalho da Tabela -->
        <div class="card-header">
            <div class="p-2 bd-highlight input-group">
                <h2 class="pe-2 bi bi-bag-fill"></h2>
                <h2>Pedidos</h2>
            </div>
            
        </div>        
    </div>

    <!-- Barra de busca da pagina pedidos -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-end">
            <form class="d-flex justify-content-end">
                <input class="form-control" type="search" placeholder="Busca de pedidos">
                <button class="btn btn-dark bi bi-search" type="submit"></button>
            </form>
            <!-- Adicionar um novo cliente -->
            <a class="icon-link icon-link-hover p-2 bd-highlight" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="tela.php?dir=PHP/views/pedidos&file=create">
                <i class="clearlink pe-2 bi bi-bag-fill"></i>
            </a>

        </div>
    </nav>

    <!-- Tabela de pedidos realizados -->
    <table class="table table-striped table-hover card-body">
        <thead>
            <tr>
                <th scope="col">Data e hora do pedido</th>
                <th scope="col">Cliente</th>
                <th scope="col" width="10%">Visualizar</th>
                <th scope="col" width="10%">Editar</th>
                <th scope="col" width="10%">Excluir</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($pedidos as $pedido) { ?> 
            <tr>
                <td><?php echo $pedido->getDataHora(); ?></td>
                <td><?php echo $pedido->getClienteId(); ?></td>
                <td>
                    <a class="clearlink" href="tela.php?dir=PHP/views/pedidos&file=show&id=<?php echo $pedido->getId(); ?>">
                        <i class="bi bi-eye-fill"></i>
                    </a>    
                </td>
                <td>
                    <a class="clearlink" href="tela.php?dir=PHP/views/pedidos&file=edit&id<?php echo $pedido->getId(); ?>">
                        <i class="fa fa-pencil"></i>
                    </a>    
                </td>  
                <td>
                    <a class="clearlink" href="tela.php?dir=PHP/views/pedidos&file=index&deleteid=<?php echo $pedido->getId(); ?>">
                        <i class="bi bi-trash3-fill"></i>
                    </a>    
                </td>
            </tr>
            <?php } ?>          
        </tbody>
    </table>

    <!-- Paginação da tela pedidos -->
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