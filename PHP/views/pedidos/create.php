
<!-- PAGINA DE NOVO PEDIDO -->
<div>
            
    <div class="card text-white bg-dark">

        <!-- Cabeçalho da Página -->
        <div class="card-header">
            <div class="p-2 bd-highlight input-group">
                <h2 class="pe-2 bi bi-bag-plus-fill"></h2>
                <h2>Novo Pedido</h2>
            </div>
        </div>
    </div>

    
    <!-- Informações sobre o cliente -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Cliente
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    
                    <!-- Seleção do tipo de pedido -->
                    <div>
                        <select class="form-select mb-3 form-floating col-md gx-1">
                            <option selected>Selecione o tipo de pedido</option>
                            <option value="">Entrega</option>
                            <option value="">Retirada</option>
                            <option value="">Mesa</option>
                        </select>
                    </div>
                    <div class="mb-3 form-floating col-md gx-1 input-group">
                        <input type="text" class="form-control" placeholder="Informe o número cadastrado"/>
                        <label for="nome">
                            Informe o número cadastrado
                        </label>
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div>
                        <form method="post" class="form-floating form-control-sm">
                            <div class="row">
                                <div class="mb-3 form-floating col-md gx-1">
                                    <input name="nome" type="text" class="form-control" placeholder="Nome Completo">
                                    <label for="nome">
                                        Nome
                                    </label>
                                </div>
                            </div>
                        
                            <!-- Endereço do cliente com base no CEP -->
                            <div class="row">
                                <div class="mb-3 col-md-9 form-floating gx-1">
                                    <input name="rua" type="text" class="form-control" placeholder="Endereço">
                                    <label for="Rua"> 
                                        Rua
                                    </label>
                            </div>
                            <div class="mb-3 col-md form-floating gx-1">
                                <input name="numero" type="text" class="form-control" placeholder="Nº">
                                <label for="numero">
                                    Nº
                                </label>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="mb-3 col-md-5 form-floating gx-1">
                                        <input name="bairro" type="text" class="form-control" placeholder="Bairro">
                                        <label for="bairro">
                                            Bairro
                                        </label>
                                    </div>
                                    <div class="mb-3 form-floating col-md gx-1">
                                        <input name="cep" type="text" class="form-control" placeholder="CEP">
                                        <label for="cep">
                                            CEP
                                        </label>
                                    </div>
                                </div>
                            </div>    
                                    
                            <!-- Telefone para contato -->
                            <div class="row">
                                <div class="mb-3 col form-floating gx-1">
                                    <input name="telefoneFixo" type="tel" class="form-control" placeholder="Telefone Fixo">
                                    <label for="telefoneFixo">
                                        Telefone fixo
                                    </label>
                                </div>
                                <div class="mb-3 col form-floating gx-1">
                                    <select name="status_id" class="form-control">
                                        <option value="">Selecione</option>
                                        <?php foreach($statusList as $status) { ?>
                                        <option value="<?php echo $status->getId(); ?>">
                                            <?php echo $status->getNome(); ?>
                                        </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Formulário de Novo Pedido -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Compra
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="row">

                        <!-- Adicionar nova pizza -->
                        <div class="mb-2 col">
                            <form class="form-floating form-control-sm">
                                <div class="row">
                                    <select class="form-select form-select-sm col" aria-label="Small select example">
                                        <option selected>Selecione o tamanho da pizza:</option>
                                        <option value="">Pequena</option>
                                        <option value="">Média</option>
                                        <option value="">Grande</option>
                                        <option value="">Big</option>
                                    </select>
                                    <div class="mb-3 col form-floating gx-1">
                                        <button type="submit" class="btn btn-dark">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                                            
                            <!-- Tabela de pizza do pedido -->
                            <table class="table table-striped table-hover card-body table-sm">
                                <thead>
                                    <tr>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Valor Unitário</th>
                                    <th scope="col">Valor Total</th>
                                    <th scope="col" width="10%">Editar</th>
                                    <th scope="col" width="10%">Excluir</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td>2</td>
                                        <td>Coca-cola lata</td>
                                        <td>R$ 4,00</td>
                                        <td>R$ 8,00</td>
                                        <td>
                                            <i class="fa fa-pencil"></i>
                                        </td>  
                                        <td>
                                            <i class="bi bi-trash3-fill"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                    

                        <!-- Adicionar nova bebida -->
                        <div class="mb-2 col">
                            <form class="form-floating form-control-sm">
                                <div class="row">
                                    <select class="form-select form-select-sm col" aria-label="Small select example">
                                        <option selected>Selecione a bebida:</option>
                                        <option value="">Pequena</option>
                                        <option value="">Média</option>
                                    </select>
                                    <div class="mb-3 col form-floating gx-1">
                                        <button type="submit" class="btn btn-dark">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                                        
                            <!-- Tabela de bebida do pedido -->
                            <table class="table table-striped table-hover card-body table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Valor Unitário</th>
                                        <th scope="col">Valor Total</th>
                                        <th scope="col" width="10%">Editar</th>
                                        <th scope="col" width="10%">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td>2</td>
                                        <td>Coca-cola lata</td>
                                        <td>R$ 4,00</td>
                                        <td>R$ 8,00</td>
                                        <td>
                                            <i class="fa fa-pencil"></i>
                                        </td>  
                                        <td>
                                            <i class="bi bi-trash3-fill"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>               
                        </div>
                    </div>
                </div>
            </div>             
        </div>   
    </div>
</div>

