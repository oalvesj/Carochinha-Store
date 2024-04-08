<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="login.css">


  <title>Acesso Admin</title>
</head>

<body>

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
            <a class="nav-link" href="login.php">Admin</a>
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

  <section class="container">

    <div class="form-login">

    <h2>Login</h2>
    <form Action="autentica.php" method="POST">
        <p>
            <label>E-mail</label>
            <input class="form-control" type="text" name="login" required>
        </p>
        <p>
            <label>Senha</label>
            <input class="form-control" type="password" name="senha" required>
        </p>
        <p> 
        <button class="btn btn-dark" type="submit">Entrar</button>
        </p>

    </form>  
    </div>
    
    </section>

        </body>
    </html>
    