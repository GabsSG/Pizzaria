<?php
    include './PHP/controllers/bebidas.php';
?>
<!-- PAGINA BEBIDAS -->
<div>
            
    <div class="card text-white bg-dark">

        <!-- Cabeçalho do Formulário -->
        <div class="card-header">
            <div class="p-2 bd-highlight input-group">
                <h2 class="pe-2 bi bi-cup-straw"></h2><!-- Icone da página bebida -->
                <h2>Bebidas</h2>
            </div>
        </div>
    </div>  

    <!--  Formulário de cadastro de bebida -->
    <div>
        <form method="post" class="form-floating form-control-sm">
            <div class="row">
                <?php if(!is_null($bebida)) { ?>
                    <input type="hidden" name="id" value="<?php echo $bebida->getId(); ?>"/>
                <?php } ?>
                <div class="mb-3 form-floating col-md gx-1">
                    <input name="marca" type="text" class="form-control" placeholder="Marca" value="<?php if($bebida) echo $bebida->getMarca(); ?>">
                    <label for="marca">
                        Marca
                    </label>
                </div>
                <div class="mb-3 form-floating col-md gx-1">
                    <input name="valor" type="text" class="form-control" placeholder="Valor" value="<?php if($bebida) echo $bebida->getValor(); ?>">
                    <label for="valor">
                        Valor
                    </label>
                </div>
                <div class="mb-3 form-floating col-md gx-1">
                    <input name="<?php if($bebida) echo 'editar'; else echo 'inserir'; ?>" type="submit" class="btn btn-dark" value="Submit"/>
                </div>
            </div>
        </form>

        <!-- Tabela de bebidas cadastradas -->
        <table class="table table-striped table-hover card-body">
            <thead>
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Valor</th>
                    <th scope="col" width="10%">Editar</th>
                    <th scope="col" width="10%">Excluir</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach($bebidas as $bebida) { ?>  

                <tr>
                    <td><?php echo $bebida->getMarca(); ?></td>
                    <td><?php echo $bebida->getValor(); ?></td>
                    <td>
                        <a class="clearlink" href="tela.php?dir=PHP/views/bebidas&file=index&action=edit&id=<?php echo $bebida->getId(); ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a class="clearlink" href="tela.php?dir=PHP/views/bebidas&file=index&deleteid=<?php echo $bebida->getId(); ?>">
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
</div>