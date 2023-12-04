<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS  -->

    <!-- CSS da página --> 
    <link rel="stylesheet" href="/CSS/style.css"> 

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Icones do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <title>Pizzaria</title>
    <link rel="icon" type="image/x-icon" href="/IMG/icones/favicon.ico">
    
</head>
<body class="tela">
    <header class="cabecalho bg-dark">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <i class="navbar-brand fs-5" href="#">
                    <i class="fa-solid fa-pizza-slice"></i>
                </i>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="tela.php?dir=PHP/views/clientes&file=index">
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="tela.php?dir=PHP/views/pedidos&file=index">
                                Pedidos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="tela.php?dir=PHP/views/sabores&file=index">
                                Sabores de pizza
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="tela.php?dir=PHP/views/bebidas&file=index">
                                Bebidas
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="principal">
        <div class="conteudo">
            <?php
                include(__DIR__ . "/{$_GET['dir']}/{$_GET['file']}.php");
            ?>
        </div>
    </main>
    <footer class="rodape">
        <!-- Fazer um botão para NOVO PEDIDO     -->
    </footer>

        <!-- SCRIPT -->
    
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>