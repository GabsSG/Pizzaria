<?php
    include './PHP/controllers/sabores.php';
?>
<!-- PAGINA DE SABORES DE PIZZA -->
<div>
            
    <div class="card text-white bg-dark">

        <!-- Cabeçalho -->
        <div class="card-header">
            <div class="p-2 bd-highlight input-group">
                <h2 class="fa-solid fa-pizza-slice"></h2><!-- Icone da página sabor -->
                <h2>Sabores de pizza</h2>
            </div>
        </div>
    </div>  

    <div>

        <!--  Formulário de cadastro de sabores -->
        <form method="post" class="form-floating form-control-sm">
            <div class="row">
                <?php if(!is_null($sabor)) { ?>
                    <input type="hidden" name="id" value="<?php echo $sabor->getId(); ?>"/>
                <?php } ?>
                <div class="mb-3 form-floating col-md gx-1">
                    <input name="nome" type="text" class="form-control" placeholder="Sabor" value="<?php if($sabor) echo $sabor->getNome(); ?>">
                    <label for="nome">
                        Sabor
                    </label>
                </div>
                <div class="mb-3 form-floating col-md gx-1">
                    <input name="descricao" type="text" class="form-control" placeholder="Descrição do sabor" value="<?php if($sabor) echo $sabor->getDescricao(); ?>">
                    <label for="descricao">
                        Descrição do sabor
                    </label>
                </div>
                <div class="mb-3 form-floating col-md gx-1">
                    <input name="<?php if($sabor) echo 'editar'; else echo 'inserir'; ?>" type="submit" class="btn btn-dark" value="Submit"/>
                </div>
        </form>

        <!-- Tabela de sabores cadastrados -->
        <table class="table table-striped table-hover card-body">
            <thead>
                <tr>
                    <th scope="col">Sabor</th>
                    <th scope="col">Descrição do sabor</th>
                    <th scope="col" width="10%">Editar</th>
                    <th scope="col" width="10%">Excluir</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach($sabores as $sabor) { ?>  
                <tr>
                    <td><?php echo $sabor->getNome(); ?></td>
                    <td><?php echo $sabor->getDescricao(); ?></td>
                    <td>
                        <a class="clearlink" href="tela.php?dir=PHP/views/sabores&file=index&action=edit&id=<?php echo $sabor->getId(); ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a class="clearlink" href="tela.php?dir=PHP/views/sabores&file=index&deleteid=<?php echo $sabor->getId(); ?>">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>

                <?php } ?> 

            </tbody>
        </table>               
    </div>
</div>