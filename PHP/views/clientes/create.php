<?php
    include './PHP/controllers/clientes.php';
?>

<!-- PAGINA DE ADICIONAR NOVO CLIENTE -->
<div>
            
    <div class="card text-white bg-dark">

        <!-- Cabeçalho do Formulário -->
        <div class="card-header">
            <div class="p-2 bd-highlight input-group">
                <h2 class="pe-2 bi bi-person-lines-fill"></h2><!-- Icone da página adicionar cliente -->
                <h2>Novo Cliente</h2>
            </div>
        </div>
    </div>  

    <!--  Formulário de cadastro de cliente -->
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
            </div>
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

                    <label for="status">
                        Status do cliente
                    </label>
                </div>
            </div>
                
            <input name="inserir" type="submit" class="btn btn-dark" value="Submit"/>
        </form>
    </div>
</div>