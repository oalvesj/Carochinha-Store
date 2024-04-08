<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"     rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="navbar.css">
  <title>Orçamento</title>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><img src="logo/logo_fucao.svg"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="aloja.html">Quem somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="endereco.html">Onde estamos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="painel.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.facebook.com/groups/831969993526410/?locale=pt_PT"><i class="bi bi-facebook"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.instagram.com/fuscasporai/"><i class="bi bi-instagram"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.whatsapp.com/download?lang=pt_PT"><i class="bi bi-whatsapp"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Produtos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="carros.html">Carros</a></li>
              <li><a class="dropdown-item" href="pecas.html">Peças</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="fazerorcamento.php">Orçamento</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-dark" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
  </nav>
  </header>

<?php
ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');

error_reporting(E_ALL);
include dirname(__FILE__) . '/principal.php';

use DB\Connection;

?>
<div class="container mt-5">
    <h1>Dados</h1>

    <form id="form-orcamento" action="" method="post">
        <div class="mb-3">
            <label for="nome">
                Nome
            </label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>

        <div class="mb-3">
            <label for="apelido">
                Apelido
            </label>
            <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Apelido">
        </div>

        <div class="mb-3">
            <label for="telemovel">
                Telemóvel
            </label>
            <input type="text" class="form-control" name="telemovel" id="telemovel" placeholder="Telemóvel">
        </div>

        <?php
        $conexao = new Connection();
        $produtos_query = $conexao->query('SELECT * FROM produtos ORDER BY nome ASC');
        ?>

        <div class="mb-3">
            <label for="produto_id">Escolha seu produto</label>
            <select id="produto_id" name="produto_id" onchange="produtoSelecionado()" required class="form-control">
                <option value="">Selecione</option>

                <?php while ($produto = $produtos_query->fetch_object()) : ?>
                <option data-preco="<?php echo $produto->preco ?>" value="<?php echo $produto->id ?>">
                    <?php echo $produto->nome ?>
                </option>
                <?php endwhile; ?>
                
            </select>
        </div>

        <div class="mb-3">
            <label for="qtd">
                Quantidade
            </label>
            <input onchange="produtoSelecionado()" type="number" value="1" min="1" max="10" class="form-control" name="qtd" id="qtd" placeholder="Quantidade">
        </div>

        <div class="mb-3">
            <label for="orcamento_estimado">
                Orçamento estimado
            </label>
            <input type="text" class="form-control" name="orcamento_estimado" id="orcamento_estimado" placeholder="$">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar solicitação</button>
        </div>

    </form>
</div>

<script>
    $(function () 
    {
        produtoSelecionado = () => 
        {
            const produtoSelecionado = $('#produto_id').val();
            if (produtoSelecionado != '') 
            {
                const valorproduto = $('#produto_id option:selected').data('preco');
                const qtd = parseInt(document.getElementById('qtd').value);

                let valorFinal = valorproduto * qtd;

                if (qtd == 2) {
                    valorFinal = (valorFinal - (valorFinal * 0.2));
                } else if (qtd >= 3) {
                    valorFinal = (valorFinal - (valorFinal * 0.3));
                }

                $('#orcamento_estimado').val(`€ ${valorFinal}`);
            }
        }

        $('#form-orcamento').submit(function () 
        {
            const $form = $(this);
            const $btn = $(this).find('button[type="submit"]');
            
            $btn
                .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Espera...')
                .attr('disabled', true);

            $.post('actions/orcamento.php', $(this).serialize(), function (response) 
            {
                alert(response.message);

                if (response.status == 'success') {
                    $form.trigger("reset");
                }

                $btn
                    .html('Enviar solicitação')
                    .attr('disabled', false);
            });

            return false;
        });
    });
</script>